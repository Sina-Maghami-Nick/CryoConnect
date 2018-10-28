<?php

namespace CryoConnectDB\Base;

use \Exception;
use CryoConnectDB\ExpertContact as ChildExpertContact;
use CryoConnectDB\ExpertContactQuery as ChildExpertContactQuery;
use CryoConnectDB\Map\ExpertContactTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\LogicException;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'expert_contact' table.
 *
 *
 *
 * @method     ChildExpertContactQuery orderByExpertId($order = Criteria::ASC) Order by the expert_id column
 * @method     ChildExpertContactQuery orderByContactTypeId($order = Criteria::ASC) Order by the contact_type_id column
 * @method     ChildExpertContactQuery orderByContactInformation($order = Criteria::ASC) Order by the contact_information column
 * @method     ChildExpertContactQuery orderByTimestamp($order = Criteria::ASC) Order by the timestamp column
 *
 * @method     ChildExpertContactQuery groupByExpertId() Group by the expert_id column
 * @method     ChildExpertContactQuery groupByContactTypeId() Group by the contact_type_id column
 * @method     ChildExpertContactQuery groupByContactInformation() Group by the contact_information column
 * @method     ChildExpertContactQuery groupByTimestamp() Group by the timestamp column
 *
 * @method     ChildExpertContactQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildExpertContactQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildExpertContactQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildExpertContactQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildExpertContactQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildExpertContactQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildExpertContactQuery leftJoinExperts($relationAlias = null) Adds a LEFT JOIN clause to the query using the Experts relation
 * @method     ChildExpertContactQuery rightJoinExperts($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Experts relation
 * @method     ChildExpertContactQuery innerJoinExperts($relationAlias = null) Adds a INNER JOIN clause to the query using the Experts relation
 *
 * @method     ChildExpertContactQuery joinWithExperts($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Experts relation
 *
 * @method     ChildExpertContactQuery leftJoinWithExperts() Adds a LEFT JOIN clause and with to the query using the Experts relation
 * @method     ChildExpertContactQuery rightJoinWithExperts() Adds a RIGHT JOIN clause and with to the query using the Experts relation
 * @method     ChildExpertContactQuery innerJoinWithExperts() Adds a INNER JOIN clause and with to the query using the Experts relation
 *
 * @method     ChildExpertContactQuery leftJoinContactTypes($relationAlias = null) Adds a LEFT JOIN clause to the query using the ContactTypes relation
 * @method     ChildExpertContactQuery rightJoinContactTypes($relationAlias = null) Adds a RIGHT JOIN clause to the query using the ContactTypes relation
 * @method     ChildExpertContactQuery innerJoinContactTypes($relationAlias = null) Adds a INNER JOIN clause to the query using the ContactTypes relation
 *
 * @method     ChildExpertContactQuery joinWithContactTypes($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the ContactTypes relation
 *
 * @method     ChildExpertContactQuery leftJoinWithContactTypes() Adds a LEFT JOIN clause and with to the query using the ContactTypes relation
 * @method     ChildExpertContactQuery rightJoinWithContactTypes() Adds a RIGHT JOIN clause and with to the query using the ContactTypes relation
 * @method     ChildExpertContactQuery innerJoinWithContactTypes() Adds a INNER JOIN clause and with to the query using the ContactTypes relation
 *
 * @method     \CryoConnectDB\ExpertsQuery|\CryoConnectDB\ContactTypesQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildExpertContact findOne(ConnectionInterface $con = null) Return the first ChildExpertContact matching the query
 * @method     ChildExpertContact findOneOrCreate(ConnectionInterface $con = null) Return the first ChildExpertContact matching the query, or a new ChildExpertContact object populated from the query conditions when no match is found
 *
 * @method     ChildExpertContact findOneByExpertId(int $expert_id) Return the first ChildExpertContact filtered by the expert_id column
 * @method     ChildExpertContact findOneByContactTypeId(int $contact_type_id) Return the first ChildExpertContact filtered by the contact_type_id column
 * @method     ChildExpertContact findOneByContactInformation(string $contact_information) Return the first ChildExpertContact filtered by the contact_information column
 * @method     ChildExpertContact findOneByTimestamp(string $timestamp) Return the first ChildExpertContact filtered by the timestamp column *

 * @method     ChildExpertContact requirePk($key, ConnectionInterface $con = null) Return the ChildExpertContact by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildExpertContact requireOne(ConnectionInterface $con = null) Return the first ChildExpertContact matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildExpertContact requireOneByExpertId(int $expert_id) Return the first ChildExpertContact filtered by the expert_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildExpertContact requireOneByContactTypeId(int $contact_type_id) Return the first ChildExpertContact filtered by the contact_type_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildExpertContact requireOneByContactInformation(string $contact_information) Return the first ChildExpertContact filtered by the contact_information column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildExpertContact requireOneByTimestamp(string $timestamp) Return the first ChildExpertContact filtered by the timestamp column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildExpertContact[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildExpertContact objects based on current ModelCriteria
 * @method     ChildExpertContact[]|ObjectCollection findByExpertId(int $expert_id) Return ChildExpertContact objects filtered by the expert_id column
 * @method     ChildExpertContact[]|ObjectCollection findByContactTypeId(int $contact_type_id) Return ChildExpertContact objects filtered by the contact_type_id column
 * @method     ChildExpertContact[]|ObjectCollection findByContactInformation(string $contact_information) Return ChildExpertContact objects filtered by the contact_information column
 * @method     ChildExpertContact[]|ObjectCollection findByTimestamp(string $timestamp) Return ChildExpertContact objects filtered by the timestamp column
 * @method     ChildExpertContact[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class ExpertContactQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \CryoConnectDB\Base\ExpertContactQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'cryo_connect', $modelName = '\\CryoConnectDB\\ExpertContact', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildExpertContactQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildExpertContactQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildExpertContactQuery) {
            return $criteria;
        }
        $query = new ChildExpertContactQuery();
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
     * @return ChildExpertContact|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        throw new LogicException('The ExpertContact object has no primary key');
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
        throw new LogicException('The ExpertContact object has no primary key');
    }

    /**
     * Filter the query by primary key
     *
     * @param     mixed $key Primary key to use for the query
     *
     * @return $this|ChildExpertContactQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {
        throw new LogicException('The ExpertContact object has no primary key');
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildExpertContactQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {
        throw new LogicException('The ExpertContact object has no primary key');
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
     * @return $this|ChildExpertContactQuery The current query, for fluid interface
     */
    public function filterByExpertId($expertId = null, $comparison = null)
    {
        if (is_array($expertId)) {
            $useMinMax = false;
            if (isset($expertId['min'])) {
                $this->addUsingAlias(ExpertContactTableMap::COL_EXPERT_ID, $expertId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($expertId['max'])) {
                $this->addUsingAlias(ExpertContactTableMap::COL_EXPERT_ID, $expertId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ExpertContactTableMap::COL_EXPERT_ID, $expertId, $comparison);
    }

    /**
     * Filter the query on the contact_type_id column
     *
     * Example usage:
     * <code>
     * $query->filterByContactTypeId(1234); // WHERE contact_type_id = 1234
     * $query->filterByContactTypeId(array(12, 34)); // WHERE contact_type_id IN (12, 34)
     * $query->filterByContactTypeId(array('min' => 12)); // WHERE contact_type_id > 12
     * </code>
     *
     * @see       filterByContactTypes()
     *
     * @param     mixed $contactTypeId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildExpertContactQuery The current query, for fluid interface
     */
    public function filterByContactTypeId($contactTypeId = null, $comparison = null)
    {
        if (is_array($contactTypeId)) {
            $useMinMax = false;
            if (isset($contactTypeId['min'])) {
                $this->addUsingAlias(ExpertContactTableMap::COL_CONTACT_TYPE_ID, $contactTypeId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($contactTypeId['max'])) {
                $this->addUsingAlias(ExpertContactTableMap::COL_CONTACT_TYPE_ID, $contactTypeId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ExpertContactTableMap::COL_CONTACT_TYPE_ID, $contactTypeId, $comparison);
    }

    /**
     * Filter the query on the contact_information column
     *
     * Example usage:
     * <code>
     * $query->filterByContactInformation('fooValue');   // WHERE contact_information = 'fooValue'
     * $query->filterByContactInformation('%fooValue%', Criteria::LIKE); // WHERE contact_information LIKE '%fooValue%'
     * </code>
     *
     * @param     string $contactInformation The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildExpertContactQuery The current query, for fluid interface
     */
    public function filterByContactInformation($contactInformation = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($contactInformation)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ExpertContactTableMap::COL_CONTACT_INFORMATION, $contactInformation, $comparison);
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
     * @return $this|ChildExpertContactQuery The current query, for fluid interface
     */
    public function filterByTimestamp($timestamp = null, $comparison = null)
    {
        if (is_array($timestamp)) {
            $useMinMax = false;
            if (isset($timestamp['min'])) {
                $this->addUsingAlias(ExpertContactTableMap::COL_TIMESTAMP, $timestamp['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($timestamp['max'])) {
                $this->addUsingAlias(ExpertContactTableMap::COL_TIMESTAMP, $timestamp['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ExpertContactTableMap::COL_TIMESTAMP, $timestamp, $comparison);
    }

    /**
     * Filter the query by a related \CryoConnectDB\Experts object
     *
     * @param \CryoConnectDB\Experts|ObjectCollection $experts The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildExpertContactQuery The current query, for fluid interface
     */
    public function filterByExperts($experts, $comparison = null)
    {
        if ($experts instanceof \CryoConnectDB\Experts) {
            return $this
                ->addUsingAlias(ExpertContactTableMap::COL_EXPERT_ID, $experts->getId(), $comparison);
        } elseif ($experts instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(ExpertContactTableMap::COL_EXPERT_ID, $experts->toKeyValue('PrimaryKey', 'Id'), $comparison);
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
     * @return $this|ChildExpertContactQuery The current query, for fluid interface
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
     * Filter the query by a related \CryoConnectDB\ContactTypes object
     *
     * @param \CryoConnectDB\ContactTypes|ObjectCollection $contactTypes The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildExpertContactQuery The current query, for fluid interface
     */
    public function filterByContactTypes($contactTypes, $comparison = null)
    {
        if ($contactTypes instanceof \CryoConnectDB\ContactTypes) {
            return $this
                ->addUsingAlias(ExpertContactTableMap::COL_CONTACT_TYPE_ID, $contactTypes->getId(), $comparison);
        } elseif ($contactTypes instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(ExpertContactTableMap::COL_CONTACT_TYPE_ID, $contactTypes->toKeyValue('PrimaryKey', 'Id'), $comparison);
        } else {
            throw new PropelException('filterByContactTypes() only accepts arguments of type \CryoConnectDB\ContactTypes or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the ContactTypes relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildExpertContactQuery The current query, for fluid interface
     */
    public function joinContactTypes($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('ContactTypes');

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
            $this->addJoinObject($join, 'ContactTypes');
        }

        return $this;
    }

    /**
     * Use the ContactTypes relation ContactTypes object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \CryoConnectDB\ContactTypesQuery A secondary query class using the current class as primary query
     */
    public function useContactTypesQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinContactTypes($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'ContactTypes', '\CryoConnectDB\ContactTypesQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ChildExpertContact $expertContact Object to remove from the list of results
     *
     * @return $this|ChildExpertContactQuery The current query, for fluid interface
     */
    public function prune($expertContact = null)
    {
        if ($expertContact) {
            throw new LogicException('ExpertContact object has no primary key');

        }

        return $this;
    }

    /**
     * Deletes all rows from the expert_contact table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(ExpertContactTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            ExpertContactTableMap::clearInstancePool();
            ExpertContactTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(ExpertContactTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(ExpertContactTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            ExpertContactTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            ExpertContactTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // ExpertContactQuery
