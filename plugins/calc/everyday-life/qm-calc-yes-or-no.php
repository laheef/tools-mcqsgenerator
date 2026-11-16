<?php

/**
 * Yes or no generator
 * /everyday-life/yes-or-no
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Yes or no generator',
    'allowEmptyCalculate' => true,
    'meta' => ['title' => 'Yes or No Generator Calculator — Random Answer Tool', 'description' => 'Ask a yes-or-no question and get a random answer with this free generator. Press Calculate for a fresh draw; no question or personal details are entered.', 'h1' => 'Yes or No Generator', 'updated' => '2026-10-23'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'type' => 'note',
                            'cases' => [
                                ['when' => 'result == 1', 'text' => '<strong>The answer is Yes.</strong>'],
                                ['when' => 'result == 0', 'text' => '<strong>The answer is No.</strong>'],
                            ],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        ['type' => 'note', 'text' => 'Press Calculate to generate a new random Yes or No answer.'],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'result',
                            'label' => 'Answer code (1 = Yes, 0 = No)',
                            'type' => 'result',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'result = random Yes-or-No result',
            'results' => ['result' => 'generatorResult(1)'],
        ],
    ],
    'js' => '"use strict";omni.define("generatorResult",function(){var generator_result=Math.round(Math.random());return generator_result});//# sourceURL=customJs.js',
    'article' => [
        'intro' => 'The Yes or No generator returns a random <strong>Yes</strong> or <strong>No</strong> each time you press Calculate.',
        'sections' => [
            ['title' => 'How does the Yes or No generator work?', 'html' => <<<'TXT'
            <p>Think of a yes-or-no question, then press <strong>Calculate</strong>. The generator chooses one of two equally likely outcomes and shows the answer in words. No account, personal details, or numerical inputs are needed. Use Calculate again whenever you want a fresh draw.</p>
            <p>The underlying rule is a fair binary random choice: the tool generates either 0 or 1, then maps those values to No or Yes. It does not read your question or infer which answer is better; the question is for you to consider, not something the page collects.</p>
            TXT],
            ['title' => 'What does the result mean?', 'html' => <<<'TXT'
            <p><strong>Yes</strong> and <strong>No</strong> are two equally likely outcomes of a random draw. A result is not advice, evidence, a prediction, or a recommendation. The tool cannot know the details of a decision and does not weigh consequences or preferences.</p>
            <p>For a consequential choice, treat the result as a prompt to notice your reaction: relief may point toward one preference, disappointment toward another. Then check that feeling against relevant facts, risks, and the people affected. The random output itself provides no information about which option is safer or more suitable.</p>
            TXT],
            ['title' => 'When is a random yes-or-no answer useful?', 'html' => <<<'TXT'
            <p>A random answer can be useful for low-stakes choices where both options are acceptable, such as choosing which film to watch from a shortlist or deciding which harmless task to do first. It can also make a useful conversation starter: once the answer appears, notice whether you hoped for the opposite.</p>
            <p>That reaction is only a clue about your own preference, not proof that one option is right. If you are deciding about health, safety, money, work, relationships, or another important matter, do not hand the decision to chance. Gather the information you need and seek qualified advice where appropriate.</p>
            TXT],
            ['title' => 'How random is the generator, and what are its limits?', 'html' => <<<'TXT'
            <p>The page uses the browser's standard pseudorandom number generator to make a binary draw. In the tool's simple rule, a generated value below one half maps to No and a value at or above one half maps to Yes. Each calculation makes a fresh draw; earlier answers do not make the other answer “due.”</p>
            <p>Like other software random-number functions, this is suitable for a casual decision aid, not for security, gambling, a scientific experiment, or a legally binding lottery. It does not guarantee a particular sequence, and it cannot make a biased real-world process fair. If a decision needs auditable randomness, use a purpose-built process with documented controls.</p>
            TXT],
            ['title' => 'How should you use the answer responsibly?', 'html' => <<<'TXT'
            <p>First, phrase a clear question with exactly two options. Check that neither option is unsafe or unacceptable; a coin-flip-style tool assumes both outcomes are possible and gives each the same chance. Then press Calculate and read the word shown in the answer area.</p>
            <p>For a low-impact choice, you can accept the draw or use it to learn which option you were hoping to get. For a high-impact choice, pause instead: list the likely benefits and harms, identify what information is missing, and consider who else is affected. The generator has no context about those factors.</p>
            TXT],
            ['title' => 'Frequently asked questions', 'html' => <<<'TXT'
            <p><strong>Does the tool store my question?</strong> No question field is provided; the page only produces the random answer in your browser.</p>
            <p><strong>Can I generate another answer?</strong> Yes. Press Calculate for a new draw. A repeated result is possible because each draw has two outcomes.</p>
            <p><strong>Does Yes mean I should do it?</strong> No. It is random, not advice. Use independent judgment and reliable information, especially for important decisions.</p>
            TXT],
            ['title' => 'Which calculators go with this one?', 'html' => <<<'TXT'
            <p>If this one is part of a bigger problem, these everyday life calculators cover the neighbouring steps: <a href="/everyday-life/lumens-to-watts">Lumens to watts</a>, <a href="/everyday-life/lunar-age">Lunar age</a> and <a href="/everyday-life/meeting-cost">Meeting cost</a>.</p>
            TXT],
            ['title' => 'What a random yes-or-no result can and cannot tell you', 'html' => <<<'TXT'
            <p>The generator returns one of two words—yes or no—when you press Calculate. It is useful for a game, a writing prompt or a light way to break a tie when the consequences are small. It does not inspect the question, gather evidence, understand your circumstances or predict what will happen. The result is a random output from the tool, not advice or a sign that one choice is objectively correct.</p>
            <p>Before using it, decide whether the question is genuinely low-stakes. It can be fun for choosing a movie, picking a practice prompt or adding chance to a party game. Do not use a random word to make decisions about health, safety, money, legal matters, relationships, employment or another person’s consent. Those decisions need information, judgment and, where appropriate, qualified support.</p>
            <p>Pressing Calculate again produces another draw. Repeating the process until the output matches what you wanted does not reveal a hidden answer; it simply gives you more chances to see either word. If you keep rerolling, notice whether you are hoping strongly for one outcome. That reaction may tell you more about your preference than the generator does.</p>
            <p>The tool provides no explanation for its result and does not claim to be a cryptographic random-number generator. Do not use it for lotteries, security, sampling research or any setting where fairness, auditability or unpredictability must be guaranteed. A casual interface is not a substitute for an approved randomization method.</p>
            <p>For a group game, agree on the question and rules before the draw so that nobody changes the meaning after seeing the word. If participants disagree about the result, treat it as a prompt for conversation rather than an authority. Everyone involved should be comfortable with the stakes and free to decline.</p>
            <p>A yes-or-no question can also hide several choices. If the real decision is between multiple options, a two-word generator does not compare their trade-offs. List the options, identify what matters and choose a method that fits the decision. The generator can help start a conversation, but it cannot substitute for weighing evidence.</p>
            <p>Use the result lightly, and keep responsibility for important decisions with the people affected. The calculator’s output is a momentary random choice; it is not a guarantee, recommendation or statement about the future.</p>
            TXT],
            ['title' => 'A better way to use a random choice', 'html' => <<<'TXT'
            <p>One sensible use is to generate a prompt rather than a final decision. If you cannot choose between two low-stakes options, let the result reveal your first reaction: a “yes” might make you feel relieved, disappointed or indifferent. That reaction can help you notice a preference, but the result itself has no knowledge of the options. You remain free to ignore it and choose differently.</p><p>For a party or classroom activity, agree on the question and the rules in advance. Decide whether one draw is final, whether a participant can pass and how ties or rerolls are handled. This avoids changing the rules after seeing an answer. For multiple options, the yes-or-no tool is not an evenly distributed choice among all alternatives; use a method designed for the number of choices if fairness matters.</p><p>Do not interpret repeated results as evidence that the generator is communicating or that the universe has selected an outcome. Each displayed word is simply an output of the page’s random mechanism. The calculator does not measure probabilities from real-world evidence, and a single result does not make an event more likely to happen.</p><p>For important choices, write down the options, consequences, constraints and information you still need. Ask whether there is a deadline, a reversible first step or someone qualified to consult. A random answer can be entertaining after the decision has been narrowed, but it cannot replace a risk assessment or informed consent.</p><p>The generator is also not an audited randomization service. Its interface does not prove that the result is uniformly distributed, secure or resistant to manipulation. Avoid using it to select a contest winner, assign money, make research samples or choose a security value. Use a transparent, agreed method appropriate to the stakes.</p><p>If a yes-or-no prompt involves another person, their autonomy matters. The generator cannot consent on someone’s behalf or settle a disagreement. Discuss the choice respectfully and make sure everyone affected can make their own decision.</p>
            TXT],
            ['title' => 'When a random answer is not an appropriate method', 'html' => <<<'TXT'
            <p>A random draw is not fair simply because it produces a quick answer. For a classroom assignment, contest winner or resource allocation, participants need an agreed and transparent method. The generator does not show an audit log, seed or proof that each output had equal probability, so it should not be used where people need to trust the process. Choose a method that can be explained and checked.</p><p>For choices with serious or irreversible consequences, slow down and gather relevant information. A medical choice should be discussed with a clinician; a legal or financial decision may require qualified advice. If another person is affected, talk with them rather than asking a random tool to decide for them.</p><p>For low-stakes personal choices, the value of the tool is often in noticing your response. If “no” feels disappointing, that can be a clue about what you wanted. Use that insight to make a decision you can explain, instead of treating the generated word as an instruction.</p><p>Keep the game light, explain the rule before the draw and allow anyone involved to pass. The generator does not know the context or the people, so responsibility remains with the user.</p>
            TXT],
            ['title' => 'Treat the output as a prompt, not a verdict', 'html' => <<<'TXT'
            <p>If you draw an answer and immediately want to rerun it, pause before pressing Calculate again. That reaction may show that you already have a preference or need more information. The result itself has no context and should never be treated as a prediction.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What do I need to enter?', 'a' => 'Nothing. Think of a yes-or-no question privately and press Calculate to get a random answer.'],
            ['q' => 'Can I generate another answer?', 'a' => 'Yes. Press Calculate again for a fresh random draw; the same answer can occur more than once.'],
            ['q' => 'Should I use this for an important decision?', 'a' => 'No. The result is random and is not advice or a prediction. Use evidence and appropriate professional guidance for consequential choices.'],
        ],
        'related' => [
            ['path' => '/everyday-life/lumens-to-watts', 'name' => 'Lumens to watts'],
            ['path' => '/everyday-life/lunar-age', 'name' => 'Lunar age'],
            ['path' => '/everyday-life/meeting-cost', 'name' => 'Meeting cost'],
        ],
    ],
];
