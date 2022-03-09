# Spyke Developer Docs
## Setting Up the Database

### Prerequisites
Spyke uses a MySQL database.

##### Linux / WSL
`sudo apt update`
`sudo apt install mysql-server`
`sudo apt install php-mysql`
`sudo mysql_secure_installation`

##### Windows (Experimental)
[Installlation Link](https://dev.mysql.com/doc/refman/8.0/en/windows-installation.html)
If the installer offers to add to PATH, **add to PATH!**

* [!] I have not tried this. *Good luck, and use Google wisely.*
--------

### Quick Setup
Just type this *$#!^* in the SQL console and you'll do well.
These SQL commands will prepare a database exactly to Spyke's needs.
```sql
CREATE DATABASE spyke;
USE spyke;
CREATE TABLE `users` (
	`username` TEXT(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
	`id` INT NOT NULL AUTO_INCREMENT,
	`pass` TEXT CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
	PRIMARY KEY (`id`)
);

CREATE USER 'spyke'@'localhost' IDENTIFIED BY 'UseYourOwnPassword';
GRANT ALL PRIVILEGES ON spyke.* TO 'spyke'@'localhost';
FLUSH PRIVILEGES;
```
* [!] In the `CREATE USER`{.sql} line, **replace `UseYourOwnPassword`.**

If you input the above lines verbatim, you will be ready.

##### Troubleshooting
* Make sure you ran `mysql` as root.
* Message Wolfgang

--------

### Becoming Spyke: From The Terminal
```sh
mysql -h localhost -u spyke -p spyke
```
* [!] The '`-p`' in `-p spyke` does **NOT** mean 'password' (for some reason).
It simply places you in the `spyke` database directly rather than having to use
`USE spyke;`{.sql} every single time.