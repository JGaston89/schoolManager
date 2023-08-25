<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230823143337 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE asignature (id INT AUTO_INCREMENT NOT NULL, career_id INT DEFAULT NULL, year_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, INDEX IDX_952E12D7B58CDA09 (career_id), INDEX IDX_952E12D740C1FEA7 (year_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE career (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE student (id INT AUTO_INCREMENT NOT NULL, career_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, last_name VARCHAR(255) NOT NULL, dni INT NOT NULL, INDEX IDX_B723AF33B58CDA09 (career_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE teacher (id INT AUTO_INCREMENT NOT NULL, asignature_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, last_name VARCHAR(255) NOT NULL, dni VARCHAR(255) NOT NULL, INDEX IDX_B0F6A6D54AA59B0C (asignature_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE year (id INT AUTO_INCREMENT NOT NULL, year VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', available_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', delivered_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE asignature ADD CONSTRAINT FK_952E12D7B58CDA09 FOREIGN KEY (career_id) REFERENCES career (id)');
        $this->addSql('ALTER TABLE asignature ADD CONSTRAINT FK_952E12D740C1FEA7 FOREIGN KEY (year_id) REFERENCES year (id)');
        $this->addSql('ALTER TABLE student ADD CONSTRAINT FK_B723AF33B58CDA09 FOREIGN KEY (career_id) REFERENCES career (id)');
        $this->addSql('ALTER TABLE teacher ADD CONSTRAINT FK_B0F6A6D54AA59B0C FOREIGN KEY (asignature_id) REFERENCES asignature (id)');
        $this->addSql('ALTER TABLE student_asignature ADD CONSTRAINT FK_78F1FF36CB944F1A FOREIGN KEY (student_id) REFERENCES student (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE student_asignature ADD CONSTRAINT FK_78F1FF364AA59B0C FOREIGN KEY (asignature_id) REFERENCES asignature (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE student_asignature DROP FOREIGN KEY FK_78F1FF364AA59B0C');
        $this->addSql('ALTER TABLE student_asignature DROP FOREIGN KEY FK_78F1FF36CB944F1A');
        $this->addSql('ALTER TABLE asignature DROP FOREIGN KEY FK_952E12D7B58CDA09');
        $this->addSql('ALTER TABLE asignature DROP FOREIGN KEY FK_952E12D740C1FEA7');
        $this->addSql('ALTER TABLE student DROP FOREIGN KEY FK_B723AF33B58CDA09');
        $this->addSql('ALTER TABLE teacher DROP FOREIGN KEY FK_B0F6A6D54AA59B0C');
        $this->addSql('DROP TABLE asignature');
        $this->addSql('DROP TABLE career');
        $this->addSql('DROP TABLE student');
        $this->addSql('DROP TABLE teacher');
        $this->addSql('DROP TABLE year');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
