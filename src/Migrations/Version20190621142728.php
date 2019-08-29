<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190621142728 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE rendezvous ADD user_id INT DEFAULT NULL, CHANGE date date DATE NOT NULL');
        $this->addSql('ALTER TABLE rendezvous ADD CONSTRAINT FK_C09A9BA8A76ED395 FOREIGN KEY (user_id) REFERENCES utilisateurs (id)');
        $this->addSql('CREATE INDEX IDX_C09A9BA8A76ED395 ON rendezvous (user_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE rendezvous DROP FOREIGN KEY FK_C09A9BA8A76ED395');
        $this->addSql('DROP INDEX IDX_C09A9BA8A76ED395 ON rendezvous');
        $this->addSql('ALTER TABLE rendezvous DROP user_id, CHANGE date date VARCHAR(10) NOT NULL COLLATE utf8mb4_unicode_ci');
    }
}
