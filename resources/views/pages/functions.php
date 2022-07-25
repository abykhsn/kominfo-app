<?php
//koneksi ke database
$conn = mysqli_connect("localhost", "root", "", "kominfo_db");

function query($query){
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while($row = mysqli_fetch_assoc($result)){
        $rows[] = $row;
    }
    return $rows;
}
function tambah($data){
    global $conn;
    //ambil data dari setiap elemen dalam form
    $id_kom = htmlspecialchars($data["id_kom"]);
    $id_name = htmlspecialchars($data["id_name"]);
    $new_provider = htmlspecialchars($data["new_provider"]);
    $ex_provider = htmlspecialchars($data["ex_provider"]);
    $alamat = htmlspecialchars($data["alamat"]);
    $desa = htmlspecialchars($data["desa"]);
    $kecamatan = htmlspecialchars($data["kecamatan"]);
    $latitude = htmlspecialchars($data["latitude"]);
    $longitude = htmlspecialchars($data["longitude"]);
    $tinggi_menara = htmlspecialchars($data["tinggi_menara"]);
    $kunci = htmlspecialchars($data["kunci"]);
    $stat = htmlspecialchars($data["stat"]);
    $nominal = htmlspecialchars($data["nominal"]);
    $pembayaran = htmlspecialchars($data["pembayaran"]);


    if("$kunci"=="1"){
        $nominal = "1000";
    }
    elseif("$kunci"=="2"){
        $nominal = "2000";
    }
    elseif("$kunci"=="3"){
        $nominal = "3000";
    }
    //upload gambar
    $gambar = upload();
    if(!$gambar){
        return false;
    }


    //query insert untuk data menara
    $query = "INSERT INTO menara VALUE ('','$id_kom','$id_name', '$new_provider', '$ex_provider', '$alamat', '$desa', '$kecamatan', '$latitude', '$longitude', '$tinggi_menara', '$kunci', '$stat', '$gambar', '$nominal', '$pembayaran')";
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
    }

function upload(){
    $namaFile = $_FILES['gambar']['name'];
    $ukuranFile = $_FILES['gambar']['size'];
    $error = $_FILES['gambar']['error'];
    $tmpName = $_FILES['gambar']['tmp_name'];

    // cek apakah tidak ada gambar yang diupload
    if($error === 4) {
        echo "<script>
                alert('Pilih Gambar Terlebih Dahulu!');
              </script>";
        return false;
    }

    // cek apakah yang diupload adalah gambar
    $ekstensiGambarValid = ['jpg','jpeg','png'];
    $ekstensiGambar = explode('.', $namaFile);
    $ekstensiGambar = strtolower(end($ekstensiGambar));
    if(!in_array($ekstensiGambar, $ekstensiGambarValid)){
        echo "<script>
                alert('Upload dengan format jpg, jpeg atau png!');
              </script>";
        return false;
    }

    //lolos pengecekan, gambar siap diupload

    //generate nama baru
    $namaFileBaru = uniqid();
    $namaFileBaru .= '.';
    $namaFileBaru .= $ekstensiGambar;


    move_uploaded_file($tmpName,'img/' . $namaFileBaru);

    return $namaFileBaru;
}

function hapus($id){
    global $conn;
    mysqli_query($conn, "DELETE FROM menara WHERE id = $id");;
    return mysqli_affected_rows($conn);
}

function ubah($data){
    global $conn;
    //ambil data dari setiap elemen falam form
    $id = $data["id"];
    $id_kom = htmlspecialchars($data["id_kom"]);
    $id_name = htmlspecialchars($data["id_name"]);
    $new_provider = htmlspecialchars($data["new_provider"]);
    $ex_provider = htmlspecialchars($data["ex_provider"]);
    $alamat = htmlspecialchars($data["alamat"]);
    $desa = htmlspecialchars($data["desa"]);
    $kecamatan = htmlspecialchars($data["kecamatan"]);
    $latitude = htmlspecialchars($data["latitude"]);
    $longitude = htmlspecialchars($data["longitude"]);
    $tinggi_menara = htmlspecialchars($data["tinggi_menara"]);
    $kunci = htmlspecialchars($data["kunci"]);
    $stat = htmlspecialchars($data["stat"]);
    $nominal = htmlspecialchars($data["nominal"]);
    $gambarLama = htmlspecialchars($data["gambarLama"]);
    $pembayaran = htmlspecialchars($data["pembayaran"]);

    if("$kunci"=="1"){
        $nominal = "1000";
    }
    elseif("$kunci"=="2"){
        $nominal = "2000";
    }
    elseif("$kunci"=="3"){
        $nominal = "3000";
    }

    //cek apakah user pilih gambar atau tidak
    if($_FILES['gambar']['error'] === 4){
        $gambar = $gambarLama;
    } else {
        $gambar = upload();
    }
    //query insert
    $query = "UPDATE menara SET 
                id_kom = '$id_kom', 
                id_name = '$id_name', 
                new_provider = '$new_provider', 
                ex_provider = '$ex_provider', 
                alamat = '$alamat', 
                desa = '$desa', 
                kecamatan = '$kecamatan', 
                perusahaan_baru = '$tinggi_menara', 
                lattitude = '$latitude', 
                longitude = '$longitude', 
                kunci = '$kunci', 
                stat = '$stat',
                gambar = '$gambar',
                nominal = '$nominal',
                pembayaran = '$pembayaran'
            WHERE id = $id
            ";
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}
function cari($keyword){
    $query = "SELECT * FROM menara
                WHERE
            id_kom LIKE '%$keyword%' OR
            id_name LIKE '%$keyword%' OR
            lokasi LIKE '%$keyword%' OR
            new_provider LIKE '%$keyword%' OR
            ex_provider LIKE '%$keyword%' OR
            alamat LIKE '%$keyword%' OR
            latitude LIKE '%$keyword%' OR
            longitude LIKE '%$keyword%' OR
            stat LIKE '%$keyword%' OR
            pembayaran LIKE '%$keyword%'
            ";
        return query($query);
}
?>