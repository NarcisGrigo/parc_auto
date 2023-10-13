<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231012142757 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE locateur (id INT AUTO_INCREMENT NOT NULL, voiture_id INT NOT NULL, nom VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, age VARCHAR(255) NOT NULL, adresse LONGTEXT NOT NULL, INDEX IDX_F3A8D63B181A8BA (voiture_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE locateur_modele (locateur_id INT NOT NULL, modele_id INT NOT NULL, INDEX IDX_53B6015F411086F1 (locateur_id), INDEX IDX_53B6015FAC14B70A (modele_id), PRIMARY KEY(locateur_id, modele_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE location (id INT AUTO_INCREMENT NOT NULL, date_location DATETIME NOT NULL, nb_jr_location INT NOT NULL, prix_location INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE location_modele (location_id INT NOT NULL, modele_id INT NOT NULL, INDEX IDX_5B700D5A64D218E (location_id), INDEX IDX_5B700D5AAC14B70A (modele_id), PRIMARY KEY(location_id, modele_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE modele (id INT AUTO_INCREMENT NOT NULL, type_modele VARCHAR(255) NOT NULL, annee_modele INT NOT NULL, conso VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE voiture (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, image VARCHAR(255) NOT NULL, nb_km INT NOT NULL, created_at DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', available_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', delivered_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE locateur ADD CONSTRAINT FK_F3A8D63B181A8BA FOREIGN KEY (voiture_id) REFERENCES voiture (id)');
        $this->addSql('ALTER TABLE locateur_modele ADD CONSTRAINT FK_53B6015F411086F1 FOREIGN KEY (locateur_id) REFERENCES locateur (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE locateur_modele ADD CONSTRAINT FK_53B6015FAC14B70A FOREIGN KEY (modele_id) REFERENCES modele (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE location_modele ADD CONSTRAINT FK_5B700D5A64D218E FOREIGN KEY (location_id) REFERENCES location (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE location_modele ADD CONSTRAINT FK_5B700D5AAC14B70A FOREIGN KEY (modele_id) REFERENCES modele (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE locateur DROP FOREIGN KEY FK_F3A8D63B181A8BA');
        $this->addSql('ALTER TABLE locateur_modele DROP FOREIGN KEY FK_53B6015F411086F1');
        $this->addSql('ALTER TABLE locateur_modele DROP FOREIGN KEY FK_53B6015FAC14B70A');
        $this->addSql('ALTER TABLE location_modele DROP FOREIGN KEY FK_5B700D5A64D218E');
        $this->addSql('ALTER TABLE location_modele DROP FOREIGN KEY FK_5B700D5AAC14B70A');
        $this->addSql('DROP TABLE locateur');
        $this->addSql('DROP TABLE locateur_modele');
        $this->addSql('DROP TABLE location');
        $this->addSql('DROP TABLE location_modele');
        $this->addSql('DROP TABLE modele');
        $this->addSql('DROP TABLE voiture');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
