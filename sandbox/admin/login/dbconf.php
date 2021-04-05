<?php
//DATABASE CONNECTION VARIABLES
$host = "catalytic.db.10396920.hostedresource.com"; // Host name
$username = "catalytic"; // Mysql username
$password = "Tigersandelephants2!"; // Mysql password
$db_name = "catalytic"; // Database name

//DO NOT CHANGE BELOW THIS LINE UNLESS YOU CHANGE THE NAMES OF THE MEMBERS AND LOGINATTEMPTS TABLES

$tbl_prefix = ""; //***PLANNED FEATURE, LEAVE VALUE BLANK FOR NOW*** Prefix for all database tables
$tbl_members = $tbl_prefix."members";
$tbl_attempts = $tbl_prefix."loginAttempts";
