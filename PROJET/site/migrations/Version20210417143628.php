<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210417143628 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP INDEX IDX_5BD40928ACD1671C');
        $this->addSql('CREATE TEMPORARY TABLE __temp__Im2021_Produits AS SELECT id, libelle, prix, quantity FROM Im2021_Produits');
        $this->addSql('DROP TABLE Im2021_Produits');
        $this->addSql('CREATE TABLE Im2021_Produits (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, libelle VARCHAR(64) NOT NULL COLLATE BINARY, prix INTEGER NOT NULL, quantity INTEGER DEFAULT NULL)');
        $this->addSql('INSERT INTO Im2021_Produits (id, libelle, prix, quantity) SELECT id, libelle, prix, quantity FROM __temp__Im2021_Produits');
        $this->addSql('DROP TABLE __temp__Im2021_Produits');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TEMPORARY TABLE __temp__Im2021_Produits AS SELECT id, libelle, prix, quantity FROM Im2021_Produits');
        $this->addSql('DROP TABLE Im2021_Produits');
        $this->addSql('CREATE TABLE Im2021_Produits (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, libelle VARCHAR(64) NOT NULL, prix INTEGER NOT NULL, quantity INTEGER DEFAULT NULL, user_pk INTEGER DEFAULT NULL)');
        $this->addSql('INSERT INTO Im2021_Produits (id, libelle, prix, quantity) SELECT id, libelle, prix, quantity FROM __temp__Im2021_Produits');
        $this->addSql('DROP TABLE __temp__Im2021_Produits');
        $this->addSql('CREATE INDEX IDX_5BD40928ACD1671C ON Im2021_Produits (user_pk)');
    }
}
