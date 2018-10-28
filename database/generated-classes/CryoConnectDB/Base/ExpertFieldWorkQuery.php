<?php

namespace CryoConnectDB\Base;

use \Exception;
use CryoConnectDB\ExpertFieldWork as ChildExpertFieldWork;
use CryoConnectDB\ExpertFieldWorkQuery as ChildExpertFieldWorkQuery;
use CryoConnectDB\Map\ExpertFieldWorkTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\LogicException;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'expert_field_work' table.
 *
 *
 *
 * @method     ChildExpertFieldWorkQuery orderByExpertId($order = Criteria::ASC) Order by the expert_id column
 * @method     ChildExpertFieldWorkQuery orderByFieldWorkWhere($order = Criteria::ASC) Order by the field_work_where column
 * @method     ChildExpertFieldWorkQuery orderByFieldWorkYear($order = Criteria::ASC) Order by the field_work_year column
 * @method     ChildExpertFieldWorkQuery orderByFieldWorkMonth($order = Criteria::ASC) Order by the field_work_month column
 * @method     ChildExpertFieldWorkQuery orderByTimestamp($order = Criteria::ASC) Order by the timestamp column
 *
 * @method     ChildExpertFieldWorkQuery groupByExpertId() Group by the expert_id column
 * @method     ChildExpertFieldWorkQuery groupByFieldWorkWhere() Group by the field_work_where column
 * @method     ChildExpertFieldWorkQuery groupByFieldWorkYear() Group by the field_work_year column
 * @method     ChildExpertFieldWorkQuery groupByFieldWorkMonth() Group by the field_work_month column
 * @method     ChildExpertFieldWorkQuery groupByTimestamp() Group by the timestamp column
 *
 * @method     ChildExpertFieldWorkQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildExpertFieldWorkQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildExpertFieldWorkQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildExpertFieldWorkQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildExpertFieldWorkQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildExpertFieldWorkQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildExpertFieldWorkQuery leftJoinExperts($relationAlias = null) Adds a LEFT JOIN clause to the query using the Experts relation
 * @method     ChildExpertFieldWorkQuery rightJoinExperts($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Experts relation
 * @method     ChildExpertFieldWorkQuery innerJoinExperts($relationAlias = null) Adds a INNER JOIN clause to the query using the Experts relation
 *
 * @method     ChildExpertFieldWorkQuery joinWithExperts($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Experts relation
 *
 * @method     ChildExpertFieldWorkQuery leftJoinWithExperts() Adds a LEFT JOIN clause and with to the query using the Experts relation
 * @method     ChildExpertFieldWorkQuery rightJoinWithExperts() Adds a RIGHT JOIN clause and with to the query using the Experts relation
 * @method     ChildExpertFieldWorkQuery innerJoinWithExperts() Adds a INNER JOIN clause and with to the query using the Experts relation
 *
 * @method     \CryoConnectDB\ExpertsQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildExpertFieldWork findOne(ConnectionInterface $con = null) Return the first ChildExpertFieldWork matching the query
 * @method     ChildExpertFieldWork findOneOrCreate(ConnectionInterface $con = null) Return the first ChildExpertFieldWork matching the query, or a new ChildExpertFieldWork object populated from the query conditions when no match is found
 *
 * @method     ChildExpertFieldWork findOneByExpertId(int $expert_id) Return the first ChildExpertFieldWork filtered by the expert_id column
 * @method     ChildExpertFieldWork findOneByFieldWorkWhere(string $field_work_where) Return the first ChildExpertFieldWork filtered by the field_work_where column
 * @method     ChildExpertFieldWork findOneByFieldWorkYear(int $field_work_year) Return the first ChildExpertFieldWork filtered by the field_work_year column
 * @method     ChildExpertFieldWork findOneByFieldWorkMonth(int $field_work_month) Return the first ChildExpertFieldWork filtered by the field_work_month column
 * @method     ChildExpertFieldWork findOneByTimestamp(string $timestamp) Return the first ChildExpertFieldWork filtered by the timestamp column *

 * @method     ChildExpertFieldWork requirePk($key, ConnectionInterface $con = null) Return the ChildExpertFieldWork by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildExpertFieldWork requireOne(ConnectionInterface $con = null) Return the first ChildExpertFieldWork matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildExpertFieldWork requireOneByExpertId(int $expert_id) Return the first ChildExpertFieldWork filtered by the expert_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildExpertFieldWork requireOneByFieldWorkWhere(string $field_work_where) Return the first ChildExpertFieldWork filtered by the field_work_where column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildExpertFieldWork requireOneByFieldWorkYear(int $field_work_year) Return the first ChildExpertFieldWork filtered by the field_work_year column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildExpertFieldWork requireOneByFieldWorkMonth(int $field_work_month) Return the first ChildExpertFieldWork filtered by the field_work_month column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildExpertFieldWork requireOneByTimestamp(string $timestamp) Return the first ChildExpertFieldWork filtered by the timestamp column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildExpertFieldWork[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildExpertFieldWork objects based on current ModelCriteria
 * @method     ChildExpertFieldWork[]|ObjectCollection findByExpertId(int $expert_id) Return ChildExpertFieldWork objects filtered by the expert_id column
 * @method     ChildExpertFieldWork[]|ObjectCollection findByFieldWorkWhere(string $field_work_where) Return ChildExpertFieldWork objects filtered by the field_work_where column
 * @method     ChildExpertFieldWork[]|ObjectCollection findByFieldWorkYear(int $field_work_year) Return ChildExpertFieldWork objects filtered by the field_work_year column
 * @method     ChildExpertFieldWork[]|ObjectCollection findByFieldWorkMonth(int $field_work_month) Return ChildExpertFieldWork objects filtered by the field_work_month column
 * @method     ChildExpertFieldWork[]|ObjectCollection findByTimestamp(string $timestamp) Return ChildExpertFieldWork objects filtered by the timestamp column
 * @method     ChildExpertFieldWork[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class ExpertFieldWorkQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \CryoConnectDB\Base\ExpertFieldWorkQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'cryo_connect', $modelName = '\\CryoConnectDB\\ExpertFieldWork', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildExpertFieldWorkQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildExpertFieldWorkQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildExpertFieldWorkQuery) {
            return $criteria;
        }
        $query = new ChildExpertFieldWorkQuery();
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
     * @return ChildExpertFieldWork|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        throw new LogicException('The ExpertFieldWork object has no primary key');
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
        throw new LogicException('The ExpertFieldWork object has no primary key');
    }

    /**
     * Filter the query by primary key
     *
     * @param     mixed $key Primary key to use for the query
     *
     * @return $this|ChildExpertFieldWorkQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {
        throw new LogicException('The ExpertFieldWork object has no primary key');
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildExpertFieldWorkQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {
        throw new LogicException('The ExpertFieldWork object has no primary key');
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
     * @return $this|ChildExpertFieldWorkQuery The current query, for fluid interface
     */
    public function filterByExpertId($expertId = null, $comparison = null)
    {
        if (is_array($expertId)) {
            $useMinMax = false;
            if (isset($expertId['min'])) {
                $this->addUsingAlias(ExpertFieldWorkTableMap::COL_EXPERT_ID, $expertId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($expertId['max'])) {
                $this->addUsingAlias(ExpertFieldWorkTableMap::COL_EXPERT_ID, $expertId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ExpertFieldWorkTableMap::COL_EXPERT_ID, $expertId, $comparison);
    }

    /**
     * Filter the query on the field_work_where column
     *
     * Example usage:
     * <code>
     * $query->filterByFieldWorkWhere('fooValue');   // WHERE field_work_where = 'fooValue'
     * $query->filterByFieldWorkWhere('%fooValue%', Criteria::LIKE); // WHERE field_work_where LIKE '%fooValue%'
     * </code>
     *
     * @param     string $fieldWorkWhere The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildExpertFieldWorkQuery The current query, for fluid interface
     */
    public function filterByFieldWorkWhere($fieldWorkWhere = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($fieldWorkWhere)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ExpertFieldWorkTableMap::COL_FIELD_WORK_WHERE, $fieldWorkWhere, $comparison);
    }

    /**
     * Filter the query on the field_work_year column
     *
     * Example usage:
     * <code>
     * $query->filterByFieldWorkYear(1234); // WHERE field_work_year = 1234
     * $query->filterByFieldWorkYear(array(12, 34)); // WHERE field_work_year IN (12, 34)
     * $query->filterByFieldWorkYear(array('min' => 12)); // WHERE field_work_year > 12
     * </code>
     *
     * @param     mixed $fieldWorkYear The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildExpertFieldWorkQuery The current query, for fluid interface
     */
    public function filterByFieldWorkYear($fieldWorkYear = null, $comparison = null)
    {
        if (is_array($fieldWorkYear)) {
            $useMinMax = false;
            if (isset($fieldWorkYear['min'])) {
                $this->addUsingAlias(ExpertFieldWorkTableMap::COL_FIELD_WORK_YEAR, $fieldWorkYear['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($fieldWorkYear['max'])) {
                $this->addUsingAlias(ExpertFieldWorkTableMap::COL_FIELD_WORK_YEAR, $fieldWorkYear['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ExpertFieldWorkTableMap::COL_FIELD_WORK_YEAR, $fieldWorkYear, $comparison);
    }

    /**
     * Filter the query on the field_work_month column
     *
     * Example usage:
     * <code>
     * $query->filterByFieldWorkMonth(1234); // WHERE field_work_month = 1234
     * $query->filterByFieldWorkMonth(array(12, 34)); // WHERE field_work_month IN (12, 34)
     * $query->filterByFieldWorkMonth(array('min' => 12)); // WHERE field_work_month > 12
     * </code>
     *
     * @param     mixed $fieldWorkMonth The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildExpertFieldWorkQuery The current query, for fluid interface
     */
    public function filterByFieldWorkMonth($fieldWorkMonth = null, $comparison = null)
    {
        if (is_array($fieldWorkMonth)) {
            $useMinMax = false;
            if (isset($fieldWorkMonth['min'])) {
                $this->addUsingAlias(ExpertFieldWorkTableMap::COL_FIELD_WORK_MONTH, $fieldWorkMonth['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($fieldWorkMonth['max'])) {
                $this->addUsingAlias(ExpertFieldWorkTableMap::COL_FIELD_WORK_MONTH, $fieldWorkMonth['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ExpertFieldWorkTableMap::COL_FIELD_WORK_MONTH, $fieldWorkMonth, $comparison);
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
     * @return $this|ChildExpertFieldWorkQuery The current query, for fluid interface
     */
    public function filterByTimestamp($timestamp = null, $comparison = null)
    {
        if (is_array($timestamp)) {
            $useMinMax = false;
            if (isset($timestamp['min'])) {
                $this->addUsingAlias(ExpertFieldWorkTableMap::COL_TIMESTAMP, $timestamp['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($timestamp['max'])) {
                $this->addUsingAlias(ExpertFieldWorkTableMap::COL_TIMESTAMP, $timestamp['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ExpertFieldWorkTableMap::COL_TIMESTAMP, $timestamp, $comparison);
    }

    /**
     * Filter the query by a related \CryoConnectDB\Experts object
     *
     * @param \CryoConnectDB\Experts|ObjectCollection $experts The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildExpertFieldWorkQuery The current query, for fluid interface
     */
    public function filterByExperts($experts, $comparison = null)
    {
        if ($experts instanceof \CryoConnectDB\Experts) {
            return $this
                ->addUsingAlias(ExpertFieldWorkTableMap::COL_EXPERT_ID, $experts->getId(), $comparison);
        } elseif ($experts instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(ExpertFieldWorkTableMap::COL_EXPERT_ID, $experts->toKeyValue('PrimaryKey', 'Id'), $comparison);
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
     * @return $this|ChildExpertFieldWorkQuery The current query, for fluid interface
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
     * Exclude object from result
     *
     * @param   ChildExpertFieldWork $expertFieldWork Object to remove from the list of results
     *
     * @return $this|ChildExpertFieldWorkQuery The current query, for fluid interface
     */
    public function prune($expertFieldWork = null)
    {
        if ($expertFieldWork) {
            throw new LogicException('ExpertFieldWork object has no primary key');

        }

        return $this;
    }

    /**
     * Deletes all rows from the expert_field_work table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(ExpertFieldWorkTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            ExpertFieldWorkTableMap::clearInstancePool();
            ExpertFieldWorkTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(ExpertFieldWorkTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(ExpertFieldWorkTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            ExpertFieldWorkTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            ExpertFieldWorkTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // ExpertFieldWorkQuery
