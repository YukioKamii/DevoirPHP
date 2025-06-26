<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250626025913 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            CREATE TABLE commande (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, user_id INTEGER NOT NULL, date DATETIME NOT NULL --(DC2Type:datetime_immutable)
            , valide BOOLEAN NOT NULL, CONSTRAINT FK_6EEAA67DA76ED395 FOREIGN KEY (user_id) REFERENCES user (id) NOT DEFERRABLE INITIALLY IMMEDIATE)
        SQL);
        $this->addSql(<<<'SQL'
            CREATE INDEX IDX_6EEAA67DA76ED395 ON commande (user_id)
        SQL);
        $this->addSql(<<<'SQL'
            CREATE TABLE commande_lunette (commande_id INTEGER NOT NULL, lunette_id INTEGER NOT NULL, PRIMARY KEY(commande_id, lunette_id), CONSTRAINT FK_73A7308982EA2E54 FOREIGN KEY (commande_id) REFERENCES commande (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE, CONSTRAINT FK_73A730898793C912 FOREIGN KEY (lunette_id) REFERENCES lunette (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE)
        SQL);
        $this->addSql(<<<'SQL'
            CREATE INDEX IDX_73A7308982EA2E54 ON commande_lunette (commande_id)
        SQL);
        $this->addSql(<<<'SQL'
            CREATE INDEX IDX_73A730898793C912 ON commande_lunette (lunette_id)
        SQL);
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            DROP TABLE commande
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE commande_lunette
        SQL);
    }
}
