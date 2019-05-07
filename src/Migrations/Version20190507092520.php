<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190507092520 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE cours (id INT AUTO_INCREMENT NOT NULL, utilisateur_id INT DEFAULT NULL, nom VARCHAR(255) NOT NULL, date_debut DATETIME NOT NULL, date_fin DATETIME NOT NULL, avec_ecf TINYINT(1) NOT NULL, ref VARCHAR(255) NOT NULL, INDEX IDX_FDCA8C9CFB88E14F (utilisateur_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE cours_parcours (id INT AUTO_INCREMENT NOT NULL, parcours_formation_id INT DEFAULT NULL, cours_id INT DEFAULT NULL, ordre INT NOT NULL, INDEX IDX_5E25703ED3E3D92 (parcours_formation_id), INDEX IDX_5E25703E7ECF78B0 (cours_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE cours_planifie (id INT AUTO_INCREMENT NOT NULL, cours_id INT DEFAULT NULL, date_debut DATETIME NOT NULL, duree TIME NOT NULL, INDEX IDX_24C999447ECF78B0 (cours_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE formation (id INT AUTO_INCREMENT NOT NULL, parcours_formation_id INT DEFAULT NULL, date_debut DATETIME NOT NULL, lieu VARCHAR(255) DEFAULT NULL, description LONGTEXT DEFAULT NULL, INDEX IDX_404021BFD3E3D92 (parcours_formation_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE inscription_formation (id INT AUTO_INCREMENT NOT NULL, formation_id INT DEFAULT NULL, utilisateur_id INT DEFAULT NULL, machine_id INT DEFAULT NULL, INDEX IDX_E655E3A75200282E (formation_id), INDEX IDX_E655E3A7FB88E14F (utilisateur_id), INDEX IDX_E655E3A7F6B75B26 (machine_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE machine (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, username VARCHAR(255) DEFAULT NULL, motdepasse VARCHAR(255) DEFAULT NULL, passerelle VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE parcours_formation (id INT AUTO_INCREMENT NOT NULL, libelle VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE utilisateur (id INT AUTO_INCREMENT NOT NULL, username VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, nom VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, civilite TINYINT(1) NOT NULL, UNIQUE INDEX UNIQ_1D1C63B3F85E0677 (username), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE cours ADD CONSTRAINT FK_FDCA8C9CFB88E14F FOREIGN KEY (utilisateur_id) REFERENCES utilisateur (id)');
        $this->addSql('ALTER TABLE cours_parcours ADD CONSTRAINT FK_5E25703ED3E3D92 FOREIGN KEY (parcours_formation_id) REFERENCES parcours_formation (id)');
        $this->addSql('ALTER TABLE cours_parcours ADD CONSTRAINT FK_5E25703E7ECF78B0 FOREIGN KEY (cours_id) REFERENCES cours (id)');
        $this->addSql('ALTER TABLE cours_planifie ADD CONSTRAINT FK_24C999447ECF78B0 FOREIGN KEY (cours_id) REFERENCES cours (id)');
        $this->addSql('ALTER TABLE formation ADD CONSTRAINT FK_404021BFD3E3D92 FOREIGN KEY (parcours_formation_id) REFERENCES parcours_formation (id)');
        $this->addSql('ALTER TABLE inscription_formation ADD CONSTRAINT FK_E655E3A75200282E FOREIGN KEY (formation_id) REFERENCES formation (id)');
        $this->addSql('ALTER TABLE inscription_formation ADD CONSTRAINT FK_E655E3A7FB88E14F FOREIGN KEY (utilisateur_id) REFERENCES utilisateur (id)');
        $this->addSql('ALTER TABLE inscription_formation ADD CONSTRAINT FK_E655E3A7F6B75B26 FOREIGN KEY (machine_id) REFERENCES machine (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE cours_parcours DROP FOREIGN KEY FK_5E25703E7ECF78B0');
        $this->addSql('ALTER TABLE cours_planifie DROP FOREIGN KEY FK_24C999447ECF78B0');
        $this->addSql('ALTER TABLE inscription_formation DROP FOREIGN KEY FK_E655E3A75200282E');
        $this->addSql('ALTER TABLE inscription_formation DROP FOREIGN KEY FK_E655E3A7F6B75B26');
        $this->addSql('ALTER TABLE cours_parcours DROP FOREIGN KEY FK_5E25703ED3E3D92');
        $this->addSql('ALTER TABLE formation DROP FOREIGN KEY FK_404021BFD3E3D92');
        $this->addSql('ALTER TABLE cours DROP FOREIGN KEY FK_FDCA8C9CFB88E14F');
        $this->addSql('ALTER TABLE inscription_formation DROP FOREIGN KEY FK_E655E3A7FB88E14F');
        $this->addSql('DROP TABLE cours');
        $this->addSql('DROP TABLE cours_parcours');
        $this->addSql('DROP TABLE cours_planifie');
        $this->addSql('DROP TABLE formation');
        $this->addSql('DROP TABLE inscription_formation');
        $this->addSql('DROP TABLE machine');
        $this->addSql('DROP TABLE parcours_formation');
        $this->addSql('DROP TABLE utilisateur');
    }
}
