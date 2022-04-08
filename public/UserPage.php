
<?php
# Spyke Main Index
require __DIR__ . '/../vendor/autoload.php';

$Auth = new \Group8\Spyke\Auth;


?>



<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="assets/css/UserPage.css">

</head>
<body>
<script src="assets/js/UserPage.js"></script>
<header>
<!-- SETTINGS MODAL -->
<h2> settings button</h2>
<button id="Settings-myBtn"><img src="assets/img/Settings_Button.jpg"></button>

<!-- The Modal -->
<div id="Settings-myModal" class="Settings-modal">

	<!-- Modal content -->
	<div class="Settings-modal-content">
		<span class="Settings-modal-close">&times;</span>
		<button onclick="">View Newest Posts</button>			<!-- TODO -->
		<p></p>
		<button>View Most Liked Posts</button>					<!-- TODO -->
		<p></p>
		<button>Logout</button>
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

<main>

<div class="AddPost"> 
<!-- POSTS TAB -  Middle of screen-->
<h2>Post</h2>
<button id="Post-myBtn">Create post</button>

<!-- The Modal -->
<div id="Post-myModal" class="Post-modal">

	<!-- Modal content -->
	<div class="Post-modal-content">
		<span class="Post-modal-close">&times;</span>
			
		<form action="/action_page.php">                                              <!-- TODO -->
		<input type="text" id="Pdata" name="Pdata" value="What's on your mind?"><br>
		<input  type="submit" value="Post">
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


<script type="text/javascript">
	var L = ["a", "b", "c","d"]; // TODO Create method of storing usernames from username database in list
GetFriendorPendingList("Friends",L);          
</script>


</div>

</div>



<div id="pending">
<!-- PENDING TAB right side, under friends--> 
<div id="pending-title">Requests</div>
<div id="pending-content">
<ul id="Pending"></ul>



<!-- TODO set data equal to an array of friends from friends db -->
<script type="text/javascript">
 var L = ["a", "b", "c","d"];
GetFriendorPendingList("Pending",L);          
</script>




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



</body>
</html>
