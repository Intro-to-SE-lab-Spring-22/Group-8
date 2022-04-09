# Spyke API v1
## Register

**register.php** exists to create new users.

### POST Variables
| Variable 				| Type   | Description						|
| ---------------------	| ------ | --------------------------------	|
| **username**			| string | The username of the new user 	|
| **password**			| string | The password of the new user 	|
| **confirmPassword**	| string | The password... Again			|
| **firstName**			| string | The first name of the new user	|
| **lastName**			| string | The last name of the new user	|

### Response
On success, the new user is logged in and redirected to the user page.
On failure, the user is redirected to the register page with an error message.