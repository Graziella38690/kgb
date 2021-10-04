<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211004185813 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE Agents (id INT AUTO_INCREMENT NOT NULL, Nationalite_id INT DEFAULT NULL, nom VARCHAR(50) NOT NULL, prenom VARCHAR(50) NOT NULL, datedenaissance DATE NOT NULL, codeidentification VARCHAR(15) NOT NULL, INDEX IDX_9596AB6E1B063272 (Nationalite_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE Agents_Specialite (Agents_id INT NOT NULL, Specialite_id INT NOT NULL, INDEX IDX_968C180709770DC (Agents_id), INDEX IDX_968C1802195E0F0 (Specialite_id), PRIMARY KEY(Agents_id, Specialite_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE Cibles (id INT AUTO_INCREMENT NOT NULL, Nationalite_id INT DEFAULT NULL, nom VARCHAR(50) NOT NULL, prenom VARCHAR(50) NOT NULL, datedenaissance DATE NOT NULL, nomdecode VARCHAR(50) NOT NULL, INDEX IDX_AAE47BC31B063272 (Nationalite_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE Contacts (id INT AUTO_INCREMENT NOT NULL, Nationalite_id INT DEFAULT NULL, nom VARCHAR(50) NOT NULL, prenom VARCHAR(50) NOT NULL, datedenaissance DATE NOT NULL, nomdecode VARCHAR(50) NOT NULL, INDEX IDX_334015731B063272 (Nationalite_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE missions (id INT AUTO_INCREMENT NOT NULL, type_id INT DEFAULT NULL, statut_id INT DEFAULT NULL, Specialite_id INT DEFAULT NULL, Pays_id INT DEFAULT NULL, titre VARCHAR(50) NOT NULL, description VARCHAR(255) DEFAULT NULL, codemission VARCHAR(15) NOT NULL, datededebut DATE NOT NULL, datedefin DATE NOT NULL, INDEX IDX_34F1D47EC54C8C93 (type_id), INDEX IDX_34F1D47EF6203804 (statut_id), INDEX IDX_34F1D47E2195E0F0 (Specialite_id), INDEX IDX_34F1D47EA6E44244 (Pays_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE missions_Agents (missions_id INT NOT NULL, Agents_id INT NOT NULL, INDEX IDX_5340AFB917C042CF (missions_id), INDEX IDX_5340AFB9709770DC (Agents_id), PRIMARY KEY(missions_id, Agents_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE missions_Contacts (missions_id INT NOT NULL, Contacts_id INT NOT NULL, INDEX IDX_FA54446417C042CF (missions_id), INDEX IDX_FA544464719FB48E (Contacts_id), PRIMARY KEY(missions_id, Contacts_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE missions_Cibles (missions_id INT NOT NULL, Cibles_id INT NOT NULL, INDEX IDX_6C327F1417C042CF (missions_id), INDEX IDX_6C327F149E046BDF (Cibles_id), PRIMARY KEY(missions_id, Cibles_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE missions_Planques (missions_id INT NOT NULL, Planques_id INT NOT NULL, INDEX IDX_F9E5FE8A17C042CF (missions_id), INDEX IDX_F9E5FE8A70AF8C0F (Planques_id), PRIMARY KEY(missions_id, Planques_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE Nationalite (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(50) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE Pays (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(50) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE Planques (id INT AUTO_INCREMENT NOT NULL, type_id INT NOT NULL, codeidentification VARCHAR(50) NOT NULL, adresse VARCHAR(255) NOT NULL, INDEX IDX_30F1AF9DC54C8C93 (type_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE Specialite (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(50) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE Statumission (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(50) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE Typemission (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(50) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE Typeplanque (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(50) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE `user` (id INT AUTO_INCREMENT NOT NULL, username VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, nom VARCHAR(50) NOT NULL, prenom VARCHAR(50) NOT NULL, datecreation DATE NOT NULL, UNIQUE INDEX UNIQ_8D93D649F85E0677 (username), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE Agents ADD CONSTRAINT FK_9596AB6E1B063272 FOREIGN KEY (Nationalite_id) REFERENCES Nationalite (id)');
        $this->addSql('ALTER TABLE Agents_Specialite ADD CONSTRAINT FK_968C180709770DC FOREIGN KEY (Agents_id) REFERENCES Agents (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE Agents_Specialite ADD CONSTRAINT FK_968C1802195E0F0 FOREIGN KEY (Specialite_id) REFERENCES Specialite (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE Cibles ADD CONSTRAINT FK_AAE47BC31B063272 FOREIGN KEY (Nationalite_id) REFERENCES Nationalite (id)');
        $this->addSql('ALTER TABLE Contacts ADD CONSTRAINT FK_334015731B063272 FOREIGN KEY (Nationalite_id) REFERENCES Nationalite (id)');
        $this->addSql('ALTER TABLE missions ADD CONSTRAINT FK_34F1D47EC54C8C93 FOREIGN KEY (type_id) REFERENCES Typemission (id)');
        $this->addSql('ALTER TABLE missions ADD CONSTRAINT FK_34F1D47EF6203804 FOREIGN KEY (statut_id) REFERENCES Statumission (id)');
        $this->addSql('ALTER TABLE missions ADD CONSTRAINT FK_34F1D47E2195E0F0 FOREIGN KEY (Specialite_id) REFERENCES Specialite (id)');
        $this->addSql('ALTER TABLE missions ADD CONSTRAINT FK_34F1D47EA6E44244 FOREIGN KEY (Pays_id) REFERENCES Pays (id)');
        $this->addSql('ALTER TABLE missions_Agents ADD CONSTRAINT FK_5340AFB917C042CF FOREIGN KEY (missions_id) REFERENCES missions (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE missions_Agents ADD CONSTRAINT FK_5340AFB9709770DC FOREIGN KEY (Agents_id) REFERENCES Agents (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE missions_Contacts ADD CONSTRAINT FK_FA54446417C042CF FOREIGN KEY (missions_id) REFERENCES missions (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE missions_Contacts ADD CONSTRAINT FK_FA544464719FB48E FOREIGN KEY (Contacts_id) REFERENCES Contacts (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE missions_Cibles ADD CONSTRAINT FK_6C327F1417C042CF FOREIGN KEY (missions_id) REFERENCES missions (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE missions_Cibles ADD CONSTRAINT FK_6C327F149E046BDF FOREIGN KEY (Cibles_id) REFERENCES Cibles (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE missions_Planques ADD CONSTRAINT FK_F9E5FE8A17C042CF FOREIGN KEY (missions_id) REFERENCES missions (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE missions_Planques ADD CONSTRAINT FK_F9E5FE8A70AF8C0F FOREIGN KEY (Planques_id) REFERENCES Planques (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE Planques ADD CONSTRAINT FK_30F1AF9DC54C8C93 FOREIGN KEY (type_id) REFERENCES Typeplanque (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE Agents_Specialite DROP FOREIGN KEY FK_968C180709770DC');
        $this->addSql('ALTER TABLE missions_Agents DROP FOREIGN KEY FK_5340AFB9709770DC');
        $this->addSql('ALTER TABLE missions_Cibles DROP FOREIGN KEY FK_6C327F149E046BDF');
        $this->addSql('ALTER TABLE missions_Contacts DROP FOREIGN KEY FK_FA544464719FB48E');
        $this->addSql('ALTER TABLE missions_Agents DROP FOREIGN KEY FK_5340AFB917C042CF');
        $this->addSql('ALTER TABLE missions_Contacts DROP FOREIGN KEY FK_FA54446417C042CF');
        $this->addSql('ALTER TABLE missions_Cibles DROP FOREIGN KEY FK_6C327F1417C042CF');
        $this->addSql('ALTER TABLE missions_Planques DROP FOREIGN KEY FK_F9E5FE8A17C042CF');
        $this->addSql('ALTER TABLE Agents DROP FOREIGN KEY FK_9596AB6E1B063272');
        $this->addSql('ALTER TABLE Cibles DROP FOREIGN KEY FK_AAE47BC31B063272');
        $this->addSql('ALTER TABLE Contacts DROP FOREIGN KEY FK_334015731B063272');
        $this->addSql('ALTER TABLE missions DROP FOREIGN KEY FK_34F1D47EA6E44244');
        $this->addSql('ALTER TABLE missions_Planques DROP FOREIGN KEY FK_F9E5FE8A70AF8C0F');
        $this->addSql('ALTER TABLE Agents_Specialite DROP FOREIGN KEY FK_968C1802195E0F0');
        $this->addSql('ALTER TABLE missions DROP FOREIGN KEY FK_34F1D47E2195E0F0');
        $this->addSql('ALTER TABLE missions DROP FOREIGN KEY FK_34F1D47EF6203804');
        $this->addSql('ALTER TABLE missions DROP FOREIGN KEY FK_34F1D47EC54C8C93');
        $this->addSql('ALTER TABLE Planques DROP FOREIGN KEY FK_30F1AF9DC54C8C93');
        $this->addSql('DROP TABLE Agents');
        $this->addSql('DROP TABLE Agents_Specialite');
        $this->addSql('DROP TABLE Cibles');
        $this->addSql('DROP TABLE Contacts');
        $this->addSql('DROP TABLE missions');
        $this->addSql('DROP TABLE missions_Agents');
        $this->addSql('DROP TABLE missions_Contacts');
        $this->addSql('DROP TABLE missions_Cibles');
        $this->addSql('DROP TABLE missions_Planques');
        $this->addSql('DROP TABLE Nationalite');
        $this->addSql('DROP TABLE Pays');
        $this->addSql('DROP TABLE Planques');
        $this->addSql('DROP TABLE Specialite');
        $this->addSql('DROP TABLE Statumission');
        $this->addSql('DROP TABLE Typemission');
        $this->addSql('DROP TABLE Typeplanque');
        $this->addSql('DROP TABLE `user`');
    }
}
