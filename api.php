<?php
error_reporting(0);
include "config.php";


$auth = $_GET['auth']; //888
$perintah = $_GET['perintah'];

// ============Petugas=================
$auth = $_GET['auth']; //888
$perintah = $_GET['perintah'];
$nama_petugas = $_GET['nama_petugas'];
$jabatan_petugas = $_GET['jabatan_petugas'];
$no_telp_petugas = $_GET['no_telp_petugas'];
$alamat_petugas = $_GET['alamat_petugas'];

// ============User=================
$username = $_GET['username'];
$password = $_GET['password'];
$jabatan = $_GET['jabatan'];

// ============Anggota=================
$id_anggota = $_GET['id_anggota'];
$kode_anggota = $_GET['kode_anggota'];
$nama_anggota = $_GET['nama_anggota'];
$jk_anggota = $_GET['jk_anggota'];
$jurusan_anggota = $_GET['jurusan_anggota'];
$no_telp_anggota = $_GET['no_telp_anggota'];
$alamat_petugas = $_GET['alamat_petugas'];

// ============Buku=================
$id_buku = $_GET['id_buku'];
$kode_buku = $_GET['kode_buku'];
$judul_buku = $_GET['judul_buku'];
$penulis_buku = $_GET['penulis_buku'];
$penerbit_buku = $_GET['penerbit_buku'];
$tahun_penerbit = $_GET['tahun_penerbit'];
$stok = $_GET['stok'];

// ============Pengembalian=================
$id_pengembalian = $_GET['id_pengembalian'];
$tanggal_pengembalian = $_GET['tanggal_pengembalian'];
$denda = $_GET['denda'];
$id_buku = $_GET['id_buku'];
$id_anggota = $_GET['id_anggota'];
$id_petugas = $_GET['id_petugas'];

// ============Pengembalian=================
$id_peminjaman = $_GET['id_peminjaman'];
$tanggal_pinjam = $_GET['tanggal_pinjam'];
$tanggal_kembali = $_GET['tanggal_kembali'];
$id_buku = $_GET['id_buku'];
$id_anggota = $_GET['id_anggota'];
$id_petugas = $_GET['id_petugas'];

// ============Rak=================
$id_rak = $_GET['id_rak'];
$nama_rak = $_GET['nama_rak'];
$lokasi_rak = $_GET['lokasi_rak'];
$id_buku = $_GET['id_buku'];

if($auth == "888"){
// ===============select tb_user selesai=================
if(!empty($_GET) && $perintah=="select_user"){
$return_arr = array();
//$sql = "SELECT id, npm, nama FROM mahasiswa";
$sql = "select username, password, jabatan from user";
$result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            //echo "<br>";
            //echo "id= ". $row["id"]. ", kodemk= ". $row["kodemk"]. ", nama matakuliah = ".$row["nama_matakuliah"];
            //echo "id = $row['id'] , kodemk= $row['kodemk']";

            $row_array['username'] = $row['username'];
            $row_array['password'] = $row['password'];
            $row_array['jabatan'] = $row['jabatan'];

            array_push($return_arr,$row_array);
        }
        echo json_encode($return_arr);
    } else {
            echo "0 results";
    }
$conn->close();
    }

}


// ===============select tb_user selesai=================
if(!empty($_GET) && $perintah=="login"){
$return_arr = array();
//$sql = "SELECT id, npm, nama FROM mahasiswa";
//$sql = "select id_user, nama_user, pass, from tb_user where nama_user=$nama_user and pass=$pass";
//$sql = "SELECT nama_user='".$nama_user."' from tb_user where pass='".$pass."'";
$sql = "SELECT * FROM user where username='$username' AND password='$password'";
$result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            //echo "<br>";
            //echo "id= ". $row["id"]. ", kodemk= ". $row["kodemk"]. ", nama matakuliah = ".$row["nama_matakuliah"];
            //echo "id = $row['id'] , kodemk= $row['kodemk']";

            $row_array['username'] = $row['username'];
            $row_array['password'] = $row['password'];
            $row_array['id_user'] = $row['id_user'];

            array_push($return_arr,$row_array);
        }
        echo json_encode($return_arr);
    } else {
            echo "0 results";
    }
$conn->close();
    }
// ===============tb_anggota Fujianto=================
if($auth == "888"){

    /*API UNTUK INSERT KE DALAM TABEL anggota*/
    if(!empty($_GET) && $perintah=="insert"){

        $sql = "INSERT INTO anggota (id_anggota, kode_anggota, nama_anggota, jk_anggota, jurusan_anggota, no_telp_anggota, alamat_anggota)
        VALUES ('". $id_anggota. "', '". $kode_anggota. "', '". $nama_anggota. "', '". $jk_anggota. "', '". $jurusan_anggota. "', '". $no_telp_anggota. "', '". $alamat_anggota. "')";
        echo "<br>";
        echo $sql;

        if (mysqli_query($conn, $sql)) {
            echo "<br>";
            echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }

    }

// ===============tb_buku Meidy Saputra=================
if($auth == "888"){

    /*API UNTUK INSERT KE DALAM TABEL ANGGOTA*/
    if(!empty($_GET) && $perintah=="insert"){

        $sql = "INSERT INTO buku (id_buku, kode_buku, judul_buku, penulis_buku, penerbit_buku, tahun_penerbit, stok)
        VALUES ('". $id_buku. "', '". $kode_buku. "', '". $judul_buku. "', '". $penulis_buku. "', '". $penerbit_buku. "', '". $tahun_penerbit. "', '". $stok. "')";
        echo "<br>";
        echo $sql;

        if (mysqli_query($conn, $sql)) {
            echo "<br>";
            echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }

    }

// ===============tb_pengembalian Arie Wahyu Pribadi=================
if($auth == "888"){

    /*API UNTUK INSERT KE DALAM TABEL ANGGOTA*/
    if(!empty($_GET) && $perintah=="insert"){

        $sql = "INSERT INTO pengembalian (id_pengembalian, tanggal_pengembalian, denda, id_buku, id_anggota, id_petugas)
        VALUES ('". $id_pengembalian. "', '". $tanggal_pengembalian. "', '". $denda. "', '". $id_buku. "', '". $id_anggota. "', '". $id_petugas. "')";
        echo "<br>";
        echo $sql;

        if (mysqli_query($conn, $sql)) {
            echo "<br>";
            echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }

    }

// ===============tb_peminjaman Muhammad Nasar=================
if($auth == "888"){

    /*API UNTUK INSERT KE DALAM TABEL ANGGOTA*/
    if(!empty($_GET) && $perintah=="insert"){

        $sql = "INSERT INTO peminjaman (id_peminjaman, tanggal_pinjam, tanggal_kembali, id_buku, id_anggota, id_petugas)
        VALUES ('". $id_peminjaman. "', '". $tanggal_pinjam. "', '". $tanggal_kembali. "', '". $id_buku. "', '". $id_anggota. "', '". $id_petugas. "')";
        echo "<br>";
        echo $sql;

        if (mysqli_query($conn, $sql)) {
            echo "<br>";
            echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }

    }

// ===============tb_rak Ahmad Ahyad=================
if($auth == "888"){

    /*API UNTUK INSERT KE DALAM TABEL ANGGOTA*/
    if(!empty($_GET) && $perintah=="insert"){

        $sql = "INSERT INTO rak (id_rak, nama_rak, lokasi_rak, id_buku)
        VALUES ('". $id_rak. "', '". $nama_rak. "', '". $lokasi_rak. "', '". $id_buku. "')";
        echo "<br>";
        echo $sql;

        if (mysqli_query($conn, $sql)) {
            echo "<br>";
            echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }

    }

?>