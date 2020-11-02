
<?php

require_once("nav.php");
require_once("header.php");
?>
<html>


    
        <form action="<?php echo FRONT_ROOT?>Admin/Add">
            <button  class="btn btn-sm btn-secondary active" type="submit">Agregar Cine</button>
        </form>

        <form action="<?php echo FRONT_ROOT?>Admin/cinemaList">
            <button class="btn btn-sm btn-secondary active" type="submit">Listar Cines</button>
        </form>


        

</html>


<?php

require_once("footer.php");

?>