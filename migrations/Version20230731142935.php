<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230731142935 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE career (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE teacher (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, last_name VARCHAR(255) NOT NULL, dni VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE year (id INT AUTO_INCREMENT NOT NULL, year VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE asignature ADD teacher_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE asignature ADD CONSTRAINT FK_952E12D741807E1D FOREIGN KEY (teacher_id) REFERENCES teacher (id)');
        $this->addSql('CREATE INDEX IDX_952E12D741807E1D ON asignature (teacher_id)');
        $this->addSql('ALTER TABLE student ADD career_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE student ADD CONSTRAINT FK_B723AF33B58CDA09 FOREIGN KEY (career_id) REFERENCES career (id)');
        $this->addSql('CREATE INDEX IDX_B723AF33B58CDA09 ON student (career_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE student DROP FOREIGN KEY FK_B723AF33B58CDA09');
        $this->addSql('ALTER TABLE asignature DROP FOREIGN KEY FK_952E12D741807E1D');
        $this->addSql('DROP TABLE career');
        $this->addSql('DROP TABLE teacher');
        $this->addSql('DROP TABLE year');
        $this->addSql('DROP INDEX IDX_952E12D741807E1D ON asignature');
        $this->addSql('ALTER TABLE asignature DROP teacher_id');
        $this->addSql('DROP INDEX IDX_B723AF33B58CDA09 ON student');
        $this->addSql('ALTER TABLE student DROP career_id');
    }
}
