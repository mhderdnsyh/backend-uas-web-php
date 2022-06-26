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
    $sql = $conn->query("SELECT * FROM foods");
    $foods = array();
    while ($row = $sql->fetch_assoc()) {
        array_push($foods, $row);
    }
    $result['foods'] = $foods;
}
if ($action == 'create') {
    $id_food = $_POST['id_food'];
    $nama_food = $_POST['nama_food'];
    $harga_food = $_POST['harga_food'];
    $stok_food = $_POST['stok_food'];
    $jml_pesanan = $_POST['jml_pesanan'];
    $desc_food = $_POST['desc_food'];

    $sql = "INSERT INTO `foods`(`id_food`, `nama_food`, `harga_food`, `stok_food`, `jml_pesanan`, `desc_food`) VALUES ('$id_food','$nama_food', '$harga_food','$stok_food','$jml_pesanan','$desc_food')";
    $query = $conn->query($sql);

    if ($query) {
        $result['message'] = "food berhasil ditambahkan";
    } else {
        $result['error'] = true;
        $result['message'] = "food gagal ditambahkan";
    }
}

if ($action == 'update') {

    $id_food = $_POST['id_food'];
    $nama_food = $_POST['nama_food'];
    $harga_food = $_POST['harga_food'];
    $stok_food = $_POST['stok_food'];
    $jml_pesanan = $_POST['jml_pesanan'];
    $desc_food = $_POST['desc_food'];
 

    $sql = "UPDATE `foods` SET `nama_food`='$nama_food',`harga_food`='$harga_food',`stok_food`='$stok_food',`jml_pesanan`='$jml_pesanan',`desc_food`='$desc_food' WHERE `id_food`='$id_food'";
    $query = $conn->query($sql);

    if ($query) {
        $result['message'] = "food berhasil diupdate";
    } else {
        $result['error'] = true;
        $result['message'] = "food gagal diupdate";
    }
}

if ($action == 'delete') {

    $id_food = $_POST['id_food'];

    $sql = "DELETE FROM `foods` WHERE id_food =  '$id_food'";
    $query = $conn->query($sql);

    if ($query) {
        $result['message'] = "food berhasil didelete";
    } else {
        $result['error'] = true;
        $result['message'] = "food gagal didelete";
    }
}


$conn->close();

header("Content-type: application/json");
echo json_encode($result);
die();

?>