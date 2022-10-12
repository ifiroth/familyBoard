<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221009033353 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE activity (id INT AUTO_INCREMENT NOT NULL, category_id INT NOT NULL, planned_activity_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, description LONGTEXT DEFAULT NULL, INDEX IDX_AC74095A12469DE2 (category_id), INDEX IDX_AC74095A79A5267F (planned_activity_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE activity_category (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, slug VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE address (id INT AUTO_INCREMENT NOT NULL, street_number INT DEFAULT NULL, street_name VARCHAR(255) DEFAULT NULL, city VARCHAR(255) NOT NULL, postal_code INT NOT NULL, name VARCHAR(255) DEFAULT NULL, description LONGTEXT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE address_activity (address_id INT NOT NULL, activity_id INT NOT NULL, INDEX IDX_52FBF7DBF5B7AF75 (address_id), INDEX IDX_52FBF7DB81C06096 (activity_id), PRIMARY KEY(address_id, activity_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE child (id INT AUTO_INCREMENT NOT NULL, parent_id INT NOT NULL, UNIQUE INDEX UNIQ_22B35429727ACA70 (parent_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE child_user (child_id INT NOT NULL, user_id INT NOT NULL, INDEX IDX_38A275BBDD62C21B (child_id), INDEX IDX_38A275BBA76ED395 (user_id), PRIMARY KEY(child_id, user_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE link (id INT AUTO_INCREMENT NOT NULL, parent_id INT DEFAULT NULL, slug VARCHAR(255) NOT NULL, title VARCHAR(255) NOT NULL, INDEX IDX_36AC99F1727ACA70 (parent_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE planned_activity (id INT AUTO_INCREMENT NOT NULL, day_of_week INT DEFAULT NULL, date DATE DEFAULT NULL, time_start TIME NOT NULL, time_end TIME NOT NULL, comment LONGTEXT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE planned_activity_planned_activity (planned_activity_source INT NOT NULL, planned_activity_target INT NOT NULL, INDEX IDX_56A278A67970857F (planned_activity_source), INDEX IDX_56A278A66095D5F0 (planned_activity_target), PRIMARY KEY(planned_activity_source, planned_activity_target)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, address_id INT NOT NULL, firstname VARCHAR(255) NOT NULL, lastname VARCHAR(255) NOT NULL, birthdate DATE NOT NULL, INDEX IDX_8D93D649F5B7AF75 (address_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL, available_at DATETIME NOT NULL, delivered_at DATETIME DEFAULT NULL, INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE activity ADD CONSTRAINT FK_AC74095A12469DE2 FOREIGN KEY (category_id) REFERENCES activity_category (id)');
        $this->addSql('ALTER TABLE activity ADD CONSTRAINT FK_AC74095A79A5267F FOREIGN KEY (planned_activity_id) REFERENCES planned_activity (id)');
        $this->addSql('ALTER TABLE address_activity ADD CONSTRAINT FK_52FBF7DBF5B7AF75 FOREIGN KEY (address_id) REFERENCES address (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE address_activity ADD CONSTRAINT FK_52FBF7DB81C06096 FOREIGN KEY (activity_id) REFERENCES activity (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE child ADD CONSTRAINT FK_22B35429727ACA70 FOREIGN KEY (parent_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE child_user ADD CONSTRAINT FK_38A275BBDD62C21B FOREIGN KEY (child_id) REFERENCES child (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE child_user ADD CONSTRAINT FK_38A275BBA76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE link ADD CONSTRAINT FK_36AC99F1727ACA70 FOREIGN KEY (parent_id) REFERENCES link (id)');
        $this->addSql('ALTER TABLE planned_activity_planned_activity ADD CONSTRAINT FK_56A278A67970857F FOREIGN KEY (planned_activity_source) REFERENCES planned_activity (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE planned_activity_planned_activity ADD CONSTRAINT FK_56A278A66095D5F0 FOREIGN KEY (planned_activity_target) REFERENCES planned_activity (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D649F5B7AF75 FOREIGN KEY (address_id) REFERENCES address (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE activity DROP FOREIGN KEY FK_AC74095A12469DE2');
        $this->addSql('ALTER TABLE activity DROP FOREIGN KEY FK_AC74095A79A5267F');
        $this->addSql('ALTER TABLE address_activity DROP FOREIGN KEY FK_52FBF7DBF5B7AF75');
        $this->addSql('ALTER TABLE address_activity DROP FOREIGN KEY FK_52FBF7DB81C06096');
        $this->addSql('ALTER TABLE child DROP FOREIGN KEY FK_22B35429727ACA70');
        $this->addSql('ALTER TABLE child_user DROP FOREIGN KEY FK_38A275BBDD62C21B');
        $this->addSql('ALTER TABLE child_user DROP FOREIGN KEY FK_38A275BBA76ED395');
        $this->addSql('ALTER TABLE link DROP FOREIGN KEY FK_36AC99F1727ACA70');
        $this->addSql('ALTER TABLE planned_activity_planned_activity DROP FOREIGN KEY FK_56A278A67970857F');
        $this->addSql('ALTER TABLE planned_activity_planned_activity DROP FOREIGN KEY FK_56A278A66095D5F0');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D649F5B7AF75');
        $this->addSql('DROP TABLE activity');
        $this->addSql('DROP TABLE activity_category');
        $this->addSql('DROP TABLE address');
        $this->addSql('DROP TABLE address_activity');
        $this->addSql('DROP TABLE child');
        $this->addSql('DROP TABLE child_user');
        $this->addSql('DROP TABLE link');
        $this->addSql('DROP TABLE planned_activity');
        $this->addSql('DROP TABLE planned_activity_planned_activity');
        $this->addSql('DROP TABLE user');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
