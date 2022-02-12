<?php     

namespace Controllers;

class Velo extends AbstractController {

    protected $defaultModelName = \Models\Velo::class;


    /**
     * Permet d'afficher la page ou se trouve tous les vélos
     */
    public function index(){

        $velos = $this->defaultModel->findAll();

        return $this->render("velos/index",[

                                            "pageTitle"=>"Nos vélos",
                                            "velos"=>$velos
        ]);

    }

    /**
     * Permet d'afficher la page d'un vélo par son ID
     */
    public function show(){

        $id = null;

        if(!empty($_GET['id']) && ctype_digit($_GET['id'])){

            $id = $_GET['id'];

        }

        if(!$id){

            die("pas d'id");

        }

        $velo = $this->defaultModel->findById($id);

        

        

        return $this->render("velos/show",[

                                            "pageTitle"=>$velo->getName(),
                                            "velo"=>$velo,
                                            

        ]);

    }

    /**
     * Permet de créer un nouveau vélo et de revenir a l'index
     */
    public function new(){


        $user = $this->getUser();

        if(!$user){

            return $this->redirect([
                                    "type"=>"user",
                                    "action"=>"signin",
                                    "info"=>"Connectez vous avant de créer un velo"
            ]);

        }


        $nomVelo = null;
        $descriptionVelo = null;
        
        $prixVelo = null;

                if(!empty($_POST['nomVelo']) && !empty($_POST['descriptionVelo']) && !empty($_POST['prixVelo'])){

                            $nomVelo = htmlspecialchars($_POST['nomVelo']);
                            $descriptionVelo = htmlspecialchars($_POST['descriptionVelo']);
                            
                            $prixVelo = htmlspecialchars($_POST['prixVelo']);


                    }



                if($nomVelo && $descriptionVelo && $prixVelo && !empty($_FILES['photoVelo'])){

                            $file=new \App\File('photoVelo');
                            $file->upload();

                            $velo = new \Models\Velo();
                            $velo->setName($nomVelo);
                            $velo->setDescription($descriptionVelo);
                            $velo->setImage($file->getName());
                            $velo->setPrice($prixVelo);
                            $velo->setUser_id($this->getUser()->getId());

                            $this->defaultModel->save($velo);

                            return $this->redirect([

                                                    "type"=>"velo",
                                                    "action"=>"index"
                            ]);

                }

        
        return $this->render("velos/create",[

                                            "pageTitle"=>"Creation d'un velo"
        ]);
    }

    /**
     * Permet de supprimer un vélo a partir de son ID et de revenir a l'index
     */
    public function erase(){

        $id = null;

        if(!empty($_POST['id']) && ctype_digit($_POST['id'])){

            $id=$_POST['id'];
        }

        if(!$id){

            die("Vous n'avez pas passé d'id");
        }


        $velo = $this->defaultModel->findById($id);

        $this->defaultModel->remove($velo);

        return $this->redirect([

                                "type"=>"velo",
                                "action"=>"index"
        ]);

    }
    /**
     * Permet de modifier un vélo
     */
    public function edit(){

        $id = null;
        $idEdit = null;
        $nomVelo = null;
        $descriptionVelo= null;
        $photoVelo = null;
        $prixVelo = null;
        
        

        if(!empty($_POST['id']) && ctype_digit($_POST['id']) && !empty($_POST['nomVelo']) && !empty($_POST['descriptionVelo']) && !empty($_POST['photoVelo']) && !empty($_POST['prixVelo'])){

            $idEdit = $_POST['id'];
            $nomVelo = htmlspecialchars($_POST['nomVelo']);
            $descriptionVelo=htmlspecialchars($_POST['descriptionVelo']);
            $photoVelo = htmlspecialchars($_POST['photoVelo']);
            $prixVelo = htmlspecialchars($_POST['prixVelo']);
           

        }

        if($idEdit && $nomVelo && $descriptionVelo && $photoVelo && $prixVelo){

            $velo = $this->defaultModel->findById($idEdit);

            $velo->setName($nomVelo);
            $velo->setDescription($descriptionVelo);
            $velo->setImage($photoVelo);
            $velo->setPrice($prixVelo);
            

            $this->defaultModel->change($velo);

            return $this->redirect([

                                    "type"=>"velo",
                                    "action"=>"index",
                                    
            ]);

        }


        
        if(!empty($_GET['id']) && ctype_digit($_GET['id'])){

            $id = $_GET['id'];

        }

        if(!$id){

            die("vous ne m'avez pas passé d'ID");

        }

        $velo = $this->defaultModel->findById($id);

        return $this->render("velos/editVelo",[

                                            "velo"=>$velo
        ]);

    }

    public function indexApi(){

        return $this->json($this->defaultModel->findAll());

    }

    public function showApi(){

        $id = null;

        if(!empty($_GET['id']) && ctype_digit($_GET['id'])){

            $id = $_GET['id'];

        }

        if(!$id){

           return $this->json("id non fourni par la base");

        }

        $velo = $this->defaultModel->findById($id);

        if(!$velo){

            return $this->json("Ce vélo n'existe pas");
        }

        return $this->json($velo);


    }
    

}


?>