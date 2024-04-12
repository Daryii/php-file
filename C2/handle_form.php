<?php

// Controleer of het formulier is ingediend
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Array om de ingevulde gegevens op te slaan
    $form_data = array();

    // Loop door elk ingediend veld en sla de waarde op
    foreach ($_POST as $key => $value) {
        // Voeg het veld toe aan de form_data array
        $form_data[$key] = $value;
    }

    // Converteer de array naar JSON-formaat
    $json_data = json_encode($form_data);

    // Schrijf de JSON-gegevens naar een lokaal bestand
    $file_path = 'user_data.json';
    file_put_contents($file_path, $json_data);

    // Geef de JSON-gegevens weer op het scherm
    echo $json_data;
}

?>
