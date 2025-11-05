<?php
error_reporting(0);
require_once 'class/function.class.php';
$functions = new myfunctions();

if (isset($_REQUEST['email']))  {
  $to = $_REQUEST['email'];
  $cc = '';
  $bcc = '';
  $subject = $_REQUEST['subject'];
  $comment = $_REQUEST['comment'];
  $alert_msg ='';
  
  $functions->send_email($to, $cc, $bcc, $subject, $comment, $alert_msg, '');
  echo "Thank you for contacting us!";
  }
  else  {
?>
<form method="post">
  Email: <input name="email" type="text" /><br/>
  Subject: <input name="subject" type="text" /><br/>
  Message:<br/>
  <textarea name="comment" rows="15" cols="40"></textarea><br/>
  <input type="submit" value="Submit" />
  </form>
<?php
  }
?>



