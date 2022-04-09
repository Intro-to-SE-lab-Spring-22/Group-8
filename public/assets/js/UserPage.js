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
	
	}
	else{

	let post = document.createElement("article");
	post.style.display = "none";
	post.setAttribute("id", postArr[0]);
	let author = document.createElement("div");
	author.innerText = "Created by: " + postArr[1];
	let content = document.createElement("p");
	content.innerText = postArr[2];
	let likeButton = document.createElement("button");
	likeButton.innerText = "Likes: ";
	let likes = document.createElement("p");
	likes.innerText = postArr[5];
	let time = document.createElement("p");
	time.innerText = "Timestamp: "+ postArr[4];
	let dislikeButton = document.createElement("button");
	dislikeButton.innerText = "Dislikes: ";
	let dislikes = document.createElement("p");
	dislikes.innerText = postArr[6];

	post.appendChild(author);
	post.appendChild(content);
	post.appendChild(time);
	post.appendChild(likeButton);
	post.appendChild(likes);
	post.appendChild(dislikeButton);
	post.appendChild(dislikes);
	let mainscreen = document.getElementById("1234");
	mainscreen.appendChild(post);
	post.style.display = "block";
	console.log("ShowPost Run");



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

var smodal = document.getElementById("Settings-myModal");
var sbtn = document.getElementById("Settings-myBtn");
var svnp = document.getElementById("vnp");
var svlp = document.getElementById("vlp");
var sspan = document.getElementsByClassName("Settings-modal-close")[0];
sbtn.onclick = function() {
	OpenModal(smodal);
}
sspan.onclick = function() {
	CloseModal(smodal);
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
	if (event.target == smodal) {
		CloseModal(smodal);
	}
}
svnp.onclick = function() {
	ViewNewestPost();
}
svlp.onclick = function() {
	ViewPopularPost();
}
// Get the modal
var pmodal = document.getElementById("Post-myModal");
var pbtn = document.getElementById("Post-myBtn");
var pspan = document.getElementsByClassName("Post-modal-close")[0];
pbtn.onclick = function() {
	pmodal.style.display = "block";
}
pspan.onclick = function() {
	CloseModal(pmodal);
}
window.onclick = function(event) {
	if (event.target == pmodal) {
		CloseModal(pmodal);
	}
}

//    ID , Author, Content, Hidden?, Timestamp, Likes, Dislikes. 

var Post1 = [19, 2, "Alphabet soup is great! ", false, 0, 5, 1];
var Post2 = [24, 3, "Alphabet soup is meh! ", false, 1, 3, 3];
var Post3 = [112, 4, "Alphabet soup is bad! ", false, 2, 1, 5];

ShowPost(Post1);
ShowPost(Post2);
ShowPost(Post3);

var L = ["a", "b", "c", "d"]; // TODO Create method of storing usernames from username database in list
GetFriendList("Friends", L);

var L = ["a", "b", "c", "d"];
GetPendingList("Pending", L);