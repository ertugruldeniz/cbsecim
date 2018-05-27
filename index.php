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

        <?php $adaylar = DB::get("SELECT * FROM aday");

            foreach ($adaylar as $aday) { ?>
                   
                    <div class="col-lg-4 col-sm-6 text-center mb-4">
                      <img class="rounded-circle img-fluid d-block mx-auto" style="width:200px; height:200px" src="admin/img/aday/<?=$aday->resim; ?>" alt="">
                      <h3><?=$aday->ad_soyad; ?>
                      </h3>
                      <button class="btn btn-success btn-sm"> Oy ver</button>
                    </div>


            <?php }  ?>

        

      

      
      </div>

    </div>
    <!-- /.container -->

<!--  Footer -->
<?php include "footer.php"; ?>