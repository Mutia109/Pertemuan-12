<?php
    $lokasi_file = @$_FILES['fupload']['tmp_name'];
    $nama_file = @$_FILES['fupload']['name'];
    $ukuran_file = @$_FILES['fupload']['size'];
    $folder = '../Upload/';

    try{
        $isSuccessUpload = move_uploaded_file($lokasi_file, $folder.$nama_file);
        if($isSuccessUpload){
            echo "Nama File = $nama_file Sukses diupload <br>";
            echo "Ukuran File = $ukuran_file Bytes";
        }
       
    }
    catch(Exception $e){
        echo $e;
    }
?>
