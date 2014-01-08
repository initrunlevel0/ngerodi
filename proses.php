<?php
	$nama = $_POST['nama'];
	$prosesor = $_POST['prosesor'];
	
	mysql_connect("localhost", "root", "root") or die(mysql_error());;
	mysql_select_db("ngerodi") or die(mysql_error()); 
	mysql_query("INSERT INTO data(nama, prosesor, status, terproses) VALUES ('$nama', '$prosesor', 0, 0)")  or die(mysql_error());
	
	$id = mysql_insert_id();
	
	move_uploaded_file($_FILES['kode_sumber']['tmp_name'], "uploads/" . $id . ".c");
	move_uploaded_file($_FILES['kasus_uji']['tmp_name'], "uploads/" . $id . ".tc");
	
	header('Location: index.php');
	
?>up
