
<?php
//memulai proses hapus data
 
//cek dahulu, apakah benar URL sudah ada GET id -> hapus.php?id=siswa_id
if(isset($_GET['id'])){
	
	//inlcude atau memasukkan file koneksi ke database
	include("connect.php");
	$link=Connection();
	//membuat variabel $id yg bernilai dari URL GET id -> hapus.php?id=siswa_id
	$id = $_GET['id'];
	
	//cek ke database apakah ada data siswa dengan siswa_id='$id'
	$cek= mysql_query("select id from tbl_datasensor where id = $id") or die(mysql_error());

		
			if(mysql_num_rows($cek) == 0){
		
		//jika data tidak ada, maka redirect atau dikembalikan ke halaman data sensor
		echo '<script>window.history.back()</script>';
	
	}else{
		
		//jika data ada di database, maka melakukan query DELETE table siswa dengan kondisi WHERE siswa_id='$id'
		$del = mysql_query("DELETE from tbl_datasensor WHERE id='$id'");
		
		//jika query DELETE berhasil
		if($del){	
			echo "<script>alert('data berhasil dihapus');</script>";
			echo "<script>location.href='DataSensor.php'</script>";	//membuat Link untuk kembali ke halaman data sensor
			
		}else{
			
			echo "<meta http-equiv='refresh' content='2; url= DataSensor.php'/>";	//membuat Link untuk kembali ke halaman Data sensor
		
		}
		
	}
	
}else{
	
	//redirect atau dikembalikan ke halaman beranda
	echo '<script>window.history.back()</script>';
	
}
?>