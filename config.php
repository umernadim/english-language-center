<?php
$connect =  mysqli_connect('localhost', 'root', '', 'hope_eng_lang_center');
if(!$connect) {
    die("Connection failed: " . mysqli_connect_error());
}
mysqli_set_charset($connect, "utf8");
?>