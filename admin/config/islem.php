<?php
	include_once "config.php"; 

	error_reporting(0);
	//Yönetici Login İşlemi //

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

			        $user=DB::getRow("SELECT username,mail FROM kullanici WHERE mail=? and sifre=? ",array($email,md5($password)));
	                $_SESSION["login"] = true;
				    $_SESSION["username"] = $user->username;
				    $_SESSION["email"] = $user->mail;

				    if(@$remember == 'Remember Me') { 
				      $login = array("email" => $email, "password" =>$password); 
				      $login = json_encode($login); // Cookie'lere dizi değer veremediğimiz için dizimizi json formatına çeviriyoruz.
				      setcookie("giris", $login, time() + 120); // Cookie'mizi oluşturuyoruz.
				    }


			}else{

				$response_array['status'] = 'error';
		        $response_array['statustext'] = 'Hata';
	            $response_array['message'] = 'Kullanıcı adı veya şifre hatalı!';

			}
		
		}

	}
	
	//Yönetici Login Kontrol Bitiş //


   //ADAY EKLE START
		if(isset($_POST["aday_ekle"])){
			
			if ($_FILES['file']['tmp_name']){    


                             	$_POST=array_map("clear",$_POST);
                             	extract($_POST);
                                $resource = $_FILES['file']['tmp_name'];
                                $name = $_FILES['file']['name']; 
                                $type = $_FILES['file']['type'];

                                $permit_formats = array ("image/jpeg","image/jpg","image/png"); 
                                $storage_location = "../img/aday";
                                
                                $extension = explode(".", $name);
                             
                                $rand = (rand() * 100) + 1;
                                $img_name = $rand;
                                $image_name =  $img_name.".".$extension[(count($extension)-1)];

                                if (in_array($type, $permit_formats))
                                {     
                                  
                                    $file = $storage_location . "/".$image_name;
                                   
                                    move_uploaded_file($resource, $file);
                                    $sorgu='INSERT INTO  aday (ad_soyad,resim,sef) values(?,?,?)';
                                    $insert = DB::query($sorgu, array($adi, $image_name, sef($adi)));
                                    
                                    if($insert){
                                        $response_array['status'] = 'success';
                                        $response_array['statustext'] = 'Başarılı';
                                        $response_array['message'] = 'Başarıyla aday eklendi.';
                                    }else{
                                         $response_array['status'] = 'error';
                                         $response_array['statustext'] = 'Hata';
                                         $response_array['message'] = 'Resim Yüklenirken Hata Oluştu.';
                                    }
                                }else{

                                    $response_array['status'] = 'warning';
                                    $response_array['statustext'] = 'İzinsiz Dosya Formatı';
                                    $response_array['message'] = 'İzin verilen resim formatları jpg,jpeg,png uzantılarıdır.';
                        }
		}

	}

	//ADAY EKLE BİTİŞ



	//ADAY SİL BAŞLA 

	if(@$_GET['sil']=="ok"){
		$delete=DB::query("DELETE FROM aday Where id=?",array($_GET['id']));

		if($delete){ 
			$res=@$_GET['resim'];
			$res="../img/aday/".$res;
			unlink($res);
			header("location:../adaylar.php");
		}
	}


	//ADAY SİL BİTİŞ



	//ADAY dÜZENLE BAŞLA
		if(isset($_POST["aday_duzenle"])){
			$_POST=array_map("clear",$_POST);
            extract($_POST);
			
			if ($_FILES['file']['tmp_name']){    


                             	
                                $resource = $_FILES['file']['tmp_name'];
                                $name = $_FILES['file']['name']; 
                                $type = $_FILES['file']['type'];

                                $permit_formats = array ("image/jpeg","image/jpg","image/png"); 
                                $storage_location = "../img/aday";
                                
                                $extension = explode(".", $name);
                             
                                $rand = (rand() * 100) + 1;
                                $img_name = $rand;
                                $image_name =  $img_name.".".$extension[(count($extension)-1)];

                                if (in_array($type, $permit_formats))
                                {     
                                  
                                    $file = $storage_location . "/".$image_name;
                                   
                                    move_uploaded_file($resource, $file);
                                    $sorgu='UPDATE aday SET ad_soyad=?,resim=?,sef=? where id=?';
                                    $update = DB::query($sorgu, array($adi, $image_name, sef($adi) ,$id));
                                    
                                    if($update){
                                
										$res="../img/aday/".$eski_resim;
										unlink($res);
                                        $response_array['status'] = 'success';
                                        $response_array['statustext'] = 'Başarılı';
                                        $response_array['message'] = 'Başarıyla aday bilgileri düzenlendi.';
                                    }else{
                                         $response_array['status'] = 'error';
                                         $response_array['statustext'] = 'Hata';
                                         $response_array['message'] = 'Resim Yüklenirken Hata Oluştu.';
                                    }
                                }else{

                                    $response_array['status'] = 'warning';
                                    $response_array['statustext'] = 'İzinsiz Dosya Formatı';
                                    $response_array['message'] = 'İzin verilen resim formatları jpg,jpeg,png uzantılarıdır.';
                        }
		}else if(!empty($adi)){
				
			    $sorgu='UPDATE aday SET ad_soyad=?,sef=? where id=?';
                $update = DB::query($sorgu, array($adi, sef($adi) ,$id));
                unset($_POST["eski_resim"]);
				unset($_POST["file"]);
              	 $response_array['status'] = 'success';
                 $response_array['statustext'] = 'Başarılı';
                 $response_array['message'] = 'Başarıyla aday bilgileri düzenlendi.';
              
		}

	}

	//ADAY DÜZENLE BİTİŞ



    //AYAR EKLE BAŞLA
    
    if(isset($_POST["ayar_ekle"]) and $_POST["ayar_ekle"]=="ok"){

        $_POST=array_map("clear",$_POST);
        extract($_POST);

        if(strlen($ad)>0 && strlen($tur)>0){

             $sorgu='INSERT INTO  ayar (ad,tur,aciklama) values(?,?,?)';
             $insert = DB::query($sorgu, array($ad, $tur,$aciklama));

             if($insert){
                 $response_array['status'] = 'success';
                 $response_array['statustext'] = 'Başarılı';
                 $response_array['message'] = 'Başarıyla aday bilgileri düzenlendi.';
             }else{
                 $response_array['status'] = 'error';
                 $response_array['statustext'] = 'Hata';
                 $response_array['message'] = 'Veri eklenilemedi.';
             }

        }else{

            $response_array['status'] = 'warning';
           $response_array['statustext'] = 'Boş ALan';
             $response_array['message'] = 'Tüm alanların doldurulması zorunludur.';

        }


    }
  //AYar ekle bitiş


     //Ayar SİL BAŞLA 

    if(@$_GET['ayar_sil']=="ok"){

        $_GET=array_map("clear",$_GET);
        extract($_GET);

        $delete=DB::query("DELETE FROM ayar Where id=?",array($_GET['id']));

        if($delete){ 
            header("location:../ayarlar.php");
        }
    }


    //AYar SİL BİTİŞ



        //AYAR düzenle BAŞLA
    
    if(isset($_POST["ayar_duzenle"]) and $_POST["ayar_duzenle"]=="ok"){

        $_POST=array_map("clear",$_POST);
        extract($_POST);

        if(strlen($ad)>0 && strlen($tur)>0){
            $id=base64_decode($id);
             $sorgu='UPDATE ayar SET ad=?,tur=?,aciklama=? WHERE id=?';
             $update = DB::query($sorgu, array($ad, $tur,$aciklama,$id));

             if($update){
                 $response_array['status'] = 'success';
                 $response_array['statustext'] = 'Başarılı';
                 $response_array['message'] = 'Başarıyla yar bilgileri güncellendi.';
             }else{
                 $response_array['status'] = 'error';
                 $response_array['statustext'] = 'Hata';
                 $response_array['message'] = 'Hata Oluştu.';
             }

        }else{

            $response_array['status'] = 'warning';
            $response_array['statustext'] = 'Boş ALan';
             $response_array['message'] = 'Tüm alanların doldurulması zorunludur.';

        }


    }
  //AYar ekle bitiş




	header('Content-Type: application/json');

    echo json_encode($response_array);


 ?>