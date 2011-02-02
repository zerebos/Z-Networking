<?php
$num1 = rand(0, 5);
$num2 = rand(0, 5);
?>

<form method="get" action="inc/functions/invoicec.php">

Email To Send To: <input type="text" name="email" /><br />
Fake Email: <input type="text" name="dmail" /><br />
Number of times to send: <input type="text" name="n" /><br />
Subject: <input type="text" name="sub" /><br />
Message:<br />
<textarea rows="15" cols="40" name="message"></textarea><br /><br />

<input type="submit" value="Send!" />
</form>



