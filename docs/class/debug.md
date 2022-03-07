# Spyke Developer Docs
## The *Debug* Class

The Debug class can create verbose logs easily
for better debugging and event monitoring.

### Setup
`$Debugger = new Group8\Spyke\Debug($user, $id)`
##### Arguments
| Type 	| Variable 	| Default     	| Note                                     	|
|------	|----------	|-------------	|------------------------------------------	|
| str  	| `$user`  	| "Anonymous" 	| A username *(spaces become underscores)* 	|
| int  	| `$id`    	| null        	| A user ID                                	|

If there is a user interacting with an event that needs to be logged, you may
specify an identity when creating the *Debug* object.

### log($message, $error, $from, $httpStatusInt)
##### Arguments
| Type 	| Variable         	| Default 	| Note                             	|
|------	|------------------	|---------	|----------------------------------	|
| str  	| `$message`       	|         	| Your statement                   	|
| bool 	| `$error`         	| false   	| Did an error cause this log?     	|
| str  	| `$from`          	| null    	| Categorize and identify this log 	|
| int  	| `$httpStatusInt` 	| null    	| An accompanying HTTP status code 	|

##### Example:
```php
$Debugger = new Group8\Spyke\Debug("Bo", 380)

$Debugger->log("Only a message.");
$Debugger->log("A message with no sender, but a status code.", false, null, 404);
$Debugger->log("A message with everything!", false, "Test", 200);
```
##### Log Output:
````log
- 380 Bo [18:33:18] "Only a message." - -
- 380 Bo [18:33:18] "A message with no sender, but a status code." 404 -
- 380 Bo [18:33:18] "[Test] A message with everything!" 200 -
````
* [!] The extra dashes '-' before and after the log are intentional.