<?php
ob_start();
include("connection.php");
echo '<p align="right">';
if($_SESSION['LoggedIn']): 
echo "Hello " .$_SESSION['nama'];
 endif; 
echo '</p>';
 
 if(isset($_POST['logmasuk'])){

    $noic = mysql_real_escape_string($_POST['noic']);
    $katalaluan=mysql_real_escape_string($_POST['katalaluan']);
    $katalaluan=md5($katalaluan);
    $query="SELECT * FROM daftar_pengguna WHERE noic = '".$noic."' AND katalaluan = '".$katalaluan."'";
    $result=mysql_query($query);
    $count=mysql_num_rows($result);
    if( $row = mysql_fetch_array($result)){
			
	session_start();
        $_SESSION['nama'] = $row["nama"];
        $_SESSION['noic'] = $row["noic"];
	$_SESSION['katalaluan'] = $row["katalaluan"];
        $_SESSION['jawatan'] = $row["jawatan"];
        $_SESSION['peringkat'] = $row["peringkat"];
	$_SESSION['email'] = $row["email"];
        $_SESSION['LoggedIn'] = true;
	$_SESSION['sukandb']['noic'] = $noic;

	if($count==1)
			   header( "Location: index.php" );
    else
	header("Location : index.php" );
	exit();
}
else{
        echo "<script language=\"javascript\">";
        echo "alert( 'Nombor IC dan katalaluan tidak sepadan.' )";
        echo "</script>";
    }
}
    ?>
<style type="text/css">
<!--
.style1 {color: black;
	font-size: 25px;
}
.style21 {	color: #000000;
	font-weight: bold;
}
.style22 {color: #000000}
.style25 {	font-size: 14px;
	color: #000000;
}
.style30 {font-size: 16}
body {
	background-color: #999999;
}
.style31 {font-size: 16px}
-->
</style>

<p>&nbsp;</p>

<table width="1069" height="105" border="1" align="center" bgcolor="#FF9933">
  <tr>
    <th width="281" height="133" scope="col"><a href="index.php"><img src="logo kbs.jpg" width="281" height="134"></a></th>
    <th width="981" scope="col"><span class="style1">SISTEM PENGURUSAN PERALATAN SUKAN</span></th>
  </tr>
</table>
<p>&nbsp;</p>
<table width="1200" height="39" border="0" align="center">
  <tr>
    <th scope="col"><p>
      <?php include ("menu.php"); ?>
    </p>
    </th>
  </tr>
</table>
<p>&nbsp;</p>


<table width="1300" height="480" border="1" align="center">
  <tr>

    <th width="602" scope="col" bgcolor="#FF6600"><span class="style21">MAKLUMAT OPERASI </span></th>
	 <th width="600" height="5" scope="col" bgcolor="#FF6600">PENGGUNA</th>
  </tr>
  <tr>
    <th width="602" rowspan="5" scope="col" bgcolor="#666666"><p class="style22">ISNIN - JUMAAT (8:00 PAGI - 5:00 PETANG) </p>
      <p class="style22"> UNTUK MAKLUMAT LANJUT SILA HUBUNGI :</p>
      <p class="style22">&nbsp;</p>
      <p align="center" class="style22">PEGAWAI,</p>
      <p align="center" class="style22">JABATAN BELIA DAN SUKAN NEGERI SARAWAK,</p>
      <p align="center" class="style22">ARAS 3, KOMPLEKS BELIA DAN SUKAN NEGERI SARAWAK,</p>
      <p align="center" class="style22">93100 KUCHING,</p>
      <p align="center" class="style22">SARAWAK.</p>
    <p align="center" class="style22">TEL : 082 - 240631 / 082 - 248321 &nbsp;&nbsp;&nbsp;&nbsp; FAX : 082 - 244537 </p></th>


    <td bgcolor="#999999"><div align="center" class="style31"> 
      <p>&nbsp;</p>

        <div align="center">     
		
<?php 

		if($_SESSION['LoggedIn']){
		echo '<table><tr>';
		echo'<form method="post" action="statuspengguna.php?id='. $row["noic"].' ">';
		echo "<td><input type='submit' value='Status Peminjaman'></td></form>";
		echo "<td></td>";
		echo "<td></td>";
		echo "<td></td>";
		echo'<form method="post" action="carianstatuspemohonresult.php?id='. $row["noic"].' ">';
		echo "<td><input type='submit' value='Profil Saya'></td></form>";
		echo "<td></td>";
		echo "<td></td>";
		echo "<td></td>";

		echo'<form method="post" action="sejarahpengguna.php?id='. $row["noic"].' ">';
		echo "<td><input type='submit' value='Sejarah Peminjaman Saya'></td></form>";
		echo '</tr></table>';
		echo'<form method="post" action="logkeluarpengguna.php">';
		echo "<p><br><input type='submit' value='Log Keluar'>";
		echo '</form>';
		} else{
?>
	<form name="form1" method="post" action="index.php">	
<table>
       <tr><td>NO IC : </td>
            <td><input type="text" maxlength="12" name="noic"></td></tr>
	<tr><td>KATA LALUAN : </td>
	    <td><input type="password" name="katalaluan"></td></tr>
</table>
<br>

<table>  
	<tr>
	<td align="center"><input name="logmasuk" type="submit" class="style21" value="LOG MASUK"></td></tr>
      
<tr><td><a href="lupakatalaluanview.php">Lupa Kata Laluan?</a></td></tr>
</table>
<p><p>
<table>
<tr><td><a href="borangdaftar.php"> DAFTAR</a>
</table>
<?php } ?>
      <p>&nbsp;</p>
    </div>
 <p align="center">&nbsp;</p>
          <p>
            
</td></tr>
</p>
        </div>
    </form>    

  <p>&nbsp; </p></td>
  </tr>
  <tr>
    <td height="20" bgcolor="#FF6600"><div align="center"><span class="style21">Syarat-Syarat Peminjaman</span></div></td>
  </tr>
  <tr>
    <td bgcolor="#666666"><ul>
      <li class="style25 style30">Anda perlu membuat pendaftaran terlebih dahulu.</li>
      <li class="style25 style30">Selepas membuat pendaftaran, anda perlu melog masuk.</li>
 <li class="style25 style30">Untuk melihat senarai peralatan sukan yang sedia ada, sila pergi ke halaman Senarai Peralatan Sukan melalui menu Informasi Sukan. </li>
 <li class="style25 style30">Jika anda tidak melog masuk, anda tidak boleh meminjam peralatan sukan. </li>
<li class="style25 style30">Peminjaman akan diluluskan sehingga 3 hari bekerja. </li>
      <li class="style25 style30">Jika peminjaman telah diluluskan, pemberitahuan akan dihantar melalui emel anda atau anda boleh menyemak status melalui laman web ini. </li>
      <li class="style25 style30">Sekiranya anda tidak meletakkan emel, kami hanya menghantar pemberitahuan tersebut melalui laman web ini. </li>
<li class="style25 style30">Untuk menyemak status, pergi ke PROFIL SAYA -> Status. </li>
<li class="style25 style30">Sekiranya terdapat sebarang masalah, sila hubungi kami secepat mungkin. </li>
    </ul>    </td>
  </tr>
</table>

<p>&nbsp;</p>
<table width="643" height="110" align="center" bordercolor="#333333" bgcolor="#666666">
<tr>
<td width="633" height="110" bgcolor="#999999"><p align="center" class="style25 style4"><strong>JABATAN BELIA DAN SUKAN NEGERI SARAWAK</strong></p>
<p align="center" class="style25 style4"><strong>ARAS 3, KOMPLEKS BELIA DAN SUKAN NEGERI SARAWAK</strong></p>
<p align="center" class="style25 style4"><strong>TEL : 082 -240631 / 082-248321 &nbsp;&nbsp;&nbsp;&nbsp; FAX : 082 -244537</strong></p></td>
</tr>
</table>
<P>.</P>
</div>
<tr bordercolor="#333333" bgcolor="#FF6633"><td width="743" height="67">
</body>
</html>
<?php ob_end_flush(); ?>  