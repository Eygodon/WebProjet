<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210416103150 extends AbstractMigration
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
    }
}
