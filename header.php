<?php include 'connection.php' ;?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Untitled Document</title>
    <link href="css/bootstrap.min.css" type="text/css" rel="stylesheet" />
    <link href="css/style.css" type="text/css" rel="stylesheet" />
    <style type="text/css">
        .has-error {
            color: red;
        }
    </style>
</head>

<body>
    <header class="header">
        <div class="container">
            <img src="image/logo-bkap.png" width="445" height="76" />
        </div>
    </header>
    <section class="container main">
        <div class="col-md-3 col-left row">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">Menu liên kết</h3>
                </div>
                <ul class="list-group">
                    <a class="list-group-item" href="index.php">Trang chủ</a>
                    <a class="list-group-item" href="list-poeple.php" class="border_top">Danh sách người dân</a>
                    <a class="list-group-item" href="add-poeple.php">Thêm mới người dân</a>
                </ul>
            </div>
        </div>
        <div class="col-md-9">