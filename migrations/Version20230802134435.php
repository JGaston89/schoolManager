<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230802134435 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE asignature ADD career_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE asignature ADD CONSTRAINT FK_952E12D7B58CDA09 FOREIGN KEY (career_id) REFERENCES career (id)');
        $this->addSql('CREATE INDEX IDX_952E12D7B58CDA09 ON asignature (career_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE asignature DROP FOREIGN KEY FK_952E12D7B58CDA09');
        $this->addSql('DROP INDEX IDX_952E12D7B58CDA09 ON asignature');
        $this->addSql('ALTER TABLE asignature DROP career_id');
    }
}
