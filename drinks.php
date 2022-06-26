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
    $sql = $conn->query("SELECT * FROM drinks");
    $drinks = array();
    while ($row = $sql->fetch_assoc()) {
        array_push($drinks, $row);
    }
    $result['drinks'] = $drinks;
}
if ($action == 'create') {
    $id_drink = $_POST['id_drink'];
    $nama_drink = $_POST['nama_drink'];
    $harga_drink = $_POST['harga_drink'];
    $stok_drink = $_POST['stok_drink'];
    $jml_pesanan = $_POST['jml_pesanan'];
    $desc_drink = $_POST['desc_drink'];

    $sql = "INSERT INTO `drinks`(`id_drink`, `nama_drink`, `harga_drink`, `stok_drink`, `jml_pesanan`, `desc_drink`) VALUES ('$id_drink','$nama_drink', '$harga_drink','$stok_drink','$jml_pesanan','$desc_drink')";
    $query = $conn->query($sql);

    if ($query) {
        $result['message'] = "drink berhasil ditambahkan";
    } else {
        $result['error'] = true;
        $result['message'] = "drink gagal ditambahkan";
    }
}

if ($action == 'update') {

    $id_drink = $_POST['id_drink'];
    $nama_drink = $_POST['nama_drink'];
    $harga_drink = $_POST['harga_drink'];
    $stok_drink = $_POST['stok_drink'];
    $jml_pesanan = $_POST['jml_pesanan'];
    $desc_drink = $_POST['desc_drink'];
 

    $sql = "UPDATE `drinks` SET `nama_drink`='$nama_drink',`harga_drink`='$harga_drink',`stok_drink`='$stok_drink',`jml_pesanan`='$jml_pesanan',`desc_drink`='$desc_drink' WHERE `id_drink`='$id_drink'";
    $query = $conn->query($sql);

    if ($query) {
        $result['message'] = "drink berhasil diupdate";
    } else {
        $result['error'] = true;
        $result['message'] = "drink gagal diupdate";
    }
}

if ($action == 'delete') {

    $id_drink = $_POST['id_drink'];

    $sql = "DELETE FROM `drinks` WHERE id_drink =  '$id_drink'";
    $query = $conn->query($sql);

    if ($query) {
        $result['message'] = "drink berhasil didelete";
    } else {
        $result['error'] = true;
        $result['message'] = "drink gagal didelete";
    }
}


$conn->close();

header("Content-type: application/json");
echo json_encode($result);
die();

?>