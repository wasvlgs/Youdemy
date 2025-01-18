







<?php 



    class cours{

        private $id_cours;
        private $titre;
        private $desc;
        private $content;
        private $id_teacher;
        private $id_category;


        public function __construct($id_cour = null,$titre = null,$desc = null,$content = null,$id_teacher = null,$id_category = null)
        {
            $this->id_cours = $id_cour;
            $this->titre = $titre;
            $this->desc = $desc;
            $this->content = $content;
            $this->id_teacher = $id_teacher;
            $this->id_category = $id_category;
        }


        public static function getCours($conn,$offSet = 0,$getCategorie = '',$search = ''){
            if(!empty($search)){
                $getSearch = '%' . $search . '%';
                $getData = $conn->prepare("SELECT * FROM cours INNER JOIN users ON cours.id_user = users.id_user INNER JOIN categorie ON cours.id_categorie = categorie.id_categorie WHERE id_approved = '1' AND (titre LIKE :search OR description LIKE :search) LIMIT 6 offset :offset");
                $getData->bindParam(":search",$getSearch);
            }elseif(!empty($getCategorie)){
                $getData = $conn->prepare("SELECT * FROM cours INNER JOIN users ON cours.id_user = users.id_user INNER JOIN categorie ON cours.id_categorie = categorie.id_categorie WHERE id_approved = '1' AND cours.id_categorie = :categorie LIMIT 6 offset :offset");
                $getData->bindParam(":categorie",$getCategorie,PDO::PARAM_INT);
            }else{
                $getData = $conn->prepare("SELECT * FROM cours INNER JOIN users ON cours.id_user = users.id_user INNER JOIN categorie ON cours.id_categorie = categorie.id_categorie WHERE id_approved = '1' LIMIT 6 offset :offset");
            }
            
            $getData->bindParam(":offset",$offSet,PDO::PARAM_INT);
            
            
            if($getData->execute()){
                return [
                    "data"=> $getData,
                    "pages" => ceil($getData->rowCount()/6),
                ];
            }else{
                return null;
            }
        }

        public function getSingleCour($getID,$conn){
            $this->id_cours = $getID;
            $getCour = $conn->prepare("SELECT * FROM cours INNER JOIN users ON cours.id_user = users.id_user WHERE id_cours = :getID");
            $getCour->bindParam(":getID",$this->id_cours);
            if($getCour->execute() && $getCour->rowCount() === 1){
                return $getCour->fetch(PDO::FETCH_ASSOC);
            }else{
                return null;
            }
        }
        public function mycours($getID,$conn){
            $this->id_cours = $getID;
            $getMyCours = $conn->prepare("SELECT * FROM mycours INNER JOIN cours ON mycours.id_cours = cours.id_cours 
             INNER JOIN categorie ON cours.id_categorie = categorie.id_categorie 
             INNER JOIN users ON users.id_user = cours.id_user
            WHERE mycours.id_user = :getID");
            $getMyCours->bindParam(":getID",$this->id_cours);
            if($getMyCours->execute()){
                return $getMyCours;
            }else{
                return null;
            }
        }
    }








