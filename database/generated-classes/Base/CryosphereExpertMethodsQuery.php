<?php

namespace Base;

use \CryosphereExpertMethods as ChildCryosphereExpertMethods;
use \CryosphereExpertMethodsQuery as ChildCryosphereExpertMethodsQuery;
use \Exception;
use Map\CryosphereExpertMethodsTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\LogicException;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'cryosphere_expert_methods' table.
 *
 *
 *
 * @method     ChildCryosphereExpertMethodsQuery orderByExpertId($order = Criteria::ASC) Order by the expert_id column
 * @method     ChildCryosphereExpertMethodsQuery orderByMethodId($order = Criteria::ASC) Order by the method_id column
 * @method     ChildCryosphereExpertMethodsQuery orderByTimestamp($order = Criteria::ASC) Order by the timestamp column
 *
 * @method     ChildCryosphereExpertMethodsQuery groupByExpertId() Group by the expert_id column
 * @method     ChildCryosphereExpertMethodsQuery groupByMethodId() Group by the method_id column
 * @method     ChildCryosphereExpertMethodsQuery groupByTimestamp() Group by the timestamp column
 *
 * @method     ChildCryosphereExpertMethodsQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildCryosphereExpertMethodsQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildCryosphereExpertMethodsQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildCryosphereExpertMethodsQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildCryosphereExpertMethodsQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildCryosphereExpertMethodsQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildCryosphereExpertMethodsQuery leftJoinExperts($relationAlias = null) Adds a LEFT JOIN clause to the query using the Experts relation
 * @method     ChildCryosphereExpertMethodsQuery rightJoinExperts($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Experts relation
 * @method     ChildCryosphereExpertMethodsQuery innerJoinExperts($relationAlias = null) Adds a INNER JOIN clause to the query using the Experts relation
 *
 * @method     ChildCryosphereExpertMethodsQuery joinWithExperts($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Experts relation
 *
 * @method     ChildCryosphereExpertMethodsQuery leftJoinWithExperts() Adds a LEFT JOIN clause and with to the query using the Experts relation
 * @method     ChildCryosphereExpertMethodsQuery rightJoinWithExperts() Adds a RIGHT JOIN clause and with to the query using the Experts relation
 * @method     ChildCryosphereExpertMethodsQuery innerJoinWithExperts() Adds a INNER JOIN clause and with to the query using the Experts relation
 *
 * @method     ChildCryosphereExpertMethodsQuery leftJoinCryosphereMethods($relationAlias = null) Adds a LEFT JOIN clause to the query using the CryosphereMethods relation
 * @method     ChildCryosphereExpertMethodsQuery rightJoinCryosphereMethods($relationAlias = null) Adds a RIGHT JOIN clause to the query using the CryosphereMethods relation
 * @method     ChildCryosphereExpertMethodsQuery innerJoinCryosphereMethods($relationAlias = null) Adds a INNER JOIN clause to the query using the CryosphereMethods relation
 *
 * @method     ChildCryosphereExpertMethodsQuery joinWithCryosphereMethods($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the CryosphereMethods relation
 *
 * @method     ChildCryosphereExpertMethodsQuery leftJoinWithCryosphereMethods() Adds a LEFT JOIN clause and with to the query using the CryosphereMethods relation
 * @method     ChildCryosphereExpertMethodsQuery rightJoinWithCryosphereMethods() Adds a RIGHT JOIN clause and with to the query using the CryosphereMethods relation
 * @method     ChildCryosphereExpertMethodsQuery innerJoinWithCryosphereMethods() Adds a INNER JOIN clause and with to the query using the CryosphereMethods relation
 *
 * @method     \ExpertsQuery|\CryosphereMethodsQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildCryosphereExpertMethods findOne(ConnectionInterface $con = null) Return the first ChildCryosphereExpertMethods matching the query
 * @method     ChildCryosphereExpertMethods findOneOrCreate(ConnectionInterface $con = null) Return the first ChildCryosphereExpertMethods matching the query, or a new ChildCryosphereExpertMethods object populated from the query conditions when no match is found
 *
 * @method     ChildCryosphereExpertMethods findOneByExpertId(int $expert_id) Return the first ChildCryosphereExpertMethods filtered by the expert_id column
 * @method     ChildCryosphereExpertMethods findOneByMethodId(int $method_id) Return the first ChildCryosphereExpertMethods filtered by the method_id column
 * @method     ChildCryosphereExpertMethods findOneByTimestamp(string $timestamp) Return the first ChildCryosphereExpertMethods filtered by the timestamp column *

 * @method     ChildCryosphereExpertMethods requirePk($key, ConnectionInterface $con = null) Return the ChildCryosphereExpertMethods by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCryosphereExpertMethods requireOne(ConnectionInterface $con = null) Return the first ChildCryosphereExpertMethods matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildCryosphereExpertMethods requireOneByExpertId(int $expert_id) Return the first ChildCryosphereExpertMethods filtered by the expert_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCryosphereExpertMethods requireOneByMethodId(int $method_id) Return the first ChildCryosphereExpertMethods filtered by the method_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCryosphereExpertMethods requireOneByTimestamp(string $timestamp) Return the first ChildCryosphereExpertMethods filtered by the timestamp column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildCryosphereExpertMethods[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildCryosphereExpertMethods objects based on current ModelCriteria
 * @method     ChildCryosphereExpertMethods[]|ObjectCollection findByExpertId(int $expert_id) Return ChildCryosphereExpertMethods objects filtered by the expert_id column
 * @method     ChildCryosphereExpertMethods[]|ObjectCollection findByMethodId(int $method_id) Return ChildCryosphereExpertMethods objects filtered by the method_id column
 * @method     ChildCryosphereExpertMethods[]|ObjectCollection findByTimestamp(string $timestamp) Return ChildCryosphereExpertMethods objects filtered by the timestamp column
 * @method     ChildCryosphereExpertMethods[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class CryosphereExpertMethodsQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\CryosphereExpertMethodsQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'cryo_connect', $modelName = '\\CryosphereExpertMethods', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildCryosphereExpertMethodsQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildCryosphereExpertMethodsQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildCryosphereExpertMethodsQuery) {
            return $criteria;
        }
        $query = new ChildCryosphereExpertMethodsQuery();
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
     * @return ChildCryosphereExpertMethods|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        throw new LogicException('The CryosphereExpertMethods object has no primary key');
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
        throw new LogicException('The CryosphereExpertMethods object has no primary key');
    }

    /**
     * Filter the query by primary key
     *
     * @param     mixed $key Primary key to use for the query
     *
     * @return $this|ChildCryosphereExpertMethodsQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {
        throw new LogicException('The CryosphereExpertMethods object has no primary key');
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildCryosphereExpertMethodsQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {
        throw new LogicException('The CryosphereExpertMethods object has no primary key');
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
     * @return $this|ChildCryosphereExpertMethodsQuery The current query, for fluid interface
     */
    public function filterByExpertId($expertId = null, $comparison = null)
    {
        if (is_array($expertId)) {
            $useMinMax = false;
            if (isset($expertId['min'])) {
                $this->addUsingAlias(CryosphereExpertMethodsTableMap::COL_EXPERT_ID, $expertId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($expertId['max'])) {
                $this->addUsingAlias(CryosphereExpertMethodsTableMap::COL_EXPERT_ID, $expertId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CryosphereExpertMethodsTableMap::COL_EXPERT_ID, $expertId, $comparison);
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
     * @return $this|ChildCryosphereExpertMethodsQuery The current query, for fluid interface
     */
    public function filterByMethodId($methodId = null, $comparison = null)
    {
        if (is_array($methodId)) {
            $useMinMax = false;
            if (isset($methodId['min'])) {
                $this->addUsingAlias(CryosphereExpertMethodsTableMap::COL_METHOD_ID, $methodId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($methodId['max'])) {
                $this->addUsingAlias(CryosphereExpertMethodsTableMap::COL_METHOD_ID, $methodId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CryosphereExpertMethodsTableMap::COL_METHOD_ID, $methodId, $comparison);
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
     * @return $this|ChildCryosphereExpertMethodsQuery The current query, for fluid interface
     */
    public function filterByTimestamp($timestamp = null, $comparison = null)
    {
        if (is_array($timestamp)) {
            $useMinMax = false;
            if (isset($timestamp['min'])) {
                $this->addUsingAlias(CryosphereExpertMethodsTableMap::COL_TIMESTAMP, $timestamp['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($timestamp['max'])) {
                $this->addUsingAlias(CryosphereExpertMethodsTableMap::COL_TIMESTAMP, $timestamp['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CryosphereExpertMethodsTableMap::COL_TIMESTAMP, $timestamp, $comparison);
    }

    /**
     * Filter the query by a related \Experts object
     *
     * @param \Experts|ObjectCollection $experts The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildCryosphereExpertMethodsQuery The current query, for fluid interface
     */
    public function filterByExperts($experts, $comparison = null)
    {
        if ($experts instanceof \Experts) {
            return $this
                ->addUsingAlias(CryosphereExpertMethodsTableMap::COL_EXPERT_ID, $experts->getId(), $comparison);
        } elseif ($experts instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(CryosphereExpertMethodsTableMap::COL_EXPERT_ID, $experts->toKeyValue('PrimaryKey', 'Id'), $comparison);
        } else {
            throw new PropelException('filterByExperts() only accepts arguments of type \Experts or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Experts relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildCryosphereExpertMethodsQuery The current query, for fluid interface
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
     * @return \ExpertsQuery A secondary query class using the current class as primary query
     */
    public function useExpertsQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinExperts($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Experts', '\ExpertsQuery');
    }

    /**
     * Filter the query by a related \CryosphereMethods object
     *
     * @param \CryosphereMethods|ObjectCollection $cryosphereMethods The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildCryosphereExpertMethodsQuery The current query, for fluid interface
     */
    public function filterByCryosphereMethods($cryosphereMethods, $comparison = null)
    {
        if ($cryosphereMethods instanceof \CryosphereMethods) {
            return $this
                ->addUsingAlias(CryosphereExpertMethodsTableMap::COL_METHOD_ID, $cryosphereMethods->getId(), $comparison);
        } elseif ($cryosphereMethods instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(CryosphereExpertMethodsTableMap::COL_METHOD_ID, $cryosphereMethods->toKeyValue('PrimaryKey', 'Id'), $comparison);
        } else {
            throw new PropelException('filterByCryosphereMethods() only accepts arguments of type \CryosphereMethods or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the CryosphereMethods relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildCryosphereExpertMethodsQuery The current query, for fluid interface
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
     * @return \CryosphereMethodsQuery A secondary query class using the current class as primary query
     */
    public function useCryosphereMethodsQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinCryosphereMethods($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'CryosphereMethods', '\CryosphereMethodsQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ChildCryosphereExpertMethods $cryosphereExpertMethods Object to remove from the list of results
     *
     * @return $this|ChildCryosphereExpertMethodsQuery The current query, for fluid interface
     */
    public function prune($cryosphereExpertMethods = null)
    {
        if ($cryosphereExpertMethods) {
            throw new LogicException('CryosphereExpertMethods object has no primary key');

        }

        return $this;
    }

    /**
     * Deletes all rows from the cryosphere_expert_methods table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(CryosphereExpertMethodsTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            CryosphereExpertMethodsTableMap::clearInstancePool();
            CryosphereExpertMethodsTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(CryosphereExpertMethodsTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(CryosphereExpertMethodsTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            CryosphereExpertMethodsTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            CryosphereExpertMethodsTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // CryosphereExpertMethodsQuery
