<?= $pagination ?>
<?php foreach ($provider as $value)
                    { 
                ?>
                 <div class="product-left">
                    <div class="col-md-4 chain-grid" style='width: 30%'>
                        <?php 
                          // foreach ($gallery as $key => $g) {
                          //   $id_provider = $g['id_provider'];
                          //   $foto = $g['foto']; 
                          //   $pic_path = base_url()."assets/img/".$id_provider."/".$foto;
                          $foto = $this->gallery_model->get(array('id_provider' => $value['id_provider'],'is_display_picture' => '1'))->row_array();
                          $pic_path = base_url()."assets/img/".$value['id_provider']."/".$foto['foto'];
                        ?>
                        <a href="single.html"><img class="img-responsive chain" src="<?= $pic_path ?>" alt=" " /></a>
                        

                        <span class="star"> </span>
                        <div class="grid-chain-bottom">
                            <h6><a href="single.html"> <?=$value['nama'];?></a></h6>
                        
                            <div class="star-price">
                                <div class="dolor-grid"> 
                                      <span class="rating">
                                            <input type="radio" class="rating-input" id="rating-input-1-5" name="rating-input-1">
                                            <label for="rating-input-1-5" class="rating-star1"> </label>
                                            <input type="radio" class="rating-input" id="rating-input-1-4" name="rating-input-1">
                                            <label for="rating-input-1-4" class="rating-star1"> </label>
                                            <input type="radio" class="rating-input" id="rating-input-1-3" name="rating-input-1">
                                            <label for="rating-input-1-3" class="rating-star"> </label>
                                            <input type="radio" class="rating-input" id="rating-input-1-2" name="rating-input-1">
                                            <label for="rating-input-1-2" class="rating-star"> </label>
                                            <input type="radio" class="rating-input" id="rating-input-1-1" name="rating-input-1">
                                            <label for="rating-input-1-1" class="rating-star"> </label>
                                       </span>
                                </div>
                                <a class="now-get get-cart" href="<?=base_url();?>welcome/detail_provider/<?=$value['id_provider']?>">Lihat lapang</a> 
                                <div class="clearfix"> </div>
                            </div>
                        </div>
                    </div>
                    
                   
                 </div>
                 <?php
                    }
                ?>
                
                