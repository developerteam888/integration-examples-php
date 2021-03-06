<?php

class AuthorizationCest
{
    public function authorizeAlertIsDisplayed(AcceptanceTester $I)
    {
        $I->amOnPage('/');
        $I->seeElement('.alert-error');
        $I->click('.navigation-link');

        $I->waitForElement('#loginBtn');

        $I->fillField('#username', $_ENV['HUBSPOT_LOGIN']);
        $I->fillField('#password', $_ENV['HUBSPOT_PASSWORD']);
        $I->click('#loginBtn');

        $element = 'td>a[href*="'.$_ENV['HUBSPOT_PORTAL_ID'].'"]';
        $I->waitForElement($element);
        $I->click($element);

        $I->waitForElement('#contacts-list');
    }
}
