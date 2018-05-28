<?php 

//Session Kontrol
function session_kontrol(){
    if(!isset($_SESSION['login']) or !isset($_SESSION["email"])){
        header("location:login.php");
    }
}



//Post Boşmu kontrol
function emptyControl($data){
    if(empty(trim($data))){
      return true;
    }else{
      return false;
    }
}




function clear($str){
    $str = str_replace(array("'",'"',"/","<script>","<",">"), "", $str);
    return $str;
}


function tel($tel){
	return substr($tel, 0, 1)." (".substr($tel, 1, 3).") ".substr($tel, 4, 3)." ".substr($tel, 7, 2)." ".substr($tel, 9, 2);
}



function cinsiyet($id){
    if ($id==0) $cins="Kadın";
    if ($id==1) $cins="Erkek";
    return $cins;
}








function sef($baslik){
    $baslik = str_replace(array("&quot;","&#39;"), NULL, $baslik);
    $bul = array('Ç', 'Ş', 'Ğ', 'Ü', 'İ', 'Ö', 'ç', 'ş', 'ğ', 'ü', 'ö', 'ı', '-');
    $yap = array('c', 's', 'g', 'u', 'i', 'o', 'c', 's', 'g', 'u', 'o', 'i', ' ');
    $perma = strtolower(str_replace($bul, $yap, $baslik));
    $perma = preg_replace("@[^A-Za-z0-9\-_]@i", ' ', $perma);
    $perma = trim(preg_replace('/\s+/',' ', $perma));
    $perma = str_replace(' ', '-', $perma);
    return $perma;
}




function tarih($tarih){
    return date("d.m.Y H:i", strtotime($tarih));
}


function mail_gonder($baslik, $icerik, $alici){

    //Ertuğrul Deniz
    include 'class.phpmailer.php';
  $mail = new PHPMailer();
   $mail->IsSMTP();
   $mail->SMTPAuth = true;
   $mail->Host = '#';
   $mail->Port = 587;
   $mail->Username = '#';
   $mail->Password = '#';
   $mail->SetFrom($mail->Username, "CB Seçim Anketi");
   $mail->AddAddress($alici, 'Cb Seçim Anketi');
   $mail->CharSet = 'UTF-8';
   $mail->Subject = $baslik;
   $mail->MsgHTML($icerik);
   if ($mail->Send()) {
        return true;
   }else{
        return false;
   }
}



?>