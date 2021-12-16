<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211216133628 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE campus (id INT AUTO_INCREMENT NOT NULL, city VARCHAR(255) NOT NULL, is_remote TINYINT(1) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE curriculum (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE curriculum_campus (curriculum_id INT NOT NULL, campus_id INT NOT NULL, INDEX IDX_73FC98F05AEA4428 (curriculum_id), INDEX IDX_73FC98F0AF5D55E1 (campus_id), PRIMARY KEY(curriculum_id, campus_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE instructor (id INT AUTO_INCREMENT NOT NULL, campus_id INT DEFAULT NULL, curriculum_id INT DEFAULT NULL, firstname VARCHAR(255) NOT NULL, lastname VARCHAR(255) NOT NULL, INDEX IDX_31FC43DDAF5D55E1 (campus_id), INDEX IDX_31FC43DD5AEA4428 (curriculum_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE student (id INT AUTO_INCREMENT NOT NULL, campus_id INT DEFAULT NULL, curriculum_id INT DEFAULT NULL, firstname VARCHAR(255) NOT NULL, lastname VARCHAR(255) NOT NULL, INDEX IDX_B723AF33AF5D55E1 (campus_id), INDEX IDX_B723AF335AEA4428 (curriculum_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE curriculum_campus ADD CONSTRAINT FK_73FC98F05AEA4428 FOREIGN KEY (curriculum_id) REFERENCES curriculum (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE curriculum_campus ADD CONSTRAINT FK_73FC98F0AF5D55E1 FOREIGN KEY (campus_id) REFERENCES campus (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE instructor ADD CONSTRAINT FK_31FC43DDAF5D55E1 FOREIGN KEY (campus_id) REFERENCES campus (id)');
        $this->addSql('ALTER TABLE instructor ADD CONSTRAINT FK_31FC43DD5AEA4428 FOREIGN KEY (curriculum_id) REFERENCES curriculum (id)');
        $this->addSql('ALTER TABLE student ADD CONSTRAINT FK_B723AF33AF5D55E1 FOREIGN KEY (campus_id) REFERENCES campus (id)');
        $this->addSql('ALTER TABLE student ADD CONSTRAINT FK_B723AF335AEA4428 FOREIGN KEY (curriculum_id) REFERENCES curriculum (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE curriculum_campus DROP FOREIGN KEY FK_73FC98F0AF5D55E1');
        $this->addSql('ALTER TABLE instructor DROP FOREIGN KEY FK_31FC43DDAF5D55E1');
        $this->addSql('ALTER TABLE student DROP FOREIGN KEY FK_B723AF33AF5D55E1');
        $this->addSql('ALTER TABLE curriculum_campus DROP FOREIGN KEY FK_73FC98F05AEA4428');
        $this->addSql('ALTER TABLE instructor DROP FOREIGN KEY FK_31FC43DD5AEA4428');
        $this->addSql('ALTER TABLE student DROP FOREIGN KEY FK_B723AF335AEA4428');
        $this->addSql('DROP TABLE campus');
        $this->addSql('DROP TABLE curriculum');
        $this->addSql('DROP TABLE curriculum_campus');
        $this->addSql('DROP TABLE instructor');
        $this->addSql('DROP TABLE student');
    }
}
