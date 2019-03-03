<?php

namespace CryoConnectDB\Base;

use \Exception;
use \PDO;
use CryoConnectDB\Fieldwork as ChildFieldwork;
use CryoConnectDB\FieldworkQuery as ChildFieldworkQuery;
use CryoConnectDB\Map\FieldworkTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'fieldwork' table.
 *
 *
 *
 * @method     ChildFieldworkQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ChildFieldworkQuery orderByFieldworkName($order = Criteria::ASC) Order by the fieldwork_project_name column
 * @method     ChildFieldworkQuery orderByFieldworkLeaderName($order = Criteria::ASC) Order by the fieldwork_leader_name column
 * @method     ChildFieldworkQuery orderByFieldworkLeaderAffiliation($order = Criteria::ASC) Order by the fieldwork_leader_affiliation column
 * @method     ChildFieldworkQuery orderByFieldworkLeaderWebsite($order = Criteria::ASC) Order by the fieldwork_leader_website column
 * @method     ChildFieldworkQuery orderByFieldworkLeaderEmail($order = Criteria::ASC) Order by the fieldwork_leader_email column
 * @method     ChildFieldworkQuery orderByFieldworkProjectWebsite($order = Criteria::ASC) Order by the fieldwork_project_website column
 * @method     ChildFieldworkQuery orderByCryosphereWhereId($order = Criteria::ASC) Order by the cryosphere_where_id column
 * @method     ChildFieldworkQuery orderByFieldworkLocations($order = Criteria::ASC) Order by the fieldwork_locations column
 * @method     ChildFieldworkQuery orderByFieldworkDuration($order = Criteria::ASC) Order by the fieldwork_duration column
 * @method     ChildFieldworkQuery orderByFieldworkStartDate($order = Criteria::ASC) Order by the fieldwork_start_date column
 * @method     ChildFieldworkQuery orderByFieldworkGoal($order = Criteria::ASC) Order by the fieldwork_goal column
 * @method     ChildFieldworkQuery orderByFieldworkInformationSeekerLimit($order = Criteria::ASC) Order by the fieldwork_information_seeker_limit column
 * @method     ChildFieldworkQuery orderByFieldworkInformationSeekerCost($order = Criteria::ASC) Order by the fieldwork_information_seeker_cost column
 * @method     ChildFieldworkQuery orderByFieldworkBidingAllowed($order = Criteria::ASC) Order by the fieldwork_biding_allowed column
 * @method     ChildFieldworkQuery orderByFieldworkInformationSeekerPackageIncluded($order = Criteria::ASC) Order by the fieldwork_information_seeker_package_included column
 * @method     ChildFieldworkQuery orderByFieldworkInformationSeekerPackageExcluded($order = Criteria::ASC) Order by the fieldwork_information_seeker_package_excluded column
 * @method     ChildFieldworkQuery orderByFieldworkIsCertain($order = Criteria::ASC) Order by the fieldwork_is_certain column
 * @method     ChildFieldworkQuery orderByFieldworkWhenCertain($order = Criteria::ASC) Order by the fieldwork_when_certain column
 * @method     ChildFieldworkQuery orderByFieldworkInformationSeekerAnnouncementDate($order = Criteria::ASC) Order by the field_information_seeker_announcement_date column
 * @method     ChildFieldworkQuery orderByFieldworkInformationSeekerDeadline($order = Criteria::ASC) Order by the field_information_seeker_deadline column
 * @method     ChildFieldworkQuery orderByApproved($order = Criteria::ASC) Order by the approved column
 * @method     ChildFieldworkQuery orderByTimestamp($order = Criteria::ASC) Order by the timestamp column
 *
 * @method     ChildFieldworkQuery groupById() Group by the id column
 * @method     ChildFieldworkQuery groupByFieldworkName() Group by the fieldwork_project_name column
 * @method     ChildFieldworkQuery groupByFieldworkLeaderName() Group by the fieldwork_leader_name column
 * @method     ChildFieldworkQuery groupByFieldworkLeaderAffiliation() Group by the fieldwork_leader_affiliation column
 * @method     ChildFieldworkQuery groupByFieldworkLeaderWebsite() Group by the fieldwork_leader_website column
 * @method     ChildFieldworkQuery groupByFieldworkLeaderEmail() Group by the fieldwork_leader_email column
 * @method     ChildFieldworkQuery groupByFieldworkProjectWebsite() Group by the fieldwork_project_website column
 * @method     ChildFieldworkQuery groupByCryosphereWhereId() Group by the cryosphere_where_id column
 * @method     ChildFieldworkQuery groupByFieldworkLocations() Group by the fieldwork_locations column
 * @method     ChildFieldworkQuery groupByFieldworkDuration() Group by the fieldwork_duration column
 * @method     ChildFieldworkQuery groupByFieldworkStartDate() Group by the fieldwork_start_date column
 * @method     ChildFieldworkQuery groupByFieldworkGoal() Group by the fieldwork_goal column
 * @method     ChildFieldworkQuery groupByFieldworkInformationSeekerLimit() Group by the fieldwork_information_seeker_limit column
 * @method     ChildFieldworkQuery groupByFieldworkInformationSeekerCost() Group by the fieldwork_information_seeker_cost column
 * @method     ChildFieldworkQuery groupByFieldworkBidingAllowed() Group by the fieldwork_biding_allowed column
 * @method     ChildFieldworkQuery groupByFieldworkInformationSeekerPackageIncluded() Group by the fieldwork_information_seeker_package_included column
 * @method     ChildFieldworkQuery groupByFieldworkInformationSeekerPackageExcluded() Group by the fieldwork_information_seeker_package_excluded column
 * @method     ChildFieldworkQuery groupByFieldworkIsCertain() Group by the fieldwork_is_certain column
 * @method     ChildFieldworkQuery groupByFieldworkWhenCertain() Group by the fieldwork_when_certain column
 * @method     ChildFieldworkQuery groupByFieldworkInformationSeekerAnnouncementDate() Group by the field_information_seeker_announcement_date column
 * @method     ChildFieldworkQuery groupByFieldworkInformationSeekerDeadline() Group by the field_information_seeker_deadline column
 * @method     ChildFieldworkQuery groupByApproved() Group by the approved column
 * @method     ChildFieldworkQuery groupByTimestamp() Group by the timestamp column
 *
 * @method     ChildFieldworkQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildFieldworkQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildFieldworkQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildFieldworkQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildFieldworkQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildFieldworkQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildFieldworkQuery leftJoinCryosphereWhere($relationAlias = null) Adds a LEFT JOIN clause to the query using the CryosphereWhere relation
 * @method     ChildFieldworkQuery rightJoinCryosphereWhere($relationAlias = null) Adds a RIGHT JOIN clause to the query using the CryosphereWhere relation
 * @method     ChildFieldworkQuery innerJoinCryosphereWhere($relationAlias = null) Adds a INNER JOIN clause to the query using the CryosphereWhere relation
 *
 * @method     ChildFieldworkQuery joinWithCryosphereWhere($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the CryosphereWhere relation
 *
 * @method     ChildFieldworkQuery leftJoinWithCryosphereWhere() Adds a LEFT JOIN clause and with to the query using the CryosphereWhere relation
 * @method     ChildFieldworkQuery rightJoinWithCryosphereWhere() Adds a RIGHT JOIN clause and with to the query using the CryosphereWhere relation
 * @method     ChildFieldworkQuery innerJoinWithCryosphereWhere() Adds a INNER JOIN clause and with to the query using the CryosphereWhere relation
 *
 * @method     ChildFieldworkQuery leftJoinFieldworkInformationSeekerRequest($relationAlias = null) Adds a LEFT JOIN clause to the query using the FieldworkInformationSeekerRequest relation
 * @method     ChildFieldworkQuery rightJoinFieldworkInformationSeekerRequest($relationAlias = null) Adds a RIGHT JOIN clause to the query using the FieldworkInformationSeekerRequest relation
 * @method     ChildFieldworkQuery innerJoinFieldworkInformationSeekerRequest($relationAlias = null) Adds a INNER JOIN clause to the query using the FieldworkInformationSeekerRequest relation
 *
 * @method     ChildFieldworkQuery joinWithFieldworkInformationSeekerRequest($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the FieldworkInformationSeekerRequest relation
 *
 * @method     ChildFieldworkQuery leftJoinWithFieldworkInformationSeekerRequest() Adds a LEFT JOIN clause and with to the query using the FieldworkInformationSeekerRequest relation
 * @method     ChildFieldworkQuery rightJoinWithFieldworkInformationSeekerRequest() Adds a RIGHT JOIN clause and with to the query using the FieldworkInformationSeekerRequest relation
 * @method     ChildFieldworkQuery innerJoinWithFieldworkInformationSeekerRequest() Adds a INNER JOIN clause and with to the query using the FieldworkInformationSeekerRequest relation
 *
 * @method     \CryoConnectDB\CryosphereWhereQuery|\CryoConnectDB\FieldworkInformationSeekerRequestQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildFieldwork findOne(ConnectionInterface $con = null) Return the first ChildFieldwork matching the query
 * @method     ChildFieldwork findOneOrCreate(ConnectionInterface $con = null) Return the first ChildFieldwork matching the query, or a new ChildFieldwork object populated from the query conditions when no match is found
 *
 * @method     ChildFieldwork findOneById(int $id) Return the first ChildFieldwork filtered by the id column
 * @method     ChildFieldwork findOneByFieldworkName(string $fieldwork_project_name) Return the first ChildFieldwork filtered by the fieldwork_project_name column
 * @method     ChildFieldwork findOneByFieldworkLeaderName(string $fieldwork_leader_name) Return the first ChildFieldwork filtered by the fieldwork_leader_name column
 * @method     ChildFieldwork findOneByFieldworkLeaderAffiliation(string $fieldwork_leader_affiliation) Return the first ChildFieldwork filtered by the fieldwork_leader_affiliation column
 * @method     ChildFieldwork findOneByFieldworkLeaderWebsite(string $fieldwork_leader_website) Return the first ChildFieldwork filtered by the fieldwork_leader_website column
 * @method     ChildFieldwork findOneByFieldworkLeaderEmail(string $fieldwork_leader_email) Return the first ChildFieldwork filtered by the fieldwork_leader_email column
 * @method     ChildFieldwork findOneByFieldworkProjectWebsite(string $fieldwork_project_website) Return the first ChildFieldwork filtered by the fieldwork_project_website column
 * @method     ChildFieldwork findOneByCryosphereWhereId(int $cryosphere_where_id) Return the first ChildFieldwork filtered by the cryosphere_where_id column
 * @method     ChildFieldwork findOneByFieldworkLocations(string $fieldwork_locations) Return the first ChildFieldwork filtered by the fieldwork_locations column
 * @method     ChildFieldwork findOneByFieldworkDuration(int $fieldwork_duration) Return the first ChildFieldwork filtered by the fieldwork_duration column
 * @method     ChildFieldwork findOneByFieldworkStartDate(string $fieldwork_start_date) Return the first ChildFieldwork filtered by the fieldwork_start_date column
 * @method     ChildFieldwork findOneByFieldworkGoal(string $fieldwork_goal) Return the first ChildFieldwork filtered by the fieldwork_goal column
 * @method     ChildFieldwork findOneByFieldworkInformationSeekerLimit(int $fieldwork_information_seeker_limit) Return the first ChildFieldwork filtered by the fieldwork_information_seeker_limit column
 * @method     ChildFieldwork findOneByFieldworkInformationSeekerCost(int $fieldwork_information_seeker_cost) Return the first ChildFieldwork filtered by the fieldwork_information_seeker_cost column
 * @method     ChildFieldwork findOneByFieldworkBidingAllowed(boolean $fieldwork_biding_allowed) Return the first ChildFieldwork filtered by the fieldwork_biding_allowed column
 * @method     ChildFieldwork findOneByFieldworkInformationSeekerPackageIncluded(string $fieldwork_information_seeker_package_included) Return the first ChildFieldwork filtered by the fieldwork_information_seeker_package_included column
 * @method     ChildFieldwork findOneByFieldworkInformationSeekerPackageExcluded(string $fieldwork_information_seeker_package_excluded) Return the first ChildFieldwork filtered by the fieldwork_information_seeker_package_excluded column
 * @method     ChildFieldwork findOneByFieldworkIsCertain(boolean $fieldwork_is_certain) Return the first ChildFieldwork filtered by the fieldwork_is_certain column
 * @method     ChildFieldwork findOneByFieldworkWhenCertain(string $fieldwork_when_certain) Return the first ChildFieldwork filtered by the fieldwork_when_certain column
 * @method     ChildFieldwork findOneByFieldworkInformationSeekerAnnouncementDate(string $field_information_seeker_announcement_date) Return the first ChildFieldwork filtered by the field_information_seeker_announcement_date column
 * @method     ChildFieldwork findOneByFieldworkInformationSeekerDeadline(string $field_information_seeker_deadline) Return the first ChildFieldwork filtered by the field_information_seeker_deadline column
 * @method     ChildFieldwork findOneByApproved(boolean $approved) Return the first ChildFieldwork filtered by the approved column
 * @method     ChildFieldwork findOneByTimestamp(string $timestamp) Return the first ChildFieldwork filtered by the timestamp column *

 * @method     ChildFieldwork requirePk($key, ConnectionInterface $con = null) Return the ChildFieldwork by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildFieldwork requireOne(ConnectionInterface $con = null) Return the first ChildFieldwork matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildFieldwork requireOneById(int $id) Return the first ChildFieldwork filtered by the id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildFieldwork requireOneByFieldworkName(string $fieldwork_project_name) Return the first ChildFieldwork filtered by the fieldwork_project_name column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildFieldwork requireOneByFieldworkLeaderName(string $fieldwork_leader_name) Return the first ChildFieldwork filtered by the fieldwork_leader_name column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildFieldwork requireOneByFieldworkLeaderAffiliation(string $fieldwork_leader_affiliation) Return the first ChildFieldwork filtered by the fieldwork_leader_affiliation column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildFieldwork requireOneByFieldworkLeaderWebsite(string $fieldwork_leader_website) Return the first ChildFieldwork filtered by the fieldwork_leader_website column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildFieldwork requireOneByFieldworkLeaderEmail(string $fieldwork_leader_email) Return the first ChildFieldwork filtered by the fieldwork_leader_email column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildFieldwork requireOneByFieldworkProjectWebsite(string $fieldwork_project_website) Return the first ChildFieldwork filtered by the fieldwork_project_website column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildFieldwork requireOneByCryosphereWhereId(int $cryosphere_where_id) Return the first ChildFieldwork filtered by the cryosphere_where_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildFieldwork requireOneByFieldworkLocations(string $fieldwork_locations) Return the first ChildFieldwork filtered by the fieldwork_locations column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildFieldwork requireOneByFieldworkDuration(int $fieldwork_duration) Return the first ChildFieldwork filtered by the fieldwork_duration column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildFieldwork requireOneByFieldworkStartDate(string $fieldwork_start_date) Return the first ChildFieldwork filtered by the fieldwork_start_date column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildFieldwork requireOneByFieldworkGoal(string $fieldwork_goal) Return the first ChildFieldwork filtered by the fieldwork_goal column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildFieldwork requireOneByFieldworkInformationSeekerLimit(int $fieldwork_information_seeker_limit) Return the first ChildFieldwork filtered by the fieldwork_information_seeker_limit column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildFieldwork requireOneByFieldworkInformationSeekerCost(int $fieldwork_information_seeker_cost) Return the first ChildFieldwork filtered by the fieldwork_information_seeker_cost column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildFieldwork requireOneByFieldworkBidingAllowed(boolean $fieldwork_biding_allowed) Return the first ChildFieldwork filtered by the fieldwork_biding_allowed column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildFieldwork requireOneByFieldworkInformationSeekerPackageIncluded(string $fieldwork_information_seeker_package_included) Return the first ChildFieldwork filtered by the fieldwork_information_seeker_package_included column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildFieldwork requireOneByFieldworkInformationSeekerPackageExcluded(string $fieldwork_information_seeker_package_excluded) Return the first ChildFieldwork filtered by the fieldwork_information_seeker_package_excluded column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildFieldwork requireOneByFieldworkIsCertain(boolean $fieldwork_is_certain) Return the first ChildFieldwork filtered by the fieldwork_is_certain column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildFieldwork requireOneByFieldworkWhenCertain(string $fieldwork_when_certain) Return the first ChildFieldwork filtered by the fieldwork_when_certain column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildFieldwork requireOneByFieldworkInformationSeekerAnnouncementDate(string $field_information_seeker_announcement_date) Return the first ChildFieldwork filtered by the field_information_seeker_announcement_date column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildFieldwork requireOneByFieldworkInformationSeekerDeadline(string $field_information_seeker_deadline) Return the first ChildFieldwork filtered by the field_information_seeker_deadline column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildFieldwork requireOneByApproved(boolean $approved) Return the first ChildFieldwork filtered by the approved column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildFieldwork requireOneByTimestamp(string $timestamp) Return the first ChildFieldwork filtered by the timestamp column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildFieldwork[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildFieldwork objects based on current ModelCriteria
 * @method     ChildFieldwork[]|ObjectCollection findById(int $id) Return ChildFieldwork objects filtered by the id column
 * @method     ChildFieldwork[]|ObjectCollection findByFieldworkName(string $fieldwork_project_name) Return ChildFieldwork objects filtered by the fieldwork_project_name column
 * @method     ChildFieldwork[]|ObjectCollection findByFieldworkLeaderName(string $fieldwork_leader_name) Return ChildFieldwork objects filtered by the fieldwork_leader_name column
 * @method     ChildFieldwork[]|ObjectCollection findByFieldworkLeaderAffiliation(string $fieldwork_leader_affiliation) Return ChildFieldwork objects filtered by the fieldwork_leader_affiliation column
 * @method     ChildFieldwork[]|ObjectCollection findByFieldworkLeaderWebsite(string $fieldwork_leader_website) Return ChildFieldwork objects filtered by the fieldwork_leader_website column
 * @method     ChildFieldwork[]|ObjectCollection findByFieldworkLeaderEmail(string $fieldwork_leader_email) Return ChildFieldwork objects filtered by the fieldwork_leader_email column
 * @method     ChildFieldwork[]|ObjectCollection findByFieldworkProjectWebsite(string $fieldwork_project_website) Return ChildFieldwork objects filtered by the fieldwork_project_website column
 * @method     ChildFieldwork[]|ObjectCollection findByCryosphereWhereId(int $cryosphere_where_id) Return ChildFieldwork objects filtered by the cryosphere_where_id column
 * @method     ChildFieldwork[]|ObjectCollection findByFieldworkLocations(string $fieldwork_locations) Return ChildFieldwork objects filtered by the fieldwork_locations column
 * @method     ChildFieldwork[]|ObjectCollection findByFieldworkDuration(int $fieldwork_duration) Return ChildFieldwork objects filtered by the fieldwork_duration column
 * @method     ChildFieldwork[]|ObjectCollection findByFieldworkStartDate(string $fieldwork_start_date) Return ChildFieldwork objects filtered by the fieldwork_start_date column
 * @method     ChildFieldwork[]|ObjectCollection findByFieldworkGoal(string $fieldwork_goal) Return ChildFieldwork objects filtered by the fieldwork_goal column
 * @method     ChildFieldwork[]|ObjectCollection findByFieldworkInformationSeekerLimit(int $fieldwork_information_seeker_limit) Return ChildFieldwork objects filtered by the fieldwork_information_seeker_limit column
 * @method     ChildFieldwork[]|ObjectCollection findByFieldworkInformationSeekerCost(int $fieldwork_information_seeker_cost) Return ChildFieldwork objects filtered by the fieldwork_information_seeker_cost column
 * @method     ChildFieldwork[]|ObjectCollection findByFieldworkBidingAllowed(boolean $fieldwork_biding_allowed) Return ChildFieldwork objects filtered by the fieldwork_biding_allowed column
 * @method     ChildFieldwork[]|ObjectCollection findByFieldworkInformationSeekerPackageIncluded(string $fieldwork_information_seeker_package_included) Return ChildFieldwork objects filtered by the fieldwork_information_seeker_package_included column
 * @method     ChildFieldwork[]|ObjectCollection findByFieldworkInformationSeekerPackageExcluded(string $fieldwork_information_seeker_package_excluded) Return ChildFieldwork objects filtered by the fieldwork_information_seeker_package_excluded column
 * @method     ChildFieldwork[]|ObjectCollection findByFieldworkIsCertain(boolean $fieldwork_is_certain) Return ChildFieldwork objects filtered by the fieldwork_is_certain column
 * @method     ChildFieldwork[]|ObjectCollection findByFieldworkWhenCertain(string $fieldwork_when_certain) Return ChildFieldwork objects filtered by the fieldwork_when_certain column
 * @method     ChildFieldwork[]|ObjectCollection findByFieldworkInformationSeekerAnnouncementDate(string $field_information_seeker_announcement_date) Return ChildFieldwork objects filtered by the field_information_seeker_announcement_date column
 * @method     ChildFieldwork[]|ObjectCollection findByFieldworkInformationSeekerDeadline(string $field_information_seeker_deadline) Return ChildFieldwork objects filtered by the field_information_seeker_deadline column
 * @method     ChildFieldwork[]|ObjectCollection findByApproved(boolean $approved) Return ChildFieldwork objects filtered by the approved column
 * @method     ChildFieldwork[]|ObjectCollection findByTimestamp(string $timestamp) Return ChildFieldwork objects filtered by the timestamp column
 * @method     ChildFieldwork[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class FieldworkQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \CryoConnectDB\Base\FieldworkQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\CryoConnectDB\\Fieldwork', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildFieldworkQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildFieldworkQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildFieldworkQuery) {
            return $criteria;
        }
        $query = new ChildFieldworkQuery();
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
     * @return ChildFieldwork|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(FieldworkTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = FieldworkTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildFieldwork A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT id, fieldwork_project_name, fieldwork_leader_name, fieldwork_leader_affiliation, fieldwork_leader_website, fieldwork_leader_email, fieldwork_project_website, cryosphere_where_id, fieldwork_locations, fieldwork_duration, fieldwork_start_date, fieldwork_goal, fieldwork_information_seeker_limit, fieldwork_information_seeker_cost, fieldwork_biding_allowed, fieldwork_information_seeker_package_included, fieldwork_information_seeker_package_excluded, fieldwork_is_certain, fieldwork_when_certain, field_information_seeker_announcement_date, field_information_seeker_deadline, approved, timestamp FROM fieldwork WHERE id = :p0';
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
            /** @var ChildFieldwork $obj */
            $obj = new ChildFieldwork();
            $obj->hydrate($row);
            FieldworkTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildFieldwork|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildFieldworkQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(FieldworkTableMap::COL_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildFieldworkQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(FieldworkTableMap::COL_ID, $keys, Criteria::IN);
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
     * @return $this|ChildFieldworkQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(FieldworkTableMap::COL_ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(FieldworkTableMap::COL_ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(FieldworkTableMap::COL_ID, $id, $comparison);
    }

    /**
     * Filter the query on the fieldwork_project_name column
     *
     * Example usage:
     * <code>
     * $query->filterByFieldworkName('fooValue');   // WHERE fieldwork_project_name = 'fooValue'
     * $query->filterByFieldworkName('%fooValue%', Criteria::LIKE); // WHERE fieldwork_project_name LIKE '%fooValue%'
     * </code>
     *
     * @param     string $fieldworkName The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildFieldworkQuery The current query, for fluid interface
     */
    public function filterByFieldworkName($fieldworkName = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($fieldworkName)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(FieldworkTableMap::COL_FIELDWORK_PROJECT_NAME, $fieldworkName, $comparison);
    }

    /**
     * Filter the query on the fieldwork_leader_name column
     *
     * Example usage:
     * <code>
     * $query->filterByFieldworkLeaderName('fooValue');   // WHERE fieldwork_leader_name = 'fooValue'
     * $query->filterByFieldworkLeaderName('%fooValue%', Criteria::LIKE); // WHERE fieldwork_leader_name LIKE '%fooValue%'
     * </code>
     *
     * @param     string $fieldworkLeaderName The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildFieldworkQuery The current query, for fluid interface
     */
    public function filterByFieldworkLeaderName($fieldworkLeaderName = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($fieldworkLeaderName)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(FieldworkTableMap::COL_FIELDWORK_LEADER_NAME, $fieldworkLeaderName, $comparison);
    }

    /**
     * Filter the query on the fieldwork_leader_affiliation column
     *
     * Example usage:
     * <code>
     * $query->filterByFieldworkLeaderAffiliation('fooValue');   // WHERE fieldwork_leader_affiliation = 'fooValue'
     * $query->filterByFieldworkLeaderAffiliation('%fooValue%', Criteria::LIKE); // WHERE fieldwork_leader_affiliation LIKE '%fooValue%'
     * </code>
     *
     * @param     string $fieldworkLeaderAffiliation The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildFieldworkQuery The current query, for fluid interface
     */
    public function filterByFieldworkLeaderAffiliation($fieldworkLeaderAffiliation = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($fieldworkLeaderAffiliation)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(FieldworkTableMap::COL_FIELDWORK_LEADER_AFFILIATION, $fieldworkLeaderAffiliation, $comparison);
    }

    /**
     * Filter the query on the fieldwork_leader_website column
     *
     * Example usage:
     * <code>
     * $query->filterByFieldworkLeaderWebsite('fooValue');   // WHERE fieldwork_leader_website = 'fooValue'
     * $query->filterByFieldworkLeaderWebsite('%fooValue%', Criteria::LIKE); // WHERE fieldwork_leader_website LIKE '%fooValue%'
     * </code>
     *
     * @param     string $fieldworkLeaderWebsite The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildFieldworkQuery The current query, for fluid interface
     */
    public function filterByFieldworkLeaderWebsite($fieldworkLeaderWebsite = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($fieldworkLeaderWebsite)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(FieldworkTableMap::COL_FIELDWORK_LEADER_WEBSITE, $fieldworkLeaderWebsite, $comparison);
    }

    /**
     * Filter the query on the fieldwork_leader_email column
     *
     * Example usage:
     * <code>
     * $query->filterByFieldworkLeaderEmail('fooValue');   // WHERE fieldwork_leader_email = 'fooValue'
     * $query->filterByFieldworkLeaderEmail('%fooValue%', Criteria::LIKE); // WHERE fieldwork_leader_email LIKE '%fooValue%'
     * </code>
     *
     * @param     string $fieldworkLeaderEmail The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildFieldworkQuery The current query, for fluid interface
     */
    public function filterByFieldworkLeaderEmail($fieldworkLeaderEmail = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($fieldworkLeaderEmail)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(FieldworkTableMap::COL_FIELDWORK_LEADER_EMAIL, $fieldworkLeaderEmail, $comparison);
    }

    /**
     * Filter the query on the fieldwork_project_website column
     *
     * Example usage:
     * <code>
     * $query->filterByFieldworkProjectWebsite('fooValue');   // WHERE fieldwork_project_website = 'fooValue'
     * $query->filterByFieldworkProjectWebsite('%fooValue%', Criteria::LIKE); // WHERE fieldwork_project_website LIKE '%fooValue%'
     * </code>
     *
     * @param     string $fieldworkProjectWebsite The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildFieldworkQuery The current query, for fluid interface
     */
    public function filterByFieldworkProjectWebsite($fieldworkProjectWebsite = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($fieldworkProjectWebsite)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(FieldworkTableMap::COL_FIELDWORK_PROJECT_WEBSITE, $fieldworkProjectWebsite, $comparison);
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
     * @return $this|ChildFieldworkQuery The current query, for fluid interface
     */
    public function filterByCryosphereWhereId($cryosphereWhereId = null, $comparison = null)
    {
        if (is_array($cryosphereWhereId)) {
            $useMinMax = false;
            if (isset($cryosphereWhereId['min'])) {
                $this->addUsingAlias(FieldworkTableMap::COL_CRYOSPHERE_WHERE_ID, $cryosphereWhereId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($cryosphereWhereId['max'])) {
                $this->addUsingAlias(FieldworkTableMap::COL_CRYOSPHERE_WHERE_ID, $cryosphereWhereId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(FieldworkTableMap::COL_CRYOSPHERE_WHERE_ID, $cryosphereWhereId, $comparison);
    }

    /**
     * Filter the query on the fieldwork_locations column
     *
     * Example usage:
     * <code>
     * $query->filterByFieldworkLocations('fooValue');   // WHERE fieldwork_locations = 'fooValue'
     * $query->filterByFieldworkLocations('%fooValue%', Criteria::LIKE); // WHERE fieldwork_locations LIKE '%fooValue%'
     * </code>
     *
     * @param     string $fieldworkLocations The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildFieldworkQuery The current query, for fluid interface
     */
    public function filterByFieldworkLocations($fieldworkLocations = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($fieldworkLocations)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(FieldworkTableMap::COL_FIELDWORK_LOCATIONS, $fieldworkLocations, $comparison);
    }

    /**
     * Filter the query on the fieldwork_duration column
     *
     * Example usage:
     * <code>
     * $query->filterByFieldworkDuration(1234); // WHERE fieldwork_duration = 1234
     * $query->filterByFieldworkDuration(array(12, 34)); // WHERE fieldwork_duration IN (12, 34)
     * $query->filterByFieldworkDuration(array('min' => 12)); // WHERE fieldwork_duration > 12
     * </code>
     *
     * @param     mixed $fieldworkDuration The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildFieldworkQuery The current query, for fluid interface
     */
    public function filterByFieldworkDuration($fieldworkDuration = null, $comparison = null)
    {
        if (is_array($fieldworkDuration)) {
            $useMinMax = false;
            if (isset($fieldworkDuration['min'])) {
                $this->addUsingAlias(FieldworkTableMap::COL_FIELDWORK_DURATION, $fieldworkDuration['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($fieldworkDuration['max'])) {
                $this->addUsingAlias(FieldworkTableMap::COL_FIELDWORK_DURATION, $fieldworkDuration['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(FieldworkTableMap::COL_FIELDWORK_DURATION, $fieldworkDuration, $comparison);
    }

    /**
     * Filter the query on the fieldwork_start_date column
     *
     * Example usage:
     * <code>
     * $query->filterByFieldworkStartDate('2011-03-14'); // WHERE fieldwork_start_date = '2011-03-14'
     * $query->filterByFieldworkStartDate('now'); // WHERE fieldwork_start_date = '2011-03-14'
     * $query->filterByFieldworkStartDate(array('max' => 'yesterday')); // WHERE fieldwork_start_date > '2011-03-13'
     * </code>
     *
     * @param     mixed $fieldworkStartDate The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildFieldworkQuery The current query, for fluid interface
     */
    public function filterByFieldworkStartDate($fieldworkStartDate = null, $comparison = null)
    {
        if (is_array($fieldworkStartDate)) {
            $useMinMax = false;
            if (isset($fieldworkStartDate['min'])) {
                $this->addUsingAlias(FieldworkTableMap::COL_FIELDWORK_START_DATE, $fieldworkStartDate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($fieldworkStartDate['max'])) {
                $this->addUsingAlias(FieldworkTableMap::COL_FIELDWORK_START_DATE, $fieldworkStartDate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(FieldworkTableMap::COL_FIELDWORK_START_DATE, $fieldworkStartDate, $comparison);
    }

    /**
     * Filter the query on the fieldwork_goal column
     *
     * Example usage:
     * <code>
     * $query->filterByFieldworkGoal('fooValue');   // WHERE fieldwork_goal = 'fooValue'
     * $query->filterByFieldworkGoal('%fooValue%', Criteria::LIKE); // WHERE fieldwork_goal LIKE '%fooValue%'
     * </code>
     *
     * @param     string $fieldworkGoal The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildFieldworkQuery The current query, for fluid interface
     */
    public function filterByFieldworkGoal($fieldworkGoal = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($fieldworkGoal)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(FieldworkTableMap::COL_FIELDWORK_GOAL, $fieldworkGoal, $comparison);
    }

    /**
     * Filter the query on the fieldwork_information_seeker_limit column
     *
     * Example usage:
     * <code>
     * $query->filterByFieldworkInformationSeekerLimit(1234); // WHERE fieldwork_information_seeker_limit = 1234
     * $query->filterByFieldworkInformationSeekerLimit(array(12, 34)); // WHERE fieldwork_information_seeker_limit IN (12, 34)
     * $query->filterByFieldworkInformationSeekerLimit(array('min' => 12)); // WHERE fieldwork_information_seeker_limit > 12
     * </code>
     *
     * @param     mixed $fieldworkInformationSeekerLimit The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildFieldworkQuery The current query, for fluid interface
     */
    public function filterByFieldworkInformationSeekerLimit($fieldworkInformationSeekerLimit = null, $comparison = null)
    {
        if (is_array($fieldworkInformationSeekerLimit)) {
            $useMinMax = false;
            if (isset($fieldworkInformationSeekerLimit['min'])) {
                $this->addUsingAlias(FieldworkTableMap::COL_FIELDWORK_INFORMATION_SEEKER_LIMIT, $fieldworkInformationSeekerLimit['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($fieldworkInformationSeekerLimit['max'])) {
                $this->addUsingAlias(FieldworkTableMap::COL_FIELDWORK_INFORMATION_SEEKER_LIMIT, $fieldworkInformationSeekerLimit['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(FieldworkTableMap::COL_FIELDWORK_INFORMATION_SEEKER_LIMIT, $fieldworkInformationSeekerLimit, $comparison);
    }

    /**
     * Filter the query on the fieldwork_information_seeker_cost column
     *
     * Example usage:
     * <code>
     * $query->filterByFieldworkInformationSeekerCost(1234); // WHERE fieldwork_information_seeker_cost = 1234
     * $query->filterByFieldworkInformationSeekerCost(array(12, 34)); // WHERE fieldwork_information_seeker_cost IN (12, 34)
     * $query->filterByFieldworkInformationSeekerCost(array('min' => 12)); // WHERE fieldwork_information_seeker_cost > 12
     * </code>
     *
     * @param     mixed $fieldworkInformationSeekerCost The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildFieldworkQuery The current query, for fluid interface
     */
    public function filterByFieldworkInformationSeekerCost($fieldworkInformationSeekerCost = null, $comparison = null)
    {
        if (is_array($fieldworkInformationSeekerCost)) {
            $useMinMax = false;
            if (isset($fieldworkInformationSeekerCost['min'])) {
                $this->addUsingAlias(FieldworkTableMap::COL_FIELDWORK_INFORMATION_SEEKER_COST, $fieldworkInformationSeekerCost['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($fieldworkInformationSeekerCost['max'])) {
                $this->addUsingAlias(FieldworkTableMap::COL_FIELDWORK_INFORMATION_SEEKER_COST, $fieldworkInformationSeekerCost['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(FieldworkTableMap::COL_FIELDWORK_INFORMATION_SEEKER_COST, $fieldworkInformationSeekerCost, $comparison);
    }

    /**
     * Filter the query on the fieldwork_biding_allowed column
     *
     * Example usage:
     * <code>
     * $query->filterByFieldworkBidingAllowed(true); // WHERE fieldwork_biding_allowed = true
     * $query->filterByFieldworkBidingAllowed('yes'); // WHERE fieldwork_biding_allowed = true
     * </code>
     *
     * @param     boolean|string $fieldworkBidingAllowed The value to use as filter.
     *              Non-boolean arguments are converted using the following rules:
     *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildFieldworkQuery The current query, for fluid interface
     */
    public function filterByFieldworkBidingAllowed($fieldworkBidingAllowed = null, $comparison = null)
    {
        if (is_string($fieldworkBidingAllowed)) {
            $fieldworkBidingAllowed = in_array(strtolower($fieldworkBidingAllowed), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(FieldworkTableMap::COL_FIELDWORK_BIDING_ALLOWED, $fieldworkBidingAllowed, $comparison);
    }

    /**
     * Filter the query on the fieldwork_information_seeker_package_included column
     *
     * Example usage:
     * <code>
     * $query->filterByFieldworkInformationSeekerPackageIncluded('fooValue');   // WHERE fieldwork_information_seeker_package_included = 'fooValue'
     * $query->filterByFieldworkInformationSeekerPackageIncluded('%fooValue%', Criteria::LIKE); // WHERE fieldwork_information_seeker_package_included LIKE '%fooValue%'
     * </code>
     *
     * @param     string $fieldworkInformationSeekerPackageIncluded The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildFieldworkQuery The current query, for fluid interface
     */
    public function filterByFieldworkInformationSeekerPackageIncluded($fieldworkInformationSeekerPackageIncluded = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($fieldworkInformationSeekerPackageIncluded)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(FieldworkTableMap::COL_FIELDWORK_INFORMATION_SEEKER_PACKAGE_INCLUDED, $fieldworkInformationSeekerPackageIncluded, $comparison);
    }

    /**
     * Filter the query on the fieldwork_information_seeker_package_excluded column
     *
     * Example usage:
     * <code>
     * $query->filterByFieldworkInformationSeekerPackageExcluded('fooValue');   // WHERE fieldwork_information_seeker_package_excluded = 'fooValue'
     * $query->filterByFieldworkInformationSeekerPackageExcluded('%fooValue%', Criteria::LIKE); // WHERE fieldwork_information_seeker_package_excluded LIKE '%fooValue%'
     * </code>
     *
     * @param     string $fieldworkInformationSeekerPackageExcluded The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildFieldworkQuery The current query, for fluid interface
     */
    public function filterByFieldworkInformationSeekerPackageExcluded($fieldworkInformationSeekerPackageExcluded = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($fieldworkInformationSeekerPackageExcluded)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(FieldworkTableMap::COL_FIELDWORK_INFORMATION_SEEKER_PACKAGE_EXCLUDED, $fieldworkInformationSeekerPackageExcluded, $comparison);
    }

    /**
     * Filter the query on the fieldwork_is_certain column
     *
     * Example usage:
     * <code>
     * $query->filterByFieldworkIsCertain(true); // WHERE fieldwork_is_certain = true
     * $query->filterByFieldworkIsCertain('yes'); // WHERE fieldwork_is_certain = true
     * </code>
     *
     * @param     boolean|string $fieldworkIsCertain The value to use as filter.
     *              Non-boolean arguments are converted using the following rules:
     *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildFieldworkQuery The current query, for fluid interface
     */
    public function filterByFieldworkIsCertain($fieldworkIsCertain = null, $comparison = null)
    {
        if (is_string($fieldworkIsCertain)) {
            $fieldworkIsCertain = in_array(strtolower($fieldworkIsCertain), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(FieldworkTableMap::COL_FIELDWORK_IS_CERTAIN, $fieldworkIsCertain, $comparison);
    }

    /**
     * Filter the query on the fieldwork_when_certain column
     *
     * Example usage:
     * <code>
     * $query->filterByFieldworkWhenCertain('2011-03-14'); // WHERE fieldwork_when_certain = '2011-03-14'
     * $query->filterByFieldworkWhenCertain('now'); // WHERE fieldwork_when_certain = '2011-03-14'
     * $query->filterByFieldworkWhenCertain(array('max' => 'yesterday')); // WHERE fieldwork_when_certain > '2011-03-13'
     * </code>
     *
     * @param     mixed $fieldworkWhenCertain The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildFieldworkQuery The current query, for fluid interface
     */
    public function filterByFieldworkWhenCertain($fieldworkWhenCertain = null, $comparison = null)
    {
        if (is_array($fieldworkWhenCertain)) {
            $useMinMax = false;
            if (isset($fieldworkWhenCertain['min'])) {
                $this->addUsingAlias(FieldworkTableMap::COL_FIELDWORK_WHEN_CERTAIN, $fieldworkWhenCertain['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($fieldworkWhenCertain['max'])) {
                $this->addUsingAlias(FieldworkTableMap::COL_FIELDWORK_WHEN_CERTAIN, $fieldworkWhenCertain['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(FieldworkTableMap::COL_FIELDWORK_WHEN_CERTAIN, $fieldworkWhenCertain, $comparison);
    }

    /**
     * Filter the query on the field_information_seeker_announcement_date column
     *
     * Example usage:
     * <code>
     * $query->filterByFieldworkInformationSeekerAnnouncementDate('2011-03-14'); // WHERE field_information_seeker_announcement_date = '2011-03-14'
     * $query->filterByFieldworkInformationSeekerAnnouncementDate('now'); // WHERE field_information_seeker_announcement_date = '2011-03-14'
     * $query->filterByFieldworkInformationSeekerAnnouncementDate(array('max' => 'yesterday')); // WHERE field_information_seeker_announcement_date > '2011-03-13'
     * </code>
     *
     * @param     mixed $fieldworkInformationSeekerAnnouncementDate The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildFieldworkQuery The current query, for fluid interface
     */
    public function filterByFieldworkInformationSeekerAnnouncementDate($fieldworkInformationSeekerAnnouncementDate = null, $comparison = null)
    {
        if (is_array($fieldworkInformationSeekerAnnouncementDate)) {
            $useMinMax = false;
            if (isset($fieldworkInformationSeekerAnnouncementDate['min'])) {
                $this->addUsingAlias(FieldworkTableMap::COL_FIELD_INFORMATION_SEEKER_ANNOUNCEMENT_DATE, $fieldworkInformationSeekerAnnouncementDate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($fieldworkInformationSeekerAnnouncementDate['max'])) {
                $this->addUsingAlias(FieldworkTableMap::COL_FIELD_INFORMATION_SEEKER_ANNOUNCEMENT_DATE, $fieldworkInformationSeekerAnnouncementDate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(FieldworkTableMap::COL_FIELD_INFORMATION_SEEKER_ANNOUNCEMENT_DATE, $fieldworkInformationSeekerAnnouncementDate, $comparison);
    }

    /**
     * Filter the query on the field_information_seeker_deadline column
     *
     * Example usage:
     * <code>
     * $query->filterByFieldworkInformationSeekerDeadline('2011-03-14'); // WHERE field_information_seeker_deadline = '2011-03-14'
     * $query->filterByFieldworkInformationSeekerDeadline('now'); // WHERE field_information_seeker_deadline = '2011-03-14'
     * $query->filterByFieldworkInformationSeekerDeadline(array('max' => 'yesterday')); // WHERE field_information_seeker_deadline > '2011-03-13'
     * </code>
     *
     * @param     mixed $fieldworkInformationSeekerDeadline The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildFieldworkQuery The current query, for fluid interface
     */
    public function filterByFieldworkInformationSeekerDeadline($fieldworkInformationSeekerDeadline = null, $comparison = null)
    {
        if (is_array($fieldworkInformationSeekerDeadline)) {
            $useMinMax = false;
            if (isset($fieldworkInformationSeekerDeadline['min'])) {
                $this->addUsingAlias(FieldworkTableMap::COL_FIELD_INFORMATION_SEEKER_DEADLINE, $fieldworkInformationSeekerDeadline['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($fieldworkInformationSeekerDeadline['max'])) {
                $this->addUsingAlias(FieldworkTableMap::COL_FIELD_INFORMATION_SEEKER_DEADLINE, $fieldworkInformationSeekerDeadline['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(FieldworkTableMap::COL_FIELD_INFORMATION_SEEKER_DEADLINE, $fieldworkInformationSeekerDeadline, $comparison);
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
     * @return $this|ChildFieldworkQuery The current query, for fluid interface
     */
    public function filterByApproved($approved = null, $comparison = null)
    {
        if (is_string($approved)) {
            $approved = in_array(strtolower($approved), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(FieldworkTableMap::COL_APPROVED, $approved, $comparison);
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
     * @return $this|ChildFieldworkQuery The current query, for fluid interface
     */
    public function filterByTimestamp($timestamp = null, $comparison = null)
    {
        if (is_array($timestamp)) {
            $useMinMax = false;
            if (isset($timestamp['min'])) {
                $this->addUsingAlias(FieldworkTableMap::COL_TIMESTAMP, $timestamp['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($timestamp['max'])) {
                $this->addUsingAlias(FieldworkTableMap::COL_TIMESTAMP, $timestamp['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(FieldworkTableMap::COL_TIMESTAMP, $timestamp, $comparison);
    }

    /**
     * Filter the query by a related \CryoConnectDB\CryosphereWhere object
     *
     * @param \CryoConnectDB\CryosphereWhere|ObjectCollection $cryosphereWhere The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildFieldworkQuery The current query, for fluid interface
     */
    public function filterByCryosphereWhere($cryosphereWhere, $comparison = null)
    {
        if ($cryosphereWhere instanceof \CryoConnectDB\CryosphereWhere) {
            return $this
                ->addUsingAlias(FieldworkTableMap::COL_CRYOSPHERE_WHERE_ID, $cryosphereWhere->getId(), $comparison);
        } elseif ($cryosphereWhere instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(FieldworkTableMap::COL_CRYOSPHERE_WHERE_ID, $cryosphereWhere->toKeyValue('PrimaryKey', 'Id'), $comparison);
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
     * @return $this|ChildFieldworkQuery The current query, for fluid interface
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
     * Filter the query by a related \CryoConnectDB\FieldworkInformationSeekerRequest object
     *
     * @param \CryoConnectDB\FieldworkInformationSeekerRequest|ObjectCollection $fieldworkInformationSeekerRequest the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildFieldworkQuery The current query, for fluid interface
     */
    public function filterByFieldworkInformationSeekerRequest($fieldworkInformationSeekerRequest, $comparison = null)
    {
        if ($fieldworkInformationSeekerRequest instanceof \CryoConnectDB\FieldworkInformationSeekerRequest) {
            return $this
                ->addUsingAlias(FieldworkTableMap::COL_ID, $fieldworkInformationSeekerRequest->getFieldworkId(), $comparison);
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
     * @return $this|ChildFieldworkQuery The current query, for fluid interface
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
     * Filter the query by a related FieldworkInformationSeeker object
     * using the fieldwork_information_seeker_request table as cross reference
     *
     * @param FieldworkInformationSeeker $fieldworkInformationSeeker the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildFieldworkQuery The current query, for fluid interface
     */
    public function filterByFieldworkInformationSeeker($fieldworkInformationSeeker, $comparison = Criteria::EQUAL)
    {
        return $this
            ->useFieldworkInformationSeekerRequestQuery()
            ->filterByFieldworkInformationSeeker($fieldworkInformationSeeker, $comparison)
            ->endUse();
    }

    /**
     * Exclude object from result
     *
     * @param   ChildFieldwork $fieldwork Object to remove from the list of results
     *
     * @return $this|ChildFieldworkQuery The current query, for fluid interface
     */
    public function prune($fieldwork = null)
    {
        if ($fieldwork) {
            $this->addUsingAlias(FieldworkTableMap::COL_ID, $fieldwork->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the fieldwork table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(FieldworkTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            FieldworkTableMap::clearInstancePool();
            FieldworkTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(FieldworkTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(FieldworkTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            FieldworkTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            FieldworkTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // FieldworkQuery
