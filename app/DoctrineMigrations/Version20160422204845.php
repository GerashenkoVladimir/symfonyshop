<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20160422204845 extends AbstractMigration
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
            DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci 
            ENGINE = InnoDB'
        );
        $this->addSql(
            'CREATE TABLE products 
              (
                id INT UNSIGNED AUTO_INCREMENT NOT NULL, 
                name VARCHAR(128) NOT NULL, 
                price DOUBLE PRECISION NOT NULL, 
                categories_id INT UNSIGNED DEFAULT NULL, 
                description LONGTEXT DEFAULT NULL, 
                INDEX IDX_B3BA5A5AA21214B7 (categories_id), 
                PRIMARY KEY(id, name, price)
              ) 
            DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci 
            ENGINE = InnoDB'
        );
        $this->addSql(
            'ALTER TABLE products 
                ADD CONSTRAINT FK_B3BA5A5AA21214B7 
                FOREIGN KEY (categories_id) 
                REFERENCES products (id)'
        );
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE products DROP FOREIGN KEY FK_B3BA5A5AA21214B7');
        $this->addSql('DROP TABLE categories');
        $this->addSql('DROP TABLE products');
    }
}
