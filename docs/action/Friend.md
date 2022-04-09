# Spyke API v1
## Friend

**friend.php** exists to control actions pertaining to relationships.

### POST Variables
| Variable 		| Type   | Description				|
| -------------	| ------ | ------------------------	|
| **user**		| int	 | The user ID of desire.	|
| **action**	| string | Which action to commit.	|

#### Actions
| Action		| Description				|
| -------------	| -------------------------	|
| **add**		| *Add or accept* a friend.	|
| **remove**	| *Remove* a friend.		|