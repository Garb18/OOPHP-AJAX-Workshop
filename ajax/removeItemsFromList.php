<?php
    require_once('../includes/db.php');
    require_once('../classes/lists.classes.php');

    if($_POST['itemid']){
        $todoListsObj = new todoLists($DBH);
        echo $todoListsObj->removeItemFromList($_POST['itemid']);
    }
?>
