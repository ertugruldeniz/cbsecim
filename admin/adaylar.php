<?php include "header.php" ; ?>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Aday Ekle</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>

             <div align="right" style="margin-bottom:10px">
                  <a href="aday_ekle.php" class="btn btn-warning " >  Aday Ekle </a>
            </div>
       
        
                
                           <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Aday Listesi
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>Kod</th>
                                        <th>Adı Soyadı</th>
                                        <th>Kayıt Tarihi </th>
                                        <th></th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $adaylar=DB::get("SELECT * FROM aday");
                                    $sayac=0;
                                    foreach ($adaylar as $aday) { $sayac++; ?>

                                           <tr class="odd gradeX">
                                            <td class="center"><?=$sayac; ?></td>
                                            <td class="center" align="center"><img  width="150" height="150" src="img/aday/<?=$aday->resim; ?>"></td>
                                            <td class="center"><?=$aday->ad_soyad; ?></td>
                                            <td class="center"><?=$aday->tarih; ?></td>
                                            <td class="center"><a href="aday_duzenle.php?cb_duzenle=ok&id=<?=$aday->id; ?>" class="btn btn-warning"> Düzenle </a></td>
                                            <td class="center"><a href="config/islem.php?sil=ok&id=<?=$aday->id; ?>&resim=<?=$aday->resim;?>" class="btn btn-danger"> Sil </a></td>
                                           </tr>
                                    
                                    <?php } ?>
                                 
                                  
                                 
                                </tbody>
                            </table>
                        
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->

                  

    </div>
    <!-- /#wrapper -->

<!-- Footer -->
<?php include_once "footer.php"; ?>

     <!-- DataTables JavaScript -->
    <script src="vendor/datatables/js/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables-plugins/dataTables.bootstrap.min.js"></script>
    <script src="vendor/datatables-responsive/dataTables.responsive.js"></script>

    <script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
            responsive: true
        });
    });
    </script>