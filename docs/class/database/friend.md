# Spyke Developer Docs
## The *Friend* Subclass for *Database*

`$FriendDB = new Group8\Spyke\Database\Friend()`

The *User* class extends *Database* pto provide common user functions
as easily callable methods.

### Relationships
There are five possible states of relationship:
0. *Strangers (null)*
1. adam-asks
2. eve-asks
3. friends
4. adam-blocks
5. eve-blocks

### setRelationship (int User A, int User B, string Relationship) -> bool
Sets the relationship between two users.

### getRelationship (int User A, int User B) -> string
Gets the relationship between two users.

### getFriends (int User) -> array
Gets all friends of a user.

### deleteRelationship (int User A, int User B) -> bool
Deletes the relationship between two users.
Used for unfriending/unblocking someone.