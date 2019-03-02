<?php

use Propel\Generator\Manager\MigrationManager;

/**
 * Data object containing the SQL and PHP code to migrate the database
 * up to version 1550403117.
 * Generated on 2019-02-17 14:31:57 by sina
 */
class PropelMigration_1550403117
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

DROP TABLE IF EXISTS `field_work`;

CREATE TABLE `fieldwork`
(
    `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
    `fieldwork_leader_name` TEXT NOT NULL,
    `fieldwork_leader_affiliation` TEXT,
    `fieldwork_leader_website` TEXT,
    `fieldwork_project_website` TEXT,
    `cryosphere_where_id` int(10) unsigned NOT NULL,
    `fieldwork_locations` TEXT,
    `fieldwork_duration` int(2) unsigned,
    `fieldwork_start_date` DATE,
    `fieldwork_goal` TEXT,
    `fieldwork_information_seeker_limit` int(5) unsigned,
    `fieldwork_information_seeker_cost` int(10) unsigned,
    `fieldwork_biding_allowed` TINYINT(1) DEFAULT 0 NOT NULL,
    `fieldwork_information_seeker_package` int(10) unsigned,
    `fieldwork_is_certain` TINYINT(1) NOT NULL,
    `fieldwork_when_certain` DATE,
    `field_information_seeker_announcement_date` DATE,
    `field_information_seeker_deadline` DATE NOT NULL,
    `approved` TINYINT(1) DEFAULT 0 NOT NULL,
    `timestamp` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (`id`,`cryosphere_where_id`),
    INDEX `fieldwork_fi_7f381c` (`cryosphere_where_id`),
    CONSTRAINT `fieldwork_fk_7f381c`
        FOREIGN KEY (`cryosphere_where_id`)
        REFERENCES `cryosphere_where` (`id`)
        ON DELETE CASCADE
) ENGINE=InnoDB;

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

DROP TABLE IF EXISTS `fieldwork`;

CREATE TABLE `field_work`
(
    `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
    `field_work_leader_name` TEXT NOT NULL,
    `field_work_leader_affiliation` TEXT,
    `field_work_leader_website` TEXT,
    `field_work_project_website` TEXT,
    `cryosphere_where_id` int(10) unsigned NOT NULL,
    `field_work_locations` TEXT,
    `field_work_duration` int(2) unsigned,
    `field_work_start_date` DATE,
    `field_work_goal` TEXT,
    `field_work_information_seeker_limit` int(5) unsigned,
    `field_work_information_seeker_cost` int(10) unsigned,
    `field_work_biding_allowed` TINYINT(1) DEFAULT 0 NOT NULL,
    `field_work_information_seeker_package` int(10) unsigned,
    `field_work_is_certain` TINYINT(1) NOT NULL,
    `field_work_when_certain` DATE,
    `field_information_seeker_announcement_date` DATE,
    `field_information_seeker_deadline` DATE NOT NULL,
    `approved` TINYINT(1) DEFAULT 0 NOT NULL,
    `timestamp` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (`id`,`cryosphere_where_id`),
    INDEX `field_work_fi_7f381c` (`cryosphere_where_id`),
    CONSTRAINT `field_work_fk_7f381c`
        FOREIGN KEY (`cryosphere_where_id`)
        REFERENCES `cryosphere_where` (`id`)
        ON DELETE CASCADE
) ENGINE=InnoDB;

# This restores the fkey checks, after having unset them earlier
SET FOREIGN_KEY_CHECKS = 1;
',
);
    }

}