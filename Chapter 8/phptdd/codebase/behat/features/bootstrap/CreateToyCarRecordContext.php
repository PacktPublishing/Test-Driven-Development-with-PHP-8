<?php

use Behat\Behat\Tester\Exception\PendingException;
use Behat\Behat\Context\Context;
use Behat\Gherkin\Node\PyStringNode;
use Behat\Gherkin\Node\TableNode;

/**
 * Defines application features from the specific context.
 */
class CreateToyCarRecordContext implements Context
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
    }

    /**
     * @Given I am in the inventory system page
     */
    public function iAmInTheInventorySystemPage()
    {
        throw new Exception();
    }

    /**
     * @When I submit the form with correct details
     */
    public function iSubmitTheFormWithCorrectDetails()
    {
        throw new PendingException();
    }

    /**
     * @Then I should see a success message
     */
    public function iShouldSeeASuccessMessage()
    {
        throw new PendingException();
    }
}
