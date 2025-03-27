# Test Data 

**Page Modified**: March 27, 2025
\
**Author**: Brody King
\
**Type**: Guide

|**[« Index](/docs/index.md)** |
| --------------------------- | 

## Table of Contents

- [Test Data](#test-data)
  - [Table of Contents](#table-of-contents)
  - [Introduction](#introduction)
  - [Pouch Data](#pouch-data)
  - [Can Data](#can-data)

## Introduction
When working on this project, you may want to generate test data for users. Here are some ways todo so.

## Pouch Data
Here below is a script that will do so, with one caveat.
```php
<?php
// put this file in the root directory with a different name, then open in a web browser.
include 'data/database.php';
$data = [];
$months = [
    1 => 31,
    2 => 28,
    3 => 31,
    4 => 30,
    5 => 31,
    6 => 30,
    7 => 31,
    8 => 31,
    9 => 30,
    10 => 31,
    11 => 30,
    12 => 31
];
for ($month = 1; $month <= 12; $month++) {
    for ($day = 1; $day <= $months[$month]; $day++) {
        $expmonth = $month;
        $expday = $day;
        if ($expmonth < 10) $expmonth = "0".$month;
        if ($expday < 10) $expday = "0".$day;
        $data[$expmonth."/".$expday."/2025"] = [random_int(0,10),random_int(0,10)];
    }
}
$data = json_encode($data,JSON_PRETTY_PRINT);
str_replace($data,"\/","/");
file_put_contents("test.json",$data);
?>
```

This file will generate it correctly, but the dates will be `01\/01\/2025`. You can use vscode to replace all `\/` with `/`.

## Can Data
Here is the script I used. Its very similar to the pouch data.
```php
<?php
// put this file in the root directory with a different name, then open in a web browser.
include 'data/database.php';
$data = [];
$months = [
    1 => 31,
    2 => 28,
    3 => 31,
    4 => 30,
    5 => 31,
    6 => 30,
    7 => 31,
    8 => 31,
    9 => 30,
    10 => 31,
    11 => 30,
    12 => 31
];
for ($month = 1; $month <= 12; $month++) {
    for ($day = 1; $day <= $months[$month]; $day++) {
        $expmonth = $month;
        $expday = $day;
        if ($expmonth < 10) $expmonth = "0".$month;
        if ($expday < 10) $expday = "0".$day;
        $data[$expmonth."/".$expday."/2025"] = random_int(0,10);
    }
}
$data = json_encode($data,JSON_PRETTY_PRINT);
str_replace($data,"\/","/");
file_put_contents("test.json",$data);
?>
```
Again, this file will generate it correctly, but the dates will be `01\/01\/2025`. You can use vscode to replace all `\/` with `/`.