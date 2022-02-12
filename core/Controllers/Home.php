<?php   

namespace Controllers;

class Home extends AbstractController{

    protected $defaultModelName = \Models\Home::class;


    /**
     * 
     * permet d'afficher l'accueil
     * 
     * pour déclencher un appel à cette methode, le Kernel est conçu pour surveiller
     * deux parametres dans l'url :  le "type" pour le controlleur et "action" pour le modèle
     * 
     * ici, pour cette methode index, on obtiendra 'type'='home' et 'action'='index'
     * 
     * et donc l'url : 'index.php?type=home&action=index'
     * 
    
     */



    public function index(){

        
        // si besoin d'interagir avec la BDD, on peut utiliser le modele par defaut
        //du controller, et donc faire une requete sur sa table SQL par defaut
        // directement depuis cette classe : 

        //   $elements = $this->defaultModel->findAll()


        // a besoin de deux parametres : un nom de dossier/template (string),
        // et un tableau d'options contenant au moins le titre de la page
        //et egalement un index et valeur pour chaque variable que le template exploite

        //on peut donc créer un dossier/nomdetemplate.html.php dans le dossier template
        // toute variable passée au tableau d'options de $this->render
        //sera disponible dans ce template


        return $this->render("home/index",[

                                        "pageTitle"=>"Home Page"

        ]);

    }



    public function new(){

        


    }


}

?>