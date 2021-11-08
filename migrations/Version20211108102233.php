<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211108102233 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE agents CHANGE nationalite_id nationalite_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE cibles CHANGE nationalite_id nationalite_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE contacts CHANGE nationalite_id nationalite_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE missions CHANGE type_id type_id INT DEFAULT NULL, CHANGE statut_id statut_id INT DEFAULT NULL, CHANGE specialite_id specialite_id INT DEFAULT NULL, CHANGE pays_id pays_id INT DEFAULT NULL, CHANGE description description VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE planques ADD pays_id INT NOT NULL');
        $this->addSql('ALTER TABLE planques ADD CONSTRAINT FK_30F1AF9DA6E44244 FOREIGN KEY (pays_id) REFERENCES pays (id)');
        $this->addSql('CREATE INDEX IDX_30F1AF9DA6E44244 ON planques (pays_id)');
        $this->addSql('ALTER TABLE user CHANGE roles roles JSON NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE agents CHANGE nationalite_id nationalite_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE cibles CHANGE nationalite_id nationalite_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE contacts CHANGE nationalite_id nationalite_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE missions CHANGE type_id type_id INT DEFAULT NULL, CHANGE statut_id statut_id INT DEFAULT NULL, CHANGE specialite_id specialite_id INT DEFAULT NULL, CHANGE pays_id pays_id INT DEFAULT NULL, CHANGE description description VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE planques DROP FOREIGN KEY FK_30F1AF9DA6E44244');
        $this->addSql('DROP INDEX IDX_30F1AF9DA6E44244 ON planques');
        $this->addSql('ALTER TABLE planques DROP pays_id');
        $this->addSql('ALTER TABLE `user` CHANGE roles roles LONGTEXT CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_bin`');
    }
}
