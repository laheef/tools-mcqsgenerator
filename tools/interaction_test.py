"""Interaction tests: search suggestions, collapsible groups, unit switching, URL state."""
import asyncio, sys
from playwright.async_api import async_playwright

BASE = "http://127.0.0.1:8080"
fails = 0


def check(name, ok, detail=""):
    global fails
    print(f"  {'PASS' if ok else 'FAIL'}  {name}{(' — ' + detail) if detail else ''}")
    if not ok:
        fails += 1


async def main():
    async with async_playwright() as p:
        b = await p.chromium.launch()
        pg = await b.new_page(viewport={"width": 1440, "height": 1000})
        errors = []
        pg.on("pageerror", lambda e: errors.append(str(e)))

        # ---- search suggestions from the header
        await pg.goto(BASE + "/", wait_until="networkidle")
        inp = pg.locator("#site-search")
        await inp.click()
        await inp.type("perc", delay=60)
        await pg.wait_for_timeout(700)
        sugg = pg.locator(".search-suggestions a")
        count = await sugg.count()
        check("header search shows suggestions", count > 0, f"{count} items")
        if count:
            tops = [(await sugg.nth(i).inner_text()).split("\n")[0] for i in range(min(3, count))]
            # "perc" also matches PERC (pulmonary embolism rule-out), so a
            # percentage calculator anywhere in the top three is the right bar
            check("suggestion is relevant", any("percent" in t.lower() for t in tops),
                  " | ".join(tops))
            await pg.keyboard.press("ArrowDown")
            await pg.keyboard.press("Enter")
            await pg.wait_for_timeout(600)
            check("keyboard Enter navigates",
                  pg.url.startswith(BASE) and pg.url.count("/") >= 4, pg.url)

        # ---- hero search on the homepage
        await pg.goto(BASE + "/", wait_until="networkidle")
        hero = pg.locator("#hero-search")
        if await hero.count():
            await hero.click()
            await hero.type("mortgage", delay=50)
            await pg.wait_for_timeout(700)
            n = await pg.locator("#search-suggestions-hero a").count()
            check("hero search shows suggestions", n > 0, f"{n} items")

        # ---- collapse / expand a widget group
        await pg.goto(BASE + "/math/percentage", wait_until="networkidle")
        toggle = pg.locator("[data-group-toggle]").first
        expanded_before = await toggle.get_attribute("aria-expanded")
        await toggle.click()
        await pg.wait_for_timeout(250)
        expanded_after = await toggle.get_attribute("aria-expanded")
        hidden = await pg.locator(".calc-group-body").first.is_hidden()
        check("group collapses", expanded_before == "true" and expanded_after == "false" and hidden)
        await toggle.click()
        await pg.wait_for_timeout(200)
        check("group expands again", await pg.locator(".calc-group-body").first.is_visible())

        # ---- unit switching keeps the physical quantity sensible
        await pg.goto(BASE + "/math/circumference", wait_until="networkidle")
        r = pg.locator('input[data-var="r"]').first
        await r.fill("100")
        await r.dispatch_event("input")
        await pg.wait_for_timeout(200)
        cm_value = await pg.locator('input[data-var="circumference"]').first.input_value()
        sel = pg.locator('select[data-unit-select="r"]').first
        await sel.select_option("m")
        await sel.dispatch_event("change")
        await pg.wait_for_timeout(300)
        m_value = await pg.locator('input[data-var="circumference"]').first.input_value()
        # 100 cm and 100 m are different quantities: the result must change
        check("unit switch re-solves", cm_value != m_value, f"cm={cm_value} m={m_value}")
        # circumference is still displayed in cm: 100 m radius -> 62 831.85 cm
        check("100 m radius -> 62 831.85 cm circumference",
              m_value.replace(" ", "").startswith("62831.8"), m_value)

        # ---- URL state is shareable and survives reload
        await pg.goto(BASE + "/math/percentage?p=25&d=200", wait_until="networkidle")
        await pg.locator('input[data-var="d"]').first.fill("400")
        await pg.wait_for_timeout(700)
        url = pg.url
        check("state is written to the URL", "d=400" in url, url.split("?")[-1])
        await pg.reload(wait_until="networkidle")
        reloaded = await pg.locator('input[data-var="n"]').first.input_value()
        check("reload restores the same result", reloaded == "100", reloaded)

        # ---- clearing an input clears derived values
        await pg.locator('input[data-var="d"]').first.fill("")
        await pg.locator('input[data-var="d"]').first.dispatch_event("input")
        await pg.wait_for_timeout(300)
        cleared = await pg.locator('input[data-var="n"]').first.input_value()
        check("clearing an input clears its result", cleared == "", repr(cleared))

        # ---- copy link button
        await pg.goto(BASE + "/math/percentage", wait_until="networkidle")
        btn = pg.locator('[data-share="copy"]')
        if await btn.count():
            await btn.click()
            await pg.wait_for_timeout(300)
            label = await btn.inner_text()
            check("copy-link gives feedback", "copied" in label.lower(), label)

        # ---- results panel -------------------------------------------------
        # The answers are also listed under the Calculate button, one row per
        # computed value, each with a copy button. It has to be empty before the
        # button is pressed, correct after, and follow a later edit.
        await pg.goto(BASE + "/health/bmi", wait_until="networkidle")
        await pg.wait_for_timeout(500)
        check("results panel exists", await pg.locator("[data-calc-results]").count() == 1)
        check("results panel is hidden before Calculate",
              not await pg.is_visible("[data-calc-results]"))
        # panel-only fields exist even before a value does
        check("no result field has a box in the form",
              await pg.locator('.calc-field-home[data-home="bmi"] .calc-field').count() == 0
              and await pg.locator('.calc-field[data-output]').count() >= 2,
              f"{await pg.locator('.calc-field[data-output]').count()} panel-only fields")
        check("no solved value is shown as a field before Calculate",
              await pg.locator('.calc-widget .calc-input-wrap.is-computed').count() == 0,
              f"{await pg.locator('.calc-widget .calc-input-wrap.is-computed').count()} computed boxes")

        await pg.locator('input[data-var="height"]').first.fill("180")
        await pg.locator('input[data-var="mass"]').first.fill("80")
        await pg.click("[data-calc-go]")
        await pg.wait_for_timeout(500)
        check("Calculate reveals the panel", await pg.is_visible("[data-calc-results]"))
        rows = await pg.locator(".calc-result:not([hidden])").all_inner_texts()
        labels = [r.split("\n")[0].strip() for r in rows]
        check("Calculate reveals result rows", len(rows) == 2, " | ".join(labels))
        check("BMI is a result row", "BMI" in labels, " | ".join(labels))
        values = await pg.evaluate(
            "() => [...document.querySelectorAll('.calc-result .calc-input')].map(e => e.value)")
        check("result rows carry the solved values", values[:1] == ["24.7"], str(values))
        check("a result is not also shown in the form",
              await pg.locator('.calc-widget .calc-field[data-var="bmi"]:not(.calc-result *)').count() == 0)

        # the button has no decorative icon any more
        check("the Calculate button has no icon", await pg.locator(".calc-go-icon").count() == 0)

        # editing a form field must not repaint a visible result
        await pg.locator('input[data-var="mass"]').first.fill("100")
        await pg.wait_for_timeout(400)
        check("editing a value takes the results off screen",
              not await pg.is_visible("[data-calc-results]"),
              await pg.get_attribute("[data-calculator]", "data-results") or "")
        check("the hint says what to do about it",
              "press calculate" in (await pg.inner_text("[data-calc-hint-text]")).lower(),
              (await pg.inner_text("[data-calc-hint-text]")).strip())
        # From a stale panel the button computes with the edited value.
        await pg.click("[data-calc-go]")
        await pg.wait_for_timeout(500)
        updated = await pg.evaluate(
            "() => [...document.querySelectorAll('.calc-result .calc-input')].map(e => e.value)")
        check("Calculate updates with the edited value", updated[:1] != ["24.7"], str(updated))

        # ---- "Calculate again" puts the widget back to a first visit ---------
        await pg.click("[data-calc-go]")
        await pg.wait_for_timeout(600)
        state_after = await pg.get_attribute("[data-calculator]", "data-results")
        form_vals = await pg.evaluate(
            "() => [...document.querySelectorAll('.calc-field:not([data-output]) input.calc-input')]"
            ".map(e => e.value)")
        result_vals = await pg.evaluate(
            "() => [...document.querySelectorAll('.calc-result .calc-input')].map(e => e.value)")
        check("Calculate again hides the results", state_after == "pending", str(state_after))
        check("Calculate again empties every input",
              all(v == "" for v in form_vals), str(form_vals))
        check("Calculate again empties the result rows",
              all(v == "" for v in result_vals), str(result_vals))
        check("the button goes back to Calculate",
              (await pg.inner_text("[data-calc-go-label]")).strip() == "Calculate",
              (await pg.inner_text("[data-calc-go-label]")).strip())
        check("the URL loses its values", "?" not in pg.url, pg.url)

        # and it calculates cleanly from there
        await pg.fill('input[data-var="height"]', "170")
        await pg.fill('input[data-var="mass"]', "70")
        await pg.click("[data-calc-go]")
        await pg.wait_for_timeout(500)
        fresh = await pg.evaluate(
            "() => [...document.querySelectorAll('.calc-result .calc-input')].map(e => e.value)")
        check("a calculation after the reset works", fresh[:1] == ["24.2"], str(fresh))

        # a copy button reports back
        await pg.locator(".calc-result .calc-copy").first.click()
        await pg.wait_for_timeout(250)
        note = await pg.locator(".calc-result .calc-copy-note").first.inner_text()
        status = await pg.locator("[data-copy-status]").inner_text()
        check("copy button gives feedback", note.strip().lower() == "copied", note)
        check("copy button announces what was copied", "copied" in status.lower(), status)

        # Copy all
        await pg.click("[data-copy-all]")
        await pg.wait_for_timeout(250)
        all_label = (await pg.locator("[data-copy-all]").inner_text()).strip()
        check("Copy all gives feedback", all_label.lower().startswith("copied"), all_label)

        # Enter in a field is the same as pressing the button
        await pg.goto(BASE + "/math/percentage", wait_until="networkidle")
        await pg.locator('input[data-var="p"]').first.fill("25")
        await pg.locator('input[data-var="d"]').first.fill("200")
        await pg.locator('input[data-var="d"]').first.press("Enter")
        await pg.wait_for_timeout(500)
        shown = await pg.get_attribute("[data-calculator]", "data-results")
        check("Enter reveals the results too", shown == "shown", str(shown))
        check("and a result row is there", await pg.locator(".calc-result:not([hidden])").count() >= 1,
              f"{await pg.locator('.calc-result:not([hidden])').count()} visible rows")

        check("no uncaught JS errors", not errors, str(errors[:2]))
        await b.close()

    print(f"\n{'ALL INTERACTION TESTS PASSED' if fails == 0 else str(fails) + ' FAILURE(S)'}")
    return 0 if fails == 0 else 1


sys.exit(asyncio.run(main()))
