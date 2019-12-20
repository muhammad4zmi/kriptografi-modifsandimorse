<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>ATBASH CIPHER - PROGRAM KRIFTOGRAFI</title>

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="plugins/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="plugins/node-waves/waves.css" rel="stylesheet" />
	
	
    <!-- Bootstrap Select Css -->
    <link href="../../plugins/bootstrap-select/css/bootstrap-select.css" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="plugins/animate-css/animate.css" rel="stylesheet" />

    <!-- Morris Chart Css-->
    <link href="plugins/morrisjs/morris.css" rel="stylesheet" />

    <!-- Custom Css -->
    <link href="css/style.css" rel="stylesheet">

    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href="css/themes/all-themes.css" rel="stylesheet" />
</head>

<body class="theme-red">
    <!-- Page Loader -->
    <div class="page-loader-wrapper">
        <div class="loader">
            <div class="preloader">
                <div class="spinner-layer pl-red">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>
            </div>
            <p>Please wait...</p>
        </div>
    </div>
    <!-- #END# Page Loader -->
    <!-- Overlay For Sidebars -->
    <div class="overlay"></div>
    <!-- #END# Overlay For Sidebars -->
    <!-- Search Bar -->
    <div class="search-bar">
        <div class="search-icon">
            <i class="material-icons">search</i>
        </div>
        <input type="text" placeholder="START TYPING...">
        <div class="close-search">
            <i class="material-icons">close</i>
        </div>
    </div>
    <!-- #END# Search Bar -->
    <!-- Top Bar -->
    <nav class="navbar">
        <div class="container-fluid">
            <div class="navbar-header">
                <a href="javascript:void(0);" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false"></a>
                <a href="javascript:void(0);" class="bars"></a>
                <a class="navbar-brand" href="index.html">PROGRAM KRIFTOGRAFI</a>
            </div>
        </div>
    </nav>
    <!-- #Top Bar -->
    <section>
        <!-- Left Sidebar -->
        <aside id="leftsidebar" class="sidebar">
            <!-- Menu -->
            <div class="menu">
                <ul class="list">
                    <li class="header">MENU NAVIGASI</li>

                        <a href="index.php">
                            <span>Beranda</span>
                        </a>
                    <li class="active">
						<a href="atbash.php">
                            <span>Atbash Cipher</span>
                        </a>
                    </li>						
						<a href="caesar.php">
                            <span>Caesar Cipher</span>
                        </a>
						<a href="keyword.php">
                            <span>Keyword Cipher</span>
                        </a>
						<a href="Polybius.php">
                            <span>PlayFair Cipher</span>
                        </a>
                    <li> </div>
            <!-- #Menu -->
        </aside>
        <!-- #END# Left Sidebar -->
        <!-- Right Sidebar --> <!-- #END# Right Sidebar -->
    </section>

    <section class="content">
        <div class="container-fluid">
			<div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="body">

                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div role="tabpanel" class="tab-pane fade in active" id="home">
                                    <b>ATBASH CIPHER</b>
										<p>
											Atbash Cipher merupakan suatu teknik enkripsi, dimana huruf alphabet disubtitusi dengan kebalikannya. Maksud dari kebalikan disini adalah huruf awal diganti dengan huruf terakhir, huruf kedua diganti dengan sebelum terakhir, dst...
										</p>
									<hr>
									<b>Lebih jelasnya :</b>
										<p>A   B   C   D   E   F   G   H   I   J   K   L   M   N   O   P   Q   R   S   T   U   V   W   X   Y   Z  (PlainText)<br>
										   Z   Y   X   W   V   U   T   S   R   Q   P   O   N   M   L   K   J   I   H   G   F   E   D   C   B   A  (CipherText)</p>
									<hr>
									<b>Dilihat dari keterangan diatas, maka :</b>
										<p>A akan menjadi Z<br>
											B akan menjadi Y<br>
											C akan menjadi X<br>
											D akan menjadi W<br>
											dan seterusnya...<br>
											<br>
											Sehingga jika kita memasukan Plaintext <b>OBING</b> maka akan menghasilkan CipherText <b>LYRMT</b>.</p>
								</div>
							</div>

						</div>
					</div>
				</div>

					<div class="col-sm-6">
						<div class="card">
							<div class="body">
								<div class="tab-content">
									<div role="tabpanel" class="tab-pane fade in active" id="home">
										<b>PlainText</b><br><br>
												<div class="row clearfix">
													<div class="col-sm-12" id="atbash">
														<form  action="atbash.php#atbash" method="get">
															<div class="form-group">
																<div class="form-line" >
																	<input class="form-control no-resize" placeholder="Masukan PlainText..." value="<?php
																	error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
																	$string = $_GET['dekripsi'];
																	$trans = array("A" => "Z", "Z" => "A", "B" => "Y" ,"Y" => "B", "C" => "X", "X" => "C", "D" => "W", "W" => "D", "E" => "V", "V" => "E", "F" => "U", "U" => "F", "G" => "T", "T" => "G", "H" => "S", "S" => "H", "I" => "R", "R" => "I", "J" => "Q", "Q" => "J", "K" => "P", "P" => "K", "L" => "O", "O" => "L", "M" => "N", "N" => "M","a" => "z", "z" => "a", "b" => "y" ,"y" => "b", "c" => "x", "x" => "c", "d" => "w", "w" => "d", "e" => "v", "v" => "e", "f" => "u", "u" => "f", "g" => "t", "t" => "g", "h" => "s", "s" => "h", "i" => "r", "r" => "i", "j" => "q", "q" => "j", "k" => "p", "p" => "k", "l" => "o", "o" => "l", "m" => "n", "n" => "m");
																	echo  $result = strtr($string,$trans);
																	?>" name="enkripsi"></input>
																</div>
															</div>
															<button type="submit" value="Enkripsi" class="btn bg-teal waves-effect" >
															<span>ENKRIPSI</span>
														</button>
														</form>
													</div>
												</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					
					<div class="col-sm-6">
						<div class="card">
							<div class="body">
								<div class="tab-content">
									<div role="tabpanel" class="tab-pane fade in active" id="home">
										<b>CipherText</b><br><br>
												<div class="row clearfix">
													<div class="col-sm-12" id="atbash">
														<form  action="atbash.php#atbash" method="get">
															<div class="form-group">
																<div class="form-line" >
																	<input class="form-control no-resize" placeholder="CipherText..." value="<?php
													error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
													$string = $_GET['enkripsi'];
													$trans = array("A" => "Z", "Z" => "A", "B" => "Y" ,"Y" => "B", "C" => "X", "X" => "C", "D" => "W", "W" => "D", "E" => "V", "V" => "E", "F" => "U", "U" => "F", "G" => "T", "T" => "G", "H" => "S", "S" => "H", "I" => "R", "R" => "I", "J" => "Q", "Q" => "J", "K" => "P", "P" => "K", "L" => "O", "O" => "L", "M" => "N", "N" => "M","a" => "z", "z" => "a", "b" => "y" ,"y" => "b", "c" => "x", "x" => "c", "d" => "w", "w" => "d", "e" => "v", "v" => "e", "f" => "u", "u" => "f", "g" => "t", "t" => "g", "h" => "s", "s" => "h", "i" => "r", "r" => "i", "j" => "q", "q" => "j", "k" => "p", "p" => "k", "l" => "o", "o" => "l", "m" => "n", "n" => "m");
													echo  $result = strtr($string,$trans);
													?>" name="dekripsi"></input>
																</div>
															</div>
															<button type="submit" value="Enkripsi" class="btn bg-teal waves-effect" >
															<span>DEKRIPSI</span>
														</button>
														</form>
													</div>
												</div>
									</div>
								</div>
							</div>
						</div>
					</div>		
					
			</div>
		</div>
            <!-- #END# Example Tab -->   
	   
    </section>

	    <!-- Select Plugin Js -->
    <script src="../../plugins/bootstrap-select/js/bootstrap-select.js"></script>
	
    <!-- Jquery Core Js -->
    <script src="plugins/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core Js -->
    <script src="plugins/bootstrap/js/bootstrap.js"></script>
	
	    <!-- Select Plugin Js -->
    <script src="../../plugins/bootstrap-select/js/bootstrap-select.js"></script>

    <!-- Select Plugin Js -->
    <script src="plugins/bootstrap-select/js/bootstrap-select.js"></script>

    <!-- Slimscroll Plugin Js -->
    <script src="plugins/jquery-slimscroll/jquery.slimscroll.js"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="plugins/node-waves/waves.js"></script>

    <!-- Jquery CountTo Plugin Js -->
    <script src="plugins/jquery-countto/jquery.countTo.js"></script>

    <!-- Morris Plugin Js -->
    <script src="plugins/raphael/raphael.min.js"></script>
    <script src="plugins/morrisjs/morris.js"></script>

    <!-- ChartJs -->
    <script src="plugins/chartjs/Chart.bundle.js"></script>

    <!-- Flot Charts Plugin Js -->
    <script src="plugins/flot-charts/jquery.flot.js"></script>
    <script src="plugins/flot-charts/jquery.flot.resize.js"></script>
    <script src="plugins/flot-charts/jquery.flot.pie.js"></script>
    <script src="plugins/flot-charts/jquery.flot.categories.js"></script>
    <script src="plugins/flot-charts/jquery.flot.time.js"></script>

    <!-- Sparkline Chart Plugin Js -->
    <script src="plugins/jquery-sparkline/jquery.sparkline.js"></script>

    <!-- Custom Js -->
    <script src="js/admin.js"></script>
    <script src="js/pages/index.js"></script>
	
	    <link href="../../plugins/bootstrap-select/css/bootstrap-select.css" rel="stylesheet" />

    <!-- Demo Js -->
    <script src="js/demo.js"></script>
</body>

</html>