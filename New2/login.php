<?php 
    session_start();
    ob_start();
    if(isset($_SESSION['user'])) header('location: dashboard.php');
   

    

    $error_message = '';

    if($_POST){
        include('db/connection.php'); 

        $username = $_POST['username']; 
        $password = $_POST['password']; 

        
        $query = 'SELECT * FROM users WHERE users.email="'. $username . '" AND users.password="'. $password .'"';
        $stmt = $conn->prepare($query);
        $stmt->execute();

    
        if($stmt->rowCount() > 0){
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $user = $stmt->fetchAll()[0];
            $_SESSION['user'] = $user;
             

            header('Location: dashboard.php');
        } else $error_message = 'Plz enter the correct username and password';
    }
 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="login.css">
    <title>SB Login - Inventory Management System</title>
   
</head>
<body>
    <?php if(!empty($error_message)) { ?>
        
        <div id='errorMessage'>
            <strong>Error:</strong> <p> <?= $error_message ?> </p>
        </div>

    <?php } ?>
    <div class="container">
        <div class="loginHeader">
            <h1>SB</h1>
            <p>Inventory Management System</p>
        </div>
        <div class="loginBody">
            <form action="login.php" method="POST">
                <div class="loginInputContainer">
                    <label for="">Username</label>
                    <input placeholder="username" name="username" type="text" />
                </div>
                <div class="loginInputContainer">
                    <label for="">Password</label>
                    <input placeholder="password" name="password" type="text" />
                </div>
                <div class="loginButtonContainer">
                    <button>login</button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>