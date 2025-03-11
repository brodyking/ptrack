# Pages

**Page Modified**: March 10, 2025
\
**Author**: Brody King
\
**Type**: Reference

|**[« Index](/docs/index.md)** |
| --------------------------- | 

## Table of Contents

- [Pouchtrack: Pages](#pouchtrack-pages)
  - [Table of Contents](#table-of-contents)
  - [Definition](#definition)
  - [Accessing Pages](#accessing-pages)
    - [Active Pages](#active-pages)

## Definition 

Pages, similar to [modules](modules.md), are segments of code that are written once to be used in multiple places. However, unlike modules, they are written in `html`.

They are kept in the `/pages/` directory. 

Static elements that do not require php should be put in pages. You can also put pages inside modules using the methods listed below.


## Accessing Pages 
A page can be added by using `include`. This is the recommended way.
```php
include "pages/PAGENAME.html";
```
Because these are static, you can also use `file_get_contents()` in conjunction with echo.
```php
echo file_get_contents("modules/PAGENAME.html");
```

### Active Pages 

| Module Name | Description | Used On |
| ----------- | ----------- | ------- |
| [`announcements.html`](/pages/announcements.html) | Release notes | [index.php](/index.php) |
| [`help.html`](/pages/help.html) | Help information | [index.php](/index.php) |
| [`motd.html`](/pages/motd.html) | Used to display pre-alpha warning. | [index.php](/index.php), [modules/head.php](/modules/head.php) |
| [`paperwork.html`](/pages/paperwork.html) | Paperwork and other boring bs | [index.php](/index.php) |
