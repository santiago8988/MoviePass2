<html>

    <form action = "<?php echo FRONT_ROOT?>Cinema/update" method = "POST">

        <input type = "hidden" name = "id" id = "id" required value="<?php echo $cinema->getIdCinema() ?>"> 
        <label for = "cinema_name">Nombre</label>
        <input type = "text" name = "name" id = "name"  require placeholder="<?php echo $cinema->getName() ?>"> 

        <label for = "cinema_adress">Dirección</label>
        <input type = "text" name = "adress" id = "adress" require placeholder="<?php echo $cinema->getAdress() ?>"> 


        <button type = "submit">Editar</button>
        
    </form>
</html>