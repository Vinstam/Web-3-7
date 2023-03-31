<?php
function convertArrayToAdArray($array)
{
$adArray = [];
foreach ($array as $key => $value)
{
$content = file_get_contents('ads/' . $value);
$tmp = preg_split("/\//", $value);
$adItem = [];
array_push($adItem, $tmp[0]);
array_push($adItem, explode('.', $tmp[2])[0]);
array_push($adItem, $content);
array_push($adItem, $tmp[1]);
array_push($adArray, $adItem);
}
return $adArray;
}
function getFiles($dir)
{
    $files = array_diff(scandir($dir), ['..', '.']);
    $result = [];
    foreach ($files as $file) {
        $path = $dir . '/'. $file;
        if (is_dir($path)) {
            $result = array_merge($result, getFiles($path));
        } else {
            array_push($result, $path);
        }
    }
    return $result;
}

$files = getFiles('ads');
foreach ($files as $key => $file) {
    if (substr_count($file, '/') != 3) {
        unset($files[$key]);
    }
}
sort($files);

foreach ($files as $key => $file)
{
    $files[$key] = substr($file, 4);
}

$adArr = convertArrayToAdArray($files);
?>
<div class="ad">
    <div class="form">
        <form action="" method="POST" class="adForm">
            <div class="nameContainer">Email: <input type="text" name="email">
            </div>
            <div class="surnameContainer">Category: <input type="text" name="category">
            </div>
            <div class="ageContainer">Header: <input type="text" name="header">
            </div>
            <div class="ageContainer">Text: <input type="text" name="content">
            </div>
            <input name="btn" type="submit" value="Add">
        </form>
    </div>
    <div class="adField">
        <div class="adItem">
            <div class="categoryHeader">Category</div>
            <div class="headerHeader">Header</div>
            <div class="textHeader">Text</div>
            <div class="emailHeader">Email</div>
        </div>

        <?php
        foreach ($adArr as $keyAdArr => $ad) {
            $str = '<div class="adItem">';
            foreach ($ad as $keyAd => $value) {
                $str .= "<div>" . $value . "</div>";
            }
            $str .= '</div>';
            echo $str;
            $str = '';
        }
        if (isset($_POST['btn'])) {
            switch ($_POST['btn']) {
                case 'Add':

                    if($_POST['email'] && $_POST['category'] && $_POST['header'] && $_POST['content']) {
                        if (!is_dir('ads/' . $_POST['category'] . '/' . $_POST['email'])) {
                            mkdir('ads/' . $_POST['category'] . '/' . $_POST['email'], 0777, true);
                        }
                        $fp = fopen('ads/' . $_POST['category'] . '/' . $_POST['email'] . '/' . $_POST['header'] . '.txt', 'w+');
                        fwrite($fp, $_POST['content']);
                        fclose($fp);
                    }
            }
        }
        ?>
    </div>

</div>

</body>
</html>