<?php   

namespace Models;

class Avis extends AbstractModel implements \JsonSerializable{

    public string $nomDeLaTable = "avis";

    private $id;
    public function getId(){
        return $this->id;
    }

    private $user_id;
    public function getUserId()
    {
        return $this->user_id;
    }

   
    public function setUserId($user_id): void
    {
        $this->user_id = $user_id;
    }
    
    private $content;
    public function getContent(){
        return $this->content;
    }
    public function setContent($content){
        $this->content=$content;
    }

    private $velo_id;
    public function getVelo_id(){
        return $this->velo_id;
    }
    public function setVelo_id($velo_id){
        $this->velo_id=$velo_id;
    }


/**
 * Permet de trouver tout les commentaires a partir de l'ID du vélo
 *  */  
public function findAllByVeloId(Velo $velo){

    $requeteAvis = $this->pdo->prepare("SELECT * FROM {$this->nomDeLaTable} 
    WHERE velo_id = :velo_id");

    $requeteAvis ->execute ([

        "velo_id" => $velo->getId()

    ]);

    $avis = $requeteAvis->fetchAll(\PDO::FETCH_CLASS, get_class($this));

    return $avis;

    }




/**
 * Permet de créer un commentaire 
 * @param Avis $avis
 */
public function save(Avis $avis){

    $requete = $this->pdo->prepare("INSERT INTO {$this->nomDeLaTable} (user_id, content, velo_id) VALUES ( :user_id, :avisVelo, :velo_id)");

    $requete->execute([

        "user_id"=>$avis->user_id,
        "avisVelo"=>$avis->content,
        "velo_id"=>$avis->velo_id

    ]);

}

/**
 * Permet de modifier un commentaire 
 * @param Avis $avis
 * 
 */
public function change(Avis $avis){

    $requete = $this->pdo->prepare("UPDATE {$this->nomDeLaTable} SET content = :newInfo WHERE id = :idModifie");

        $requete->execute([

            "newInfo"=>$avis->content,
            "idModifie"=>$avis->id
        ]);


}

public function getAuthor():User
    {
        $modelUser = new \Models\User();
        return $modelUser->findById($this->user_id);

    }

    public function jsonSerialize(){

        return[

        "id"=>$this->id,
        "content"=>$this->content,
        "auteur"=>$this->getAuthor()

        ];

    }


    
}