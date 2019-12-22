# Introduction
This is a PHP class which implements static methods to filter/format unsanitized user input. See below for usage examples and cases. Alternatively, take a look at the **index.php** file for further examples.

# Usage
Include the **/classes/filter.class.php** file
```
require(dirname(__FILE__) . "/classes/filter.class.php");
```

**Methods**
```
Filter::*input*(string $var)
```
Remove unprintable characters, HTML entities, and slashes.

```
Filter::*nonNumeric*(int|string|double|float $var)
```
Remove non-numeric characters


```
Filter::*nonAlpha*(mixed $var)
```
Remove non-alpha (a-zA-Z) characters

```
Filter::*nonAlphaNumeric*(mixed $var)
```
Remove non-alphanumeric (a-zA-Z0-9) characters

```
Filter::*fileName*(string $var)
```
Replace whitespace characters with a dash (-)

```
Filter::*number*(int|string $var)
```
Format a 10 digit phone number (XXX-XXX-XXXX)

# Previews
N/A

# Notes
You should always use prepared statements and proper validation on all unsafe input, regardless of using this class or not.

# Requirements & Dependencies
N/A
