
<?php
		
		if (isset($_POST['submit'])){
		
		// ini untuk convert string menjadi uppercase
		function cltn($char){
		$char = strtoupper($char);
		$ord = ord($char);
		return ($ord > 64 && $ord < 91) ? ($ord - 64) : false;
		}

		// Fungsi Enkripsi
					// Ambil Value Inputan
		function encrypt_cipher($str, $plus){
		// Validasi Input Jika Benar Numeric dan String
		if( is_numeric($plus) && $plus <= 26 && is_string($str) ) {
		// Membuat Variabel $al dengan Nilai Array (a-z)
		$al = array('a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z');
		$nstr = '';
		// Convert Inputan String Ke Array Pake str_split
		foreach( str_split($str) as $i => $v ) {
		//convert string menjadi uppercase
		if( cltn($v) ) {
		$ltn = cltn($v) - 1;
		if( ( $ltn + $plus ) > 25 ) {
		$nstr .= $al[( $ltn + $plus ) - 25];
		}else{
		$nstr .= $al[$ltn+$plus];
		}
		}else{
		$nstr .= $v;
		}
		}
		return $nstr;
		}else{
		return false;	
		}
		}

		} // end isset
		?>	
    <!-- Page Loader -->
   
			<div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="body">

                            <H4>KOMBINASI CAESAR CIPHER - HILL CIPHER DAN STEGANOGRAFI LSB DENGAN MODIKASI SANDI MORSE UNTUK KEAMANAN PESAN</H4>
                            

						</div>
					</div>
				</div>
				
				<?php
				function Cipher($ch, $key)
																	{
																		if (!ctype_alpha($ch))
																			return $ch;

																		$offset = ord(ctype_upper($ch) ? 'A' : 'a');
																		return chr(fmod(((ord($ch) + $key) - $offset), 26) + $offset);
																	}
				?>

					<div class="col-sm-12">
						<div class="card">
							<div class="body">
								<div class="tab-content">
									<div role="tabpanel" class="tab-pane fade in active" id="home">
										<form method="POST" action="encryp.php" enctype="multipart/form-data">
										<b>PlainText</b><br><br>
												<div class="row clearfix">
													<div class="col-sm-12" id="caesar">
														<form  action="caesar.php#caesar" method="get">
															<div class="form-group">
																<div class="form-line" >
																	<input type="file" name="teks" required="required" accept=".txt" />
																	
																</div>
															</div>
															<b>Key Caesar</b><br><br>
															<div class="form-group">
																<div class="form-line" >
																	<input class="form-control" style="width:200px;" placeholder="Masukan Jumlah Deret..." name="jd_enkripsi"></input>
																</div>
															</div>
															<b>Key Hill</b><br>
															<div class="form-group">
																
																	<table align="left">
                                                        <tr><td>
                                                        <input type="text" size="5" id="0"  value = "">
                                                        <input type="text" size="5" id="1"  value = "">
                                                        
                                                        
                                                        </td></tr><br/>
                                                        <tr><td>
                                                        <input type="text" size="5" id="5"  value = "">
                                                        <input type="text" size="5" id="6"  value = "">
                                                        
                                                        </td></tr>
                                                        
                                                        </table>
															
														
                                                    </div>




                                                           
															<br><br><br><br>
															<!-- <button type="submit" value="Enkripsi" class="btn bg-teal waves-effect" onclick="Decipher();">
															<span>ENKRIPSI</span> -->
                                                            <button type="submit" value="Enkripsi" class="btn btn-block btn-lg btn-primary waves-effect" onclick="Decipher();">PROSES</button>

															</button>
														</form>
													</div>
												</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					
					
					
			