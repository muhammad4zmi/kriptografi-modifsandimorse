<?php
    function strigToBinary($string)
    {
        $characters = str_split($string);
     
        $binary = [];
        foreach ($characters as $character) {
            $data = unpack('H*', $character);
            $binary[] = base_convert($data[1], 16, 2);
        }
     
        return implode(' ', $binary);    
    }
     
    function binaryToString($binary)
    {
        $binaries = explode(' ', $binary);
     
        $string = null;
        foreach ($binaries as $binary) {
            $string .= pack('H*', dechex(bindec($binary)));
        }
     
        return $string;    
    }



 function String2Hex($string){
    $hex='';
    for ($i=0; $i < strlen($string); $i++){
        $hex .= dechex(ord($string[$i]));
    }
    return $hex;
}
 
 
function Hex2String($hex){
    $string='';
    for ($i=0; $i < strlen($hex)-1; $i+=2){
        $string .= chr(hexdec($hex[$i].$hex[$i+1]));
    }
    return $string;
}   



                $eks = array('.txt');
                $ekst = strrchr($_FILES['teks']['name'],'.');
                
                if(!in_array($ekst,$eks)) {
                    echo "<script>alert('Masukkan File .txt!');location.replace('enkripsi.php');</script>";
                }
            
                if ($_FILES['teks']['error'] == UPLOAD_ERR_OK && is_uploaded_file($_FILES['teks']['tmp_name'])) { //checks that file is uploaded
                    $isi = file_get_contents($_FILES['teks']['tmp_name']); 
                }
            

?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>APLIKASI KRIFTOGRAFI</title>

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
<?php
		
		//if (isset($_POST['enkrip'])) {
                        $deret = $_POST['jd_enkripsi'];
                    $tab = "abcdefghijklmnopqrstuvwxyz";
                    $tab1 = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
                    
                    $ciparr = array();
                    
                    $idx = 0;
                    for($i=0;$i<strlen($isi);$i++) {
                        for($j=0;$j<strlen($tab);$j++) {
                            if($isi[$i]==" " || !ctype_alpha($isi[$i])) {
                                array_push($ciparr,$isi[$i]);
                                continue;
                            }
                            
                            if($isi[$i]==$tab[$j]) {
                                $idx = $j;
                                $cip = ($j+$deret)%26;
                                array_push($ciparr,$tab[$cip]);
                            }
                            
                            if($isi[$i]==$tab1[$j]) {
                                $idx = $j;
                                $cip = ($j+$deret)%26;
                                array_push($ciparr,$tab1[$cip]);
                            }
                        }
                    }
                    $cipher1 = implode('',$ciparr);
                    //$cipherText = Encipher($text, $deret);
                    $binary = strigToBinary($cipher1).PHP_EOL;
                    $hex = bin2hex($binary);
                    //$hex = String2Hex($cipher1);
                    $string = $hex;
                    $string_lower = strtolower($string);
                    $assoc_array = array(
                        "a"=>".-",
                        "b"=>"-...", 
                        "c"=>"-.-.", 
                        "d"=>"-..", 
                        "e"=>".", 
                        "f"=>"..-.", 
                        "g"=>"--.", 
                        "h"=>"....", 
                        "i"=>"..", 
                        "j"=>".---", 
                        "k"=>"-.-", 
                        "l"=>".-..", 
                        "m"=>"--", 
                        "n"=>"-.", 
                        "o"=>"---", 
                        "p"=>".--.", 
                        "q"=>"--.-", 
                        "r"=>".-.", 
                        "s"=>"...", 
                        "t"=>"-", 
                        "u"=>"..-", 
                        "v"=>"...-", 
                        "w"=>".--", 
                        "x"=>"-..-", 
                        "y"=>"-.--", 
                        "z"=>"--..", 
                        "0"=>"-----",
                        "1"=>".----", 
                        "2"=>"..---", 
                        "3"=>"...--", 
                        "4"=>"....-", 
                        "5"=>".....", 
                        "6"=>"-....", 
                        "7"=>"--...", 
                        "8"=>"---..", 
                        "9"=>"----.",
                        "."=>".-.-.-",
                        ","=>"--..--",
                        "?"=>"..--..",
                        "/"=>"-..-.",
                        " "=>" ");
                        
                                                                    
                    //$string = $hex;
                   
                       // $binary = binaryToString($cipher1);                                             
                    //echo $hex;
                    


                
                
		?>	
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
                <a class="navbar-brand" href="index.html">APLIKASI KRIFTOGRAFI</a>
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
						<a href="caesar.php">
                            <span>Kriptografi</span>
                        </a>
					</li>
						
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

                            <H4>KOMBINASI CAESAR CIPHER - HILL CIPHER DAN STEGANOGRAFI LSB DENGAN MODIKASI SANDI MORSE UNTUK KEAMANAN PESAN</H4>
                            

						</div>
					</div>
				</div>
				

					<div class="col-sm-12">
						<div class="card">
							<div class="body">
								<div class="tab-content">
									<div role="tabpanel" class="tab-pane fade in active" id="home">
										<b>PlainText</b><br><br>
												<div class="row clearfix">
													<div class="col-sm-12" id="caesar">
														<form  action="stegano.php" method="POST" enctype="multipart/form-data">
															<div class="form-group">
																<div class="form-line" >
                                                                    <textarea name="text" rows="4" class="form-control no-resize" placeholder="Masukan PlaningText..."><?php echo $isi; ?></textarea>
																	
																	
																</div>
															</div>
                                                            <b>Hasil CipherText</b><br><br>
															<div class="form-group">
																<div class="form-line" >
                                                                    
                                                                <textarea name="secret" class="form-control no-resize" placeholder="Masukan PlaningText..."><?php 
                                                                for($i=0;$i<strlen($string_lower);$i++){
                                                                    foreach($assoc_array as $letter => $code){
                                                                        if($letter == $string_lower[$i]){
                                                                            echo $code. ',';
                                                                        }
                                                                    }
                                                                }





                                                                ?></textarea>
																</div>
															</div>
                                                                </div>
                                                            <br>
                                                            <div class="header">
                                                                
                                                                
                                                            </div>
                                                                 <div class="row clearfix">
                                                                    <div class="col-md-6">
                                                                        <b>Gambar pembawa pesan (jpg):</b>
                                                                         <div class="form-group">
                                                                <div class="form-line" >
                                                            
                                                              <div class="input-group" style="margin-bottom:30px">
                                                                <span class="input-group-addon"><i class="fa fa-image"></i></span>
                                                            <!--<input type="file" class="form-control" accept="image/jpeg" name="maskfile" id="maskfile" required>-->
                                                                <input type="file" class="form-control" accept="image/jpeg" name="maskfile"  onchange="tampilkanPreview(this,'preview')">
                                                              </div>
                                                              
                                                          </div>
                                                      </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                                <b>Preview Gambar</b>
                                                            <div class="form-group">
                                                                <div class="form-line" >
                                                                    <img id="preview" width="290px" src="images/user.png" />
                                                                </div>
                                                                
                                                                </div>
                                                            </div>
                                                        </div>
															
															<button type="submit" value="Enkripsi" class="btn bg-teal waves-effect" onclick="Decipher();">
															<span>PROSES</span>
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
     <script type="text/javascript">
function tampilkanPreview(userfile,idpreview)
{
  var gb = userfile.files;
  for (var i = 0; i < gb.length; i++)
  {
    var gbPreview = gb[i];
    var imageType = /image.*/;
    var preview=document.getElementById(idpreview);
    var reader = new FileReader();
    if (gbPreview.type.match(imageType))
    {
      //jika tipe data sesuai
      preview.file = gbPreview;
      reader.onload = (function(element)
      {
        return function(e)
        {
          element.src = e.target.result;
        };
      })(preview);
      //membaca data URL gambar
      reader.readAsDataURL(gbPreview);
    }
      else
      {
        //jika tipe data tidak sesuai
        alert("Tipe file tidak sesuai. Gambar harus bertipe .png, .gif atau .jpg.");
      }
  }
}
</script>
</body>

</html>