<?php

namespace Base;

use \CryosphereWhatSpecefic as ChildCryosphereWhatSpecefic;
use \CryosphereWhatSpeceficQuery as ChildCryosphereWhatSpeceficQuery;
use \Exception;
use \PDO;
use Map\CryosphereWhatSpeceficTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'cryosphere_what_specefic' table.
 *
 *
 *
 * @method     ChildCryosphereWhatSpeceficQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ChildCryosphereWhatSpeceficQuery orderByCryosphereWhatSpeceficName($order = Criteria::ASC) Order by the cryosphere_what_specefic_name column
 * @method     ChildCryosphereWhatSpeceficQuery orderByTimestamp($order = Criteria::ASC) Order by the timestamp column
 *
 * @method     ChildCryosphereWhatSpeceficQuery groupById() Group by the id column
 * @method     ChildCryosphereWhatSpeceficQuery groupByCryosphereWhatSpeceficName() Group by the cryosphere_what_specefic_name column
 * @method     ChildCryosphereWhatSpeceficQuery groupByTimestamp() Group by the timestamp column
 *
 * @method     ChildCryosphereWhatSpeceficQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildCryosphereWhatSpeceficQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildCryosphereWhatSpeceficQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildCryosphereWhatSpeceficQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildCryosphereWhatSpeceficQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildCryosphereWhatSpeceficQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildCryosphereWhatSpeceficQuery leftJoinExpertCryosphereWhatSpecefic($relationAlias = null) Adds a LEFT JOIN clause to the query using the ExpertCryosphereWhatSpecefic relation
 * @method     ChildCryosphereWhatSpeceficQuery rightJoinExpertCryosphereWhatSpecefic($relationAlias = null) Adds a RIGHT JOIN clause to the query using the ExpertCryosphereWhatSpecefic relation
 * @method     ChildCryosphereWhatSpeceficQuery innerJoinExpertCryosphereWhatSpecefic($relationAlias = null) Adds a INNER JOIN clause to the query using the ExpertCryosphereWhatSpecefic relation
 *
 * @method     ChildCryosphereWhatSpeceficQuery joinWithExpertCryosphereWhatSpecefic($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the ExpertCryosphereWhatSpecefic relation
 *
 * @method     ChildCryosphereWhatSpeceficQuery leftJoinWithExpertCryosphereWhatSpecefic() Adds a LEFT JOIN clause and with to the query using the ExpertCryosphereWhatSpecefic relation
 * @method     ChildCryosphereWhatSpeceficQuery rightJoinWithExpertCryosphereWhatSpecefic() Adds a RIGHT JOIN clause and with to the query using the ExpertCryosphereWhatSpecefic relation
 * @method     ChildCryosphereWhatSpeceficQuery innerJoinWithExpertCryosphereWhatSpecefic() Adds a INNER JOIN clause and with to the query using the ExpertCryosphereWhatSpecefic relation
 *
 * @method     \ExpertCryosphereWhatSpeceficQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildCryosphereWhatSpecefic findOne(ConnectionInterface $con = null) Return the first ChildCryosphereWhatSpecefic matching the query
 * @method     ChildCryosphereWhatSpecefic findOneOrCreate(ConnectionInterface $con = null) Return the first ChildCryosphereWhatSpecefic matching the query, or a new ChildCryosphereWhatSpecefic object populated from the query conditions when no match is found
 *
 * @method     ChildCryosphereWhatSpecefic findOneById(int $id) Return the first ChildCryosphereWhatSpecefic filtered by the id column
 * @method     ChildCryosphereWhatSpecefic findOneByCryosphereWhatSpeceficName(string $cryosphere_what_specefic_name) Return the first ChildCryosphereWhatSpecefic filtered by the cryosphere_what_specefic_name column
 * @method     ChildCryosphereWhatSpecefic findOneByTimestamp(string $timestamp) Return the first ChildCryosphereWhatSpecefic filtered by the timestamp column *

 * @method     ChildCryosphereWhatSpecefic requirePk($key, ConnectionInterface $con = null) Return the ChildCryosphereWhatSpecefic by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCryosphereWhatSpecefic requireOne(ConnectionInterface $con = null) Return the first ChildCryosphereWhatSpecefic matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildCryosphereWhatSpecefic requireOneById(int $id) Return the first ChildCryosphereWhatSpecefic filtered by the id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCryosphereWhatSpecefic requireOneByCryosphereWhatSpeceficName(string $cryosphere_what_specefic_name) Return the first ChildCryosphereWhatSpecefic filtered by the cryosphere_what_specefic_name column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCryosphereWhatSpecefic requireOneByTimestamp(string $timestamp) Return the first ChildCryosphereWhatSpecefic filtered by the timestamp column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildCryosphereWhatSpecefic[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildCryosphereWhatSpecefic objects based on current ModelCriteria
 * @method     ChildCryosphereWhatSpecefic[]|ObjectCollection findById(int $id) Return ChildCryosphereWhatSpecefic objects filtered by the id column
 * @method     ChildCryosphereWhatSpecefic[]|ObjectCollection findByCryosphereWhatSpeceficName(string $cryosphere_what_specefic_name) Return ChildCryosphereWhatSpecefic objects filtered by the cryosphere_what_specefic_name column
 * @method     ChildCryosphereWhatSpecefic[]|ObjectCollection findByTimestamp(string $timestamp) Return ChildCryosphereWhatSpecefic objects filtered by the timestamp column
 * @method     ChildCryosphereWhatSpecefic[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class CryosphereWhatSpeceficQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\CryosphereWhatSpeceficQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'cryo_connect', $modelName = '\\CryosphereWhatSpecefic', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildCryosphereWhatSpeceficQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildCryosphereWhatSpeceficQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildCryosphereWhatSpeceficQuery) {
            return $criteria;
        }
        $query = new ChildCryosphereWhatSpeceficQuery();
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
     * @return ChildCryosphereWhatSpecefic|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(CryosphereWhatSpeceficTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = CryosphereWhatSpeceficTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildCryosphereWhatSpecefic A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT id, cryosphere_what_specefic_name, timestamp FROM cryosphere_what_specefic WHERE id = :p0';
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
            /** @var ChildCryosphereWhatSpecefic $obj */
            $obj = new ChildCryosphereWhatSpecefic();
            $obj->hydrate($row);
            CryosphereWhatSpeceficTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildCryosphereWhatSpecefic|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildCryosphereWhatSpeceficQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(CryosphereWhatSpeceficTableMap::COL_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildCryosphereWhatSpeceficQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(CryosphereWhatSpeceficTableMap::COL_ID, $keys, Criteria::IN);
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
     * @return $this|ChildCryosphereWhatSpeceficQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(CryosphereWhatSpeceficTableMap::COL_ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(CryosphereWhatSpeceficTableMap::COL_ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CryosphereWhatSpeceficTableMap::COL_ID, $id, $comparison);
    }

    /**
     * Filter the query on the cryosphere_what_specefic_name column
     *
     * Example usage:
     * <code>
     * $query->filterByCryosphereWhatSpeceficName('fooValue');   // WHERE cryosphere_what_specefic_name = 'fooValue'
     * $query->filterByCryosphereWhatSpeceficName('%fooValue%', Criteria::LIKE); // WHERE cryosphere_what_specefic_name LIKE '%fooValue%'
     * </code>
     *
     * @param     string $cryosphereWhatSpeceficName The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildCryosphereWhatSpeceficQuery The current query, for fluid interface
     */
    public function filterByCryosphereWhatSpeceficName($cryosphereWhatSpeceficName = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($cryosphereWhatSpeceficName)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CryosphereWhatSpeceficTableMap::COL_CRYOSPHERE_WHAT_SPECEFIC_NAME, $cryosphereWhatSpeceficName, $comparison);
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
     * @return $this|ChildCryosphereWhatSpeceficQuery The current query, for fluid interface
     */
    public function filterByTimestamp($timestamp = null, $comparison = null)
    {
        if (is_array($timestamp)) {
            $useMinMax = false;
            if (isset($timestamp['min'])) {
                $this->addUsingAlias(CryosphereWhatSpeceficTableMap::COL_TIMESTAMP, $timestamp['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($timestamp['max'])) {
                $this->addUsingAlias(CryosphereWhatSpeceficTableMap::COL_TIMESTAMP, $timestamp['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CryosphereWhatSpeceficTableMap::COL_TIMESTAMP, $timestamp, $comparison);
    }

    /**
     * Filter the query by a related \ExpertCryosphereWhatSpecefic object
     *
     * @param \ExpertCryosphereWhatSpecefic|ObjectCollection $expertCryosphereWhatSpecefic the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildCryosphereWhatSpeceficQuery The current query, for fluid interface
     */
    public function filterByExpertCryosphereWhatSpecefic($expertCryosphereWhatSpecefic, $comparison = null)
    {
        if ($expertCryosphereWhatSpecefic instanceof \ExpertCryosphereWhatSpecefic) {
            return $this
                ->addUsingAlias(CryosphereWhatSpeceficTableMap::COL_ID, $expertCryosphereWhatSpecefic->getCryosphereWhatSpeceficId(), $comparison);
        } elseif ($expertCryosphereWhatSpecefic instanceof ObjectCollection) {
            return $this
                ->useExpertCryosphereWhatSpeceficQuery()
                ->filterByPrimaryKeys($expertCryosphereWhatSpecefic->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByExpertCryosphereWhatSpecefic() only accepts arguments of type \ExpertCryosphereWhatSpecefic or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the ExpertCryosphereWhatSpecefic relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildCryosphereWhatSpeceficQuery The current query, for fluid interface
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
     * @return \ExpertCryosphereWhatSpeceficQuery A secondary query class using the current class as primary query
     */
    public function useExpertCryosphereWhatSpeceficQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinExpertCryosphereWhatSpecefic($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'ExpertCryosphereWhatSpecefic', '\ExpertCryosphereWhatSpeceficQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ChildCryosphereWhatSpecefic $cryosphereWhatSpecefic Object to remove from the list of results
     *
     * @return $this|ChildCryosphereWhatSpeceficQuery The current query, for fluid interface
     */
    public function prune($cryosphereWhatSpecefic = null)
    {
        if ($cryosphereWhatSpecefic) {
            $this->addUsingAlias(CryosphereWhatSpeceficTableMap::COL_ID, $cryosphereWhatSpecefic->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the cryosphere_what_specefic table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(CryosphereWhatSpeceficTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            CryosphereWhatSpeceficTableMap::clearInstancePool();
            CryosphereWhatSpeceficTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(CryosphereWhatSpeceficTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(CryosphereWhatSpeceficTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            CryosphereWhatSpeceficTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            CryosphereWhatSpeceficTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // CryosphereWhatSpeceficQuery
