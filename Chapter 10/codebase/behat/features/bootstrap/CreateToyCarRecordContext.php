<?php

use Behat\Mink\Mink;
use Behat\Mink\Session;
use Behat\Mink\Driver\GoutteDriver;
use Behat\MinkExtension\Context\MinkContext;
use Behat\MinkExtension\Context\MinkAwareContext;

/**
 * Defines application features from the specific context.
 */
class CreateToyCarRecordContext extends MinkContext implements MinkAwareContext
{
    /**
     * Initializes context.
     *
     * Every scenario gets its own context instance.
     * You can also pass arbitrary arguments to the
     * context constructor through behat.yml.
     */
    public function __construct()
    {
        $mink = new Mink([
            'goutte'    => new Session(new GoutteDriver()), // Headless browser
        ]);

        $this->setMink($mink);
        $this->getMink()->getSession('goutte')->start();
    }

    private function login()
    {
        $email      = 'clerk_email@phptdd.bdd';
        $password   = 'password';

        $sessionHeadless = $this->getMink()->getSession('goutte');
        $sessionHeadless->visit('login');
        $loginPage = $sessionHeadless->getPage();
        $loginPage->fillField('Email', $email);
        $loginPage->fillField('Password', $password);
        $loginPage->pressButton('login');
    }

    /**
     * @Given I am in the inventory system page
     */
    public function iAmInTheInventorySystemPage()
    {
        $this->login();
        $assertHeadless = $this->assertSession('goutte');
        $assertHeadless->addressEquals('/clerk');
    }

    /**
     * @When I submit the form with correct details
     */
    public function iSubmitTheFormWithCorrectDetails()
    {
        $carName            = 'FW26';
        $sessionHeadless    = $this->getMink()->getSession('goutte');
        $loginPage          = $sessionHeadless->getPage();

        $loginPage->fillField('Name', $carName);
        $loginPage->fillField('Year', 2004);
        $loginPage->selectFieldOption('Color', 'White');
        $loginPage->selectFieldOption('Manufacturer', 'Williams');
        $loginPage->pressButton('Add Toy Car');
    }

    /**
     * @Then I should see the created record
     */
    public function iShouldSeeTheCreatedRecord()
    {
        $assertHeadless = $this->assertSession('goutte');
        $assertHeadless->addressEquals('/table');
        $assertHeadless->pageTextContains('FW26');
    }
}