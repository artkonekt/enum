# Konekt Enum Changelog

## 4.x

### 4.2.0
###### 2024-02-29

- Tested and works with PHP 8.3
- Added the `isAnyOf()`, `isNoneOf()` and `doesNotEqualTo()` comparison methods
- Added the following methods to the `EnumInterface`:
  - `equals()`
  - `doesNotEqualTo()`
  - `isAnyOf()`
  - `isNoneOf()`

### 4.1.0
###### 2023-06-07

- Added the `EnumInterface` (contains most public v4 enum methods); the `Enum` class implements it

### 4.0.2
###### 2023-02-17

- Tested and works with PHP 8.2 

### 4.0.1
###### 2022-03-11

- Improved the details of the error message on unknown value errors

### 4.0.0
###### 2022-03-10

> See the complete [Upgrade Guide](https://konekt.dev/enum/4.x/upgrade) in the Documentation

- Dropped PHP 7.3 and PHP 7.4 support
- BC: Using strict comparison internally everywhere, consequences:
  - types are now type sensitive,
  - "2" != 2
  - null != 0
  - if you can do: `YourEnum::create("2")` then you can't `YourEnum::create(2)`  
- Added the feature to create enums that have a null value but the default is not the null one.
- Changed the internals to utilize streamlined PHP 8 features
- Changed the internal implementation to use argument and return types everywhere
- Changed the git attributes so that the test suite, docs and other helper files aren't exported in the vendor folder

## 3.x

### 3.1.1
###### 2021-09-30

- Fixed magic comparison getter/method in case there were numerical parts in the const name
- Tested and works with PHP 8.1
- Replaced Travis CI with Github Actions

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

## 2.x

### 2.3.0
##### 2019-06-25

- It is possible to set fallback to default for unknown values (Backport from 3.0)
- Tested against early version of PHP 7.4

### 2.2.0
###### 2019-02-14

- The `notEquals()` comparison method has been added.
- Tested with PHP 7.3 (has been working with earlier versions as well)

### 2.1.1
###### 2018-06-09

- Minor fix: triggering the proper `E_USER_WARNING` error on unknown method call.
- Documentation improved: jump to top when changing page
- Broader PHPUnit support, testing with php 7.2 as well on travis

### 2.1.0
###### 2017-10-13 (Friday 🎃)

- Magic [checker properties and methods](docs/compare.md) have been added
- Proper [documentation](https://artkonekt.github.io/enum) has been created (extracted from readme + extended)

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

## 1.x

### 1.2.0
###### 2016-12-14

- Display texts can be fetched dynamically via callback method

### 1.1.0
###### 2016-07-06

- Support for display texts has been added
- **BC:** `__toString()` casting now takes display text instead of const values. However the result is the very same in case no display text is being used, since it falls back to the const value if no display text is specified.
- Changelog started (added all backwards versions beginning from 1.0.0

### 1.0.2
###### 2016-05-31

- Static method bugfix

### 1.0.1
###### 2016-05-30 2

- Readme updates

### 1.0.0
###### 2016-05-30

- Initial release based on konekt/comon v0.1.2, heavily refactored version
