<?php
	if(!$_SESSION['loggedin']){
		//User is not logged in
		echo "<h1>Access Denied</h1>";
		echo "<script> window.location.assign('index.php?p=login'); </script>";
		exit;
	}
	if(isset($_POST['name']))
    {
        //Check email/password is inputted
        if(!$_POST['name'])
        {
            $error = "Please enter a name for your new list";
        }
        //Insert User if no errors
        if(!$error)
        {
            //No errors - let’s create a new list
            //Insert DB
			// Hard code for now - Ask how to access id without seperate query later
            $query = "INSERT INTO lists(user_id, list_name) VALUES(/*:user_id*/1, :name)";
            $result = $DBH->prepare($query);
            //$result->bindParam(':user_id', $_POST['email']);
            $result->bindParam(':name', $_POST['name']);
            $result->execute();
        }
	}
?>


<div class="card container mt-5">
    <div class="card-body">
        <h1>Dashboard</h1>
    	<p>Below are your active todo lists:</p>

    	<ul>
    	<?php
    		$todoListsObj = new todoLists($DBH); //Lets pass through our DB connection
    		$lists = $todoListsObj->geAllListsForUser($_SESSION['userData']['user_id']); //Call the geAllListsForUser function

    		foreach ($lists as $key => $value) { //Loop over returned items
    			echo '<li><a href="index.php?p=list&id='.$value['list_id'].'">'.$value['list_name'].'</a></li>';
    		}
    	?>
    	</ul>

    	<form style="margin-top:45px;" class="form-inline" action="index.php?p=dashboard" method="post">
    		<div class="form-group">
    			<label for="name">Add List</label>
    			<input type="text" class="form-control" id="name" name="name" placeholder="Shopping List">
    		</div>
    		<button type="submit" class="btn btn-default">Add</button>
    	</form>
    </div>
</div>
