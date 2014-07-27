<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20140727181803 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != "mysql", "Migration can only be executed safely on 'mysql'.");

        $this->addSql("CREATE TABLE person (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) DEFAULT NULL, firstname VARCHAR(255) DEFAULT NULL, gender VARCHAR(255) DEFAULT NULL, date_of_birth DATE DEFAULT NULL, date_of_death DATE DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB");
        $this->addSql("CREATE TABLE relationships (id INT AUTO_INCREMENT NOT NULL, from_id INT DEFAULT NULL, to_id INT DEFAULT NULL, type VARCHAR(255) DEFAULT NULL, INDEX IDX_CDF868A778CED90B (from_id), INDEX IDX_CDF868A730354A65 (to_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB");
        $this->addSql("ALTER TABLE relationships ADD CONSTRAINT FK_CDF868A778CED90B FOREIGN KEY (from_id) REFERENCES person (id)");
        $this->addSql("ALTER TABLE relationships ADD CONSTRAINT FK_CDF868A730354A65 FOREIGN KEY (to_id) REFERENCES person (id)");
    }

    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != "mysql", "Migration can only be executed safely on 'mysql'.");

        $this->addSql("ALTER TABLE relationships DROP FOREIGN KEY FK_CDF868A778CED90B");
        $this->addSql("ALTER TABLE relationships DROP FOREIGN KEY FK_CDF868A730354A65");
        $this->addSql("DROP TABLE person");
        $this->addSql("DROP TABLE relationships");
    }
}
