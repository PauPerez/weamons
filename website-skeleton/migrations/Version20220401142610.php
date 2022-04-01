<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220401142610 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE equip (id INT AUTO_INCREMENT NOT NULL, usuari_id INT NOT NULL, INDEX IDX_F273C3B05F263030 (usuari_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE equip_weamon (equip_id INT NOT NULL, weamon_id INT NOT NULL, INDEX IDX_A1EA17CF8AC49FD9 (equip_id), INDEX IDX_A1EA17CF2AF03336 (weamon_id), PRIMARY KEY(equip_id, weamon_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE historial (id INT AUTO_INCREMENT NOT NULL, usuari_id INT NOT NULL, contrincant_id INT DEFAULT NULL, resultat INT NOT NULL, INDEX IDX_269506525F263030 (usuari_id), INDEX IDX_2695065262A8FAA8 (contrincant_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE moviment (id INT AUTO_INCREMENT NOT NULL, tipus_id INT NOT NULL, nom VARCHAR(255) NOT NULL, accio VARCHAR(255) NOT NULL, INDEX IDX_312D78F6898C381B (tipus_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE tipus (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE usuari (id INT AUTO_INCREMENT NOT NULL, username VARCHAR(255) NOT NULL, password VARCHAR(255) NOT NULL, rol VARCHAR(255) NOT NULL, img VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE weamon (id INT AUTO_INCREMENT NOT NULL, tipus_id INT NOT NULL, nom VARCHAR(255) NOT NULL, vida INT NOT NULL, atac INT NOT NULL, velocitat INT NOT NULL, shiny TINYINT(1) NOT NULL, img VARCHAR(255) NOT NULL, INDEX IDX_7DCD97C5898C381B (tipus_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE weamon_moviment (weamon_id INT NOT NULL, moviment_id INT NOT NULL, INDEX IDX_D28E262D2AF03336 (weamon_id), INDEX IDX_D28E262D753165E8 (moviment_id), PRIMARY KEY(weamon_id, moviment_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE equip ADD CONSTRAINT FK_F273C3B05F263030 FOREIGN KEY (usuari_id) REFERENCES usuari (id)');
        $this->addSql('ALTER TABLE equip_weamon ADD CONSTRAINT FK_A1EA17CF8AC49FD9 FOREIGN KEY (equip_id) REFERENCES equip (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE equip_weamon ADD CONSTRAINT FK_A1EA17CF2AF03336 FOREIGN KEY (weamon_id) REFERENCES weamon (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE historial ADD CONSTRAINT FK_269506525F263030 FOREIGN KEY (usuari_id) REFERENCES usuari (id)');
        $this->addSql('ALTER TABLE historial ADD CONSTRAINT FK_2695065262A8FAA8 FOREIGN KEY (contrincant_id) REFERENCES usuari (id)');
        $this->addSql('ALTER TABLE moviment ADD CONSTRAINT FK_312D78F6898C381B FOREIGN KEY (tipus_id) REFERENCES tipus (id)');
        $this->addSql('ALTER TABLE weamon ADD CONSTRAINT FK_7DCD97C5898C381B FOREIGN KEY (tipus_id) REFERENCES tipus (id)');
        $this->addSql('ALTER TABLE weamon_moviment ADD CONSTRAINT FK_D28E262D2AF03336 FOREIGN KEY (weamon_id) REFERENCES weamon (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE weamon_moviment ADD CONSTRAINT FK_D28E262D753165E8 FOREIGN KEY (moviment_id) REFERENCES moviment (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE equip_weamon DROP FOREIGN KEY FK_A1EA17CF8AC49FD9');
        $this->addSql('ALTER TABLE weamon_moviment DROP FOREIGN KEY FK_D28E262D753165E8');
        $this->addSql('ALTER TABLE moviment DROP FOREIGN KEY FK_312D78F6898C381B');
        $this->addSql('ALTER TABLE weamon DROP FOREIGN KEY FK_7DCD97C5898C381B');
        $this->addSql('ALTER TABLE equip DROP FOREIGN KEY FK_F273C3B05F263030');
        $this->addSql('ALTER TABLE historial DROP FOREIGN KEY FK_269506525F263030');
        $this->addSql('ALTER TABLE historial DROP FOREIGN KEY FK_2695065262A8FAA8');
        $this->addSql('ALTER TABLE equip_weamon DROP FOREIGN KEY FK_A1EA17CF2AF03336');
        $this->addSql('ALTER TABLE weamon_moviment DROP FOREIGN KEY FK_D28E262D2AF03336');
        $this->addSql('DROP TABLE equip');
        $this->addSql('DROP TABLE equip_weamon');
        $this->addSql('DROP TABLE historial');
        $this->addSql('DROP TABLE moviment');
        $this->addSql('DROP TABLE tipus');
        $this->addSql('DROP TABLE usuari');
        $this->addSql('DROP TABLE weamon');
        $this->addSql('DROP TABLE weamon_moviment');
    }
}
