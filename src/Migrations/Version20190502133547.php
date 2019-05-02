<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190502133547 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE cours MODIFY id INT NOT NULL');
        $this->addSql('ALTER TABLE cours DROP PRIMARY KEY');
        $this->addSql('ALTER TABLE cours DROP id, CHANGE id_cours id_cours INT AUTO_INCREMENT NOT NULL');
        $this->addSql('ALTER TABLE cours ADD PRIMARY KEY (id_cours)');
        $this->addSql('ALTER TABLE cours_planifie MODIFY id INT NOT NULL');
        $this->addSql('ALTER TABLE cours_planifie DROP PRIMARY KEY');
        $this->addSql('ALTER TABLE cours_planifie DROP id, CHANGE id_cours_planifie id_cours_planifie INT AUTO_INCREMENT NOT NULL');
        $this->addSql('ALTER TABLE cours_planifie ADD PRIMARY KEY (id_cours_planifie)');
        $this->addSql('ALTER TABLE detail_parcours_formation MODIFY id INT NOT NULL');
        $this->addSql('ALTER TABLE detail_parcours_formation DROP PRIMARY KEY');
        $this->addSql('ALTER TABLE detail_parcours_formation DROP id');
        $this->addSql('ALTER TABLE detail_parcours_formation ADD PRIMARY KEY (id_parcours_formation, id_cours)');
        $this->addSql('ALTER TABLE formation ADD lieu VARCHAR(50) NOT NULL, ADD description LONGTEXT DEFAULT NULL, CHANGE id_formation id_formation INT AUTO_INCREMENT NOT NULL, ADD PRIMARY KEY (id_formation)');
        $this->addSql('ALTER TABLE inscription_cours ADD PRIMARY KEY (id_cours_planifie, id_utilisateur, id_machine)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE cours MODIFY id_cours INT NOT NULL');
        $this->addSql('ALTER TABLE cours DROP PRIMARY KEY');
        $this->addSql('ALTER TABLE cours ADD id INT AUTO_INCREMENT NOT NULL, CHANGE id_cours id_cours INT NOT NULL');
        $this->addSql('ALTER TABLE cours ADD PRIMARY KEY (id)');
        $this->addSql('ALTER TABLE cours_planifie MODIFY id_cours_planifie INT NOT NULL');
        $this->addSql('ALTER TABLE cours_planifie DROP PRIMARY KEY');
        $this->addSql('ALTER TABLE cours_planifie ADD id INT AUTO_INCREMENT NOT NULL, CHANGE id_cours_planifie id_cours_planifie INT NOT NULL');
        $this->addSql('ALTER TABLE cours_planifie ADD PRIMARY KEY (id)');
        $this->addSql('ALTER TABLE detail_parcours_formation DROP PRIMARY KEY');
        $this->addSql('ALTER TABLE detail_parcours_formation ADD id INT AUTO_INCREMENT NOT NULL');
        $this->addSql('ALTER TABLE detail_parcours_formation ADD PRIMARY KEY (id)');
        $this->addSql('ALTER TABLE formation MODIFY id_formation INT NOT NULL');
        $this->addSql('ALTER TABLE formation DROP PRIMARY KEY');
        $this->addSql('ALTER TABLE formation DROP lieu, DROP description, CHANGE id_formation id_formation INT NOT NULL');
        $this->addSql('ALTER TABLE inscription_cours DROP PRIMARY KEY');
    }
}
