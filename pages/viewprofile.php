<?php
if($_GET['id']){
	//Include users class
    require_once('classes/users.classes.php');

    //Get user details
    $userObj = new users($DBH); //Lets pass through our DB connection
    $userProfile = $userObj->getUser($_GET['id']); //Call the getUser function

}else{
	//Display error
	$error = "No user id defined.";
}
?>
<div class="container card mt-5">
      <div class=”card-body”>
	<?php
		if($error){
			echo "<h1>Error!</h1>";
			echo "<p>".$error."</p>";
		}else{
	?>
	
	<h1><?php echo $userProfile['user_forename']; ?></h1>

    <img id="profileImage" class="profileImage" src="./user_images/<?php echo $userProfile['user_profile_image']; ?>"/>

    <p><strong>Gender:</strong> <?php echo $userProfile['user_gender']; ?></p>
    <p><strong>Country:</strong> <?php echo $userProfile['user_country']; ?></p>
    <br />
    <p><strong>Favorite Quote:</strong> <?php echo $userProfile['user_favorite_quote']; ?></p>
    <p><strong>Favorite Colour:</strong> <?php echo $userProfile['user_favorite_colour']; ?></p>
    <p><strong>Hobbies:</strong> <?php echo $userProfile['user_hobbies']; ?></p>

	<?php } ?>
    </div>
</div>
