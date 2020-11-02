<html>

    <form action = "<?php echo FRONT_ROOT?>Cinema/Add" method = "POST">

        <label for = "cinema_name">Nombre</label>
        <input type = "text" name = "name" id = "name" required>

        <label for = "cinema_adress">Dirección</label>
        <input type = "text" name = "adress" id = "adress" required>

      
        <button class="btn btn-sm btn-secondary active" type = "submit">Agregar</button>
        <button class="btn btn-sm btn-secondary active" type = "reset">Reset</button>
        
    </form>
</html>