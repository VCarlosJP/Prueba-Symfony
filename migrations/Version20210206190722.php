<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210206190722 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE mediciones_vino DROP FOREIGN KEY FK_7909615A629AF449');
        $this->addSql('ALTER TABLE mediciones_vino DROP FOREIGN KEY FK_7909615A79F8049F');
        $this->addSql('ALTER TABLE mediciones_vino DROP FOREIGN KEY FK_7909615AE2DC311E');
        $this->addSql('DROP INDEX IDX_7909615AE2DC311E ON mediciones_vino');
        $this->addSql('DROP INDEX IDX_7909615A79F8049F ON mediciones_vino');
        $this->addSql('DROP INDEX IDX_7909615A629AF449 ON mediciones_vino');
        $this->addSql('ALTER TABLE mediciones_vino ADD usuario_id INT NOT NULL, ADD variedad_id INT NOT NULL, ADD tipo_id INT NOT NULL, DROP usuario_id_id, DROP variedad_id_id, DROP tipo_id_id');
        $this->addSql('ALTER TABLE mediciones_vino ADD CONSTRAINT FK_7909615ADB38439E FOREIGN KEY (usuario_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE mediciones_vino ADD CONSTRAINT FK_7909615A91391A54 FOREIGN KEY (variedad_id) REFERENCES mediciones_variedad_vino (id)');
        $this->addSql('ALTER TABLE mediciones_vino ADD CONSTRAINT FK_7909615AA9276E6C FOREIGN KEY (tipo_id) REFERENCES mediciones_tipo_vino (id)');
        $this->addSql('CREATE INDEX IDX_7909615ADB38439E ON mediciones_vino (usuario_id)');
        $this->addSql('CREATE INDEX IDX_7909615A91391A54 ON mediciones_vino (variedad_id)');
        $this->addSql('CREATE INDEX IDX_7909615AA9276E6C ON mediciones_vino (tipo_id)');
        $this->addSql('ALTER TABLE sensor DROP FOREIGN KEY FK_BC8617B08A539ABF');
        $this->addSql('ALTER TABLE sensor DROP FOREIGN KEY FK_BC8617B0A561CE79');
        $this->addSql('DROP INDEX IDX_BC8617B08A539ABF ON sensor');
        $this->addSql('DROP INDEX UNIQ_BC8617B0A561CE79 ON sensor');
        $this->addSql('ALTER TABLE sensor ADD medicion_id INT NOT NULL, ADD tipo_sensor_id INT NOT NULL, DROP medicion_id_id, DROP tipo_sensor_id_id');
        $this->addSql('ALTER TABLE sensor ADD CONSTRAINT FK_BC8617B0C51CBABB FOREIGN KEY (medicion_id) REFERENCES mediciones_vino (id)');
        $this->addSql('ALTER TABLE sensor ADD CONSTRAINT FK_BC8617B040292651 FOREIGN KEY (tipo_sensor_id) REFERENCES tipo_sensor (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_BC8617B0C51CBABB ON sensor (medicion_id)');
        $this->addSql('CREATE INDEX IDX_BC8617B040292651 ON sensor (tipo_sensor_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE mediciones_vino DROP FOREIGN KEY FK_7909615ADB38439E');
        $this->addSql('ALTER TABLE mediciones_vino DROP FOREIGN KEY FK_7909615A91391A54');
        $this->addSql('ALTER TABLE mediciones_vino DROP FOREIGN KEY FK_7909615AA9276E6C');
        $this->addSql('DROP INDEX IDX_7909615ADB38439E ON mediciones_vino');
        $this->addSql('DROP INDEX IDX_7909615A91391A54 ON mediciones_vino');
        $this->addSql('DROP INDEX IDX_7909615AA9276E6C ON mediciones_vino');
        $this->addSql('ALTER TABLE mediciones_vino ADD usuario_id_id INT NOT NULL, ADD variedad_id_id INT NOT NULL, ADD tipo_id_id INT NOT NULL, DROP usuario_id, DROP variedad_id, DROP tipo_id');
        $this->addSql('ALTER TABLE mediciones_vino ADD CONSTRAINT FK_7909615A629AF449 FOREIGN KEY (usuario_id_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE mediciones_vino ADD CONSTRAINT FK_7909615A79F8049F FOREIGN KEY (tipo_id_id) REFERENCES mediciones_tipo_vino (id)');
        $this->addSql('ALTER TABLE mediciones_vino ADD CONSTRAINT FK_7909615AE2DC311E FOREIGN KEY (variedad_id_id) REFERENCES mediciones_variedad_vino (id)');
        $this->addSql('CREATE INDEX IDX_7909615AE2DC311E ON mediciones_vino (variedad_id_id)');
        $this->addSql('CREATE INDEX IDX_7909615A79F8049F ON mediciones_vino (tipo_id_id)');
        $this->addSql('CREATE INDEX IDX_7909615A629AF449 ON mediciones_vino (usuario_id_id)');
        $this->addSql('ALTER TABLE sensor DROP FOREIGN KEY FK_BC8617B0C51CBABB');
        $this->addSql('ALTER TABLE sensor DROP FOREIGN KEY FK_BC8617B040292651');
        $this->addSql('DROP INDEX UNIQ_BC8617B0C51CBABB ON sensor');
        $this->addSql('DROP INDEX IDX_BC8617B040292651 ON sensor');
        $this->addSql('ALTER TABLE sensor ADD medicion_id_id INT NOT NULL, ADD tipo_sensor_id_id INT NOT NULL, DROP medicion_id, DROP tipo_sensor_id');
        $this->addSql('ALTER TABLE sensor ADD CONSTRAINT FK_BC8617B08A539ABF FOREIGN KEY (tipo_sensor_id_id) REFERENCES tipo_sensor (id)');
        $this->addSql('ALTER TABLE sensor ADD CONSTRAINT FK_BC8617B0A561CE79 FOREIGN KEY (medicion_id_id) REFERENCES mediciones_vino (id)');
        $this->addSql('CREATE INDEX IDX_BC8617B08A539ABF ON sensor (tipo_sensor_id_id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_BC8617B0A561CE79 ON sensor (medicion_id_id)');
    }
}
