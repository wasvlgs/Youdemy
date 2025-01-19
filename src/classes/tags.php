<?php





    class tags{

        private $id_tag;
        private $name;

        public function __construct($id = null,$name = null)
        {
            $this->id_tag = $id;
            $this->name = $name;
        }


        public function tags($getID,$conn){
            
            $this->id_tag = $getID;
            $getTags = $conn->prepare("SELECT * FROM tags_cours INNER JOIN tags ON tags.id_tag = tags_cours.id_tag WHERE id_cours = :getID");
            $getTags->bindParam(":getID",$this->id_tag);
            if($getTags->execute()){
                return $getTags;
            }else{
                return null;
            }
        }

        public function addTags($conn){
            $addTags = $conn->prepare("INSERT INTO tags(name) VALUES(:tag)");
            $addTags->bindParam(":tag",$this->name);
            if ($addTags->execute()) {
                return $conn->lastInsertId();
            } else {
                return false;
            }
        }

        public function addAssocTags($tag,$cours,$conn){
            $this->id_tag = $tag;
            $addAssoc = $conn->prepare("INSERT INTO tags_cours(id_tag,id_cours) VALUES(:tag,:cours)");
            $addAssoc->bindParam(":tag",$this->id_tag);
            $addAssoc->bindParam(":cours",$cours);
            $addAssoc->execute();
        }

        public static function getTags($conn){
            $getTags = $conn->prepare("SELECT * FROM tags");
            if($getTags->execute()){
                return $getTags;
            }else{
                return null;
            }
        }
    }