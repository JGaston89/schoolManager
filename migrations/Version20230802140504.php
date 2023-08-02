<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230802140504 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE asignature DROP FOREIGN KEY FK_952E12D740C1FEA7');
        $this->addSql('DROP INDEX UNIQ_952E12D740C1FEA7 ON asignature');
        $this->addSql('ALTER TABLE asignature DROP year_id');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE asignature ADD year_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE asignature ADD CONSTRAINT FK_952E12D740C1FEA7 FOREIGN KEY (year_id) REFERENCES year (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_952E12D740C1FEA7 ON asignature (year_id)');
    }
}
