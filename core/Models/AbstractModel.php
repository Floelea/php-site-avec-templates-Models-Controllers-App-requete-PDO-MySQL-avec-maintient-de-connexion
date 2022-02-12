<?php     

namespace Models;


abstract class AbstractModel{

    protected string $nomDeLaTable;

    protected $pdo;

    public function __construct(){

        $this->pdo = \Database\PdoMySQL::getPdo();

        }


                
        /**
         * retourne un tableau qui contient tout les elements
         * 
         * @return array $elements
         * 
         */
        public function findAll():array{

        

            $requete = $this->pdo->query("SELECT * FROM {$this->nomDeLaTable}");

            $elements = $requete->fetchAll(\PDO::FETCH_CLASS, get_class($this));

            return $elements;

        }


        /**
        * permet de trouver un element par son ID
        * renvoi un tableau d'un element
        * 
        * @param int @id
        * @return array|bool
        * 
        */
        public function findById(int $id){

        

            $requete = $this->pdo->prepare("SELECT * FROM {$this->nomDeLaTable} WHERE id = :id");

            $requete ->execute([

                    "id" => $id
            ]);

            $requete->setFetchMode(\PDO::FETCH_CLASS, get_class($this));

            $element = $requete->fetch();

            return $element;

        }



                
        //function remove()

        /**
        * permet de supprimer un element par le moyen de son id
        * 
        * @param $objetDUneClasse
        * 
        * 
        */
        public function remove($objetDUneClasse):void{

        
            $requetePourUneSuppression = $this->pdo->prepare("DELETE FROM {$this->nomDeLaTable} WHERE id = :id");

            $requetePourUneSuppression->execute([

            "id"=>$objetDUneClasse->getId()

        ]);




        }
}


?>