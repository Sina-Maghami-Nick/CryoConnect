<?php

namespace CryoConnectDB\Map;

use CryoConnectDB\Fieldwork;
use CryoConnectDB\FieldworkQuery;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\InstancePoolTrait;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\DataFetcher\DataFetcherInterface;
use Propel\Runtime\Exception\PropelException;
use Propel\Runtime\Map\RelationMap;
use Propel\Runtime\Map\TableMap;
use Propel\Runtime\Map\TableMapTrait;


/**
 * This class defines the structure of the 'fieldwork' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class FieldworkTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'CryoConnectDB.Map.FieldworkTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'default';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'fieldwork';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\CryoConnectDB\\Fieldwork';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'CryoConnectDB.Fieldwork';

    /**
     * The total number of columns
     */
    const NUM_COLUMNS = 23;

    /**
     * The number of lazy-loaded columns
     */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /**
     * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
     */
    const NUM_HYDRATE_COLUMNS = 23;

    /**
     * the column name for the id field
     */
    const COL_ID = 'fieldwork.id';

    /**
     * the column name for the fieldwork_project_name field
     */
    const COL_FIELDWORK_PROJECT_NAME = 'fieldwork.fieldwork_project_name';

    /**
     * the column name for the fieldwork_leader_name field
     */
    const COL_FIELDWORK_LEADER_NAME = 'fieldwork.fieldwork_leader_name';

    /**
     * the column name for the fieldwork_leader_affiliation field
     */
    const COL_FIELDWORK_LEADER_AFFILIATION = 'fieldwork.fieldwork_leader_affiliation';

    /**
     * the column name for the fieldwork_leader_website field
     */
    const COL_FIELDWORK_LEADER_WEBSITE = 'fieldwork.fieldwork_leader_website';

    /**
     * the column name for the fieldwork_leader_email field
     */
    const COL_FIELDWORK_LEADER_EMAIL = 'fieldwork.fieldwork_leader_email';

    /**
     * the column name for the fieldwork_project_website field
     */
    const COL_FIELDWORK_PROJECT_WEBSITE = 'fieldwork.fieldwork_project_website';

    /**
     * the column name for the cryosphere_where_id field
     */
    const COL_CRYOSPHERE_WHERE_ID = 'fieldwork.cryosphere_where_id';

    /**
     * the column name for the fieldwork_locations field
     */
    const COL_FIELDWORK_LOCATIONS = 'fieldwork.fieldwork_locations';

    /**
     * the column name for the fieldwork_end_date field
     */
    const COL_FIELDWORK_END_DATE = 'fieldwork.fieldwork_end_date';

    /**
     * the column name for the fieldwork_start_date field
     */
    const COL_FIELDWORK_START_DATE = 'fieldwork.fieldwork_start_date';

    /**
     * the column name for the fieldwork_goal field
     */
    const COL_FIELDWORK_GOAL = 'fieldwork.fieldwork_goal';

    /**
     * the column name for the fieldwork_information_seeker_limit field
     */
    const COL_FIELDWORK_INFORMATION_SEEKER_LIMIT = 'fieldwork.fieldwork_information_seeker_limit';

    /**
     * the column name for the fieldwork_information_seeker_cost field
     */
    const COL_FIELDWORK_INFORMATION_SEEKER_COST = 'fieldwork.fieldwork_information_seeker_cost';

    /**
     * the column name for the fieldwork_biding_allowed field
     */
    const COL_FIELDWORK_BIDING_ALLOWED = 'fieldwork.fieldwork_biding_allowed';

    /**
     * the column name for the fieldwork_information_seeker_package_included field
     */
    const COL_FIELDWORK_INFORMATION_SEEKER_PACKAGE_INCLUDED = 'fieldwork.fieldwork_information_seeker_package_included';

    /**
     * the column name for the fieldwork_information_seeker_package_excluded field
     */
    const COL_FIELDWORK_INFORMATION_SEEKER_PACKAGE_EXCLUDED = 'fieldwork.fieldwork_information_seeker_package_excluded';

    /**
     * the column name for the fieldwork_is_certain field
     */
    const COL_FIELDWORK_IS_CERTAIN = 'fieldwork.fieldwork_is_certain';

    /**
     * the column name for the fieldwork_when_certain field
     */
    const COL_FIELDWORK_WHEN_CERTAIN = 'fieldwork.fieldwork_when_certain';

    /**
     * the column name for the field_information_seeker_announcement_date field
     */
    const COL_FIELD_INFORMATION_SEEKER_ANNOUNCEMENT_DATE = 'fieldwork.field_information_seeker_announcement_date';

    /**
     * the column name for the field_information_seeker_deadline field
     */
    const COL_FIELD_INFORMATION_SEEKER_DEADLINE = 'fieldwork.field_information_seeker_deadline';

    /**
     * the column name for the approved field
     */
    const COL_APPROVED = 'fieldwork.approved';

    /**
     * the column name for the timestamp field
     */
    const COL_TIMESTAMP = 'fieldwork.timestamp';

    /**
     * The default string format for model objects of the related table
     */
    const DEFAULT_STRING_FORMAT = 'YAML';

    /**
     * holds an array of fieldnames
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldNames[self::TYPE_PHPNAME][0] = 'Id'
     */
    protected static $fieldNames = array (
        self::TYPE_PHPNAME       => array('Id', 'FieldworkName', 'FieldworkLeaderName', 'FieldworkLeaderAffiliation', 'FieldworkLeaderWebsite', 'FieldworkLeaderEmail', 'FieldworkProjectWebsite', 'CryosphereWhereId', 'FieldworkLocations', 'FieldworkEndDate', 'FieldworkStartDate', 'FieldworkGoal', 'FieldworkInformationSeekerLimit', 'FieldworkInformationSeekerCost', 'FieldworkBidingAllowed', 'FieldworkInformationSeekerPackageIncluded', 'FieldworkInformationSeekerPackageExcluded', 'FieldworkIsCertain', 'FieldworkWhenCertain', 'FieldworkInformationSeekerAnnouncementDate', 'FieldworkInformationSeekerDeadline', 'Approved', 'Timestamp', ),
        self::TYPE_CAMELNAME     => array('id', 'fieldworkName', 'fieldworkLeaderName', 'fieldworkLeaderAffiliation', 'fieldworkLeaderWebsite', 'fieldworkLeaderEmail', 'fieldworkProjectWebsite', 'cryosphereWhereId', 'fieldworkLocations', 'fieldworkEndDate', 'fieldworkStartDate', 'fieldworkGoal', 'fieldworkInformationSeekerLimit', 'fieldworkInformationSeekerCost', 'fieldworkBidingAllowed', 'fieldworkInformationSeekerPackageIncluded', 'fieldworkInformationSeekerPackageExcluded', 'fieldworkIsCertain', 'fieldworkWhenCertain', 'fieldworkInformationSeekerAnnouncementDate', 'fieldworkInformationSeekerDeadline', 'approved', 'timestamp', ),
        self::TYPE_COLNAME       => array(FieldworkTableMap::COL_ID, FieldworkTableMap::COL_FIELDWORK_PROJECT_NAME, FieldworkTableMap::COL_FIELDWORK_LEADER_NAME, FieldworkTableMap::COL_FIELDWORK_LEADER_AFFILIATION, FieldworkTableMap::COL_FIELDWORK_LEADER_WEBSITE, FieldworkTableMap::COL_FIELDWORK_LEADER_EMAIL, FieldworkTableMap::COL_FIELDWORK_PROJECT_WEBSITE, FieldworkTableMap::COL_CRYOSPHERE_WHERE_ID, FieldworkTableMap::COL_FIELDWORK_LOCATIONS, FieldworkTableMap::COL_FIELDWORK_END_DATE, FieldworkTableMap::COL_FIELDWORK_START_DATE, FieldworkTableMap::COL_FIELDWORK_GOAL, FieldworkTableMap::COL_FIELDWORK_INFORMATION_SEEKER_LIMIT, FieldworkTableMap::COL_FIELDWORK_INFORMATION_SEEKER_COST, FieldworkTableMap::COL_FIELDWORK_BIDING_ALLOWED, FieldworkTableMap::COL_FIELDWORK_INFORMATION_SEEKER_PACKAGE_INCLUDED, FieldworkTableMap::COL_FIELDWORK_INFORMATION_SEEKER_PACKAGE_EXCLUDED, FieldworkTableMap::COL_FIELDWORK_IS_CERTAIN, FieldworkTableMap::COL_FIELDWORK_WHEN_CERTAIN, FieldworkTableMap::COL_FIELD_INFORMATION_SEEKER_ANNOUNCEMENT_DATE, FieldworkTableMap::COL_FIELD_INFORMATION_SEEKER_DEADLINE, FieldworkTableMap::COL_APPROVED, FieldworkTableMap::COL_TIMESTAMP, ),
        self::TYPE_FIELDNAME     => array('id', 'fieldwork_project_name', 'fieldwork_leader_name', 'fieldwork_leader_affiliation', 'fieldwork_leader_website', 'fieldwork_leader_email', 'fieldwork_project_website', 'cryosphere_where_id', 'fieldwork_locations', 'fieldwork_end_date', 'fieldwork_start_date', 'fieldwork_goal', 'fieldwork_information_seeker_limit', 'fieldwork_information_seeker_cost', 'fieldwork_biding_allowed', 'fieldwork_information_seeker_package_included', 'fieldwork_information_seeker_package_excluded', 'fieldwork_is_certain', 'fieldwork_when_certain', 'field_information_seeker_announcement_date', 'field_information_seeker_deadline', 'approved', 'timestamp', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('Id' => 0, 'FieldworkName' => 1, 'FieldworkLeaderName' => 2, 'FieldworkLeaderAffiliation' => 3, 'FieldworkLeaderWebsite' => 4, 'FieldworkLeaderEmail' => 5, 'FieldworkProjectWebsite' => 6, 'CryosphereWhereId' => 7, 'FieldworkLocations' => 8, 'FieldworkEndDate' => 9, 'FieldworkStartDate' => 10, 'FieldworkGoal' => 11, 'FieldworkInformationSeekerLimit' => 12, 'FieldworkInformationSeekerCost' => 13, 'FieldworkBidingAllowed' => 14, 'FieldworkInformationSeekerPackageIncluded' => 15, 'FieldworkInformationSeekerPackageExcluded' => 16, 'FieldworkIsCertain' => 17, 'FieldworkWhenCertain' => 18, 'FieldworkInformationSeekerAnnouncementDate' => 19, 'FieldworkInformationSeekerDeadline' => 20, 'Approved' => 21, 'Timestamp' => 22, ),
        self::TYPE_CAMELNAME     => array('id' => 0, 'fieldworkName' => 1, 'fieldworkLeaderName' => 2, 'fieldworkLeaderAffiliation' => 3, 'fieldworkLeaderWebsite' => 4, 'fieldworkLeaderEmail' => 5, 'fieldworkProjectWebsite' => 6, 'cryosphereWhereId' => 7, 'fieldworkLocations' => 8, 'fieldworkEndDate' => 9, 'fieldworkStartDate' => 10, 'fieldworkGoal' => 11, 'fieldworkInformationSeekerLimit' => 12, 'fieldworkInformationSeekerCost' => 13, 'fieldworkBidingAllowed' => 14, 'fieldworkInformationSeekerPackageIncluded' => 15, 'fieldworkInformationSeekerPackageExcluded' => 16, 'fieldworkIsCertain' => 17, 'fieldworkWhenCertain' => 18, 'fieldworkInformationSeekerAnnouncementDate' => 19, 'fieldworkInformationSeekerDeadline' => 20, 'approved' => 21, 'timestamp' => 22, ),
        self::TYPE_COLNAME       => array(FieldworkTableMap::COL_ID => 0, FieldworkTableMap::COL_FIELDWORK_PROJECT_NAME => 1, FieldworkTableMap::COL_FIELDWORK_LEADER_NAME => 2, FieldworkTableMap::COL_FIELDWORK_LEADER_AFFILIATION => 3, FieldworkTableMap::COL_FIELDWORK_LEADER_WEBSITE => 4, FieldworkTableMap::COL_FIELDWORK_LEADER_EMAIL => 5, FieldworkTableMap::COL_FIELDWORK_PROJECT_WEBSITE => 6, FieldworkTableMap::COL_CRYOSPHERE_WHERE_ID => 7, FieldworkTableMap::COL_FIELDWORK_LOCATIONS => 8, FieldworkTableMap::COL_FIELDWORK_END_DATE => 9, FieldworkTableMap::COL_FIELDWORK_START_DATE => 10, FieldworkTableMap::COL_FIELDWORK_GOAL => 11, FieldworkTableMap::COL_FIELDWORK_INFORMATION_SEEKER_LIMIT => 12, FieldworkTableMap::COL_FIELDWORK_INFORMATION_SEEKER_COST => 13, FieldworkTableMap::COL_FIELDWORK_BIDING_ALLOWED => 14, FieldworkTableMap::COL_FIELDWORK_INFORMATION_SEEKER_PACKAGE_INCLUDED => 15, FieldworkTableMap::COL_FIELDWORK_INFORMATION_SEEKER_PACKAGE_EXCLUDED => 16, FieldworkTableMap::COL_FIELDWORK_IS_CERTAIN => 17, FieldworkTableMap::COL_FIELDWORK_WHEN_CERTAIN => 18, FieldworkTableMap::COL_FIELD_INFORMATION_SEEKER_ANNOUNCEMENT_DATE => 19, FieldworkTableMap::COL_FIELD_INFORMATION_SEEKER_DEADLINE => 20, FieldworkTableMap::COL_APPROVED => 21, FieldworkTableMap::COL_TIMESTAMP => 22, ),
        self::TYPE_FIELDNAME     => array('id' => 0, 'fieldwork_project_name' => 1, 'fieldwork_leader_name' => 2, 'fieldwork_leader_affiliation' => 3, 'fieldwork_leader_website' => 4, 'fieldwork_leader_email' => 5, 'fieldwork_project_website' => 6, 'cryosphere_where_id' => 7, 'fieldwork_locations' => 8, 'fieldwork_end_date' => 9, 'fieldwork_start_date' => 10, 'fieldwork_goal' => 11, 'fieldwork_information_seeker_limit' => 12, 'fieldwork_information_seeker_cost' => 13, 'fieldwork_biding_allowed' => 14, 'fieldwork_information_seeker_package_included' => 15, 'fieldwork_information_seeker_package_excluded' => 16, 'fieldwork_is_certain' => 17, 'fieldwork_when_certain' => 18, 'field_information_seeker_announcement_date' => 19, 'field_information_seeker_deadline' => 20, 'approved' => 21, 'timestamp' => 22, ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, )
    );

    /**
     * Initialize the table attributes and columns
     * Relations are not initialized by this method since they are lazy loaded
     *
     * @return void
     * @throws PropelException
     */
    public function initialize()
    {
        // attributes
        $this->setName('fieldwork');
        $this->setPhpName('Fieldwork');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\CryoConnectDB\\Fieldwork');
        $this->setPackage('CryoConnectDB');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id', 'Id', 'INTEGER', true, 10, null);
        $this->addColumn('fieldwork_project_name', 'FieldworkName', 'LONGVARCHAR', true, null, null);
        $this->addColumn('fieldwork_leader_name', 'FieldworkLeaderName', 'LONGVARCHAR', true, null, null);
        $this->addColumn('fieldwork_leader_affiliation', 'FieldworkLeaderAffiliation', 'LONGVARCHAR', false, null, null);
        $this->addColumn('fieldwork_leader_website', 'FieldworkLeaderWebsite', 'LONGVARCHAR', false, null, null);
        $this->addColumn('fieldwork_leader_email', 'FieldworkLeaderEmail', 'LONGVARCHAR', true, null, null);
        $this->addColumn('fieldwork_project_website', 'FieldworkProjectWebsite', 'LONGVARCHAR', false, null, null);
        $this->addForeignKey('cryosphere_where_id', 'CryosphereWhereId', 'INTEGER', 'cryosphere_where', 'id', true, 10, null);
        $this->addColumn('fieldwork_locations', 'FieldworkLocations', 'LONGVARCHAR', false, null, null);
        $this->addColumn('fieldwork_end_date', 'FieldworkEndDate', 'DATE', false, null, null);
        $this->addColumn('fieldwork_start_date', 'FieldworkStartDate', 'DATE', false, null, null);
        $this->addColumn('fieldwork_goal', 'FieldworkGoal', 'LONGVARCHAR', false, null, null);
        $this->addColumn('fieldwork_information_seeker_limit', 'FieldworkInformationSeekerLimit', 'INTEGER', false, null, null);
        $this->addColumn('fieldwork_information_seeker_cost', 'FieldworkInformationSeekerCost', 'INTEGER', false, null, null);
        $this->addColumn('fieldwork_biding_allowed', 'FieldworkBidingAllowed', 'BOOLEAN', true, 1, false);
        $this->addColumn('fieldwork_information_seeker_package_included', 'FieldworkInformationSeekerPackageIncluded', 'LONGVARCHAR', false, null, null);
        $this->addColumn('fieldwork_information_seeker_package_excluded', 'FieldworkInformationSeekerPackageExcluded', 'LONGVARCHAR', false, null, null);
        $this->addColumn('fieldwork_is_certain', 'FieldworkIsCertain', 'BOOLEAN', true, 1, null);
        $this->addColumn('fieldwork_when_certain', 'FieldworkWhenCertain', 'DATE', false, null, null);
        $this->addColumn('field_information_seeker_announcement_date', 'FieldworkInformationSeekerAnnouncementDate', 'DATE', false, null, null);
        $this->addColumn('field_information_seeker_deadline', 'FieldworkInformationSeekerDeadline', 'DATE', true, null, null);
        $this->addColumn('approved', 'Approved', 'BOOLEAN', true, 1, false);
        $this->addColumn('timestamp', 'Timestamp', 'TIMESTAMP', true, null, 'CURRENT_TIMESTAMP');
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('CryosphereWhere', '\\CryoConnectDB\\CryosphereWhere', RelationMap::MANY_TO_ONE, array (
  0 =>
  array (
    0 => ':cryosphere_where_id',
    1 => ':id',
  ),
), 'CASCADE', null, null, false);
        $this->addRelation('FieldworkInformationSeekerRequest', '\\CryoConnectDB\\FieldworkInformationSeekerRequest', RelationMap::ONE_TO_MANY, array (
  0 =>
  array (
    0 => ':fieldwork_id',
    1 => ':id',
  ),
), 'CASCADE', null, 'FieldworkInformationSeekerRequests', false);
        $this->addRelation('FieldworkInformationSeeker', '\\CryoConnectDB\\FieldworkInformationSeeker', RelationMap::MANY_TO_MANY, array(), 'CASCADE', null, 'FieldworkInformationSeekers');
    } // buildRelations()
    /**
     * Method to invalidate the instance pool of all tables related to fieldwork     * by a foreign key with ON DELETE CASCADE
     */
    public static function clearRelatedInstancePool()
    {
        // Invalidate objects in related instance pools,
        // since one or more of them may be deleted by ON DELETE CASCADE/SETNULL rule.
        FieldworkInformationSeekerRequestTableMap::clearInstancePool();
    }

    /**
     * Retrieves a string version of the primary key from the DB resultset row that can be used to uniquely identify a row in this table.
     *
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, a serialize()d version of the primary key will be returned.
     *
     * @param array  $row       resultset row.
     * @param int    $offset    The 0-based offset for reading from the resultset row.
     * @param string $indexType One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                           TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM
     *
     * @return string The primary key hash of the row
     */
    public static function getPrimaryKeyHashFromRow($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        // If the PK cannot be derived from the row, return NULL.
        if ($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)] === null) {
            return null;
        }

        return null === $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)] || is_scalar($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)]) || is_callable([$row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)], '__toString']) ? (string) $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)] : $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)];
    }

    /**
     * Retrieves the primary key from the DB resultset row
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, an array of the primary key columns will be returned.
     *
     * @param array  $row       resultset row.
     * @param int    $offset    The 0-based offset for reading from the resultset row.
     * @param string $indexType One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                           TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM
     *
     * @return mixed The primary key of the row
     */
    public static function getPrimaryKeyFromRow($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        return (int) $row[
            $indexType == TableMap::TYPE_NUM
                ? 0 + $offset
                : self::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)
        ];
    }

    /**
     * The class that the tableMap will make instances of.
     *
     * If $withPrefix is true, the returned path
     * uses a dot-path notation which is translated into a path
     * relative to a location on the PHP include_path.
     * (e.g. path.to.MyClass -> 'path/to/MyClass.php')
     *
     * @param boolean $withPrefix Whether or not to return the path with the class name
     * @return string path.to.ClassName
     */
    public static function getOMClass($withPrefix = true)
    {
        return $withPrefix ? FieldworkTableMap::CLASS_DEFAULT : FieldworkTableMap::OM_CLASS;
    }

    /**
     * Populates an object of the default type or an object that inherit from the default.
     *
     * @param array  $row       row returned by DataFetcher->fetch().
     * @param int    $offset    The 0-based offset for reading from the resultset row.
     * @param string $indexType The index type of $row. Mostly DataFetcher->getIndexType().
                                 One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                           TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     *
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     * @return array           (Fieldwork object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = FieldworkTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = FieldworkTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + FieldworkTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = FieldworkTableMap::OM_CLASS;
            /** @var Fieldwork $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            FieldworkTableMap::addInstanceToPool($obj, $key);
        }

        return array($obj, $col);
    }

    /**
     * The returned array will contain objects of the default type or
     * objects that inherit from the default.
     *
     * @param DataFetcherInterface $dataFetcher
     * @return array
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function populateObjects(DataFetcherInterface $dataFetcher)
    {
        $results = array();

        // set the class once to avoid overhead in the loop
        $cls = static::getOMClass(false);
        // populate the object(s)
        while ($row = $dataFetcher->fetch()) {
            $key = FieldworkTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = FieldworkTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var Fieldwork $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                FieldworkTableMap::addInstanceToPool($obj, $key);
            } // if key exists
        }

        return $results;
    }
    /**
     * Add all the columns needed to create a new object.
     *
     * Note: any columns that were marked with lazyLoad="true" in the
     * XML schema will not be added to the select list and only loaded
     * on demand.
     *
     * @param Criteria $criteria object containing the columns to add.
     * @param string   $alias    optional table alias
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function addSelectColumns(Criteria $criteria, $alias = null)
    {
        if (null === $alias) {
            $criteria->addSelectColumn(FieldworkTableMap::COL_ID);
            $criteria->addSelectColumn(FieldworkTableMap::COL_FIELDWORK_PROJECT_NAME);
            $criteria->addSelectColumn(FieldworkTableMap::COL_FIELDWORK_LEADER_NAME);
            $criteria->addSelectColumn(FieldworkTableMap::COL_FIELDWORK_LEADER_AFFILIATION);
            $criteria->addSelectColumn(FieldworkTableMap::COL_FIELDWORK_LEADER_WEBSITE);
            $criteria->addSelectColumn(FieldworkTableMap::COL_FIELDWORK_LEADER_EMAIL);
            $criteria->addSelectColumn(FieldworkTableMap::COL_FIELDWORK_PROJECT_WEBSITE);
            $criteria->addSelectColumn(FieldworkTableMap::COL_CRYOSPHERE_WHERE_ID);
            $criteria->addSelectColumn(FieldworkTableMap::COL_FIELDWORK_LOCATIONS);
            $criteria->addSelectColumn(FieldworkTableMap::COL_FIELDWORK_END_DATE);
            $criteria->addSelectColumn(FieldworkTableMap::COL_FIELDWORK_START_DATE);
            $criteria->addSelectColumn(FieldworkTableMap::COL_FIELDWORK_GOAL);
            $criteria->addSelectColumn(FieldworkTableMap::COL_FIELDWORK_INFORMATION_SEEKER_LIMIT);
            $criteria->addSelectColumn(FieldworkTableMap::COL_FIELDWORK_INFORMATION_SEEKER_COST);
            $criteria->addSelectColumn(FieldworkTableMap::COL_FIELDWORK_BIDING_ALLOWED);
            $criteria->addSelectColumn(FieldworkTableMap::COL_FIELDWORK_INFORMATION_SEEKER_PACKAGE_INCLUDED);
            $criteria->addSelectColumn(FieldworkTableMap::COL_FIELDWORK_INFORMATION_SEEKER_PACKAGE_EXCLUDED);
            $criteria->addSelectColumn(FieldworkTableMap::COL_FIELDWORK_IS_CERTAIN);
            $criteria->addSelectColumn(FieldworkTableMap::COL_FIELDWORK_WHEN_CERTAIN);
            $criteria->addSelectColumn(FieldworkTableMap::COL_FIELD_INFORMATION_SEEKER_ANNOUNCEMENT_DATE);
            $criteria->addSelectColumn(FieldworkTableMap::COL_FIELD_INFORMATION_SEEKER_DEADLINE);
            $criteria->addSelectColumn(FieldworkTableMap::COL_APPROVED);
            $criteria->addSelectColumn(FieldworkTableMap::COL_TIMESTAMP);
        } else {
            $criteria->addSelectColumn($alias . '.id');
            $criteria->addSelectColumn($alias . '.fieldwork_project_name');
            $criteria->addSelectColumn($alias . '.fieldwork_leader_name');
            $criteria->addSelectColumn($alias . '.fieldwork_leader_affiliation');
            $criteria->addSelectColumn($alias . '.fieldwork_leader_website');
            $criteria->addSelectColumn($alias . '.fieldwork_leader_email');
            $criteria->addSelectColumn($alias . '.fieldwork_project_website');
            $criteria->addSelectColumn($alias . '.cryosphere_where_id');
            $criteria->addSelectColumn($alias . '.fieldwork_locations');
            $criteria->addSelectColumn($alias . '.fieldwork_end_date');
            $criteria->addSelectColumn($alias . '.fieldwork_start_date');
            $criteria->addSelectColumn($alias . '.fieldwork_goal');
            $criteria->addSelectColumn($alias . '.fieldwork_information_seeker_limit');
            $criteria->addSelectColumn($alias . '.fieldwork_information_seeker_cost');
            $criteria->addSelectColumn($alias . '.fieldwork_biding_allowed');
            $criteria->addSelectColumn($alias . '.fieldwork_information_seeker_package_included');
            $criteria->addSelectColumn($alias . '.fieldwork_information_seeker_package_excluded');
            $criteria->addSelectColumn($alias . '.fieldwork_is_certain');
            $criteria->addSelectColumn($alias . '.fieldwork_when_certain');
            $criteria->addSelectColumn($alias . '.field_information_seeker_announcement_date');
            $criteria->addSelectColumn($alias . '.field_information_seeker_deadline');
            $criteria->addSelectColumn($alias . '.approved');
            $criteria->addSelectColumn($alias . '.timestamp');
        }
    }

    /**
     * Returns the TableMap related to this object.
     * This method is not needed for general use but a specific application could have a need.
     * @return TableMap
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function getTableMap()
    {
        return Propel::getServiceContainer()->getDatabaseMap(FieldworkTableMap::DATABASE_NAME)->getTable(FieldworkTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(FieldworkTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(FieldworkTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new FieldworkTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a Fieldwork or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or Fieldwork object or primary key or array of primary keys
     *              which is used to create the DELETE statement
     * @param  ConnectionInterface $con the connection to use
     * @return int             The number of affected rows (if supported by underlying database driver).  This includes CASCADE-related rows
     *                         if supported by native driver or if emulated using Propel.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
     public static function doDelete($values, ConnectionInterface $con = null)
     {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(FieldworkTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \CryoConnectDB\Fieldwork) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(FieldworkTableMap::DATABASE_NAME);
            $criteria->add(FieldworkTableMap::COL_ID, (array) $values, Criteria::IN);
        }

        $query = FieldworkQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            FieldworkTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                FieldworkTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the fieldwork table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return FieldworkQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a Fieldwork or Criteria object.
     *
     * @param mixed               $criteria Criteria or Fieldwork object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(FieldworkTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from Fieldwork object
        }

        if ($criteria->containsKey(FieldworkTableMap::COL_ID) && $criteria->keyContainsValue(FieldworkTableMap::COL_ID) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.FieldworkTableMap::COL_ID.')');
        }


        // Set the correct dbName
        $query = FieldworkQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // FieldworkTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
FieldworkTableMap::buildTableMap();
