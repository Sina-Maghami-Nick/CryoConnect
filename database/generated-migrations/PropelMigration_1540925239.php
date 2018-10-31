<?php

use Propel\Generator\Manager\MigrationManager;

/**
 * Data object containing the SQL and PHP code to migrate the database
 * up to version 1540925239.
 * Generated on 2018-10-30 21:47:19 by sina
 */
class PropelMigration_1540925239
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

DROP TABLE IF EXISTS `cryosphere_expert_methods`;

CREATE TABLE `expert_cryosphere_methods`
(
    `expert_id` int(10) unsigned NOT NULL,
    `method_id` int(10) unsigned NOT NULL,
    `timestamp` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    INDEX `expert_id` (`expert_id`),
    INDEX `method_id` (`method_id`),
    CONSTRAINT `expert_cryosphere_methods_ibfk_1`
        FOREIGN KEY (`expert_id`)
        REFERENCES `experts` (`id`)
        ON UPDATE CASCADE
        ON DELETE CASCADE,
    CONSTRAINT `expert_cryosphere_methods_ibfk_2`
        FOREIGN KEY (`method_id`)
        REFERENCES `cryosphere_methods` (`id`)
        ON UPDATE CASCADE
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

DROP TABLE IF EXISTS `expert_cryosphere_methods`;

CREATE TABLE `cryosphere_expert_methods`
(
    `expert_id` int(10) unsigned NOT NULL,
    `method_id` int(10) unsigned NOT NULL,
    `timestamp` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    INDEX `expert_id` (`expert_id`),
    INDEX `method_id` (`method_id`),
    CONSTRAINT `cryosphere_expert_methods_ibfk_1`
        FOREIGN KEY (`expert_id`)
        REFERENCES `experts` (`id`)
        ON UPDATE CASCADE
        ON DELETE CASCADE,
    CONSTRAINT `cryosphere_expert_methods_ibfk_2`
        FOREIGN KEY (`method_id`)
        REFERENCES `cryosphere_methods` (`id`)
        ON UPDATE CASCADE
) ENGINE=InnoDB;

# This restores the fkey checks, after having unset them earlier
SET FOREIGN_KEY_CHECKS = 1;
',
);
    }

}