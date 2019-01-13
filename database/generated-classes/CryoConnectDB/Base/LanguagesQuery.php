<?php

namespace CryoConnectDB\Base;

use \Exception;
use \PDO;
use CryoConnectDB\Languages as ChildLanguages;
use CryoConnectDB\LanguagesQuery as ChildLanguagesQuery;
use CryoConnectDB\Map\LanguagesTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'languages' table.
 *
 *
 *
 * @method     ChildLanguagesQuery orderByLanguageCode($order = Criteria::ASC) Order by the language_code column
 * @method     ChildLanguagesQuery orderByLanguage($order = Criteria::ASC) Order by the language column
 *
 * @method     ChildLanguagesQuery groupByLanguageCode() Group by the language_code column
 * @method     ChildLanguagesQuery groupByLanguage() Group by the language column
 *
 * @method     ChildLanguagesQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildLanguagesQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildLanguagesQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildLanguagesQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildLanguagesQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildLanguagesQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildLanguagesQuery leftJoinExpertLanguages($relationAlias = null) Adds a LEFT JOIN clause to the query using the ExpertLanguages relation
 * @method     ChildLanguagesQuery rightJoinExpertLanguages($relationAlias = null) Adds a RIGHT JOIN clause to the query using the ExpertLanguages relation
 * @method     ChildLanguagesQuery innerJoinExpertLanguages($relationAlias = null) Adds a INNER JOIN clause to the query using the ExpertLanguages relation
 *
 * @method     ChildLanguagesQuery joinWithExpertLanguages($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the ExpertLanguages relation
 *
 * @method     ChildLanguagesQuery leftJoinWithExpertLanguages() Adds a LEFT JOIN clause and with to the query using the ExpertLanguages relation
 * @method     ChildLanguagesQuery rightJoinWithExpertLanguages() Adds a RIGHT JOIN clause and with to the query using the ExpertLanguages relation
 * @method     ChildLanguagesQuery innerJoinWithExpertLanguages() Adds a INNER JOIN clause and with to the query using the ExpertLanguages relation
 *
 * @method     ChildLanguagesQuery leftJoinInformationSeekerConnectRequestLanguages($relationAlias = null) Adds a LEFT JOIN clause to the query using the InformationSeekerConnectRequestLanguages relation
 * @method     ChildLanguagesQuery rightJoinInformationSeekerConnectRequestLanguages($relationAlias = null) Adds a RIGHT JOIN clause to the query using the InformationSeekerConnectRequestLanguages relation
 * @method     ChildLanguagesQuery innerJoinInformationSeekerConnectRequestLanguages($relationAlias = null) Adds a INNER JOIN clause to the query using the InformationSeekerConnectRequestLanguages relation
 *
 * @method     ChildLanguagesQuery joinWithInformationSeekerConnectRequestLanguages($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the InformationSeekerConnectRequestLanguages relation
 *
 * @method     ChildLanguagesQuery leftJoinWithInformationSeekerConnectRequestLanguages() Adds a LEFT JOIN clause and with to the query using the InformationSeekerConnectRequestLanguages relation
 * @method     ChildLanguagesQuery rightJoinWithInformationSeekerConnectRequestLanguages() Adds a RIGHT JOIN clause and with to the query using the InformationSeekerConnectRequestLanguages relation
 * @method     ChildLanguagesQuery innerJoinWithInformationSeekerConnectRequestLanguages() Adds a INNER JOIN clause and with to the query using the InformationSeekerConnectRequestLanguages relation
 *
 * @method     ChildLanguagesQuery leftJoinInformationSeekerLanguages($relationAlias = null) Adds a LEFT JOIN clause to the query using the InformationSeekerLanguages relation
 * @method     ChildLanguagesQuery rightJoinInformationSeekerLanguages($relationAlias = null) Adds a RIGHT JOIN clause to the query using the InformationSeekerLanguages relation
 * @method     ChildLanguagesQuery innerJoinInformationSeekerLanguages($relationAlias = null) Adds a INNER JOIN clause to the query using the InformationSeekerLanguages relation
 *
 * @method     ChildLanguagesQuery joinWithInformationSeekerLanguages($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the InformationSeekerLanguages relation
 *
 * @method     ChildLanguagesQuery leftJoinWithInformationSeekerLanguages() Adds a LEFT JOIN clause and with to the query using the InformationSeekerLanguages relation
 * @method     ChildLanguagesQuery rightJoinWithInformationSeekerLanguages() Adds a RIGHT JOIN clause and with to the query using the InformationSeekerLanguages relation
 * @method     ChildLanguagesQuery innerJoinWithInformationSeekerLanguages() Adds a INNER JOIN clause and with to the query using the InformationSeekerLanguages relation
 *
 * @method     \CryoConnectDB\ExpertLanguagesQuery|\CryoConnectDB\InformationSeekerConnectRequestLanguagesQuery|\CryoConnectDB\InformationSeekerLanguagesQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildLanguages findOne(ConnectionInterface $con = null) Return the first ChildLanguages matching the query
 * @method     ChildLanguages findOneOrCreate(ConnectionInterface $con = null) Return the first ChildLanguages matching the query, or a new ChildLanguages object populated from the query conditions when no match is found
 *
 * @method     ChildLanguages findOneByLanguageCode(string $language_code) Return the first ChildLanguages filtered by the language_code column
 * @method     ChildLanguages findOneByLanguage(string $language) Return the first ChildLanguages filtered by the language column *

 * @method     ChildLanguages requirePk($key, ConnectionInterface $con = null) Return the ChildLanguages by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildLanguages requireOne(ConnectionInterface $con = null) Return the first ChildLanguages matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildLanguages requireOneByLanguageCode(string $language_code) Return the first ChildLanguages filtered by the language_code column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildLanguages requireOneByLanguage(string $language) Return the first ChildLanguages filtered by the language column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildLanguages[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildLanguages objects based on current ModelCriteria
 * @method     ChildLanguages[]|ObjectCollection findByLanguageCode(string $language_code) Return ChildLanguages objects filtered by the language_code column
 * @method     ChildLanguages[]|ObjectCollection findByLanguage(string $language) Return ChildLanguages objects filtered by the language column
 * @method     ChildLanguages[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class LanguagesQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \CryoConnectDB\Base\LanguagesQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\CryoConnectDB\\Languages', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildLanguagesQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildLanguagesQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildLanguagesQuery) {
            return $criteria;
        }
        $query = new ChildLanguagesQuery();
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
     * @return ChildLanguages|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(LanguagesTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = LanguagesTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildLanguages A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT language_code, language FROM languages WHERE language_code = :p0';
        try {
            $stmt = $con->prepare($sql);
            $stmt->bindValue(':p0', $key, PDO::PARAM_STR);
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute SELECT statement [%s]', $sql), 0, $e);
        }
        $obj = null;
        if ($row = $stmt->fetch(\PDO::FETCH_NUM)) {
            /** @var ChildLanguages $obj */
            $obj = new ChildLanguages();
            $obj->hydrate($row);
            LanguagesTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildLanguages|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildLanguagesQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(LanguagesTableMap::COL_LANGUAGE_CODE, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildLanguagesQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(LanguagesTableMap::COL_LANGUAGE_CODE, $keys, Criteria::IN);
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
     * @return $this|ChildLanguagesQuery The current query, for fluid interface
     */
    public function filterByLanguageCode($languageCode = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($languageCode)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(LanguagesTableMap::COL_LANGUAGE_CODE, $languageCode, $comparison);
    }

    /**
     * Filter the query on the language column
     *
     * Example usage:
     * <code>
     * $query->filterByLanguage('fooValue');   // WHERE language = 'fooValue'
     * $query->filterByLanguage('%fooValue%', Criteria::LIKE); // WHERE language LIKE '%fooValue%'
     * </code>
     *
     * @param     string $language The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildLanguagesQuery The current query, for fluid interface
     */
    public function filterByLanguage($language = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($language)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(LanguagesTableMap::COL_LANGUAGE, $language, $comparison);
    }

    /**
     * Filter the query by a related \CryoConnectDB\ExpertLanguages object
     *
     * @param \CryoConnectDB\ExpertLanguages|ObjectCollection $expertLanguages the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildLanguagesQuery The current query, for fluid interface
     */
    public function filterByExpertLanguages($expertLanguages, $comparison = null)
    {
        if ($expertLanguages instanceof \CryoConnectDB\ExpertLanguages) {
            return $this
                ->addUsingAlias(LanguagesTableMap::COL_LANGUAGE_CODE, $expertLanguages->getLanguageCode(), $comparison);
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
     * @return $this|ChildLanguagesQuery The current query, for fluid interface
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
     * Filter the query by a related \CryoConnectDB\InformationSeekerConnectRequestLanguages object
     *
     * @param \CryoConnectDB\InformationSeekerConnectRequestLanguages|ObjectCollection $informationSeekerConnectRequestLanguages the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildLanguagesQuery The current query, for fluid interface
     */
    public function filterByInformationSeekerConnectRequestLanguages($informationSeekerConnectRequestLanguages, $comparison = null)
    {
        if ($informationSeekerConnectRequestLanguages instanceof \CryoConnectDB\InformationSeekerConnectRequestLanguages) {
            return $this
                ->addUsingAlias(LanguagesTableMap::COL_LANGUAGE_CODE, $informationSeekerConnectRequestLanguages->getLanguageCode(), $comparison);
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
     * @return $this|ChildLanguagesQuery The current query, for fluid interface
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
     * Filter the query by a related \CryoConnectDB\InformationSeekerLanguages object
     *
     * @param \CryoConnectDB\InformationSeekerLanguages|ObjectCollection $informationSeekerLanguages the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildLanguagesQuery The current query, for fluid interface
     */
    public function filterByInformationSeekerLanguages($informationSeekerLanguages, $comparison = null)
    {
        if ($informationSeekerLanguages instanceof \CryoConnectDB\InformationSeekerLanguages) {
            return $this
                ->addUsingAlias(LanguagesTableMap::COL_LANGUAGE_CODE, $informationSeekerLanguages->getLanguageCode(), $comparison);
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
     * @return $this|ChildLanguagesQuery The current query, for fluid interface
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
     * Filter the query by a related Experts object
     * using the expert_languages table as cross reference
     *
     * @param Experts $experts the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildLanguagesQuery The current query, for fluid interface
     */
    public function filterByExperts($experts, $comparison = Criteria::EQUAL)
    {
        return $this
            ->useExpertLanguagesQuery()
            ->filterByExperts($experts, $comparison)
            ->endUse();
    }

    /**
     * Filter the query by a related InformationSeekerConnectRequest object
     * using the information_seeker_connect_request_languages table as cross reference
     *
     * @param InformationSeekerConnectRequest $informationSeekerConnectRequest the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildLanguagesQuery The current query, for fluid interface
     */
    public function filterByInformationSeekerConnectRequest($informationSeekerConnectRequest, $comparison = Criteria::EQUAL)
    {
        return $this
            ->useInformationSeekerConnectRequestLanguagesQuery()
            ->filterByInformationSeekerConnectRequest($informationSeekerConnectRequest, $comparison)
            ->endUse();
    }

    /**
     * Filter the query by a related InformationSeekers object
     * using the information_seeker_languages table as cross reference
     *
     * @param InformationSeekers $informationSeekers the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildLanguagesQuery The current query, for fluid interface
     */
    public function filterByInformationSeekers($informationSeekers, $comparison = Criteria::EQUAL)
    {
        return $this
            ->useInformationSeekerLanguagesQuery()
            ->filterByInformationSeekers($informationSeekers, $comparison)
            ->endUse();
    }

    /**
     * Exclude object from result
     *
     * @param   ChildLanguages $languages Object to remove from the list of results
     *
     * @return $this|ChildLanguagesQuery The current query, for fluid interface
     */
    public function prune($languages = null)
    {
        if ($languages) {
            $this->addUsingAlias(LanguagesTableMap::COL_LANGUAGE_CODE, $languages->getLanguageCode(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the languages table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(LanguagesTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            LanguagesTableMap::clearInstancePool();
            LanguagesTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(LanguagesTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(LanguagesTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            LanguagesTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            LanguagesTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // LanguagesQuery
