<?php 
	if(isset($_SESSION['msg_erro'])){
		echo $_SESSION['msg_erro'];
		unset($_SESSION['msg_erro']);
	}
