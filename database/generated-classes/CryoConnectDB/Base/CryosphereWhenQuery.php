<?php

namespace CryoConnectDB\Base;

use \Exception;
use \PDO;
use CryoConnectDB\CryosphereWhen as ChildCryosphereWhen;
use CryoConnectDB\CryosphereWhenQuery as ChildCryosphereWhenQuery;
use CryoConnectDB\Map\CryosphereWhenTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'cryosphere_when' table.
 *
 *
 *
 * @method     ChildCryosphereWhenQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ChildCryosphereWhenQuery orderByCryosphereWhenName($order = Criteria::ASC) Order by the cryosphere_when_name column
 * @method     ChildCryosphereWhenQuery orderByApproved($order = Criteria::ASC) Order by the approved column
 * @method     ChildCryosphereWhenQuery orderByTimestamp($order = Criteria::ASC) Order by the timestamp column
 *
 * @method     ChildCryosphereWhenQuery groupById() Group by the id column
 * @method     ChildCryosphereWhenQuery groupByCryosphereWhenName() Group by the cryosphere_when_name column
 * @method     ChildCryosphereWhenQuery groupByApproved() Group by the approved column
 * @method     ChildCryosphereWhenQuery groupByTimestamp() Group by the timestamp column
 *
 * @method     ChildCryosphereWhenQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildCryosphereWhenQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildCryosphereWhenQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildCryosphereWhenQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildCryosphereWhenQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildCryosphereWhenQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildCryosphereWhenQuery leftJoinExpertCryosphereWhen($relationAlias = null) Adds a LEFT JOIN clause to the query using the ExpertCryosphereWhen relation
 * @method     ChildCryosphereWhenQuery rightJoinExpertCryosphereWhen($relationAlias = null) Adds a RIGHT JOIN clause to the query using the ExpertCryosphereWhen relation
 * @method     ChildCryosphereWhenQuery innerJoinExpertCryosphereWhen($relationAlias = null) Adds a INNER JOIN clause to the query using the ExpertCryosphereWhen relation
 *
 * @method     ChildCryosphereWhenQuery joinWithExpertCryosphereWhen($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the ExpertCryosphereWhen relation
 *
 * @method     ChildCryosphereWhenQuery leftJoinWithExpertCryosphereWhen() Adds a LEFT JOIN clause and with to the query using the ExpertCryosphereWhen relation
 * @method     ChildCryosphereWhenQuery rightJoinWithExpertCryosphereWhen() Adds a RIGHT JOIN clause and with to the query using the ExpertCryosphereWhen relation
 * @method     ChildCryosphereWhenQuery innerJoinWithExpertCryosphereWhen() Adds a INNER JOIN clause and with to the query using the ExpertCryosphereWhen relation
 *
 * @method     \CryoConnectDB\ExpertCryosphereWhenQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildCryosphereWhen findOne(ConnectionInterface $con = null) Return the first ChildCryosphereWhen matching the query
 * @method     ChildCryosphereWhen findOneOrCreate(ConnectionInterface $con = null) Return the first ChildCryosphereWhen matching the query, or a new ChildCryosphereWhen object populated from the query conditions when no match is found
 *
 * @method     ChildCryosphereWhen findOneById(int $id) Return the first ChildCryosphereWhen filtered by the id column
 * @method     ChildCryosphereWhen findOneByCryosphereWhenName(string $cryosphere_when_name) Return the first ChildCryosphereWhen filtered by the cryosphere_when_name column
 * @method     ChildCryosphereWhen findOneByApproved(boolean $approved) Return the first ChildCryosphereWhen filtered by the approved column
 * @method     ChildCryosphereWhen findOneByTimestamp(string $timestamp) Return the first ChildCryosphereWhen filtered by the timestamp column *

 * @method     ChildCryosphereWhen requirePk($key, ConnectionInterface $con = null) Return the ChildCryosphereWhen by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCryosphereWhen requireOne(ConnectionInterface $con = null) Return the first ChildCryosphereWhen matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildCryosphereWhen requireOneById(int $id) Return the first ChildCryosphereWhen filtered by the id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCryosphereWhen requireOneByCryosphereWhenName(string $cryosphere_when_name) Return the first ChildCryosphereWhen filtered by the cryosphere_when_name column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCryosphereWhen requireOneByApproved(boolean $approved) Return the first ChildCryosphereWhen filtered by the approved column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCryosphereWhen requireOneByTimestamp(string $timestamp) Return the first ChildCryosphereWhen filtered by the timestamp column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildCryosphereWhen[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildCryosphereWhen objects based on current ModelCriteria
 * @method     ChildCryosphereWhen[]|ObjectCollection findById(int $id) Return ChildCryosphereWhen objects filtered by the id column
 * @method     ChildCryosphereWhen[]|ObjectCollection findByCryosphereWhenName(string $cryosphere_when_name) Return ChildCryosphereWhen objects filtered by the cryosphere_when_name column
 * @method     ChildCryosphereWhen[]|ObjectCollection findByApproved(boolean $approved) Return ChildCryosphereWhen objects filtered by the approved column
 * @method     ChildCryosphereWhen[]|ObjectCollection findByTimestamp(string $timestamp) Return ChildCryosphereWhen objects filtered by the timestamp column
 * @method     ChildCryosphereWhen[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class CryosphereWhenQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \CryoConnectDB\Base\CryosphereWhenQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\CryoConnectDB\\CryosphereWhen', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildCryosphereWhenQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildCryosphereWhenQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildCryosphereWhenQuery) {
            return $criteria;
        }
        $query = new ChildCryosphereWhenQuery();
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
     * @return ChildCryosphereWhen|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(CryosphereWhenTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = CryosphereWhenTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildCryosphereWhen A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT id, cryosphere_when_name, approved, timestamp FROM cryosphere_when WHERE id = :p0';
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
            /** @var ChildCryosphereWhen $obj */
            $obj = new ChildCryosphereWhen();
            $obj->hydrate($row);
            CryosphereWhenTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildCryosphereWhen|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildCryosphereWhenQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(CryosphereWhenTableMap::COL_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildCryosphereWhenQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(CryosphereWhenTableMap::COL_ID, $keys, Criteria::IN);
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
     * @return $this|ChildCryosphereWhenQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(CryosphereWhenTableMap::COL_ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(CryosphereWhenTableMap::COL_ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CryosphereWhenTableMap::COL_ID, $id, $comparison);
    }

    /**
     * Filter the query on the cryosphere_when_name column
     *
     * Example usage:
     * <code>
     * $query->filterByCryosphereWhenName('fooValue');   // WHERE cryosphere_when_name = 'fooValue'
     * $query->filterByCryosphereWhenName('%fooValue%', Criteria::LIKE); // WHERE cryosphere_when_name LIKE '%fooValue%'
     * </code>
     *
     * @param     string $cryosphereWhenName The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildCryosphereWhenQuery The current query, for fluid interface
     */
    public function filterByCryosphereWhenName($cryosphereWhenName = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($cryosphereWhenName)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CryosphereWhenTableMap::COL_CRYOSPHERE_WHEN_NAME, $cryosphereWhenName, $comparison);
    }

    /**
     * Filter the query on the approved column
     *
     * Example usage:
     * <code>
     * $query->filterByApproved(true); // WHERE approved = true
     * $query->filterByApproved('yes'); // WHERE approved = true
     * </code>
     *
     * @param     boolean|string $approved The value to use as filter.
     *              Non-boolean arguments are converted using the following rules:
     *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildCryosphereWhenQuery The current query, for fluid interface
     */
    public function filterByApproved($approved = null, $comparison = null)
    {
        if (is_string($approved)) {
            $approved = in_array(strtolower($approved), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(CryosphereWhenTableMap::COL_APPROVED, $approved, $comparison);
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
     * @return $this|ChildCryosphereWhenQuery The current query, for fluid interface
     */
    public function filterByTimestamp($timestamp = null, $comparison = null)
    {
        if (is_array($timestamp)) {
            $useMinMax = false;
            if (isset($timestamp['min'])) {
                $this->addUsingAlias(CryosphereWhenTableMap::COL_TIMESTAMP, $timestamp['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($timestamp['max'])) {
                $this->addUsingAlias(CryosphereWhenTableMap::COL_TIMESTAMP, $timestamp['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CryosphereWhenTableMap::COL_TIMESTAMP, $timestamp, $comparison);
    }

    /**
     * Filter the query by a related \CryoConnectDB\ExpertCryosphereWhen object
     *
     * @param \CryoConnectDB\ExpertCryosphereWhen|ObjectCollection $expertCryosphereWhen the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildCryosphereWhenQuery The current query, for fluid interface
     */
    public function filterByExpertCryosphereWhen($expertCryosphereWhen, $comparison = null)
    {
        if ($expertCryosphereWhen instanceof \CryoConnectDB\ExpertCryosphereWhen) {
            return $this
                ->addUsingAlias(CryosphereWhenTableMap::COL_ID, $expertCryosphereWhen->getCryosphereWhenId(), $comparison);
        } elseif ($expertCryosphereWhen instanceof ObjectCollection) {
            return $this
                ->useExpertCryosphereWhenQuery()
                ->filterByPrimaryKeys($expertCryosphereWhen->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByExpertCryosphereWhen() only accepts arguments of type \CryoConnectDB\ExpertCryosphereWhen or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the ExpertCryosphereWhen relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildCryosphereWhenQuery The current query, for fluid interface
     */
    public function joinExpertCryosphereWhen($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('ExpertCryosphereWhen');

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
            $this->addJoinObject($join, 'ExpertCryosphereWhen');
        }

        return $this;
    }

    /**
     * Use the ExpertCryosphereWhen relation ExpertCryosphereWhen object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \CryoConnectDB\ExpertCryosphereWhenQuery A secondary query class using the current class as primary query
     */
    public function useExpertCryosphereWhenQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinExpertCryosphereWhen($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'ExpertCryosphereWhen', '\CryoConnectDB\ExpertCryosphereWhenQuery');
    }

    /**
     * Filter the query by a related Experts object
     * using the expert_cryosphere_when table as cross reference
     *
     * @param Experts $experts the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildCryosphereWhenQuery The current query, for fluid interface
     */
    public function filterByExperts($experts, $comparison = Criteria::EQUAL)
    {
        return $this
            ->useExpertCryosphereWhenQuery()
            ->filterByExperts($experts, $comparison)
            ->endUse();
    }

    /**
     * Exclude object from result
     *
     * @param   ChildCryosphereWhen $cryosphereWhen Object to remove from the list of results
     *
     * @return $this|ChildCryosphereWhenQuery The current query, for fluid interface
     */
    public function prune($cryosphereWhen = null)
    {
        if ($cryosphereWhen) {
            $this->addUsingAlias(CryosphereWhenTableMap::COL_ID, $cryosphereWhen->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the cryosphere_when table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(CryosphereWhenTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            CryosphereWhenTableMap::clearInstancePool();
            CryosphereWhenTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(CryosphereWhenTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(CryosphereWhenTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            CryosphereWhenTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            CryosphereWhenTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // CryosphereWhenQuery
