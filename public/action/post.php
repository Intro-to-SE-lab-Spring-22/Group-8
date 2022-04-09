<?php
require __DIR__ . '/../../vendor/autoload.php';
use Group8\Spyke\Auth;
Auth::startSession();

//! Spyke User Actions
//! Create Posts

$PostDB = new Group8\Spyke\Database\Post();
$UserDB = new Group8\Spyke\Database\User();
$Logger = new Group8\Spyke\Log();

$content = $_POST["content"]; //?	The body of the post
$username = $UserDB->getUsername(Auth::user()) ?? "Anonymous";

//

if (Auth::isLoggedIn()) {
    $postSuccess = $PostDB->createPost(Auth::user(), $content);
    if ($postSuccess) {
        $Logger->changeUser(Auth::user(), $username);
        $Logger->add("Post #{$postSuccess} created!", false, $username, 201);
		http_response_code(204);
        header("Location: ../UserPage.php"); //!	Redirect to the main page?
    } else {
        // The requirements were valid, but there was a database error.
        $Logger->add("Post creation failure", true, "User", 500);
		http_response_code(500);
        echo '<script>alert("There was a server side error, please try again later."), window.location.replace("https://spyke.msstate.wolfgang.space/");</script>';

    }
} else {
    // The new user did not meet all requirements.
	$Logger->add("Post creation failure: {$errorMsg}", true, "User", 400);
	http_response_code(400);
}
