<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../css/main.css">
    <title>Title</title>
</head>
<body>
    <?php
        include '../templates/sidebar.php';
    ?>
    <div class="main-content">
        <div class="panel panel-default">
            <div class="panel-heading">公司管理</div>
        </div>
        <div class="panel-body">
            <div class="operate-bar">
                <div class="form-group">
                    <input type="text" placeholder="搜索" class="form-control">
                </div>
            </div>
            <table class="table table-bordered">
                <thead class="bg-primary">
                    <tr>
                        <td>公司名</td>
                        <td>公司logo</td>
                        <td>公司种类</td>
                        <td>公司地址</td>
                        <td>操作</td>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>公司名</td>
                        <td>公司logo</td>
                        <td>公司种类</td>
                        <td>公司地址</td>
                        <td>操作</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <script src="../js/jquery-3.2.1.min.js"></script>
    <script src="../js/bootstrap.js"></script>
    <script>
        $.ajax({
            url: '../Api/Company/List.php',
            data: {

            },
            dataType: 'json',
            method: 'POST',
            success: function (res) {


            }
        });
    </script>
</body>
</html>