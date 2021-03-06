<?php

namespace CryoConnectDB\Base;

use \Exception;
use \PDO;
use CryoConnectDB\ContactTypes as ChildContactTypes;
use CryoConnectDB\ContactTypesQuery as ChildContactTypesQuery;
use CryoConnectDB\Map\ContactTypesTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'contact_types' table.
 *
 *
 *
 * @method     ChildContactTypesQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ChildContactTypesQuery orderByContactType($order = Criteria::ASC) Order by the contact_type column
 *
 * @method     ChildContactTypesQuery groupById() Group by the id column
 * @method     ChildContactTypesQuery groupByContactType() Group by the contact_type column
 *
 * @method     ChildContactTypesQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildContactTypesQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildContactTypesQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildContactTypesQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildContactTypesQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildContactTypesQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildContactTypesQuery leftJoinExpertContact($relationAlias = null) Adds a LEFT JOIN clause to the query using the ExpertContact relation
 * @method     ChildContactTypesQuery rightJoinExpertContact($relationAlias = null) Adds a RIGHT JOIN clause to the query using the ExpertContact relation
 * @method     ChildContactTypesQuery innerJoinExpertContact($relationAlias = null) Adds a INNER JOIN clause to the query using the ExpertContact relation
 *
 * @method     ChildContactTypesQuery joinWithExpertContact($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the ExpertContact relation
 *
 * @method     ChildContactTypesQuery leftJoinWithExpertContact() Adds a LEFT JOIN clause and with to the query using the ExpertContact relation
 * @method     ChildContactTypesQuery rightJoinWithExpertContact() Adds a RIGHT JOIN clause and with to the query using the ExpertContact relation
 * @method     ChildContactTypesQuery innerJoinWithExpertContact() Adds a INNER JOIN clause and with to the query using the ExpertContact relation
 *
 * @method     ChildContactTypesQuery leftJoinInformationSeekerContact($relationAlias = null) Adds a LEFT JOIN clause to the query using the InformationSeekerContact relation
 * @method     ChildContactTypesQuery rightJoinInformationSeekerContact($relationAlias = null) Adds a RIGHT JOIN clause to the query using the InformationSeekerContact relation
 * @method     ChildContactTypesQuery innerJoinInformationSeekerContact($relationAlias = null) Adds a INNER JOIN clause to the query using the InformationSeekerContact relation
 *
 * @method     ChildContactTypesQuery joinWithInformationSeekerContact($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the InformationSeekerContact relation
 *
 * @method     ChildContactTypesQuery leftJoinWithInformationSeekerContact() Adds a LEFT JOIN clause and with to the query using the InformationSeekerContact relation
 * @method     ChildContactTypesQuery rightJoinWithInformationSeekerContact() Adds a RIGHT JOIN clause and with to the query using the InformationSeekerContact relation
 * @method     ChildContactTypesQuery innerJoinWithInformationSeekerContact() Adds a INNER JOIN clause and with to the query using the InformationSeekerContact relation
 *
 * @method     \CryoConnectDB\ExpertContactQuery|\CryoConnectDB\InformationSeekerContactQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildContactTypes findOne(ConnectionInterface $con = null) Return the first ChildContactTypes matching the query
 * @method     ChildContactTypes findOneOrCreate(ConnectionInterface $con = null) Return the first ChildContactTypes matching the query, or a new ChildContactTypes object populated from the query conditions when no match is found
 *
 * @method     ChildContactTypes findOneById(int $id) Return the first ChildContactTypes filtered by the id column
 * @method     ChildContactTypes findOneByContactType(string $contact_type) Return the first ChildContactTypes filtered by the contact_type column *

 * @method     ChildContactTypes requirePk($key, ConnectionInterface $con = null) Return the ChildContactTypes by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildContactTypes requireOne(ConnectionInterface $con = null) Return the first ChildContactTypes matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildContactTypes requireOneById(int $id) Return the first ChildContactTypes filtered by the id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildContactTypes requireOneByContactType(string $contact_type) Return the first ChildContactTypes filtered by the contact_type column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildContactTypes[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildContactTypes objects based on current ModelCriteria
 * @method     ChildContactTypes[]|ObjectCollection findById(int $id) Return ChildContactTypes objects filtered by the id column
 * @method     ChildContactTypes[]|ObjectCollection findByContactType(string $contact_type) Return ChildContactTypes objects filtered by the contact_type column
 * @method     ChildContactTypes[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class ContactTypesQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \CryoConnectDB\Base\ContactTypesQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\CryoConnectDB\\ContactTypes', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildContactTypesQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildContactTypesQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildContactTypesQuery) {
            return $criteria;
        }
        $query = new ChildContactTypesQuery();
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
     * @return ChildContactTypes|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(ContactTypesTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = ContactTypesTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildContactTypes A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT id, contact_type FROM contact_types WHERE id = :p0';
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
            /** @var ChildContactTypes $obj */
            $obj = new ChildContactTypes();
            $obj->hydrate($row);
            ContactTypesTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildContactTypes|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildContactTypesQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(ContactTypesTableMap::COL_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildContactTypesQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(ContactTypesTableMap::COL_ID, $keys, Criteria::IN);
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
     * @return $this|ChildContactTypesQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(ContactTypesTableMap::COL_ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(ContactTypesTableMap::COL_ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ContactTypesTableMap::COL_ID, $id, $comparison);
    }

    /**
     * Filter the query on the contact_type column
     *
     * Example usage:
     * <code>
     * $query->filterByContactType('fooValue');   // WHERE contact_type = 'fooValue'
     * $query->filterByContactType('%fooValue%', Criteria::LIKE); // WHERE contact_type LIKE '%fooValue%'
     * </code>
     *
     * @param     string $contactType The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildContactTypesQuery The current query, for fluid interface
     */
    public function filterByContactType($contactType = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($contactType)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ContactTypesTableMap::COL_CONTACT_TYPE, $contactType, $comparison);
    }

    /**
     * Filter the query by a related \CryoConnectDB\ExpertContact object
     *
     * @param \CryoConnectDB\ExpertContact|ObjectCollection $expertContact the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildContactTypesQuery The current query, for fluid interface
     */
    public function filterByExpertContact($expertContact, $comparison = null)
    {
        if ($expertContact instanceof \CryoConnectDB\ExpertContact) {
            return $this
                ->addUsingAlias(ContactTypesTableMap::COL_ID, $expertContact->getContactTypeId(), $comparison);
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
     * @return $this|ChildContactTypesQuery The current query, for fluid interface
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
     * Filter the query by a related \CryoConnectDB\InformationSeekerContact object
     *
     * @param \CryoConnectDB\InformationSeekerContact|ObjectCollection $informationSeekerContact the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildContactTypesQuery The current query, for fluid interface
     */
    public function filterByInformationSeekerContact($informationSeekerContact, $comparison = null)
    {
        if ($informationSeekerContact instanceof \CryoConnectDB\InformationSeekerContact) {
            return $this
                ->addUsingAlias(ContactTypesTableMap::COL_ID, $informationSeekerContact->getContactTypeId(), $comparison);
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
     * @return $this|ChildContactTypesQuery The current query, for fluid interface
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
     * Filter the query by a related Experts object
     * using the expert_contact table as cross reference
     *
     * @param Experts $experts the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildContactTypesQuery The current query, for fluid interface
     */
    public function filterByExperts($experts, $comparison = Criteria::EQUAL)
    {
        return $this
            ->useExpertContactQuery()
            ->filterByExperts($experts, $comparison)
            ->endUse();
    }

    /**
     * Filter the query by a related InformationSeekers object
     * using the information_seeker_contact table as cross reference
     *
     * @param InformationSeekers $informationSeekers the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildContactTypesQuery The current query, for fluid interface
     */
    public function filterByInformationSeekers($informationSeekers, $comparison = Criteria::EQUAL)
    {
        return $this
            ->useInformationSeekerContactQuery()
            ->filterByInformationSeekers($informationSeekers, $comparison)
            ->endUse();
    }

    /**
     * Exclude object from result
     *
     * @param   ChildContactTypes $contactTypes Object to remove from the list of results
     *
     * @return $this|ChildContactTypesQuery The current query, for fluid interface
     */
    public function prune($contactTypes = null)
    {
        if ($contactTypes) {
            $this->addUsingAlias(ContactTypesTableMap::COL_ID, $contactTypes->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the contact_types table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(ContactTypesTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            ContactTypesTableMap::clearInstancePool();
            ContactTypesTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(ContactTypesTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(ContactTypesTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            ContactTypesTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            ContactTypesTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // ContactTypesQuery
