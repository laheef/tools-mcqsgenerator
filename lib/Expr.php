<?php
/**
 * Safe arithmetic expression parser / evaluator.
 *
 * Omni's calculator definitions express every equation direction as a plain
 * string, e.g. "2*PI*r" or "log(-payment_gen/(eq_p*loan_amount - payment_gen))/log(eq_p + 1)".
 * We evaluate those with a small recursive-descent parser instead of eval(),
 * so untrusted/odd data can never execute code.
 *
 * Grammar (precedence low → high)
 *   expr     := ternary
 *   ternary  := or ('?' ternary ':' ternary)?
 *   or       := and ('||' and)*
 *   and      := equality ('&&' equality)*
 *   equality := compare (('=='|'!=') compare)*
 *   compare  := additive (('<'|'>'|'<='|'>=') additive)*
 *   additive := term (('+'|'-') term)*
 *   term     := unary (('*'|'/'|'%') unary)*
 *   unary    := ('-'|'+'|'!') unary | power
 *   power    := primary ('^' unary)?          // right associative
 *   primary  := number | const | name '(' args ')' | name | '(' expr ')'
 *
 * Parsing builds an AST and evaluation walks it, so `cond ? a : b` and
 * `a && b` short-circuit: the branch that is not taken is never evaluated and
 * therefore cannot raise a division-by-zero on a value the user never meant to
 * divide by. Booleans are plain floats (0 false, non-zero true).
 */

declare(strict_types=1);

namespace Omni;

final class ExprException extends \RuntimeException
{
}

final class Expr
{
    /** @var array<int,array{0:string,1:mixed}> */
    private array $tokens;
    private int $pos = 0;

    /** @var array<string,float> */
    public array $vars;

    /** @var array<string,float> constants */
    private const CONSTANTS = [
        'PI' => M_PI,
        'pi' => M_PI,
        'e'  => M_E,
        'E'  => M_E,
    ];

    private function __construct(array $tokens, array $vars)
    {
        $this->tokens = $tokens;
        $this->vars   = $vars;
    }

    /**
     * Evaluate a formula with the given variable values.
     * Throws ExprException when a variable is missing or the syntax is bad.
     */
    public static function evaluate(string $src, array $vars = []): float
    {
        $p = new self(self::tokenize($src), $vars);
        $ast = $p->parseExpr();
        $p->expect('eof');
        $v = $p->evalNode($ast);
        if (is_nan($v)) {
            throw new ExprException('not a number');
        }
        return (float) $v;
    }

    /** True when every identifier in the formula is either known or a function. */
    public static function dependencies(string $src): array
    {
        preg_match_all('/[A-Za-z_][A-Za-z0-9_]*/', $src, $m);
        $out = [];
        foreach ($m[0] as $i => $name) {
            if (isset(self::CONSTANTS[$name]) || Functions::knows($name)) {
                continue;
            }
            $out[$name] = true;
        }
        return array_keys($out);
    }

    /* ------------------------------------------------------------ lexer */

    private static function tokenize(string $s): array
    {
        $tokens = [];
        $i = 0;
        $n = strlen($s);
        while ($i < $n) {
            $c = $s[$i];
            if (ctype_space($c)) {
                $i++;
                continue;
            }
            if (ctype_digit($c) || ($c === '.' && $i + 1 < $n && ctype_digit($s[$i + 1]))) {
                if (preg_match('/\G(\d+(?:\.\d*)?|\.\d+)(?:[eE][+-]?\d+)?/', $s, $m, 0, $i)) {
                    $tokens[] = ['num', (float) $m[1]];
                    $i += strlen($m[0]);
                    continue;
                }
            }
            if (ctype_alpha($c) || $c === '_') {
                if (preg_match('/\G[A-Za-z_][A-Za-z0-9_]*/', $s, $m, 0, $i)) {
                    $tokens[] = ['name', $m[0]];
                    $i += strlen($m[0]);
                    continue;
                }
            }
            $two = substr($s, $i, 2);
            if (in_array($two, ['<=', '>=', '==', '!=', '&&', '||'], true)) {
                $tokens[] = [$two, $two];
                $i += 2;
                continue;
            }
            if (strpos('+-*/^%(),?:<>!&|', $c) !== false) {
                $tokens[] = [$c, $c];
                $i++;
                continue;
            }
            throw new ExprException("unexpected character '$c' in '$s'");
        }
        $tokens[] = ['eof', null];
        return $tokens;
    }

    /* ----------------------------------------------------------- parser */

    private function peek(): array
    {
        return $this->tokens[$this->pos];
    }

    private function next(): array
    {
        return $this->tokens[$this->pos++];
    }

    private function expect(string $type): void
    {
        if ($this->peek()[0] !== $type) {
            throw new ExprException("expected $type, got {$this->peek()[0]}");
        }
        $this->pos++;
    }

    /** @return array AST node */
    private function parseExpr(): array
    {
        return $this->parseTernary();
    }

    private function parseTernary(): array
    {
        $cond = $this->parseOr();
        if ($this->peek()[0] === '?') {
            $this->next();
            $then = $this->parseTernary();
            $this->expect(':');
            $else = $this->parseTernary();
            return ['tern', $cond, $then, $else];
        }
        return $cond;
    }

    private function parseOr(): array
    {
        $v = $this->parseAnd();
        while ($this->peek()[0] === '||') {
            $this->next();
            $v = ['bin', '||', $v, $this->parseAnd()];
        }
        return $v;
    }

    private function parseAnd(): array
    {
        $v = $this->parseEquality();
        while ($this->peek()[0] === '&&') {
            $this->next();
            $v = ['bin', '&&', $v, $this->parseEquality()];
        }
        return $v;
    }

    private function parseEquality(): array
    {
        $v = $this->parseCompare();
        while (in_array($this->peek()[0], ['==', '!='], true)) {
            $op = $this->next()[0];
            $v = ['bin', $op, $v, $this->parseCompare()];
        }
        return $v;
    }

    private function parseCompare(): array
    {
        $v = $this->parseAdditive();
        while (in_array($this->peek()[0], ['<', '>', '<=', '>='], true)) {
            $op = $this->next()[0];
            $v = ['bin', $op, $v, $this->parseAdditive()];
        }
        return $v;
    }

    private function parseAdditive(): array
    {
        $v = $this->parseTerm();
        while (in_array($this->peek()[0], ['+', '-'], true)) {
            $op = $this->next()[0];
            $v = ['bin', $op, $v, $this->parseTerm()];
        }
        return $v;
    }

    private function parseTerm(): array
    {
        $v = $this->parseUnary();
        while (in_array($this->peek()[0], ['*', '/', '%'], true)) {
            $op = $this->next()[0];
            $v = ['bin', $op, $v, $this->parseUnary()];
        }
        return $v;
    }

    private function parseUnary(): array
    {
        $t = $this->peek()[0];
        if (in_array($t, ['-', '+', '!'], true)) {
            $this->next();
            return ['un', $t, $this->parseUnary()];
        }
        return $this->parsePower();
    }

    private function parsePower(): array
    {
        $base = $this->parsePrimary();
        if ($this->peek()[0] === '^') {
            $this->next();
            return ['bin', '^', $base, $this->parseUnary()]; // right associative
        }
        return $base;
    }

    private function parsePrimary(): array
    {
        $tok = $this->next();
        switch ($tok[0]) {
            case 'num':
                return ['num', (float) $tok[1]];
            case '(':
                $v = $this->parseExpr();
                $this->expect(')');
                return $v;
            case 'name':
                $name = $tok[1];
                if ($this->peek()[0] === '(') {
                    $this->next();
                    $args = [];
                    if ($this->peek()[0] !== ')') {
                        $args[] = $this->parseExpr();
                        while ($this->peek()[0] === ',') {
                            $this->next();
                            $args[] = $this->parseExpr();
                        }
                    }
                    $this->expect(')');
                    return ['call', $name, $args];
                }
                return ['var', $name];
        }
        throw new ExprException('unexpected token ' . $tok[0]);
    }

    /* ---------------------------------------------------------- evaluator */

    private function evalNode(array $n): float
    {
        switch ($n[0]) {
            case 'num':
                return (float) $n[1];

            case 'var':
                $name = $n[1];
                if (array_key_exists($name, $this->vars) && $this->vars[$name] !== null) {
                    return (float) $this->vars[$name];
                }
                if (isset(self::CONSTANTS[$name])) {
                    return (float) self::CONSTANTS[$name];
                }
                throw new ExprException("unknown variable '$name'");

            case 'call':
                $args = [];
                foreach ($n[2] as $a) {
                    $args[] = $this->evalNode($a);
                }
                return Functions::call($n[1], $args);

            case 'un':
                $x = $this->evalNode($n[2]);
                return match ($n[1]) {
                    '-' => -$x,
                    '+' => $x,
                    '!' => $x == 0.0 ? 1.0 : 0.0,
                };

            case 'tern':
                return $this->evalNode($n[1]) != 0.0
                    ? $this->evalNode($n[2])
                    : $this->evalNode($n[3]);

            case 'bin':
                $op = $n[1];
                // && and || short-circuit so an untaken branch cannot throw
                if ($op === '&&') {
                    return $this->evalNode($n[2]) != 0.0 && $this->evalNode($n[3]) != 0.0 ? 1.0 : 0.0;
                }
                if ($op === '||') {
                    return $this->evalNode($n[2]) != 0.0 || $this->evalNode($n[3]) != 0.0 ? 1.0 : 0.0;
                }
                $a = $this->evalNode($n[2]);
                $b = $this->evalNode($n[3]);
                switch ($op) {
                    case '+':
                        return $a + $b;
                    case '-':
                        return $a - $b;
                    case '*':
                        return $a * $b;
                    case '/':
                        if ($b == 0.0) {
                            throw new ExprException('division by zero');
                        }
                        return $a / $b;
                    case '%':
                        if ($b == 0.0) {
                            throw new ExprException('division by zero');
                        }
                        return fmod($a, $b);
                    case '^':
                        return $a ** $b;
                    case '<':
                        return $a < $b ? 1.0 : 0.0;
                    case '>':
                        return $a > $b ? 1.0 : 0.0;
                    case '<=':
                        return $a <= $b ? 1.0 : 0.0;
                    case '>=':
                        return $a >= $b ? 1.0 : 0.0;
                    case '==':
                        return abs($a - $b) < 1e-12 ? 1.0 : 0.0;
                    case '!=':
                        return abs($a - $b) < 1e-12 ? 0.0 : 1.0;
                }
                throw new ExprException("unsupported operator '$op'");
        }
        throw new ExprException('bad node');
    }
}

/**
 * The function table. Only the functions that actually occur in harvested
 * definitions are implemented; `knows()` lets the solver skip a variant that
 * needs something we do not support instead of failing the whole page.
 */
final class Functions
{
    private const NAMES = [
        // powers and roots
        'sqrt', 'cbrt', 'pow', 'exp', 'expm1',
        // logarithms
        'log', 'ln', 'log2', 'log10', 'logN',
        // rounding
        'ceil', 'floor', 'round', 'fix', 'trunc', 'abs', 'sign', 'sgn',
        // combinatorics / number theory
        'mod', 'min', 'max', 'gcd', 'lcm', 'GCF', 'LCM', 'fact', 'factorial',
        // trigonometry
        'sin', 'cos', 'tan', 'asin', 'acos', 'atan', 'atan2',
        'sinh', 'cosh', 'tanh', 'deg', 'rad',
        // statistics and finance helpers used by the definitions
        'erf', 'erfinv', 'pval', 'get_percentile', 'get_payment_count',
        // reciprocal trigonometry
        'cot', 'sec', 'csc', 'acot', 'asec', 'acsc',
        // hyperbolic inverses and reciprocals
        'asinh', 'acosh', 'atanh', 'coth', 'sech', 'csch',
        // error function proper, plus small general-purpose helpers
        'erff', 'erfc', 'hypot', 'clamp', 'takeRoot', 'log1p', 'roundToInteger',
        // generic helpers the definitions call by many different names
        'gamma', 'invNorm', 'copy', 'customMin', 'customMax', 'sum', 'avg',
        'mean', 'round_to_half', 'roundToSigFig', 'is_binary', 'is_octal',
        'is_hex', 'getSign', 'pwr',
        // a couple of helpers that appear in string-counting recipes
        'string', 'count',
        // date arithmetic: date variables hold milliseconds since the epoch and
        // the definitions read them apart with these helpers (month is 0-based)
        'getDate', 'getMonth', 'getYear', 'getDayOfWeek', 'getDayOfYear',
        'getHours', 'getMinutes', 'getSeconds', 'getMilliseconds',
        'getStartMonthDays', 'getDaysInMonth', 'dateAtMonthsOld', 'if_else',
        'dateAtYearsOld', 'daysBetween', 'today', 'now',
    ];

    public static function knows(string $name): bool
    {
        return in_array($name, self::NAMES, true);
    }

    /**
     * The function names a formula may call. Used to tell a definition the
     * engine can evaluate from one whose working lived in a page script that was
     * never captured — a formula naming get_results() is not going to produce an
     * answer here.
     *
     * @return array<int,string>
     */
    public static function names(): array
    {
        return self::NAMES;
    }

    /** @param float[] $a */
    public static function call(string $name, array $a): float
    {
        switch ($name) {
            case 'sqrt':
                return sqrt(max(0.0, $a[0] ?? 0.0));
            case 'cbrt':
                $x = $a[0] ?? 0.0;
                return $x < 0 ? -((-$x) ** (1 / 3)) : $x ** (1 / 3);
            case 'expm1':
                return expm1($a[0] ?? 0.0);
            case 'ceil':
                return ceil($a[0] ?? 0.0);
            case 'floor':
                return floor($a[0] ?? 0.0);
            case 'fix':      // forward-compatible with JS Math.trunc
            case 'trunc':
                return (float) (int) ($a[0] ?? 0.0);
            case 'round':
                $digits = (int) round($a[1] ?? 0.0);
                return round($a[0] ?? 0.0, $digits);
            case 'mod':
                $m = $a[1] ?? 0.0;
                if ($m == 0.0) {
                    throw new ExprException('modulo by zero');
                }
                return fmod($a[0] ?? 0.0, $m);
            case 'min':
                return $a === [] ? 0.0 : min($a);
            case 'max':
                return $a === [] ? 0.0 : max($a);
            case 'sign':
            case 'sgn':
                $x = $a[0] ?? 0.0;
                return $x > 0 ? 1.0 : ($x < 0 ? -1.0 : 0.0);
            case 'gcd':
                $g = 0;
                foreach ($a as $x) {
                    $g = self::gcd($g, (int) round($x));
                }
                return (float) $g;
            case 'lcm':
                $l = 1;
                foreach ($a as $x) {
                    $xi = (int) round($x);
                    if ($xi === 0) {
                        return 0.0;
                    }
                    $l = (int) (abs($l * $xi) / max(1, self::gcd($l, $xi)));
                }
                return (float) $l;
            case 'fact':
            case 'factorial':
                $n = (int) round($a[0] ?? 0.0);
                if ($n < 0 || $n > 170) {
                    throw new ExprException('factorial out of range');
                }
                $r = 1.0;
                for ($i = 2; $i <= $n; $i++) {
                    $r *= $i;
                }
                return $r;
            case 'log2':
                if (($a[0] ?? 0.0) <= 0) {
                    throw new ExprException('log domain');
                }
                return log($a[0], 2);
            case 'log10':
                if (($a[0] ?? 0.0) <= 0) {
                    throw new ExprException('log domain');
                }
                return log10($a[0]);
            case 'logN':      // logN(base, x) or logN(x) = natural log
                if (count($a) >= 2) {
                    if ($a[1] <= 0 || $a[0] <= 0 || $a[0] == 1.0) {
                        throw new ExprException('log domain');
                    }
                    return log($a[1], $a[0]);
                }
                if (($a[0] ?? 0.0) <= 0) {
                    throw new ExprException('log domain');
                }
                return log($a[0]);
            case 'pow':
                return ($a[0] ?? 0.0) ** ($a[1] ?? 0.0);
            case 'abs':
                return abs($a[0] ?? 0.0);
            case 'log':   // natural log (confirmed: exp(log(x)/log(b)) === x)
            case 'ln':
                if (($a[0] ?? 0.0) <= 0) {
                    throw new ExprException('log domain');
                }
                if (isset($a[1]) && $a[1] > 0 && $a[1] != 1.0) {
                    return log($a[0], $a[1]);      // log(x, base)
                }
                return log($a[0]);
            case 'exp':
                return exp($a[0] ?? 0.0);
            case 'sin':
                return sin($a[0] ?? 0.0);
            case 'cos':
                return cos($a[0] ?? 0.0);
            case 'tan':
                return tan($a[0] ?? 0.0);
            case 'asin':
                return asin(max(-1.0, min(1.0, $a[0] ?? 0.0)));
            case 'acos':
                return acos(max(-1.0, min(1.0, $a[0] ?? 0.0)));
            case 'atan':
                return atan($a[0] ?? 0.0);
            case 'atan2':
                return atan2($a[0] ?? 0.0, $a[1] ?? 1.0);
            case 'sinh':
                return sinh($a[0] ?? 0.0);
            case 'cosh':
                return cosh($a[0] ?? 0.0);
            case 'tanh':
                return tanh($a[0] ?? 0.0);
            /*
             * A date reaches a formula as a day number (see Solver::formulaUnits)
             * — whole days since 1970-01-01, a fraction for a clock time. The
             * page's helpers were written against that convention: they take a
             * day number and read the calendar out of it. (They used to take
             * milliseconds, which is why "due date = mating date + 63" used to
             * add 63 milliseconds.)
             */
            case 'getDate':        return (float) (int) gmdate('j', (int) round(self::dayMs($a[0] ?? 0.0) / 1000));
            case 'getMonth':       return (float) (int) gmdate('n', (int) round(self::dayMs($a[0] ?? 0.0) / 1000)) - 1;
            case 'getYear':        return (float) (int) gmdate('Y', (int) round(self::dayMs($a[0] ?? 0.0) / 1000));
            case 'getDayOfWeek':   return (float) (int) gmdate('w', (int) round(self::dayMs($a[0] ?? 0.0) / 1000));
            case 'getDayOfYear':   return (float) (int) gmdate('z', (int) round(self::dayMs($a[0] ?? 0.0) / 1000));
            case 'getHours':       return (float) (int) gmdate('G', (int) round(self::dayMs($a[0] ?? 0.0) / 1000));
            case 'getMinutes':     return (float) (int) gmdate('i', (int) round(self::dayMs($a[0] ?? 0.0) / 1000));
            case 'getSeconds':     return (float) (int) gmdate('s', (int) round(self::dayMs($a[0] ?? 0.0) / 1000));
            case 'getMilliseconds': return (float) fmod(self::dayMs($a[0] ?? 0.0), 1000.0);
            case 'getStartMonthDays':
            case 'getDaysInMonth':
                // month index is 0-based; February is reported as 28 and the
                // leap-year case is handled separately by the caller
                $m = (int) round($a[0] ?? 0.0);
                $table = [31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31];
                return (float) ($table[(($m % 12) + 12) % 12]);
            case 'dateAtMonthsOld':
                return self::shiftMonths(self::dayMs($a[0] ?? 0.0), (int) round($a[1] ?? 0.0)) / 86400000.0;
            case 'dateAtYearsOld':
                return self::shiftMonths(self::dayMs($a[0] ?? 0.0), 12 * (int) round($a[1] ?? 0.0)) / 86400000.0;
            case 'daysBetween':
                return ($a[1] ?? 0.0) - ($a[0] ?? 0.0);
            case 'today':
            case 'now':
                return (float) (int) floor(time() / 86400);
            case 'if_else':
                return ($a[0] ?? 0.0) != 0.0 ? ($a[1] ?? 0.0) : ($a[2] ?? 0.0);
            case 'deg':
                return rad2deg($a[0] ?? 0.0);
            case 'rad':
                return deg2rad($a[0] ?? 0.0);
            case 'cot':
                $t = tan($a[0] ?? 0.0);
                if ($t == 0.0) {
                    throw new ExprException('cot undefined');
                }
                return 1 / $t;
            case 'sec':
                $c = cos($a[0] ?? 0.0);
                if ($c == 0.0) {
                    throw new ExprException('sec undefined');
                }
                return 1 / $c;
            case 'csc':
                $s2 = sin($a[0] ?? 0.0);
                if ($s2 == 0.0) {
                    throw new ExprException('csc undefined');
                }
                return 1 / $s2;
            case 'acot':
                $x = $a[0] ?? 0.0;
                return $x == 0.0 ? M_PI / 2 : atan(1 / $x);
            case 'asec':
                $x = $a[0] ?? 1.0;
                return $x == 0.0 ? M_PI / 2 : acos(1 / $x);
            case 'acsc':
                $x = $a[0] ?? 1.0;
                return $x == 0.0 ? M_PI / 2 : asin(1 / $x);
            case 'asinh':
                $x = $a[0] ?? 0.0;
                return log($x + sqrt($x * $x + 1));
            case 'acosh':
                $x = $a[0] ?? 1.0;
                if ($x < 1.0) {
                    throw new ExprException('acosh domain');
                }
                return log($x + sqrt($x * $x - 1));
            case 'atanh':
                $x = $a[0] ?? 0.0;
                if ($x <= -1.0 || $x >= 1.0) {
                    throw new ExprException('atanh domain');
                }
                return 0.5 * log((1 + $x) / (1 - $x));
            case 'coth':
                $t = tanh($a[0] ?? 0.0);
                if ($t == 0.0) {
                    throw new ExprException('coth undefined');
                }
                return 1 / $t;
            case 'sech':
                return 1 / cosh($a[0] ?? 0.0);
            case 'csch':
                $s0 = sinh($a[0] ?? 0.0);
                if ($s0 == 0.0) {
                    throw new ExprException('csch undefined');
                }
                return 1 / $s0;
            case 'erff':       // the true Gauss error function (erf(1) = 0.8427)
                return Stats::erf($a[0] ?? 0.0);
            case 'erfc':
                return 1.0 - Stats::erf($a[0] ?? 0.0);
            case 'hypot':
                $sum = 0.0;
                foreach ($a as $x) {
                    $sum += $x * $x;
                }
                return sqrt($sum);
            case 'clamp':
                $x = $a[0] ?? 0.0;
                return max($a[1] ?? $x, min($a[2] ?? $x, $x));
            case 'takeRoot':   // takeRoot(x, n) -> the n-th root, sign preserved
                $x = $a[0] ?? 0.0;
                $n = $a[1] ?? 2.0;
                if ($n == 0.0) {
                    throw new ExprException('root degree zero');
                }
                if ($x < 0 && fmod($n, 2.0) == 0.0) {
                    throw new ExprException('even root of a negative');
                }
                return $x < 0 ? -((-$x) ** (1 / $n)) : $x ** (1 / $n);
            case 'log1p':
                return log1p($a[0] ?? 0.0);
            case 'roundToInteger':
                return round($a[0] ?? 0.0);
            case 'gamma':
                $x = $a[0] ?? 0.0;
                if ($x <= 0 && floor($x) === $x) {
                    throw new ExprException('gamma pole');
                }
                return exp(Stats::lnGamma($x));
            case 'invNorm':    // inverse standard normal CDF
                $p = $a[0] ?? 0.5;
                return M_SQRT2 * Stats::erfinv(2 * $p - 1);
            case 'copy':
                return $a[0] ?? 0.0;
            case 'customMin':
                return $a === [] ? 0.0 : min($a);
            case 'customMax':
                return $a === [] ? 0.0 : max($a);
            case 'sum':
                return array_sum($a);
            case 'avg':
            case 'mean':
                return $a === [] ? 0.0 : array_sum($a) / count($a);
            case 'getSign':
                $x = $a[0] ?? 0.0;
                return $x > 0 ? 1.0 : ($x < 0 ? -1.0 : 0.0);
            case 'pwr':
                return ($a[0] ?? 0.0) ** ($a[1] ?? 0.0);
            case 'round_to_half':
                return round(($a[0] ?? 0.0) * 2) / 2;
            case 'roundToSigFig':
                $x = $a[0] ?? 0.0;
                $n = max(1, (int) round($a[1] ?? 2.0));
                if ($x == 0.0) {
                    return 0.0;
                }
                $d = $n - 1 - (int) floor(log10(abs($x)));
                return round($x, max(-12, min(12, $d)));
            case 'is_binary':
                return preg_match('/^[01]+$/', self::numToString($a[0] ?? 0.0)) ? 1.0 : 0.0;
            case 'is_octal':
                return preg_match('/^[0-7]+$/', self::numToString($a[0] ?? 0.0)) ? 1.0 : 0.0;
            case 'is_hex':
                return (bool) preg_match('/^[0-9A-Fa-f]+$/', self::numToString($a[0] ?? 0.0)) ? 1.0 : 0.0;
            case 'string':
                return $a[0] ?? 0.0;               // values are numeric here
            case 'count':
                // count(string(x)) — used by the binary/hex digit counters
                return (float) strlen(self::numToString($a[0] ?? 0.0));
            case 'erf':
                // The definitions use erf() with the standard-normal reading:
                // `2*erf(z) - 1` is "confidence level for z", which only holds
                // when erf is the normal CDF. Verified against the confidence
                // interval, z-test and margin-of-error calculators.
                return Stats::normalCdf($a[0] ?? 0.0);
            case 'erfinv':
                $p = $a[0] ?? 0.5;
                return M_SQRT2 * Stats::erfinv(2 * $p - 1);
            case 'pval':
                // pval(score, alternative, df, df2, which_test)
                // alternative: 0 two-tailed, -1 left, +1 right
                // which_test:  1 z, 2 t, 3 chi-square, 4 F
                return Stats::pValue(
                    $a[0] ?? 0.0,
                    (int) round($a[1] ?? 0.0),
                    (int) round($a[2] ?? 0.0),
                    (int) round($a[3] ?? 0.0),
                    (int) round($a[4] ?? 1.0)
                );
            case 'get_percentile': // (value, mean, sd)
                return Stats::normalCdf((($a[0] ?? 0.0) - ($a[1] ?? 0.0)) / (($a[2] ?? 1.0) ?: 1.0));
            case 'GCF':
                return (float) self::gcd((int) round($a[0] ?? 0), (int) round($a[1] ?? 0));
            case 'LCM':
                $x = (int) round($a[0] ?? 0);
                $y = (int) round($a[1] ?? 0);
                return $x === 0 || $y === 0 ? 0.0 : (float) (abs($x * $y) / self::gcd($x, $y));
            case 'get_payment_count':
                // (amount, rate, payment) -> number of payments, mirrors the
                // closed form used in the mortgage/loan definitions.
                $amount  = $a[0] ?? 0.0;
                $rate    = $a[1] ?? 0.0;
                $payment = $a[2] ?? 0.0;
                if ($rate <= 0 || $payment <= 0) {
                    return 0.0;
                }
                $d = $payment - $amount * $rate;
                if ($d <= 0) {
                    return 0.0;
                }
                return log($payment / $d) / log(1 + $rate);
        }
        throw new ExprException("unsupported function '$name'");
    }

    /** Shift an epoch-millisecond timestamp by whole months, clamping the day. */
    /** A day number as milliseconds, for the calendar helpers below. */
    private static function dayMs(float $days): float
    {
        return $days * 86400000.0;
    }

    private static function shiftMonths(float $ms, int $months): float
    {
        $t = (int) round($ms / 1000);
        $y = (int) gmdate('Y', $t);
        $m = (int) gmdate('n', $t) - 1 + $months;
        $d = (int) gmdate('j', $t);
        $y += intdiv($m - ($m % 12 + 12) % 12, 12);
        $m = (($m % 12) + 12) % 12;
        $daysIn = (int) gmdate('t', gmmktime(0, 0, 0, $m + 1, 1, $y));
        $d = min($d, $daysIn);
        return (float) (gmmktime(0, 0, 0, $m + 1, $d, $y) * 1000);
    }

    /** JS-like number → string, so count(string(101)) === 3. */
    private static function numToString(float $v): string
    {
        if (is_finite($v) && floor($v) === $v && abs($v) < 1e15) {
            return (string) (int) $v;
        }
        $s = rtrim(rtrim(sprintf('%.10F', $v), '0'), '.');
        return $s === '-0' ? '0' : $s;
    }

    private static function gcd(int $a, int $b): int
    {
        $a = abs($a);
        $b = abs($b);
        while ($b !== 0) {
            [$a, $b] = [$b, $a % $b];
        }
        return $a;
    }
}

/**
 * Statistical distributions needed by the p-value and confidence-interval
 * calculators: normal, Student's t, chi-square and F.
 *
 * Implemented with the standard regularized incomplete gamma / beta continued
 * fractions (Numerical Recipes 6.2, 6.4) — accurate to ~1e-10 in the ranges a
 * calculator user touches, with no external dependency.
 */
final class Stats
{
    public static function erf(float $x): float
    {
        // Abramowitz & Stegun 7.1.26
        $sign = $x < 0 ? -1.0 : 1.0;
        $x = abs($x);
        $t = 1.0 / (1.0 + 0.3275911 * $x);
        $y = 1.0 - (((((1.061405429 * $t - 1.453152027) * $t) + 1.421413741) * $t - 0.284496736) * $t + 0.254829592) * $t * exp(-$x * $x);
        return $sign * $y;
    }

    public static function normalCdf(float $z): float
    {
        return 0.5 * (1.0 + self::erf($z / M_SQRT2));
    }

    public static function erfinv(float $y): float
    {
        if ($y <= -1.0) {
            return -INF;
        }
        if ($y >= 1.0) {
            return INF;
        }
        $a = 0.147;
        $ln = log(1 - $y * $y);
        $t  = 2 / (M_PI * $a) + $ln / 2;
        $x  = ($y >= 0 ? 1 : -1) * sqrt(sqrt($t * $t - $ln / $a) - $t);
        for ($i = 0; $i < 3; $i++) {
            $err = self::erf($x) - $y;
            $x -= $err / (2 / sqrt(M_PI) * exp(-$x * $x));
        }
        return $x;
    }

    /**
     * p-value for a score under the chosen distribution.
     * $alternative: 0 = two-tailed, -1 = left tail, +1 = right tail.
     */
    public static function pValue(float $score, int $alternative, int $df, int $df2, int $test): float
    {
        // A t / chi-square / F test without degrees of freedom is not
        // computable. Return NaN so the solver leaves the field blank rather
        // than showing a confidently wrong p-value.
        if ($test >= 2 && $df <= 0) {
            return NAN;
        }
        if ($test === 4 && $df2 <= 0) {
            return NAN;
        }
        $df  = max(1, $df);
        $df2 = max(1, $df2);
        switch ($test) {
            case 2: // t
                $two  = self::tTwoTailed(max(0.0, abs($score)), $df);
                $right = $score >= 0 ? $two / 2 : 1 - $two / 2;
                return self::tail($two, $right, $alternative);
            case 3: // chi-square: the "upper" tail IS the right tail
                $right = self::chiSquareUpper($score, $df);
                return self::tail(2 * min($right, 1 - $right), $right, $alternative);
            case 4: // F: same, upper tail is the right tail
                $right = self::fUpper($score, $df, $df2);
                return self::tail(2 * min($right, 1 - $right), $right, $alternative);
            case 1:
            default: // z
                $right = 1 - self::normalCdf($score);
                return self::tail(2 * min($right, 1 - $right), $right, $alternative);
        }
    }

    private static function tail(float $twoTailed, float $right, int $alternative): float
    {
        $p = match ($alternative) {
            1  => $right,
            -1 => 1 - $right,
            default => $twoTailed,
        };
        return max(0.0, min(1.0, $p));
    }

    /** P(|T| > t) for Student's t with $df degrees of freedom. */
    public static function tTwoTailed(float $t, int $df): float
    {
        if ($df <= 0) {
            return NAN;
        }
        $x = $df / ($df + $t * $t);
        return self::betaInc($df / 2.0, 0.5, $x);
    }

    /** Upper tail of chi-square: Q(k/2, x/2). */
    public static function chiSquareUpper(float $x, int $k): float
    {
        if ($x <= 0) {
            return 1.0;
        }
        return self::gammaQ($k / 2.0, $x / 2.0);
    }

    /** Upper tail of the F distribution. */
    public static function fUpper(float $x, int $d1, int $d2): float
    {
        if ($x <= 0) {
            return 1.0;
        }
        return self::betaInc($d2 / 2.0, $d1 / 2.0, $d2 / ($d2 + $d1 * $x));
    }

    /* ------------------------------------------------ incomplete gamma */
    public static function gammaQ(float $a, float $x): float
    {
        if ($x < 0 || $a <= 0) {
            return NAN;
        }
        if ($x == 0.0) {
            return 1.0;
        }
        if ($x < $a + 1.0) {
            return 1.0 - self::gammaSeries($a, $x);
        }
        return self::gammaContinuedFraction($a, $x);
    }

    private static function gammaSeries(float $a, float $x): float
    {
        $ap = $a;
        $sum = 1.0 / $a;
        $del = $sum;
        for ($n = 0; $n < 1000; $n++) {
            $ap += 1.0;
            $del *= $x / $ap;
            $sum += $del;
            if (abs($del) < abs($sum) * 1e-15) {
                break;
            }
        }
        return $sum * exp(-$x + $a * log($x) - self::lnGamma($a));
    }

    private static function gammaContinuedFraction(float $a, float $x): float
    {
        $tiny = 1e-300;
        $b = $x + 1.0 - $a;
        $c = 1.0 / $tiny;
        $d = 1.0 / $b;
        $h = $d;
        for ($i = 1; $i <= 1000; $i++) {
            $an = -$i * ($i - $a);
            $b += 2.0;
            $d = $an * $d + $b;
            if (abs($d) < $tiny) {
                $d = $tiny;
            }
            $c = $b + $an / $c;
            if (abs($c) < $tiny) {
                $c = $tiny;
            }
            $d = 1.0 / $d;
            $del = $d * $c;
            $h *= $del;
            if (abs($del - 1.0) < 1e-15) {
                break;
            }
        }
        return exp(-$x + $a * log($x) - self::lnGamma($a)) * $h;
    }

    /* ------------------------------------------------- incomplete beta */
    public static function betaInc(float $a, float $b, float $x): float
    {
        if ($x <= 0) {
            return 0.0;
        }
        if ($x >= 1) {
            return 1.0;
        }
        $bt = exp(self::lnGamma($a + $b) - self::lnGamma($a) - self::lnGamma($b)
            + $a * log($x) + $b * log(1 - $x));
        if ($x < ($a + 1.0) / ($a + $b + 2.0)) {
            return $bt * self::betaContinuedFraction($a, $b, $x) / $a;
        }
        return 1.0 - $bt * self::betaContinuedFraction($b, $a, 1.0 - $x) / $b;
    }

    private static function betaContinuedFraction(float $a, float $b, float $x): float
    {
        $tiny = 1e-300;
        $qab = $a + $b;
        $qap = $a + 1.0;
        $qam = $a - 1.0;
        $c = 1.0;
        $d = 1.0 - $qab * $x / $qap;
        if (abs($d) < $tiny) {
            $d = $tiny;
        }
        $d = 1.0 / $d;
        $h = $d;
        for ($m = 1; $m <= 1000; $m++) {
            $m2 = 2 * $m;
            $aa = $m * ($b - $m) * $x / (($qam + $m2) * ($a + $m2));
            $d = 1.0 + $aa * $d;
            if (abs($d) < $tiny) {
                $d = $tiny;
            }
            $c = 1.0 + $aa / $c;
            if (abs($c) < $tiny) {
                $c = $tiny;
            }
            $d = 1.0 / $d;
            $h *= $d * $c;

            $aa = -($a + $m) * ($qab + $m) * $x / (($a + $m2) * ($qap + $m2));
            $d = 1.0 + $aa * $d;
            if (abs($d) < $tiny) {
                $d = $tiny;
            }
            $c = 1.0 + $aa / $c;
            if (abs($c) < $tiny) {
                $c = $tiny;
            }
            $d = 1.0 / $d;
            $del = $d * $c;
            $h *= $del;
            if (abs($del - 1.0) < 1e-15) {
                break;
            }
        }
        return $h;
    }

    /** Lanczos log-gamma. */
    public static function lnGamma(float $z): float
    {
        $g = [
            676.5203681218851, -1259.1392167224028, 771.32342877765313,
            -176.61502916214059, 12.507343278686905, -0.13857109526572012,
            9.9843695780195716e-6, 1.5056327351493116e-7,
        ];
        if ($z < 0.5) {
            return log(M_PI / sin(M_PI * $z)) - self::lnGamma(1 - $z);
        }
        $z -= 1.0;
        $x = 0.99999999999980993;
        foreach ($g as $i => $gi) {
            $x += $gi / ($z + $i + 1);
        }
        $t = $z + count($g) - 0.5;
        return 0.5 * log(2 * M_PI) + ($z + 0.5) * log($t) - $t + log($x);
    }
}
