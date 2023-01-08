<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
        integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
</head>

<body>
    <div class="container-fluid">
        <header class="header">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            <li class="nav-item">
                                <a class="nav-link active" href="">Trang chủ</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="?url=gioi-thieu">Giới thiệu</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link " href="?url=san-pham">Sản phẩm </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link " href="?url=lien-he">Liên hệ </a>
                            </li>
                            <li class="nav-item">
                                <?php if(isset($_SESSION["user_client"])){ ?>
                                    <a class="nav-link " href="?url=lien-he">Hê lô <?=$_SESSION["user_client"]["username"]?></a> <a href="index.php?url=dang-xuat" class="d-inline text-danger">Đăng xuất</a>
                                 <?php  }else{ ?>
                                    <a href="index.php?url=dang-nhap" class="text-white btn btn-primary">Đăng nhập</a>
                                 <?php  } ?>
                            </li>
                        </ul>
                        <form class="d-flex">
                            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                            <button class="btn btn-outline-success" type="submit">Search</button>
                        </form>
                    </div>
                </div>
            </nav>
        </header>
        <!--   -->
       