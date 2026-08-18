<?php

class Personne
{
    private PDO $connection;
    private string $table = "personnes";

    public function __construct(PDO $connection)
    {
        $this->connection = $connection;
    }

    public function ajouter(
        string $nom,
        string $prenom,
        string $photo
    ): bool {
        $sql = "INSERT INTO {$this->table} (nom, prenom, photo)
                VALUES (:nom, :prenom, :photo)";

        $stmt = $this->connection->prepare($sql);

        $stmt->bindParam(":nom", $nom);
        $stmt->bindParam(":prenom", $prenom);
        $stmt->bindParam(":photo", $photo, PDO::PARAM_LOB);

        return $stmt->execute();
    }

    public function lister(): array
    {
        $sql = "SELECT id, nom, prenom, photo
                FROM {$this->table}
                ORDER BY id DESC";

        $stmt = $this->connection->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll();
    }
}

