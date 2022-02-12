<?php   


namespace Controllers;



abstract class AbstractController{

    protected object $defaultModel;
    protected  $defaultModelName;

    public function __construct(){

        $this->defaultModel = new $this->defaultModelName();


    }

    public function redirect(? array $url=null):Response{

        return \App\Response::redirect($url);

    }


    public function render(string $nomTemplate,array $donnees){

        return \App\View::render($nomTemplate,$donnees);

    }

    public function getUser(){

        return \Models\User::getUser();
    }

    public function json($messageClient, ? string $methodeSpe = null){

        return \App\Response::json($messageClient, $methodeSpe);
    }

    public function post(string $dataType, array $requestBodyParams){

        return \App\Request::post($dataType,$requestBodyParams);
    }

    public function delete(string $dataType, array $requestBodyParams){
        return \App\Request::delete($dataType,$requestBodyParams);
    }
    public function put(string $dataType, array $requestBodyParams){
        return \App\Request::put($dataType,$requestBodyParams);
    }

    public function get(string $dataType, array $requestBodyParams){
        return \App\Request::get($dataType,$requestBodyParams);
    }
}








?>