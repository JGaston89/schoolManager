<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230808234834 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE student_asignature DROP FOREIGN KEY FK_78F1FF364AA59B0C');
        $this->addSql('ALTER TABLE student_asignature DROP FOREIGN KEY FK_78F1FF36CB944F1A');
        $this->addSql('DROP TABLE student_asignature');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE student_asignature (student_id INT NOT NULL, asignature_id INT NOT NULL, INDEX IDX_78F1FF36CB944F1A (student_id), INDEX IDX_78F1FF364AA59B0C (asignature_id), PRIMARY KEY(student_id, asignature_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE student_asignature ADD CONSTRAINT FK_78F1FF364AA59B0C FOREIGN KEY (asignature_id) REFERENCES asignature (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE student_asignature ADD CONSTRAINT FK_78F1FF36CB944F1A FOREIGN KEY (student_id) REFERENCES student (id) ON DELETE CASCADE');
    }
}
