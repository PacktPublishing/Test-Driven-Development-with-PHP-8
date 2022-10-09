<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221006084149 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE color (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE manufacturer (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE toy_car (id INT AUTO_INCREMENT NOT NULL, manufacturer_id INT DEFAULT NULL, color_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, year INT DEFAULT NULL, INDEX IDX_9339340CA23B42D (manufacturer_id), INDEX IDX_9339340C7ADA1FB5 (color_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE toy_car ADD CONSTRAINT FK_9339340CA23B42D FOREIGN KEY (manufacturer_id) REFERENCES manufacturer (id)');
        $this->addSql('ALTER TABLE toy_car ADD CONSTRAINT FK_9339340C7ADA1FB5 FOREIGN KEY (color_id) REFERENCES color (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE toy_car DROP FOREIGN KEY FK_9339340CA23B42D');
        $this->addSql('ALTER TABLE toy_car DROP FOREIGN KEY FK_9339340C7ADA1FB5');
        $this->addSql('DROP TABLE color');
        $this->addSql('DROP TABLE manufacturer');
        $this->addSql('DROP TABLE toy_car');
    }
}
