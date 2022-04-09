# Spyke Developer Docs
## Friends

Friends internally can be of these states:

### Internally
Each relationship between two users is stored on one table.
Between any two people, one is 'Adam' and one is 'Eve'.

*Adam* is the user with the *lower* ID,
and *Eve* is the user with the *higher* ID.

Beyond that, there is no relevance to the order of the two users.

*strangers*, or more accurately **null** in which no row is set.

**adam-asks**,	'Adam' has asked 'Eve' to be friends.
**eve-asks**,	'Adam' has been asked by 'Eve' to be friends.
**friends**,	'Adam' and 'Eve' are mutally confirmed friends.
**adam-blocks**,'Adam' has blocked 'Eve'.
**eve-blocks**,	'Adam' has been blocked by 'Eve'.