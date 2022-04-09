# Spyke API v1
## Post

**post.php** exists to create new posts.

### POST Variables
| Variable		| Type   | Description					|
| -------------	| ------ | ----------------------------	|
| **content**	| string | The content of the new post	|

### Response
On success, a 204 will be returned and the author will be
redirected to the user page.

On failure, an error code is provided.