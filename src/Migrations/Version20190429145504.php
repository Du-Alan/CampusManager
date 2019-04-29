<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190429145504 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('
CREATE TABLE cours (id_cours INT AUTO_INCREMENT NOT NULL, nom VARCHAR(100) NOT NULL, duree TIME NOT NULL, avec_ecf TINYINT(1) NOT NULL, ref VARCHAR(50) NOT NULL, PRIMARY KEY(id_cours)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE cours_planifie (id_cours_planifie INT AUTO_INCREMENT NOT NULL, id_cours INT NOT NULL, id_formation INT NOT NULL, date_debut DATETIME NOT NULL, PRIMARY KEY(id_cours_planifie)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE detail_parcours_formation (id_parcours_formation INT NOT NULL, id_cours INT NOT NULL, ordre INT NOT NULL) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE formation (id_formation INT AUTO_INCREMENT NOT NULL, id_parcours_formation INT NOT NULL, date_debut DATETIME NOT NULL, PRIMARY KEY(id_formation)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE inscription_cours (id_cours_planifie INT NOT NULL, id_utilisateur INT NOT NULL, id_machine INT NOT NULL) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE machine (id_machine INT AUTO_INCREMENT NOT NULL, nom VARCHAR(25) NOT NULL, username VARCHAR(50) NOT NULL, passerelle VARCHAR(100) NOT NULL, PRIMARY KEY(id_machine)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE parcours_formation (id_parcours_formation INT AUTO_INCREMENT NOT NULL, libelle VARCHAR(100) NOT NULL, PRIMARY KEY(id_parcours_formation)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE utilisateur CHANGE roles roles JSON NOT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE cours');
        $this->addSql('DROP TABLE cours_planifie');
        $this->addSql('DROP TABLE detail_parcours_formation');
        $this->addSql('DROP TABLE formation');
        $this->addSql('DROP TABLE inscription_cours');
        $this->addSql('DROP TABLE machine');
        $this->addSql('DROP TABLE parcours_formation');
        $this->addSql('ALTER TABLE utilisateur CHANGE roles roles LONGTEXT NOT NULL COLLATE utf8mb4_bin');
    }
}
