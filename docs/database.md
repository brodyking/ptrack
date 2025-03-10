# Database Documentation

This software does not use any "real" database. The intention is to make this software easy to run, backup, and move. No one wants to manage a mySQL server. Instead, all data is stored in json files. 

## Locations

These are the locations of important database functions and actual data. 

| Path | Description |
| ----------- | ----------- |
| `/data/database.php` | Holds all database functions. |
| `/config.json` | Configuration for site as a whole |
| `/data/db_users/` | Holds all user data. |

## Accessing the File System

| Function | Args | Description |
| -------- | ---- | ----------- | 
| `read()` | `$file` | Returns content of file at specified path |
| `write()` | `$file`, `$data` | Writes `$data` to `$file` |
| `isEmpty()` | `$file` | Returns if content is empty |

## Accessing Configuration

These functions are used to interact with `config.json`

| Function | Args | Description |
| -------- | ---- | ----------- | 
| `settingsGet()` | `$variable` | Returns the value of `$variable` from `/config.json` |
| `getSiteName()` | | Returns `site.name` from `/config.json` |
| `getSiteVersion()` | | Returns `site.version` from `/config.json` |

## Accessing User Information

User Information is stored in a sub-directory at `/data/db_users/USERNAME/`. There are 2 files by default in the users folder. 

### User Data Locations

| File | Description |
| ---- | ----------- |
| `account.json` | Stores Information related to the users Account. |
| `pouches.json` | Stores Pouch Usage Data |

### Account.json Default Data 

Inside of `account.json`, there are multiple variables pre-defined.

| Variable | Type | Default Value | Description |
| -------- | ---- | ------------- | ----------- |
| `username` | string | | Stores the users username |
| `password` | string | | Stores the users password |
| `joindate` | string | `date("m-d-Y);` | Stores the date the user signed up. |
| `secureID` | bool | `true` | Determines if Secure Session is enabled |
| `isdeleted` | bool | `false` | Marked true if the user has requested to delete their account |

### Database Functions

| Function | Args | Description |
| -------- | ---- | ----------- | 
| `userPathTo()` | `$username` | Returns the path to the users folder. |
| `userExists()` | `$username` | Returns if the user exists |
| `userSettingsGet()` | `$username`, `$key` | Returns the value for `$key` in their `account.json` |
| `userSettingsSet()` | `$username`, `$key`, `$value` | Sets `$key` in the users `account.json` to `$value` |