


function GetFriendList(){

}
function GetPedningList(){

}
function GetFriendorPendingList(ULName, FriendList){
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
		console.log(RemoveFriend);
		CloseModal.onclick = function(event){
			modal.style.display="none";
			
		}
		console.log("CreateFriendModal");

		modalText.innerText ="This is a modal for "+button.innerText;
		
		modal.style.display="block";
}


function createPosts(){
	// for each post in list
	// createElement article
	// put posty thing in article
	//repeat.
}

function CloseModal(modal){
	modal.style.display ="none";
}
function OpenModal(modal){
	modal.style.display="block";
}

function ViewNewestPost(){

}

function ViewPopularPost(){

}
function Logout(){

}
function Post(){

}

function ViewUserPost(){

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
