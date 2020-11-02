
<html>


<style type="text/css">
			
			* {
				margin:0px;
				padding:0px;
			}
			
			#header {
				margin:auto;
				width:800px;
				font-family:Arial, Helvetica, sans-serif;
			}
			
			ul, ol {
				list-style:none;
			}
			
			.nav > li {
				float:left;
			}
			
			.nav li a {
				background-color:#000;
				color:#fff;
				text-decoration:none;
				padding:10px 12px;
				display:block;
			}
			
			.nav li a:hover {
				background-color:#434343;
			}
			
			.nav li ul {
				display:none;
				position:absolute;
				min-width:140px;
			}
			
			.nav li:hover > ul {
				display:block;
			}
			
			.nav li ul li {
				position:relative;
			}
			
			.nav li ul li ul {
				right:-140px;
				top:0px;
			}
			
		</style>
        <body>
            
                    <div>
                        <div id="header">
                            <ul class="nav">

                                            <li>
                                                <a href = "" class = "x">Inicio</a>
                                            </li>
                                            <li>
                                                <a href ="<?php FRONT_ROOT?>User/ShowsView" class = "x">Cartelera</a>
                                            </li>
                                    
                                            <li>
                                                <a href="" class = "x">Consultar peliculas</a>
                                                        <ul>
                                                                <li><a href="<?php FRONT_ROOT?>User/showGenderView">Por genero</a></li>
                                                                <li><a href="<?php FRONT_ROOT?>User/showViewAverage">Por likes </a></li>
                                    
                                                        </ul>
                                            </li>
                                    
                                            <li>
                                                <a href="" class = "x" >Sobre nosotros</a>
                                            </li>
                                            <li>
                                                <a href="" class = "x">Contactos</a>
                                            </li>



                            </ul>
                         </div>
                        <br>
                        <br>
                        <br>
                            
                            <div>
                                
                                <br>
                                <?php include_once(VIEWS_PATH."slider.php");?>
                        
                        
                            </div>
                        
                        
                    </div>
        </body>
</html>



