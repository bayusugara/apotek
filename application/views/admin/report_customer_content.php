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
                    <th>Nama</th>
                    <th>Alamat</th>
                    <th>Email</th>
                    <th>Status</th>
                    <th>No Telp</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    foreach ($customer as $key => $value) {
                ?>
                    <tr idx="<?=$value['id_customer'];?>" id="<?=$value['id'];?>">
                        <td><?=$key+1;?></td>
                        <td><?=$value['nama'];?></td>
                        <td><?=$value['alamat'];?></td>
                        <td><?=$value['email'];?></td>
                        <td><?php 
                            if($value['status']==0){
                              echo"<div class='label label-danger'>Non active</div>";  
                            }else{
                              echo"<div class='label label-success'>Active</div>";  
                              
                            }
                            ?>
                        </td>
                        <td><?=$value['no_tlp'];?></td>
                    </tr>
                <?php
                    }
                ?>
            </tbody>
        </table>
        
    </div>
   
    <!-- /.panel-body -->
</div>


