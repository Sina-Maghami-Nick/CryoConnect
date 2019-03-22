
# This is a fix for InnoDB in MySQL >= 4.1.x
# It "suspends judgement" for fkey relationships until are tables are set.
SET FOREIGN_KEY_CHECKS = 0;

-- ---------------------------------------------------------------------
-- career_stage
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `career_stage`;

CREATE TABLE `career_stage`
(
    `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
    `career_stage_name` TEXT NOT NULL,
    `timestamp` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- contact_types
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `contact_types`;

CREATE TABLE `contact_types`
(
    `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
    `contact_type` TEXT NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- countries
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `countries`;

CREATE TABLE `countries`
(
    `country_code` VARCHAR(2) NOT NULL,
    `country_name` VARCHAR(100),
    PRIMARY KEY (`country_code`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- cryosphere_methods
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `cryosphere_methods`;

CREATE TABLE `cryosphere_methods`
(
    `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
    `cryosphere_methods_name` TEXT NOT NULL,
    `approved` TINYINT(1) DEFAULT 0 NOT NULL,
    `timestamp` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- cryosphere_what
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `cryosphere_what`;

CREATE TABLE `cryosphere_what`
(
    `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
    `cryosphere_what_name` TEXT NOT NULL,
    `approved` TINYINT(1) DEFAULT 0 NOT NULL,
    `timestamp` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- cryosphere_what_specefic
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `cryosphere_what_specefic`;

CREATE TABLE `cryosphere_what_specefic`
(
    `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
    `cryosphere_what_specefic_name` TEXT NOT NULL,
    `approved` TINYINT(1) DEFAULT 0 NOT NULL,
    `timestamp` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- cryosphere_when
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `cryosphere_when`;

CREATE TABLE `cryosphere_when`
(
    `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
    `cryosphere_when_name` TEXT NOT NULL,
    `approved` TINYINT(1) DEFAULT 0 NOT NULL,
    `timestamp` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- cryosphere_where
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `cryosphere_where`;

CREATE TABLE `cryosphere_where`
(
    `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
    `cryosphere_where_name` TEXT NOT NULL,
    `timestamp` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- expert_career_stage
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `expert_career_stage`;

CREATE TABLE `expert_career_stage`
(
    `expert_id` int(10) unsigned NOT NULL,
    `career_stage_id` int(10) unsigned NOT NULL,
    `timestamp` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (`expert_id`,`career_stage_id`),
    INDEX `expert_career_stage_fi_73a24b` (`career_stage_id`),
    CONSTRAINT `expert_career_stage_fk_023b7c`
        FOREIGN KEY (`expert_id`)
        REFERENCES `experts` (`id`)
        ON DELETE CASCADE,
    CONSTRAINT `expert_career_stage_fk_73a24b`
        FOREIGN KEY (`career_stage_id`)
        REFERENCES `career_stage` (`id`)
        ON DELETE CASCADE
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- expert_contact
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `expert_contact`;

CREATE TABLE `expert_contact`
(
    `expert_id` int(10) unsigned NOT NULL,
    `contact_type_id` int(10) unsigned NOT NULL,
    `contact_information` TEXT NOT NULL,
    `timestamp` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (`expert_id`,`contact_type_id`),
    INDEX `expert_contact_fi_88838f` (`contact_type_id`),
    CONSTRAINT `expert_contact_fk_023b7c`
        FOREIGN KEY (`expert_id`)
        REFERENCES `experts` (`id`)
        ON DELETE CASCADE,
    CONSTRAINT `expert_contact_fk_88838f`
        FOREIGN KEY (`contact_type_id`)
        REFERENCES `contact_types` (`id`)
        ON UPDATE CASCADE
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- expert_cryosphere_methods
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `expert_cryosphere_methods`;

CREATE TABLE `expert_cryosphere_methods`
(
    `expert_id` int(10) unsigned NOT NULL,
    `method_id` int(10) unsigned NOT NULL,
    `timestamp` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (`expert_id`,`method_id`),
    INDEX `expert_cryosphere_methods_fi_3ce64e` (`method_id`),
    CONSTRAINT `expert_cryosphere_methods_fk_023b7c`
        FOREIGN KEY (`expert_id`)
        REFERENCES `experts` (`id`)
        ON DELETE CASCADE,
    CONSTRAINT `expert_cryosphere_methods_fk_3ce64e`
        FOREIGN KEY (`method_id`)
        REFERENCES `cryosphere_methods` (`id`)
        ON DELETE CASCADE
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- expert_cryosphere_what
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `expert_cryosphere_what`;

CREATE TABLE `expert_cryosphere_what`
(
    `expert_id` int(10) unsigned NOT NULL,
    `cryosphere_what_id` int(10) unsigned NOT NULL,
    `timestamp` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (`expert_id`,`cryosphere_what_id`),
    INDEX `expert_cryosphere_what_fi_e45748` (`cryosphere_what_id`),
    CONSTRAINT `expert_cryosphere_what_fk_023b7c`
        FOREIGN KEY (`expert_id`)
        REFERENCES `experts` (`id`)
        ON DELETE CASCADE,
    CONSTRAINT `expert_cryosphere_what_fk_e45748`
        FOREIGN KEY (`cryosphere_what_id`)
        REFERENCES `cryosphere_what` (`id`)
        ON DELETE CASCADE
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- expert_cryosphere_what_specefic
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `expert_cryosphere_what_specefic`;

CREATE TABLE `expert_cryosphere_what_specefic`
(
    `expert_id` int(10) unsigned NOT NULL,
    `cryosphere_what_specefic_id` int(10) unsigned NOT NULL,
    `timestamp` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (`expert_id`,`cryosphere_what_specefic_id`),
    INDEX `expert_cryosphere_what_specefic_fi_0158a0` (`cryosphere_what_specefic_id`),
    CONSTRAINT `expert_cryosphere_what_specefic_fk_023b7c`
        FOREIGN KEY (`expert_id`)
        REFERENCES `experts` (`id`)
        ON DELETE CASCADE,
    CONSTRAINT `expert_cryosphere_what_specefic_fk_0158a0`
        FOREIGN KEY (`cryosphere_what_specefic_id`)
        REFERENCES `cryosphere_what_specefic` (`id`)
        ON DELETE CASCADE
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- expert_cryosphere_when
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `expert_cryosphere_when`;

CREATE TABLE `expert_cryosphere_when`
(
    `expert_id` int(10) unsigned NOT NULL,
    `cryosphere_when_id` int(10) unsigned NOT NULL,
    `timestamp` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (`expert_id`,`cryosphere_when_id`),
    INDEX `expert_cryosphere_when_fi_008274` (`cryosphere_when_id`),
    CONSTRAINT `expert_cryosphere_when_fk_023b7c`
        FOREIGN KEY (`expert_id`)
        REFERENCES `experts` (`id`)
        ON DELETE CASCADE,
    CONSTRAINT `expert_cryosphere_when_fk_008274`
        FOREIGN KEY (`cryosphere_when_id`)
        REFERENCES `cryosphere_when` (`id`)
        ON DELETE CASCADE
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- expert_cryosphere_where
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `expert_cryosphere_where`;

CREATE TABLE `expert_cryosphere_where`
(
    `expert_id` int(10) unsigned NOT NULL,
    `cryosphere_where_id` int(10) unsigned NOT NULL,
    `timestamp` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (`expert_id`,`cryosphere_where_id`),
    INDEX `expert_cryosphere_where_fi_7f381c` (`cryosphere_where_id`),
    CONSTRAINT `expert_cryosphere_where_fk_023b7c`
        FOREIGN KEY (`expert_id`)
        REFERENCES `experts` (`id`)
        ON DELETE CASCADE,
    CONSTRAINT `expert_cryosphere_where_fk_7f381c`
        FOREIGN KEY (`cryosphere_where_id`)
        REFERENCES `cryosphere_where` (`id`)
        ON DELETE CASCADE
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- fieldwork
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `fieldwork`;

CREATE TABLE `fieldwork`
(
    `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
    `fieldwork_project_name` TEXT NOT NULL,
    `fieldwork_leader_name` TEXT NOT NULL,
    `fieldwork_leader_affiliation` TEXT,
    `fieldwork_leader_website` TEXT,
    `fieldwork_leader_email` TEXT NOT NULL,
    `fieldwork_project_website` TEXT,
    `cryosphere_where_id` int(10) unsigned NOT NULL,
    `fieldwork_locations` TEXT,
    `fieldwork_duration` int(4) unsigned,
    `fieldwork_start_date` DATE,
    `fieldwork_goal` TEXT,
    `fieldwork_information_seeker_limit` int(5) unsigned,
    `fieldwork_information_seeker_cost` int(10) unsigned,
    `fieldwork_biding_allowed` TINYINT(1) DEFAULT 0 NOT NULL,
    `fieldwork_information_seeker_package_included` TEXT,
    `fieldwork_information_seeker_package_excluded` TEXT,
    `fieldwork_is_certain` TINYINT(1) NOT NULL,
    `fieldwork_when_certain` DATE,
    `field_information_seeker_announcement_date` DATE,
    `field_information_seeker_deadline` DATE NOT NULL,
    `approved` TINYINT(1) DEFAULT 0 NOT NULL,
    `timestamp` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (`id`),
    INDEX `fieldwork_fi_7f381c` (`cryosphere_where_id`),
    CONSTRAINT `fieldwork_fk_7f381c`
        FOREIGN KEY (`cryosphere_where_id`)
        REFERENCES `cryosphere_where` (`id`)
        ON DELETE CASCADE
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- fieldwork_information_seeker
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `fieldwork_information_seeker`;

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

-- ---------------------------------------------------------------------
-- fieldwork_information_seeker_request
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `fieldwork_information_seeker_request`;

CREATE TABLE `fieldwork_information_seeker_request`
(
    `fieldwork_information_seeker_id` int(10) unsigned NOT NULL,
    `fieldwork_id` int(10) unsigned NOT NULL,
    `application_sent` TINYINT(1) DEFAULT 0 NOT NULL,
    `application_accepted` TINYINT(1) DEFAULT 0 NOT NULL,
    `bid` int(10) unsigned,
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

-- ---------------------------------------------------------------------
-- expert_languages
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `expert_languages`;

CREATE TABLE `expert_languages`
(
    `expert_id` int(10) unsigned NOT NULL,
    `language_code` VARCHAR(2) NOT NULL,
    `timestamp` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (`expert_id`,`language_code`),
    INDEX `expert_languages_fi_0fb9dd` (`language_code`),
    CONSTRAINT `expert_languages_fk_023b7c`
        FOREIGN KEY (`expert_id`)
        REFERENCES `experts` (`id`)
        ON DELETE CASCADE,
    CONSTRAINT `expert_languages_fk_0fb9dd`
        FOREIGN KEY (`language_code`)
        REFERENCES `languages` (`language_code`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- expert_primary_affiliation
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `expert_primary_affiliation`;

CREATE TABLE `expert_primary_affiliation`
(
    `expert_id` int(10) unsigned NOT NULL,
    `primary_affiliation_name` TEXT NOT NULL,
    `primary_affiliation_country_code` VARCHAR(2),
    `primary_affiliation_city` TEXT,
    `timestamp` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (`expert_id`),
    CONSTRAINT `expert_primary_affiliation_fk_023b7c`
        FOREIGN KEY (`expert_id`)
        REFERENCES `experts` (`id`)
        ON DELETE CASCADE
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- expert_secondary_affiliation
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `expert_secondary_affiliation`;

CREATE TABLE `expert_secondary_affiliation`
(
    `expert_id` int(10) unsigned NOT NULL,
    `secondary_affiliation_name` VARCHAR(255) NOT NULL,
    `timestamp` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (`expert_id`,`secondary_affiliation_name`),
    CONSTRAINT `expert_secondary_affiliation_fk_023b7c`
        FOREIGN KEY (`expert_id`)
        REFERENCES `experts` (`id`)
        ON DELETE CASCADE
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- experts
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `experts`;

CREATE TABLE `experts`
(
    `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
    `first_name` TEXT NOT NULL,
    `last_name` TEXT NOT NULL,
    `gender` VARCHAR(1) NOT NULL,
    `email` TEXT NOT NULL,
    `birth_year` INTEGER(4) NOT NULL,
    `country_code` VARCHAR(2) NOT NULL,
    `approved` TINYINT(1) DEFAULT 0 NOT NULL,
    `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (`id`),
    INDEX `experts_fi_6f4f33` (`country_code`),
    CONSTRAINT `experts_fk_6f4f33`
        FOREIGN KEY (`country_code`)
        REFERENCES `countries` (`country_code`)
        ON UPDATE CASCADE
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- information_seeker_affiliation
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `information_seeker_affiliation`;

CREATE TABLE `information_seeker_affiliation`
(
    `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
    `affiliation_name` TEXT NOT NULL,
    `information_seeker_id` int(11) unsigned NOT NULL,
    `timestamp` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (`id`),
    INDEX `information_seeker_affiliation_fi_77d198` (`information_seeker_id`),
    CONSTRAINT `information_seeker_affiliation_fk_77d198`
        FOREIGN KEY (`information_seeker_id`)
        REFERENCES `information_seekers` (`id`)
        ON DELETE CASCADE
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- information_seeker_connect_request
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `information_seeker_connect_request`;

CREATE TABLE `information_seeker_connect_request`
(
    `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
    `information_seeker_id` int(10) unsigned NOT NULL,
    `contact_purpose` TEXT NOT NULL,
    `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (`id`),
    INDEX `information_seeker_connect_request_fi_77d198` (`information_seeker_id`),
    CONSTRAINT `information_seeker_connect_request_fk_77d198`
        FOREIGN KEY (`information_seeker_id`)
        REFERENCES `information_seekers` (`id`)
        ON DELETE CASCADE
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- information_seeker_connect_request_cryosphere_what
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `information_seeker_connect_request_cryosphere_what`;

CREATE TABLE `information_seeker_connect_request_cryosphere_what`
(
    `information_seeker_connect_request_id` int(10) unsigned NOT NULL,
    `cryosphere_what_id` int(10) unsigned NOT NULL,
    `timestamp` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (`information_seeker_connect_request_id`,`cryosphere_what_id`),
    INDEX `information_seeker_connect_request_cryosphere_what_fi_e45748` (`cryosphere_what_id`),
    CONSTRAINT `information_seeker_connect_request_cryosphere_what_fk_185361`
        FOREIGN KEY (`information_seeker_connect_request_id`)
        REFERENCES `information_seeker_connect_request` (`id`)
        ON DELETE CASCADE,
    CONSTRAINT `information_seeker_connect_request_cryosphere_what_fk_e45748`
        FOREIGN KEY (`cryosphere_what_id`)
        REFERENCES `cryosphere_what` (`id`)
        ON UPDATE CASCADE
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- information_seeker_connect_request_cryosphere_where
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `information_seeker_connect_request_cryosphere_where`;

CREATE TABLE `information_seeker_connect_request_cryosphere_where`
(
    `information_seeker_connect_request_id` int(10) unsigned NOT NULL,
    `cryosphere_where_id` int(10) unsigned NOT NULL,
    `timestamp` DATETIME DEFAULT '0000-00-00 00:00:00' NOT NULL,
    PRIMARY KEY (`information_seeker_connect_request_id`,`cryosphere_where_id`),
    INDEX `information_seeker_connect_request_cryosphere_where_fi_7f381c` (`cryosphere_where_id`),
    CONSTRAINT `information_seeker_connect_request_cryosphere_where_fk_185361`
        FOREIGN KEY (`information_seeker_connect_request_id`)
        REFERENCES `information_seeker_connect_request` (`id`)
        ON DELETE CASCADE,
    CONSTRAINT `information_seeker_connect_request_cryosphere_where_fk_7f381c`
        FOREIGN KEY (`cryosphere_where_id`)
        REFERENCES `cryosphere_where` (`id`)
        ON UPDATE CASCADE
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- information_seeker_connect_request_languages
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `information_seeker_connect_request_languages`;

CREATE TABLE `information_seeker_connect_request_languages`
(
    `information_seeker_connect_request_id` int(10) unsigned NOT NULL,
    `language_code` VARCHAR(2) NOT NULL,
    `timestamp` DATETIME DEFAULT '0000-00-00 00:00:00' NOT NULL,
    PRIMARY KEY (`information_seeker_connect_request_id`,`language_code`),
    INDEX `information_seeker_connect_request_languages_fi_0fb9dd` (`language_code`),
    CONSTRAINT `information_seeker_connect_request_languages_fk_185361`
        FOREIGN KEY (`information_seeker_connect_request_id`)
        REFERENCES `information_seeker_connect_request` (`id`)
        ON DELETE CASCADE,
    CONSTRAINT `information_seeker_connect_request_languages_fk_0fb9dd`
        FOREIGN KEY (`language_code`)
        REFERENCES `languages` (`language_code`)
        ON UPDATE CASCADE
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- information_seeker_contact
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `information_seeker_contact`;

CREATE TABLE `information_seeker_contact`
(
    `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
    `contact_information` TEXT NOT NULL,
    `information_seeker_id` int(11) unsigned NOT NULL,
    `contact_type_id` int(11) unsigned NOT NULL,
    `timestamp` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (`id`,`information_seeker_id`,`contact_type_id`),
    INDEX `information_seeker_contact_fi_77d198` (`information_seeker_id`),
    INDEX `information_seeker_contact_fi_88838f` (`contact_type_id`),
    CONSTRAINT `information_seeker_contact_fk_77d198`
        FOREIGN KEY (`information_seeker_id`)
        REFERENCES `information_seekers` (`id`)
        ON DELETE CASCADE,
    CONSTRAINT `information_seeker_contact_fk_88838f`
        FOREIGN KEY (`contact_type_id`)
        REFERENCES `contact_types` (`id`)
        ON UPDATE CASCADE
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- information_seeker_languages
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `information_seeker_languages`;

CREATE TABLE `information_seeker_languages`
(
    `Information_seeker_id` int(10) unsigned NOT NULL,
    `language_code` VARCHAR(2) NOT NULL,
    `timestamp` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (`Information_seeker_id`,`language_code`),
    INDEX `information_seeker_languages_fi_0fb9dd` (`language_code`),
    CONSTRAINT `information_seeker_languages_ibfk_1`
        FOREIGN KEY (`Information_seeker_id`)
        REFERENCES `information_seekers` (`id`)
        ON DELETE CASCADE,
    CONSTRAINT `information_seeker_languages_fk_0fb9dd`
        FOREIGN KEY (`language_code`)
        REFERENCES `languages` (`language_code`)
        ON UPDATE CASCADE
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- information_seeker_profession
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `information_seeker_profession`;

CREATE TABLE `information_seeker_profession`
(
    `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
    `general_profession` TEXT NOT NULL,
    `information_seeker_id` int(10) unsigned NOT NULL,
    `timestamp` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (`id`),
    INDEX `information_seeker_profession_fi_77d198` (`information_seeker_id`),
    CONSTRAINT `information_seeker_profession_fk_77d198`
        FOREIGN KEY (`information_seeker_id`)
        REFERENCES `information_seekers` (`id`)
        ON DELETE CASCADE
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- information_seekers
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `information_seekers`;

CREATE TABLE `information_seekers`
(
    `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
    `first_name` TEXT NOT NULL,
    `last_name` TEXT NOT NULL,
    `email` TEXT NOT NULL,
    `country_code` CHAR(2) NOT NULL,
    `approved` TINYINT(1) DEFAULT 0 NOT NULL,
    `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (`id`),
    INDEX `information_seekers_fi_6f4f33` (`country_code`),
    CONSTRAINT `information_seekers_fk_6f4f33`
        FOREIGN KEY (`country_code`)
        REFERENCES `countries` (`country_code`)
        ON UPDATE CASCADE
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- languages
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `languages`;

CREATE TABLE `languages`
(
    `language_code` VARCHAR(2) NOT NULL,
    `language` VARCHAR(80),
    PRIMARY KEY (`language_code`)
) ENGINE=InnoDB;

# This restores the fkey checks, after having unset them earlier
SET FOREIGN_KEY_CHECKS = 1;
