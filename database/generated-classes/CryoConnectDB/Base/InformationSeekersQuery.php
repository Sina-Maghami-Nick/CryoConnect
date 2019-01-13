<?php

namespace CryoConnectDB\Base;

use \Exception;
use \PDO;
use CryoConnectDB\InformationSeekers as ChildInformationSeekers;
use CryoConnectDB\InformationSeekersQuery as ChildInformationSeekersQuery;
use CryoConnectDB\Map\InformationSeekersTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'information_seekers' table.
 *
 *
 *
 * @method     ChildInformationSeekersQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ChildInformationSeekersQuery orderByFirstName($order = Criteria::ASC) Order by the first_name column
 * @method     ChildInformationSeekersQuery orderByLastName($order = Criteria::ASC) Order by the last_name column
 * @method     ChildInformationSeekersQuery orderByEmail($order = Criteria::ASC) Order by the email column
 * @method     ChildInformationSeekersQuery orderByCountryCode($order = Criteria::ASC) Order by the country_code column
 * @method     ChildInformationSeekersQuery orderByApproved($order = Criteria::ASC) Order by the approved column
 * @method     ChildInformationSeekersQuery orderByCreatedAt($order = Criteria::ASC) Order by the created_at column
 *
 * @method     ChildInformationSeekersQuery groupById() Group by the id column
 * @method     ChildInformationSeekersQuery groupByFirstName() Group by the first_name column
 * @method     ChildInformationSeekersQuery groupByLastName() Group by the last_name column
 * @method     ChildInformationSeekersQuery groupByEmail() Group by the email column
 * @method     ChildInformationSeekersQuery groupByCountryCode() Group by the country_code column
 * @method     ChildInformationSeekersQuery groupByApproved() Group by the approved column
 * @method     ChildInformationSeekersQuery groupByCreatedAt() Group by the created_at column
 *
 * @method     ChildInformationSeekersQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildInformationSeekersQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildInformationSeekersQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildInformationSeekersQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildInformationSeekersQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildInformationSeekersQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildInformationSeekersQuery leftJoinCountries($relationAlias = null) Adds a LEFT JOIN clause to the query using the Countries relation
 * @method     ChildInformationSeekersQuery rightJoinCountries($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Countries relation
 * @method     ChildInformationSeekersQuery innerJoinCountries($relationAlias = null) Adds a INNER JOIN clause to the query using the Countries relation
 *
 * @method     ChildInformationSeekersQuery joinWithCountries($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Countries relation
 *
 * @method     ChildInformationSeekersQuery leftJoinWithCountries() Adds a LEFT JOIN clause and with to the query using the Countries relation
 * @method     ChildInformationSeekersQuery rightJoinWithCountries() Adds a RIGHT JOIN clause and with to the query using the Countries relation
 * @method     ChildInformationSeekersQuery innerJoinWithCountries() Adds a INNER JOIN clause and with to the query using the Countries relation
 *
 * @method     ChildInformationSeekersQuery leftJoinInformationSeekerAffiliation($relationAlias = null) Adds a LEFT JOIN clause to the query using the InformationSeekerAffiliation relation
 * @method     ChildInformationSeekersQuery rightJoinInformationSeekerAffiliation($relationAlias = null) Adds a RIGHT JOIN clause to the query using the InformationSeekerAffiliation relation
 * @method     ChildInformationSeekersQuery innerJoinInformationSeekerAffiliation($relationAlias = null) Adds a INNER JOIN clause to the query using the InformationSeekerAffiliation relation
 *
 * @method     ChildInformationSeekersQuery joinWithInformationSeekerAffiliation($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the InformationSeekerAffiliation relation
 *
 * @method     ChildInformationSeekersQuery leftJoinWithInformationSeekerAffiliation() Adds a LEFT JOIN clause and with to the query using the InformationSeekerAffiliation relation
 * @method     ChildInformationSeekersQuery rightJoinWithInformationSeekerAffiliation() Adds a RIGHT JOIN clause and with to the query using the InformationSeekerAffiliation relation
 * @method     ChildInformationSeekersQuery innerJoinWithInformationSeekerAffiliation() Adds a INNER JOIN clause and with to the query using the InformationSeekerAffiliation relation
 *
 * @method     ChildInformationSeekersQuery leftJoinInformationSeekerConnectRequest($relationAlias = null) Adds a LEFT JOIN clause to the query using the InformationSeekerConnectRequest relation
 * @method     ChildInformationSeekersQuery rightJoinInformationSeekerConnectRequest($relationAlias = null) Adds a RIGHT JOIN clause to the query using the InformationSeekerConnectRequest relation
 * @method     ChildInformationSeekersQuery innerJoinInformationSeekerConnectRequest($relationAlias = null) Adds a INNER JOIN clause to the query using the InformationSeekerConnectRequest relation
 *
 * @method     ChildInformationSeekersQuery joinWithInformationSeekerConnectRequest($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the InformationSeekerConnectRequest relation
 *
 * @method     ChildInformationSeekersQuery leftJoinWithInformationSeekerConnectRequest() Adds a LEFT JOIN clause and with to the query using the InformationSeekerConnectRequest relation
 * @method     ChildInformationSeekersQuery rightJoinWithInformationSeekerConnectRequest() Adds a RIGHT JOIN clause and with to the query using the InformationSeekerConnectRequest relation
 * @method     ChildInformationSeekersQuery innerJoinWithInformationSeekerConnectRequest() Adds a INNER JOIN clause and with to the query using the InformationSeekerConnectRequest relation
 *
 * @method     ChildInformationSeekersQuery leftJoinInformationSeekerContact($relationAlias = null) Adds a LEFT JOIN clause to the query using the InformationSeekerContact relation
 * @method     ChildInformationSeekersQuery rightJoinInformationSeekerContact($relationAlias = null) Adds a RIGHT JOIN clause to the query using the InformationSeekerContact relation
 * @method     ChildInformationSeekersQuery innerJoinInformationSeekerContact($relationAlias = null) Adds a INNER JOIN clause to the query using the InformationSeekerContact relation
 *
 * @method     ChildInformationSeekersQuery joinWithInformationSeekerContact($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the InformationSeekerContact relation
 *
 * @method     ChildInformationSeekersQuery leftJoinWithInformationSeekerContact() Adds a LEFT JOIN clause and with to the query using the InformationSeekerContact relation
 * @method     ChildInformationSeekersQuery rightJoinWithInformationSeekerContact() Adds a RIGHT JOIN clause and with to the query using the InformationSeekerContact relation
 * @method     ChildInformationSeekersQuery innerJoinWithInformationSeekerContact() Adds a INNER JOIN clause and with to the query using the InformationSeekerContact relation
 *
 * @method     ChildInformationSeekersQuery leftJoinInformationSeekerLanguages($relationAlias = null) Adds a LEFT JOIN clause to the query using the InformationSeekerLanguages relation
 * @method     ChildInformationSeekersQuery rightJoinInformationSeekerLanguages($relationAlias = null) Adds a RIGHT JOIN clause to the query using the InformationSeekerLanguages relation
 * @method     ChildInformationSeekersQuery innerJoinInformationSeekerLanguages($relationAlias = null) Adds a INNER JOIN clause to the query using the InformationSeekerLanguages relation
 *
 * @method     ChildInformationSeekersQuery joinWithInformationSeekerLanguages($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the InformationSeekerLanguages relation
 *
 * @method     ChildInformationSeekersQuery leftJoinWithInformationSeekerLanguages() Adds a LEFT JOIN clause and with to the query using the InformationSeekerLanguages relation
 * @method     ChildInformationSeekersQuery rightJoinWithInformationSeekerLanguages() Adds a RIGHT JOIN clause and with to the query using the InformationSeekerLanguages relation
 * @method     ChildInformationSeekersQuery innerJoinWithInformationSeekerLanguages() Adds a INNER JOIN clause and with to the query using the InformationSeekerLanguages relation
 *
 * @method     ChildInformationSeekersQuery leftJoinInformationSeekerProfession($relationAlias = null) Adds a LEFT JOIN clause to the query using the InformationSeekerProfession relation
 * @method     ChildInformationSeekersQuery rightJoinInformationSeekerProfession($relationAlias = null) Adds a RIGHT JOIN clause to the query using the InformationSeekerProfession relation
 * @method     ChildInformationSeekersQuery innerJoinInformationSeekerProfession($relationAlias = null) Adds a INNER JOIN clause to the query using the InformationSeekerProfession relation
 *
 * @method     ChildInformationSeekersQuery joinWithInformationSeekerProfession($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the InformationSeekerProfession relation
 *
 * @method     ChildInformationSeekersQuery leftJoinWithInformationSeekerProfession() Adds a LEFT JOIN clause and with to the query using the InformationSeekerProfession relation
 * @method     ChildInformationSeekersQuery rightJoinWithInformationSeekerProfession() Adds a RIGHT JOIN clause and with to the query using the InformationSeekerProfession relation
 * @method     ChildInformationSeekersQuery innerJoinWithInformationSeekerProfession() Adds a INNER JOIN clause and with to the query using the InformationSeekerProfession relation
 *
 * @method     \CryoConnectDB\CountriesQuery|\CryoConnectDB\InformationSeekerAffiliationQuery|\CryoConnectDB\InformationSeekerConnectRequestQuery|\CryoConnectDB\InformationSeekerContactQuery|\CryoConnectDB\InformationSeekerLanguagesQuery|\CryoConnectDB\InformationSeekerProfessionQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildInformationSeekers findOne(ConnectionInterface $con = null) Return the first ChildInformationSeekers matching the query
 * @method     ChildInformationSeekers findOneOrCreate(ConnectionInterface $con = null) Return the first ChildInformationSeekers matching the query, or a new ChildInformationSeekers object populated from the query conditions when no match is found
 *
 * @method     ChildInformationSeekers findOneById(int $id) Return the first ChildInformationSeekers filtered by the id column
 * @method     ChildInformationSeekers findOneByFirstName(string $first_name) Return the first ChildInformationSeekers filtered by the first_name column
 * @method     ChildInformationSeekers findOneByLastName(string $last_name) Return the first ChildInformationSeekers filtered by the last_name column
 * @method     ChildInformationSeekers findOneByEmail(string $email) Return the first ChildInformationSeekers filtered by the email column
 * @method     ChildInformationSeekers findOneByCountryCode(string $country_code) Return the first ChildInformationSeekers filtered by the country_code column
 * @method     ChildInformationSeekers findOneByApproved(boolean $approved) Return the first ChildInformationSeekers filtered by the approved column
 * @method     ChildInformationSeekers findOneByCreatedAt(string $created_at) Return the first ChildInformationSeekers filtered by the created_at column *

 * @method     ChildInformationSeekers requirePk($key, ConnectionInterface $con = null) Return the ChildInformationSeekers by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildInformationSeekers requireOne(ConnectionInterface $con = null) Return the first ChildInformationSeekers matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildInformationSeekers requireOneById(int $id) Return the first ChildInformationSeekers filtered by the id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildInformationSeekers requireOneByFirstName(string $first_name) Return the first ChildInformationSeekers filtered by the first_name column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildInformationSeekers requireOneByLastName(string $last_name) Return the first ChildInformationSeekers filtered by the last_name column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildInformationSeekers requireOneByEmail(string $email) Return the first ChildInformationSeekers filtered by the email column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildInformationSeekers requireOneByCountryCode(string $country_code) Return the first ChildInformationSeekers filtered by the country_code column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildInformationSeekers requireOneByApproved(boolean $approved) Return the first ChildInformationSeekers filtered by the approved column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildInformationSeekers requireOneByCreatedAt(string $created_at) Return the first ChildInformationSeekers filtered by the created_at column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildInformationSeekers[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildInformationSeekers objects based on current ModelCriteria
 * @method     ChildInformationSeekers[]|ObjectCollection findById(int $id) Return ChildInformationSeekers objects filtered by the id column
 * @method     ChildInformationSeekers[]|ObjectCollection findByFirstName(string $first_name) Return ChildInformationSeekers objects filtered by the first_name column
 * @method     ChildInformationSeekers[]|ObjectCollection findByLastName(string $last_name) Return ChildInformationSeekers objects filtered by the last_name column
 * @method     ChildInformationSeekers[]|ObjectCollection findByEmail(string $email) Return ChildInformationSeekers objects filtered by the email column
 * @method     ChildInformationSeekers[]|ObjectCollection findByCountryCode(string $country_code) Return ChildInformationSeekers objects filtered by the country_code column
 * @method     ChildInformationSeekers[]|ObjectCollection findByApproved(boolean $approved) Return ChildInformationSeekers objects filtered by the approved column
 * @method     ChildInformationSeekers[]|ObjectCollection findByCreatedAt(string $created_at) Return ChildInformationSeekers objects filtered by the created_at column
 * @method     ChildInformationSeekers[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class InformationSeekersQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \CryoConnectDB\Base\InformationSeekersQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\CryoConnectDB\\InformationSeekers', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildInformationSeekersQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildInformationSeekersQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildInformationSeekersQuery) {
            return $criteria;
        }
        $query = new ChildInformationSeekersQuery();
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
     * @return ChildInformationSeekers|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(InformationSeekersTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = InformationSeekersTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildInformationSeekers A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT id, first_name, last_name, email, country_code, approved, created_at FROM information_seekers WHERE id = :p0';
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
            /** @var ChildInformationSeekers $obj */
            $obj = new ChildInformationSeekers();
            $obj->hydrate($row);
            InformationSeekersTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildInformationSeekers|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildInformationSeekersQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(InformationSeekersTableMap::COL_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildInformationSeekersQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(InformationSeekersTableMap::COL_ID, $keys, Criteria::IN);
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
     * @return $this|ChildInformationSeekersQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(InformationSeekersTableMap::COL_ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(InformationSeekersTableMap::COL_ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(InformationSeekersTableMap::COL_ID, $id, $comparison);
    }

    /**
     * Filter the query on the first_name column
     *
     * Example usage:
     * <code>
     * $query->filterByFirstName('fooValue');   // WHERE first_name = 'fooValue'
     * $query->filterByFirstName('%fooValue%', Criteria::LIKE); // WHERE first_name LIKE '%fooValue%'
     * </code>
     *
     * @param     string $firstName The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildInformationSeekersQuery The current query, for fluid interface
     */
    public function filterByFirstName($firstName = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($firstName)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(InformationSeekersTableMap::COL_FIRST_NAME, $firstName, $comparison);
    }

    /**
     * Filter the query on the last_name column
     *
     * Example usage:
     * <code>
     * $query->filterByLastName('fooValue');   // WHERE last_name = 'fooValue'
     * $query->filterByLastName('%fooValue%', Criteria::LIKE); // WHERE last_name LIKE '%fooValue%'
     * </code>
     *
     * @param     string $lastName The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildInformationSeekersQuery The current query, for fluid interface
     */
    public function filterByLastName($lastName = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($lastName)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(InformationSeekersTableMap::COL_LAST_NAME, $lastName, $comparison);
    }

    /**
     * Filter the query on the email column
     *
     * Example usage:
     * <code>
     * $query->filterByEmail('fooValue');   // WHERE email = 'fooValue'
     * $query->filterByEmail('%fooValue%', Criteria::LIKE); // WHERE email LIKE '%fooValue%'
     * </code>
     *
     * @param     string $email The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildInformationSeekersQuery The current query, for fluid interface
     */
    public function filterByEmail($email = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($email)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(InformationSeekersTableMap::COL_EMAIL, $email, $comparison);
    }

    /**
     * Filter the query on the country_code column
     *
     * Example usage:
     * <code>
     * $query->filterByCountryCode('fooValue');   // WHERE country_code = 'fooValue'
     * $query->filterByCountryCode('%fooValue%', Criteria::LIKE); // WHERE country_code LIKE '%fooValue%'
     * </code>
     *
     * @param     string $countryCode The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildInformationSeekersQuery The current query, for fluid interface
     */
    public function filterByCountryCode($countryCode = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($countryCode)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(InformationSeekersTableMap::COL_COUNTRY_CODE, $countryCode, $comparison);
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
     * @return $this|ChildInformationSeekersQuery The current query, for fluid interface
     */
    public function filterByApproved($approved = null, $comparison = null)
    {
        if (is_string($approved)) {
            $approved = in_array(strtolower($approved), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(InformationSeekersTableMap::COL_APPROVED, $approved, $comparison);
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
     * @return $this|ChildInformationSeekersQuery The current query, for fluid interface
     */
    public function filterByCreatedAt($createdAt = null, $comparison = null)
    {
        if (is_array($createdAt)) {
            $useMinMax = false;
            if (isset($createdAt['min'])) {
                $this->addUsingAlias(InformationSeekersTableMap::COL_CREATED_AT, $createdAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createdAt['max'])) {
                $this->addUsingAlias(InformationSeekersTableMap::COL_CREATED_AT, $createdAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(InformationSeekersTableMap::COL_CREATED_AT, $createdAt, $comparison);
    }

    /**
     * Filter the query by a related \CryoConnectDB\Countries object
     *
     * @param \CryoConnectDB\Countries|ObjectCollection $countries The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildInformationSeekersQuery The current query, for fluid interface
     */
    public function filterByCountries($countries, $comparison = null)
    {
        if ($countries instanceof \CryoConnectDB\Countries) {
            return $this
                ->addUsingAlias(InformationSeekersTableMap::COL_COUNTRY_CODE, $countries->getCountryCode(), $comparison);
        } elseif ($countries instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(InformationSeekersTableMap::COL_COUNTRY_CODE, $countries->toKeyValue('PrimaryKey', 'CountryCode'), $comparison);
        } else {
            throw new PropelException('filterByCountries() only accepts arguments of type \CryoConnectDB\Countries or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Countries relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildInformationSeekersQuery The current query, for fluid interface
     */
    public function joinCountries($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Countries');

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
            $this->addJoinObject($join, 'Countries');
        }

        return $this;
    }

    /**
     * Use the Countries relation Countries object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \CryoConnectDB\CountriesQuery A secondary query class using the current class as primary query
     */
    public function useCountriesQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinCountries($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Countries', '\CryoConnectDB\CountriesQuery');
    }

    /**
     * Filter the query by a related \CryoConnectDB\InformationSeekerAffiliation object
     *
     * @param \CryoConnectDB\InformationSeekerAffiliation|ObjectCollection $informationSeekerAffiliation the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildInformationSeekersQuery The current query, for fluid interface
     */
    public function filterByInformationSeekerAffiliation($informationSeekerAffiliation, $comparison = null)
    {
        if ($informationSeekerAffiliation instanceof \CryoConnectDB\InformationSeekerAffiliation) {
            return $this
                ->addUsingAlias(InformationSeekersTableMap::COL_ID, $informationSeekerAffiliation->getInformationSeekerId(), $comparison);
        } elseif ($informationSeekerAffiliation instanceof ObjectCollection) {
            return $this
                ->useInformationSeekerAffiliationQuery()
                ->filterByPrimaryKeys($informationSeekerAffiliation->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByInformationSeekerAffiliation() only accepts arguments of type \CryoConnectDB\InformationSeekerAffiliation or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the InformationSeekerAffiliation relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildInformationSeekersQuery The current query, for fluid interface
     */
    public function joinInformationSeekerAffiliation($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('InformationSeekerAffiliation');

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
            $this->addJoinObject($join, 'InformationSeekerAffiliation');
        }

        return $this;
    }

    /**
     * Use the InformationSeekerAffiliation relation InformationSeekerAffiliation object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \CryoConnectDB\InformationSeekerAffiliationQuery A secondary query class using the current class as primary query
     */
    public function useInformationSeekerAffiliationQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinInformationSeekerAffiliation($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'InformationSeekerAffiliation', '\CryoConnectDB\InformationSeekerAffiliationQuery');
    }

    /**
     * Filter the query by a related \CryoConnectDB\InformationSeekerConnectRequest object
     *
     * @param \CryoConnectDB\InformationSeekerConnectRequest|ObjectCollection $informationSeekerConnectRequest the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildInformationSeekersQuery The current query, for fluid interface
     */
    public function filterByInformationSeekerConnectRequest($informationSeekerConnectRequest, $comparison = null)
    {
        if ($informationSeekerConnectRequest instanceof \CryoConnectDB\InformationSeekerConnectRequest) {
            return $this
                ->addUsingAlias(InformationSeekersTableMap::COL_ID, $informationSeekerConnectRequest->getInformationSeekerId(), $comparison);
        } elseif ($informationSeekerConnectRequest instanceof ObjectCollection) {
            return $this
                ->useInformationSeekerConnectRequestQuery()
                ->filterByPrimaryKeys($informationSeekerConnectRequest->getPrimaryKeys())
                ->endUse();
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
     * @return $this|ChildInformationSeekersQuery The current query, for fluid interface
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
     * Filter the query by a related \CryoConnectDB\InformationSeekerContact object
     *
     * @param \CryoConnectDB\InformationSeekerContact|ObjectCollection $informationSeekerContact the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildInformationSeekersQuery The current query, for fluid interface
     */
    public function filterByInformationSeekerContact($informationSeekerContact, $comparison = null)
    {
        if ($informationSeekerContact instanceof \CryoConnectDB\InformationSeekerContact) {
            return $this
                ->addUsingAlias(InformationSeekersTableMap::COL_ID, $informationSeekerContact->getInformationSeekerId(), $comparison);
        } elseif ($informationSeekerContact instanceof ObjectCollection) {
            return $this
                ->useInformationSeekerContactQuery()
                ->filterByPrimaryKeys($informationSeekerContact->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByInformationSeekerContact() only accepts arguments of type \CryoConnectDB\InformationSeekerContact or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the InformationSeekerContact relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildInformationSeekersQuery The current query, for fluid interface
     */
    public function joinInformationSeekerContact($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('InformationSeekerContact');

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
            $this->addJoinObject($join, 'InformationSeekerContact');
        }

        return $this;
    }

    /**
     * Use the InformationSeekerContact relation InformationSeekerContact object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \CryoConnectDB\InformationSeekerContactQuery A secondary query class using the current class as primary query
     */
    public function useInformationSeekerContactQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinInformationSeekerContact($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'InformationSeekerContact', '\CryoConnectDB\InformationSeekerContactQuery');
    }

    /**
     * Filter the query by a related \CryoConnectDB\InformationSeekerLanguages object
     *
     * @param \CryoConnectDB\InformationSeekerLanguages|ObjectCollection $informationSeekerLanguages the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildInformationSeekersQuery The current query, for fluid interface
     */
    public function filterByInformationSeekerLanguages($informationSeekerLanguages, $comparison = null)
    {
        if ($informationSeekerLanguages instanceof \CryoConnectDB\InformationSeekerLanguages) {
            return $this
                ->addUsingAlias(InformationSeekersTableMap::COL_ID, $informationSeekerLanguages->getInformationSeekerId(), $comparison);
        } elseif ($informationSeekerLanguages instanceof ObjectCollection) {
            return $this
                ->useInformationSeekerLanguagesQuery()
                ->filterByPrimaryKeys($informationSeekerLanguages->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByInformationSeekerLanguages() only accepts arguments of type \CryoConnectDB\InformationSeekerLanguages or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the InformationSeekerLanguages relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildInformationSeekersQuery The current query, for fluid interface
     */
    public function joinInformationSeekerLanguages($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('InformationSeekerLanguages');

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
            $this->addJoinObject($join, 'InformationSeekerLanguages');
        }

        return $this;
    }

    /**
     * Use the InformationSeekerLanguages relation InformationSeekerLanguages object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \CryoConnectDB\InformationSeekerLanguagesQuery A secondary query class using the current class as primary query
     */
    public function useInformationSeekerLanguagesQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinInformationSeekerLanguages($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'InformationSeekerLanguages', '\CryoConnectDB\InformationSeekerLanguagesQuery');
    }

    /**
     * Filter the query by a related \CryoConnectDB\InformationSeekerProfession object
     *
     * @param \CryoConnectDB\InformationSeekerProfession|ObjectCollection $informationSeekerProfession the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildInformationSeekersQuery The current query, for fluid interface
     */
    public function filterByInformationSeekerProfession($informationSeekerProfession, $comparison = null)
    {
        if ($informationSeekerProfession instanceof \CryoConnectDB\InformationSeekerProfession) {
            return $this
                ->addUsingAlias(InformationSeekersTableMap::COL_ID, $informationSeekerProfession->getInformationSeekerId(), $comparison);
        } elseif ($informationSeekerProfession instanceof ObjectCollection) {
            return $this
                ->useInformationSeekerProfessionQuery()
                ->filterByPrimaryKeys($informationSeekerProfession->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByInformationSeekerProfession() only accepts arguments of type \CryoConnectDB\InformationSeekerProfession or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the InformationSeekerProfession relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildInformationSeekersQuery The current query, for fluid interface
     */
    public function joinInformationSeekerProfession($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('InformationSeekerProfession');

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
            $this->addJoinObject($join, 'InformationSeekerProfession');
        }

        return $this;
    }

    /**
     * Use the InformationSeekerProfession relation InformationSeekerProfession object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \CryoConnectDB\InformationSeekerProfessionQuery A secondary query class using the current class as primary query
     */
    public function useInformationSeekerProfessionQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinInformationSeekerProfession($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'InformationSeekerProfession', '\CryoConnectDB\InformationSeekerProfessionQuery');
    }

    /**
     * Filter the query by a related ContactTypes object
     * using the information_seeker_contact table as cross reference
     *
     * @param ContactTypes $contactTypes the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildInformationSeekersQuery The current query, for fluid interface
     */
    public function filterByContactTypes($contactTypes, $comparison = Criteria::EQUAL)
    {
        return $this
            ->useInformationSeekerContactQuery()
            ->filterByContactTypes($contactTypes, $comparison)
            ->endUse();
    }

    /**
     * Filter the query by a related Languages object
     * using the information_seeker_languages table as cross reference
     *
     * @param Languages $languages the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildInformationSeekersQuery The current query, for fluid interface
     */
    public function filterByLanguages($languages, $comparison = Criteria::EQUAL)
    {
        return $this
            ->useInformationSeekerLanguagesQuery()
            ->filterByLanguages($languages, $comparison)
            ->endUse();
    }

    /**
     * Exclude object from result
     *
     * @param   ChildInformationSeekers $informationSeekers Object to remove from the list of results
     *
     * @return $this|ChildInformationSeekersQuery The current query, for fluid interface
     */
    public function prune($informationSeekers = null)
    {
        if ($informationSeekers) {
            $this->addUsingAlias(InformationSeekersTableMap::COL_ID, $informationSeekers->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the information_seekers table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(InformationSeekersTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            InformationSeekersTableMap::clearInstancePool();
            InformationSeekersTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(InformationSeekersTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(InformationSeekersTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            InformationSeekersTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            InformationSeekersTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // InformationSeekersQuery
