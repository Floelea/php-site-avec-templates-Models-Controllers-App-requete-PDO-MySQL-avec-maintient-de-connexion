<?php   

namespace Controllers;

class Avis extends AbstractController{

    protected $defaultModelName = \Models\Avis::class;

    /**
     * Permet de créer un nouveau commentaire a partir de l'id du vélo
     */
    public function new(){

        $user = $this->getUser();
        
        if(!user){
            $this->redirect([
                "type"=>"velo",
                "action"=>"index",
                "info"=>"connecte-toi pour commenter"
            ]);
        }

        $contentAvis=null;
        $veloId = null;

        if(!empty($_POST['contentAvis']) && !empty($_POST['veloId']) && ctype_digit($_POST['veloId'])){

            
            $contentAvis=htmlspecialchars($_POST['contentAvis']);
            $veloId = $_POST['veloId'];
        }

        $modelVelo = new \Models\Velo();

        if($contentAvis && $veloId && $modelVelo->findById($veloId)){

          

        

        $modelVelo = new \Models\Velo();
        
        $velo = $modelVelo->findById($veloId);

        $avis = new \Models\Avis();
        $avis->setUserId($user->getId());
        $avis->setContent($contentAvis);
        $avis->setVelo_id($veloId);


        $this->defaultModel->save($avis);

    }

        return $this->redirect([

                                "pageTitle"=>$velo->getName(),
                                "type"=>"velo",
                                "action"=>"show",
                                "id"=>$velo->getId()


        ]);
    }

    /**
     * Permet de supprimer un commentaire a partir de son ID
     */
    public function erase(){

        $id = null;

        if(!empty($_POST['id']) && ctype_digit($_POST['id'])){

            $id = $_POST['id'];

        }

        if(!$id){

            die("pas d'ID valable");

        }

        $avis = $this->defaultModel->findById($id);

        if(!$avis){

            return $this->redirect([
                                                
                                "type"=>"velo",
                                "action"=>"index"
                            ]);
        }

        $this->defaultModel->remove($avis);

        return $this->redirect([

                                "type"=>"velo",
                                "action"=>"index",                    
                             
        ]);

    }

    /**
     * 
     * Permet de modifier un commentaire en recuperant et en affichant les infos dans un nouveau template par l'ID en GET du bouton modifier
     */
    public function edit(){

        $id = null;
        $newInfo = null;
        $idEdit = null;

        if(!empty($_POST['id']) && ctype_digit($_POST['id']) && !empty($_POST['newInfo'])){

            $idEdit = $_POST['id'];
            $newInfo = $_POST['newInfo'];

        }

        if($idEdit && $newInfo){

            $avis = $this->defaultModel->findById($idEdit);

            $avis->setContent($newInfo);

            $this->defaultModel->change($avis);

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

        $avi = $this->defaultModel->findById($id);

        return $this->render("velos/edit",[

                                            "avi"=>$avi
        ]);

    }



    }




?>