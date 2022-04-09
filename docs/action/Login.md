# Spyke API v1
## Login

**login.php** is self-explanatory; It logs in a user.

### POST Variables
| Variable 				| Type   | Description					|
| ---------------------	| ------ | ----------------------------	|
| **username**			| string | The username of the user 	|
| **password**			| string | The password of the user 	|

### Response
On success, the user is logged in and redirected to the user page.
On failure, the user is redirected back to the login page with an error message.