<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221105063331 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, family_member_id INT DEFAULT NULL, uuid VARCHAR(180) NOT NULL, roles LONGTEXT NOT NULL COMMENT \'(DC2Type:json)\', password VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_8D93D649D17F50A6 (uuid), UNIQUE INDEX UNIQ_8D93D649BC594993 (family_member_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D649BC594993 FOREIGN KEY (family_member_id) REFERENCES family_member (id)');
        $this->addSql('ALTER TABLE activity CHANGE slug slug VARCHAR(255) NOT NULL');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_AC74095A989D9B62 ON activity (slug)');
        $this->addSql('ALTER TABLE child_family_member DROP FOREIGN KEY FK_38A275BBA76ED395');
        $this->addSql('DROP INDEX IDX_38A275BBA76ED395 ON child_family_member');
        $this->addSql('DROP INDEX `primary` ON child_family_member');
        $this->addSql('ALTER TABLE child_family_member DROP FOREIGN KEY FK_38A275BBDD62C21B');
        $this->addSql('ALTER TABLE child_family_member CHANGE user_id family_member_id INT NOT NULL');
        $this->addSql('ALTER TABLE child_family_member ADD CONSTRAINT FK_61058A3EBC594993 FOREIGN KEY (family_member_id) REFERENCES family_member (id) ON DELETE CASCADE');
        $this->addSql('CREATE INDEX IDX_61058A3EBC594993 ON child_family_member (family_member_id)');
        $this->addSql('ALTER TABLE child_family_member ADD PRIMARY KEY (child_id, family_member_id)');
        $this->addSql('DROP INDEX idx_38a275bbdd62c21b ON child_family_member');
        $this->addSql('CREATE INDEX IDX_61058A3EDD62C21B ON child_family_member (child_id)');
        $this->addSql('ALTER TABLE child_family_member ADD CONSTRAINT FK_38A275BBDD62C21B FOREIGN KEY (child_id) REFERENCES child (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE family_member DROP FOREIGN KEY FK_8D93D649F5B7AF75');
        $this->addSql('DROP INDEX idx_8d93d649f5b7af75 ON family_member');
        $this->addSql('CREATE INDEX IDX_B9D4AD6DF5B7AF75 ON family_member (address_id)');
        $this->addSql('ALTER TABLE family_member ADD CONSTRAINT FK_8D93D649F5B7AF75 FOREIGN KEY (address_id) REFERENCES address (id)');
        $this->addSql('ALTER TABLE planned_activity_family_member DROP FOREIGN KEY FK_9E5459BE79A5267F');
        $this->addSql('ALTER TABLE planned_activity_family_member DROP FOREIGN KEY FK_9E5459BEA76ED395');
        $this->addSql('DROP INDEX idx_9e5459be79a5267f ON planned_activity_family_member');
        $this->addSql('CREATE INDEX IDX_4DA0457879A5267F ON planned_activity_family_member (planned_activity_id)');
        $this->addSql('DROP INDEX idx_9e5459bea76ed395 ON planned_activity_family_member');
        $this->addSql('CREATE INDEX IDX_4DA04578BC594993 ON planned_activity_family_member (family_member_id)');
        $this->addSql('ALTER TABLE planned_activity_family_member ADD CONSTRAINT FK_9E5459BE79A5267F FOREIGN KEY (planned_activity_id) REFERENCES planned_activity (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE planned_activity_family_member ADD CONSTRAINT FK_9E5459BEA76ED395 FOREIGN KEY (family_member_id) REFERENCES family_member (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D649BC594993');
        $this->addSql('DROP TABLE user');
        $this->addSql('DROP INDEX UNIQ_AC74095A989D9B62 ON activity');
        $this->addSql('ALTER TABLE activity CHANGE slug slug VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE child_family_member DROP FOREIGN KEY FK_61058A3EBC594993');
        $this->addSql('DROP INDEX IDX_61058A3EBC594993 ON child_family_member');
        $this->addSql('DROP INDEX `PRIMARY` ON child_family_member');
        $this->addSql('ALTER TABLE child_family_member DROP FOREIGN KEY FK_61058A3EDD62C21B');
        $this->addSql('ALTER TABLE child_family_member CHANGE family_member_id user_id INT NOT NULL');
        $this->addSql('ALTER TABLE child_family_member ADD CONSTRAINT FK_38A275BBA76ED395 FOREIGN KEY (user_id) REFERENCES family_member (id) ON DELETE CASCADE');
        $this->addSql('CREATE INDEX IDX_38A275BBA76ED395 ON child_family_member (user_id)');
        $this->addSql('ALTER TABLE child_family_member ADD PRIMARY KEY (child_id, user_id)');
        $this->addSql('DROP INDEX idx_61058a3edd62c21b ON child_family_member');
        $this->addSql('CREATE INDEX IDX_38A275BBDD62C21B ON child_family_member (child_id)');
        $this->addSql('ALTER TABLE child_family_member ADD CONSTRAINT FK_61058A3EDD62C21B FOREIGN KEY (child_id) REFERENCES child (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE family_member DROP FOREIGN KEY FK_B9D4AD6DF5B7AF75');
        $this->addSql('DROP INDEX idx_b9d4ad6df5b7af75 ON family_member');
        $this->addSql('CREATE INDEX IDX_8D93D649F5B7AF75 ON family_member (address_id)');
        $this->addSql('ALTER TABLE family_member ADD CONSTRAINT FK_B9D4AD6DF5B7AF75 FOREIGN KEY (address_id) REFERENCES address (id)');
        $this->addSql('ALTER TABLE planned_activity_family_member DROP FOREIGN KEY FK_4DA0457879A5267F');
        $this->addSql('ALTER TABLE planned_activity_family_member DROP FOREIGN KEY FK_4DA04578BC594993');
        $this->addSql('DROP INDEX idx_4da04578bc594993 ON planned_activity_family_member');
        $this->addSql('CREATE INDEX IDX_9E5459BEA76ED395 ON planned_activity_family_member (family_member_id)');
        $this->addSql('DROP INDEX idx_4da0457879a5267f ON planned_activity_family_member');
        $this->addSql('CREATE INDEX IDX_9E5459BE79A5267F ON planned_activity_family_member (planned_activity_id)');
        $this->addSql('ALTER TABLE planned_activity_family_member ADD CONSTRAINT FK_4DA0457879A5267F FOREIGN KEY (planned_activity_id) REFERENCES planned_activity (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE planned_activity_family_member ADD CONSTRAINT FK_4DA04578BC594993 FOREIGN KEY (family_member_id) REFERENCES family_member (id) ON DELETE CASCADE');
    }
}
