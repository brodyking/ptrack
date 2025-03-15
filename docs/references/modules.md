# Modules

**Page Modified**: March 15, 2025
\
**Author**: Brody King
\
**Type**: Reference

|**[« Index](/docs/index.md)** |
| --------------------------- | 

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

| Location | Description |
| -------- | ----------- |
| `/modules/modules.json` | Where all modules are defined |
| `/modules/modules.php` | Where all module functions are defined |
| `/modules/source/` | Where all module source files are kept |

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

| Function | Parameters | Returns |
| -------- | ---------- | ------- |
| `modulesGet()` | `$name` | All the content in the modules file. |
| `modulesGetPath()` | `$name` | The source directory path. |
| `modulesRender()` | `$name` | Just echos the content of the modules file. |

If a module has no php in it, you can use `modulesRender()`. If it has php content, then use `include modulesGetPath()`.


## Included Modules

| Module Name | Description |
| ----------- | ----------- |
| [announcements](/modules/source/announcements.php) | Recent updates shown in splash-content |
| [footer](/modules/source/footer.php) | Small footer text shown at the bottom of the page |
| [graph](/modules/source/graph.php) | Graph card used on dashboard. |
| [login](/modules/source/login.php) | Login form. Used in splash-content |
| [nav-loggedin](/modules/source/nav-loggedin.php) | Navigation bar shown when the user is loged in |
| [nav-splash](/modules/source/nav-splash.php) | Navigation bar shown when the user is not logged in |
| [paperwork](/modules/source/paperwork.php) | Terms and Conditions and Privacy Policy |
| [register](/modules/source/register.php) | Registration popup. Does not include activation button. |
| [selection](/modules/source/selection.php) | Selection for picking pouches, used on dashboard. |
| [settings](/modules/source/settings.php) | Settings popup, includes change password popup aswell |
| [splash-content](/modules/source/splash-content.php) | The layout for all content on the splash page when the user is not logged in|
| [splash](/modules/source/splash.php) | Title and buttons shown at the top when the user is not logged in|