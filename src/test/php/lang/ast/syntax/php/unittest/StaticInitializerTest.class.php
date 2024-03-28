<?php namespace lang\ast\syntax\php\unittest;

use lang\ast\Errors;
use lang\ast\unittest\emit\EmittingTest;
use test\{Assert, Expect, Test};

class StaticInitializerTest extends EmittingTest {

  #[Test]
  public function static_initializer_called() {
    $t= $this->declare('class %T {
      private static $initialized= false;

      static {
        self::$initialized= true;
      }
    }');
    Assert::true($t->property('initialized')->get(null));
  }

  #[Test]
  public function can_have_multiple_blocks() {
    $t= $this->declare('class %T {
      private static $initialized= [];

      static {
        self::$initialized[]= 1;
      }
      static {
        self::$initialized[]= 2;
      }
    }');
    Assert::equals([1, 2], $t->property('initialized')->get(null));
  }

  #[Test, Expect(class: Errors::class, message: '/Expected static modifier, have none in static initializer/')]
  public function block_without_modifier() {
    $this->declare('class %T {
      { }
    }');
  }

  #[Test, Expect(class: Errors::class, message: '/Expected static modifier, have final in static initializer/')]
  public function block_with_incorrect_modifier() {
    $this->declare('class %T {
      final { }
    }');
  }

  #[Test, Expect(class: Errors::class, message: '/Cannot redeclare method __static\(\)/')]
  public function cannot_declare_static_function() {
    $this->declare('class %T {
      static { }
      static function __static() { }
    }');
  }
}