/*
 * Runs one calculator script from a file and prints what it exported.
 *
 *   node js_harness.js <file.js> '<json inputs>'
 *
 * The page's script calls omni.onResult(deps, fn); the stub below records that
 * callback, hands it a context with the inputs, and prints every export as
 * JSON. Nothing about the page's own logic is simulated: the script under test
 * is evaluated as it is.
 */
"use strict";
const fs = require("fs");

const file = process.argv[2];
const inputs = JSON.parse(process.argv[3] || "{}");
const code = fs.readFileSync(file, "utf8");

let registered = null;
global.omni = {
  onResult(deps, fn) { registered = fn; },
  define() {},
  number(v) { return Number(v); },
};

const ctx = {
  out: {},
  getRawInput(name) { return String(inputs[name] === undefined ? "" : inputs[name]); },
  input(name) { return Number(inputs[name]); },
  exportValue(name, value) { this.out[name] = value; },
};

try {
  // eslint-disable-next-line no-eval
  eval(code);
  if (typeof registered !== "function") throw new Error("script registered no callback");
  registered(ctx);
  process.stdout.write(JSON.stringify({ ok: true, out: ctx.out }) + "\n");
} catch (err) {
  process.stdout.write(JSON.stringify({ ok: false, error: String(err && err.message || err) }) + "\n");
}
