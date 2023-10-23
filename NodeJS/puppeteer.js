// puppeteer click functionality
const puppeteer = require('puppeteer');

(async () => {
    const browser = await puppeteer.launch();
    const page = await browser.newPage();
    const element = 'some-selector';
    await page.goto('https://example.com');

    // Wait for the element to appear on the page
    await page.waitForSelector(element);

    // Click the element
    await page.click(element);

    await browser.close();
})();