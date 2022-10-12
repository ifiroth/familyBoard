<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221009033721 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE planned_activity_user (planned_activity_id INT NOT NULL, user_id INT NOT NULL, INDEX IDX_9E5459BE79A5267F (planned_activity_id), INDEX IDX_9E5459BEA76ED395 (user_id), PRIMARY KEY(planned_activity_id, user_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE planned_activity_user ADD CONSTRAINT FK_9E5459BE79A5267F FOREIGN KEY (planned_activity_id) REFERENCES planned_activity (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE planned_activity_user ADD CONSTRAINT FK_9E5459BEA76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE planned_activity_planned_activity DROP FOREIGN KEY FK_56A278A66095D5F0');
        $this->addSql('ALTER TABLE planned_activity_planned_activity DROP FOREIGN KEY FK_56A278A67970857F');
        $this->addSql('DROP TABLE planned_activity_planned_activity');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE planned_activity_planned_activity (planned_activity_source INT NOT NULL, planned_activity_target INT NOT NULL, INDEX IDX_56A278A67970857F (planned_activity_source), INDEX IDX_56A278A66095D5F0 (planned_activity_target), PRIMARY KEY(planned_activity_source, planned_activity_target)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE planned_activity_planned_activity ADD CONSTRAINT FK_56A278A66095D5F0 FOREIGN KEY (planned_activity_target) REFERENCES planned_activity (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE planned_activity_planned_activity ADD CONSTRAINT FK_56A278A67970857F FOREIGN KEY (planned_activity_source) REFERENCES planned_activity (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE planned_activity_user DROP FOREIGN KEY FK_9E5459BE79A5267F');
        $this->addSql('ALTER TABLE planned_activity_user DROP FOREIGN KEY FK_9E5459BEA76ED395');
        $this->addSql('DROP TABLE planned_activity_user');
    }
}
