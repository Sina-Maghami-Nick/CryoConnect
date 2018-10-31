<?php

namespace CryoConnectDB\Base;

use \Exception;
use CryoConnectDB\ExpertCryosphereWhere as ChildExpertCryosphereWhere;
use CryoConnectDB\ExpertCryosphereWhereQuery as ChildExpertCryosphereWhereQuery;
use CryoConnectDB\Map\ExpertCryosphereWhereTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\LogicException;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'expert_cryosphere_where' table.
 *
 *
 *
 * @method     ChildExpertCryosphereWhereQuery orderByExpertId($order = Criteria::ASC) Order by the expert_id column
 * @method     ChildExpertCryosphereWhereQuery orderByCryosphereWhereId($order = Criteria::ASC) Order by the cryosphere_where_id column
 * @method     ChildExpertCryosphereWhereQuery orderByTimestamp($order = Criteria::ASC) Order by the timestamp column
 *
 * @method     ChildExpertCryosphereWhereQuery groupByExpertId() Group by the expert_id column
 * @method     ChildExpertCryosphereWhereQuery groupByCryosphereWhereId() Group by the cryosphere_where_id column
 * @method     ChildExpertCryosphereWhereQuery groupByTimestamp() Group by the timestamp column
 *
 * @method     ChildExpertCryosphereWhereQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildExpertCryosphereWhereQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildExpertCryosphereWhereQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildExpertCryosphereWhereQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildExpertCryosphereWhereQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildExpertCryosphereWhereQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildExpertCryosphereWhereQuery leftJoinExperts($relationAlias = null) Adds a LEFT JOIN clause to the query using the Experts relation
 * @method     ChildExpertCryosphereWhereQuery rightJoinExperts($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Experts relation
 * @method     ChildExpertCryosphereWhereQuery innerJoinExperts($relationAlias = null) Adds a INNER JOIN clause to the query using the Experts relation
 *
 * @method     ChildExpertCryosphereWhereQuery joinWithExperts($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Experts relation
 *
 * @method     ChildExpertCryosphereWhereQuery leftJoinWithExperts() Adds a LEFT JOIN clause and with to the query using the Experts relation
 * @method     ChildExpertCryosphereWhereQuery rightJoinWithExperts() Adds a RIGHT JOIN clause and with to the query using the Experts relation
 * @method     ChildExpertCryosphereWhereQuery innerJoinWithExperts() Adds a INNER JOIN clause and with to the query using the Experts relation
 *
 * @method     ChildExpertCryosphereWhereQuery leftJoinCryosphereWhere($relationAlias = null) Adds a LEFT JOIN clause to the query using the CryosphereWhere relation
 * @method     ChildExpertCryosphereWhereQuery rightJoinCryosphereWhere($relationAlias = null) Adds a RIGHT JOIN clause to the query using the CryosphereWhere relation
 * @method     ChildExpertCryosphereWhereQuery innerJoinCryosphereWhere($relationAlias = null) Adds a INNER JOIN clause to the query using the CryosphereWhere relation
 *
 * @method     ChildExpertCryosphereWhereQuery joinWithCryosphereWhere($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the CryosphereWhere relation
 *
 * @method     ChildExpertCryosphereWhereQuery leftJoinWithCryosphereWhere() Adds a LEFT JOIN clause and with to the query using the CryosphereWhere relation
 * @method     ChildExpertCryosphereWhereQuery rightJoinWithCryosphereWhere() Adds a RIGHT JOIN clause and with to the query using the CryosphereWhere relation
 * @method     ChildExpertCryosphereWhereQuery innerJoinWithCryosphereWhere() Adds a INNER JOIN clause and with to the query using the CryosphereWhere relation
 *
 * @method     \CryoConnectDB\ExpertsQuery|\CryoConnectDB\CryosphereWhereQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildExpertCryosphereWhere findOne(ConnectionInterface $con = null) Return the first ChildExpertCryosphereWhere matching the query
 * @method     ChildExpertCryosphereWhere findOneOrCreate(ConnectionInterface $con = null) Return the first ChildExpertCryosphereWhere matching the query, or a new ChildExpertCryosphereWhere object populated from the query conditions when no match is found
 *
 * @method     ChildExpertCryosphereWhere findOneByExpertId(int $expert_id) Return the first ChildExpertCryosphereWhere filtered by the expert_id column
 * @method     ChildExpertCryosphereWhere findOneByCryosphereWhereId(int $cryosphere_where_id) Return the first ChildExpertCryosphereWhere filtered by the cryosphere_where_id column
 * @method     ChildExpertCryosphereWhere findOneByTimestamp(string $timestamp) Return the first ChildExpertCryosphereWhere filtered by the timestamp column *

 * @method     ChildExpertCryosphereWhere requirePk($key, ConnectionInterface $con = null) Return the ChildExpertCryosphereWhere by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildExpertCryosphereWhere requireOne(ConnectionInterface $con = null) Return the first ChildExpertCryosphereWhere matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildExpertCryosphereWhere requireOneByExpertId(int $expert_id) Return the first ChildExpertCryosphereWhere filtered by the expert_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildExpertCryosphereWhere requireOneByCryosphereWhereId(int $cryosphere_where_id) Return the first ChildExpertCryosphereWhere filtered by the cryosphere_where_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildExpertCryosphereWhere requireOneByTimestamp(string $timestamp) Return the first ChildExpertCryosphereWhere filtered by the timestamp column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildExpertCryosphereWhere[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildExpertCryosphereWhere objects based on current ModelCriteria
 * @method     ChildExpertCryosphereWhere[]|ObjectCollection findByExpertId(int $expert_id) Return ChildExpertCryosphereWhere objects filtered by the expert_id column
 * @method     ChildExpertCryosphereWhere[]|ObjectCollection findByCryosphereWhereId(int $cryosphere_where_id) Return ChildExpertCryosphereWhere objects filtered by the cryosphere_where_id column
 * @method     ChildExpertCryosphereWhere[]|ObjectCollection findByTimestamp(string $timestamp) Return ChildExpertCryosphereWhere objects filtered by the timestamp column
 * @method     ChildExpertCryosphereWhere[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class ExpertCryosphereWhereQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \CryoConnectDB\Base\ExpertCryosphereWhereQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'cryo_connect', $modelName = '\\CryoConnectDB\\ExpertCryosphereWhere', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildExpertCryosphereWhereQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildExpertCryosphereWhereQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildExpertCryosphereWhereQuery) {
            return $criteria;
        }
        $query = new ChildExpertCryosphereWhereQuery();
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
     * @return ChildExpertCryosphereWhere|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        throw new LogicException('The ExpertCryosphereWhere object has no primary key');
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
        throw new LogicException('The ExpertCryosphereWhere object has no primary key');
    }

    /**
     * Filter the query by primary key
     *
     * @param     mixed $key Primary key to use for the query
     *
     * @return $this|ChildExpertCryosphereWhereQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {
        throw new LogicException('The ExpertCryosphereWhere object has no primary key');
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildExpertCryosphereWhereQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {
        throw new LogicException('The ExpertCryosphereWhere object has no primary key');
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
     * @return $this|ChildExpertCryosphereWhereQuery The current query, for fluid interface
     */
    public function filterByExpertId($expertId = null, $comparison = null)
    {
        if (is_array($expertId)) {
            $useMinMax = false;
            if (isset($expertId['min'])) {
                $this->addUsingAlias(ExpertCryosphereWhereTableMap::COL_EXPERT_ID, $expertId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($expertId['max'])) {
                $this->addUsingAlias(ExpertCryosphereWhereTableMap::COL_EXPERT_ID, $expertId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ExpertCryosphereWhereTableMap::COL_EXPERT_ID, $expertId, $comparison);
    }

    /**
     * Filter the query on the cryosphere_where_id column
     *
     * Example usage:
     * <code>
     * $query->filterByCryosphereWhereId(1234); // WHERE cryosphere_where_id = 1234
     * $query->filterByCryosphereWhereId(array(12, 34)); // WHERE cryosphere_where_id IN (12, 34)
     * $query->filterByCryosphereWhereId(array('min' => 12)); // WHERE cryosphere_where_id > 12
     * </code>
     *
     * @see       filterByCryosphereWhere()
     *
     * @param     mixed $cryosphereWhereId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildExpertCryosphereWhereQuery The current query, for fluid interface
     */
    public function filterByCryosphereWhereId($cryosphereWhereId = null, $comparison = null)
    {
        if (is_array($cryosphereWhereId)) {
            $useMinMax = false;
            if (isset($cryosphereWhereId['min'])) {
                $this->addUsingAlias(ExpertCryosphereWhereTableMap::COL_CRYOSPHERE_WHERE_ID, $cryosphereWhereId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($cryosphereWhereId['max'])) {
                $this->addUsingAlias(ExpertCryosphereWhereTableMap::COL_CRYOSPHERE_WHERE_ID, $cryosphereWhereId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ExpertCryosphereWhereTableMap::COL_CRYOSPHERE_WHERE_ID, $cryosphereWhereId, $comparison);
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
     * @return $this|ChildExpertCryosphereWhereQuery The current query, for fluid interface
     */
    public function filterByTimestamp($timestamp = null, $comparison = null)
    {
        if (is_array($timestamp)) {
            $useMinMax = false;
            if (isset($timestamp['min'])) {
                $this->addUsingAlias(ExpertCryosphereWhereTableMap::COL_TIMESTAMP, $timestamp['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($timestamp['max'])) {
                $this->addUsingAlias(ExpertCryosphereWhereTableMap::COL_TIMESTAMP, $timestamp['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ExpertCryosphereWhereTableMap::COL_TIMESTAMP, $timestamp, $comparison);
    }

    /**
     * Filter the query by a related \CryoConnectDB\Experts object
     *
     * @param \CryoConnectDB\Experts|ObjectCollection $experts The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildExpertCryosphereWhereQuery The current query, for fluid interface
     */
    public function filterByExperts($experts, $comparison = null)
    {
        if ($experts instanceof \CryoConnectDB\Experts) {
            return $this
                ->addUsingAlias(ExpertCryosphereWhereTableMap::COL_EXPERT_ID, $experts->getId(), $comparison);
        } elseif ($experts instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(ExpertCryosphereWhereTableMap::COL_EXPERT_ID, $experts->toKeyValue('PrimaryKey', 'Id'), $comparison);
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
     * @return $this|ChildExpertCryosphereWhereQuery The current query, for fluid interface
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
     * Filter the query by a related \CryoConnectDB\CryosphereWhere object
     *
     * @param \CryoConnectDB\CryosphereWhere|ObjectCollection $cryosphereWhere The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildExpertCryosphereWhereQuery The current query, for fluid interface
     */
    public function filterByCryosphereWhere($cryosphereWhere, $comparison = null)
    {
        if ($cryosphereWhere instanceof \CryoConnectDB\CryosphereWhere) {
            return $this
                ->addUsingAlias(ExpertCryosphereWhereTableMap::COL_CRYOSPHERE_WHERE_ID, $cryosphereWhere->getId(), $comparison);
        } elseif ($cryosphereWhere instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(ExpertCryosphereWhereTableMap::COL_CRYOSPHERE_WHERE_ID, $cryosphereWhere->toKeyValue('PrimaryKey', 'Id'), $comparison);
        } else {
            throw new PropelException('filterByCryosphereWhere() only accepts arguments of type \CryoConnectDB\CryosphereWhere or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the CryosphereWhere relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildExpertCryosphereWhereQuery The current query, for fluid interface
     */
    public function joinCryosphereWhere($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('CryosphereWhere');

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
            $this->addJoinObject($join, 'CryosphereWhere');
        }

        return $this;
    }

    /**
     * Use the CryosphereWhere relation CryosphereWhere object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \CryoConnectDB\CryosphereWhereQuery A secondary query class using the current class as primary query
     */
    public function useCryosphereWhereQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinCryosphereWhere($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'CryosphereWhere', '\CryoConnectDB\CryosphereWhereQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ChildExpertCryosphereWhere $expertCryosphereWhere Object to remove from the list of results
     *
     * @return $this|ChildExpertCryosphereWhereQuery The current query, for fluid interface
     */
    public function prune($expertCryosphereWhere = null)
    {
        if ($expertCryosphereWhere) {
            throw new LogicException('ExpertCryosphereWhere object has no primary key');

        }

        return $this;
    }

    /**
     * Deletes all rows from the expert_cryosphere_where table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(ExpertCryosphereWhereTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            ExpertCryosphereWhereTableMap::clearInstancePool();
            ExpertCryosphereWhereTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(ExpertCryosphereWhereTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(ExpertCryosphereWhereTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            ExpertCryosphereWhereTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            ExpertCryosphereWhereTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // ExpertCryosphereWhereQuery
