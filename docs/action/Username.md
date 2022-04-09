# Spyke API v1
## Login

**username.php** receives a user ID, and returns the username associated with that ID.

### POST Variables
| Variable 				| Type	| Description			|
| ---------------------	| -----	| ------------------	|
| **id** or **user**	| int	| The ID of the user	|

### Response
Given a valid ID, the username as a string in quotes will be returned.

Given an invalid, non-existant or otherwise wrong ID,
*Anonymous* will be returned.