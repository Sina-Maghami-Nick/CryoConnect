<?php

namespace CryoConnectDB\Base;

use \Exception;
use \PDO;
use CryoConnectDB\ExpertCareerStage as ChildExpertCareerStage;
use CryoConnectDB\ExpertCareerStageQuery as ChildExpertCareerStageQuery;
use CryoConnectDB\Map\ExpertCareerStageTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'expert_career_stage' table.
 *
 *
 *
 * @method     ChildExpertCareerStageQuery orderByExpertId($order = Criteria::ASC) Order by the expert_id column
 * @method     ChildExpertCareerStageQuery orderByCareerStageId($order = Criteria::ASC) Order by the career_stage_id column
 * @method     ChildExpertCareerStageQuery orderByTimestamp($order = Criteria::ASC) Order by the timestamp column
 *
 * @method     ChildExpertCareerStageQuery groupByExpertId() Group by the expert_id column
 * @method     ChildExpertCareerStageQuery groupByCareerStageId() Group by the career_stage_id column
 * @method     ChildExpertCareerStageQuery groupByTimestamp() Group by the timestamp column
 *
 * @method     ChildExpertCareerStageQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildExpertCareerStageQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildExpertCareerStageQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildExpertCareerStageQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildExpertCareerStageQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildExpertCareerStageQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildExpertCareerStageQuery leftJoinExperts($relationAlias = null) Adds a LEFT JOIN clause to the query using the Experts relation
 * @method     ChildExpertCareerStageQuery rightJoinExperts($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Experts relation
 * @method     ChildExpertCareerStageQuery innerJoinExperts($relationAlias = null) Adds a INNER JOIN clause to the query using the Experts relation
 *
 * @method     ChildExpertCareerStageQuery joinWithExperts($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Experts relation
 *
 * @method     ChildExpertCareerStageQuery leftJoinWithExperts() Adds a LEFT JOIN clause and with to the query using the Experts relation
 * @method     ChildExpertCareerStageQuery rightJoinWithExperts() Adds a RIGHT JOIN clause and with to the query using the Experts relation
 * @method     ChildExpertCareerStageQuery innerJoinWithExperts() Adds a INNER JOIN clause and with to the query using the Experts relation
 *
 * @method     ChildExpertCareerStageQuery leftJoinCareerStage($relationAlias = null) Adds a LEFT JOIN clause to the query using the CareerStage relation
 * @method     ChildExpertCareerStageQuery rightJoinCareerStage($relationAlias = null) Adds a RIGHT JOIN clause to the query using the CareerStage relation
 * @method     ChildExpertCareerStageQuery innerJoinCareerStage($relationAlias = null) Adds a INNER JOIN clause to the query using the CareerStage relation
 *
 * @method     ChildExpertCareerStageQuery joinWithCareerStage($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the CareerStage relation
 *
 * @method     ChildExpertCareerStageQuery leftJoinWithCareerStage() Adds a LEFT JOIN clause and with to the query using the CareerStage relation
 * @method     ChildExpertCareerStageQuery rightJoinWithCareerStage() Adds a RIGHT JOIN clause and with to the query using the CareerStage relation
 * @method     ChildExpertCareerStageQuery innerJoinWithCareerStage() Adds a INNER JOIN clause and with to the query using the CareerStage relation
 *
 * @method     \CryoConnectDB\ExpertsQuery|\CryoConnectDB\CareerStageQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildExpertCareerStage findOne(ConnectionInterface $con = null) Return the first ChildExpertCareerStage matching the query
 * @method     ChildExpertCareerStage findOneOrCreate(ConnectionInterface $con = null) Return the first ChildExpertCareerStage matching the query, or a new ChildExpertCareerStage object populated from the query conditions when no match is found
 *
 * @method     ChildExpertCareerStage findOneByExpertId(int $expert_id) Return the first ChildExpertCareerStage filtered by the expert_id column
 * @method     ChildExpertCareerStage findOneByCareerStageId(int $career_stage_id) Return the first ChildExpertCareerStage filtered by the career_stage_id column
 * @method     ChildExpertCareerStage findOneByTimestamp(string $timestamp) Return the first ChildExpertCareerStage filtered by the timestamp column *

 * @method     ChildExpertCareerStage requirePk($key, ConnectionInterface $con = null) Return the ChildExpertCareerStage by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildExpertCareerStage requireOne(ConnectionInterface $con = null) Return the first ChildExpertCareerStage matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildExpertCareerStage requireOneByExpertId(int $expert_id) Return the first ChildExpertCareerStage filtered by the expert_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildExpertCareerStage requireOneByCareerStageId(int $career_stage_id) Return the first ChildExpertCareerStage filtered by the career_stage_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildExpertCareerStage requireOneByTimestamp(string $timestamp) Return the first ChildExpertCareerStage filtered by the timestamp column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildExpertCareerStage[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildExpertCareerStage objects based on current ModelCriteria
 * @method     ChildExpertCareerStage[]|ObjectCollection findByExpertId(int $expert_id) Return ChildExpertCareerStage objects filtered by the expert_id column
 * @method     ChildExpertCareerStage[]|ObjectCollection findByCareerStageId(int $career_stage_id) Return ChildExpertCareerStage objects filtered by the career_stage_id column
 * @method     ChildExpertCareerStage[]|ObjectCollection findByTimestamp(string $timestamp) Return ChildExpertCareerStage objects filtered by the timestamp column
 * @method     ChildExpertCareerStage[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class ExpertCareerStageQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \CryoConnectDB\Base\ExpertCareerStageQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\CryoConnectDB\\ExpertCareerStage', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildExpertCareerStageQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildExpertCareerStageQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildExpertCareerStageQuery) {
            return $criteria;
        }
        $query = new ChildExpertCareerStageQuery();
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
     * @param array[$expert_id, $career_stage_id] $key Primary key to use for the query
     * @param ConnectionInterface $con an optional connection object
     *
     * @return ChildExpertCareerStage|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(ExpertCareerStageTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = ExpertCareerStageTableMap::getInstanceFromPool(serialize([(null === $key[0] || is_scalar($key[0]) || is_callable([$key[0], '__toString']) ? (string) $key[0] : $key[0]), (null === $key[1] || is_scalar($key[1]) || is_callable([$key[1], '__toString']) ? (string) $key[1] : $key[1])]))))) {
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
     * @return ChildExpertCareerStage A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT expert_id, career_stage_id, timestamp FROM expert_career_stage WHERE expert_id = :p0 AND career_stage_id = :p1';
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
            /** @var ChildExpertCareerStage $obj */
            $obj = new ChildExpertCareerStage();
            $obj->hydrate($row);
            ExpertCareerStageTableMap::addInstanceToPool($obj, serialize([(null === $key[0] || is_scalar($key[0]) || is_callable([$key[0], '__toString']) ? (string) $key[0] : $key[0]), (null === $key[1] || is_scalar($key[1]) || is_callable([$key[1], '__toString']) ? (string) $key[1] : $key[1])]));
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
     * @return ChildExpertCareerStage|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildExpertCareerStageQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {
        $this->addUsingAlias(ExpertCareerStageTableMap::COL_EXPERT_ID, $key[0], Criteria::EQUAL);
        $this->addUsingAlias(ExpertCareerStageTableMap::COL_CAREER_STAGE_ID, $key[1], Criteria::EQUAL);

        return $this;
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildExpertCareerStageQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {
        if (empty($keys)) {
            return $this->add(null, '1<>1', Criteria::CUSTOM);
        }
        foreach ($keys as $key) {
            $cton0 = $this->getNewCriterion(ExpertCareerStageTableMap::COL_EXPERT_ID, $key[0], Criteria::EQUAL);
            $cton1 = $this->getNewCriterion(ExpertCareerStageTableMap::COL_CAREER_STAGE_ID, $key[1], Criteria::EQUAL);
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
     * @return $this|ChildExpertCareerStageQuery The current query, for fluid interface
     */
    public function filterByExpertId($expertId = null, $comparison = null)
    {
        if (is_array($expertId)) {
            $useMinMax = false;
            if (isset($expertId['min'])) {
                $this->addUsingAlias(ExpertCareerStageTableMap::COL_EXPERT_ID, $expertId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($expertId['max'])) {
                $this->addUsingAlias(ExpertCareerStageTableMap::COL_EXPERT_ID, $expertId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ExpertCareerStageTableMap::COL_EXPERT_ID, $expertId, $comparison);
    }

    /**
     * Filter the query on the career_stage_id column
     *
     * Example usage:
     * <code>
     * $query->filterByCareerStageId(1234); // WHERE career_stage_id = 1234
     * $query->filterByCareerStageId(array(12, 34)); // WHERE career_stage_id IN (12, 34)
     * $query->filterByCareerStageId(array('min' => 12)); // WHERE career_stage_id > 12
     * </code>
     *
     * @see       filterByCareerStage()
     *
     * @param     mixed $careerStageId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildExpertCareerStageQuery The current query, for fluid interface
     */
    public function filterByCareerStageId($careerStageId = null, $comparison = null)
    {
        if (is_array($careerStageId)) {
            $useMinMax = false;
            if (isset($careerStageId['min'])) {
                $this->addUsingAlias(ExpertCareerStageTableMap::COL_CAREER_STAGE_ID, $careerStageId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($careerStageId['max'])) {
                $this->addUsingAlias(ExpertCareerStageTableMap::COL_CAREER_STAGE_ID, $careerStageId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ExpertCareerStageTableMap::COL_CAREER_STAGE_ID, $careerStageId, $comparison);
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
     * @return $this|ChildExpertCareerStageQuery The current query, for fluid interface
     */
    public function filterByTimestamp($timestamp = null, $comparison = null)
    {
        if (is_array($timestamp)) {
            $useMinMax = false;
            if (isset($timestamp['min'])) {
                $this->addUsingAlias(ExpertCareerStageTableMap::COL_TIMESTAMP, $timestamp['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($timestamp['max'])) {
                $this->addUsingAlias(ExpertCareerStageTableMap::COL_TIMESTAMP, $timestamp['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ExpertCareerStageTableMap::COL_TIMESTAMP, $timestamp, $comparison);
    }

    /**
     * Filter the query by a related \CryoConnectDB\Experts object
     *
     * @param \CryoConnectDB\Experts|ObjectCollection $experts The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildExpertCareerStageQuery The current query, for fluid interface
     */
    public function filterByExperts($experts, $comparison = null)
    {
        if ($experts instanceof \CryoConnectDB\Experts) {
            return $this
                ->addUsingAlias(ExpertCareerStageTableMap::COL_EXPERT_ID, $experts->getId(), $comparison);
        } elseif ($experts instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(ExpertCareerStageTableMap::COL_EXPERT_ID, $experts->toKeyValue('PrimaryKey', 'Id'), $comparison);
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
     * @return $this|ChildExpertCareerStageQuery The current query, for fluid interface
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
     * Filter the query by a related \CryoConnectDB\CareerStage object
     *
     * @param \CryoConnectDB\CareerStage|ObjectCollection $careerStage The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildExpertCareerStageQuery The current query, for fluid interface
     */
    public function filterByCareerStage($careerStage, $comparison = null)
    {
        if ($careerStage instanceof \CryoConnectDB\CareerStage) {
            return $this
                ->addUsingAlias(ExpertCareerStageTableMap::COL_CAREER_STAGE_ID, $careerStage->getId(), $comparison);
        } elseif ($careerStage instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(ExpertCareerStageTableMap::COL_CAREER_STAGE_ID, $careerStage->toKeyValue('PrimaryKey', 'Id'), $comparison);
        } else {
            throw new PropelException('filterByCareerStage() only accepts arguments of type \CryoConnectDB\CareerStage or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the CareerStage relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildExpertCareerStageQuery The current query, for fluid interface
     */
    public function joinCareerStage($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('CareerStage');

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
            $this->addJoinObject($join, 'CareerStage');
        }

        return $this;
    }

    /**
     * Use the CareerStage relation CareerStage object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \CryoConnectDB\CareerStageQuery A secondary query class using the current class as primary query
     */
    public function useCareerStageQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinCareerStage($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'CareerStage', '\CryoConnectDB\CareerStageQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ChildExpertCareerStage $expertCareerStage Object to remove from the list of results
     *
     * @return $this|ChildExpertCareerStageQuery The current query, for fluid interface
     */
    public function prune($expertCareerStage = null)
    {
        if ($expertCareerStage) {
            $this->addCond('pruneCond0', $this->getAliasedColName(ExpertCareerStageTableMap::COL_EXPERT_ID), $expertCareerStage->getExpertId(), Criteria::NOT_EQUAL);
            $this->addCond('pruneCond1', $this->getAliasedColName(ExpertCareerStageTableMap::COL_CAREER_STAGE_ID), $expertCareerStage->getCareerStageId(), Criteria::NOT_EQUAL);
            $this->combine(array('pruneCond0', 'pruneCond1'), Criteria::LOGICAL_OR);
        }

        return $this;
    }

    /**
     * Deletes all rows from the expert_career_stage table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(ExpertCareerStageTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            ExpertCareerStageTableMap::clearInstancePool();
            ExpertCareerStageTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(ExpertCareerStageTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(ExpertCareerStageTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            ExpertCareerStageTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            ExpertCareerStageTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // ExpertCareerStageQuery
