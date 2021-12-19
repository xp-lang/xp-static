<?php namespace lang\ast\syntax\php\unittest;

use lang\ast\Errors;
use lang\ast\unittest\emit\EmittingTest;
use unittest\{Assert, Expect, Test};

class StaticInitializerTest extends EmittingTest {

  #[Test]
  public function static_initializer_called() {
    $t= $this->type('class <T> {
      public static $initialized= false;

      static {
        self::$initialized= true;
      }
    }');
    Assert::true($t->getField('initialized')->get(null));
  }

  #[Test, Expect(class: Errors::class, withMessage: 'Expected static modifier, have none in static initializer')]
  public function block_without_modifier() {
    $this->type('class <T> {
      { }
    }');
  }

  #[Test, Expect(class: Errors::class, withMessage: 'Expected static modifier, have final in static initializer')]
  public function block_with_incorrect_modifier() {
    $this->type('class <T> {
      final { }
    }');
  }

  #[Test, Expect(class: Errors::class, withMessage: 'Cannot redeclare method __static()')]
  public function cannot_declare_static_function() {
    $this->type('class <T> {
      static { }
      static function __static() { }
    }');
  }
}