<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230717165934 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE pelicula (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(255) NOT NULL, poster VARCHAR(255) DEFAULT NULL, trailer VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE personaje_pelicula (personaje_id INT NOT NULL, pelicula_id INT NOT NULL, INDEX IDX_C5B42BAD121EFAFB (personaje_id), INDEX IDX_C5B42BAD70713909 (pelicula_id), PRIMARY KEY(personaje_id, pelicula_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE personaje_pelicula ADD CONSTRAINT FK_C5B42BAD121EFAFB FOREIGN KEY (personaje_id) REFERENCES personaje (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE personaje_pelicula ADD CONSTRAINT FK_C5B42BAD70713909 FOREIGN KEY (pelicula_id) REFERENCES pelicula (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE personaje_pelicula DROP FOREIGN KEY FK_C5B42BAD121EFAFB');
        $this->addSql('ALTER TABLE personaje_pelicula DROP FOREIGN KEY FK_C5B42BAD70713909');
        $this->addSql('DROP TABLE pelicula');
        $this->addSql('DROP TABLE personaje_pelicula');
    }
}
