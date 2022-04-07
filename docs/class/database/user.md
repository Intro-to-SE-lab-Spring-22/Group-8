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

### checkPassword($username, $password) -> bool
Checks if `$username`'s password hash matches a given `$password`.
This uses built-in hashing/verification functions, all is well.

### checkRequirements($username, $password) -> [bool, bool]
Checks if a given username and password meet the Spyke minimum requirements
as-per the constants set within the class and SRS.
Returns an array for the boolean of whether or not each field was met.
**This method currently does not elaborate.**
**Specific validation should be done client-side.**

### getId($username) -> int | False
Returns the ID number of a given username.
If no such username exists, returns `false`.

### getUsername($id) -> string | False
Returns the username of a given ID.
If no such ID exists, returns `false`.