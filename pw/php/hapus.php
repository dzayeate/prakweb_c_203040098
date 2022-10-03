<!-- 
    NAMA : Agam Ramdhan Kamil Atmaja
    NPM : 203040098
    Kelas : C
    Github : https://github.com/dzayeate
    MataKuliah : Praktikum Web
 -->

<?php


require './functions.php';
$id = $_GET['id'];


if (hapus($id) > 0) {
    echo "<script>
     alert('Data has been deleted');
     document.location.href = '../index.php';
 </script>";
} else {
    echo "<script>
             alert('Fail to delete data');
             document.location.href = '../index.php';
        </script>";
}




?>