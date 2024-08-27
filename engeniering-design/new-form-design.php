<?php 
include ("../global-settings/connection-settings.php");
?>
<form action="../engeniering-creator/new-form-creator.php" method="POST">
    <label for="form_name">Nombre del Formulario:</label>
    <input type="text" name="form_name" id="form_name" required>
    
    <label for="field_name">Nombre del Campo:</label>
    <input type="text" name="field_name" id="field_name" required>
    
    <label for="field_type">Tipo de Campo:</label>
    <select name="field_type" id="field_type" required>
        <option value="VARCHAR(255)">Texto</option>
        <option value="INT">Número Entero</option>
        <option value="TEXT">Texto Largo</option>
        <option value="DATE">Fecha</option>
        <!-- Agregar más tipos de campo según sea necesario -->
    </select>
    
    <button type="submit" name="action" value="add_field">Agregar Campo</button>
</form>
