# Spyke Developer Docs
## The *Render* Class

`$Renderer = new Group8\Spyke\Render()`

### add
*Arguments*
* str:	content

#### content
Appends to the <body> tag. This allows incremental additions to the body.

**Example:**
```php
	$Renderer->add("<h1>Foo</h1>");
	$Renderer->add("<h2>Bar</h2>");
```
*Output:*
```buffer
<h1>Foo</h1>\n
<h2>Bar</h2>
```

### build
*Arguments*
* str:	title = `null`
* bool:	exitAfterBuild = `false`

**Example:**
```php
	$Renderer->build("Login", false);
```
*Output:*
A full HTML page with the <title> "Spyke - Login",
and due to `exitAfterBuild`, more code can be run.
