<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20160617160814 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE category (id INT UNSIGNED AUTO_INCREMENT NOT NULL, name VARCHAR(128) NOT NULL, image_name VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_64C19C15E237E06 (name), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE customer (id INT UNSIGNED AUTO_INCREMENT NOT NULL, username VARCHAR(128) NOT NULL, email VARCHAR(128) NOT NULL, password VARCHAR(128) NOT NULL, first_name VARCHAR(128) NOT NULL, second_name VARCHAR(128) NOT NULL, age SMALLINT NOT NULL, country VARCHAR(45) NOT NULL, region VARCHAR(45) NOT NULL, city VARCHAR(45) NOT NULL, street VARCHAR(45) NOT NULL, number_of_house SMALLINT NOT NULL, number_of_flat SMALLINT DEFAULT NULL, role VARCHAR(45) NOT NULL, UNIQUE INDEX UNIQ_81398E09F85E0677 (username), UNIQUE INDEX UNIQ_81398E09E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE `order` (id INT UNSIGNED AUTO_INCREMENT NOT NULL, customer_id INT UNSIGNED NOT NULL, order_number VARCHAR(10) NOT NULL, UNIQUE INDEX UNIQ_F5299398551F0F81 (order_number), INDEX IDX_F52993989395C3F3 (customer_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE order_product (id INT UNSIGNED AUTO_INCREMENT NOT NULL, order_id INT UNSIGNED NOT NULL, product_id INT UNSIGNED NOT NULL, quantity SMALLINT UNSIGNED NOT NULL, INDEX IDX_2530ADE68D9F6D38 (order_id), INDEX IDX_2530ADE64584665A (product_id), UNIQUE INDEX unique_order_product (order_id, product_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE producer (id INT UNSIGNED AUTO_INCREMENT NOT NULL, name VARCHAR(128) NOT NULL, UNIQUE INDEX UNIQ_976449DC5E237E06 (name), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE product (id INT UNSIGNED AUTO_INCREMENT NOT NULL, category_id INT UNSIGNED NOT NULL, producer_id INT UNSIGNED NOT NULL, name VARCHAR(128) NOT NULL, price DOUBLE PRECISION NOT NULL, description LONGTEXT DEFAULT NULL, image_name VARCHAR(128) NOT NULL, INDEX IDX_D34A04AD12469DE2 (category_id), INDEX IDX_D34A04AD89B658FE (producer_id), UNIQUE INDEX unique_name_price (name, price), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE shopping_basket (id INT UNSIGNED AUTO_INCREMENT NOT NULL, customer_id INT UNSIGNED NOT NULL, product_id INT UNSIGNED NOT NULL, quantity SMALLINT UNSIGNED NOT NULL, INDEX IDX_A9F94AE99395C3F3 (customer_id), INDEX IDX_A9F94AE94584665A (product_id), UNIQUE INDEX unique_customer_product (customer_id, product_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE admin (id INT UNSIGNED AUTO_INCREMENT NOT NULL, username VARCHAR(128) NOT NULL, email VARCHAR(128) NOT NULL, password VARCHAR(128) NOT NULL, role VARCHAR(45) NOT NULL, UNIQUE INDEX UNIQ_880E0D76F85E0677 (username), UNIQUE INDEX UNIQ_880E0D76E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE `order` ADD CONSTRAINT FK_F52993989395C3F3 FOREIGN KEY (customer_id) REFERENCES customer (id)');
        $this->addSql('ALTER TABLE order_product ADD CONSTRAINT FK_2530ADE68D9F6D38 FOREIGN KEY (order_id) REFERENCES `order` (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE order_product ADD CONSTRAINT FK_2530ADE64584665A FOREIGN KEY (product_id) REFERENCES product (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE product ADD CONSTRAINT FK_D34A04AD12469DE2 FOREIGN KEY (category_id) REFERENCES category (id)');
        $this->addSql('ALTER TABLE product ADD CONSTRAINT FK_D34A04AD89B658FE FOREIGN KEY (producer_id) REFERENCES producer (id)');
        $this->addSql('ALTER TABLE shopping_basket ADD CONSTRAINT FK_A9F94AE99395C3F3 FOREIGN KEY (customer_id) REFERENCES customer (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE shopping_basket ADD CONSTRAINT FK_A9F94AE94584665A FOREIGN KEY (product_id) REFERENCES product (id) ON DELETE CASCADE');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE product DROP FOREIGN KEY FK_D34A04AD12469DE2');
        $this->addSql('ALTER TABLE order DROP FOREIGN KEY FK_F52993989395C3F3');
        $this->addSql('ALTER TABLE shopping_basket DROP FOREIGN KEY FK_A9F94AE99395C3F3');
        $this->addSql('ALTER TABLE order_product DROP FOREIGN KEY FK_2530ADE68D9F6D38');
        $this->addSql('ALTER TABLE product DROP FOREIGN KEY FK_D34A04AD89B658FE');
        $this->addSql('ALTER TABLE order_product DROP FOREIGN KEY FK_2530ADE64584665A');
        $this->addSql('ALTER TABLE shopping_basket DROP FOREIGN KEY FK_A9F94AE94584665A');
        $this->addSql('DROP TABLE category');
        $this->addSql('DROP TABLE customer');
        $this->addSql('DROP TABLE `order`');
        $this->addSql('DROP TABLE order_product');
        $this->addSql('DROP TABLE producer');
        $this->addSql('DROP TABLE product');
        $this->addSql('DROP TABLE shopping_basket');
        $this->addSql('DROP TABLE admin');
    }
}
