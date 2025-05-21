# API

**Page Modified**: May 16, 2025
\
**Author**: Brody King
\
**Type**: Reference

| **[« Index](/docs/index.md)** |
| ----------------------------- |

## Table of Contents

- [API](#api)
  - [Table of Contents](#table-of-contents)
  - [Definition](#definition)
  - [Locations](#locations)
  - [Functions](#functions)
  - [Usage](#usage)
    - [Login](#login)
    - [Register](#register)
    - [Count](#count)
    - [Cans](#cans)
    - [Logout](#logout)
    - [Delete Account](#delete-account)
    - [Change Password](#change-password)
    - [Change Email](#change-email)
    - [Reset Data](#reset-data)
    - [Bug Reporting](#bug-reporting)
    - [Raw Data](#raw-data)

## Definition

The API handles basic actions and processes user input. It isnt a "true api" in the sense, but its how you _interface_ with ptrack so I dont care.

## Locations

| Location   | Description              |
| ---------- | ------------------------ |
| `/api.php` | Where it all went wrong. |

## Functions

A few functions are included in the api for error handling and such.

| Function Name     | Parameters | Definition                                                                                                                                                |
| ----------------- | ---------- | --------------------------------------------------------------------------------------------------------------------------------------------------------- |
| `apiError()`      | `$msg`     | Redirects to `/?error=` to display the error                                                                                                              |
| `apiFinish()`     |            | Redirects to `/`                                                                                                                                          |
| `apiFinishMode()` | `$input`   | Adds `cmonth` or `pmonth` as GET in the url, so that the user is sent to the tab they were on before using the API. Valid inputs are `pouches` and `cans` |

## Usage

This is a pretty large section, so I will try and make it as simple and quick. Here are the ways to interact with the API

### Login

Allows the user to login, by verifying password and giving a new Session ID.

| Scripts Used                       | URL                    |
| ---------------------------------- | ---------------------- |
| [login](/scripts/source/login.php) | `api.php?action=login` |

| Parameter Needed | Method |
| ---------------- | ------ |
| `username`       | `POST` |
| `password`       | `POST` |

| Error                 | Description                      |
| --------------------- | -------------------------------- |
| `login.disabled`      | When `users.allowLogin` is false |
| `login.missingparams` |                                  |
| `login.nouser`        | User dosent exist                |
| `login.userdeleted`   | If users account was deleted     |
| `login.incorrect`     | Wrong Password                   |

### Register

Create a new account

| Scripts Used                             | URL                       |
| ---------------------------------------- | ------------------------- |
| [register](/scripts/source/register.php) | `api.php?action=register` |

| Parameter Needed | Method |
| ---------------- | ------ |
| `username`       | `POST` |
| `password`       | `POST` |

| Error                    | Description                            |
| ------------------------ | -------------------------------------- |
| `register.disabled`      | When `users.allowNewAccounts` is false |
| `register.missingparams` |                                        |
| `register.invalidchhars` | If an account contains a `&`           |
| `register.taken`         | If a users account already exists      |

### Count

Modify the amount of pouches for the current day.

| Scripts Used                       | URL                    |
| ---------------------------------- | ---------------------- |
| [count](/scripts/source/count.php) | `api.php?action=count` |

| Parameter Needed | Method |
| ---------------- | ------ |
| `username`       | `GET`  |
| `id`             | `GET`  |
| `strength`       | `GET`  |

| Error                  | Description       |
| ---------------------- | ----------------- |
| `count.missingparams`  |                   |
| `count.nouser`         | User dosent exist |
| `count.invalidsession` | Wrong ID          |

### Cans

Modify the amount of cans for the current day.

| Scripts Used                     | URL                   |
| -------------------------------- | --------------------- |
| [cans](/scripts/source/cans.php) | `api.php?action=cans` |

| Parameter Needed | Method |
| ---------------- | ------ |
| `username`       | `GET`  |
| `id`             | `GET`  |
| `deed`           | `GET`  |

| Error                 | Description       |
| --------------------- | ----------------- |
| `cans.missingparams`  |                   |
| `cans.nouser`         | User dosent exist |
| `cans.invalidsession` | Wrong ID          |

### Logout

Logout of an account

| Scripts Used                         | URL                     |
| ------------------------------------ | ----------------------- |
| [logout](/scripts/source/logout.php) | `api.php?action=logout` |

| Parameter Needed | Method |
| ---------------- | ------ |
| `username`       | `POST` |

| Error           | Description       |
| --------------- | ----------------- |
| `logout.nouser` | User dosent exist |

### Delete Account

Switches the `isdeleted` flag on for the user, and changes their password.

| Scripts Used                                       | URL                            |
| -------------------------------------------------- | ------------------------------ |
| [deleteaccount](/scripts/source/deleteaccount.php) | `api.php?action=deleteaccount` |

| Parameter Needed | Method |
| ---------------- | ------ |
| `username`       | `GET`  |
| `id`             | `GET`  |

| Error                         | Description |
| ----------------------------- | ----------- |
| `deleteaccount.missingparams` |             |

### Change Password

Allows the user to change their password

| Scripts Used                                 | URL                         |
| -------------------------------------------- | --------------------------- |
| [changepswd](/scripts/source/changepswd.php) | `api.php?action=changepswd` |

| Parameter Needed | Method |
| ---------------- | ------ |
| `username`       | `POST` |
| `id`             | `POST` |
| `oldpassword`    | `POST` |
| `newpassword`    | `POST` |

| Error                      | Description           |
| -------------------------- | --------------------- |
| `changepswd.missingparams` |                       |
| `changepswd.incorrectold`  | Old password is wrong |
| `changepswd.invalidid`     | Invalid Session       |

### Change Email

Allows the user to change their email

| Scripts Used                                   | URL                          |
| ---------------------------------------------- | ---------------------------- |
| [changeemail](/scripts/source/changeemail.php) | `api.php?action=changeemail` |

| Parameter Needed | Method |
| ---------------- | ------ |
| `username`       | `POST` |
| `id`             | `POST` |
| `newemail`       | `POST` |

| Error                       | Description     |
| --------------------------- | --------------- |
| `changeemail.missingparams` |                 |
| `changepswd.invalidid`      | Invalid Session |

### Reset Data

Allows the user to reset all their account data (pouches,cans)

| Scripts Used                               | URL                        |
| ------------------------------------------ | -------------------------- |
| [resetdata](/scripts/source/resetdata.php) | `api.php?action=resetdata` |

| Parameter Needed | Method   |
| ---------------- | -------- |
| `username`       | `COOKIE` |
| `id`             | `COOKIE` |

| Error                       | Description     |
| --------------------------- | --------------- |
| `changeemail.missingparams` |                 |
| `changepswd.invalidsession` | Invalid Session |

### Bug Reporting

Creates bug reports

| Scripts Used                               | URL                        |
| ------------------------------------------ | -------------------------- |
| [bugreport](/scripts/source/bugreport.php) | `api.php?action=bugreport` |

| Parameter Needed | Method |
| ---------------- | ------ |
| `email`          | `POST` |
| `version`        | `POST` |
| `subject`        | `POST` |
| `bodytext`       | `POST` |

| Error                     | Description             |
| ------------------------- | ----------------------- |
| `bugreport.missingparams` |                         |
| `bugreport.disabled`      | Disabled in config.json |

### Raw Data

Allows users to get raw data directly through the web browser

| Scripts Used                           | URL                      |
| -------------------------------------- | ------------------------ |
| [rawdata](/scripts/source/rawdata.php) | `api.php?action=rawdata` |

| Parameter Needed | Method |
| ---------------- | ------ |
| `username`       | `GET`  |
| `id`             | `GET`  |
| `source`         | `GET`  |

| Error                    | Description                  |
| ------------------------ | ---------------------------- |
| `rawdata.missingparams`  |                              |
| `rawdata.nouser`         | User dosent exist.           |
| `rawdata.invalidsession` | Invalid Session              |
| `rawdata.apidisabled`    | API is disabled for the user |
| `rawdata.invalidparams`  | Invalid Source               |
