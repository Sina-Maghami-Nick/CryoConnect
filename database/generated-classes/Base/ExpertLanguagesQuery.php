<?php

namespace Base;

use \ExpertLanguages as ChildExpertLanguages;
use \ExpertLanguagesQuery as ChildExpertLanguagesQuery;
use \Exception;
use Map\ExpertLanguagesTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\LogicException;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'expert_languages' table.
 *
 *
 *
 * @method     ChildExpertLanguagesQuery orderByExpertId($order = Criteria::ASC) Order by the expert_id column
 * @method     ChildExpertLanguagesQuery orderByLanguageCode($order = Criteria::ASC) Order by the language_code column
 * @method     ChildExpertLanguagesQuery orderByTimestamp($order = Criteria::ASC) Order by the timestamp column
 *
 * @method     ChildExpertLanguagesQuery groupByExpertId() Group by the expert_id column
 * @method     ChildExpertLanguagesQuery groupByLanguageCode() Group by the language_code column
 * @method     ChildExpertLanguagesQuery groupByTimestamp() Group by the timestamp column
 *
 * @method     ChildExpertLanguagesQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildExpertLanguagesQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildExpertLanguagesQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildExpertLanguagesQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildExpertLanguagesQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildExpertLanguagesQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildExpertLanguagesQuery leftJoinExperts($relationAlias = null) Adds a LEFT JOIN clause to the query using the Experts relation
 * @method     ChildExpertLanguagesQuery rightJoinExperts($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Experts relation
 * @method     ChildExpertLanguagesQuery innerJoinExperts($relationAlias = null) Adds a INNER JOIN clause to the query using the Experts relation
 *
 * @method     ChildExpertLanguagesQuery joinWithExperts($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Experts relation
 *
 * @method     ChildExpertLanguagesQuery leftJoinWithExperts() Adds a LEFT JOIN clause and with to the query using the Experts relation
 * @method     ChildExpertLanguagesQuery rightJoinWithExperts() Adds a RIGHT JOIN clause and with to the query using the Experts relation
 * @method     ChildExpertLanguagesQuery innerJoinWithExperts() Adds a INNER JOIN clause and with to the query using the Experts relation
 *
 * @method     ChildExpertLanguagesQuery leftJoinLanguages($relationAlias = null) Adds a LEFT JOIN clause to the query using the Languages relation
 * @method     ChildExpertLanguagesQuery rightJoinLanguages($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Languages relation
 * @method     ChildExpertLanguagesQuery innerJoinLanguages($relationAlias = null) Adds a INNER JOIN clause to the query using the Languages relation
 *
 * @method     ChildExpertLanguagesQuery joinWithLanguages($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Languages relation
 *
 * @method     ChildExpertLanguagesQuery leftJoinWithLanguages() Adds a LEFT JOIN clause and with to the query using the Languages relation
 * @method     ChildExpertLanguagesQuery rightJoinWithLanguages() Adds a RIGHT JOIN clause and with to the query using the Languages relation
 * @method     ChildExpertLanguagesQuery innerJoinWithLanguages() Adds a INNER JOIN clause and with to the query using the Languages relation
 *
 * @method     \ExpertsQuery|\LanguagesQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildExpertLanguages findOne(ConnectionInterface $con = null) Return the first ChildExpertLanguages matching the query
 * @method     ChildExpertLanguages findOneOrCreate(ConnectionInterface $con = null) Return the first ChildExpertLanguages matching the query, or a new ChildExpertLanguages object populated from the query conditions when no match is found
 *
 * @method     ChildExpertLanguages findOneByExpertId(int $expert_id) Return the first ChildExpertLanguages filtered by the expert_id column
 * @method     ChildExpertLanguages findOneByLanguageCode(string $language_code) Return the first ChildExpertLanguages filtered by the language_code column
 * @method     ChildExpertLanguages findOneByTimestamp(string $timestamp) Return the first ChildExpertLanguages filtered by the timestamp column *

 * @method     ChildExpertLanguages requirePk($key, ConnectionInterface $con = null) Return the ChildExpertLanguages by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildExpertLanguages requireOne(ConnectionInterface $con = null) Return the first ChildExpertLanguages matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildExpertLanguages requireOneByExpertId(int $expert_id) Return the first ChildExpertLanguages filtered by the expert_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildExpertLanguages requireOneByLanguageCode(string $language_code) Return the first ChildExpertLanguages filtered by the language_code column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildExpertLanguages requireOneByTimestamp(string $timestamp) Return the first ChildExpertLanguages filtered by the timestamp column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildExpertLanguages[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildExpertLanguages objects based on current ModelCriteria
 * @method     ChildExpertLanguages[]|ObjectCollection findByExpertId(int $expert_id) Return ChildExpertLanguages objects filtered by the expert_id column
 * @method     ChildExpertLanguages[]|ObjectCollection findByLanguageCode(string $language_code) Return ChildExpertLanguages objects filtered by the language_code column
 * @method     ChildExpertLanguages[]|ObjectCollection findByTimestamp(string $timestamp) Return ChildExpertLanguages objects filtered by the timestamp column
 * @method     ChildExpertLanguages[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class ExpertLanguagesQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\ExpertLanguagesQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'cryo_connect', $modelName = '\\ExpertLanguages', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildExpertLanguagesQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildExpertLanguagesQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildExpertLanguagesQuery) {
            return $criteria;
        }
        $query = new ChildExpertLanguagesQuery();
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
     * @return ChildExpertLanguages|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        throw new LogicException('The ExpertLanguages object has no primary key');
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
        throw new LogicException('The ExpertLanguages object has no primary key');
    }

    /**
     * Filter the query by primary key
     *
     * @param     mixed $key Primary key to use for the query
     *
     * @return $this|ChildExpertLanguagesQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {
        throw new LogicException('The ExpertLanguages object has no primary key');
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildExpertLanguagesQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {
        throw new LogicException('The ExpertLanguages object has no primary key');
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
     * @return $this|ChildExpertLanguagesQuery The current query, for fluid interface
     */
    public function filterByExpertId($expertId = null, $comparison = null)
    {
        if (is_array($expertId)) {
            $useMinMax = false;
            if (isset($expertId['min'])) {
                $this->addUsingAlias(ExpertLanguagesTableMap::COL_EXPERT_ID, $expertId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($expertId['max'])) {
                $this->addUsingAlias(ExpertLanguagesTableMap::COL_EXPERT_ID, $expertId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ExpertLanguagesTableMap::COL_EXPERT_ID, $expertId, $comparison);
    }

    /**
     * Filter the query on the language_code column
     *
     * Example usage:
     * <code>
     * $query->filterByLanguageCode('fooValue');   // WHERE language_code = 'fooValue'
     * $query->filterByLanguageCode('%fooValue%', Criteria::LIKE); // WHERE language_code LIKE '%fooValue%'
     * </code>
     *
     * @param     string $languageCode The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildExpertLanguagesQuery The current query, for fluid interface
     */
    public function filterByLanguageCode($languageCode = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($languageCode)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ExpertLanguagesTableMap::COL_LANGUAGE_CODE, $languageCode, $comparison);
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
     * @return $this|ChildExpertLanguagesQuery The current query, for fluid interface
     */
    public function filterByTimestamp($timestamp = null, $comparison = null)
    {
        if (is_array($timestamp)) {
            $useMinMax = false;
            if (isset($timestamp['min'])) {
                $this->addUsingAlias(ExpertLanguagesTableMap::COL_TIMESTAMP, $timestamp['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($timestamp['max'])) {
                $this->addUsingAlias(ExpertLanguagesTableMap::COL_TIMESTAMP, $timestamp['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ExpertLanguagesTableMap::COL_TIMESTAMP, $timestamp, $comparison);
    }

    /**
     * Filter the query by a related \Experts object
     *
     * @param \Experts|ObjectCollection $experts The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildExpertLanguagesQuery The current query, for fluid interface
     */
    public function filterByExperts($experts, $comparison = null)
    {
        if ($experts instanceof \Experts) {
            return $this
                ->addUsingAlias(ExpertLanguagesTableMap::COL_EXPERT_ID, $experts->getId(), $comparison);
        } elseif ($experts instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(ExpertLanguagesTableMap::COL_EXPERT_ID, $experts->toKeyValue('PrimaryKey', 'Id'), $comparison);
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
     * @return $this|ChildExpertLanguagesQuery The current query, for fluid interface
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
     * Filter the query by a related \Languages object
     *
     * @param \Languages|ObjectCollection $languages The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildExpertLanguagesQuery The current query, for fluid interface
     */
    public function filterByLanguages($languages, $comparison = null)
    {
        if ($languages instanceof \Languages) {
            return $this
                ->addUsingAlias(ExpertLanguagesTableMap::COL_LANGUAGE_CODE, $languages->getLanguageCode(), $comparison);
        } elseif ($languages instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(ExpertLanguagesTableMap::COL_LANGUAGE_CODE, $languages->toKeyValue('PrimaryKey', 'LanguageCode'), $comparison);
        } else {
            throw new PropelException('filterByLanguages() only accepts arguments of type \Languages or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Languages relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildExpertLanguagesQuery The current query, for fluid interface
     */
    public function joinLanguages($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Languages');

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
            $this->addJoinObject($join, 'Languages');
        }

        return $this;
    }

    /**
     * Use the Languages relation Languages object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \LanguagesQuery A secondary query class using the current class as primary query
     */
    public function useLanguagesQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinLanguages($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Languages', '\LanguagesQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ChildExpertLanguages $expertLanguages Object to remove from the list of results
     *
     * @return $this|ChildExpertLanguagesQuery The current query, for fluid interface
     */
    public function prune($expertLanguages = null)
    {
        if ($expertLanguages) {
            throw new LogicException('ExpertLanguages object has no primary key');

        }

        return $this;
    }

    /**
     * Deletes all rows from the expert_languages table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(ExpertLanguagesTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            ExpertLanguagesTableMap::clearInstancePool();
            ExpertLanguagesTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(ExpertLanguagesTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(ExpertLanguagesTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            ExpertLanguagesTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            ExpertLanguagesTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // ExpertLanguagesQuery
