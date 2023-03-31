<?php

if (!empty($_REQUEST['text']))
{
    $str = $_REQUEST['text'];
    $strLen = strlen($str);
    $wordsCount = count(explode(' ', $str));
    $spaceCount = $wordsCount - 1;
    echo 'There's in the text ' . $wordsCount . ' words and ' . $strLen . ' symbols' ;
}
?>
<form action="" method="get">
    <textarea name="text" placeholder=""> hello there</textarea>
    <input type="submit">
</form>