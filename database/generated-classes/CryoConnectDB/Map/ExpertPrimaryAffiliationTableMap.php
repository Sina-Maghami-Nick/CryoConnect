<?php

namespace CryoConnectDB\Map;

use CryoConnectDB\ExpertPrimaryAffiliation;
use CryoConnectDB\ExpertPrimaryAffiliationQuery;
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
 * This class defines the structure of the 'expert_primary_affiliation' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class ExpertPrimaryAffiliationTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'CryoConnectDB.Map.ExpertPrimaryAffiliationTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'default';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'expert_primary_affiliation';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\CryoConnectDB\\ExpertPrimaryAffiliation';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'CryoConnectDB.ExpertPrimaryAffiliation';

    /**
     * The total number of columns
     */
    const NUM_COLUMNS = 5;

    /**
     * The number of lazy-loaded columns
     */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /**
     * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
     */
    const NUM_HYDRATE_COLUMNS = 5;

    /**
     * the column name for the expert_id field
     */
    const COL_EXPERT_ID = 'expert_primary_affiliation.expert_id';

    /**
     * the column name for the primary_affiliation_name field
     */
    const COL_PRIMARY_AFFILIATION_NAME = 'expert_primary_affiliation.primary_affiliation_name';

    /**
     * the column name for the primary_affiliation_country_code field
     */
    const COL_PRIMARY_AFFILIATION_COUNTRY_CODE = 'expert_primary_affiliation.primary_affiliation_country_code';

    /**
     * the column name for the primary_affiliation_city field
     */
    const COL_PRIMARY_AFFILIATION_CITY = 'expert_primary_affiliation.primary_affiliation_city';

    /**
     * the column name for the timestamp field
     */
    const COL_TIMESTAMP = 'expert_primary_affiliation.timestamp';

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
        self::TYPE_PHPNAME       => array('ExpertId', 'PrimaryAffiliationName', 'PrimaryAffiliationCountryCode', 'PrimaryAffiliationCity', 'Timestamp', ),
        self::TYPE_CAMELNAME     => array('expertId', 'primaryAffiliationName', 'primaryAffiliationCountryCode', 'primaryAffiliationCity', 'timestamp', ),
        self::TYPE_COLNAME       => array(ExpertPrimaryAffiliationTableMap::COL_EXPERT_ID, ExpertPrimaryAffiliationTableMap::COL_PRIMARY_AFFILIATION_NAME, ExpertPrimaryAffiliationTableMap::COL_PRIMARY_AFFILIATION_COUNTRY_CODE, ExpertPrimaryAffiliationTableMap::COL_PRIMARY_AFFILIATION_CITY, ExpertPrimaryAffiliationTableMap::COL_TIMESTAMP, ),
        self::TYPE_FIELDNAME     => array('expert_id', 'primary_affiliation_name', 'primary_affiliation_country_code', 'primary_affiliation_city', 'timestamp', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('ExpertId' => 0, 'PrimaryAffiliationName' => 1, 'PrimaryAffiliationCountryCode' => 2, 'PrimaryAffiliationCity' => 3, 'Timestamp' => 4, ),
        self::TYPE_CAMELNAME     => array('expertId' => 0, 'primaryAffiliationName' => 1, 'primaryAffiliationCountryCode' => 2, 'primaryAffiliationCity' => 3, 'timestamp' => 4, ),
        self::TYPE_COLNAME       => array(ExpertPrimaryAffiliationTableMap::COL_EXPERT_ID => 0, ExpertPrimaryAffiliationTableMap::COL_PRIMARY_AFFILIATION_NAME => 1, ExpertPrimaryAffiliationTableMap::COL_PRIMARY_AFFILIATION_COUNTRY_CODE => 2, ExpertPrimaryAffiliationTableMap::COL_PRIMARY_AFFILIATION_CITY => 3, ExpertPrimaryAffiliationTableMap::COL_TIMESTAMP => 4, ),
        self::TYPE_FIELDNAME     => array('expert_id' => 0, 'primary_affiliation_name' => 1, 'primary_affiliation_country_code' => 2, 'primary_affiliation_city' => 3, 'timestamp' => 4, ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, )
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
        $this->setName('expert_primary_affiliation');
        $this->setPhpName('ExpertPrimaryAffiliation');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\CryoConnectDB\\ExpertPrimaryAffiliation');
        $this->setPackage('CryoConnectDB');
        $this->setUseIdGenerator(false);
        // columns
        $this->addForeignPrimaryKey('expert_id', 'ExpertId', 'INTEGER' , 'experts', 'id', true, 10, null);
        $this->addColumn('primary_affiliation_name', 'PrimaryAffiliationName', 'LONGVARCHAR', true, null, null);
        $this->addColumn('primary_affiliation_country_code', 'PrimaryAffiliationCountryCode', 'VARCHAR', false, 2, null);
        $this->addColumn('primary_affiliation_city', 'PrimaryAffiliationCity', 'LONGVARCHAR', false, null, null);
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
        if ($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('ExpertId', TableMap::TYPE_PHPNAME, $indexType)] === null) {
            return null;
        }

        return null === $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('ExpertId', TableMap::TYPE_PHPNAME, $indexType)] || is_scalar($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('ExpertId', TableMap::TYPE_PHPNAME, $indexType)]) || is_callable([$row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('ExpertId', TableMap::TYPE_PHPNAME, $indexType)], '__toString']) ? (string) $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('ExpertId', TableMap::TYPE_PHPNAME, $indexType)] : $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('ExpertId', TableMap::TYPE_PHPNAME, $indexType)];
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
                : self::translateFieldName('ExpertId', TableMap::TYPE_PHPNAME, $indexType)
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
        return $withPrefix ? ExpertPrimaryAffiliationTableMap::CLASS_DEFAULT : ExpertPrimaryAffiliationTableMap::OM_CLASS;
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
     * @return array           (ExpertPrimaryAffiliation object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = ExpertPrimaryAffiliationTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = ExpertPrimaryAffiliationTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + ExpertPrimaryAffiliationTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = ExpertPrimaryAffiliationTableMap::OM_CLASS;
            /** @var ExpertPrimaryAffiliation $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            ExpertPrimaryAffiliationTableMap::addInstanceToPool($obj, $key);
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
            $key = ExpertPrimaryAffiliationTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = ExpertPrimaryAffiliationTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var ExpertPrimaryAffiliation $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                ExpertPrimaryAffiliationTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(ExpertPrimaryAffiliationTableMap::COL_EXPERT_ID);
            $criteria->addSelectColumn(ExpertPrimaryAffiliationTableMap::COL_PRIMARY_AFFILIATION_NAME);
            $criteria->addSelectColumn(ExpertPrimaryAffiliationTableMap::COL_PRIMARY_AFFILIATION_COUNTRY_CODE);
            $criteria->addSelectColumn(ExpertPrimaryAffiliationTableMap::COL_PRIMARY_AFFILIATION_CITY);
            $criteria->addSelectColumn(ExpertPrimaryAffiliationTableMap::COL_TIMESTAMP);
        } else {
            $criteria->addSelectColumn($alias . '.expert_id');
            $criteria->addSelectColumn($alias . '.primary_affiliation_name');
            $criteria->addSelectColumn($alias . '.primary_affiliation_country_code');
            $criteria->addSelectColumn($alias . '.primary_affiliation_city');
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
        return Propel::getServiceContainer()->getDatabaseMap(ExpertPrimaryAffiliationTableMap::DATABASE_NAME)->getTable(ExpertPrimaryAffiliationTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(ExpertPrimaryAffiliationTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(ExpertPrimaryAffiliationTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new ExpertPrimaryAffiliationTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a ExpertPrimaryAffiliation or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or ExpertPrimaryAffiliation object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(ExpertPrimaryAffiliationTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \CryoConnectDB\ExpertPrimaryAffiliation) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(ExpertPrimaryAffiliationTableMap::DATABASE_NAME);
            $criteria->add(ExpertPrimaryAffiliationTableMap::COL_EXPERT_ID, (array) $values, Criteria::IN);
        }

        $query = ExpertPrimaryAffiliationQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            ExpertPrimaryAffiliationTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                ExpertPrimaryAffiliationTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the expert_primary_affiliation table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return ExpertPrimaryAffiliationQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a ExpertPrimaryAffiliation or Criteria object.
     *
     * @param mixed               $criteria Criteria or ExpertPrimaryAffiliation object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(ExpertPrimaryAffiliationTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from ExpertPrimaryAffiliation object
        }


        // Set the correct dbName
        $query = ExpertPrimaryAffiliationQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // ExpertPrimaryAffiliationTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
ExpertPrimaryAffiliationTableMap::buildTableMap();
