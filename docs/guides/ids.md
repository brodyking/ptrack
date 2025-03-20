# Ids 

**Page Modified**: March 17, 2025
\
**Author**: Brody King
\
**Type**: Guide

|**[« Index](/docs/index.md)** |
| --------------------------- | 

## Table of Contents

- [Ids](#ids)
  - [Table of Contents](#table-of-contents)
  - [Introduction](#introduction)
  - [The Concept](#the-concept)
    - [The Problems](#the-problems)
    - [The Future](#the-future)

## Introduction
*Ids* are the system for authentication on ptrack. It is a simple, "if it isnt *that* broken, then dont fix" implementation. A new auth system will be developed later down the road.

## The Concept
When a user logs in, they send a username and a password to show who they are. If the password is correct, a unique int will be assigned. This is put into the site url as a `$_GET[]` param. The ID is then changed on every pageload. This is what *Secure ID* or *Secure Session* is.

### The Problems
The ID system on ptrack has many vulnerabilities and annoyances. 

- Refreshing/Reloading does not work. 
   
- A user must disable Secure Session to *Add to Homescreen*, which makes the user more vulnerable.
  - If Secure Session is disabled, and someone can see the URL at which you are accessing the page, they can bypass the login.

- It is a downright messy and braindead implementation, written by a 17 year old with no formal programming experience (me). 

### The Future
Plans to use browser cookies are a priority. Until this is done, users are not able to input any information other than what is required. For now, ptrack wont collect Email, Full Names, or any other personally identifiable information, as to minimize damage from these known vulnerabilities. 