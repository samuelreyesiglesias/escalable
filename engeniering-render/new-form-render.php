<?php
include ("../global-settings/connection-settings.php");
function generateForm($form_name) {
    global $conn;
    $sql = "DESCRIBE $form_name;"; 
    // Assuming $pdo is your PDO instance 
    $stmt = $conn->query($sql);

    echo "<form action='submit_form.php' method='POST'>";
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $field_name = $row['Field'];
        if ($field_name != 'id') { // Exclude the 'id' column
            echo "<label for='$field_name'>$field_name:</label>";
            echo "<input type='text' name='$field_name' id='$field_name'><br>";
        }
    }
    echo "<button type='submit'>Enviar</button>";
    echo "</form>";
}

generateForm("test");

?>