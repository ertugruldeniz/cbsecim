<!-- Header -->
<?php include "header.php"; ?>


    <!-- Page Content -->
    <div class="container">

      <!-- Introduction Row -->
      <h1 class="my-4">Sende Oy Ver
    
      </h1>
      <p>Partilerin seçtiği adaylar kısa listede yerini aldı, desteklediğin adaya oy ver.Oylama için son tarih 23 Haziran!</p>

      <!-- Team Members Row -->
      <div class="row">
        <div class="col-lg-12">
          <h2 class="my-4">Cumhur Başkanı Adayları</h2>
        </div>

        <?php $adaylar = DB::get("SELECT * FROM aday ORDER BY sira ASC");

            foreach ($adaylar as $aday) { ?>
                   
                    <div class="col-lg-4 col-sm-6 text-center mb-4">
                      <img class="rounded-circle img-fluid d-block mx-auto" style="width:200px; height:200px" src="admin/img/aday/<?=$aday->resim; ?>" alt="">
                      <h3><?=$aday->ad_soyad; ?>
                      </h3>
                      <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#exampleModal<?=$aday->id;?>"> Oy ver</button>
                    </div>





                  <!-- Modal -->
                    <div class="modal fade" id="exampleModal<?=$aday->id;?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel"><?=$aday->ad_soyad ;?> Oyunu Ver</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>

                          <form id="mailForm<?=$aday->id;?>">
                              <div class="modal-body">


                                 
                                      <div class="form-group">
                                        <label for="recipient-name" class="col-form-label">Mail adresinize kod gönderilecektir. Geçerli bir mail adresi giriniz.</label>
                                        <input type="email" class="form-control" id="mail" name="mail" placeholder="Mail Adresi Giriniz">
                                        <input type="hidden" class="form-control" id="mail_onay" name="mail_onay" value="<?=base64_encode("ok"); ?>" >
                                      </div>
                                      
                                   

                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Kapat</button>
                                <button type="submit" class="btn btn-primary"> Doğrulama Kodu</button>
                              </div>

                         </form>
                        </div>
                      </div>
                    </div>


                  <script>
                    

                        $(document).ready(function(event){

                          //Ajax
                          $("#mailForm<?=$aday->id;?>").on("submit",function(e){
                             
                            var formData = new FormData();

                            var mail=$( "#mail" ).val();
                            var mail_onay=$( "#mail_onay" ).val();
                            formData.append('mail', mail);
                            formData.append('mail_onay', mail_onay);
                            e.preventDefault();
                            $.ajax({
                                   url : 'config/islem.php',
                                   type : 'POST',
                                   data : formData,
                                   processData: false,  // tell jQuery not to process the data
                                   contentType: false,  // tell jQuery not to set contentType
                                   success : function(data) {
                                  
                                     swal(data.statustext,data.message,data.status);

                                    }
                                              
                                  });
                                   
                            });

                            return false;

                          
                          });
                  </script>




            <?php }  ?>


        

      

      
      </div>

    </div>
    <!-- /.container -->

<!--  Footer -->
<?php include "footer.php"; ?>

