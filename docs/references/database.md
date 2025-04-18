# Database

**Page Modified**: April 5, 2025
\
**Author**: Brody King
\
**Type**: Reference

| **[« Index](/docs/index.md)** |
| ----------------------------- |

## Table of Contents

- [Database](#database)
  - [Table of Contents](#table-of-contents)
  - [Introduction](#introduction)
  - [Locations](#locations)
  - [Accessing the File System](#accessing-the-file-system)
  - [Accessing Configuration](#accessing-configuration)
  - [Accessing User Information](#accessing-user-information)
    - [User Data Locations](#user-data-locations)
    - [Default Data for account.json](#default-data-for-accountjson)
    - [User/Account Functions](#useraccount-functions)
    - [Pouch Functions](#pouch-functions)
    - [Can Functions](#can-functions)
    - [Month/Date Functions](#monthdate-functions)

## Introduction

This software does not use any "real" database. The intention is to make this software easy to run, backup, and move. No one wants to manage a mySQL server. Instead, all data is stored in json files.

## Locations

These are the locations of important database functions and actual data.

| Path                                       | Description                        |
| ------------------------------------------ | ---------------------------------- |
| [`/data/database.php`](/data/database.php) | Holds all database functions.      |
| [`/config.json`](/config.json)             | Configuration for site as a whole. |
| [`/data/db_users/`](/data/db_users/)       | Holds all user data.               |

## Accessing the File System

These functions are here to save time writing out the long php defaults. Feel free to use both.

| Function    | Parameter        | Description                                |
| ----------- | ---------------- | ------------------------------------------ |
| `read()`    | `$file`          | Returns content of file at specified path. |
| `write()`   | `$file`, `$data` | Writes `$data` to `$file`.                 |
| `isEmpty()` | `$file`          | Returns if content is empty.               |

## Accessing Configuration

These functions are used to interact with `config.json`

| Function           | Parameter   | Description                                           |
| ------------------ | ----------- | ----------------------------------------------------- |
| `settingsGet()`    | `$variable` | Returns the value of `$variable` from `/config.json`. |
| `getSiteName()`    |             | Returns `site.name` from `/config.json`.              |
| `getSiteVersion()` |             | Returns `site.version` from `/config.json`.           |

## Accessing User Information

User Information is stored in a sub-directory at `/data/db_users/USERNAME/`. There are 4 files by default in the users folder.

### User Data Locations

| File           | Description                                      |
| -------------- | ------------------------------------------------ |
| `account.json` | Stores Information related to the users account. |
| `cans.json`    | Stores Can Usage Data.                           |
| `pouches.json` | Stores Pouch Usage Data.                         |
| `session.json` | Stores Current Session ID.                       |

### Default Data for account.json

Inside of `account.json`, there are multiple variables pre-defined.

| Variable    | Type   | Default Value    | Description                                                    |
| ----------- | ------ | ---------------- | -------------------------------------------------------------- |
| `username`  | string |                  | Stores the users username.                                     |
| `password`  | string |                  | Stores the users password.                                     |
| `joindate`  | string | `date("m-d-Y");` | Stores the date the user signed up.                            |
| `secureID`  | bool   | `true`           | Determines if Secure Session is enabled.                       |
| `isdeleted` | bool   | `false`          | Marked true if the user has requested to delete their account. |

### User/Account Functions

| Function               | Parameter                     | Description                                                         |
| ---------------------- | ----------------------------- | ------------------------------------------------------------------- |
| `userPathTo()`         | `$username`                   | Returns the path to the users folder.                               |
| `userExists()`         | `$username`                   | Returns if the user exists.                                         |
| `userSettingsGet()`    | `$username`, `$key`           | Returns the value for `$key` in their `account.json`.               |
| `userSettingsSet()`    | `$username`, `$key`, `$value` | Sets `$key` in the users `account.json` to `$value`.                |
| `userAuth()`           | `$username`, `$password`      | Returns if `$password` is equal to the users actual password.       |
| `userCreate()`         | `$username`, `$password`      | Creates a new user with all the default information.                |
| `userDelete()`         | `$username`                   | Set `isdeleted` to true, locks account by changing password.        |
| `userSessionClear()`   | `$username`                   | Deletes all the users cookies, and deletes `session.json`           |
| `userSessionGet()`     | `$username`                   | Returns the users current ID.                                       |
| `userSessionCreate() ` | `$username`                   | Creates a new session, stores in `session.json`, returns the new id |
| `userPasswordGet()`    | `$username`                   | Calls `userSettingsGet()`, returns the users password               |
| `userChangePassword()` | `$username`, `$password`      | Calls `userSettingsSet()` to set a new password                     |
| `userIsAdmin()`        | `$username`                   | Calls `userSettingsGet()`, returns if `isadmin` is set to true      |
| `userJoinDate()`       | `$username`                   | Calls `userSettingsGet()`, returns the users `joindate`             |

### Pouch Functions

| Function                      | Parameter                        | Description                                                |
| ----------------------------- | -------------------------------- | ---------------------------------------------------------- |
| `pouchInit()`                 | `$username`, `$day`              | Creates a blank day on `$day`.                             |
| `pouchExists()`               | `$username`, `$day`              | Checks if the day exists in `pouches.json`.                |
| `pouchAdd()`                  | `$username`, `$day`, `$strength` | Adds a new pouch to `pouches.json`                         |
| `pouchGetMgs()`               | `$username`, `$day`              | Returns the amount of mgs used on `$day`                   |
| `pouchGetPouches()`           | `$username`, `$day`              | Returns the amount of pouches used on`$day`                |
| `pouchGetHistoryArray()`      | `$username`                      | Returns an array of all dates with entries.                |
| `pouchGetHistoryArrayMonth()` | `$username`, `$month`            | Same as above, but takes in a month. Months are `01`-`12`. |

### Can Functions

| Function                    | Parameter             | Description                                                |
| --------------------------- | --------------------- | ---------------------------------------------------------- |
| `canInit()`                 | `$username`, `$day`   | Creates a blank day on `$day`.                             |
| `canExists()`               | `$username`, `$day`   | Checks if the day exists in `cans.json`.                   |
| `canAdd()`                  | `$username`, `$day`   | Adds a new can to `cans.json`                              |
| `canGet()`                  | `$username`, `$day`   | Returns the amount of cans used on `$day`                  |
| `canGetHistoryArray()`      | `$username`           | Returns an array of all dates with entries of cans.        |
| `canGetHistoryArrayMonth()` | `$username`, `$month` | Same as above, but takes in a month. Months are `01`-`12`. |

### Month/Date Functions

| Function         | Parameter | Description                                                                                                                                        |
| ---------------- | --------- | -------------------------------------------------------------------------------------------------------------------------------------------------- |
| `monthIsValid()` | `$input`  | Takes in a number and returns T/F if its a valid month. Months are `01`-`12`.                                                                      |
| `monthsGet()`    |           | Returns an array of months. Each items is its own array with index 0 being its number, and index 1 being its actual name. Ex: `["02","February"]`. |
