<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190215090620 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE proposer (id INT AUTO_INCREMENT NOT NULL, catalogues_id INT DEFAULT NULL, formation_id INT DEFAULT NULL, centres_formations_id INT DEFAULT NULL, INDEX IDX_21866C15685E5B99 (catalogues_id), INDEX IDX_21866C155200282E (formation_id), INDEX IDX_21866C15C123F77C (centres_formations_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE catalogues (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, duree INT NOT NULL, tarif DOUBLE PRECISION NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE centres_formations (id INT AUTO_INCREMENT NOT NULL, rs VARCHAR(255) NOT NULL, nom VARCHAR(255) NOT NULL, adresse VARCHAR(255) NOT NULL, cp VARCHAR(255) NOT NULL, tel INT NOT NULL, fax INT NOT NULL, email VARCHAR(255) NOT NULL, tva DOUBLE PRECISION NOT NULL, ape VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE clients (id INT AUTO_INCREMENT NOT NULL, rs VARCHAR(255) NOT NULL, nom VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, entreprise VARCHAR(255) NOT NULL, adresse VARCHAR(255) NOT NULL, cp VARCHAR(255) NOT NULL, tel INT NOT NULL, fax INT NOT NULL, email INT NOT NULL, tva VARCHAR(255) NOT NULL, ape VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE commandes (id INT AUTO_INCREMENT NOT NULL, date_commande DATE NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE composer (id INT AUTO_INCREMENT NOT NULL, id_eleves INT NOT NULL, id_salles INT NOT NULL, id_formateurs INT NOT NULL, id_materiels INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE eleves (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, tel INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE formations (id INT AUTO_INCREMENT NOT NULL, date_deb DATE NOT NULL, nb_participant INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE salles (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, taille INT NOT NULL, equipement INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE proposer ADD CONSTRAINT FK_21866C15685E5B99 FOREIGN KEY (catalogues_id) REFERENCES catalogues (id)');
        $this->addSql('ALTER TABLE proposer ADD CONSTRAINT FK_21866C155200282E FOREIGN KEY (formation_id) REFERENCES formations (id)');
        $this->addSql('ALTER TABLE proposer ADD CONSTRAINT FK_21866C15C123F77C FOREIGN KEY (centres_formations_id) REFERENCES centres_formations (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE proposer DROP FOREIGN KEY FK_21866C15685E5B99');
        $this->addSql('ALTER TABLE proposer DROP FOREIGN KEY FK_21866C15C123F77C');
        $this->addSql('ALTER TABLE proposer DROP FOREIGN KEY FK_21866C155200282E');
        $this->addSql('DROP TABLE proposer');
        $this->addSql('DROP TABLE catalogues');
        $this->addSql('DROP TABLE centres_formations');
        $this->addSql('DROP TABLE clients');
        $this->addSql('DROP TABLE commandes');
        $this->addSql('DROP TABLE composer');
        $this->addSql('DROP TABLE eleves');
        $this->addSql('DROP TABLE formations');
        $this->addSql('DROP TABLE salles');
    }
}
