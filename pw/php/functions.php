<!-- 
    NAMA : Agam Ramdhan Kamil Atmaja
    NPM : 203040098
    Kelas : C
    Github : https://github.com/dzayeate
    MataKuliah : Praktikum Web
 -->

<?php
function koneksi()
{

    return mysqli_connect("localhost", "root", "", "prakweb_c_203040098_pw");
}

function query($sql)
{
    $conn = koneksi();
    $result = mysqli_query($conn, "$sql");
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

function upload()
{
    $nama_file = $_FILES['gambar']['name'];
    $tipe_file = $_FILES['gambar']['type'];
    $ukuran_file = $_FILES['gambar']['size'];
    $error = $_FILES['gambar']['error'];
    $tmp_file = $_FILES['gambar']['tmp_name'];

    //ketika tidak ada gambar
    if ($error == 4) {

        return 'nophoto.png';
    }

    //cek ekstensi file 
    $daftar_gambar = ['jpg', 'jpeg', 'png', 'jfif'];
    $ekstensi_file = explode('.', $nama_file);
    $ekstensi_file = strtolower(end($ekstensi_file));
    if (!in_array($ekstensi_file, $daftar_gambar)) {
        echo "<script>
     alert('wrong file upload, please try again!');
  </script>";
        return false;
    }

    //cek tipe file
    if ($tipe_file != 'image/jpeg' && $tipe_file != 'image/png' && $tipe_file != 'image/jfif') {
        echo "<script>
     alert('wrong file upload, please try again!');
  </script>";
        return false;
    }

    //cek ukuran file
    if ($ukuran_file > 10000000) {
        echo "<script>
     alert('File size too big, please upload another file');
  </script>";
        return false;
    }

    //upload file
    $nama_file_baru = uniqid();
    $nama_file_baru .= '.';
    $nama_file_baru .= $ekstensi_file;
    move_uploaded_file($tmp_file, '../assets/img/' . $nama_file_baru);

    return $nama_file_baru;
}



function tambah($buku)
{
    $conn = koneksi();

    $gambar = htmlspecialchars($buku['gambar']);
    $judul_buku = htmlspecialchars($buku['judul_buku']);
    $penulis = htmlspecialchars($buku['penulis']);
    $penerbit = htmlspecialchars($buku['penerbit']);
    $tahun_terbit = htmlspecialchars($buku['tahun_terbit']);
    // $pict = htmlspecialchars($buku['pict']);

    //upload
    $Gambar = upload();
    if (!$Gambar) {
        return false;
    }

    $query = "INSERT INTO buku
                VALUES
                ('','$gambar', '$judul_buku', '$penulis', '$penerbit', '$tahun_terbit')";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}


function hapus($id)
{
    $conn = koneksi();
    //menghapus gambar di folder
    $buku = query("SELECT * FROM buku WHERE id_buku =$id");
    error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
    if ($buku['gambar'] != 'nophoto.png') {
        unlink('../assets/img/' . $buku['gambar']);
    }


    mysqli_query($conn, "DELETE FROM buku WHERE id_buku =$id");

    return mysqli_affected_rows($conn);
}


function ubah($buku)
{
    $conn = koneksi();

    $id_buku = htmlspecialchars($buku['id_buku']);
    $judul_buku = htmlspecialchars($buku['judul_buku']);
    $Penerbit = htmlspecialchars($buku['penerbit']);
    $Pengarang = htmlspecialchars($buku['pengarang']);
    $gambar_lama = htmlspecialchars($buku['gambar_lama']);

    $gambar = upload();
    if (!$gambar) {
        return false;
    }

    if ($gambar == 'nophoto.png') {
        $gambar = $gambar_lama;
    }

    $query = "UPDATE buku SET
            judul_buku ='$judul_buku',
            penerbit ='$Penerbit',
            pengarang = '$Pengarang',
            gambar = '$gambar'
            WHERE id_buku = '$id_buku'
    ";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function cari($keyword)
{
    $conn = koneksi();

    $query = "SELECT * FROM buku
            WHERE 
            judul_buku LIKE '%$keyword%' OR
            pengarang LIKE '%$keyword%' OR
            penerbit LIKE '%$keyword%' OR
            tahun_terbit LIKE '%$keyword%' 
           ";

    $result = mysqli_query($conn, $query);

    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }

    return $rows;
}


?>