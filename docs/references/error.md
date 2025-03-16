# Error 

**Page Modified**: March 15, 2025
\
**Author**: Brody King
\
**Type**: Reference

|**[« Index](/docs/index.md)** |
| --------------------------- | 

## Table of Contents

- [Error](#error)
  - [Table of Contents](#table-of-contents)
  - [Definition](#definition)
  - [Locations](#locations)
  - [Variables](#variables)
  - [Functions](#functions)

## Definition 

Error is a script that handles error reporting to the user.

## Locations
It is located in the scripts folder.

| Location | Description |
| -------- | ----------- |
| [`/scripts/source/error.php`](/scripts/source/error.php) | Source code |

## Variables

| Variable Name | Description |
| ------------- | ----------- |
| `$errorOutput` | Where the error is stored that will be displayed. |

## Functions

| Function Name | Parameters | Description |
| ------------- | ---------- | ----------- |
| `errorSet()` | `$errorname` |  Sets `$errorOutput` to the input |
| `errorGet()` | | Returns `$errorOutput` |
| `errorIsSet()` | | Returns if `$errorOutput` is set |
| `errorIsRecieved()` | | Returns if `$_GET['error']` is set |
| `errorPretty()` | | Returns a detailed error description tied to the error name |
| `errorPrint()` | | Renders/Echos the error with `errorPretty()` in an alert box |
| `errorClose()` | | Sets `$errorOutput` to `""` | 