<?php 
header("Content-type: application/octet-stream");
header("Content-Disposition: attachment; filename=Kelas $kelas-SMKN 1 Sumedang.xls");
header("Pragma: no-cache");
header("Expires: 0");
?>
<!DOCTYPE html>
<html>
<head>
<style type="text/css">
body{
	font-family: Calibri, Candara, Segoe, "Segoe UI", Optima, Arial, sans-serif;
}
</style>
</head>
<body>

<table width="100%">
<tr>
<td align="center" colspan="5"><h3>SMKN 1 SUMEDANG<br>TEKNOLOGI DAN REKAYASA<br>TEKNOLOGI INFORMASI DAN KOMUNIKASI</h3></td>
</tr>
<tr>
<td align="center" colspan="5">Jl. Mayor Abdurakhman No. 209 Tlp.(0261)202056 Sumedang Fax:(0261)202056<br> E-mail : smkn1smd@gmail.com Website : www.smkn1sumedang.sch.id<br><br></td>
</tr>
<tr>
<td colspan="5">Paket Keahlian : <b><?php echo $jurusan ?></b><br>Kelas : <b><?php echo $kelas ?></b><br><br></td>
</tr>
</table>
<table width="100%" border='1'>
<tr>
<td align="center"><b>No</b></td>
<td align="center"><b>NISN</b></td>
<td align="center"><b>NIS</b></td>
<td align="center"><b>Nama Lengkap</b></td>
<td align="center"><b>Jenis Kelamin</b></td>
</tr>
<?php
$i = 1;
foreach($siswa as $s) {
?>
<tr>
<td><?php echo $i ?></td>
<td><?php echo '&nbsp;'.$s->nisn ?></td>
<td><?php echo '&nbsp;'.$s->nis ?></td>
<td><?php echo $s->nama ?></td>
<td><?php echo $s->jk ?></td>
</tr>
<?php $i=$i+1; } ?>
</table>

</body>
</html>
