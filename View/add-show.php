<html>

    <form action = "<?php echo FRONT_ROOT?>Show/Add" method = "POST">

        <input type = "hidden" name = "idCinema" id = "idCinema" required value="<?php echo $idCinema;?>">
        <input type = "hidden" name = "idRoom" id = "idRoom" required value="<?php echo $idRoom;?>">
        <input type = "hidden" name = "capacity" id = "capacity" required value="<?php echo $capacity;?>">
        <input type = "hidden" name = "price" id = "price" required value="<?php echo $price;?>">

        <label for = "cinema_name">Dia</label>
        <input type = "date" name = "day" id = "day" required>

        <label for = "cinema_adress">Hora</label>
        <input type = "time" name = "hour" id = "hour" required>

        <select name="movie" id="idMovie" required>
            
            <option selected disabled value="Seleccione una pelicula"></option>
            <?php

                foreach($movieList as $movie)
                {
            ?>
                <option value="<?php echo $movie->getIdMovie();?>"> <?php echo $movie->getMovieName();?></option>

            <?php

                }
            
            ?>


        </select>

      
        <button type = "submit">Crear</button>
        <button type = "reset">Reset</button>
        
    </form>
</html>