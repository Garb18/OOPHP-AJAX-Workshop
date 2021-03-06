<!doctype html>

<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <title>TODO List Application</title>     
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
	<link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-beta/css/bootstrap.min.css">
	<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-beta/js/bootstrap.js"></script>    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="css/style.css">   
    
    <script src="js/index.js"></script> 
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">Todo List App</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="index.php?p=home">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="index.php?p=dashboard">View Dashboard</a>
            </li>
            <li class="nav-item">
                <?php echo'<a class="nav-link" href="index.php?p=viewprofile&id='. $_SESSION['userData']['user_id'] .'">View Profile</a>'?>
            </li>
            <li class="nav-item">
                <?php echo'<a class="nav-link" href="index.php?p=editprofile&id='. $_SESSION['userData']['user_id'] .'">Edit Profile</a>'?>
            </li>
        </ul>
        <ul class="navbar-nav navbar-right">
            <?php if($_SESSION['loggedin']){ ?>
                <li class="nav-item"><a class="nav-link" href="index.php?p=logout">Logout</a></li>
            <?php }else{ ?>
                <li class="nav-item"><a class="nav-link" href="index.php?p=login">Login</a></li>
                <li class="nav-item"><a class="nav-link" href="index.php?p=register">Register</a></li>
            <?php } ?>
        </ul>
    </div>
</nav>
