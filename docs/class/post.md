# Spyke Developer Docs
## The *Post* Class

The Post class provides a simple way of managing, manipulating,
and rendering individual Spyke posts.

### Setup
`$Post = new Group8\Spyke\Post($values)`
##### $values Arguments
| Type 	| Variable 		| Default		| Note									 	|
|------	|--------------	|--------------	|------------------------------------------	|
| int	| `$id`			| null			| The unique ID of this post.			 	|
| int	| `$author`		| 0				| The ID of the user who created this post.	|
| str	| `$username`	| "Anonymous"	| The content of this post.					|
| str	| `$content`	| ""			| The content of this post.		 			|
| bool	| `$hidden`		| false 		| Whether or not this post is hidden.	 	|
| int	| `$timestamp`	| *time()*		| The time this post was created.	 		|
| int	| `$likes`		| 0 			| The number of likes this post has.	 	|
| int	| `$dislikes`	| 0 			| The number of dislikes this post has.		|


### render
Renders a post as HTML.
`$Post->render()`
