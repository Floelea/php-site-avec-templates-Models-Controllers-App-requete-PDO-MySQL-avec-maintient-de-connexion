<?php    

namespace Models;

class Home extends AbstractModel{

    protected string $NomDeLaTable = "ici le nom de la table SQL";


        
    //il nous faut une propriété private, ainsi qu'un getter et un setter
    //pour chaque colonne de la table SQL (pas de setter pour l'id)

    // private $description

    //
    /* public function getDescription(){
        return $this->description;
    } 

    public function setDescription($description)
    {
        $this->description = $description;
    } */






    // du fait d'hériter dela classe AbstractModel, et d'avoir paramétré un nom de table
    //valide, on dispose déja de trois methodes pour intéragir avec la BDD : 

    // findAll(), findById() et delete()

    //pour tout autre requete SQL, il faudra développer ici une nouvelle méthode 
    //(création, modification, recherche par clé étrangère, etc)




}

?>