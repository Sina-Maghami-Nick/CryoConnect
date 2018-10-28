<?php

namespace Base;

use \CryosphereMethods as ChildCryosphereMethods;
use \CryosphereMethodsQuery as ChildCryosphereMethodsQuery;
use \Exception;
use \PDO;
use Map\CryosphereMethodsTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'cryosphere_methods' table.
 *
 *
 *
 * @method     ChildCryosphereMethodsQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ChildCryosphereMethodsQuery orderByCryosphereMethodsName($order = Criteria::ASC) Order by the cryosphere_methods_name column
 * @method     ChildCryosphereMethodsQuery orderByTimestamp($order = Criteria::ASC) Order by the timestamp column
 *
 * @method     ChildCryosphereMethodsQuery groupById() Group by the id column
 * @method     ChildCryosphereMethodsQuery groupByCryosphereMethodsName() Group by the cryosphere_methods_name column
 * @method     ChildCryosphereMethodsQuery groupByTimestamp() Group by the timestamp column
 *
 * @method     ChildCryosphereMethodsQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildCryosphereMethodsQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildCryosphereMethodsQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildCryosphereMethodsQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildCryosphereMethodsQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildCryosphereMethodsQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildCryosphereMethodsQuery leftJoinCryosphereExpertMethods($relationAlias = null) Adds a LEFT JOIN clause to the query using the CryosphereExpertMethods relation
 * @method     ChildCryosphereMethodsQuery rightJoinCryosphereExpertMethods($relationAlias = null) Adds a RIGHT JOIN clause to the query using the CryosphereExpertMethods relation
 * @method     ChildCryosphereMethodsQuery innerJoinCryosphereExpertMethods($relationAlias = null) Adds a INNER JOIN clause to the query using the CryosphereExpertMethods relation
 *
 * @method     ChildCryosphereMethodsQuery joinWithCryosphereExpertMethods($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the CryosphereExpertMethods relation
 *
 * @method     ChildCryosphereMethodsQuery leftJoinWithCryosphereExpertMethods() Adds a LEFT JOIN clause and with to the query using the CryosphereExpertMethods relation
 * @method     ChildCryosphereMethodsQuery rightJoinWithCryosphereExpertMethods() Adds a RIGHT JOIN clause and with to the query using the CryosphereExpertMethods relation
 * @method     ChildCryosphereMethodsQuery innerJoinWithCryosphereExpertMethods() Adds a INNER JOIN clause and with to the query using the CryosphereExpertMethods relation
 *
 * @method     \CryosphereExpertMethodsQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildCryosphereMethods findOne(ConnectionInterface $con = null) Return the first ChildCryosphereMethods matching the query
 * @method     ChildCryosphereMethods findOneOrCreate(ConnectionInterface $con = null) Return the first ChildCryosphereMethods matching the query, or a new ChildCryosphereMethods object populated from the query conditions when no match is found
 *
 * @method     ChildCryosphereMethods findOneById(int $id) Return the first ChildCryosphereMethods filtered by the id column
 * @method     ChildCryosphereMethods findOneByCryosphereMethodsName(string $cryosphere_methods_name) Return the first ChildCryosphereMethods filtered by the cryosphere_methods_name column
 * @method     ChildCryosphereMethods findOneByTimestamp(string $timestamp) Return the first ChildCryosphereMethods filtered by the timestamp column *

 * @method     ChildCryosphereMethods requirePk($key, ConnectionInterface $con = null) Return the ChildCryosphereMethods by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCryosphereMethods requireOne(ConnectionInterface $con = null) Return the first ChildCryosphereMethods matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildCryosphereMethods requireOneById(int $id) Return the first ChildCryosphereMethods filtered by the id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCryosphereMethods requireOneByCryosphereMethodsName(string $cryosphere_methods_name) Return the first ChildCryosphereMethods filtered by the cryosphere_methods_name column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCryosphereMethods requireOneByTimestamp(string $timestamp) Return the first ChildCryosphereMethods filtered by the timestamp column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildCryosphereMethods[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildCryosphereMethods objects based on current ModelCriteria
 * @method     ChildCryosphereMethods[]|ObjectCollection findById(int $id) Return ChildCryosphereMethods objects filtered by the id column
 * @method     ChildCryosphereMethods[]|ObjectCollection findByCryosphereMethodsName(string $cryosphere_methods_name) Return ChildCryosphereMethods objects filtered by the cryosphere_methods_name column
 * @method     ChildCryosphereMethods[]|ObjectCollection findByTimestamp(string $timestamp) Return ChildCryosphereMethods objects filtered by the timestamp column
 * @method     ChildCryosphereMethods[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class CryosphereMethodsQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\CryosphereMethodsQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'cryo_connect', $modelName = '\\CryosphereMethods', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildCryosphereMethodsQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildCryosphereMethodsQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildCryosphereMethodsQuery) {
            return $criteria;
        }
        $query = new ChildCryosphereMethodsQuery();
        if (null !== $modelAlias) {
            $query->setModelAlias($modelAlias);
        }
        if ($criteria instanceof Criteria) {
            $query->mergeWith($criteria);
        }

        return $query;
    }

    /**
     * Find object by primary key.
     * Propel uses the instance pool to skip the database if the object exists.
     * Go fast if the query is untouched.
     *
     * <code>
     * $obj  = $c->findPk(12, $con);
     * </code>
     *
     * @param mixed $key Primary key to use for the query
     * @param ConnectionInterface $con an optional connection object
     *
     * @return ChildCryosphereMethods|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(CryosphereMethodsTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = CryosphereMethodsTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
            // the object is already in the instance pool
            return $obj;
        }

        return $this->findPkSimple($key, $con);
    }

    /**
     * Find object by primary key using raw SQL to go fast.
     * Bypass doSelect() and the object formatter by using generated code.
     *
     * @param     mixed $key Primary key to use for the query
     * @param     ConnectionInterface $con A connection object
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildCryosphereMethods A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT id, cryosphere_methods_name, timestamp FROM cryosphere_methods WHERE id = :p0';
        try {
            $stmt = $con->prepare($sql);
            $stmt->bindValue(':p0', $key, PDO::PARAM_INT);
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute SELECT statement [%s]', $sql), 0, $e);
        }
        $obj = null;
        if ($row = $stmt->fetch(\PDO::FETCH_NUM)) {
            /** @var ChildCryosphereMethods $obj */
            $obj = new ChildCryosphereMethods();
            $obj->hydrate($row);
            CryosphereMethodsTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
        }
        $stmt->closeCursor();

        return $obj;
    }

    /**
     * Find object by primary key.
     *
     * @param     mixed $key Primary key to use for the query
     * @param     ConnectionInterface $con A connection object
     *
     * @return ChildCryosphereMethods|array|mixed the result, formatted by the current formatter
     */
    protected function findPkComplex($key, ConnectionInterface $con)
    {
        // As the query uses a PK condition, no limit(1) is necessary.
        $criteria = $this->isKeepQuery() ? clone $this : $this;
        $dataFetcher = $criteria
            ->filterByPrimaryKey($key)
            ->doSelect($con);

        return $criteria->getFormatter()->init($criteria)->formatOne($dataFetcher);
    }

    /**
     * Find objects by primary key
     * <code>
     * $objs = $c->findPks(array(12, 56, 832), $con);
     * </code>
     * @param     array $keys Primary keys to use for the query
     * @param     ConnectionInterface $con an optional connection object
     *
     * @return ObjectCollection|array|mixed the list of results, formatted by the current formatter
     */
    public function findPks($keys, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getReadConnection($this->getDbName());
        }
        $this->basePreSelect($con);
        $criteria = $this->isKeepQuery() ? clone $this : $this;
        $dataFetcher = $criteria
            ->filterByPrimaryKeys($keys)
            ->doSelect($con);

        return $criteria->getFormatter()->init($criteria)->format($dataFetcher);
    }

    /**
     * Filter the query by primary key
     *
     * @param     mixed $key Primary key to use for the query
     *
     * @return $this|ChildCryosphereMethodsQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(CryosphereMethodsTableMap::COL_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildCryosphereMethodsQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(CryosphereMethodsTableMap::COL_ID, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the id column
     *
     * Example usage:
     * <code>
     * $query->filterById(1234); // WHERE id = 1234
     * $query->filterById(array(12, 34)); // WHERE id IN (12, 34)
     * $query->filterById(array('min' => 12)); // WHERE id > 12
     * </code>
     *
     * @param     mixed $id The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildCryosphereMethodsQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(CryosphereMethodsTableMap::COL_ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(CryosphereMethodsTableMap::COL_ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CryosphereMethodsTableMap::COL_ID, $id, $comparison);
    }

    /**
     * Filter the query on the cryosphere_methods_name column
     *
     * Example usage:
     * <code>
     * $query->filterByCryosphereMethodsName('fooValue');   // WHERE cryosphere_methods_name = 'fooValue'
     * $query->filterByCryosphereMethodsName('%fooValue%', Criteria::LIKE); // WHERE cryosphere_methods_name LIKE '%fooValue%'
     * </code>
     *
     * @param     string $cryosphereMethodsName The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildCryosphereMethodsQuery The current query, for fluid interface
     */
    public function filterByCryosphereMethodsName($cryosphereMethodsName = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($cryosphereMethodsName)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CryosphereMethodsTableMap::COL_CRYOSPHERE_METHODS_NAME, $cryosphereMethodsName, $comparison);
    }

    /**
     * Filter the query on the timestamp column
     *
     * Example usage:
     * <code>
     * $query->filterByTimestamp('2011-03-14'); // WHERE timestamp = '2011-03-14'
     * $query->filterByTimestamp('now'); // WHERE timestamp = '2011-03-14'
     * $query->filterByTimestamp(array('max' => 'yesterday')); // WHERE timestamp > '2011-03-13'
     * </code>
     *
     * @param     mixed $timestamp The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildCryosphereMethodsQuery The current query, for fluid interface
     */
    public function filterByTimestamp($timestamp = null, $comparison = null)
    {
        if (is_array($timestamp)) {
            $useMinMax = false;
            if (isset($timestamp['min'])) {
                $this->addUsingAlias(CryosphereMethodsTableMap::COL_TIMESTAMP, $timestamp['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($timestamp['max'])) {
                $this->addUsingAlias(CryosphereMethodsTableMap::COL_TIMESTAMP, $timestamp['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CryosphereMethodsTableMap::COL_TIMESTAMP, $timestamp, $comparison);
    }

    /**
     * Filter the query by a related \CryosphereExpertMethods object
     *
     * @param \CryosphereExpertMethods|ObjectCollection $cryosphereExpertMethods the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildCryosphereMethodsQuery The current query, for fluid interface
     */
    public function filterByCryosphereExpertMethods($cryosphereExpertMethods, $comparison = null)
    {
        if ($cryosphereExpertMethods instanceof \CryosphereExpertMethods) {
            return $this
                ->addUsingAlias(CryosphereMethodsTableMap::COL_ID, $cryosphereExpertMethods->getMethodId(), $comparison);
        } elseif ($cryosphereExpertMethods instanceof ObjectCollection) {
            return $this
                ->useCryosphereExpertMethodsQuery()
                ->filterByPrimaryKeys($cryosphereExpertMethods->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByCryosphereExpertMethods() only accepts arguments of type \CryosphereExpertMethods or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the CryosphereExpertMethods relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildCryosphereMethodsQuery The current query, for fluid interface
     */
    public function joinCryosphereExpertMethods($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('CryosphereExpertMethods');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'CryosphereExpertMethods');
        }

        return $this;
    }

    /**
     * Use the CryosphereExpertMethods relation CryosphereExpertMethods object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \CryosphereExpertMethodsQuery A secondary query class using the current class as primary query
     */
    public function useCryosphereExpertMethodsQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinCryosphereExpertMethods($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'CryosphereExpertMethods', '\CryosphereExpertMethodsQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ChildCryosphereMethods $cryosphereMethods Object to remove from the list of results
     *
     * @return $this|ChildCryosphereMethodsQuery The current query, for fluid interface
     */
    public function prune($cryosphereMethods = null)
    {
        if ($cryosphereMethods) {
            $this->addUsingAlias(CryosphereMethodsTableMap::COL_ID, $cryosphereMethods->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the cryosphere_methods table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(CryosphereMethodsTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            CryosphereMethodsTableMap::clearInstancePool();
            CryosphereMethodsTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

    /**
     * Performs a DELETE on the database based on the current ModelCriteria
     *
     * @param ConnectionInterface $con the connection to use
     * @return int             The number of affected rows (if supported by underlying database driver).  This includes CASCADE-related rows
     *                         if supported by native driver or if emulated using Propel.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public function delete(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(CryosphereMethodsTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(CryosphereMethodsTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            CryosphereMethodsTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            CryosphereMethodsTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // CryosphereMethodsQuery