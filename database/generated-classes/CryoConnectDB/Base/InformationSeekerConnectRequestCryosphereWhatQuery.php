<?php

namespace CryoConnectDB\Base;

use \Exception;
use CryoConnectDB\InformationSeekerConnectRequestCryosphereWhat as ChildInformationSeekerConnectRequestCryosphereWhat;
use CryoConnectDB\InformationSeekerConnectRequestCryosphereWhatQuery as ChildInformationSeekerConnectRequestCryosphereWhatQuery;
use CryoConnectDB\Map\InformationSeekerConnectRequestCryosphereWhatTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\LogicException;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'information_seeker_connect_request_cryosphere_what' table.
 *
 *
 *
 * @method     ChildInformationSeekerConnectRequestCryosphereWhatQuery orderByInformationSeekerConnectRequestId($order = Criteria::ASC) Order by the information_seeker_connect_request_id column
 * @method     ChildInformationSeekerConnectRequestCryosphereWhatQuery orderByCryosphereWhatId($order = Criteria::ASC) Order by the cryosphere_what_id column
 * @method     ChildInformationSeekerConnectRequestCryosphereWhatQuery orderByTimestamp($order = Criteria::ASC) Order by the timestamp column
 *
 * @method     ChildInformationSeekerConnectRequestCryosphereWhatQuery groupByInformationSeekerConnectRequestId() Group by the information_seeker_connect_request_id column
 * @method     ChildInformationSeekerConnectRequestCryosphereWhatQuery groupByCryosphereWhatId() Group by the cryosphere_what_id column
 * @method     ChildInformationSeekerConnectRequestCryosphereWhatQuery groupByTimestamp() Group by the timestamp column
 *
 * @method     ChildInformationSeekerConnectRequestCryosphereWhatQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildInformationSeekerConnectRequestCryosphereWhatQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildInformationSeekerConnectRequestCryosphereWhatQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildInformationSeekerConnectRequestCryosphereWhatQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildInformationSeekerConnectRequestCryosphereWhatQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildInformationSeekerConnectRequestCryosphereWhatQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildInformationSeekerConnectRequestCryosphereWhatQuery leftJoinInformationSeekerConnectRequest($relationAlias = null) Adds a LEFT JOIN clause to the query using the InformationSeekerConnectRequest relation
 * @method     ChildInformationSeekerConnectRequestCryosphereWhatQuery rightJoinInformationSeekerConnectRequest($relationAlias = null) Adds a RIGHT JOIN clause to the query using the InformationSeekerConnectRequest relation
 * @method     ChildInformationSeekerConnectRequestCryosphereWhatQuery innerJoinInformationSeekerConnectRequest($relationAlias = null) Adds a INNER JOIN clause to the query using the InformationSeekerConnectRequest relation
 *
 * @method     ChildInformationSeekerConnectRequestCryosphereWhatQuery joinWithInformationSeekerConnectRequest($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the InformationSeekerConnectRequest relation
 *
 * @method     ChildInformationSeekerConnectRequestCryosphereWhatQuery leftJoinWithInformationSeekerConnectRequest() Adds a LEFT JOIN clause and with to the query using the InformationSeekerConnectRequest relation
 * @method     ChildInformationSeekerConnectRequestCryosphereWhatQuery rightJoinWithInformationSeekerConnectRequest() Adds a RIGHT JOIN clause and with to the query using the InformationSeekerConnectRequest relation
 * @method     ChildInformationSeekerConnectRequestCryosphereWhatQuery innerJoinWithInformationSeekerConnectRequest() Adds a INNER JOIN clause and with to the query using the InformationSeekerConnectRequest relation
 *
 * @method     ChildInformationSeekerConnectRequestCryosphereWhatQuery leftJoinCryosphereWhat($relationAlias = null) Adds a LEFT JOIN clause to the query using the CryosphereWhat relation
 * @method     ChildInformationSeekerConnectRequestCryosphereWhatQuery rightJoinCryosphereWhat($relationAlias = null) Adds a RIGHT JOIN clause to the query using the CryosphereWhat relation
 * @method     ChildInformationSeekerConnectRequestCryosphereWhatQuery innerJoinCryosphereWhat($relationAlias = null) Adds a INNER JOIN clause to the query using the CryosphereWhat relation
 *
 * @method     ChildInformationSeekerConnectRequestCryosphereWhatQuery joinWithCryosphereWhat($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the CryosphereWhat relation
 *
 * @method     ChildInformationSeekerConnectRequestCryosphereWhatQuery leftJoinWithCryosphereWhat() Adds a LEFT JOIN clause and with to the query using the CryosphereWhat relation
 * @method     ChildInformationSeekerConnectRequestCryosphereWhatQuery rightJoinWithCryosphereWhat() Adds a RIGHT JOIN clause and with to the query using the CryosphereWhat relation
 * @method     ChildInformationSeekerConnectRequestCryosphereWhatQuery innerJoinWithCryosphereWhat() Adds a INNER JOIN clause and with to the query using the CryosphereWhat relation
 *
 * @method     \CryoConnectDB\InformationSeekerConnectRequestQuery|\CryoConnectDB\CryosphereWhatQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildInformationSeekerConnectRequestCryosphereWhat findOne(ConnectionInterface $con = null) Return the first ChildInformationSeekerConnectRequestCryosphereWhat matching the query
 * @method     ChildInformationSeekerConnectRequestCryosphereWhat findOneOrCreate(ConnectionInterface $con = null) Return the first ChildInformationSeekerConnectRequestCryosphereWhat matching the query, or a new ChildInformationSeekerConnectRequestCryosphereWhat object populated from the query conditions when no match is found
 *
 * @method     ChildInformationSeekerConnectRequestCryosphereWhat findOneByInformationSeekerConnectRequestId(int $information_seeker_connect_request_id) Return the first ChildInformationSeekerConnectRequestCryosphereWhat filtered by the information_seeker_connect_request_id column
 * @method     ChildInformationSeekerConnectRequestCryosphereWhat findOneByCryosphereWhatId(int $cryosphere_what_id) Return the first ChildInformationSeekerConnectRequestCryosphereWhat filtered by the cryosphere_what_id column
 * @method     ChildInformationSeekerConnectRequestCryosphereWhat findOneByTimestamp(string $timestamp) Return the first ChildInformationSeekerConnectRequestCryosphereWhat filtered by the timestamp column *

 * @method     ChildInformationSeekerConnectRequestCryosphereWhat requirePk($key, ConnectionInterface $con = null) Return the ChildInformationSeekerConnectRequestCryosphereWhat by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildInformationSeekerConnectRequestCryosphereWhat requireOne(ConnectionInterface $con = null) Return the first ChildInformationSeekerConnectRequestCryosphereWhat matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildInformationSeekerConnectRequestCryosphereWhat requireOneByInformationSeekerConnectRequestId(int $information_seeker_connect_request_id) Return the first ChildInformationSeekerConnectRequestCryosphereWhat filtered by the information_seeker_connect_request_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildInformationSeekerConnectRequestCryosphereWhat requireOneByCryosphereWhatId(int $cryosphere_what_id) Return the first ChildInformationSeekerConnectRequestCryosphereWhat filtered by the cryosphere_what_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildInformationSeekerConnectRequestCryosphereWhat requireOneByTimestamp(string $timestamp) Return the first ChildInformationSeekerConnectRequestCryosphereWhat filtered by the timestamp column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildInformationSeekerConnectRequestCryosphereWhat[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildInformationSeekerConnectRequestCryosphereWhat objects based on current ModelCriteria
 * @method     ChildInformationSeekerConnectRequestCryosphereWhat[]|ObjectCollection findByInformationSeekerConnectRequestId(int $information_seeker_connect_request_id) Return ChildInformationSeekerConnectRequestCryosphereWhat objects filtered by the information_seeker_connect_request_id column
 * @method     ChildInformationSeekerConnectRequestCryosphereWhat[]|ObjectCollection findByCryosphereWhatId(int $cryosphere_what_id) Return ChildInformationSeekerConnectRequestCryosphereWhat objects filtered by the cryosphere_what_id column
 * @method     ChildInformationSeekerConnectRequestCryosphereWhat[]|ObjectCollection findByTimestamp(string $timestamp) Return ChildInformationSeekerConnectRequestCryosphereWhat objects filtered by the timestamp column
 * @method     ChildInformationSeekerConnectRequestCryosphereWhat[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class InformationSeekerConnectRequestCryosphereWhatQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \CryoConnectDB\Base\InformationSeekerConnectRequestCryosphereWhatQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'cryo_connect', $modelName = '\\CryoConnectDB\\InformationSeekerConnectRequestCryosphereWhat', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildInformationSeekerConnectRequestCryosphereWhatQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildInformationSeekerConnectRequestCryosphereWhatQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildInformationSeekerConnectRequestCryosphereWhatQuery) {
            return $criteria;
        }
        $query = new ChildInformationSeekerConnectRequestCryosphereWhatQuery();
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
     * @return ChildInformationSeekerConnectRequestCryosphereWhat|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        throw new LogicException('The InformationSeekerConnectRequestCryosphereWhat object has no primary key');
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
        throw new LogicException('The InformationSeekerConnectRequestCryosphereWhat object has no primary key');
    }

    /**
     * Filter the query by primary key
     *
     * @param     mixed $key Primary key to use for the query
     *
     * @return $this|ChildInformationSeekerConnectRequestCryosphereWhatQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {
        throw new LogicException('The InformationSeekerConnectRequestCryosphereWhat object has no primary key');
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildInformationSeekerConnectRequestCryosphereWhatQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {
        throw new LogicException('The InformationSeekerConnectRequestCryosphereWhat object has no primary key');
    }

    /**
     * Filter the query on the information_seeker_connect_request_id column
     *
     * Example usage:
     * <code>
     * $query->filterByInformationSeekerConnectRequestId(1234); // WHERE information_seeker_connect_request_id = 1234
     * $query->filterByInformationSeekerConnectRequestId(array(12, 34)); // WHERE information_seeker_connect_request_id IN (12, 34)
     * $query->filterByInformationSeekerConnectRequestId(array('min' => 12)); // WHERE information_seeker_connect_request_id > 12
     * </code>
     *
     * @see       filterByInformationSeekerConnectRequest()
     *
     * @param     mixed $informationSeekerConnectRequestId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildInformationSeekerConnectRequestCryosphereWhatQuery The current query, for fluid interface
     */
    public function filterByInformationSeekerConnectRequestId($informationSeekerConnectRequestId = null, $comparison = null)
    {
        if (is_array($informationSeekerConnectRequestId)) {
            $useMinMax = false;
            if (isset($informationSeekerConnectRequestId['min'])) {
                $this->addUsingAlias(InformationSeekerConnectRequestCryosphereWhatTableMap::COL_INFORMATION_SEEKER_CONNECT_REQUEST_ID, $informationSeekerConnectRequestId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($informationSeekerConnectRequestId['max'])) {
                $this->addUsingAlias(InformationSeekerConnectRequestCryosphereWhatTableMap::COL_INFORMATION_SEEKER_CONNECT_REQUEST_ID, $informationSeekerConnectRequestId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(InformationSeekerConnectRequestCryosphereWhatTableMap::COL_INFORMATION_SEEKER_CONNECT_REQUEST_ID, $informationSeekerConnectRequestId, $comparison);
    }

    /**
     * Filter the query on the cryosphere_what_id column
     *
     * Example usage:
     * <code>
     * $query->filterByCryosphereWhatId(1234); // WHERE cryosphere_what_id = 1234
     * $query->filterByCryosphereWhatId(array(12, 34)); // WHERE cryosphere_what_id IN (12, 34)
     * $query->filterByCryosphereWhatId(array('min' => 12)); // WHERE cryosphere_what_id > 12
     * </code>
     *
     * @see       filterByCryosphereWhat()
     *
     * @param     mixed $cryosphereWhatId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildInformationSeekerConnectRequestCryosphereWhatQuery The current query, for fluid interface
     */
    public function filterByCryosphereWhatId($cryosphereWhatId = null, $comparison = null)
    {
        if (is_array($cryosphereWhatId)) {
            $useMinMax = false;
            if (isset($cryosphereWhatId['min'])) {
                $this->addUsingAlias(InformationSeekerConnectRequestCryosphereWhatTableMap::COL_CRYOSPHERE_WHAT_ID, $cryosphereWhatId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($cryosphereWhatId['max'])) {
                $this->addUsingAlias(InformationSeekerConnectRequestCryosphereWhatTableMap::COL_CRYOSPHERE_WHAT_ID, $cryosphereWhatId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(InformationSeekerConnectRequestCryosphereWhatTableMap::COL_CRYOSPHERE_WHAT_ID, $cryosphereWhatId, $comparison);
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
     * @return $this|ChildInformationSeekerConnectRequestCryosphereWhatQuery The current query, for fluid interface
     */
    public function filterByTimestamp($timestamp = null, $comparison = null)
    {
        if (is_array($timestamp)) {
            $useMinMax = false;
            if (isset($timestamp['min'])) {
                $this->addUsingAlias(InformationSeekerConnectRequestCryosphereWhatTableMap::COL_TIMESTAMP, $timestamp['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($timestamp['max'])) {
                $this->addUsingAlias(InformationSeekerConnectRequestCryosphereWhatTableMap::COL_TIMESTAMP, $timestamp['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(InformationSeekerConnectRequestCryosphereWhatTableMap::COL_TIMESTAMP, $timestamp, $comparison);
    }

    /**
     * Filter the query by a related \CryoConnectDB\InformationSeekerConnectRequest object
     *
     * @param \CryoConnectDB\InformationSeekerConnectRequest|ObjectCollection $informationSeekerConnectRequest The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildInformationSeekerConnectRequestCryosphereWhatQuery The current query, for fluid interface
     */
    public function filterByInformationSeekerConnectRequest($informationSeekerConnectRequest, $comparison = null)
    {
        if ($informationSeekerConnectRequest instanceof \CryoConnectDB\InformationSeekerConnectRequest) {
            return $this
                ->addUsingAlias(InformationSeekerConnectRequestCryosphereWhatTableMap::COL_INFORMATION_SEEKER_CONNECT_REQUEST_ID, $informationSeekerConnectRequest->getId(), $comparison);
        } elseif ($informationSeekerConnectRequest instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(InformationSeekerConnectRequestCryosphereWhatTableMap::COL_INFORMATION_SEEKER_CONNECT_REQUEST_ID, $informationSeekerConnectRequest->toKeyValue('PrimaryKey', 'Id'), $comparison);
        } else {
            throw new PropelException('filterByInformationSeekerConnectRequest() only accepts arguments of type \CryoConnectDB\InformationSeekerConnectRequest or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the InformationSeekerConnectRequest relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildInformationSeekerConnectRequestCryosphereWhatQuery The current query, for fluid interface
     */
    public function joinInformationSeekerConnectRequest($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('InformationSeekerConnectRequest');

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
            $this->addJoinObject($join, 'InformationSeekerConnectRequest');
        }

        return $this;
    }

    /**
     * Use the InformationSeekerConnectRequest relation InformationSeekerConnectRequest object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \CryoConnectDB\InformationSeekerConnectRequestQuery A secondary query class using the current class as primary query
     */
    public function useInformationSeekerConnectRequestQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinInformationSeekerConnectRequest($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'InformationSeekerConnectRequest', '\CryoConnectDB\InformationSeekerConnectRequestQuery');
    }

    /**
     * Filter the query by a related \CryoConnectDB\CryosphereWhat object
     *
     * @param \CryoConnectDB\CryosphereWhat|ObjectCollection $cryosphereWhat The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildInformationSeekerConnectRequestCryosphereWhatQuery The current query, for fluid interface
     */
    public function filterByCryosphereWhat($cryosphereWhat, $comparison = null)
    {
        if ($cryosphereWhat instanceof \CryoConnectDB\CryosphereWhat) {
            return $this
                ->addUsingAlias(InformationSeekerConnectRequestCryosphereWhatTableMap::COL_CRYOSPHERE_WHAT_ID, $cryosphereWhat->getId(), $comparison);
        } elseif ($cryosphereWhat instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(InformationSeekerConnectRequestCryosphereWhatTableMap::COL_CRYOSPHERE_WHAT_ID, $cryosphereWhat->toKeyValue('PrimaryKey', 'Id'), $comparison);
        } else {
            throw new PropelException('filterByCryosphereWhat() only accepts arguments of type \CryoConnectDB\CryosphereWhat or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the CryosphereWhat relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildInformationSeekerConnectRequestCryosphereWhatQuery The current query, for fluid interface
     */
    public function joinCryosphereWhat($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('CryosphereWhat');

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
            $this->addJoinObject($join, 'CryosphereWhat');
        }

        return $this;
    }

    /**
     * Use the CryosphereWhat relation CryosphereWhat object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \CryoConnectDB\CryosphereWhatQuery A secondary query class using the current class as primary query
     */
    public function useCryosphereWhatQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinCryosphereWhat($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'CryosphereWhat', '\CryoConnectDB\CryosphereWhatQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ChildInformationSeekerConnectRequestCryosphereWhat $informationSeekerConnectRequestCryosphereWhat Object to remove from the list of results
     *
     * @return $this|ChildInformationSeekerConnectRequestCryosphereWhatQuery The current query, for fluid interface
     */
    public function prune($informationSeekerConnectRequestCryosphereWhat = null)
    {
        if ($informationSeekerConnectRequestCryosphereWhat) {
            throw new LogicException('InformationSeekerConnectRequestCryosphereWhat object has no primary key');

        }

        return $this;
    }

    /**
     * Deletes all rows from the information_seeker_connect_request_cryosphere_what table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(InformationSeekerConnectRequestCryosphereWhatTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            InformationSeekerConnectRequestCryosphereWhatTableMap::clearInstancePool();
            InformationSeekerConnectRequestCryosphereWhatTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(InformationSeekerConnectRequestCryosphereWhatTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(InformationSeekerConnectRequestCryosphereWhatTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            InformationSeekerConnectRequestCryosphereWhatTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            InformationSeekerConnectRequestCryosphereWhatTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // InformationSeekerConnectRequestCryosphereWhatQuery
