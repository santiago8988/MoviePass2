<html>
    <div>
    <div class="container">
        <h2>Listado de Peliculas</h2>

        <table class="table table-dark">
            <thead>
                <th>Name</th>
                <th>Clasificación</th>
                <th>Votos promedios</th>
                <th>Likes</th>
                <th>Idioma original</th>
                <th>Lanzamiento</th>
                <th>Gender</th>
            </thead>
            <tbody>
                
                    <?php
                        if(isset($movieList)){
                            
                            foreach($movieList as $movie)
                            {
                                ?>
                                    <tr>
                                        <td><?php echo $movie->getMovieName(); ?></td>
                                        <td><?php echo $movie->getClassification(); ?></td>
                                        <td><?php echo $movie->getVoteAverage(); ?></td>
                                        <td><?php echo $movie->getVoteCount(); ?></td>
                                        <td><?php echo $movie->getOriginalLanguage(); ?></td>
                                        <td><?php echo $movie->getReleaseDate(); ?></td>
                                        <td><?php echo $movie->printGender();?> </td>
                                            
                                        
                                    </tr>
                                   
                                <?php
                            }
                        }
                    ?>
                
            </tbody>
        </table>
    </div>
    </div>
</html>