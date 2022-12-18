<?php
require 'functions.php';

$items = query('SELECT * FROM cardBarang')

?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ThiirShop</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Caveat&family=Poppins&display=swap" rel="stylesheet">
  </head>
  <body>

    <!-- navbar start -->
    <nav class="navbar">
        <div class="container-fluid">
            <a class="navbar-brand ms-3 fw-semibold" href="#" id="logo">
            ThiirShop
            </a>
            <img src="assets/img/img1.jpg" alt="" class="rounded-circle me-3" width="40px" height="40px">
        </div>
    </nav>
    <!-- navbar end -->

    <!-- main page -->
    <div class="container">

        <!-- button tambah -->
        <button type="button" class="btn mt-4" data-bs-toggle="modal" data-bs-target="#tambah" id="btnPlus">
        <i class="bi bi-plus"></i> Tambah Barang
        </button>
        <!-- button tambah end -->

        <!-- modal tambah -->
        <div class="modal fade" id="tambah" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Barang</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                    <form action="" method="POST" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label for="gambar" class="form-label">Gambar Barang</label>
                            <input type="file" name="gambar" class="form-control" id="gambar" value="img/<?= $item["gambar"] ?>">
                        </div>
                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama Barang</label>
                            <input type="text" name="nama" class="form-control" id="nama">
                        </div>
                        <div class="mb-3">
                            <label for="desk" class="form-label">Deskripsi Barang</label>
                            <input type="text" name="deskripsi" class="form-control" id="desk">
                        </div>
                        <div class="mb-3">
                            <label for="harga" class="form-label">Harga Barang</label>
                            <input type="text" name="harga" class="form-control" id="harga">
                        </div>
                    </div>
                    <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="sumbit" name="btnTambah" class="btn btn-primary">Tambah Barang</button>
                    </form>
                    </div>
                    </div>
                </div>
            </div>
        <!-- modal tambah end -->

        <!-- card -->
        <div class="row mt-4 mb-4"  id="main-page">
            <?php foreach($items as $item) : ?>
            <div class="col-4 tengahnihbos">
                <div class="card mt-3 mb-3" style="width: 18rem;">
                <img width="300" height="300" src="img/<?= $item["gambar"] ?>" class="card-img-top card-img" alt="...">
                    <div class="card-body">
                        <h5 class="card-title fw-bold"><?= $item["nama"] ?></h5>
                        <h6 class="card-title fw-semibold">Rp.<?= $item["harga"] ?></h6>
                        <p class="card-text fw-light"><?= $item["deskripsi"] ?></p>
                        <button type="button" class="btn btn-warning ubah" data-bs-toggle="modal" data-bs-target="#ubah<?= $item["id"] ?>">
                        <i class="bi bi-pencil-square"></i> Edit
                        </button>
                        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#hapus<?= $item["id"]; ?>">
                        <i class="bi bi-trash"></i> Hapus
                        </button>
                    </div>
                </div>
            </div>
            <!-- card end -->

            <!-- modal hapus -->
            <div class="modal fade" id="hapus<?= $item["id"] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Hapus Barang</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        Apakah Anda Yakin Untuk Menghapus Barang?
                    </div>
                    <div class="modal-footer">
                        <form action="" method="post">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <input type="hidden" name="id" value="<?php echo $item["id"] ?>">
                            <button type="sumbit" name="btnHapus" class="btn btn-danger">Hapus</button>
                        </form>
                    </div>
                    </div>
                </div>
            </div>
            <!-- modal hapus end -->

            <!-- modal ubah  -->
            <div class="modal fade" id="ubah<?= $item["id"] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                    <form action="" method="POST" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label for="gambar" class="form-label">Gambar Barang</label>
                            <input type="file" name="gambar" class="form-control" id="gambar" value="img/<?= $item["gambar"] ?>">
                        </div>
                        <div class="mb-3">
                            <label for="nama" class="form-label">Ubah Nama Barang</label>
                            <input type="text" name="nama" class="form-control" id="nama" value="<?= $item["nama"] ?>">
                        </div>
                        <div class="mb-3">
                            <label for="desk" class="form-label">Ubah Deskripsi Barang</label>
                            <input type="text" name="deskripsi" class="form-control" id="desk" value="<?= $item["deskripsi"] ?>">
                        </div>
                        <div class="mb-3">
                            <label for="harga" class="form-label">Ubah Harga Barang</label>
                            <input type="text" name="harga" class="form-control" id="harga" value="<?= $item["harga"] ?>">
                        </div>
                    </div>
                    <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <input type="hidden" name="id" value="<?php echo $item["id"] ?>">
                            <button type="sumbit" name="btnUbah" class="btn btn-warning">Ubah</button>
                    </form>
                    </div>
                    </div>
                </div>
            </div>
            <!-- modal ubah end -->

            <?php endforeach; ?>
        </div>
    </div>
    <!-- main page -->


    <!-- script -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
  </body>
</html>

<?php

// logic ubah

if(isset($_POST["btnUbah"])) {

    $id = htmlspecialchars($_POST["id"]);
    $nama = htmlspecialchars($_POST["nama"]);
    $desk = htmlspecialchars($_POST["deskripsi"]);
    $harga = htmlspecialchars($_POST["harga"]);

    $namaFile = $_FILES["gambar"]["name"];
    $sizeFiles = $_FILES["gambar"]["size"];
    $error = $_FILES["gambar"]["error"];
    $tmpName = $_FILES["gambar"]["tmp_name"];

    if($error === 4 ){
        echo 
        "<script>
        alert('masukan gambar dahulu');
    </script>";
    }    
    
    $extensivalid = ['jpg','jpeg','png'];
    $extensi = explode('.',$namaFile);
    $extensi = strtolower(end($extensi));

    if(!in_array($extensi,$extensivalid)){
        var_dump($exstensi); die;
        // echo 
        // "<script>
        //     alert('yang anda masukan bukan gambar')
        // </script>";
        return false;
    }

    if($sizeFiles > 1000000){
        echo
        "<script>
            alert('ukuran file terlalu besar')
        </script>";
        return false;
    }

    $namafilebaru = uniqid().".".$extensi;

    move_uploaded_file($tmpName, 'img/'.$namafilebaru);

    $namagambar = $namafilebaru;


    mysqli_query($conn, "UPDATE `cardbarang` SET `gambar` = '$namagambar', `nama` = '$nama', `deskripsi` = '$desk', `harga` = '$harga' WHERE `id` = $id;");
    echo "<script>document.location.href='index.php';</script>";
}

// logic hapus

if(isset($_POST["btnHapus"])) {
    $id = $_POST["id"];

    mysqli_query($conn, "DELETE FROM cardbarang WHERE id = $id");
    echo "<script>document.location.href='index.php';</script>";
}

// logic tambah

if(isset($_POST["btnTambah"])) {
    $nama = $_POST["nama"];
    $desk = $_POST["deskripsi"];
    $harga = $_POST["harga"];

    $namaFile = $_FILES["gambar"]["name"];
    $sizeFiles = $_FILES["gambar"]["size"];
    $error = $_FILES["gambar"]["error"];
    $tmpName = $_FILES["gambar"]["tmp_name"];

    if($error === 4 ){
        echo 
        "<script>
        alert('masukan gambar dahulu');
    </script>";
    }    
    
    $extensivalid = ['jpg','jpeg','png'];
    $extensi = explode('.',$namaFile);
    $extensi = strtolower(end($extensi));

    if(!in_array($extensi,$extensivalid)){
        var_dump($exstensi); die;
        // echo 
        // "<script>
        //     alert('yang anda masukan bukan gambar')
        // </script>";
        return false;
    }

    if($sizeFiles > 1000000){
        echo
        "<script>
            alert('ukuran file terlalu besar')
        </script>";
        return false;
    }

    $namafilebaru = uniqid().".".$extensi;

    move_uploaded_file($tmpName, 'img/'.$namafilebaru);

    $namagambar = $namafilebaru;

    mysqli_query($conn, "INSERT INTO `cardbarang`(`gambar`, `nama`, `deskripsi`, `id`, `harga`) VALUES ('$namagambar', '$nama','$desk','','$harga')");
    echo "<script>document.location.href='index.php';</script>";
}


?>