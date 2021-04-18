<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210415154113 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TEMPORARY TABLE __temp__utilisateurs AS SELECT id, identifiant, motdepasse, nom, prenom, anniversaire, isadmin FROM utilisateurs');
        $this->addSql('DROP TABLE utilisateurs');
        $this->addSql('CREATE TABLE utilisateurs (pk INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, nom VARCHAR(30) DEFAULT NULL COLLATE BINARY, prenom VARCHAR(30) DEFAULT NULL COLLATE BINARY, identifiant VARCHAR(30) NOT NULL --sert de login ( doit être unique)
        , motdepasse VARCHAR(64) NOT NULL --mot de passe crypté : il fuat une taille assez grande pour ne pas le tronquer
        , anniversaire DATE DEFAULT NULL, isadmin SMALLINT DEFAULT 0 NOT NULL)');
        $this->addSql('INSERT INTO utilisateurs (pk, identifiant, motdepasse, nom, prenom, anniversaire, isadmin) SELECT id, identifiant, motdepasse, nom, prenom, anniversaire, isadmin FROM __temp__utilisateurs');
        $this->addSql('DROP TABLE __temp__utilisateurs');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_497B315EC90409EC ON utilisateurs (identifiant)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP INDEX UNIQ_497B315EC90409EC');
        $this->addSql('CREATE TEMPORARY TABLE __temp__utilisateurs AS SELECT pk, identifiant, motdepasse, nom, prenom, anniversaire, isadmin FROM utilisateurs');
        $this->addSql('DROP TABLE utilisateurs');
        $this->addSql('CREATE TABLE utilisateurs (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, nom VARCHAR(30) DEFAULT NULL, prenom VARCHAR(30) DEFAULT NULL, identifiant VARCHAR(30) NOT NULL COLLATE BINARY, motdepasse VARCHAR(64) NOT NULL COLLATE BINARY, anniversaire VARCHAR(255) NOT NULL COLLATE BINARY, isadmin BOOLEAN NOT NULL)');
        $this->addSql('INSERT INTO utilisateurs (id, identifiant, motdepasse, nom, prenom, anniversaire, isadmin) SELECT pk, identifiant, motdepasse, nom, prenom, anniversaire, isadmin FROM __temp__utilisateurs');
        $this->addSql('DROP TABLE __temp__utilisateurs');
    }
}
