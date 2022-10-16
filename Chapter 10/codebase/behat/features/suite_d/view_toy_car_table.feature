Feature: User views toy car records
  In order to view stored toy car records
  Users should be able to
  View the toy car record data table

  Scenario: View the toy car table
    Given I am in the toy car table page
    When The page loads
    Then I should see the toy car table