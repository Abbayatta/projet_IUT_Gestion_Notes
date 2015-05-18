<?php

	echo "Bonjour ".$_SESSION["name"];

	?>
	<form class="form-signin" method="post" action="">	
		<button class="btn btn-lg btn-primary btn-block" type="submit" name="deco_btn">Me déconnecter</button>
	</form>
	<?php

	if (isset($_POST["deco_btn"])) 
	{
		session_destroy();
		header("Location: index.php");
		exit();
	}

?>