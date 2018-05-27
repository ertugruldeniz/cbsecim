<?php include "header.php" ; ?>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Ayarlar</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>

             <div align="right" style="margin-bottom:10px">
                  <a href="ayar_ekle.php" class="btn btn-warning " >  Ayar Ekle </a>
            </div>
       
        
                
                           <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            AYARLAR
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>Kod</th>
                                        <th>Adı</th>
                                        <th>Türü </th>
                                        <th>Açıklama</th>
                                        <th></th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody id="sortable">
                                    <?php $ayarlar=DB::get("SELECT * FROM ayar ORDER BY ad ASC");
                                    $sayac=0;
                                    foreach ($ayarlar as $ayar) { $sayac++; ?>

                                           <tr  class="odd gradeX">
                                                <td ><?=$sayac; ?></td>
                                               
                                                <td class="center"><?=$ayar->ad; ?></td>
                                                <td class="center"><?=$ayar->tur; ?></td>
                                                <td class="center"><?=$ayar->aciklama; ?></td>
                                                <td class="center"><a href="ayar_duzenle.php?cb_duzenle=ok&id=<?=$ayar->id; ?>" class="btn btn-warning"> Düzenle </a></td>
                                                <td class="center"><a href="config/islem.php?ayar_sil=ok&id=<?=$ayar->id; ?>" class="btn btn-danger" onclick="return confirm('Silmek isteğinize emin misiniz?')" > Sil </a></td>
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

