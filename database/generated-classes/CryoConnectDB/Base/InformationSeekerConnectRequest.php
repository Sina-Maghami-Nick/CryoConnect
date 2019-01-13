<?php

namespace CryoConnectDB\Base;

use \DateTime;
use \Exception;
use \PDO;
use CryoConnectDB\CryosphereWhat as ChildCryosphereWhat;
use CryoConnectDB\CryosphereWhatQuery as ChildCryosphereWhatQuery;
use CryoConnectDB\CryosphereWhere as ChildCryosphereWhere;
use CryoConnectDB\CryosphereWhereQuery as ChildCryosphereWhereQuery;
use CryoConnectDB\InformationSeekerConnectRequest as ChildInformationSeekerConnectRequest;
use CryoConnectDB\InformationSeekerConnectRequestCryosphereWhat as ChildInformationSeekerConnectRequestCryosphereWhat;
use CryoConnectDB\InformationSeekerConnectRequestCryosphereWhatQuery as ChildInformationSeekerConnectRequestCryosphereWhatQuery;
use CryoConnectDB\InformationSeekerConnectRequestCryosphereWhere as ChildInformationSeekerConnectRequestCryosphereWhere;
use CryoConnectDB\InformationSeekerConnectRequestCryosphereWhereQuery as ChildInformationSeekerConnectRequestCryosphereWhereQuery;
use CryoConnectDB\InformationSeekerConnectRequestLanguages as ChildInformationSeekerConnectRequestLanguages;
use CryoConnectDB\InformationSeekerConnectRequestLanguagesQuery as ChildInformationSeekerConnectRequestLanguagesQuery;
use CryoConnectDB\InformationSeekerConnectRequestQuery as ChildInformationSeekerConnectRequestQuery;
use CryoConnectDB\InformationSeekers as ChildInformationSeekers;
use CryoConnectDB\InformationSeekersQuery as ChildInformationSeekersQuery;
use CryoConnectDB\Languages as ChildLanguages;
use CryoConnectDB\LanguagesQuery as ChildLanguagesQuery;
use CryoConnectDB\Map\InformationSeekerConnectRequestCryosphereWhatTableMap;
use CryoConnectDB\Map\InformationSeekerConnectRequestCryosphereWhereTableMap;
use CryoConnectDB\Map\InformationSeekerConnectRequestLanguagesTableMap;
use CryoConnectDB\Map\InformationSeekerConnectRequestTableMap;
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
 * Base class that represents a row from the 'information_seeker_connect_request' table.
 *
 *
 *
 * @package    propel.generator.CryoConnectDB.Base
 */
abstract class InformationSeekerConnectRequest implements ActiveRecordInterface
{
    /**
     * TableMap class name
     */
    const TABLE_MAP = '\\CryoConnectDB\\Map\\InformationSeekerConnectRequestTableMap';


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
     * The value for the information_seeker_id field.
     *
     * @var        int
     */
    protected $information_seeker_id;

    /**
     * The value for the contact_purpose field.
     *
     * @var        string
     */
    protected $contact_purpose;

    /**
     * The value for the created_at field.
     *
     * Note: this column has a database default value of: (expression) CURRENT_TIMESTAMP
     * @var        DateTime
     */
    protected $created_at;

    /**
     * @var        ChildInformationSeekers
     */
    protected $aInformationSeekers;

    /**
     * @var        ObjectCollection|ChildInformationSeekerConnectRequestCryosphereWhat[] Collection to store aggregation of ChildInformationSeekerConnectRequestCryosphereWhat objects.
     */
    protected $collInformationSeekerConnectRequestCryosphereWhats;
    protected $collInformationSeekerConnectRequestCryosphereWhatsPartial;

    /**
     * @var        ObjectCollection|ChildInformationSeekerConnectRequestCryosphereWhere[] Collection to store aggregation of ChildInformationSeekerConnectRequestCryosphereWhere objects.
     */
    protected $collInformationSeekerConnectRequestCryosphereWheres;
    protected $collInformationSeekerConnectRequestCryosphereWheresPartial;

    /**
     * @var        ObjectCollection|ChildInformationSeekerConnectRequestLanguages[] Collection to store aggregation of ChildInformationSeekerConnectRequestLanguages objects.
     */
    protected $collInformationSeekerConnectRequestLanguagess;
    protected $collInformationSeekerConnectRequestLanguagessPartial;

    /**
     * @var        ObjectCollection|ChildCryosphereWhat[] Cross Collection to store aggregation of ChildCryosphereWhat objects.
     */
    protected $collCryosphereWhats;

    /**
     * @var bool
     */
    protected $collCryosphereWhatsPartial;

    /**
     * @var        ObjectCollection|ChildCryosphereWhere[] Cross Collection to store aggregation of ChildCryosphereWhere objects.
     */
    protected $collCryosphereWheres;

    /**
     * @var bool
     */
    protected $collCryosphereWheresPartial;

    /**
     * @var        ObjectCollection|ChildLanguages[] Cross Collection to store aggregation of ChildLanguages objects.
     */
    protected $collLanguagess;

    /**
     * @var bool
     */
    protected $collLanguagessPartial;

    /**
     * Flag to prevent endless save loop, if this object is referenced
     * by another object which falls in this transaction.
     *
     * @var boolean
     */
    protected $alreadyInSave = false;

    /**
     * An array of objects scheduled for deletion.
     * @var ObjectCollection|ChildCryosphereWhat[]
     */
    protected $cryosphereWhatsScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var ObjectCollection|ChildCryosphereWhere[]
     */
    protected $cryosphereWheresScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var ObjectCollection|ChildLanguages[]
     */
    protected $languagessScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var ObjectCollection|ChildInformationSeekerConnectRequestCryosphereWhat[]
     */
    protected $informationSeekerConnectRequestCryosphereWhatsScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var ObjectCollection|ChildInformationSeekerConnectRequestCryosphereWhere[]
     */
    protected $informationSeekerConnectRequestCryosphereWheresScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var ObjectCollection|ChildInformationSeekerConnectRequestLanguages[]
     */
    protected $informationSeekerConnectRequestLanguagessScheduledForDeletion = null;

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
     * Initializes internal state of CryoConnectDB\Base\InformationSeekerConnectRequest object.
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
     * Compares this with another <code>InformationSeekerConnectRequest</code> instance.  If
     * <code>obj</code> is an instance of <code>InformationSeekerConnectRequest</code>, delegates to
     * <code>equals(InformationSeekerConnectRequest)</code>.  Otherwise, returns <code>false</code>.
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
     * @return $this|InformationSeekerConnectRequest The current object, for fluid interface
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
     * Get the [information_seeker_id] column value.
     *
     * @return int
     */
    public function getInformationSeekerId()
    {
        return $this->information_seeker_id;
    }

    /**
     * Get the [contact_purpose] column value.
     *
     * @return string
     */
    public function getContactPurpose()
    {
        return $this->contact_purpose;
    }

    /**
     * Get the [optionally formatted] temporal [created_at] column value.
     *
     *
     * @param      string|null $format The date/time format string (either date()-style or strftime()-style).
     *                            If format is NULL, then the raw DateTime object will be returned.
     *
     * @return string|DateTime Formatted date/time value as string or DateTime object (if format is NULL), NULL if column is NULL, and 0 if column value is 0000-00-00 00:00:00
     *
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getCreatedAt($format = NULL)
    {
        if ($format === null) {
            return $this->created_at;
        } else {
            return $this->created_at instanceof \DateTimeInterface ? $this->created_at->format($format) : null;
        }
    }

    /**
     * Set the value of [id] column.
     *
     * @param int $v new value
     * @return $this|\CryoConnectDB\InformationSeekerConnectRequest The current object (for fluent API support)
     */
    public function setId($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->id !== $v) {
            $this->id = $v;
            $this->modifiedColumns[InformationSeekerConnectRequestTableMap::COL_ID] = true;
        }

        return $this;
    } // setId()

    /**
     * Set the value of [information_seeker_id] column.
     *
     * @param int $v new value
     * @return $this|\CryoConnectDB\InformationSeekerConnectRequest The current object (for fluent API support)
     */
    public function setInformationSeekerId($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->information_seeker_id !== $v) {
            $this->information_seeker_id = $v;
            $this->modifiedColumns[InformationSeekerConnectRequestTableMap::COL_INFORMATION_SEEKER_ID] = true;
        }

        if ($this->aInformationSeekers !== null && $this->aInformationSeekers->getId() !== $v) {
            $this->aInformationSeekers = null;
        }

        return $this;
    } // setInformationSeekerId()

    /**
     * Set the value of [contact_purpose] column.
     *
     * @param string $v new value
     * @return $this|\CryoConnectDB\InformationSeekerConnectRequest The current object (for fluent API support)
     */
    public function setContactPurpose($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->contact_purpose !== $v) {
            $this->contact_purpose = $v;
            $this->modifiedColumns[InformationSeekerConnectRequestTableMap::COL_CONTACT_PURPOSE] = true;
        }

        return $this;
    } // setContactPurpose()

    /**
     * Sets the value of [created_at] column to a normalized version of the date/time value specified.
     *
     * @param  mixed $v string, integer (timestamp), or \DateTimeInterface value.
     *               Empty strings are treated as NULL.
     * @return $this|\CryoConnectDB\InformationSeekerConnectRequest The current object (for fluent API support)
     */
    public function setCreatedAt($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->created_at !== null || $dt !== null) {
            if ($this->created_at === null || $dt === null || $dt->format("Y-m-d H:i:s.u") !== $this->created_at->format("Y-m-d H:i:s.u")) {
                $this->created_at = $dt === null ? null : clone $dt;
                $this->modifiedColumns[InformationSeekerConnectRequestTableMap::COL_CREATED_AT] = true;
            }
        } // if either are not null

        return $this;
    } // setCreatedAt()

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

            $col = $row[TableMap::TYPE_NUM == $indexType ? 0 + $startcol : InformationSeekerConnectRequestTableMap::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)];
            $this->id = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 1 + $startcol : InformationSeekerConnectRequestTableMap::translateFieldName('InformationSeekerId', TableMap::TYPE_PHPNAME, $indexType)];
            $this->information_seeker_id = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 2 + $startcol : InformationSeekerConnectRequestTableMap::translateFieldName('ContactPurpose', TableMap::TYPE_PHPNAME, $indexType)];
            $this->contact_purpose = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 3 + $startcol : InformationSeekerConnectRequestTableMap::translateFieldName('CreatedAt', TableMap::TYPE_PHPNAME, $indexType)];
            if ($col === '0000-00-00 00:00:00') {
                $col = null;
            }
            $this->created_at = (null !== $col) ? PropelDateTime::newInstance($col, null, 'DateTime') : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }

            return $startcol + 4; // 4 = InformationSeekerConnectRequestTableMap::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException(sprintf('Error populating %s object', '\\CryoConnectDB\\InformationSeekerConnectRequest'), 0, $e);
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
        if ($this->aInformationSeekers !== null && $this->information_seeker_id !== $this->aInformationSeekers->getId()) {
            $this->aInformationSeekers = null;
        }
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
            $con = Propel::getServiceContainer()->getReadConnection(InformationSeekerConnectRequestTableMap::DATABASE_NAME);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $dataFetcher = ChildInformationSeekerConnectRequestQuery::create(null, $this->buildPkeyCriteria())->setFormatter(ModelCriteria::FORMAT_STATEMENT)->find($con);
        $row = $dataFetcher->fetch();
        $dataFetcher->close();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true, $dataFetcher->getIndexType()); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->aInformationSeekers = null;
            $this->collInformationSeekerConnectRequestCryosphereWhats = null;

            $this->collInformationSeekerConnectRequestCryosphereWheres = null;

            $this->collInformationSeekerConnectRequestLanguagess = null;

            $this->collCryosphereWhats = null;
            $this->collCryosphereWheres = null;
            $this->collLanguagess = null;
        } // if (deep)
    }

    /**
     * Removes this object from datastore and sets delete attribute.
     *
     * @param      ConnectionInterface $con
     * @return void
     * @throws PropelException
     * @see InformationSeekerConnectRequest::setDeleted()
     * @see InformationSeekerConnectRequest::isDeleted()
     */
    public function delete(ConnectionInterface $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("This object has already been deleted.");
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getWriteConnection(InformationSeekerConnectRequestTableMap::DATABASE_NAME);
        }

        $con->transaction(function () use ($con) {
            $deleteQuery = ChildInformationSeekerConnectRequestQuery::create()
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
            $con = Propel::getServiceContainer()->getWriteConnection(InformationSeekerConnectRequestTableMap::DATABASE_NAME);
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
                InformationSeekerConnectRequestTableMap::addInstanceToPool($this);
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

            // We call the save method on the following object(s) if they
            // were passed to this object by their corresponding set
            // method.  This object relates to these object(s) by a
            // foreign key reference.

            if ($this->aInformationSeekers !== null) {
                if ($this->aInformationSeekers->isModified() || $this->aInformationSeekers->isNew()) {
                    $affectedRows += $this->aInformationSeekers->save($con);
                }
                $this->setInformationSeekers($this->aInformationSeekers);
            }

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

            if ($this->cryosphereWhatsScheduledForDeletion !== null) {
                if (!$this->cryosphereWhatsScheduledForDeletion->isEmpty()) {
                    $pks = array();
                    foreach ($this->cryosphereWhatsScheduledForDeletion as $entry) {
                        $entryPk = [];

                        $entryPk[0] = $this->getId();
                        $entryPk[1] = $entry->getId();
                        $pks[] = $entryPk;
                    }

                    \CryoConnectDB\InformationSeekerConnectRequestCryosphereWhatQuery::create()
                        ->filterByPrimaryKeys($pks)
                        ->delete($con);

                    $this->cryosphereWhatsScheduledForDeletion = null;
                }

            }

            if ($this->collCryosphereWhats) {
                foreach ($this->collCryosphereWhats as $cryosphereWhat) {
                    if (!$cryosphereWhat->isDeleted() && ($cryosphereWhat->isNew() || $cryosphereWhat->isModified())) {
                        $cryosphereWhat->save($con);
                    }
                }
            }


            if ($this->cryosphereWheresScheduledForDeletion !== null) {
                if (!$this->cryosphereWheresScheduledForDeletion->isEmpty()) {
                    $pks = array();
                    foreach ($this->cryosphereWheresScheduledForDeletion as $entry) {
                        $entryPk = [];

                        $entryPk[0] = $this->getId();
                        $entryPk[1] = $entry->getId();
                        $pks[] = $entryPk;
                    }

                    \CryoConnectDB\InformationSeekerConnectRequestCryosphereWhereQuery::create()
                        ->filterByPrimaryKeys($pks)
                        ->delete($con);

                    $this->cryosphereWheresScheduledForDeletion = null;
                }

            }

            if ($this->collCryosphereWheres) {
                foreach ($this->collCryosphereWheres as $cryosphereWhere) {
                    if (!$cryosphereWhere->isDeleted() && ($cryosphereWhere->isNew() || $cryosphereWhere->isModified())) {
                        $cryosphereWhere->save($con);
                    }
                }
            }


            if ($this->languagessScheduledForDeletion !== null) {
                if (!$this->languagessScheduledForDeletion->isEmpty()) {
                    $pks = array();
                    foreach ($this->languagessScheduledForDeletion as $entry) {
                        $entryPk = [];

                        $entryPk[0] = $this->getId();
                        $entryPk[1] = $entry->getLanguageCode();
                        $pks[] = $entryPk;
                    }

                    \CryoConnectDB\InformationSeekerConnectRequestLanguagesQuery::create()
                        ->filterByPrimaryKeys($pks)
                        ->delete($con);

                    $this->languagessScheduledForDeletion = null;
                }

            }

            if ($this->collLanguagess) {
                foreach ($this->collLanguagess as $languages) {
                    if (!$languages->isDeleted() && ($languages->isNew() || $languages->isModified())) {
                        $languages->save($con);
                    }
                }
            }


            if ($this->informationSeekerConnectRequestCryosphereWhatsScheduledForDeletion !== null) {
                if (!$this->informationSeekerConnectRequestCryosphereWhatsScheduledForDeletion->isEmpty()) {
                    \CryoConnectDB\InformationSeekerConnectRequestCryosphereWhatQuery::create()
                        ->filterByPrimaryKeys($this->informationSeekerConnectRequestCryosphereWhatsScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->informationSeekerConnectRequestCryosphereWhatsScheduledForDeletion = null;
                }
            }

            if ($this->collInformationSeekerConnectRequestCryosphereWhats !== null) {
                foreach ($this->collInformationSeekerConnectRequestCryosphereWhats as $referrerFK) {
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

            if ($this->informationSeekerConnectRequestLanguagessScheduledForDeletion !== null) {
                if (!$this->informationSeekerConnectRequestLanguagessScheduledForDeletion->isEmpty()) {
                    \CryoConnectDB\InformationSeekerConnectRequestLanguagesQuery::create()
                        ->filterByPrimaryKeys($this->informationSeekerConnectRequestLanguagessScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->informationSeekerConnectRequestLanguagessScheduledForDeletion = null;
                }
            }

            if ($this->collInformationSeekerConnectRequestLanguagess !== null) {
                foreach ($this->collInformationSeekerConnectRequestLanguagess as $referrerFK) {
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

        $this->modifiedColumns[InformationSeekerConnectRequestTableMap::COL_ID] = true;
        if (null !== $this->id) {
            throw new PropelException('Cannot insert a value for auto-increment primary key (' . InformationSeekerConnectRequestTableMap::COL_ID . ')');
        }

         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(InformationSeekerConnectRequestTableMap::COL_ID)) {
            $modifiedColumns[':p' . $index++]  = 'id';
        }
        if ($this->isColumnModified(InformationSeekerConnectRequestTableMap::COL_INFORMATION_SEEKER_ID)) {
            $modifiedColumns[':p' . $index++]  = 'information_seeker_id';
        }
        if ($this->isColumnModified(InformationSeekerConnectRequestTableMap::COL_CONTACT_PURPOSE)) {
            $modifiedColumns[':p' . $index++]  = 'contact_purpose';
        }
        if ($this->isColumnModified(InformationSeekerConnectRequestTableMap::COL_CREATED_AT)) {
            $modifiedColumns[':p' . $index++]  = 'created_at';
        }

        $sql = sprintf(
            'INSERT INTO information_seeker_connect_request (%s) VALUES (%s)',
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
                    case 'information_seeker_id':
                        $stmt->bindValue($identifier, $this->information_seeker_id, PDO::PARAM_INT);
                        break;
                    case 'contact_purpose':
                        $stmt->bindValue($identifier, $this->contact_purpose, PDO::PARAM_STR);
                        break;
                    case 'created_at':
                        $stmt->bindValue($identifier, $this->created_at ? $this->created_at->format("Y-m-d H:i:s.u") : null, PDO::PARAM_STR);
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
        $pos = InformationSeekerConnectRequestTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);
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
                return $this->getInformationSeekerId();
                break;
            case 2:
                return $this->getContactPurpose();
                break;
            case 3:
                return $this->getCreatedAt();
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

        if (isset($alreadyDumpedObjects['InformationSeekerConnectRequest'][$this->hashCode()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['InformationSeekerConnectRequest'][$this->hashCode()] = true;
        $keys = InformationSeekerConnectRequestTableMap::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getId(),
            $keys[1] => $this->getInformationSeekerId(),
            $keys[2] => $this->getContactPurpose(),
            $keys[3] => $this->getCreatedAt(),
        );
        if ($result[$keys[3]] instanceof \DateTimeInterface) {
            $result[$keys[3]] = $result[$keys[3]]->format('c');
        }

        $virtualColumns = $this->virtualColumns;
        foreach ($virtualColumns as $key => $virtualColumn) {
            $result[$key] = $virtualColumn;
        }

        if ($includeForeignObjects) {
            if (null !== $this->aInformationSeekers) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'informationSeekers';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'information_seekers';
                        break;
                    default:
                        $key = 'InformationSeekers';
                }

                $result[$key] = $this->aInformationSeekers->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->collInformationSeekerConnectRequestCryosphereWhats) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'informationSeekerConnectRequestCryosphereWhats';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'information_seeker_connect_request_cryosphere_whats';
                        break;
                    default:
                        $key = 'InformationSeekerConnectRequestCryosphereWhats';
                }

                $result[$key] = $this->collInformationSeekerConnectRequestCryosphereWhats->toArray(null, false, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
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
            if (null !== $this->collInformationSeekerConnectRequestLanguagess) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'informationSeekerConnectRequestLanguagess';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'information_seeker_connect_request_languagess';
                        break;
                    default:
                        $key = 'InformationSeekerConnectRequestLanguagess';
                }

                $result[$key] = $this->collInformationSeekerConnectRequestLanguagess->toArray(null, false, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
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
     * @return $this|\CryoConnectDB\InformationSeekerConnectRequest
     */
    public function setByName($name, $value, $type = TableMap::TYPE_PHPNAME)
    {
        $pos = InformationSeekerConnectRequestTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);

        return $this->setByPosition($pos, $value);
    }

    /**
     * Sets a field from the object by Position as specified in the xml schema.
     * Zero-based.
     *
     * @param  int $pos position in xml schema
     * @param  mixed $value field value
     * @return $this|\CryoConnectDB\InformationSeekerConnectRequest
     */
    public function setByPosition($pos, $value)
    {
        switch ($pos) {
            case 0:
                $this->setId($value);
                break;
            case 1:
                $this->setInformationSeekerId($value);
                break;
            case 2:
                $this->setContactPurpose($value);
                break;
            case 3:
                $this->setCreatedAt($value);
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
        $keys = InformationSeekerConnectRequestTableMap::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) {
            $this->setId($arr[$keys[0]]);
        }
        if (array_key_exists($keys[1], $arr)) {
            $this->setInformationSeekerId($arr[$keys[1]]);
        }
        if (array_key_exists($keys[2], $arr)) {
            $this->setContactPurpose($arr[$keys[2]]);
        }
        if (array_key_exists($keys[3], $arr)) {
            $this->setCreatedAt($arr[$keys[3]]);
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
     * @return $this|\CryoConnectDB\InformationSeekerConnectRequest The current object, for fluid interface
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
        $criteria = new Criteria(InformationSeekerConnectRequestTableMap::DATABASE_NAME);

        if ($this->isColumnModified(InformationSeekerConnectRequestTableMap::COL_ID)) {
            $criteria->add(InformationSeekerConnectRequestTableMap::COL_ID, $this->id);
        }
        if ($this->isColumnModified(InformationSeekerConnectRequestTableMap::COL_INFORMATION_SEEKER_ID)) {
            $criteria->add(InformationSeekerConnectRequestTableMap::COL_INFORMATION_SEEKER_ID, $this->information_seeker_id);
        }
        if ($this->isColumnModified(InformationSeekerConnectRequestTableMap::COL_CONTACT_PURPOSE)) {
            $criteria->add(InformationSeekerConnectRequestTableMap::COL_CONTACT_PURPOSE, $this->contact_purpose);
        }
        if ($this->isColumnModified(InformationSeekerConnectRequestTableMap::COL_CREATED_AT)) {
            $criteria->add(InformationSeekerConnectRequestTableMap::COL_CREATED_AT, $this->created_at);
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
        $criteria = ChildInformationSeekerConnectRequestQuery::create();
        $criteria->add(InformationSeekerConnectRequestTableMap::COL_ID, $this->id);

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
     * @param      object $copyObj An object of \CryoConnectDB\InformationSeekerConnectRequest (or compatible) type.
     * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param      boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setInformationSeekerId($this->getInformationSeekerId());
        $copyObj->setContactPurpose($this->getContactPurpose());
        $copyObj->setCreatedAt($this->getCreatedAt());

        if ($deepCopy) {
            // important: temporarily setNew(false) because this affects the behavior of
            // the getter/setter methods for fkey referrer objects.
            $copyObj->setNew(false);

            foreach ($this->getInformationSeekerConnectRequestCryosphereWhats() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addInformationSeekerConnectRequestCryosphereWhat($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getInformationSeekerConnectRequestCryosphereWheres() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addInformationSeekerConnectRequestCryosphereWhere($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getInformationSeekerConnectRequestLanguagess() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addInformationSeekerConnectRequestLanguages($relObj->copy($deepCopy));
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
     * @return \CryoConnectDB\InformationSeekerConnectRequest Clone of current object.
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
     * Declares an association between this object and a ChildInformationSeekers object.
     *
     * @param  ChildInformationSeekers $v
     * @return $this|\CryoConnectDB\InformationSeekerConnectRequest The current object (for fluent API support)
     * @throws PropelException
     */
    public function setInformationSeekers(ChildInformationSeekers $v = null)
    {
        if ($v === null) {
            $this->setInformationSeekerId(NULL);
        } else {
            $this->setInformationSeekerId($v->getId());
        }

        $this->aInformationSeekers = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the ChildInformationSeekers object, it will not be re-added.
        if ($v !== null) {
            $v->addInformationSeekerConnectRequest($this);
        }


        return $this;
    }


    /**
     * Get the associated ChildInformationSeekers object
     *
     * @param  ConnectionInterface $con Optional Connection object.
     * @return ChildInformationSeekers The associated ChildInformationSeekers object.
     * @throws PropelException
     */
    public function getInformationSeekers(ConnectionInterface $con = null)
    {
        if ($this->aInformationSeekers === null && ($this->information_seeker_id != 0)) {
            $this->aInformationSeekers = ChildInformationSeekersQuery::create()->findPk($this->information_seeker_id, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aInformationSeekers->addInformationSeekerConnectRequests($this);
             */
        }

        return $this->aInformationSeekers;
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
        if ('InformationSeekerConnectRequestCryosphereWhat' == $relationName) {
            $this->initInformationSeekerConnectRequestCryosphereWhats();
            return;
        }
        if ('InformationSeekerConnectRequestCryosphereWhere' == $relationName) {
            $this->initInformationSeekerConnectRequestCryosphereWheres();
            return;
        }
        if ('InformationSeekerConnectRequestLanguages' == $relationName) {
            $this->initInformationSeekerConnectRequestLanguagess();
            return;
        }
    }

    /**
     * Clears out the collInformationSeekerConnectRequestCryosphereWhats collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addInformationSeekerConnectRequestCryosphereWhats()
     */
    public function clearInformationSeekerConnectRequestCryosphereWhats()
    {
        $this->collInformationSeekerConnectRequestCryosphereWhats = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Reset is the collInformationSeekerConnectRequestCryosphereWhats collection loaded partially.
     */
    public function resetPartialInformationSeekerConnectRequestCryosphereWhats($v = true)
    {
        $this->collInformationSeekerConnectRequestCryosphereWhatsPartial = $v;
    }

    /**
     * Initializes the collInformationSeekerConnectRequestCryosphereWhats collection.
     *
     * By default this just sets the collInformationSeekerConnectRequestCryosphereWhats collection to an empty array (like clearcollInformationSeekerConnectRequestCryosphereWhats());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param      boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initInformationSeekerConnectRequestCryosphereWhats($overrideExisting = true)
    {
        if (null !== $this->collInformationSeekerConnectRequestCryosphereWhats && !$overrideExisting) {
            return;
        }

        $collectionClassName = InformationSeekerConnectRequestCryosphereWhatTableMap::getTableMap()->getCollectionClassName();

        $this->collInformationSeekerConnectRequestCryosphereWhats = new $collectionClassName;
        $this->collInformationSeekerConnectRequestCryosphereWhats->setModel('\CryoConnectDB\InformationSeekerConnectRequestCryosphereWhat');
    }

    /**
     * Gets an array of ChildInformationSeekerConnectRequestCryosphereWhat objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ChildInformationSeekerConnectRequest is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @return ObjectCollection|ChildInformationSeekerConnectRequestCryosphereWhat[] List of ChildInformationSeekerConnectRequestCryosphereWhat objects
     * @throws PropelException
     */
    public function getInformationSeekerConnectRequestCryosphereWhats(Criteria $criteria = null, ConnectionInterface $con = null)
    {
        $partial = $this->collInformationSeekerConnectRequestCryosphereWhatsPartial && !$this->isNew();
        if (null === $this->collInformationSeekerConnectRequestCryosphereWhats || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collInformationSeekerConnectRequestCryosphereWhats) {
                // return empty collection
                $this->initInformationSeekerConnectRequestCryosphereWhats();
            } else {
                $collInformationSeekerConnectRequestCryosphereWhats = ChildInformationSeekerConnectRequestCryosphereWhatQuery::create(null, $criteria)
                    ->filterByInformationSeekerConnectRequest($this)
                    ->find($con);

                if (null !== $criteria) {
                    if (false !== $this->collInformationSeekerConnectRequestCryosphereWhatsPartial && count($collInformationSeekerConnectRequestCryosphereWhats)) {
                        $this->initInformationSeekerConnectRequestCryosphereWhats(false);

                        foreach ($collInformationSeekerConnectRequestCryosphereWhats as $obj) {
                            if (false == $this->collInformationSeekerConnectRequestCryosphereWhats->contains($obj)) {
                                $this->collInformationSeekerConnectRequestCryosphereWhats->append($obj);
                            }
                        }

                        $this->collInformationSeekerConnectRequestCryosphereWhatsPartial = true;
                    }

                    return $collInformationSeekerConnectRequestCryosphereWhats;
                }

                if ($partial && $this->collInformationSeekerConnectRequestCryosphereWhats) {
                    foreach ($this->collInformationSeekerConnectRequestCryosphereWhats as $obj) {
                        if ($obj->isNew()) {
                            $collInformationSeekerConnectRequestCryosphereWhats[] = $obj;
                        }
                    }
                }

                $this->collInformationSeekerConnectRequestCryosphereWhats = $collInformationSeekerConnectRequestCryosphereWhats;
                $this->collInformationSeekerConnectRequestCryosphereWhatsPartial = false;
            }
        }

        return $this->collInformationSeekerConnectRequestCryosphereWhats;
    }

    /**
     * Sets a collection of ChildInformationSeekerConnectRequestCryosphereWhat objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      Collection $informationSeekerConnectRequestCryosphereWhats A Propel collection.
     * @param      ConnectionInterface $con Optional connection object
     * @return $this|ChildInformationSeekerConnectRequest The current object (for fluent API support)
     */
    public function setInformationSeekerConnectRequestCryosphereWhats(Collection $informationSeekerConnectRequestCryosphereWhats, ConnectionInterface $con = null)
    {
        /** @var ChildInformationSeekerConnectRequestCryosphereWhat[] $informationSeekerConnectRequestCryosphereWhatsToDelete */
        $informationSeekerConnectRequestCryosphereWhatsToDelete = $this->getInformationSeekerConnectRequestCryosphereWhats(new Criteria(), $con)->diff($informationSeekerConnectRequestCryosphereWhats);


        //since at least one column in the foreign key is at the same time a PK
        //we can not just set a PK to NULL in the lines below. We have to store
        //a backup of all values, so we are able to manipulate these items based on the onDelete value later.
        $this->informationSeekerConnectRequestCryosphereWhatsScheduledForDeletion = clone $informationSeekerConnectRequestCryosphereWhatsToDelete;

        foreach ($informationSeekerConnectRequestCryosphereWhatsToDelete as $informationSeekerConnectRequestCryosphereWhatRemoved) {
            $informationSeekerConnectRequestCryosphereWhatRemoved->setInformationSeekerConnectRequest(null);
        }

        $this->collInformationSeekerConnectRequestCryosphereWhats = null;
        foreach ($informationSeekerConnectRequestCryosphereWhats as $informationSeekerConnectRequestCryosphereWhat) {
            $this->addInformationSeekerConnectRequestCryosphereWhat($informationSeekerConnectRequestCryosphereWhat);
        }

        $this->collInformationSeekerConnectRequestCryosphereWhats = $informationSeekerConnectRequestCryosphereWhats;
        $this->collInformationSeekerConnectRequestCryosphereWhatsPartial = false;

        return $this;
    }

    /**
     * Returns the number of related InformationSeekerConnectRequestCryosphereWhat objects.
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct
     * @param      ConnectionInterface $con
     * @return int             Count of related InformationSeekerConnectRequestCryosphereWhat objects.
     * @throws PropelException
     */
    public function countInformationSeekerConnectRequestCryosphereWhats(Criteria $criteria = null, $distinct = false, ConnectionInterface $con = null)
    {
        $partial = $this->collInformationSeekerConnectRequestCryosphereWhatsPartial && !$this->isNew();
        if (null === $this->collInformationSeekerConnectRequestCryosphereWhats || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collInformationSeekerConnectRequestCryosphereWhats) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getInformationSeekerConnectRequestCryosphereWhats());
            }

            $query = ChildInformationSeekerConnectRequestCryosphereWhatQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByInformationSeekerConnectRequest($this)
                ->count($con);
        }

        return count($this->collInformationSeekerConnectRequestCryosphereWhats);
    }

    /**
     * Method called to associate a ChildInformationSeekerConnectRequestCryosphereWhat object to this object
     * through the ChildInformationSeekerConnectRequestCryosphereWhat foreign key attribute.
     *
     * @param  ChildInformationSeekerConnectRequestCryosphereWhat $l ChildInformationSeekerConnectRequestCryosphereWhat
     * @return $this|\CryoConnectDB\InformationSeekerConnectRequest The current object (for fluent API support)
     */
    public function addInformationSeekerConnectRequestCryosphereWhat(ChildInformationSeekerConnectRequestCryosphereWhat $l)
    {
        if ($this->collInformationSeekerConnectRequestCryosphereWhats === null) {
            $this->initInformationSeekerConnectRequestCryosphereWhats();
            $this->collInformationSeekerConnectRequestCryosphereWhatsPartial = true;
        }

        if (!$this->collInformationSeekerConnectRequestCryosphereWhats->contains($l)) {
            $this->doAddInformationSeekerConnectRequestCryosphereWhat($l);

            if ($this->informationSeekerConnectRequestCryosphereWhatsScheduledForDeletion and $this->informationSeekerConnectRequestCryosphereWhatsScheduledForDeletion->contains($l)) {
                $this->informationSeekerConnectRequestCryosphereWhatsScheduledForDeletion->remove($this->informationSeekerConnectRequestCryosphereWhatsScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param ChildInformationSeekerConnectRequestCryosphereWhat $informationSeekerConnectRequestCryosphereWhat The ChildInformationSeekerConnectRequestCryosphereWhat object to add.
     */
    protected function doAddInformationSeekerConnectRequestCryosphereWhat(ChildInformationSeekerConnectRequestCryosphereWhat $informationSeekerConnectRequestCryosphereWhat)
    {
        $this->collInformationSeekerConnectRequestCryosphereWhats[]= $informationSeekerConnectRequestCryosphereWhat;
        $informationSeekerConnectRequestCryosphereWhat->setInformationSeekerConnectRequest($this);
    }

    /**
     * @param  ChildInformationSeekerConnectRequestCryosphereWhat $informationSeekerConnectRequestCryosphereWhat The ChildInformationSeekerConnectRequestCryosphereWhat object to remove.
     * @return $this|ChildInformationSeekerConnectRequest The current object (for fluent API support)
     */
    public function removeInformationSeekerConnectRequestCryosphereWhat(ChildInformationSeekerConnectRequestCryosphereWhat $informationSeekerConnectRequestCryosphereWhat)
    {
        if ($this->getInformationSeekerConnectRequestCryosphereWhats()->contains($informationSeekerConnectRequestCryosphereWhat)) {
            $pos = $this->collInformationSeekerConnectRequestCryosphereWhats->search($informationSeekerConnectRequestCryosphereWhat);
            $this->collInformationSeekerConnectRequestCryosphereWhats->remove($pos);
            if (null === $this->informationSeekerConnectRequestCryosphereWhatsScheduledForDeletion) {
                $this->informationSeekerConnectRequestCryosphereWhatsScheduledForDeletion = clone $this->collInformationSeekerConnectRequestCryosphereWhats;
                $this->informationSeekerConnectRequestCryosphereWhatsScheduledForDeletion->clear();
            }
            $this->informationSeekerConnectRequestCryosphereWhatsScheduledForDeletion[]= clone $informationSeekerConnectRequestCryosphereWhat;
            $informationSeekerConnectRequestCryosphereWhat->setInformationSeekerConnectRequest(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this InformationSeekerConnectRequest is new, it will return
     * an empty collection; or if this InformationSeekerConnectRequest has previously
     * been saved, it will retrieve related InformationSeekerConnectRequestCryosphereWhats from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in InformationSeekerConnectRequest.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildInformationSeekerConnectRequestCryosphereWhat[] List of ChildInformationSeekerConnectRequestCryosphereWhat objects
     */
    public function getInformationSeekerConnectRequestCryosphereWhatsJoinCryosphereWhat(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildInformationSeekerConnectRequestCryosphereWhatQuery::create(null, $criteria);
        $query->joinWith('CryosphereWhat', $joinBehavior);

        return $this->getInformationSeekerConnectRequestCryosphereWhats($query, $con);
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
     * If this ChildInformationSeekerConnectRequest is new, it will return
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
                    ->filterByInformationSeekerConnectRequest($this)
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
     * @return $this|ChildInformationSeekerConnectRequest The current object (for fluent API support)
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
            $informationSeekerConnectRequestCryosphereWhereRemoved->setInformationSeekerConnectRequest(null);
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
                ->filterByInformationSeekerConnectRequest($this)
                ->count($con);
        }

        return count($this->collInformationSeekerConnectRequestCryosphereWheres);
    }

    /**
     * Method called to associate a ChildInformationSeekerConnectRequestCryosphereWhere object to this object
     * through the ChildInformationSeekerConnectRequestCryosphereWhere foreign key attribute.
     *
     * @param  ChildInformationSeekerConnectRequestCryosphereWhere $l ChildInformationSeekerConnectRequestCryosphereWhere
     * @return $this|\CryoConnectDB\InformationSeekerConnectRequest The current object (for fluent API support)
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
        $informationSeekerConnectRequestCryosphereWhere->setInformationSeekerConnectRequest($this);
    }

    /**
     * @param  ChildInformationSeekerConnectRequestCryosphereWhere $informationSeekerConnectRequestCryosphereWhere The ChildInformationSeekerConnectRequestCryosphereWhere object to remove.
     * @return $this|ChildInformationSeekerConnectRequest The current object (for fluent API support)
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
            $informationSeekerConnectRequestCryosphereWhere->setInformationSeekerConnectRequest(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this InformationSeekerConnectRequest is new, it will return
     * an empty collection; or if this InformationSeekerConnectRequest has previously
     * been saved, it will retrieve related InformationSeekerConnectRequestCryosphereWheres from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in InformationSeekerConnectRequest.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildInformationSeekerConnectRequestCryosphereWhere[] List of ChildInformationSeekerConnectRequestCryosphereWhere objects
     */
    public function getInformationSeekerConnectRequestCryosphereWheresJoinCryosphereWhere(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildInformationSeekerConnectRequestCryosphereWhereQuery::create(null, $criteria);
        $query->joinWith('CryosphereWhere', $joinBehavior);

        return $this->getInformationSeekerConnectRequestCryosphereWheres($query, $con);
    }

    /**
     * Clears out the collInformationSeekerConnectRequestLanguagess collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addInformationSeekerConnectRequestLanguagess()
     */
    public function clearInformationSeekerConnectRequestLanguagess()
    {
        $this->collInformationSeekerConnectRequestLanguagess = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Reset is the collInformationSeekerConnectRequestLanguagess collection loaded partially.
     */
    public function resetPartialInformationSeekerConnectRequestLanguagess($v = true)
    {
        $this->collInformationSeekerConnectRequestLanguagessPartial = $v;
    }

    /**
     * Initializes the collInformationSeekerConnectRequestLanguagess collection.
     *
     * By default this just sets the collInformationSeekerConnectRequestLanguagess collection to an empty array (like clearcollInformationSeekerConnectRequestLanguagess());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param      boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initInformationSeekerConnectRequestLanguagess($overrideExisting = true)
    {
        if (null !== $this->collInformationSeekerConnectRequestLanguagess && !$overrideExisting) {
            return;
        }

        $collectionClassName = InformationSeekerConnectRequestLanguagesTableMap::getTableMap()->getCollectionClassName();

        $this->collInformationSeekerConnectRequestLanguagess = new $collectionClassName;
        $this->collInformationSeekerConnectRequestLanguagess->setModel('\CryoConnectDB\InformationSeekerConnectRequestLanguages');
    }

    /**
     * Gets an array of ChildInformationSeekerConnectRequestLanguages objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ChildInformationSeekerConnectRequest is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @return ObjectCollection|ChildInformationSeekerConnectRequestLanguages[] List of ChildInformationSeekerConnectRequestLanguages objects
     * @throws PropelException
     */
    public function getInformationSeekerConnectRequestLanguagess(Criteria $criteria = null, ConnectionInterface $con = null)
    {
        $partial = $this->collInformationSeekerConnectRequestLanguagessPartial && !$this->isNew();
        if (null === $this->collInformationSeekerConnectRequestLanguagess || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collInformationSeekerConnectRequestLanguagess) {
                // return empty collection
                $this->initInformationSeekerConnectRequestLanguagess();
            } else {
                $collInformationSeekerConnectRequestLanguagess = ChildInformationSeekerConnectRequestLanguagesQuery::create(null, $criteria)
                    ->filterByInformationSeekerConnectRequest($this)
                    ->find($con);

                if (null !== $criteria) {
                    if (false !== $this->collInformationSeekerConnectRequestLanguagessPartial && count($collInformationSeekerConnectRequestLanguagess)) {
                        $this->initInformationSeekerConnectRequestLanguagess(false);

                        foreach ($collInformationSeekerConnectRequestLanguagess as $obj) {
                            if (false == $this->collInformationSeekerConnectRequestLanguagess->contains($obj)) {
                                $this->collInformationSeekerConnectRequestLanguagess->append($obj);
                            }
                        }

                        $this->collInformationSeekerConnectRequestLanguagessPartial = true;
                    }

                    return $collInformationSeekerConnectRequestLanguagess;
                }

                if ($partial && $this->collInformationSeekerConnectRequestLanguagess) {
                    foreach ($this->collInformationSeekerConnectRequestLanguagess as $obj) {
                        if ($obj->isNew()) {
                            $collInformationSeekerConnectRequestLanguagess[] = $obj;
                        }
                    }
                }

                $this->collInformationSeekerConnectRequestLanguagess = $collInformationSeekerConnectRequestLanguagess;
                $this->collInformationSeekerConnectRequestLanguagessPartial = false;
            }
        }

        return $this->collInformationSeekerConnectRequestLanguagess;
    }

    /**
     * Sets a collection of ChildInformationSeekerConnectRequestLanguages objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      Collection $informationSeekerConnectRequestLanguagess A Propel collection.
     * @param      ConnectionInterface $con Optional connection object
     * @return $this|ChildInformationSeekerConnectRequest The current object (for fluent API support)
     */
    public function setInformationSeekerConnectRequestLanguagess(Collection $informationSeekerConnectRequestLanguagess, ConnectionInterface $con = null)
    {
        /** @var ChildInformationSeekerConnectRequestLanguages[] $informationSeekerConnectRequestLanguagessToDelete */
        $informationSeekerConnectRequestLanguagessToDelete = $this->getInformationSeekerConnectRequestLanguagess(new Criteria(), $con)->diff($informationSeekerConnectRequestLanguagess);


        //since at least one column in the foreign key is at the same time a PK
        //we can not just set a PK to NULL in the lines below. We have to store
        //a backup of all values, so we are able to manipulate these items based on the onDelete value later.
        $this->informationSeekerConnectRequestLanguagessScheduledForDeletion = clone $informationSeekerConnectRequestLanguagessToDelete;

        foreach ($informationSeekerConnectRequestLanguagessToDelete as $informationSeekerConnectRequestLanguagesRemoved) {
            $informationSeekerConnectRequestLanguagesRemoved->setInformationSeekerConnectRequest(null);
        }

        $this->collInformationSeekerConnectRequestLanguagess = null;
        foreach ($informationSeekerConnectRequestLanguagess as $informationSeekerConnectRequestLanguages) {
            $this->addInformationSeekerConnectRequestLanguages($informationSeekerConnectRequestLanguages);
        }

        $this->collInformationSeekerConnectRequestLanguagess = $informationSeekerConnectRequestLanguagess;
        $this->collInformationSeekerConnectRequestLanguagessPartial = false;

        return $this;
    }

    /**
     * Returns the number of related InformationSeekerConnectRequestLanguages objects.
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct
     * @param      ConnectionInterface $con
     * @return int             Count of related InformationSeekerConnectRequestLanguages objects.
     * @throws PropelException
     */
    public function countInformationSeekerConnectRequestLanguagess(Criteria $criteria = null, $distinct = false, ConnectionInterface $con = null)
    {
        $partial = $this->collInformationSeekerConnectRequestLanguagessPartial && !$this->isNew();
        if (null === $this->collInformationSeekerConnectRequestLanguagess || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collInformationSeekerConnectRequestLanguagess) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getInformationSeekerConnectRequestLanguagess());
            }

            $query = ChildInformationSeekerConnectRequestLanguagesQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByInformationSeekerConnectRequest($this)
                ->count($con);
        }

        return count($this->collInformationSeekerConnectRequestLanguagess);
    }

    /**
     * Method called to associate a ChildInformationSeekerConnectRequestLanguages object to this object
     * through the ChildInformationSeekerConnectRequestLanguages foreign key attribute.
     *
     * @param  ChildInformationSeekerConnectRequestLanguages $l ChildInformationSeekerConnectRequestLanguages
     * @return $this|\CryoConnectDB\InformationSeekerConnectRequest The current object (for fluent API support)
     */
    public function addInformationSeekerConnectRequestLanguages(ChildInformationSeekerConnectRequestLanguages $l)
    {
        if ($this->collInformationSeekerConnectRequestLanguagess === null) {
            $this->initInformationSeekerConnectRequestLanguagess();
            $this->collInformationSeekerConnectRequestLanguagessPartial = true;
        }

        if (!$this->collInformationSeekerConnectRequestLanguagess->contains($l)) {
            $this->doAddInformationSeekerConnectRequestLanguages($l);

            if ($this->informationSeekerConnectRequestLanguagessScheduledForDeletion and $this->informationSeekerConnectRequestLanguagessScheduledForDeletion->contains($l)) {
                $this->informationSeekerConnectRequestLanguagessScheduledForDeletion->remove($this->informationSeekerConnectRequestLanguagessScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param ChildInformationSeekerConnectRequestLanguages $informationSeekerConnectRequestLanguages The ChildInformationSeekerConnectRequestLanguages object to add.
     */
    protected function doAddInformationSeekerConnectRequestLanguages(ChildInformationSeekerConnectRequestLanguages $informationSeekerConnectRequestLanguages)
    {
        $this->collInformationSeekerConnectRequestLanguagess[]= $informationSeekerConnectRequestLanguages;
        $informationSeekerConnectRequestLanguages->setInformationSeekerConnectRequest($this);
    }

    /**
     * @param  ChildInformationSeekerConnectRequestLanguages $informationSeekerConnectRequestLanguages The ChildInformationSeekerConnectRequestLanguages object to remove.
     * @return $this|ChildInformationSeekerConnectRequest The current object (for fluent API support)
     */
    public function removeInformationSeekerConnectRequestLanguages(ChildInformationSeekerConnectRequestLanguages $informationSeekerConnectRequestLanguages)
    {
        if ($this->getInformationSeekerConnectRequestLanguagess()->contains($informationSeekerConnectRequestLanguages)) {
            $pos = $this->collInformationSeekerConnectRequestLanguagess->search($informationSeekerConnectRequestLanguages);
            $this->collInformationSeekerConnectRequestLanguagess->remove($pos);
            if (null === $this->informationSeekerConnectRequestLanguagessScheduledForDeletion) {
                $this->informationSeekerConnectRequestLanguagessScheduledForDeletion = clone $this->collInformationSeekerConnectRequestLanguagess;
                $this->informationSeekerConnectRequestLanguagessScheduledForDeletion->clear();
            }
            $this->informationSeekerConnectRequestLanguagessScheduledForDeletion[]= clone $informationSeekerConnectRequestLanguages;
            $informationSeekerConnectRequestLanguages->setInformationSeekerConnectRequest(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this InformationSeekerConnectRequest is new, it will return
     * an empty collection; or if this InformationSeekerConnectRequest has previously
     * been saved, it will retrieve related InformationSeekerConnectRequestLanguagess from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in InformationSeekerConnectRequest.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildInformationSeekerConnectRequestLanguages[] List of ChildInformationSeekerConnectRequestLanguages objects
     */
    public function getInformationSeekerConnectRequestLanguagessJoinLanguages(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildInformationSeekerConnectRequestLanguagesQuery::create(null, $criteria);
        $query->joinWith('Languages', $joinBehavior);

        return $this->getInformationSeekerConnectRequestLanguagess($query, $con);
    }

    /**
     * Clears out the collCryosphereWhats collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addCryosphereWhats()
     */
    public function clearCryosphereWhats()
    {
        $this->collCryosphereWhats = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Initializes the collCryosphereWhats crossRef collection.
     *
     * By default this just sets the collCryosphereWhats collection to an empty collection (like clearCryosphereWhats());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @return void
     */
    public function initCryosphereWhats()
    {
        $collectionClassName = InformationSeekerConnectRequestCryosphereWhatTableMap::getTableMap()->getCollectionClassName();

        $this->collCryosphereWhats = new $collectionClassName;
        $this->collCryosphereWhatsPartial = true;
        $this->collCryosphereWhats->setModel('\CryoConnectDB\CryosphereWhat');
    }

    /**
     * Checks if the collCryosphereWhats collection is loaded.
     *
     * @return bool
     */
    public function isCryosphereWhatsLoaded()
    {
        return null !== $this->collCryosphereWhats;
    }

    /**
     * Gets a collection of ChildCryosphereWhat objects related by a many-to-many relationship
     * to the current object by way of the information_seeker_connect_request_cryosphere_what cross-reference table.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ChildInformationSeekerConnectRequest is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria Optional query object to filter the query
     * @param      ConnectionInterface $con Optional connection object
     *
     * @return ObjectCollection|ChildCryosphereWhat[] List of ChildCryosphereWhat objects
     */
    public function getCryosphereWhats(Criteria $criteria = null, ConnectionInterface $con = null)
    {
        $partial = $this->collCryosphereWhatsPartial && !$this->isNew();
        if (null === $this->collCryosphereWhats || null !== $criteria || $partial) {
            if ($this->isNew()) {
                // return empty collection
                if (null === $this->collCryosphereWhats) {
                    $this->initCryosphereWhats();
                }
            } else {

                $query = ChildCryosphereWhatQuery::create(null, $criteria)
                    ->filterByInformationSeekerConnectRequest($this);
                $collCryosphereWhats = $query->find($con);
                if (null !== $criteria) {
                    return $collCryosphereWhats;
                }

                if ($partial && $this->collCryosphereWhats) {
                    //make sure that already added objects gets added to the list of the database.
                    foreach ($this->collCryosphereWhats as $obj) {
                        if (!$collCryosphereWhats->contains($obj)) {
                            $collCryosphereWhats[] = $obj;
                        }
                    }
                }

                $this->collCryosphereWhats = $collCryosphereWhats;
                $this->collCryosphereWhatsPartial = false;
            }
        }

        return $this->collCryosphereWhats;
    }

    /**
     * Sets a collection of CryosphereWhat objects related by a many-to-many relationship
     * to the current object by way of the information_seeker_connect_request_cryosphere_what cross-reference table.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param  Collection $cryosphereWhats A Propel collection.
     * @param  ConnectionInterface $con Optional connection object
     * @return $this|ChildInformationSeekerConnectRequest The current object (for fluent API support)
     */
    public function setCryosphereWhats(Collection $cryosphereWhats, ConnectionInterface $con = null)
    {
        $this->clearCryosphereWhats();
        $currentCryosphereWhats = $this->getCryosphereWhats();

        $cryosphereWhatsScheduledForDeletion = $currentCryosphereWhats->diff($cryosphereWhats);

        foreach ($cryosphereWhatsScheduledForDeletion as $toDelete) {
            $this->removeCryosphereWhat($toDelete);
        }

        foreach ($cryosphereWhats as $cryosphereWhat) {
            if (!$currentCryosphereWhats->contains($cryosphereWhat)) {
                $this->doAddCryosphereWhat($cryosphereWhat);
            }
        }

        $this->collCryosphereWhatsPartial = false;
        $this->collCryosphereWhats = $cryosphereWhats;

        return $this;
    }

    /**
     * Gets the number of CryosphereWhat objects related by a many-to-many relationship
     * to the current object by way of the information_seeker_connect_request_cryosphere_what cross-reference table.
     *
     * @param      Criteria $criteria Optional query object to filter the query
     * @param      boolean $distinct Set to true to force count distinct
     * @param      ConnectionInterface $con Optional connection object
     *
     * @return int the number of related CryosphereWhat objects
     */
    public function countCryosphereWhats(Criteria $criteria = null, $distinct = false, ConnectionInterface $con = null)
    {
        $partial = $this->collCryosphereWhatsPartial && !$this->isNew();
        if (null === $this->collCryosphereWhats || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collCryosphereWhats) {
                return 0;
            } else {

                if ($partial && !$criteria) {
                    return count($this->getCryosphereWhats());
                }

                $query = ChildCryosphereWhatQuery::create(null, $criteria);
                if ($distinct) {
                    $query->distinct();
                }

                return $query
                    ->filterByInformationSeekerConnectRequest($this)
                    ->count($con);
            }
        } else {
            return count($this->collCryosphereWhats);
        }
    }

    /**
     * Associate a ChildCryosphereWhat to this object
     * through the information_seeker_connect_request_cryosphere_what cross reference table.
     *
     * @param ChildCryosphereWhat $cryosphereWhat
     * @return ChildInformationSeekerConnectRequest The current object (for fluent API support)
     */
    public function addCryosphereWhat(ChildCryosphereWhat $cryosphereWhat)
    {
        if ($this->collCryosphereWhats === null) {
            $this->initCryosphereWhats();
        }

        if (!$this->getCryosphereWhats()->contains($cryosphereWhat)) {
            // only add it if the **same** object is not already associated
            $this->collCryosphereWhats->push($cryosphereWhat);
            $this->doAddCryosphereWhat($cryosphereWhat);
        }

        return $this;
    }

    /**
     *
     * @param ChildCryosphereWhat $cryosphereWhat
     */
    protected function doAddCryosphereWhat(ChildCryosphereWhat $cryosphereWhat)
    {
        $informationSeekerConnectRequestCryosphereWhat = new ChildInformationSeekerConnectRequestCryosphereWhat();

        $informationSeekerConnectRequestCryosphereWhat->setCryosphereWhat($cryosphereWhat);

        $informationSeekerConnectRequestCryosphereWhat->setInformationSeekerConnectRequest($this);

        $this->addInformationSeekerConnectRequestCryosphereWhat($informationSeekerConnectRequestCryosphereWhat);

        // set the back reference to this object directly as using provided method either results
        // in endless loop or in multiple relations
        if (!$cryosphereWhat->isInformationSeekerConnectRequestsLoaded()) {
            $cryosphereWhat->initInformationSeekerConnectRequests();
            $cryosphereWhat->getInformationSeekerConnectRequests()->push($this);
        } elseif (!$cryosphereWhat->getInformationSeekerConnectRequests()->contains($this)) {
            $cryosphereWhat->getInformationSeekerConnectRequests()->push($this);
        }

    }

    /**
     * Remove cryosphereWhat of this object
     * through the information_seeker_connect_request_cryosphere_what cross reference table.
     *
     * @param ChildCryosphereWhat $cryosphereWhat
     * @return ChildInformationSeekerConnectRequest The current object (for fluent API support)
     */
    public function removeCryosphereWhat(ChildCryosphereWhat $cryosphereWhat)
    {
        if ($this->getCryosphereWhats()->contains($cryosphereWhat)) {
            $informationSeekerConnectRequestCryosphereWhat = new ChildInformationSeekerConnectRequestCryosphereWhat();
            $informationSeekerConnectRequestCryosphereWhat->setCryosphereWhat($cryosphereWhat);
            if ($cryosphereWhat->isInformationSeekerConnectRequestsLoaded()) {
                //remove the back reference if available
                $cryosphereWhat->getInformationSeekerConnectRequests()->removeObject($this);
            }

            $informationSeekerConnectRequestCryosphereWhat->setInformationSeekerConnectRequest($this);
            $this->removeInformationSeekerConnectRequestCryosphereWhat(clone $informationSeekerConnectRequestCryosphereWhat);
            $informationSeekerConnectRequestCryosphereWhat->clear();

            $this->collCryosphereWhats->remove($this->collCryosphereWhats->search($cryosphereWhat));

            if (null === $this->cryosphereWhatsScheduledForDeletion) {
                $this->cryosphereWhatsScheduledForDeletion = clone $this->collCryosphereWhats;
                $this->cryosphereWhatsScheduledForDeletion->clear();
            }

            $this->cryosphereWhatsScheduledForDeletion->push($cryosphereWhat);
        }


        return $this;
    }

    /**
     * Clears out the collCryosphereWheres collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addCryosphereWheres()
     */
    public function clearCryosphereWheres()
    {
        $this->collCryosphereWheres = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Initializes the collCryosphereWheres crossRef collection.
     *
     * By default this just sets the collCryosphereWheres collection to an empty collection (like clearCryosphereWheres());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @return void
     */
    public function initCryosphereWheres()
    {
        $collectionClassName = InformationSeekerConnectRequestCryosphereWhereTableMap::getTableMap()->getCollectionClassName();

        $this->collCryosphereWheres = new $collectionClassName;
        $this->collCryosphereWheresPartial = true;
        $this->collCryosphereWheres->setModel('\CryoConnectDB\CryosphereWhere');
    }

    /**
     * Checks if the collCryosphereWheres collection is loaded.
     *
     * @return bool
     */
    public function isCryosphereWheresLoaded()
    {
        return null !== $this->collCryosphereWheres;
    }

    /**
     * Gets a collection of ChildCryosphereWhere objects related by a many-to-many relationship
     * to the current object by way of the information_seeker_connect_request_cryosphere_where cross-reference table.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ChildInformationSeekerConnectRequest is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria Optional query object to filter the query
     * @param      ConnectionInterface $con Optional connection object
     *
     * @return ObjectCollection|ChildCryosphereWhere[] List of ChildCryosphereWhere objects
     */
    public function getCryosphereWheres(Criteria $criteria = null, ConnectionInterface $con = null)
    {
        $partial = $this->collCryosphereWheresPartial && !$this->isNew();
        if (null === $this->collCryosphereWheres || null !== $criteria || $partial) {
            if ($this->isNew()) {
                // return empty collection
                if (null === $this->collCryosphereWheres) {
                    $this->initCryosphereWheres();
                }
            } else {

                $query = ChildCryosphereWhereQuery::create(null, $criteria)
                    ->filterByInformationSeekerConnectRequest($this);
                $collCryosphereWheres = $query->find($con);
                if (null !== $criteria) {
                    return $collCryosphereWheres;
                }

                if ($partial && $this->collCryosphereWheres) {
                    //make sure that already added objects gets added to the list of the database.
                    foreach ($this->collCryosphereWheres as $obj) {
                        if (!$collCryosphereWheres->contains($obj)) {
                            $collCryosphereWheres[] = $obj;
                        }
                    }
                }

                $this->collCryosphereWheres = $collCryosphereWheres;
                $this->collCryosphereWheresPartial = false;
            }
        }

        return $this->collCryosphereWheres;
    }

    /**
     * Sets a collection of CryosphereWhere objects related by a many-to-many relationship
     * to the current object by way of the information_seeker_connect_request_cryosphere_where cross-reference table.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param  Collection $cryosphereWheres A Propel collection.
     * @param  ConnectionInterface $con Optional connection object
     * @return $this|ChildInformationSeekerConnectRequest The current object (for fluent API support)
     */
    public function setCryosphereWheres(Collection $cryosphereWheres, ConnectionInterface $con = null)
    {
        $this->clearCryosphereWheres();
        $currentCryosphereWheres = $this->getCryosphereWheres();

        $cryosphereWheresScheduledForDeletion = $currentCryosphereWheres->diff($cryosphereWheres);

        foreach ($cryosphereWheresScheduledForDeletion as $toDelete) {
            $this->removeCryosphereWhere($toDelete);
        }

        foreach ($cryosphereWheres as $cryosphereWhere) {
            if (!$currentCryosphereWheres->contains($cryosphereWhere)) {
                $this->doAddCryosphereWhere($cryosphereWhere);
            }
        }

        $this->collCryosphereWheresPartial = false;
        $this->collCryosphereWheres = $cryosphereWheres;

        return $this;
    }

    /**
     * Gets the number of CryosphereWhere objects related by a many-to-many relationship
     * to the current object by way of the information_seeker_connect_request_cryosphere_where cross-reference table.
     *
     * @param      Criteria $criteria Optional query object to filter the query
     * @param      boolean $distinct Set to true to force count distinct
     * @param      ConnectionInterface $con Optional connection object
     *
     * @return int the number of related CryosphereWhere objects
     */
    public function countCryosphereWheres(Criteria $criteria = null, $distinct = false, ConnectionInterface $con = null)
    {
        $partial = $this->collCryosphereWheresPartial && !$this->isNew();
        if (null === $this->collCryosphereWheres || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collCryosphereWheres) {
                return 0;
            } else {

                if ($partial && !$criteria) {
                    return count($this->getCryosphereWheres());
                }

                $query = ChildCryosphereWhereQuery::create(null, $criteria);
                if ($distinct) {
                    $query->distinct();
                }

                return $query
                    ->filterByInformationSeekerConnectRequest($this)
                    ->count($con);
            }
        } else {
            return count($this->collCryosphereWheres);
        }
    }

    /**
     * Associate a ChildCryosphereWhere to this object
     * through the information_seeker_connect_request_cryosphere_where cross reference table.
     *
     * @param ChildCryosphereWhere $cryosphereWhere
     * @return ChildInformationSeekerConnectRequest The current object (for fluent API support)
     */
    public function addCryosphereWhere(ChildCryosphereWhere $cryosphereWhere)
    {
        if ($this->collCryosphereWheres === null) {
            $this->initCryosphereWheres();
        }

        if (!$this->getCryosphereWheres()->contains($cryosphereWhere)) {
            // only add it if the **same** object is not already associated
            $this->collCryosphereWheres->push($cryosphereWhere);
            $this->doAddCryosphereWhere($cryosphereWhere);
        }

        return $this;
    }

    /**
     *
     * @param ChildCryosphereWhere $cryosphereWhere
     */
    protected function doAddCryosphereWhere(ChildCryosphereWhere $cryosphereWhere)
    {
        $informationSeekerConnectRequestCryosphereWhere = new ChildInformationSeekerConnectRequestCryosphereWhere();

        $informationSeekerConnectRequestCryosphereWhere->setCryosphereWhere($cryosphereWhere);

        $informationSeekerConnectRequestCryosphereWhere->setInformationSeekerConnectRequest($this);

        $this->addInformationSeekerConnectRequestCryosphereWhere($informationSeekerConnectRequestCryosphereWhere);

        // set the back reference to this object directly as using provided method either results
        // in endless loop or in multiple relations
        if (!$cryosphereWhere->isInformationSeekerConnectRequestsLoaded()) {
            $cryosphereWhere->initInformationSeekerConnectRequests();
            $cryosphereWhere->getInformationSeekerConnectRequests()->push($this);
        } elseif (!$cryosphereWhere->getInformationSeekerConnectRequests()->contains($this)) {
            $cryosphereWhere->getInformationSeekerConnectRequests()->push($this);
        }

    }

    /**
     * Remove cryosphereWhere of this object
     * through the information_seeker_connect_request_cryosphere_where cross reference table.
     *
     * @param ChildCryosphereWhere $cryosphereWhere
     * @return ChildInformationSeekerConnectRequest The current object (for fluent API support)
     */
    public function removeCryosphereWhere(ChildCryosphereWhere $cryosphereWhere)
    {
        if ($this->getCryosphereWheres()->contains($cryosphereWhere)) {
            $informationSeekerConnectRequestCryosphereWhere = new ChildInformationSeekerConnectRequestCryosphereWhere();
            $informationSeekerConnectRequestCryosphereWhere->setCryosphereWhere($cryosphereWhere);
            if ($cryosphereWhere->isInformationSeekerConnectRequestsLoaded()) {
                //remove the back reference if available
                $cryosphereWhere->getInformationSeekerConnectRequests()->removeObject($this);
            }

            $informationSeekerConnectRequestCryosphereWhere->setInformationSeekerConnectRequest($this);
            $this->removeInformationSeekerConnectRequestCryosphereWhere(clone $informationSeekerConnectRequestCryosphereWhere);
            $informationSeekerConnectRequestCryosphereWhere->clear();

            $this->collCryosphereWheres->remove($this->collCryosphereWheres->search($cryosphereWhere));

            if (null === $this->cryosphereWheresScheduledForDeletion) {
                $this->cryosphereWheresScheduledForDeletion = clone $this->collCryosphereWheres;
                $this->cryosphereWheresScheduledForDeletion->clear();
            }

            $this->cryosphereWheresScheduledForDeletion->push($cryosphereWhere);
        }


        return $this;
    }

    /**
     * Clears out the collLanguagess collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addLanguagess()
     */
    public function clearLanguagess()
    {
        $this->collLanguagess = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Initializes the collLanguagess crossRef collection.
     *
     * By default this just sets the collLanguagess collection to an empty collection (like clearLanguagess());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @return void
     */
    public function initLanguagess()
    {
        $collectionClassName = InformationSeekerConnectRequestLanguagesTableMap::getTableMap()->getCollectionClassName();

        $this->collLanguagess = new $collectionClassName;
        $this->collLanguagessPartial = true;
        $this->collLanguagess->setModel('\CryoConnectDB\Languages');
    }

    /**
     * Checks if the collLanguagess collection is loaded.
     *
     * @return bool
     */
    public function isLanguagessLoaded()
    {
        return null !== $this->collLanguagess;
    }

    /**
     * Gets a collection of ChildLanguages objects related by a many-to-many relationship
     * to the current object by way of the information_seeker_connect_request_languages cross-reference table.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ChildInformationSeekerConnectRequest is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria Optional query object to filter the query
     * @param      ConnectionInterface $con Optional connection object
     *
     * @return ObjectCollection|ChildLanguages[] List of ChildLanguages objects
     */
    public function getLanguagess(Criteria $criteria = null, ConnectionInterface $con = null)
    {
        $partial = $this->collLanguagessPartial && !$this->isNew();
        if (null === $this->collLanguagess || null !== $criteria || $partial) {
            if ($this->isNew()) {
                // return empty collection
                if (null === $this->collLanguagess) {
                    $this->initLanguagess();
                }
            } else {

                $query = ChildLanguagesQuery::create(null, $criteria)
                    ->filterByInformationSeekerConnectRequest($this);
                $collLanguagess = $query->find($con);
                if (null !== $criteria) {
                    return $collLanguagess;
                }

                if ($partial && $this->collLanguagess) {
                    //make sure that already added objects gets added to the list of the database.
                    foreach ($this->collLanguagess as $obj) {
                        if (!$collLanguagess->contains($obj)) {
                            $collLanguagess[] = $obj;
                        }
                    }
                }

                $this->collLanguagess = $collLanguagess;
                $this->collLanguagessPartial = false;
            }
        }

        return $this->collLanguagess;
    }

    /**
     * Sets a collection of Languages objects related by a many-to-many relationship
     * to the current object by way of the information_seeker_connect_request_languages cross-reference table.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param  Collection $languagess A Propel collection.
     * @param  ConnectionInterface $con Optional connection object
     * @return $this|ChildInformationSeekerConnectRequest The current object (for fluent API support)
     */
    public function setLanguagess(Collection $languagess, ConnectionInterface $con = null)
    {
        $this->clearLanguagess();
        $currentLanguagess = $this->getLanguagess();

        $languagessScheduledForDeletion = $currentLanguagess->diff($languagess);

        foreach ($languagessScheduledForDeletion as $toDelete) {
            $this->removeLanguages($toDelete);
        }

        foreach ($languagess as $languages) {
            if (!$currentLanguagess->contains($languages)) {
                $this->doAddLanguages($languages);
            }
        }

        $this->collLanguagessPartial = false;
        $this->collLanguagess = $languagess;

        return $this;
    }

    /**
     * Gets the number of Languages objects related by a many-to-many relationship
     * to the current object by way of the information_seeker_connect_request_languages cross-reference table.
     *
     * @param      Criteria $criteria Optional query object to filter the query
     * @param      boolean $distinct Set to true to force count distinct
     * @param      ConnectionInterface $con Optional connection object
     *
     * @return int the number of related Languages objects
     */
    public function countLanguagess(Criteria $criteria = null, $distinct = false, ConnectionInterface $con = null)
    {
        $partial = $this->collLanguagessPartial && !$this->isNew();
        if (null === $this->collLanguagess || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collLanguagess) {
                return 0;
            } else {

                if ($partial && !$criteria) {
                    return count($this->getLanguagess());
                }

                $query = ChildLanguagesQuery::create(null, $criteria);
                if ($distinct) {
                    $query->distinct();
                }

                return $query
                    ->filterByInformationSeekerConnectRequest($this)
                    ->count($con);
            }
        } else {
            return count($this->collLanguagess);
        }
    }

    /**
     * Associate a ChildLanguages to this object
     * through the information_seeker_connect_request_languages cross reference table.
     *
     * @param ChildLanguages $languages
     * @return ChildInformationSeekerConnectRequest The current object (for fluent API support)
     */
    public function addLanguages(ChildLanguages $languages)
    {
        if ($this->collLanguagess === null) {
            $this->initLanguagess();
        }

        if (!$this->getLanguagess()->contains($languages)) {
            // only add it if the **same** object is not already associated
            $this->collLanguagess->push($languages);
            $this->doAddLanguages($languages);
        }

        return $this;
    }

    /**
     *
     * @param ChildLanguages $languages
     */
    protected function doAddLanguages(ChildLanguages $languages)
    {
        $informationSeekerConnectRequestLanguages = new ChildInformationSeekerConnectRequestLanguages();

        $informationSeekerConnectRequestLanguages->setLanguages($languages);

        $informationSeekerConnectRequestLanguages->setInformationSeekerConnectRequest($this);

        $this->addInformationSeekerConnectRequestLanguages($informationSeekerConnectRequestLanguages);

        // set the back reference to this object directly as using provided method either results
        // in endless loop or in multiple relations
        if (!$languages->isInformationSeekerConnectRequestsLoaded()) {
            $languages->initInformationSeekerConnectRequests();
            $languages->getInformationSeekerConnectRequests()->push($this);
        } elseif (!$languages->getInformationSeekerConnectRequests()->contains($this)) {
            $languages->getInformationSeekerConnectRequests()->push($this);
        }

    }

    /**
     * Remove languages of this object
     * through the information_seeker_connect_request_languages cross reference table.
     *
     * @param ChildLanguages $languages
     * @return ChildInformationSeekerConnectRequest The current object (for fluent API support)
     */
    public function removeLanguages(ChildLanguages $languages)
    {
        if ($this->getLanguagess()->contains($languages)) {
            $informationSeekerConnectRequestLanguages = new ChildInformationSeekerConnectRequestLanguages();
            $informationSeekerConnectRequestLanguages->setLanguages($languages);
            if ($languages->isInformationSeekerConnectRequestsLoaded()) {
                //remove the back reference if available
                $languages->getInformationSeekerConnectRequests()->removeObject($this);
            }

            $informationSeekerConnectRequestLanguages->setInformationSeekerConnectRequest($this);
            $this->removeInformationSeekerConnectRequestLanguages(clone $informationSeekerConnectRequestLanguages);
            $informationSeekerConnectRequestLanguages->clear();

            $this->collLanguagess->remove($this->collLanguagess->search($languages));

            if (null === $this->languagessScheduledForDeletion) {
                $this->languagessScheduledForDeletion = clone $this->collLanguagess;
                $this->languagessScheduledForDeletion->clear();
            }

            $this->languagessScheduledForDeletion->push($languages);
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
        if (null !== $this->aInformationSeekers) {
            $this->aInformationSeekers->removeInformationSeekerConnectRequest($this);
        }
        $this->id = null;
        $this->information_seeker_id = null;
        $this->contact_purpose = null;
        $this->created_at = null;
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
            if ($this->collInformationSeekerConnectRequestCryosphereWhats) {
                foreach ($this->collInformationSeekerConnectRequestCryosphereWhats as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collInformationSeekerConnectRequestCryosphereWheres) {
                foreach ($this->collInformationSeekerConnectRequestCryosphereWheres as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collInformationSeekerConnectRequestLanguagess) {
                foreach ($this->collInformationSeekerConnectRequestLanguagess as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collCryosphereWhats) {
                foreach ($this->collCryosphereWhats as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collCryosphereWheres) {
                foreach ($this->collCryosphereWheres as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collLanguagess) {
                foreach ($this->collLanguagess as $o) {
                    $o->clearAllReferences($deep);
                }
            }
        } // if ($deep)

        $this->collInformationSeekerConnectRequestCryosphereWhats = null;
        $this->collInformationSeekerConnectRequestCryosphereWheres = null;
        $this->collInformationSeekerConnectRequestLanguagess = null;
        $this->collCryosphereWhats = null;
        $this->collCryosphereWheres = null;
        $this->collLanguagess = null;
        $this->aInformationSeekers = null;
    }

    /**
     * Return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(InformationSeekerConnectRequestTableMap::DEFAULT_STRING_FORMAT);
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
