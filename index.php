<?php

// Includo(evitando eventuali doppioni) il file che contiene la funzione di generazione randomica
include_once './partials/functions.php';

// Genero la password tramite l'apposita funzione
$passwordLength = (int) ($_GET['password-len'] ?? 0);

if ($passwordLength >= 4) {
    $password = generateRandomPassword($passwordLength);

    // Apro la sessione per salvare nella memoria condivisa la password che ho generato
    session_start();
    $_SESSION['generatedPassword'] = $password;

    // Reindirizzo l'utente alla pagina iniziale dove verrà poi stampata a video la pagina generata
    header("Location: ./showPassword.php");
}

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
                    aria-describedby="basic-addon1" required>
            </div>

            <button class="btn btn-primary" type="submit">Genera</button>
        </form>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>