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
    }