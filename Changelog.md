# Konekt Enum Changelog

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