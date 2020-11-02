




<html>

        <?php include_once(VIEWS_PATH."search-bar.php");?>


        <form action="<?php echo FRONT_ROOT ?>Admin/adminCinemas">

        <button class="btn btn-sm btn-secondary active"  type="submit">Administrar Cines</button>
        </form>


        <form action="<?php echo FRONT_ROOT?>Movie/ShowListView">

            <button class="btn btn-sm btn-secondary active" type="submit">Listar Peliculas</button>
        </form>

        
        <form action="<?php echo FRONT_ROOT?>Show/ShowListView">
            
            <button class="btn btn-sm btn-secondary active" type="submit">Listar Shows</button>
        </form>
        
         <form action="<?php echo FRONT_ROOT?>Movie/Add">

            <button class="btn btn-sm btn-secondary active" type="submit">Cargar Base de Datos</button>
        </form>

</html>

