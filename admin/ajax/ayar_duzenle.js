//Ayar Js
$(document).ready(function(){

		$("#ayarDuzenle").submit(function(event){

			var formId=$(this).attr('id');
			var formDetail=$("#"+formId);

			event.preventDefault();
			$.ajax({

				type:"POST",
				url:"config/islem.php",
				data:formDetail.serialize(),
				success:function(data){
					swal(data.statustext,data.message,data.status).then((value) =>{
						if(data.status=="success"){
							window.location.href="ayarlar.php";
						}
											
					});

					
				    return false;
					
				}
			});
		})
});


function goBack() {
    window.history.back();
}
