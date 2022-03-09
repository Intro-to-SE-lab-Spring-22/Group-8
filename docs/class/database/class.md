# Spyke Developer Docs
## The *User* Subclass for *Database*

`$UserDB = new Group8\Spyke\Database\User()`

The *User* class extends *Database* pto provide common user functions
as easily callable methods.

### registerUser($username, $pass) -> bool
Registers a new user, accepting a chosen username and given password.

Returns `true`	on success.
Returns `false`	on failure.

*The password is hashed and salted before being inserted into the database.*
*ID generation is handled by the database.*

### getUserList() -> array
Returns an associative array of the format
`id -> username`
for every user in Spyke.

### getId() -> int | False
Returns the ID number of a given username.
If no such username exists, returns `false`.