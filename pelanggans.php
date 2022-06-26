<?php 
header('Access-Control-Allow-Origin:*');
header('Access-Control-Allow-Headers:*');
$conn = new mysqli("localhost", "id19172189_root", "ec1h]Motja5gw9*@", "id19172189_uaslaverpool");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$result = array('error' => false);
$action = '';


if (isset($_GET['action'])) {
    $action = $_GET['action'];
}

if ($action == 'read') {
    $sql = $conn->query("SELECT * FROM pelanggans");
    $pelanggans = array();
    while ($row = $sql->fetch_assoc()) {
        array_push($pelanggans, $row);
    }
    $result['pelanggans'] = $pelanggans;
}
if ($action == 'create') {
    $id_pelanggan = $_POST['id_pelanggan'];
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $alamat = $_POST['alamat'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $no_hp = $_POST['no_hp'];

    $sql = "INSERT INTO `pelanggans`(`id_pelanggan`, `nama`, `email`, `alamat`, `jenis_kelamin`, `no_hp`) VALUES ('$id_pelanggan','$nama', '$email','$alamat','$jenis_kelamin','$no_hp')";
    $query = $conn->query($sql);

    if ($query) {
        $result['message'] = "pelanggan berhasil ditambahkan";
    } else {
        $result['error'] = true;
        $result['message'] = "pelanggan gagal ditambahkan";
    }
}

if ($action == 'update') {

    $id_pelanggan = $_POST['id_pelanggan'];
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $alamat = $_POST['alamat'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $no_hp = $_POST['no_hp'];
 

    $sql = "UPDATE `pelanggans` SET `nama`='$nama',`email`='$email',`alamat`='$alamat',`jenis_kelamin`='$jenis_kelamin',`no_hp`='$no_hp' WHERE `id_pelanggan`='$id_pelanggan'";
    $query = $conn->query($sql);

    if ($query) {
        $result['message'] = "pelanggan berhasil diupdate";
    } else {
        $result['error'] = true;
        $result['message'] = "pelanggan gagal diupdate";
    }
}

if ($action == 'delete') {

    $id_pelanggan = $_POST['id_pelanggan'];

    $sql = "DELETE FROM `pelanggans` WHERE id_pelanggan =  '$id_pelanggan'";
    $query = $conn->query($sql);

    if ($query) {
        $result['message'] = "pelanggan berhasil didelete";
    } else {
        $result['error'] = true;
        $result['message'] = "pelanggan gagal didelete";
    }
}


$conn->close();

header("Content-type: application/json");
echo json_encode($result);
die();

?>