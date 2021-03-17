<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210206185746 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE mediciones_tipo_vino (id INT AUTO_INCREMENT NOT NULL, nombre VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE mediciones_variedad_vino (id INT AUTO_INCREMENT NOT NULL, nombre VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE mediciones_vino (id INT AUTO_INCREMENT NOT NULL, usuario_id_id INT NOT NULL, variedad_id_id INT NOT NULL, tipo_id_id INT NOT NULL, ano SMALLINT NOT NULL, color VARCHAR(255) NOT NULL, temperatura SMALLINT NOT NULL, graduacion SMALLINT NOT NULL, ph DOUBLE PRECISION NOT NULL, observaciones LONGTEXT NOT NULL, INDEX IDX_7909615A629AF449 (usuario_id_id), INDEX IDX_7909615AE2DC311E (variedad_id_id), INDEX IDX_7909615A79F8049F (tipo_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE sensor (id INT AUTO_INCREMENT NOT NULL, medicion_id_id INT NOT NULL, tipo_sensor_id_id INT NOT NULL, atributo1 DOUBLE PRECISION NOT NULL, atributo2 DOUBLE PRECISION NOT NULL, UNIQUE INDEX UNIQ_BC8617B0A561CE79 (medicion_id_id), INDEX IDX_BC8617B08A539ABF (tipo_sensor_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE tipo_sensor (id INT AUTO_INCREMENT NOT NULL, nombre VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles LONGTEXT NOT NULL COMMENT \'(DC2Type:json)\', password VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE mediciones_vino ADD CONSTRAINT FK_7909615A629AF449 FOREIGN KEY (usuario_id_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE mediciones_vino ADD CONSTRAINT FK_7909615AE2DC311E FOREIGN KEY (variedad_id_id) REFERENCES mediciones_variedad_vino (id)');
        $this->addSql('ALTER TABLE mediciones_vino ADD CONSTRAINT FK_7909615A79F8049F FOREIGN KEY (tipo_id_id) REFERENCES mediciones_tipo_vino (id)');
        $this->addSql('ALTER TABLE sensor ADD CONSTRAINT FK_BC8617B0A561CE79 FOREIGN KEY (medicion_id_id) REFERENCES mediciones_vino (id)');
        $this->addSql('ALTER TABLE sensor ADD CONSTRAINT FK_BC8617B08A539ABF FOREIGN KEY (tipo_sensor_id_id) REFERENCES tipo_sensor (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE mediciones_vino DROP FOREIGN KEY FK_7909615A79F8049F');
        $this->addSql('ALTER TABLE mediciones_vino DROP FOREIGN KEY FK_7909615AE2DC311E');
        $this->addSql('ALTER TABLE sensor DROP FOREIGN KEY FK_BC8617B0A561CE79');
        $this->addSql('ALTER TABLE sensor DROP FOREIGN KEY FK_BC8617B08A539ABF');
        $this->addSql('ALTER TABLE mediciones_vino DROP FOREIGN KEY FK_7909615A629AF449');
        $this->addSql('DROP TABLE mediciones_tipo_vino');
        $this->addSql('DROP TABLE mediciones_variedad_vino');
        $this->addSql('DROP TABLE mediciones_vino');
        $this->addSql('DROP TABLE sensor');
        $this->addSql('DROP TABLE tipo_sensor');
        $this->addSql('DROP TABLE user');
    }
}
