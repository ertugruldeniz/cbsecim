
$(document).ready(function(){

		$("#form_ready").submit(function(event){
			var formId=$(this).attr('id');
			var formDetail=$("#"+formId);
			event.preventDefault();
			$.ajax({

				type:"POST",
				url:"config/islem.php",
				data:formDetail.serialize(),
				success:function(data){
					swal(data.statustext,data.message,data.status);
				}
			});
		})
});