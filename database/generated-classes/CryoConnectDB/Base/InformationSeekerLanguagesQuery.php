<?php

namespace CryoConnectDB\Base;

use \Exception;
use \PDO;
use CryoConnectDB\InformationSeekerLanguages as ChildInformationSeekerLanguages;
use CryoConnectDB\InformationSeekerLanguagesQuery as ChildInformationSeekerLanguagesQuery;
use CryoConnectDB\Map\InformationSeekerLanguagesTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'information_seeker_languages' table.
 *
 *
 *
 * @method     ChildInformationSeekerLanguagesQuery orderByInformationSeekerId($order = Criteria::ASC) Order by the Information_seeker_id column
 * @method     ChildInformationSeekerLanguagesQuery orderByLanguageCode($order = Criteria::ASC) Order by the language_code column
 * @method     ChildInformationSeekerLanguagesQuery orderByTimestamp($order = Criteria::ASC) Order by the timestamp column
 *
 * @method     ChildInformationSeekerLanguagesQuery groupByInformationSeekerId() Group by the Information_seeker_id column
 * @method     ChildInformationSeekerLanguagesQuery groupByLanguageCode() Group by the language_code column
 * @method     ChildInformationSeekerLanguagesQuery groupByTimestamp() Group by the timestamp column
 *
 * @method     ChildInformationSeekerLanguagesQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildInformationSeekerLanguagesQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildInformationSeekerLanguagesQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildInformationSeekerLanguagesQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildInformationSeekerLanguagesQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildInformationSeekerLanguagesQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildInformationSeekerLanguagesQuery leftJoinInformationSeekers($relationAlias = null) Adds a LEFT JOIN clause to the query using the InformationSeekers relation
 * @method     ChildInformationSeekerLanguagesQuery rightJoinInformationSeekers($relationAlias = null) Adds a RIGHT JOIN clause to the query using the InformationSeekers relation
 * @method     ChildInformationSeekerLanguagesQuery innerJoinInformationSeekers($relationAlias = null) Adds a INNER JOIN clause to the query using the InformationSeekers relation
 *
 * @method     ChildInformationSeekerLanguagesQuery joinWithInformationSeekers($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the InformationSeekers relation
 *
 * @method     ChildInformationSeekerLanguagesQuery leftJoinWithInformationSeekers() Adds a LEFT JOIN clause and with to the query using the InformationSeekers relation
 * @method     ChildInformationSeekerLanguagesQuery rightJoinWithInformationSeekers() Adds a RIGHT JOIN clause and with to the query using the InformationSeekers relation
 * @method     ChildInformationSeekerLanguagesQuery innerJoinWithInformationSeekers() Adds a INNER JOIN clause and with to the query using the InformationSeekers relation
 *
 * @method     ChildInformationSeekerLanguagesQuery leftJoinLanguages($relationAlias = null) Adds a LEFT JOIN clause to the query using the Languages relation
 * @method     ChildInformationSeekerLanguagesQuery rightJoinLanguages($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Languages relation
 * @method     ChildInformationSeekerLanguagesQuery innerJoinLanguages($relationAlias = null) Adds a INNER JOIN clause to the query using the Languages relation
 *
 * @method     ChildInformationSeekerLanguagesQuery joinWithLanguages($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Languages relation
 *
 * @method     ChildInformationSeekerLanguagesQuery leftJoinWithLanguages() Adds a LEFT JOIN clause and with to the query using the Languages relation
 * @method     ChildInformationSeekerLanguagesQuery rightJoinWithLanguages() Adds a RIGHT JOIN clause and with to the query using the Languages relation
 * @method     ChildInformationSeekerLanguagesQuery innerJoinWithLanguages() Adds a INNER JOIN clause and with to the query using the Languages relation
 *
 * @method     \CryoConnectDB\InformationSeekersQuery|\CryoConnectDB\LanguagesQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildInformationSeekerLanguages findOne(ConnectionInterface $con = null) Return the first ChildInformationSeekerLanguages matching the query
 * @method     ChildInformationSeekerLanguages findOneOrCreate(ConnectionInterface $con = null) Return the first ChildInformationSeekerLanguages matching the query, or a new ChildInformationSeekerLanguages object populated from the query conditions when no match is found
 *
 * @method     ChildInformationSeekerLanguages findOneByInformationSeekerId(int $Information_seeker_id) Return the first ChildInformationSeekerLanguages filtered by the Information_seeker_id column
 * @method     ChildInformationSeekerLanguages findOneByLanguageCode(string $language_code) Return the first ChildInformationSeekerLanguages filtered by the language_code column
 * @method     ChildInformationSeekerLanguages findOneByTimestamp(string $timestamp) Return the first ChildInformationSeekerLanguages filtered by the timestamp column *

 * @method     ChildInformationSeekerLanguages requirePk($key, ConnectionInterface $con = null) Return the ChildInformationSeekerLanguages by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildInformationSeekerLanguages requireOne(ConnectionInterface $con = null) Return the first ChildInformationSeekerLanguages matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildInformationSeekerLanguages requireOneByInformationSeekerId(int $Information_seeker_id) Return the first ChildInformationSeekerLanguages filtered by the Information_seeker_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildInformationSeekerLanguages requireOneByLanguageCode(string $language_code) Return the first ChildInformationSeekerLanguages filtered by the language_code column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildInformationSeekerLanguages requireOneByTimestamp(string $timestamp) Return the first ChildInformationSeekerLanguages filtered by the timestamp column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildInformationSeekerLanguages[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildInformationSeekerLanguages objects based on current ModelCriteria
 * @method     ChildInformationSeekerLanguages[]|ObjectCollection findByInformationSeekerId(int $Information_seeker_id) Return ChildInformationSeekerLanguages objects filtered by the Information_seeker_id column
 * @method     ChildInformationSeekerLanguages[]|ObjectCollection findByLanguageCode(string $language_code) Return ChildInformationSeekerLanguages objects filtered by the language_code column
 * @method     ChildInformationSeekerLanguages[]|ObjectCollection findByTimestamp(string $timestamp) Return ChildInformationSeekerLanguages objects filtered by the timestamp column
 * @method     ChildInformationSeekerLanguages[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class InformationSeekerLanguagesQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \CryoConnectDB\Base\InformationSeekerLanguagesQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\CryoConnectDB\\InformationSeekerLanguages', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildInformationSeekerLanguagesQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildInformationSeekerLanguagesQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildInformationSeekerLanguagesQuery) {
            return $criteria;
        }
        $query = new ChildInformationSeekerLanguagesQuery();
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
     * $obj = $c->findPk(array(12, 34), $con);
     * </code>
     *
     * @param array[$Information_seeker_id, $language_code] $key Primary key to use for the query
     * @param ConnectionInterface $con an optional connection object
     *
     * @return ChildInformationSeekerLanguages|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(InformationSeekerLanguagesTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = InformationSeekerLanguagesTableMap::getInstanceFromPool(serialize([(null === $key[0] || is_scalar($key[0]) || is_callable([$key[0], '__toString']) ? (string) $key[0] : $key[0]), (null === $key[1] || is_scalar($key[1]) || is_callable([$key[1], '__toString']) ? (string) $key[1] : $key[1])]))))) {
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
     * @return ChildInformationSeekerLanguages A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT Information_seeker_id, language_code, timestamp FROM information_seeker_languages WHERE Information_seeker_id = :p0 AND language_code = :p1';
        try {
            $stmt = $con->prepare($sql);
            $stmt->bindValue(':p0', $key[0], PDO::PARAM_INT);
            $stmt->bindValue(':p1', $key[1], PDO::PARAM_STR);
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute SELECT statement [%s]', $sql), 0, $e);
        }
        $obj = null;
        if ($row = $stmt->fetch(\PDO::FETCH_NUM)) {
            /** @var ChildInformationSeekerLanguages $obj */
            $obj = new ChildInformationSeekerLanguages();
            $obj->hydrate($row);
            InformationSeekerLanguagesTableMap::addInstanceToPool($obj, serialize([(null === $key[0] || is_scalar($key[0]) || is_callable([$key[0], '__toString']) ? (string) $key[0] : $key[0]), (null === $key[1] || is_scalar($key[1]) || is_callable([$key[1], '__toString']) ? (string) $key[1] : $key[1])]));
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
     * @return ChildInformationSeekerLanguages|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildInformationSeekerLanguagesQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {
        $this->addUsingAlias(InformationSeekerLanguagesTableMap::COL_INFORMATION_SEEKER_ID, $key[0], Criteria::EQUAL);
        $this->addUsingAlias(InformationSeekerLanguagesTableMap::COL_LANGUAGE_CODE, $key[1], Criteria::EQUAL);

        return $this;
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildInformationSeekerLanguagesQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {
        if (empty($keys)) {
            return $this->add(null, '1<>1', Criteria::CUSTOM);
        }
        foreach ($keys as $key) {
            $cton0 = $this->getNewCriterion(InformationSeekerLanguagesTableMap::COL_INFORMATION_SEEKER_ID, $key[0], Criteria::EQUAL);
            $cton1 = $this->getNewCriterion(InformationSeekerLanguagesTableMap::COL_LANGUAGE_CODE, $key[1], Criteria::EQUAL);
            $cton0->addAnd($cton1);
            $this->addOr($cton0);
        }

        return $this;
    }

    /**
     * Filter the query on the Information_seeker_id column
     *
     * Example usage:
     * <code>
     * $query->filterByInformationSeekerId(1234); // WHERE Information_seeker_id = 1234
     * $query->filterByInformationSeekerId(array(12, 34)); // WHERE Information_seeker_id IN (12, 34)
     * $query->filterByInformationSeekerId(array('min' => 12)); // WHERE Information_seeker_id > 12
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
     * @return $this|ChildInformationSeekerLanguagesQuery The current query, for fluid interface
     */
    public function filterByInformationSeekerId($informationSeekerId = null, $comparison = null)
    {
        if (is_array($informationSeekerId)) {
            $useMinMax = false;
            if (isset($informationSeekerId['min'])) {
                $this->addUsingAlias(InformationSeekerLanguagesTableMap::COL_INFORMATION_SEEKER_ID, $informationSeekerId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($informationSeekerId['max'])) {
                $this->addUsingAlias(InformationSeekerLanguagesTableMap::COL_INFORMATION_SEEKER_ID, $informationSeekerId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(InformationSeekerLanguagesTableMap::COL_INFORMATION_SEEKER_ID, $informationSeekerId, $comparison);
    }

    /**
     * Filter the query on the language_code column
     *
     * Example usage:
     * <code>
     * $query->filterByLanguageCode('fooValue');   // WHERE language_code = 'fooValue'
     * $query->filterByLanguageCode('%fooValue%', Criteria::LIKE); // WHERE language_code LIKE '%fooValue%'
     * </code>
     *
     * @param     string $languageCode The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildInformationSeekerLanguagesQuery The current query, for fluid interface
     */
    public function filterByLanguageCode($languageCode = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($languageCode)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(InformationSeekerLanguagesTableMap::COL_LANGUAGE_CODE, $languageCode, $comparison);
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
     * @return $this|ChildInformationSeekerLanguagesQuery The current query, for fluid interface
     */
    public function filterByTimestamp($timestamp = null, $comparison = null)
    {
        if (is_array($timestamp)) {
            $useMinMax = false;
            if (isset($timestamp['min'])) {
                $this->addUsingAlias(InformationSeekerLanguagesTableMap::COL_TIMESTAMP, $timestamp['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($timestamp['max'])) {
                $this->addUsingAlias(InformationSeekerLanguagesTableMap::COL_TIMESTAMP, $timestamp['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(InformationSeekerLanguagesTableMap::COL_TIMESTAMP, $timestamp, $comparison);
    }

    /**
     * Filter the query by a related \CryoConnectDB\InformationSeekers object
     *
     * @param \CryoConnectDB\InformationSeekers|ObjectCollection $informationSeekers The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildInformationSeekerLanguagesQuery The current query, for fluid interface
     */
    public function filterByInformationSeekers($informationSeekers, $comparison = null)
    {
        if ($informationSeekers instanceof \CryoConnectDB\InformationSeekers) {
            return $this
                ->addUsingAlias(InformationSeekerLanguagesTableMap::COL_INFORMATION_SEEKER_ID, $informationSeekers->getId(), $comparison);
        } elseif ($informationSeekers instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(InformationSeekerLanguagesTableMap::COL_INFORMATION_SEEKER_ID, $informationSeekers->toKeyValue('PrimaryKey', 'Id'), $comparison);
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
     * @return $this|ChildInformationSeekerLanguagesQuery The current query, for fluid interface
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
     * Filter the query by a related \CryoConnectDB\Languages object
     *
     * @param \CryoConnectDB\Languages|ObjectCollection $languages The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildInformationSeekerLanguagesQuery The current query, for fluid interface
     */
    public function filterByLanguages($languages, $comparison = null)
    {
        if ($languages instanceof \CryoConnectDB\Languages) {
            return $this
                ->addUsingAlias(InformationSeekerLanguagesTableMap::COL_LANGUAGE_CODE, $languages->getLanguageCode(), $comparison);
        } elseif ($languages instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(InformationSeekerLanguagesTableMap::COL_LANGUAGE_CODE, $languages->toKeyValue('PrimaryKey', 'LanguageCode'), $comparison);
        } else {
            throw new PropelException('filterByLanguages() only accepts arguments of type \CryoConnectDB\Languages or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Languages relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildInformationSeekerLanguagesQuery The current query, for fluid interface
     */
    public function joinLanguages($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Languages');

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
            $this->addJoinObject($join, 'Languages');
        }

        return $this;
    }

    /**
     * Use the Languages relation Languages object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \CryoConnectDB\LanguagesQuery A secondary query class using the current class as primary query
     */
    public function useLanguagesQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinLanguages($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Languages', '\CryoConnectDB\LanguagesQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ChildInformationSeekerLanguages $informationSeekerLanguages Object to remove from the list of results
     *
     * @return $this|ChildInformationSeekerLanguagesQuery The current query, for fluid interface
     */
    public function prune($informationSeekerLanguages = null)
    {
        if ($informationSeekerLanguages) {
            $this->addCond('pruneCond0', $this->getAliasedColName(InformationSeekerLanguagesTableMap::COL_INFORMATION_SEEKER_ID), $informationSeekerLanguages->getInformationSeekerId(), Criteria::NOT_EQUAL);
            $this->addCond('pruneCond1', $this->getAliasedColName(InformationSeekerLanguagesTableMap::COL_LANGUAGE_CODE), $informationSeekerLanguages->getLanguageCode(), Criteria::NOT_EQUAL);
            $this->combine(array('pruneCond0', 'pruneCond1'), Criteria::LOGICAL_OR);
        }

        return $this;
    }

    /**
     * Deletes all rows from the information_seeker_languages table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(InformationSeekerLanguagesTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            InformationSeekerLanguagesTableMap::clearInstancePool();
            InformationSeekerLanguagesTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(InformationSeekerLanguagesTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(InformationSeekerLanguagesTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            InformationSeekerLanguagesTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            InformationSeekerLanguagesTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // InformationSeekerLanguagesQuery
