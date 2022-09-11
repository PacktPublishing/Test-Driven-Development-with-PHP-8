<?php

use Behat\Mink\Mink;
use Behat\Mink\Session;
use Behat\Mink\Driver\GoutteDriver;
use Behat\MinkExtension\Context\MinkContext;
use Behat\MinkExtension\Context\MinkAwareContext;

/**
 * Defines application features from the specific context.
 */
class InventoryClerkRegistrationContext extends MinkContext implements MinkAwareContext
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

    /**
     * @Given I am in the home :arg1 path
     */
    public function iAmInTheHomePath($arg1)
    {
        $sessionHeadless = $this->getMink()->getSession('goutte');
        $sessionHeadless->visit($arg1);

        // Make sure the register link exists.
        $assertHeadless = $this->assertSession('goutte');
        $assertHeadless->elementExists('css', '#lnk-register');
    }

    /**
     * @When I click the :arg1 link
     */
    public function iClickTheLink($arg1)
    {
        $sessionHeadless = $this->getMink()->getSession('goutte');
        $homePage = $sessionHeadless->getPage();
        $homePage->clickLink($arg1);
    }

    /**
     * @Then I should be redirected to the registration page
     */
    public function iShouldBeRedirectedToTheRegistrationPage()
    {
        // Make sure we are in the correct page.
        $assertHeadless = $this->assertSession('goutte');

        $assertHeadless->pageTextContains('Register');
        $assertHeadless->elementExists('css', '#registration_form_email');
    }

    /**
     * @Given I am in the register :arg1 path
     */
    public function iAmInTheRegisterPath($arg1)
    {
        $sessionHeadless = $this->getMink()->getSession('goutte');
        $sessionHeadless->visit('symfony/public/register');
    }

    /**
     * @When I fill in Email :arg1 with :arg2
     */
    public function iFillInEmailWith($arg1, $arg2)
    {
        $sessionHeadless = $this->getMink()->getSession('goutte');
        $registrationPage = $sessionHeadless->getPage();
        $registrationPage->fillField($arg1, $arg2);
    }

    /**
     * @When I fill in Password :arg1 with :arg2
     */
    public function iFillInPasswordWith($arg1, $arg2)
    {
        $sessionHeadless = $this->getMink()->getSession('goutte');
        $registrationPage = $sessionHeadless->getPage();
        $registrationPage->fillField($arg1, $arg2);
    }

    /**
     * @When I check the :arg1 checkbox
     */
    public function iCheckTheCheckbox($arg1)
    {
        $sessionHeadless = $this->getMink()->getSession('goutte');
        $registrationPage = $sessionHeadless->getPage();
        $registrationPage->checkField($arg1);
    }

    /**
     * @When I click on the :arg1 button
     */
    public function iClickOnTheButton($arg1)
    {
        $sessionHeadless = $this->getMink()->getSession('goutte');
        $registrationPage = $sessionHeadless->getPage();
        $registrationPage->pressButton($arg1);

        $newPage = $sessionHeadless->getPage();
    }

    /**
     * TODO: Need to improve this later.
     * @Then I should be able to register a new account
     */
    public function iShouldBeAbleToRegisterANewAccount()
    {
        $assertHeadless = $this->assertSession('goutte');
        $assertHeadless->pageTextContains('HomeController');
    }
}
