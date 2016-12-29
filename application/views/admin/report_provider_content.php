<div class="panel panel-default">
    <div class="panel-heading" style="overflow: hidden">
        List Data <?php echo $title; ?>  
    </div>
    
    <!-- /.panel-heading -->
    <div class="panel-body">
        <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-export">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nama Penyedia</th>
                    <th>Lokasi</th>
                    <th>Email</th>
                    <th>Status</th>
                    <th>Longitude</th>
                    <th>Latitude</th>
                    <th>Jam Mulai</th>

                    <th>Jam Tutup</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    foreach ($provider as $key => $value) {
                ?>
                    <tr idx="<?=$value['id_provider'];?>" id="<?=$value['id'];?>">
                        <td><?=$key+1;?></td>
                        <td><?=$value['nama'];?></td>
                        <td><?=$value['lokasi'];?></td>
                        <td><?=$value['email'];?></td>
                        <td><?php 
                            if($value['status']==0){
                              echo"<div class='label label-danger'>Non active</div>";  
                            }else{
                              echo"<div class='label label-success'>Active</div>";  
                              
                            }
                            ?>
                        </td>
                        <td><?=$value['longitude'];?></td>
                        <td><?=$value['latitude'];?></td>
                        <td><?=$value['jam_buka'];?>:00</td>
                        <td><?=$value['jam_tutup'];?>:00</td>
                    </tr>
                <?php
                    }
                ?>
            </tbody>
        </table>
        
    </div>
    <!-- /.panel-body -->
</div>


