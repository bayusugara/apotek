<div class=" top-nav rsidebar span_1_of_left">
    <h3 class="cate">PROVINSI</h3>
    <ul class="menu">
        <ul class="kid-menu ">
            <?php
                foreach ($provinsi as $key => $value) {
                    # code...
                    echo"<li><a href=".base_url()."welcome/".$value['provinsi_id'].">".$value['provinsi_nama']."</a></li>";
                }
            ?>
        </ul>
    </ul>
</div>