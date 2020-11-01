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

                            foreach($roomList as $key=> $room)
                            {   
                               
                                ?>
                                
                                    <tr>
                                        <td><?php echo $room->getIdCinema(); ?></td>
                                        <td><?php echo $room->getName(); ?></td>
                                        <td><?php echo $room->getCapacity(); ?></td>
                                        <td><?php echo $room->getPrice(); ?></td>
                                        <td><form action = "<?php echo FRONT_ROOT?>Room/Remove" method = "POST"><button class="btn-xs btn btn-danger" type = "submit" name = "remove" value = "<?php echo $room->getIdCinema(); ?>">Eliminar</button></form>
                                            <form action = "<?php echo FRONT_ROOT?>Room/Edit" method = "POST"><button class="btn-xs btn btn-danger" type = "submit" name = "remove" value = "<?php echo $room->getIdCinema(); ?>">Editar</button></form> 
                                            <form action = "<?php echo FRONT_ROOT?>Show/ShowAddView" method = "POST">
                                               <input type="hidden" name="idCine" value="<?php echo $room->getIdCinema();?>"> 
                                               <input type="hidden" name="idRo" value="<?php echo $room->getId();?>">
                                               <input type="hidden" name="capaci" value="<?php echo $room->getCapacity();?>">
                                               <input type="hidden" name="pric" value="<?php echo $room->getPrice();?>">
                                               <button class="btn-xs btn btn-danger" type = "submit" name = "remove" >AddShow</button>
                                            </form>
                                         </td>
                                    </tr>
                                    
                                
                                <?php
                                
                            }
                        }
                ?>
    
            </tbody>
        </table>

    </div>
</html>