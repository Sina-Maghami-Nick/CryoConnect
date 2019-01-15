<?php

namespace CryoConnectDB\Map;

use CryoConnectDB\ExpertSecondaryAffiliation;
use CryoConnectDB\ExpertSecondaryAffiliationQuery;
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
 * This class defines the structure of the 'expert_secondary_affiliation' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class ExpertSecondaryAffiliationTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'CryoConnectDB.Map.ExpertSecondaryAffiliationTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'default';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'expert_secondary_affiliation';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\CryoConnectDB\\ExpertSecondaryAffiliation';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'CryoConnectDB.ExpertSecondaryAffiliation';

    /**
     * The total number of columns
     */
    const NUM_COLUMNS = 3;

    /**
     * The number of lazy-loaded columns
     */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /**
     * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
     */
    const NUM_HYDRATE_COLUMNS = 3;

    /**
     * the column name for the expert_id field
     */
    const COL_EXPERT_ID = 'expert_secondary_affiliation.expert_id';

    /**
     * the column name for the secondary_affiliation_name field
     */
    const COL_SECONDARY_AFFILIATION_NAME = 'expert_secondary_affiliation.secondary_affiliation_name';

    /**
     * the column name for the timestamp field
     */
    const COL_TIMESTAMP = 'expert_secondary_affiliation.timestamp';

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
        self::TYPE_PHPNAME       => array('ExpertId', 'SecondaryAffiliationName', 'Timestamp', ),
        self::TYPE_CAMELNAME     => array('expertId', 'secondaryAffiliationName', 'timestamp', ),
        self::TYPE_COLNAME       => array(ExpertSecondaryAffiliationTableMap::COL_EXPERT_ID, ExpertSecondaryAffiliationTableMap::COL_SECONDARY_AFFILIATION_NAME, ExpertSecondaryAffiliationTableMap::COL_TIMESTAMP, ),
        self::TYPE_FIELDNAME     => array('expert_id', 'secondary_affiliation_name', 'timestamp', ),
        self::TYPE_NUM           => array(0, 1, 2, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('ExpertId' => 0, 'SecondaryAffiliationName' => 1, 'Timestamp' => 2, ),
        self::TYPE_CAMELNAME     => array('expertId' => 0, 'secondaryAffiliationName' => 1, 'timestamp' => 2, ),
        self::TYPE_COLNAME       => array(ExpertSecondaryAffiliationTableMap::COL_EXPERT_ID => 0, ExpertSecondaryAffiliationTableMap::COL_SECONDARY_AFFILIATION_NAME => 1, ExpertSecondaryAffiliationTableMap::COL_TIMESTAMP => 2, ),
        self::TYPE_FIELDNAME     => array('expert_id' => 0, 'secondary_affiliation_name' => 1, 'timestamp' => 2, ),
        self::TYPE_NUM           => array(0, 1, 2, )
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
        $this->setName('expert_secondary_affiliation');
        $this->setPhpName('ExpertSecondaryAffiliation');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\CryoConnectDB\\ExpertSecondaryAffiliation');
        $this->setPackage('CryoConnectDB');
        $this->setUseIdGenerator(false);
        $this->setIsCrossRef(true);
        // columns
        $this->addForeignPrimaryKey('expert_id', 'ExpertId', 'INTEGER' , 'experts', 'id', true, 10, null);
        $this->addPrimaryKey('secondary_affiliation_name', 'SecondaryAffiliationName', 'VARCHAR', true, 255, null);
        $this->addColumn('timestamp', 'Timestamp', 'TIMESTAMP', true, null, 'CURRENT_TIMESTAMP');
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('Experts', '\\CryoConnectDB\\Experts', RelationMap::MANY_TO_ONE, array (
  0 =>
  array (
    0 => ':expert_id',
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
     * @param \CryoConnectDB\ExpertSecondaryAffiliation $obj A \CryoConnectDB\ExpertSecondaryAffiliation object.
     * @param string $key             (optional) key to use for instance map (for performance boost if key was already calculated externally).
     */
    public static function addInstanceToPool($obj, $key = null)
    {
        if (Propel::isInstancePoolingEnabled()) {
            if (null === $key) {
                $key = serialize([(null === $obj->getExpertId() || is_scalar($obj->getExpertId()) || is_callable([$obj->getExpertId(), '__toString']) ? (string) $obj->getExpertId() : $obj->getExpertId()), (null === $obj->getSecondaryAffiliationName() || is_scalar($obj->getSecondaryAffiliationName()) || is_callable([$obj->getSecondaryAffiliationName(), '__toString']) ? (string) $obj->getSecondaryAffiliationName() : $obj->getSecondaryAffiliationName())]);
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
     * @param mixed $value A \CryoConnectDB\ExpertSecondaryAffiliation object or a primary key value.
     */
    public static function removeInstanceFromPool($value)
    {
        if (Propel::isInstancePoolingEnabled() && null !== $value) {
            if (is_object($value) && $value instanceof \CryoConnectDB\ExpertSecondaryAffiliation) {
                $key = serialize([(null === $value->getExpertId() || is_scalar($value->getExpertId()) || is_callable([$value->getExpertId(), '__toString']) ? (string) $value->getExpertId() : $value->getExpertId()), (null === $value->getSecondaryAffiliationName() || is_scalar($value->getSecondaryAffiliationName()) || is_callable([$value->getSecondaryAffiliationName(), '__toString']) ? (string) $value->getSecondaryAffiliationName() : $value->getSecondaryAffiliationName())]);

            } elseif (is_array($value) && count($value) === 2) {
                // assume we've been passed a primary key";
                $key = serialize([(null === $value[0] || is_scalar($value[0]) || is_callable([$value[0], '__toString']) ? (string) $value[0] : $value[0]), (null === $value[1] || is_scalar($value[1]) || is_callable([$value[1], '__toString']) ? (string) $value[1] : $value[1])]);
            } elseif ($value instanceof Criteria) {
                self::$instances = [];

                return;
            } else {
                $e = new PropelException("Invalid value passed to removeInstanceFromPool().  Expected primary key or \CryoConnectDB\ExpertSecondaryAffiliation object; got " . (is_object($value) ? get_class($value) . ' object.' : var_export($value, true)));
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
        if ($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('ExpertId', TableMap::TYPE_PHPNAME, $indexType)] === null && $row[TableMap::TYPE_NUM == $indexType ? 1 + $offset : static::translateFieldName('SecondaryAffiliationName', TableMap::TYPE_PHPNAME, $indexType)] === null) {
            return null;
        }

        return serialize([(null === $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('ExpertId', TableMap::TYPE_PHPNAME, $indexType)] || is_scalar($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('ExpertId', TableMap::TYPE_PHPNAME, $indexType)]) || is_callable([$row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('ExpertId', TableMap::TYPE_PHPNAME, $indexType)], '__toString']) ? (string) $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('ExpertId', TableMap::TYPE_PHPNAME, $indexType)] : $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('ExpertId', TableMap::TYPE_PHPNAME, $indexType)]), (null === $row[TableMap::TYPE_NUM == $indexType ? 1 + $offset : static::translateFieldName('SecondaryAffiliationName', TableMap::TYPE_PHPNAME, $indexType)] || is_scalar($row[TableMap::TYPE_NUM == $indexType ? 1 + $offset : static::translateFieldName('SecondaryAffiliationName', TableMap::TYPE_PHPNAME, $indexType)]) || is_callable([$row[TableMap::TYPE_NUM == $indexType ? 1 + $offset : static::translateFieldName('SecondaryAffiliationName', TableMap::TYPE_PHPNAME, $indexType)], '__toString']) ? (string) $row[TableMap::TYPE_NUM == $indexType ? 1 + $offset : static::translateFieldName('SecondaryAffiliationName', TableMap::TYPE_PHPNAME, $indexType)] : $row[TableMap::TYPE_NUM == $indexType ? 1 + $offset : static::translateFieldName('SecondaryAffiliationName', TableMap::TYPE_PHPNAME, $indexType)])]);
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
                : self::translateFieldName('ExpertId', TableMap::TYPE_PHPNAME, $indexType)
        ];
        $pks[] = (string) $row[
            $indexType == TableMap::TYPE_NUM
                ? 1 + $offset
                : self::translateFieldName('SecondaryAffiliationName', TableMap::TYPE_PHPNAME, $indexType)
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
        return $withPrefix ? ExpertSecondaryAffiliationTableMap::CLASS_DEFAULT : ExpertSecondaryAffiliationTableMap::OM_CLASS;
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
     * @return array           (ExpertSecondaryAffiliation object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = ExpertSecondaryAffiliationTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = ExpertSecondaryAffiliationTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + ExpertSecondaryAffiliationTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = ExpertSecondaryAffiliationTableMap::OM_CLASS;
            /** @var ExpertSecondaryAffiliation $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            ExpertSecondaryAffiliationTableMap::addInstanceToPool($obj, $key);
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
            $key = ExpertSecondaryAffiliationTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = ExpertSecondaryAffiliationTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var ExpertSecondaryAffiliation $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                ExpertSecondaryAffiliationTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(ExpertSecondaryAffiliationTableMap::COL_EXPERT_ID);
            $criteria->addSelectColumn(ExpertSecondaryAffiliationTableMap::COL_SECONDARY_AFFILIATION_NAME);
            $criteria->addSelectColumn(ExpertSecondaryAffiliationTableMap::COL_TIMESTAMP);
        } else {
            $criteria->addSelectColumn($alias . '.expert_id');
            $criteria->addSelectColumn($alias . '.secondary_affiliation_name');
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
        return Propel::getServiceContainer()->getDatabaseMap(ExpertSecondaryAffiliationTableMap::DATABASE_NAME)->getTable(ExpertSecondaryAffiliationTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(ExpertSecondaryAffiliationTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(ExpertSecondaryAffiliationTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new ExpertSecondaryAffiliationTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a ExpertSecondaryAffiliation or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or ExpertSecondaryAffiliation object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(ExpertSecondaryAffiliationTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \CryoConnectDB\ExpertSecondaryAffiliation) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(ExpertSecondaryAffiliationTableMap::DATABASE_NAME);
            // primary key is composite; we therefore, expect
            // the primary key passed to be an array of pkey values
            if (count($values) == count($values, COUNT_RECURSIVE)) {
                // array is not multi-dimensional
                $values = array($values);
            }
            foreach ($values as $value) {
                $criterion = $criteria->getNewCriterion(ExpertSecondaryAffiliationTableMap::COL_EXPERT_ID, $value[0]);
                $criterion->addAnd($criteria->getNewCriterion(ExpertSecondaryAffiliationTableMap::COL_SECONDARY_AFFILIATION_NAME, $value[1]));
                $criteria->addOr($criterion);
            }
        }

        $query = ExpertSecondaryAffiliationQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            ExpertSecondaryAffiliationTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                ExpertSecondaryAffiliationTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the expert_secondary_affiliation table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return ExpertSecondaryAffiliationQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a ExpertSecondaryAffiliation or Criteria object.
     *
     * @param mixed               $criteria Criteria or ExpertSecondaryAffiliation object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(ExpertSecondaryAffiliationTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from ExpertSecondaryAffiliation object
        }


        // Set the correct dbName
        $query = ExpertSecondaryAffiliationQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // ExpertSecondaryAffiliationTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
ExpertSecondaryAffiliationTableMap::buildTableMap();
