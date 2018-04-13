
        <div class="col-9">
        	<div class="product-list">
            	<div class="col-12">
                	<div class="heading">
                    	<h2><?php echo $data_hal['judul']?></h2>
                    </div>
                </div>
            	<div class="grid">
				<?php foreach($data as $a):?>
                	<div class="col-4">
                    	<div class="product">
                        	<img src="http://localhost/vancomp/resources/images/product/1.jpg">
                            <a  href="<?php echo base_url() . 'produk/detail/' . $a['id']; ?>" title="<?php echo $a['nama']?> "><h3 class="nama-brg"><?php echo substr($a['nama'], 0, 22) . ' ...'?></h3></a>
                            <h3 class="harga-brg">Rp. <?php echo $a['harga']?> </h3>
                            <a class="btn" style="width:100%;margin:10px 0;" href="<?php echo base_url() . 'produk/detail/' . $a['id']; ?>">Detail</a>
                        </div>
					</div>
                 <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>