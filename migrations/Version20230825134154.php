<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230825134154 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE teacher_asignature (teacher_id INT NOT NULL, asignature_id INT NOT NULL, INDEX IDX_1F31B07741807E1D (teacher_id), INDEX IDX_1F31B0774AA59B0C (asignature_id), PRIMARY KEY(teacher_id, asignature_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE teacher_asignature ADD CONSTRAINT FK_1F31B07741807E1D FOREIGN KEY (teacher_id) REFERENCES teacher (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE teacher_asignature ADD CONSTRAINT FK_1F31B0774AA59B0C FOREIGN KEY (asignature_id) REFERENCES asignature (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE teacher_asignature DROP FOREIGN KEY FK_1F31B07741807E1D');
        $this->addSql('ALTER TABLE teacher_asignature DROP FOREIGN KEY FK_1F31B0774AA59B0C');
        $this->addSql('DROP TABLE teacher_asignature');
    }
}
