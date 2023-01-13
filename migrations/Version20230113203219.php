<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230113203219 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE commentaire (id INT AUTO_INCREMENT NOT NULL, blogpost_id INT DEFAULT NULL, peinture_id INT DEFAULT NULL, auteur VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, contenu LONGTEXT NOT NULL, created_at DATETIME NOT NULL, INDEX IDX_67F068BC27F5416E (blogpost_id), INDEX IDX_67F068BCC2E869AB (peinture_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE commentaire ADD CONSTRAINT FK_67F068BC27F5416E FOREIGN KEY (blogpost_id) REFERENCES blogpost (id)');
        $this->addSql('ALTER TABLE commentaire ADD CONSTRAINT FK_67F068BCC2E869AB FOREIGN KEY (peinture_id) REFERENCES peinture (id)');
        $this->addSql('ALTER TABLE peinture DROP FOREIGN KEY FK_8FB3A9D621D25844');
        $this->addSql('DROP INDEX IDX_8FB3A9D621D25844 ON peinture');
        $this->addSql('ALTER TABLE peinture DROP artiste_id');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE commentaire DROP FOREIGN KEY FK_67F068BC27F5416E');
        $this->addSql('ALTER TABLE commentaire DROP FOREIGN KEY FK_67F068BCC2E869AB');
        $this->addSql('DROP TABLE commentaire');
        $this->addSql('ALTER TABLE peinture ADD artiste_id INT NOT NULL');
        $this->addSql('ALTER TABLE peinture ADD CONSTRAINT FK_8FB3A9D621D25844 FOREIGN KEY (artiste_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_8FB3A9D621D25844 ON peinture (artiste_id)');
    }
}
