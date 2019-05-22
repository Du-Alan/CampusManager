<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190522092551 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE formation CHANGE lieu lieu VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE formation ADD CONSTRAINT FK_404021BFD3E3D92 FOREIGN KEY (parcours_formation_id) REFERENCES parcours_formation (id)');
        $this->addSql('CREATE INDEX IDX_404021BFD3E3D92 ON formation (parcours_formation_id)');
        $this->addSql('ALTER TABLE inscription_formation ADD formation_id INT NOT NULL, ADD utilisateur_id INT NOT NULL, ADD machine_id INT NOT NULL, DROP formation, DROP utilisateur, DROP machine');
        $this->addSql('ALTER TABLE inscription_formation ADD CONSTRAINT FK_E655E3A75200282E FOREIGN KEY (formation_id) REFERENCES formation (id)');
        $this->addSql('ALTER TABLE inscription_formation ADD CONSTRAINT FK_E655E3A7FB88E14F FOREIGN KEY (utilisateur_id) REFERENCES utilisateur (id)');
        $this->addSql('ALTER TABLE inscription_formation ADD CONSTRAINT FK_E655E3A7F6B75B26 FOREIGN KEY (machine_id) REFERENCES machine (id)');
        $this->addSql('CREATE INDEX IDX_E655E3A75200282E ON inscription_formation (formation_id)');
        $this->addSql('CREATE INDEX IDX_E655E3A7FB88E14F ON inscription_formation (utilisateur_id)');
        $this->addSql('CREATE INDEX IDX_E655E3A7F6B75B26 ON inscription_formation (machine_id)');
        $this->addSql('ALTER TABLE machine CHANGE username username VARCHAR(255) DEFAULT NULL, CHANGE motdepasse motdepasse VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE parcours_formation DROP cours_parcours');
        $this->addSql('ALTER TABLE utilisateur CHANGE roles roles JSON NOT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE formation DROP FOREIGN KEY FK_404021BFD3E3D92');
        $this->addSql('DROP INDEX IDX_404021BFD3E3D92 ON formation');
        $this->addSql('ALTER TABLE formation CHANGE lieu lieu VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci');
        $this->addSql('ALTER TABLE inscription_formation DROP FOREIGN KEY FK_E655E3A75200282E');
        $this->addSql('ALTER TABLE inscription_formation DROP FOREIGN KEY FK_E655E3A7FB88E14F');
        $this->addSql('ALTER TABLE inscription_formation DROP FOREIGN KEY FK_E655E3A7F6B75B26');
        $this->addSql('DROP INDEX IDX_E655E3A75200282E ON inscription_formation');
        $this->addSql('DROP INDEX IDX_E655E3A7FB88E14F ON inscription_formation');
        $this->addSql('DROP INDEX IDX_E655E3A7F6B75B26 ON inscription_formation');
        $this->addSql('ALTER TABLE inscription_formation ADD formation VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, ADD utilisateur VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, ADD machine VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, DROP formation_id, DROP utilisateur_id, DROP machine_id');
        $this->addSql('ALTER TABLE machine CHANGE username username VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci, CHANGE motdepasse motdepasse VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci');
        $this->addSql('ALTER TABLE parcours_formation ADD cours_parcours VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci');
        $this->addSql('ALTER TABLE utilisateur CHANGE roles roles LONGTEXT NOT NULL COLLATE utf8mb4_bin');
    }
}
