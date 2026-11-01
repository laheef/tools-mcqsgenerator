#!/bin/bash
# browser_up.sh — put Playwright's Chromium back after a sandbox reset.
#
# The workspace survives between sessions, the machine does not: the browser
# binary and the shared libraries Chromium needs both disappear. Run this once
# after tools/bootstrap_env.sh, then the browser suites work again.
set -e
if [ ! -x "$(ls -d /home/user/.cache/ms-playwright/chromium*_headless_shell-*/chrome-headless-shell-linux64/chrome-headless-shell 2>/dev/null | head -1)" ]; then
  python3 -m playwright install chromium
fi
# Chromium's system libraries; apt is quiet about installing them twice
sudo -n apt-get install -y -qq libnss3 libnspr4 libasound2t64 libatk1.0-0 libatk-bridge2.0-0 \
  libcups2 libdrm2 libxkbcommon0 libxcomposite1 libxdamage1 libxfixes3 libxrandr2 libgbm1 \
  libpango-1.0-0 libcairo2 libatspi2.0-0 libx11-xcb1 >/dev/null 2>&1 || \
sudo -n apt-get install -y -qq libnss3 libnspr4 libasound2 libatk1.0-0 libatk-bridge2.0-0 \
  libcups2 libdrm2 libxkbcommon0 libxcomposite1 libxdamage1 libxfixes3 libxrandr2 libgbm1 \
  libpango-1.0-0 libcairo2 libatspi2.0-0 libx11-xcb1 >/dev/null 2>&1
echo "browser ready"
