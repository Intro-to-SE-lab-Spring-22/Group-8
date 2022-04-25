
<?php
# Spyke Main Index
require __DIR__ . '/../vendor/autoload.php';

$Auth = new \Group8\Spyke\Auth;
 session_start();
 echo $_SESSION["User"]; 

?>



<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="assets/css/UserPage.css">

</head>
<body>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.4/jquery.min.js"></script>
<script src="assets/js/UserPage.js"></script>

<header>
<!-- SETTINGS MODAL -->

<button id="Settings-myBtn"><img src="assets/img/icon-ios7-gear-512.webp"></button>

<!-- The Modal -->
<div id="Settings-myModal" class="Settings-modal">

	<!-- Modal content -->
	<div class="Settings-modal-content">
		<span class="Settings-modal-close">&times;</span>
		<button id="vnp">View Newest Posts</button>			<!-- TODO -->
		<p></p>
		<button id="vlp">View Most Liked Posts</button>					<!-- TODO -->
		<p></p>
		<button onclick="Logout()">Logout</button>
	</div>

</div>

<script type= "text/javascript">
var smodal = document.getElementById("Settings-myModal");
var sbtn = document.getElementById("Settings-myBtn");
var svnp = document.getElementById("vnp");
var svlp = document.getElementById("vlp");
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
svnp.onclick = function(){
	ViewNewestPost();
}
svlp.onclick = function() {
	ViewPopularPost();
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


<script type="text/javascript">
//    ID , Author, Content, Hidden?, Timestamp, Likes, Dislikes. 

var Post1 = [19, 2,"Alphabet soup is great! " , false, 0 , 5 , 1 ];
var Post2 = [24, 3,"Alphabet soup is meh! " , false, 1 , 3 , 3 ];
var Post3 = [112, 4,"Alphabet soup is bad! " , false, 2 , 1 , 5 ];

ShowPost(Post1);
ShowPost(Post2);
ShowPost(Post3);
</script>

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
