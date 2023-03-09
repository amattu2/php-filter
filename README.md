# Introduction

This is a PHP class which implements static methods to filter/format unsanitized user input. See below for usage examples and cases. Alternatively, take a look at the **index.php** file for further examples.

# Usage

Include the **/src/Filter.php** file

```php
require(dirname(__FILE__) . "/src/Filter.php");
```

**Methods**

```php
Filter::*input*(string $var)
```

Remove unprintable characters, HTML entities, and slashes.

```php
Filter::*nonNumeric*(int|string|double|float $var)
```

Remove non-numeric characters

```php
Filter::*nonAlpha*(mixed $var)
```

Remove non-alpha (a-zA-Z) characters

```php
Filter::*nonAlphaNumeric*(mixed $var)
```

Remove non-alphanumeric (a-zA-Z0-9) characters

```php
Filter::*fileName*(string $var)
```

Replace whitespace characters with a dash (-)

```php
Filter::*number*(int|string $var)
```

Format a 10 digit phone number (XXX-XXX-XXXX)

# Notes

You should always use prepared statements and proper validation on all unsafe input, regardless of using this class or not.
