Feature: Inventory Clerk Registration
  In order to access the inventory system
  As an Inventory Clerk
  I need to be able to create a clerk account

  Scenario: Access Registration Page
    Given I am in the home "/" path
    When I click the "Register" link
    Then I should be redirected to the registration page

  Scenario: Register
    Given I am in the register "/register" path
    When I fill in Email "Email" with "clerk_email@phptdd.bdd"
    And I fill in Password "Password" with "password"
    And I check the "Agree terms" checkbox
    And I click on the "Register" button
    Then I should be able to register a new account