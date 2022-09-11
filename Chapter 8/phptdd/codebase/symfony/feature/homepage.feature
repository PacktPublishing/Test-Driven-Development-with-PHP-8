Feature: Home page
  In order to see if the home page works
  As a visitor
  I need to be able to see the Symfony logo

  Scenario: Visiting the home page
    Given I have the home page URL
    When I try to visit the home page using a web browser
    Then I should see the Symfony logo