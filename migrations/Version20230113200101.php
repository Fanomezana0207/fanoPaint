<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230113200101 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE peinture (id INT AUTO_INCREMENT NOT NULL, artiste_id INT NOT NULL, artist_id INT NOT NULL, nom VARCHAR(255) NOT NULL, largeur NUMERIC(6, 2) DEFAULT NULL, hauteur NUMERIC(6, 2) DEFAULT NULL, en_vente TINYINT(1) NOT NULL, prix NUMERIC(10, 2) DEFAULT NULL, date_realisation DATETIME DEFAULT NULL, created_at DATETIME NOT NULL, description LONGTEXT NOT NULL, slug VARCHAR(255) NOT NULL, file VARCHAR(255) NOT NULL, portfolio TINYINT(1) NOT NULL, INDEX IDX_8FB3A9D621D25844 (artiste_id), INDEX IDX_8FB3A9D6B7970CF8 (artist_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE peinture_categorie (peinture_id INT NOT NULL, categorie_id INT NOT NULL, INDEX IDX_38CEF7CFC2E869AB (peinture_id), INDEX IDX_38CEF7CFBCF5E72D (categorie_id), PRIMARY KEY(peinture_id, categorie_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE peinture ADD CONSTRAINT FK_8FB3A9D621D25844 FOREIGN KEY (artiste_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE peinture ADD CONSTRAINT FK_8FB3A9D6B7970CF8 FOREIGN KEY (artist_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE peinture_categorie ADD CONSTRAINT FK_38CEF7CFC2E869AB FOREIGN KEY (peinture_id) REFERENCES peinture (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE peinture_categorie ADD CONSTRAINT FK_38CEF7CFBCF5E72D FOREIGN KEY (categorie_id) REFERENCES categorie (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE peinture DROP FOREIGN KEY FK_8FB3A9D621D25844');
        $this->addSql('ALTER TABLE peinture DROP FOREIGN KEY FK_8FB3A9D6B7970CF8');
        $this->addSql('ALTER TABLE peinture_categorie DROP FOREIGN KEY FK_38CEF7CFC2E869AB');
        $this->addSql('ALTER TABLE peinture_categorie DROP FOREIGN KEY FK_38CEF7CFBCF5E72D');
        $this->addSql('DROP TABLE peinture');
        $this->addSql('DROP TABLE peinture_categorie');
    }
}
