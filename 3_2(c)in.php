<?php

if (isset($_POST['btn'])) {
    switch ($_POST['btn']) {
        case 'Send2':
            if($_POST['firstname'] && && $_POST['age'] && $_POST['salary']) {
                $user = ['firstname' => $_POST['firstname'], 'age' => $_POST['age'], 'salary' => $_POST['salary']];
                $_SESSION['user'] = $user;
                exit("<meta http-equiv='refresh' content='0; url=3_2(c)out.txt'>");
            }
    }
}
?>
<form action="" method="get">
    <input type="text" name="firstname" placeholder="Enter your firstname">
    <input type="text" name="age" placeholder="Enter your age">
    <input type="text" name="salary" placeholder="Enter your salary">
    <input type="submit">
</form>