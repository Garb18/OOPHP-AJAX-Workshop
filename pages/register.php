<?php
    if(isset($_POST['email']) || isset($_POST['password']))
    {
        //Check email/password is inputted
        if(!$_POST['email'] || !$_POST['password'])
        {
            $error = "Please enter an email and password";
        }        
        //Check password matches security requirements thorough a REGEX
        //Checks for length between 8-20, contains a lower and upper case character, and a number
        //Accredited to Imtiaz Epi
        //https://www.imtiazepu.com/password-validation/
        if (!preg_match("#.*^(?=.{8,20})(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9]).*$#", $_POST['password']))
        {
            $error = "Your password must contain a lower case letter, upper case letter, number, and be longer than 8 characters";
        }
        //Checks for valid email address entered
        //Accredited to W3Schools
        //https://www.w3schools.com/php/php_form_url_email.asp 
        if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL))
        {
            $error = "Please enter a valid email";
        }
        //Insert User if no errors
        if(!$error)
        {
            //No errors - let’s create the account
            //Encrypt the password with a salt
            $encryptedPass = password_hash($_POST['password'], PASSWORD_DEFAULT);
            //Insert DB
            $query = "INSERT INTO users(user_email, user_password) VALUES(:email, :password)";
            $result = $DBH->prepare($query);
            $result->bindParam(':email', $_POST['email']);
            $result->bindParam(':password', $encryptedPass);
            $result->execute();
        
            $to = $_POST['email'];
            $subject = "Welcome to our TODO List";
        
            $message = "
            <html>
            <head>
            <title>Welcome to our TODO list</title>
            </head>
            <body>
            <p>Welcome to our todo list application!</p>
            </body>
            </html>";
        
            // Always set content-type when sending HTML email
            $headers = "MIME-Version: 1.0" . "\r\n";
            $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
        
            // More headers
            $headers .= 'From: <garb1_18@student.worc.ac.uk>' . "\r\n";
        
            mail($to,$subject,$message,$headers);
        

            echo "<script> window.location.assign('index.php?p=registersuccess'); </script>";
        }
	}
?>
<div class="container">
<h1>Register</h1>
	<form action="index.php?p=register" method="post">
    <?php
 if($error)
    {
	    echo '<div class="alert alert-danger" role="alert">
	    <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
	    <span class="sr-only">Error:</span>
	    '.$error.'
	    </div>'; 
    } 
?>
		<div class="form-group">
			<label for="email">Email address</label>
			<input type="email" class="form-control" id="email" name="email" placeholder="email">
		</div>
		<div class="form-group">
			<label for="password">Password</label>
			<input type="password" class="form-control" id="password" name="password" placeholder="password">
		</div>
		<button type="submit" class="btn btn-default">Register</button>
	</form>
</div>


