<?php include "header.php" ; ?>
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

<style type="text/css">
    
    <style>
  #sortable { list-style-type: none; margin: 0; padding: 0; width: 60%;  }
  #sortable tr { margin: 0 5px 5px 5px; padding: 5px; font-size: 1.2em; height: 1.5em;  }
  .ui-state-highlight { height: 1.5em; line-height: 1.2em; }
  </style> 

</style>

  <script>
  $( function() {
    $( "#sortable" ).sortable({
      placeholder: "ui-state-highlight"
    });
    $( "#sortable" ).disableSelection();
  } );
  </script>


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
                                        <th>Resim</th>
                                        <th>Adı Soyadı</th>
                                        <th>Kayıt Tarihi </th>
                                        <th></th>
                                        <th></th>
                                      
                                    </tr>
                                </thead>
                                <tbody id="sortable">
                                    <?php $adaylar=DB::get("SELECT * FROM aday ORDER BY sira ASC");
                                    $sayac=0;
                                    foreach ($adaylar as $aday) { $sayac++; ?>

                                           <tr id="item-<?php echo $aday->id ;?>" class="odd gradeX">
                                                <td class="sortable"><?=$sayac; ?></td>
                                                <td class="sortable" align="center"><img  width="150" height="150" src="img/aday/<?=$aday->resim; ?>"></td>
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

<!-- SIRALAMA İŞLEMLERİ YAPILDI -->
<script type="text/javascript"> 
    // When the document is ready set up our sortable with it's inherant function(s) 
    $(document).ready(function() { 
        $("#sortable").sortable({
            revert:true,
            handle : '.sortable', 
            stop : function (event,uri) { 
                var data = $(this).sortable('serialize'); 
                
                 $.ajax({ 
                    type:"POST",
                    data: data,
                    url: 'aday_sirala.php?p=sira', // save.php - file with database update
                    success:function(msg){
                        
                    }
                  });        

            } 
        }); 

        $("#sortable").disableSelection();
    }); 
</script>