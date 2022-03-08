# Spyke Developer Docs
## The *Database* Class

`$DB = new Group8\Spyke\Database()`

The *Database* class provides higher-level functionality and access to the
database, a PDO object.

### $pdo (PDO)
Normal PDO methods can be called directly through *Database*'s public `$pdo`.

### query(...$args)
Pipes all arguments to the PDO object `$this->pdo`.  \
`$DB->query(...$args)` is **1:1 identical** to calling `$DB->pdo->query(...$args)`
