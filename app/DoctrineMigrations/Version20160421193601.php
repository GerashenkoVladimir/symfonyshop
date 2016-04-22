<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20160421193601 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE customers (
              id INT AUTO_INCREMENT NOT NULL, 
              email VARCHAR(128) NOT NULL, 
              password VARCHAR(128) NOT NULL, 
              first_name VARCHAR(128) NOT NULL, 
              second_name VARCHAR(128) NOT NULL, 
              age SMALLINT NOT NULL, 
              country VARCHAR(45) NOT NULL, 
              region VARCHAR(45) NOT NULL, 
              city VARCHAR(45) NOT NULL, 
              street VARCHAR(45) NOT NULL, 
              number_of_house SMALLINT NOT NULL, 
              number_of_flat SMALLINT DEFAULT NULL, 
              UNIQUE INDEX UNIQ_62534E21E7927C74 (email), 
              PRIMARY KEY(id)) 
              DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci 
              ENGINE = InnoDB');
        $this->addSql('ALTER TABLE categories CHANGE name name VARCHAR(128) NOT NULL');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE customers');
        $this->addSql('ALTER TABLE categories CHANGE name name VARCHAR(255) NOT NULL COLLATE utf8_general_ci');
    }
}
