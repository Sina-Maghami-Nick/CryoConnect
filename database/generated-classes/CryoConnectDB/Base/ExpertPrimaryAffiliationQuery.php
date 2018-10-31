<?php

namespace CryoConnectDB\Base;

use \Exception;
use CryoConnectDB\ExpertPrimaryAffiliation as ChildExpertPrimaryAffiliation;
use CryoConnectDB\ExpertPrimaryAffiliationQuery as ChildExpertPrimaryAffiliationQuery;
use CryoConnectDB\Map\ExpertPrimaryAffiliationTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\LogicException;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'expert_primary_affiliation' table.
 *
 *
 *
 * @method     ChildExpertPrimaryAffiliationQuery orderByExpertId($order = Criteria::ASC) Order by the expert_id column
 * @method     ChildExpertPrimaryAffiliationQuery orderByPrimaryAffiliationName($order = Criteria::ASC) Order by the primary_affiliation_name column
 * @method     ChildExpertPrimaryAffiliationQuery orderByPrimaryAffiliationCountryCode($order = Criteria::ASC) Order by the primary_affiliation_country_code column
 * @method     ChildExpertPrimaryAffiliationQuery orderByPrimaryAffiliationCity($order = Criteria::ASC) Order by the primary_affiliation_city column
 * @method     ChildExpertPrimaryAffiliationQuery orderByTimestamp($order = Criteria::ASC) Order by the timestamp column
 *
 * @method     ChildExpertPrimaryAffiliationQuery groupByExpertId() Group by the expert_id column
 * @method     ChildExpertPrimaryAffiliationQuery groupByPrimaryAffiliationName() Group by the primary_affiliation_name column
 * @method     ChildExpertPrimaryAffiliationQuery groupByPrimaryAffiliationCountryCode() Group by the primary_affiliation_country_code column
 * @method     ChildExpertPrimaryAffiliationQuery groupByPrimaryAffiliationCity() Group by the primary_affiliation_city column
 * @method     ChildExpertPrimaryAffiliationQuery groupByTimestamp() Group by the timestamp column
 *
 * @method     ChildExpertPrimaryAffiliationQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildExpertPrimaryAffiliationQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildExpertPrimaryAffiliationQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildExpertPrimaryAffiliationQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildExpertPrimaryAffiliationQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildExpertPrimaryAffiliationQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildExpertPrimaryAffiliationQuery leftJoinExperts($relationAlias = null) Adds a LEFT JOIN clause to the query using the Experts relation
 * @method     ChildExpertPrimaryAffiliationQuery rightJoinExperts($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Experts relation
 * @method     ChildExpertPrimaryAffiliationQuery innerJoinExperts($relationAlias = null) Adds a INNER JOIN clause to the query using the Experts relation
 *
 * @method     ChildExpertPrimaryAffiliationQuery joinWithExperts($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Experts relation
 *
 * @method     ChildExpertPrimaryAffiliationQuery leftJoinWithExperts() Adds a LEFT JOIN clause and with to the query using the Experts relation
 * @method     ChildExpertPrimaryAffiliationQuery rightJoinWithExperts() Adds a RIGHT JOIN clause and with to the query using the Experts relation
 * @method     ChildExpertPrimaryAffiliationQuery innerJoinWithExperts() Adds a INNER JOIN clause and with to the query using the Experts relation
 *
 * @method     \CryoConnectDB\ExpertsQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildExpertPrimaryAffiliation findOne(ConnectionInterface $con = null) Return the first ChildExpertPrimaryAffiliation matching the query
 * @method     ChildExpertPrimaryAffiliation findOneOrCreate(ConnectionInterface $con = null) Return the first ChildExpertPrimaryAffiliation matching the query, or a new ChildExpertPrimaryAffiliation object populated from the query conditions when no match is found
 *
 * @method     ChildExpertPrimaryAffiliation findOneByExpertId(int $expert_id) Return the first ChildExpertPrimaryAffiliation filtered by the expert_id column
 * @method     ChildExpertPrimaryAffiliation findOneByPrimaryAffiliationName(string $primary_affiliation_name) Return the first ChildExpertPrimaryAffiliation filtered by the primary_affiliation_name column
 * @method     ChildExpertPrimaryAffiliation findOneByPrimaryAffiliationCountryCode(string $primary_affiliation_country_code) Return the first ChildExpertPrimaryAffiliation filtered by the primary_affiliation_country_code column
 * @method     ChildExpertPrimaryAffiliation findOneByPrimaryAffiliationCity(string $primary_affiliation_city) Return the first ChildExpertPrimaryAffiliation filtered by the primary_affiliation_city column
 * @method     ChildExpertPrimaryAffiliation findOneByTimestamp(string $timestamp) Return the first ChildExpertPrimaryAffiliation filtered by the timestamp column *

 * @method     ChildExpertPrimaryAffiliation requirePk($key, ConnectionInterface $con = null) Return the ChildExpertPrimaryAffiliation by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildExpertPrimaryAffiliation requireOne(ConnectionInterface $con = null) Return the first ChildExpertPrimaryAffiliation matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildExpertPrimaryAffiliation requireOneByExpertId(int $expert_id) Return the first ChildExpertPrimaryAffiliation filtered by the expert_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildExpertPrimaryAffiliation requireOneByPrimaryAffiliationName(string $primary_affiliation_name) Return the first ChildExpertPrimaryAffiliation filtered by the primary_affiliation_name column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildExpertPrimaryAffiliation requireOneByPrimaryAffiliationCountryCode(string $primary_affiliation_country_code) Return the first ChildExpertPrimaryAffiliation filtered by the primary_affiliation_country_code column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildExpertPrimaryAffiliation requireOneByPrimaryAffiliationCity(string $primary_affiliation_city) Return the first ChildExpertPrimaryAffiliation filtered by the primary_affiliation_city column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildExpertPrimaryAffiliation requireOneByTimestamp(string $timestamp) Return the first ChildExpertPrimaryAffiliation filtered by the timestamp column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildExpertPrimaryAffiliation[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildExpertPrimaryAffiliation objects based on current ModelCriteria
 * @method     ChildExpertPrimaryAffiliation[]|ObjectCollection findByExpertId(int $expert_id) Return ChildExpertPrimaryAffiliation objects filtered by the expert_id column
 * @method     ChildExpertPrimaryAffiliation[]|ObjectCollection findByPrimaryAffiliationName(string $primary_affiliation_name) Return ChildExpertPrimaryAffiliation objects filtered by the primary_affiliation_name column
 * @method     ChildExpertPrimaryAffiliation[]|ObjectCollection findByPrimaryAffiliationCountryCode(string $primary_affiliation_country_code) Return ChildExpertPrimaryAffiliation objects filtered by the primary_affiliation_country_code column
 * @method     ChildExpertPrimaryAffiliation[]|ObjectCollection findByPrimaryAffiliationCity(string $primary_affiliation_city) Return ChildExpertPrimaryAffiliation objects filtered by the primary_affiliation_city column
 * @method     ChildExpertPrimaryAffiliation[]|ObjectCollection findByTimestamp(string $timestamp) Return ChildExpertPrimaryAffiliation objects filtered by the timestamp column
 * @method     ChildExpertPrimaryAffiliation[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class ExpertPrimaryAffiliationQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \CryoConnectDB\Base\ExpertPrimaryAffiliationQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'cryo_connect', $modelName = '\\CryoConnectDB\\ExpertPrimaryAffiliation', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildExpertPrimaryAffiliationQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildExpertPrimaryAffiliationQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildExpertPrimaryAffiliationQuery) {
            return $criteria;
        }
        $query = new ChildExpertPrimaryAffiliationQuery();
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
     * @return ChildExpertPrimaryAffiliation|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        throw new LogicException('The ExpertPrimaryAffiliation object has no primary key');
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
        throw new LogicException('The ExpertPrimaryAffiliation object has no primary key');
    }

    /**
     * Filter the query by primary key
     *
     * @param     mixed $key Primary key to use for the query
     *
     * @return $this|ChildExpertPrimaryAffiliationQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {
        throw new LogicException('The ExpertPrimaryAffiliation object has no primary key');
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildExpertPrimaryAffiliationQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {
        throw new LogicException('The ExpertPrimaryAffiliation object has no primary key');
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
     * @return $this|ChildExpertPrimaryAffiliationQuery The current query, for fluid interface
     */
    public function filterByExpertId($expertId = null, $comparison = null)
    {
        if (is_array($expertId)) {
            $useMinMax = false;
            if (isset($expertId['min'])) {
                $this->addUsingAlias(ExpertPrimaryAffiliationTableMap::COL_EXPERT_ID, $expertId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($expertId['max'])) {
                $this->addUsingAlias(ExpertPrimaryAffiliationTableMap::COL_EXPERT_ID, $expertId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ExpertPrimaryAffiliationTableMap::COL_EXPERT_ID, $expertId, $comparison);
    }

    /**
     * Filter the query on the primary_affiliation_name column
     *
     * Example usage:
     * <code>
     * $query->filterByPrimaryAffiliationName('fooValue');   // WHERE primary_affiliation_name = 'fooValue'
     * $query->filterByPrimaryAffiliationName('%fooValue%', Criteria::LIKE); // WHERE primary_affiliation_name LIKE '%fooValue%'
     * </code>
     *
     * @param     string $primaryAffiliationName The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildExpertPrimaryAffiliationQuery The current query, for fluid interface
     */
    public function filterByPrimaryAffiliationName($primaryAffiliationName = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($primaryAffiliationName)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ExpertPrimaryAffiliationTableMap::COL_PRIMARY_AFFILIATION_NAME, $primaryAffiliationName, $comparison);
    }

    /**
     * Filter the query on the primary_affiliation_country_code column
     *
     * Example usage:
     * <code>
     * $query->filterByPrimaryAffiliationCountryCode('fooValue');   // WHERE primary_affiliation_country_code = 'fooValue'
     * $query->filterByPrimaryAffiliationCountryCode('%fooValue%', Criteria::LIKE); // WHERE primary_affiliation_country_code LIKE '%fooValue%'
     * </code>
     *
     * @param     string $primaryAffiliationCountryCode The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildExpertPrimaryAffiliationQuery The current query, for fluid interface
     */
    public function filterByPrimaryAffiliationCountryCode($primaryAffiliationCountryCode = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($primaryAffiliationCountryCode)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ExpertPrimaryAffiliationTableMap::COL_PRIMARY_AFFILIATION_COUNTRY_CODE, $primaryAffiliationCountryCode, $comparison);
    }

    /**
     * Filter the query on the primary_affiliation_city column
     *
     * Example usage:
     * <code>
     * $query->filterByPrimaryAffiliationCity('fooValue');   // WHERE primary_affiliation_city = 'fooValue'
     * $query->filterByPrimaryAffiliationCity('%fooValue%', Criteria::LIKE); // WHERE primary_affiliation_city LIKE '%fooValue%'
     * </code>
     *
     * @param     string $primaryAffiliationCity The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildExpertPrimaryAffiliationQuery The current query, for fluid interface
     */
    public function filterByPrimaryAffiliationCity($primaryAffiliationCity = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($primaryAffiliationCity)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ExpertPrimaryAffiliationTableMap::COL_PRIMARY_AFFILIATION_CITY, $primaryAffiliationCity, $comparison);
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
     * @return $this|ChildExpertPrimaryAffiliationQuery The current query, for fluid interface
     */
    public function filterByTimestamp($timestamp = null, $comparison = null)
    {
        if (is_array($timestamp)) {
            $useMinMax = false;
            if (isset($timestamp['min'])) {
                $this->addUsingAlias(ExpertPrimaryAffiliationTableMap::COL_TIMESTAMP, $timestamp['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($timestamp['max'])) {
                $this->addUsingAlias(ExpertPrimaryAffiliationTableMap::COL_TIMESTAMP, $timestamp['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ExpertPrimaryAffiliationTableMap::COL_TIMESTAMP, $timestamp, $comparison);
    }

    /**
     * Filter the query by a related \CryoConnectDB\Experts object
     *
     * @param \CryoConnectDB\Experts|ObjectCollection $experts The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildExpertPrimaryAffiliationQuery The current query, for fluid interface
     */
    public function filterByExperts($experts, $comparison = null)
    {
        if ($experts instanceof \CryoConnectDB\Experts) {
            return $this
                ->addUsingAlias(ExpertPrimaryAffiliationTableMap::COL_EXPERT_ID, $experts->getId(), $comparison);
        } elseif ($experts instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(ExpertPrimaryAffiliationTableMap::COL_EXPERT_ID, $experts->toKeyValue('PrimaryKey', 'Id'), $comparison);
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
     * @return $this|ChildExpertPrimaryAffiliationQuery The current query, for fluid interface
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
     * @param   ChildExpertPrimaryAffiliation $expertPrimaryAffiliation Object to remove from the list of results
     *
     * @return $this|ChildExpertPrimaryAffiliationQuery The current query, for fluid interface
     */
    public function prune($expertPrimaryAffiliation = null)
    {
        if ($expertPrimaryAffiliation) {
            throw new LogicException('ExpertPrimaryAffiliation object has no primary key');

        }

        return $this;
    }

    /**
     * Deletes all rows from the expert_primary_affiliation table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(ExpertPrimaryAffiliationTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            ExpertPrimaryAffiliationTableMap::clearInstancePool();
            ExpertPrimaryAffiliationTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(ExpertPrimaryAffiliationTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(ExpertPrimaryAffiliationTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            ExpertPrimaryAffiliationTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            ExpertPrimaryAffiliationTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // ExpertPrimaryAffiliationQuery
