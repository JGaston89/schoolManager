<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230802132020 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE teacher ADD asignature_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE teacher ADD CONSTRAINT FK_B0F6A6D54AA59B0C FOREIGN KEY (asignature_id) REFERENCES asignature (id)');
        $this->addSql('CREATE INDEX IDX_B0F6A6D54AA59B0C ON teacher (asignature_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE teacher DROP FOREIGN KEY FK_B0F6A6D54AA59B0C');
        $this->addSql('DROP INDEX IDX_B0F6A6D54AA59B0C ON teacher');
        $this->addSql('ALTER TABLE teacher DROP asignature_id');
    }
}
