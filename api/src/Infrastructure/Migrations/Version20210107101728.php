<?php

declare(strict_types=1);

namespace App\Data\Migration;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210107101728 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE accounts (id INT AUTO_INCREMENT NOT NULL, id_customer INT NOT NULL, balance DOUBLE PRECISION NOT NULL COMMENT \'(DC2Type:account_balance)\', status VARCHAR(255) NOT NULL COMMENT \'(DC2Type:account_status)\', created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP, updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP, INDEX IDX_CAC89EACD1E2629C (id_customer), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE customers (id INT AUTO_INCREMENT NOT NULL, first_name VARCHAR(50) NOT NULL COMMENT \'(DC2Type:customer_name)\', last_name VARCHAR(50) NOT NULL COMMENT \'(DC2Type:customer_name)\', phone_number VARCHAR(11) NOT NULL COMMENT \'(DC2Type:customer_phone_number)\', password_hash VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL COMMENT \'(DC2Type:customer_email)\', status VARCHAR(255) NOT NULL, created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP, updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE accounts ADD CONSTRAINT FK_CAC89EACD1E2629C FOREIGN KEY (id_customer) REFERENCES customers (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE accounts DROP FOREIGN KEY FK_CAC89EACD1E2629C');
        $this->addSql('DROP TABLE accounts');
        $this->addSql('DROP TABLE customers');
    }
}
