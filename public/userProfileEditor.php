<?php 
session_start();
$id = $_SESSION['User'];
//echo var_dump($_SESSION);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/loginreg_style.css">
    <title>User Profile Page</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.4.4/jquery.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            $.post("action/get-bio.php", {"id" : <?= $_SESSION['user']?> }, function(data){
                var resultArr = [];
                for (var i = 0; i < data.length; i++){
                    var obj = data[i];
                    resultArr.push(obj);


                }
        
            });
            var temp = resultArr[2];
            var mySelect = document.getElementById('mySelect');

                for(var i, j = 0; i = mySelect.options[j]; j++) {
                    if(i.value == temp) {
                        mySelect.selectedIndex = j;
                        break;
                    }
                }

        });

    </script>
   <script>
            var loadFile = function(event){
                imageHolder = document.getElementById("output");
                selectedImage = URL.createObjectURL(event.target.files[0]);
                $.post("action/set-image.php", {img : selectedImage}, function(data){
                });
                $.post("action/get-image.php",function(data){
                });
                imageHolder.src = selectedImage;
                };
   
   </script>
    <style>
        .profile-pic {
            color: transparent;
            transition: all 0.3s ease;
            display: flex;
            justify-content: center;
            align-items: center;
            position: relative;
            transition: all 0.3s ease;
        }
        .profile-pic input {
            display: none;
        }
        .profile-pic img {
            position: absolute;
            object-fit: cover;
            width: 165px;
            height: 165px;
            box-shadow: 0 0 10px 0 rgba(255, 255, 255, .35);
            border-radius: 100px;
            z-index: 0;
        }
        .profile-pic .-label {
            cursor: pointer;
            height: 165px;
            width: 165px;
        }
        .profile-pic:hover .-label {
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: rgba(0, 0, 0, .8);
            z-index: 10000;
            color: #fafafa;
            transition: background-color 0.2s ease-in-out;
            border-radius: 100px;
            margin-bottom: 0;
        }
        .profile-pic span {
            display: inline-flex;
            padding: 0.2em;
            height: 2em;
        }
    </style>
</head>
<body>
	<div class="login-form">
		<h1 style="margin-top:100px">User Profile Editor</h1>
        <p>Profile Picture</p>
        <div class="profile-pic">
            <label class="-label" for="file">
                <span class="glyphicon glyphicon-camera"></span>
                <span>Change Image</span>
            </label>
            <input id="file" type="file" onchange="loadFile(event)"/>
            <img  id="output" width="200" src= /><!--change src to current profile pic-->
        </div>
		<form action="action/updateInfo.php" method="post"> <!--update action attribute-->
			<p>First Name </p>
			<input type="text" name="firstname" placeholder="Current First Name"> <!--update placeholder attribute to reflect current state-->
			<p>Last Name</p>
			<input type="text" name="lastname" placeholder="Current Last Name">
            <p>Location</p>
            <input type="text" name="location" placeholder="Current Location">
			<p>Bio</p>
			<textarea name="bio" rows="6" cols="52">CurrentBioCurrentBioCurrentBioCurrentBioCurrentBioCurrentBioCurrentBioCurrentBioCurrentBioCurrentBioCurrentBioCurrentBioCurrentBioCurrentBioCurrentBioCurrentBioCurrentBioCurrentBioCurrentBioCurrentBioCurrentBioCurrentBioCurrentBioCurrentBio</textarea><!--update BioBio with current bio-->
			<p>Gender</p>
			<select name="gender">
                <!--to display current gender add selected attribute to one of the options below. example if person currently is "other":
                    <option value="other" selected>Other</option>
                example if person currently is "pnts":
                    <option value="pnts" selected>Prefer Not To Say</option>
                    -->
                <option value="0">Male</option>
                <option value="1">Female</option>
                <option value="2">Other</option>
                <option value="3">Prefer Not To Say</option>
            </select>


            <hr>
            <button type="submit">Update Profile</button>
		</form>
	</div>


    </form>
</body>
</html>