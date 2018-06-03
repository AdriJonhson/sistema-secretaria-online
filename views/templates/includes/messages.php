<?php 
	if(isset($_SESSION['msg_erro'])){


		echo "<script>alert(\"".$_SESSION['msg_erro']."\")</script>";

		unset($_SESSION['msg_erro']);
	}


	if(isset($_SESSION['msg_success'])){

		echo "<script>alert(\"".$_SESSION['msg_success']."\")</script>";

		unset($_SESSION['msg_success']);
	}
?>