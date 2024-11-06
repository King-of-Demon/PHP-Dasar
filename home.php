<?php
include "service/database.php";
session_start();
$notif = "";

if (isset($_POST['kirim'])) {
    $name = $_POST['nama'];
    $age = $_POST['usia'];
    $address = $_POST['alamat'];

    $admin = "INSERT INTO mahasiswa (name, age, address) VALUES ('$name', '$age', '$address')";
    
    try {
        if ($db->query($admin)) {
            header("location: index.php");
        } else {
            die(mysqli_error($db));
        }
    } catch (mysqli_sql_exception) {
        $notif = '<script>alert("Nama sudah ada, silahkan ganti yang lain!")</script>';
    }
    $db->close();
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    <title>REGISTRATION FORM</title>
</head>
<body>
    <form action="home.php" method="POST" class="form">
        <h3><b>REGISTRATION FORM</b></h3>

        <div class="input-grup">
            <input type="text" id="name" placeholder="Input Username" name="nama" class="input" required>
            <label for="name" class="labelh">Name</label>
        </div>

        <div class="input-grup">
            <input type="number" id="age" placeholder="Input Age" name="usia" class="input" required>
            <label for="age" class="labelh">Age</label>
        </div>

        <div class="input-grup">
            <input type="text" id="mat" placeholder="Input Address" name="alamat" class="input" required>
            <label for="mat" class="labelh">Address</label>
        </div>
        <button type="submit" name="kirim" class="tombolkirim">Kirim Sekarang</button>
        <i><?= $notif ?></i>
    </form>
</body>

</html>