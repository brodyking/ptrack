# Scripts

**Page Modified**: April 26, 2025
\
**Author**: Brody King
\
**Type**: Reference

| **[« Index](/docs/index.md)** |
| ----------------------------- |

## Table of Contents

- [Scripts](#scripts)
  - [Table of Contents](#table-of-contents)
  - [Definition](#definition)
  - [Locations](#locations)
  - [Usage](#usage)
    - [Creating Scripts](#creating-scripts)
    - [Accessing Scripts](#accessing-scripts)

## Definition

Scripts are very similar to [modules](modules.md), only difference is that they are only used to store backend code, mostly for the [API](api.md).

## Locations

These are the locations of the scripts, script sources, their functions, and more.

| Location                | Description                            |
| ----------------------- | -------------------------------------- |
| `/scripts/scripts.json` | Where all scripts are defined          |
| `/scripts/scripts.php`  | Where all script functions are defined |
| `/scripts/source/`      | Where all script source files are kept |

## Usage

This section is a tutorial on how to create and use scripts.

### Creating Scripts

All scripts are defined in `scripts/scripts.json`, and all source code for each scripts is stored in `scripts/source/`. Here is an example script:

```json
"example": {
    "name": "example",
    "description": "what the script does",
    "version": 1.0,
    "author" : "your name",
    "source": "modules/source/NAMEOFSCRIPT.php"
}
```

If you havent noticed, this is the exact same syntax as a module.

You will create a file for your script in the source directory, and specify its path in the json file.

> [!WARNING]
> Never leave anything outside of a function, besides variables. All code that is to be run should be put inside of a function

### Accessing Scripts

Scripts are accessed in various ways.

| Function       | Parameters | Returns                    |
| -------------- | ---------- | -------------------------- |
| `scriptsGet()` | `$name`    | The source directory path. |

To use a script, you have to include it. Here is an example:

```php
include scriptsGet("nameofascript");
```
