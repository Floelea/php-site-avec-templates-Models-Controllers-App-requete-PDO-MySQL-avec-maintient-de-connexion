<?php   

namespace Models;

class Message extends AbstractModel implements \Jsonserializable{

    protected string $nomDeLaTable = "messages";


    private $id;
    public function getId(){
        return $this->id;
    }

    private $author;
    public function getAuthor(){
        return $this->auhtor;
    }
    public function setAuthor($author){
        $this->author=$author;
    }

    private $content;
    public function getContent(){
        return $this->content;
    }
    public function setContent($content){
        $this->content=$content;
    }


    public function save(Message $message){

        $sql = $this->pdo->prepare("INSERT INTO {$this->nomDeLaTable} 
        (author, content) VALUES (:author, :content)");

        $sql->execute([

            "author"=>$message->author,
            "content"=>$message->content

        ]);

    }


    public function jsonSerialize(){

        return [

            "author"=>$this->author,
            "content"=>$this->content,
            "id"=>$this->id
           
        ];
    }

}



?>