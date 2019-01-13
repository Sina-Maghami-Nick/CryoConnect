<?php

namespace CryoConnectDB\Base;

use \Exception;
use \PDO;
use CryoConnectDB\InformationSeekerContact as ChildInformationSeekerContact;
use CryoConnectDB\InformationSeekerContactQuery as ChildInformationSeekerContactQuery;
use CryoConnectDB\Map\InformationSeekerContactTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'information_seeker_contact' table.
 *
 *
 *
 * @method     ChildInformationSeekerContactQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ChildInformationSeekerContactQuery orderByContactInformation($order = Criteria::ASC) Order by the contact_information column
 * @method     ChildInformationSeekerContactQuery orderByInformationSeekerId($order = Criteria::ASC) Order by the information_seeker_id column
 * @method     ChildInformationSeekerContactQuery orderByContactTypeId($order = Criteria::ASC) Order by the contact_type_id column
 * @method     ChildInformationSeekerContactQuery orderByTimestamp($order = Criteria::ASC) Order by the timestamp column
 *
 * @method     ChildInformationSeekerContactQuery groupById() Group by the id column
 * @method     ChildInformationSeekerContactQuery groupByContactInformation() Group by the contact_information column
 * @method     ChildInformationSeekerContactQuery groupByInformationSeekerId() Group by the information_seeker_id column
 * @method     ChildInformationSeekerContactQuery groupByContactTypeId() Group by the contact_type_id column
 * @method     ChildInformationSeekerContactQuery groupByTimestamp() Group by the timestamp column
 *
 * @method     ChildInformationSeekerContactQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildInformationSeekerContactQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildInformationSeekerContactQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildInformationSeekerContactQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildInformationSeekerContactQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildInformationSeekerContactQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildInformationSeekerContactQuery leftJoinInformationSeekers($relationAlias = null) Adds a LEFT JOIN clause to the query using the InformationSeekers relation
 * @method     ChildInformationSeekerContactQuery rightJoinInformationSeekers($relationAlias = null) Adds a RIGHT JOIN clause to the query using the InformationSeekers relation
 * @method     ChildInformationSeekerContactQuery innerJoinInformationSeekers($relationAlias = null) Adds a INNER JOIN clause to the query using the InformationSeekers relation
 *
 * @method     ChildInformationSeekerContactQuery joinWithInformationSeekers($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the InformationSeekers relation
 *
 * @method     ChildInformationSeekerContactQuery leftJoinWithInformationSeekers() Adds a LEFT JOIN clause and with to the query using the InformationSeekers relation
 * @method     ChildInformationSeekerContactQuery rightJoinWithInformationSeekers() Adds a RIGHT JOIN clause and with to the query using the InformationSeekers relation
 * @method     ChildInformationSeekerContactQuery innerJoinWithInformationSeekers() Adds a INNER JOIN clause and with to the query using the InformationSeekers relation
 *
 * @method     ChildInformationSeekerContactQuery leftJoinContactTypes($relationAlias = null) Adds a LEFT JOIN clause to the query using the ContactTypes relation
 * @method     ChildInformationSeekerContactQuery rightJoinContactTypes($relationAlias = null) Adds a RIGHT JOIN clause to the query using the ContactTypes relation
 * @method     ChildInformationSeekerContactQuery innerJoinContactTypes($relationAlias = null) Adds a INNER JOIN clause to the query using the ContactTypes relation
 *
 * @method     ChildInformationSeekerContactQuery joinWithContactTypes($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the ContactTypes relation
 *
 * @method     ChildInformationSeekerContactQuery leftJoinWithContactTypes() Adds a LEFT JOIN clause and with to the query using the ContactTypes relation
 * @method     ChildInformationSeekerContactQuery rightJoinWithContactTypes() Adds a RIGHT JOIN clause and with to the query using the ContactTypes relation
 * @method     ChildInformationSeekerContactQuery innerJoinWithContactTypes() Adds a INNER JOIN clause and with to the query using the ContactTypes relation
 *
 * @method     \CryoConnectDB\InformationSeekersQuery|\CryoConnectDB\ContactTypesQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildInformationSeekerContact findOne(ConnectionInterface $con = null) Return the first ChildInformationSeekerContact matching the query
 * @method     ChildInformationSeekerContact findOneOrCreate(ConnectionInterface $con = null) Return the first ChildInformationSeekerContact matching the query, or a new ChildInformationSeekerContact object populated from the query conditions when no match is found
 *
 * @method     ChildInformationSeekerContact findOneById(int $id) Return the first ChildInformationSeekerContact filtered by the id column
 * @method     ChildInformationSeekerContact findOneByContactInformation(string $contact_information) Return the first ChildInformationSeekerContact filtered by the contact_information column
 * @method     ChildInformationSeekerContact findOneByInformationSeekerId(int $information_seeker_id) Return the first ChildInformationSeekerContact filtered by the information_seeker_id column
 * @method     ChildInformationSeekerContact findOneByContactTypeId(int $contact_type_id) Return the first ChildInformationSeekerContact filtered by the contact_type_id column
 * @method     ChildInformationSeekerContact findOneByTimestamp(string $timestamp) Return the first ChildInformationSeekerContact filtered by the timestamp column *

 * @method     ChildInformationSeekerContact requirePk($key, ConnectionInterface $con = null) Return the ChildInformationSeekerContact by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildInformationSeekerContact requireOne(ConnectionInterface $con = null) Return the first ChildInformationSeekerContact matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildInformationSeekerContact requireOneById(int $id) Return the first ChildInformationSeekerContact filtered by the id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildInformationSeekerContact requireOneByContactInformation(string $contact_information) Return the first ChildInformationSeekerContact filtered by the contact_information column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildInformationSeekerContact requireOneByInformationSeekerId(int $information_seeker_id) Return the first ChildInformationSeekerContact filtered by the information_seeker_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildInformationSeekerContact requireOneByContactTypeId(int $contact_type_id) Return the first ChildInformationSeekerContact filtered by the contact_type_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildInformationSeekerContact requireOneByTimestamp(string $timestamp) Return the first ChildInformationSeekerContact filtered by the timestamp column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildInformationSeekerContact[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildInformationSeekerContact objects based on current ModelCriteria
 * @method     ChildInformationSeekerContact[]|ObjectCollection findById(int $id) Return ChildInformationSeekerContact objects filtered by the id column
 * @method     ChildInformationSeekerContact[]|ObjectCollection findByContactInformation(string $contact_information) Return ChildInformationSeekerContact objects filtered by the contact_information column
 * @method     ChildInformationSeekerContact[]|ObjectCollection findByInformationSeekerId(int $information_seeker_id) Return ChildInformationSeekerContact objects filtered by the information_seeker_id column
 * @method     ChildInformationSeekerContact[]|ObjectCollection findByContactTypeId(int $contact_type_id) Return ChildInformationSeekerContact objects filtered by the contact_type_id column
 * @method     ChildInformationSeekerContact[]|ObjectCollection findByTimestamp(string $timestamp) Return ChildInformationSeekerContact objects filtered by the timestamp column
 * @method     ChildInformationSeekerContact[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class InformationSeekerContactQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \CryoConnectDB\Base\InformationSeekerContactQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\CryoConnectDB\\InformationSeekerContact', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildInformationSeekerContactQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildInformationSeekerContactQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildInformationSeekerContactQuery) {
            return $criteria;
        }
        $query = new ChildInformationSeekerContactQuery();
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
     * $obj = $c->findPk(array(12, 34, 56), $con);
     * </code>
     *
     * @param array[$id, $information_seeker_id, $contact_type_id] $key Primary key to use for the query
     * @param ConnectionInterface $con an optional connection object
     *
     * @return ChildInformationSeekerContact|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(InformationSeekerContactTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = InformationSeekerContactTableMap::getInstanceFromPool(serialize([(null === $key[0] || is_scalar($key[0]) || is_callable([$key[0], '__toString']) ? (string) $key[0] : $key[0]), (null === $key[1] || is_scalar($key[1]) || is_callable([$key[1], '__toString']) ? (string) $key[1] : $key[1]), (null === $key[2] || is_scalar($key[2]) || is_callable([$key[2], '__toString']) ? (string) $key[2] : $key[2])]))))) {
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
     * @return ChildInformationSeekerContact A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT id, contact_information, information_seeker_id, contact_type_id, timestamp FROM information_seeker_contact WHERE id = :p0 AND information_seeker_id = :p1 AND contact_type_id = :p2';
        try {
            $stmt = $con->prepare($sql);
            $stmt->bindValue(':p0', $key[0], PDO::PARAM_INT);
            $stmt->bindValue(':p1', $key[1], PDO::PARAM_INT);
            $stmt->bindValue(':p2', $key[2], PDO::PARAM_INT);
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute SELECT statement [%s]', $sql), 0, $e);
        }
        $obj = null;
        if ($row = $stmt->fetch(\PDO::FETCH_NUM)) {
            /** @var ChildInformationSeekerContact $obj */
            $obj = new ChildInformationSeekerContact();
            $obj->hydrate($row);
            InformationSeekerContactTableMap::addInstanceToPool($obj, serialize([(null === $key[0] || is_scalar($key[0]) || is_callable([$key[0], '__toString']) ? (string) $key[0] : $key[0]), (null === $key[1] || is_scalar($key[1]) || is_callable([$key[1], '__toString']) ? (string) $key[1] : $key[1]), (null === $key[2] || is_scalar($key[2]) || is_callable([$key[2], '__toString']) ? (string) $key[2] : $key[2])]));
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
     * @return ChildInformationSeekerContact|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildInformationSeekerContactQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {
        $this->addUsingAlias(InformationSeekerContactTableMap::COL_ID, $key[0], Criteria::EQUAL);
        $this->addUsingAlias(InformationSeekerContactTableMap::COL_INFORMATION_SEEKER_ID, $key[1], Criteria::EQUAL);
        $this->addUsingAlias(InformationSeekerContactTableMap::COL_CONTACT_TYPE_ID, $key[2], Criteria::EQUAL);

        return $this;
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildInformationSeekerContactQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {
        if (empty($keys)) {
            return $this->add(null, '1<>1', Criteria::CUSTOM);
        }
        foreach ($keys as $key) {
            $cton0 = $this->getNewCriterion(InformationSeekerContactTableMap::COL_ID, $key[0], Criteria::EQUAL);
            $cton1 = $this->getNewCriterion(InformationSeekerContactTableMap::COL_INFORMATION_SEEKER_ID, $key[1], Criteria::EQUAL);
            $cton0->addAnd($cton1);
            $cton2 = $this->getNewCriterion(InformationSeekerContactTableMap::COL_CONTACT_TYPE_ID, $key[2], Criteria::EQUAL);
            $cton0->addAnd($cton2);
            $this->addOr($cton0);
        }

        return $this;
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
     * @return $this|ChildInformationSeekerContactQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(InformationSeekerContactTableMap::COL_ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(InformationSeekerContactTableMap::COL_ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(InformationSeekerContactTableMap::COL_ID, $id, $comparison);
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
     * @return $this|ChildInformationSeekerContactQuery The current query, for fluid interface
     */
    public function filterByContactInformation($contactInformation = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($contactInformation)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(InformationSeekerContactTableMap::COL_CONTACT_INFORMATION, $contactInformation, $comparison);
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
     * @return $this|ChildInformationSeekerContactQuery The current query, for fluid interface
     */
    public function filterByInformationSeekerId($informationSeekerId = null, $comparison = null)
    {
        if (is_array($informationSeekerId)) {
            $useMinMax = false;
            if (isset($informationSeekerId['min'])) {
                $this->addUsingAlias(InformationSeekerContactTableMap::COL_INFORMATION_SEEKER_ID, $informationSeekerId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($informationSeekerId['max'])) {
                $this->addUsingAlias(InformationSeekerContactTableMap::COL_INFORMATION_SEEKER_ID, $informationSeekerId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(InformationSeekerContactTableMap::COL_INFORMATION_SEEKER_ID, $informationSeekerId, $comparison);
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
     * @return $this|ChildInformationSeekerContactQuery The current query, for fluid interface
     */
    public function filterByContactTypeId($contactTypeId = null, $comparison = null)
    {
        if (is_array($contactTypeId)) {
            $useMinMax = false;
            if (isset($contactTypeId['min'])) {
                $this->addUsingAlias(InformationSeekerContactTableMap::COL_CONTACT_TYPE_ID, $contactTypeId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($contactTypeId['max'])) {
                $this->addUsingAlias(InformationSeekerContactTableMap::COL_CONTACT_TYPE_ID, $contactTypeId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(InformationSeekerContactTableMap::COL_CONTACT_TYPE_ID, $contactTypeId, $comparison);
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
     * @return $this|ChildInformationSeekerContactQuery The current query, for fluid interface
     */
    public function filterByTimestamp($timestamp = null, $comparison = null)
    {
        if (is_array($timestamp)) {
            $useMinMax = false;
            if (isset($timestamp['min'])) {
                $this->addUsingAlias(InformationSeekerContactTableMap::COL_TIMESTAMP, $timestamp['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($timestamp['max'])) {
                $this->addUsingAlias(InformationSeekerContactTableMap::COL_TIMESTAMP, $timestamp['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(InformationSeekerContactTableMap::COL_TIMESTAMP, $timestamp, $comparison);
    }

    /**
     * Filter the query by a related \CryoConnectDB\InformationSeekers object
     *
     * @param \CryoConnectDB\InformationSeekers|ObjectCollection $informationSeekers The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildInformationSeekerContactQuery The current query, for fluid interface
     */
    public function filterByInformationSeekers($informationSeekers, $comparison = null)
    {
        if ($informationSeekers instanceof \CryoConnectDB\InformationSeekers) {
            return $this
                ->addUsingAlias(InformationSeekerContactTableMap::COL_INFORMATION_SEEKER_ID, $informationSeekers->getId(), $comparison);
        } elseif ($informationSeekers instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(InformationSeekerContactTableMap::COL_INFORMATION_SEEKER_ID, $informationSeekers->toKeyValue('PrimaryKey', 'Id'), $comparison);
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
     * @return $this|ChildInformationSeekerContactQuery The current query, for fluid interface
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
     * Filter the query by a related \CryoConnectDB\ContactTypes object
     *
     * @param \CryoConnectDB\ContactTypes|ObjectCollection $contactTypes The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildInformationSeekerContactQuery The current query, for fluid interface
     */
    public function filterByContactTypes($contactTypes, $comparison = null)
    {
        if ($contactTypes instanceof \CryoConnectDB\ContactTypes) {
            return $this
                ->addUsingAlias(InformationSeekerContactTableMap::COL_CONTACT_TYPE_ID, $contactTypes->getId(), $comparison);
        } elseif ($contactTypes instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(InformationSeekerContactTableMap::COL_CONTACT_TYPE_ID, $contactTypes->toKeyValue('PrimaryKey', 'Id'), $comparison);
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
     * @return $this|ChildInformationSeekerContactQuery The current query, for fluid interface
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
     * @param   ChildInformationSeekerContact $informationSeekerContact Object to remove from the list of results
     *
     * @return $this|ChildInformationSeekerContactQuery The current query, for fluid interface
     */
    public function prune($informationSeekerContact = null)
    {
        if ($informationSeekerContact) {
            $this->addCond('pruneCond0', $this->getAliasedColName(InformationSeekerContactTableMap::COL_ID), $informationSeekerContact->getId(), Criteria::NOT_EQUAL);
            $this->addCond('pruneCond1', $this->getAliasedColName(InformationSeekerContactTableMap::COL_INFORMATION_SEEKER_ID), $informationSeekerContact->getInformationSeekerId(), Criteria::NOT_EQUAL);
            $this->addCond('pruneCond2', $this->getAliasedColName(InformationSeekerContactTableMap::COL_CONTACT_TYPE_ID), $informationSeekerContact->getContactTypeId(), Criteria::NOT_EQUAL);
            $this->combine(array('pruneCond0', 'pruneCond1', 'pruneCond2'), Criteria::LOGICAL_OR);
        }

        return $this;
    }

    /**
     * Deletes all rows from the information_seeker_contact table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(InformationSeekerContactTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            InformationSeekerContactTableMap::clearInstancePool();
            InformationSeekerContactTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(InformationSeekerContactTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(InformationSeekerContactTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            InformationSeekerContactTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            InformationSeekerContactTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // InformationSeekerContactQuery
