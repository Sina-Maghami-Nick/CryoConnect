<?php

namespace CryoConnectDB\Map;

use CryoConnectDB\FieldworkInformationSeekerRequest;
use CryoConnectDB\FieldworkInformationSeekerRequestQuery;
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
 * This class defines the structure of the 'fieldwork_information_seeker_request' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class FieldworkInformationSeekerRequestTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'CryoConnectDB.Map.FieldworkInformationSeekerRequestTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'default';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'fieldwork_information_seeker_request';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\CryoConnectDB\\FieldworkInformationSeekerRequest';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'CryoConnectDB.FieldworkInformationSeekerRequest';

    /**
     * The total number of columns
     */
    const NUM_COLUMNS = 6;

    /**
     * The number of lazy-loaded columns
     */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /**
     * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
     */
    const NUM_HYDRATE_COLUMNS = 6;

    /**
     * the column name for the fieldwork_information_seeker_id field
     */
    const COL_FIELDWORK_INFORMATION_SEEKER_ID = 'fieldwork_information_seeker_request.fieldwork_information_seeker_id';

    /**
     * the column name for the fieldwork_id field
     */
    const COL_FIELDWORK_ID = 'fieldwork_information_seeker_request.fieldwork_id';

    /**
     * the column name for the application_sent field
     */
    const COL_APPLICATION_SENT = 'fieldwork_information_seeker_request.application_sent';

    /**
     * the column name for the application_accepted field
     */
    const COL_APPLICATION_ACCEPTED = 'fieldwork_information_seeker_request.application_accepted';

    /**
     * the column name for the bid field
     */
    const COL_BID = 'fieldwork_information_seeker_request.bid';

    /**
     * the column name for the timestamp field
     */
    const COL_TIMESTAMP = 'fieldwork_information_seeker_request.timestamp';

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
        self::TYPE_PHPNAME       => array('FieldworkInformationSeekerId', 'FieldworkId', 'ApplicationSent', 'ApplicationAccepted', 'Bid', 'Timestamp', ),
        self::TYPE_CAMELNAME     => array('fieldworkInformationSeekerId', 'fieldworkId', 'applicationSent', 'applicationAccepted', 'bid', 'timestamp', ),
        self::TYPE_COLNAME       => array(FieldworkInformationSeekerRequestTableMap::COL_FIELDWORK_INFORMATION_SEEKER_ID, FieldworkInformationSeekerRequestTableMap::COL_FIELDWORK_ID, FieldworkInformationSeekerRequestTableMap::COL_APPLICATION_SENT, FieldworkInformationSeekerRequestTableMap::COL_APPLICATION_ACCEPTED, FieldworkInformationSeekerRequestTableMap::COL_BID, FieldworkInformationSeekerRequestTableMap::COL_TIMESTAMP, ),
        self::TYPE_FIELDNAME     => array('fieldwork_information_seeker_id', 'fieldwork_id', 'application_sent', 'application_accepted', 'bid', 'timestamp', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('FieldworkInformationSeekerId' => 0, 'FieldworkId' => 1, 'ApplicationSent' => 2, 'ApplicationAccepted' => 3, 'Bid' => 4, 'Timestamp' => 5, ),
        self::TYPE_CAMELNAME     => array('fieldworkInformationSeekerId' => 0, 'fieldworkId' => 1, 'applicationSent' => 2, 'applicationAccepted' => 3, 'bid' => 4, 'timestamp' => 5, ),
        self::TYPE_COLNAME       => array(FieldworkInformationSeekerRequestTableMap::COL_FIELDWORK_INFORMATION_SEEKER_ID => 0, FieldworkInformationSeekerRequestTableMap::COL_FIELDWORK_ID => 1, FieldworkInformationSeekerRequestTableMap::COL_APPLICATION_SENT => 2, FieldworkInformationSeekerRequestTableMap::COL_APPLICATION_ACCEPTED => 3, FieldworkInformationSeekerRequestTableMap::COL_BID => 4, FieldworkInformationSeekerRequestTableMap::COL_TIMESTAMP => 5, ),
        self::TYPE_FIELDNAME     => array('fieldwork_information_seeker_id' => 0, 'fieldwork_id' => 1, 'application_sent' => 2, 'application_accepted' => 3, 'bid' => 4, 'timestamp' => 5, ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, )
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
        $this->setName('fieldwork_information_seeker_request');
        $this->setPhpName('FieldworkInformationSeekerRequest');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\CryoConnectDB\\FieldworkInformationSeekerRequest');
        $this->setPackage('CryoConnectDB');
        $this->setUseIdGenerator(false);
        $this->setIsCrossRef(true);
        // columns
        $this->addForeignPrimaryKey('fieldwork_information_seeker_id', 'FieldworkInformationSeekerId', 'INTEGER' , 'fieldwork_information_seeker', 'id', true, 10, null);
        $this->addForeignPrimaryKey('fieldwork_id', 'FieldworkId', 'INTEGER' , 'fieldwork', 'id', true, 10, null);
        $this->addColumn('application_sent', 'ApplicationSent', 'BOOLEAN', true, 1, false);
        $this->addColumn('application_accepted', 'ApplicationAccepted', 'BOOLEAN', true, 1, false);
        $this->addColumn('bid', 'Bid', 'INTEGER', false, null, null);
        $this->addColumn('timestamp', 'Timestamp', 'TIMESTAMP', true, null, 'CURRENT_TIMESTAMP');
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('FieldworkInformationSeeker', '\\CryoConnectDB\\FieldworkInformationSeeker', RelationMap::MANY_TO_ONE, array (
  0 =>
  array (
    0 => ':fieldwork_information_seeker_id',
    1 => ':id',
  ),
), 'CASCADE', null, null, false);
        $this->addRelation('Fieldwork', '\\CryoConnectDB\\Fieldwork', RelationMap::MANY_TO_ONE, array (
  0 =>
  array (
    0 => ':fieldwork_id',
    1 => ':id',
  ),
), 'CASCADE', null, null, false);
    } // buildRelations()

    /**
     * Adds an object to the instance pool.
     *
     * Propel keeps cached copies of objects in an instance pool when they are retrieved
     * from the database. In some cases you may need to explicitly add objects
     * to the cache in order to ensure that the same objects are always returned by find*()
     * and findPk*() calls.
     *
     * @param \CryoConnectDB\FieldworkInformationSeekerRequest $obj A \CryoConnectDB\FieldworkInformationSeekerRequest object.
     * @param string $key             (optional) key to use for instance map (for performance boost if key was already calculated externally).
     */
    public static function addInstanceToPool($obj, $key = null)
    {
        if (Propel::isInstancePoolingEnabled()) {
            if (null === $key) {
                $key = serialize([(null === $obj->getFieldworkInformationSeekerId() || is_scalar($obj->getFieldworkInformationSeekerId()) || is_callable([$obj->getFieldworkInformationSeekerId(), '__toString']) ? (string) $obj->getFieldworkInformationSeekerId() : $obj->getFieldworkInformationSeekerId()), (null === $obj->getFieldworkId() || is_scalar($obj->getFieldworkId()) || is_callable([$obj->getFieldworkId(), '__toString']) ? (string) $obj->getFieldworkId() : $obj->getFieldworkId())]);
            } // if key === null
            self::$instances[$key] = $obj;
        }
    }

    /**
     * Removes an object from the instance pool.
     *
     * Propel keeps cached copies of objects in an instance pool when they are retrieved
     * from the database.  In some cases -- especially when you override doDelete
     * methods in your stub classes -- you may need to explicitly remove objects
     * from the cache in order to prevent returning objects that no longer exist.
     *
     * @param mixed $value A \CryoConnectDB\FieldworkInformationSeekerRequest object or a primary key value.
     */
    public static function removeInstanceFromPool($value)
    {
        if (Propel::isInstancePoolingEnabled() && null !== $value) {
            if (is_object($value) && $value instanceof \CryoConnectDB\FieldworkInformationSeekerRequest) {
                $key = serialize([(null === $value->getFieldworkInformationSeekerId() || is_scalar($value->getFieldworkInformationSeekerId()) || is_callable([$value->getFieldworkInformationSeekerId(), '__toString']) ? (string) $value->getFieldworkInformationSeekerId() : $value->getFieldworkInformationSeekerId()), (null === $value->getFieldworkId() || is_scalar($value->getFieldworkId()) || is_callable([$value->getFieldworkId(), '__toString']) ? (string) $value->getFieldworkId() : $value->getFieldworkId())]);

            } elseif (is_array($value) && count($value) === 2) {
                // assume we've been passed a primary key";
                $key = serialize([(null === $value[0] || is_scalar($value[0]) || is_callable([$value[0], '__toString']) ? (string) $value[0] : $value[0]), (null === $value[1] || is_scalar($value[1]) || is_callable([$value[1], '__toString']) ? (string) $value[1] : $value[1])]);
            } elseif ($value instanceof Criteria) {
                self::$instances = [];

                return;
            } else {
                $e = new PropelException("Invalid value passed to removeInstanceFromPool().  Expected primary key or \CryoConnectDB\FieldworkInformationSeekerRequest object; got " . (is_object($value) ? get_class($value) . ' object.' : var_export($value, true)));
                throw $e;
            }

            unset(self::$instances[$key]);
        }
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
        if ($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('FieldworkInformationSeekerId', TableMap::TYPE_PHPNAME, $indexType)] === null && $row[TableMap::TYPE_NUM == $indexType ? 1 + $offset : static::translateFieldName('FieldworkId', TableMap::TYPE_PHPNAME, $indexType)] === null) {
            return null;
        }

        return serialize([(null === $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('FieldworkInformationSeekerId', TableMap::TYPE_PHPNAME, $indexType)] || is_scalar($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('FieldworkInformationSeekerId', TableMap::TYPE_PHPNAME, $indexType)]) || is_callable([$row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('FieldworkInformationSeekerId', TableMap::TYPE_PHPNAME, $indexType)], '__toString']) ? (string) $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('FieldworkInformationSeekerId', TableMap::TYPE_PHPNAME, $indexType)] : $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('FieldworkInformationSeekerId', TableMap::TYPE_PHPNAME, $indexType)]), (null === $row[TableMap::TYPE_NUM == $indexType ? 1 + $offset : static::translateFieldName('FieldworkId', TableMap::TYPE_PHPNAME, $indexType)] || is_scalar($row[TableMap::TYPE_NUM == $indexType ? 1 + $offset : static::translateFieldName('FieldworkId', TableMap::TYPE_PHPNAME, $indexType)]) || is_callable([$row[TableMap::TYPE_NUM == $indexType ? 1 + $offset : static::translateFieldName('FieldworkId', TableMap::TYPE_PHPNAME, $indexType)], '__toString']) ? (string) $row[TableMap::TYPE_NUM == $indexType ? 1 + $offset : static::translateFieldName('FieldworkId', TableMap::TYPE_PHPNAME, $indexType)] : $row[TableMap::TYPE_NUM == $indexType ? 1 + $offset : static::translateFieldName('FieldworkId', TableMap::TYPE_PHPNAME, $indexType)])]);
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
            $pks = [];

        $pks[] = (int) $row[
            $indexType == TableMap::TYPE_NUM
                ? 0 + $offset
                : self::translateFieldName('FieldworkInformationSeekerId', TableMap::TYPE_PHPNAME, $indexType)
        ];
        $pks[] = (int) $row[
            $indexType == TableMap::TYPE_NUM
                ? 1 + $offset
                : self::translateFieldName('FieldworkId', TableMap::TYPE_PHPNAME, $indexType)
        ];

        return $pks;
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
        return $withPrefix ? FieldworkInformationSeekerRequestTableMap::CLASS_DEFAULT : FieldworkInformationSeekerRequestTableMap::OM_CLASS;
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
     * @return array           (FieldworkInformationSeekerRequest object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = FieldworkInformationSeekerRequestTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = FieldworkInformationSeekerRequestTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + FieldworkInformationSeekerRequestTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = FieldworkInformationSeekerRequestTableMap::OM_CLASS;
            /** @var FieldworkInformationSeekerRequest $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            FieldworkInformationSeekerRequestTableMap::addInstanceToPool($obj, $key);
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
            $key = FieldworkInformationSeekerRequestTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = FieldworkInformationSeekerRequestTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var FieldworkInformationSeekerRequest $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                FieldworkInformationSeekerRequestTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(FieldworkInformationSeekerRequestTableMap::COL_FIELDWORK_INFORMATION_SEEKER_ID);
            $criteria->addSelectColumn(FieldworkInformationSeekerRequestTableMap::COL_FIELDWORK_ID);
            $criteria->addSelectColumn(FieldworkInformationSeekerRequestTableMap::COL_APPLICATION_SENT);
            $criteria->addSelectColumn(FieldworkInformationSeekerRequestTableMap::COL_APPLICATION_ACCEPTED);
            $criteria->addSelectColumn(FieldworkInformationSeekerRequestTableMap::COL_BID);
            $criteria->addSelectColumn(FieldworkInformationSeekerRequestTableMap::COL_TIMESTAMP);
        } else {
            $criteria->addSelectColumn($alias . '.fieldwork_information_seeker_id');
            $criteria->addSelectColumn($alias . '.fieldwork_id');
            $criteria->addSelectColumn($alias . '.application_sent');
            $criteria->addSelectColumn($alias . '.application_accepted');
            $criteria->addSelectColumn($alias . '.bid');
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
        return Propel::getServiceContainer()->getDatabaseMap(FieldworkInformationSeekerRequestTableMap::DATABASE_NAME)->getTable(FieldworkInformationSeekerRequestTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(FieldworkInformationSeekerRequestTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(FieldworkInformationSeekerRequestTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new FieldworkInformationSeekerRequestTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a FieldworkInformationSeekerRequest or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or FieldworkInformationSeekerRequest object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(FieldworkInformationSeekerRequestTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \CryoConnectDB\FieldworkInformationSeekerRequest) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(FieldworkInformationSeekerRequestTableMap::DATABASE_NAME);
            // primary key is composite; we therefore, expect
            // the primary key passed to be an array of pkey values
            if (count($values) == count($values, COUNT_RECURSIVE)) {
                // array is not multi-dimensional
                $values = array($values);
            }
            foreach ($values as $value) {
                $criterion = $criteria->getNewCriterion(FieldworkInformationSeekerRequestTableMap::COL_FIELDWORK_INFORMATION_SEEKER_ID, $value[0]);
                $criterion->addAnd($criteria->getNewCriterion(FieldworkInformationSeekerRequestTableMap::COL_FIELDWORK_ID, $value[1]));
                $criteria->addOr($criterion);
            }
        }

        $query = FieldworkInformationSeekerRequestQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            FieldworkInformationSeekerRequestTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                FieldworkInformationSeekerRequestTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the fieldwork_information_seeker_request table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return FieldworkInformationSeekerRequestQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a FieldworkInformationSeekerRequest or Criteria object.
     *
     * @param mixed               $criteria Criteria or FieldworkInformationSeekerRequest object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(FieldworkInformationSeekerRequestTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from FieldworkInformationSeekerRequest object
        }


        // Set the correct dbName
        $query = FieldworkInformationSeekerRequestQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // FieldworkInformationSeekerRequestTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
FieldworkInformationSeekerRequestTableMap::buildTableMap();
