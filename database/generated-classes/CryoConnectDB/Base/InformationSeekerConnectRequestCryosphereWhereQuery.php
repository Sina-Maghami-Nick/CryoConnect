<?php

namespace CryoConnectDB\Base;

use \Exception;
use \PDO;
use CryoConnectDB\InformationSeekerConnectRequestCryosphereWhere as ChildInformationSeekerConnectRequestCryosphereWhere;
use CryoConnectDB\InformationSeekerConnectRequestCryosphereWhereQuery as ChildInformationSeekerConnectRequestCryosphereWhereQuery;
use CryoConnectDB\Map\InformationSeekerConnectRequestCryosphereWhereTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'information_seeker_connect_request_cryosphere_where' table.
 *
 *
 *
 * @method     ChildInformationSeekerConnectRequestCryosphereWhereQuery orderByInformationSeekerConnectRequestId($order = Criteria::ASC) Order by the information_seeker_connect_request_id column
 * @method     ChildInformationSeekerConnectRequestCryosphereWhereQuery orderByCryosphereWhereId($order = Criteria::ASC) Order by the cryosphere_where_id column
 * @method     ChildInformationSeekerConnectRequestCryosphereWhereQuery orderByTimestamp($order = Criteria::ASC) Order by the timestamp column
 *
 * @method     ChildInformationSeekerConnectRequestCryosphereWhereQuery groupByInformationSeekerConnectRequestId() Group by the information_seeker_connect_request_id column
 * @method     ChildInformationSeekerConnectRequestCryosphereWhereQuery groupByCryosphereWhereId() Group by the cryosphere_where_id column
 * @method     ChildInformationSeekerConnectRequestCryosphereWhereQuery groupByTimestamp() Group by the timestamp column
 *
 * @method     ChildInformationSeekerConnectRequestCryosphereWhereQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildInformationSeekerConnectRequestCryosphereWhereQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildInformationSeekerConnectRequestCryosphereWhereQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildInformationSeekerConnectRequestCryosphereWhereQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildInformationSeekerConnectRequestCryosphereWhereQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildInformationSeekerConnectRequestCryosphereWhereQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildInformationSeekerConnectRequestCryosphereWhereQuery leftJoinInformationSeekerConnectRequest($relationAlias = null) Adds a LEFT JOIN clause to the query using the InformationSeekerConnectRequest relation
 * @method     ChildInformationSeekerConnectRequestCryosphereWhereQuery rightJoinInformationSeekerConnectRequest($relationAlias = null) Adds a RIGHT JOIN clause to the query using the InformationSeekerConnectRequest relation
 * @method     ChildInformationSeekerConnectRequestCryosphereWhereQuery innerJoinInformationSeekerConnectRequest($relationAlias = null) Adds a INNER JOIN clause to the query using the InformationSeekerConnectRequest relation
 *
 * @method     ChildInformationSeekerConnectRequestCryosphereWhereQuery joinWithInformationSeekerConnectRequest($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the InformationSeekerConnectRequest relation
 *
 * @method     ChildInformationSeekerConnectRequestCryosphereWhereQuery leftJoinWithInformationSeekerConnectRequest() Adds a LEFT JOIN clause and with to the query using the InformationSeekerConnectRequest relation
 * @method     ChildInformationSeekerConnectRequestCryosphereWhereQuery rightJoinWithInformationSeekerConnectRequest() Adds a RIGHT JOIN clause and with to the query using the InformationSeekerConnectRequest relation
 * @method     ChildInformationSeekerConnectRequestCryosphereWhereQuery innerJoinWithInformationSeekerConnectRequest() Adds a INNER JOIN clause and with to the query using the InformationSeekerConnectRequest relation
 *
 * @method     ChildInformationSeekerConnectRequestCryosphereWhereQuery leftJoinCryosphereWhere($relationAlias = null) Adds a LEFT JOIN clause to the query using the CryosphereWhere relation
 * @method     ChildInformationSeekerConnectRequestCryosphereWhereQuery rightJoinCryosphereWhere($relationAlias = null) Adds a RIGHT JOIN clause to the query using the CryosphereWhere relation
 * @method     ChildInformationSeekerConnectRequestCryosphereWhereQuery innerJoinCryosphereWhere($relationAlias = null) Adds a INNER JOIN clause to the query using the CryosphereWhere relation
 *
 * @method     ChildInformationSeekerConnectRequestCryosphereWhereQuery joinWithCryosphereWhere($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the CryosphereWhere relation
 *
 * @method     ChildInformationSeekerConnectRequestCryosphereWhereQuery leftJoinWithCryosphereWhere() Adds a LEFT JOIN clause and with to the query using the CryosphereWhere relation
 * @method     ChildInformationSeekerConnectRequestCryosphereWhereQuery rightJoinWithCryosphereWhere() Adds a RIGHT JOIN clause and with to the query using the CryosphereWhere relation
 * @method     ChildInformationSeekerConnectRequestCryosphereWhereQuery innerJoinWithCryosphereWhere() Adds a INNER JOIN clause and with to the query using the CryosphereWhere relation
 *
 * @method     \CryoConnectDB\InformationSeekerConnectRequestQuery|\CryoConnectDB\CryosphereWhereQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildInformationSeekerConnectRequestCryosphereWhere findOne(ConnectionInterface $con = null) Return the first ChildInformationSeekerConnectRequestCryosphereWhere matching the query
 * @method     ChildInformationSeekerConnectRequestCryosphereWhere findOneOrCreate(ConnectionInterface $con = null) Return the first ChildInformationSeekerConnectRequestCryosphereWhere matching the query, or a new ChildInformationSeekerConnectRequestCryosphereWhere object populated from the query conditions when no match is found
 *
 * @method     ChildInformationSeekerConnectRequestCryosphereWhere findOneByInformationSeekerConnectRequestId(int $information_seeker_connect_request_id) Return the first ChildInformationSeekerConnectRequestCryosphereWhere filtered by the information_seeker_connect_request_id column
 * @method     ChildInformationSeekerConnectRequestCryosphereWhere findOneByCryosphereWhereId(int $cryosphere_where_id) Return the first ChildInformationSeekerConnectRequestCryosphereWhere filtered by the cryosphere_where_id column
 * @method     ChildInformationSeekerConnectRequestCryosphereWhere findOneByTimestamp(string $timestamp) Return the first ChildInformationSeekerConnectRequestCryosphereWhere filtered by the timestamp column *

 * @method     ChildInformationSeekerConnectRequestCryosphereWhere requirePk($key, ConnectionInterface $con = null) Return the ChildInformationSeekerConnectRequestCryosphereWhere by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildInformationSeekerConnectRequestCryosphereWhere requireOne(ConnectionInterface $con = null) Return the first ChildInformationSeekerConnectRequestCryosphereWhere matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildInformationSeekerConnectRequestCryosphereWhere requireOneByInformationSeekerConnectRequestId(int $information_seeker_connect_request_id) Return the first ChildInformationSeekerConnectRequestCryosphereWhere filtered by the information_seeker_connect_request_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildInformationSeekerConnectRequestCryosphereWhere requireOneByCryosphereWhereId(int $cryosphere_where_id) Return the first ChildInformationSeekerConnectRequestCryosphereWhere filtered by the cryosphere_where_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildInformationSeekerConnectRequestCryosphereWhere requireOneByTimestamp(string $timestamp) Return the first ChildInformationSeekerConnectRequestCryosphereWhere filtered by the timestamp column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildInformationSeekerConnectRequestCryosphereWhere[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildInformationSeekerConnectRequestCryosphereWhere objects based on current ModelCriteria
 * @method     ChildInformationSeekerConnectRequestCryosphereWhere[]|ObjectCollection findByInformationSeekerConnectRequestId(int $information_seeker_connect_request_id) Return ChildInformationSeekerConnectRequestCryosphereWhere objects filtered by the information_seeker_connect_request_id column
 * @method     ChildInformationSeekerConnectRequestCryosphereWhere[]|ObjectCollection findByCryosphereWhereId(int $cryosphere_where_id) Return ChildInformationSeekerConnectRequestCryosphereWhere objects filtered by the cryosphere_where_id column
 * @method     ChildInformationSeekerConnectRequestCryosphereWhere[]|ObjectCollection findByTimestamp(string $timestamp) Return ChildInformationSeekerConnectRequestCryosphereWhere objects filtered by the timestamp column
 * @method     ChildInformationSeekerConnectRequestCryosphereWhere[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class InformationSeekerConnectRequestCryosphereWhereQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \CryoConnectDB\Base\InformationSeekerConnectRequestCryosphereWhereQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\CryoConnectDB\\InformationSeekerConnectRequestCryosphereWhere', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildInformationSeekerConnectRequestCryosphereWhereQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildInformationSeekerConnectRequestCryosphereWhereQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildInformationSeekerConnectRequestCryosphereWhereQuery) {
            return $criteria;
        }
        $query = new ChildInformationSeekerConnectRequestCryosphereWhereQuery();
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
     * $obj = $c->findPk(array(12, 34), $con);
     * </code>
     *
     * @param array[$information_seeker_connect_request_id, $cryosphere_where_id] $key Primary key to use for the query
     * @param ConnectionInterface $con an optional connection object
     *
     * @return ChildInformationSeekerConnectRequestCryosphereWhere|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(InformationSeekerConnectRequestCryosphereWhereTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = InformationSeekerConnectRequestCryosphereWhereTableMap::getInstanceFromPool(serialize([(null === $key[0] || is_scalar($key[0]) || is_callable([$key[0], '__toString']) ? (string) $key[0] : $key[0]), (null === $key[1] || is_scalar($key[1]) || is_callable([$key[1], '__toString']) ? (string) $key[1] : $key[1])]))))) {
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
     * @return ChildInformationSeekerConnectRequestCryosphereWhere A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT information_seeker_connect_request_id, cryosphere_where_id, timestamp FROM information_seeker_connect_request_cryosphere_where WHERE information_seeker_connect_request_id = :p0 AND cryosphere_where_id = :p1';
        try {
            $stmt = $con->prepare($sql);
            $stmt->bindValue(':p0', $key[0], PDO::PARAM_INT);
            $stmt->bindValue(':p1', $key[1], PDO::PARAM_INT);
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute SELECT statement [%s]', $sql), 0, $e);
        }
        $obj = null;
        if ($row = $stmt->fetch(\PDO::FETCH_NUM)) {
            /** @var ChildInformationSeekerConnectRequestCryosphereWhere $obj */
            $obj = new ChildInformationSeekerConnectRequestCryosphereWhere();
            $obj->hydrate($row);
            InformationSeekerConnectRequestCryosphereWhereTableMap::addInstanceToPool($obj, serialize([(null === $key[0] || is_scalar($key[0]) || is_callable([$key[0], '__toString']) ? (string) $key[0] : $key[0]), (null === $key[1] || is_scalar($key[1]) || is_callable([$key[1], '__toString']) ? (string) $key[1] : $key[1])]));
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
     * @return ChildInformationSeekerConnectRequestCryosphereWhere|array|mixed the result, formatted by the current formatter
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
     * $objs = $c->findPks(array(array(12, 56), array(832, 123), array(123, 456)), $con);
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
     * @return $this|ChildInformationSeekerConnectRequestCryosphereWhereQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {
        $this->addUsingAlias(InformationSeekerConnectRequestCryosphereWhereTableMap::COL_INFORMATION_SEEKER_CONNECT_REQUEST_ID, $key[0], Criteria::EQUAL);
        $this->addUsingAlias(InformationSeekerConnectRequestCryosphereWhereTableMap::COL_CRYOSPHERE_WHERE_ID, $key[1], Criteria::EQUAL);

        return $this;
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildInformationSeekerConnectRequestCryosphereWhereQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {
        if (empty($keys)) {
            return $this->add(null, '1<>1', Criteria::CUSTOM);
        }
        foreach ($keys as $key) {
            $cton0 = $this->getNewCriterion(InformationSeekerConnectRequestCryosphereWhereTableMap::COL_INFORMATION_SEEKER_CONNECT_REQUEST_ID, $key[0], Criteria::EQUAL);
            $cton1 = $this->getNewCriterion(InformationSeekerConnectRequestCryosphereWhereTableMap::COL_CRYOSPHERE_WHERE_ID, $key[1], Criteria::EQUAL);
            $cton0->addAnd($cton1);
            $this->addOr($cton0);
        }

        return $this;
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
     * @return $this|ChildInformationSeekerConnectRequestCryosphereWhereQuery The current query, for fluid interface
     */
    public function filterByInformationSeekerConnectRequestId($informationSeekerConnectRequestId = null, $comparison = null)
    {
        if (is_array($informationSeekerConnectRequestId)) {
            $useMinMax = false;
            if (isset($informationSeekerConnectRequestId['min'])) {
                $this->addUsingAlias(InformationSeekerConnectRequestCryosphereWhereTableMap::COL_INFORMATION_SEEKER_CONNECT_REQUEST_ID, $informationSeekerConnectRequestId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($informationSeekerConnectRequestId['max'])) {
                $this->addUsingAlias(InformationSeekerConnectRequestCryosphereWhereTableMap::COL_INFORMATION_SEEKER_CONNECT_REQUEST_ID, $informationSeekerConnectRequestId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(InformationSeekerConnectRequestCryosphereWhereTableMap::COL_INFORMATION_SEEKER_CONNECT_REQUEST_ID, $informationSeekerConnectRequestId, $comparison);
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
     * @return $this|ChildInformationSeekerConnectRequestCryosphereWhereQuery The current query, for fluid interface
     */
    public function filterByCryosphereWhereId($cryosphereWhereId = null, $comparison = null)
    {
        if (is_array($cryosphereWhereId)) {
            $useMinMax = false;
            if (isset($cryosphereWhereId['min'])) {
                $this->addUsingAlias(InformationSeekerConnectRequestCryosphereWhereTableMap::COL_CRYOSPHERE_WHERE_ID, $cryosphereWhereId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($cryosphereWhereId['max'])) {
                $this->addUsingAlias(InformationSeekerConnectRequestCryosphereWhereTableMap::COL_CRYOSPHERE_WHERE_ID, $cryosphereWhereId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(InformationSeekerConnectRequestCryosphereWhereTableMap::COL_CRYOSPHERE_WHERE_ID, $cryosphereWhereId, $comparison);
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
     * @return $this|ChildInformationSeekerConnectRequestCryosphereWhereQuery The current query, for fluid interface
     */
    public function filterByTimestamp($timestamp = null, $comparison = null)
    {
        if (is_array($timestamp)) {
            $useMinMax = false;
            if (isset($timestamp['min'])) {
                $this->addUsingAlias(InformationSeekerConnectRequestCryosphereWhereTableMap::COL_TIMESTAMP, $timestamp['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($timestamp['max'])) {
                $this->addUsingAlias(InformationSeekerConnectRequestCryosphereWhereTableMap::COL_TIMESTAMP, $timestamp['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(InformationSeekerConnectRequestCryosphereWhereTableMap::COL_TIMESTAMP, $timestamp, $comparison);
    }

    /**
     * Filter the query by a related \CryoConnectDB\InformationSeekerConnectRequest object
     *
     * @param \CryoConnectDB\InformationSeekerConnectRequest|ObjectCollection $informationSeekerConnectRequest The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildInformationSeekerConnectRequestCryosphereWhereQuery The current query, for fluid interface
     */
    public function filterByInformationSeekerConnectRequest($informationSeekerConnectRequest, $comparison = null)
    {
        if ($informationSeekerConnectRequest instanceof \CryoConnectDB\InformationSeekerConnectRequest) {
            return $this
                ->addUsingAlias(InformationSeekerConnectRequestCryosphereWhereTableMap::COL_INFORMATION_SEEKER_CONNECT_REQUEST_ID, $informationSeekerConnectRequest->getId(), $comparison);
        } elseif ($informationSeekerConnectRequest instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(InformationSeekerConnectRequestCryosphereWhereTableMap::COL_INFORMATION_SEEKER_CONNECT_REQUEST_ID, $informationSeekerConnectRequest->toKeyValue('PrimaryKey', 'Id'), $comparison);
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
     * @return $this|ChildInformationSeekerConnectRequestCryosphereWhereQuery The current query, for fluid interface
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
     * Filter the query by a related \CryoConnectDB\CryosphereWhere object
     *
     * @param \CryoConnectDB\CryosphereWhere|ObjectCollection $cryosphereWhere The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildInformationSeekerConnectRequestCryosphereWhereQuery The current query, for fluid interface
     */
    public function filterByCryosphereWhere($cryosphereWhere, $comparison = null)
    {
        if ($cryosphereWhere instanceof \CryoConnectDB\CryosphereWhere) {
            return $this
                ->addUsingAlias(InformationSeekerConnectRequestCryosphereWhereTableMap::COL_CRYOSPHERE_WHERE_ID, $cryosphereWhere->getId(), $comparison);
        } elseif ($cryosphereWhere instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(InformationSeekerConnectRequestCryosphereWhereTableMap::COL_CRYOSPHERE_WHERE_ID, $cryosphereWhere->toKeyValue('PrimaryKey', 'Id'), $comparison);
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
     * @return $this|ChildInformationSeekerConnectRequestCryosphereWhereQuery The current query, for fluid interface
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
     * @param   ChildInformationSeekerConnectRequestCryosphereWhere $informationSeekerConnectRequestCryosphereWhere Object to remove from the list of results
     *
     * @return $this|ChildInformationSeekerConnectRequestCryosphereWhereQuery The current query, for fluid interface
     */
    public function prune($informationSeekerConnectRequestCryosphereWhere = null)
    {
        if ($informationSeekerConnectRequestCryosphereWhere) {
            $this->addCond('pruneCond0', $this->getAliasedColName(InformationSeekerConnectRequestCryosphereWhereTableMap::COL_INFORMATION_SEEKER_CONNECT_REQUEST_ID), $informationSeekerConnectRequestCryosphereWhere->getInformationSeekerConnectRequestId(), Criteria::NOT_EQUAL);
            $this->addCond('pruneCond1', $this->getAliasedColName(InformationSeekerConnectRequestCryosphereWhereTableMap::COL_CRYOSPHERE_WHERE_ID), $informationSeekerConnectRequestCryosphereWhere->getCryosphereWhereId(), Criteria::NOT_EQUAL);
            $this->combine(array('pruneCond0', 'pruneCond1'), Criteria::LOGICAL_OR);
        }

        return $this;
    }

    /**
     * Deletes all rows from the information_seeker_connect_request_cryosphere_where table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(InformationSeekerConnectRequestCryosphereWhereTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            InformationSeekerConnectRequestCryosphereWhereTableMap::clearInstancePool();
            InformationSeekerConnectRequestCryosphereWhereTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(InformationSeekerConnectRequestCryosphereWhereTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(InformationSeekerConnectRequestCryosphereWhereTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            InformationSeekerConnectRequestCryosphereWhereTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            InformationSeekerConnectRequestCryosphereWhereTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // InformationSeekerConnectRequestCryosphereWhereQuery
