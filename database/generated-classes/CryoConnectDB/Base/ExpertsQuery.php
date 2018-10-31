<?php

namespace CryoConnectDB\Base;

use \Exception;
use \PDO;
use CryoConnectDB\Experts as ChildExperts;
use CryoConnectDB\ExpertsQuery as ChildExpertsQuery;
use CryoConnectDB\Map\ExpertsTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'experts' table.
 *
 *
 *
 * @method     ChildExpertsQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ChildExpertsQuery orderByFirstName($order = Criteria::ASC) Order by the first_name column
 * @method     ChildExpertsQuery orderByLastName($order = Criteria::ASC) Order by the last_name column
 * @method     ChildExpertsQuery orderByEmail($order = Criteria::ASC) Order by the email column
 * @method     ChildExpertsQuery orderByBirthYear($order = Criteria::ASC) Order by the birth_year column
 * @method     ChildExpertsQuery orderByCountryCode($order = Criteria::ASC) Order by the country_code column
 * @method     ChildExpertsQuery orderByApproved($order = Criteria::ASC) Order by the approved column
 * @method     ChildExpertsQuery orderByCreatedAt($order = Criteria::ASC) Order by the created_at column
 *
 * @method     ChildExpertsQuery groupById() Group by the id column
 * @method     ChildExpertsQuery groupByFirstName() Group by the first_name column
 * @method     ChildExpertsQuery groupByLastName() Group by the last_name column
 * @method     ChildExpertsQuery groupByEmail() Group by the email column
 * @method     ChildExpertsQuery groupByBirthYear() Group by the birth_year column
 * @method     ChildExpertsQuery groupByCountryCode() Group by the country_code column
 * @method     ChildExpertsQuery groupByApproved() Group by the approved column
 * @method     ChildExpertsQuery groupByCreatedAt() Group by the created_at column
 *
 * @method     ChildExpertsQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildExpertsQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildExpertsQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildExpertsQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildExpertsQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildExpertsQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildExpertsQuery leftJoinCountries($relationAlias = null) Adds a LEFT JOIN clause to the query using the Countries relation
 * @method     ChildExpertsQuery rightJoinCountries($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Countries relation
 * @method     ChildExpertsQuery innerJoinCountries($relationAlias = null) Adds a INNER JOIN clause to the query using the Countries relation
 *
 * @method     ChildExpertsQuery joinWithCountries($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Countries relation
 *
 * @method     ChildExpertsQuery leftJoinWithCountries() Adds a LEFT JOIN clause and with to the query using the Countries relation
 * @method     ChildExpertsQuery rightJoinWithCountries() Adds a RIGHT JOIN clause and with to the query using the Countries relation
 * @method     ChildExpertsQuery innerJoinWithCountries() Adds a INNER JOIN clause and with to the query using the Countries relation
 *
 * @method     ChildExpertsQuery leftJoinExpertCryosphereMethods($relationAlias = null) Adds a LEFT JOIN clause to the query using the ExpertCryosphereMethods relation
 * @method     ChildExpertsQuery rightJoinExpertCryosphereMethods($relationAlias = null) Adds a RIGHT JOIN clause to the query using the ExpertCryosphereMethods relation
 * @method     ChildExpertsQuery innerJoinExpertCryosphereMethods($relationAlias = null) Adds a INNER JOIN clause to the query using the ExpertCryosphereMethods relation
 *
 * @method     ChildExpertsQuery joinWithExpertCryosphereMethods($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the ExpertCryosphereMethods relation
 *
 * @method     ChildExpertsQuery leftJoinWithExpertCryosphereMethods() Adds a LEFT JOIN clause and with to the query using the ExpertCryosphereMethods relation
 * @method     ChildExpertsQuery rightJoinWithExpertCryosphereMethods() Adds a RIGHT JOIN clause and with to the query using the ExpertCryosphereMethods relation
 * @method     ChildExpertsQuery innerJoinWithExpertCryosphereMethods() Adds a INNER JOIN clause and with to the query using the ExpertCryosphereMethods relation
 *
 * @method     ChildExpertsQuery leftJoinExpertPrimaryAffiliation($relationAlias = null) Adds a LEFT JOIN clause to the query using the ExpertPrimaryAffiliation relation
 * @method     ChildExpertsQuery rightJoinExpertPrimaryAffiliation($relationAlias = null) Adds a RIGHT JOIN clause to the query using the ExpertPrimaryAffiliation relation
 * @method     ChildExpertsQuery innerJoinExpertPrimaryAffiliation($relationAlias = null) Adds a INNER JOIN clause to the query using the ExpertPrimaryAffiliation relation
 *
 * @method     ChildExpertsQuery joinWithExpertPrimaryAffiliation($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the ExpertPrimaryAffiliation relation
 *
 * @method     ChildExpertsQuery leftJoinWithExpertPrimaryAffiliation() Adds a LEFT JOIN clause and with to the query using the ExpertPrimaryAffiliation relation
 * @method     ChildExpertsQuery rightJoinWithExpertPrimaryAffiliation() Adds a RIGHT JOIN clause and with to the query using the ExpertPrimaryAffiliation relation
 * @method     ChildExpertsQuery innerJoinWithExpertPrimaryAffiliation() Adds a INNER JOIN clause and with to the query using the ExpertPrimaryAffiliation relation
 *
 * @method     ChildExpertsQuery leftJoinExpertSecondaryAffiliation($relationAlias = null) Adds a LEFT JOIN clause to the query using the ExpertSecondaryAffiliation relation
 * @method     ChildExpertsQuery rightJoinExpertSecondaryAffiliation($relationAlias = null) Adds a RIGHT JOIN clause to the query using the ExpertSecondaryAffiliation relation
 * @method     ChildExpertsQuery innerJoinExpertSecondaryAffiliation($relationAlias = null) Adds a INNER JOIN clause to the query using the ExpertSecondaryAffiliation relation
 *
 * @method     ChildExpertsQuery joinWithExpertSecondaryAffiliation($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the ExpertSecondaryAffiliation relation
 *
 * @method     ChildExpertsQuery leftJoinWithExpertSecondaryAffiliation() Adds a LEFT JOIN clause and with to the query using the ExpertSecondaryAffiliation relation
 * @method     ChildExpertsQuery rightJoinWithExpertSecondaryAffiliation() Adds a RIGHT JOIN clause and with to the query using the ExpertSecondaryAffiliation relation
 * @method     ChildExpertsQuery innerJoinWithExpertSecondaryAffiliation() Adds a INNER JOIN clause and with to the query using the ExpertSecondaryAffiliation relation
 *
 * @method     ChildExpertsQuery leftJoinExpertCareerStage($relationAlias = null) Adds a LEFT JOIN clause to the query using the ExpertCareerStage relation
 * @method     ChildExpertsQuery rightJoinExpertCareerStage($relationAlias = null) Adds a RIGHT JOIN clause to the query using the ExpertCareerStage relation
 * @method     ChildExpertsQuery innerJoinExpertCareerStage($relationAlias = null) Adds a INNER JOIN clause to the query using the ExpertCareerStage relation
 *
 * @method     ChildExpertsQuery joinWithExpertCareerStage($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the ExpertCareerStage relation
 *
 * @method     ChildExpertsQuery leftJoinWithExpertCareerStage() Adds a LEFT JOIN clause and with to the query using the ExpertCareerStage relation
 * @method     ChildExpertsQuery rightJoinWithExpertCareerStage() Adds a RIGHT JOIN clause and with to the query using the ExpertCareerStage relation
 * @method     ChildExpertsQuery innerJoinWithExpertCareerStage() Adds a INNER JOIN clause and with to the query using the ExpertCareerStage relation
 *
 * @method     ChildExpertsQuery leftJoinExpertContact($relationAlias = null) Adds a LEFT JOIN clause to the query using the ExpertContact relation
 * @method     ChildExpertsQuery rightJoinExpertContact($relationAlias = null) Adds a RIGHT JOIN clause to the query using the ExpertContact relation
 * @method     ChildExpertsQuery innerJoinExpertContact($relationAlias = null) Adds a INNER JOIN clause to the query using the ExpertContact relation
 *
 * @method     ChildExpertsQuery joinWithExpertContact($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the ExpertContact relation
 *
 * @method     ChildExpertsQuery leftJoinWithExpertContact() Adds a LEFT JOIN clause and with to the query using the ExpertContact relation
 * @method     ChildExpertsQuery rightJoinWithExpertContact() Adds a RIGHT JOIN clause and with to the query using the ExpertContact relation
 * @method     ChildExpertsQuery innerJoinWithExpertContact() Adds a INNER JOIN clause and with to the query using the ExpertContact relation
 *
 * @method     ChildExpertsQuery leftJoinExpertCryosphereWhat($relationAlias = null) Adds a LEFT JOIN clause to the query using the ExpertCryosphereWhat relation
 * @method     ChildExpertsQuery rightJoinExpertCryosphereWhat($relationAlias = null) Adds a RIGHT JOIN clause to the query using the ExpertCryosphereWhat relation
 * @method     ChildExpertsQuery innerJoinExpertCryosphereWhat($relationAlias = null) Adds a INNER JOIN clause to the query using the ExpertCryosphereWhat relation
 *
 * @method     ChildExpertsQuery joinWithExpertCryosphereWhat($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the ExpertCryosphereWhat relation
 *
 * @method     ChildExpertsQuery leftJoinWithExpertCryosphereWhat() Adds a LEFT JOIN clause and with to the query using the ExpertCryosphereWhat relation
 * @method     ChildExpertsQuery rightJoinWithExpertCryosphereWhat() Adds a RIGHT JOIN clause and with to the query using the ExpertCryosphereWhat relation
 * @method     ChildExpertsQuery innerJoinWithExpertCryosphereWhat() Adds a INNER JOIN clause and with to the query using the ExpertCryosphereWhat relation
 *
 * @method     ChildExpertsQuery leftJoinExpertCryosphereWhatSpecefic($relationAlias = null) Adds a LEFT JOIN clause to the query using the ExpertCryosphereWhatSpecefic relation
 * @method     ChildExpertsQuery rightJoinExpertCryosphereWhatSpecefic($relationAlias = null) Adds a RIGHT JOIN clause to the query using the ExpertCryosphereWhatSpecefic relation
 * @method     ChildExpertsQuery innerJoinExpertCryosphereWhatSpecefic($relationAlias = null) Adds a INNER JOIN clause to the query using the ExpertCryosphereWhatSpecefic relation
 *
 * @method     ChildExpertsQuery joinWithExpertCryosphereWhatSpecefic($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the ExpertCryosphereWhatSpecefic relation
 *
 * @method     ChildExpertsQuery leftJoinWithExpertCryosphereWhatSpecefic() Adds a LEFT JOIN clause and with to the query using the ExpertCryosphereWhatSpecefic relation
 * @method     ChildExpertsQuery rightJoinWithExpertCryosphereWhatSpecefic() Adds a RIGHT JOIN clause and with to the query using the ExpertCryosphereWhatSpecefic relation
 * @method     ChildExpertsQuery innerJoinWithExpertCryosphereWhatSpecefic() Adds a INNER JOIN clause and with to the query using the ExpertCryosphereWhatSpecefic relation
 *
 * @method     ChildExpertsQuery leftJoinExpertFieldWork($relationAlias = null) Adds a LEFT JOIN clause to the query using the ExpertFieldWork relation
 * @method     ChildExpertsQuery rightJoinExpertFieldWork($relationAlias = null) Adds a RIGHT JOIN clause to the query using the ExpertFieldWork relation
 * @method     ChildExpertsQuery innerJoinExpertFieldWork($relationAlias = null) Adds a INNER JOIN clause to the query using the ExpertFieldWork relation
 *
 * @method     ChildExpertsQuery joinWithExpertFieldWork($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the ExpertFieldWork relation
 *
 * @method     ChildExpertsQuery leftJoinWithExpertFieldWork() Adds a LEFT JOIN clause and with to the query using the ExpertFieldWork relation
 * @method     ChildExpertsQuery rightJoinWithExpertFieldWork() Adds a RIGHT JOIN clause and with to the query using the ExpertFieldWork relation
 * @method     ChildExpertsQuery innerJoinWithExpertFieldWork() Adds a INNER JOIN clause and with to the query using the ExpertFieldWork relation
 *
 * @method     ChildExpertsQuery leftJoinExpertLanguages($relationAlias = null) Adds a LEFT JOIN clause to the query using the ExpertLanguages relation
 * @method     ChildExpertsQuery rightJoinExpertLanguages($relationAlias = null) Adds a RIGHT JOIN clause to the query using the ExpertLanguages relation
 * @method     ChildExpertsQuery innerJoinExpertLanguages($relationAlias = null) Adds a INNER JOIN clause to the query using the ExpertLanguages relation
 *
 * @method     ChildExpertsQuery joinWithExpertLanguages($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the ExpertLanguages relation
 *
 * @method     ChildExpertsQuery leftJoinWithExpertLanguages() Adds a LEFT JOIN clause and with to the query using the ExpertLanguages relation
 * @method     ChildExpertsQuery rightJoinWithExpertLanguages() Adds a RIGHT JOIN clause and with to the query using the ExpertLanguages relation
 * @method     ChildExpertsQuery innerJoinWithExpertLanguages() Adds a INNER JOIN clause and with to the query using the ExpertLanguages relation
 *
 * @method     ChildExpertsQuery leftJoinExpertCryosphereWhen($relationAlias = null) Adds a LEFT JOIN clause to the query using the ExpertCryosphereWhen relation
 * @method     ChildExpertsQuery rightJoinExpertCryosphereWhen($relationAlias = null) Adds a RIGHT JOIN clause to the query using the ExpertCryosphereWhen relation
 * @method     ChildExpertsQuery innerJoinExpertCryosphereWhen($relationAlias = null) Adds a INNER JOIN clause to the query using the ExpertCryosphereWhen relation
 *
 * @method     ChildExpertsQuery joinWithExpertCryosphereWhen($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the ExpertCryosphereWhen relation
 *
 * @method     ChildExpertsQuery leftJoinWithExpertCryosphereWhen() Adds a LEFT JOIN clause and with to the query using the ExpertCryosphereWhen relation
 * @method     ChildExpertsQuery rightJoinWithExpertCryosphereWhen() Adds a RIGHT JOIN clause and with to the query using the ExpertCryosphereWhen relation
 * @method     ChildExpertsQuery innerJoinWithExpertCryosphereWhen() Adds a INNER JOIN clause and with to the query using the ExpertCryosphereWhen relation
 *
 * @method     ChildExpertsQuery leftJoinExpertCryosphereWhere($relationAlias = null) Adds a LEFT JOIN clause to the query using the ExpertCryosphereWhere relation
 * @method     ChildExpertsQuery rightJoinExpertCryosphereWhere($relationAlias = null) Adds a RIGHT JOIN clause to the query using the ExpertCryosphereWhere relation
 * @method     ChildExpertsQuery innerJoinExpertCryosphereWhere($relationAlias = null) Adds a INNER JOIN clause to the query using the ExpertCryosphereWhere relation
 *
 * @method     ChildExpertsQuery joinWithExpertCryosphereWhere($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the ExpertCryosphereWhere relation
 *
 * @method     ChildExpertsQuery leftJoinWithExpertCryosphereWhere() Adds a LEFT JOIN clause and with to the query using the ExpertCryosphereWhere relation
 * @method     ChildExpertsQuery rightJoinWithExpertCryosphereWhere() Adds a RIGHT JOIN clause and with to the query using the ExpertCryosphereWhere relation
 * @method     ChildExpertsQuery innerJoinWithExpertCryosphereWhere() Adds a INNER JOIN clause and with to the query using the ExpertCryosphereWhere relation
 *
 * @method     \CryoConnectDB\CountriesQuery|\CryoConnectDB\ExpertCryosphereMethodsQuery|\CryoConnectDB\ExpertPrimaryAffiliationQuery|\CryoConnectDB\ExpertSecondaryAffiliationQuery|\CryoConnectDB\ExpertCareerStageQuery|\CryoConnectDB\ExpertContactQuery|\CryoConnectDB\ExpertCryosphereWhatQuery|\CryoConnectDB\ExpertCryosphereWhatSpeceficQuery|\CryoConnectDB\ExpertFieldWorkQuery|\CryoConnectDB\ExpertLanguagesQuery|\CryoConnectDB\ExpertCryosphereWhenQuery|\CryoConnectDB\ExpertCryosphereWhereQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildExperts findOne(ConnectionInterface $con = null) Return the first ChildExperts matching the query
 * @method     ChildExperts findOneOrCreate(ConnectionInterface $con = null) Return the first ChildExperts matching the query, or a new ChildExperts object populated from the query conditions when no match is found
 *
 * @method     ChildExperts findOneById(int $id) Return the first ChildExperts filtered by the id column
 * @method     ChildExperts findOneByFirstName(string $first_name) Return the first ChildExperts filtered by the first_name column
 * @method     ChildExperts findOneByLastName(string $last_name) Return the first ChildExperts filtered by the last_name column
 * @method     ChildExperts findOneByEmail(string $email) Return the first ChildExperts filtered by the email column
 * @method     ChildExperts findOneByBirthYear(int $birth_year) Return the first ChildExperts filtered by the birth_year column
 * @method     ChildExperts findOneByCountryCode(string $country_code) Return the first ChildExperts filtered by the country_code column
 * @method     ChildExperts findOneByApproved(boolean $approved) Return the first ChildExperts filtered by the approved column
 * @method     ChildExperts findOneByCreatedAt(string $created_at) Return the first ChildExperts filtered by the created_at column *

 * @method     ChildExperts requirePk($key, ConnectionInterface $con = null) Return the ChildExperts by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildExperts requireOne(ConnectionInterface $con = null) Return the first ChildExperts matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildExperts requireOneById(int $id) Return the first ChildExperts filtered by the id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildExperts requireOneByFirstName(string $first_name) Return the first ChildExperts filtered by the first_name column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildExperts requireOneByLastName(string $last_name) Return the first ChildExperts filtered by the last_name column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildExperts requireOneByEmail(string $email) Return the first ChildExperts filtered by the email column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildExperts requireOneByBirthYear(int $birth_year) Return the first ChildExperts filtered by the birth_year column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildExperts requireOneByCountryCode(string $country_code) Return the first ChildExperts filtered by the country_code column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildExperts requireOneByApproved(boolean $approved) Return the first ChildExperts filtered by the approved column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildExperts requireOneByCreatedAt(string $created_at) Return the first ChildExperts filtered by the created_at column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildExperts[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildExperts objects based on current ModelCriteria
 * @method     ChildExperts[]|ObjectCollection findById(int $id) Return ChildExperts objects filtered by the id column
 * @method     ChildExperts[]|ObjectCollection findByFirstName(string $first_name) Return ChildExperts objects filtered by the first_name column
 * @method     ChildExperts[]|ObjectCollection findByLastName(string $last_name) Return ChildExperts objects filtered by the last_name column
 * @method     ChildExperts[]|ObjectCollection findByEmail(string $email) Return ChildExperts objects filtered by the email column
 * @method     ChildExperts[]|ObjectCollection findByBirthYear(int $birth_year) Return ChildExperts objects filtered by the birth_year column
 * @method     ChildExperts[]|ObjectCollection findByCountryCode(string $country_code) Return ChildExperts objects filtered by the country_code column
 * @method     ChildExperts[]|ObjectCollection findByApproved(boolean $approved) Return ChildExperts objects filtered by the approved column
 * @method     ChildExperts[]|ObjectCollection findByCreatedAt(string $created_at) Return ChildExperts objects filtered by the created_at column
 * @method     ChildExperts[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class ExpertsQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \CryoConnectDB\Base\ExpertsQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'cryo_connect', $modelName = '\\CryoConnectDB\\Experts', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildExpertsQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildExpertsQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildExpertsQuery) {
            return $criteria;
        }
        $query = new ChildExpertsQuery();
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
     * @return ChildExperts|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(ExpertsTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = ExpertsTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildExperts A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT id, first_name, last_name, email, birth_year, country_code, approved, created_at FROM experts WHERE id = :p0';
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
            /** @var ChildExperts $obj */
            $obj = new ChildExperts();
            $obj->hydrate($row);
            ExpertsTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildExperts|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildExpertsQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(ExpertsTableMap::COL_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildExpertsQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(ExpertsTableMap::COL_ID, $keys, Criteria::IN);
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
     * @return $this|ChildExpertsQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(ExpertsTableMap::COL_ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(ExpertsTableMap::COL_ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ExpertsTableMap::COL_ID, $id, $comparison);
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
     * @return $this|ChildExpertsQuery The current query, for fluid interface
     */
    public function filterByFirstName($firstName = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($firstName)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ExpertsTableMap::COL_FIRST_NAME, $firstName, $comparison);
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
     * @return $this|ChildExpertsQuery The current query, for fluid interface
     */
    public function filterByLastName($lastName = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($lastName)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ExpertsTableMap::COL_LAST_NAME, $lastName, $comparison);
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
     * @return $this|ChildExpertsQuery The current query, for fluid interface
     */
    public function filterByEmail($email = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($email)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ExpertsTableMap::COL_EMAIL, $email, $comparison);
    }

    /**
     * Filter the query on the birth_year column
     *
     * Example usage:
     * <code>
     * $query->filterByBirthYear(1234); // WHERE birth_year = 1234
     * $query->filterByBirthYear(array(12, 34)); // WHERE birth_year IN (12, 34)
     * $query->filterByBirthYear(array('min' => 12)); // WHERE birth_year > 12
     * </code>
     *
     * @param     mixed $birthYear The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildExpertsQuery The current query, for fluid interface
     */
    public function filterByBirthYear($birthYear = null, $comparison = null)
    {
        if (is_array($birthYear)) {
            $useMinMax = false;
            if (isset($birthYear['min'])) {
                $this->addUsingAlias(ExpertsTableMap::COL_BIRTH_YEAR, $birthYear['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($birthYear['max'])) {
                $this->addUsingAlias(ExpertsTableMap::COL_BIRTH_YEAR, $birthYear['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ExpertsTableMap::COL_BIRTH_YEAR, $birthYear, $comparison);
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
     * @return $this|ChildExpertsQuery The current query, for fluid interface
     */
    public function filterByCountryCode($countryCode = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($countryCode)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ExpertsTableMap::COL_COUNTRY_CODE, $countryCode, $comparison);
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
     * @return $this|ChildExpertsQuery The current query, for fluid interface
     */
    public function filterByApproved($approved = null, $comparison = null)
    {
        if (is_string($approved)) {
            $approved = in_array(strtolower($approved), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(ExpertsTableMap::COL_APPROVED, $approved, $comparison);
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
     * @return $this|ChildExpertsQuery The current query, for fluid interface
     */
    public function filterByCreatedAt($createdAt = null, $comparison = null)
    {
        if (is_array($createdAt)) {
            $useMinMax = false;
            if (isset($createdAt['min'])) {
                $this->addUsingAlias(ExpertsTableMap::COL_CREATED_AT, $createdAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createdAt['max'])) {
                $this->addUsingAlias(ExpertsTableMap::COL_CREATED_AT, $createdAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ExpertsTableMap::COL_CREATED_AT, $createdAt, $comparison);
    }

    /**
     * Filter the query by a related \CryoConnectDB\Countries object
     *
     * @param \CryoConnectDB\Countries|ObjectCollection $countries The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildExpertsQuery The current query, for fluid interface
     */
    public function filterByCountries($countries, $comparison = null)
    {
        if ($countries instanceof \CryoConnectDB\Countries) {
            return $this
                ->addUsingAlias(ExpertsTableMap::COL_COUNTRY_CODE, $countries->getCountryCode(), $comparison);
        } elseif ($countries instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(ExpertsTableMap::COL_COUNTRY_CODE, $countries->toKeyValue('PrimaryKey', 'CountryCode'), $comparison);
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
     * @return $this|ChildExpertsQuery The current query, for fluid interface
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
     * Filter the query by a related \CryoConnectDB\ExpertCryosphereMethods object
     *
     * @param \CryoConnectDB\ExpertCryosphereMethods|ObjectCollection $expertCryosphereMethods the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildExpertsQuery The current query, for fluid interface
     */
    public function filterByExpertCryosphereMethods($expertCryosphereMethods, $comparison = null)
    {
        if ($expertCryosphereMethods instanceof \CryoConnectDB\ExpertCryosphereMethods) {
            return $this
                ->addUsingAlias(ExpertsTableMap::COL_ID, $expertCryosphereMethods->getExpertId(), $comparison);
        } elseif ($expertCryosphereMethods instanceof ObjectCollection) {
            return $this
                ->useExpertCryosphereMethodsQuery()
                ->filterByPrimaryKeys($expertCryosphereMethods->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByExpertCryosphereMethods() only accepts arguments of type \CryoConnectDB\ExpertCryosphereMethods or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the ExpertCryosphereMethods relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildExpertsQuery The current query, for fluid interface
     */
    public function joinExpertCryosphereMethods($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('ExpertCryosphereMethods');

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
            $this->addJoinObject($join, 'ExpertCryosphereMethods');
        }

        return $this;
    }

    /**
     * Use the ExpertCryosphereMethods relation ExpertCryosphereMethods object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \CryoConnectDB\ExpertCryosphereMethodsQuery A secondary query class using the current class as primary query
     */
    public function useExpertCryosphereMethodsQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinExpertCryosphereMethods($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'ExpertCryosphereMethods', '\CryoConnectDB\ExpertCryosphereMethodsQuery');
    }

    /**
     * Filter the query by a related \CryoConnectDB\ExpertPrimaryAffiliation object
     *
     * @param \CryoConnectDB\ExpertPrimaryAffiliation|ObjectCollection $expertPrimaryAffiliation the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildExpertsQuery The current query, for fluid interface
     */
    public function filterByExpertPrimaryAffiliation($expertPrimaryAffiliation, $comparison = null)
    {
        if ($expertPrimaryAffiliation instanceof \CryoConnectDB\ExpertPrimaryAffiliation) {
            return $this
                ->addUsingAlias(ExpertsTableMap::COL_ID, $expertPrimaryAffiliation->getExpertId(), $comparison);
        } elseif ($expertPrimaryAffiliation instanceof ObjectCollection) {
            return $this
                ->useExpertPrimaryAffiliationQuery()
                ->filterByPrimaryKeys($expertPrimaryAffiliation->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByExpertPrimaryAffiliation() only accepts arguments of type \CryoConnectDB\ExpertPrimaryAffiliation or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the ExpertPrimaryAffiliation relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildExpertsQuery The current query, for fluid interface
     */
    public function joinExpertPrimaryAffiliation($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('ExpertPrimaryAffiliation');

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
            $this->addJoinObject($join, 'ExpertPrimaryAffiliation');
        }

        return $this;
    }

    /**
     * Use the ExpertPrimaryAffiliation relation ExpertPrimaryAffiliation object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \CryoConnectDB\ExpertPrimaryAffiliationQuery A secondary query class using the current class as primary query
     */
    public function useExpertPrimaryAffiliationQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinExpertPrimaryAffiliation($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'ExpertPrimaryAffiliation', '\CryoConnectDB\ExpertPrimaryAffiliationQuery');
    }

    /**
     * Filter the query by a related \CryoConnectDB\ExpertSecondaryAffiliation object
     *
     * @param \CryoConnectDB\ExpertSecondaryAffiliation|ObjectCollection $expertSecondaryAffiliation the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildExpertsQuery The current query, for fluid interface
     */
    public function filterByExpertSecondaryAffiliation($expertSecondaryAffiliation, $comparison = null)
    {
        if ($expertSecondaryAffiliation instanceof \CryoConnectDB\ExpertSecondaryAffiliation) {
            return $this
                ->addUsingAlias(ExpertsTableMap::COL_ID, $expertSecondaryAffiliation->getExpertId(), $comparison);
        } elseif ($expertSecondaryAffiliation instanceof ObjectCollection) {
            return $this
                ->useExpertSecondaryAffiliationQuery()
                ->filterByPrimaryKeys($expertSecondaryAffiliation->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByExpertSecondaryAffiliation() only accepts arguments of type \CryoConnectDB\ExpertSecondaryAffiliation or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the ExpertSecondaryAffiliation relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildExpertsQuery The current query, for fluid interface
     */
    public function joinExpertSecondaryAffiliation($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('ExpertSecondaryAffiliation');

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
            $this->addJoinObject($join, 'ExpertSecondaryAffiliation');
        }

        return $this;
    }

    /**
     * Use the ExpertSecondaryAffiliation relation ExpertSecondaryAffiliation object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \CryoConnectDB\ExpertSecondaryAffiliationQuery A secondary query class using the current class as primary query
     */
    public function useExpertSecondaryAffiliationQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinExpertSecondaryAffiliation($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'ExpertSecondaryAffiliation', '\CryoConnectDB\ExpertSecondaryAffiliationQuery');
    }

    /**
     * Filter the query by a related \CryoConnectDB\ExpertCareerStage object
     *
     * @param \CryoConnectDB\ExpertCareerStage|ObjectCollection $expertCareerStage the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildExpertsQuery The current query, for fluid interface
     */
    public function filterByExpertCareerStage($expertCareerStage, $comparison = null)
    {
        if ($expertCareerStage instanceof \CryoConnectDB\ExpertCareerStage) {
            return $this
                ->addUsingAlias(ExpertsTableMap::COL_ID, $expertCareerStage->getExpertId(), $comparison);
        } elseif ($expertCareerStage instanceof ObjectCollection) {
            return $this
                ->useExpertCareerStageQuery()
                ->filterByPrimaryKeys($expertCareerStage->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByExpertCareerStage() only accepts arguments of type \CryoConnectDB\ExpertCareerStage or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the ExpertCareerStage relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildExpertsQuery The current query, for fluid interface
     */
    public function joinExpertCareerStage($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('ExpertCareerStage');

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
            $this->addJoinObject($join, 'ExpertCareerStage');
        }

        return $this;
    }

    /**
     * Use the ExpertCareerStage relation ExpertCareerStage object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \CryoConnectDB\ExpertCareerStageQuery A secondary query class using the current class as primary query
     */
    public function useExpertCareerStageQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinExpertCareerStage($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'ExpertCareerStage', '\CryoConnectDB\ExpertCareerStageQuery');
    }

    /**
     * Filter the query by a related \CryoConnectDB\ExpertContact object
     *
     * @param \CryoConnectDB\ExpertContact|ObjectCollection $expertContact the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildExpertsQuery The current query, for fluid interface
     */
    public function filterByExpertContact($expertContact, $comparison = null)
    {
        if ($expertContact instanceof \CryoConnectDB\ExpertContact) {
            return $this
                ->addUsingAlias(ExpertsTableMap::COL_ID, $expertContact->getExpertId(), $comparison);
        } elseif ($expertContact instanceof ObjectCollection) {
            return $this
                ->useExpertContactQuery()
                ->filterByPrimaryKeys($expertContact->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByExpertContact() only accepts arguments of type \CryoConnectDB\ExpertContact or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the ExpertContact relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildExpertsQuery The current query, for fluid interface
     */
    public function joinExpertContact($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('ExpertContact');

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
            $this->addJoinObject($join, 'ExpertContact');
        }

        return $this;
    }

    /**
     * Use the ExpertContact relation ExpertContact object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \CryoConnectDB\ExpertContactQuery A secondary query class using the current class as primary query
     */
    public function useExpertContactQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinExpertContact($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'ExpertContact', '\CryoConnectDB\ExpertContactQuery');
    }

    /**
     * Filter the query by a related \CryoConnectDB\ExpertCryosphereWhat object
     *
     * @param \CryoConnectDB\ExpertCryosphereWhat|ObjectCollection $expertCryosphereWhat the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildExpertsQuery The current query, for fluid interface
     */
    public function filterByExpertCryosphereWhat($expertCryosphereWhat, $comparison = null)
    {
        if ($expertCryosphereWhat instanceof \CryoConnectDB\ExpertCryosphereWhat) {
            return $this
                ->addUsingAlias(ExpertsTableMap::COL_ID, $expertCryosphereWhat->getExpertId(), $comparison);
        } elseif ($expertCryosphereWhat instanceof ObjectCollection) {
            return $this
                ->useExpertCryosphereWhatQuery()
                ->filterByPrimaryKeys($expertCryosphereWhat->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByExpertCryosphereWhat() only accepts arguments of type \CryoConnectDB\ExpertCryosphereWhat or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the ExpertCryosphereWhat relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildExpertsQuery The current query, for fluid interface
     */
    public function joinExpertCryosphereWhat($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('ExpertCryosphereWhat');

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
            $this->addJoinObject($join, 'ExpertCryosphereWhat');
        }

        return $this;
    }

    /**
     * Use the ExpertCryosphereWhat relation ExpertCryosphereWhat object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \CryoConnectDB\ExpertCryosphereWhatQuery A secondary query class using the current class as primary query
     */
    public function useExpertCryosphereWhatQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinExpertCryosphereWhat($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'ExpertCryosphereWhat', '\CryoConnectDB\ExpertCryosphereWhatQuery');
    }

    /**
     * Filter the query by a related \CryoConnectDB\ExpertCryosphereWhatSpecefic object
     *
     * @param \CryoConnectDB\ExpertCryosphereWhatSpecefic|ObjectCollection $expertCryosphereWhatSpecefic the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildExpertsQuery The current query, for fluid interface
     */
    public function filterByExpertCryosphereWhatSpecefic($expertCryosphereWhatSpecefic, $comparison = null)
    {
        if ($expertCryosphereWhatSpecefic instanceof \CryoConnectDB\ExpertCryosphereWhatSpecefic) {
            return $this
                ->addUsingAlias(ExpertsTableMap::COL_ID, $expertCryosphereWhatSpecefic->getExpertId(), $comparison);
        } elseif ($expertCryosphereWhatSpecefic instanceof ObjectCollection) {
            return $this
                ->useExpertCryosphereWhatSpeceficQuery()
                ->filterByPrimaryKeys($expertCryosphereWhatSpecefic->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByExpertCryosphereWhatSpecefic() only accepts arguments of type \CryoConnectDB\ExpertCryosphereWhatSpecefic or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the ExpertCryosphereWhatSpecefic relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildExpertsQuery The current query, for fluid interface
     */
    public function joinExpertCryosphereWhatSpecefic($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('ExpertCryosphereWhatSpecefic');

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
            $this->addJoinObject($join, 'ExpertCryosphereWhatSpecefic');
        }

        return $this;
    }

    /**
     * Use the ExpertCryosphereWhatSpecefic relation ExpertCryosphereWhatSpecefic object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \CryoConnectDB\ExpertCryosphereWhatSpeceficQuery A secondary query class using the current class as primary query
     */
    public function useExpertCryosphereWhatSpeceficQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinExpertCryosphereWhatSpecefic($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'ExpertCryosphereWhatSpecefic', '\CryoConnectDB\ExpertCryosphereWhatSpeceficQuery');
    }

    /**
     * Filter the query by a related \CryoConnectDB\ExpertFieldWork object
     *
     * @param \CryoConnectDB\ExpertFieldWork|ObjectCollection $expertFieldWork the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildExpertsQuery The current query, for fluid interface
     */
    public function filterByExpertFieldWork($expertFieldWork, $comparison = null)
    {
        if ($expertFieldWork instanceof \CryoConnectDB\ExpertFieldWork) {
            return $this
                ->addUsingAlias(ExpertsTableMap::COL_ID, $expertFieldWork->getExpertId(), $comparison);
        } elseif ($expertFieldWork instanceof ObjectCollection) {
            return $this
                ->useExpertFieldWorkQuery()
                ->filterByPrimaryKeys($expertFieldWork->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByExpertFieldWork() only accepts arguments of type \CryoConnectDB\ExpertFieldWork or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the ExpertFieldWork relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildExpertsQuery The current query, for fluid interface
     */
    public function joinExpertFieldWork($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('ExpertFieldWork');

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
            $this->addJoinObject($join, 'ExpertFieldWork');
        }

        return $this;
    }

    /**
     * Use the ExpertFieldWork relation ExpertFieldWork object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \CryoConnectDB\ExpertFieldWorkQuery A secondary query class using the current class as primary query
     */
    public function useExpertFieldWorkQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinExpertFieldWork($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'ExpertFieldWork', '\CryoConnectDB\ExpertFieldWorkQuery');
    }

    /**
     * Filter the query by a related \CryoConnectDB\ExpertLanguages object
     *
     * @param \CryoConnectDB\ExpertLanguages|ObjectCollection $expertLanguages the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildExpertsQuery The current query, for fluid interface
     */
    public function filterByExpertLanguages($expertLanguages, $comparison = null)
    {
        if ($expertLanguages instanceof \CryoConnectDB\ExpertLanguages) {
            return $this
                ->addUsingAlias(ExpertsTableMap::COL_ID, $expertLanguages->getExpertId(), $comparison);
        } elseif ($expertLanguages instanceof ObjectCollection) {
            return $this
                ->useExpertLanguagesQuery()
                ->filterByPrimaryKeys($expertLanguages->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByExpertLanguages() only accepts arguments of type \CryoConnectDB\ExpertLanguages or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the ExpertLanguages relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildExpertsQuery The current query, for fluid interface
     */
    public function joinExpertLanguages($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('ExpertLanguages');

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
            $this->addJoinObject($join, 'ExpertLanguages');
        }

        return $this;
    }

    /**
     * Use the ExpertLanguages relation ExpertLanguages object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \CryoConnectDB\ExpertLanguagesQuery A secondary query class using the current class as primary query
     */
    public function useExpertLanguagesQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinExpertLanguages($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'ExpertLanguages', '\CryoConnectDB\ExpertLanguagesQuery');
    }

    /**
     * Filter the query by a related \CryoConnectDB\ExpertCryosphereWhen object
     *
     * @param \CryoConnectDB\ExpertCryosphereWhen|ObjectCollection $expertCryosphereWhen the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildExpertsQuery The current query, for fluid interface
     */
    public function filterByExpertCryosphereWhen($expertCryosphereWhen, $comparison = null)
    {
        if ($expertCryosphereWhen instanceof \CryoConnectDB\ExpertCryosphereWhen) {
            return $this
                ->addUsingAlias(ExpertsTableMap::COL_ID, $expertCryosphereWhen->getExpertId(), $comparison);
        } elseif ($expertCryosphereWhen instanceof ObjectCollection) {
            return $this
                ->useExpertCryosphereWhenQuery()
                ->filterByPrimaryKeys($expertCryosphereWhen->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByExpertCryosphereWhen() only accepts arguments of type \CryoConnectDB\ExpertCryosphereWhen or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the ExpertCryosphereWhen relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildExpertsQuery The current query, for fluid interface
     */
    public function joinExpertCryosphereWhen($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('ExpertCryosphereWhen');

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
            $this->addJoinObject($join, 'ExpertCryosphereWhen');
        }

        return $this;
    }

    /**
     * Use the ExpertCryosphereWhen relation ExpertCryosphereWhen object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \CryoConnectDB\ExpertCryosphereWhenQuery A secondary query class using the current class as primary query
     */
    public function useExpertCryosphereWhenQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinExpertCryosphereWhen($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'ExpertCryosphereWhen', '\CryoConnectDB\ExpertCryosphereWhenQuery');
    }

    /**
     * Filter the query by a related \CryoConnectDB\ExpertCryosphereWhere object
     *
     * @param \CryoConnectDB\ExpertCryosphereWhere|ObjectCollection $expertCryosphereWhere the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildExpertsQuery The current query, for fluid interface
     */
    public function filterByExpertCryosphereWhere($expertCryosphereWhere, $comparison = null)
    {
        if ($expertCryosphereWhere instanceof \CryoConnectDB\ExpertCryosphereWhere) {
            return $this
                ->addUsingAlias(ExpertsTableMap::COL_ID, $expertCryosphereWhere->getExpertId(), $comparison);
        } elseif ($expertCryosphereWhere instanceof ObjectCollection) {
            return $this
                ->useExpertCryosphereWhereQuery()
                ->filterByPrimaryKeys($expertCryosphereWhere->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByExpertCryosphereWhere() only accepts arguments of type \CryoConnectDB\ExpertCryosphereWhere or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the ExpertCryosphereWhere relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildExpertsQuery The current query, for fluid interface
     */
    public function joinExpertCryosphereWhere($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('ExpertCryosphereWhere');

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
            $this->addJoinObject($join, 'ExpertCryosphereWhere');
        }

        return $this;
    }

    /**
     * Use the ExpertCryosphereWhere relation ExpertCryosphereWhere object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \CryoConnectDB\ExpertCryosphereWhereQuery A secondary query class using the current class as primary query
     */
    public function useExpertCryosphereWhereQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinExpertCryosphereWhere($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'ExpertCryosphereWhere', '\CryoConnectDB\ExpertCryosphereWhereQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ChildExperts $experts Object to remove from the list of results
     *
     * @return $this|ChildExpertsQuery The current query, for fluid interface
     */
    public function prune($experts = null)
    {
        if ($experts) {
            $this->addUsingAlias(ExpertsTableMap::COL_ID, $experts->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the experts table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(ExpertsTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            ExpertsTableMap::clearInstancePool();
            ExpertsTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(ExpertsTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(ExpertsTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            ExpertsTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            ExpertsTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // ExpertsQuery
