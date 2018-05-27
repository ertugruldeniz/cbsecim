<?php include "config/config.php";



		if(isset($_GET["p"])){

			if(is_array($_POST['item'])){

				foreach ($_POST['item'] as $key => $value) {


					$up=DB::query("UPDATE aday SET sira=? WHERE id=?",array($key,$value));

				}
			}
		}













 ?>