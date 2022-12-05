<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Success</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/style.css">
</head>

<body>

    <div class="wrapper">

        <div class="container mb-3 pt-3">
            <div class="row">

                <div class="col-12 text-center">
                    <h2 class="text-white">La password generata è:</h2>
                    <div class="alert alert-info" role="alert">
                       <?php echo $_SESSION['password'] ?>
                    </div>
                </div>

                <div class="col-12">
                    <a href="./index.php" class="btn btn-info">Torna alla homepage</a>
                </div>

            </div>
        </div>

    </div>

</body>

</html>