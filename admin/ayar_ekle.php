<?php include "header.php" ; ?>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Ayar Ekle</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>

             <div align="right" style="margin-bottom:10px">
                 <button  class="btn btn-success " onclick="goBack()" >Geri Dön</button>
            </div>
       
            <div class="row">

              

                <div class="col-md-9">

                    <div class="panel panel-default">
                     <div class="panel-heading">
                            Ayar Ekleme Alanı
                    </div>
                    <div class="panel-body">

                
                          <form id="ayarEkle">

        

                              <div class="form-group row">
                                <label for="inputName" class="col-sm-6 col-form-label"></label>
                                <div class="col-sm-10">
                                  <input type="text" class="form-control" id="ad" name="ad" placeholder="Ayar Adı Giriniz">
                                </div>
                              </div>

                              <div class="form-group row">
                                <label for="inputName" class="col-sm-6 col-form-label"></label>
                                <div class="col-sm-10">
                                  <input type="text" class="form-control" id="tur" name="tur" placeholder="Ayar Türü Giriniz">
                                </div>
                              </div>

                               <div class="form-group row">
                                <label for="inputName" class="col-sm-6 col-form-label"></label>
                                <div class="col-sm-10">
                                  <input type="text" class="form-control" id="aciklama" name="aciklama" placeholder="Ayar Açıklama Giriniz">
                                </div>
                              </div>

                              <input type="hidden" name="ayar_ekle" value="ok">

                               <div align="right">
                                <button  class="btn btn-success " name="ayar_ekle">Kaydet</button>
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

<script type="text/javascript" src="ajax/ayar_ekle.js"></script>