# Spyke Developer Docs
## The *Auth* Class

`$Auth = new Group8\Spyke\Auth()`

The *Auth* class is used to authenticate users.

### startSession [static]
Starts a session. This should precede every page.

### login($id) [static]
Sets the session.

### logout [static]
Destroys the session.

### isLoggedIn [static]
Returns true if the user is logged in.

### auth [static]
Returns the current user's ID.

### verifyPassword($id, $password)
Verifies a user-password combo.