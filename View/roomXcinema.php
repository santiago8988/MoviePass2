<html>


    <div class="container">
        <h1 class="text-info"><?php echo $cinemaName ?></h1>
        

        <form class="form-inline" action="<?php echo FRONT_ROOT?>Room/ShowAddView" method = "POST">
                    <label><h2>LISTADO DE SALAS:</h2></label>
                    <input type = "hidden" name = "id" id = "idCinema" required value="<?php echo $idCinema;?>">
                    <input type="submit" value="Crear Sala">
        </form>
        

        <table class="table table-dark">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Nombre</th>
      <th scope="col">Capacidad</th>
      <th scope="col">Valor entrada</th>
      <th scope="col">Acciones</th>
    </tr>
  </thead>
  <tbody>
  <?php
                        if(isset($roomList)){

                            foreach($roomList as $room)
                            {
                                ?>
                                
                                    <tr>
                                        <td><?php echo $room->getIdCinema(); ?></td>
                                        <td><?php echo $room->getName(); ?></td>
                                        <td><?php echo $room->getCapacity(); ?></td>
                                        <td><?php echo $room->getPrice(); ?></td>
                                        <td><form action = "<?php echo FRONT_ROOT?>Room/Remove" method = "POST"><button class="btn-xs btn btn-danger" type = "submit" name = "remove" value = "<?php echo $cinema->getIdCinema(); ?>">Eliminar</button></form>
                                            <form action = "<?php echo FRONT_ROOT?>Room/Edit" method = "POST"><button class="btn btn-primary btn-xs" type = "edit" name = "edit" value = "<?php echo $cinema->getIdCinema(); ?>">Editar</button></form> 

                                         </td>
                                    </tr>
                                
                                <?php
                            }
                        }
                    ?>
    
  </tbody>

    </div>
</html>