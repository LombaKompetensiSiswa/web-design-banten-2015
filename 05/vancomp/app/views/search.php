        <div class="col-9">
        	<div class="product-list">
            	<div class="col-12">
                	<div class="heading">
                    	<h2><?php echo $data_hal['judul']?></h2>
                    </div>
                </div>
            	<div class="grid">
                
				<?php 
				if(empty($data)):?>
               	 <div class="col-12">
					<div class="alert">
						<h2> Tidak Ada Hasil</h2>
					</div>
                 </div>
                 <?php else:
					foreach($data as $a):
				?>
                	<div class="col-4">
                    	<div class="product">
                        	<img src="http://localhost/vancomp/resources/images/product/1.jpg">
                            <h3 class="nama-brg"><?php echo substr($a['nama'], 0, 30) . ' ...'?></h3>
                            <h3 class="harga-brg">Rp. <?php echo $a['harga']?> </h3>
                            <a class="btn btn-detail" href="<?php echo base_url() . 'produk/detail/' . $a['id']; ?>">Detail</a>
                        </div>
					</div>
                 <?php endforeach;
				 endif;?>
                </div>
            </div>
        </div>
    </div>