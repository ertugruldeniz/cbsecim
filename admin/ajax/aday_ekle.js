$(document).ready(function(event){

	//Ajax
	$("#uploadImage").on("submit",function(e){

		var formData = new FormData();
		var adi=$( "#adi" ).val();
		formData.append('file', $('#file')[0].files[0]);
		formData.append('aday_ekle', 'Ekle');
		formData.append('adi', adi);
		$.ajax({
		       url : 'config/islem.php',
		       type : 'POST',
		       data : formData,
		       processData: false,  // tell jQuery not to process the data
		       contentType: false,  // tell jQuery not to set contentType
		       success : function(data) {
		      
		           swal(data.statustext,data.message,data.status).then((value) =>{
						if(data.status=="success"){
							$("#uploadImage")[0].reset();
							$("#resim").attr("src","img/noimage.jpg");
						}
											
					});
		       }
		});

		return false;

	
	});


	//Resim Ön izle
	$("#file").change(function(){
       
       dosyaOnizle();

	});

});

//Ön izleme fonksiyonu
function dosyaOnizle() {
  var resim = document.querySelector('#resim');
  var dosyaSecici    = document.querySelector('input[type=file]').files[0];
  var dosyaOkuyucu  = new FileReader();

  dosyaOkuyucu.onloadend = function () {
    resim.src = dosyaOkuyucu.result;
  }

  if (dosyaSecici) {
    dosyaOkuyucu.readAsDataURL(dosyaSecici);
  } else {
    resim.src = "";
  }


}

function goBack() {
    window.history.back();
}
