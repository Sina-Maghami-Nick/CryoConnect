<?php

namespace CryoConnectDB\Map;

use CryoConnectDB\FieldworkInformationSeeker;
use CryoConnectDB\FieldworkInformationSeekerQuery;
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
 * This class defines the structure of the 'fieldwork_information_seeker' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class FieldworkInformationSeekerTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'CryoConnectDB.Map.FieldworkInformationSeekerTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'default';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'fieldwork_information_seeker';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\CryoConnectDB\\FieldworkInformationSeeker';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'CryoConnectDB.FieldworkInformationSeeker';

    /**
     * The total number of columns
     */
    const NUM_COLUMNS = 9;

    /**
     * The number of lazy-loaded columns
     */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /**
     * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
     */
    const NUM_HYDRATE_COLUMNS = 9;

    /**
     * the column name for the id field
     */
    const COL_ID = 'fieldwork_information_seeker.id';

    /**
     * the column name for the information_seeker_name field
     */
    const COL_INFORMATION_SEEKER_NAME = 'fieldwork_information_seeker.information_seeker_name';

    /**
     * the column name for the information_seeker_affiliation field
     */
    const COL_INFORMATION_SEEKER_AFFILIATION = 'fieldwork_information_seeker.information_seeker_affiliation';

    /**
     * the column name for the information_seeker_website field
     */
    const COL_INFORMATION_SEEKER_WEBSITE = 'fieldwork_information_seeker.information_seeker_website';

    /**
     * the column name for the information_seeker_email field
     */
    const COL_INFORMATION_SEEKER_EMAIL = 'fieldwork_information_seeker.information_seeker_email';

    /**
     * the column name for the information_seeker_affiliation_website field
     */
    const COL_INFORMATION_SEEKER_AFFILIATION_WEBSITE = 'fieldwork_information_seeker.information_seeker_affiliation_website';

    /**
     * the column name for the information_seeker_reasons field
     */
    const COL_INFORMATION_SEEKER_REASONS = 'fieldwork_information_seeker.information_seeker_reasons';

    /**
     * the column name for the approved field
     */
    const COL_APPROVED = 'fieldwork_information_seeker.approved';

    /**
     * the column name for the timestamp field
     */
    const COL_TIMESTAMP = 'fieldwork_information_seeker.timestamp';

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
        self::TYPE_PHPNAME       => array('Id', 'InformationSeekerName', 'InformationSeekerAffiliation', 'InformationSeekerWebsite', 'InformationSeekerEmail', 'InformationSeekerAffiliationWebsite', 'InformationSeekerReasons', 'Approved', 'Timestamp', ),
        self::TYPE_CAMELNAME     => array('id', 'informationSeekerName', 'informationSeekerAffiliation', 'informationSeekerWebsite', 'informationSeekerEmail', 'informationSeekerAffiliationWebsite', 'informationSeekerReasons', 'approved', 'timestamp', ),
        self::TYPE_COLNAME       => array(FieldworkInformationSeekerTableMap::COL_ID, FieldworkInformationSeekerTableMap::COL_INFORMATION_SEEKER_NAME, FieldworkInformationSeekerTableMap::COL_INFORMATION_SEEKER_AFFILIATION, FieldworkInformationSeekerTableMap::COL_INFORMATION_SEEKER_WEBSITE, FieldworkInformationSeekerTableMap::COL_INFORMATION_SEEKER_EMAIL, FieldworkInformationSeekerTableMap::COL_INFORMATION_SEEKER_AFFILIATION_WEBSITE, FieldworkInformationSeekerTableMap::COL_INFORMATION_SEEKER_REASONS, FieldworkInformationSeekerTableMap::COL_APPROVED, FieldworkInformationSeekerTableMap::COL_TIMESTAMP, ),
        self::TYPE_FIELDNAME     => array('id', 'information_seeker_name', 'information_seeker_affiliation', 'information_seeker_website', 'information_seeker_email', 'information_seeker_affiliation_website', 'information_seeker_reasons', 'approved', 'timestamp', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('Id' => 0, 'InformationSeekerName' => 1, 'InformationSeekerAffiliation' => 2, 'InformationSeekerWebsite' => 3, 'InformationSeekerEmail' => 4, 'InformationSeekerAffiliationWebsite' => 5, 'InformationSeekerReasons' => 6, 'Approved' => 7, 'Timestamp' => 8, ),
        self::TYPE_CAMELNAME     => array('id' => 0, 'informationSeekerName' => 1, 'informationSeekerAffiliation' => 2, 'informationSeekerWebsite' => 3, 'informationSeekerEmail' => 4, 'informationSeekerAffiliationWebsite' => 5, 'informationSeekerReasons' => 6, 'approved' => 7, 'timestamp' => 8, ),
        self::TYPE_COLNAME       => array(FieldworkInformationSeekerTableMap::COL_ID => 0, FieldworkInformationSeekerTableMap::COL_INFORMATION_SEEKER_NAME => 1, FieldworkInformationSeekerTableMap::COL_INFORMATION_SEEKER_AFFILIATION => 2, FieldworkInformationSeekerTableMap::COL_INFORMATION_SEEKER_WEBSITE => 3, FieldworkInformationSeekerTableMap::COL_INFORMATION_SEEKER_EMAIL => 4, FieldworkInformationSeekerTableMap::COL_INFORMATION_SEEKER_AFFILIATION_WEBSITE => 5, FieldworkInformationSeekerTableMap::COL_INFORMATION_SEEKER_REASONS => 6, FieldworkInformationSeekerTableMap::COL_APPROVED => 7, FieldworkInformationSeekerTableMap::COL_TIMESTAMP => 8, ),
        self::TYPE_FIELDNAME     => array('id' => 0, 'information_seeker_name' => 1, 'information_seeker_affiliation' => 2, 'information_seeker_website' => 3, 'information_seeker_email' => 4, 'information_seeker_affiliation_website' => 5, 'information_seeker_reasons' => 6, 'approved' => 7, 'timestamp' => 8, ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, )
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
        $this->setName('fieldwork_information_seeker');
        $this->setPhpName('FieldworkInformationSeeker');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\CryoConnectDB\\FieldworkInformationSeeker');
        $this->setPackage('CryoConnectDB');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id', 'Id', 'INTEGER', true, 10, null);
        $this->addColumn('information_seeker_name', 'InformationSeekerName', 'LONGVARCHAR', true, null, null);
        $this->addColumn('information_seeker_affiliation', 'InformationSeekerAffiliation', 'LONGVARCHAR', true, null, null);
        $this->addColumn('information_seeker_website', 'InformationSeekerWebsite', 'LONGVARCHAR', true, null, null);
        $this->addColumn('information_seeker_email', 'InformationSeekerEmail', 'LONGVARCHAR', true, null, null);
        $this->addColumn('information_seeker_affiliation_website', 'InformationSeekerAffiliationWebsite', 'LONGVARCHAR', true, null, null);
        $this->addColumn('information_seeker_reasons', 'InformationSeekerReasons', 'LONGVARCHAR', false, null, null);
        $this->addColumn('approved', 'Approved', 'BOOLEAN', true, 1, false);
        $this->addColumn('timestamp', 'Timestamp', 'TIMESTAMP', true, null, 'CURRENT_TIMESTAMP');
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('FieldworkInformationSeekerRequest', '\\CryoConnectDB\\FieldworkInformationSeekerRequest', RelationMap::ONE_TO_MANY, array (
  0 =>
  array (
    0 => ':fieldwork_information_seeker_id',
    1 => ':id',
  ),
), 'CASCADE', null, 'FieldworkInformationSeekerRequests', false);
        $this->addRelation('Fieldwork', '\\CryoConnectDB\\Fieldwork', RelationMap::MANY_TO_MANY, array(), 'CASCADE', null, 'Fieldworks');
    } // buildRelations()
    /**
     * Method to invalidate the instance pool of all tables related to fieldwork_information_seeker     * by a foreign key with ON DELETE CASCADE
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
        return $withPrefix ? FieldworkInformationSeekerTableMap::CLASS_DEFAULT : FieldworkInformationSeekerTableMap::OM_CLASS;
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
     * @return array           (FieldworkInformationSeeker object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = FieldworkInformationSeekerTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = FieldworkInformationSeekerTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + FieldworkInformationSeekerTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = FieldworkInformationSeekerTableMap::OM_CLASS;
            /** @var FieldworkInformationSeeker $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            FieldworkInformationSeekerTableMap::addInstanceToPool($obj, $key);
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
            $key = FieldworkInformationSeekerTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = FieldworkInformationSeekerTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var FieldworkInformationSeeker $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                FieldworkInformationSeekerTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(FieldworkInformationSeekerTableMap::COL_ID);
            $criteria->addSelectColumn(FieldworkInformationSeekerTableMap::COL_INFORMATION_SEEKER_NAME);
            $criteria->addSelectColumn(FieldworkInformationSeekerTableMap::COL_INFORMATION_SEEKER_AFFILIATION);
            $criteria->addSelectColumn(FieldworkInformationSeekerTableMap::COL_INFORMATION_SEEKER_WEBSITE);
            $criteria->addSelectColumn(FieldworkInformationSeekerTableMap::COL_INFORMATION_SEEKER_EMAIL);
            $criteria->addSelectColumn(FieldworkInformationSeekerTableMap::COL_INFORMATION_SEEKER_AFFILIATION_WEBSITE);
            $criteria->addSelectColumn(FieldworkInformationSeekerTableMap::COL_INFORMATION_SEEKER_REASONS);
            $criteria->addSelectColumn(FieldworkInformationSeekerTableMap::COL_APPROVED);
            $criteria->addSelectColumn(FieldworkInformationSeekerTableMap::COL_TIMESTAMP);
        } else {
            $criteria->addSelectColumn($alias . '.id');
            $criteria->addSelectColumn($alias . '.information_seeker_name');
            $criteria->addSelectColumn($alias . '.information_seeker_affiliation');
            $criteria->addSelectColumn($alias . '.information_seeker_website');
            $criteria->addSelectColumn($alias . '.information_seeker_email');
            $criteria->addSelectColumn($alias . '.information_seeker_affiliation_website');
            $criteria->addSelectColumn($alias . '.information_seeker_reasons');
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
        return Propel::getServiceContainer()->getDatabaseMap(FieldworkInformationSeekerTableMap::DATABASE_NAME)->getTable(FieldworkInformationSeekerTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(FieldworkInformationSeekerTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(FieldworkInformationSeekerTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new FieldworkInformationSeekerTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a FieldworkInformationSeeker or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or FieldworkInformationSeeker object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(FieldworkInformationSeekerTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \CryoConnectDB\FieldworkInformationSeeker) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(FieldworkInformationSeekerTableMap::DATABASE_NAME);
            $criteria->add(FieldworkInformationSeekerTableMap::COL_ID, (array) $values, Criteria::IN);
        }

        $query = FieldworkInformationSeekerQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            FieldworkInformationSeekerTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                FieldworkInformationSeekerTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the fieldwork_information_seeker table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return FieldworkInformationSeekerQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a FieldworkInformationSeeker or Criteria object.
     *
     * @param mixed               $criteria Criteria or FieldworkInformationSeeker object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(FieldworkInformationSeekerTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from FieldworkInformationSeeker object
        }

        if ($criteria->containsKey(FieldworkInformationSeekerTableMap::COL_ID) && $criteria->keyContainsValue(FieldworkInformationSeekerTableMap::COL_ID) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.FieldworkInformationSeekerTableMap::COL_ID.')');
        }


        // Set the correct dbName
        $query = FieldworkInformationSeekerQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // FieldworkInformationSeekerTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
FieldworkInformationSeekerTableMap::buildTableMap();
