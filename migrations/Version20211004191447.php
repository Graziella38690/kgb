<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211004191447 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE Missions DROP FOREIGN KEY FK_34F1D47EF6203804');
        $this->addSql('CREATE TABLE statumission (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(50) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('DROP TABLE statutmission');
        $this->addSql('ALTER TABLE agents CHANGE Nationalite_id Nationalite_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE Cibles CHANGE Nationalite_id Nationalite_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE Contacts CHANGE Nationalite_id Nationalite_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE Missions DROP FOREIGN KEY FK_34F1D47EF6203804');
        $this->addSql('ALTER TABLE Missions CHANGE type_id type_id INT DEFAULT NULL, CHANGE statut_id statut_id INT DEFAULT NULL, CHANGE Specialite_id Specialite_id INT DEFAULT NULL, CHANGE Pays_id Pays_id INT DEFAULT NULL, CHANGE description description VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE Missions ADD CONSTRAINT FK_34F1D47EF6203804 FOREIGN KEY (statut_id) REFERENCES statumission (id)');
        $this->addSql('ALTER TABLE Pays ADD Nationalite_id INT NOT NULL');
        $this->addSql('ALTER TABLE Pays ADD CONSTRAINT FK_349F3CAE1B063272 FOREIGN KEY (Nationalite_id) REFERENCES Nationalite (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_349F3CAE1B063272 ON Pays (Nationalite_id)');
        $this->addSql('ALTER TABLE user CHANGE roles roles JSON NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE Missions DROP FOREIGN KEY FK_34F1D47EF6203804');
        $this->addSql('CREATE TABLE statutmission (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(50) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('DROP TABLE statumission');
        $this->addSql('ALTER TABLE agents CHANGE Nationalite_id Nationalite_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE Cibles CHANGE Nationalite_id Nationalite_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE Contacts CHANGE Nationalite_id Nationalite_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE Missions DROP FOREIGN KEY FK_34F1D47EF6203804');
        $this->addSql('ALTER TABLE Missions CHANGE type_id type_id INT DEFAULT NULL, CHANGE statut_id statut_id INT DEFAULT NULL, CHANGE Specialite_id Specialite_id INT DEFAULT NULL, CHANGE Pays_id Pays_id INT DEFAULT NULL, CHANGE description description VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE Missions ADD CONSTRAINT FK_34F1D47EF6203804 FOREIGN KEY (statut_id) REFERENCES statutmission (id)');
        $this->addSql('ALTER TABLE Pays DROP FOREIGN KEY FK_349F3CAE1B063272');
        $this->addSql('DROP INDEX UNIQ_349F3CAE1B063272 ON Pays');
        $this->addSql('ALTER TABLE Pays DROP Nationalite_id');
        $this->addSql('ALTER TABLE `user` CHANGE roles roles LONGTEXT CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_bin`');
    }
}
