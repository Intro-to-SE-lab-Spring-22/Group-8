# Spyke Developer Docs
## The *Post* Subclass for *Database*

`$PostDB = new Group8\Spyke\Database\Post()`

The *Post* class extends *Database* to provide common user functions
as easily callable methods.

### createPost($postedByID, $content) -> bool
Creates a new post attributed to the user `$postedByID`.

Returns `true`	on success.
Returns `false`	on failure.

*The password is hashed and salted before being inserted into the database.*
*ID generation is handled by the database.*

### getPost() -> array
Returns an array of the post's details.
* id
* author
* content
* hidden
* timestamp
* likes
* dislikes

### getFeed($id, $page, $author) -> array -> array
`$id` is the user who this feed is generated for.
Get a homepage, optionally fitted for a user, of posts.
Seperated in pages.

### checkRequirements($content) -> bool
Checks if a post meets the requirements for being posted.

### deletePost($id) -> bool
Deletes a post by its ID