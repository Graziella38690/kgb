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
        $this->addSql('ALTER TABLE missions DROP FOREIGN KEY FK_34F1D47EF6203804');
        $this->addSql('CREATE TABLE statumission (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(50) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('DROP TABLE statutmission');
        $this->addSql('ALTER TABLE agents CHANGE nationalite_id nationalite_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE cibles CHANGE nationalite_id nationalite_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE contacts CHANGE nationalite_id nationalite_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE missions DROP FOREIGN KEY FK_34F1D47EF6203804');
        $this->addSql('ALTER TABLE missions CHANGE type_id type_id INT DEFAULT NULL, CHANGE statut_id statut_id INT DEFAULT NULL, CHANGE specialite_id specialite_id INT DEFAULT NULL, CHANGE pays_id pays_id INT DEFAULT NULL, CHANGE description description VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE missions ADD CONSTRAINT FK_34F1D47EF6203804 FOREIGN KEY (statut_id) REFERENCES statumission (id)');
        $this->addSql('ALTER TABLE pays ADD nationalite_id INT NOT NULL');
        $this->addSql('ALTER TABLE pays ADD CONSTRAINT FK_349F3CAE1B063272 FOREIGN KEY (nationalite_id) REFERENCES nationalite (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_349F3CAE1B063272 ON pays (nationalite_id)');
        $this->addSql('ALTER TABLE user CHANGE roles roles JSON NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE missions DROP FOREIGN KEY FK_34F1D47EF6203804');
        $this->addSql('CREATE TABLE statutmission (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(50) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('DROP TABLE statumission');
        $this->addSql('ALTER TABLE agents CHANGE nationalite_id nationalite_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE cibles CHANGE nationalite_id nationalite_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE contacts CHANGE nationalite_id nationalite_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE missions DROP FOREIGN KEY FK_34F1D47EF6203804');
        $this->addSql('ALTER TABLE missions CHANGE type_id type_id INT DEFAULT NULL, CHANGE statut_id statut_id INT DEFAULT NULL, CHANGE specialite_id specialite_id INT DEFAULT NULL, CHANGE pays_id pays_id INT DEFAULT NULL, CHANGE description description VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE missions ADD CONSTRAINT FK_34F1D47EF6203804 FOREIGN KEY (statut_id) REFERENCES statutmission (id)');
        $this->addSql('ALTER TABLE pays DROP FOREIGN KEY FK_349F3CAE1B063272');
        $this->addSql('DROP INDEX UNIQ_349F3CAE1B063272 ON pays');
        $this->addSql('ALTER TABLE pays DROP nationalite_id');
        $this->addSql('ALTER TABLE `user` CHANGE roles roles LONGTEXT CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_bin`');
    }
}
