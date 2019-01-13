<?php

namespace CryoConnectDB\Base;

use \Exception;
use CryoConnectDB\ExpertSecondaryAffiliation as ChildExpertSecondaryAffiliation;
use CryoConnectDB\ExpertSecondaryAffiliationQuery as ChildExpertSecondaryAffiliationQuery;
use CryoConnectDB\Map\ExpertSecondaryAffiliationTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\LogicException;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'expert_secondary_affiliation' table.
 *
 *
 *
 * @method     ChildExpertSecondaryAffiliationQuery orderByExpertId($order = Criteria::ASC) Order by the expert_id column
 * @method     ChildExpertSecondaryAffiliationQuery orderBySecondaryAffiliationName($order = Criteria::ASC) Order by the secondary_affiliation_name column
 * @method     ChildExpertSecondaryAffiliationQuery orderByTimestamp($order = Criteria::ASC) Order by the timestamp column
 *
 * @method     ChildExpertSecondaryAffiliationQuery groupByExpertId() Group by the expert_id column
 * @method     ChildExpertSecondaryAffiliationQuery groupBySecondaryAffiliationName() Group by the secondary_affiliation_name column
 * @method     ChildExpertSecondaryAffiliationQuery groupByTimestamp() Group by the timestamp column
 *
 * @method     ChildExpertSecondaryAffiliationQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildExpertSecondaryAffiliationQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildExpertSecondaryAffiliationQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildExpertSecondaryAffiliationQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildExpertSecondaryAffiliationQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildExpertSecondaryAffiliationQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildExpertSecondaryAffiliationQuery leftJoinExperts($relationAlias = null) Adds a LEFT JOIN clause to the query using the Experts relation
 * @method     ChildExpertSecondaryAffiliationQuery rightJoinExperts($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Experts relation
 * @method     ChildExpertSecondaryAffiliationQuery innerJoinExperts($relationAlias = null) Adds a INNER JOIN clause to the query using the Experts relation
 *
 * @method     ChildExpertSecondaryAffiliationQuery joinWithExperts($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Experts relation
 *
 * @method     ChildExpertSecondaryAffiliationQuery leftJoinWithExperts() Adds a LEFT JOIN clause and with to the query using the Experts relation
 * @method     ChildExpertSecondaryAffiliationQuery rightJoinWithExperts() Adds a RIGHT JOIN clause and with to the query using the Experts relation
 * @method     ChildExpertSecondaryAffiliationQuery innerJoinWithExperts() Adds a INNER JOIN clause and with to the query using the Experts relation
 *
 * @method     \CryoConnectDB\ExpertsQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildExpertSecondaryAffiliation findOne(ConnectionInterface $con = null) Return the first ChildExpertSecondaryAffiliation matching the query
 * @method     ChildExpertSecondaryAffiliation findOneOrCreate(ConnectionInterface $con = null) Return the first ChildExpertSecondaryAffiliation matching the query, or a new ChildExpertSecondaryAffiliation object populated from the query conditions when no match is found
 *
 * @method     ChildExpertSecondaryAffiliation findOneByExpertId(int $expert_id) Return the first ChildExpertSecondaryAffiliation filtered by the expert_id column
 * @method     ChildExpertSecondaryAffiliation findOneBySecondaryAffiliationName(string $secondary_affiliation_name) Return the first ChildExpertSecondaryAffiliation filtered by the secondary_affiliation_name column
 * @method     ChildExpertSecondaryAffiliation findOneByTimestamp(string $timestamp) Return the first ChildExpertSecondaryAffiliation filtered by the timestamp column *

 * @method     ChildExpertSecondaryAffiliation requirePk($key, ConnectionInterface $con = null) Return the ChildExpertSecondaryAffiliation by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildExpertSecondaryAffiliation requireOne(ConnectionInterface $con = null) Return the first ChildExpertSecondaryAffiliation matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildExpertSecondaryAffiliation requireOneByExpertId(int $expert_id) Return the first ChildExpertSecondaryAffiliation filtered by the expert_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildExpertSecondaryAffiliation requireOneBySecondaryAffiliationName(string $secondary_affiliation_name) Return the first ChildExpertSecondaryAffiliation filtered by the secondary_affiliation_name column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildExpertSecondaryAffiliation requireOneByTimestamp(string $timestamp) Return the first ChildExpertSecondaryAffiliation filtered by the timestamp column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildExpertSecondaryAffiliation[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildExpertSecondaryAffiliation objects based on current ModelCriteria
 * @method     ChildExpertSecondaryAffiliation[]|ObjectCollection findByExpertId(int $expert_id) Return ChildExpertSecondaryAffiliation objects filtered by the expert_id column
 * @method     ChildExpertSecondaryAffiliation[]|ObjectCollection findBySecondaryAffiliationName(string $secondary_affiliation_name) Return ChildExpertSecondaryAffiliation objects filtered by the secondary_affiliation_name column
 * @method     ChildExpertSecondaryAffiliation[]|ObjectCollection findByTimestamp(string $timestamp) Return ChildExpertSecondaryAffiliation objects filtered by the timestamp column
 * @method     ChildExpertSecondaryAffiliation[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class ExpertSecondaryAffiliationQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \CryoConnectDB\Base\ExpertSecondaryAffiliationQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\CryoConnectDB\\ExpertSecondaryAffiliation', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildExpertSecondaryAffiliationQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildExpertSecondaryAffiliationQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildExpertSecondaryAffiliationQuery) {
            return $criteria;
        }
        $query = new ChildExpertSecondaryAffiliationQuery();
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
     * @return ChildExpertSecondaryAffiliation|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        throw new LogicException('The ExpertSecondaryAffiliation object has no primary key');
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
        throw new LogicException('The ExpertSecondaryAffiliation object has no primary key');
    }

    /**
     * Filter the query by primary key
     *
     * @param     mixed $key Primary key to use for the query
     *
     * @return $this|ChildExpertSecondaryAffiliationQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {
        throw new LogicException('The ExpertSecondaryAffiliation object has no primary key');
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildExpertSecondaryAffiliationQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {
        throw new LogicException('The ExpertSecondaryAffiliation object has no primary key');
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
     * @return $this|ChildExpertSecondaryAffiliationQuery The current query, for fluid interface
     */
    public function filterByExpertId($expertId = null, $comparison = null)
    {
        if (is_array($expertId)) {
            $useMinMax = false;
            if (isset($expertId['min'])) {
                $this->addUsingAlias(ExpertSecondaryAffiliationTableMap::COL_EXPERT_ID, $expertId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($expertId['max'])) {
                $this->addUsingAlias(ExpertSecondaryAffiliationTableMap::COL_EXPERT_ID, $expertId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ExpertSecondaryAffiliationTableMap::COL_EXPERT_ID, $expertId, $comparison);
    }

    /**
     * Filter the query on the secondary_affiliation_name column
     *
     * Example usage:
     * <code>
     * $query->filterBySecondaryAffiliationName('fooValue');   // WHERE secondary_affiliation_name = 'fooValue'
     * $query->filterBySecondaryAffiliationName('%fooValue%', Criteria::LIKE); // WHERE secondary_affiliation_name LIKE '%fooValue%'
     * </code>
     *
     * @param     string $secondaryAffiliationName The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildExpertSecondaryAffiliationQuery The current query, for fluid interface
     */
    public function filterBySecondaryAffiliationName($secondaryAffiliationName = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($secondaryAffiliationName)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ExpertSecondaryAffiliationTableMap::COL_SECONDARY_AFFILIATION_NAME, $secondaryAffiliationName, $comparison);
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
     * @return $this|ChildExpertSecondaryAffiliationQuery The current query, for fluid interface
     */
    public function filterByTimestamp($timestamp = null, $comparison = null)
    {
        if (is_array($timestamp)) {
            $useMinMax = false;
            if (isset($timestamp['min'])) {
                $this->addUsingAlias(ExpertSecondaryAffiliationTableMap::COL_TIMESTAMP, $timestamp['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($timestamp['max'])) {
                $this->addUsingAlias(ExpertSecondaryAffiliationTableMap::COL_TIMESTAMP, $timestamp['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ExpertSecondaryAffiliationTableMap::COL_TIMESTAMP, $timestamp, $comparison);
    }

    /**
     * Filter the query by a related \CryoConnectDB\Experts object
     *
     * @param \CryoConnectDB\Experts|ObjectCollection $experts The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildExpertSecondaryAffiliationQuery The current query, for fluid interface
     */
    public function filterByExperts($experts, $comparison = null)
    {
        if ($experts instanceof \CryoConnectDB\Experts) {
            return $this
                ->addUsingAlias(ExpertSecondaryAffiliationTableMap::COL_EXPERT_ID, $experts->getId(), $comparison);
        } elseif ($experts instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(ExpertSecondaryAffiliationTableMap::COL_EXPERT_ID, $experts->toKeyValue('PrimaryKey', 'Id'), $comparison);
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
     * @return $this|ChildExpertSecondaryAffiliationQuery The current query, for fluid interface
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
     * @param   ChildExpertSecondaryAffiliation $expertSecondaryAffiliation Object to remove from the list of results
     *
     * @return $this|ChildExpertSecondaryAffiliationQuery The current query, for fluid interface
     */
    public function prune($expertSecondaryAffiliation = null)
    {
        if ($expertSecondaryAffiliation) {
            throw new LogicException('ExpertSecondaryAffiliation object has no primary key');

        }

        return $this;
    }

    /**
     * Deletes all rows from the expert_secondary_affiliation table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(ExpertSecondaryAffiliationTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            ExpertSecondaryAffiliationTableMap::clearInstancePool();
            ExpertSecondaryAffiliationTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(ExpertSecondaryAffiliationTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(ExpertSecondaryAffiliationTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            ExpertSecondaryAffiliationTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            ExpertSecondaryAffiliationTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // ExpertSecondaryAffiliationQuery
