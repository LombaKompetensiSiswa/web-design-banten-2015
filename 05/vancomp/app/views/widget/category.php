

				<div class="widget">
                	<div class="heading">
                   		 <h2>Category</h2>
                	</div>
                <div class="kategori">
                	<ul>
                    <?php foreach($data as $b):?>
                    	<li><a href="<?php echo base_url(); ?>home/kategori/<?php echo $b['id']?>"><?php echo $b['kategori']?></a></li>
                    <?php endforeach;?>
                    </ul>
                </div>
               </div>
            </div>
        </div>