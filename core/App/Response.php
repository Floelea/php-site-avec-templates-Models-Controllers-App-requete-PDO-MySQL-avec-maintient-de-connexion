<?php      

namespace App;

class Response{

    /**
     * Redirige vers l'URL passée en paramètre
     * 
     * @param string $url
     * @return void
     * 
     */
    public static function redirect(?array $parametres=null):void{


        $url ="index.php";
            if($parametres){

                $url = "?";

                foreach ($parametres as $cle => $valeur) {
                    

                    $nouveauParamGet = $cle."=".$valeur."&";

                    $url.=$nouveauParamGet;

                }

            }

        header("Location: ".$url );
        exit();
    
    }

    public static function json($messageClient, ?string $methodeSpe = null){

        header('Access-Control-Allow-Headers: *');
        header('Access-Control-Allow-Origin: *');
        
        if($methodeSpe == "delete"){
            header('Access-Control-Allow-Methods: DELETE');
        }
        if($methodeSpe == "put"){
            header('Access-Control-Allow-Methods: PUT');
        }
        echo json_encode($messageClient);
    }

}








?>