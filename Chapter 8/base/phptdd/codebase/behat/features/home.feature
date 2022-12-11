Feature: Home page
  In order to welcome visitors
  As a visitor
  I need to be able to see the Symfony logo

  Scenario: See the Symfony logo
    Given I have access to the home page URL
    When I visit the home page
    Then I should see the Symfony Logo