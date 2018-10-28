<?php

namespace CryoConnectDB\Map;

use CryoConnectDB\Experts;
use CryoConnectDB\ExpertsQuery;
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
 * This class defines the structure of the 'experts' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class ExpertsTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'CryoConnectDB.Map.ExpertsTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'cryo_connect';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'experts';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\CryoConnectDB\\Experts';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'CryoConnectDB.Experts';

    /**
     * The total number of columns
     */
    const NUM_COLUMNS = 8;

    /**
     * The number of lazy-loaded columns
     */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /**
     * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
     */
    const NUM_HYDRATE_COLUMNS = 8;

    /**
     * the column name for the id field
     */
    const COL_ID = 'experts.id';

    /**
     * the column name for the first_name field
     */
    const COL_FIRST_NAME = 'experts.first_name';

    /**
     * the column name for the last_name field
     */
    const COL_LAST_NAME = 'experts.last_name';

    /**
     * the column name for the email field
     */
    const COL_EMAIL = 'experts.email';

    /**
     * the column name for the birth_year field
     */
    const COL_BIRTH_YEAR = 'experts.birth_year';

    /**
     * the column name for the country_code field
     */
    const COL_COUNTRY_CODE = 'experts.country_code';

    /**
     * the column name for the approved field
     */
    const COL_APPROVED = 'experts.approved';

    /**
     * the column name for the created_at field
     */
    const COL_CREATED_AT = 'experts.created_at';

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
        self::TYPE_PHPNAME       => array('Id', 'FirstName', 'LastName', 'Email', 'BirthYear', 'CountryCode', 'Approved', 'CreatedAt', ),
        self::TYPE_CAMELNAME     => array('id', 'firstName', 'lastName', 'email', 'birthYear', 'countryCode', 'approved', 'createdAt', ),
        self::TYPE_COLNAME       => array(ExpertsTableMap::COL_ID, ExpertsTableMap::COL_FIRST_NAME, ExpertsTableMap::COL_LAST_NAME, ExpertsTableMap::COL_EMAIL, ExpertsTableMap::COL_BIRTH_YEAR, ExpertsTableMap::COL_COUNTRY_CODE, ExpertsTableMap::COL_APPROVED, ExpertsTableMap::COL_CREATED_AT, ),
        self::TYPE_FIELDNAME     => array('id', 'first_name', 'last_name', 'email', 'birth_year', 'country_code', 'approved', 'created_at', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('Id' => 0, 'FirstName' => 1, 'LastName' => 2, 'Email' => 3, 'BirthYear' => 4, 'CountryCode' => 5, 'Approved' => 6, 'CreatedAt' => 7, ),
        self::TYPE_CAMELNAME     => array('id' => 0, 'firstName' => 1, 'lastName' => 2, 'email' => 3, 'birthYear' => 4, 'countryCode' => 5, 'approved' => 6, 'createdAt' => 7, ),
        self::TYPE_COLNAME       => array(ExpertsTableMap::COL_ID => 0, ExpertsTableMap::COL_FIRST_NAME => 1, ExpertsTableMap::COL_LAST_NAME => 2, ExpertsTableMap::COL_EMAIL => 3, ExpertsTableMap::COL_BIRTH_YEAR => 4, ExpertsTableMap::COL_COUNTRY_CODE => 5, ExpertsTableMap::COL_APPROVED => 6, ExpertsTableMap::COL_CREATED_AT => 7, ),
        self::TYPE_FIELDNAME     => array('id' => 0, 'first_name' => 1, 'last_name' => 2, 'email' => 3, 'birth_year' => 4, 'country_code' => 5, 'approved' => 6, 'created_at' => 7, ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, )
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
        $this->setName('experts');
        $this->setPhpName('Experts');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\CryoConnectDB\\Experts');
        $this->setPackage('CryoConnectDB');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id', 'Id', 'INTEGER', true, 10, null);
        $this->addColumn('first_name', 'FirstName', 'LONGVARCHAR', true, null, null);
        $this->addColumn('last_name', 'LastName', 'LONGVARCHAR', true, null, null);
        $this->addColumn('email', 'Email', 'LONGVARCHAR', true, null, null);
        $this->addColumn('birth_year', 'BirthYear', 'INTEGER', true, 4, null);
        $this->addForeignKey('country_code', 'CountryCode', 'VARCHAR', 'countries', 'country_code', true, 2, null);
        $this->addColumn('approved', 'Approved', 'BOOLEAN', true, 1, false);
        $this->addColumn('created_at', 'CreatedAt', 'TIMESTAMP', true, null, 'CURRENT_TIMESTAMP');
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('Countries', '\\CryoConnectDB\\Countries', RelationMap::MANY_TO_ONE, array (
  0 =>
  array (
    0 => ':country_code',
    1 => ':country_code',
  ),
), null, 'CASCADE', null, false);
        $this->addRelation('CryosphereExpertMethods', '\\CryoConnectDB\\CryosphereExpertMethods', RelationMap::ONE_TO_MANY, array (
  0 =>
  array (
    0 => ':expert_id',
    1 => ':id',
  ),
), 'CASCADE', 'CASCADE', 'CryosphereExpertMethodss', false);
        $this->addRelation('ExpertAffiliation', '\\CryoConnectDB\\ExpertAffiliation', RelationMap::ONE_TO_MANY, array (
  0 =>
  array (
    0 => ':expert_id',
    1 => ':id',
  ),
), 'CASCADE', 'CASCADE', 'ExpertAffiliations', false);
        $this->addRelation('ExpertCareerStage', '\\CryoConnectDB\\ExpertCareerStage', RelationMap::ONE_TO_MANY, array (
  0 =>
  array (
    0 => ':expert_id',
    1 => ':id',
  ),
), 'CASCADE', 'CASCADE', 'ExpertCareerStages', false);
        $this->addRelation('ExpertContact', '\\CryoConnectDB\\ExpertContact', RelationMap::ONE_TO_MANY, array (
  0 =>
  array (
    0 => ':expert_id',
    1 => ':id',
  ),
), 'CASCADE', 'CASCADE', 'ExpertContacts', false);
        $this->addRelation('ExpertCryosphereWhat', '\\CryoConnectDB\\ExpertCryosphereWhat', RelationMap::ONE_TO_MANY, array (
  0 =>
  array (
    0 => ':expert_id',
    1 => ':id',
  ),
), 'CASCADE', 'CASCADE', 'ExpertCryosphereWhats', false);
        $this->addRelation('ExpertCryosphereWhatSpecefic', '\\CryoConnectDB\\ExpertCryosphereWhatSpecefic', RelationMap::ONE_TO_MANY, array (
  0 =>
  array (
    0 => ':expert_id',
    1 => ':id',
  ),
), 'CASCADE', 'CASCADE', 'ExpertCryosphereWhatSpecefics', false);
        $this->addRelation('ExpertFieldWork', '\\CryoConnectDB\\ExpertFieldWork', RelationMap::ONE_TO_MANY, array (
  0 =>
  array (
    0 => ':expert_id',
    1 => ':id',
  ),
), 'CASCADE', 'CASCADE', 'ExpertFieldWorks', false);
        $this->addRelation('ExpertLanguages', '\\CryoConnectDB\\ExpertLanguages', RelationMap::ONE_TO_MANY, array (
  0 =>
  array (
    0 => ':expert_id',
    1 => ':id',
  ),
), 'CASCADE', 'CASCADE', 'ExpertLanguagess', false);
        $this->addRelation('ExpertWhen', '\\CryoConnectDB\\ExpertWhen', RelationMap::ONE_TO_MANY, array (
  0 =>
  array (
    0 => ':expert_id',
    1 => ':id',
  ),
), 'CASCADE', 'CASCADE', 'ExpertWhens', false);
        $this->addRelation('ExpertWhere', '\\CryoConnectDB\\ExpertWhere', RelationMap::ONE_TO_MANY, array (
  0 =>
  array (
    0 => ':expert_id',
    1 => ':id',
  ),
), 'CASCADE', 'CASCADE', 'ExpertWheres', false);
    } // buildRelations()
    /**
     * Method to invalidate the instance pool of all tables related to experts     * by a foreign key with ON DELETE CASCADE
     */
    public static function clearRelatedInstancePool()
    {
        // Invalidate objects in related instance pools,
        // since one or more of them may be deleted by ON DELETE CASCADE/SETNULL rule.
        CryosphereExpertMethodsTableMap::clearInstancePool();
        ExpertAffiliationTableMap::clearInstancePool();
        ExpertCareerStageTableMap::clearInstancePool();
        ExpertContactTableMap::clearInstancePool();
        ExpertCryosphereWhatTableMap::clearInstancePool();
        ExpertCryosphereWhatSpeceficTableMap::clearInstancePool();
        ExpertFieldWorkTableMap::clearInstancePool();
        ExpertLanguagesTableMap::clearInstancePool();
        ExpertWhenTableMap::clearInstancePool();
        ExpertWhereTableMap::clearInstancePool();
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
        return $withPrefix ? ExpertsTableMap::CLASS_DEFAULT : ExpertsTableMap::OM_CLASS;
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
     * @return array           (Experts object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = ExpertsTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = ExpertsTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + ExpertsTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = ExpertsTableMap::OM_CLASS;
            /** @var Experts $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            ExpertsTableMap::addInstanceToPool($obj, $key);
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
            $key = ExpertsTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = ExpertsTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var Experts $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                ExpertsTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(ExpertsTableMap::COL_ID);
            $criteria->addSelectColumn(ExpertsTableMap::COL_FIRST_NAME);
            $criteria->addSelectColumn(ExpertsTableMap::COL_LAST_NAME);
            $criteria->addSelectColumn(ExpertsTableMap::COL_EMAIL);
            $criteria->addSelectColumn(ExpertsTableMap::COL_BIRTH_YEAR);
            $criteria->addSelectColumn(ExpertsTableMap::COL_COUNTRY_CODE);
            $criteria->addSelectColumn(ExpertsTableMap::COL_APPROVED);
            $criteria->addSelectColumn(ExpertsTableMap::COL_CREATED_AT);
        } else {
            $criteria->addSelectColumn($alias . '.id');
            $criteria->addSelectColumn($alias . '.first_name');
            $criteria->addSelectColumn($alias . '.last_name');
            $criteria->addSelectColumn($alias . '.email');
            $criteria->addSelectColumn($alias . '.birth_year');
            $criteria->addSelectColumn($alias . '.country_code');
            $criteria->addSelectColumn($alias . '.approved');
            $criteria->addSelectColumn($alias . '.created_at');
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
        return Propel::getServiceContainer()->getDatabaseMap(ExpertsTableMap::DATABASE_NAME)->getTable(ExpertsTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(ExpertsTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(ExpertsTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new ExpertsTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a Experts or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or Experts object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(ExpertsTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \CryoConnectDB\Experts) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(ExpertsTableMap::DATABASE_NAME);
            $criteria->add(ExpertsTableMap::COL_ID, (array) $values, Criteria::IN);
        }

        $query = ExpertsQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            ExpertsTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                ExpertsTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the experts table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return ExpertsQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a Experts or Criteria object.
     *
     * @param mixed               $criteria Criteria or Experts object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(ExpertsTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from Experts object
        }

        if ($criteria->containsKey(ExpertsTableMap::COL_ID) && $criteria->keyContainsValue(ExpertsTableMap::COL_ID) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.ExpertsTableMap::COL_ID.')');
        }


        // Set the correct dbName
        $query = ExpertsQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // ExpertsTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
ExpertsTableMap::buildTableMap();
