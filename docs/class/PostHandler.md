# Spyke Developer Docs
## The *PostHandler* Class
The PostHandler class extends the `Database\Post` class.
All docs there apply.

### Setup
`$PostHandler = new Group8\Spyke\PostHandler()`

### Feed Renderers
The PostHandler class provides a simple way managing feeds
and collections of posts. There are multiple built-in ways
to render feeds.

#### feedByTime		(Desc [bool], Page [int], Author[int])
#### feedByLikes	(Desc [bool], Page [int], Author[int])
#### feedByScore	(Desc [bool], Page [int], Author[int])
#### feedByAuthor	(Author[int], Desc [bool], Page [int])*
* *Note:*	feedByAuthor is equivalent to feedByTime
			with the *Author* argument explicitly set.