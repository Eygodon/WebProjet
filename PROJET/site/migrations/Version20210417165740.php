<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210417165740 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP INDEX IDX_95FB4B4CACD1671C');
        $this->addSql('CREATE TEMPORARY TABLE __temp__Im2021_Panier AS SELECT id, user_pk, produit, quantite FROM Im2021_Panier');
        $this->addSql('DROP TABLE Im2021_Panier');
        $this->addSql('CREATE TABLE Im2021_Panier (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, user_pk INTEGER DEFAULT NULL, produit INTEGER NOT NULL, quantite INTEGER NOT NULL, CONSTRAINT FK_95FB4B4CACD1671C FOREIGN KEY (user_pk) REFERENCES Im2021_Utilisateurs (pk) NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('INSERT INTO Im2021_Panier (id, user_pk, produit, quantite) SELECT id, user_pk, produit, quantite FROM __temp__Im2021_Panier');
        $this->addSql('DROP TABLE __temp__Im2021_Panier');
        $this->addSql('CREATE INDEX IDX_95FB4B4CACD1671C ON Im2021_Panier (user_pk)');
        $this->addSql('CREATE TEMPORARY TABLE __temp__Im2021_Produits AS SELECT id, libelle, prix, quantity FROM Im2021_Produits');
        $this->addSql('DROP TABLE Im2021_Produits');
        $this->addSql('CREATE TABLE Im2021_Produits (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, libelle VARCHAR(64) NOT NULL COLLATE BINARY, prix INTEGER NOT NULL, quantity INTEGER NOT NULL)');
        $this->addSql('INSERT INTO Im2021_Produits (id, libelle, prix, quantity) SELECT id, libelle, prix, quantity FROM __temp__Im2021_Produits');
        $this->addSql('DROP TABLE __temp__Im2021_Produits');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP INDEX IDX_95FB4B4CACD1671C');
        $this->addSql('CREATE TEMPORARY TABLE __temp__Im2021_Panier AS SELECT id, user_pk, produit, quantite FROM Im2021_Panier');
        $this->addSql('DROP TABLE Im2021_Panier');
        $this->addSql('CREATE TABLE Im2021_Panier (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, user_pk INTEGER DEFAULT NULL, produit INTEGER NOT NULL, quantite INTEGER NOT NULL)');
        $this->addSql('INSERT INTO Im2021_Panier (id, user_pk, produit, quantite) SELECT id, user_pk, produit, quantite FROM __temp__Im2021_Panier');
        $this->addSql('DROP TABLE __temp__Im2021_Panier');
        $this->addSql('CREATE INDEX IDX_95FB4B4CACD1671C ON Im2021_Panier (user_pk)');
        $this->addSql('CREATE TEMPORARY TABLE __temp__Im2021_Produits AS SELECT id, libelle, prix, quantity FROM Im2021_Produits');
        $this->addSql('DROP TABLE Im2021_Produits');
        $this->addSql('CREATE TABLE Im2021_Produits (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, libelle VARCHAR(64) NOT NULL, prix INTEGER NOT NULL, quantity INTEGER DEFAULT NULL)');
        $this->addSql('INSERT INTO Im2021_Produits (id, libelle, prix, quantity) SELECT id, libelle, prix, quantity FROM __temp__Im2021_Produits');
        $this->addSql('DROP TABLE __temp__Im2021_Produits');
    }
}
