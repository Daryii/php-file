<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Welcome</title>
</head>
<body>
    <h1>De ingevulde gegevens zijn:</h1>
    
<?php


    $name = $_POST['naam'];
    $email = $_POST['email'];


    echo "naam: " . $name . "<br>";
    echo "email: " . $email . "<br>";

?>

</script>
</body>
</html>
