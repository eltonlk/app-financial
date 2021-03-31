require "test_helper"

class BankAccountTest < ActiveSupport::TestCase

  test "attributes" do
    assert_respond_to BankAccount.new, :name
  end

  test "validations" do
    bank_account = BankAccount.create
    errors_keys = bank_account.errors.attribute_names

    assert_includes errors_keys, :name
  end

  test "should be valid" do
    bank_account = BankAccount.new name: 'foo'
    assert_predicate bank_account, :valid?
  end
  
end
