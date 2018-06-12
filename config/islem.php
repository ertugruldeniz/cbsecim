<?php
	include_once "../admin/config/config.php"; 

	error_reporting(0);


    
    if(isset($_POST["mail_onay"]) and "ok"==base64_decode($_POST["mail_onay"])){

        $_POST=array_map("clear",$_POST);
        extract($_POST);

        if(empty($mail)){
       
            $response_array['status'] = 'warning';
            $response_array['statustext'] = 'Boş ALan';
            $response_array['message'] = 'Tüm alanların doldurulması zorunludur.';
         
              echo json_encode($response_array); exit();
        }else if (!filter_var($mail, FILTER_VALIDATE_EMAIL)) {

            $response_array['status'] = 'warning';
            $response_array['statustext'] = 'Format Hatası';
            $response_array['message'] = 'Lütfen bir mail adresi giriniz.';
            
           echo json_encode($response_array); exit();
        }else{

            $mailkonu="Cb Seçim Anketi";
            $mesaj=rand(1000, 9999);
            $_SESSION['kod']=$mesaj;
            
            if(mail_gonder($mailkonu,$mesaj,$mail)==true){

                
            $response_array['status'] = 'success';
            $response_array['statustext'] = 'Başarılı';
            $response_array['message'] = 'Lütfen mail adresinizi kontrol ediniz';   

            }
        }

        

    }


    if(isset($_POST['kulonay_kodu'])){

            $response_array['status'] = 'success';
            $response_array['statustext'] = 'Başarılı';
            $response_array['message'] = 'Lütfen mail adresinidgsddzi kontrol ediniz'; 

    }



	header('Content-Type: application/json');

    echo json_encode($response_array);


 ?>