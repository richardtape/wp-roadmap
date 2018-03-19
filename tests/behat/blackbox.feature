Feature: wp-roadmap smoke test
  As an anonymous user
  I should be able to navigate through website pages after the plugin is active

  Scenario: Open home page and find text
    Given I am on "https://wp-roadmap.local/"
    Then I should see text matching "Hello world!"
    When I follow "Hello world!"
    Then I should see text matching "Hi, this is a comment."
