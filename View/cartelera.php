





<html>





        <body>
            <div class="scrollmenu" > 

                <div class="row">
        
                
                            <?php  if(isset($showList))
                                    {
                                        foreach($showList as $show)
                                        {
                             ?>
                                            <div class="column">
    
                                                    <div class="card" style="width: 18rem;height: 37rem;">
                                                            <img class="card-img-top" src="<?php $movie=$movieDAO->searchMovie($show->getIdMovie()); echo $movie->getPhoto(); ?>" alt="Card image cap">
                                                                                    <div class="card-body">
                                                                                        <h5 class="card-title" style="color:black" align="center"><?php $movie=$movieDAO->searchMovie($show->getIdMovie()); echo $movie->getMovieName(); ?></h5>
                                                                                        <p class="card-text" style="color:black" align="center"> Funcion: <?php echo $show->getDay(); ?></p>
                                                                                        <a href="#" class="btn btn-primary">Compra entradas</a>
                                                                                    </div>
                                                    </div>
                                            </div>
                                          
                                            <div class="column">
    
                                                    <div class="card" style="width: 18rem; height: 37rem;">
                                                                <div class="card-body">
                                                                                    <h5 class="card-title" style="color:black">Overview:</h5>
                                                                                    <h6 class="card-subtitle mb-2 text-muted"style="color:black"><?php $movie=$movieDAO->searchMovie($show->getIdMovie()); echo $movie->getOverview(); ?></h6>
                                                                                    <p class="card-text" style="color:black">Average:</p>
                                                                                    <p class="card-text" style="color:black"> <?php $movie=$movieDAO->searchMovie($show->getIdMovie()); echo $movie->getVoteAverage(); ?></p>
                                                                                    <p class="card-text" style="color:black">Clasificacion:</p>
                                                                                    <p class="card-text" style="color:black"> <?php $movie=$movieDAO->searchMovie($show->getIdMovie()); echo $movie->getClassification(); ?></p>
                                                                </div>
                                                    </div>
                                            </div>
                                            
                                            
                                            <?php
                                 
                                 
                                 
                                }
                            }
                            ?>
    
                    
                </div>
            </div>



        </body>











</html>

