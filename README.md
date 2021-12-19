XP static initializer blocks
============================

[![Build status on GitHub](https://github.com/xp-lang/xp-static/workflows/Tests/badge.svg)](https://github.com/xp-lang/xp-static/actions)
[![XP Framework Module](https://raw.githubusercontent.com/xp-framework/web/master/static/xp-framework-badge.png)](https://github.com/xp-framework/core)
[![BSD Licence](https://raw.githubusercontent.com/xp-framework/web/master/static/licence-bsd.png)](https://github.com/xp-framework/core/blob/master/LICENCE.md)
[![Requires PHP 7.0+](https://raw.githubusercontent.com/xp-framework/web/master/static/php-7_0plus.svg)](http://php.net/)
[![Supports PHP 8.0+](https://raw.githubusercontent.com/xp-framework/web/master/static/php-8_0plus.svg)](http://php.net/)
[![Latest Stable Version](https://poser.pugx.org/xp-lang/xp-static/version.png)](https://packagist.org/packages/xp-lang/xp-static)

Plugin for the [XP Compiler](https://github.com/xp-framework/compiler/) which adds a static initializer syntax. This is compiled to `__static()` functions recognized by the XP class loading mechanism.

Example
-------

```php
namespace com\example\brotli;

class Streams {
  static {
    stream_wrapper_register('brotli', self::class);
  }

  // ...
}
```

Installation
------------
After installing the XP Compiler into your project, also include this plugin.

```bash
$ composer require xp-framework/compiler
# ...

$ composer require xp-lang/xp-static
# ...
```

No further action is required.

See also
--------
* [PHP RFC: Static Class Constructor](https://wiki.php.net/rfc/static_class_constructor)
* [Class static initialization block @ PHP Internals](https://externals.io/message/116031)