<?php

use Propel\Generator\Manager\MigrationManager;

/**
 * Data object containing the SQL and PHP code to migrate the database
 * up to version 1550329556.
 * Generated on 2019-02-16 18:05:56 by sina
 */
class PropelMigration_1550329556
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

ALTER TABLE `expert_field_work`

  CHANGE `field_work_where` `field_work_leader_affiliation` TEXT,

  ADD `id` int(10) unsigned NOT NULL AUTO_INCREMENT FIRST,

  ADD `field_work_leader_name` TEXT NOT NULL AFTER `expert_id`,

  ADD `field_work_leader_website` TEXT AFTER `field_work_leader_affiliation`,

  ADD `field_work_website` TEXT AFTER `field_work_leader_website`,

  ADD `cryosphere_where_id` int(10) unsigned NOT NULL AFTER `field_work_website`,

  ADD `field_work_locations` TEXT AFTER `cryosphere_where_id`,

  ADD `field_work_duration` int(2) unsigned AFTER `field_work_locations`,

  ADD `field_work_start_date` DATE AFTER `field_work_duration`,

  ADD `field_work_goal` TEXT AFTER `field_work_start_date`,

  ADD `field_work_information_seeker_limit` int(5) unsigned AFTER `field_work_goal`,

  ADD `field_work_information_seeker_cost` int(10) unsigned AFTER `field_work_information_seeker_limit`,

  ADD `field_work_biding_allowed` TINYINT(1) DEFAULT 0 NOT NULL AFTER `field_work_information_seeker_cost`,

  ADD `field_work_information_seeker_package` int(10) unsigned AFTER `field_work_biding_allowed`,

  ADD `field_work_is_certain` TINYINT(1) NOT NULL AFTER `field_work_information_seeker_package`,

  ADD `field_work_when_certain` DATE AFTER `field_work_is_certain`,

  ADD `field_information_seeker_announcement_date` DATE AFTER `field_work_when_certain`,

  ADD `approved` TINYINT(1) DEFAULT 0 NOT NULL AFTER `field_information_seeker_announcement_date`,

  DROP `field_work_year`,

  DROP `field_work_month`,

  ADD PRIMARY KEY (`id`,`expert_id`,`cryosphere_where_id`);

CREATE INDEX `expert_field_work_fi_7f381c` ON `expert_field_work` (`cryosphere_where_id`);

ALTER TABLE `expert_field_work` ADD CONSTRAINT `expert_field_work_fk_7f381c`
    FOREIGN KEY (`cryosphere_where_id`)
    REFERENCES `cryosphere_where` (`id`)
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

ALTER TABLE `expert_field_work` DROP FOREIGN KEY `expert_field_work_fk_7f381c`;

DROP INDEX `expert_field_work_fi_7f381c` ON `expert_field_work`;

ALTER TABLE `expert_field_work`

  DROP PRIMARY KEY,

  CHANGE `field_work_leader_affiliation` `field_work_where` TEXT,

  ADD `field_work_year` INTEGER(4) AFTER `field_work_where`,

  ADD `field_work_month` TINYINT(2) AFTER `field_work_year`,

  DROP `id`,

  DROP `field_work_leader_name`,

  DROP `field_work_leader_website`,

  DROP `field_work_website`,

  DROP `cryosphere_where_id`,

  DROP `field_work_locations`,

  DROP `field_work_duration`,

  DROP `field_work_start_date`,

  DROP `field_work_goal`,

  DROP `field_work_information_seeker_limit`,

  DROP `field_work_information_seeker_cost`,

  DROP `field_work_biding_allowed`,

  DROP `field_work_information_seeker_package`,

  DROP `field_work_is_certain`,

  DROP `field_work_when_certain`,

  DROP `field_information_seeker_announcement_date`,

  DROP `approved`;

# This restores the fkey checks, after having unset them earlier
SET FOREIGN_KEY_CHECKS = 1;
',
);
    }

}