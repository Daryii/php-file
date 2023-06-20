<!DOCTYPE html>
<html>
<head>
  <title>Er heerst paniek...</title>
  <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>

  <form action="" method="post">
    <h3>Kies een form:</h3>
    <input type="radio" name="formType" value="form1"> Erheerstpaniek
    <br>
    <input type="radio" name="formType" value="form2"> Onkunde
    <br><br>
    <input type="submit" value="Click">
    <br><br>
  </form>

  <?php
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['formType'])) {
      $formType = $_POST['formType'];
      if ($formType == "form1") {
        echo '
          <form id="form1" action="erheerstpaniek.php" method="post">
            <!-- Form 1 -->
            Welk dier zou je nooit als huisdier willen hebben?<input type="text" name="question1"> <br><br>
            Wie is de belangrijkste persoon in je leven?<input type="text" name="question2">
            <br><br>
            In welk land zou je graag willen wonen?<input type="text" name="question3">
            <br><br>
            Wat doe je als je je verveelt?
            <input type="text" name="question4">
            <br><br>
            Met welk speelgoed speelde je als kind het meest?
            <input type="text" name="question5">
            <br><br>
            Bij welke docent spijbel je het liefst?
            <input type="text" name="question6">
            <br><br>
            Als je €100.000,-had, wat zou je kopen?
            <input type="text" name="question7">
            <br><br>
            Wat is je favoriete bezigheid
            <input type="text" name="question8">
            <br><br>
            <input type="submit" value="Versturen">
          </form>
        ';
      } elseif ($formType == "form2") {
        echo '
          <form id="form2" action="onkunde.php" method="post">
            <!-- Form 2 -->
            Wat zou je graag willen kunnen?<input type="text" name="question1"> <br><br>
            Met welke persoon kun je goed opschieten?<input type="text" name="question2">
            <br><br>
            Wat is je favoriete getal?<input type="text" name="question3">
            <br><br>
            Wat heb je altijd bij je als je op vakantie gaat?
            <input type="text" name="question4">
            <br><br>
            Wat is je beste persoonlijke eigenschap?
            <input type="text" name="question5">
            <br><br>
            Wat is je slechtste persoonlijke eigenschap?
            <input type="text" name="question6">
            <br><br>
            Wat is het ergste dat je kan overkomen?
            <input type="text" name="question7">
            <br><br>
            <input type="submit" value=" Versturen">
          </form>
        ';
      }
    }
  }
  ?>
    <p>Deze website is gemaakt door @Daryi! </p>
</body>
</html>
