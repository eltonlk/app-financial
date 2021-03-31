require "test_helper"

class UserTest < ActiveSupport::TestCase

  test "attributes" do
    assert_respond_to User.new, :username
    assert_respond_to User.new, :password
  end

  test "validations" do
    user = User.create
    errors_keys = user.errors.attribute_names

    assert_includes errors_keys, :username
    assert_includes errors_keys, :password
  end

  test "should be valid" do
    user = User.new username: 'foo', password: '123456789'
    assert_predicate user, :valid?
  end

end
