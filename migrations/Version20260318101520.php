<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20260318101520 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE workers (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) DEFAULT NULL, surname VARCHAR(255) DEFAULT NULL, phone_number VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE workers_services (workers_id INT NOT NULL, services_id INT NOT NULL, INDEX IDX_8A93EA4428A00806 (workers_id), INDEX IDX_8A93EA44AEF5A6C1 (services_id), PRIMARY KEY(workers_id, services_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE workers_services ADD CONSTRAINT FK_8A93EA4428A00806 FOREIGN KEY (workers_id) REFERENCES workers (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE workers_services ADD CONSTRAINT FK_8A93EA44AEF5A6C1 FOREIGN KEY (services_id) REFERENCES services (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE opt_product DROP FOREIGN KEY FK_318DFEEA44F5D008');
        $this->addSql('DROP INDEX IDX_318DFEEA44F5D008 ON opt_product');
        $this->addSql('ALTER TABLE opt_product DROP brand_id');
        $this->addSql('ALTER TABLE product DROP description');
        $this->addSql('ALTER TABLE repair_rate DROP created_at');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE workers_services DROP FOREIGN KEY FK_8A93EA4428A00806');
        $this->addSql('ALTER TABLE workers_services DROP FOREIGN KEY FK_8A93EA44AEF5A6C1');
        $this->addSql('DROP TABLE workers');
        $this->addSql('DROP TABLE workers_services');
        $this->addSql('ALTER TABLE opt_product ADD brand_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE opt_product ADD CONSTRAINT FK_318DFEEA44F5D008 FOREIGN KEY (brand_id) REFERENCES brands (id)');
        $this->addSql('CREATE INDEX IDX_318DFEEA44F5D008 ON opt_product (brand_id)');
        $this->addSql('ALTER TABLE product ADD description LONGTEXT NOT NULL');
        $this->addSql('ALTER TABLE repair_rate ADD created_at DATETIME DEFAULT NULL');
    }
}
