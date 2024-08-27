<?php
include ("../global-settings/connection-settings.php");
// ejemplo de archivo edit_form.php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $action = $_POST['action'];
 
    // Crear un nuevo formulario (tabla)
    if ($action == 'add_field') {
        $form_name = $_POST['form_name'];
        createForm($form_name);
    }

    // Agregar un nuevo campo al formulario (tabla)
    if ($action == 'add_field') {
        $form_name = $_POST['form_name'];
        $field_name = $_POST['field_name'];
        $field_type = $_POST['field_type'];
        addFieldToForm($form_name, $field_name, $field_type);
    }
}

function createForm($form_name) {
    global $conn; // Use the global $conn variable
    $sql = "CREATE TABLE IF NOT EXISTS $form_name (
        id INT AUTO_INCREMENT PRIMARY KEY
    );";
    
    try {
        $conn->exec($sql);
    } catch (PDOException $e) {
        die("Error creating table: " . $e->getMessage());
    }
}

function addFieldToForm($form_name, $field_name, $field_type) {
    global $conn;

    // Validate table and field names to avoid SQL injection
    $form_name = preg_replace('/[^a-zA-Z0-9_]/', '', $form_name);
    $field_name = preg_replace('/[^a-zA-Z0-9_]/', '', $field_name);

    // Prepare the SQL statement
    $sql = "ALTER TABLE $form_name ADD COLUMN $field_name $field_type;";

    try {
        // Execute the SQL statement
        $conn->exec($sql);
        echo "Field '$field_name' added to table '$form_name' successfully.";
    } catch (PDOException $e) {
        die("Error adding field: " . $e->getMessage());
    }
}





?>