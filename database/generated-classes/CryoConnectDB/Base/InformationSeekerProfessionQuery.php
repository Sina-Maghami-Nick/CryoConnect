<?php

namespace CryoConnectDB\Base;

use \Exception;
use \PDO;
use CryoConnectDB\InformationSeekerProfession as ChildInformationSeekerProfession;
use CryoConnectDB\InformationSeekerProfessionQuery as ChildInformationSeekerProfessionQuery;
use CryoConnectDB\Map\InformationSeekerProfessionTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'information_seeker_profession' table.
 *
 *
 *
 * @method     ChildInformationSeekerProfessionQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ChildInformationSeekerProfessionQuery orderByGeneralProfession($order = Criteria::ASC) Order by the general_profession column
 * @method     ChildInformationSeekerProfessionQuery orderByInformationSeekerId($order = Criteria::ASC) Order by the information_seeker_id column
 * @method     ChildInformationSeekerProfessionQuery orderByTimestamp($order = Criteria::ASC) Order by the timestamp column
 *
 * @method     ChildInformationSeekerProfessionQuery groupById() Group by the id column
 * @method     ChildInformationSeekerProfessionQuery groupByGeneralProfession() Group by the general_profession column
 * @method     ChildInformationSeekerProfessionQuery groupByInformationSeekerId() Group by the information_seeker_id column
 * @method     ChildInformationSeekerProfessionQuery groupByTimestamp() Group by the timestamp column
 *
 * @method     ChildInformationSeekerProfessionQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildInformationSeekerProfessionQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildInformationSeekerProfessionQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildInformationSeekerProfessionQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildInformationSeekerProfessionQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildInformationSeekerProfessionQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildInformationSeekerProfessionQuery leftJoinInformationSeekers($relationAlias = null) Adds a LEFT JOIN clause to the query using the InformationSeekers relation
 * @method     ChildInformationSeekerProfessionQuery rightJoinInformationSeekers($relationAlias = null) Adds a RIGHT JOIN clause to the query using the InformationSeekers relation
 * @method     ChildInformationSeekerProfessionQuery innerJoinInformationSeekers($relationAlias = null) Adds a INNER JOIN clause to the query using the InformationSeekers relation
 *
 * @method     ChildInformationSeekerProfessionQuery joinWithInformationSeekers($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the InformationSeekers relation
 *
 * @method     ChildInformationSeekerProfessionQuery leftJoinWithInformationSeekers() Adds a LEFT JOIN clause and with to the query using the InformationSeekers relation
 * @method     ChildInformationSeekerProfessionQuery rightJoinWithInformationSeekers() Adds a RIGHT JOIN clause and with to the query using the InformationSeekers relation
 * @method     ChildInformationSeekerProfessionQuery innerJoinWithInformationSeekers() Adds a INNER JOIN clause and with to the query using the InformationSeekers relation
 *
 * @method     \CryoConnectDB\InformationSeekersQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildInformationSeekerProfession findOne(ConnectionInterface $con = null) Return the first ChildInformationSeekerProfession matching the query
 * @method     ChildInformationSeekerProfession findOneOrCreate(ConnectionInterface $con = null) Return the first ChildInformationSeekerProfession matching the query, or a new ChildInformationSeekerProfession object populated from the query conditions when no match is found
 *
 * @method     ChildInformationSeekerProfession findOneById(int $id) Return the first ChildInformationSeekerProfession filtered by the id column
 * @method     ChildInformationSeekerProfession findOneByGeneralProfession(string $general_profession) Return the first ChildInformationSeekerProfession filtered by the general_profession column
 * @method     ChildInformationSeekerProfession findOneByInformationSeekerId(int $information_seeker_id) Return the first ChildInformationSeekerProfession filtered by the information_seeker_id column
 * @method     ChildInformationSeekerProfession findOneByTimestamp(string $timestamp) Return the first ChildInformationSeekerProfession filtered by the timestamp column *

 * @method     ChildInformationSeekerProfession requirePk($key, ConnectionInterface $con = null) Return the ChildInformationSeekerProfession by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildInformationSeekerProfession requireOne(ConnectionInterface $con = null) Return the first ChildInformationSeekerProfession matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildInformationSeekerProfession requireOneById(int $id) Return the first ChildInformationSeekerProfession filtered by the id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildInformationSeekerProfession requireOneByGeneralProfession(string $general_profession) Return the first ChildInformationSeekerProfession filtered by the general_profession column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildInformationSeekerProfession requireOneByInformationSeekerId(int $information_seeker_id) Return the first ChildInformationSeekerProfession filtered by the information_seeker_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildInformationSeekerProfession requireOneByTimestamp(string $timestamp) Return the first ChildInformationSeekerProfession filtered by the timestamp column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildInformationSeekerProfession[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildInformationSeekerProfession objects based on current ModelCriteria
 * @method     ChildInformationSeekerProfession[]|ObjectCollection findById(int $id) Return ChildInformationSeekerProfession objects filtered by the id column
 * @method     ChildInformationSeekerProfession[]|ObjectCollection findByGeneralProfession(string $general_profession) Return ChildInformationSeekerProfession objects filtered by the general_profession column
 * @method     ChildInformationSeekerProfession[]|ObjectCollection findByInformationSeekerId(int $information_seeker_id) Return ChildInformationSeekerProfession objects filtered by the information_seeker_id column
 * @method     ChildInformationSeekerProfession[]|ObjectCollection findByTimestamp(string $timestamp) Return ChildInformationSeekerProfession objects filtered by the timestamp column
 * @method     ChildInformationSeekerProfession[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class InformationSeekerProfessionQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \CryoConnectDB\Base\InformationSeekerProfessionQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\CryoConnectDB\\InformationSeekerProfession', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildInformationSeekerProfessionQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildInformationSeekerProfessionQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildInformationSeekerProfessionQuery) {
            return $criteria;
        }
        $query = new ChildInformationSeekerProfessionQuery();
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
     * @return ChildInformationSeekerProfession|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(InformationSeekerProfessionTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = InformationSeekerProfessionTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildInformationSeekerProfession A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT id, general_profession, information_seeker_id, timestamp FROM information_seeker_profession WHERE id = :p0';
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
            /** @var ChildInformationSeekerProfession $obj */
            $obj = new ChildInformationSeekerProfession();
            $obj->hydrate($row);
            InformationSeekerProfessionTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildInformationSeekerProfession|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildInformationSeekerProfessionQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(InformationSeekerProfessionTableMap::COL_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildInformationSeekerProfessionQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(InformationSeekerProfessionTableMap::COL_ID, $keys, Criteria::IN);
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
     * @return $this|ChildInformationSeekerProfessionQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(InformationSeekerProfessionTableMap::COL_ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(InformationSeekerProfessionTableMap::COL_ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(InformationSeekerProfessionTableMap::COL_ID, $id, $comparison);
    }

    /**
     * Filter the query on the general_profession column
     *
     * Example usage:
     * <code>
     * $query->filterByGeneralProfession('fooValue');   // WHERE general_profession = 'fooValue'
     * $query->filterByGeneralProfession('%fooValue%', Criteria::LIKE); // WHERE general_profession LIKE '%fooValue%'
     * </code>
     *
     * @param     string $generalProfession The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildInformationSeekerProfessionQuery The current query, for fluid interface
     */
    public function filterByGeneralProfession($generalProfession = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($generalProfession)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(InformationSeekerProfessionTableMap::COL_GENERAL_PROFESSION, $generalProfession, $comparison);
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
     * @return $this|ChildInformationSeekerProfessionQuery The current query, for fluid interface
     */
    public function filterByInformationSeekerId($informationSeekerId = null, $comparison = null)
    {
        if (is_array($informationSeekerId)) {
            $useMinMax = false;
            if (isset($informationSeekerId['min'])) {
                $this->addUsingAlias(InformationSeekerProfessionTableMap::COL_INFORMATION_SEEKER_ID, $informationSeekerId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($informationSeekerId['max'])) {
                $this->addUsingAlias(InformationSeekerProfessionTableMap::COL_INFORMATION_SEEKER_ID, $informationSeekerId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(InformationSeekerProfessionTableMap::COL_INFORMATION_SEEKER_ID, $informationSeekerId, $comparison);
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
     * @return $this|ChildInformationSeekerProfessionQuery The current query, for fluid interface
     */
    public function filterByTimestamp($timestamp = null, $comparison = null)
    {
        if (is_array($timestamp)) {
            $useMinMax = false;
            if (isset($timestamp['min'])) {
                $this->addUsingAlias(InformationSeekerProfessionTableMap::COL_TIMESTAMP, $timestamp['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($timestamp['max'])) {
                $this->addUsingAlias(InformationSeekerProfessionTableMap::COL_TIMESTAMP, $timestamp['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(InformationSeekerProfessionTableMap::COL_TIMESTAMP, $timestamp, $comparison);
    }

    /**
     * Filter the query by a related \CryoConnectDB\InformationSeekers object
     *
     * @param \CryoConnectDB\InformationSeekers|ObjectCollection $informationSeekers The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildInformationSeekerProfessionQuery The current query, for fluid interface
     */
    public function filterByInformationSeekers($informationSeekers, $comparison = null)
    {
        if ($informationSeekers instanceof \CryoConnectDB\InformationSeekers) {
            return $this
                ->addUsingAlias(InformationSeekerProfessionTableMap::COL_INFORMATION_SEEKER_ID, $informationSeekers->getId(), $comparison);
        } elseif ($informationSeekers instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(InformationSeekerProfessionTableMap::COL_INFORMATION_SEEKER_ID, $informationSeekers->toKeyValue('PrimaryKey', 'Id'), $comparison);
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
     * @return $this|ChildInformationSeekerProfessionQuery The current query, for fluid interface
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
     * Exclude object from result
     *
     * @param   ChildInformationSeekerProfession $informationSeekerProfession Object to remove from the list of results
     *
     * @return $this|ChildInformationSeekerProfessionQuery The current query, for fluid interface
     */
    public function prune($informationSeekerProfession = null)
    {
        if ($informationSeekerProfession) {
            $this->addUsingAlias(InformationSeekerProfessionTableMap::COL_ID, $informationSeekerProfession->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the information_seeker_profession table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(InformationSeekerProfessionTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            InformationSeekerProfessionTableMap::clearInstancePool();
            InformationSeekerProfessionTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(InformationSeekerProfessionTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(InformationSeekerProfessionTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            InformationSeekerProfessionTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            InformationSeekerProfessionTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // InformationSeekerProfessionQuery
