<?php

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if all fields are filled
    if(isset($_POST['name']) && isset($_POST['email']) && isset($_POST['password']) && isset($_POST['country']) && isset($_POST['driving_license']) && isset($_POST['birthdate'])) {
        // Get the submitted data
        $name = $_POST['name'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $country = $_POST['country'];
        $driving_license = $_POST['driving_license'];
        $birthdate = $_POST['birthdate'];

        // Create an associative array of the data
        $data = array(
            'name' => $name,
            'email' => $email,
            'password' => $password,
            'country' => $country,
            'driving_license' => $driving_license,
            'birthdate' => $birthdate
        );

        // Convert the array to JSON format
        $json_data = json_encode($data);

        // Write the JSON data to a local file
        $file_path = 'user_data.json';
        file_put_contents($file_path, $json_data);

        // Display the JSON data on the screen
        echo $json_data;
    } else {
        // Display an error message if not all fields are filled
        echo "Error: Niet alle velden zijn ingevuld";
    }
}

?>
