<?php

namespace CryoConnectDB\Base;

use \Exception;
use \PDO;
use CryoConnectDB\ExpertCryosphereWhat as ChildExpertCryosphereWhat;
use CryoConnectDB\ExpertCryosphereWhatQuery as ChildExpertCryosphereWhatQuery;
use CryoConnectDB\Map\ExpertCryosphereWhatTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'expert_cryosphere_what' table.
 *
 *
 *
 * @method     ChildExpertCryosphereWhatQuery orderByExpertId($order = Criteria::ASC) Order by the expert_id column
 * @method     ChildExpertCryosphereWhatQuery orderByCryosphereWhatId($order = Criteria::ASC) Order by the cryosphere_what_id column
 * @method     ChildExpertCryosphereWhatQuery orderByTimestamp($order = Criteria::ASC) Order by the timestamp column
 *
 * @method     ChildExpertCryosphereWhatQuery groupByExpertId() Group by the expert_id column
 * @method     ChildExpertCryosphereWhatQuery groupByCryosphereWhatId() Group by the cryosphere_what_id column
 * @method     ChildExpertCryosphereWhatQuery groupByTimestamp() Group by the timestamp column
 *
 * @method     ChildExpertCryosphereWhatQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildExpertCryosphereWhatQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildExpertCryosphereWhatQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildExpertCryosphereWhatQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildExpertCryosphereWhatQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildExpertCryosphereWhatQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildExpertCryosphereWhatQuery leftJoinExperts($relationAlias = null) Adds a LEFT JOIN clause to the query using the Experts relation
 * @method     ChildExpertCryosphereWhatQuery rightJoinExperts($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Experts relation
 * @method     ChildExpertCryosphereWhatQuery innerJoinExperts($relationAlias = null) Adds a INNER JOIN clause to the query using the Experts relation
 *
 * @method     ChildExpertCryosphereWhatQuery joinWithExperts($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Experts relation
 *
 * @method     ChildExpertCryosphereWhatQuery leftJoinWithExperts() Adds a LEFT JOIN clause and with to the query using the Experts relation
 * @method     ChildExpertCryosphereWhatQuery rightJoinWithExperts() Adds a RIGHT JOIN clause and with to the query using the Experts relation
 * @method     ChildExpertCryosphereWhatQuery innerJoinWithExperts() Adds a INNER JOIN clause and with to the query using the Experts relation
 *
 * @method     ChildExpertCryosphereWhatQuery leftJoinCryosphereWhat($relationAlias = null) Adds a LEFT JOIN clause to the query using the CryosphereWhat relation
 * @method     ChildExpertCryosphereWhatQuery rightJoinCryosphereWhat($relationAlias = null) Adds a RIGHT JOIN clause to the query using the CryosphereWhat relation
 * @method     ChildExpertCryosphereWhatQuery innerJoinCryosphereWhat($relationAlias = null) Adds a INNER JOIN clause to the query using the CryosphereWhat relation
 *
 * @method     ChildExpertCryosphereWhatQuery joinWithCryosphereWhat($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the CryosphereWhat relation
 *
 * @method     ChildExpertCryosphereWhatQuery leftJoinWithCryosphereWhat() Adds a LEFT JOIN clause and with to the query using the CryosphereWhat relation
 * @method     ChildExpertCryosphereWhatQuery rightJoinWithCryosphereWhat() Adds a RIGHT JOIN clause and with to the query using the CryosphereWhat relation
 * @method     ChildExpertCryosphereWhatQuery innerJoinWithCryosphereWhat() Adds a INNER JOIN clause and with to the query using the CryosphereWhat relation
 *
 * @method     \CryoConnectDB\ExpertsQuery|\CryoConnectDB\CryosphereWhatQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildExpertCryosphereWhat findOne(ConnectionInterface $con = null) Return the first ChildExpertCryosphereWhat matching the query
 * @method     ChildExpertCryosphereWhat findOneOrCreate(ConnectionInterface $con = null) Return the first ChildExpertCryosphereWhat matching the query, or a new ChildExpertCryosphereWhat object populated from the query conditions when no match is found
 *
 * @method     ChildExpertCryosphereWhat findOneByExpertId(int $expert_id) Return the first ChildExpertCryosphereWhat filtered by the expert_id column
 * @method     ChildExpertCryosphereWhat findOneByCryosphereWhatId(int $cryosphere_what_id) Return the first ChildExpertCryosphereWhat filtered by the cryosphere_what_id column
 * @method     ChildExpertCryosphereWhat findOneByTimestamp(string $timestamp) Return the first ChildExpertCryosphereWhat filtered by the timestamp column *

 * @method     ChildExpertCryosphereWhat requirePk($key, ConnectionInterface $con = null) Return the ChildExpertCryosphereWhat by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildExpertCryosphereWhat requireOne(ConnectionInterface $con = null) Return the first ChildExpertCryosphereWhat matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildExpertCryosphereWhat requireOneByExpertId(int $expert_id) Return the first ChildExpertCryosphereWhat filtered by the expert_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildExpertCryosphereWhat requireOneByCryosphereWhatId(int $cryosphere_what_id) Return the first ChildExpertCryosphereWhat filtered by the cryosphere_what_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildExpertCryosphereWhat requireOneByTimestamp(string $timestamp) Return the first ChildExpertCryosphereWhat filtered by the timestamp column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildExpertCryosphereWhat[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildExpertCryosphereWhat objects based on current ModelCriteria
 * @method     ChildExpertCryosphereWhat[]|ObjectCollection findByExpertId(int $expert_id) Return ChildExpertCryosphereWhat objects filtered by the expert_id column
 * @method     ChildExpertCryosphereWhat[]|ObjectCollection findByCryosphereWhatId(int $cryosphere_what_id) Return ChildExpertCryosphereWhat objects filtered by the cryosphere_what_id column
 * @method     ChildExpertCryosphereWhat[]|ObjectCollection findByTimestamp(string $timestamp) Return ChildExpertCryosphereWhat objects filtered by the timestamp column
 * @method     ChildExpertCryosphereWhat[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class ExpertCryosphereWhatQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \CryoConnectDB\Base\ExpertCryosphereWhatQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\CryoConnectDB\\ExpertCryosphereWhat', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildExpertCryosphereWhatQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildExpertCryosphereWhatQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildExpertCryosphereWhatQuery) {
            return $criteria;
        }
        $query = new ChildExpertCryosphereWhatQuery();
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
     * @param array[$expert_id, $cryosphere_what_id] $key Primary key to use for the query
     * @param ConnectionInterface $con an optional connection object
     *
     * @return ChildExpertCryosphereWhat|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(ExpertCryosphereWhatTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = ExpertCryosphereWhatTableMap::getInstanceFromPool(serialize([(null === $key[0] || is_scalar($key[0]) || is_callable([$key[0], '__toString']) ? (string) $key[0] : $key[0]), (null === $key[1] || is_scalar($key[1]) || is_callable([$key[1], '__toString']) ? (string) $key[1] : $key[1])]))))) {
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
     * @return ChildExpertCryosphereWhat A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT expert_id, cryosphere_what_id, timestamp FROM expert_cryosphere_what WHERE expert_id = :p0 AND cryosphere_what_id = :p1';
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
            /** @var ChildExpertCryosphereWhat $obj */
            $obj = new ChildExpertCryosphereWhat();
            $obj->hydrate($row);
            ExpertCryosphereWhatTableMap::addInstanceToPool($obj, serialize([(null === $key[0] || is_scalar($key[0]) || is_callable([$key[0], '__toString']) ? (string) $key[0] : $key[0]), (null === $key[1] || is_scalar($key[1]) || is_callable([$key[1], '__toString']) ? (string) $key[1] : $key[1])]));
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
     * @return ChildExpertCryosphereWhat|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildExpertCryosphereWhatQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {
        $this->addUsingAlias(ExpertCryosphereWhatTableMap::COL_EXPERT_ID, $key[0], Criteria::EQUAL);
        $this->addUsingAlias(ExpertCryosphereWhatTableMap::COL_CRYOSPHERE_WHAT_ID, $key[1], Criteria::EQUAL);

        return $this;
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildExpertCryosphereWhatQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {
        if (empty($keys)) {
            return $this->add(null, '1<>1', Criteria::CUSTOM);
        }
        foreach ($keys as $key) {
            $cton0 = $this->getNewCriterion(ExpertCryosphereWhatTableMap::COL_EXPERT_ID, $key[0], Criteria::EQUAL);
            $cton1 = $this->getNewCriterion(ExpertCryosphereWhatTableMap::COL_CRYOSPHERE_WHAT_ID, $key[1], Criteria::EQUAL);
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
     * @return $this|ChildExpertCryosphereWhatQuery The current query, for fluid interface
     */
    public function filterByExpertId($expertId = null, $comparison = null)
    {
        if (is_array($expertId)) {
            $useMinMax = false;
            if (isset($expertId['min'])) {
                $this->addUsingAlias(ExpertCryosphereWhatTableMap::COL_EXPERT_ID, $expertId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($expertId['max'])) {
                $this->addUsingAlias(ExpertCryosphereWhatTableMap::COL_EXPERT_ID, $expertId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ExpertCryosphereWhatTableMap::COL_EXPERT_ID, $expertId, $comparison);
    }

    /**
     * Filter the query on the cryosphere_what_id column
     *
     * Example usage:
     * <code>
     * $query->filterByCryosphereWhatId(1234); // WHERE cryosphere_what_id = 1234
     * $query->filterByCryosphereWhatId(array(12, 34)); // WHERE cryosphere_what_id IN (12, 34)
     * $query->filterByCryosphereWhatId(array('min' => 12)); // WHERE cryosphere_what_id > 12
     * </code>
     *
     * @see       filterByCryosphereWhat()
     *
     * @param     mixed $cryosphereWhatId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildExpertCryosphereWhatQuery The current query, for fluid interface
     */
    public function filterByCryosphereWhatId($cryosphereWhatId = null, $comparison = null)
    {
        if (is_array($cryosphereWhatId)) {
            $useMinMax = false;
            if (isset($cryosphereWhatId['min'])) {
                $this->addUsingAlias(ExpertCryosphereWhatTableMap::COL_CRYOSPHERE_WHAT_ID, $cryosphereWhatId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($cryosphereWhatId['max'])) {
                $this->addUsingAlias(ExpertCryosphereWhatTableMap::COL_CRYOSPHERE_WHAT_ID, $cryosphereWhatId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ExpertCryosphereWhatTableMap::COL_CRYOSPHERE_WHAT_ID, $cryosphereWhatId, $comparison);
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
     * @return $this|ChildExpertCryosphereWhatQuery The current query, for fluid interface
     */
    public function filterByTimestamp($timestamp = null, $comparison = null)
    {
        if (is_array($timestamp)) {
            $useMinMax = false;
            if (isset($timestamp['min'])) {
                $this->addUsingAlias(ExpertCryosphereWhatTableMap::COL_TIMESTAMP, $timestamp['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($timestamp['max'])) {
                $this->addUsingAlias(ExpertCryosphereWhatTableMap::COL_TIMESTAMP, $timestamp['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ExpertCryosphereWhatTableMap::COL_TIMESTAMP, $timestamp, $comparison);
    }

    /**
     * Filter the query by a related \CryoConnectDB\Experts object
     *
     * @param \CryoConnectDB\Experts|ObjectCollection $experts The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildExpertCryosphereWhatQuery The current query, for fluid interface
     */
    public function filterByExperts($experts, $comparison = null)
    {
        if ($experts instanceof \CryoConnectDB\Experts) {
            return $this
                ->addUsingAlias(ExpertCryosphereWhatTableMap::COL_EXPERT_ID, $experts->getId(), $comparison);
        } elseif ($experts instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(ExpertCryosphereWhatTableMap::COL_EXPERT_ID, $experts->toKeyValue('PrimaryKey', 'Id'), $comparison);
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
     * @return $this|ChildExpertCryosphereWhatQuery The current query, for fluid interface
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
     * Filter the query by a related \CryoConnectDB\CryosphereWhat object
     *
     * @param \CryoConnectDB\CryosphereWhat|ObjectCollection $cryosphereWhat The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildExpertCryosphereWhatQuery The current query, for fluid interface
     */
    public function filterByCryosphereWhat($cryosphereWhat, $comparison = null)
    {
        if ($cryosphereWhat instanceof \CryoConnectDB\CryosphereWhat) {
            return $this
                ->addUsingAlias(ExpertCryosphereWhatTableMap::COL_CRYOSPHERE_WHAT_ID, $cryosphereWhat->getId(), $comparison);
        } elseif ($cryosphereWhat instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(ExpertCryosphereWhatTableMap::COL_CRYOSPHERE_WHAT_ID, $cryosphereWhat->toKeyValue('PrimaryKey', 'Id'), $comparison);
        } else {
            throw new PropelException('filterByCryosphereWhat() only accepts arguments of type \CryoConnectDB\CryosphereWhat or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the CryosphereWhat relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildExpertCryosphereWhatQuery The current query, for fluid interface
     */
    public function joinCryosphereWhat($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('CryosphereWhat');

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
            $this->addJoinObject($join, 'CryosphereWhat');
        }

        return $this;
    }

    /**
     * Use the CryosphereWhat relation CryosphereWhat object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \CryoConnectDB\CryosphereWhatQuery A secondary query class using the current class as primary query
     */
    public function useCryosphereWhatQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinCryosphereWhat($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'CryosphereWhat', '\CryoConnectDB\CryosphereWhatQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ChildExpertCryosphereWhat $expertCryosphereWhat Object to remove from the list of results
     *
     * @return $this|ChildExpertCryosphereWhatQuery The current query, for fluid interface
     */
    public function prune($expertCryosphereWhat = null)
    {
        if ($expertCryosphereWhat) {
            $this->addCond('pruneCond0', $this->getAliasedColName(ExpertCryosphereWhatTableMap::COL_EXPERT_ID), $expertCryosphereWhat->getExpertId(), Criteria::NOT_EQUAL);
            $this->addCond('pruneCond1', $this->getAliasedColName(ExpertCryosphereWhatTableMap::COL_CRYOSPHERE_WHAT_ID), $expertCryosphereWhat->getCryosphereWhatId(), Criteria::NOT_EQUAL);
            $this->combine(array('pruneCond0', 'pruneCond1'), Criteria::LOGICAL_OR);
        }

        return $this;
    }

    /**
     * Deletes all rows from the expert_cryosphere_what table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(ExpertCryosphereWhatTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            ExpertCryosphereWhatTableMap::clearInstancePool();
            ExpertCryosphereWhatTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(ExpertCryosphereWhatTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(ExpertCryosphereWhatTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            ExpertCryosphereWhatTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            ExpertCryosphereWhatTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // ExpertCryosphereWhatQuery
