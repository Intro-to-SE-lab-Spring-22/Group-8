
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

<script>
// Get the modal
var smodal = document.getElementById("Settings-myModal");

// Get the button that opens the modal
var sbtn = document.getElementById("Settings-myBtn");

// Get the <span> element that closes the modal
var sspan = document.getElementsByClassName("Settings-modal-close")[0];

// When the user clicks the button, open the modal 
sbtn.onclick = function() {
	smodal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
sspan.onclick = function() {
	smodal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
	if (event.target == smodal) {
		smodal.style.display = "none";
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


<script>
// Get the modal
var pmodal = document.getElementById("Post-myModal");

// Get the button that opens the modal
var pbtn = document.getElementById("Post-myBtn");

// Get the <span> element that closes the modal
var pspan = document.getElementsByClassName("Post-modal-close")[0];

// When the user clicks the button, open the modal 
pbtn.onclick = function() {
	pmodal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
pspan.onclick = function() {
	pmodal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
	if (event.target == pmodal) {
		pmodal.style.display = "none";
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


<script src="assets/js/UserPage.js">
	L = ["a", "b", "c","d"];
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
<script src="assets/js/UserPage.js">
	L = ["a", "b", "c","d"];
GetFriendorPendingList("Pending",L);          
</script>

</div>
</div>

</aside>



</body>
</html>
