<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <table>
        <tr>
            <th>Studentnummer</th>
            <th>Voornaam</th>
            <th>Tussenvoegsel</th>
            <th>Achternaam</th>
            <th>Klas</th>
            <th>Mentor</th>
        </tr>
    
        <?php
        $db_host = 'mariadb';
        $db_name= 'root';
        $db_pass = 'mysql';
        $db_database = 'studentenadmin';

        $db = new PDO('mysql:host='.$db_host.';post= 3306; dbname='.$db_database,$db_name,$db_pass );
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $select = $db->prepare("SELECT `studentnummer`,`voornaam` ,`tussenvoegsel`,`achternaam`,`klas`,`mentor` FROM `student`");
        $select->execute();
        
        while ($row = $select->fetch(PDO::FETCH_ASSOC)) {
            $db_col = $row['studentnummer'];
            $db_col2 = $row['voornaam'];
            $db_col3 = $row['tussenvoegsel'];
            $db_col4 = $row['achternaam'];
            $db_col5 = $row['klas'];
            $db_col6 = $row['mentor'];
        
            echo "<tr>";
            echo "<td>$db_col</td>";
            echo "<td>$db_col2</td>";
            echo "<td>$db_col3</td>";
            echo "<td>$db_col4</td>";
            echo "<td>$db_col5</td>";
            echo "<td>$db_col6</td>";
            echo "</tr>";
        }
        ?>
    </table>
</body>
</html>
