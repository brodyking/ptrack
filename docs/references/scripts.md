# Scripts

**Page Modified**: March 16, 2025
\
**Author**: Brody King
\
**Type**: Reference

|**[« Index](/docs/index.md)** |
| --------------------------- | 

## Table of Contents

- [Scripts](#scripts)
  - [Table of Contents](#table-of-contents)
  - [Definition](#definition)
  - [Locations](#locations)
  - [Usage](#usage)
    - [Creating Scripts](#creating-scripts)
    - [Accessing Scripts](#accessing-scripts)
  - [Included Scripts](#included-scripts)

## Definition 

Scripts are very similar to [modules](modules.md), only difference is that they are only used to store backend code, mostly for the [API](api.md).

## Locations
These are the locations of the scripts, script sources, their functions, and more.

| Location | Description |
| -------- | ----------- |
| `/scripts/scripts.json` | Where all scripts are defined |
| `/scripts/scripts.php` | Where all script functions are defined |
| `/scripts/source/` | Where all script source files are kept |

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

**You NEVER leave anything outside of a function, besides variables. All code that is to be run should be put inside of a function**

### Accessing Scripts

Scripts are accessed in various ways. 

| Function | Parameters | Returns |
| -------- | ---------- | ------- |
| `scriptsGet()` | `$name` | The source directory path. |

To use a script, you have to include it. Here is an example:
```php
include scriptsGet("nameofascript");
```

## Included Scripts

| Script Name | Description |
| ----------- | ----------- |
| [changepswd](/scripts/source/changepswd.php) | Change a users password |
| [checktoday](/scripts/source/checktoday.php) | Chhecks if the current day has a value. If not, it creates one with `0` as its value.
| [count](/scripts/source/count.php) | Used for adding, and resetting pouch usage.
| [deleteaccount](/scripts/source/deleteaccount.php) | Sets an account as deleted.
| [error](/scripts/source/error.php) | [Error Handling](error.md).|
| [isloggedin](/scripts/source/isloggedin.php) | Returns true if a ID and username are in $_GET[], and if ID is valid |
| [login](/scripts/source/login.php) | All login code used in API |
| [logout](/scripts/source/logout.php) | Deletes the users `session.json` and redirects to `/` |
| [register](/scripts/source/register.php) | All registration code used in the api |
| [secureid](/scripts/source/secureid.php) | Change a users preference for secureid |