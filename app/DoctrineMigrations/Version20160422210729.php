<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20160422210729 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql(
            'CREATE TABLE producers 
                (
                    id INT UNSIGNED AUTO_INCREMENT NOT NULL, 
                    name VARCHAR(128) NOT NULL, 
                    UNIQUE INDEX UNIQ_94FC35BD5E237E06 (name), 
                    PRIMARY KEY(id)
                ) 
            DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci 
            ENGINE = InnoDB'
        );
        $this->addSql(
            'ALTER TABLE products 
                ADD producers_id INT UNSIGNED NOT NULL');
        $this->addSql(
            'ALTER TABLE products 
                ADD CONSTRAINT FK_B3BA5A5ABDFDD466 
                FOREIGN KEY (producers_id) 
                REFERENCES producers (id)'
        );
        $this->addSql(
            'CREATE INDEX IDX_B3BA5A5ABDFDD466 ON products (producers_id)
        ');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE products DROP FOREIGN KEY FK_B3BA5A5ABDFDD466');
        $this->addSql('DROP TABLE producers');
        $this->addSql('DROP INDEX IDX_B3BA5A5ABDFDD466 ON products');
        $this->addSql('ALTER TABLE products DROP producers_id, CHANGE id id INT UNSIGNED AUTO_INCREMENT NOT NULL');
    }
}
