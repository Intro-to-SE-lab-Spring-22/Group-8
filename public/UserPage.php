
<?php
# Spyke Main Index
require __DIR__ . '/../vendor/autoload.php';

$Auth = new \Group8\Spyke\Auth;
$PostDB = new \Group8\Spyke\Database\Post;
?>

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="assets/css/UserPage.css">
</head>
<body>


<!-- SETTINGS MODAL -->
<button id="Settings-myBtn">Settings</button>

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

<?php

foreach($PostDB->getFeed() as $post) {
	$Post = new Group8\Spyke\Post($post);
	print $Post->render();
}

?>

<script>
// Get the modal
var modal = document.getElementById("Settings-myModal");

// Get the button that opens the modal
var btn = document.getElementById("Settings-myBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("Settings-modal-close")[0];

// When the user clicks the button, open the modal
btn.onclick = function() {
  modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}
</script>





<!-- CREATE POST MODAL -->
<button id="Post-myBtn">Create post</button>

<!-- The Modal -->
<div id="Post-myModal" class="Post-modal">

  <!-- Modal content -->
  <div class="Post-modal-content">
    <span class="Post-modal-close">&times;</span>

    <form action="/action/post.php" method="post">                                              <!-- TODO -->
    <input type="text" id="content" name="content" placeholder="What's on your mind?"><br>
    <input  type="submit" value="Post">
    </form>
  </div>

</div>

<script>
// Get the modal
var modal = document.getElementById("Post-myModal");

// Get the button that opens the modal
var btn = document.getElementById("Post-myBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("Post-modal-close")[0];

// When the user clicks the button, open the modal
btn.onclick = function() {
  modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}
</script>


<!-- FRIENDS TAB  right side under header-->


<!-- PENDING TAB right side, under friends-->

<!-- POSTS TAB -  Middle of screen-->


</body>
</html>
