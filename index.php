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
                          <div class="modal-body">


                             <form>
                                  <div class="form-group">
                                    <label for="recipient-name" class="col-form-label">Recipient:</label>
                                    <input type="text" class="form-control" id="recipient-name">
                                  </div>
                                  <div class="form-group">
                                    <label for="message-text" class="col-form-label">Message:</label>
                                    <textarea class="form-control" id="message-text"></textarea>
                                  </div>
                                </form>

                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary">Save changes</button>
                          </div>
                        </div>
                      </div>
                    </div>



            <?php }  ?>


        

      

      
      </div>

    </div>
    <!-- /.container -->

<!--  Footer -->
<?php include "footer.php"; ?>