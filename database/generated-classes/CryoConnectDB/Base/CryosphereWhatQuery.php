<?php

namespace CryoConnectDB\Base;

use \Exception;
use \PDO;
use CryoConnectDB\CryosphereWhat as ChildCryosphereWhat;
use CryoConnectDB\CryosphereWhatQuery as ChildCryosphereWhatQuery;
use CryoConnectDB\Map\CryosphereWhatTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'cryosphere_what' table.
 *
 *
 *
 * @method     ChildCryosphereWhatQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ChildCryosphereWhatQuery orderByCryosphereWhatName($order = Criteria::ASC) Order by the cryosphere_what_name column
 * @method     ChildCryosphereWhatQuery orderByTimestamp($order = Criteria::ASC) Order by the timestamp column
 *
 * @method     ChildCryosphereWhatQuery groupById() Group by the id column
 * @method     ChildCryosphereWhatQuery groupByCryosphereWhatName() Group by the cryosphere_what_name column
 * @method     ChildCryosphereWhatQuery groupByTimestamp() Group by the timestamp column
 *
 * @method     ChildCryosphereWhatQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildCryosphereWhatQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildCryosphereWhatQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildCryosphereWhatQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildCryosphereWhatQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildCryosphereWhatQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildCryosphereWhatQuery leftJoinExpertCryosphereWhat($relationAlias = null) Adds a LEFT JOIN clause to the query using the ExpertCryosphereWhat relation
 * @method     ChildCryosphereWhatQuery rightJoinExpertCryosphereWhat($relationAlias = null) Adds a RIGHT JOIN clause to the query using the ExpertCryosphereWhat relation
 * @method     ChildCryosphereWhatQuery innerJoinExpertCryosphereWhat($relationAlias = null) Adds a INNER JOIN clause to the query using the ExpertCryosphereWhat relation
 *
 * @method     ChildCryosphereWhatQuery joinWithExpertCryosphereWhat($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the ExpertCryosphereWhat relation
 *
 * @method     ChildCryosphereWhatQuery leftJoinWithExpertCryosphereWhat() Adds a LEFT JOIN clause and with to the query using the ExpertCryosphereWhat relation
 * @method     ChildCryosphereWhatQuery rightJoinWithExpertCryosphereWhat() Adds a RIGHT JOIN clause and with to the query using the ExpertCryosphereWhat relation
 * @method     ChildCryosphereWhatQuery innerJoinWithExpertCryosphereWhat() Adds a INNER JOIN clause and with to the query using the ExpertCryosphereWhat relation
 *
 * @method     ChildCryosphereWhatQuery leftJoinInformationSeekerConnectRequestCryosphereWhat($relationAlias = null) Adds a LEFT JOIN clause to the query using the InformationSeekerConnectRequestCryosphereWhat relation
 * @method     ChildCryosphereWhatQuery rightJoinInformationSeekerConnectRequestCryosphereWhat($relationAlias = null) Adds a RIGHT JOIN clause to the query using the InformationSeekerConnectRequestCryosphereWhat relation
 * @method     ChildCryosphereWhatQuery innerJoinInformationSeekerConnectRequestCryosphereWhat($relationAlias = null) Adds a INNER JOIN clause to the query using the InformationSeekerConnectRequestCryosphereWhat relation
 *
 * @method     ChildCryosphereWhatQuery joinWithInformationSeekerConnectRequestCryosphereWhat($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the InformationSeekerConnectRequestCryosphereWhat relation
 *
 * @method     ChildCryosphereWhatQuery leftJoinWithInformationSeekerConnectRequestCryosphereWhat() Adds a LEFT JOIN clause and with to the query using the InformationSeekerConnectRequestCryosphereWhat relation
 * @method     ChildCryosphereWhatQuery rightJoinWithInformationSeekerConnectRequestCryosphereWhat() Adds a RIGHT JOIN clause and with to the query using the InformationSeekerConnectRequestCryosphereWhat relation
 * @method     ChildCryosphereWhatQuery innerJoinWithInformationSeekerConnectRequestCryosphereWhat() Adds a INNER JOIN clause and with to the query using the InformationSeekerConnectRequestCryosphereWhat relation
 *
 * @method     \CryoConnectDB\ExpertCryosphereWhatQuery|\CryoConnectDB\InformationSeekerConnectRequestCryosphereWhatQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildCryosphereWhat findOne(ConnectionInterface $con = null) Return the first ChildCryosphereWhat matching the query
 * @method     ChildCryosphereWhat findOneOrCreate(ConnectionInterface $con = null) Return the first ChildCryosphereWhat matching the query, or a new ChildCryosphereWhat object populated from the query conditions when no match is found
 *
 * @method     ChildCryosphereWhat findOneById(int $id) Return the first ChildCryosphereWhat filtered by the id column
 * @method     ChildCryosphereWhat findOneByCryosphereWhatName(string $cryosphere_what_name) Return the first ChildCryosphereWhat filtered by the cryosphere_what_name column
 * @method     ChildCryosphereWhat findOneByTimestamp(string $timestamp) Return the first ChildCryosphereWhat filtered by the timestamp column *

 * @method     ChildCryosphereWhat requirePk($key, ConnectionInterface $con = null) Return the ChildCryosphereWhat by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCryosphereWhat requireOne(ConnectionInterface $con = null) Return the first ChildCryosphereWhat matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildCryosphereWhat requireOneById(int $id) Return the first ChildCryosphereWhat filtered by the id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCryosphereWhat requireOneByCryosphereWhatName(string $cryosphere_what_name) Return the first ChildCryosphereWhat filtered by the cryosphere_what_name column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCryosphereWhat requireOneByTimestamp(string $timestamp) Return the first ChildCryosphereWhat filtered by the timestamp column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildCryosphereWhat[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildCryosphereWhat objects based on current ModelCriteria
 * @method     ChildCryosphereWhat[]|ObjectCollection findById(int $id) Return ChildCryosphereWhat objects filtered by the id column
 * @method     ChildCryosphereWhat[]|ObjectCollection findByCryosphereWhatName(string $cryosphere_what_name) Return ChildCryosphereWhat objects filtered by the cryosphere_what_name column
 * @method     ChildCryosphereWhat[]|ObjectCollection findByTimestamp(string $timestamp) Return ChildCryosphereWhat objects filtered by the timestamp column
 * @method     ChildCryosphereWhat[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class CryosphereWhatQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \CryoConnectDB\Base\CryosphereWhatQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'cryo_connect', $modelName = '\\CryoConnectDB\\CryosphereWhat', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildCryosphereWhatQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildCryosphereWhatQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildCryosphereWhatQuery) {
            return $criteria;
        }
        $query = new ChildCryosphereWhatQuery();
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
     * @return ChildCryosphereWhat|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(CryosphereWhatTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = CryosphereWhatTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildCryosphereWhat A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT id, cryosphere_what_name, timestamp FROM cryosphere_what WHERE id = :p0';
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
            /** @var ChildCryosphereWhat $obj */
            $obj = new ChildCryosphereWhat();
            $obj->hydrate($row);
            CryosphereWhatTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildCryosphereWhat|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildCryosphereWhatQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(CryosphereWhatTableMap::COL_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildCryosphereWhatQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(CryosphereWhatTableMap::COL_ID, $keys, Criteria::IN);
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
     * @return $this|ChildCryosphereWhatQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(CryosphereWhatTableMap::COL_ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(CryosphereWhatTableMap::COL_ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CryosphereWhatTableMap::COL_ID, $id, $comparison);
    }

    /**
     * Filter the query on the cryosphere_what_name column
     *
     * Example usage:
     * <code>
     * $query->filterByCryosphereWhatName('fooValue');   // WHERE cryosphere_what_name = 'fooValue'
     * $query->filterByCryosphereWhatName('%fooValue%', Criteria::LIKE); // WHERE cryosphere_what_name LIKE '%fooValue%'
     * </code>
     *
     * @param     string $cryosphereWhatName The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildCryosphereWhatQuery The current query, for fluid interface
     */
    public function filterByCryosphereWhatName($cryosphereWhatName = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($cryosphereWhatName)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CryosphereWhatTableMap::COL_CRYOSPHERE_WHAT_NAME, $cryosphereWhatName, $comparison);
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
     * @return $this|ChildCryosphereWhatQuery The current query, for fluid interface
     */
    public function filterByTimestamp($timestamp = null, $comparison = null)
    {
        if (is_array($timestamp)) {
            $useMinMax = false;
            if (isset($timestamp['min'])) {
                $this->addUsingAlias(CryosphereWhatTableMap::COL_TIMESTAMP, $timestamp['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($timestamp['max'])) {
                $this->addUsingAlias(CryosphereWhatTableMap::COL_TIMESTAMP, $timestamp['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CryosphereWhatTableMap::COL_TIMESTAMP, $timestamp, $comparison);
    }

    /**
     * Filter the query by a related \CryoConnectDB\ExpertCryosphereWhat object
     *
     * @param \CryoConnectDB\ExpertCryosphereWhat|ObjectCollection $expertCryosphereWhat the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildCryosphereWhatQuery The current query, for fluid interface
     */
    public function filterByExpertCryosphereWhat($expertCryosphereWhat, $comparison = null)
    {
        if ($expertCryosphereWhat instanceof \CryoConnectDB\ExpertCryosphereWhat) {
            return $this
                ->addUsingAlias(CryosphereWhatTableMap::COL_ID, $expertCryosphereWhat->getCryosphereWhatId(), $comparison);
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
     * @return $this|ChildCryosphereWhatQuery The current query, for fluid interface
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
     * Filter the query by a related \CryoConnectDB\InformationSeekerConnectRequestCryosphereWhat object
     *
     * @param \CryoConnectDB\InformationSeekerConnectRequestCryosphereWhat|ObjectCollection $informationSeekerConnectRequestCryosphereWhat the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildCryosphereWhatQuery The current query, for fluid interface
     */
    public function filterByInformationSeekerConnectRequestCryosphereWhat($informationSeekerConnectRequestCryosphereWhat, $comparison = null)
    {
        if ($informationSeekerConnectRequestCryosphereWhat instanceof \CryoConnectDB\InformationSeekerConnectRequestCryosphereWhat) {
            return $this
                ->addUsingAlias(CryosphereWhatTableMap::COL_ID, $informationSeekerConnectRequestCryosphereWhat->getCryosphereWhatId(), $comparison);
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
     * @return $this|ChildCryosphereWhatQuery The current query, for fluid interface
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
     * Exclude object from result
     *
     * @param   ChildCryosphereWhat $cryosphereWhat Object to remove from the list of results
     *
     * @return $this|ChildCryosphereWhatQuery The current query, for fluid interface
     */
    public function prune($cryosphereWhat = null)
    {
        if ($cryosphereWhat) {
            $this->addUsingAlias(CryosphereWhatTableMap::COL_ID, $cryosphereWhat->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the cryosphere_what table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(CryosphereWhatTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            CryosphereWhatTableMap::clearInstancePool();
            CryosphereWhatTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(CryosphereWhatTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(CryosphereWhatTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            CryosphereWhatTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            CryosphereWhatTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // CryosphereWhatQuery
