
// JQUERY AND AJAX IMPLEMENTATION

$(document).ready(function(){  // Debugging only:  init jquery
    
	RefreshPosts();
	
});

function UpdateFriends(){
	/* TODO 
	   AJAX get method to retrieve users from action/Friend.php. 
	*/
	$.get("action/friend.php",{action: "getMyFriends"}, function(data){
	 var result = $.parseJSON(JSON.stringify(data));
	 console.log(result);
	 
	});
	
	/*
	   .done() store the json results and console.log results
	*/ 
}

function AddFriend(User_B){
	console.log("AddFriend_run");
	$.post("action/friend.php", {friend: User_B, action: "add"});
	
	
}

function RefreshPosts(){
$.post("action/feed.php", function(data){
		var resultArr = [];
		for (var i = 0; i < data.length; i++){
			var obj = data[i];
			console.log(i +" : "+ obj);
			resultArr.push(obj.id);
			resultArr.push(obj.author);
			resultArr.push(obj.content);
			resultArr.push(obj.hidden);
			resultArr.push(obj.timestamp);
			resultArr.push(obj.likes);
			resultArr.push(obj.dislikes);
			console.log("ResultArr: "+resultArr);
			ShowPost(resultArr);
			resultArr = [];
		}
		

		/*
		for(var i = 0; i < data.length; i++) {
			var obj = data[i];

			resultArr.push(obj.id);
			console.log(resultArr);
		}
		*/
	});

}



// TODO: Implement document.ready function that grabs username from friend table
//TODO  Implemefnt document.ready function that grabs username from pending table
//TODO Implement document.ready function that grabs posts from post database
//TODO Implement get function that retrieves 

// JAVASCRIPT FUNCTIONS

function GetFriendList(ULName, FriendList){
	let friendData = FriendList;
	let list = document.getElementById(ULName);
	friendData.forEach((item) =>{
		let li = document.createElement("li");
		let btn = document.createElement("button");
			btn.onclick = function(event){
				CreateFriendModal(btn);
			}
		btn.innerText = item; 
		li.appendChild(btn);
		list.appendChild(li);

		

	});	
}

function CreateFriendModal(button){
		let modal = document.getElementById("UserModal");
		let modalContent = modal.children[0];
		let modalText = modalContent.children[0];
		let CloseModal = document.getElementById("CloseButton");
		console.log(CloseButton);
		let Viewpost = document.getElementById("ViewPosts");
		console.log(Viewpost);
		let RemoveFriend = document.getElementById("Add/Remove");
		RemoveFriend.innerText = "Remove Friend";
		console.log(RemoveFriend);
		CloseModal.onclick = function(event){
			modal.style.display="none";
			
		}
		console.log("CreateFriendModal");

		modalText.innerText ="This is a Friend modal for "+button.innerText;
		
		modal.style.display="block";
}



function GetPendingList(ULName, FriendList){
	let friendData = FriendList;
	let list = document.getElementById(ULName);
	friendData.forEach((item) =>{
		let li = document.createElement("li");
		let btn = document.createElement("button");
			btn.onclick = function(event){
				CreatePendingModal(btn);
			}
		btn.innerText = item;
		li.appendChild(btn);
		list.appendChild(li);

		

	});	
}

function CreatePendingModal(button){
		let modal = document.getElementById("UserModal");
		let modalContent = modal.children[0];
		let modalText = modalContent.children[0];
		let CloseModal = document.getElementById("CloseButton");
		console.log(CloseButton);
		let Viewpost = document.getElementById("ViewPosts");
		Viewpost.onclick = function(event){
			ViewUserPost(button.innerText);
		}
		console.log(Viewpost);
		let AddFriend = document.getElementById("Add/Remove");
		AddFriend.innerText = "Add Friend";
		console.log(AddFriend);
		CloseModal.onclick = function(event){
			modal.style.display="none";
			
		}
		console.log("CreateFriendModal");

		modalText.innerText ="This is a Pending modal for "+button.innerText;
		
		modal.style.display="block";
}



function ShowPost(postArr){
	if(postArr[3]){
	console.log("ShowPost Run hidden");

	}
	else{
	let actualTime = new Date(postArr[4] *1000);
	let post = document.createElement("article");
	post.style.display = "none";
	post.setAttribute("id", postArr[0]);
	let author = document.createElement("div");
	author.innerText = "Created by: " + postArr[1];
	let content = document.createElement("p");
	content.innerText = postArr[2];
	let likeButton = document.createElement("button");
	likeButton.innerText = "Like";
	let likes = document.createElement("p");
	likes.innerText = postArr[5];
	let time = document.createElement("p");
	time.innerText = "Posted: "+ actualTime.toLocaleString('en-US');
	let dislikeButton = document.createElement("button");
	dislikeButton.innerText = "Dislike";
	let dislikes = document.createElement("p");
	dislikes.innerText = postArr[6];

	post.appendChild(author);
	post.appendChild(content);
	post.appendChild(time);
	post.appendChild(likeButton);
	post.appendChild(likes);
	post.appendChild(dislikeButton);
	post.appendChild(dislikes);
	let mainscreen = document.getElementById("mainBody");
	mainscreen.appendChild(post);
	post.style.display = "block";
	console.log("ShowPost Run");



	}
}


function SwapCss(sheet){
	document.getElementById("style").setAttribute("href",sheet);
}

function darkmodeToggle(){
	var currentstyle = document.getElementById("style").getAttribute("href");
	if(currentstyle == "assets/css/UserPage.css"){
		SwapCss("assets/css/UserPageDarkmode.css");
	}
	else{
		SwapCss("assets/css/UserPage.css")
	}
}



function CloseModal(modal){
	modal.style.display ="none";
}
function OpenModal(modal){
	modal.style.display="block";
}

function ViewNewestPost(){
	// feed db query to view newest posts

}

function ViewPopularPost(){
	// feed db query to view most liked posts

}
function Logout(){
	window.location.replace("https://spyke.msstate.wolfgang.space");
}


function ViewUserPost(Username){
 	//Username -> user ID
 	// feed db query for post only made by user ID

}
/*
 let fdata = ["Ram", "Shyam", "Sita", "Gita", "iwantdie"];
	
			let list = document.getElementById("Friends");
	
			fdata.forEach((item) => {
				let li = document.createElement("li");
				let btn = document.createElement("button");
		btn.innerText = item;
				li.appendChild(btn);
				list.appendChild(li);
			});


*/
