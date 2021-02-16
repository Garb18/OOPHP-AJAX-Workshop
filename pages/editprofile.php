<?php
	if(!$_SESSION['loggedin']){
		//User is not logged in
		echo "<h1>Access Denied</h1>";
		echo "<script> window.location.assign('index.php?p=login'); </script>";
		exit;
	}
?>
<div class="container card mt-5">
     <div class=”card-body”>
	<h1>Edit your profile</h1>
	<p>Complete the form below to edit your public profile.</p>

	<?php

    		//Include users class
    		require_once('classes/users.classes.php');
    		$userObj = new users($DBH); //Lets pass through our DB connection

    		if(isset($_POST['submit'])){

    			//Upload Image Here

    			$updateUserProfile = $userObj->updateUser($_SESSION['userData']['user_id'], $_POST['name'], $_POST['country'], $_POST['hobbies'], $_POST['gender'], $_POST['quote'], $_POST['colour'], $_FILES['profile_image']); //Call the updateUser function

    			if($updateUserProfile){
    				echo '<div class="alert alert-success" role="alert">Your profile has been updated!</div>';
    			}
    			
    		}

    		//Get current values
    		$userProfile = $userObj->getUser($_SESSION['userData']['user_id']); //Call the getUser function

    	?>

    	<form method="post" action="" enctype="multipart/form-data">
    		<div class="form-group">
    			<label for="name">Name</label>
    			<input type="text" class="form-control" id="name" name="name" value="<?php echo $userProfile['user_forename']; ?>">
    		</div>
    		<div class="form-group">
    			<label for="profile_image">Profile Photo</label>
    			<input type="file" name="profile_image" id="profile_image">
    			<p class="help-block">Upload a photo of yourself for your profile.</p>
    		</div>
    		<div class="form-group">
    			<label for="gender">Gender</label>
    			<input type="text" class="form-control" id="gender" name="gender" value="<?php echo $userProfile['user_gender']; ?>">
    		</div>
    		<div class="form-group">
    			<label for="country">Country</label>
    			<input type="text" class="form-control" id="country" name="country" value="<?php echo $userProfile['user_country']; ?>">
    		</div>
    		<div class="form-group">
    			<label for="quote">Favorite Quote</label>
    			<input type="text" class="form-control" id="quote" name="quote" value="<?php echo $userProfile['user_favorite_quote']; ?>">
    		</div>
    		<div class="form-group">
    			<label for="colour">Favorite Colour</label>
    			<input type="text" class="form-control" id="colour" name="colour" value="<?php echo $userProfile['user_favorite_colour']; ?>">
    		</div>
    		<div class="form-group">
    			<label for="hobbies">Hobbies</label>
    			<input type="text" class="form-control" id="hobbies" name="hobbies" value="<?php echo $userProfile['user_hobbies']; ?>">
    		</div>
    		<button type="submit" name="submit" class="btn btn-default">Update Profile</button>
    	</form>
      </div>
</div>
