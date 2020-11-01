<html>


    <div class="container">
        <h2 class="text-dark">Listado de Cines</h2>
        

        <table class="table table-dark table-hover">
  <thead class="thead-light">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Cine</th>
      <th scope="col">Sala</th>
      <th scope="col">Pelicula</th>
      <th scope="col">Fecha</th>
      <th scope="col">Hora</th>
      <th scope="col">Tickets Vendidos</th>
      <th scope="col">Acciones</th>
    </tr>
  </thead>
  <tbody>
  <?php
                        if(isset($showList)){
                            foreach($showList as $show)
                            {
                                ?>
                                
                                    <tr >
                                        <td><?php echo $show->getId(); ?></td>
                                        <td ><?php echo $show->getIdCinema(); ?></td>
                                        <td><?php echo $show->getIdRoom(); ?></td>
                                        <td><?php echo $show->getIdMovie(); ?></td>
                                        <td><?php echo $show->getDay(); ?></td>
                                        <td><?php echo $show->getHour(); ?></td>
                                        <td><?php echo $show->getSoldTickets(); ?></td>
                                        <td><form action = "<?php echo FRONT_ROOT?>Show/Remove" method = "POST"><button class="btn btn-sm btn-secondary active " type = "submit" name = "remove" value = "<?php echo $show->getId(); ?>">Eliminar</button>
                                        <form action = "<?php echo FRONT_ROOT?>Show/Edit" method = "POST"><button class="btn btn-sm btn-secondary active " type = "edit" name = "edit" value = "<?php echo $show->getId(); ?>">Editar</button></form> 
                                            
                                         </td>
                                    </tr>
                                
                                <?php
                            }
                        }
                    ?>
    
  </tbody>

    </div>
</html>