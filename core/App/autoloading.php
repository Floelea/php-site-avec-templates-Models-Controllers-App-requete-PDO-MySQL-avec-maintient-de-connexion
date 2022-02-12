<?php    


spl_autoload_register(
    function($leNomDeLaClasseEnQuestion){
        $leNomDeLaClasseEnQuestion = str_replace("\\","/",$leNomDeLaClasseEnQuestion);

        require_once "core/{$leNomDeLaClasseEnQuestion}.php";
    }
);




?>