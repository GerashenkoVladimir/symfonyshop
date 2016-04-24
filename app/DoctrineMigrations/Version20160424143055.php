<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20160424143055 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql(
            'CREATE TABLE orders 
            (
            id INT UNSIGNED AUTO_INCREMENT NOT NULL, 
            customers_id INT UNSIGNED NOT NULL, 
            order_number VARCHAR(10) NOT NULL, 
            UNIQUE INDEX UNIQ_E52FFDEE551F0F81 (order_number), 
            INDEX IDX_E52FFDEEC3568B40 (customers_id), 
            PRIMARY KEY(id)
            ) 
            DEFAULT CHARACTER SET utf8mb4 
            COLLATE utf8mb4_general_ci 
            ENGINE = InnoDB');
        $this->addSql(
            'ALTER TABLE orders 
            ADD CONSTRAINT FK_E52FFDEEC3568B40 
            FOREIGN KEY (customers_id) 
            REFERENCES customers (id)'
        );
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE orders');
    }
}
