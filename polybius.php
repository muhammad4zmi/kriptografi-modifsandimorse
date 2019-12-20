<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>PLAYFAIR CIPHER - PROGRAM KRIFTOGRAFI</title>

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

<script type="text/javascript">
function resetFields(pForm,type){
    if (type==0){
        document.getElementById('playfairCipherText').value='';
        document.getElementById('playfairCipherDiv').innerHTML='';
    }else{
        var text=document.getElementById('playfairCipherText').value;
        pForm.reset();
        repopulateReplace2(0);
        document.getElementById('playfairCipherRandom').disabled=true;
        document.getElementById('playfairCipherKey').disabled=false;
        document.getElementById('playfairCipherText').value=text;
        document.getElementById('playfairCipherDiv').innerHTML='';
    }
    playfairCipher();
}
</script>

<script type="text/javascript">
var inChars = new Array('a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','p','q','r','s','t','u','v','w','x','y','z');

function repopulateReplace2(id){
    if (id==1){
        var r1=document.getElementById('playfairCipherReplace1').value;
        var r2=document.getElementById('playfairCipherReplace2').value;
        if (r2==r1 && r1=='I'){
            r2='A';
        }else if(r2==r1){
            r2='I';
        }
    }else{
        r2='I'
    }
    document.getElementById('playfairCipherReplace2').options.length=0;
    var j=0;
    for (var i=0; i<inChars.length; i++){
        if (r1!=inChars[i].toUpperCase()){
            if (i==9){
                defSel=true;
            }else{
                defSel=false;
            }
            if (r2==inChars[i].toUpperCase()){
                sel=true;
            }else{
                sel=false;
            }
            document.getElementById('playfairCipherReplace2').options[j]=new Option(inChars[i].toUpperCase(), inChars[i].toUpperCase(), defSel, sel);
            j++;
        }
    }
}

function populateSquare(action){
    //Action = 0 => empty
    //Action = 1 => random
    //Action = 2 => standard with key
    //Action = 3 => get random or standard from document

    if (action==3){
        if(document.getElementById('playfairCipherManualCheck').checked){
            action=1;
        }else{
            action=2;
        }
    }

    if (document.getElementById('playfairCipherReplaceCheck').checked){
        var omit='';
        var subs=[document.getElementById('playfairCipherReplace1').value,document.getElementById('playfairCipherReplace2').value];
    }else{
        var omit=document.getElementById('playfairCipherOmit').value;
        var subs=['',''];
    }

    var charList=new Array();
    for(var i=0; i<inChars.length; i++){
        if (inChars[i]!=subs[0].toLowerCase() && inChars[i]!=omit.toLowerCase()){
            charList.push(inChars[i]);
        }
    }
    if (action==0){
        for(i=0; i<25; i++){
            document.getElementById(i).value='';
        }
    }
    if (action==1){
        for(var i=0; i<25; i++){
            var pos=Math.floor((Math.random()*(25-i))+1)-1;
            if (pos>=charList.length){
                pos=(charList.length-1);
            }
            if (pos<0){
                pos=0;
            }
            document.getElementById(i).value=charList[pos].toUpperCase();
            charList.splice(pos,1);
        }
    }
    if (action==2){
        var key=document.getElementById('playfairCipherKey').value;
        var elID=0;
        for(var i=0; i<key.length; i++){
            if (key.charAt(i).toUpperCase()==subs[0].toUpperCase()){
                var keyChar=subs[1].toUpperCase();
            }else{
                var keyChar=key.charAt(i);
            }
            if (charList.indexOf(keyChar.toLowerCase())>-1){
                document.getElementById(elID).value=keyChar.toUpperCase();
                charList.splice(charList.indexOf(keyChar.toLowerCase()),1);
                elID++;
            }
        }
        var keyLength=25-charList.length;
        for(var i=0; i<charList.length; i++){
            document.getElementById(i+keyLength).value=charList[i].toUpperCase();
        }
    }
    playfairCipher();
}

function setEnabled(id){
    if (id==1){
        if (document.getElementById('playfairCipherManualCheck').checked){
            document.getElementById('playfairCipherRandom').disabled=false;
            document.getElementById('playfairCipherKey').disabled=true;
            populateSquare(0);
        }else{
            document.getElementById('playfairCipherRandom').disabled=true;
            document.getElementById('playfairCipherKey').disabled=false;
            populateSquare(2);
        }
    }else if(id==2){
        if (document.getElementById('playfairCipherReplaceCheck').checked){
            document.getElementById('playfairCipherReplace1').disabled=false;
            document.getElementById('playfairCipherReplace2').disabled=false;
            document.getElementById('playfairCipherOmit').disabled=true;
            populateSquare(3);
        }else{
            document.getElementById('playfairCipherReplace1').disabled=true;
            document.getElementById('playfairCipherReplace2').disabled=true;
            document.getElementById('playfairCipherOmit').disabled=false;
            populateSquare(3);
        }
    }else if(id==3){
        if (document.getElementById('playfairCipherBreakCheck').checked){
            document.getElementById('playfairCipherDoubleChar').disabled=false;
            document.getElementById('playfairCipherBreakMethod').disabled=false;
        }else{
            document.getElementById('playfairCipherDoubleChar').disabled=true;
            document.getElementById('playfairCipherBreakMethod').disabled=true;
        }
    }

    playfairCipher();
}

function checkValues(num){
    if (document.getElementById('playfairCipherReplaceCheck').checked){
        var omit='';
        var subs=[document.getElementById('playfairCipherReplace1').value,document.getElementById('playfairCipherReplace2').value];
    }else{
        var omit=document.getElementById('playfairCipherOmit').value;
        var subs=['',''];
    }

    var charList=new Array();
    for(var i=0; i<inChars.length; i++){
        if (inChars[i]!=subs[0].toLowerCase() && inChars[i]!=omit.toLowerCase()){
            charList.push(inChars[i]);
        }
    }

    var newVal=document.getElementById(num).value;
    if (newVal.toUpperCase()==subs[0]){
        document.getElementById(num).value=subs[1];
        newVal=subs[1];
    }
    var newValIndex=charList.indexOf(newVal.toLowerCase());
    if (newValIndex>-1){
        var charCounts=new Array(0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0);
        for(i=0; i<25; i++){
            if (i!=parseInt(num)){
                var oldValIndex=charList.indexOf(document.getElementById(i).value.toLowerCase());
                charCounts[oldValIndex]=1;
            }
        }
        if (charCounts[newValIndex]==0){
            document.getElementById(num).value=newVal.toUpperCase();
        }else{
            document.getElementById(num).value='';
        }
    }else{
        document.getElementById(num).value='';
    }
    playfairCipher();
}

function playfairCipher(){
    var chars=document.getElementById('playfairCipherText').value;
    if (chars.length==0){
        document.getElementById('playfairCipherDiv').innerHTML='';
        return;
    }

    var keySquare=new Array();
    var emptyFound=0;
    for(var i=0; i<25; i++){
        keySquare.push(document.getElementById(i).value);
        if (document.getElementById(i).value==''){
            emptyFound=1;
        }
    }

    if (emptyFound==1){
        newDiv='<b>Hasil :</b><br>Key square is incomplete';
        document.getElementById('playfairCipherDiv').innerHTML=newDiv;
        return;
    }

    var dropDownMethod = document.getElementById("playfairCipherMethod");
    var method = dropDownMethod.options[dropDownMethod.selectedIndex].value;

    var newDiv='<b>CipherText :</b><br>';

    newDiv+='<div class="form-group"><div class="form-line"><textarea class="form-control no-resize" id="playfairCipherResult" rows="4">';
	
    if (document.getElementById('playfairCipherReplaceCheck').checked){
        var omit='';
        var subs=[document.getElementById('playfairCipherReplace1').value,document.getElementById('playfairCipherReplace2').value];
    }else{
        var omit=document.getElementById('playfairCipherOmit').value;
        var subs=['',''];
    }

    if (document.getElementById('playfairCipherBreakCheck').checked){
        var doublesMethod=document.getElementById('playfairCipherBreakMethod').value;
        var replace=document.getElementById('playfairCipherDoubleChar').value;
    }else{
        var doublesMethod='breakNone';
        var replace=document.getElementById('playfairCipherDoubleChar').value;
    }

    var charList=new Array();
    for(var i=0; i<inChars.length; i++){
        if (inChars[i]!=subs[0].toLowerCase() && inChars[i]!=omit.toLowerCase()){
            charList.push(inChars[i]);
        }
    }

    var charCount=new Array('',0);
    var tempChars='';
    if (doublesMethod!='breakNone'){
        var c1='';
        var c2='';
        for(var i=0; i<chars.length; i++){
            if (c1==''){
                if (omit=='' && chars.charAt(i).toUpperCase()==subs[0].toUpperCase()){
                    if (chars.charAt(i)==chars.charAt(i).toUpperCase()){
                        c1=subs[1].toUpperCase();
                    }else{
                        c1=subs[1].toLowerCase();
                    }
                    charCount[0]=c1;
                    charCount[1]++;
                }else if (charList.indexOf(chars.charAt(i).toLowerCase())>-1){
                    c1=chars.charAt(i);
                    charCount[0]=c1;
                    charCount[1]++;
                }
            }else{
                if (omit=='' && chars.charAt(i).toUpperCase()==subs[0].toUpperCase()){
                    if (chars.charAt(i)==chars.charAt(i).toUpperCase()){
                        c2=subs[1].toUpperCase();
                    }else{
                        c2=subs[1].toLowerCase();
                    }
                    charCount[0]=c2;
                    charCount[1]++;
                }else if (charList.indexOf(chars.charAt(i).toLowerCase())>-1){
                    c2=chars.charAt(i);
                    charCount[0]=c2;
                    charCount[1]++;
                }
            }
            if (c1!='' && c2!=''){
                if (c1.toLowerCase()==c2.toLowerCase()){
                    if (c1==c1.toUpperCase()){
                        tempChars+=replace.toUpperCase();
                        charCount[0]=replace.toUpperCase();
                    }else{
                        tempChars+=replace.toLowerCase();
                        charCount[0]=replace.toLowerCase();
                    }
                    charCount[1]++;
                }
                if (doublesMethod=='breakAll'){
                    c1=c2;
                    c2='';
                }else{
                    c1='';
                    c2='';
                }
            }

            if (omit=='' && chars.charAt(i).toUpperCase()==subs[0].toUpperCase()){
                if (chars.charAt(i)==chars.charAt(i).toUpperCase()){
                    tempChars+=subs[1].toUpperCase();
                }else{
                    tempChars+=subs[1].toLowerCase();
                }
            }else{
                tempChars+=chars.charAt(i);
            }

        }
        chars=tempChars;
    }else{
        for(var i=0; i<chars.length; i++){
            if (omit=='' && chars.charAt(i).toUpperCase()==subs[0].toUpperCase()){
                if (chars.charAt(i)==chars.charAt(i).toUpperCase()){
                    charCount[0]=subs[1].toUpperCase();
                    tempChars+=subs[1].toUpperCase();
                }else{
                    charCount[0]=subs[1].toLowerCase();
                    tempChars+=subs[1].toLowerCase();
                }
                charCount[1]++;
            }else if (charList.indexOf(chars.charAt(i).toLowerCase())>-1){
                charCount[0]=chars.charAt(i);
                charCount[1]++;
                tempChars+=chars.charAt(i);
            }else{
                tempChars+=chars.charAt(i);
            }
        }
        chars=tempChars;
    }

    if (charCount[1]%2!=0){
        if (charCount[0]==charCount[0].toUpperCase()){
            chars+=replace.toUpperCase();
        }else{
            chars+=replace.toLowerCase();
        }
    }

    //newDiv+=tempChars+'\n';
    //newDiv+=chars+'\n';
    //newDiv+=charCount[0]+' - '+charCount[1]+'\n\n';

    var i=0;
    var firstChar='';
    var secondChar='';
    var newChars='';
    while(i<chars.length){
        if (firstChar==''){
            if (charList.indexOf(chars.charAt(i).toLowerCase())>-1){
                firstChar=chars.charAt(i);
            }
        }else{
            if (charList.indexOf(chars.charAt(i).toLowerCase())>-1){
                secondChar=chars.charAt(i);
            }
        }
        if (firstChar!='' && secondChar!=''){
            var keyLocFirst=keySquare.indexOf(firstChar.toUpperCase());
            var rowNmbFirst=Math.floor(keyLocFirst/5);
            var columnNmbFirst=(keyLocFirst%5);
            var keyLocSecond=keySquare.indexOf(secondChar.toUpperCase());
            var rowNmbSecond=Math.floor(keyLocSecond/5);
            var columnNmbSecond=(keyLocSecond%5);
            if (method=='Encrypt'){
                var shift=1;
            }else{
                var shift=4;
            }
            if (firstChar==secondChar && doublesMethod=='breakNone'){
                if(firstChar==firstChar.toUpperCase()){
                    newChars+=keySquare[((rowNmbFirst+shift)%5)*5+((columnNmbFirst+shift)%5)].toUpperCase();
                }else{
                    newChars+=keySquare[((rowNmbFirst+shift)%5)*5+((columnNmbFirst+shift)%5)].toLowerCase();
                }
                if(secondChar==secondChar.toUpperCase()){
                    newChars+=keySquare[((rowNmbSecond+shift)%5)*5+((columnNmbSecond+shift)%5)].toUpperCase();
                }else{
                    newChars+=keySquare[((rowNmbSecond+shift)%5)*5+((columnNmbSecond+shift)%5)].toLowerCase();
                }
            }else if (rowNmbFirst==rowNmbSecond){ // Same row
                if(firstChar==firstChar.toUpperCase()){
                    newChars+=keySquare[rowNmbFirst*5+((columnNmbFirst+shift)%5)].toUpperCase();
                }else{
                    newChars+=keySquare[rowNmbFirst*5+((columnNmbFirst+shift)%5)].toLowerCase();
                }
                if(secondChar==secondChar.toUpperCase()){
                    newChars+=keySquare[rowNmbSecond*5+((columnNmbSecond+shift)%5)].toUpperCase();
                }else{
                    newChars+=keySquare[rowNmbSecond*5+((columnNmbSecond+shift)%5)].toLowerCase();
                }
            }else if(columnNmbFirst==columnNmbSecond){ //Same column
                if(firstChar==firstChar.toUpperCase()){
                    newChars+=keySquare[((rowNmbFirst+shift)%5)*5+columnNmbFirst].toUpperCase();
                }else{
                    newChars+=keySquare[((rowNmbFirst+shift)%5)*5+columnNmbFirst].toLowerCase();
                }
                if(secondChar==secondChar.toUpperCase()){
                    newChars+=keySquare[((rowNmbSecond+shift)%5)*5+columnNmbSecond].toUpperCase();
                }else{
                    newChars+=keySquare[((rowNmbSecond+shift)%5)*5+columnNmbSecond].toLowerCase();
                }
            }else{ //Rectangle
                if(firstChar==firstChar.toUpperCase()){
                    newChars+=keySquare[rowNmbFirst*5+columnNmbSecond].toUpperCase();
                }else{
                    newChars+=keySquare[rowNmbFirst*5+columnNmbSecond].toLowerCase();
                }
                if(secondChar==secondChar.toUpperCase()){
                    newChars+=keySquare[rowNmbSecond*5+columnNmbFirst].toUpperCase();
                }else{
                    newChars+=keySquare[rowNmbSecond*5+columnNmbFirst].toLowerCase();
                }
            }

            firstChar='';
            secondChar='';
        }
        i++;
    }

    newCharsLoc=0;
    for(var i=0; i<chars.length; i++){
        var currentChar=chars.charAt(i);
        if (currentChar.toUpperCase()==subs[0].toUpperCase()){
            currentChar=subs[1];
        }
        var keyLoc=keySquare.indexOf(currentChar.toUpperCase());
        if (keyLoc>-1){
            newDiv+=newChars.charAt(newCharsLoc);
            newCharsLoc++;
        }else{
            newDiv+=chars.charAt(i);
        }
    }
    while (newCharsLoc<newChars.length){
        newDiv+=newChars.charAt(newCharsLoc);
        newCharsLoc++;
    }

    newDiv+='</textarea>';
    document.getElementById('playfairCipherDiv').innerHTML=newDiv;
}
</script>

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
                    <li>
						<a href="atbash.php">
                            <span>Atbash Cipher</span>
                        </a>
                    </li>				
					<li>
						<a href="caesar.php">
                            <span>Caesar Cipher</span>
                        </a>
					</li>
						<a href="keyword.php">
                            <span>Keyword Cipher</span>
                        </a>
						<li class="active">
						<a href="Polybius.php">
                            <span>PlayFair Cipher</span>
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

                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div role="tabpanel" class="tab-pane fade in active" id="home">
                                    <b>PLAYFAIR CIPHER</b>
										<p>
Playfair cipher atau bisa juga disebut Playfair square adalah teknik enkripsi simetrik yang termasuk dalam sistem substitusi digraph . sistem sandi ini diciptakan oleh Charles Wheatstone (kalo di buku fisika dia yang nemuin jembatan wheatstone) pada tahun 1854, namun dipopulerkan penggunaannya oleh Lord Playfair.								
								</p>
								</div>
							</div>

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
								
								<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
									<div class="card">
										<div class="body">

											<!-- Tab panes -->
											<div class="tab-content">
												<div role="tabpanel" class="tab-pane fade in active" id="home">
														<table align="center">
														<tr><td>
														<input type="text" size="1" id="0" value="A" onChange="checkValues(0)" onKeyDown="checkValues(0)" onKeyUp="checkValues(0)">
														<input type="text" size="1" id="1" value="B" onChange="checkValues(1)" onKeyDown="checkValues(1)" onKeyUp="checkValues(1)">
														<input type="text" size="1" id="2" value="C" onChange="checkValues(2)" onKeyDown="checkValues(2)" onKeyUp="checkValues(2)">
														<input type="text" size="1" id="3" value="D" onChange="checkValues(3)" onKeyDown="checkValues(3)" onKeyUp="checkValues(3)">
														<input type="text" size="1" id="4" value="E" onChange="checkValues(4)" onKeyDown="checkValues(4)" onKeyUp="checkValues(4)">
														</td></tr>
														<tr><td>
														<input type="text" size="1" id="5" value="F" onChange="checkValues(5)" onKeyDown="checkValues(5)" onKeyUp="checkValues(5)">
														<input type="text" size="1" id="6" value="G" onChange="checkValues(6)" onKeyDown="checkValues(6)" onKeyUp="checkValues(6)">
														<input type="text" size="1" id="7" value="H" onChange="checkValues(7)" onKeyDown="checkValues(7)" onKeyUp="checkValues(7)">
														<input type="text" size="1" id="8" value="I" onChange="checkValues(8)" onKeyDown="checkValues(8)" onKeyUp="checkValues(8)">
														<input type="text" size="1" id="9" value="K" onChange="checkValues(9)" onKeyDown="checkValues(9)" onKeyUp="checkValues(9)">
														</td></tr>
														<tr><td>
														<input type="text" size="1" id="10" value="L" onChange="checkValues(10)" onKeyDown="checkValues(10)" onKeyUp="checkValues(10)">
														<input type="text" size="1" id="11" value="M" onChange="checkValues(11)" onKeyDown="checkValues(11)" onKeyUp="checkValues(11)">
														<input type="text" size="1" id="12" value="N" onChange="checkValues(12)" onKeyDown="checkValues(12)" onKeyUp="checkValues(12)">
														<input type="text" size="1" id="13" value="O" onChange="checkValues(13)" onKeyDown="checkValues(13)" onKeyUp="checkValues(13)">
														<input type="text" size="1" id="14" value="P" onChange="checkValues(14)" onKeyDown="checkValues(14)" onKeyUp="checkValues(14)">
														</td></tr>
														<tr><td>
														<input type="text" size="1" id="15" value="Q" onChange="checkValues(15)" onKeyDown="checkValues(15)" onKeyUp="checkValues(15)">
														<input type="text" size="1" id="16" value="R" onChange="checkValues(16)" onKeyDown="checkValues(16)" onKeyUp="checkValues(16)">
														<input type="text" size="1" id="17" value="S" onChange="checkValues(17)" onKeyDown="checkValues(17)" onKeyUp="checkValues(17)">
														<input type="text" size="1" id="18" value="T" onChange="checkValues(18)" onKeyDown="checkValues(18)" onKeyUp="checkValues(18)">
														<input type="text" size="1" id="19" value="U" onChange="checkValues(19)" onKeyDown="checkValues(19)" onKeyUp="checkValues(19)">
														</td></tr>
														<tr><td>
														<input type="text" size="1" id="20" value="V" onChange="checkValues(20)" onKeyDown="checkValues(20)" onKeyUp="checkValues(20)">
														<input type="text" size="1" id="21" value="W" onChange="checkValues(21)" onKeyDown="checkValues(21)" onKeyUp="checkValues(21)">
														<input type="text" size="1" id="22" value="X" onChange="checkValues(22)" onKeyDown="checkValues(22)" onKeyUp="checkValues(22)">
														<input type="text" size="1" id="23" value="Y" onChange="checkValues(23)" onKeyDown="checkValues(23)" onKeyUp="checkValues(23)">
														<input type="text" size="1" id="24" value="Z" onChange="checkValues(24)" onKeyDown="checkValues(24)" onKeyUp="checkValues(24)">
														</td></tr>
														</table>
														</div>
											</div>

										</div>
									</div>
								</div>
														
								<div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
									<div class="card">
										<div class="body">

											<!-- Tab panes -->
											<div class="tab-content">
												<div role="tabpanel" class="tab-pane fade in active" id="home">
												
													<table width="100%">
													<tr><td>
												<div class="form-group">
																<div class="form-line" >
																<input type="radio" name="manualKey" id="playfairCipherKeyCheck" checked="true" onClick="setEnabled(1)">
												<input class="form-control no-resize" placeholder="Masukan kata kunci..." type="text" id="playfairCipherKey" onKeyDown="populateSquare(2)" onKeyUp="populateSquare(2)">
												</div>
												</div></td></tr>
												<tr><td>
												Huruf yang diganti : <input type="radio" name="replaceOmit" id="playfairCipherReplaceCheck" checked="true" onClick="setEnabled(2)">
												 <select  id="playfairCipherReplace1" onChange="repopulateReplace2(1);populateSquare(3);">
												<option value="A">A</option>
												<option value="B">B</option>
												<option value="C">C</option>
												<option value="D">D</option>
												<option value="E">E</option>
												<option value="F">F</option>
												<option value="G">G</option>
												<option value="H">H</option>
												<option value="I">I</option>
												<option selected value="J">J</option>
												<option value="K">K</option>
												<option value="L">L</option>
												<option value="M">M</option>
												<option value="N">N</option>
												<option value="O">O</option>
												<option value="P">P</option>
												<option value="Q">Q</option>
												<option value="R">R</option>
												<option value="S">S</option>
												<option value="T">T</option>
												<option value="U">U</option>
												<option value="V">V</option>
												<option value="W">W</option>
												<option value="X">X</option>
												<option value="Y">Y</option>
												<option value="Z">Z</option>
												</select> diganti dengan <select id="playfairCipherReplace2" onChange="populateSquare(3)">
												<option value="A">A</option>
												<option value="B">B</option>
												<option value="C">C</option>
												<option value="D">D</option>
												<option value="E">E</option>
												<option value="F">F</option>
												<option value="G">G</option>
												<option value="H">H</option>
												<option selected value="I">I</option>
												<option value="K">K</option>
												<option value="L">L</option>
												<option value="M">M</option>
												<option value="N">N</option>
												<option value="O">O</option>
												<option value="P">P</option>
												<option value="Q">Q</option>
												<option value="R">R</option>
												<option value="S">S</option>
												<option value="T">T</option>
												<option value="U">U</option>
												<option value="V">V</option>
												<option value="W">W</option>
												<option value="X">X</option>
												<option value="Y">Y</option>
												<option value="Z">Z</option>
												</select><hr></td></tr>
												<tr><td>
												Jika jumlah huruf ganjil, tambahkan huruf : <select id="playfairCipherDoubleChar" onChange="playfairCipher()">
												<option value="A">A</option>
												<option value="B">B</option>
												<option value="C">C</option>
												<option value="D">D</option>
												<option value="E">E</option>
												<option value="F">F</option>
												<option value="G">G</option>
												<option value="H">H</option>
												<option value="I">I</option>
												<option value="J">J</option>
												<option value="K">K</option>
												<option value="L">L</option>
												<option value="M">M</option>
												<option value="N">N</option>
												<option value="O">O</option>
												<option value="P">P</option>
												<option value="Q">Q</option>
												<option value="R">R</option>
												<option value="S">S</option>
												<option value="T">T</option>
												<option value="U">U</option>
												<option value="V">V</option>
												<option value="W">W</option>
												<option value="X">X</option>
												<option value="Y">Y</option>
												<option selected value="Z">Z</option>
												</select> diakhir.<hr></td></tr>
												<tr><td>
												<input type="radio" name="doubles" id="playfairCipherBreakCheck" onClick="setEnabled(3)">
												</td></tr>
												<tr><td>Pilih metode : <select id="playfairCipherMethod" onChange="playfairCipher()">
												<option selected value="Decrypt">Dekripsi</option>
												<option value="Encrypt">Enkripsi</option>
												</select></td></tr>
												</table>
												</div>
											</div>

										</div>
									</div>
								</div>
								
								<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
									<div class="card">
										<div class="body">

											<!-- Tab panes -->
											<div class="tab-content">
												<div role="tabpanel" class="tab-pane fade in active" id="home">
												<table width="100%">
												<tr><td><div class="form-group">
                                        <div class="form-line">
										<textarea  rows="4" class="form-control no-resize" placeholder="Masukan PlainText..." id="playfairCipherText" onKeyDown="playfairCipher()" onKeyUp="playfairCipher()"></textarea>
										</div>
										</div>
										</td></tr>
												<tr><td><input class="btn bg-teal waves-effect" name="Reset fields" value="RESET TEKS" type="button" onclick="resetFields(this.form,0);"><hr></td></tr>
												<tr><td><div id="playfairCipherDiv"></div></td></tr>
												</table>
												</div>
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