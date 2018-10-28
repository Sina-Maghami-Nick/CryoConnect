<?php

namespace CryoConnectDB\Base;

use \DateTime;
use \Exception;
use \PDO;
use CryoConnectDB\Countries as ChildCountries;
use CryoConnectDB\CountriesQuery as ChildCountriesQuery;
use CryoConnectDB\InformationSeekerAffiliation as ChildInformationSeekerAffiliation;
use CryoConnectDB\InformationSeekerAffiliationQuery as ChildInformationSeekerAffiliationQuery;
use CryoConnectDB\InformationSeekerConnectRequest as ChildInformationSeekerConnectRequest;
use CryoConnectDB\InformationSeekerConnectRequestQuery as ChildInformationSeekerConnectRequestQuery;
use CryoConnectDB\InformationSeekerContact as ChildInformationSeekerContact;
use CryoConnectDB\InformationSeekerContactQuery as ChildInformationSeekerContactQuery;
use CryoConnectDB\InformationSeekerLanguages as ChildInformationSeekerLanguages;
use CryoConnectDB\InformationSeekerLanguagesQuery as ChildInformationSeekerLanguagesQuery;
use CryoConnectDB\InformationSeekerProfession as ChildInformationSeekerProfession;
use CryoConnectDB\InformationSeekerProfessionQuery as ChildInformationSeekerProfessionQuery;
use CryoConnectDB\InformationSeekers as ChildInformationSeekers;
use CryoConnectDB\InformationSeekersQuery as ChildInformationSeekersQuery;
use CryoConnectDB\Map\InformationSeekerAffiliationTableMap;
use CryoConnectDB\Map\InformationSeekerConnectRequestTableMap;
use CryoConnectDB\Map\InformationSeekerContactTableMap;
use CryoConnectDB\Map\InformationSeekerLanguagesTableMap;
use CryoConnectDB\Map\InformationSeekerProfessionTableMap;
use CryoConnectDB\Map\InformationSeekersTableMap;
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
 * Base class that represents a row from the 'information_seekers' table.
 *
 *
 *
 * @package    propel.generator.CryoConnectDB.Base
 */
abstract class InformationSeekers implements ActiveRecordInterface
{
    /**
     * TableMap class name
     */
    const TABLE_MAP = '\\CryoConnectDB\\Map\\InformationSeekersTableMap';


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
     * The value for the first_name field.
     *
     * @var        string
     */
    protected $first_name;

    /**
     * The value for the last_name field.
     *
     * @var        string
     */
    protected $last_name;

    /**
     * The value for the email field.
     *
     * @var        string
     */
    protected $email;

    /**
     * The value for the country_code field.
     *
     * @var        string
     */
    protected $country_code;

    /**
     * The value for the approved field.
     *
     * Note: this column has a database default value of: false
     * @var        boolean
     */
    protected $approved;

    /**
     * The value for the created_at field.
     *
     * Note: this column has a database default value of: (expression) CURRENT_TIMESTAMP
     * @var        DateTime
     */
    protected $created_at;

    /**
     * @var        ChildCountries
     */
    protected $aCountries;

    /**
     * @var        ObjectCollection|ChildInformationSeekerAffiliation[] Collection to store aggregation of ChildInformationSeekerAffiliation objects.
     */
    protected $collInformationSeekerAffiliations;
    protected $collInformationSeekerAffiliationsPartial;

    /**
     * @var        ObjectCollection|ChildInformationSeekerConnectRequest[] Collection to store aggregation of ChildInformationSeekerConnectRequest objects.
     */
    protected $collInformationSeekerConnectRequests;
    protected $collInformationSeekerConnectRequestsPartial;

    /**
     * @var        ObjectCollection|ChildInformationSeekerContact[] Collection to store aggregation of ChildInformationSeekerContact objects.
     */
    protected $collInformationSeekerContacts;
    protected $collInformationSeekerContactsPartial;

    /**
     * @var        ObjectCollection|ChildInformationSeekerLanguages[] Collection to store aggregation of ChildInformationSeekerLanguages objects.
     */
    protected $collInformationSeekerLanguagess;
    protected $collInformationSeekerLanguagessPartial;

    /**
     * @var        ObjectCollection|ChildInformationSeekerProfession[] Collection to store aggregation of ChildInformationSeekerProfession objects.
     */
    protected $collInformationSeekerProfessions;
    protected $collInformationSeekerProfessionsPartial;

    /**
     * Flag to prevent endless save loop, if this object is referenced
     * by another object which falls in this transaction.
     *
     * @var boolean
     */
    protected $alreadyInSave = false;

    /**
     * An array of objects scheduled for deletion.
     * @var ObjectCollection|ChildInformationSeekerAffiliation[]
     */
    protected $informationSeekerAffiliationsScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var ObjectCollection|ChildInformationSeekerConnectRequest[]
     */
    protected $informationSeekerConnectRequestsScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var ObjectCollection|ChildInformationSeekerContact[]
     */
    protected $informationSeekerContactsScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var ObjectCollection|ChildInformationSeekerLanguages[]
     */
    protected $informationSeekerLanguagessScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var ObjectCollection|ChildInformationSeekerProfession[]
     */
    protected $informationSeekerProfessionsScheduledForDeletion = null;

    /**
     * Applies default values to this object.
     * This method should be called from the object's constructor (or
     * equivalent initialization method).
     * @see __construct()
     */
    public function applyDefaultValues()
    {
        $this->approved = false;
    }

    /**
     * Initializes internal state of CryoConnectDB\Base\InformationSeekers object.
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
     * Compares this with another <code>InformationSeekers</code> instance.  If
     * <code>obj</code> is an instance of <code>InformationSeekers</code>, delegates to
     * <code>equals(InformationSeekers)</code>.  Otherwise, returns <code>false</code>.
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
     * @return $this|InformationSeekers The current object, for fluid interface
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
     * Get the [first_name] column value.
     *
     * @return string
     */
    public function getFirstName()
    {
        return $this->first_name;
    }

    /**
     * Get the [last_name] column value.
     *
     * @return string
     */
    public function getLastName()
    {
        return $this->last_name;
    }

    /**
     * Get the [email] column value.
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Get the [country_code] column value.
     *
     * @return string
     */
    public function getCountryCode()
    {
        return $this->country_code;
    }

    /**
     * Get the [approved] column value.
     *
     * @return boolean
     */
    public function getApproved()
    {
        return $this->approved;
    }

    /**
     * Get the [approved] column value.
     *
     * @return boolean
     */
    public function isApproved()
    {
        return $this->getApproved();
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
     * @return $this|\CryoConnectDB\InformationSeekers The current object (for fluent API support)
     */
    public function setId($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->id !== $v) {
            $this->id = $v;
            $this->modifiedColumns[InformationSeekersTableMap::COL_ID] = true;
        }

        return $this;
    } // setId()

    /**
     * Set the value of [first_name] column.
     *
     * @param string $v new value
     * @return $this|\CryoConnectDB\InformationSeekers The current object (for fluent API support)
     */
    public function setFirstName($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->first_name !== $v) {
            $this->first_name = $v;
            $this->modifiedColumns[InformationSeekersTableMap::COL_FIRST_NAME] = true;
        }

        return $this;
    } // setFirstName()

    /**
     * Set the value of [last_name] column.
     *
     * @param string $v new value
     * @return $this|\CryoConnectDB\InformationSeekers The current object (for fluent API support)
     */
    public function setLastName($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->last_name !== $v) {
            $this->last_name = $v;
            $this->modifiedColumns[InformationSeekersTableMap::COL_LAST_NAME] = true;
        }

        return $this;
    } // setLastName()

    /**
     * Set the value of [email] column.
     *
     * @param string $v new value
     * @return $this|\CryoConnectDB\InformationSeekers The current object (for fluent API support)
     */
    public function setEmail($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->email !== $v) {
            $this->email = $v;
            $this->modifiedColumns[InformationSeekersTableMap::COL_EMAIL] = true;
        }

        return $this;
    } // setEmail()

    /**
     * Set the value of [country_code] column.
     *
     * @param string $v new value
     * @return $this|\CryoConnectDB\InformationSeekers The current object (for fluent API support)
     */
    public function setCountryCode($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->country_code !== $v) {
            $this->country_code = $v;
            $this->modifiedColumns[InformationSeekersTableMap::COL_COUNTRY_CODE] = true;
        }

        if ($this->aCountries !== null && $this->aCountries->getCountryCode() !== $v) {
            $this->aCountries = null;
        }

        return $this;
    } // setCountryCode()

    /**
     * Sets the value of the [approved] column.
     * Non-boolean arguments are converted using the following rules:
     *   * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *   * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     * Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     *
     * @param  boolean|integer|string $v The new value
     * @return $this|\CryoConnectDB\InformationSeekers The current object (for fluent API support)
     */
    public function setApproved($v)
    {
        if ($v !== null) {
            if (is_string($v)) {
                $v = in_array(strtolower($v), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
            } else {
                $v = (boolean) $v;
            }
        }

        if ($this->approved !== $v) {
            $this->approved = $v;
            $this->modifiedColumns[InformationSeekersTableMap::COL_APPROVED] = true;
        }

        return $this;
    } // setApproved()

    /**
     * Sets the value of [created_at] column to a normalized version of the date/time value specified.
     *
     * @param  mixed $v string, integer (timestamp), or \DateTimeInterface value.
     *               Empty strings are treated as NULL.
     * @return $this|\CryoConnectDB\InformationSeekers The current object (for fluent API support)
     */
    public function setCreatedAt($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->created_at !== null || $dt !== null) {
            if ($this->created_at === null || $dt === null || $dt->format("Y-m-d H:i:s.u") !== $this->created_at->format("Y-m-d H:i:s.u")) {
                $this->created_at = $dt === null ? null : clone $dt;
                $this->modifiedColumns[InformationSeekersTableMap::COL_CREATED_AT] = true;
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
            if ($this->approved !== false) {
                return false;
            }

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

            $col = $row[TableMap::TYPE_NUM == $indexType ? 0 + $startcol : InformationSeekersTableMap::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)];
            $this->id = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 1 + $startcol : InformationSeekersTableMap::translateFieldName('FirstName', TableMap::TYPE_PHPNAME, $indexType)];
            $this->first_name = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 2 + $startcol : InformationSeekersTableMap::translateFieldName('LastName', TableMap::TYPE_PHPNAME, $indexType)];
            $this->last_name = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 3 + $startcol : InformationSeekersTableMap::translateFieldName('Email', TableMap::TYPE_PHPNAME, $indexType)];
            $this->email = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 4 + $startcol : InformationSeekersTableMap::translateFieldName('CountryCode', TableMap::TYPE_PHPNAME, $indexType)];
            $this->country_code = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 5 + $startcol : InformationSeekersTableMap::translateFieldName('Approved', TableMap::TYPE_PHPNAME, $indexType)];
            $this->approved = (null !== $col) ? (boolean) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 6 + $startcol : InformationSeekersTableMap::translateFieldName('CreatedAt', TableMap::TYPE_PHPNAME, $indexType)];
            if ($col === '0000-00-00 00:00:00') {
                $col = null;
            }
            $this->created_at = (null !== $col) ? PropelDateTime::newInstance($col, null, 'DateTime') : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }

            return $startcol + 7; // 7 = InformationSeekersTableMap::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException(sprintf('Error populating %s object', '\\CryoConnectDB\\InformationSeekers'), 0, $e);
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
        if ($this->aCountries !== null && $this->country_code !== $this->aCountries->getCountryCode()) {
            $this->aCountries = null;
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
            $con = Propel::getServiceContainer()->getReadConnection(InformationSeekersTableMap::DATABASE_NAME);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $dataFetcher = ChildInformationSeekersQuery::create(null, $this->buildPkeyCriteria())->setFormatter(ModelCriteria::FORMAT_STATEMENT)->find($con);
        $row = $dataFetcher->fetch();
        $dataFetcher->close();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true, $dataFetcher->getIndexType()); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->aCountries = null;
            $this->collInformationSeekerAffiliations = null;

            $this->collInformationSeekerConnectRequests = null;

            $this->collInformationSeekerContacts = null;

            $this->collInformationSeekerLanguagess = null;

            $this->collInformationSeekerProfessions = null;

        } // if (deep)
    }

    /**
     * Removes this object from datastore and sets delete attribute.
     *
     * @param      ConnectionInterface $con
     * @return void
     * @throws PropelException
     * @see InformationSeekers::setDeleted()
     * @see InformationSeekers::isDeleted()
     */
    public function delete(ConnectionInterface $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("This object has already been deleted.");
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getWriteConnection(InformationSeekersTableMap::DATABASE_NAME);
        }

        $con->transaction(function () use ($con) {
            $deleteQuery = ChildInformationSeekersQuery::create()
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
            $con = Propel::getServiceContainer()->getWriteConnection(InformationSeekersTableMap::DATABASE_NAME);
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
                InformationSeekersTableMap::addInstanceToPool($this);
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

            if ($this->aCountries !== null) {
                if ($this->aCountries->isModified() || $this->aCountries->isNew()) {
                    $affectedRows += $this->aCountries->save($con);
                }
                $this->setCountries($this->aCountries);
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

            if ($this->informationSeekerAffiliationsScheduledForDeletion !== null) {
                if (!$this->informationSeekerAffiliationsScheduledForDeletion->isEmpty()) {
                    \CryoConnectDB\InformationSeekerAffiliationQuery::create()
                        ->filterByPrimaryKeys($this->informationSeekerAffiliationsScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->informationSeekerAffiliationsScheduledForDeletion = null;
                }
            }

            if ($this->collInformationSeekerAffiliations !== null) {
                foreach ($this->collInformationSeekerAffiliations as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->informationSeekerConnectRequestsScheduledForDeletion !== null) {
                if (!$this->informationSeekerConnectRequestsScheduledForDeletion->isEmpty()) {
                    \CryoConnectDB\InformationSeekerConnectRequestQuery::create()
                        ->filterByPrimaryKeys($this->informationSeekerConnectRequestsScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->informationSeekerConnectRequestsScheduledForDeletion = null;
                }
            }

            if ($this->collInformationSeekerConnectRequests !== null) {
                foreach ($this->collInformationSeekerConnectRequests as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->informationSeekerContactsScheduledForDeletion !== null) {
                if (!$this->informationSeekerContactsScheduledForDeletion->isEmpty()) {
                    \CryoConnectDB\InformationSeekerContactQuery::create()
                        ->filterByPrimaryKeys($this->informationSeekerContactsScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->informationSeekerContactsScheduledForDeletion = null;
                }
            }

            if ($this->collInformationSeekerContacts !== null) {
                foreach ($this->collInformationSeekerContacts as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->informationSeekerLanguagessScheduledForDeletion !== null) {
                if (!$this->informationSeekerLanguagessScheduledForDeletion->isEmpty()) {
                    \CryoConnectDB\InformationSeekerLanguagesQuery::create()
                        ->filterByPrimaryKeys($this->informationSeekerLanguagessScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->informationSeekerLanguagessScheduledForDeletion = null;
                }
            }

            if ($this->collInformationSeekerLanguagess !== null) {
                foreach ($this->collInformationSeekerLanguagess as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->informationSeekerProfessionsScheduledForDeletion !== null) {
                if (!$this->informationSeekerProfessionsScheduledForDeletion->isEmpty()) {
                    \CryoConnectDB\InformationSeekerProfessionQuery::create()
                        ->filterByPrimaryKeys($this->informationSeekerProfessionsScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->informationSeekerProfessionsScheduledForDeletion = null;
                }
            }

            if ($this->collInformationSeekerProfessions !== null) {
                foreach ($this->collInformationSeekerProfessions as $referrerFK) {
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

        $this->modifiedColumns[InformationSeekersTableMap::COL_ID] = true;
        if (null !== $this->id) {
            throw new PropelException('Cannot insert a value for auto-increment primary key (' . InformationSeekersTableMap::COL_ID . ')');
        }

         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(InformationSeekersTableMap::COL_ID)) {
            $modifiedColumns[':p' . $index++]  = 'id';
        }
        if ($this->isColumnModified(InformationSeekersTableMap::COL_FIRST_NAME)) {
            $modifiedColumns[':p' . $index++]  = 'first_name';
        }
        if ($this->isColumnModified(InformationSeekersTableMap::COL_LAST_NAME)) {
            $modifiedColumns[':p' . $index++]  = 'last_name';
        }
        if ($this->isColumnModified(InformationSeekersTableMap::COL_EMAIL)) {
            $modifiedColumns[':p' . $index++]  = 'email';
        }
        if ($this->isColumnModified(InformationSeekersTableMap::COL_COUNTRY_CODE)) {
            $modifiedColumns[':p' . $index++]  = 'country_code';
        }
        if ($this->isColumnModified(InformationSeekersTableMap::COL_APPROVED)) {
            $modifiedColumns[':p' . $index++]  = 'approved';
        }
        if ($this->isColumnModified(InformationSeekersTableMap::COL_CREATED_AT)) {
            $modifiedColumns[':p' . $index++]  = 'created_at';
        }

        $sql = sprintf(
            'INSERT INTO information_seekers (%s) VALUES (%s)',
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
                    case 'first_name':
                        $stmt->bindValue($identifier, $this->first_name, PDO::PARAM_STR);
                        break;
                    case 'last_name':
                        $stmt->bindValue($identifier, $this->last_name, PDO::PARAM_STR);
                        break;
                    case 'email':
                        $stmt->bindValue($identifier, $this->email, PDO::PARAM_STR);
                        break;
                    case 'country_code':
                        $stmt->bindValue($identifier, $this->country_code, PDO::PARAM_STR);
                        break;
                    case 'approved':
                        $stmt->bindValue($identifier, (int) $this->approved, PDO::PARAM_INT);
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
        $pos = InformationSeekersTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);
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
                return $this->getFirstName();
                break;
            case 2:
                return $this->getLastName();
                break;
            case 3:
                return $this->getEmail();
                break;
            case 4:
                return $this->getCountryCode();
                break;
            case 5:
                return $this->getApproved();
                break;
            case 6:
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

        if (isset($alreadyDumpedObjects['InformationSeekers'][$this->hashCode()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['InformationSeekers'][$this->hashCode()] = true;
        $keys = InformationSeekersTableMap::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getId(),
            $keys[1] => $this->getFirstName(),
            $keys[2] => $this->getLastName(),
            $keys[3] => $this->getEmail(),
            $keys[4] => $this->getCountryCode(),
            $keys[5] => $this->getApproved(),
            $keys[6] => $this->getCreatedAt(),
        );
        if ($result[$keys[6]] instanceof \DateTimeInterface) {
            $result[$keys[6]] = $result[$keys[6]]->format('c');
        }

        $virtualColumns = $this->virtualColumns;
        foreach ($virtualColumns as $key => $virtualColumn) {
            $result[$key] = $virtualColumn;
        }

        if ($includeForeignObjects) {
            if (null !== $this->aCountries) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'countries';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'countries';
                        break;
                    default:
                        $key = 'Countries';
                }

                $result[$key] = $this->aCountries->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->collInformationSeekerAffiliations) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'informationSeekerAffiliations';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'information_seeker_affiliations';
                        break;
                    default:
                        $key = 'InformationSeekerAffiliations';
                }

                $result[$key] = $this->collInformationSeekerAffiliations->toArray(null, false, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collInformationSeekerConnectRequests) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'informationSeekerConnectRequests';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'information_seeker_connect_requests';
                        break;
                    default:
                        $key = 'InformationSeekerConnectRequests';
                }

                $result[$key] = $this->collInformationSeekerConnectRequests->toArray(null, false, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collInformationSeekerContacts) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'informationSeekerContacts';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'information_seeker_contacts';
                        break;
                    default:
                        $key = 'InformationSeekerContacts';
                }

                $result[$key] = $this->collInformationSeekerContacts->toArray(null, false, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collInformationSeekerLanguagess) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'informationSeekerLanguagess';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'information_seeker_languagess';
                        break;
                    default:
                        $key = 'InformationSeekerLanguagess';
                }

                $result[$key] = $this->collInformationSeekerLanguagess->toArray(null, false, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collInformationSeekerProfessions) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'informationSeekerProfessions';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'information_seeker_professions';
                        break;
                    default:
                        $key = 'InformationSeekerProfessions';
                }

                $result[$key] = $this->collInformationSeekerProfessions->toArray(null, false, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
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
     * @return $this|\CryoConnectDB\InformationSeekers
     */
    public function setByName($name, $value, $type = TableMap::TYPE_PHPNAME)
    {
        $pos = InformationSeekersTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);

        return $this->setByPosition($pos, $value);
    }

    /**
     * Sets a field from the object by Position as specified in the xml schema.
     * Zero-based.
     *
     * @param  int $pos position in xml schema
     * @param  mixed $value field value
     * @return $this|\CryoConnectDB\InformationSeekers
     */
    public function setByPosition($pos, $value)
    {
        switch ($pos) {
            case 0:
                $this->setId($value);
                break;
            case 1:
                $this->setFirstName($value);
                break;
            case 2:
                $this->setLastName($value);
                break;
            case 3:
                $this->setEmail($value);
                break;
            case 4:
                $this->setCountryCode($value);
                break;
            case 5:
                $this->setApproved($value);
                break;
            case 6:
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
        $keys = InformationSeekersTableMap::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) {
            $this->setId($arr[$keys[0]]);
        }
        if (array_key_exists($keys[1], $arr)) {
            $this->setFirstName($arr[$keys[1]]);
        }
        if (array_key_exists($keys[2], $arr)) {
            $this->setLastName($arr[$keys[2]]);
        }
        if (array_key_exists($keys[3], $arr)) {
            $this->setEmail($arr[$keys[3]]);
        }
        if (array_key_exists($keys[4], $arr)) {
            $this->setCountryCode($arr[$keys[4]]);
        }
        if (array_key_exists($keys[5], $arr)) {
            $this->setApproved($arr[$keys[5]]);
        }
        if (array_key_exists($keys[6], $arr)) {
            $this->setCreatedAt($arr[$keys[6]]);
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
     * @return $this|\CryoConnectDB\InformationSeekers The current object, for fluid interface
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
        $criteria = new Criteria(InformationSeekersTableMap::DATABASE_NAME);

        if ($this->isColumnModified(InformationSeekersTableMap::COL_ID)) {
            $criteria->add(InformationSeekersTableMap::COL_ID, $this->id);
        }
        if ($this->isColumnModified(InformationSeekersTableMap::COL_FIRST_NAME)) {
            $criteria->add(InformationSeekersTableMap::COL_FIRST_NAME, $this->first_name);
        }
        if ($this->isColumnModified(InformationSeekersTableMap::COL_LAST_NAME)) {
            $criteria->add(InformationSeekersTableMap::COL_LAST_NAME, $this->last_name);
        }
        if ($this->isColumnModified(InformationSeekersTableMap::COL_EMAIL)) {
            $criteria->add(InformationSeekersTableMap::COL_EMAIL, $this->email);
        }
        if ($this->isColumnModified(InformationSeekersTableMap::COL_COUNTRY_CODE)) {
            $criteria->add(InformationSeekersTableMap::COL_COUNTRY_CODE, $this->country_code);
        }
        if ($this->isColumnModified(InformationSeekersTableMap::COL_APPROVED)) {
            $criteria->add(InformationSeekersTableMap::COL_APPROVED, $this->approved);
        }
        if ($this->isColumnModified(InformationSeekersTableMap::COL_CREATED_AT)) {
            $criteria->add(InformationSeekersTableMap::COL_CREATED_AT, $this->created_at);
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
        $criteria = ChildInformationSeekersQuery::create();
        $criteria->add(InformationSeekersTableMap::COL_ID, $this->id);

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
     * @param      object $copyObj An object of \CryoConnectDB\InformationSeekers (or compatible) type.
     * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param      boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setFirstName($this->getFirstName());
        $copyObj->setLastName($this->getLastName());
        $copyObj->setEmail($this->getEmail());
        $copyObj->setCountryCode($this->getCountryCode());
        $copyObj->setApproved($this->getApproved());
        $copyObj->setCreatedAt($this->getCreatedAt());

        if ($deepCopy) {
            // important: temporarily setNew(false) because this affects the behavior of
            // the getter/setter methods for fkey referrer objects.
            $copyObj->setNew(false);

            foreach ($this->getInformationSeekerAffiliations() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addInformationSeekerAffiliation($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getInformationSeekerConnectRequests() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addInformationSeekerConnectRequest($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getInformationSeekerContacts() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addInformationSeekerContact($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getInformationSeekerLanguagess() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addInformationSeekerLanguages($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getInformationSeekerProfessions() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addInformationSeekerProfession($relObj->copy($deepCopy));
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
     * @return \CryoConnectDB\InformationSeekers Clone of current object.
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
     * Declares an association between this object and a ChildCountries object.
     *
     * @param  ChildCountries $v
     * @return $this|\CryoConnectDB\InformationSeekers The current object (for fluent API support)
     * @throws PropelException
     */
    public function setCountries(ChildCountries $v = null)
    {
        if ($v === null) {
            $this->setCountryCode(NULL);
        } else {
            $this->setCountryCode($v->getCountryCode());
        }

        $this->aCountries = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the ChildCountries object, it will not be re-added.
        if ($v !== null) {
            $v->addInformationSeekers($this);
        }


        return $this;
    }


    /**
     * Get the associated ChildCountries object
     *
     * @param  ConnectionInterface $con Optional Connection object.
     * @return ChildCountries The associated ChildCountries object.
     * @throws PropelException
     */
    public function getCountries(ConnectionInterface $con = null)
    {
        if ($this->aCountries === null && (($this->country_code !== "" && $this->country_code !== null))) {
            $this->aCountries = ChildCountriesQuery::create()->findPk($this->country_code, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aCountries->addInformationSeekerss($this);
             */
        }

        return $this->aCountries;
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
        if ('InformationSeekerAffiliation' == $relationName) {
            $this->initInformationSeekerAffiliations();
            return;
        }
        if ('InformationSeekerConnectRequest' == $relationName) {
            $this->initInformationSeekerConnectRequests();
            return;
        }
        if ('InformationSeekerContact' == $relationName) {
            $this->initInformationSeekerContacts();
            return;
        }
        if ('InformationSeekerLanguages' == $relationName) {
            $this->initInformationSeekerLanguagess();
            return;
        }
        if ('InformationSeekerProfession' == $relationName) {
            $this->initInformationSeekerProfessions();
            return;
        }
    }

    /**
     * Clears out the collInformationSeekerAffiliations collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addInformationSeekerAffiliations()
     */
    public function clearInformationSeekerAffiliations()
    {
        $this->collInformationSeekerAffiliations = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Reset is the collInformationSeekerAffiliations collection loaded partially.
     */
    public function resetPartialInformationSeekerAffiliations($v = true)
    {
        $this->collInformationSeekerAffiliationsPartial = $v;
    }

    /**
     * Initializes the collInformationSeekerAffiliations collection.
     *
     * By default this just sets the collInformationSeekerAffiliations collection to an empty array (like clearcollInformationSeekerAffiliations());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param      boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initInformationSeekerAffiliations($overrideExisting = true)
    {
        if (null !== $this->collInformationSeekerAffiliations && !$overrideExisting) {
            return;
        }

        $collectionClassName = InformationSeekerAffiliationTableMap::getTableMap()->getCollectionClassName();

        $this->collInformationSeekerAffiliations = new $collectionClassName;
        $this->collInformationSeekerAffiliations->setModel('\CryoConnectDB\InformationSeekerAffiliation');
    }

    /**
     * Gets an array of ChildInformationSeekerAffiliation objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ChildInformationSeekers is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @return ObjectCollection|ChildInformationSeekerAffiliation[] List of ChildInformationSeekerAffiliation objects
     * @throws PropelException
     */
    public function getInformationSeekerAffiliations(Criteria $criteria = null, ConnectionInterface $con = null)
    {
        $partial = $this->collInformationSeekerAffiliationsPartial && !$this->isNew();
        if (null === $this->collInformationSeekerAffiliations || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collInformationSeekerAffiliations) {
                // return empty collection
                $this->initInformationSeekerAffiliations();
            } else {
                $collInformationSeekerAffiliations = ChildInformationSeekerAffiliationQuery::create(null, $criteria)
                    ->filterByInformationSeekers($this)
                    ->find($con);

                if (null !== $criteria) {
                    if (false !== $this->collInformationSeekerAffiliationsPartial && count($collInformationSeekerAffiliations)) {
                        $this->initInformationSeekerAffiliations(false);

                        foreach ($collInformationSeekerAffiliations as $obj) {
                            if (false == $this->collInformationSeekerAffiliations->contains($obj)) {
                                $this->collInformationSeekerAffiliations->append($obj);
                            }
                        }

                        $this->collInformationSeekerAffiliationsPartial = true;
                    }

                    return $collInformationSeekerAffiliations;
                }

                if ($partial && $this->collInformationSeekerAffiliations) {
                    foreach ($this->collInformationSeekerAffiliations as $obj) {
                        if ($obj->isNew()) {
                            $collInformationSeekerAffiliations[] = $obj;
                        }
                    }
                }

                $this->collInformationSeekerAffiliations = $collInformationSeekerAffiliations;
                $this->collInformationSeekerAffiliationsPartial = false;
            }
        }

        return $this->collInformationSeekerAffiliations;
    }

    /**
     * Sets a collection of ChildInformationSeekerAffiliation objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      Collection $informationSeekerAffiliations A Propel collection.
     * @param      ConnectionInterface $con Optional connection object
     * @return $this|ChildInformationSeekers The current object (for fluent API support)
     */
    public function setInformationSeekerAffiliations(Collection $informationSeekerAffiliations, ConnectionInterface $con = null)
    {
        /** @var ChildInformationSeekerAffiliation[] $informationSeekerAffiliationsToDelete */
        $informationSeekerAffiliationsToDelete = $this->getInformationSeekerAffiliations(new Criteria(), $con)->diff($informationSeekerAffiliations);


        $this->informationSeekerAffiliationsScheduledForDeletion = $informationSeekerAffiliationsToDelete;

        foreach ($informationSeekerAffiliationsToDelete as $informationSeekerAffiliationRemoved) {
            $informationSeekerAffiliationRemoved->setInformationSeekers(null);
        }

        $this->collInformationSeekerAffiliations = null;
        foreach ($informationSeekerAffiliations as $informationSeekerAffiliation) {
            $this->addInformationSeekerAffiliation($informationSeekerAffiliation);
        }

        $this->collInformationSeekerAffiliations = $informationSeekerAffiliations;
        $this->collInformationSeekerAffiliationsPartial = false;

        return $this;
    }

    /**
     * Returns the number of related InformationSeekerAffiliation objects.
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct
     * @param      ConnectionInterface $con
     * @return int             Count of related InformationSeekerAffiliation objects.
     * @throws PropelException
     */
    public function countInformationSeekerAffiliations(Criteria $criteria = null, $distinct = false, ConnectionInterface $con = null)
    {
        $partial = $this->collInformationSeekerAffiliationsPartial && !$this->isNew();
        if (null === $this->collInformationSeekerAffiliations || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collInformationSeekerAffiliations) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getInformationSeekerAffiliations());
            }

            $query = ChildInformationSeekerAffiliationQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByInformationSeekers($this)
                ->count($con);
        }

        return count($this->collInformationSeekerAffiliations);
    }

    /**
     * Method called to associate a ChildInformationSeekerAffiliation object to this object
     * through the ChildInformationSeekerAffiliation foreign key attribute.
     *
     * @param  ChildInformationSeekerAffiliation $l ChildInformationSeekerAffiliation
     * @return $this|\CryoConnectDB\InformationSeekers The current object (for fluent API support)
     */
    public function addInformationSeekerAffiliation(ChildInformationSeekerAffiliation $l)
    {
        if ($this->collInformationSeekerAffiliations === null) {
            $this->initInformationSeekerAffiliations();
            $this->collInformationSeekerAffiliationsPartial = true;
        }

        if (!$this->collInformationSeekerAffiliations->contains($l)) {
            $this->doAddInformationSeekerAffiliation($l);

            if ($this->informationSeekerAffiliationsScheduledForDeletion and $this->informationSeekerAffiliationsScheduledForDeletion->contains($l)) {
                $this->informationSeekerAffiliationsScheduledForDeletion->remove($this->informationSeekerAffiliationsScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param ChildInformationSeekerAffiliation $informationSeekerAffiliation The ChildInformationSeekerAffiliation object to add.
     */
    protected function doAddInformationSeekerAffiliation(ChildInformationSeekerAffiliation $informationSeekerAffiliation)
    {
        $this->collInformationSeekerAffiliations[]= $informationSeekerAffiliation;
        $informationSeekerAffiliation->setInformationSeekers($this);
    }

    /**
     * @param  ChildInformationSeekerAffiliation $informationSeekerAffiliation The ChildInformationSeekerAffiliation object to remove.
     * @return $this|ChildInformationSeekers The current object (for fluent API support)
     */
    public function removeInformationSeekerAffiliation(ChildInformationSeekerAffiliation $informationSeekerAffiliation)
    {
        if ($this->getInformationSeekerAffiliations()->contains($informationSeekerAffiliation)) {
            $pos = $this->collInformationSeekerAffiliations->search($informationSeekerAffiliation);
            $this->collInformationSeekerAffiliations->remove($pos);
            if (null === $this->informationSeekerAffiliationsScheduledForDeletion) {
                $this->informationSeekerAffiliationsScheduledForDeletion = clone $this->collInformationSeekerAffiliations;
                $this->informationSeekerAffiliationsScheduledForDeletion->clear();
            }
            $this->informationSeekerAffiliationsScheduledForDeletion[]= clone $informationSeekerAffiliation;
            $informationSeekerAffiliation->setInformationSeekers(null);
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
     * Reset is the collInformationSeekerConnectRequests collection loaded partially.
     */
    public function resetPartialInformationSeekerConnectRequests($v = true)
    {
        $this->collInformationSeekerConnectRequestsPartial = $v;
    }

    /**
     * Initializes the collInformationSeekerConnectRequests collection.
     *
     * By default this just sets the collInformationSeekerConnectRequests collection to an empty array (like clearcollInformationSeekerConnectRequests());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param      boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initInformationSeekerConnectRequests($overrideExisting = true)
    {
        if (null !== $this->collInformationSeekerConnectRequests && !$overrideExisting) {
            return;
        }

        $collectionClassName = InformationSeekerConnectRequestTableMap::getTableMap()->getCollectionClassName();

        $this->collInformationSeekerConnectRequests = new $collectionClassName;
        $this->collInformationSeekerConnectRequests->setModel('\CryoConnectDB\InformationSeekerConnectRequest');
    }

    /**
     * Gets an array of ChildInformationSeekerConnectRequest objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ChildInformationSeekers is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @return ObjectCollection|ChildInformationSeekerConnectRequest[] List of ChildInformationSeekerConnectRequest objects
     * @throws PropelException
     */
    public function getInformationSeekerConnectRequests(Criteria $criteria = null, ConnectionInterface $con = null)
    {
        $partial = $this->collInformationSeekerConnectRequestsPartial && !$this->isNew();
        if (null === $this->collInformationSeekerConnectRequests || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collInformationSeekerConnectRequests) {
                // return empty collection
                $this->initInformationSeekerConnectRequests();
            } else {
                $collInformationSeekerConnectRequests = ChildInformationSeekerConnectRequestQuery::create(null, $criteria)
                    ->filterByInformationSeekers($this)
                    ->find($con);

                if (null !== $criteria) {
                    if (false !== $this->collInformationSeekerConnectRequestsPartial && count($collInformationSeekerConnectRequests)) {
                        $this->initInformationSeekerConnectRequests(false);

                        foreach ($collInformationSeekerConnectRequests as $obj) {
                            if (false == $this->collInformationSeekerConnectRequests->contains($obj)) {
                                $this->collInformationSeekerConnectRequests->append($obj);
                            }
                        }

                        $this->collInformationSeekerConnectRequestsPartial = true;
                    }

                    return $collInformationSeekerConnectRequests;
                }

                if ($partial && $this->collInformationSeekerConnectRequests) {
                    foreach ($this->collInformationSeekerConnectRequests as $obj) {
                        if ($obj->isNew()) {
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
     * Sets a collection of ChildInformationSeekerConnectRequest objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      Collection $informationSeekerConnectRequests A Propel collection.
     * @param      ConnectionInterface $con Optional connection object
     * @return $this|ChildInformationSeekers The current object (for fluent API support)
     */
    public function setInformationSeekerConnectRequests(Collection $informationSeekerConnectRequests, ConnectionInterface $con = null)
    {
        /** @var ChildInformationSeekerConnectRequest[] $informationSeekerConnectRequestsToDelete */
        $informationSeekerConnectRequestsToDelete = $this->getInformationSeekerConnectRequests(new Criteria(), $con)->diff($informationSeekerConnectRequests);


        $this->informationSeekerConnectRequestsScheduledForDeletion = $informationSeekerConnectRequestsToDelete;

        foreach ($informationSeekerConnectRequestsToDelete as $informationSeekerConnectRequestRemoved) {
            $informationSeekerConnectRequestRemoved->setInformationSeekers(null);
        }

        $this->collInformationSeekerConnectRequests = null;
        foreach ($informationSeekerConnectRequests as $informationSeekerConnectRequest) {
            $this->addInformationSeekerConnectRequest($informationSeekerConnectRequest);
        }

        $this->collInformationSeekerConnectRequests = $informationSeekerConnectRequests;
        $this->collInformationSeekerConnectRequestsPartial = false;

        return $this;
    }

    /**
     * Returns the number of related InformationSeekerConnectRequest objects.
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct
     * @param      ConnectionInterface $con
     * @return int             Count of related InformationSeekerConnectRequest objects.
     * @throws PropelException
     */
    public function countInformationSeekerConnectRequests(Criteria $criteria = null, $distinct = false, ConnectionInterface $con = null)
    {
        $partial = $this->collInformationSeekerConnectRequestsPartial && !$this->isNew();
        if (null === $this->collInformationSeekerConnectRequests || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collInformationSeekerConnectRequests) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getInformationSeekerConnectRequests());
            }

            $query = ChildInformationSeekerConnectRequestQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByInformationSeekers($this)
                ->count($con);
        }

        return count($this->collInformationSeekerConnectRequests);
    }

    /**
     * Method called to associate a ChildInformationSeekerConnectRequest object to this object
     * through the ChildInformationSeekerConnectRequest foreign key attribute.
     *
     * @param  ChildInformationSeekerConnectRequest $l ChildInformationSeekerConnectRequest
     * @return $this|\CryoConnectDB\InformationSeekers The current object (for fluent API support)
     */
    public function addInformationSeekerConnectRequest(ChildInformationSeekerConnectRequest $l)
    {
        if ($this->collInformationSeekerConnectRequests === null) {
            $this->initInformationSeekerConnectRequests();
            $this->collInformationSeekerConnectRequestsPartial = true;
        }

        if (!$this->collInformationSeekerConnectRequests->contains($l)) {
            $this->doAddInformationSeekerConnectRequest($l);

            if ($this->informationSeekerConnectRequestsScheduledForDeletion and $this->informationSeekerConnectRequestsScheduledForDeletion->contains($l)) {
                $this->informationSeekerConnectRequestsScheduledForDeletion->remove($this->informationSeekerConnectRequestsScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param ChildInformationSeekerConnectRequest $informationSeekerConnectRequest The ChildInformationSeekerConnectRequest object to add.
     */
    protected function doAddInformationSeekerConnectRequest(ChildInformationSeekerConnectRequest $informationSeekerConnectRequest)
    {
        $this->collInformationSeekerConnectRequests[]= $informationSeekerConnectRequest;
        $informationSeekerConnectRequest->setInformationSeekers($this);
    }

    /**
     * @param  ChildInformationSeekerConnectRequest $informationSeekerConnectRequest The ChildInformationSeekerConnectRequest object to remove.
     * @return $this|ChildInformationSeekers The current object (for fluent API support)
     */
    public function removeInformationSeekerConnectRequest(ChildInformationSeekerConnectRequest $informationSeekerConnectRequest)
    {
        if ($this->getInformationSeekerConnectRequests()->contains($informationSeekerConnectRequest)) {
            $pos = $this->collInformationSeekerConnectRequests->search($informationSeekerConnectRequest);
            $this->collInformationSeekerConnectRequests->remove($pos);
            if (null === $this->informationSeekerConnectRequestsScheduledForDeletion) {
                $this->informationSeekerConnectRequestsScheduledForDeletion = clone $this->collInformationSeekerConnectRequests;
                $this->informationSeekerConnectRequestsScheduledForDeletion->clear();
            }
            $this->informationSeekerConnectRequestsScheduledForDeletion[]= clone $informationSeekerConnectRequest;
            $informationSeekerConnectRequest->setInformationSeekers(null);
        }

        return $this;
    }

    /**
     * Clears out the collInformationSeekerContacts collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addInformationSeekerContacts()
     */
    public function clearInformationSeekerContacts()
    {
        $this->collInformationSeekerContacts = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Reset is the collInformationSeekerContacts collection loaded partially.
     */
    public function resetPartialInformationSeekerContacts($v = true)
    {
        $this->collInformationSeekerContactsPartial = $v;
    }

    /**
     * Initializes the collInformationSeekerContacts collection.
     *
     * By default this just sets the collInformationSeekerContacts collection to an empty array (like clearcollInformationSeekerContacts());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param      boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initInformationSeekerContacts($overrideExisting = true)
    {
        if (null !== $this->collInformationSeekerContacts && !$overrideExisting) {
            return;
        }

        $collectionClassName = InformationSeekerContactTableMap::getTableMap()->getCollectionClassName();

        $this->collInformationSeekerContacts = new $collectionClassName;
        $this->collInformationSeekerContacts->setModel('\CryoConnectDB\InformationSeekerContact');
    }

    /**
     * Gets an array of ChildInformationSeekerContact objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ChildInformationSeekers is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @return ObjectCollection|ChildInformationSeekerContact[] List of ChildInformationSeekerContact objects
     * @throws PropelException
     */
    public function getInformationSeekerContacts(Criteria $criteria = null, ConnectionInterface $con = null)
    {
        $partial = $this->collInformationSeekerContactsPartial && !$this->isNew();
        if (null === $this->collInformationSeekerContacts || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collInformationSeekerContacts) {
                // return empty collection
                $this->initInformationSeekerContacts();
            } else {
                $collInformationSeekerContacts = ChildInformationSeekerContactQuery::create(null, $criteria)
                    ->filterByInformationSeekers($this)
                    ->find($con);

                if (null !== $criteria) {
                    if (false !== $this->collInformationSeekerContactsPartial && count($collInformationSeekerContacts)) {
                        $this->initInformationSeekerContacts(false);

                        foreach ($collInformationSeekerContacts as $obj) {
                            if (false == $this->collInformationSeekerContacts->contains($obj)) {
                                $this->collInformationSeekerContacts->append($obj);
                            }
                        }

                        $this->collInformationSeekerContactsPartial = true;
                    }

                    return $collInformationSeekerContacts;
                }

                if ($partial && $this->collInformationSeekerContacts) {
                    foreach ($this->collInformationSeekerContacts as $obj) {
                        if ($obj->isNew()) {
                            $collInformationSeekerContacts[] = $obj;
                        }
                    }
                }

                $this->collInformationSeekerContacts = $collInformationSeekerContacts;
                $this->collInformationSeekerContactsPartial = false;
            }
        }

        return $this->collInformationSeekerContacts;
    }

    /**
     * Sets a collection of ChildInformationSeekerContact objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      Collection $informationSeekerContacts A Propel collection.
     * @param      ConnectionInterface $con Optional connection object
     * @return $this|ChildInformationSeekers The current object (for fluent API support)
     */
    public function setInformationSeekerContacts(Collection $informationSeekerContacts, ConnectionInterface $con = null)
    {
        /** @var ChildInformationSeekerContact[] $informationSeekerContactsToDelete */
        $informationSeekerContactsToDelete = $this->getInformationSeekerContacts(new Criteria(), $con)->diff($informationSeekerContacts);


        $this->informationSeekerContactsScheduledForDeletion = $informationSeekerContactsToDelete;

        foreach ($informationSeekerContactsToDelete as $informationSeekerContactRemoved) {
            $informationSeekerContactRemoved->setInformationSeekers(null);
        }

        $this->collInformationSeekerContacts = null;
        foreach ($informationSeekerContacts as $informationSeekerContact) {
            $this->addInformationSeekerContact($informationSeekerContact);
        }

        $this->collInformationSeekerContacts = $informationSeekerContacts;
        $this->collInformationSeekerContactsPartial = false;

        return $this;
    }

    /**
     * Returns the number of related InformationSeekerContact objects.
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct
     * @param      ConnectionInterface $con
     * @return int             Count of related InformationSeekerContact objects.
     * @throws PropelException
     */
    public function countInformationSeekerContacts(Criteria $criteria = null, $distinct = false, ConnectionInterface $con = null)
    {
        $partial = $this->collInformationSeekerContactsPartial && !$this->isNew();
        if (null === $this->collInformationSeekerContacts || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collInformationSeekerContacts) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getInformationSeekerContacts());
            }

            $query = ChildInformationSeekerContactQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByInformationSeekers($this)
                ->count($con);
        }

        return count($this->collInformationSeekerContacts);
    }

    /**
     * Method called to associate a ChildInformationSeekerContact object to this object
     * through the ChildInformationSeekerContact foreign key attribute.
     *
     * @param  ChildInformationSeekerContact $l ChildInformationSeekerContact
     * @return $this|\CryoConnectDB\InformationSeekers The current object (for fluent API support)
     */
    public function addInformationSeekerContact(ChildInformationSeekerContact $l)
    {
        if ($this->collInformationSeekerContacts === null) {
            $this->initInformationSeekerContacts();
            $this->collInformationSeekerContactsPartial = true;
        }

        if (!$this->collInformationSeekerContacts->contains($l)) {
            $this->doAddInformationSeekerContact($l);

            if ($this->informationSeekerContactsScheduledForDeletion and $this->informationSeekerContactsScheduledForDeletion->contains($l)) {
                $this->informationSeekerContactsScheduledForDeletion->remove($this->informationSeekerContactsScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param ChildInformationSeekerContact $informationSeekerContact The ChildInformationSeekerContact object to add.
     */
    protected function doAddInformationSeekerContact(ChildInformationSeekerContact $informationSeekerContact)
    {
        $this->collInformationSeekerContacts[]= $informationSeekerContact;
        $informationSeekerContact->setInformationSeekers($this);
    }

    /**
     * @param  ChildInformationSeekerContact $informationSeekerContact The ChildInformationSeekerContact object to remove.
     * @return $this|ChildInformationSeekers The current object (for fluent API support)
     */
    public function removeInformationSeekerContact(ChildInformationSeekerContact $informationSeekerContact)
    {
        if ($this->getInformationSeekerContacts()->contains($informationSeekerContact)) {
            $pos = $this->collInformationSeekerContacts->search($informationSeekerContact);
            $this->collInformationSeekerContacts->remove($pos);
            if (null === $this->informationSeekerContactsScheduledForDeletion) {
                $this->informationSeekerContactsScheduledForDeletion = clone $this->collInformationSeekerContacts;
                $this->informationSeekerContactsScheduledForDeletion->clear();
            }
            $this->informationSeekerContactsScheduledForDeletion[]= clone $informationSeekerContact;
            $informationSeekerContact->setInformationSeekers(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this InformationSeekers is new, it will return
     * an empty collection; or if this InformationSeekers has previously
     * been saved, it will retrieve related InformationSeekerContacts from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in InformationSeekers.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildInformationSeekerContact[] List of ChildInformationSeekerContact objects
     */
    public function getInformationSeekerContactsJoinContactTypes(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildInformationSeekerContactQuery::create(null, $criteria);
        $query->joinWith('ContactTypes', $joinBehavior);

        return $this->getInformationSeekerContacts($query, $con);
    }

    /**
     * Clears out the collInformationSeekerLanguagess collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addInformationSeekerLanguagess()
     */
    public function clearInformationSeekerLanguagess()
    {
        $this->collInformationSeekerLanguagess = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Reset is the collInformationSeekerLanguagess collection loaded partially.
     */
    public function resetPartialInformationSeekerLanguagess($v = true)
    {
        $this->collInformationSeekerLanguagessPartial = $v;
    }

    /**
     * Initializes the collInformationSeekerLanguagess collection.
     *
     * By default this just sets the collInformationSeekerLanguagess collection to an empty array (like clearcollInformationSeekerLanguagess());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param      boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initInformationSeekerLanguagess($overrideExisting = true)
    {
        if (null !== $this->collInformationSeekerLanguagess && !$overrideExisting) {
            return;
        }

        $collectionClassName = InformationSeekerLanguagesTableMap::getTableMap()->getCollectionClassName();

        $this->collInformationSeekerLanguagess = new $collectionClassName;
        $this->collInformationSeekerLanguagess->setModel('\CryoConnectDB\InformationSeekerLanguages');
    }

    /**
     * Gets an array of ChildInformationSeekerLanguages objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ChildInformationSeekers is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @return ObjectCollection|ChildInformationSeekerLanguages[] List of ChildInformationSeekerLanguages objects
     * @throws PropelException
     */
    public function getInformationSeekerLanguagess(Criteria $criteria = null, ConnectionInterface $con = null)
    {
        $partial = $this->collInformationSeekerLanguagessPartial && !$this->isNew();
        if (null === $this->collInformationSeekerLanguagess || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collInformationSeekerLanguagess) {
                // return empty collection
                $this->initInformationSeekerLanguagess();
            } else {
                $collInformationSeekerLanguagess = ChildInformationSeekerLanguagesQuery::create(null, $criteria)
                    ->filterByInformationSeekers($this)
                    ->find($con);

                if (null !== $criteria) {
                    if (false !== $this->collInformationSeekerLanguagessPartial && count($collInformationSeekerLanguagess)) {
                        $this->initInformationSeekerLanguagess(false);

                        foreach ($collInformationSeekerLanguagess as $obj) {
                            if (false == $this->collInformationSeekerLanguagess->contains($obj)) {
                                $this->collInformationSeekerLanguagess->append($obj);
                            }
                        }

                        $this->collInformationSeekerLanguagessPartial = true;
                    }

                    return $collInformationSeekerLanguagess;
                }

                if ($partial && $this->collInformationSeekerLanguagess) {
                    foreach ($this->collInformationSeekerLanguagess as $obj) {
                        if ($obj->isNew()) {
                            $collInformationSeekerLanguagess[] = $obj;
                        }
                    }
                }

                $this->collInformationSeekerLanguagess = $collInformationSeekerLanguagess;
                $this->collInformationSeekerLanguagessPartial = false;
            }
        }

        return $this->collInformationSeekerLanguagess;
    }

    /**
     * Sets a collection of ChildInformationSeekerLanguages objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      Collection $informationSeekerLanguagess A Propel collection.
     * @param      ConnectionInterface $con Optional connection object
     * @return $this|ChildInformationSeekers The current object (for fluent API support)
     */
    public function setInformationSeekerLanguagess(Collection $informationSeekerLanguagess, ConnectionInterface $con = null)
    {
        /** @var ChildInformationSeekerLanguages[] $informationSeekerLanguagessToDelete */
        $informationSeekerLanguagessToDelete = $this->getInformationSeekerLanguagess(new Criteria(), $con)->diff($informationSeekerLanguagess);


        $this->informationSeekerLanguagessScheduledForDeletion = $informationSeekerLanguagessToDelete;

        foreach ($informationSeekerLanguagessToDelete as $informationSeekerLanguagesRemoved) {
            $informationSeekerLanguagesRemoved->setInformationSeekers(null);
        }

        $this->collInformationSeekerLanguagess = null;
        foreach ($informationSeekerLanguagess as $informationSeekerLanguages) {
            $this->addInformationSeekerLanguages($informationSeekerLanguages);
        }

        $this->collInformationSeekerLanguagess = $informationSeekerLanguagess;
        $this->collInformationSeekerLanguagessPartial = false;

        return $this;
    }

    /**
     * Returns the number of related InformationSeekerLanguages objects.
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct
     * @param      ConnectionInterface $con
     * @return int             Count of related InformationSeekerLanguages objects.
     * @throws PropelException
     */
    public function countInformationSeekerLanguagess(Criteria $criteria = null, $distinct = false, ConnectionInterface $con = null)
    {
        $partial = $this->collInformationSeekerLanguagessPartial && !$this->isNew();
        if (null === $this->collInformationSeekerLanguagess || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collInformationSeekerLanguagess) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getInformationSeekerLanguagess());
            }

            $query = ChildInformationSeekerLanguagesQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByInformationSeekers($this)
                ->count($con);
        }

        return count($this->collInformationSeekerLanguagess);
    }

    /**
     * Method called to associate a ChildInformationSeekerLanguages object to this object
     * through the ChildInformationSeekerLanguages foreign key attribute.
     *
     * @param  ChildInformationSeekerLanguages $l ChildInformationSeekerLanguages
     * @return $this|\CryoConnectDB\InformationSeekers The current object (for fluent API support)
     */
    public function addInformationSeekerLanguages(ChildInformationSeekerLanguages $l)
    {
        if ($this->collInformationSeekerLanguagess === null) {
            $this->initInformationSeekerLanguagess();
            $this->collInformationSeekerLanguagessPartial = true;
        }

        if (!$this->collInformationSeekerLanguagess->contains($l)) {
            $this->doAddInformationSeekerLanguages($l);

            if ($this->informationSeekerLanguagessScheduledForDeletion and $this->informationSeekerLanguagessScheduledForDeletion->contains($l)) {
                $this->informationSeekerLanguagessScheduledForDeletion->remove($this->informationSeekerLanguagessScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param ChildInformationSeekerLanguages $informationSeekerLanguages The ChildInformationSeekerLanguages object to add.
     */
    protected function doAddInformationSeekerLanguages(ChildInformationSeekerLanguages $informationSeekerLanguages)
    {
        $this->collInformationSeekerLanguagess[]= $informationSeekerLanguages;
        $informationSeekerLanguages->setInformationSeekers($this);
    }

    /**
     * @param  ChildInformationSeekerLanguages $informationSeekerLanguages The ChildInformationSeekerLanguages object to remove.
     * @return $this|ChildInformationSeekers The current object (for fluent API support)
     */
    public function removeInformationSeekerLanguages(ChildInformationSeekerLanguages $informationSeekerLanguages)
    {
        if ($this->getInformationSeekerLanguagess()->contains($informationSeekerLanguages)) {
            $pos = $this->collInformationSeekerLanguagess->search($informationSeekerLanguages);
            $this->collInformationSeekerLanguagess->remove($pos);
            if (null === $this->informationSeekerLanguagessScheduledForDeletion) {
                $this->informationSeekerLanguagessScheduledForDeletion = clone $this->collInformationSeekerLanguagess;
                $this->informationSeekerLanguagessScheduledForDeletion->clear();
            }
            $this->informationSeekerLanguagessScheduledForDeletion[]= clone $informationSeekerLanguages;
            $informationSeekerLanguages->setInformationSeekers(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this InformationSeekers is new, it will return
     * an empty collection; or if this InformationSeekers has previously
     * been saved, it will retrieve related InformationSeekerLanguagess from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in InformationSeekers.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildInformationSeekerLanguages[] List of ChildInformationSeekerLanguages objects
     */
    public function getInformationSeekerLanguagessJoinLanguages(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildInformationSeekerLanguagesQuery::create(null, $criteria);
        $query->joinWith('Languages', $joinBehavior);

        return $this->getInformationSeekerLanguagess($query, $con);
    }

    /**
     * Clears out the collInformationSeekerProfessions collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addInformationSeekerProfessions()
     */
    public function clearInformationSeekerProfessions()
    {
        $this->collInformationSeekerProfessions = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Reset is the collInformationSeekerProfessions collection loaded partially.
     */
    public function resetPartialInformationSeekerProfessions($v = true)
    {
        $this->collInformationSeekerProfessionsPartial = $v;
    }

    /**
     * Initializes the collInformationSeekerProfessions collection.
     *
     * By default this just sets the collInformationSeekerProfessions collection to an empty array (like clearcollInformationSeekerProfessions());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param      boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initInformationSeekerProfessions($overrideExisting = true)
    {
        if (null !== $this->collInformationSeekerProfessions && !$overrideExisting) {
            return;
        }

        $collectionClassName = InformationSeekerProfessionTableMap::getTableMap()->getCollectionClassName();

        $this->collInformationSeekerProfessions = new $collectionClassName;
        $this->collInformationSeekerProfessions->setModel('\CryoConnectDB\InformationSeekerProfession');
    }

    /**
     * Gets an array of ChildInformationSeekerProfession objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ChildInformationSeekers is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @return ObjectCollection|ChildInformationSeekerProfession[] List of ChildInformationSeekerProfession objects
     * @throws PropelException
     */
    public function getInformationSeekerProfessions(Criteria $criteria = null, ConnectionInterface $con = null)
    {
        $partial = $this->collInformationSeekerProfessionsPartial && !$this->isNew();
        if (null === $this->collInformationSeekerProfessions || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collInformationSeekerProfessions) {
                // return empty collection
                $this->initInformationSeekerProfessions();
            } else {
                $collInformationSeekerProfessions = ChildInformationSeekerProfessionQuery::create(null, $criteria)
                    ->filterByInformationSeekers($this)
                    ->find($con);

                if (null !== $criteria) {
                    if (false !== $this->collInformationSeekerProfessionsPartial && count($collInformationSeekerProfessions)) {
                        $this->initInformationSeekerProfessions(false);

                        foreach ($collInformationSeekerProfessions as $obj) {
                            if (false == $this->collInformationSeekerProfessions->contains($obj)) {
                                $this->collInformationSeekerProfessions->append($obj);
                            }
                        }

                        $this->collInformationSeekerProfessionsPartial = true;
                    }

                    return $collInformationSeekerProfessions;
                }

                if ($partial && $this->collInformationSeekerProfessions) {
                    foreach ($this->collInformationSeekerProfessions as $obj) {
                        if ($obj->isNew()) {
                            $collInformationSeekerProfessions[] = $obj;
                        }
                    }
                }

                $this->collInformationSeekerProfessions = $collInformationSeekerProfessions;
                $this->collInformationSeekerProfessionsPartial = false;
            }
        }

        return $this->collInformationSeekerProfessions;
    }

    /**
     * Sets a collection of ChildInformationSeekerProfession objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      Collection $informationSeekerProfessions A Propel collection.
     * @param      ConnectionInterface $con Optional connection object
     * @return $this|ChildInformationSeekers The current object (for fluent API support)
     */
    public function setInformationSeekerProfessions(Collection $informationSeekerProfessions, ConnectionInterface $con = null)
    {
        /** @var ChildInformationSeekerProfession[] $informationSeekerProfessionsToDelete */
        $informationSeekerProfessionsToDelete = $this->getInformationSeekerProfessions(new Criteria(), $con)->diff($informationSeekerProfessions);


        $this->informationSeekerProfessionsScheduledForDeletion = $informationSeekerProfessionsToDelete;

        foreach ($informationSeekerProfessionsToDelete as $informationSeekerProfessionRemoved) {
            $informationSeekerProfessionRemoved->setInformationSeekers(null);
        }

        $this->collInformationSeekerProfessions = null;
        foreach ($informationSeekerProfessions as $informationSeekerProfession) {
            $this->addInformationSeekerProfession($informationSeekerProfession);
        }

        $this->collInformationSeekerProfessions = $informationSeekerProfessions;
        $this->collInformationSeekerProfessionsPartial = false;

        return $this;
    }

    /**
     * Returns the number of related InformationSeekerProfession objects.
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct
     * @param      ConnectionInterface $con
     * @return int             Count of related InformationSeekerProfession objects.
     * @throws PropelException
     */
    public function countInformationSeekerProfessions(Criteria $criteria = null, $distinct = false, ConnectionInterface $con = null)
    {
        $partial = $this->collInformationSeekerProfessionsPartial && !$this->isNew();
        if (null === $this->collInformationSeekerProfessions || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collInformationSeekerProfessions) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getInformationSeekerProfessions());
            }

            $query = ChildInformationSeekerProfessionQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByInformationSeekers($this)
                ->count($con);
        }

        return count($this->collInformationSeekerProfessions);
    }

    /**
     * Method called to associate a ChildInformationSeekerProfession object to this object
     * through the ChildInformationSeekerProfession foreign key attribute.
     *
     * @param  ChildInformationSeekerProfession $l ChildInformationSeekerProfession
     * @return $this|\CryoConnectDB\InformationSeekers The current object (for fluent API support)
     */
    public function addInformationSeekerProfession(ChildInformationSeekerProfession $l)
    {
        if ($this->collInformationSeekerProfessions === null) {
            $this->initInformationSeekerProfessions();
            $this->collInformationSeekerProfessionsPartial = true;
        }

        if (!$this->collInformationSeekerProfessions->contains($l)) {
            $this->doAddInformationSeekerProfession($l);

            if ($this->informationSeekerProfessionsScheduledForDeletion and $this->informationSeekerProfessionsScheduledForDeletion->contains($l)) {
                $this->informationSeekerProfessionsScheduledForDeletion->remove($this->informationSeekerProfessionsScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param ChildInformationSeekerProfession $informationSeekerProfession The ChildInformationSeekerProfession object to add.
     */
    protected function doAddInformationSeekerProfession(ChildInformationSeekerProfession $informationSeekerProfession)
    {
        $this->collInformationSeekerProfessions[]= $informationSeekerProfession;
        $informationSeekerProfession->setInformationSeekers($this);
    }

    /**
     * @param  ChildInformationSeekerProfession $informationSeekerProfession The ChildInformationSeekerProfession object to remove.
     * @return $this|ChildInformationSeekers The current object (for fluent API support)
     */
    public function removeInformationSeekerProfession(ChildInformationSeekerProfession $informationSeekerProfession)
    {
        if ($this->getInformationSeekerProfessions()->contains($informationSeekerProfession)) {
            $pos = $this->collInformationSeekerProfessions->search($informationSeekerProfession);
            $this->collInformationSeekerProfessions->remove($pos);
            if (null === $this->informationSeekerProfessionsScheduledForDeletion) {
                $this->informationSeekerProfessionsScheduledForDeletion = clone $this->collInformationSeekerProfessions;
                $this->informationSeekerProfessionsScheduledForDeletion->clear();
            }
            $this->informationSeekerProfessionsScheduledForDeletion[]= clone $informationSeekerProfession;
            $informationSeekerProfession->setInformationSeekers(null);
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
        if (null !== $this->aCountries) {
            $this->aCountries->removeInformationSeekers($this);
        }
        $this->id = null;
        $this->first_name = null;
        $this->last_name = null;
        $this->email = null;
        $this->country_code = null;
        $this->approved = null;
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
            if ($this->collInformationSeekerAffiliations) {
                foreach ($this->collInformationSeekerAffiliations as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collInformationSeekerConnectRequests) {
                foreach ($this->collInformationSeekerConnectRequests as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collInformationSeekerContacts) {
                foreach ($this->collInformationSeekerContacts as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collInformationSeekerLanguagess) {
                foreach ($this->collInformationSeekerLanguagess as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collInformationSeekerProfessions) {
                foreach ($this->collInformationSeekerProfessions as $o) {
                    $o->clearAllReferences($deep);
                }
            }
        } // if ($deep)

        $this->collInformationSeekerAffiliations = null;
        $this->collInformationSeekerConnectRequests = null;
        $this->collInformationSeekerContacts = null;
        $this->collInformationSeekerLanguagess = null;
        $this->collInformationSeekerProfessions = null;
        $this->aCountries = null;
    }

    /**
     * Return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(InformationSeekersTableMap::DEFAULT_STRING_FORMAT);
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
