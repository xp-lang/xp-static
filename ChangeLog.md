XP static initializer blocks - ChangeLog
========================================

## ?.?.? / ????-??-??

## 2.0.0 / 2024-03-24

* Dropped support for PHP 7.0 - 7.3 - @thekid
* Dropped support for XP <= 9, see xp-framework/rfc#341 - @thekid
* Made compatible with XP 12, Compiler version 9.0.0 - @thekid
* Added PHP 8.4 to the test matrix - @thekid

## 1.0.0 / 2023-05-27

* Removed holder property, see xp-framework/ast#47 - @thekid

## 0.3.0 / 2022-01-24

* Made compatible with compiler version 8.0.0, and dropped support
  for versions older than 7.0.0.
  (@thekid)

## 0.2.0 / 2021-12-20

* Allowed multiple static initializer blocks, just like NodeJS does, see
  https://v8.dev/features/class-static-initializer-blocks#multiple-blocks
  (@thekid)

## 0.1.0 / 2021-12-19

* Hello World! First release - @thekid