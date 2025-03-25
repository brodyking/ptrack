# Getting Started

**Page Modified**: March 10, 2025
\
**Author**: Brody King
\
**Type**: Guide

|**[« Index](/docs/index.md)** |
| --------------------------- | 

## Table of Contents

- [Getting Started](#getting-started)
  - [Table of Contents](#table-of-contents)
  - [Installation](#installation)
  - [Configuration and Security](#configuration-and-security)

## Installation

Before Installing, you must have **PHP 5.20** or newer. There is no database required.

Clone the git repository with the following command, or download the [latest release](https://github.com/brodyking/ptrack/releases).

```
git clone https://github.com/brodyking/ptrack
```

Extract it and move it into the root directory of your web server. 

Done!

## Configuration and Security

> [!CAUTION] IMPORTANT SECURITY NOTICE
>Make sure to deny the public access to `/data/`. This folder contains all the data for users. You can [read more here](/docs/references/database.md). If you fail todo so, all and any data put into this site is exposed to the public internet.

You can edit a few settings in `config.json`, such as the site name:

```json
{
    "site.name": "Pouchtrack", 
    "site.version": "v0",
    "site.isindev": false,

    "users.allowNewAccounts": true,
    "users.allowLogin": true
}
```
