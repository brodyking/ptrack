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

## Introduction
*Ids* are the system for authentication on ptrack. It is a simple, "if it isnt *that* broken, then dont fix" implementation. A new auth system will be developed later down the road.

## The Concept
When a user logs in, a unique int will be assigned. This is put into the site url as a `$_GET[]` param. 