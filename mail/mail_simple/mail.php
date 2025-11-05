<?php
error_reporting(0);
include 'sendRegistrationConfirmationMail.php';
//$email="bmargi4191@gmail.com";
if(isset($_POST['send']))
{
    $u=$_POST['txt'];
    $s=$_POST['sub'];
    $m=$_POST['msg'];
    sendRegistrationConfirmationMail($u,$s,$m);
//mail()
}
?>
<form method="post">
    Email ID:<input type="text" name="txt">
    <br>
    Subject:<input type="text" name="sub">
    <br>
    Message:<input type="text" name="msg">
    <br>
    <input type="submit" name="send">
</form>