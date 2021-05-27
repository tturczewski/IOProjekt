<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210527090113 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE cennik (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, nazwa_uslugi VARCHAR(150) NOT NULL, cena_m2 DOUBLE PRECISION NOT NULL)');
        $this->addSql('CREATE TABLE terminarz (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, termin_rozpoczecia DATE NOT NULL, termin_zakonczenia DATE NOT NULL, klient VARCHAR(100) DEFAULT NULL)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE cennik');
        $this->addSql('DROP TABLE terminarz');
    }
}
