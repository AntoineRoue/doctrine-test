<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

final class Version20240418090239 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Insert one A and one B';
    }

    public function up(Schema $schema): void
    {
        $this->addSql("INSERT INTO b (field) VALUES ('b-1'), ('b-2')");
        $this->addSql("INSERT INTO a (field, b_id) VALUES ('a-1', 1), ('a-2', 2)");
    }

    public function down(Schema $schema): void
    {
    }
}
