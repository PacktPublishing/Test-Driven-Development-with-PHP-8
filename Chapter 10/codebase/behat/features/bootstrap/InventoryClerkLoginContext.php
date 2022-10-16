<?php

use Behat\Mink\Mink;
use Behat\Mink\Session;
use Behat\Mink\Driver\GoutteDriver;
use Behat\MinkExtension\Context\MinkContext;
use Behat\MinkExtension\Context\MinkAwareContext;

class InventoryClerkLoginContext extends MinkContext implements MinkAwareContext
{
    public function __construct()
    {
        $mink   = new Mink([
            'goutte'    => new Session(new GoutteDriver()), // Headless browser
        ]);

        $this->setMink($mink);
        $this->getMink()->getSession('goutte')->start();
    }

    /**
     * @Given I am in the login :arg1 path
     */
    public function iAmInTheLoginPath($arg1)
    {
        $sessionHeadless = $this->getMink()->getSession('goutte');
        $sessionHeadless->visit('login');
    }

    /**
     * @When I fill in Email :arg1 with :arg2
     */
    public function iFillInEmailWith($arg1, $arg2)
    {
        $sessionHeadless = $this->getMink()->getSession('goutte');
        $loginPage = $sessionHeadless->getPage();
        $loginPage->fillField($arg1, $arg2);
    }

    /**
     * @When I fill in Password :arg1 with :arg2
     */
    public function iFillInPasswordWith($arg1, $arg2)
    {
        $sessionHeadless = $this->getMink()->getSession('goutte');
        $loginPage = $sessionHeadless->getPage();
        $loginPage->fillField($arg1, $arg2);
    }

    /**
     * @When I click on the :arg1 button
     */
    public function iClickOnTheButton($arg1)
    {
        $sessionHeadless = $this->getMink()->getSession('goutte');
        $loginPage = $sessionHeadless->getPage();
        $loginPage->pressButton($arg1);
    }

    /**
     * @Then I should be able to access the clerk page
     */
    public function iShouldBeAbleToAccessTheClerkPage()
    {
        $assertHeadless = $this->assertSession('goutte');
        $assertHeadless->addressEquals('/clerk');
    }
}