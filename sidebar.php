<?php if(!empty($_GET['page']) && $_GET['page']=='dashboard_cabang'){ echo "class='active'";   } ?>
<div class="menu">
                <ul class="list">
                    <li class="header">MENU NAVIGASI</li>
                    <li class="active">
                        <a href="index.php">
                            <span>Beranda</span>
                        </a>
					</li>
						
						
						
                    <li>
                       <a <?php if(empty($_GET['page']) || $_GET['page']=='caesar'){ echo "class='active'";   } ?> href="index.php?page=enkripsi"><i class="fa fa-fw fa-bars"></i><span> Enkripsi</span> </a>
                    </li>
                    <li>
                       <a <?php if(empty($_GET['page']) || $_GET['page']=='caesar'){ echo "class='active'";   } ?> href="index.php?page=enkripsi"><i class="fa fa-fw fa-bars"></i><span> Deskripsi</span> </a>
                    </li>


                     </div>