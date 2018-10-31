<?php

use Propel\Generator\Manager\MigrationManager;

/**
 * Data object containing the SQL and PHP code to migrate the database
 * up to version 1541010611.
 * Generated on 2018-10-31 21:30:11 by sina
 */
class PropelMigration_1541010611
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
  'cryo_connect' => '
# This is a fix for InnoDB in MySQL >= 4.1.x
# It "suspends judgement" for fkey relationships until are tables are set.
SET FOREIGN_KEY_CHECKS = 0;

DROP TABLE IF EXISTS `expert_affiliation`;

CREATE TABLE `expert_primary_affiliation`
(
    `expert_id` int(10) unsigned NOT NULL,
    `primary_affiliation_name` TEXT NOT NULL,
    `primary_affiliation_country_code` VARCHAR(2),
    `primary_affiliation_city` TEXT,
    `timestamp` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    INDEX `expert_id` (`expert_id`),
    CONSTRAINT `expert_primary_affiliation_ibfk_1`
        FOREIGN KEY (`expert_id`)
        REFERENCES `experts` (`id`)
        ON UPDATE CASCADE
        ON DELETE CASCADE
) ENGINE=InnoDB;

CREATE TABLE `expert_secondary_affiliation`
(
    `expert_id` int(10) unsigned NOT NULL,
    `secondary_affiliation_name` TEXT NOT NULL,
    `timestamp` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    INDEX `expert_id` (`expert_id`),
    CONSTRAINT `expert_secondary_affiliation_ibfk_1`
        FOREIGN KEY (`expert_id`)
        REFERENCES `experts` (`id`)
        ON UPDATE CASCADE
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
  'cryo_connect' => '
# This is a fix for InnoDB in MySQL >= 4.1.x
# It "suspends judgement" for fkey relationships until are tables are set.
SET FOREIGN_KEY_CHECKS = 0;

DROP TABLE IF EXISTS `expert_primary_affiliation`;

DROP TABLE IF EXISTS `expert_secondary_affiliation`;

CREATE TABLE `expert_affiliation`
(
    `expert_id` int(10) unsigned NOT NULL,
    `affiliation_name` TEXT NOT NULL,
    `timestamp` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    INDEX `expert_id` (`expert_id`),
    CONSTRAINT `expert_affiliation_ibfk_1`
        FOREIGN KEY (`expert_id`)
        REFERENCES `experts` (`id`)
        ON UPDATE CASCADE
        ON DELETE CASCADE
) ENGINE=InnoDB;

# This restores the fkey checks, after having unset them earlier
SET FOREIGN_KEY_CHECKS = 1;
',
);
    }

}