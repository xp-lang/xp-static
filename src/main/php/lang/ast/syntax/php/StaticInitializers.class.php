<?php namespace lang\ast\syntax\php;

use lang\ast\nodes\{Method, Signature};
use lang\ast\syntax\Extension;

class StaticInitializers implements Extension {

  public function setup($language, $emitter) {
    $language->body('{', function($parse, &$body, $meta, $modifiers, $holder) {
      if (['static'] !== $modifiers) {
        $parse->raise('Expected static modifier, have '.($modifiers ? implode(' ', $modifiers) : 'none'), 'static initializer');
      }

      $line= $parse->token->line;
      $parse->forward();
      $statements= $this->statements($parse);
      $parse->expecting('}', 'static initializer');

      // Enclose statements in a __static() function recognized by XP class loading.
      // If there are multiple initializer blocks, merge all of their statements.
      if ($initializer= &$body['__static()']) {
        $initializer->body= array_merge($initializer->body, $statements);
      } else {
        $initializer= new Method($modifiers, '__static', new Signature([], null), $statements, [], null, $line);
        $initializer->holder= $holder;
      }
    });
  }
}