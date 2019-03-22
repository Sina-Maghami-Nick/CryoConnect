<?php

namespace CryoConnectDB\Base;

use \Exception;
use \PDO;
use CryoConnectDB\FieldworkInformationSeekerRequest as ChildFieldworkInformationSeekerRequest;
use CryoConnectDB\FieldworkInformationSeekerRequestQuery as ChildFieldworkInformationSeekerRequestQuery;
use CryoConnectDB\Map\FieldworkInformationSeekerRequestTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'fieldwork_information_seeker_request' table.
 *
 *
 *
 * @method     ChildFieldworkInformationSeekerRequestQuery orderByFieldworkInformationSeekerId($order = Criteria::ASC) Order by the fieldwork_information_seeker_id column
 * @method     ChildFieldworkInformationSeekerRequestQuery orderByFieldworkId($order = Criteria::ASC) Order by the fieldwork_id column
 * @method     ChildFieldworkInformationSeekerRequestQuery orderByApplicationSent($order = Criteria::ASC) Order by the application_sent column
 * @method     ChildFieldworkInformationSeekerRequestQuery orderByApplicationAccepted($order = Criteria::ASC) Order by the application_accepted column
 * @method     ChildFieldworkInformationSeekerRequestQuery orderByBid($order = Criteria::ASC) Order by the bid column
 * @method     ChildFieldworkInformationSeekerRequestQuery orderByTimestamp($order = Criteria::ASC) Order by the timestamp column
 *
 * @method     ChildFieldworkInformationSeekerRequestQuery groupByFieldworkInformationSeekerId() Group by the fieldwork_information_seeker_id column
 * @method     ChildFieldworkInformationSeekerRequestQuery groupByFieldworkId() Group by the fieldwork_id column
 * @method     ChildFieldworkInformationSeekerRequestQuery groupByApplicationSent() Group by the application_sent column
 * @method     ChildFieldworkInformationSeekerRequestQuery groupByApplicationAccepted() Group by the application_accepted column
 * @method     ChildFieldworkInformationSeekerRequestQuery groupByBid() Group by the bid column
 * @method     ChildFieldworkInformationSeekerRequestQuery groupByTimestamp() Group by the timestamp column
 *
 * @method     ChildFieldworkInformationSeekerRequestQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildFieldworkInformationSeekerRequestQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildFieldworkInformationSeekerRequestQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildFieldworkInformationSeekerRequestQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildFieldworkInformationSeekerRequestQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildFieldworkInformationSeekerRequestQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildFieldworkInformationSeekerRequestQuery leftJoinFieldworkInformationSeeker($relationAlias = null) Adds a LEFT JOIN clause to the query using the FieldworkInformationSeeker relation
 * @method     ChildFieldworkInformationSeekerRequestQuery rightJoinFieldworkInformationSeeker($relationAlias = null) Adds a RIGHT JOIN clause to the query using the FieldworkInformationSeeker relation
 * @method     ChildFieldworkInformationSeekerRequestQuery innerJoinFieldworkInformationSeeker($relationAlias = null) Adds a INNER JOIN clause to the query using the FieldworkInformationSeeker relation
 *
 * @method     ChildFieldworkInformationSeekerRequestQuery joinWithFieldworkInformationSeeker($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the FieldworkInformationSeeker relation
 *
 * @method     ChildFieldworkInformationSeekerRequestQuery leftJoinWithFieldworkInformationSeeker() Adds a LEFT JOIN clause and with to the query using the FieldworkInformationSeeker relation
 * @method     ChildFieldworkInformationSeekerRequestQuery rightJoinWithFieldworkInformationSeeker() Adds a RIGHT JOIN clause and with to the query using the FieldworkInformationSeeker relation
 * @method     ChildFieldworkInformationSeekerRequestQuery innerJoinWithFieldworkInformationSeeker() Adds a INNER JOIN clause and with to the query using the FieldworkInformationSeeker relation
 *
 * @method     ChildFieldworkInformationSeekerRequestQuery leftJoinFieldwork($relationAlias = null) Adds a LEFT JOIN clause to the query using the Fieldwork relation
 * @method     ChildFieldworkInformationSeekerRequestQuery rightJoinFieldwork($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Fieldwork relation
 * @method     ChildFieldworkInformationSeekerRequestQuery innerJoinFieldwork($relationAlias = null) Adds a INNER JOIN clause to the query using the Fieldwork relation
 *
 * @method     ChildFieldworkInformationSeekerRequestQuery joinWithFieldwork($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Fieldwork relation
 *
 * @method     ChildFieldworkInformationSeekerRequestQuery leftJoinWithFieldwork() Adds a LEFT JOIN clause and with to the query using the Fieldwork relation
 * @method     ChildFieldworkInformationSeekerRequestQuery rightJoinWithFieldwork() Adds a RIGHT JOIN clause and with to the query using the Fieldwork relation
 * @method     ChildFieldworkInformationSeekerRequestQuery innerJoinWithFieldwork() Adds a INNER JOIN clause and with to the query using the Fieldwork relation
 *
 * @method     \CryoConnectDB\FieldworkInformationSeekerQuery|\CryoConnectDB\FieldworkQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildFieldworkInformationSeekerRequest findOne(ConnectionInterface $con = null) Return the first ChildFieldworkInformationSeekerRequest matching the query
 * @method     ChildFieldworkInformationSeekerRequest findOneOrCreate(ConnectionInterface $con = null) Return the first ChildFieldworkInformationSeekerRequest matching the query, or a new ChildFieldworkInformationSeekerRequest object populated from the query conditions when no match is found
 *
 * @method     ChildFieldworkInformationSeekerRequest findOneByFieldworkInformationSeekerId(int $fieldwork_information_seeker_id) Return the first ChildFieldworkInformationSeekerRequest filtered by the fieldwork_information_seeker_id column
 * @method     ChildFieldworkInformationSeekerRequest findOneByFieldworkId(int $fieldwork_id) Return the first ChildFieldworkInformationSeekerRequest filtered by the fieldwork_id column
 * @method     ChildFieldworkInformationSeekerRequest findOneByApplicationSent(boolean $application_sent) Return the first ChildFieldworkInformationSeekerRequest filtered by the application_sent column
 * @method     ChildFieldworkInformationSeekerRequest findOneByApplicationAccepted(boolean $application_accepted) Return the first ChildFieldworkInformationSeekerRequest filtered by the application_accepted column
 * @method     ChildFieldworkInformationSeekerRequest findOneByBid(int $bid) Return the first ChildFieldworkInformationSeekerRequest filtered by the bid column
 * @method     ChildFieldworkInformationSeekerRequest findOneByTimestamp(string $timestamp) Return the first ChildFieldworkInformationSeekerRequest filtered by the timestamp column *

 * @method     ChildFieldworkInformationSeekerRequest requirePk($key, ConnectionInterface $con = null) Return the ChildFieldworkInformationSeekerRequest by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildFieldworkInformationSeekerRequest requireOne(ConnectionInterface $con = null) Return the first ChildFieldworkInformationSeekerRequest matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildFieldworkInformationSeekerRequest requireOneByFieldworkInformationSeekerId(int $fieldwork_information_seeker_id) Return the first ChildFieldworkInformationSeekerRequest filtered by the fieldwork_information_seeker_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildFieldworkInformationSeekerRequest requireOneByFieldworkId(int $fieldwork_id) Return the first ChildFieldworkInformationSeekerRequest filtered by the fieldwork_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildFieldworkInformationSeekerRequest requireOneByApplicationSent(boolean $application_sent) Return the first ChildFieldworkInformationSeekerRequest filtered by the application_sent column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildFieldworkInformationSeekerRequest requireOneByApplicationAccepted(boolean $application_accepted) Return the first ChildFieldworkInformationSeekerRequest filtered by the application_accepted column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildFieldworkInformationSeekerRequest requireOneByBid(int $bid) Return the first ChildFieldworkInformationSeekerRequest filtered by the bid column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildFieldworkInformationSeekerRequest requireOneByTimestamp(string $timestamp) Return the first ChildFieldworkInformationSeekerRequest filtered by the timestamp column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildFieldworkInformationSeekerRequest[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildFieldworkInformationSeekerRequest objects based on current ModelCriteria
 * @method     ChildFieldworkInformationSeekerRequest[]|ObjectCollection findByFieldworkInformationSeekerId(int $fieldwork_information_seeker_id) Return ChildFieldworkInformationSeekerRequest objects filtered by the fieldwork_information_seeker_id column
 * @method     ChildFieldworkInformationSeekerRequest[]|ObjectCollection findByFieldworkId(int $fieldwork_id) Return ChildFieldworkInformationSeekerRequest objects filtered by the fieldwork_id column
 * @method     ChildFieldworkInformationSeekerRequest[]|ObjectCollection findByApplicationSent(boolean $application_sent) Return ChildFieldworkInformationSeekerRequest objects filtered by the application_sent column
 * @method     ChildFieldworkInformationSeekerRequest[]|ObjectCollection findByApplicationAccepted(boolean $application_accepted) Return ChildFieldworkInformationSeekerRequest objects filtered by the application_accepted column
 * @method     ChildFieldworkInformationSeekerRequest[]|ObjectCollection findByBid(int $bid) Return ChildFieldworkInformationSeekerRequest objects filtered by the bid column
 * @method     ChildFieldworkInformationSeekerRequest[]|ObjectCollection findByTimestamp(string $timestamp) Return ChildFieldworkInformationSeekerRequest objects filtered by the timestamp column
 * @method     ChildFieldworkInformationSeekerRequest[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class FieldworkInformationSeekerRequestQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \CryoConnectDB\Base\FieldworkInformationSeekerRequestQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\CryoConnectDB\\FieldworkInformationSeekerRequest', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildFieldworkInformationSeekerRequestQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildFieldworkInformationSeekerRequestQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildFieldworkInformationSeekerRequestQuery) {
            return $criteria;
        }
        $query = new ChildFieldworkInformationSeekerRequestQuery();
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
     * @param array[$fieldwork_information_seeker_id, $fieldwork_id] $key Primary key to use for the query
     * @param ConnectionInterface $con an optional connection object
     *
     * @return ChildFieldworkInformationSeekerRequest|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(FieldworkInformationSeekerRequestTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = FieldworkInformationSeekerRequestTableMap::getInstanceFromPool(serialize([(null === $key[0] || is_scalar($key[0]) || is_callable([$key[0], '__toString']) ? (string) $key[0] : $key[0]), (null === $key[1] || is_scalar($key[1]) || is_callable([$key[1], '__toString']) ? (string) $key[1] : $key[1])]))))) {
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
     * @return ChildFieldworkInformationSeekerRequest A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT fieldwork_information_seeker_id, fieldwork_id, application_sent, application_accepted, bid, timestamp FROM fieldwork_information_seeker_request WHERE fieldwork_information_seeker_id = :p0 AND fieldwork_id = :p1';
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
            /** @var ChildFieldworkInformationSeekerRequest $obj */
            $obj = new ChildFieldworkInformationSeekerRequest();
            $obj->hydrate($row);
            FieldworkInformationSeekerRequestTableMap::addInstanceToPool($obj, serialize([(null === $key[0] || is_scalar($key[0]) || is_callable([$key[0], '__toString']) ? (string) $key[0] : $key[0]), (null === $key[1] || is_scalar($key[1]) || is_callable([$key[1], '__toString']) ? (string) $key[1] : $key[1])]));
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
     * @return ChildFieldworkInformationSeekerRequest|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildFieldworkInformationSeekerRequestQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {
        $this->addUsingAlias(FieldworkInformationSeekerRequestTableMap::COL_FIELDWORK_INFORMATION_SEEKER_ID, $key[0], Criteria::EQUAL);
        $this->addUsingAlias(FieldworkInformationSeekerRequestTableMap::COL_FIELDWORK_ID, $key[1], Criteria::EQUAL);

        return $this;
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildFieldworkInformationSeekerRequestQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {
        if (empty($keys)) {
            return $this->add(null, '1<>1', Criteria::CUSTOM);
        }
        foreach ($keys as $key) {
            $cton0 = $this->getNewCriterion(FieldworkInformationSeekerRequestTableMap::COL_FIELDWORK_INFORMATION_SEEKER_ID, $key[0], Criteria::EQUAL);
            $cton1 = $this->getNewCriterion(FieldworkInformationSeekerRequestTableMap::COL_FIELDWORK_ID, $key[1], Criteria::EQUAL);
            $cton0->addAnd($cton1);
            $this->addOr($cton0);
        }

        return $this;
    }

    /**
     * Filter the query on the fieldwork_information_seeker_id column
     *
     * Example usage:
     * <code>
     * $query->filterByFieldworkInformationSeekerId(1234); // WHERE fieldwork_information_seeker_id = 1234
     * $query->filterByFieldworkInformationSeekerId(array(12, 34)); // WHERE fieldwork_information_seeker_id IN (12, 34)
     * $query->filterByFieldworkInformationSeekerId(array('min' => 12)); // WHERE fieldwork_information_seeker_id > 12
     * </code>
     *
     * @see       filterByFieldworkInformationSeeker()
     *
     * @param     mixed $fieldworkInformationSeekerId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildFieldworkInformationSeekerRequestQuery The current query, for fluid interface
     */
    public function filterByFieldworkInformationSeekerId($fieldworkInformationSeekerId = null, $comparison = null)
    {
        if (is_array($fieldworkInformationSeekerId)) {
            $useMinMax = false;
            if (isset($fieldworkInformationSeekerId['min'])) {
                $this->addUsingAlias(FieldworkInformationSeekerRequestTableMap::COL_FIELDWORK_INFORMATION_SEEKER_ID, $fieldworkInformationSeekerId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($fieldworkInformationSeekerId['max'])) {
                $this->addUsingAlias(FieldworkInformationSeekerRequestTableMap::COL_FIELDWORK_INFORMATION_SEEKER_ID, $fieldworkInformationSeekerId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(FieldworkInformationSeekerRequestTableMap::COL_FIELDWORK_INFORMATION_SEEKER_ID, $fieldworkInformationSeekerId, $comparison);
    }

    /**
     * Filter the query on the fieldwork_id column
     *
     * Example usage:
     * <code>
     * $query->filterByFieldworkId(1234); // WHERE fieldwork_id = 1234
     * $query->filterByFieldworkId(array(12, 34)); // WHERE fieldwork_id IN (12, 34)
     * $query->filterByFieldworkId(array('min' => 12)); // WHERE fieldwork_id > 12
     * </code>
     *
     * @see       filterByFieldwork()
     *
     * @param     mixed $fieldworkId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildFieldworkInformationSeekerRequestQuery The current query, for fluid interface
     */
    public function filterByFieldworkId($fieldworkId = null, $comparison = null)
    {
        if (is_array($fieldworkId)) {
            $useMinMax = false;
            if (isset($fieldworkId['min'])) {
                $this->addUsingAlias(FieldworkInformationSeekerRequestTableMap::COL_FIELDWORK_ID, $fieldworkId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($fieldworkId['max'])) {
                $this->addUsingAlias(FieldworkInformationSeekerRequestTableMap::COL_FIELDWORK_ID, $fieldworkId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(FieldworkInformationSeekerRequestTableMap::COL_FIELDWORK_ID, $fieldworkId, $comparison);
    }

    /**
     * Filter the query on the application_sent column
     *
     * Example usage:
     * <code>
     * $query->filterByApplicationSent(true); // WHERE application_sent = true
     * $query->filterByApplicationSent('yes'); // WHERE application_sent = true
     * </code>
     *
     * @param     boolean|string $applicationSent The value to use as filter.
     *              Non-boolean arguments are converted using the following rules:
     *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildFieldworkInformationSeekerRequestQuery The current query, for fluid interface
     */
    public function filterByApplicationSent($applicationSent = null, $comparison = null)
    {
        if (is_string($applicationSent)) {
            $applicationSent = in_array(strtolower($applicationSent), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(FieldworkInformationSeekerRequestTableMap::COL_APPLICATION_SENT, $applicationSent, $comparison);
    }

    /**
     * Filter the query on the application_accepted column
     *
     * Example usage:
     * <code>
     * $query->filterByApplicationAccepted(true); // WHERE application_accepted = true
     * $query->filterByApplicationAccepted('yes'); // WHERE application_accepted = true
     * </code>
     *
     * @param     boolean|string $applicationAccepted The value to use as filter.
     *              Non-boolean arguments are converted using the following rules:
     *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildFieldworkInformationSeekerRequestQuery The current query, for fluid interface
     */
    public function filterByApplicationAccepted($applicationAccepted = null, $comparison = null)
    {
        if (is_string($applicationAccepted)) {
            $applicationAccepted = in_array(strtolower($applicationAccepted), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(FieldworkInformationSeekerRequestTableMap::COL_APPLICATION_ACCEPTED, $applicationAccepted, $comparison);
    }

    /**
     * Filter the query on the bid column
     *
     * Example usage:
     * <code>
     * $query->filterByBid(1234); // WHERE bid = 1234
     * $query->filterByBid(array(12, 34)); // WHERE bid IN (12, 34)
     * $query->filterByBid(array('min' => 12)); // WHERE bid > 12
     * </code>
     *
     * @param     mixed $bid The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildFieldworkInformationSeekerRequestQuery The current query, for fluid interface
     */
    public function filterByBid($bid = null, $comparison = null)
    {
        if (is_array($bid)) {
            $useMinMax = false;
            if (isset($bid['min'])) {
                $this->addUsingAlias(FieldworkInformationSeekerRequestTableMap::COL_BID, $bid['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($bid['max'])) {
                $this->addUsingAlias(FieldworkInformationSeekerRequestTableMap::COL_BID, $bid['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(FieldworkInformationSeekerRequestTableMap::COL_BID, $bid, $comparison);
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
     * @return $this|ChildFieldworkInformationSeekerRequestQuery The current query, for fluid interface
     */
    public function filterByTimestamp($timestamp = null, $comparison = null)
    {
        if (is_array($timestamp)) {
            $useMinMax = false;
            if (isset($timestamp['min'])) {
                $this->addUsingAlias(FieldworkInformationSeekerRequestTableMap::COL_TIMESTAMP, $timestamp['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($timestamp['max'])) {
                $this->addUsingAlias(FieldworkInformationSeekerRequestTableMap::COL_TIMESTAMP, $timestamp['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(FieldworkInformationSeekerRequestTableMap::COL_TIMESTAMP, $timestamp, $comparison);
    }

    /**
     * Filter the query by a related \CryoConnectDB\FieldworkInformationSeeker object
     *
     * @param \CryoConnectDB\FieldworkInformationSeeker|ObjectCollection $fieldworkInformationSeeker The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildFieldworkInformationSeekerRequestQuery The current query, for fluid interface
     */
    public function filterByFieldworkInformationSeeker($fieldworkInformationSeeker, $comparison = null)
    {
        if ($fieldworkInformationSeeker instanceof \CryoConnectDB\FieldworkInformationSeeker) {
            return $this
                ->addUsingAlias(FieldworkInformationSeekerRequestTableMap::COL_FIELDWORK_INFORMATION_SEEKER_ID, $fieldworkInformationSeeker->getId(), $comparison);
        } elseif ($fieldworkInformationSeeker instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(FieldworkInformationSeekerRequestTableMap::COL_FIELDWORK_INFORMATION_SEEKER_ID, $fieldworkInformationSeeker->toKeyValue('PrimaryKey', 'Id'), $comparison);
        } else {
            throw new PropelException('filterByFieldworkInformationSeeker() only accepts arguments of type \CryoConnectDB\FieldworkInformationSeeker or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the FieldworkInformationSeeker relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildFieldworkInformationSeekerRequestQuery The current query, for fluid interface
     */
    public function joinFieldworkInformationSeeker($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('FieldworkInformationSeeker');

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
            $this->addJoinObject($join, 'FieldworkInformationSeeker');
        }

        return $this;
    }

    /**
     * Use the FieldworkInformationSeeker relation FieldworkInformationSeeker object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \CryoConnectDB\FieldworkInformationSeekerQuery A secondary query class using the current class as primary query
     */
    public function useFieldworkInformationSeekerQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinFieldworkInformationSeeker($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'FieldworkInformationSeeker', '\CryoConnectDB\FieldworkInformationSeekerQuery');
    }

    /**
     * Filter the query by a related \CryoConnectDB\Fieldwork object
     *
     * @param \CryoConnectDB\Fieldwork|ObjectCollection $fieldwork The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildFieldworkInformationSeekerRequestQuery The current query, for fluid interface
     */
    public function filterByFieldwork($fieldwork, $comparison = null)
    {
        if ($fieldwork instanceof \CryoConnectDB\Fieldwork) {
            return $this
                ->addUsingAlias(FieldworkInformationSeekerRequestTableMap::COL_FIELDWORK_ID, $fieldwork->getId(), $comparison);
        } elseif ($fieldwork instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(FieldworkInformationSeekerRequestTableMap::COL_FIELDWORK_ID, $fieldwork->toKeyValue('PrimaryKey', 'Id'), $comparison);
        } else {
            throw new PropelException('filterByFieldwork() only accepts arguments of type \CryoConnectDB\Fieldwork or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Fieldwork relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildFieldworkInformationSeekerRequestQuery The current query, for fluid interface
     */
    public function joinFieldwork($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Fieldwork');

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
            $this->addJoinObject($join, 'Fieldwork');
        }

        return $this;
    }

    /**
     * Use the Fieldwork relation Fieldwork object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \CryoConnectDB\FieldworkQuery A secondary query class using the current class as primary query
     */
    public function useFieldworkQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinFieldwork($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Fieldwork', '\CryoConnectDB\FieldworkQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ChildFieldworkInformationSeekerRequest $fieldworkInformationSeekerRequest Object to remove from the list of results
     *
     * @return $this|ChildFieldworkInformationSeekerRequestQuery The current query, for fluid interface
     */
    public function prune($fieldworkInformationSeekerRequest = null)
    {
        if ($fieldworkInformationSeekerRequest) {
            $this->addCond('pruneCond0', $this->getAliasedColName(FieldworkInformationSeekerRequestTableMap::COL_FIELDWORK_INFORMATION_SEEKER_ID), $fieldworkInformationSeekerRequest->getFieldworkInformationSeekerId(), Criteria::NOT_EQUAL);
            $this->addCond('pruneCond1', $this->getAliasedColName(FieldworkInformationSeekerRequestTableMap::COL_FIELDWORK_ID), $fieldworkInformationSeekerRequest->getFieldworkId(), Criteria::NOT_EQUAL);
            $this->combine(array('pruneCond0', 'pruneCond1'), Criteria::LOGICAL_OR);
        }

        return $this;
    }

    /**
     * Deletes all rows from the fieldwork_information_seeker_request table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(FieldworkInformationSeekerRequestTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            FieldworkInformationSeekerRequestTableMap::clearInstancePool();
            FieldworkInformationSeekerRequestTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(FieldworkInformationSeekerRequestTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(FieldworkInformationSeekerRequestTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            FieldworkInformationSeekerRequestTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            FieldworkInformationSeekerRequestTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // FieldworkInformationSeekerRequestQuery
