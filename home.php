
<HTML><HEAD><TITLE>Keyed Caesar</TITLE>
<link REL="SHORTCUT ICON" HREF="/favicon.ico">
<!-- These pages are (C)opyright 2002-2008, Tyler Akins -->
<!-- Fake email for spambots: nonprepayment@rumkin.com -->
<script language="JavaScript" src="js/caesar.js"></script>
<script language="JavaScript" src="js/keymaker.js"></script>
<script language="JavaScript" src="js/util.js"></script>
<script language="JavaScript"><!--
// This code was written by Tyler Akins and placed in the public domain.
// It would be nice if you left this header intact.  http://rumkin.com


function start_update()
{
   if (! document.getElementById)
   {
      alert('Sorry, you need a newer browser.');
      return;
   }

   if ((! document.Caesar_Loaded) || (! document.Util_Loaded) ||
       (! document.Keymaker_Loaded) ||
       (! document.getElementById('caesar')))
   {
      window.setTimeout('start_update()', 100);
      return;
   }
   Keymaker_Start();
   upd();
}


function upd()
{
   var e, keyunchanged = 1, textunchanged = 1;

   if (! IsUnchanged(document.encoder.key))
   {
      keyunchanged = 0;
      e = document.getElementById('alphabet');
      e.innerHTML = HTMLEscape(MakeKeyedAlphabet(document.encoder.key.value));
   }
	
   if (! IsUnchanged(document.encoder.text))
   {
      textunchanged = 0;
      ResizeTextArea(document.encoder.text);
   }
   
   if (keyunchanged *
       textunchanged *
       IsUnchanged(document.encoder.N) *
       IsUnchanged(document.encoder.encdec))
   {
      window.setTimeout('upd()', 100);
      return;
   }
       
   e = document.getElementById('caesar');
   
   if (document.encoder.text.value == '')
   {
      e.innerHTML = 'Type a message and see the results here!';
   }
   else
   {
      e.innerHTML = SwapSpaces(HTMLEscape(Caesar(document.encoder.encdec.value * 1,
         document.encoder.text.value, document.encoder.N.value * 1,
	 document.encoder.key.value)));
   }

   window.setTimeout('upd()', 100);
}

function insert_alphabet()
{
   document.encoder.text.value = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
   upd();
}
	
function ZapSpaces()
{
   var i, s = "", t;
   
   t = document.encoder.text.value;
   for (i = 0; i < t.length; i ++)
   {
      if (t.charAt(i) != ' ')
      {
         s += t.charAt(i);
      }
   }
   document.encoder.text.value = s;
   upd();
}

window.setTimeout('start_update()', 100);

// --></script>
<link rel="stylesheet" type="text/css" href="/inc/css/base.css">
<link rel="stylesheet" type="text/css" media="screen,projection" href="/inc/css/halloween.css">
<link rel="stylesheet" type="text/css" media="print" href="/inc/css/print.css">
<script src="/inc/js/site.js?1" type="text/javascript"></script>
</head>
<body>
<table border="0" cellpadding="0" cellspacing="0" height="100%" width="100%">
<tr><Td valign=top>
<div class="r_header">Keyed Caesar</div>
<div class="r_headbar">
<div class="r_headbarlinks">
<span id="r_dropdown"><a class="r_link" href="/">Rumkin.com</a></span>&nbsp;<span class="r_arr">&gt;&gt;</span>&nbsp;<a class="r_link" href="/tools/">Web-Based Tools</a>&nbsp;<span class="r_arr">&gt;&gt;</span>&nbsp;<a class="r_link" href="/tools/cipher/">Ciphers and Codes</a></div>
<form method=GET action="http://www.google.com/search" name="googlesearch">
<div class="r_headbarsearch">
Search:
<input type=text name=q size=25 maxlength=255 value="" class="r_headsearch">
<input type=hidden name=domains value="rumkin.com">
<input type=hidden name=sitesearch value="rumkin.com">
</div>
</form>
</div>
<table cellpadding=0 cellspacing=0 border=0 width=100%><tr><td valign=top width="99%"><div class="r_main">

<p>One variation to the standard <a href="caesar.php">Caesar</a> cipher is
when the alphabet is "keyed" by using a word.  In the traditional variety,
one could write the alphabet on two strips and just match up the strips
after sliding the bottom strip to the left or right.  To encode, you would
find a letter in the top row and substitute it for the letter in the bottom
row.  For a keyed version, one would not use a standard alphabet, but would
first write a word (omitting duplicated letters) and then write the
remaining letters of the alphabet.  For the example below, I used a key of
"rumkin.com" and you will see that the period is removed because it is not
a letter.  You will also notice the second "m" is not included 
because there was an m already and you can't have duplicates.</p>

<table align=center border=1 cellpadding=3 cellspacing=0>
<tr><th colspan=2>Example Alphabets, No Shift</th></td>
<tr><th>Standard</th><td><tt>ABCDEFGHIJKLMNOPQRSTUVWXYZ<br>
ABCDEFGHIJKLMNOPQRSTUVWXYZ</tt></td></tr>
<tr><th>Keyed</th><td><tt>ABCDEFGHIJKLMNOPQRSTUVWXYZ<br>
<b>rumkinco</b>ABDEFGHJLPQSTVWXYZ</tt></td></tr>
</table>

<p>This encoder will let you specify the key word that is used at the
beginning of the alphabet and will also let you shift the keyed alphabet
around, just like a normal Caesar cipher.  This is similar to the <a
href="rot13.php">rot13</a> cipher, and can also be performed with the <a
href="cryptogram.php">cryptogram solver</a>.  A simple test to see how this
works would be to <a href="#" onclick="insert_alphabet(); return false">insert
the alphabet</a> into the encoder and then change "Shift" and modify
the key.</p>

<form name="encoder" method=post action="#" onsubmit="return false;">
<p><select name="encdec">
   <option value="1">Encrypt
   <option value="-1">Decrypt
</select>
<P>Shift:  <select name=N>
<option value=0>0</option>
<option value=1>1</option>
<option value=2>2</option>
<option value=3>3</option>
<option value=4>4</option>
<option value=5>5</option>
<option value=6>6</option>
<option value=7>7</option>
<option value=8>8</option>
<option value=9>9</option>
<option value=10>10</option>
<option value=11>11</option>
<option value=12>12</option>
<option value=13>13</option>
<option value=14>14</option>
<option value=15>15</option>
<option value=16>16</option>
<option value=17>17</option>
<option value=18>18</option>
<option value=19>19</option>
<option value=20>20</option>
<option value=21>21</option>
<option value=22>22</option>
<option value=23>23</option>
<option value=24>24</option>
<option value=25>25</option>
</select>
<p>The key:  <input type=text name=key size=40 value=""> - 
<span id="Keymaker0" target="document.encoder.key.value"></span></p>
<p>Alphabet Used:  <tt><b><span id='alphabet'></span></b></tt></p>
<p><textarea name="text" rows="5" cols="80"></textarea></p>
</form>
<p>This is your encoded or decoded text:</p>
<table border=0 cellpadding=0 cellspacing=0 class="r_box" align="center" style="margin-top: 8px; margin-bottom: 8px;"><tr><td class="r_box"><span id='caesar'></span>
</td></tr></table><div style="clear: both"></div>
</div>
</td><td valign=top>
<div class="r_backlink">
<a href="index.php"><B>INDEX</B></a>
<br>

<br><a href="affine.php">Affine</a>

<br><a href="atbash.php">Atbash</a>

<br><a href="baconian.php">Baconian</a>

<br><a href="base64.php">Base64</a>

<br><a href="bifid.php">Bifid</a>

<br><a href="caesar.php">Caesar</a>

<br><a href="caesar-keyed.php">-&nbsp;Keyed</a>

<br><a href="rot13.php">-&nbsp;ROT13</a>

<br><a href="coltrans.php">Column&nbsp;Trans.</a>

<br><a href="coltrans-double.php">-&nbsp;Double</a>

<br><a href="ubchi.php">-&nbsp;&Uuml;bchi</a>

<br><a href="cryptogram.php">Cryptogram</a>

<br><a href="gronsfeld.php">Gronsfeld</a>

<br><a href="morse.php">Morse</a>

<br><a href="numbers.php">Numbers</a>

<br><a href="otp.php">One&nbsp;Time&nbsp;Pad</a>

<br><a href="playfair.php">Playfair</a>

<br><a href="railfence.php">Railfence</a>

<br><a href="rotate.php">Rotate</a>

<br><a href="skip.php">Skip</a>

<br><a href="substitution.php">Substitution</a>

<br><a href="vigenere.php">Vigenere</a>

<br><a href="vigenere-keyed.php">-&nbsp;Keyed</a>

<br><a href="vigenere-autokey.php">-&nbsp;Autokey</a>

<br>
<br><a href="cryptogram-solver.php">Crypto&nbsp;Solver</a>

<br><a href="frequency.php">Frequency</a>

<br><a href="manipulate.php">Manipulator</a>
</div>
</td></tr></table>
</td></tr>
<tr><td valign=bottom>
<div class="r_footbar">
<table width="100%" cellpadding=0 cellspacing=0 border=0>
<tr><td class="r_trivia" valign=top>
Others recognize your sweet nature.</td><td class="r_info" align=right valign=top>
Tyler Akins &lt;<SCRIPT LANGUAGE="JavaScript" type="text/javascript"><!--
var ML="@rocadf<te>/.mhkn\"iu:l =",MI="74F>196GA=4BE82D6B5B4@01C=?B@<32=A:6B5B4@01C=?B@<32=7;4:",OT="",j;
for(j=0;j<MI.length;j++){
OT+=ML.charAt(MI.charCodeAt(j)-48);
}document.write(OT);
// --></SCRIPT><NOSCRIPT>Sorry, you need javascript
to view this email address</noscript>&gt;
<br>
<a href="/reference/site/contact.php">Contact Me</a> - 
<a href="/reference/site/legal.php">Legal Info</a>
</td></tr></table>
</div>
</td></tr></table>
<script src="http://www.google-analytics.com/ga.js" type="text/javascript"></script>
<script type="text/javascript">
try {
	var pageTracker = _gat._getTracker("UA-7684564-1");
	pageTracker._trackPageview();
} catch(err) {}
</script>
</body>
</html>
