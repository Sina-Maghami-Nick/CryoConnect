<?php

namespace CryoConnectDB\Base;

use \Exception;
use \PDO;
use CryoConnectDB\CryosphereWhere as ChildCryosphereWhere;
use CryoConnectDB\CryosphereWhereQuery as ChildCryosphereWhereQuery;
use CryoConnectDB\Map\CryosphereWhereTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'cryosphere_where' table.
 *
 *
 *
 * @method     ChildCryosphereWhereQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ChildCryosphereWhereQuery orderByCryosphereWhereName($order = Criteria::ASC) Order by the cryosphere_where_name column
 * @method     ChildCryosphereWhereQuery orderByTimestamp($order = Criteria::ASC) Order by the timestamp column
 *
 * @method     ChildCryosphereWhereQuery groupById() Group by the id column
 * @method     ChildCryosphereWhereQuery groupByCryosphereWhereName() Group by the cryosphere_where_name column
 * @method     ChildCryosphereWhereQuery groupByTimestamp() Group by the timestamp column
 *
 * @method     ChildCryosphereWhereQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildCryosphereWhereQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildCryosphereWhereQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildCryosphereWhereQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildCryosphereWhereQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildCryosphereWhereQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildCryosphereWhereQuery leftJoinExpertWhere($relationAlias = null) Adds a LEFT JOIN clause to the query using the ExpertWhere relation
 * @method     ChildCryosphereWhereQuery rightJoinExpertWhere($relationAlias = null) Adds a RIGHT JOIN clause to the query using the ExpertWhere relation
 * @method     ChildCryosphereWhereQuery innerJoinExpertWhere($relationAlias = null) Adds a INNER JOIN clause to the query using the ExpertWhere relation
 *
 * @method     ChildCryosphereWhereQuery joinWithExpertWhere($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the ExpertWhere relation
 *
 * @method     ChildCryosphereWhereQuery leftJoinWithExpertWhere() Adds a LEFT JOIN clause and with to the query using the ExpertWhere relation
 * @method     ChildCryosphereWhereQuery rightJoinWithExpertWhere() Adds a RIGHT JOIN clause and with to the query using the ExpertWhere relation
 * @method     ChildCryosphereWhereQuery innerJoinWithExpertWhere() Adds a INNER JOIN clause and with to the query using the ExpertWhere relation
 *
 * @method     ChildCryosphereWhereQuery leftJoinInformationSeekerConnectRequestCryosphereWhere($relationAlias = null) Adds a LEFT JOIN clause to the query using the InformationSeekerConnectRequestCryosphereWhere relation
 * @method     ChildCryosphereWhereQuery rightJoinInformationSeekerConnectRequestCryosphereWhere($relationAlias = null) Adds a RIGHT JOIN clause to the query using the InformationSeekerConnectRequestCryosphereWhere relation
 * @method     ChildCryosphereWhereQuery innerJoinInformationSeekerConnectRequestCryosphereWhere($relationAlias = null) Adds a INNER JOIN clause to the query using the InformationSeekerConnectRequestCryosphereWhere relation
 *
 * @method     ChildCryosphereWhereQuery joinWithInformationSeekerConnectRequestCryosphereWhere($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the InformationSeekerConnectRequestCryosphereWhere relation
 *
 * @method     ChildCryosphereWhereQuery leftJoinWithInformationSeekerConnectRequestCryosphereWhere() Adds a LEFT JOIN clause and with to the query using the InformationSeekerConnectRequestCryosphereWhere relation
 * @method     ChildCryosphereWhereQuery rightJoinWithInformationSeekerConnectRequestCryosphereWhere() Adds a RIGHT JOIN clause and with to the query using the InformationSeekerConnectRequestCryosphereWhere relation
 * @method     ChildCryosphereWhereQuery innerJoinWithInformationSeekerConnectRequestCryosphereWhere() Adds a INNER JOIN clause and with to the query using the InformationSeekerConnectRequestCryosphereWhere relation
 *
 * @method     \CryoConnectDB\ExpertWhereQuery|\CryoConnectDB\InformationSeekerConnectRequestCryosphereWhereQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildCryosphereWhere findOne(ConnectionInterface $con = null) Return the first ChildCryosphereWhere matching the query
 * @method     ChildCryosphereWhere findOneOrCreate(ConnectionInterface $con = null) Return the first ChildCryosphereWhere matching the query, or a new ChildCryosphereWhere object populated from the query conditions when no match is found
 *
 * @method     ChildCryosphereWhere findOneById(int $id) Return the first ChildCryosphereWhere filtered by the id column
 * @method     ChildCryosphereWhere findOneByCryosphereWhereName(string $cryosphere_where_name) Return the first ChildCryosphereWhere filtered by the cryosphere_where_name column
 * @method     ChildCryosphereWhere findOneByTimestamp(string $timestamp) Return the first ChildCryosphereWhere filtered by the timestamp column *

 * @method     ChildCryosphereWhere requirePk($key, ConnectionInterface $con = null) Return the ChildCryosphereWhere by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCryosphereWhere requireOne(ConnectionInterface $con = null) Return the first ChildCryosphereWhere matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildCryosphereWhere requireOneById(int $id) Return the first ChildCryosphereWhere filtered by the id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCryosphereWhere requireOneByCryosphereWhereName(string $cryosphere_where_name) Return the first ChildCryosphereWhere filtered by the cryosphere_where_name column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCryosphereWhere requireOneByTimestamp(string $timestamp) Return the first ChildCryosphereWhere filtered by the timestamp column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildCryosphereWhere[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildCryosphereWhere objects based on current ModelCriteria
 * @method     ChildCryosphereWhere[]|ObjectCollection findById(int $id) Return ChildCryosphereWhere objects filtered by the id column
 * @method     ChildCryosphereWhere[]|ObjectCollection findByCryosphereWhereName(string $cryosphere_where_name) Return ChildCryosphereWhere objects filtered by the cryosphere_where_name column
 * @method     ChildCryosphereWhere[]|ObjectCollection findByTimestamp(string $timestamp) Return ChildCryosphereWhere objects filtered by the timestamp column
 * @method     ChildCryosphereWhere[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class CryosphereWhereQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \CryoConnectDB\Base\CryosphereWhereQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'cryo_connect', $modelName = '\\CryoConnectDB\\CryosphereWhere', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildCryosphereWhereQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildCryosphereWhereQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildCryosphereWhereQuery) {
            return $criteria;
        }
        $query = new ChildCryosphereWhereQuery();
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
     * @return ChildCryosphereWhere|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(CryosphereWhereTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = CryosphereWhereTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildCryosphereWhere A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT id, cryosphere_where_name, timestamp FROM cryosphere_where WHERE id = :p0';
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
            /** @var ChildCryosphereWhere $obj */
            $obj = new ChildCryosphereWhere();
            $obj->hydrate($row);
            CryosphereWhereTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildCryosphereWhere|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildCryosphereWhereQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(CryosphereWhereTableMap::COL_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildCryosphereWhereQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(CryosphereWhereTableMap::COL_ID, $keys, Criteria::IN);
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
     * @return $this|ChildCryosphereWhereQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(CryosphereWhereTableMap::COL_ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(CryosphereWhereTableMap::COL_ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CryosphereWhereTableMap::COL_ID, $id, $comparison);
    }

    /**
     * Filter the query on the cryosphere_where_name column
     *
     * Example usage:
     * <code>
     * $query->filterByCryosphereWhereName('fooValue');   // WHERE cryosphere_where_name = 'fooValue'
     * $query->filterByCryosphereWhereName('%fooValue%', Criteria::LIKE); // WHERE cryosphere_where_name LIKE '%fooValue%'
     * </code>
     *
     * @param     string $cryosphereWhereName The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildCryosphereWhereQuery The current query, for fluid interface
     */
    public function filterByCryosphereWhereName($cryosphereWhereName = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($cryosphereWhereName)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CryosphereWhereTableMap::COL_CRYOSPHERE_WHERE_NAME, $cryosphereWhereName, $comparison);
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
     * @return $this|ChildCryosphereWhereQuery The current query, for fluid interface
     */
    public function filterByTimestamp($timestamp = null, $comparison = null)
    {
        if (is_array($timestamp)) {
            $useMinMax = false;
            if (isset($timestamp['min'])) {
                $this->addUsingAlias(CryosphereWhereTableMap::COL_TIMESTAMP, $timestamp['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($timestamp['max'])) {
                $this->addUsingAlias(CryosphereWhereTableMap::COL_TIMESTAMP, $timestamp['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CryosphereWhereTableMap::COL_TIMESTAMP, $timestamp, $comparison);
    }

    /**
     * Filter the query by a related \CryoConnectDB\ExpertWhere object
     *
     * @param \CryoConnectDB\ExpertWhere|ObjectCollection $expertWhere the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildCryosphereWhereQuery The current query, for fluid interface
     */
    public function filterByExpertWhere($expertWhere, $comparison = null)
    {
        if ($expertWhere instanceof \CryoConnectDB\ExpertWhere) {
            return $this
                ->addUsingAlias(CryosphereWhereTableMap::COL_ID, $expertWhere->getCryosphereWhereId(), $comparison);
        } elseif ($expertWhere instanceof ObjectCollection) {
            return $this
                ->useExpertWhereQuery()
                ->filterByPrimaryKeys($expertWhere->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByExpertWhere() only accepts arguments of type \CryoConnectDB\ExpertWhere or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the ExpertWhere relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildCryosphereWhereQuery The current query, for fluid interface
     */
    public function joinExpertWhere($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('ExpertWhere');

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
            $this->addJoinObject($join, 'ExpertWhere');
        }

        return $this;
    }

    /**
     * Use the ExpertWhere relation ExpertWhere object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \CryoConnectDB\ExpertWhereQuery A secondary query class using the current class as primary query
     */
    public function useExpertWhereQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinExpertWhere($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'ExpertWhere', '\CryoConnectDB\ExpertWhereQuery');
    }

    /**
     * Filter the query by a related \CryoConnectDB\InformationSeekerConnectRequestCryosphereWhere object
     *
     * @param \CryoConnectDB\InformationSeekerConnectRequestCryosphereWhere|ObjectCollection $informationSeekerConnectRequestCryosphereWhere the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildCryosphereWhereQuery The current query, for fluid interface
     */
    public function filterByInformationSeekerConnectRequestCryosphereWhere($informationSeekerConnectRequestCryosphereWhere, $comparison = null)
    {
        if ($informationSeekerConnectRequestCryosphereWhere instanceof \CryoConnectDB\InformationSeekerConnectRequestCryosphereWhere) {
            return $this
                ->addUsingAlias(CryosphereWhereTableMap::COL_ID, $informationSeekerConnectRequestCryosphereWhere->getCryosphereWhereId(), $comparison);
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
     * @return $this|ChildCryosphereWhereQuery The current query, for fluid interface
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
     * Exclude object from result
     *
     * @param   ChildCryosphereWhere $cryosphereWhere Object to remove from the list of results
     *
     * @return $this|ChildCryosphereWhereQuery The current query, for fluid interface
     */
    public function prune($cryosphereWhere = null)
    {
        if ($cryosphereWhere) {
            $this->addUsingAlias(CryosphereWhereTableMap::COL_ID, $cryosphereWhere->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the cryosphere_where table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(CryosphereWhereTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            CryosphereWhereTableMap::clearInstancePool();
            CryosphereWhereTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(CryosphereWhereTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(CryosphereWhereTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            CryosphereWhereTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            CryosphereWhereTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // CryosphereWhereQuery
