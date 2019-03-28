<?php

namespace CryoConnectDB\Base;

use \Exception;
use \PDO;
use CryoConnectDB\FieldworkInformationSeeker as ChildFieldworkInformationSeeker;
use CryoConnectDB\FieldworkInformationSeekerQuery as ChildFieldworkInformationSeekerQuery;
use CryoConnectDB\Map\FieldworkInformationSeekerTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'fieldwork_information_seeker' table.
 *
 *
 *
 * @method     ChildFieldworkInformationSeekerQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ChildFieldworkInformationSeekerQuery orderByInformationSeekerName($order = Criteria::ASC) Order by the information_seeker_name column
 * @method     ChildFieldworkInformationSeekerQuery orderByInformationSeekerAffiliation($order = Criteria::ASC) Order by the information_seeker_affiliation column
 * @method     ChildFieldworkInformationSeekerQuery orderByInformationSeekerWebsite($order = Criteria::ASC) Order by the information_seeker_website column
 * @method     ChildFieldworkInformationSeekerQuery orderByInformationSeekerEmail($order = Criteria::ASC) Order by the information_seeker_email column
 * @method     ChildFieldworkInformationSeekerQuery orderByInformationSeekerAffiliationWebsite($order = Criteria::ASC) Order by the information_seeker_affiliation_website column
 * @method     ChildFieldworkInformationSeekerQuery orderByInformationSeekerReasons($order = Criteria::ASC) Order by the information_seeker_reasons column
 * @method     ChildFieldworkInformationSeekerQuery orderByInformationSeekerRequestedSpots($order = Criteria::ASC) Order by the information_seeker_requested_spots column
 * @method     ChildFieldworkInformationSeekerQuery orderByApproved($order = Criteria::ASC) Order by the approved column
 * @method     ChildFieldworkInformationSeekerQuery orderByTimestamp($order = Criteria::ASC) Order by the timestamp column
 *
 * @method     ChildFieldworkInformationSeekerQuery groupById() Group by the id column
 * @method     ChildFieldworkInformationSeekerQuery groupByInformationSeekerName() Group by the information_seeker_name column
 * @method     ChildFieldworkInformationSeekerQuery groupByInformationSeekerAffiliation() Group by the information_seeker_affiliation column
 * @method     ChildFieldworkInformationSeekerQuery groupByInformationSeekerWebsite() Group by the information_seeker_website column
 * @method     ChildFieldworkInformationSeekerQuery groupByInformationSeekerEmail() Group by the information_seeker_email column
 * @method     ChildFieldworkInformationSeekerQuery groupByInformationSeekerAffiliationWebsite() Group by the information_seeker_affiliation_website column
 * @method     ChildFieldworkInformationSeekerQuery groupByInformationSeekerReasons() Group by the information_seeker_reasons column
 * @method     ChildFieldworkInformationSeekerQuery groupByInformationSeekerRequestedSpots() Group by the information_seeker_requested_spots column
 * @method     ChildFieldworkInformationSeekerQuery groupByApproved() Group by the approved column
 * @method     ChildFieldworkInformationSeekerQuery groupByTimestamp() Group by the timestamp column
 *
 * @method     ChildFieldworkInformationSeekerQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildFieldworkInformationSeekerQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildFieldworkInformationSeekerQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildFieldworkInformationSeekerQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildFieldworkInformationSeekerQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildFieldworkInformationSeekerQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildFieldworkInformationSeekerQuery leftJoinFieldworkInformationSeekerRequest($relationAlias = null) Adds a LEFT JOIN clause to the query using the FieldworkInformationSeekerRequest relation
 * @method     ChildFieldworkInformationSeekerQuery rightJoinFieldworkInformationSeekerRequest($relationAlias = null) Adds a RIGHT JOIN clause to the query using the FieldworkInformationSeekerRequest relation
 * @method     ChildFieldworkInformationSeekerQuery innerJoinFieldworkInformationSeekerRequest($relationAlias = null) Adds a INNER JOIN clause to the query using the FieldworkInformationSeekerRequest relation
 *
 * @method     ChildFieldworkInformationSeekerQuery joinWithFieldworkInformationSeekerRequest($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the FieldworkInformationSeekerRequest relation
 *
 * @method     ChildFieldworkInformationSeekerQuery leftJoinWithFieldworkInformationSeekerRequest() Adds a LEFT JOIN clause and with to the query using the FieldworkInformationSeekerRequest relation
 * @method     ChildFieldworkInformationSeekerQuery rightJoinWithFieldworkInformationSeekerRequest() Adds a RIGHT JOIN clause and with to the query using the FieldworkInformationSeekerRequest relation
 * @method     ChildFieldworkInformationSeekerQuery innerJoinWithFieldworkInformationSeekerRequest() Adds a INNER JOIN clause and with to the query using the FieldworkInformationSeekerRequest relation
 *
 * @method     \CryoConnectDB\FieldworkInformationSeekerRequestQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildFieldworkInformationSeeker findOne(ConnectionInterface $con = null) Return the first ChildFieldworkInformationSeeker matching the query
 * @method     ChildFieldworkInformationSeeker findOneOrCreate(ConnectionInterface $con = null) Return the first ChildFieldworkInformationSeeker matching the query, or a new ChildFieldworkInformationSeeker object populated from the query conditions when no match is found
 *
 * @method     ChildFieldworkInformationSeeker findOneById(int $id) Return the first ChildFieldworkInformationSeeker filtered by the id column
 * @method     ChildFieldworkInformationSeeker findOneByInformationSeekerName(string $information_seeker_name) Return the first ChildFieldworkInformationSeeker filtered by the information_seeker_name column
 * @method     ChildFieldworkInformationSeeker findOneByInformationSeekerAffiliation(string $information_seeker_affiliation) Return the first ChildFieldworkInformationSeeker filtered by the information_seeker_affiliation column
 * @method     ChildFieldworkInformationSeeker findOneByInformationSeekerWebsite(string $information_seeker_website) Return the first ChildFieldworkInformationSeeker filtered by the information_seeker_website column
 * @method     ChildFieldworkInformationSeeker findOneByInformationSeekerEmail(string $information_seeker_email) Return the first ChildFieldworkInformationSeeker filtered by the information_seeker_email column
 * @method     ChildFieldworkInformationSeeker findOneByInformationSeekerAffiliationWebsite(string $information_seeker_affiliation_website) Return the first ChildFieldworkInformationSeeker filtered by the information_seeker_affiliation_website column
 * @method     ChildFieldworkInformationSeeker findOneByInformationSeekerReasons(string $information_seeker_reasons) Return the first ChildFieldworkInformationSeeker filtered by the information_seeker_reasons column
 * @method     ChildFieldworkInformationSeeker findOneByInformationSeekerRequestedSpots(int $information_seeker_requested_spots) Return the first ChildFieldworkInformationSeeker filtered by the information_seeker_requested_spots column
 * @method     ChildFieldworkInformationSeeker findOneByApproved(boolean $approved) Return the first ChildFieldworkInformationSeeker filtered by the approved column
 * @method     ChildFieldworkInformationSeeker findOneByTimestamp(string $timestamp) Return the first ChildFieldworkInformationSeeker filtered by the timestamp column *

 * @method     ChildFieldworkInformationSeeker requirePk($key, ConnectionInterface $con = null) Return the ChildFieldworkInformationSeeker by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildFieldworkInformationSeeker requireOne(ConnectionInterface $con = null) Return the first ChildFieldworkInformationSeeker matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildFieldworkInformationSeeker requireOneById(int $id) Return the first ChildFieldworkInformationSeeker filtered by the id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildFieldworkInformationSeeker requireOneByInformationSeekerName(string $information_seeker_name) Return the first ChildFieldworkInformationSeeker filtered by the information_seeker_name column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildFieldworkInformationSeeker requireOneByInformationSeekerAffiliation(string $information_seeker_affiliation) Return the first ChildFieldworkInformationSeeker filtered by the information_seeker_affiliation column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildFieldworkInformationSeeker requireOneByInformationSeekerWebsite(string $information_seeker_website) Return the first ChildFieldworkInformationSeeker filtered by the information_seeker_website column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildFieldworkInformationSeeker requireOneByInformationSeekerEmail(string $information_seeker_email) Return the first ChildFieldworkInformationSeeker filtered by the information_seeker_email column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildFieldworkInformationSeeker requireOneByInformationSeekerAffiliationWebsite(string $information_seeker_affiliation_website) Return the first ChildFieldworkInformationSeeker filtered by the information_seeker_affiliation_website column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildFieldworkInformationSeeker requireOneByInformationSeekerReasons(string $information_seeker_reasons) Return the first ChildFieldworkInformationSeeker filtered by the information_seeker_reasons column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildFieldworkInformationSeeker requireOneByInformationSeekerRequestedSpots(int $information_seeker_requested_spots) Return the first ChildFieldworkInformationSeeker filtered by the information_seeker_requested_spots column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildFieldworkInformationSeeker requireOneByApproved(boolean $approved) Return the first ChildFieldworkInformationSeeker filtered by the approved column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildFieldworkInformationSeeker requireOneByTimestamp(string $timestamp) Return the first ChildFieldworkInformationSeeker filtered by the timestamp column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildFieldworkInformationSeeker[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildFieldworkInformationSeeker objects based on current ModelCriteria
 * @method     ChildFieldworkInformationSeeker[]|ObjectCollection findById(int $id) Return ChildFieldworkInformationSeeker objects filtered by the id column
 * @method     ChildFieldworkInformationSeeker[]|ObjectCollection findByInformationSeekerName(string $information_seeker_name) Return ChildFieldworkInformationSeeker objects filtered by the information_seeker_name column
 * @method     ChildFieldworkInformationSeeker[]|ObjectCollection findByInformationSeekerAffiliation(string $information_seeker_affiliation) Return ChildFieldworkInformationSeeker objects filtered by the information_seeker_affiliation column
 * @method     ChildFieldworkInformationSeeker[]|ObjectCollection findByInformationSeekerWebsite(string $information_seeker_website) Return ChildFieldworkInformationSeeker objects filtered by the information_seeker_website column
 * @method     ChildFieldworkInformationSeeker[]|ObjectCollection findByInformationSeekerEmail(string $information_seeker_email) Return ChildFieldworkInformationSeeker objects filtered by the information_seeker_email column
 * @method     ChildFieldworkInformationSeeker[]|ObjectCollection findByInformationSeekerAffiliationWebsite(string $information_seeker_affiliation_website) Return ChildFieldworkInformationSeeker objects filtered by the information_seeker_affiliation_website column
 * @method     ChildFieldworkInformationSeeker[]|ObjectCollection findByInformationSeekerReasons(string $information_seeker_reasons) Return ChildFieldworkInformationSeeker objects filtered by the information_seeker_reasons column
 * @method     ChildFieldworkInformationSeeker[]|ObjectCollection findByInformationSeekerRequestedSpots(int $information_seeker_requested_spots) Return ChildFieldworkInformationSeeker objects filtered by the information_seeker_requested_spots column
 * @method     ChildFieldworkInformationSeeker[]|ObjectCollection findByApproved(boolean $approved) Return ChildFieldworkInformationSeeker objects filtered by the approved column
 * @method     ChildFieldworkInformationSeeker[]|ObjectCollection findByTimestamp(string $timestamp) Return ChildFieldworkInformationSeeker objects filtered by the timestamp column
 * @method     ChildFieldworkInformationSeeker[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class FieldworkInformationSeekerQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \CryoConnectDB\Base\FieldworkInformationSeekerQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\CryoConnectDB\\FieldworkInformationSeeker', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildFieldworkInformationSeekerQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildFieldworkInformationSeekerQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildFieldworkInformationSeekerQuery) {
            return $criteria;
        }
        $query = new ChildFieldworkInformationSeekerQuery();
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
     * @return ChildFieldworkInformationSeeker|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(FieldworkInformationSeekerTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = FieldworkInformationSeekerTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildFieldworkInformationSeeker A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT id, information_seeker_name, information_seeker_affiliation, information_seeker_website, information_seeker_email, information_seeker_affiliation_website, information_seeker_reasons, information_seeker_requested_spots, approved, timestamp FROM fieldwork_information_seeker WHERE id = :p0';
        try {
            $stmt = $con->prepare($sql);
            $stmt->bindValue(':p0', $key, PDO::PARAM_INT);
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute SELECT statement [%s]', $sql), 0, $e);
        }
        $obj = null;
        if ($row = $stmt->fetch(\PDO::FETCH_NUM)) {
            /** @var ChildFieldworkInformationSeeker $obj */
            $obj = new ChildFieldworkInformationSeeker();
            $obj->hydrate($row);
            FieldworkInformationSeekerTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildFieldworkInformationSeeker|array|mixed the result, formatted by the current formatter
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
     * $objs = $c->findPks(array(12, 56, 832), $con);
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
     * @return $this|ChildFieldworkInformationSeekerQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(FieldworkInformationSeekerTableMap::COL_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildFieldworkInformationSeekerQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(FieldworkInformationSeekerTableMap::COL_ID, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the id column
     *
     * Example usage:
     * <code>
     * $query->filterById(1234); // WHERE id = 1234
     * $query->filterById(array(12, 34)); // WHERE id IN (12, 34)
     * $query->filterById(array('min' => 12)); // WHERE id > 12
     * </code>
     *
     * @param     mixed $id The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildFieldworkInformationSeekerQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(FieldworkInformationSeekerTableMap::COL_ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(FieldworkInformationSeekerTableMap::COL_ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(FieldworkInformationSeekerTableMap::COL_ID, $id, $comparison);
    }

    /**
     * Filter the query on the information_seeker_name column
     *
     * Example usage:
     * <code>
     * $query->filterByInformationSeekerName('fooValue');   // WHERE information_seeker_name = 'fooValue'
     * $query->filterByInformationSeekerName('%fooValue%', Criteria::LIKE); // WHERE information_seeker_name LIKE '%fooValue%'
     * </code>
     *
     * @param     string $informationSeekerName The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildFieldworkInformationSeekerQuery The current query, for fluid interface
     */
    public function filterByInformationSeekerName($informationSeekerName = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($informationSeekerName)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(FieldworkInformationSeekerTableMap::COL_INFORMATION_SEEKER_NAME, $informationSeekerName, $comparison);
    }

    /**
     * Filter the query on the information_seeker_affiliation column
     *
     * Example usage:
     * <code>
     * $query->filterByInformationSeekerAffiliation('fooValue');   // WHERE information_seeker_affiliation = 'fooValue'
     * $query->filterByInformationSeekerAffiliation('%fooValue%', Criteria::LIKE); // WHERE information_seeker_affiliation LIKE '%fooValue%'
     * </code>
     *
     * @param     string $informationSeekerAffiliation The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildFieldworkInformationSeekerQuery The current query, for fluid interface
     */
    public function filterByInformationSeekerAffiliation($informationSeekerAffiliation = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($informationSeekerAffiliation)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(FieldworkInformationSeekerTableMap::COL_INFORMATION_SEEKER_AFFILIATION, $informationSeekerAffiliation, $comparison);
    }

    /**
     * Filter the query on the information_seeker_website column
     *
     * Example usage:
     * <code>
     * $query->filterByInformationSeekerWebsite('fooValue');   // WHERE information_seeker_website = 'fooValue'
     * $query->filterByInformationSeekerWebsite('%fooValue%', Criteria::LIKE); // WHERE information_seeker_website LIKE '%fooValue%'
     * </code>
     *
     * @param     string $informationSeekerWebsite The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildFieldworkInformationSeekerQuery The current query, for fluid interface
     */
    public function filterByInformationSeekerWebsite($informationSeekerWebsite = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($informationSeekerWebsite)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(FieldworkInformationSeekerTableMap::COL_INFORMATION_SEEKER_WEBSITE, $informationSeekerWebsite, $comparison);
    }

    /**
     * Filter the query on the information_seeker_email column
     *
     * Example usage:
     * <code>
     * $query->filterByInformationSeekerEmail('fooValue');   // WHERE information_seeker_email = 'fooValue'
     * $query->filterByInformationSeekerEmail('%fooValue%', Criteria::LIKE); // WHERE information_seeker_email LIKE '%fooValue%'
     * </code>
     *
     * @param     string $informationSeekerEmail The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildFieldworkInformationSeekerQuery The current query, for fluid interface
     */
    public function filterByInformationSeekerEmail($informationSeekerEmail = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($informationSeekerEmail)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(FieldworkInformationSeekerTableMap::COL_INFORMATION_SEEKER_EMAIL, $informationSeekerEmail, $comparison);
    }

    /**
     * Filter the query on the information_seeker_affiliation_website column
     *
     * Example usage:
     * <code>
     * $query->filterByInformationSeekerAffiliationWebsite('fooValue');   // WHERE information_seeker_affiliation_website = 'fooValue'
     * $query->filterByInformationSeekerAffiliationWebsite('%fooValue%', Criteria::LIKE); // WHERE information_seeker_affiliation_website LIKE '%fooValue%'
     * </code>
     *
     * @param     string $informationSeekerAffiliationWebsite The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildFieldworkInformationSeekerQuery The current query, for fluid interface
     */
    public function filterByInformationSeekerAffiliationWebsite($informationSeekerAffiliationWebsite = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($informationSeekerAffiliationWebsite)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(FieldworkInformationSeekerTableMap::COL_INFORMATION_SEEKER_AFFILIATION_WEBSITE, $informationSeekerAffiliationWebsite, $comparison);
    }

    /**
     * Filter the query on the information_seeker_reasons column
     *
     * Example usage:
     * <code>
     * $query->filterByInformationSeekerReasons('fooValue');   // WHERE information_seeker_reasons = 'fooValue'
     * $query->filterByInformationSeekerReasons('%fooValue%', Criteria::LIKE); // WHERE information_seeker_reasons LIKE '%fooValue%'
     * </code>
     *
     * @param     string $informationSeekerReasons The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildFieldworkInformationSeekerQuery The current query, for fluid interface
     */
    public function filterByInformationSeekerReasons($informationSeekerReasons = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($informationSeekerReasons)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(FieldworkInformationSeekerTableMap::COL_INFORMATION_SEEKER_REASONS, $informationSeekerReasons, $comparison);
    }

    /**
     * Filter the query on the information_seeker_requested_spots column
     *
     * Example usage:
     * <code>
     * $query->filterByInformationSeekerRequestedSpots(1234); // WHERE information_seeker_requested_spots = 1234
     * $query->filterByInformationSeekerRequestedSpots(array(12, 34)); // WHERE information_seeker_requested_spots IN (12, 34)
     * $query->filterByInformationSeekerRequestedSpots(array('min' => 12)); // WHERE information_seeker_requested_spots > 12
     * </code>
     *
     * @param     mixed $informationSeekerRequestedSpots The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildFieldworkInformationSeekerQuery The current query, for fluid interface
     */
    public function filterByInformationSeekerRequestedSpots($informationSeekerRequestedSpots = null, $comparison = null)
    {
        if (is_array($informationSeekerRequestedSpots)) {
            $useMinMax = false;
            if (isset($informationSeekerRequestedSpots['min'])) {
                $this->addUsingAlias(FieldworkInformationSeekerTableMap::COL_INFORMATION_SEEKER_REQUESTED_SPOTS, $informationSeekerRequestedSpots['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($informationSeekerRequestedSpots['max'])) {
                $this->addUsingAlias(FieldworkInformationSeekerTableMap::COL_INFORMATION_SEEKER_REQUESTED_SPOTS, $informationSeekerRequestedSpots['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(FieldworkInformationSeekerTableMap::COL_INFORMATION_SEEKER_REQUESTED_SPOTS, $informationSeekerRequestedSpots, $comparison);
    }

    /**
     * Filter the query on the approved column
     *
     * Example usage:
     * <code>
     * $query->filterByApproved(true); // WHERE approved = true
     * $query->filterByApproved('yes'); // WHERE approved = true
     * </code>
     *
     * @param     boolean|string $approved The value to use as filter.
     *              Non-boolean arguments are converted using the following rules:
     *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildFieldworkInformationSeekerQuery The current query, for fluid interface
     */
    public function filterByApproved($approved = null, $comparison = null)
    {
        if (is_string($approved)) {
            $approved = in_array(strtolower($approved), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(FieldworkInformationSeekerTableMap::COL_APPROVED, $approved, $comparison);
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
     * @return $this|ChildFieldworkInformationSeekerQuery The current query, for fluid interface
     */
    public function filterByTimestamp($timestamp = null, $comparison = null)
    {
        if (is_array($timestamp)) {
            $useMinMax = false;
            if (isset($timestamp['min'])) {
                $this->addUsingAlias(FieldworkInformationSeekerTableMap::COL_TIMESTAMP, $timestamp['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($timestamp['max'])) {
                $this->addUsingAlias(FieldworkInformationSeekerTableMap::COL_TIMESTAMP, $timestamp['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(FieldworkInformationSeekerTableMap::COL_TIMESTAMP, $timestamp, $comparison);
    }

    /**
     * Filter the query by a related \CryoConnectDB\FieldworkInformationSeekerRequest object
     *
     * @param \CryoConnectDB\FieldworkInformationSeekerRequest|ObjectCollection $fieldworkInformationSeekerRequest the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildFieldworkInformationSeekerQuery The current query, for fluid interface
     */
    public function filterByFieldworkInformationSeekerRequest($fieldworkInformationSeekerRequest, $comparison = null)
    {
        if ($fieldworkInformationSeekerRequest instanceof \CryoConnectDB\FieldworkInformationSeekerRequest) {
            return $this
                ->addUsingAlias(FieldworkInformationSeekerTableMap::COL_ID, $fieldworkInformationSeekerRequest->getFieldworkInformationSeekerId(), $comparison);
        } elseif ($fieldworkInformationSeekerRequest instanceof ObjectCollection) {
            return $this
                ->useFieldworkInformationSeekerRequestQuery()
                ->filterByPrimaryKeys($fieldworkInformationSeekerRequest->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByFieldworkInformationSeekerRequest() only accepts arguments of type \CryoConnectDB\FieldworkInformationSeekerRequest or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the FieldworkInformationSeekerRequest relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildFieldworkInformationSeekerQuery The current query, for fluid interface
     */
    public function joinFieldworkInformationSeekerRequest($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('FieldworkInformationSeekerRequest');

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
            $this->addJoinObject($join, 'FieldworkInformationSeekerRequest');
        }

        return $this;
    }

    /**
     * Use the FieldworkInformationSeekerRequest relation FieldworkInformationSeekerRequest object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \CryoConnectDB\FieldworkInformationSeekerRequestQuery A secondary query class using the current class as primary query
     */
    public function useFieldworkInformationSeekerRequestQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinFieldworkInformationSeekerRequest($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'FieldworkInformationSeekerRequest', '\CryoConnectDB\FieldworkInformationSeekerRequestQuery');
    }

    /**
     * Filter the query by a related Fieldwork object
     * using the fieldwork_information_seeker_request table as cross reference
     *
     * @param Fieldwork $fieldwork the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildFieldworkInformationSeekerQuery The current query, for fluid interface
     */
    public function filterByFieldwork($fieldwork, $comparison = Criteria::EQUAL)
    {
        return $this
            ->useFieldworkInformationSeekerRequestQuery()
            ->filterByFieldwork($fieldwork, $comparison)
            ->endUse();
    }

    /**
     * Exclude object from result
     *
     * @param   ChildFieldworkInformationSeeker $fieldworkInformationSeeker Object to remove from the list of results
     *
     * @return $this|ChildFieldworkInformationSeekerQuery The current query, for fluid interface
     */
    public function prune($fieldworkInformationSeeker = null)
    {
        if ($fieldworkInformationSeeker) {
            $this->addUsingAlias(FieldworkInformationSeekerTableMap::COL_ID, $fieldworkInformationSeeker->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the fieldwork_information_seeker table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(FieldworkInformationSeekerTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            FieldworkInformationSeekerTableMap::clearInstancePool();
            FieldworkInformationSeekerTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(FieldworkInformationSeekerTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(FieldworkInformationSeekerTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            FieldworkInformationSeekerTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            FieldworkInformationSeekerTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // FieldworkInformationSeekerQuery
