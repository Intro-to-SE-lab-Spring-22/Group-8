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
	<script src="assets/js/UserPage.js" defer></script>
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
				<button onclick="">View Newest Posts</button> <!-- TODO -->
				<p></p>
				<button>View Most Liked Posts</button> <!-- TODO -->
				<p></p>
				<button>Logout</button>
			</div>
		</div>
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
					<form action="/action_page.php">
						<!-- TODO -->
						<input type="text" id="Pdata" name="Pdata" value="What's on your mind?"><br>
						<input type="submit" value="Post">
					</form>
				</div>
			</div>
		</div>

	</main>

	<aside>
		<div id="friends">
			<!-- FRIENDS TAB  right side under header-->

			<div id="friends-title">Friends</div>
			<div id="friends-content">
				<ul id="Friends"></ul>
			</div>

		</div>

		<div id="pending">
			<!-- PENDING TAB right side, under friends-->
			<div id="pending-title">Requests</div>
			<div id="pending-content">
				<ul id="Pending"></ul>

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