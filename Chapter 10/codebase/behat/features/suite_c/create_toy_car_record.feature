Feature: Clerk creates new toy car record
  In order to have a collection of toy car model records
  As an Inventory Clerk
  I need to be able to create a single record

  Scenario: Create new record
    Given I am in the inventory system page
    When I submit the form with correct details
    Then I should see the created record