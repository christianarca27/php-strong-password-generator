<?php

include './partials/functions.php';

$passwordLength = (int) ($_GET['password-len'] ?? 0);

$password = generateRandomPassword($passwordLength);

?>


<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Password Generator</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">
</head>

<body>
    <div class="container">
        <h1>Password Generator</h1>

        <form action="index.php" method="get">
            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1">Lunghezza password</span>
                <input type="number" min="4" name="password-len" id="password-len" class="form-control"
                    aria-describedby="basic-addon1">
            </div>

            <button class="btn btn-primary" type="submit">Genera</button>
        </form>

        <p>
            <?php
            if ($passwordLength >= 4) {
                echo "Password generata: " . $password;
            } else {
                echo "Numero di caratteri non sufficienti";
            }
            ?>
        </p>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>