<!DOCTYPE html>

<html>

<head>

<title>
Tambah Tiket
</title>

</head>


<body>


<h2>
Tambah Data Tiket
</h2>


<form 
action="../controller/TiketController.php"
method="POST"
enctype="multipart/form-data">


ID

<input 
type="number"
name="id"
value="251011700344">



Nama Penumpang

<input 
type="text"
name="nama">



Tujuan

<input 
type="text"
name="tujuan">



Tanggal

<input 
type="date"
name="tanggal">



Jumlah Tiket

<input 
type="number"
name="jumlah">



Harga

<input 
type="number"
name="harga">



Upload Tiket

<input 
type="file"
name="gambar">



<button 
name="tambah">

Simpan

</button>


</form>


</body>


</html>