<html>

    <form action = "<?php echo FRONT_ROOT?>Cinema/update" method = "POST">

        <input type = "hidden" name = "id" id = "id" required value="<?php echo $cinema->getIdCinema() ?>"> 
        <label for = "cinema_name">Nombre</label>
        <input type = "text" name = "name" id = "name" required placeholder="<?php echo $cinema->getName() ?>"> 

        <label for = "cinema_adress">Dirección</label>
        <input type = "text" name = "adress" id = "adress" required placeholder="<?php echo $cinema->getAdress() ?>"> 

        <label for = "cinema_room">Cantidad de salas</label>
        <input type = "text" name = "room" id = "room" required placeholder="<?php echo $cinema->getRoom() ?>">

        <label for = "cinema_price">Precio</label>
        <input type = "text" name = "price" id = "price" required placeholder="<?php echo $cinema->getPrice() ?>">


        <button type = "submit">Editar</button>
        
    </form>
</html>