<?php 
/**
* @author = Recep Bağıryanık
* Github = RecepBagiryanik
*
**/
namespace Main\CSRFToken;
class csrf {
	
	function __construct() {
		if (empty($_SESSION["csrftoken"])) {
			$_SESSION["csrftoken"] = md5(uniqid());
		}
	}	
	
	public function generateToken() {
		$_SESSION["csrftoken"] = md5(uniqid());
	}

	public function checkToken($csrf, $buttonName) {
		if (isset($buttonName) && $_POST[$csrf] == $_SESSION["csrftoken"]) {
			$this->generateToken();
			return 1;
		} else {
			return 0;
		}
	} 

}
?>