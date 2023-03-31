<?php
if (isset($_REQUEST['lastname']) and isset($_REQUEST['firstname']) and isset($_REQUEST['age']))
{
    $lastname = strip_tags($_REQUEST['lastname']);
    $firstname = strip_tags($_REQUEST['firstname']);
    $age = strip_tags($_REQUEST['age']);
    echo 'Hello, ' . $lastname . ', ' . $firstname . '<br>Your age is: ' . $age;
}
?>

<form action="" method="get">
    <input type="text" name="lastname" placeholder="Enter your lastname">
    <input type="text" name="firstname" placeholder="Enter your firstname">
    <input type="text" name="age" placeholder="Enter your age">
    <input type="submit">
</form>