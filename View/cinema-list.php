<html>


    <div class="container">
        <h2 class="text-info">Listado de Cines</h2>
        

        <table class="table table-dark">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Nombre</th>
      <th scope="col">Direccion</th>
      <th scope="col"> Cantidad de Salas</th>
      <th scope="col">Acciones</th>
    </tr>
  </thead>
  <tbody>
  <?php
                        if(isset($arrayCinemas)){
                            foreach($arrayCinemas as $cinema)
                            {
                                ?>
                                
                                    <tr>
                                        <td><?php echo $cinema->getIdCinema(); ?></td>
                                        <td><?php echo $cinema->getName(); ?></td>
                                        <td><?php echo $cinema->getAdress(); ?></td>
                                        <td><?php echo $cinema->getRoom(); ?></td>
                                        <td><form action = "<?php echo FRONT_ROOT?>Cinema/Remove" method = "POST"><button class="btn-xs btn btn-danger" type = "submit" name = "remove" value = "<?php echo $cinema->getIdCinema(); ?>">Eliminar</button></form>
                                            <form action = "<?php echo FRONT_ROOT?>Cinema/Edit" method = "POST"><button class="btn btn-primary btn-xs" type = "edit" name = "edit" value = "<?php echo $cinema->getIdCinema(); ?>">Editar</button></form>                                    </td>
                                    </tr>
                                
                                <?php
                            }
                        }
                    ?>
    
  </tbody>

    </div>
</html>