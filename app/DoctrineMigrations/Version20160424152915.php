<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20160424152915 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql(
            'CREATE TABLE orders_products 
            (
            orders_id INT UNSIGNED NOT NULL, 
            products_id INT UNSIGNED NOT NULL, 
            INDEX IDX_749C879CCFFE9AD6 (orders_id), 
            INDEX IDX_749C879C6C8A81A9 (products_id), 
            PRIMARY KEY(orders_id, products_id)
            ) 
            DEFAULT CHARACTER SET utf8mb4 
            COLLATE utf8mb4_general_ci 
            ENGINE = InnoDB'
        );
        $this->addSql(
            'ALTER TABLE orders_products 
            ADD CONSTRAINT FK_749C879CCFFE9AD6 
            FOREIGN KEY (orders_id) 
            REFERENCES orders (id)'
        );
        $this->addSql(
            'ALTER TABLE orders_products 
            ADD CONSTRAINT FK_749C879C6C8A81A9 
            FOREIGN KEY (products_id) 
            REFERENCES products (id) 
            ON DELETE CASCADE');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE orders_products');
    }
}
