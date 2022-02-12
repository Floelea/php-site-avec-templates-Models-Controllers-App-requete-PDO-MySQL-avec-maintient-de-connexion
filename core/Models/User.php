<?php   

namespace Models;

class User extends AbstractModel implements \JsonSerializable{

    protected string $nomDeLaTable = "users";

    private $id;
    public function getId(){
        return $this->id;
    }

    private $username;
    public function getUsername(){
        return $this->username;
    }
    public function setUsername($username){
        $this->username=$username;
    }

    private $password;
    public function getPassword(){
        return $this->password;
    }
    public function setPassword($password){
        $this->password= password_hash($password, PASSWORD_DEFAULT);
    }

    private $email;
    public function getEmail(){
        return $this->email;
    }
    public function setEmail($email){
        $this->email=$email;
    }

    private $display_name;
    public function getDisplay_name(){
        return $this->display_name;
    }
    public function setDisplay_name($display_name){
        $this->display_name=$display_name;
    }


    public function save(User $user){

        $requete = $this->pdo->prepare("INSERT INTO {$this->nomDeLaTable} 
        (username, password, email, display_name) VALUES (:username, :password, :email, :display_name)");

        $requete->execute([

            "username" =>$user->username,
            "password"=>$user->password,
            "email"=>$user->email,
            "display_name"=>$user->display_name
        ]);


    }

    public function findByUsername(string $username){

        $requete = $this->pdo->prepare("SELECT * from {$this->nomDeLaTable} 
        WHERE username = :username");

        $requete->execute([

            "username" =>$username
        ]);

        $requete->setFetchMode(\PDO::FETCH_CLASS, get_class($this));
        return $requete->fetch();

    }

    public function logIn( string $password){

        $result = false;

        if(password_verify($password,$this->password)){

            $_SESSION['user'] = [

                "id"=>$this->id,
                "username"=>$this->username,
                "display_name"=>$this->display_name
            ];
            $result = true;
        }
        return $result;

    }

    public function logOut(){

        session_unset();
    }

    public static function getUser(){

        if(isset($_SESSION['user'])){

            $userModel = new \Models\User();
            return $userModel->findById($_SESSION['user']['id']);

        }else {
            return false;
        }
    }

    public function jsonSerialize(){

        return [

            "auteur"=>$this->display_name,

        ];

    }
}


?>