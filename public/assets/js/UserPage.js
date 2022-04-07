

function GetFriendorPendingList(ULName, FriendList){
	let friendData = FriendList;
	let list = document.getElementById(ULName);
	friendData.forEach((item) =>{
		let li = document.createElement("li");
		let btn = document.createElement("button");
		btn.innerText = item;
		li.appendChild(btn);
		list.appendChild(li);

	});
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
