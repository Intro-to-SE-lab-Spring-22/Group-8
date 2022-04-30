
<?php
# Spyke Main Index
require __DIR__ . '/../vendor/autoload.php';

$Auth = new \Group8\Spyke\Auth;
 session_start();
 $loggedin =$_SESSION["User"]; 

?>



<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link id = "style" rel="stylesheet" type="text/css" href="assets/css/UserPage.css">

</head>
<body>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.4.4/jquery.min.js"></script>
<script src="assets/js/UserPage.js"></script>
<script>
	$(document).ready(function log(argument) {
		$.post("action/feed.php", function(data){
			console.log(JSON.stringify(data));
		});
		// body...
	})
</script>


<header>
<!-- SETTINGS MODAL -->
<a id="UserPageButton" href="userProfileEditor.php"><img class="profile" src="assets/img/basic-profile-picture_5.jpg" style="top: 0px;position: fixed;right: 10px;height: 10vh;width: 10vh;"></a>
<button id="Settings-myBtn"><img class="settings" src="assets/img/icon-ios7-gear-512.webp"></button>

<!-- The Modal -->
<div id="Settings-myModal" class="Settings-modal">

	<!-- Modal content -->
	<div class="Settings-modal-content">
		<span class="Settings-modal-close">&times;</span>
		<form action="action/search.php" method="post">
		<input type="text">User number</input>
		<button type="submit">search</button>	
		</form>		<!-- TODO -->
		<p></p>
		<button id="vlp">View Most Liked Posts</button>					<!-- TODO -->
		<p></p>
		<button onclick="darkmodeToggle()">Dark mode</button>
		<p></p>
		<button onclick="Logout()">Logout</button>
	</div>

</div>

<script type= "text/javascript">
var smodal = document.getElementById("Settings-myModal");
var sbtn = document.getElementById("Settings-myBtn");

var sspan = document.getElementsByClassName("Settings-modal-close")[0];
sbtn.onclick = function() { OpenModal(smodal); }
sspan.onclick = function() {
	CloseModal(smodal);
	}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
	if (event.target == smodal) {
		CloseModal(smodal);
	}
}

</script>


</header>

<main id="mainBody">

<div class="AddPost"> 
<!-- POSTS TAB -  Middle of screen-->
<h2>Post</h2>
<button id="Post-myBtn">Create post</button>

<!-- The Modal -->
<div id="Post-myModal" class="Post-modal">

	<!-- Modal content -->
	<div class="Post-modal-content">
		<span class="Post-modal-close">&times;</span>
			
		<form action="action/post.php" method="post">                                              <!-- TODO -->
		<input type="text" name="content" value="What's on your mind?"><br>
		<input  type="submit" value="Post" onclick="RefreshPosts()">
		</form> 
	</div>

</div>


<script type="text/javascript">
// Get the modal
var pmodal = document.getElementById("Post-myModal");
var pbtn = document.getElementById("Post-myBtn");
var pspan = document.getElementsByClassName("Post-modal-close")[0];
pbtn.onclick = function() {	pmodal.style.display = "block"; }
pspan.onclick = function() { CloseModal(pmodal); }
window.onclick = function(event) {
	if (event.target == pmodal) {
		CloseModal(pmodal);
	}
}

</script>
</div>




</main>

<aside>
<div id="friends">
<!-- FRIENDS TAB  right side under header-->

<div id = "friends-title">Friends</div>
<div id="friends-content">
<ul id="Friends"></ul>





</div>

</div>



<div id="pending">
<!-- PENDING TAB right side, under friends--> 
<div id="pending-title">Requests</div>
<div id="pending-content">
<ul id="Pending"></ul>



<!-- TODO set data equal to an array of friends from friends db -->





</div>
</div>
<div id="UserModal" class="UserModal">
<div id="UserModalContent" class="UserModalContent">
<p id="UserModalText"></p>
<button id="CloseButton">Close</button>
<button id="ViewPosts">View User Posts</button>
<button id="Add/Remove"></button>
</div>
</div>

</aside>

<form id="Friend-form" action="action/friends.php" method="Post">
<input type="hidden" name="user_b">
<input type="hidden" name="user_a">
<input type="hidden" name="action" value="add">
	
</form>

</body>
</html>
