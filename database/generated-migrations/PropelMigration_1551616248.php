<?php

use Propel\Generator\Manager\MigrationManager;

/**
 * Data object containing the SQL and PHP code to migrate the database
 * up to version 1551616248.
 * Generated on 2019-03-03 15:30:48 by sina
 */
class PropelMigration_1551616248
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

ALTER TABLE `fieldwork`

  DROP PRIMARY KEY,

  ADD PRIMARY KEY (`id`);

CREATE TABLE `fieldwork_information_seeker`
(
    `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
    `information_seeker_name` TEXT NOT NULL,
    `information_seeker_affiliation` TEXT NOT NULL,
    `information_seeker_website` TEXT NOT NULL,
    `information_seeker_email` TEXT NOT NULL,
    `information_seeker_affiliation_website` TEXT NOT NULL,
    `information_seeker_reasons` TEXT,
    `approved` TINYINT(1) DEFAULT 0 NOT NULL,
    `timestamp` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB;

CREATE TABLE `fieldwork_information_seeker_request`
(
    `fieldwork_information_seeker_id` int(10) unsigned NOT NULL,
    `fieldwork_id` int(10) unsigned NOT NULL,
    `timestamp` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (`fieldwork_information_seeker_id`,`fieldwork_id`),
    INDEX `fieldwork_information_seeker_request_fi_e02375` (`fieldwork_id`),
    CONSTRAINT `fieldwork_information_seeker_request_fk_7bc517`
        FOREIGN KEY (`fieldwork_information_seeker_id`)
        REFERENCES `fieldwork_information_seeker` (`id`)
        ON DELETE CASCADE,
    CONSTRAINT `fieldwork_information_seeker_request_fk_e02375`
        FOREIGN KEY (`fieldwork_id`)
        REFERENCES `fieldwork` (`id`)
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

DROP TABLE IF EXISTS `fieldwork_information_seeker`;

DROP TABLE IF EXISTS `fieldwork_information_seeker_request`;

ALTER TABLE `fieldwork`

  DROP PRIMARY KEY,

  ADD PRIMARY KEY (`id`,`cryosphere_where_id`);

# This restores the fkey checks, after having unset them earlier
SET FOREIGN_KEY_CHECKS = 1;
',
);
    }

}