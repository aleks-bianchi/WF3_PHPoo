<?php

namespace Model;


use App\Cnx;

class Abonne
{
    /**
     * @var int|null
     */
    private $id;

    /**
     * @var string|null
     */
    private $prenom;

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @param int|null $id
     * @return Abonne
     */
    public function setId(?int $id): Abonne
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    /**
     * @param string|null $prenom
     * @return Abonne
     */
    public function setPrenom(?string $prenom): Abonne
    {
        $this->prenom = $prenom;
        return $this;
    }

    /*public static function find(int $id): self {

            $pdo = Cnx::getInstance();

            $query = "SELECT * FROM abonne WHERE id_abonne = :id";
            $stmt = $pdo->prepare($query);
            $stmt->execute([
                ":id" => $id
            ]);

            $recup_abonne = $stmt->fetch();

            $abonne = new self();
            $abonne
                ->setId($recup_abonne["id_abonne"])
                ->setPrenom($recup_abonne["prenom"])
            ;

            return $abonne;
    }*/

    public static function find(int $id): ?self // le fetch peut retourner null si l'id n'existe pas
    {
        $pdo = Cnx::getInstance();

        $query = "SELECT * FROM abonne WHERE id_abonne = " . $id;
        $stmt = $pdo->query($query);
        $data = $stmt->fetch();

        if(!empty($data)) { // le fetch peut retourner null si l'id n'existe pas
            $abonne = new Abonne();
            $abonne
                ->setId($data["id_abonne"])
                ->setPrenom($data["prenom"]);
            return $abonne;
        }
    }

    public static function findEmprunt(int $id): bool
    {
        $find = false;

        $pdo = Cnx::getInstance();

        $query = "SELECT id_abonne FROM abonne, emprunt WHERE id_abonne=" . $id . " AND id_abonne = fk_abonne";
        $stmt = $pdo->query($query);
        if($stmt->rowCount() > 0) {
            $find = true;
        }

        return $find;
    }

    public function delete(){
        if(!empty($this->getId())) {
            $pdo = Cnx::getInstance();
            $query = "DELETE FROM abonne WHERE id_abonne = :id";
            $stmt = $pdo->prepare($query);
            $stmt->execute([
                ":id" => $this->id,
            ]);
        }
    }

    public function save()
    {
        $pdo = Cnx::getInstance();

        if(!empty($this->getId())) {
            $query = "UPDATE abonne SET prenom = :prenom WHERE id_abonne = :id";
            $stmt = $pdo->prepare($query);
            $stmt->execute([
                ":id" => $this->id,
                ":prenom" => $this->prenom
            ]);
        } else {
            $query = "INSERT INTO abonne (prenom) VALUES (:prenom)";
            $stmt = $pdo->prepare($query);
            $stmt->execute([
                ":prenom" => $this->prenom
            ]);
        }
    }

    /**
     * @param array $errors le tableau qui va contenir les erreurs passées par référence
     * @return bool
     */
    public function validate(array &$errors): bool //& fait un passage par référence (alors que par défaut c'est par copie sauf pour les objets), càd que si on modifie le tableau ici il sera aussi modifié dans les autres pages où il est utilisé
    {
        if(empty($this->prenom)) {
            $errors[] = "Le prénom est obligatoire";
        } elseif (mb_strlen($this->prenom) > 20){
            $errors[] = "Le prénom ne doit pas faire plus de 20 caractères";
        }

        return empty($errors);

    }


    /**
     * @return Abonne[]
     */
    public static function findAll()
    {
        $pdo = Cnx::getInstance();
        $requete_abonnes = $pdo->query("SELECT * FROM abonne ORDER BY id_abonne");
        $tableau_abonnes = $requete_abonnes->fetchAll(\PDO::FETCH_ASSOC);
        //$liste_abonnes = [];

        $abonnes=[];

        foreach($tableau_abonnes AS $val) {
                //$liste_abonnes[] = (object)$val;

                //Instanciation d'un objet Abonne
                $abonne = new self(); //self fait référence à la classe abonné, c'est pareil que faire new Abonne

                $abonne
                    ->setId($val["id_abonne"])
                    ->setPrenom($val["prenom"])
                ;

                $abonnes[] = $abonne;

        }

        return $abonnes;

    }

}