<?php include "header.php" ; ?>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Aday Düzenle</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>

             <div align="right" style="margin-bottom:10px">
                 <button  class="btn btn-success " onclick="goBack()" >Geri Dön</button>
            </div>
       
            <div class="row">

              

                <div class="col-md-6">

                    <div class="panel panel-default">
                     <div class="panel-heading">
                            Aday Düzenleme Alanı
                    </div>
                    <div class="panel-body">

                        <?php 
                           $_GET = array_map('clear', $_GET); 
                           $aday= DB::getRow("SELECT * FROM aday Where id=?",array($_GET['id'])) ?>
                          <form id="uploadImage"  enctype="multipart/form-data">

                              <div align="center"> <img id="resim" src="img/aday/<?=$aday->resim;?>" width="200" height="200"></div> <br>

                              <div class="form-group row">
                                <label for="inputName" class="col-sm-6 col-form-label">Aday Resmi Seçiniz</label>
                                <div class="col-sm-10">
                                  <input type="file" class="form-control" id="file" >
                                </div>
                              </div>

                              <div class="form-group row">
                                <label for="inputName" class="col-sm-6 col-form-label">Adayın Adı Soyadı</label>
                                <div class="col-sm-10">
                                  <input type="text" class="form-control" id="adi" value="<?=$aday->ad_soyad;?>">
                                </div>
                              </div>

                              <input type="hidden" name="aday_duzenle" id="aday_duzenle">
                              <input type="hidden" name="eski_resim" id="eski_resim" value="<?=$aday->resim;?>">
                              <input type="hidden" name="id" id="id" value="<?=$aday->id;?>">

                               <div align="right">
                                <button  class="btn btn-success " name="aday_duzenle">Kaydet</button>
                              </div>

                             

                         </form>

                      </div>

               </div>



                </div>




                <div class="col-md-6">

                    <div class="panel panel-default">
                     <div class="panel-heading">
                            Aday Ekleme Alanı
                    </div>
                    <div class="panel-body">
                    
                      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                      tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                      quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                      consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                      cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                      proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>

                      </div>

               </div>

               

                </div>
                
               
          
           </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

<!-- Footer -->
<?php include_once "footer.php"; ?>

<script type="text/javascript" src="ajax/aday_duzenle.js"></script>