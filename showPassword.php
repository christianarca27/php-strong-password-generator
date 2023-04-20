<?php

// Apro la sessione per avere accesso alla password generata che voglio stampare
session_start();

?>

<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">
</head>

<body>
    <div class="container">
        <h1>Generated Password</h1>

        <pre>
        <?php

        // Se la password non è vuota(perché è la prima volta che apro la pagina) la stampo a video
        if (!empty($_SESSION['generatedPassword'])) {
            echo $_SESSION['generatedPassword'];
        } else {
            echo "Qualcosa è andato storto.";
        }

        session_unset();
        session_destroy();

        ?>
        </pre>

        <a href="index.php">Torna indietro</a>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>