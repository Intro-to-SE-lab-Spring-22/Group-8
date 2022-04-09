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

### verifyPassword($id, $password)
Verifies a user-password combo.