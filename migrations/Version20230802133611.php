<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230802133611 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE asignature DROP FOREIGN KEY FK_952E12D7CB944F1A');
        $this->addSql('DROP INDEX IDX_952E12D7CB944F1A ON asignature');
        $this->addSql('ALTER TABLE asignature DROP student_id');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE asignature ADD student_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE asignature ADD CONSTRAINT FK_952E12D7CB944F1A FOREIGN KEY (student_id) REFERENCES student (id)');
        $this->addSql('CREATE INDEX IDX_952E12D7CB944F1A ON asignature (student_id)');
    }
}
