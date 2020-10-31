<html>

    <form action = "<?php echo FRONT_ROOT?>Room/Creat" method = "POST">

        <input type = "hidden" name = "id" id = "idCinema" required value="<?php echo $idCinema;?>">

        <label for = "cinema_name">Nombre</label>
        <input type = "text" name = "name" id = "name" required>

        <label for = "cinema_adress">Capacidad</label>
        <input type = "text" name = "capacity" id = "capacity" required>

        <label for = "cinema_adress">Precio de la entrada</label>
        <input type = "text" name = "price" id = "price" required>

      
        <button type = "submit">Agregar</button>
        <button type = "reset">Reset</button>
        
    </form>
</html>