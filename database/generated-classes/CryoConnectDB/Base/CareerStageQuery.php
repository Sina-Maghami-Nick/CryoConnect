<?php

namespace CryoConnectDB\Base;

use \Exception;
use \PDO;
use CryoConnectDB\CareerStage as ChildCareerStage;
use CryoConnectDB\CareerStageQuery as ChildCareerStageQuery;
use CryoConnectDB\Map\CareerStageTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'career_stage' table.
 *
 *
 *
 * @method     ChildCareerStageQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ChildCareerStageQuery orderByCareerStageName($order = Criteria::ASC) Order by the career_stage_name column
 * @method     ChildCareerStageQuery orderByTimestamp($order = Criteria::ASC) Order by the timestamp column
 *
 * @method     ChildCareerStageQuery groupById() Group by the id column
 * @method     ChildCareerStageQuery groupByCareerStageName() Group by the career_stage_name column
 * @method     ChildCareerStageQuery groupByTimestamp() Group by the timestamp column
 *
 * @method     ChildCareerStageQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildCareerStageQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildCareerStageQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildCareerStageQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildCareerStageQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildCareerStageQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildCareerStageQuery leftJoinExpertCareerStage($relationAlias = null) Adds a LEFT JOIN clause to the query using the ExpertCareerStage relation
 * @method     ChildCareerStageQuery rightJoinExpertCareerStage($relationAlias = null) Adds a RIGHT JOIN clause to the query using the ExpertCareerStage relation
 * @method     ChildCareerStageQuery innerJoinExpertCareerStage($relationAlias = null) Adds a INNER JOIN clause to the query using the ExpertCareerStage relation
 *
 * @method     ChildCareerStageQuery joinWithExpertCareerStage($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the ExpertCareerStage relation
 *
 * @method     ChildCareerStageQuery leftJoinWithExpertCareerStage() Adds a LEFT JOIN clause and with to the query using the ExpertCareerStage relation
 * @method     ChildCareerStageQuery rightJoinWithExpertCareerStage() Adds a RIGHT JOIN clause and with to the query using the ExpertCareerStage relation
 * @method     ChildCareerStageQuery innerJoinWithExpertCareerStage() Adds a INNER JOIN clause and with to the query using the ExpertCareerStage relation
 *
 * @method     \CryoConnectDB\ExpertCareerStageQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildCareerStage findOne(ConnectionInterface $con = null) Return the first ChildCareerStage matching the query
 * @method     ChildCareerStage findOneOrCreate(ConnectionInterface $con = null) Return the first ChildCareerStage matching the query, or a new ChildCareerStage object populated from the query conditions when no match is found
 *
 * @method     ChildCareerStage findOneById(int $id) Return the first ChildCareerStage filtered by the id column
 * @method     ChildCareerStage findOneByCareerStageName(string $career_stage_name) Return the first ChildCareerStage filtered by the career_stage_name column
 * @method     ChildCareerStage findOneByTimestamp(string $timestamp) Return the first ChildCareerStage filtered by the timestamp column *

 * @method     ChildCareerStage requirePk($key, ConnectionInterface $con = null) Return the ChildCareerStage by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCareerStage requireOne(ConnectionInterface $con = null) Return the first ChildCareerStage matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildCareerStage requireOneById(int $id) Return the first ChildCareerStage filtered by the id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCareerStage requireOneByCareerStageName(string $career_stage_name) Return the first ChildCareerStage filtered by the career_stage_name column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCareerStage requireOneByTimestamp(string $timestamp) Return the first ChildCareerStage filtered by the timestamp column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildCareerStage[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildCareerStage objects based on current ModelCriteria
 * @method     ChildCareerStage[]|ObjectCollection findById(int $id) Return ChildCareerStage objects filtered by the id column
 * @method     ChildCareerStage[]|ObjectCollection findByCareerStageName(string $career_stage_name) Return ChildCareerStage objects filtered by the career_stage_name column
 * @method     ChildCareerStage[]|ObjectCollection findByTimestamp(string $timestamp) Return ChildCareerStage objects filtered by the timestamp column
 * @method     ChildCareerStage[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class CareerStageQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \CryoConnectDB\Base\CareerStageQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'cryo_connect', $modelName = '\\CryoConnectDB\\CareerStage', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildCareerStageQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildCareerStageQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildCareerStageQuery) {
            return $criteria;
        }
        $query = new ChildCareerStageQuery();
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
     * @return ChildCareerStage|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(CareerStageTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = CareerStageTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildCareerStage A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT id, career_stage_name, timestamp FROM career_stage WHERE id = :p0';
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
            /** @var ChildCareerStage $obj */
            $obj = new ChildCareerStage();
            $obj->hydrate($row);
            CareerStageTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildCareerStage|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildCareerStageQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(CareerStageTableMap::COL_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildCareerStageQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(CareerStageTableMap::COL_ID, $keys, Criteria::IN);
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
     * @return $this|ChildCareerStageQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(CareerStageTableMap::COL_ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(CareerStageTableMap::COL_ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CareerStageTableMap::COL_ID, $id, $comparison);
    }

    /**
     * Filter the query on the career_stage_name column
     *
     * Example usage:
     * <code>
     * $query->filterByCareerStageName('fooValue');   // WHERE career_stage_name = 'fooValue'
     * $query->filterByCareerStageName('%fooValue%', Criteria::LIKE); // WHERE career_stage_name LIKE '%fooValue%'
     * </code>
     *
     * @param     string $careerStageName The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildCareerStageQuery The current query, for fluid interface
     */
    public function filterByCareerStageName($careerStageName = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($careerStageName)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CareerStageTableMap::COL_CAREER_STAGE_NAME, $careerStageName, $comparison);
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
     * @return $this|ChildCareerStageQuery The current query, for fluid interface
     */
    public function filterByTimestamp($timestamp = null, $comparison = null)
    {
        if (is_array($timestamp)) {
            $useMinMax = false;
            if (isset($timestamp['min'])) {
                $this->addUsingAlias(CareerStageTableMap::COL_TIMESTAMP, $timestamp['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($timestamp['max'])) {
                $this->addUsingAlias(CareerStageTableMap::COL_TIMESTAMP, $timestamp['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CareerStageTableMap::COL_TIMESTAMP, $timestamp, $comparison);
    }

    /**
     * Filter the query by a related \CryoConnectDB\ExpertCareerStage object
     *
     * @param \CryoConnectDB\ExpertCareerStage|ObjectCollection $expertCareerStage the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildCareerStageQuery The current query, for fluid interface
     */
    public function filterByExpertCareerStage($expertCareerStage, $comparison = null)
    {
        if ($expertCareerStage instanceof \CryoConnectDB\ExpertCareerStage) {
            return $this
                ->addUsingAlias(CareerStageTableMap::COL_ID, $expertCareerStage->getCareerStageId(), $comparison);
        } elseif ($expertCareerStage instanceof ObjectCollection) {
            return $this
                ->useExpertCareerStageQuery()
                ->filterByPrimaryKeys($expertCareerStage->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByExpertCareerStage() only accepts arguments of type \CryoConnectDB\ExpertCareerStage or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the ExpertCareerStage relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildCareerStageQuery The current query, for fluid interface
     */
    public function joinExpertCareerStage($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('ExpertCareerStage');

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
            $this->addJoinObject($join, 'ExpertCareerStage');
        }

        return $this;
    }

    /**
     * Use the ExpertCareerStage relation ExpertCareerStage object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \CryoConnectDB\ExpertCareerStageQuery A secondary query class using the current class as primary query
     */
    public function useExpertCareerStageQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinExpertCareerStage($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'ExpertCareerStage', '\CryoConnectDB\ExpertCareerStageQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ChildCareerStage $careerStage Object to remove from the list of results
     *
     * @return $this|ChildCareerStageQuery The current query, for fluid interface
     */
    public function prune($careerStage = null)
    {
        if ($careerStage) {
            $this->addUsingAlias(CareerStageTableMap::COL_ID, $careerStage->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the career_stage table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(CareerStageTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            CareerStageTableMap::clearInstancePool();
            CareerStageTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(CareerStageTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(CareerStageTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            CareerStageTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            CareerStageTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // CareerStageQuery
