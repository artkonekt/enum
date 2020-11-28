# Konekt Enum Changelog

## 3.x

### 3.1.0
###### 2020-11-28

- Dropped PHP 7.1 and 7.2 support
- Added PHP 8 support
- Adopted PSR-12 Coding style (internally)

### 3.0.0
###### 2019-06-24

- The `__default` const has been renamed to `__DEFAULT` for full PSR-1 compliance.
- It is possible to set fallback to default for unknown values.
- Rest of features are equivalent to v2.2.0.
- PHP 7.0 support has been dropped.
- Early PHP 7.4 support (as-is - since it hasn't been released yet).

## 2.3

### 2.3.0
##### 2019-06-25

- It is possible to set fallback to default for unknown values (Backport from 3.0)
- Tested against early version of PHP 7.4

## 2.2

### 2.2.0
###### 2019-02-14

- The `notEquals()` comparison method has been added.
- Tested with PHP 7.3 (has been working with earlier versions as well)

## 2.1

### 2.1.1
###### 2018-06-09

- Minor fix: triggering the proper `E_USER_WARNING` error on unknown method call.
- Documentation improved: jump to top when changing page
- Broader PHPUnit support, testing with php 7.2 as well on travis

### 2.1.0
###### 2017-10-13 (Friday 🎃)

- Magic [checker properties and methods](docs/compare.md) have been added
- Proper [documentation](https://artkonekt.github.io/enum) has been created (extracted from readme + extended)

## 2.0

### 2.0.2
###### 2017-09-26

- `defaultValue()` static method has been added

### 2.0.1
###### 2017-09-14

- `reset()` method has been added


### 2.0.0
###### 2017-09-13

- Rewritten from scratch
- API has [changed](UPGRADE-2.0.md#renamed-methods) completely, with clarity as primary scope
- Minimum PHP version is 7.0
- Strict mode removed
- `equals()` does type check
- For more details refer to [UPGRADE-2.0.md](UPGRADE-2.0.md)

###### 2017-09-06

Development of v2 has been started.

## 1.2

### 1.2.0
###### 2016-12-14

- Display texts can be fetched dynamically via callback method

## 1.1

### 1.1.0
###### 2016-07-06

- Support for display texts has been added
- **BC:** `__toString()` casting now takes display text instead of const values. However the result is the very same in case no display text is being used, since it falls back to the const value if no display text is specified.
- Changelog started (added all backwards versions beginning from 1.0.0

## 1.0

### 1.0.2
###### 2016-05-31

- Static method bugfix

### 1.0.1
###### 2016-05-30 2

- Readme updates

### 1.0.0
###### 2016-05-30

- Initial release based on konekt/comon v0.1.2, heavily refactored version
