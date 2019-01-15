<?php

use Propel\Generator\Manager\MigrationManager;

/**
 * Data object containing the SQL and PHP code to migrate the database
 * up to version 1547494989.
 * Generated on 2019-01-14 19:43:09 by sina
 */
class PropelMigration_1547494989
{
    public $comment = '';

    public function preUp(MigrationManager $manager)
    {
        // add the pre-migration code here
    }

    public function postUp(MigrationManager $manager)
    {
        // add the post-migration code here
    }

    public function preDown(MigrationManager $manager)
    {
        // add the pre-migration code here
    }

    public function postDown(MigrationManager $manager)
    {
        // add the post-migration code here
    }

    /**
     * Get the SQL statements for the Up migration
     *
     * @return array list of the SQL strings to execute for the Up migration
     *               the keys being the datasources
     */
    public function getUpSQL()
    {
        return array (
  'default' => '
# This is a fix for InnoDB in MySQL >= 4.1.x
# It "suspends judgement" for fkey relationships until are tables are set.
SET FOREIGN_KEY_CHECKS = 0;

ALTER TABLE `expert_career_stage` DROP FOREIGN KEY `expert_career_stage_fk_023b7c`;

ALTER TABLE `expert_career_stage` ADD CONSTRAINT `expert_career_stage_fk_023b7c`
    FOREIGN KEY (`expert_id`)
    REFERENCES `experts` (`id`)
    ON DELETE CASCADE;

ALTER TABLE `expert_contact` DROP FOREIGN KEY `expert_contact_fk_023b7c`;

ALTER TABLE `expert_contact` ADD CONSTRAINT `expert_contact_fk_023b7c`
    FOREIGN KEY (`expert_id`)
    REFERENCES `experts` (`id`)
    ON DELETE CASCADE;

ALTER TABLE `expert_cryosphere_methods` DROP FOREIGN KEY `expert_cryosphere_methods_fk_023b7c`;

ALTER TABLE `expert_cryosphere_methods` ADD CONSTRAINT `expert_cryosphere_methods_fk_023b7c`
    FOREIGN KEY (`expert_id`)
    REFERENCES `experts` (`id`)
    ON DELETE CASCADE;

ALTER TABLE `expert_cryosphere_what` DROP FOREIGN KEY `expert_cryosphere_what_fk_023b7c`;

ALTER TABLE `expert_cryosphere_what` ADD CONSTRAINT `expert_cryosphere_what_fk_023b7c`
    FOREIGN KEY (`expert_id`)
    REFERENCES `experts` (`id`)
    ON DELETE CASCADE;

ALTER TABLE `expert_cryosphere_what_specefic` DROP FOREIGN KEY `expert_cryosphere_what_specefic_fk_023b7c`;

ALTER TABLE `expert_cryosphere_what_specefic` ADD CONSTRAINT `expert_cryosphere_what_specefic_fk_023b7c`
    FOREIGN KEY (`expert_id`)
    REFERENCES `experts` (`id`)
    ON DELETE CASCADE;

ALTER TABLE `expert_cryosphere_when` DROP FOREIGN KEY `expert_cryosphere_when_fk_008274`;

ALTER TABLE `expert_cryosphere_when` DROP FOREIGN KEY `expert_cryosphere_when_fk_023b7c`;

ALTER TABLE `expert_cryosphere_when` ADD CONSTRAINT `expert_cryosphere_when_fk_008274`
    FOREIGN KEY (`cryosphere_when_id`)
    REFERENCES `cryosphere_when` (`id`)
    ON DELETE CASCADE;

ALTER TABLE `expert_cryosphere_when` ADD CONSTRAINT `expert_cryosphere_when_fk_023b7c`
    FOREIGN KEY (`expert_id`)
    REFERENCES `experts` (`id`)
    ON DELETE CASCADE;

ALTER TABLE `expert_cryosphere_where` DROP FOREIGN KEY `expert_cryosphere_where_fk_023b7c`;

ALTER TABLE `expert_cryosphere_where` DROP FOREIGN KEY `expert_cryosphere_where_fk_7f381c`;

ALTER TABLE `expert_cryosphere_where` ADD CONSTRAINT `expert_cryosphere_where_fk_023b7c`
    FOREIGN KEY (`expert_id`)
    REFERENCES `experts` (`id`)
    ON DELETE CASCADE;

ALTER TABLE `expert_cryosphere_where` ADD CONSTRAINT `expert_cryosphere_where_fk_7f381c`
    FOREIGN KEY (`cryosphere_where_id`)
    REFERENCES `cryosphere_where` (`id`)
    ON DELETE CASCADE;

ALTER TABLE `expert_field_work` DROP FOREIGN KEY `expert_field_work_fk_023b7c`;

ALTER TABLE `expert_field_work` ADD CONSTRAINT `expert_field_work_fk_023b7c`
    FOREIGN KEY (`expert_id`)
    REFERENCES `experts` (`id`)
    ON DELETE CASCADE;

ALTER TABLE `expert_languages` DROP FOREIGN KEY `expert_languages_fk_023b7c`;

ALTER TABLE `expert_languages` ADD CONSTRAINT `expert_languages_fk_023b7c`
    FOREIGN KEY (`expert_id`)
    REFERENCES `experts` (`id`)
    ON DELETE CASCADE;

ALTER TABLE `expert_primary_affiliation` DROP FOREIGN KEY `expert_primary_affiliation_fk_023b7c`;

ALTER TABLE `expert_primary_affiliation` ADD CONSTRAINT `expert_primary_affiliation_fk_023b7c`
    FOREIGN KEY (`expert_id`)
    REFERENCES `experts` (`id`)
    ON DELETE CASCADE;

ALTER TABLE `expert_secondary_affiliation` DROP FOREIGN KEY `expert_secondary_affiliation_fk_023b7c`;

ALTER TABLE `expert_secondary_affiliation` ADD CONSTRAINT `expert_secondary_affiliation_fk_023b7c`
    FOREIGN KEY (`expert_id`)
    REFERENCES `experts` (`id`)
    ON DELETE CASCADE;

ALTER TABLE `information_seeker_affiliation` DROP FOREIGN KEY `information_seeker_affiliation_fk_77d198`;

ALTER TABLE `information_seeker_affiliation` ADD CONSTRAINT `information_seeker_affiliation_fk_77d198`
    FOREIGN KEY (`information_seeker_id`)
    REFERENCES `information_seekers` (`id`)
    ON DELETE CASCADE;

ALTER TABLE `information_seeker_connect_request` DROP FOREIGN KEY `information_seeker_connect_request_fk_77d198`;

ALTER TABLE `information_seeker_connect_request` ADD CONSTRAINT `information_seeker_connect_request_fk_77d198`
    FOREIGN KEY (`information_seeker_id`)
    REFERENCES `information_seekers` (`id`)
    ON DELETE CASCADE;

ALTER TABLE `information_seeker_connect_request_cryosphere_what` DROP FOREIGN KEY `information_seeker_connect_request_cryosphere_what_fk_185361`;

ALTER TABLE `information_seeker_connect_request_cryosphere_what` ADD CONSTRAINT `information_seeker_connect_request_cryosphere_what_fk_185361`
    FOREIGN KEY (`information_seeker_connect_request_id`)
    REFERENCES `information_seeker_connect_request` (`id`)
    ON DELETE CASCADE;

ALTER TABLE `information_seeker_connect_request_cryosphere_where` DROP FOREIGN KEY `information_seeker_connect_request_cryosphere_where_fk_185361`;

ALTER TABLE `information_seeker_connect_request_cryosphere_where` ADD CONSTRAINT `information_seeker_connect_request_cryosphere_where_fk_185361`
    FOREIGN KEY (`information_seeker_connect_request_id`)
    REFERENCES `information_seeker_connect_request` (`id`)
    ON DELETE CASCADE;

ALTER TABLE `information_seeker_connect_request_languages` DROP FOREIGN KEY `information_seeker_connect_request_languages_fk_185361`;

ALTER TABLE `information_seeker_connect_request_languages` ADD CONSTRAINT `information_seeker_connect_request_languages_fk_185361`
    FOREIGN KEY (`information_seeker_connect_request_id`)
    REFERENCES `information_seeker_connect_request` (`id`)
    ON DELETE CASCADE;

ALTER TABLE `information_seeker_contact` DROP FOREIGN KEY `information_seeker_contact_fk_77d198`;

ALTER TABLE `information_seeker_contact` ADD CONSTRAINT `information_seeker_contact_fk_77d198`
    FOREIGN KEY (`information_seeker_id`)
    REFERENCES `information_seekers` (`id`)
    ON DELETE CASCADE;

ALTER TABLE `information_seeker_languages` DROP FOREIGN KEY `information_seeker_languages_ibfk_1`;

ALTER TABLE `information_seeker_languages` ADD CONSTRAINT `information_seeker_languages_ibfk_1`
    FOREIGN KEY (`Information_seeker_id`)
    REFERENCES `information_seekers` (`id`)
    ON DELETE CASCADE;

ALTER TABLE `information_seeker_profession` DROP FOREIGN KEY `information_seeker_profession_fk_77d198`;

ALTER TABLE `information_seeker_profession` ADD CONSTRAINT `information_seeker_profession_fk_77d198`
    FOREIGN KEY (`information_seeker_id`)
    REFERENCES `information_seekers` (`id`)
    ON DELETE CASCADE;

# This restores the fkey checks, after having unset them earlier
SET FOREIGN_KEY_CHECKS = 1;
',
);
    }

    /**
     * Get the SQL statements for the Down migration
     *
     * @return array list of the SQL strings to execute for the Down migration
     *               the keys being the datasources
     */
    public function getDownSQL()
    {
        return array (
  'default' => '
# This is a fix for InnoDB in MySQL >= 4.1.x
# It "suspends judgement" for fkey relationships until are tables are set.
SET FOREIGN_KEY_CHECKS = 0;

ALTER TABLE `expert_career_stage` DROP FOREIGN KEY `expert_career_stage_fk_023b7c`;

ALTER TABLE `expert_career_stage` ADD CONSTRAINT `expert_career_stage_fk_023b7c`
    FOREIGN KEY (`expert_id`)
    REFERENCES `experts` (`id`)
    ON UPDATE CASCADE
    ON DELETE CASCADE;

ALTER TABLE `expert_contact` DROP FOREIGN KEY `expert_contact_fk_023b7c`;

ALTER TABLE `expert_contact` ADD CONSTRAINT `expert_contact_fk_023b7c`
    FOREIGN KEY (`expert_id`)
    REFERENCES `experts` (`id`)
    ON UPDATE CASCADE
    ON DELETE CASCADE;

ALTER TABLE `expert_cryosphere_methods` DROP FOREIGN KEY `expert_cryosphere_methods_fk_023b7c`;

ALTER TABLE `expert_cryosphere_methods` ADD CONSTRAINT `expert_cryosphere_methods_fk_023b7c`
    FOREIGN KEY (`expert_id`)
    REFERENCES `experts` (`id`)
    ON UPDATE CASCADE
    ON DELETE CASCADE;

ALTER TABLE `expert_cryosphere_what` DROP FOREIGN KEY `expert_cryosphere_what_fk_023b7c`;

ALTER TABLE `expert_cryosphere_what` ADD CONSTRAINT `expert_cryosphere_what_fk_023b7c`
    FOREIGN KEY (`expert_id`)
    REFERENCES `experts` (`id`)
    ON UPDATE CASCADE
    ON DELETE CASCADE;

ALTER TABLE `expert_cryosphere_what_specefic` DROP FOREIGN KEY `expert_cryosphere_what_specefic_fk_023b7c`;

ALTER TABLE `expert_cryosphere_what_specefic` ADD CONSTRAINT `expert_cryosphere_what_specefic_fk_023b7c`
    FOREIGN KEY (`expert_id`)
    REFERENCES `experts` (`id`)
    ON UPDATE CASCADE
    ON DELETE CASCADE;

ALTER TABLE `expert_cryosphere_when` DROP FOREIGN KEY `expert_cryosphere_when_fk_008274`;

ALTER TABLE `expert_cryosphere_when` DROP FOREIGN KEY `expert_cryosphere_when_fk_023b7c`;

ALTER TABLE `expert_cryosphere_when` ADD CONSTRAINT `expert_cryosphere_when_fk_008274`
    FOREIGN KEY (`cryosphere_when_id`)
    REFERENCES `cryosphere_when` (`id`)
    ON UPDATE CASCADE
    ON DELETE CASCADE;

ALTER TABLE `expert_cryosphere_when` ADD CONSTRAINT `expert_cryosphere_when_fk_023b7c`
    FOREIGN KEY (`expert_id`)
    REFERENCES `experts` (`id`)
    ON UPDATE CASCADE
    ON DELETE CASCADE;

ALTER TABLE `expert_cryosphere_where` DROP FOREIGN KEY `expert_cryosphere_where_fk_023b7c`;

ALTER TABLE `expert_cryosphere_where` DROP FOREIGN KEY `expert_cryosphere_where_fk_7f381c`;

ALTER TABLE `expert_cryosphere_where` ADD CONSTRAINT `expert_cryosphere_where_fk_023b7c`
    FOREIGN KEY (`expert_id`)
    REFERENCES `experts` (`id`)
    ON UPDATE CASCADE
    ON DELETE CASCADE;

ALTER TABLE `expert_cryosphere_where` ADD CONSTRAINT `expert_cryosphere_where_fk_7f381c`
    FOREIGN KEY (`cryosphere_where_id`)
    REFERENCES `cryosphere_where` (`id`)
    ON UPDATE CASCADE
    ON DELETE CASCADE;

ALTER TABLE `expert_field_work` DROP FOREIGN KEY `expert_field_work_fk_023b7c`;

ALTER TABLE `expert_field_work` ADD CONSTRAINT `expert_field_work_fk_023b7c`
    FOREIGN KEY (`expert_id`)
    REFERENCES `experts` (`id`)
    ON UPDATE CASCADE
    ON DELETE CASCADE;

ALTER TABLE `expert_languages` DROP FOREIGN KEY `expert_languages_fk_023b7c`;

ALTER TABLE `expert_languages` ADD CONSTRAINT `expert_languages_fk_023b7c`
    FOREIGN KEY (`expert_id`)
    REFERENCES `experts` (`id`)
    ON UPDATE CASCADE
    ON DELETE CASCADE;

ALTER TABLE `expert_primary_affiliation` DROP FOREIGN KEY `expert_primary_affiliation_fk_023b7c`;

ALTER TABLE `expert_primary_affiliation` ADD CONSTRAINT `expert_primary_affiliation_fk_023b7c`
    FOREIGN KEY (`expert_id`)
    REFERENCES `experts` (`id`)
    ON UPDATE CASCADE
    ON DELETE CASCADE;

ALTER TABLE `expert_secondary_affiliation` DROP FOREIGN KEY `expert_secondary_affiliation_fk_023b7c`;

ALTER TABLE `expert_secondary_affiliation` ADD CONSTRAINT `expert_secondary_affiliation_fk_023b7c`
    FOREIGN KEY (`expert_id`)
    REFERENCES `experts` (`id`)
    ON UPDATE CASCADE
    ON DELETE CASCADE;

ALTER TABLE `information_seeker_affiliation` DROP FOREIGN KEY `information_seeker_affiliation_fk_77d198`;

ALTER TABLE `information_seeker_affiliation` ADD CONSTRAINT `information_seeker_affiliation_fk_77d198`
    FOREIGN KEY (`information_seeker_id`)
    REFERENCES `information_seekers` (`id`)
    ON UPDATE CASCADE
    ON DELETE CASCADE;

ALTER TABLE `information_seeker_connect_request` DROP FOREIGN KEY `information_seeker_connect_request_fk_77d198`;

ALTER TABLE `information_seeker_connect_request` ADD CONSTRAINT `information_seeker_connect_request_fk_77d198`
    FOREIGN KEY (`information_seeker_id`)
    REFERENCES `information_seekers` (`id`)
    ON UPDATE CASCADE
    ON DELETE CASCADE;

ALTER TABLE `information_seeker_connect_request_cryosphere_what` DROP FOREIGN KEY `information_seeker_connect_request_cryosphere_what_fk_185361`;

ALTER TABLE `information_seeker_connect_request_cryosphere_what` ADD CONSTRAINT `information_seeker_connect_request_cryosphere_what_fk_185361`
    FOREIGN KEY (`information_seeker_connect_request_id`)
    REFERENCES `information_seeker_connect_request` (`id`)
    ON UPDATE CASCADE
    ON DELETE CASCADE;

ALTER TABLE `information_seeker_connect_request_cryosphere_where` DROP FOREIGN KEY `information_seeker_connect_request_cryosphere_where_fk_185361`;

ALTER TABLE `information_seeker_connect_request_cryosphere_where` ADD CONSTRAINT `information_seeker_connect_request_cryosphere_where_fk_185361`
    FOREIGN KEY (`information_seeker_connect_request_id`)
    REFERENCES `information_seeker_connect_request` (`id`)
    ON UPDATE CASCADE
    ON DELETE CASCADE;

ALTER TABLE `information_seeker_connect_request_languages` DROP FOREIGN KEY `information_seeker_connect_request_languages_fk_185361`;

ALTER TABLE `information_seeker_connect_request_languages` ADD CONSTRAINT `information_seeker_connect_request_languages_fk_185361`
    FOREIGN KEY (`information_seeker_connect_request_id`)
    REFERENCES `information_seeker_connect_request` (`id`)
    ON UPDATE CASCADE
    ON DELETE CASCADE;

ALTER TABLE `information_seeker_contact` DROP FOREIGN KEY `information_seeker_contact_fk_77d198`;

ALTER TABLE `information_seeker_contact` ADD CONSTRAINT `information_seeker_contact_fk_77d198`
    FOREIGN KEY (`information_seeker_id`)
    REFERENCES `information_seekers` (`id`)
    ON UPDATE CASCADE
    ON DELETE CASCADE;

ALTER TABLE `information_seeker_languages` DROP FOREIGN KEY `information_seeker_languages_ibfk_1`;

ALTER TABLE `information_seeker_languages` ADD CONSTRAINT `information_seeker_languages_ibfk_1`
    FOREIGN KEY (`Information_seeker_id`)
    REFERENCES `information_seekers` (`id`)
    ON UPDATE CASCADE
    ON DELETE CASCADE;

ALTER TABLE `information_seeker_profession` DROP FOREIGN KEY `information_seeker_profession_fk_77d198`;

ALTER TABLE `information_seeker_profession` ADD CONSTRAINT `information_seeker_profession_fk_77d198`
    FOREIGN KEY (`information_seeker_id`)
    REFERENCES `information_seekers` (`id`)
    ON UPDATE CASCADE
    ON DELETE CASCADE;

# This restores the fkey checks, after having unset them earlier
SET FOREIGN_KEY_CHECKS = 1;
',
);
    }

}