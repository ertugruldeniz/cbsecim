<?php 

function ucfirst_tr($metin)
{
    $k_uzunluk = mb_strlen($metin, "UTF-8");
    $ilkKarakter= mb_substr($metin, 0, 1, "UTF-8");
    $kalan = mb_substr($metin, 1, $k_uzunluk - 1, "UTF-8");
    return mb_strtoupper($ilkKarakter, "UTF-8") . mb_strtolower($kalan,"UTF-8");
}


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


function mail_dogrula($baslik, $icerik, $alici){
    include 'class.phpmailer.php';
  $mail = new PHPMailer();
   $mail->IsSMTP();
   $mail->SMTPAuth = true;
   $mail->Host = 'mail.obsgrup.com';
   $mail->Port = 587;
   $mail->Username = 'destek@obsgrup.com';
   $mail->Password = '232452!';
   $mail->SetFrom($mail->Username, "Doktorum Olur musun?");
   $mail->AddAddress($alici, 'Doktorum Olur musun');
   $mail->CharSet = 'UTF-8';
   $mail->Subject = $baslik;
   $mail->MsgHTML($icerik);
   if ($mail->Send()) {
        return true;
   }else{
        return false;
   }
}



function tarih($tarih){
    return date("d.m.Y H:i", strtotime($tarih));
}



 function tarih_cevir($tarih){

                switch ($tarih) {

                  case '01':
                    echo "OCA";
                    break;
                 case '02':
                    echo "ŞUB";
                    break;
                 case '03':
                    echo "MAR";
                    break;
                case '04':
                    echo "NİS";
                    break;

                case '05':
                    echo "MAY";
                    break;
                case '06':
                    echo "HAZ";
                    break;

                case '07':
                    echo "TEM";
                    break;


                case '08':
                    echo "AĞU";
                    break;


                case '09':
                    echo "EYL";
                    break;


                case '10':
                    echo "EKİ";
                    break;

                case '11':
                    echo "KAS";
                    break;

                case '12':
                    echo "ARA";
                    break;
                  
                  default:
                    echo "OCA";
                    break;
                }
            }
            
date_default_timezone_set('Europe/Istanbul');

function sendRequest($site_name,$send_xml,$header_type=array('Content-Type: text/xml'))
{
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL,$site_name);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS,$send_xml);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
    curl_setopt($ch, CURLOPT_HTTPHEADER,$header_type);
    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
    curl_setopt($ch, CURLOPT_TIMEOUT, 120);

    $result = curl_exec($ch);

    return $result;
}

function smsgonder($mesaj, $alici){

    $alici = str_replace(array(" ",")","(","-","_"), "", ltrim($alici, "0"));

    $xml = '<SMS>'.
            '<oturum>'.
                '<kullanici>8506673478</kullanici>'.
                '<sifre>4cmbyp</sifre>'.
            '</oturum>'.
            '<mesaj>'.
                '<baslik>DOKTORUMOL</baslik>'.
                '<metin>'.$mesaj.'</metin>'.
                '<alicilar>'.$alici.'</alicilar>'.
            '</mesaj>'.
        '</SMS>';

    // $sonuc    = sendRequest('http://toplusms.bizimsms.net/api-v3/tr/xml_api.php', $xml);
    $sonuc = 0;
    if (substr($sonuc, 0, 2) == 'OK')
    {
        // list($ok, $mesaj_id) = explode('|', $sonuc);
        // echo 'Mesaj gönderildi. Rapor için ' . $mesaj_id . ' kodunu kullanabilirsiniz.';
        return "ok";
    }
    elseif (substr($sonuc, 0, 3) == 'ERR')
    {
        // list($err, $mesaj) = explode('|', $sonuc);
        // echo 'Hata (' . $err . ') oluştu. ' . $mesaj;
        return "err";
    }
    else
    {
        // echo 'Bilinmeyen bir hata oluştu. ' . $sonuc;
        return "error";
    }

}








?>