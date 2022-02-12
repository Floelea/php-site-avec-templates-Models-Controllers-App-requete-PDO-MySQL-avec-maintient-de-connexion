<?php

namespace App;

class Request
{
    public static function get(string $dataType, array $requestBodyParams )
    {
        if($_SERVER['REQUEST_METHOD'] != 'GET'){
            return false;
        }

        return  Request::isSubmitted( $dataType, $requestBodyParams, 'get');
    }

    public static function post(string $dataType, array $requestBodyParams )
    {
        if($_SERVER['REQUEST_METHOD'] != 'POST'){
            return false;
        }

       return  Request::isSubmitted( $dataType, $requestBodyParams);
    }

    public static function delete(string $dataType, array $requestBodyParams )
    {
        if($_SERVER['REQUEST_METHOD'] != 'DELETE'){
            return false;
        }

        return  Request::isSubmitted( $dataType, $requestBodyParams);
    }

    public static function put(string $dataType, array $requestBodyParams )
    {
        if($_SERVER['REQUEST_METHOD'] != 'PUT'){
            return false;
        }

        return  Request::isSubmitted( $dataType, $requestBodyParams);
    }


    /**
     * verifie si tous les parametres de la requete sont bons, text ou nombres entiers
     * si tout est valide, renvoie un tableau avec ces parametres
     * sinon renvoie un booleen faux
     *
     * @param string $dataType
     * @param array $requestBodyParams
     * @return false | array
     */
    public static function isSubmitted(string $dataType, array $requestBodyParams)
    {
            if($dataType == "json"){
                $corpsRequete = file_get_contents('php://input');
                $requestParams = json_decode($corpsRequete, true);
            }

            if($dataType == "form"){
                $requestParams = $_POST;
            }

            $resultats = false;

            foreach($requestBodyParams as $parametre=>$typeDeDonnees){

                    if(!empty($requestParams[$parametre]))
                    {
                        if($typeDeDonnees == 'text'){
                            $resultats[$parametre] = htmlspecialchars($requestParams[$parametre]);
                        }else if($typeDeDonnees == 'number'){

                           if(ctype_digit($requestParams[$parametre])){
                               $monNombre = $requestParams[$parametre];
                               $resultats[$parametre] = $monNombre;
                           }else{return false;}


                        }


                    }else{ return false; }
            }

            return $resultats;



    }
}