<?php  

namespace Models;

class Velo extends AbstractModel implements \JsonSerializable{

    protected string $nomDeLaTable = "velos";

    private $id;
    public function getId(){
        return $this->id;
    }

    private $name;
    public function getName(){
        return $this->name;
    }
    public function setName($name){
        $this->name=$name;
    }

    private $description;
    public function getDescription(){
        return $this->description;
    }
    public function setDescription($description){
        $this->description=$description;
    }

    private $image;
    public function getImage(){
        return $this->image;
    }
    public function setImage($image){
        $this->image=$image;
    }

    private $price;
    public function getPrice(){
        return $this->price;
    }
    public function setPrice($price){
        $this->price=$price;
    }

    private $user_id;
    public function getUser_id(){
        return $this->user_id;
    }
    public function setUser_id($user_id){
        $this->user_id=$user_id;
    }


    /**
     * @param Velo $velo
     * @return void
     */
    public function save(Velo $velo){

        $requete = $this->pdo->prepare("INSERT INTO {$this->nomDeLaTable} 
        (name, description, image, price, user_id) VALUES (:name, :description, :image, :price, :user_id)");

        $requete->execute([

            "name" =>$velo->name,
            "description"=>$velo->description,
            "image"=>$velo->image,
            "price"=>$velo->price,
            "user_id"=>$velo->user_id
        ]);

    }
    /**
     * @param Velo $velo
     */
    public function change(Velo $velo){

        $requete = $this->pdo->prepare("UPDATE {$this->nomDeLaTable} SET name = :name, description = :description, image = :image, price = :price where id = :idModifie");
    
            $requete->execute([
    
                "name"=>$velo->name,
                "description"=>$velo->description,
                "image"=>$velo->image,
                "price"=>$velo->price,
                "idModifie"=>$velo->id
            ]);
    
    
    }

    public function getAvis(){

        $modelAvis = new \Models\Avis();
        return $modelAvis->findAllByVeloId($this);
    }

    public function getAuthor():User
    {
        $modelUser = new \Models\User();
       return $modelUser->findById($this->user_id);

    }

    public function jsonSerialize(){

        return [

            "name"=>$this->name,
            "image"=>$this->image,
            "price"=>$this->price,
            "id"=>$this->id,
            "avis"=>$this->getAvis(),
        ];
    }

}