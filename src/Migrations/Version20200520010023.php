<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200520010023 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE hospital (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(20) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE consultant CHANGE photo photo VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE department ADD hospital_id INT NOT NULL');
        $this->addSql('ALTER TABLE department ADD CONSTRAINT FK_CD1DE18A63DBB69 FOREIGN KEY (hospital_id) REFERENCES hospital (id)');
        $this->addSql('CREATE INDEX IDX_CD1DE18A63DBB69 ON department (hospital_id)');
        $this->addSql('ALTER TABLE doctor CHANGE photo photo VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE icu CHANGE diagnosis diagnosis VARCHAR(255) DEFAULT NULL, CHANGE neuro neuro VARCHAR(255) DEFAULT NULL, CHANGE cardiac cardiac VARCHAR(255) DEFAULT NULL, CHANGE respiratory respiratory VARCHAR(255) DEFAULT NULL, CHANGE ventilator ventilator VARCHAR(255) DEFAULT NULL, CHANGE gi gi VARCHAR(255) DEFAULT NULL, CHANGE gu gu VARCHAR(255) DEFAULT NULL, CHANGE skin skin VARCHAR(255) DEFAULT NULL, CHANGE drains drains VARCHAR(255) DEFAULT NULL, CHANGE labs labs VARCHAR(255) DEFAULT NULL, CHANGE meds meds VARCHAR(255) DEFAULT NULL, CHANGE hemodynamics hemodynamics VARCHAR(255) DEFAULT NULL, CHANGE to_do to_do VARCHAR(255) DEFAULT NULL, CHANGE core_measures core_measures VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE nurse CHANGE photo photo VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE patient CHANGE p_medical_histroy p_medical_histroy VARCHAR(255) DEFAULT NULL, CHANGE p_allergic_histroy p_allergic_histroy VARCHAR(255) DEFAULT NULL, CHANGE p_surgical_histroy p_surgical_histroy VARCHAR(255) DEFAULT NULL, CHANGE p_drug_histroy p_drug_histroy VARCHAR(255) DEFAULT NULL, CHANGE p_social_histroy p_social_histroy VARCHAR(255) DEFAULT NULL, CHANGE p_current_location p_current_location VARCHAR(255) DEFAULT NULL, CHANGE brochure_filename brochure_filename VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE surgery CHANGE doctor_fassistant_id doctor_fassistant_id INT DEFAULT NULL, CHANGE doctor_sassistant_id doctor_sassistant_id INT DEFAULT NULL, CHANGE doctor_anesthetist_id doctor_anesthetist_id INT DEFAULT NULL, CHANGE nurse_fassistant_id nurse_fassistant_id INT DEFAULT NULL, CHANGE nurse_sassistant_id nurse_sassistant_id INT DEFAULT NULL, CHANGE nurse_tassistant_id nurse_tassistant_id INT DEFAULT NULL, CHANGE consultant_assistant_id consultant_assistant_id INT DEFAULT NULL, CHANGE technician_assistant_id technician_assistant_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE technician CHANGE photo photo VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE unit ADD hospital_id INT NOT NULL, CHANGE department_id department_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE unit ADD CONSTRAINT FK_DCBB0C5363DBB69 FOREIGN KEY (hospital_id) REFERENCES hospital (id)');
        $this->addSql('CREATE INDEX IDX_DCBB0C5363DBB69 ON unit (hospital_id)');
        $this->addSql('ALTER TABLE user CHANGE username username VARCHAR(255) DEFAULT NULL, CHANGE password password VARCHAR(255) DEFAULT NULL, CHANGE facebook_id facebook_id VARCHAR(180) DEFAULT NULL, CHANGE facebook_access_token facebook_access_token VARCHAR(180) DEFAULT NULL, CHANGE github_id github_id VARCHAR(180) DEFAULT NULL, CHANGE github_access_token github_access_token VARCHAR(180) DEFAULT NULL');
        $this->addSql('ALTER TABLE ward ADD hospital_id INT NOT NULL, CHANGE department_id department_id INT DEFAULT NULL, CHANGE unit_id unit_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE ward ADD CONSTRAINT FK_C96F581B63DBB69 FOREIGN KEY (hospital_id) REFERENCES hospital (id)');
        $this->addSql('CREATE INDEX IDX_C96F581B63DBB69 ON ward (hospital_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE department DROP FOREIGN KEY FK_CD1DE18A63DBB69');
        $this->addSql('ALTER TABLE unit DROP FOREIGN KEY FK_DCBB0C5363DBB69');
        $this->addSql('ALTER TABLE ward DROP FOREIGN KEY FK_C96F581B63DBB69');
        $this->addSql('DROP TABLE hospital');
        $this->addSql('ALTER TABLE consultant CHANGE photo photo VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('DROP INDEX IDX_CD1DE18A63DBB69 ON department');
        $this->addSql('ALTER TABLE department DROP hospital_id');
        $this->addSql('ALTER TABLE doctor CHANGE photo photo VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE icu CHANGE diagnosis diagnosis VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE neuro neuro VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE cardiac cardiac VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE respiratory respiratory VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE ventilator ventilator VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE gi gi VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE gu gu VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE skin skin VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE drains drains VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE labs labs VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE meds meds VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE hemodynamics hemodynamics VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE to_do to_do VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE core_measures core_measures VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE nurse CHANGE photo photo VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE patient CHANGE p_medical_histroy p_medical_histroy VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE p_allergic_histroy p_allergic_histroy VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE p_surgical_histroy p_surgical_histroy VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE p_drug_histroy p_drug_histroy VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE p_social_histroy p_social_histroy VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE p_current_location p_current_location VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE brochure_filename brochure_filename VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE surgery CHANGE doctor_fassistant_id doctor_fassistant_id INT DEFAULT NULL, CHANGE doctor_sassistant_id doctor_sassistant_id INT DEFAULT NULL, CHANGE doctor_anesthetist_id doctor_anesthetist_id INT DEFAULT NULL, CHANGE nurse_fassistant_id nurse_fassistant_id INT DEFAULT NULL, CHANGE nurse_sassistant_id nurse_sassistant_id INT DEFAULT NULL, CHANGE nurse_tassistant_id nurse_tassistant_id INT DEFAULT NULL, CHANGE consultant_assistant_id consultant_assistant_id INT DEFAULT NULL, CHANGE technician_assistant_id technician_assistant_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE technician CHANGE photo photo VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('DROP INDEX IDX_DCBB0C5363DBB69 ON unit');
        $this->addSql('ALTER TABLE unit DROP hospital_id, CHANGE department_id department_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE user CHANGE username username VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE password password VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE facebook_id facebook_id VARCHAR(180) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE facebook_access_token facebook_access_token VARCHAR(180) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE github_id github_id VARCHAR(180) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE github_access_token github_access_token VARCHAR(180) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('DROP INDEX IDX_C96F581B63DBB69 ON ward');
        $this->addSql('ALTER TABLE ward DROP hospital_id, CHANGE department_id department_id INT DEFAULT NULL, CHANGE unit_id unit_id INT DEFAULT NULL');
    }
}
