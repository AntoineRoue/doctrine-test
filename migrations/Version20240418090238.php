<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

final class Version20240418090238 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Create tables';
    }

    public function up(Schema $schema): void
    {
        $this->addSql('CREATE TABLE a (id INT AUTO_INCREMENT NOT NULL, b_id INT DEFAULT NULL, field VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_E8B7BE43296BFCB6 (b_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE b (id INT AUTO_INCREMENT NOT NULL, field VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE a ADD CONSTRAINT FK_E8B7BE43296BFCB6 FOREIGN KEY (b_id) REFERENCES b (id)');
    }

    public function down(Schema $schema): void
    {
        $this->addSql('ALTER TABLE a DROP FOREIGN KEY FK_E8B7BE43296BFCB6');
        $this->addSql('DROP TABLE a');
        $this->addSql('DROP TABLE b');
    }

    public function isTransactional(): bool
    {
        return false;
    }
}
