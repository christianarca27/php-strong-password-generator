<?php
$passwordLength = (int) ($_GET['password-len'] ?? 0);

// Eseguo la generazione della password solo se la lunghezza inserita dall'utente è almeno 4
if ($passwordLength >= 4) {
    // Inizializzo l'array dei caratteri speciali ammessi dalla password
    $specialCharAdmitted = ["!", "$", "#", "%", "@"];
    // Inizializzo l'array che memorizza se ho utilizzato o meno un determinato tipo di carattere
    // codificate come segue --> [0-9, A-Z, a-z, caratteri_speciali]
    $typeOfCharUsed = [false, false, false, false];

    $password = "";
    $i = 0;
    while ($i < $passwordLength) {
        // Genero random un numero che indica il tipo di carattere da inserire come succesivo nella password
        $charType = rand(0, 3);

        // Calcolo quanti caratteri mi restano da inserire
        // Se ne rimangono meno di 4 e se non ho utilizzato almeno una volta ognuno dei tipi di carattere disponibile:
        // - Continuo a generare randomicamente il tipo di carattere da inserire finché non ne ottengo uno tra quelli mancanti
        $leftChars = $passwordLength - $i;
        if ($leftChars < 4 && in_array(false, $typeOfCharUsed)) {
            while ($typeOfCharUsed[$charType] == true) {
                $charType = rand(0, 3);
            }
        }

        // Genero un carattere random del tipo "estratto" e lo accodo alla stringa password
        switch ($charType) {
            case 0:
                $password .= chr(rand(48, 57));
                break;
            case 1:
                $password .= chr(rand(65, 90));
                break;
            case 2:
                $password .= chr(rand(97, 122));
                break;
            case 3:
                $password .= $specialCharAdmitted[rand(0, sizeof($specialCharAdmitted) - 1)];
                break;
        }

        // Smarco il tipo di carattere appena utilizzato
        $typeOfCharUsed[$charType] = true;
        $i++;
    }
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