<?php

namespace CryoConnectDB\Base;

use \Exception;
use \PDO;
use CryoConnectDB\InformationSeekerConnectRequest as ChildInformationSeekerConnectRequest;
use CryoConnectDB\InformationSeekerConnectRequestQuery as ChildInformationSeekerConnectRequestQuery;
use CryoConnectDB\Map\InformationSeekerConnectRequestTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'information_seeker_connect_request' table.
 *
 *
 *
 * @method     ChildInformationSeekerConnectRequestQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ChildInformationSeekerConnectRequestQuery orderByInformationSeekerId($order = Criteria::ASC) Order by the information_seeker_id column
 * @method     ChildInformationSeekerConnectRequestQuery orderByContactPurpose($order = Criteria::ASC) Order by the contact_purpose column
 * @method     ChildInformationSeekerConnectRequestQuery orderByCreatedAt($order = Criteria::ASC) Order by the created_at column
 *
 * @method     ChildInformationSeekerConnectRequestQuery groupById() Group by the id column
 * @method     ChildInformationSeekerConnectRequestQuery groupByInformationSeekerId() Group by the information_seeker_id column
 * @method     ChildInformationSeekerConnectRequestQuery groupByContactPurpose() Group by the contact_purpose column
 * @method     ChildInformationSeekerConnectRequestQuery groupByCreatedAt() Group by the created_at column
 *
 * @method     ChildInformationSeekerConnectRequestQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildInformationSeekerConnectRequestQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildInformationSeekerConnectRequestQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildInformationSeekerConnectRequestQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildInformationSeekerConnectRequestQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildInformationSeekerConnectRequestQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildInformationSeekerConnectRequestQuery leftJoinInformationSeekers($relationAlias = null) Adds a LEFT JOIN clause to the query using the InformationSeekers relation
 * @method     ChildInformationSeekerConnectRequestQuery rightJoinInformationSeekers($relationAlias = null) Adds a RIGHT JOIN clause to the query using the InformationSeekers relation
 * @method     ChildInformationSeekerConnectRequestQuery innerJoinInformationSeekers($relationAlias = null) Adds a INNER JOIN clause to the query using the InformationSeekers relation
 *
 * @method     ChildInformationSeekerConnectRequestQuery joinWithInformationSeekers($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the InformationSeekers relation
 *
 * @method     ChildInformationSeekerConnectRequestQuery leftJoinWithInformationSeekers() Adds a LEFT JOIN clause and with to the query using the InformationSeekers relation
 * @method     ChildInformationSeekerConnectRequestQuery rightJoinWithInformationSeekers() Adds a RIGHT JOIN clause and with to the query using the InformationSeekers relation
 * @method     ChildInformationSeekerConnectRequestQuery innerJoinWithInformationSeekers() Adds a INNER JOIN clause and with to the query using the InformationSeekers relation
 *
 * @method     ChildInformationSeekerConnectRequestQuery leftJoinInformationSeekerConnectRequestCryosphereWhat($relationAlias = null) Adds a LEFT JOIN clause to the query using the InformationSeekerConnectRequestCryosphereWhat relation
 * @method     ChildInformationSeekerConnectRequestQuery rightJoinInformationSeekerConnectRequestCryosphereWhat($relationAlias = null) Adds a RIGHT JOIN clause to the query using the InformationSeekerConnectRequestCryosphereWhat relation
 * @method     ChildInformationSeekerConnectRequestQuery innerJoinInformationSeekerConnectRequestCryosphereWhat($relationAlias = null) Adds a INNER JOIN clause to the query using the InformationSeekerConnectRequestCryosphereWhat relation
 *
 * @method     ChildInformationSeekerConnectRequestQuery joinWithInformationSeekerConnectRequestCryosphereWhat($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the InformationSeekerConnectRequestCryosphereWhat relation
 *
 * @method     ChildInformationSeekerConnectRequestQuery leftJoinWithInformationSeekerConnectRequestCryosphereWhat() Adds a LEFT JOIN clause and with to the query using the InformationSeekerConnectRequestCryosphereWhat relation
 * @method     ChildInformationSeekerConnectRequestQuery rightJoinWithInformationSeekerConnectRequestCryosphereWhat() Adds a RIGHT JOIN clause and with to the query using the InformationSeekerConnectRequestCryosphereWhat relation
 * @method     ChildInformationSeekerConnectRequestQuery innerJoinWithInformationSeekerConnectRequestCryosphereWhat() Adds a INNER JOIN clause and with to the query using the InformationSeekerConnectRequestCryosphereWhat relation
 *
 * @method     ChildInformationSeekerConnectRequestQuery leftJoinInformationSeekerConnectRequestCryosphereWhere($relationAlias = null) Adds a LEFT JOIN clause to the query using the InformationSeekerConnectRequestCryosphereWhere relation
 * @method     ChildInformationSeekerConnectRequestQuery rightJoinInformationSeekerConnectRequestCryosphereWhere($relationAlias = null) Adds a RIGHT JOIN clause to the query using the InformationSeekerConnectRequestCryosphereWhere relation
 * @method     ChildInformationSeekerConnectRequestQuery innerJoinInformationSeekerConnectRequestCryosphereWhere($relationAlias = null) Adds a INNER JOIN clause to the query using the InformationSeekerConnectRequestCryosphereWhere relation
 *
 * @method     ChildInformationSeekerConnectRequestQuery joinWithInformationSeekerConnectRequestCryosphereWhere($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the InformationSeekerConnectRequestCryosphereWhere relation
 *
 * @method     ChildInformationSeekerConnectRequestQuery leftJoinWithInformationSeekerConnectRequestCryosphereWhere() Adds a LEFT JOIN clause and with to the query using the InformationSeekerConnectRequestCryosphereWhere relation
 * @method     ChildInformationSeekerConnectRequestQuery rightJoinWithInformationSeekerConnectRequestCryosphereWhere() Adds a RIGHT JOIN clause and with to the query using the InformationSeekerConnectRequestCryosphereWhere relation
 * @method     ChildInformationSeekerConnectRequestQuery innerJoinWithInformationSeekerConnectRequestCryosphereWhere() Adds a INNER JOIN clause and with to the query using the InformationSeekerConnectRequestCryosphereWhere relation
 *
 * @method     ChildInformationSeekerConnectRequestQuery leftJoinInformationSeekerConnectRequestLanguages($relationAlias = null) Adds a LEFT JOIN clause to the query using the InformationSeekerConnectRequestLanguages relation
 * @method     ChildInformationSeekerConnectRequestQuery rightJoinInformationSeekerConnectRequestLanguages($relationAlias = null) Adds a RIGHT JOIN clause to the query using the InformationSeekerConnectRequestLanguages relation
 * @method     ChildInformationSeekerConnectRequestQuery innerJoinInformationSeekerConnectRequestLanguages($relationAlias = null) Adds a INNER JOIN clause to the query using the InformationSeekerConnectRequestLanguages relation
 *
 * @method     ChildInformationSeekerConnectRequestQuery joinWithInformationSeekerConnectRequestLanguages($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the InformationSeekerConnectRequestLanguages relation
 *
 * @method     ChildInformationSeekerConnectRequestQuery leftJoinWithInformationSeekerConnectRequestLanguages() Adds a LEFT JOIN clause and with to the query using the InformationSeekerConnectRequestLanguages relation
 * @method     ChildInformationSeekerConnectRequestQuery rightJoinWithInformationSeekerConnectRequestLanguages() Adds a RIGHT JOIN clause and with to the query using the InformationSeekerConnectRequestLanguages relation
 * @method     ChildInformationSeekerConnectRequestQuery innerJoinWithInformationSeekerConnectRequestLanguages() Adds a INNER JOIN clause and with to the query using the InformationSeekerConnectRequestLanguages relation
 *
 * @method     \CryoConnectDB\InformationSeekersQuery|\CryoConnectDB\InformationSeekerConnectRequestCryosphereWhatQuery|\CryoConnectDB\InformationSeekerConnectRequestCryosphereWhereQuery|\CryoConnectDB\InformationSeekerConnectRequestLanguagesQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildInformationSeekerConnectRequest findOne(ConnectionInterface $con = null) Return the first ChildInformationSeekerConnectRequest matching the query
 * @method     ChildInformationSeekerConnectRequest findOneOrCreate(ConnectionInterface $con = null) Return the first ChildInformationSeekerConnectRequest matching the query, or a new ChildInformationSeekerConnectRequest object populated from the query conditions when no match is found
 *
 * @method     ChildInformationSeekerConnectRequest findOneById(int $id) Return the first ChildInformationSeekerConnectRequest filtered by the id column
 * @method     ChildInformationSeekerConnectRequest findOneByInformationSeekerId(int $information_seeker_id) Return the first ChildInformationSeekerConnectRequest filtered by the information_seeker_id column
 * @method     ChildInformationSeekerConnectRequest findOneByContactPurpose(string $contact_purpose) Return the first ChildInformationSeekerConnectRequest filtered by the contact_purpose column
 * @method     ChildInformationSeekerConnectRequest findOneByCreatedAt(string $created_at) Return the first ChildInformationSeekerConnectRequest filtered by the created_at column *

 * @method     ChildInformationSeekerConnectRequest requirePk($key, ConnectionInterface $con = null) Return the ChildInformationSeekerConnectRequest by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildInformationSeekerConnectRequest requireOne(ConnectionInterface $con = null) Return the first ChildInformationSeekerConnectRequest matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildInformationSeekerConnectRequest requireOneById(int $id) Return the first ChildInformationSeekerConnectRequest filtered by the id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildInformationSeekerConnectRequest requireOneByInformationSeekerId(int $information_seeker_id) Return the first ChildInformationSeekerConnectRequest filtered by the information_seeker_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildInformationSeekerConnectRequest requireOneByContactPurpose(string $contact_purpose) Return the first ChildInformationSeekerConnectRequest filtered by the contact_purpose column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildInformationSeekerConnectRequest requireOneByCreatedAt(string $created_at) Return the first ChildInformationSeekerConnectRequest filtered by the created_at column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildInformationSeekerConnectRequest[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildInformationSeekerConnectRequest objects based on current ModelCriteria
 * @method     ChildInformationSeekerConnectRequest[]|ObjectCollection findById(int $id) Return ChildInformationSeekerConnectRequest objects filtered by the id column
 * @method     ChildInformationSeekerConnectRequest[]|ObjectCollection findByInformationSeekerId(int $information_seeker_id) Return ChildInformationSeekerConnectRequest objects filtered by the information_seeker_id column
 * @method     ChildInformationSeekerConnectRequest[]|ObjectCollection findByContactPurpose(string $contact_purpose) Return ChildInformationSeekerConnectRequest objects filtered by the contact_purpose column
 * @method     ChildInformationSeekerConnectRequest[]|ObjectCollection findByCreatedAt(string $created_at) Return ChildInformationSeekerConnectRequest objects filtered by the created_at column
 * @method     ChildInformationSeekerConnectRequest[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class InformationSeekerConnectRequestQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \CryoConnectDB\Base\InformationSeekerConnectRequestQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'cryo_connect', $modelName = '\\CryoConnectDB\\InformationSeekerConnectRequest', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildInformationSeekerConnectRequestQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildInformationSeekerConnectRequestQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildInformationSeekerConnectRequestQuery) {
            return $criteria;
        }
        $query = new ChildInformationSeekerConnectRequestQuery();
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
     * @return ChildInformationSeekerConnectRequest|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(InformationSeekerConnectRequestTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = InformationSeekerConnectRequestTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildInformationSeekerConnectRequest A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT id, information_seeker_id, contact_purpose, created_at FROM information_seeker_connect_request WHERE id = :p0';
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
            /** @var ChildInformationSeekerConnectRequest $obj */
            $obj = new ChildInformationSeekerConnectRequest();
            $obj->hydrate($row);
            InformationSeekerConnectRequestTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildInformationSeekerConnectRequest|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildInformationSeekerConnectRequestQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(InformationSeekerConnectRequestTableMap::COL_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildInformationSeekerConnectRequestQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(InformationSeekerConnectRequestTableMap::COL_ID, $keys, Criteria::IN);
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
     * @return $this|ChildInformationSeekerConnectRequestQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(InformationSeekerConnectRequestTableMap::COL_ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(InformationSeekerConnectRequestTableMap::COL_ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(InformationSeekerConnectRequestTableMap::COL_ID, $id, $comparison);
    }

    /**
     * Filter the query on the information_seeker_id column
     *
     * Example usage:
     * <code>
     * $query->filterByInformationSeekerId(1234); // WHERE information_seeker_id = 1234
     * $query->filterByInformationSeekerId(array(12, 34)); // WHERE information_seeker_id IN (12, 34)
     * $query->filterByInformationSeekerId(array('min' => 12)); // WHERE information_seeker_id > 12
     * </code>
     *
     * @see       filterByInformationSeekers()
     *
     * @param     mixed $informationSeekerId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildInformationSeekerConnectRequestQuery The current query, for fluid interface
     */
    public function filterByInformationSeekerId($informationSeekerId = null, $comparison = null)
    {
        if (is_array($informationSeekerId)) {
            $useMinMax = false;
            if (isset($informationSeekerId['min'])) {
                $this->addUsingAlias(InformationSeekerConnectRequestTableMap::COL_INFORMATION_SEEKER_ID, $informationSeekerId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($informationSeekerId['max'])) {
                $this->addUsingAlias(InformationSeekerConnectRequestTableMap::COL_INFORMATION_SEEKER_ID, $informationSeekerId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(InformationSeekerConnectRequestTableMap::COL_INFORMATION_SEEKER_ID, $informationSeekerId, $comparison);
    }

    /**
     * Filter the query on the contact_purpose column
     *
     * Example usage:
     * <code>
     * $query->filterByContactPurpose('fooValue');   // WHERE contact_purpose = 'fooValue'
     * $query->filterByContactPurpose('%fooValue%', Criteria::LIKE); // WHERE contact_purpose LIKE '%fooValue%'
     * </code>
     *
     * @param     string $contactPurpose The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildInformationSeekerConnectRequestQuery The current query, for fluid interface
     */
    public function filterByContactPurpose($contactPurpose = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($contactPurpose)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(InformationSeekerConnectRequestTableMap::COL_CONTACT_PURPOSE, $contactPurpose, $comparison);
    }

    /**
     * Filter the query on the created_at column
     *
     * Example usage:
     * <code>
     * $query->filterByCreatedAt('2011-03-14'); // WHERE created_at = '2011-03-14'
     * $query->filterByCreatedAt('now'); // WHERE created_at = '2011-03-14'
     * $query->filterByCreatedAt(array('max' => 'yesterday')); // WHERE created_at > '2011-03-13'
     * </code>
     *
     * @param     mixed $createdAt The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildInformationSeekerConnectRequestQuery The current query, for fluid interface
     */
    public function filterByCreatedAt($createdAt = null, $comparison = null)
    {
        if (is_array($createdAt)) {
            $useMinMax = false;
            if (isset($createdAt['min'])) {
                $this->addUsingAlias(InformationSeekerConnectRequestTableMap::COL_CREATED_AT, $createdAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createdAt['max'])) {
                $this->addUsingAlias(InformationSeekerConnectRequestTableMap::COL_CREATED_AT, $createdAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(InformationSeekerConnectRequestTableMap::COL_CREATED_AT, $createdAt, $comparison);
    }

    /**
     * Filter the query by a related \CryoConnectDB\InformationSeekers object
     *
     * @param \CryoConnectDB\InformationSeekers|ObjectCollection $informationSeekers The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildInformationSeekerConnectRequestQuery The current query, for fluid interface
     */
    public function filterByInformationSeekers($informationSeekers, $comparison = null)
    {
        if ($informationSeekers instanceof \CryoConnectDB\InformationSeekers) {
            return $this
                ->addUsingAlias(InformationSeekerConnectRequestTableMap::COL_INFORMATION_SEEKER_ID, $informationSeekers->getId(), $comparison);
        } elseif ($informationSeekers instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(InformationSeekerConnectRequestTableMap::COL_INFORMATION_SEEKER_ID, $informationSeekers->toKeyValue('PrimaryKey', 'Id'), $comparison);
        } else {
            throw new PropelException('filterByInformationSeekers() only accepts arguments of type \CryoConnectDB\InformationSeekers or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the InformationSeekers relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildInformationSeekerConnectRequestQuery The current query, for fluid interface
     */
    public function joinInformationSeekers($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('InformationSeekers');

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
            $this->addJoinObject($join, 'InformationSeekers');
        }

        return $this;
    }

    /**
     * Use the InformationSeekers relation InformationSeekers object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \CryoConnectDB\InformationSeekersQuery A secondary query class using the current class as primary query
     */
    public function useInformationSeekersQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinInformationSeekers($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'InformationSeekers', '\CryoConnectDB\InformationSeekersQuery');
    }

    /**
     * Filter the query by a related \CryoConnectDB\InformationSeekerConnectRequestCryosphereWhat object
     *
     * @param \CryoConnectDB\InformationSeekerConnectRequestCryosphereWhat|ObjectCollection $informationSeekerConnectRequestCryosphereWhat the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildInformationSeekerConnectRequestQuery The current query, for fluid interface
     */
    public function filterByInformationSeekerConnectRequestCryosphereWhat($informationSeekerConnectRequestCryosphereWhat, $comparison = null)
    {
        if ($informationSeekerConnectRequestCryosphereWhat instanceof \CryoConnectDB\InformationSeekerConnectRequestCryosphereWhat) {
            return $this
                ->addUsingAlias(InformationSeekerConnectRequestTableMap::COL_ID, $informationSeekerConnectRequestCryosphereWhat->getInformationSeekerConnectRequestId(), $comparison);
        } elseif ($informationSeekerConnectRequestCryosphereWhat instanceof ObjectCollection) {
            return $this
                ->useInformationSeekerConnectRequestCryosphereWhatQuery()
                ->filterByPrimaryKeys($informationSeekerConnectRequestCryosphereWhat->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByInformationSeekerConnectRequestCryosphereWhat() only accepts arguments of type \CryoConnectDB\InformationSeekerConnectRequestCryosphereWhat or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the InformationSeekerConnectRequestCryosphereWhat relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildInformationSeekerConnectRequestQuery The current query, for fluid interface
     */
    public function joinInformationSeekerConnectRequestCryosphereWhat($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('InformationSeekerConnectRequestCryosphereWhat');

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
            $this->addJoinObject($join, 'InformationSeekerConnectRequestCryosphereWhat');
        }

        return $this;
    }

    /**
     * Use the InformationSeekerConnectRequestCryosphereWhat relation InformationSeekerConnectRequestCryosphereWhat object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \CryoConnectDB\InformationSeekerConnectRequestCryosphereWhatQuery A secondary query class using the current class as primary query
     */
    public function useInformationSeekerConnectRequestCryosphereWhatQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinInformationSeekerConnectRequestCryosphereWhat($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'InformationSeekerConnectRequestCryosphereWhat', '\CryoConnectDB\InformationSeekerConnectRequestCryosphereWhatQuery');
    }

    /**
     * Filter the query by a related \CryoConnectDB\InformationSeekerConnectRequestCryosphereWhere object
     *
     * @param \CryoConnectDB\InformationSeekerConnectRequestCryosphereWhere|ObjectCollection $informationSeekerConnectRequestCryosphereWhere the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildInformationSeekerConnectRequestQuery The current query, for fluid interface
     */
    public function filterByInformationSeekerConnectRequestCryosphereWhere($informationSeekerConnectRequestCryosphereWhere, $comparison = null)
    {
        if ($informationSeekerConnectRequestCryosphereWhere instanceof \CryoConnectDB\InformationSeekerConnectRequestCryosphereWhere) {
            return $this
                ->addUsingAlias(InformationSeekerConnectRequestTableMap::COL_ID, $informationSeekerConnectRequestCryosphereWhere->getInformationSeekerConnectRequestId(), $comparison);
        } elseif ($informationSeekerConnectRequestCryosphereWhere instanceof ObjectCollection) {
            return $this
                ->useInformationSeekerConnectRequestCryosphereWhereQuery()
                ->filterByPrimaryKeys($informationSeekerConnectRequestCryosphereWhere->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByInformationSeekerConnectRequestCryosphereWhere() only accepts arguments of type \CryoConnectDB\InformationSeekerConnectRequestCryosphereWhere or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the InformationSeekerConnectRequestCryosphereWhere relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildInformationSeekerConnectRequestQuery The current query, for fluid interface
     */
    public function joinInformationSeekerConnectRequestCryosphereWhere($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('InformationSeekerConnectRequestCryosphereWhere');

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
            $this->addJoinObject($join, 'InformationSeekerConnectRequestCryosphereWhere');
        }

        return $this;
    }

    /**
     * Use the InformationSeekerConnectRequestCryosphereWhere relation InformationSeekerConnectRequestCryosphereWhere object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \CryoConnectDB\InformationSeekerConnectRequestCryosphereWhereQuery A secondary query class using the current class as primary query
     */
    public function useInformationSeekerConnectRequestCryosphereWhereQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinInformationSeekerConnectRequestCryosphereWhere($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'InformationSeekerConnectRequestCryosphereWhere', '\CryoConnectDB\InformationSeekerConnectRequestCryosphereWhereQuery');
    }

    /**
     * Filter the query by a related \CryoConnectDB\InformationSeekerConnectRequestLanguages object
     *
     * @param \CryoConnectDB\InformationSeekerConnectRequestLanguages|ObjectCollection $informationSeekerConnectRequestLanguages the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildInformationSeekerConnectRequestQuery The current query, for fluid interface
     */
    public function filterByInformationSeekerConnectRequestLanguages($informationSeekerConnectRequestLanguages, $comparison = null)
    {
        if ($informationSeekerConnectRequestLanguages instanceof \CryoConnectDB\InformationSeekerConnectRequestLanguages) {
            return $this
                ->addUsingAlias(InformationSeekerConnectRequestTableMap::COL_ID, $informationSeekerConnectRequestLanguages->getInformationSeekerConnectRequestId(), $comparison);
        } elseif ($informationSeekerConnectRequestLanguages instanceof ObjectCollection) {
            return $this
                ->useInformationSeekerConnectRequestLanguagesQuery()
                ->filterByPrimaryKeys($informationSeekerConnectRequestLanguages->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByInformationSeekerConnectRequestLanguages() only accepts arguments of type \CryoConnectDB\InformationSeekerConnectRequestLanguages or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the InformationSeekerConnectRequestLanguages relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildInformationSeekerConnectRequestQuery The current query, for fluid interface
     */
    public function joinInformationSeekerConnectRequestLanguages($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('InformationSeekerConnectRequestLanguages');

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
            $this->addJoinObject($join, 'InformationSeekerConnectRequestLanguages');
        }

        return $this;
    }

    /**
     * Use the InformationSeekerConnectRequestLanguages relation InformationSeekerConnectRequestLanguages object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \CryoConnectDB\InformationSeekerConnectRequestLanguagesQuery A secondary query class using the current class as primary query
     */
    public function useInformationSeekerConnectRequestLanguagesQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinInformationSeekerConnectRequestLanguages($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'InformationSeekerConnectRequestLanguages', '\CryoConnectDB\InformationSeekerConnectRequestLanguagesQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ChildInformationSeekerConnectRequest $informationSeekerConnectRequest Object to remove from the list of results
     *
     * @return $this|ChildInformationSeekerConnectRequestQuery The current query, for fluid interface
     */
    public function prune($informationSeekerConnectRequest = null)
    {
        if ($informationSeekerConnectRequest) {
            $this->addUsingAlias(InformationSeekerConnectRequestTableMap::COL_ID, $informationSeekerConnectRequest->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the information_seeker_connect_request table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(InformationSeekerConnectRequestTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            InformationSeekerConnectRequestTableMap::clearInstancePool();
            InformationSeekerConnectRequestTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(InformationSeekerConnectRequestTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(InformationSeekerConnectRequestTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            InformationSeekerConnectRequestTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            InformationSeekerConnectRequestTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // InformationSeekerConnectRequestQuery
