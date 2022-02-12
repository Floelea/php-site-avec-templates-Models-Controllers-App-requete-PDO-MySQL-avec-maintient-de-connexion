<?php     

namespace Controllers;

class User extends AbstractController{

    protected $defaultModelName = \Models\User::class;


    public function signUp(){

        $username = null;
        $password = null;
        $email=null;
        $display_name=null;

        if(!empty($_POST['username']) && !empty($_POST['password']) && !empty($_POST['email']) && !empty($_POST['display_name'])){

            $username = htmlspecialchars($_POST['username']);
            $password = htmlspecialchars($_POST['password']);
            $email=htmlspecialchars($_POST['email']);
            $display_name=htmlspecialchars($_POST['display_name']);

        }

        if($username && $password && $email && $display_name){


            if($this->defaultModel->findByUsername($username)){

                $this->redirect([

                        "type"=>"user",
                        "action"=>"signup",
                        "info"=>"Cet utilisateur existe déjà"  

                ]);

            }

            $user = new \Models\User();
            $user->setUsername($username);
            $user->setPassword($password);
            $user->setEmail($email);
            $user->setDisplay_name($display_name);
            $this->defaultModel->save($user);

        }
        
            return $this->render("users/create",[
                                            "pageTitle"=>"Création de compte"
        ]);


    }

    public function signIn(){

        $username = null;
        $password = null;

        if(!empty($_POST['username']) && !empty($_POST['password'])){

            $username = htmlspecialchars($_POST['username']);
            $password = htmlspecialchars($_POST['password']);
        }

        if($username && $password){

        $userQuiSeConnecte = $this->defaultModel->findByUsername($username);

        if(!$userQuiSeConnecte){

            return $this->redirect([

                                    "type"=>"user",
                                    "action"=>"signin",
                                    "info"=>"Utilisateur inconnu"
            ]);
        }

            if(!$userQuiSeConnecte->logIn($password)){

                return $this->redirect([
                                        "type"=>"user",
                                        "action"=>"signin",
                                        "info"=>"le mot de passe est érroné"
                ]);
            }

            return $this->redirect([
                                    "type"=>"home",
                                    "action"=>"index",
                                    "info"=>"salut".$userQuiSeConnecte->getDisplay_name()
            ]);

        }

        return $this->render("users/connect",[

                                            "pageTitle"=>"Connexion"
        ]);

    }

    public function signOut(){

        $this->defaultModel->logOut();

        return $this->redirect([
                                "type"=>"home",
                                "action"=>"index",
                                "info"=>"Vous etes deconnecté"
        ]);

    }


}


?>