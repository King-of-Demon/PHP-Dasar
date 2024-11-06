<?php
include "layout/navbar.php";
include "service/database.php";
$notif = '<script>alert("Data berhasil ditambahkan")</script>';

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <title>Document</title>
  </head>
  <body>
<div>
    <table class="table table-dark table-hover">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">NAME</th>
                <th scope="col">AGE</th>
      <th scope="col">ADDRESS</th>
      <th scope="col">DATE TIME</th>
    </tr>
  </thead>
<?php
     $i = 1;
     $data = "SELECT * FROM mahasiswa";
     $query = mysqli_query($db, $data) or die (mysqli_error($db()));
     while ($row = mysqli_fetch_array($query)) { ?>
  <tbody>
    <tr>
      <th scope="row"><?=$i++?></th>
      <td><?=$row['name']?></td>
      <td><?=$row['age']?></td>
      <td><?=$row['address']?></td>
      <td><?=$row['date']?></td>
    </tr>
  </tbody>
  <?php }?>
</table>
</div>
<i><?=$notif?></i>
</body>
</html>