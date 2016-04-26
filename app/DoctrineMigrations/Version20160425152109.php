<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20160425152109 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql(
            'CREATE TABLE admin 
            (
            id INT UNSIGNED AUTO_INCREMENT NOT NULL, 
            username VARCHAR(128) NOT NULL, 
            email VARCHAR(128) NOT NULL, 
            password VARCHAR(128) NOT NULL, 
            role VARCHAR(45) NOT NULL, 
            UNIQUE INDEX UNIQ_880E0D76F85E0677 (username), 
            UNIQUE INDEX UNIQ_880E0D76E7927C74 (email), 
            PRIMARY KEY(id)
            ) 
            DEFAULT CHARACTER SET utf8mb4 
            COLLATE utf8mb4_general_ci 
            ENGINE = InnoDB'
        );
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE admin');
    }
}
