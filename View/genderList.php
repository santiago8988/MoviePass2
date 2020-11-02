<html>


        <h3>Seleccione un genero:</h3>

            <?php
                foreach($genderList as $gender)
                {
 
            ?>
                    <form action="<?php echo FRONT_ROOT?>User/showMovieGender" method="POST" ><button class="btn btn-sm btn-secondary active type="submit" name="gender" id="gender" value="<?php echo $gender->getGenderName();?>"><?php echo $gender->getGenderName();?></button></form>

                <?php
                
                } ?>




</html>