# Spyke Developer Docs
## Setting Up the Database

### Collation
All collation for text is to be `utf_unicode_ci`. No exceptions, please.
**Everything in Spyke should support Unicode, top to bottom.**
If you are aware of the word *'multibyte'* , please keep your mouth shut.

--------

### TABLE users;
* username	TEXT	[3..30]	|	Default: "Anonymous"
* id		INT				|	Auto-increments.
* pass		TEXT			|	**HASHED.**