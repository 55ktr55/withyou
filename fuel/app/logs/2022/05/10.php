<?php defined('COREPATH') or exit('No direct script access allowed'); ?>

ERROR - 2022-05-10 01:24:13 --> 42000 - SQLSTATE[42000]: Syntax error or access violation: 1064 You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near '), 0, 0, 1652145853)' at line 1 with query: "INSERT INTO `task` (`content`, `category_id`, `user_id`, `done`, `created_at`) VALUES ('koko', (), 0, 0, 1652145853)" in /Users/kotaro/intern_without_salary/withyou/fuel/core/classes/database/pdo/connection.php on line 245
ERROR - 2022-05-10 01:24:42 --> 42S22 - SQLSTATE[42S22]: Column not found: 1054 Unknown column 'done' in 'field list' with query: "SELECT `name`, `done`, `user_id` FROM `category` WHERE `category_id` = (('31'))" in /Users/kotaro/intern_without_salary/withyou/fuel/core/classes/database/pdo/connection.php on line 245
ERROR - 2022-05-10 01:28:24 --> 42S22 - SQLSTATE[42S22]: Column not found: 1054 Unknown column 'done' in 'field list' with query: "SELECT `name`, `done`, `user_id` FROM `category` WHERE `category_id` = (('31'))" in /Users/kotaro/intern_without_salary/withyou/fuel/core/classes/database/pdo/connection.php on line 245
ERROR - 2022-05-10 01:30:48 --> Warning - Undefined variable $email in /Users/kotaro/intern_without_salary/withyou/fuel/app/views/welcome/home.php on line 53
ERROR - 2022-05-10 01:30:57 --> Warning - Undefined variable $email in /Users/kotaro/intern_without_salary/withyou/fuel/app/views/welcome/home.php on line 53
ERROR - 2022-05-10 01:31:03 --> 42S22 - SQLSTATE[42S22]: Column not found: 1054 Unknown column 'category_id' in 'where clause' with query: "SELECT * FROM `category` WHERE `category_id` = (('31'))" in /Users/kotaro/intern_without_salary/withyou/fuel/core/classes/database/pdo/connection.php on line 245
ERROR - 2022-05-10 01:31:22 --> 42S22 - SQLSTATE[42S22]: Column not found: 1054 Unknown column 'name' in 'field list' with query: "SELECT `name`, `done`, `user_id` FROM `task` WHERE `category_id` = (('31'))" in /Users/kotaro/intern_without_salary/withyou/fuel/core/classes/database/pdo/connection.php on line 245
ERROR - 2022-05-10 04:44:55 --> Warning - Undefined variable $email in /Users/kotaro/intern_without_salary/withyou/fuel/app/views/welcome/home.php on line 53
ERROR - 2022-05-10 04:45:06 --> Warning - Undefined variable $email in /Users/kotaro/intern_without_salary/withyou/fuel/app/views/welcome/home.php on line 53
ERROR - 2022-05-10 04:45:25 --> Warning - Undefined variable $email in /Users/kotaro/intern_without_salary/withyou/fuel/app/views/welcome/home.php on line 53
ERROR - 2022-05-10 04:45:31 --> Warning - Undefined variable $email in /Users/kotaro/intern_without_salary/withyou/fuel/app/views/welcome/home.php on line 53
ERROR - 2022-05-10 04:49:47 --> Warning - Undefined variable $email in /Users/kotaro/intern_without_salary/withyou/fuel/app/views/welcome/home.php on line 53
ERROR - 2022-05-10 04:49:56 --> Warning - Undefined variable $email in /Users/kotaro/intern_without_salary/withyou/fuel/app/views/welcome/home.php on line 53
ERROR - 2022-05-10 04:50:08 --> Warning - Undefined variable $email in /Users/kotaro/intern_without_salary/withyou/fuel/app/views/welcome/home.php on line 53
ERROR - 2022-05-10 04:50:49 --> Warning - Undefined variable $email in /Users/kotaro/intern_without_salary/withyou/fuel/app/views/welcome/home.php on line 53
ERROR - 2022-05-10 04:50:58 --> Warning - Undefined variable $email in /Users/kotaro/intern_without_salary/withyou/fuel/app/views/welcome/home.php on line 53
ERROR - 2022-05-10 04:51:13 --> Warning - Undefined variable $email in /Users/kotaro/intern_without_salary/withyou/fuel/app/views/welcome/home.php on line 53
ERROR - 2022-05-10 04:53:04 --> Warning - Undefined variable $email in /Users/kotaro/intern_without_salary/withyou/fuel/app/views/welcome/home.php on line 53
ERROR - 2022-05-10 05:13:51 --> Warning - Undefined variable $email in /Users/kotaro/intern_without_salary/withyou/fuel/app/views/welcome/home.php on line 54
ERROR - 2022-05-10 05:13:57 --> Warning - Undefined variable $email in /Users/kotaro/intern_without_salary/withyou/fuel/app/views/welcome/home.php on line 54
ERROR - 2022-05-10 05:14:00 --> Warning - Undefined variable $email in /Users/kotaro/intern_without_salary/withyou/fuel/app/views/welcome/home.php on line 54
ERROR - 2022-05-10 05:15:15 --> Warning - Undefined variable $email in /Users/kotaro/intern_without_salary/withyou/fuel/app/views/welcome/home.php on line 54
ERROR - 2022-05-10 05:15:19 --> Warning - Undefined variable $email in /Users/kotaro/intern_without_salary/withyou/fuel/app/views/welcome/home.php on line 54
ERROR - 2022-05-10 05:15:22 --> Warning - Undefined variable $email in /Users/kotaro/intern_without_salary/withyou/fuel/app/views/welcome/home.php on line 54
ERROR - 2022-05-10 06:26:47 --> Error - Call to undefined method Model\TestModel::getTasks() in /Users/kotaro/intern_without_salary/withyou/fuel/app/classes/controller/welcome.php on line 40
ERROR - 2022-05-10 06:34:29 --> 42000 - SQLSTATE[42000]: Syntax error or access violation: 1064 You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near ')' at line 1 with query: "SELECT `content`, `done`, `user_id` FROM `task` WHERE `category_id` = ()" in /Users/kotaro/intern_without_salary/withyou/fuel/core/classes/database/pdo/connection.php on line 245
ERROR - 2022-05-10 06:36:16 --> 42000 - SQLSTATE[42000]: Syntax error or access violation: 1064 You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near ')' at line 1 with query: "SELECT `content`, `done`, `user_id` FROM `task` WHERE `category_id` = ()" in /Users/kotaro/intern_without_salary/withyou/fuel/core/classes/database/pdo/connection.php on line 245
ERROR - 2022-05-10 06:37:22 --> 42000 - SQLSTATE[42000]: Syntax error or access violation: 1064 You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near ')' at line 1 with query: "SELECT `content`, `done`, `user_id` FROM `task` WHERE `category_id` = ()" in /Users/kotaro/intern_without_salary/withyou/fuel/core/classes/database/pdo/connection.php on line 245
ERROR - 2022-05-10 07:13:09 --> 23000 - SQLSTATE[23000]: Integrity constraint violation: 1052 Column 'id' in on clause is ambiguous with query: "SELECT `content`, `done`, `username` AS `created_by` FROM `task` LEFT JOIN `users` ON (`user_id` = `id`) WHERE `category_id` = (('31'))" in /Users/kotaro/intern_without_salary/withyou/fuel/core/classes/database/pdo/connection.php on line 245
ERROR - 2022-05-10 07:17:52 --> 23000 - SQLSTATE[23000]: Integrity constraint violation: 1052 Column 'id' in on clause is ambiguous with query: "SELECT `content`, `done`, `username` AS `created_by` FROM `task` LEFT JOIN `users` ON (`user_id` = `id`) WHERE `category_id` = (('31'))" in /Users/kotaro/intern_without_salary/withyou/fuel/core/classes/database/pdo/connection.php on line 245
ERROR - 2022-05-10 07:45:25 --> Warning - Undefined variable $email in /Users/kotaro/intern_without_salary/withyou/fuel/app/views/welcome/home.php on line 55
ERROR - 2022-05-10 12:40:58 --> Warning - Undefined variable $categories in /Users/kotaro/intern_without_salary/withyou/fuel/app/classes/controller/welcome.php on line 108
ERROR - 2022-05-10 13:15:01 --> 42000 - SQLSTATE[42000]: Syntax error or access violation: 1064 You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near '), '1', 0, 1652188501)' at line 1 with query: "INSERT INTO `task` (`content`, `category_id`, `user_id`, `done`, `created_at`) VALUES ('lp', (), '1', 0, 1652188501)" in /Users/kotaro/intern_without_salary/withyou/fuel/core/classes/database/pdo/connection.php on line 245
ERROR - 2022-05-10 13:16:53 --> 42000 - SQLSTATE[42000]: Syntax error or access violation: 1064 You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near '), '1', 0, 1652188613)' at line 1 with query: "INSERT INTO `task` (`content`, `category_id`, `user_id`, `done`, `created_at`) VALUES ('mkhin', (), '1', 0, 1652188613)" in /Users/kotaro/intern_without_salary/withyou/fuel/core/classes/database/pdo/connection.php on line 245
ERROR - 2022-05-10 13:18:40 --> 42000 - SQLSTATE[42000]: Syntax error or access violation: 1064 You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near '), '1', 0, 1652188720)' at line 1 with query: "INSERT INTO `task` (`content`, `category_id`, `user_id`, `done`, `created_at`) VALUES ('lkm', (), '1', 0, 1652188720)" in /Users/kotaro/intern_without_salary/withyou/fuel/core/classes/database/pdo/connection.php on line 245
ERROR - 2022-05-10 13:19:11 --> 42000 - SQLSTATE[42000]: Syntax error or access violation: 1064 You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near '), '1', 0, 1652188751)' at line 1 with query: "INSERT INTO `task` (`content`, `category_id`, `user_id`, `done`, `created_at`) VALUES (',ml;', (), '1', 0, 1652188751)" in /Users/kotaro/intern_without_salary/withyou/fuel/core/classes/database/pdo/connection.php on line 245
ERROR - 2022-05-10 13:20:38 --> 42000 - SQLSTATE[42000]: Syntax error or access violation: 1064 You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near '), '1', 0, 1652188838)' at line 1 with query: "INSERT INTO `task` (`content`, `category_id`, `user_id`, `done`, `created_at`) VALUES (' n, ', (), '1', 0, 1652188838)" in /Users/kotaro/intern_without_salary/withyou/fuel/core/classes/database/pdo/connection.php on line 245
ERROR - 2022-05-10 13:23:11 --> 42000 - SQLSTATE[42000]: Syntax error or access violation: 1064 You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near '), '1', 0, 1652188991)' at line 1 with query: "INSERT INTO `task` (`content`, `category_id`, `user_id`, `done`, `created_at`) VALUES ('jnl', (), '1', 0, 1652188991)" in /Users/kotaro/intern_without_salary/withyou/fuel/core/classes/database/pdo/connection.php on line 245
