<?php

namespace CryoConnectDB\Base;

use \Exception;
use \PDO;
use CryoConnectDB\ExpertCryosphereMethods as ChildExpertCryosphereMethods;
use CryoConnectDB\ExpertCryosphereMethodsQuery as ChildExpertCryosphereMethodsQuery;
use CryoConnectDB\Map\ExpertCryosphereMethodsTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'expert_cryosphere_methods' table.
 *
 *
 *
 * @method     ChildExpertCryosphereMethodsQuery orderByExpertId($order = Criteria::ASC) Order by the expert_id column
 * @method     ChildExpertCryosphereMethodsQuery orderByMethodId($order = Criteria::ASC) Order by the method_id column
 * @method     ChildExpertCryosphereMethodsQuery orderByTimestamp($order = Criteria::ASC) Order by the timestamp column
 *
 * @method     ChildExpertCryosphereMethodsQuery groupByExpertId() Group by the expert_id column
 * @method     ChildExpertCryosphereMethodsQuery groupByMethodId() Group by the method_id column
 * @method     ChildExpertCryosphereMethodsQuery groupByTimestamp() Group by the timestamp column
 *
 * @method     ChildExpertCryosphereMethodsQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildExpertCryosphereMethodsQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildExpertCryosphereMethodsQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildExpertCryosphereMethodsQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildExpertCryosphereMethodsQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildExpertCryosphereMethodsQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildExpertCryosphereMethodsQuery leftJoinExperts($relationAlias = null) Adds a LEFT JOIN clause to the query using the Experts relation
 * @method     ChildExpertCryosphereMethodsQuery rightJoinExperts($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Experts relation
 * @method     ChildExpertCryosphereMethodsQuery innerJoinExperts($relationAlias = null) Adds a INNER JOIN clause to the query using the Experts relation
 *
 * @method     ChildExpertCryosphereMethodsQuery joinWithExperts($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Experts relation
 *
 * @method     ChildExpertCryosphereMethodsQuery leftJoinWithExperts() Adds a LEFT JOIN clause and with to the query using the Experts relation
 * @method     ChildExpertCryosphereMethodsQuery rightJoinWithExperts() Adds a RIGHT JOIN clause and with to the query using the Experts relation
 * @method     ChildExpertCryosphereMethodsQuery innerJoinWithExperts() Adds a INNER JOIN clause and with to the query using the Experts relation
 *
 * @method     ChildExpertCryosphereMethodsQuery leftJoinCryosphereMethods($relationAlias = null) Adds a LEFT JOIN clause to the query using the CryosphereMethods relation
 * @method     ChildExpertCryosphereMethodsQuery rightJoinCryosphereMethods($relationAlias = null) Adds a RIGHT JOIN clause to the query using the CryosphereMethods relation
 * @method     ChildExpertCryosphereMethodsQuery innerJoinCryosphereMethods($relationAlias = null) Adds a INNER JOIN clause to the query using the CryosphereMethods relation
 *
 * @method     ChildExpertCryosphereMethodsQuery joinWithCryosphereMethods($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the CryosphereMethods relation
 *
 * @method     ChildExpertCryosphereMethodsQuery leftJoinWithCryosphereMethods() Adds a LEFT JOIN clause and with to the query using the CryosphereMethods relation
 * @method     ChildExpertCryosphereMethodsQuery rightJoinWithCryosphereMethods() Adds a RIGHT JOIN clause and with to the query using the CryosphereMethods relation
 * @method     ChildExpertCryosphereMethodsQuery innerJoinWithCryosphereMethods() Adds a INNER JOIN clause and with to the query using the CryosphereMethods relation
 *
 * @method     \CryoConnectDB\ExpertsQuery|\CryoConnectDB\CryosphereMethodsQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildExpertCryosphereMethods findOne(ConnectionInterface $con = null) Return the first ChildExpertCryosphereMethods matching the query
 * @method     ChildExpertCryosphereMethods findOneOrCreate(ConnectionInterface $con = null) Return the first ChildExpertCryosphereMethods matching the query, or a new ChildExpertCryosphereMethods object populated from the query conditions when no match is found
 *
 * @method     ChildExpertCryosphereMethods findOneByExpertId(int $expert_id) Return the first ChildExpertCryosphereMethods filtered by the expert_id column
 * @method     ChildExpertCryosphereMethods findOneByMethodId(int $method_id) Return the first ChildExpertCryosphereMethods filtered by the method_id column
 * @method     ChildExpertCryosphereMethods findOneByTimestamp(string $timestamp) Return the first ChildExpertCryosphereMethods filtered by the timestamp column *

 * @method     ChildExpertCryosphereMethods requirePk($key, ConnectionInterface $con = null) Return the ChildExpertCryosphereMethods by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildExpertCryosphereMethods requireOne(ConnectionInterface $con = null) Return the first ChildExpertCryosphereMethods matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildExpertCryosphereMethods requireOneByExpertId(int $expert_id) Return the first ChildExpertCryosphereMethods filtered by the expert_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildExpertCryosphereMethods requireOneByMethodId(int $method_id) Return the first ChildExpertCryosphereMethods filtered by the method_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildExpertCryosphereMethods requireOneByTimestamp(string $timestamp) Return the first ChildExpertCryosphereMethods filtered by the timestamp column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildExpertCryosphereMethods[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildExpertCryosphereMethods objects based on current ModelCriteria
 * @method     ChildExpertCryosphereMethods[]|ObjectCollection findByExpertId(int $expert_id) Return ChildExpertCryosphereMethods objects filtered by the expert_id column
 * @method     ChildExpertCryosphereMethods[]|ObjectCollection findByMethodId(int $method_id) Return ChildExpertCryosphereMethods objects filtered by the method_id column
 * @method     ChildExpertCryosphereMethods[]|ObjectCollection findByTimestamp(string $timestamp) Return ChildExpertCryosphereMethods objects filtered by the timestamp column
 * @method     ChildExpertCryosphereMethods[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class ExpertCryosphereMethodsQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \CryoConnectDB\Base\ExpertCryosphereMethodsQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\CryoConnectDB\\ExpertCryosphereMethods', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildExpertCryosphereMethodsQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildExpertCryosphereMethodsQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildExpertCryosphereMethodsQuery) {
            return $criteria;
        }
        $query = new ChildExpertCryosphereMethodsQuery();
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
     * $obj = $c->findPk(array(12, 34), $con);
     * </code>
     *
     * @param array[$expert_id, $method_id] $key Primary key to use for the query
     * @param ConnectionInterface $con an optional connection object
     *
     * @return ChildExpertCryosphereMethods|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(ExpertCryosphereMethodsTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = ExpertCryosphereMethodsTableMap::getInstanceFromPool(serialize([(null === $key[0] || is_scalar($key[0]) || is_callable([$key[0], '__toString']) ? (string) $key[0] : $key[0]), (null === $key[1] || is_scalar($key[1]) || is_callable([$key[1], '__toString']) ? (string) $key[1] : $key[1])]))))) {
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
     * @return ChildExpertCryosphereMethods A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT expert_id, method_id, timestamp FROM expert_cryosphere_methods WHERE expert_id = :p0 AND method_id = :p1';
        try {
            $stmt = $con->prepare($sql);
            $stmt->bindValue(':p0', $key[0], PDO::PARAM_INT);
            $stmt->bindValue(':p1', $key[1], PDO::PARAM_INT);
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute SELECT statement [%s]', $sql), 0, $e);
        }
        $obj = null;
        if ($row = $stmt->fetch(\PDO::FETCH_NUM)) {
            /** @var ChildExpertCryosphereMethods $obj */
            $obj = new ChildExpertCryosphereMethods();
            $obj->hydrate($row);
            ExpertCryosphereMethodsTableMap::addInstanceToPool($obj, serialize([(null === $key[0] || is_scalar($key[0]) || is_callable([$key[0], '__toString']) ? (string) $key[0] : $key[0]), (null === $key[1] || is_scalar($key[1]) || is_callable([$key[1], '__toString']) ? (string) $key[1] : $key[1])]));
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
     * @return ChildExpertCryosphereMethods|array|mixed the result, formatted by the current formatter
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
     * $objs = $c->findPks(array(array(12, 56), array(832, 123), array(123, 456)), $con);
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
     * @return $this|ChildExpertCryosphereMethodsQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {
        $this->addUsingAlias(ExpertCryosphereMethodsTableMap::COL_EXPERT_ID, $key[0], Criteria::EQUAL);
        $this->addUsingAlias(ExpertCryosphereMethodsTableMap::COL_METHOD_ID, $key[1], Criteria::EQUAL);

        return $this;
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildExpertCryosphereMethodsQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {
        if (empty($keys)) {
            return $this->add(null, '1<>1', Criteria::CUSTOM);
        }
        foreach ($keys as $key) {
            $cton0 = $this->getNewCriterion(ExpertCryosphereMethodsTableMap::COL_EXPERT_ID, $key[0], Criteria::EQUAL);
            $cton1 = $this->getNewCriterion(ExpertCryosphereMethodsTableMap::COL_METHOD_ID, $key[1], Criteria::EQUAL);
            $cton0->addAnd($cton1);
            $this->addOr($cton0);
        }

        return $this;
    }

    /**
     * Filter the query on the expert_id column
     *
     * Example usage:
     * <code>
     * $query->filterByExpertId(1234); // WHERE expert_id = 1234
     * $query->filterByExpertId(array(12, 34)); // WHERE expert_id IN (12, 34)
     * $query->filterByExpertId(array('min' => 12)); // WHERE expert_id > 12
     * </code>
     *
     * @see       filterByExperts()
     *
     * @param     mixed $expertId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildExpertCryosphereMethodsQuery The current query, for fluid interface
     */
    public function filterByExpertId($expertId = null, $comparison = null)
    {
        if (is_array($expertId)) {
            $useMinMax = false;
            if (isset($expertId['min'])) {
                $this->addUsingAlias(ExpertCryosphereMethodsTableMap::COL_EXPERT_ID, $expertId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($expertId['max'])) {
                $this->addUsingAlias(ExpertCryosphereMethodsTableMap::COL_EXPERT_ID, $expertId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ExpertCryosphereMethodsTableMap::COL_EXPERT_ID, $expertId, $comparison);
    }

    /**
     * Filter the query on the method_id column
     *
     * Example usage:
     * <code>
     * $query->filterByMethodId(1234); // WHERE method_id = 1234
     * $query->filterByMethodId(array(12, 34)); // WHERE method_id IN (12, 34)
     * $query->filterByMethodId(array('min' => 12)); // WHERE method_id > 12
     * </code>
     *
     * @see       filterByCryosphereMethods()
     *
     * @param     mixed $methodId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildExpertCryosphereMethodsQuery The current query, for fluid interface
     */
    public function filterByMethodId($methodId = null, $comparison = null)
    {
        if (is_array($methodId)) {
            $useMinMax = false;
            if (isset($methodId['min'])) {
                $this->addUsingAlias(ExpertCryosphereMethodsTableMap::COL_METHOD_ID, $methodId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($methodId['max'])) {
                $this->addUsingAlias(ExpertCryosphereMethodsTableMap::COL_METHOD_ID, $methodId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ExpertCryosphereMethodsTableMap::COL_METHOD_ID, $methodId, $comparison);
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
     * @return $this|ChildExpertCryosphereMethodsQuery The current query, for fluid interface
     */
    public function filterByTimestamp($timestamp = null, $comparison = null)
    {
        if (is_array($timestamp)) {
            $useMinMax = false;
            if (isset($timestamp['min'])) {
                $this->addUsingAlias(ExpertCryosphereMethodsTableMap::COL_TIMESTAMP, $timestamp['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($timestamp['max'])) {
                $this->addUsingAlias(ExpertCryosphereMethodsTableMap::COL_TIMESTAMP, $timestamp['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ExpertCryosphereMethodsTableMap::COL_TIMESTAMP, $timestamp, $comparison);
    }

    /**
     * Filter the query by a related \CryoConnectDB\Experts object
     *
     * @param \CryoConnectDB\Experts|ObjectCollection $experts The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildExpertCryosphereMethodsQuery The current query, for fluid interface
     */
    public function filterByExperts($experts, $comparison = null)
    {
        if ($experts instanceof \CryoConnectDB\Experts) {
            return $this
                ->addUsingAlias(ExpertCryosphereMethodsTableMap::COL_EXPERT_ID, $experts->getId(), $comparison);
        } elseif ($experts instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(ExpertCryosphereMethodsTableMap::COL_EXPERT_ID, $experts->toKeyValue('PrimaryKey', 'Id'), $comparison);
        } else {
            throw new PropelException('filterByExperts() only accepts arguments of type \CryoConnectDB\Experts or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Experts relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildExpertCryosphereMethodsQuery The current query, for fluid interface
     */
    public function joinExperts($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Experts');

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
            $this->addJoinObject($join, 'Experts');
        }

        return $this;
    }

    /**
     * Use the Experts relation Experts object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \CryoConnectDB\ExpertsQuery A secondary query class using the current class as primary query
     */
    public function useExpertsQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinExperts($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Experts', '\CryoConnectDB\ExpertsQuery');
    }

    /**
     * Filter the query by a related \CryoConnectDB\CryosphereMethods object
     *
     * @param \CryoConnectDB\CryosphereMethods|ObjectCollection $cryosphereMethods The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildExpertCryosphereMethodsQuery The current query, for fluid interface
     */
    public function filterByCryosphereMethods($cryosphereMethods, $comparison = null)
    {
        if ($cryosphereMethods instanceof \CryoConnectDB\CryosphereMethods) {
            return $this
                ->addUsingAlias(ExpertCryosphereMethodsTableMap::COL_METHOD_ID, $cryosphereMethods->getId(), $comparison);
        } elseif ($cryosphereMethods instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(ExpertCryosphereMethodsTableMap::COL_METHOD_ID, $cryosphereMethods->toKeyValue('PrimaryKey', 'Id'), $comparison);
        } else {
            throw new PropelException('filterByCryosphereMethods() only accepts arguments of type \CryoConnectDB\CryosphereMethods or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the CryosphereMethods relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildExpertCryosphereMethodsQuery The current query, for fluid interface
     */
    public function joinCryosphereMethods($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('CryosphereMethods');

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
            $this->addJoinObject($join, 'CryosphereMethods');
        }

        return $this;
    }

    /**
     * Use the CryosphereMethods relation CryosphereMethods object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \CryoConnectDB\CryosphereMethodsQuery A secondary query class using the current class as primary query
     */
    public function useCryosphereMethodsQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinCryosphereMethods($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'CryosphereMethods', '\CryoConnectDB\CryosphereMethodsQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ChildExpertCryosphereMethods $expertCryosphereMethods Object to remove from the list of results
     *
     * @return $this|ChildExpertCryosphereMethodsQuery The current query, for fluid interface
     */
    public function prune($expertCryosphereMethods = null)
    {
        if ($expertCryosphereMethods) {
            $this->addCond('pruneCond0', $this->getAliasedColName(ExpertCryosphereMethodsTableMap::COL_EXPERT_ID), $expertCryosphereMethods->getExpertId(), Criteria::NOT_EQUAL);
            $this->addCond('pruneCond1', $this->getAliasedColName(ExpertCryosphereMethodsTableMap::COL_METHOD_ID), $expertCryosphereMethods->getMethodId(), Criteria::NOT_EQUAL);
            $this->combine(array('pruneCond0', 'pruneCond1'), Criteria::LOGICAL_OR);
        }

        return $this;
    }

    /**
     * Deletes all rows from the expert_cryosphere_methods table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(ExpertCryosphereMethodsTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            ExpertCryosphereMethodsTableMap::clearInstancePool();
            ExpertCryosphereMethodsTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(ExpertCryosphereMethodsTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(ExpertCryosphereMethodsTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            ExpertCryosphereMethodsTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            ExpertCryosphereMethodsTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // ExpertCryosphereMethodsQuery
