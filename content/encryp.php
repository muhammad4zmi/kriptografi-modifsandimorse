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
                    echo "<script>alert('Masukkan File .txt!');location.replace('index.php?page=enkripsi');</script>";
                }
            
                if ($_FILES['teks']['error'] == UPLOAD_ERR_OK && is_uploaded_file($_FILES['teks']['tmp_name'])) { //checks that file is uploaded
                    $isi = file_get_contents($_FILES['teks']['tmp_name']); 
                }
            


		
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
        
                    


$time = microtime();
$time = explode(' ', $time);
$time = $time[1] + $time[0];
$start = $time;


                
                
		?>	
         <link rel="stylesheet" type="text/css" href="dist/sweetalert.css">
        <script type="text/javascript" src="dist/sweetalert.min.js"></script>
    <!-- Page Loader -->

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
														<form  action="content/stegano.php" method="POST" enctype="multipart/form-data">
															<div class="form-group">
																<div class="form-line" >
                                                                    <textarea name="text" class="form-control no-resize" placeholder="Masukan PlaningText..."><?php echo $isi; ?></textarea>
																	
																	
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
                                                               <!--  <div class="form-line" > -->
                                                            
                                                              <div class="input-group" style="margin-bottom:30px">
                                                                <span class="input-group-addon"><i class="fa fa-image"></i></span>
                                                            <!--<input type="file" class="form-control" accept="image/jpeg" name="maskfile" id="maskfile" required>-->
                                                                <input type="file" class="form-control" accept="image/jpeg" name="maskfile" id="fUpload"  onchange="tampilkanPreview(this,'preview')">
                                                                <ul id="ulList"></ul>
                                                              </div>
                                                              
                                                              
                                                              
                                                              
                                                         <!--  </div> -->
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

                                                            </div>

															 <b>Keterangan:</b>
                                                        <div class="form-group">
                                                                <div class="form-line" >
                                                                    <?php
                                                                    
                                                                    
                                                                    $time = microtime();
                                                                    $time = explode(' ', $time);
                                                                    $time = $time[1] + $time[0];
                                                                    $finish = $time;
                                                                    $total_time = round(($finish - $start), 4);
                                                                    $kalimat = $isi;
                                                                    echo "Jumlah Karakter : <b>" .strlen($kalimat)."</b><br/>";
                                                                    echo "Berhasil di Enkripsi dalam <b>" .$total_time."</b> detik";
                                                                    
                                                                    
                                                                    ?>
                                                                </div><br><br>
															<button type="submit" value="Enkripsi" class="btn bg-teal waves-effect" onclick="sweet()">
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

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script type="text/javascript">
                                                                    
                                                                    
 $(document).ready(function(){
  $("#fUpload").on('change', function () {
    $("#ulList").empty();
    var fp = $("#fUpload");
    var lg = fp[0]
    .files.length; // get length
    var items = fp[0].files;
    var fragment = "";
    if (lg > 0) {
        for (var i = 0; i < lg; i++) {
            var fileName = items[i].name; // get file name
            var fileSize = items[i].size; // get file size 
            var fileType = items[i].type; // get file type
                                                                              // append li to UL tag to display File info
            fragment += "<li>" + fileName + " " + fileSize + " bytes. Type :" + fileType + "</li>";
       }
        $("#ulList").append(fragment);
    }
  });
  });
</script>
<script type="text/javascript"> 
$(document).ready(function(){
function sweet (){
swal("Good job!", "You clicked the button!", "success");
}
}

</script>