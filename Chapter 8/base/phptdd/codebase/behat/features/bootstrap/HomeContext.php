<?php

use Behat\Mink\Mink;
use Behat\Mink\Session;
use Behat\Mink\Driver\GoutteDriver;
use Behat\MinkExtension\Context\MinkContext;
use Behat\MinkExtension\Context\MinkAwareContext;

class HomeContext extends MinkContext implements MinkAwareContext
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
     * @Given I have access to the home page URL
     */
    public function iHaveAccessToTheHomePageUrl()
    {
        return true;
    }

    /**
     * @When I visit the home page
     */
    public function iVisitTheHomePage()
    {
        // Using the Goutte Headless emulator
        $sessionHeadless = $this->getMink()->getSession('goutte');
        $sessionHeadless->visit("symfony/public");
    }

    /**
     * @Then I should see the Symfony Logo
     */
    public function iShouldSeeTheSymfonyLogo()
    {
        // Headless emulator test:
        $assertHeadless = $this->assertSession('goutte');
        $assertHeadless->elementExists('css', '.logo');
        $assertHeadless->pageTextContains('Welcome To Symfony 6');
    }
}
