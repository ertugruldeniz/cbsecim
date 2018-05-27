<?php 
	include_once "config.php"; 

	if(isset($_POST['login']) && strlen($_POST['login'])==13 ){

		$_POST = array_map('clear', $_POST); //POSTLARI TEMİZLE
		extract($_POST); //Post edilen tüm verileri al adı ile kullan.

		if(emptyControl($email) or  emptyControl($password)){

			$response_array['status'] = 'warning';
		    $response_array['statustext'] = 'Uyarı';
	        $response_array['message'] = 'Kullanıcı adı ve şifre alanı boş bırakılamaz!';
			
		}else{

			$varMi=DB::getVar("SELECT COUNT(id) FROM kullanici WHERE mail=? and sifre=? ",array($email,md5($password)));

			if($varMi=="1"){
					$response_array['status'] = 'success';
		            $response_array['statustext'] = 'Başarılı';
	                $response_array['message'] = 'Başarılı bir şekilde giriş yapıldı';
			}else{

				$response_array['status'] = 'error';
		        $response_array['statustext'] = 'Hata';
	            $response_array['message'] = 'Kullanıcı adı veya şifre hatalı!';

			}
		
		}

	
		

	}else{
		$response_array['status'] = 'warning';
		$response_array['statustext'] = 'Uyarı';
	    $response_array['message'] = 'Tüm alanları doldurunuz!';
	}
	


	header('Content-type: application/json');
    echo json_encode($response_array);


 ?>