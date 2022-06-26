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
    $sql = $conn->query("SELECT * FROM hasils");
    $hasils = array();
    while ($row = $sql->fetch_assoc()) {
        array_push($hasils, $row);
    }
    $result['hasils'] = $hasils;
}
if ($action == 'create') {
    $id_pemesanan = $_POST['id_pemesanan'];
    $id_pelanggan = $_POST['id_pelanggan'];
    $nama_pelanggan = $_POST['nama_pelanggan'];
    $id_food = $_POST['id_food'];
    $id_drink = $_POST['id_drink'];

    $sql = "INSERT INTO `hasils`(`id_pemesanan`, `id_pelanggan`, `nama_pelanggan`, `id_food`, `id_drink`) VALUES ('$id_pemesanan','$id_pelanggan','$nama_pelanggan', '$id_food','$id_drink')";
    $query = $conn->query($sql);

    if ($query) {
        $result['message'] = "data pemesanan berhasil ditambahkan";
    } else {
        $result['error'] = true;
        $result['message'] = "data pemesanan gagal ditambahkan";
    }
}

if ($action == 'update') {

    $id_pemesanan = $_POST['id_pemesanan'];
    $id_pelanggan = $_POST['id_pelanggan'];
    $nama_pelanggan = $_POST['nama_pelanggan'];
    $id_food = $_POST['id_food'];
    $id_drink = $_POST['id_drink'];

    $sql = "UPDATE `hasils` SET `id_pelanggan`='$id_pelanggan',`nama_pelanggan`='$nama_pelanggan',`id_food`='$id_food',`id_drink`='$id_drink' WHERE `id_pemesanan`='$id_pemesanan'";
    $query = $conn->query($sql);

    if ($query) {
        $result['message'] = "data pemesanan berhasil diupdate";
    } else {
        $result['error'] = true;
        $result['message'] = "data pemesanan gagal diupdate";
    }
}

if ($action == 'delete') {

    $id_pemesanan = $_POST['id_pemesanan'];

    $sql = "DELETE FROM `hasils` WHERE id_pemesanan =  '$id_pemesanan'";
    $query = $conn->query($sql);

    if ($query) {
        $result['message'] = "data pemesanan berhasil didelete";
    } else {
        $result['error'] = true;
        $result['message'] = "data pemesanan gagal didelete";
    }
}


$conn->close();

header("Content-type: application/json");
echo json_encode($result);
die();

?>