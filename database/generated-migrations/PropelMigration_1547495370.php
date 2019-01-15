<?php

use Propel\Generator\Manager\MigrationManager;

/**
 * Data object containing the SQL and PHP code to migrate the database
 * up to version 1547495370.
 * Generated on 2019-01-14 19:49:30 by sina
 */
class PropelMigration_1547495370
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

ALTER TABLE `expert_career_stage` DROP FOREIGN KEY `expert_career_stage_fk_73a24b`;

ALTER TABLE `expert_career_stage` ADD CONSTRAINT `expert_career_stage_fk_73a24b`
    FOREIGN KEY (`career_stage_id`)
    REFERENCES `career_stage` (`id`)
    ON DELETE CASCADE;

ALTER TABLE `expert_cryosphere_methods` DROP FOREIGN KEY `expert_cryosphere_methods_fk_3ce64e`;

ALTER TABLE `expert_cryosphere_methods` ADD CONSTRAINT `expert_cryosphere_methods_fk_3ce64e`
    FOREIGN KEY (`method_id`)
    REFERENCES `cryosphere_methods` (`id`)
    ON DELETE CASCADE;

ALTER TABLE `expert_cryosphere_what` DROP FOREIGN KEY `expert_cryosphere_what_fk_e45748`;

ALTER TABLE `expert_cryosphere_what` ADD CONSTRAINT `expert_cryosphere_what_fk_e45748`
    FOREIGN KEY (`cryosphere_what_id`)
    REFERENCES `cryosphere_what` (`id`)
    ON DELETE CASCADE;

ALTER TABLE `expert_cryosphere_what_specefic` DROP FOREIGN KEY `expert_cryosphere_what_specefic_fk_0158a0`;

ALTER TABLE `expert_cryosphere_what_specefic` ADD CONSTRAINT `expert_cryosphere_what_specefic_fk_0158a0`
    FOREIGN KEY (`cryosphere_what_specefic_id`)
    REFERENCES `cryosphere_what_specefic` (`id`)
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

ALTER TABLE `expert_career_stage` DROP FOREIGN KEY `expert_career_stage_fk_73a24b`;

ALTER TABLE `expert_career_stage` ADD CONSTRAINT `expert_career_stage_fk_73a24b`
    FOREIGN KEY (`career_stage_id`)
    REFERENCES `career_stage` (`id`)
    ON UPDATE CASCADE;

ALTER TABLE `expert_cryosphere_methods` DROP FOREIGN KEY `expert_cryosphere_methods_fk_3ce64e`;

ALTER TABLE `expert_cryosphere_methods` ADD CONSTRAINT `expert_cryosphere_methods_fk_3ce64e`
    FOREIGN KEY (`method_id`)
    REFERENCES `cryosphere_methods` (`id`)
    ON UPDATE CASCADE;

ALTER TABLE `expert_cryosphere_what` DROP FOREIGN KEY `expert_cryosphere_what_fk_e45748`;

ALTER TABLE `expert_cryosphere_what` ADD CONSTRAINT `expert_cryosphere_what_fk_e45748`
    FOREIGN KEY (`cryosphere_what_id`)
    REFERENCES `cryosphere_what` (`id`)
    ON UPDATE CASCADE;

ALTER TABLE `expert_cryosphere_what_specefic` DROP FOREIGN KEY `expert_cryosphere_what_specefic_fk_0158a0`;

ALTER TABLE `expert_cryosphere_what_specefic` ADD CONSTRAINT `expert_cryosphere_what_specefic_fk_0158a0`
    FOREIGN KEY (`cryosphere_what_specefic_id`)
    REFERENCES `cryosphere_what_specefic` (`id`)
    ON UPDATE CASCADE;

# This restores the fkey checks, after having unset them earlier
SET FOREIGN_KEY_CHECKS = 1;
',
);
    }

}