<?php include "header.php" ; ?>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Ayar Düzenle</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>

           
       
            <div class="row">

              

                <div class="col-md-9">


                <div align="right" style="margin-bottom:10px">
                 <button  class="btn btn-success " onclick="goBack()" >Geri Dön</button>
                </div>

                    <div class="panel panel-default">
                     <div class="panel-heading">
                            Ayar Düzenleme Alanı
                    </div>
                    <div class="panel-body">

                          <?php
                          $id=htmlspecialchars($_GET["id"]);
                           $ayar=DB::getRow("SELECT * FROM ayar Where id=?",array($id));

                            ?>
                          <form id="ayarDuzenle">

        

                              <div class="form-group row">
                                <label for="inputName" class="col-sm-6 col-form-label">Adı</label>
                                <div class="col-sm-10">
                                  <input type="text" class="form-control" id="ad" name="ad" value="<?=$ayar->ad;?>">
                                </div>
                              </div>

                              <div class="form-group row">
                                <label for="inputName" class="col-sm-6 col-form-label"> Türü </label>
                                <div class="col-sm-10">
                                  <input type="text" class="form-control" id="tur" name="tur" value="<?=$ayar->tur;?>">
                                </div>
                              </div>


                                <div class="form-group row">
                                <label for="inputName" class="col-sm-6 col-form-label">Açıklama</label>
                                <div class="col-sm-10">
                                  <input type="text" class="form-control" id="aciklama" name="aciklama" value="<?=$ayar->aciklama;?>">
                                </div>
                              </div>

                              <input type="hidden" name="ayar_duzenle" value="ok">
                              <input type="hidden" name="id" value="<?=base64_encode($ayar->id); ?>">

                               <div align="right">
                                <button  class="btn btn-success " name="ayar_duzenle">Kaydet</button>
                              </div>

                             

                         </form>

                      </div>

               </div>



                </div>





               
          
           </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

<!-- Footer -->
<?php include_once "footer.php"; ?>

<script type="text/javascript" src="ajax/ayar_duzenle.js"></script>