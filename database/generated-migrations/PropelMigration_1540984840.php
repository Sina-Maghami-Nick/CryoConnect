<?php

use Propel\Generator\Manager\MigrationManager;

/**
 * Data object containing the SQL and PHP code to migrate the database
 * up to version 1540984840.
 * Generated on 2018-10-31 14:20:40 by sina
 */
class PropelMigration_1540984840
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

DROP TABLE IF EXISTS `expert_where`;

ALTER TABLE `cryosphere_methods`

  ADD `approved` TINYINT(1) DEFAULT 0 NOT NULL AFTER `cryosphere_methods_name`;

ALTER TABLE `cryosphere_what`

  ADD `approved` TINYINT(1) DEFAULT 0 NOT NULL AFTER `cryosphere_what_name`;

ALTER TABLE `cryosphere_what_specefic`

  ADD `approved` TINYINT(1) DEFAULT 0 NOT NULL AFTER `cryosphere_what_specefic_name`;

ALTER TABLE `cryosphere_when`

  ADD `approved` TINYINT(1) DEFAULT 0 NOT NULL AFTER `cryosphere_when_name`;

CREATE TABLE `expert_cryosphere_where`
(
    `expert_id` int(10) unsigned NOT NULL,
    `cryosphere_where_id` int(10) unsigned NOT NULL,
    `timestamp` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    INDEX `expert_id` (`expert_id`),
    INDEX `cryosphere_where_id` (`cryosphere_where_id`),
    CONSTRAINT `expert_cryosphere_where_ibfk_1`
        FOREIGN KEY (`expert_id`)
        REFERENCES `experts` (`id`)
        ON UPDATE CASCADE
        ON DELETE CASCADE,
    CONSTRAINT `expert_cryosphere_where_ibfk_2`
        FOREIGN KEY (`cryosphere_where_id`)
        REFERENCES `cryosphere_where` (`id`)
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

DROP TABLE IF EXISTS `expert_cryosphere_where`;

ALTER TABLE `cryosphere_methods`

  DROP `approved`;

ALTER TABLE `cryosphere_what`

  DROP `approved`;

ALTER TABLE `cryosphere_what_specefic`

  DROP `approved`;

ALTER TABLE `cryosphere_when`

  DROP `approved`;

CREATE TABLE `expert_where`
(
    `expert_id` int(10) unsigned NOT NULL,
    `cryosphere_where_id` int(10) unsigned NOT NULL,
    `timestamp` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    INDEX `expert_id` (`expert_id`),
    INDEX `cryosphere_where_id` (`cryosphere_where_id`),
    CONSTRAINT `expert_where_ibfk_1`
        FOREIGN KEY (`expert_id`)
        REFERENCES `experts` (`id`)
        ON UPDATE CASCADE
        ON DELETE CASCADE,
    CONSTRAINT `expert_where_ibfk_2`
        FOREIGN KEY (`cryosphere_where_id`)
        REFERENCES `cryosphere_where` (`id`)
        ON UPDATE CASCADE
        ON DELETE CASCADE
) ENGINE=InnoDB;

# This restores the fkey checks, after having unset them earlier
SET FOREIGN_KEY_CHECKS = 1;
',
);
    }

}