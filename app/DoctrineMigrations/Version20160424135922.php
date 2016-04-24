<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20160424135922 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql(
            'CREATE TABLE categories 
            (
            id INT UNSIGNED AUTO_INCREMENT NOT NULL, 
            name VARCHAR(128) NOT NULL, 
            UNIQUE INDEX UNIQ_3AF346685E237E06 (name), 
            PRIMARY KEY(id)
            ) 
            DEFAULT CHARACTER SET utf8mb4 
            COLLATE utf8mb4_general_ci 
            ENGINE = InnoDB'
        );
        $this->addSql(
            'CREATE TABLE customers 
            (
            id INT UNSIGNED AUTO_INCREMENT NOT NULL, 
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
            PRIMARY KEY(id)
            ) 
            DEFAULT CHARACTER SET utf8mb4 
            COLLATE utf8mb4_general_ci 
            ENGINE = InnoDB'
        );
        $this->addSql(
            'CREATE TABLE producers 
            (
            id INT UNSIGNED AUTO_INCREMENT NOT NULL, 
            name VARCHAR(128) NOT NULL, 
            UNIQUE INDEX UNIQ_94FC35BD5E237E06 (name), 
            PRIMARY KEY(id)
            ) 
            DEFAULT CHARACTER SET utf8mb4 
            COLLATE utf8mb4_general_ci 
            ENGINE = InnoDB'
        );
        $this->addSql(
            'CREATE TABLE products 
            (
            id INT UNSIGNED AUTO_INCREMENT NOT NULL, 
            categories_id INT UNSIGNED DEFAULT NULL, 
            producers_id INT UNSIGNED NOT NULL, 
            name VARCHAR(128) NOT NULL, 
            price DOUBLE PRECISION NOT NULL, 
            description LONGTEXT DEFAULT NULL, 
            INDEX IDX_B3BA5A5AA21214B7 (categories_id), 
            INDEX IDX_B3BA5A5ABDFDD466 (producers_id), 
            UNIQUE INDEX unique_name_price (name, price), 
            PRIMARY KEY(id)
            ) 
            DEFAULT CHARACTER SET utf8mb4 
            COLLATE utf8mb4_general_ci 
            ENGINE = InnoDB'
        );
        $this->addSql(
            'ALTER TABLE products 
            ADD CONSTRAINT FK_B3BA5A5AA21214B7 
            FOREIGN KEY (categories_id) 
            REFERENCES products (id)'
        );
        $this->addSql(
            'ALTER TABLE products 
            ADD CONSTRAINT FK_B3BA5A5ABDFDD466 
            FOREIGN KEY (producers_id) 
            REFERENCES producers (id)'
        );
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE products DROP FOREIGN KEY FK_B3BA5A5ABDFDD466');
        $this->addSql('ALTER TABLE products DROP FOREIGN KEY FK_B3BA5A5AA21214B7');
        $this->addSql('DROP TABLE categories');
        $this->addSql('DROP TABLE customers');
        $this->addSql('DROP TABLE producers');
        $this->addSql('DROP TABLE products');
    }
}
