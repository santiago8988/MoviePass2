<html>

    <form action = "<?php echo FRONT_ROOT?>Cinema/Add" method = "POST">

        <label for = "cinema_name">Nombre</label>
        <input type = "text" name = "name" id = "name" required>

        <label for = "cinema_adress">Dirección</label>
        <input type = "text" name = "adress" id = "adress" required>

      
        <button type = "submit">Agregar</button>
        <button type = "reset">Reset</button>
        
    </form>
</html>