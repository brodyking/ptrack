# Modules

**Page Modified**: March 10, 2025
\
**Author**: Brody King
\
**Type**: Reference

|**[« Index](/docs/index.md)** |
| --------------------------- | 

## Table of Contents

- [Pouchtrack: Modules](#pouchtrack-modules)
  - [Table of Contents](#table-of-contents)
  - [Definition](#definition)
  - [Accessing Modules](#accessing-modules)
    - [Active Modules](#active-modules)

## Definition 

Modules are parts of the frontend that are loaded upon page visits. They are kept in the `/modules/` directory. This allows them to be added everywhere, but written once. 
## Accessing Modules
A module can be added by simply `include`ing it on the page.
```php
include "modules/MODULENAME.php";
```

### Active Modules

| Module Name | Description | Used On |
| ----------- | ----------- | ------- |
| [`appdialogs.php`](/modules/appdialogs.php) | Used on pages that have a popup. | [app.php](/app.php) |
| [`footer.php`](/modules/footer.php) | Footer Element | [app.php](/app.php), [index.php](/index.php) |
| [`head.php`](/modules/head.php) | Navigation Bar | [app.php](/app.php), [changepswd.php](/changepswd.php), [settings.php](/settings.php) |
| [`history.php`](/modules/history.php) | Pouch Usage Graph | [app.php](/app.php) |
| [`selection.php`](/modules/selection.php) | Picker for recording new pouchs | [app.php](/app.php) |
| [`today.php`](/modules/today.php) | Welcome message and daily stats | [app.php](/app.php) |
