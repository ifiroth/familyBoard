<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221009034558 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE activity DROP FOREIGN KEY FK_AC74095A79A5267F');
        $this->addSql('DROP INDEX IDX_AC74095A79A5267F ON activity');
        $this->addSql('ALTER TABLE activity DROP planned_activity_id');
        $this->addSql('ALTER TABLE planned_activity ADD activity_id INT NOT NULL');
        $this->addSql('ALTER TABLE planned_activity ADD CONSTRAINT FK_8D80D50881C06096 FOREIGN KEY (activity_id) REFERENCES activity (id)');
        $this->addSql('CREATE INDEX IDX_8D80D50881C06096 ON planned_activity (activity_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE activity ADD planned_activity_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE activity ADD CONSTRAINT FK_AC74095A79A5267F FOREIGN KEY (planned_activity_id) REFERENCES planned_activity (id)');
        $this->addSql('CREATE INDEX IDX_AC74095A79A5267F ON activity (planned_activity_id)');
        $this->addSql('ALTER TABLE planned_activity DROP FOREIGN KEY FK_8D80D50881C06096');
        $this->addSql('DROP INDEX IDX_8D80D50881C06096 ON planned_activity');
        $this->addSql('ALTER TABLE planned_activity DROP activity_id');
    }
}
