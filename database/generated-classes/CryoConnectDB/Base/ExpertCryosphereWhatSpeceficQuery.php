<?php

namespace CryoConnectDB\Base;

use \Exception;
use CryoConnectDB\ExpertCryosphereWhatSpecefic as ChildExpertCryosphereWhatSpecefic;
use CryoConnectDB\ExpertCryosphereWhatSpeceficQuery as ChildExpertCryosphereWhatSpeceficQuery;
use CryoConnectDB\Map\ExpertCryosphereWhatSpeceficTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\LogicException;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'expert_cryosphere_what_specefic' table.
 *
 *
 *
 * @method     ChildExpertCryosphereWhatSpeceficQuery orderByExpertId($order = Criteria::ASC) Order by the expert_id column
 * @method     ChildExpertCryosphereWhatSpeceficQuery orderByCryosphereWhatSpeceficId($order = Criteria::ASC) Order by the cryosphere_what_specefic_id column
 * @method     ChildExpertCryosphereWhatSpeceficQuery orderByTimestamp($order = Criteria::ASC) Order by the timestamp column
 *
 * @method     ChildExpertCryosphereWhatSpeceficQuery groupByExpertId() Group by the expert_id column
 * @method     ChildExpertCryosphereWhatSpeceficQuery groupByCryosphereWhatSpeceficId() Group by the cryosphere_what_specefic_id column
 * @method     ChildExpertCryosphereWhatSpeceficQuery groupByTimestamp() Group by the timestamp column
 *
 * @method     ChildExpertCryosphereWhatSpeceficQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildExpertCryosphereWhatSpeceficQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildExpertCryosphereWhatSpeceficQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildExpertCryosphereWhatSpeceficQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildExpertCryosphereWhatSpeceficQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildExpertCryosphereWhatSpeceficQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildExpertCryosphereWhatSpeceficQuery leftJoinExperts($relationAlias = null) Adds a LEFT JOIN clause to the query using the Experts relation
 * @method     ChildExpertCryosphereWhatSpeceficQuery rightJoinExperts($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Experts relation
 * @method     ChildExpertCryosphereWhatSpeceficQuery innerJoinExperts($relationAlias = null) Adds a INNER JOIN clause to the query using the Experts relation
 *
 * @method     ChildExpertCryosphereWhatSpeceficQuery joinWithExperts($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Experts relation
 *
 * @method     ChildExpertCryosphereWhatSpeceficQuery leftJoinWithExperts() Adds a LEFT JOIN clause and with to the query using the Experts relation
 * @method     ChildExpertCryosphereWhatSpeceficQuery rightJoinWithExperts() Adds a RIGHT JOIN clause and with to the query using the Experts relation
 * @method     ChildExpertCryosphereWhatSpeceficQuery innerJoinWithExperts() Adds a INNER JOIN clause and with to the query using the Experts relation
 *
 * @method     ChildExpertCryosphereWhatSpeceficQuery leftJoinCryosphereWhatSpecefic($relationAlias = null) Adds a LEFT JOIN clause to the query using the CryosphereWhatSpecefic relation
 * @method     ChildExpertCryosphereWhatSpeceficQuery rightJoinCryosphereWhatSpecefic($relationAlias = null) Adds a RIGHT JOIN clause to the query using the CryosphereWhatSpecefic relation
 * @method     ChildExpertCryosphereWhatSpeceficQuery innerJoinCryosphereWhatSpecefic($relationAlias = null) Adds a INNER JOIN clause to the query using the CryosphereWhatSpecefic relation
 *
 * @method     ChildExpertCryosphereWhatSpeceficQuery joinWithCryosphereWhatSpecefic($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the CryosphereWhatSpecefic relation
 *
 * @method     ChildExpertCryosphereWhatSpeceficQuery leftJoinWithCryosphereWhatSpecefic() Adds a LEFT JOIN clause and with to the query using the CryosphereWhatSpecefic relation
 * @method     ChildExpertCryosphereWhatSpeceficQuery rightJoinWithCryosphereWhatSpecefic() Adds a RIGHT JOIN clause and with to the query using the CryosphereWhatSpecefic relation
 * @method     ChildExpertCryosphereWhatSpeceficQuery innerJoinWithCryosphereWhatSpecefic() Adds a INNER JOIN clause and with to the query using the CryosphereWhatSpecefic relation
 *
 * @method     \CryoConnectDB\ExpertsQuery|\CryoConnectDB\CryosphereWhatSpeceficQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildExpertCryosphereWhatSpecefic findOne(ConnectionInterface $con = null) Return the first ChildExpertCryosphereWhatSpecefic matching the query
 * @method     ChildExpertCryosphereWhatSpecefic findOneOrCreate(ConnectionInterface $con = null) Return the first ChildExpertCryosphereWhatSpecefic matching the query, or a new ChildExpertCryosphereWhatSpecefic object populated from the query conditions when no match is found
 *
 * @method     ChildExpertCryosphereWhatSpecefic findOneByExpertId(int $expert_id) Return the first ChildExpertCryosphereWhatSpecefic filtered by the expert_id column
 * @method     ChildExpertCryosphereWhatSpecefic findOneByCryosphereWhatSpeceficId(int $cryosphere_what_specefic_id) Return the first ChildExpertCryosphereWhatSpecefic filtered by the cryosphere_what_specefic_id column
 * @method     ChildExpertCryosphereWhatSpecefic findOneByTimestamp(string $timestamp) Return the first ChildExpertCryosphereWhatSpecefic filtered by the timestamp column *

 * @method     ChildExpertCryosphereWhatSpecefic requirePk($key, ConnectionInterface $con = null) Return the ChildExpertCryosphereWhatSpecefic by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildExpertCryosphereWhatSpecefic requireOne(ConnectionInterface $con = null) Return the first ChildExpertCryosphereWhatSpecefic matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildExpertCryosphereWhatSpecefic requireOneByExpertId(int $expert_id) Return the first ChildExpertCryosphereWhatSpecefic filtered by the expert_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildExpertCryosphereWhatSpecefic requireOneByCryosphereWhatSpeceficId(int $cryosphere_what_specefic_id) Return the first ChildExpertCryosphereWhatSpecefic filtered by the cryosphere_what_specefic_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildExpertCryosphereWhatSpecefic requireOneByTimestamp(string $timestamp) Return the first ChildExpertCryosphereWhatSpecefic filtered by the timestamp column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildExpertCryosphereWhatSpecefic[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildExpertCryosphereWhatSpecefic objects based on current ModelCriteria
 * @method     ChildExpertCryosphereWhatSpecefic[]|ObjectCollection findByExpertId(int $expert_id) Return ChildExpertCryosphereWhatSpecefic objects filtered by the expert_id column
 * @method     ChildExpertCryosphereWhatSpecefic[]|ObjectCollection findByCryosphereWhatSpeceficId(int $cryosphere_what_specefic_id) Return ChildExpertCryosphereWhatSpecefic objects filtered by the cryosphere_what_specefic_id column
 * @method     ChildExpertCryosphereWhatSpecefic[]|ObjectCollection findByTimestamp(string $timestamp) Return ChildExpertCryosphereWhatSpecefic objects filtered by the timestamp column
 * @method     ChildExpertCryosphereWhatSpecefic[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class ExpertCryosphereWhatSpeceficQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \CryoConnectDB\Base\ExpertCryosphereWhatSpeceficQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'cryo_connect', $modelName = '\\CryoConnectDB\\ExpertCryosphereWhatSpecefic', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildExpertCryosphereWhatSpeceficQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildExpertCryosphereWhatSpeceficQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildExpertCryosphereWhatSpeceficQuery) {
            return $criteria;
        }
        $query = new ChildExpertCryosphereWhatSpeceficQuery();
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
     * @return ChildExpertCryosphereWhatSpecefic|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        throw new LogicException('The ExpertCryosphereWhatSpecefic object has no primary key');
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
        throw new LogicException('The ExpertCryosphereWhatSpecefic object has no primary key');
    }

    /**
     * Filter the query by primary key
     *
     * @param     mixed $key Primary key to use for the query
     *
     * @return $this|ChildExpertCryosphereWhatSpeceficQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {
        throw new LogicException('The ExpertCryosphereWhatSpecefic object has no primary key');
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildExpertCryosphereWhatSpeceficQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {
        throw new LogicException('The ExpertCryosphereWhatSpecefic object has no primary key');
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
     * @return $this|ChildExpertCryosphereWhatSpeceficQuery The current query, for fluid interface
     */
    public function filterByExpertId($expertId = null, $comparison = null)
    {
        if (is_array($expertId)) {
            $useMinMax = false;
            if (isset($expertId['min'])) {
                $this->addUsingAlias(ExpertCryosphereWhatSpeceficTableMap::COL_EXPERT_ID, $expertId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($expertId['max'])) {
                $this->addUsingAlias(ExpertCryosphereWhatSpeceficTableMap::COL_EXPERT_ID, $expertId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ExpertCryosphereWhatSpeceficTableMap::COL_EXPERT_ID, $expertId, $comparison);
    }

    /**
     * Filter the query on the cryosphere_what_specefic_id column
     *
     * Example usage:
     * <code>
     * $query->filterByCryosphereWhatSpeceficId(1234); // WHERE cryosphere_what_specefic_id = 1234
     * $query->filterByCryosphereWhatSpeceficId(array(12, 34)); // WHERE cryosphere_what_specefic_id IN (12, 34)
     * $query->filterByCryosphereWhatSpeceficId(array('min' => 12)); // WHERE cryosphere_what_specefic_id > 12
     * </code>
     *
     * @see       filterByCryosphereWhatSpecefic()
     *
     * @param     mixed $cryosphereWhatSpeceficId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildExpertCryosphereWhatSpeceficQuery The current query, for fluid interface
     */
    public function filterByCryosphereWhatSpeceficId($cryosphereWhatSpeceficId = null, $comparison = null)
    {
        if (is_array($cryosphereWhatSpeceficId)) {
            $useMinMax = false;
            if (isset($cryosphereWhatSpeceficId['min'])) {
                $this->addUsingAlias(ExpertCryosphereWhatSpeceficTableMap::COL_CRYOSPHERE_WHAT_SPECEFIC_ID, $cryosphereWhatSpeceficId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($cryosphereWhatSpeceficId['max'])) {
                $this->addUsingAlias(ExpertCryosphereWhatSpeceficTableMap::COL_CRYOSPHERE_WHAT_SPECEFIC_ID, $cryosphereWhatSpeceficId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ExpertCryosphereWhatSpeceficTableMap::COL_CRYOSPHERE_WHAT_SPECEFIC_ID, $cryosphereWhatSpeceficId, $comparison);
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
     * @return $this|ChildExpertCryosphereWhatSpeceficQuery The current query, for fluid interface
     */
    public function filterByTimestamp($timestamp = null, $comparison = null)
    {
        if (is_array($timestamp)) {
            $useMinMax = false;
            if (isset($timestamp['min'])) {
                $this->addUsingAlias(ExpertCryosphereWhatSpeceficTableMap::COL_TIMESTAMP, $timestamp['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($timestamp['max'])) {
                $this->addUsingAlias(ExpertCryosphereWhatSpeceficTableMap::COL_TIMESTAMP, $timestamp['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ExpertCryosphereWhatSpeceficTableMap::COL_TIMESTAMP, $timestamp, $comparison);
    }

    /**
     * Filter the query by a related \CryoConnectDB\Experts object
     *
     * @param \CryoConnectDB\Experts|ObjectCollection $experts The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildExpertCryosphereWhatSpeceficQuery The current query, for fluid interface
     */
    public function filterByExperts($experts, $comparison = null)
    {
        if ($experts instanceof \CryoConnectDB\Experts) {
            return $this
                ->addUsingAlias(ExpertCryosphereWhatSpeceficTableMap::COL_EXPERT_ID, $experts->getId(), $comparison);
        } elseif ($experts instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(ExpertCryosphereWhatSpeceficTableMap::COL_EXPERT_ID, $experts->toKeyValue('PrimaryKey', 'Id'), $comparison);
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
     * @return $this|ChildExpertCryosphereWhatSpeceficQuery The current query, for fluid interface
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
     * Filter the query by a related \CryoConnectDB\CryosphereWhatSpecefic object
     *
     * @param \CryoConnectDB\CryosphereWhatSpecefic|ObjectCollection $cryosphereWhatSpecefic The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildExpertCryosphereWhatSpeceficQuery The current query, for fluid interface
     */
    public function filterByCryosphereWhatSpecefic($cryosphereWhatSpecefic, $comparison = null)
    {
        if ($cryosphereWhatSpecefic instanceof \CryoConnectDB\CryosphereWhatSpecefic) {
            return $this
                ->addUsingAlias(ExpertCryosphereWhatSpeceficTableMap::COL_CRYOSPHERE_WHAT_SPECEFIC_ID, $cryosphereWhatSpecefic->getId(), $comparison);
        } elseif ($cryosphereWhatSpecefic instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(ExpertCryosphereWhatSpeceficTableMap::COL_CRYOSPHERE_WHAT_SPECEFIC_ID, $cryosphereWhatSpecefic->toKeyValue('PrimaryKey', 'Id'), $comparison);
        } else {
            throw new PropelException('filterByCryosphereWhatSpecefic() only accepts arguments of type \CryoConnectDB\CryosphereWhatSpecefic or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the CryosphereWhatSpecefic relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildExpertCryosphereWhatSpeceficQuery The current query, for fluid interface
     */
    public function joinCryosphereWhatSpecefic($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('CryosphereWhatSpecefic');

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
            $this->addJoinObject($join, 'CryosphereWhatSpecefic');
        }

        return $this;
    }

    /**
     * Use the CryosphereWhatSpecefic relation CryosphereWhatSpecefic object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \CryoConnectDB\CryosphereWhatSpeceficQuery A secondary query class using the current class as primary query
     */
    public function useCryosphereWhatSpeceficQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinCryosphereWhatSpecefic($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'CryosphereWhatSpecefic', '\CryoConnectDB\CryosphereWhatSpeceficQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ChildExpertCryosphereWhatSpecefic $expertCryosphereWhatSpecefic Object to remove from the list of results
     *
     * @return $this|ChildExpertCryosphereWhatSpeceficQuery The current query, for fluid interface
     */
    public function prune($expertCryosphereWhatSpecefic = null)
    {
        if ($expertCryosphereWhatSpecefic) {
            throw new LogicException('ExpertCryosphereWhatSpecefic object has no primary key');

        }

        return $this;
    }

    /**
     * Deletes all rows from the expert_cryosphere_what_specefic table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(ExpertCryosphereWhatSpeceficTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            ExpertCryosphereWhatSpeceficTableMap::clearInstancePool();
            ExpertCryosphereWhatSpeceficTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(ExpertCryosphereWhatSpeceficTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(ExpertCryosphereWhatSpeceficTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            ExpertCryosphereWhatSpeceficTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            ExpertCryosphereWhatSpeceficTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // ExpertCryosphereWhatSpeceficQuery
