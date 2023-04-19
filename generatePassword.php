<?php

// Includo(evitando eventuali doppioni) il file che contiene la funzione di generazione randomica
include_once './partials/functions.php';

// Genero la password tramite l'apposita funzione
$passwordLength = (int) ($_GET['password-len'] ?? 0);
$password = generateRandomPassword($passwordLength);

// Apro la sessione per salvare nella memoria condivisa la password che ho generato
session_start();
$_SESSION['generatedPassword'] = $password;

// Reindirizzo l'utente alla pagina iniziale dove verrà poi stampata a video la pagina generata
header("Location: ./index.php");

?>