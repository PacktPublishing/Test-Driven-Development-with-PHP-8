Feature: Inventory Clerk Login
  In order to access the inventory system
  As a registered user
  I need to be able to login

  Scenario: Access Login Page
    Given I am in the home "/" path
    When I click the "Login" link
    Then I should be redirected to the login page

  Scenario: Login
    Given I am in the login "/login" path
    When I fill in Email "Email" with "clerk_email@phptdd.bdd"
    And I fill in Password "Password" with "password"
    And I click on the "Login" button
    Then I should be able to Login
    And I should be able to access the inventory system page