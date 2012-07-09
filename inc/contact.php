<?php
$num1 = rand(0, 5);
$num2 = rand(0, 5);
?>
<br /><strong><u>Contact Us Here:</u></strong><br /><br />
<form method="get" action="inc/functions/invoice.php">
Name: <input type="text" name="name" value="<?php echo $msqlemail; ?>" /><br />
Email: <input type="text" name="email" /><br />
<?php
echo $num1;
echo "+";
echo $num2;
?> (Spam filter): <input type="text" name="add" /><br />
Message:<br />
<textarea rows="15" cols="40" name="message"></textarea><br /><br />
<input type="hidden" name="num1" value="<?php echo $num1; ?>" />
<input type="hidden" name="num2" value="<?php echo $num2; ?>" />
<input type="submit" value="Send!" />
</form>
<script type="text/javascript">
	CKEDITOR.replace( 'message' );
</script>

