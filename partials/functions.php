<?php

function generateRandomPassword($passwordLength)
{
    $password = "";

    // Eseguo la generazione della password solo se la lunghezza inserita dall'utente è almeno 4
    if ($passwordLength >= 4) {
        // Inizializzo l'array dei caratteri speciali ammessi dalla password
        $specialCharAdmitted = ["!", "$", "#", "%", "@"];
        // Inizializzo l'array che memorizza se ho utilizzato o meno un determinato tipo di carattere
        // codificate come segue --> [0-9, A-Z, a-z, caratteri_speciali]
        $typeOfCharUsed = [false, false, false, false];

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

    return $password;
}

?>