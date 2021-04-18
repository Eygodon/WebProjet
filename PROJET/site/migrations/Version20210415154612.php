<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210415154612 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE Im2021_Produits (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, user_pk INTEGER DEFAULT NULL, libelle VARCHAR(64) NOT NULL, prix INTEGER NOT NULL, quantity INTEGER NOT NULL)');
        $this->addSql('CREATE INDEX IDX_5BD40928ACD1671C ON Im2021_Produits (user_pk)');
        $this->addSql('CREATE TABLE Im2021_Utilisateurs (pk INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, identifiant VARCHAR(30) NOT NULL --sert de login ( doit être unique)
        , motdepasse VARCHAR(64) NOT NULL --mot de passe crypté : il fuat une taille assez grande pour ne pas le tronquer
        , nom VARCHAR(30) DEFAULT NULL, prenom VARCHAR(30) DEFAULT NULL, anniversaire DATE DEFAULT NULL, isadmin SMALLINT DEFAULT 0 NOT NULL)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_1768BA8DC90409EC ON Im2021_Utilisateurs (identifiant)');
        $this->addSql('DROP TABLE produit');
        $this->addSql('DROP TABLE utilisateurs');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE produit (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, user_pk INTEGER DEFAULT NULL, libelle VARCHAR(64) NOT NULL COLLATE BINARY, prix INTEGER NOT NULL, quantity INTEGER NOT NULL)');
        $this->addSql('CREATE INDEX IDX_29A5EC27ACD1671C ON produit (user_pk)');
        $this->addSql('CREATE TABLE utilisateurs (pk INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, nom VARCHAR(30) DEFAULT NULL COLLATE BINARY, prenom VARCHAR(30) DEFAULT NULL COLLATE BINARY, identifiant VARCHAR(30) NOT NULL COLLATE BINARY --sert de login ( doit être unique)
        , motdepasse VARCHAR(64) NOT NULL COLLATE BINARY --mot de passe crypté : il fuat une taille assez grande pour ne pas le tronquer
        , anniversaire DATE DEFAULT NULL, isadmin SMALLINT DEFAULT 0 NOT NULL)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_497B315EC90409EC ON utilisateurs (identifiant)');
        $this->addSql('DROP TABLE Im2021_Produits');
        $this->addSql('DROP TABLE Im2021_Utilisateurs');
    }
}
