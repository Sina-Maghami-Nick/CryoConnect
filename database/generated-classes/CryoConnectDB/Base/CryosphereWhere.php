<?php

namespace CryoConnectDB\Base;

use \DateTime;
use \Exception;
use \PDO;
use CryoConnectDB\CryosphereWhere as ChildCryosphereWhere;
use CryoConnectDB\CryosphereWhereQuery as ChildCryosphereWhereQuery;
use CryoConnectDB\ExpertCryosphereWhere as ChildExpertCryosphereWhere;
use CryoConnectDB\ExpertCryosphereWhereQuery as ChildExpertCryosphereWhereQuery;
use CryoConnectDB\Experts as ChildExperts;
use CryoConnectDB\ExpertsQuery as ChildExpertsQuery;
use CryoConnectDB\InformationSeekerConnectRequest as ChildInformationSeekerConnectRequest;
use CryoConnectDB\InformationSeekerConnectRequestCryosphereWhere as ChildInformationSeekerConnectRequestCryosphereWhere;
use CryoConnectDB\InformationSeekerConnectRequestCryosphereWhereQuery as ChildInformationSeekerConnectRequestCryosphereWhereQuery;
use CryoConnectDB\InformationSeekerConnectRequestQuery as ChildInformationSeekerConnectRequestQuery;
use CryoConnectDB\Map\CryosphereWhereTableMap;
use CryoConnectDB\Map\ExpertCryosphereWhereTableMap;
use CryoConnectDB\Map\InformationSeekerConnectRequestCryosphereWhereTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveRecord\ActiveRecordInterface;
use Propel\Runtime\Collection\Collection;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\BadMethodCallException;
use Propel\Runtime\Exception\LogicException;
use Propel\Runtime\Exception\PropelException;
use Propel\Runtime\Map\TableMap;
use Propel\Runtime\Parser\AbstractParser;
use Propel\Runtime\Util\PropelDateTime;

/**
 * Base class that represents a row from the 'cryosphere_where' table.
 *
 *
 *
 * @package    propel.generator.CryoConnectDB.Base
 */
abstract class CryosphereWhere implements ActiveRecordInterface
{
    /**
     * TableMap class name
     */
    const TABLE_MAP = '\\CryoConnectDB\\Map\\CryosphereWhereTableMap';


    /**
     * attribute to determine if this object has previously been saved.
     * @var boolean
     */
    protected $new = true;

    /**
     * attribute to determine whether this object has been deleted.
     * @var boolean
     */
    protected $deleted = false;

    /**
     * The columns that have been modified in current object.
     * Tracking modified columns allows us to only update modified columns.
     * @var array
     */
    protected $modifiedColumns = array();

    /**
     * The (virtual) columns that are added at runtime
     * The formatters can add supplementary columns based on a resultset
     * @var array
     */
    protected $virtualColumns = array();

    /**
     * The value for the id field.
     *
     * @var        int
     */
    protected $id;

    /**
     * The value for the cryosphere_where_name field.
     *
     * @var        string
     */
    protected $cryosphere_where_name;

    /**
     * The value for the timestamp field.
     *
     * Note: this column has a database default value of: (expression) CURRENT_TIMESTAMP
     * @var        DateTime
     */
    protected $timestamp;

    /**
     * @var        ObjectCollection|ChildExpertCryosphereWhere[] Collection to store aggregation of ChildExpertCryosphereWhere objects.
     */
    protected $collExpertCryosphereWheres;
    protected $collExpertCryosphereWheresPartial;

    /**
     * @var        ObjectCollection|ChildInformationSeekerConnectRequestCryosphereWhere[] Collection to store aggregation of ChildInformationSeekerConnectRequestCryosphereWhere objects.
     */
    protected $collInformationSeekerConnectRequestCryosphereWheres;
    protected $collInformationSeekerConnectRequestCryosphereWheresPartial;

    /**
     * @var        ObjectCollection|ChildExperts[] Cross Collection to store aggregation of ChildExperts objects.
     */
    protected $collExpertss;

    /**
     * @var bool
     */
    protected $collExpertssPartial;

    /**
     * @var        ObjectCollection|ChildInformationSeekerConnectRequest[] Cross Collection to store aggregation of ChildInformationSeekerConnectRequest objects.
     */
    protected $collInformationSeekerConnectRequests;

    /**
     * @var bool
     */
    protected $collInformationSeekerConnectRequestsPartial;

    /**
     * Flag to prevent endless save loop, if this object is referenced
     * by another object which falls in this transaction.
     *
     * @var boolean
     */
    protected $alreadyInSave = false;

    /**
     * An array of objects scheduled for deletion.
     * @var ObjectCollection|ChildExperts[]
     */
    protected $expertssScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var ObjectCollection|ChildInformationSeekerConnectRequest[]
     */
    protected $informationSeekerConnectRequestsScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var ObjectCollection|ChildExpertCryosphereWhere[]
     */
    protected $expertCryosphereWheresScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var ObjectCollection|ChildInformationSeekerConnectRequestCryosphereWhere[]
     */
    protected $informationSeekerConnectRequestCryosphereWheresScheduledForDeletion = null;

    /**
     * Applies default values to this object.
     * This method should be called from the object's constructor (or
     * equivalent initialization method).
     * @see __construct()
     */
    public function applyDefaultValues()
    {
    }

    /**
     * Initializes internal state of CryoConnectDB\Base\CryosphereWhere object.
     * @see applyDefaults()
     */
    public function __construct()
    {
        $this->applyDefaultValues();
    }

    /**
     * Returns whether the object has been modified.
     *
     * @return boolean True if the object has been modified.
     */
    public function isModified()
    {
        return !!$this->modifiedColumns;
    }

    /**
     * Has specified column been modified?
     *
     * @param  string  $col column fully qualified name (TableMap::TYPE_COLNAME), e.g. Book::AUTHOR_ID
     * @return boolean True if $col has been modified.
     */
    public function isColumnModified($col)
    {
        return $this->modifiedColumns && isset($this->modifiedColumns[$col]);
    }

    /**
     * Get the columns that have been modified in this object.
     * @return array A unique list of the modified column names for this object.
     */
    public function getModifiedColumns()
    {
        return $this->modifiedColumns ? array_keys($this->modifiedColumns) : [];
    }

    /**
     * Returns whether the object has ever been saved.  This will
     * be false, if the object was retrieved from storage or was created
     * and then saved.
     *
     * @return boolean true, if the object has never been persisted.
     */
    public function isNew()
    {
        return $this->new;
    }

    /**
     * Setter for the isNew attribute.  This method will be called
     * by Propel-generated children and objects.
     *
     * @param boolean $b the state of the object.
     */
    public function setNew($b)
    {
        $this->new = (boolean) $b;
    }

    /**
     * Whether this object has been deleted.
     * @return boolean The deleted state of this object.
     */
    public function isDeleted()
    {
        return $this->deleted;
    }

    /**
     * Specify whether this object has been deleted.
     * @param  boolean $b The deleted state of this object.
     * @return void
     */
    public function setDeleted($b)
    {
        $this->deleted = (boolean) $b;
    }

    /**
     * Sets the modified state for the object to be false.
     * @param  string $col If supplied, only the specified column is reset.
     * @return void
     */
    public function resetModified($col = null)
    {
        if (null !== $col) {
            if (isset($this->modifiedColumns[$col])) {
                unset($this->modifiedColumns[$col]);
            }
        } else {
            $this->modifiedColumns = array();
        }
    }

    /**
     * Compares this with another <code>CryosphereWhere</code> instance.  If
     * <code>obj</code> is an instance of <code>CryosphereWhere</code>, delegates to
     * <code>equals(CryosphereWhere)</code>.  Otherwise, returns <code>false</code>.
     *
     * @param  mixed   $obj The object to compare to.
     * @return boolean Whether equal to the object specified.
     */
    public function equals($obj)
    {
        if (!$obj instanceof static) {
            return false;
        }

        if ($this === $obj) {
            return true;
        }

        if (null === $this->getPrimaryKey() || null === $obj->getPrimaryKey()) {
            return false;
        }

        return $this->getPrimaryKey() === $obj->getPrimaryKey();
    }

    /**
     * Get the associative array of the virtual columns in this object
     *
     * @return array
     */
    public function getVirtualColumns()
    {
        return $this->virtualColumns;
    }

    /**
     * Checks the existence of a virtual column in this object
     *
     * @param  string  $name The virtual column name
     * @return boolean
     */
    public function hasVirtualColumn($name)
    {
        return array_key_exists($name, $this->virtualColumns);
    }

    /**
     * Get the value of a virtual column in this object
     *
     * @param  string $name The virtual column name
     * @return mixed
     *
     * @throws PropelException
     */
    public function getVirtualColumn($name)
    {
        if (!$this->hasVirtualColumn($name)) {
            throw new PropelException(sprintf('Cannot get value of inexistent virtual column %s.', $name));
        }

        return $this->virtualColumns[$name];
    }

    /**
     * Set the value of a virtual column in this object
     *
     * @param string $name  The virtual column name
     * @param mixed  $value The value to give to the virtual column
     *
     * @return $this|CryosphereWhere The current object, for fluid interface
     */
    public function setVirtualColumn($name, $value)
    {
        $this->virtualColumns[$name] = $value;

        return $this;
    }

    /**
     * Logs a message using Propel::log().
     *
     * @param  string  $msg
     * @param  int     $priority One of the Propel::LOG_* logging levels
     * @return boolean
     */
    protected function log($msg, $priority = Propel::LOG_INFO)
    {
        return Propel::log(get_class($this) . ': ' . $msg, $priority);
    }

    /**
     * Export the current object properties to a string, using a given parser format
     * <code>
     * $book = BookQuery::create()->findPk(9012);
     * echo $book->exportTo('JSON');
     *  => {"Id":9012,"Title":"Don Juan","ISBN":"0140422161","Price":12.99,"PublisherId":1234,"AuthorId":5678}');
     * </code>
     *
     * @param  mixed   $parser                 A AbstractParser instance, or a format name ('XML', 'YAML', 'JSON', 'CSV')
     * @param  boolean $includeLazyLoadColumns (optional) Whether to include lazy load(ed) columns. Defaults to TRUE.
     * @return string  The exported data
     */
    public function exportTo($parser, $includeLazyLoadColumns = true)
    {
        if (!$parser instanceof AbstractParser) {
            $parser = AbstractParser::getParser($parser);
        }

        return $parser->fromArray($this->toArray(TableMap::TYPE_PHPNAME, $includeLazyLoadColumns, array(), true));
    }

    /**
     * Clean up internal collections prior to serializing
     * Avoids recursive loops that turn into segmentation faults when serializing
     */
    public function __sleep()
    {
        $this->clearAllReferences();

        $cls = new \ReflectionClass($this);
        $propertyNames = [];
        $serializableProperties = array_diff($cls->getProperties(), $cls->getProperties(\ReflectionProperty::IS_STATIC));

        foreach($serializableProperties as $property) {
            $propertyNames[] = $property->getName();
        }

        return $propertyNames;
    }

    /**
     * Get the [id] column value.
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Get the [cryosphere_where_name] column value.
     *
     * @return string
     */
    public function getCryosphereWhereName()
    {
        return $this->cryosphere_where_name;
    }

    /**
     * Get the [optionally formatted] temporal [timestamp] column value.
     *
     *
     * @param      string|null $format The date/time format string (either date()-style or strftime()-style).
     *                            If format is NULL, then the raw DateTime object will be returned.
     *
     * @return string|DateTime Formatted date/time value as string or DateTime object (if format is NULL), NULL if column is NULL, and 0 if column value is 0000-00-00 00:00:00
     *
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getTimestamp($format = NULL)
    {
        if ($format === null) {
            return $this->timestamp;
        } else {
            return $this->timestamp instanceof \DateTimeInterface ? $this->timestamp->format($format) : null;
        }
    }

    /**
     * Set the value of [id] column.
     *
     * @param int $v new value
     * @return $this|\CryoConnectDB\CryosphereWhere The current object (for fluent API support)
     */
    public function setId($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->id !== $v) {
            $this->id = $v;
            $this->modifiedColumns[CryosphereWhereTableMap::COL_ID] = true;
        }

        return $this;
    } // setId()

    /**
     * Set the value of [cryosphere_where_name] column.
     *
     * @param string $v new value
     * @return $this|\CryoConnectDB\CryosphereWhere The current object (for fluent API support)
     */
    public function setCryosphereWhereName($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->cryosphere_where_name !== $v) {
            $this->cryosphere_where_name = $v;
            $this->modifiedColumns[CryosphereWhereTableMap::COL_CRYOSPHERE_WHERE_NAME] = true;
        }

        return $this;
    } // setCryosphereWhereName()

    /**
     * Sets the value of [timestamp] column to a normalized version of the date/time value specified.
     *
     * @param  mixed $v string, integer (timestamp), or \DateTimeInterface value.
     *               Empty strings are treated as NULL.
     * @return $this|\CryoConnectDB\CryosphereWhere The current object (for fluent API support)
     */
    public function setTimestamp($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->timestamp !== null || $dt !== null) {
            if ($this->timestamp === null || $dt === null || $dt->format("Y-m-d H:i:s.u") !== $this->timestamp->format("Y-m-d H:i:s.u")) {
                $this->timestamp = $dt === null ? null : clone $dt;
                $this->modifiedColumns[CryosphereWhereTableMap::COL_TIMESTAMP] = true;
            }
        } // if either are not null

        return $this;
    } // setTimestamp()

    /**
     * Indicates whether the columns in this object are only set to default values.
     *
     * This method can be used in conjunction with isModified() to indicate whether an object is both
     * modified _and_ has some values set which are non-default.
     *
     * @return boolean Whether the columns in this object are only been set with default values.
     */
    public function hasOnlyDefaultValues()
    {
        // otherwise, everything was equal, so return TRUE
        return true;
    } // hasOnlyDefaultValues()

    /**
     * Hydrates (populates) the object variables with values from the database resultset.
     *
     * An offset (0-based "start column") is specified so that objects can be hydrated
     * with a subset of the columns in the resultset rows.  This is needed, for example,
     * for results of JOIN queries where the resultset row includes columns from two or
     * more tables.
     *
     * @param array   $row       The row returned by DataFetcher->fetch().
     * @param int     $startcol  0-based offset column which indicates which restultset column to start with.
     * @param boolean $rehydrate Whether this object is being re-hydrated from the database.
     * @param string  $indexType The index type of $row. Mostly DataFetcher->getIndexType().
                                  One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                            TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     *
     * @return int             next starting column
     * @throws PropelException - Any caught Exception will be rewrapped as a PropelException.
     */
    public function hydrate($row, $startcol = 0, $rehydrate = false, $indexType = TableMap::TYPE_NUM)
    {
        try {

            $col = $row[TableMap::TYPE_NUM == $indexType ? 0 + $startcol : CryosphereWhereTableMap::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)];
            $this->id = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 1 + $startcol : CryosphereWhereTableMap::translateFieldName('CryosphereWhereName', TableMap::TYPE_PHPNAME, $indexType)];
            $this->cryosphere_where_name = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 2 + $startcol : CryosphereWhereTableMap::translateFieldName('Timestamp', TableMap::TYPE_PHPNAME, $indexType)];
            if ($col === '0000-00-00 00:00:00') {
                $col = null;
            }
            $this->timestamp = (null !== $col) ? PropelDateTime::newInstance($col, null, 'DateTime') : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }

            return $startcol + 3; // 3 = CryosphereWhereTableMap::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException(sprintf('Error populating %s object', '\\CryoConnectDB\\CryosphereWhere'), 0, $e);
        }
    }

    /**
     * Checks and repairs the internal consistency of the object.
     *
     * This method is executed after an already-instantiated object is re-hydrated
     * from the database.  It exists to check any foreign keys to make sure that
     * the objects related to the current object are correct based on foreign key.
     *
     * You can override this method in the stub class, but you should always invoke
     * the base method from the overridden method (i.e. parent::ensureConsistency()),
     * in case your model changes.
     *
     * @throws PropelException
     */
    public function ensureConsistency()
    {
    } // ensureConsistency

    /**
     * Reloads this object from datastore based on primary key and (optionally) resets all associated objects.
     *
     * This will only work if the object has been saved and has a valid primary key set.
     *
     * @param      boolean $deep (optional) Whether to also de-associated any related objects.
     * @param      ConnectionInterface $con (optional) The ConnectionInterface connection to use.
     * @return void
     * @throws PropelException - if this object is deleted, unsaved or doesn't have pk match in db
     */
    public function reload($deep = false, ConnectionInterface $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("Cannot reload a deleted object.");
        }

        if ($this->isNew()) {
            throw new PropelException("Cannot reload an unsaved object.");
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(CryosphereWhereTableMap::DATABASE_NAME);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $dataFetcher = ChildCryosphereWhereQuery::create(null, $this->buildPkeyCriteria())->setFormatter(ModelCriteria::FORMAT_STATEMENT)->find($con);
        $row = $dataFetcher->fetch();
        $dataFetcher->close();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true, $dataFetcher->getIndexType()); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->collExpertCryosphereWheres = null;

            $this->collInformationSeekerConnectRequestCryosphereWheres = null;

            $this->collExpertss = null;
            $this->collInformationSeekerConnectRequests = null;
        } // if (deep)
    }

    /**
     * Removes this object from datastore and sets delete attribute.
     *
     * @param      ConnectionInterface $con
     * @return void
     * @throws PropelException
     * @see CryosphereWhere::setDeleted()
     * @see CryosphereWhere::isDeleted()
     */
    public function delete(ConnectionInterface $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("This object has already been deleted.");
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getWriteConnection(CryosphereWhereTableMap::DATABASE_NAME);
        }

        $con->transaction(function () use ($con) {
            $deleteQuery = ChildCryosphereWhereQuery::create()
                ->filterByPrimaryKey($this->getPrimaryKey());
            $ret = $this->preDelete($con);
            if ($ret) {
                $deleteQuery->delete($con);
                $this->postDelete($con);
                $this->setDeleted(true);
            }
        });
    }

    /**
     * Persists this object to the database.
     *
     * If the object is new, it inserts it; otherwise an update is performed.
     * All modified related objects will also be persisted in the doSave()
     * method.  This method wraps all precipitate database operations in a
     * single transaction.
     *
     * @param      ConnectionInterface $con
     * @return int             The number of rows affected by this insert/update and any referring fk objects' save() operations.
     * @throws PropelException
     * @see doSave()
     */
    public function save(ConnectionInterface $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("You cannot save an object that has been deleted.");
        }

        if ($this->alreadyInSave) {
            return 0;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getWriteConnection(CryosphereWhereTableMap::DATABASE_NAME);
        }

        return $con->transaction(function () use ($con) {
            $ret = $this->preSave($con);
            $isInsert = $this->isNew();
            if ($isInsert) {
                $ret = $ret && $this->preInsert($con);
            } else {
                $ret = $ret && $this->preUpdate($con);
            }
            if ($ret) {
                $affectedRows = $this->doSave($con);
                if ($isInsert) {
                    $this->postInsert($con);
                } else {
                    $this->postUpdate($con);
                }
                $this->postSave($con);
                CryosphereWhereTableMap::addInstanceToPool($this);
            } else {
                $affectedRows = 0;
            }

            return $affectedRows;
        });
    }

    /**
     * Performs the work of inserting or updating the row in the database.
     *
     * If the object is new, it inserts it; otherwise an update is performed.
     * All related objects are also updated in this method.
     *
     * @param      ConnectionInterface $con
     * @return int             The number of rows affected by this insert/update and any referring fk objects' save() operations.
     * @throws PropelException
     * @see save()
     */
    protected function doSave(ConnectionInterface $con)
    {
        $affectedRows = 0; // initialize var to track total num of affected rows
        if (!$this->alreadyInSave) {
            $this->alreadyInSave = true;

            if ($this->isNew() || $this->isModified()) {
                // persist changes
                if ($this->isNew()) {
                    $this->doInsert($con);
                    $affectedRows += 1;
                } else {
                    $affectedRows += $this->doUpdate($con);
                }
                $this->resetModified();
            }

            if ($this->expertssScheduledForDeletion !== null) {
                if (!$this->expertssScheduledForDeletion->isEmpty()) {
                    $pks = array();
                    foreach ($this->expertssScheduledForDeletion as $entry) {
                        $entryPk = [];

                        $entryPk[1] = $this->getId();
                        $entryPk[0] = $entry->getId();
                        $pks[] = $entryPk;
                    }

                    \CryoConnectDB\ExpertCryosphereWhereQuery::create()
                        ->filterByPrimaryKeys($pks)
                        ->delete($con);

                    $this->expertssScheduledForDeletion = null;
                }

            }

            if ($this->collExpertss) {
                foreach ($this->collExpertss as $experts) {
                    if (!$experts->isDeleted() && ($experts->isNew() || $experts->isModified())) {
                        $experts->save($con);
                    }
                }
            }


            if ($this->informationSeekerConnectRequestsScheduledForDeletion !== null) {
                if (!$this->informationSeekerConnectRequestsScheduledForDeletion->isEmpty()) {
                    $pks = array();
                    foreach ($this->informationSeekerConnectRequestsScheduledForDeletion as $entry) {
                        $entryPk = [];

                        $entryPk[1] = $this->getId();
                        $entryPk[0] = $entry->getId();
                        $pks[] = $entryPk;
                    }

                    \CryoConnectDB\InformationSeekerConnectRequestCryosphereWhereQuery::create()
                        ->filterByPrimaryKeys($pks)
                        ->delete($con);

                    $this->informationSeekerConnectRequestsScheduledForDeletion = null;
                }

            }

            if ($this->collInformationSeekerConnectRequests) {
                foreach ($this->collInformationSeekerConnectRequests as $informationSeekerConnectRequest) {
                    if (!$informationSeekerConnectRequest->isDeleted() && ($informationSeekerConnectRequest->isNew() || $informationSeekerConnectRequest->isModified())) {
                        $informationSeekerConnectRequest->save($con);
                    }
                }
            }


            if ($this->expertCryosphereWheresScheduledForDeletion !== null) {
                if (!$this->expertCryosphereWheresScheduledForDeletion->isEmpty()) {
                    \CryoConnectDB\ExpertCryosphereWhereQuery::create()
                        ->filterByPrimaryKeys($this->expertCryosphereWheresScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->expertCryosphereWheresScheduledForDeletion = null;
                }
            }

            if ($this->collExpertCryosphereWheres !== null) {
                foreach ($this->collExpertCryosphereWheres as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->informationSeekerConnectRequestCryosphereWheresScheduledForDeletion !== null) {
                if (!$this->informationSeekerConnectRequestCryosphereWheresScheduledForDeletion->isEmpty()) {
                    \CryoConnectDB\InformationSeekerConnectRequestCryosphereWhereQuery::create()
                        ->filterByPrimaryKeys($this->informationSeekerConnectRequestCryosphereWheresScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->informationSeekerConnectRequestCryosphereWheresScheduledForDeletion = null;
                }
            }

            if ($this->collInformationSeekerConnectRequestCryosphereWheres !== null) {
                foreach ($this->collInformationSeekerConnectRequestCryosphereWheres as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            $this->alreadyInSave = false;

        }

        return $affectedRows;
    } // doSave()

    /**
     * Insert the row in the database.
     *
     * @param      ConnectionInterface $con
     *
     * @throws PropelException
     * @see doSave()
     */
    protected function doInsert(ConnectionInterface $con)
    {
        $modifiedColumns = array();
        $index = 0;

        $this->modifiedColumns[CryosphereWhereTableMap::COL_ID] = true;
        if (null !== $this->id) {
            throw new PropelException('Cannot insert a value for auto-increment primary key (' . CryosphereWhereTableMap::COL_ID . ')');
        }

         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(CryosphereWhereTableMap::COL_ID)) {
            $modifiedColumns[':p' . $index++]  = 'id';
        }
        if ($this->isColumnModified(CryosphereWhereTableMap::COL_CRYOSPHERE_WHERE_NAME)) {
            $modifiedColumns[':p' . $index++]  = 'cryosphere_where_name';
        }
        if ($this->isColumnModified(CryosphereWhereTableMap::COL_TIMESTAMP)) {
            $modifiedColumns[':p' . $index++]  = 'timestamp';
        }

        $sql = sprintf(
            'INSERT INTO cryosphere_where (%s) VALUES (%s)',
            implode(', ', $modifiedColumns),
            implode(', ', array_keys($modifiedColumns))
        );

        try {
            $stmt = $con->prepare($sql);
            foreach ($modifiedColumns as $identifier => $columnName) {
                switch ($columnName) {
                    case 'id':
                        $stmt->bindValue($identifier, $this->id, PDO::PARAM_INT);
                        break;
                    case 'cryosphere_where_name':
                        $stmt->bindValue($identifier, $this->cryosphere_where_name, PDO::PARAM_STR);
                        break;
                    case 'timestamp':
                        $stmt->bindValue($identifier, $this->timestamp ? $this->timestamp->format("Y-m-d H:i:s.u") : null, PDO::PARAM_STR);
                        break;
                }
            }
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute INSERT statement [%s]', $sql), 0, $e);
        }

        try {
            $pk = $con->lastInsertId();
        } catch (Exception $e) {
            throw new PropelException('Unable to get autoincrement id.', 0, $e);
        }
        $this->setId($pk);

        $this->setNew(false);
    }

    /**
     * Update the row in the database.
     *
     * @param      ConnectionInterface $con
     *
     * @return Integer Number of updated rows
     * @see doSave()
     */
    protected function doUpdate(ConnectionInterface $con)
    {
        $selectCriteria = $this->buildPkeyCriteria();
        $valuesCriteria = $this->buildCriteria();

        return $selectCriteria->doUpdate($valuesCriteria, $con);
    }

    /**
     * Retrieves a field from the object by name passed in as a string.
     *
     * @param      string $name name
     * @param      string $type The type of fieldname the $name is of:
     *                     one of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                     TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     *                     Defaults to TableMap::TYPE_PHPNAME.
     * @return mixed Value of field.
     */
    public function getByName($name, $type = TableMap::TYPE_PHPNAME)
    {
        $pos = CryosphereWhereTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);
        $field = $this->getByPosition($pos);

        return $field;
    }

    /**
     * Retrieves a field from the object by Position as specified in the xml schema.
     * Zero-based.
     *
     * @param      int $pos position in xml schema
     * @return mixed Value of field at $pos
     */
    public function getByPosition($pos)
    {
        switch ($pos) {
            case 0:
                return $this->getId();
                break;
            case 1:
                return $this->getCryosphereWhereName();
                break;
            case 2:
                return $this->getTimestamp();
                break;
            default:
                return null;
                break;
        } // switch()
    }

    /**
     * Exports the object as an array.
     *
     * You can specify the key type of the array by passing one of the class
     * type constants.
     *
     * @param     string  $keyType (optional) One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME,
     *                    TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     *                    Defaults to TableMap::TYPE_PHPNAME.
     * @param     boolean $includeLazyLoadColumns (optional) Whether to include lazy loaded columns. Defaults to TRUE.
     * @param     array $alreadyDumpedObjects List of objects to skip to avoid recursion
     * @param     boolean $includeForeignObjects (optional) Whether to include hydrated related objects. Default to FALSE.
     *
     * @return array an associative array containing the field names (as keys) and field values
     */
    public function toArray($keyType = TableMap::TYPE_PHPNAME, $includeLazyLoadColumns = true, $alreadyDumpedObjects = array(), $includeForeignObjects = false)
    {

        if (isset($alreadyDumpedObjects['CryosphereWhere'][$this->hashCode()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['CryosphereWhere'][$this->hashCode()] = true;
        $keys = CryosphereWhereTableMap::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getId(),
            $keys[1] => $this->getCryosphereWhereName(),
            $keys[2] => $this->getTimestamp(),
        );
        if ($result[$keys[2]] instanceof \DateTimeInterface) {
            $result[$keys[2]] = $result[$keys[2]]->format('c');
        }

        $virtualColumns = $this->virtualColumns;
        foreach ($virtualColumns as $key => $virtualColumn) {
            $result[$key] = $virtualColumn;
        }

        if ($includeForeignObjects) {
            if (null !== $this->collExpertCryosphereWheres) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'expertCryosphereWheres';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'expert_cryosphere_wheres';
                        break;
                    default:
                        $key = 'ExpertCryosphereWheres';
                }

                $result[$key] = $this->collExpertCryosphereWheres->toArray(null, false, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collInformationSeekerConnectRequestCryosphereWheres) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'informationSeekerConnectRequestCryosphereWheres';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'information_seeker_connect_request_cryosphere_wheres';
                        break;
                    default:
                        $key = 'InformationSeekerConnectRequestCryosphereWheres';
                }

                $result[$key] = $this->collInformationSeekerConnectRequestCryosphereWheres->toArray(null, false, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
        }

        return $result;
    }

    /**
     * Sets a field from the object by name passed in as a string.
     *
     * @param  string $name
     * @param  mixed  $value field value
     * @param  string $type The type of fieldname the $name is of:
     *                one of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     *                Defaults to TableMap::TYPE_PHPNAME.
     * @return $this|\CryoConnectDB\CryosphereWhere
     */
    public function setByName($name, $value, $type = TableMap::TYPE_PHPNAME)
    {
        $pos = CryosphereWhereTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);

        return $this->setByPosition($pos, $value);
    }

    /**
     * Sets a field from the object by Position as specified in the xml schema.
     * Zero-based.
     *
     * @param  int $pos position in xml schema
     * @param  mixed $value field value
     * @return $this|\CryoConnectDB\CryosphereWhere
     */
    public function setByPosition($pos, $value)
    {
        switch ($pos) {
            case 0:
                $this->setId($value);
                break;
            case 1:
                $this->setCryosphereWhereName($value);
                break;
            case 2:
                $this->setTimestamp($value);
                break;
        } // switch()

        return $this;
    }

    /**
     * Populates the object using an array.
     *
     * This is particularly useful when populating an object from one of the
     * request arrays (e.g. $_POST).  This method goes through the column
     * names, checking to see whether a matching key exists in populated
     * array. If so the setByName() method is called for that column.
     *
     * You can specify the key type of the array by additionally passing one
     * of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME,
     * TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     * The default key type is the column's TableMap::TYPE_PHPNAME.
     *
     * @param      array  $arr     An array to populate the object from.
     * @param      string $keyType The type of keys the array uses.
     * @return void
     */
    public function fromArray($arr, $keyType = TableMap::TYPE_PHPNAME)
    {
        $keys = CryosphereWhereTableMap::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) {
            $this->setId($arr[$keys[0]]);
        }
        if (array_key_exists($keys[1], $arr)) {
            $this->setCryosphereWhereName($arr[$keys[1]]);
        }
        if (array_key_exists($keys[2], $arr)) {
            $this->setTimestamp($arr[$keys[2]]);
        }
    }

     /**
     * Populate the current object from a string, using a given parser format
     * <code>
     * $book = new Book();
     * $book->importFrom('JSON', '{"Id":9012,"Title":"Don Juan","ISBN":"0140422161","Price":12.99,"PublisherId":1234,"AuthorId":5678}');
     * </code>
     *
     * You can specify the key type of the array by additionally passing one
     * of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME,
     * TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     * The default key type is the column's TableMap::TYPE_PHPNAME.
     *
     * @param mixed $parser A AbstractParser instance,
     *                       or a format name ('XML', 'YAML', 'JSON', 'CSV')
     * @param string $data The source data to import from
     * @param string $keyType The type of keys the array uses.
     *
     * @return $this|\CryoConnectDB\CryosphereWhere The current object, for fluid interface
     */
    public function importFrom($parser, $data, $keyType = TableMap::TYPE_PHPNAME)
    {
        if (!$parser instanceof AbstractParser) {
            $parser = AbstractParser::getParser($parser);
        }

        $this->fromArray($parser->toArray($data), $keyType);

        return $this;
    }

    /**
     * Build a Criteria object containing the values of all modified columns in this object.
     *
     * @return Criteria The Criteria object containing all modified values.
     */
    public function buildCriteria()
    {
        $criteria = new Criteria(CryosphereWhereTableMap::DATABASE_NAME);

        if ($this->isColumnModified(CryosphereWhereTableMap::COL_ID)) {
            $criteria->add(CryosphereWhereTableMap::COL_ID, $this->id);
        }
        if ($this->isColumnModified(CryosphereWhereTableMap::COL_CRYOSPHERE_WHERE_NAME)) {
            $criteria->add(CryosphereWhereTableMap::COL_CRYOSPHERE_WHERE_NAME, $this->cryosphere_where_name);
        }
        if ($this->isColumnModified(CryosphereWhereTableMap::COL_TIMESTAMP)) {
            $criteria->add(CryosphereWhereTableMap::COL_TIMESTAMP, $this->timestamp);
        }

        return $criteria;
    }

    /**
     * Builds a Criteria object containing the primary key for this object.
     *
     * Unlike buildCriteria() this method includes the primary key values regardless
     * of whether or not they have been modified.
     *
     * @throws LogicException if no primary key is defined
     *
     * @return Criteria The Criteria object containing value(s) for primary key(s).
     */
    public function buildPkeyCriteria()
    {
        $criteria = ChildCryosphereWhereQuery::create();
        $criteria->add(CryosphereWhereTableMap::COL_ID, $this->id);

        return $criteria;
    }

    /**
     * If the primary key is not null, return the hashcode of the
     * primary key. Otherwise, return the hash code of the object.
     *
     * @return int Hashcode
     */
    public function hashCode()
    {
        $validPk = null !== $this->getId();

        $validPrimaryKeyFKs = 0;
        $primaryKeyFKs = [];

        if ($validPk) {
            return crc32(json_encode($this->getPrimaryKey(), JSON_UNESCAPED_UNICODE));
        } elseif ($validPrimaryKeyFKs) {
            return crc32(json_encode($primaryKeyFKs, JSON_UNESCAPED_UNICODE));
        }

        return spl_object_hash($this);
    }

    /**
     * Returns the primary key for this object (row).
     * @return int
     */
    public function getPrimaryKey()
    {
        return $this->getId();
    }

    /**
     * Generic method to set the primary key (id column).
     *
     * @param       int $key Primary key.
     * @return void
     */
    public function setPrimaryKey($key)
    {
        $this->setId($key);
    }

    /**
     * Returns true if the primary key for this object is null.
     * @return boolean
     */
    public function isPrimaryKeyNull()
    {
        return null === $this->getId();
    }

    /**
     * Sets contents of passed object to values from current object.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param      object $copyObj An object of \CryoConnectDB\CryosphereWhere (or compatible) type.
     * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param      boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setCryosphereWhereName($this->getCryosphereWhereName());
        $copyObj->setTimestamp($this->getTimestamp());

        if ($deepCopy) {
            // important: temporarily setNew(false) because this affects the behavior of
            // the getter/setter methods for fkey referrer objects.
            $copyObj->setNew(false);

            foreach ($this->getExpertCryosphereWheres() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addExpertCryosphereWhere($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getInformationSeekerConnectRequestCryosphereWheres() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addInformationSeekerConnectRequestCryosphereWhere($relObj->copy($deepCopy));
                }
            }

        } // if ($deepCopy)

        if ($makeNew) {
            $copyObj->setNew(true);
            $copyObj->setId(NULL); // this is a auto-increment column, so set to default value
        }
    }

    /**
     * Makes a copy of this object that will be inserted as a new row in table when saved.
     * It creates a new object filling in the simple attributes, but skipping any primary
     * keys that are defined for the table.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param  boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @return \CryoConnectDB\CryosphereWhere Clone of current object.
     * @throws PropelException
     */
    public function copy($deepCopy = false)
    {
        // we use get_class(), because this might be a subclass
        $clazz = get_class($this);
        $copyObj = new $clazz();
        $this->copyInto($copyObj, $deepCopy);

        return $copyObj;
    }


    /**
     * Initializes a collection based on the name of a relation.
     * Avoids crafting an 'init[$relationName]s' method name
     * that wouldn't work when StandardEnglishPluralizer is used.
     *
     * @param      string $relationName The name of the relation to initialize
     * @return void
     */
    public function initRelation($relationName)
    {
        if ('ExpertCryosphereWhere' == $relationName) {
            $this->initExpertCryosphereWheres();
            return;
        }
        if ('InformationSeekerConnectRequestCryosphereWhere' == $relationName) {
            $this->initInformationSeekerConnectRequestCryosphereWheres();
            return;
        }
    }

    /**
     * Clears out the collExpertCryosphereWheres collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addExpertCryosphereWheres()
     */
    public function clearExpertCryosphereWheres()
    {
        $this->collExpertCryosphereWheres = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Reset is the collExpertCryosphereWheres collection loaded partially.
     */
    public function resetPartialExpertCryosphereWheres($v = true)
    {
        $this->collExpertCryosphereWheresPartial = $v;
    }

    /**
     * Initializes the collExpertCryosphereWheres collection.
     *
     * By default this just sets the collExpertCryosphereWheres collection to an empty array (like clearcollExpertCryosphereWheres());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param      boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initExpertCryosphereWheres($overrideExisting = true)
    {
        if (null !== $this->collExpertCryosphereWheres && !$overrideExisting) {
            return;
        }

        $collectionClassName = ExpertCryosphereWhereTableMap::getTableMap()->getCollectionClassName();

        $this->collExpertCryosphereWheres = new $collectionClassName;
        $this->collExpertCryosphereWheres->setModel('\CryoConnectDB\ExpertCryosphereWhere');
    }

    /**
     * Gets an array of ChildExpertCryosphereWhere objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ChildCryosphereWhere is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @return ObjectCollection|ChildExpertCryosphereWhere[] List of ChildExpertCryosphereWhere objects
     * @throws PropelException
     */
    public function getExpertCryosphereWheres(Criteria $criteria = null, ConnectionInterface $con = null)
    {
        $partial = $this->collExpertCryosphereWheresPartial && !$this->isNew();
        if (null === $this->collExpertCryosphereWheres || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collExpertCryosphereWheres) {
                // return empty collection
                $this->initExpertCryosphereWheres();
            } else {
                $collExpertCryosphereWheres = ChildExpertCryosphereWhereQuery::create(null, $criteria)
                    ->filterByCryosphereWhere($this)
                    ->find($con);

                if (null !== $criteria) {
                    if (false !== $this->collExpertCryosphereWheresPartial && count($collExpertCryosphereWheres)) {
                        $this->initExpertCryosphereWheres(false);

                        foreach ($collExpertCryosphereWheres as $obj) {
                            if (false == $this->collExpertCryosphereWheres->contains($obj)) {
                                $this->collExpertCryosphereWheres->append($obj);
                            }
                        }

                        $this->collExpertCryosphereWheresPartial = true;
                    }

                    return $collExpertCryosphereWheres;
                }

                if ($partial && $this->collExpertCryosphereWheres) {
                    foreach ($this->collExpertCryosphereWheres as $obj) {
                        if ($obj->isNew()) {
                            $collExpertCryosphereWheres[] = $obj;
                        }
                    }
                }

                $this->collExpertCryosphereWheres = $collExpertCryosphereWheres;
                $this->collExpertCryosphereWheresPartial = false;
            }
        }

        return $this->collExpertCryosphereWheres;
    }

    /**
     * Sets a collection of ChildExpertCryosphereWhere objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      Collection $expertCryosphereWheres A Propel collection.
     * @param      ConnectionInterface $con Optional connection object
     * @return $this|ChildCryosphereWhere The current object (for fluent API support)
     */
    public function setExpertCryosphereWheres(Collection $expertCryosphereWheres, ConnectionInterface $con = null)
    {
        /** @var ChildExpertCryosphereWhere[] $expertCryosphereWheresToDelete */
        $expertCryosphereWheresToDelete = $this->getExpertCryosphereWheres(new Criteria(), $con)->diff($expertCryosphereWheres);


        //since at least one column in the foreign key is at the same time a PK
        //we can not just set a PK to NULL in the lines below. We have to store
        //a backup of all values, so we are able to manipulate these items based on the onDelete value later.
        $this->expertCryosphereWheresScheduledForDeletion = clone $expertCryosphereWheresToDelete;

        foreach ($expertCryosphereWheresToDelete as $expertCryosphereWhereRemoved) {
            $expertCryosphereWhereRemoved->setCryosphereWhere(null);
        }

        $this->collExpertCryosphereWheres = null;
        foreach ($expertCryosphereWheres as $expertCryosphereWhere) {
            $this->addExpertCryosphereWhere($expertCryosphereWhere);
        }

        $this->collExpertCryosphereWheres = $expertCryosphereWheres;
        $this->collExpertCryosphereWheresPartial = false;

        return $this;
    }

    /**
     * Returns the number of related ExpertCryosphereWhere objects.
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct
     * @param      ConnectionInterface $con
     * @return int             Count of related ExpertCryosphereWhere objects.
     * @throws PropelException
     */
    public function countExpertCryosphereWheres(Criteria $criteria = null, $distinct = false, ConnectionInterface $con = null)
    {
        $partial = $this->collExpertCryosphereWheresPartial && !$this->isNew();
        if (null === $this->collExpertCryosphereWheres || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collExpertCryosphereWheres) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getExpertCryosphereWheres());
            }

            $query = ChildExpertCryosphereWhereQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByCryosphereWhere($this)
                ->count($con);
        }

        return count($this->collExpertCryosphereWheres);
    }

    /**
     * Method called to associate a ChildExpertCryosphereWhere object to this object
     * through the ChildExpertCryosphereWhere foreign key attribute.
     *
     * @param  ChildExpertCryosphereWhere $l ChildExpertCryosphereWhere
     * @return $this|\CryoConnectDB\CryosphereWhere The current object (for fluent API support)
     */
    public function addExpertCryosphereWhere(ChildExpertCryosphereWhere $l)
    {
        if ($this->collExpertCryosphereWheres === null) {
            $this->initExpertCryosphereWheres();
            $this->collExpertCryosphereWheresPartial = true;
        }

        if (!$this->collExpertCryosphereWheres->contains($l)) {
            $this->doAddExpertCryosphereWhere($l);

            if ($this->expertCryosphereWheresScheduledForDeletion and $this->expertCryosphereWheresScheduledForDeletion->contains($l)) {
                $this->expertCryosphereWheresScheduledForDeletion->remove($this->expertCryosphereWheresScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param ChildExpertCryosphereWhere $expertCryosphereWhere The ChildExpertCryosphereWhere object to add.
     */
    protected function doAddExpertCryosphereWhere(ChildExpertCryosphereWhere $expertCryosphereWhere)
    {
        $this->collExpertCryosphereWheres[]= $expertCryosphereWhere;
        $expertCryosphereWhere->setCryosphereWhere($this);
    }

    /**
     * @param  ChildExpertCryosphereWhere $expertCryosphereWhere The ChildExpertCryosphereWhere object to remove.
     * @return $this|ChildCryosphereWhere The current object (for fluent API support)
     */
    public function removeExpertCryosphereWhere(ChildExpertCryosphereWhere $expertCryosphereWhere)
    {
        if ($this->getExpertCryosphereWheres()->contains($expertCryosphereWhere)) {
            $pos = $this->collExpertCryosphereWheres->search($expertCryosphereWhere);
            $this->collExpertCryosphereWheres->remove($pos);
            if (null === $this->expertCryosphereWheresScheduledForDeletion) {
                $this->expertCryosphereWheresScheduledForDeletion = clone $this->collExpertCryosphereWheres;
                $this->expertCryosphereWheresScheduledForDeletion->clear();
            }
            $this->expertCryosphereWheresScheduledForDeletion[]= clone $expertCryosphereWhere;
            $expertCryosphereWhere->setCryosphereWhere(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this CryosphereWhere is new, it will return
     * an empty collection; or if this CryosphereWhere has previously
     * been saved, it will retrieve related ExpertCryosphereWheres from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in CryosphereWhere.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildExpertCryosphereWhere[] List of ChildExpertCryosphereWhere objects
     */
    public function getExpertCryosphereWheresJoinExperts(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildExpertCryosphereWhereQuery::create(null, $criteria);
        $query->joinWith('Experts', $joinBehavior);

        return $this->getExpertCryosphereWheres($query, $con);
    }

    /**
     * Clears out the collInformationSeekerConnectRequestCryosphereWheres collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addInformationSeekerConnectRequestCryosphereWheres()
     */
    public function clearInformationSeekerConnectRequestCryosphereWheres()
    {
        $this->collInformationSeekerConnectRequestCryosphereWheres = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Reset is the collInformationSeekerConnectRequestCryosphereWheres collection loaded partially.
     */
    public function resetPartialInformationSeekerConnectRequestCryosphereWheres($v = true)
    {
        $this->collInformationSeekerConnectRequestCryosphereWheresPartial = $v;
    }

    /**
     * Initializes the collInformationSeekerConnectRequestCryosphereWheres collection.
     *
     * By default this just sets the collInformationSeekerConnectRequestCryosphereWheres collection to an empty array (like clearcollInformationSeekerConnectRequestCryosphereWheres());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param      boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initInformationSeekerConnectRequestCryosphereWheres($overrideExisting = true)
    {
        if (null !== $this->collInformationSeekerConnectRequestCryosphereWheres && !$overrideExisting) {
            return;
        }

        $collectionClassName = InformationSeekerConnectRequestCryosphereWhereTableMap::getTableMap()->getCollectionClassName();

        $this->collInformationSeekerConnectRequestCryosphereWheres = new $collectionClassName;
        $this->collInformationSeekerConnectRequestCryosphereWheres->setModel('\CryoConnectDB\InformationSeekerConnectRequestCryosphereWhere');
    }

    /**
     * Gets an array of ChildInformationSeekerConnectRequestCryosphereWhere objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ChildCryosphereWhere is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @return ObjectCollection|ChildInformationSeekerConnectRequestCryosphereWhere[] List of ChildInformationSeekerConnectRequestCryosphereWhere objects
     * @throws PropelException
     */
    public function getInformationSeekerConnectRequestCryosphereWheres(Criteria $criteria = null, ConnectionInterface $con = null)
    {
        $partial = $this->collInformationSeekerConnectRequestCryosphereWheresPartial && !$this->isNew();
        if (null === $this->collInformationSeekerConnectRequestCryosphereWheres || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collInformationSeekerConnectRequestCryosphereWheres) {
                // return empty collection
                $this->initInformationSeekerConnectRequestCryosphereWheres();
            } else {
                $collInformationSeekerConnectRequestCryosphereWheres = ChildInformationSeekerConnectRequestCryosphereWhereQuery::create(null, $criteria)
                    ->filterByCryosphereWhere($this)
                    ->find($con);

                if (null !== $criteria) {
                    if (false !== $this->collInformationSeekerConnectRequestCryosphereWheresPartial && count($collInformationSeekerConnectRequestCryosphereWheres)) {
                        $this->initInformationSeekerConnectRequestCryosphereWheres(false);

                        foreach ($collInformationSeekerConnectRequestCryosphereWheres as $obj) {
                            if (false == $this->collInformationSeekerConnectRequestCryosphereWheres->contains($obj)) {
                                $this->collInformationSeekerConnectRequestCryosphereWheres->append($obj);
                            }
                        }

                        $this->collInformationSeekerConnectRequestCryosphereWheresPartial = true;
                    }

                    return $collInformationSeekerConnectRequestCryosphereWheres;
                }

                if ($partial && $this->collInformationSeekerConnectRequestCryosphereWheres) {
                    foreach ($this->collInformationSeekerConnectRequestCryosphereWheres as $obj) {
                        if ($obj->isNew()) {
                            $collInformationSeekerConnectRequestCryosphereWheres[] = $obj;
                        }
                    }
                }

                $this->collInformationSeekerConnectRequestCryosphereWheres = $collInformationSeekerConnectRequestCryosphereWheres;
                $this->collInformationSeekerConnectRequestCryosphereWheresPartial = false;
            }
        }

        return $this->collInformationSeekerConnectRequestCryosphereWheres;
    }

    /**
     * Sets a collection of ChildInformationSeekerConnectRequestCryosphereWhere objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      Collection $informationSeekerConnectRequestCryosphereWheres A Propel collection.
     * @param      ConnectionInterface $con Optional connection object
     * @return $this|ChildCryosphereWhere The current object (for fluent API support)
     */
    public function setInformationSeekerConnectRequestCryosphereWheres(Collection $informationSeekerConnectRequestCryosphereWheres, ConnectionInterface $con = null)
    {
        /** @var ChildInformationSeekerConnectRequestCryosphereWhere[] $informationSeekerConnectRequestCryosphereWheresToDelete */
        $informationSeekerConnectRequestCryosphereWheresToDelete = $this->getInformationSeekerConnectRequestCryosphereWheres(new Criteria(), $con)->diff($informationSeekerConnectRequestCryosphereWheres);


        //since at least one column in the foreign key is at the same time a PK
        //we can not just set a PK to NULL in the lines below. We have to store
        //a backup of all values, so we are able to manipulate these items based on the onDelete value later.
        $this->informationSeekerConnectRequestCryosphereWheresScheduledForDeletion = clone $informationSeekerConnectRequestCryosphereWheresToDelete;

        foreach ($informationSeekerConnectRequestCryosphereWheresToDelete as $informationSeekerConnectRequestCryosphereWhereRemoved) {
            $informationSeekerConnectRequestCryosphereWhereRemoved->setCryosphereWhere(null);
        }

        $this->collInformationSeekerConnectRequestCryosphereWheres = null;
        foreach ($informationSeekerConnectRequestCryosphereWheres as $informationSeekerConnectRequestCryosphereWhere) {
            $this->addInformationSeekerConnectRequestCryosphereWhere($informationSeekerConnectRequestCryosphereWhere);
        }

        $this->collInformationSeekerConnectRequestCryosphereWheres = $informationSeekerConnectRequestCryosphereWheres;
        $this->collInformationSeekerConnectRequestCryosphereWheresPartial = false;

        return $this;
    }

    /**
     * Returns the number of related InformationSeekerConnectRequestCryosphereWhere objects.
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct
     * @param      ConnectionInterface $con
     * @return int             Count of related InformationSeekerConnectRequestCryosphereWhere objects.
     * @throws PropelException
     */
    public function countInformationSeekerConnectRequestCryosphereWheres(Criteria $criteria = null, $distinct = false, ConnectionInterface $con = null)
    {
        $partial = $this->collInformationSeekerConnectRequestCryosphereWheresPartial && !$this->isNew();
        if (null === $this->collInformationSeekerConnectRequestCryosphereWheres || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collInformationSeekerConnectRequestCryosphereWheres) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getInformationSeekerConnectRequestCryosphereWheres());
            }

            $query = ChildInformationSeekerConnectRequestCryosphereWhereQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByCryosphereWhere($this)
                ->count($con);
        }

        return count($this->collInformationSeekerConnectRequestCryosphereWheres);
    }

    /**
     * Method called to associate a ChildInformationSeekerConnectRequestCryosphereWhere object to this object
     * through the ChildInformationSeekerConnectRequestCryosphereWhere foreign key attribute.
     *
     * @param  ChildInformationSeekerConnectRequestCryosphereWhere $l ChildInformationSeekerConnectRequestCryosphereWhere
     * @return $this|\CryoConnectDB\CryosphereWhere The current object (for fluent API support)
     */
    public function addInformationSeekerConnectRequestCryosphereWhere(ChildInformationSeekerConnectRequestCryosphereWhere $l)
    {
        if ($this->collInformationSeekerConnectRequestCryosphereWheres === null) {
            $this->initInformationSeekerConnectRequestCryosphereWheres();
            $this->collInformationSeekerConnectRequestCryosphereWheresPartial = true;
        }

        if (!$this->collInformationSeekerConnectRequestCryosphereWheres->contains($l)) {
            $this->doAddInformationSeekerConnectRequestCryosphereWhere($l);

            if ($this->informationSeekerConnectRequestCryosphereWheresScheduledForDeletion and $this->informationSeekerConnectRequestCryosphereWheresScheduledForDeletion->contains($l)) {
                $this->informationSeekerConnectRequestCryosphereWheresScheduledForDeletion->remove($this->informationSeekerConnectRequestCryosphereWheresScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param ChildInformationSeekerConnectRequestCryosphereWhere $informationSeekerConnectRequestCryosphereWhere The ChildInformationSeekerConnectRequestCryosphereWhere object to add.
     */
    protected function doAddInformationSeekerConnectRequestCryosphereWhere(ChildInformationSeekerConnectRequestCryosphereWhere $informationSeekerConnectRequestCryosphereWhere)
    {
        $this->collInformationSeekerConnectRequestCryosphereWheres[]= $informationSeekerConnectRequestCryosphereWhere;
        $informationSeekerConnectRequestCryosphereWhere->setCryosphereWhere($this);
    }

    /**
     * @param  ChildInformationSeekerConnectRequestCryosphereWhere $informationSeekerConnectRequestCryosphereWhere The ChildInformationSeekerConnectRequestCryosphereWhere object to remove.
     * @return $this|ChildCryosphereWhere The current object (for fluent API support)
     */
    public function removeInformationSeekerConnectRequestCryosphereWhere(ChildInformationSeekerConnectRequestCryosphereWhere $informationSeekerConnectRequestCryosphereWhere)
    {
        if ($this->getInformationSeekerConnectRequestCryosphereWheres()->contains($informationSeekerConnectRequestCryosphereWhere)) {
            $pos = $this->collInformationSeekerConnectRequestCryosphereWheres->search($informationSeekerConnectRequestCryosphereWhere);
            $this->collInformationSeekerConnectRequestCryosphereWheres->remove($pos);
            if (null === $this->informationSeekerConnectRequestCryosphereWheresScheduledForDeletion) {
                $this->informationSeekerConnectRequestCryosphereWheresScheduledForDeletion = clone $this->collInformationSeekerConnectRequestCryosphereWheres;
                $this->informationSeekerConnectRequestCryosphereWheresScheduledForDeletion->clear();
            }
            $this->informationSeekerConnectRequestCryosphereWheresScheduledForDeletion[]= clone $informationSeekerConnectRequestCryosphereWhere;
            $informationSeekerConnectRequestCryosphereWhere->setCryosphereWhere(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this CryosphereWhere is new, it will return
     * an empty collection; or if this CryosphereWhere has previously
     * been saved, it will retrieve related InformationSeekerConnectRequestCryosphereWheres from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in CryosphereWhere.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildInformationSeekerConnectRequestCryosphereWhere[] List of ChildInformationSeekerConnectRequestCryosphereWhere objects
     */
    public function getInformationSeekerConnectRequestCryosphereWheresJoinInformationSeekerConnectRequest(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildInformationSeekerConnectRequestCryosphereWhereQuery::create(null, $criteria);
        $query->joinWith('InformationSeekerConnectRequest', $joinBehavior);

        return $this->getInformationSeekerConnectRequestCryosphereWheres($query, $con);
    }

    /**
     * Clears out the collExpertss collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addExpertss()
     */
    public function clearExpertss()
    {
        $this->collExpertss = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Initializes the collExpertss crossRef collection.
     *
     * By default this just sets the collExpertss collection to an empty collection (like clearExpertss());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @return void
     */
    public function initExpertss()
    {
        $collectionClassName = ExpertCryosphereWhereTableMap::getTableMap()->getCollectionClassName();

        $this->collExpertss = new $collectionClassName;
        $this->collExpertssPartial = true;
        $this->collExpertss->setModel('\CryoConnectDB\Experts');
    }

    /**
     * Checks if the collExpertss collection is loaded.
     *
     * @return bool
     */
    public function isExpertssLoaded()
    {
        return null !== $this->collExpertss;
    }

    /**
     * Gets a collection of ChildExperts objects related by a many-to-many relationship
     * to the current object by way of the expert_cryosphere_where cross-reference table.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ChildCryosphereWhere is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria Optional query object to filter the query
     * @param      ConnectionInterface $con Optional connection object
     *
     * @return ObjectCollection|ChildExperts[] List of ChildExperts objects
     */
    public function getExpertss(Criteria $criteria = null, ConnectionInterface $con = null)
    {
        $partial = $this->collExpertssPartial && !$this->isNew();
        if (null === $this->collExpertss || null !== $criteria || $partial) {
            if ($this->isNew()) {
                // return empty collection
                if (null === $this->collExpertss) {
                    $this->initExpertss();
                }
            } else {

                $query = ChildExpertsQuery::create(null, $criteria)
                    ->filterByCryosphereWhere($this);
                $collExpertss = $query->find($con);
                if (null !== $criteria) {
                    return $collExpertss;
                }

                if ($partial && $this->collExpertss) {
                    //make sure that already added objects gets added to the list of the database.
                    foreach ($this->collExpertss as $obj) {
                        if (!$collExpertss->contains($obj)) {
                            $collExpertss[] = $obj;
                        }
                    }
                }

                $this->collExpertss = $collExpertss;
                $this->collExpertssPartial = false;
            }
        }

        return $this->collExpertss;
    }

    /**
     * Sets a collection of Experts objects related by a many-to-many relationship
     * to the current object by way of the expert_cryosphere_where cross-reference table.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param  Collection $expertss A Propel collection.
     * @param  ConnectionInterface $con Optional connection object
     * @return $this|ChildCryosphereWhere The current object (for fluent API support)
     */
    public function setExpertss(Collection $expertss, ConnectionInterface $con = null)
    {
        $this->clearExpertss();
        $currentExpertss = $this->getExpertss();

        $expertssScheduledForDeletion = $currentExpertss->diff($expertss);

        foreach ($expertssScheduledForDeletion as $toDelete) {
            $this->removeExperts($toDelete);
        }

        foreach ($expertss as $experts) {
            if (!$currentExpertss->contains($experts)) {
                $this->doAddExperts($experts);
            }
        }

        $this->collExpertssPartial = false;
        $this->collExpertss = $expertss;

        return $this;
    }

    /**
     * Gets the number of Experts objects related by a many-to-many relationship
     * to the current object by way of the expert_cryosphere_where cross-reference table.
     *
     * @param      Criteria $criteria Optional query object to filter the query
     * @param      boolean $distinct Set to true to force count distinct
     * @param      ConnectionInterface $con Optional connection object
     *
     * @return int the number of related Experts objects
     */
    public function countExpertss(Criteria $criteria = null, $distinct = false, ConnectionInterface $con = null)
    {
        $partial = $this->collExpertssPartial && !$this->isNew();
        if (null === $this->collExpertss || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collExpertss) {
                return 0;
            } else {

                if ($partial && !$criteria) {
                    return count($this->getExpertss());
                }

                $query = ChildExpertsQuery::create(null, $criteria);
                if ($distinct) {
                    $query->distinct();
                }

                return $query
                    ->filterByCryosphereWhere($this)
                    ->count($con);
            }
        } else {
            return count($this->collExpertss);
        }
    }

    /**
     * Associate a ChildExperts to this object
     * through the expert_cryosphere_where cross reference table.
     *
     * @param ChildExperts $experts
     * @return ChildCryosphereWhere The current object (for fluent API support)
     */
    public function addExperts(ChildExperts $experts)
    {
        if ($this->collExpertss === null) {
            $this->initExpertss();
        }

        if (!$this->getExpertss()->contains($experts)) {
            // only add it if the **same** object is not already associated
            $this->collExpertss->push($experts);
            $this->doAddExperts($experts);
        }

        return $this;
    }

    /**
     *
     * @param ChildExperts $experts
     */
    protected function doAddExperts(ChildExperts $experts)
    {
        $expertCryosphereWhere = new ChildExpertCryosphereWhere();

        $expertCryosphereWhere->setExperts($experts);

        $expertCryosphereWhere->setCryosphereWhere($this);

        $this->addExpertCryosphereWhere($expertCryosphereWhere);

        // set the back reference to this object directly as using provided method either results
        // in endless loop or in multiple relations
        if (!$experts->isCryosphereWheresLoaded()) {
            $experts->initCryosphereWheres();
            $experts->getCryosphereWheres()->push($this);
        } elseif (!$experts->getCryosphereWheres()->contains($this)) {
            $experts->getCryosphereWheres()->push($this);
        }

    }

    /**
     * Remove experts of this object
     * through the expert_cryosphere_where cross reference table.
     *
     * @param ChildExperts $experts
     * @return ChildCryosphereWhere The current object (for fluent API support)
     */
    public function removeExperts(ChildExperts $experts)
    {
        if ($this->getExpertss()->contains($experts)) {
            $expertCryosphereWhere = new ChildExpertCryosphereWhere();
            $expertCryosphereWhere->setExperts($experts);
            if ($experts->isCryosphereWheresLoaded()) {
                //remove the back reference if available
                $experts->getCryosphereWheres()->removeObject($this);
            }

            $expertCryosphereWhere->setCryosphereWhere($this);
            $this->removeExpertCryosphereWhere(clone $expertCryosphereWhere);
            $expertCryosphereWhere->clear();

            $this->collExpertss->remove($this->collExpertss->search($experts));

            if (null === $this->expertssScheduledForDeletion) {
                $this->expertssScheduledForDeletion = clone $this->collExpertss;
                $this->expertssScheduledForDeletion->clear();
            }

            $this->expertssScheduledForDeletion->push($experts);
        }


        return $this;
    }

    /**
     * Clears out the collInformationSeekerConnectRequests collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addInformationSeekerConnectRequests()
     */
    public function clearInformationSeekerConnectRequests()
    {
        $this->collInformationSeekerConnectRequests = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Initializes the collInformationSeekerConnectRequests crossRef collection.
     *
     * By default this just sets the collInformationSeekerConnectRequests collection to an empty collection (like clearInformationSeekerConnectRequests());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @return void
     */
    public function initInformationSeekerConnectRequests()
    {
        $collectionClassName = InformationSeekerConnectRequestCryosphereWhereTableMap::getTableMap()->getCollectionClassName();

        $this->collInformationSeekerConnectRequests = new $collectionClassName;
        $this->collInformationSeekerConnectRequestsPartial = true;
        $this->collInformationSeekerConnectRequests->setModel('\CryoConnectDB\InformationSeekerConnectRequest');
    }

    /**
     * Checks if the collInformationSeekerConnectRequests collection is loaded.
     *
     * @return bool
     */
    public function isInformationSeekerConnectRequestsLoaded()
    {
        return null !== $this->collInformationSeekerConnectRequests;
    }

    /**
     * Gets a collection of ChildInformationSeekerConnectRequest objects related by a many-to-many relationship
     * to the current object by way of the information_seeker_connect_request_cryosphere_where cross-reference table.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ChildCryosphereWhere is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria Optional query object to filter the query
     * @param      ConnectionInterface $con Optional connection object
     *
     * @return ObjectCollection|ChildInformationSeekerConnectRequest[] List of ChildInformationSeekerConnectRequest objects
     */
    public function getInformationSeekerConnectRequests(Criteria $criteria = null, ConnectionInterface $con = null)
    {
        $partial = $this->collInformationSeekerConnectRequestsPartial && !$this->isNew();
        if (null === $this->collInformationSeekerConnectRequests || null !== $criteria || $partial) {
            if ($this->isNew()) {
                // return empty collection
                if (null === $this->collInformationSeekerConnectRequests) {
                    $this->initInformationSeekerConnectRequests();
                }
            } else {

                $query = ChildInformationSeekerConnectRequestQuery::create(null, $criteria)
                    ->filterByCryosphereWhere($this);
                $collInformationSeekerConnectRequests = $query->find($con);
                if (null !== $criteria) {
                    return $collInformationSeekerConnectRequests;
                }

                if ($partial && $this->collInformationSeekerConnectRequests) {
                    //make sure that already added objects gets added to the list of the database.
                    foreach ($this->collInformationSeekerConnectRequests as $obj) {
                        if (!$collInformationSeekerConnectRequests->contains($obj)) {
                            $collInformationSeekerConnectRequests[] = $obj;
                        }
                    }
                }

                $this->collInformationSeekerConnectRequests = $collInformationSeekerConnectRequests;
                $this->collInformationSeekerConnectRequestsPartial = false;
            }
        }

        return $this->collInformationSeekerConnectRequests;
    }

    /**
     * Sets a collection of InformationSeekerConnectRequest objects related by a many-to-many relationship
     * to the current object by way of the information_seeker_connect_request_cryosphere_where cross-reference table.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param  Collection $informationSeekerConnectRequests A Propel collection.
     * @param  ConnectionInterface $con Optional connection object
     * @return $this|ChildCryosphereWhere The current object (for fluent API support)
     */
    public function setInformationSeekerConnectRequests(Collection $informationSeekerConnectRequests, ConnectionInterface $con = null)
    {
        $this->clearInformationSeekerConnectRequests();
        $currentInformationSeekerConnectRequests = $this->getInformationSeekerConnectRequests();

        $informationSeekerConnectRequestsScheduledForDeletion = $currentInformationSeekerConnectRequests->diff($informationSeekerConnectRequests);

        foreach ($informationSeekerConnectRequestsScheduledForDeletion as $toDelete) {
            $this->removeInformationSeekerConnectRequest($toDelete);
        }

        foreach ($informationSeekerConnectRequests as $informationSeekerConnectRequest) {
            if (!$currentInformationSeekerConnectRequests->contains($informationSeekerConnectRequest)) {
                $this->doAddInformationSeekerConnectRequest($informationSeekerConnectRequest);
            }
        }

        $this->collInformationSeekerConnectRequestsPartial = false;
        $this->collInformationSeekerConnectRequests = $informationSeekerConnectRequests;

        return $this;
    }

    /**
     * Gets the number of InformationSeekerConnectRequest objects related by a many-to-many relationship
     * to the current object by way of the information_seeker_connect_request_cryosphere_where cross-reference table.
     *
     * @param      Criteria $criteria Optional query object to filter the query
     * @param      boolean $distinct Set to true to force count distinct
     * @param      ConnectionInterface $con Optional connection object
     *
     * @return int the number of related InformationSeekerConnectRequest objects
     */
    public function countInformationSeekerConnectRequests(Criteria $criteria = null, $distinct = false, ConnectionInterface $con = null)
    {
        $partial = $this->collInformationSeekerConnectRequestsPartial && !$this->isNew();
        if (null === $this->collInformationSeekerConnectRequests || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collInformationSeekerConnectRequests) {
                return 0;
            } else {

                if ($partial && !$criteria) {
                    return count($this->getInformationSeekerConnectRequests());
                }

                $query = ChildInformationSeekerConnectRequestQuery::create(null, $criteria);
                if ($distinct) {
                    $query->distinct();
                }

                return $query
                    ->filterByCryosphereWhere($this)
                    ->count($con);
            }
        } else {
            return count($this->collInformationSeekerConnectRequests);
        }
    }

    /**
     * Associate a ChildInformationSeekerConnectRequest to this object
     * through the information_seeker_connect_request_cryosphere_where cross reference table.
     *
     * @param ChildInformationSeekerConnectRequest $informationSeekerConnectRequest
     * @return ChildCryosphereWhere The current object (for fluent API support)
     */
    public function addInformationSeekerConnectRequest(ChildInformationSeekerConnectRequest $informationSeekerConnectRequest)
    {
        if ($this->collInformationSeekerConnectRequests === null) {
            $this->initInformationSeekerConnectRequests();
        }

        if (!$this->getInformationSeekerConnectRequests()->contains($informationSeekerConnectRequest)) {
            // only add it if the **same** object is not already associated
            $this->collInformationSeekerConnectRequests->push($informationSeekerConnectRequest);
            $this->doAddInformationSeekerConnectRequest($informationSeekerConnectRequest);
        }

        return $this;
    }

    /**
     *
     * @param ChildInformationSeekerConnectRequest $informationSeekerConnectRequest
     */
    protected function doAddInformationSeekerConnectRequest(ChildInformationSeekerConnectRequest $informationSeekerConnectRequest)
    {
        $informationSeekerConnectRequestCryosphereWhere = new ChildInformationSeekerConnectRequestCryosphereWhere();

        $informationSeekerConnectRequestCryosphereWhere->setInformationSeekerConnectRequest($informationSeekerConnectRequest);

        $informationSeekerConnectRequestCryosphereWhere->setCryosphereWhere($this);

        $this->addInformationSeekerConnectRequestCryosphereWhere($informationSeekerConnectRequestCryosphereWhere);

        // set the back reference to this object directly as using provided method either results
        // in endless loop or in multiple relations
        if (!$informationSeekerConnectRequest->isCryosphereWheresLoaded()) {
            $informationSeekerConnectRequest->initCryosphereWheres();
            $informationSeekerConnectRequest->getCryosphereWheres()->push($this);
        } elseif (!$informationSeekerConnectRequest->getCryosphereWheres()->contains($this)) {
            $informationSeekerConnectRequest->getCryosphereWheres()->push($this);
        }

    }

    /**
     * Remove informationSeekerConnectRequest of this object
     * through the information_seeker_connect_request_cryosphere_where cross reference table.
     *
     * @param ChildInformationSeekerConnectRequest $informationSeekerConnectRequest
     * @return ChildCryosphereWhere The current object (for fluent API support)
     */
    public function removeInformationSeekerConnectRequest(ChildInformationSeekerConnectRequest $informationSeekerConnectRequest)
    {
        if ($this->getInformationSeekerConnectRequests()->contains($informationSeekerConnectRequest)) {
            $informationSeekerConnectRequestCryosphereWhere = new ChildInformationSeekerConnectRequestCryosphereWhere();
            $informationSeekerConnectRequestCryosphereWhere->setInformationSeekerConnectRequest($informationSeekerConnectRequest);
            if ($informationSeekerConnectRequest->isCryosphereWheresLoaded()) {
                //remove the back reference if available
                $informationSeekerConnectRequest->getCryosphereWheres()->removeObject($this);
            }

            $informationSeekerConnectRequestCryosphereWhere->setCryosphereWhere($this);
            $this->removeInformationSeekerConnectRequestCryosphereWhere(clone $informationSeekerConnectRequestCryosphereWhere);
            $informationSeekerConnectRequestCryosphereWhere->clear();

            $this->collInformationSeekerConnectRequests->remove($this->collInformationSeekerConnectRequests->search($informationSeekerConnectRequest));

            if (null === $this->informationSeekerConnectRequestsScheduledForDeletion) {
                $this->informationSeekerConnectRequestsScheduledForDeletion = clone $this->collInformationSeekerConnectRequests;
                $this->informationSeekerConnectRequestsScheduledForDeletion->clear();
            }

            $this->informationSeekerConnectRequestsScheduledForDeletion->push($informationSeekerConnectRequest);
        }


        return $this;
    }

    /**
     * Clears the current object, sets all attributes to their default values and removes
     * outgoing references as well as back-references (from other objects to this one. Results probably in a database
     * change of those foreign objects when you call `save` there).
     */
    public function clear()
    {
        $this->id = null;
        $this->cryosphere_where_name = null;
        $this->timestamp = null;
        $this->alreadyInSave = false;
        $this->clearAllReferences();
        $this->applyDefaultValues();
        $this->resetModified();
        $this->setNew(true);
        $this->setDeleted(false);
    }

    /**
     * Resets all references and back-references to other model objects or collections of model objects.
     *
     * This method is used to reset all php object references (not the actual reference in the database).
     * Necessary for object serialisation.
     *
     * @param      boolean $deep Whether to also clear the references on all referrer objects.
     */
    public function clearAllReferences($deep = false)
    {
        if ($deep) {
            if ($this->collExpertCryosphereWheres) {
                foreach ($this->collExpertCryosphereWheres as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collInformationSeekerConnectRequestCryosphereWheres) {
                foreach ($this->collInformationSeekerConnectRequestCryosphereWheres as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collExpertss) {
                foreach ($this->collExpertss as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collInformationSeekerConnectRequests) {
                foreach ($this->collInformationSeekerConnectRequests as $o) {
                    $o->clearAllReferences($deep);
                }
            }
        } // if ($deep)

        $this->collExpertCryosphereWheres = null;
        $this->collInformationSeekerConnectRequestCryosphereWheres = null;
        $this->collExpertss = null;
        $this->collInformationSeekerConnectRequests = null;
    }

    /**
     * Return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(CryosphereWhereTableMap::DEFAULT_STRING_FORMAT);
    }

    /**
     * Code to be run before persisting the object
     * @param  ConnectionInterface $con
     * @return boolean
     */
    public function preSave(ConnectionInterface $con = null)
    {
        if (is_callable('parent::preSave')) {
            return parent::preSave($con);
        }
        return true;
    }

    /**
     * Code to be run after persisting the object
     * @param ConnectionInterface $con
     */
    public function postSave(ConnectionInterface $con = null)
    {
        if (is_callable('parent::postSave')) {
            parent::postSave($con);
        }
    }

    /**
     * Code to be run before inserting to database
     * @param  ConnectionInterface $con
     * @return boolean
     */
    public function preInsert(ConnectionInterface $con = null)
    {
        if (is_callable('parent::preInsert')) {
            return parent::preInsert($con);
        }
        return true;
    }

    /**
     * Code to be run after inserting to database
     * @param ConnectionInterface $con
     */
    public function postInsert(ConnectionInterface $con = null)
    {
        if (is_callable('parent::postInsert')) {
            parent::postInsert($con);
        }
    }

    /**
     * Code to be run before updating the object in database
     * @param  ConnectionInterface $con
     * @return boolean
     */
    public function preUpdate(ConnectionInterface $con = null)
    {
        if (is_callable('parent::preUpdate')) {
            return parent::preUpdate($con);
        }
        return true;
    }

    /**
     * Code to be run after updating the object in database
     * @param ConnectionInterface $con
     */
    public function postUpdate(ConnectionInterface $con = null)
    {
        if (is_callable('parent::postUpdate')) {
            parent::postUpdate($con);
        }
    }

    /**
     * Code to be run before deleting the object in database
     * @param  ConnectionInterface $con
     * @return boolean
     */
    public function preDelete(ConnectionInterface $con = null)
    {
        if (is_callable('parent::preDelete')) {
            return parent::preDelete($con);
        }
        return true;
    }

    /**
     * Code to be run after deleting the object in database
     * @param ConnectionInterface $con
     */
    public function postDelete(ConnectionInterface $con = null)
    {
        if (is_callable('parent::postDelete')) {
            parent::postDelete($con);
        }
    }


    /**
     * Derived method to catches calls to undefined methods.
     *
     * Provides magic import/export method support (fromXML()/toXML(), fromYAML()/toYAML(), etc.).
     * Allows to define default __call() behavior if you overwrite __call()
     *
     * @param string $name
     * @param mixed  $params
     *
     * @return array|string
     */
    public function __call($name, $params)
    {
        if (0 === strpos($name, 'get')) {
            $virtualColumn = substr($name, 3);
            if ($this->hasVirtualColumn($virtualColumn)) {
                return $this->getVirtualColumn($virtualColumn);
            }

            $virtualColumn = lcfirst($virtualColumn);
            if ($this->hasVirtualColumn($virtualColumn)) {
                return $this->getVirtualColumn($virtualColumn);
            }
        }

        if (0 === strpos($name, 'from')) {
            $format = substr($name, 4);

            return $this->importFrom($format, reset($params));
        }

        if (0 === strpos($name, 'to')) {
            $format = substr($name, 2);
            $includeLazyLoadColumns = isset($params[0]) ? $params[0] : true;

            return $this->exportTo($format, $includeLazyLoadColumns);
        }

        throw new BadMethodCallException(sprintf('Call to undefined method: %s.', $name));
    }

}
