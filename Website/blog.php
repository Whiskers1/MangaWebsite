<?php
include "includes/header.php";
date_default_timezone_set('Europe/Copenhagen');
?>

<?php
echo "	<div class='blog'>
			<div class='wrapper'>
				<form>
					<input type='hidden' name='uid' value='Anonymous'>
					<input type='hidden' name='date' value='".date('Y-m-d H:i:s')."'>
					<textarea name='message'></textarea><br>
					<button type='submit' name='submit'>Comment</button>
				</form>
			</div>
		</div>";
?>

<?php
include "includes/footer.php";
?>

</body>

</html>