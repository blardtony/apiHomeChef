<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200120153604 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE adress DROP FOREIGN KEY FK_5CECC7BE87CF8EB');
        $this->addSql('DROP TABLE street');
        $this->addSql('ALTER TABLE adress DROP FOREIGN KEY FK_5CECC7BE7D662686');
        $this->addSql('DROP INDEX IDX_5CECC7BE7D662686 ON adress');
        $this->addSql('DROP INDEX IDX_5CECC7BE87CF8EB ON adress');
        $this->addSql('ALTER TABLE adress ADD street VARCHAR(255) NOT NULL, DROP zip_id, DROP street_id');
        $this->addSql('ALTER TABLE city ADD zip_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE city ADD CONSTRAINT FK_2D5B02347D662686 FOREIGN KEY (zip_id) REFERENCES zip (id)');
        $this->addSql('CREATE INDEX IDX_2D5B02347D662686 ON city (zip_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE street (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) CHARACTER SET utf8 DEFAULT NULL COLLATE `utf8_unicode_ci`, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE adress ADD zip_id INT DEFAULT NULL, ADD street_id INT DEFAULT NULL, DROP street');
        $this->addSql('ALTER TABLE adress ADD CONSTRAINT FK_5CECC7BE7D662686 FOREIGN KEY (zip_id) REFERENCES zip (id)');
        $this->addSql('ALTER TABLE adress ADD CONSTRAINT FK_5CECC7BE87CF8EB FOREIGN KEY (street_id) REFERENCES street (id)');
        $this->addSql('CREATE INDEX IDX_5CECC7BE7D662686 ON adress (zip_id)');
        $this->addSql('CREATE INDEX IDX_5CECC7BE87CF8EB ON adress (street_id)');
        $this->addSql('ALTER TABLE city DROP FOREIGN KEY FK_2D5B02347D662686');
        $this->addSql('DROP INDEX IDX_2D5B02347D662686 ON city');
        $this->addSql('ALTER TABLE city DROP zip_id');
    }
}
