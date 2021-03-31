require "test_helper"

class TagTest < ActiveSupport::TestCase

  test "attributes" do
    assert_respond_to Tag.new, :name
  end

  test "validations" do
    tag = Tag.create
    errors_keys = tag.errors.attribute_names

    assert_includes errors_keys, :name
  end

  test "should be valid" do
    tag = Tag.new name: 'foo'
    assert_predicate tag, :valid?
  end
  
end
