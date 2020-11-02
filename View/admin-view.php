<!--<html>
    
    <div>

        <a href = "<?php FRONT_ROOT?> Admin/adminCinemas">Administrar cines</a>

        <a href = "<?php FRONT_ROOT?> Admin/movieList">Listar peliculas</a>
        <a href = "<?php echo FRONT_ROOT ;?> Admin/adminCinemas">Administrar cines</a>

        <a href = "<?php echo FRONT_ROOT; ?> Admin/movieList">Listar peliculas</a>

    </div>

</html> -->





        



<html>

        <?php include_once(VIEWS_PATH."search-bar.php");?>
        <form action="<?php echo FRONT_ROOT ?>Admin/adminCinemas">

        <button type="submit">Administrar Cines</button>
        </form>


        <form action="<?php echo FRONT_ROOT?>Movie/ShowListView">

            <button type="submit">Listar Peliculas Cines</button>
        </form>

        <form action="<?php echo FRONT_ROOT?>Movie/Add">

            <button type="submit">Cargar Base de Datos</button>
        </form>

        <form action="<?php echo FRONT_ROOT?>Show/ShowListView">

            <button type="submit">Listar Shows</button>
        </form>
        

</html>

