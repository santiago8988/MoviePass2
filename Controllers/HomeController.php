<?php

namespace Controllers;

class HomeController
{
    public function __construct()
    {
        
    }

    public static function Index ()
    {
        require_once(VIEWS_PATH."adminView.php");
    }

}

?>