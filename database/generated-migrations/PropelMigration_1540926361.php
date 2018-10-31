<?php

use Propel\Generator\Manager\MigrationManager;

/**
 * Data object containing the SQL and PHP code to migrate the database
 * up to version 1540926361.
 * Generated on 2018-10-30 22:06:01 by sina
 */
class PropelMigration_1540926361
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

DROP TABLE IF EXISTS `expert_when`;

CREATE TABLE `expert_cryosphere_when`
(
    `expert_id` int(10) unsigned NOT NULL,
    `cryosphere_when_id` int(10) unsigned NOT NULL,
    `timestamp` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    INDEX `expert_id` (`expert_id`),
    INDEX `cryosphere_when_id` (`cryosphere_when_id`),
    CONSTRAINT `expert_cryosphere_when_ibfk_1`
        FOREIGN KEY (`expert_id`)
        REFERENCES `experts` (`id`)
        ON UPDATE CASCADE
        ON DELETE CASCADE,
    CONSTRAINT `expert_cryosphere_when_ibfk_2`
        FOREIGN KEY (`cryosphere_when_id`)
        REFERENCES `cryosphere_when` (`id`)
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

DROP TABLE IF EXISTS `expert_cryosphere_when`;

CREATE TABLE `expert_when`
(
    `expert_id` int(10) unsigned NOT NULL,
    `cryosphere_when_id` int(10) unsigned NOT NULL,
    `timestamp` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    INDEX `expert_id` (`expert_id`),
    INDEX `cryosphere_when_id` (`cryosphere_when_id`),
    CONSTRAINT `expert_when_ibfk_1`
        FOREIGN KEY (`expert_id`)
        REFERENCES `experts` (`id`)
        ON UPDATE CASCADE
        ON DELETE CASCADE,
    CONSTRAINT `expert_when_ibfk_2`
        FOREIGN KEY (`cryosphere_when_id`)
        REFERENCES `cryosphere_when` (`id`)
        ON UPDATE CASCADE
        ON DELETE CASCADE
) ENGINE=InnoDB;

# This restores the fkey checks, after having unset them earlier
SET FOREIGN_KEY_CHECKS = 1;
',
);
    }

}