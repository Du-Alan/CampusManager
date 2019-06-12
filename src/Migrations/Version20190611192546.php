<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190611192546 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE cours CHANGE duree duree TIME NOT NULL');
        $this->addSql('ALTER TABLE formation CHANGE parcours_formation_id parcours_formation_id INT NOT NULL, CHANGE lieu lieu VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE inscription_formation CHANGE formation_id formation_id INT NOT NULL, CHANGE utilisateur_id utilisateur_id INT NOT NULL, CHANGE machine_id machine_id INT NOT NULL');
        $this->addSql('ALTER TABLE machine CHANGE username username VARCHAR(255) DEFAULT NULL, CHANGE motdepasse motdepasse VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE utilisateur CHANGE roles roles JSON NOT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE cours CHANGE duree duree DATETIME NOT NULL');
        $this->addSql('ALTER TABLE formation CHANGE parcours_formation_id parcours_formation_id INT DEFAULT NULL, CHANGE lieu lieu VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci');
        $this->addSql('ALTER TABLE inscription_formation CHANGE formation_id formation_id INT DEFAULT NULL, CHANGE utilisateur_id utilisateur_id INT DEFAULT NULL, CHANGE machine_id machine_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE machine CHANGE username username VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci, CHANGE motdepasse motdepasse VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci');
        $this->addSql('ALTER TABLE utilisateur CHANGE roles roles LONGTEXT NOT NULL COLLATE utf8mb4_bin');
    }
}
