<?php

namespace Map;

use \InformationSeekerAffiliation;
use \InformationSeekerAffiliationQuery;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\InstancePoolTrait;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\DataFetcher\DataFetcherInterface;
use Propel\Runtime\Exception\LogicException;
use Propel\Runtime\Exception\PropelException;
use Propel\Runtime\Map\RelationMap;
use Propel\Runtime\Map\TableMap;
use Propel\Runtime\Map\TableMapTrait;


/**
 * This class defines the structure of the 'information_seeker_affiliation' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class InformationSeekerAffiliationTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = '.Map.InformationSeekerAffiliationTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'cryo_connect';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'information_seeker_affiliation';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\InformationSeekerAffiliation';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'InformationSeekerAffiliation';

    /**
     * The total number of columns
     */
    const NUM_COLUMNS = 4;

    /**
     * The number of lazy-loaded columns
     */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /**
     * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
     */
    const NUM_HYDRATE_COLUMNS = 4;

    /**
     * the column name for the id field
     */
    const COL_ID = 'information_seeker_affiliation.id';

    /**
     * the column name for the affiliation_name field
     */
    const COL_AFFILIATION_NAME = 'information_seeker_affiliation.affiliation_name';

    /**
     * the column name for the information_seeker_id field
     */
    const COL_INFORMATION_SEEKER_ID = 'information_seeker_affiliation.information_seeker_id';

    /**
     * the column name for the timestamp field
     */
    const COL_TIMESTAMP = 'information_seeker_affiliation.timestamp';

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
        self::TYPE_PHPNAME       => array('Id', 'AffiliationName', 'InformationSeekerId', 'Timestamp', ),
        self::TYPE_CAMELNAME     => array('id', 'affiliationName', 'informationSeekerId', 'timestamp', ),
        self::TYPE_COLNAME       => array(InformationSeekerAffiliationTableMap::COL_ID, InformationSeekerAffiliationTableMap::COL_AFFILIATION_NAME, InformationSeekerAffiliationTableMap::COL_INFORMATION_SEEKER_ID, InformationSeekerAffiliationTableMap::COL_TIMESTAMP, ),
        self::TYPE_FIELDNAME     => array('id', 'affiliation_name', 'information_seeker_id', 'timestamp', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('Id' => 0, 'AffiliationName' => 1, 'InformationSeekerId' => 2, 'Timestamp' => 3, ),
        self::TYPE_CAMELNAME     => array('id' => 0, 'affiliationName' => 1, 'informationSeekerId' => 2, 'timestamp' => 3, ),
        self::TYPE_COLNAME       => array(InformationSeekerAffiliationTableMap::COL_ID => 0, InformationSeekerAffiliationTableMap::COL_AFFILIATION_NAME => 1, InformationSeekerAffiliationTableMap::COL_INFORMATION_SEEKER_ID => 2, InformationSeekerAffiliationTableMap::COL_TIMESTAMP => 3, ),
        self::TYPE_FIELDNAME     => array('id' => 0, 'affiliation_name' => 1, 'information_seeker_id' => 2, 'timestamp' => 3, ),
        self::TYPE_NUM           => array(0, 1, 2, 3, )
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
        $this->setName('information_seeker_affiliation');
        $this->setPhpName('InformationSeekerAffiliation');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\InformationSeekerAffiliation');
        $this->setPackage('');
        $this->setUseIdGenerator(true);
        // columns
        $this->addColumn('id', 'Id', 'INTEGER', true, 10, null);
        $this->addColumn('affiliation_name', 'AffiliationName', 'LONGVARCHAR', true, null, null);
        $this->addForeignKey('information_seeker_id', 'InformationSeekerId', 'INTEGER', 'information_seekers', 'id', true, null, null);
        $this->addColumn('timestamp', 'Timestamp', 'TIMESTAMP', true, null, 'CURRENT_TIMESTAMP');
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('InformationSeekers', '\\InformationSeekers', RelationMap::MANY_TO_ONE, array (
  0 =>
  array (
    0 => ':information_seeker_id',
    1 => ':id',
  ),
), 'CASCADE', 'CASCADE', null, false);
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
        return null;
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
        return '';
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
        return $withPrefix ? InformationSeekerAffiliationTableMap::CLASS_DEFAULT : InformationSeekerAffiliationTableMap::OM_CLASS;
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
     * @return array           (InformationSeekerAffiliation object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = InformationSeekerAffiliationTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = InformationSeekerAffiliationTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + InformationSeekerAffiliationTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = InformationSeekerAffiliationTableMap::OM_CLASS;
            /** @var InformationSeekerAffiliation $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            InformationSeekerAffiliationTableMap::addInstanceToPool($obj, $key);
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
            $key = InformationSeekerAffiliationTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = InformationSeekerAffiliationTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var InformationSeekerAffiliation $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                InformationSeekerAffiliationTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(InformationSeekerAffiliationTableMap::COL_ID);
            $criteria->addSelectColumn(InformationSeekerAffiliationTableMap::COL_AFFILIATION_NAME);
            $criteria->addSelectColumn(InformationSeekerAffiliationTableMap::COL_INFORMATION_SEEKER_ID);
            $criteria->addSelectColumn(InformationSeekerAffiliationTableMap::COL_TIMESTAMP);
        } else {
            $criteria->addSelectColumn($alias . '.id');
            $criteria->addSelectColumn($alias . '.affiliation_name');
            $criteria->addSelectColumn($alias . '.information_seeker_id');
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
        return Propel::getServiceContainer()->getDatabaseMap(InformationSeekerAffiliationTableMap::DATABASE_NAME)->getTable(InformationSeekerAffiliationTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(InformationSeekerAffiliationTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(InformationSeekerAffiliationTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new InformationSeekerAffiliationTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a InformationSeekerAffiliation or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or InformationSeekerAffiliation object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(InformationSeekerAffiliationTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \InformationSeekerAffiliation) { // it's a model object
            // create criteria based on pk value
            $criteria = $values->buildCriteria();
        } else { // it's a primary key, or an array of pks
            throw new LogicException('The InformationSeekerAffiliation object has no primary key');
        }

        $query = InformationSeekerAffiliationQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            InformationSeekerAffiliationTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                InformationSeekerAffiliationTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the information_seeker_affiliation table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return InformationSeekerAffiliationQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a InformationSeekerAffiliation or Criteria object.
     *
     * @param mixed               $criteria Criteria or InformationSeekerAffiliation object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(InformationSeekerAffiliationTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from InformationSeekerAffiliation object
        }


        // Set the correct dbName
        $query = InformationSeekerAffiliationQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // InformationSeekerAffiliationTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
InformationSeekerAffiliationTableMap::buildTableMap();
