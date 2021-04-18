<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210417214044 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP INDEX IDX_95FB4B4CF347EFB');
        $this->addSql('DROP INDEX IDX_95FB4B4CACD1671C');
        $this->addSql('CREATE TEMPORARY TABLE __temp__Im2021_Panier AS SELECT id, user_pk, produit_id, quantite FROM Im2021_Panier');
        $this->addSql('DROP TABLE Im2021_Panier');
        $this->addSql('CREATE TABLE Im2021_Panier (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, user_pk INTEGER DEFAULT NULL, produit_id INTEGER DEFAULT NULL, quantite INTEGER NOT NULL, CONSTRAINT FK_95FB4B4CACD1671C FOREIGN KEY (user_pk) REFERENCES Im2021_Utilisateurs (pk) NOT DEFERRABLE INITIALLY IMMEDIATE, CONSTRAINT FK_95FB4B4CF347EFB FOREIGN KEY (produit_id) REFERENCES Im2021_Produits (id) NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('INSERT INTO Im2021_Panier (id, user_pk, produit_id, quantite) SELECT id, user_pk, produit_id, quantite FROM __temp__Im2021_Panier');
        $this->addSql('DROP TABLE __temp__Im2021_Panier');
        $this->addSql('CREATE INDEX IDX_95FB4B4CF347EFB ON Im2021_Panier (produit_id)');
        $this->addSql('CREATE INDEX IDX_95FB4B4CACD1671C ON Im2021_Panier (user_pk)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP INDEX IDX_95FB4B4CACD1671C');
        $this->addSql('DROP INDEX IDX_95FB4B4CF347EFB');
        $this->addSql('CREATE TEMPORARY TABLE __temp__Im2021_Panier AS SELECT id, user_pk, produit_id, quantite FROM Im2021_Panier');
        $this->addSql('DROP TABLE Im2021_Panier');
        $this->addSql('CREATE TABLE Im2021_Panier (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, user_pk INTEGER DEFAULT NULL, produit_id INTEGER DEFAULT NULL, quantite INTEGER NOT NULL)');
        $this->addSql('INSERT INTO Im2021_Panier (id, user_pk, produit_id, quantite) SELECT id, user_pk, produit_id, quantite FROM __temp__Im2021_Panier');
        $this->addSql('DROP TABLE __temp__Im2021_Panier');
        $this->addSql('CREATE INDEX IDX_95FB4B4CACD1671C ON Im2021_Panier (user_pk)');
        $this->addSql('CREATE INDEX IDX_95FB4B4CF347EFB ON Im2021_Panier (produit_id)');
    }
}
