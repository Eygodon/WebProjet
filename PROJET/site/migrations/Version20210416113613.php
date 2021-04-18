<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210416113613 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP INDEX IDX_5BD40928ACD1671C');
        $this->addSql('CREATE TEMPORARY TABLE __temp__Im2021_Produits AS SELECT id, user_pk, libelle, prix, quantity FROM Im2021_Produits');
        $this->addSql('DROP TABLE Im2021_Produits');
        $this->addSql('CREATE TABLE Im2021_Produits (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, user_pk INTEGER DEFAULT NULL, libelle VARCHAR(64) NOT NULL COLLATE BINARY, prix INTEGER NOT NULL, quantity INTEGER NOT NULL, CONSTRAINT FK_5BD40928ACD1671C FOREIGN KEY (user_pk) REFERENCES Im2021_Utilisateurs (pk) NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('INSERT INTO Im2021_Produits (id, user_pk, libelle, prix, quantity) SELECT id, user_pk, libelle, prix, quantity FROM __temp__Im2021_Produits');
        $this->addSql('DROP TABLE __temp__Im2021_Produits');
        $this->addSql('CREATE INDEX IDX_5BD40928ACD1671C ON Im2021_Produits (user_pk)');
        $this->addSql('DROP INDEX UNIQ_1768BA8DC90409EC');
        $this->addSql('CREATE TEMPORARY TABLE __temp__Im2021_Utilisateurs AS SELECT pk, identifiant, motdepasse, nom, prenom, anniversaire, isadmin FROM Im2021_Utilisateurs');
        $this->addSql('DROP TABLE Im2021_Utilisateurs');
        $this->addSql('CREATE TABLE Im2021_Utilisateurs (pk INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, identifiant VARCHAR(30) NOT NULL COLLATE BINARY --sert de login ( doit être unique)
        , motdepasse VARCHAR(64) NOT NULL COLLATE BINARY --mot de passe crypté : il fuat une taille assez grande pour ne pas le tronquer
        , nom VARCHAR(30) DEFAULT NULL COLLATE BINARY, prenom VARCHAR(30) DEFAULT NULL COLLATE BINARY, isadmin INTEGER DEFAULT 0 NOT NULL, anniversaire DATE DEFAULT NULL)');
        $this->addSql('INSERT INTO Im2021_Utilisateurs (pk, identifiant, motdepasse, nom, prenom, anniversaire, isadmin) SELECT pk, identifiant, motdepasse, nom, prenom, anniversaire, isadmin FROM __temp__Im2021_Utilisateurs');
        $this->addSql('DROP TABLE __temp__Im2021_Utilisateurs');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_1768BA8DC90409EC ON Im2021_Utilisateurs (identifiant)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP INDEX IDX_5BD40928ACD1671C');
        $this->addSql('CREATE TEMPORARY TABLE __temp__Im2021_Produits AS SELECT id, user_pk, libelle, prix, quantity FROM Im2021_Produits');
        $this->addSql('DROP TABLE Im2021_Produits');
        $this->addSql('CREATE TABLE Im2021_Produits (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, user_pk INTEGER DEFAULT NULL, libelle VARCHAR(64) NOT NULL, prix INTEGER NOT NULL, quantity INTEGER NOT NULL)');
        $this->addSql('INSERT INTO Im2021_Produits (id, user_pk, libelle, prix, quantity) SELECT id, user_pk, libelle, prix, quantity FROM __temp__Im2021_Produits');
        $this->addSql('DROP TABLE __temp__Im2021_Produits');
        $this->addSql('CREATE INDEX IDX_5BD40928ACD1671C ON Im2021_Produits (user_pk)');
        $this->addSql('DROP INDEX UNIQ_1768BA8DC90409EC');
        $this->addSql('CREATE TEMPORARY TABLE __temp__Im2021_Utilisateurs AS SELECT pk, identifiant, motdepasse, nom, prenom, anniversaire, isadmin FROM Im2021_Utilisateurs');
        $this->addSql('DROP TABLE Im2021_Utilisateurs');
        $this->addSql('CREATE TABLE Im2021_Utilisateurs (pk INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, identifiant VARCHAR(30) NOT NULL --sert de login ( doit être unique)
        , motdepasse VARCHAR(64) NOT NULL --mot de passe crypté : il fuat une taille assez grande pour ne pas le tronquer
        , nom VARCHAR(30) DEFAULT NULL, prenom VARCHAR(30) DEFAULT NULL, isadmin INTEGER DEFAULT 0 NOT NULL, anniversaire DATETIME DEFAULT NULL)');
        $this->addSql('INSERT INTO Im2021_Utilisateurs (pk, identifiant, motdepasse, nom, prenom, anniversaire, isadmin) SELECT pk, identifiant, motdepasse, nom, prenom, anniversaire, isadmin FROM __temp__Im2021_Utilisateurs');
        $this->addSql('DROP TABLE __temp__Im2021_Utilisateurs');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_1768BA8DC90409EC ON Im2021_Utilisateurs (identifiant)');
    }
}
