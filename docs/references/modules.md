# Modules

**Page Modified**: April 21, 2025
\
**Author**: Brody King
\
**Type**: Reference

| **[« Index](/docs/index.md)** |
| ----------------------------- |

## Table of Contents

- [Modules](#modules)
  - [Table of Contents](#table-of-contents)
  - [Definition](#definition)
  - [Locations](#locations)
  - [Usage](#usage)
    - [Creating Modules](#creating-modules)
    - [Accessing Modules](#accessing-modules)
  - [Included Modules](#included-modules)

## Definition

Modules are parts of the page that are loaded in from sperate files. This creates more organization and easier updates.

## Locations

These are the locations of the modules, module sources, their functions, and more.

| Location                | Description                            |
| ----------------------- | -------------------------------------- |
| `/modules/modules.json` | Where all modules are defined          |
| `/modules/modules.php`  | Where all module functions are defined |
| `/modules/source/`      | Where all module source files are kept |

## Usage

This section is a tutorial on how to create and use modules.

### Creating Modules

All modules are defined in `modules/modules.json`, and all source code for each module is stored in `modules/source/`. Here is an example module:

```json
"example": {
    "name": "example",
    "description": "what the module does",
    "version": 1.0,
    "author" : "your name",
    "source": "modules/source/NAMEOFMODULE.php"
}
```

You will create a file for your module in the source directory, and specify its path in the json file.

### Accessing Modules

Modules are accessed in various ways.

| Function           | Parameters | Returns                                     |
| ------------------ | ---------- | ------------------------------------------- |
| `modulesGet()`     | `$name`    | All the content in the modules file.        |
| `modulesGetPath()` | `$name`    | The source directory path.                  |
| `modulesRender()`  | `$name`    | Just echos the content of the modules file. |

If a module has no php in it, you can use `modulesRender()`. If it has php content, then use `include modulesGetPath()`.

## Included Modules

| Module Name                                                | Description                                                                           |
| ---------------------------------------------------------- | ------------------------------------------------------------------------------------- |
| [404](/modules/source/404.php)                             | 404 Page                                                                              |
| [changes](/modules/source/changes.php)                     | Recent Updates                                                                        |
| [dashboard](/modules/source/dashboard.php)                 | Selections and Graph for index                                                        |
| [footer](/modules/source/footer.php)                       | Small footer text shown at the bottom of the page                                     |
| [graph-cans](/modules/source/graph-cans.php)               | Graph card for pouches used on dashboard                                              |
| [graph-pouches](/modules/source/graph-pouches.php)         | Graph card for cans used on dashboard.                                                |
| [install](/modules/source/install.php)                     | Install instructions for mobile                                                       |
| [login](/modules/source/login.php)                         | Login form.                                                                           |
| [manage](/modules/source/manage.php)                       | Analytics and stuff                                                                   |
| [nav](/modules/source/nav.php)                             | Global navigation bar                                                                 |
| [paperwork](/modules/source/paperwork.php)                 | Terms and Conditions, Privacy Policy, Cookie Policy                                   |
| [register](/modules/source/register.php)                   | Register form                                                                         |
| [selection-cans](/modules/source/selection-cans.php)       | Selection for adding cans for current day                                             |
| [selection-pouches](/modules/source/selection-pouches.php) | Selection for picking pouches used on dashboard                                       |
| [settings](/modules/source/settings.php)                   | Settings popup for when a user is logged in. Also contains change password and email. |
| [splash](/modules/source/splash.php)                       | Front page when user is not logged in                                                 |
| [welcome](/modules/source/welcome.php)                     | Welcome message when user is logged in                                                |
