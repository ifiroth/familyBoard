CREATE TABLE address (id INT AUTO_INCREMENT NOT NULL, street_number INT DEFAULT NULL, street_name VARCHAR(255) DEFAULT NULL, city VARCHAR(255) NOT NULL, postal_code INT NOT NULL, name VARCHAR(255) DEFAULT NULL, description LONGTEXT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB;
CREATE TABLE address_activity (address_id INT NOT NULL, activity_id INT NOT NULL, INDEX IDX_52FBF7DBF5B7AF75 (address_id), INDEX IDX_52FBF7DB81C06096 (activity_id), PRIMARY KEY(address_id, activity_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB;
CREATE TABLE child (id INT AUTO_INCREMENT NOT NULL, parent_id INT NOT NULL, UNIQUE INDEX UNIQ_22B35429727ACA70 (parent_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB;
CREATE TABLE child_family_member (child_id INT NOT NULL, family_member_id INT NOT NULL, INDEX IDX_61058A3EDD62C21B (child_id), INDEX IDX_61058A3EBC594993 (family_member_id), PRIMARY KEY(child_id, family_member_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB;
CREATE TABLE planned_activity (id INT AUTO_INCREMENT NOT NULL, activity_id INT NOT NULL, day_of_week INT DEFAULT NULL, date DATE DEFAULT NULL, time_start TIME NOT NULL, time_end TIME NOT NULL, comment LONGTEXT DEFAULT NULL, INDEX IDX_8D80D50881C06096 (activity_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB;
CREATE TABLE planned_activity_family_member (planned_activity_id INT NOT NULL, family_member_id INT NOT NULL, INDEX IDX_4DA0457879A5267F (planned_activity_id), INDEX IDX_4DA04578BC594993 (family_member_id), PRIMARY KEY(planned_activity_id, family_member_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB;
CREATE TABLE activity_category (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, slug VARCHAR(255) NOT NULL, color VARCHAR(6) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB;
CREATE TABLE link (id INT AUTO_INCREMENT NOT NULL, parent_id INT DEFAULT NULL, slug VARCHAR(255) NOT NULL, title VARCHAR(255) NOT NULL, sort_order INT DEFAULT NULL, INDEX IDX_36AC99F1727ACA70 (parent_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB;
CREATE TABLE activity (id INT AUTO_INCREMENT NOT NULL, category_id INT NOT NULL, name VARCHAR(255) NOT NULL, description LONGTEXT DEFAULT NULL, slug VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_AC74095A989D9B62 (slug), INDEX IDX_AC74095A12469DE2 (category_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB;
CREATE TABLE family_member (id INT AUTO_INCREMENT NOT NULL, address_id INT NOT NULL, firstname VARCHAR(255) NOT NULL, lastname VARCHAR(255) NOT NULL, birthdate DATE NOT NULL, INDEX IDX_B9D4AD6DF5B7AF75 (address_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB;
CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, family_member_id INT DEFAULT NULL, uuid VARCHAR(180) NOT NULL, roles LONGTEXT NOT NULL COMMENT '(DC2Type:json)', password VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_8D93D649D17F50A6 (uuid), UNIQUE INDEX UNIQ_8D93D649BC594993 (family_member_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB;
CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL, available_at DATETIME NOT NULL, delivered_at DATETIME DEFAULT NULL, INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB;
ALTER TABLE address_activity ADD CONSTRAINT FK_52FBF7DBF5B7AF75 FOREIGN KEY (address_id) REFERENCES address (id) ON DELETE CASCADE;
ALTER TABLE address_activity ADD CONSTRAINT FK_52FBF7DB81C06096 FOREIGN KEY (activity_id) REFERENCES activity (id) ON DELETE CASCADE;
ALTER TABLE child ADD CONSTRAINT FK_22B35429727ACA70 FOREIGN KEY (parent_id) REFERENCES family_member (id);
ALTER TABLE child_family_member ADD CONSTRAINT FK_61058A3EDD62C21B FOREIGN KEY (child_id) REFERENCES child (id) ON DELETE CASCADE;
ALTER TABLE child_family_member ADD CONSTRAINT FK_61058A3EBC594993 FOREIGN KEY (family_member_id) REFERENCES family_member (id) ON DELETE CASCADE;
ALTER TABLE planned_activity ADD CONSTRAINT FK_8D80D50881C06096 FOREIGN KEY (activity_id) REFERENCES activity (id);
ALTER TABLE planned_activity_family_member ADD CONSTRAINT FK_4DA0457879A5267F FOREIGN KEY (planned_activity_id) REFERENCES planned_activity (id) ON DELETE CASCADE;
ALTER TABLE planned_activity_family_member ADD CONSTRAINT FK_4DA04578BC594993 FOREIGN KEY (family_member_id) REFERENCES family_member (id) ON DELETE CASCADE;
ALTER TABLE link ADD CONSTRAINT FK_36AC99F1727ACA70 FOREIGN KEY (parent_id) REFERENCES link (id);
ALTER TABLE activity ADD CONSTRAINT FK_AC74095A12469DE2 FOREIGN KEY (category_id) REFERENCES activity_category (id);
ALTER TABLE family_member ADD CONSTRAINT FK_B9D4AD6DF5B7AF75 FOREIGN KEY (address_id) REFERENCES address (id);
ALTER TABLE user ADD CONSTRAINT FK_8D93D649BC594993 FOREIGN KEY (family_member_id) REFERENCES family_member (id);
