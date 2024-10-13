<?php
session_start();

if (!isset($_SESSION["login"])) {
    header("Location: ../projectrpl/main.php");
    exit;
}

include 'functions.php';

$hasil = $_GET['key'];

$key = cari($_GET["key"]);


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Store</title>

    <!-- bootstrap 5 CDN-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">

    <!-- bootstrap 5 Js bundle CDN-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="../projectrpl/aktifitas.css">

</head>
<header>
    <h1>Perpustakaan Digital</h1>
    <nav>
        <ul>
            <li><a href="../projectrpl/hpuser.php">Beranda</a></li>
        </ul>
    </nav>
</header>

<body>
    <div class="container">
        Search result for <b><?= $hasil ?></b>

        <div class="d-flex pt-3">
            <?php if ($key === null) { ?>
                <div class="alert alert-warning 
        	            text-center p-5 pdf-list" role="alert">
                    <img src="img/empty-search.png" width="100">
                    <br>
                    The key <b>"<?= $hasil ?>"</b> didn't match to any record
                    in the database
                </div>
            <?php } ?>
            <?php $i = 1; ?>
            <div class="d-flex">
                <div class="pdf-list d-flex flex-wrap">
                    <?php $i = 1; ?>
                    <?php foreach ($key as $book) : ?>
                        <div class="card m-1">
                            <img src="../images/<?= $book['gambar'] ?>" class="card-img-top">
                            <div class="card-body">
                                <h5 class="card-title">
                                    <?= $book['namaBuku'] ?>
                                </h5>
                                <p class="card-text">
                                    <i><b>Penulis: <?= $book['penulis'] ?>
                                            <br></b></i>
                                    <?= $book['sinopsis'] ?>
                                    <br><i><b>Category:
                                            <br></b></i>
                                    <?= $book['genre'] ?>
                                </p>
                                <a href="../images/<?= $book['gambar'] ?>" class="btn btn-success">Open</a>

                                <a href="../images/<?= $book['gambar'] ?>" class="btn btn-primary" download="<?= $book['namaBuku'] ?>">Download</a>
                            </div>
                        </div>
                    <?php endforeach; ?>
                    <?php $i++ ?>
                </div>
                <?php if ($i % 3 == 0) ?>
                <?php $i++ ?>
            </div>
        </div>
    </div>
</body>

</html>