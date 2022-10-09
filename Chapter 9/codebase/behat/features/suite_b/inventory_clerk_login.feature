Feature: Inventory Clerk Login
  In order to access the inventory system
  As a registered user
  I need to be able to login

  Scenario: Login
    Given I am in the login "/login" path
    When I fill in Email "Email" with "clerk_email@phptdd.bdd"
    And I fill in Password "Password" with "password"
    And I click on the "login" button
    Then I should be able to access the clerk page