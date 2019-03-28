<?php

namespace CryoConnectDB\Base;

use \DateTime;
use \Exception;
use \PDO;
use CryoConnectDB\Fieldwork as ChildFieldwork;
use CryoConnectDB\FieldworkInformationSeeker as ChildFieldworkInformationSeeker;
use CryoConnectDB\FieldworkInformationSeekerQuery as ChildFieldworkInformationSeekerQuery;
use CryoConnectDB\FieldworkInformationSeekerRequest as ChildFieldworkInformationSeekerRequest;
use CryoConnectDB\FieldworkInformationSeekerRequestQuery as ChildFieldworkInformationSeekerRequestQuery;
use CryoConnectDB\FieldworkQuery as ChildFieldworkQuery;
use CryoConnectDB\Map\FieldworkInformationSeekerRequestTableMap;
use CryoConnectDB\Map\FieldworkInformationSeekerTableMap;
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
 * Base class that represents a row from the 'fieldwork_information_seeker' table.
 *
 *
 *
 * @package    propel.generator.CryoConnectDB.Base
 */
abstract class FieldworkInformationSeeker implements ActiveRecordInterface
{
    /**
     * TableMap class name
     */
    const TABLE_MAP = '\\CryoConnectDB\\Map\\FieldworkInformationSeekerTableMap';


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
     * The value for the information_seeker_name field.
     *
     * @var        string
     */
    protected $information_seeker_name;

    /**
     * The value for the information_seeker_affiliation field.
     *
     * @var        string
     */
    protected $information_seeker_affiliation;

    /**
     * The value for the information_seeker_website field.
     *
     * @var        string
     */
    protected $information_seeker_website;

    /**
     * The value for the information_seeker_email field.
     *
     * @var        string
     */
    protected $information_seeker_email;

    /**
     * The value for the information_seeker_affiliation_website field.
     *
     * @var        string
     */
    protected $information_seeker_affiliation_website;

    /**
     * The value for the information_seeker_reasons field.
     *
     * @var        string
     */
    protected $information_seeker_reasons;

    /**
     * The value for the information_seeker_requested_spots field.
     *
     * @var        int
     */
    protected $information_seeker_requested_spots;

    /**
     * The value for the approved field.
     *
     * Note: this column has a database default value of: false
     * @var        boolean
     */
    protected $approved;

    /**
     * The value for the timestamp field.
     *
     * Note: this column has a database default value of: (expression) CURRENT_TIMESTAMP
     * @var        DateTime
     */
    protected $timestamp;

    /**
     * @var        ObjectCollection|ChildFieldworkInformationSeekerRequest[] Collection to store aggregation of ChildFieldworkInformationSeekerRequest objects.
     */
    protected $collFieldworkInformationSeekerRequests;
    protected $collFieldworkInformationSeekerRequestsPartial;

    /**
     * @var        ObjectCollection|ChildFieldwork[] Cross Collection to store aggregation of ChildFieldwork objects.
     */
    protected $collFieldworks;

    /**
     * @var bool
     */
    protected $collFieldworksPartial;

    /**
     * Flag to prevent endless save loop, if this object is referenced
     * by another object which falls in this transaction.
     *
     * @var boolean
     */
    protected $alreadyInSave = false;

    /**
     * An array of objects scheduled for deletion.
     * @var ObjectCollection|ChildFieldwork[]
     */
    protected $fieldworksScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var ObjectCollection|ChildFieldworkInformationSeekerRequest[]
     */
    protected $fieldworkInformationSeekerRequestsScheduledForDeletion = null;

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
     * Initializes internal state of CryoConnectDB\Base\FieldworkInformationSeeker object.
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
     * Compares this with another <code>FieldworkInformationSeeker</code> instance.  If
     * <code>obj</code> is an instance of <code>FieldworkInformationSeeker</code>, delegates to
     * <code>equals(FieldworkInformationSeeker)</code>.  Otherwise, returns <code>false</code>.
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
     * @return $this|FieldworkInformationSeeker The current object, for fluid interface
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
     * Get the [information_seeker_name] column value.
     *
     * @return string
     */
    public function getInformationSeekerName()
    {
        return $this->information_seeker_name;
    }

    /**
     * Get the [information_seeker_affiliation] column value.
     *
     * @return string
     */
    public function getInformationSeekerAffiliation()
    {
        return $this->information_seeker_affiliation;
    }

    /**
     * Get the [information_seeker_website] column value.
     *
     * @return string
     */
    public function getInformationSeekerWebsite()
    {
        return $this->information_seeker_website;
    }

    /**
     * Get the [information_seeker_email] column value.
     *
     * @return string
     */
    public function getInformationSeekerEmail()
    {
        return $this->information_seeker_email;
    }

    /**
     * Get the [information_seeker_affiliation_website] column value.
     *
     * @return string
     */
    public function getInformationSeekerAffiliationWebsite()
    {
        return $this->information_seeker_affiliation_website;
    }

    /**
     * Get the [information_seeker_reasons] column value.
     *
     * @return string
     */
    public function getInformationSeekerReasons()
    {
        return $this->information_seeker_reasons;
    }

    /**
     * Get the [information_seeker_requested_spots] column value.
     *
     * @return int
     */
    public function getInformationSeekerRequestedSpots()
    {
        return $this->information_seeker_requested_spots;
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
     * @return $this|\CryoConnectDB\FieldworkInformationSeeker The current object (for fluent API support)
     */
    public function setId($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->id !== $v) {
            $this->id = $v;
            $this->modifiedColumns[FieldworkInformationSeekerTableMap::COL_ID] = true;
        }

        return $this;
    } // setId()

    /**
     * Set the value of [information_seeker_name] column.
     *
     * @param string $v new value
     * @return $this|\CryoConnectDB\FieldworkInformationSeeker The current object (for fluent API support)
     */
    public function setInformationSeekerName($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->information_seeker_name !== $v) {
            $this->information_seeker_name = $v;
            $this->modifiedColumns[FieldworkInformationSeekerTableMap::COL_INFORMATION_SEEKER_NAME] = true;
        }

        return $this;
    } // setInformationSeekerName()

    /**
     * Set the value of [information_seeker_affiliation] column.
     *
     * @param string $v new value
     * @return $this|\CryoConnectDB\FieldworkInformationSeeker The current object (for fluent API support)
     */
    public function setInformationSeekerAffiliation($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->information_seeker_affiliation !== $v) {
            $this->information_seeker_affiliation = $v;
            $this->modifiedColumns[FieldworkInformationSeekerTableMap::COL_INFORMATION_SEEKER_AFFILIATION] = true;
        }

        return $this;
    } // setInformationSeekerAffiliation()

    /**
     * Set the value of [information_seeker_website] column.
     *
     * @param string $v new value
     * @return $this|\CryoConnectDB\FieldworkInformationSeeker The current object (for fluent API support)
     */
    public function setInformationSeekerWebsite($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->information_seeker_website !== $v) {
            $this->information_seeker_website = $v;
            $this->modifiedColumns[FieldworkInformationSeekerTableMap::COL_INFORMATION_SEEKER_WEBSITE] = true;
        }

        return $this;
    } // setInformationSeekerWebsite()

    /**
     * Set the value of [information_seeker_email] column.
     *
     * @param string $v new value
     * @return $this|\CryoConnectDB\FieldworkInformationSeeker The current object (for fluent API support)
     */
    public function setInformationSeekerEmail($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->information_seeker_email !== $v) {
            $this->information_seeker_email = $v;
            $this->modifiedColumns[FieldworkInformationSeekerTableMap::COL_INFORMATION_SEEKER_EMAIL] = true;
        }

        return $this;
    } // setInformationSeekerEmail()

    /**
     * Set the value of [information_seeker_affiliation_website] column.
     *
     * @param string $v new value
     * @return $this|\CryoConnectDB\FieldworkInformationSeeker The current object (for fluent API support)
     */
    public function setInformationSeekerAffiliationWebsite($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->information_seeker_affiliation_website !== $v) {
            $this->information_seeker_affiliation_website = $v;
            $this->modifiedColumns[FieldworkInformationSeekerTableMap::COL_INFORMATION_SEEKER_AFFILIATION_WEBSITE] = true;
        }

        return $this;
    } // setInformationSeekerAffiliationWebsite()

    /**
     * Set the value of [information_seeker_reasons] column.
     *
     * @param string $v new value
     * @return $this|\CryoConnectDB\FieldworkInformationSeeker The current object (for fluent API support)
     */
    public function setInformationSeekerReasons($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->information_seeker_reasons !== $v) {
            $this->information_seeker_reasons = $v;
            $this->modifiedColumns[FieldworkInformationSeekerTableMap::COL_INFORMATION_SEEKER_REASONS] = true;
        }

        return $this;
    } // setInformationSeekerReasons()

    /**
     * Set the value of [information_seeker_requested_spots] column.
     *
     * @param int $v new value
     * @return $this|\CryoConnectDB\FieldworkInformationSeeker The current object (for fluent API support)
     */
    public function setInformationSeekerRequestedSpots($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->information_seeker_requested_spots !== $v) {
            $this->information_seeker_requested_spots = $v;
            $this->modifiedColumns[FieldworkInformationSeekerTableMap::COL_INFORMATION_SEEKER_REQUESTED_SPOTS] = true;
        }

        return $this;
    } // setInformationSeekerRequestedSpots()

    /**
     * Sets the value of the [approved] column.
     * Non-boolean arguments are converted using the following rules:
     *   * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *   * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     * Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     *
     * @param  boolean|integer|string $v The new value
     * @return $this|\CryoConnectDB\FieldworkInformationSeeker The current object (for fluent API support)
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
            $this->modifiedColumns[FieldworkInformationSeekerTableMap::COL_APPROVED] = true;
        }

        return $this;
    } // setApproved()

    /**
     * Sets the value of [timestamp] column to a normalized version of the date/time value specified.
     *
     * @param  mixed $v string, integer (timestamp), or \DateTimeInterface value.
     *               Empty strings are treated as NULL.
     * @return $this|\CryoConnectDB\FieldworkInformationSeeker The current object (for fluent API support)
     */
    public function setTimestamp($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->timestamp !== null || $dt !== null) {
            if ($this->timestamp === null || $dt === null || $dt->format("Y-m-d H:i:s.u") !== $this->timestamp->format("Y-m-d H:i:s.u")) {
                $this->timestamp = $dt === null ? null : clone $dt;
                $this->modifiedColumns[FieldworkInformationSeekerTableMap::COL_TIMESTAMP] = true;
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

            $col = $row[TableMap::TYPE_NUM == $indexType ? 0 + $startcol : FieldworkInformationSeekerTableMap::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)];
            $this->id = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 1 + $startcol : FieldworkInformationSeekerTableMap::translateFieldName('InformationSeekerName', TableMap::TYPE_PHPNAME, $indexType)];
            $this->information_seeker_name = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 2 + $startcol : FieldworkInformationSeekerTableMap::translateFieldName('InformationSeekerAffiliation', TableMap::TYPE_PHPNAME, $indexType)];
            $this->information_seeker_affiliation = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 3 + $startcol : FieldworkInformationSeekerTableMap::translateFieldName('InformationSeekerWebsite', TableMap::TYPE_PHPNAME, $indexType)];
            $this->information_seeker_website = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 4 + $startcol : FieldworkInformationSeekerTableMap::translateFieldName('InformationSeekerEmail', TableMap::TYPE_PHPNAME, $indexType)];
            $this->information_seeker_email = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 5 + $startcol : FieldworkInformationSeekerTableMap::translateFieldName('InformationSeekerAffiliationWebsite', TableMap::TYPE_PHPNAME, $indexType)];
            $this->information_seeker_affiliation_website = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 6 + $startcol : FieldworkInformationSeekerTableMap::translateFieldName('InformationSeekerReasons', TableMap::TYPE_PHPNAME, $indexType)];
            $this->information_seeker_reasons = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 7 + $startcol : FieldworkInformationSeekerTableMap::translateFieldName('InformationSeekerRequestedSpots', TableMap::TYPE_PHPNAME, $indexType)];
            $this->information_seeker_requested_spots = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 8 + $startcol : FieldworkInformationSeekerTableMap::translateFieldName('Approved', TableMap::TYPE_PHPNAME, $indexType)];
            $this->approved = (null !== $col) ? (boolean) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 9 + $startcol : FieldworkInformationSeekerTableMap::translateFieldName('Timestamp', TableMap::TYPE_PHPNAME, $indexType)];
            if ($col === '0000-00-00 00:00:00') {
                $col = null;
            }
            $this->timestamp = (null !== $col) ? PropelDateTime::newInstance($col, null, 'DateTime') : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }

            return $startcol + 10; // 10 = FieldworkInformationSeekerTableMap::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException(sprintf('Error populating %s object', '\\CryoConnectDB\\FieldworkInformationSeeker'), 0, $e);
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
            $con = Propel::getServiceContainer()->getReadConnection(FieldworkInformationSeekerTableMap::DATABASE_NAME);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $dataFetcher = ChildFieldworkInformationSeekerQuery::create(null, $this->buildPkeyCriteria())->setFormatter(ModelCriteria::FORMAT_STATEMENT)->find($con);
        $row = $dataFetcher->fetch();
        $dataFetcher->close();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true, $dataFetcher->getIndexType()); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->collFieldworkInformationSeekerRequests = null;

            $this->collFieldworks = null;
        } // if (deep)
    }

    /**
     * Removes this object from datastore and sets delete attribute.
     *
     * @param      ConnectionInterface $con
     * @return void
     * @throws PropelException
     * @see FieldworkInformationSeeker::setDeleted()
     * @see FieldworkInformationSeeker::isDeleted()
     */
    public function delete(ConnectionInterface $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("This object has already been deleted.");
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getWriteConnection(FieldworkInformationSeekerTableMap::DATABASE_NAME);
        }

        $con->transaction(function () use ($con) {
            $deleteQuery = ChildFieldworkInformationSeekerQuery::create()
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
            $con = Propel::getServiceContainer()->getWriteConnection(FieldworkInformationSeekerTableMap::DATABASE_NAME);
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
                FieldworkInformationSeekerTableMap::addInstanceToPool($this);
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

            if ($this->fieldworksScheduledForDeletion !== null) {
                if (!$this->fieldworksScheduledForDeletion->isEmpty()) {
                    $pks = array();
                    foreach ($this->fieldworksScheduledForDeletion as $entry) {
                        $entryPk = [];

                        $entryPk[0] = $this->getId();
                        $entryPk[1] = $entry->getId();
                        $pks[] = $entryPk;
                    }

                    \CryoConnectDB\FieldworkInformationSeekerRequestQuery::create()
                        ->filterByPrimaryKeys($pks)
                        ->delete($con);

                    $this->fieldworksScheduledForDeletion = null;
                }

            }

            if ($this->collFieldworks) {
                foreach ($this->collFieldworks as $fieldwork) {
                    if (!$fieldwork->isDeleted() && ($fieldwork->isNew() || $fieldwork->isModified())) {
                        $fieldwork->save($con);
                    }
                }
            }


            if ($this->fieldworkInformationSeekerRequestsScheduledForDeletion !== null) {
                if (!$this->fieldworkInformationSeekerRequestsScheduledForDeletion->isEmpty()) {
                    \CryoConnectDB\FieldworkInformationSeekerRequestQuery::create()
                        ->filterByPrimaryKeys($this->fieldworkInformationSeekerRequestsScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->fieldworkInformationSeekerRequestsScheduledForDeletion = null;
                }
            }

            if ($this->collFieldworkInformationSeekerRequests !== null) {
                foreach ($this->collFieldworkInformationSeekerRequests as $referrerFK) {
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

        $this->modifiedColumns[FieldworkInformationSeekerTableMap::COL_ID] = true;
        if (null !== $this->id) {
            throw new PropelException('Cannot insert a value for auto-increment primary key (' . FieldworkInformationSeekerTableMap::COL_ID . ')');
        }

         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(FieldworkInformationSeekerTableMap::COL_ID)) {
            $modifiedColumns[':p' . $index++]  = 'id';
        }
        if ($this->isColumnModified(FieldworkInformationSeekerTableMap::COL_INFORMATION_SEEKER_NAME)) {
            $modifiedColumns[':p' . $index++]  = 'information_seeker_name';
        }
        if ($this->isColumnModified(FieldworkInformationSeekerTableMap::COL_INFORMATION_SEEKER_AFFILIATION)) {
            $modifiedColumns[':p' . $index++]  = 'information_seeker_affiliation';
        }
        if ($this->isColumnModified(FieldworkInformationSeekerTableMap::COL_INFORMATION_SEEKER_WEBSITE)) {
            $modifiedColumns[':p' . $index++]  = 'information_seeker_website';
        }
        if ($this->isColumnModified(FieldworkInformationSeekerTableMap::COL_INFORMATION_SEEKER_EMAIL)) {
            $modifiedColumns[':p' . $index++]  = 'information_seeker_email';
        }
        if ($this->isColumnModified(FieldworkInformationSeekerTableMap::COL_INFORMATION_SEEKER_AFFILIATION_WEBSITE)) {
            $modifiedColumns[':p' . $index++]  = 'information_seeker_affiliation_website';
        }
        if ($this->isColumnModified(FieldworkInformationSeekerTableMap::COL_INFORMATION_SEEKER_REASONS)) {
            $modifiedColumns[':p' . $index++]  = 'information_seeker_reasons';
        }
        if ($this->isColumnModified(FieldworkInformationSeekerTableMap::COL_INFORMATION_SEEKER_REQUESTED_SPOTS)) {
            $modifiedColumns[':p' . $index++]  = 'information_seeker_requested_spots';
        }
        if ($this->isColumnModified(FieldworkInformationSeekerTableMap::COL_APPROVED)) {
            $modifiedColumns[':p' . $index++]  = 'approved';
        }
        if ($this->isColumnModified(FieldworkInformationSeekerTableMap::COL_TIMESTAMP)) {
            $modifiedColumns[':p' . $index++]  = 'timestamp';
        }

        $sql = sprintf(
            'INSERT INTO fieldwork_information_seeker (%s) VALUES (%s)',
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
                    case 'information_seeker_name':
                        $stmt->bindValue($identifier, $this->information_seeker_name, PDO::PARAM_STR);
                        break;
                    case 'information_seeker_affiliation':
                        $stmt->bindValue($identifier, $this->information_seeker_affiliation, PDO::PARAM_STR);
                        break;
                    case 'information_seeker_website':
                        $stmt->bindValue($identifier, $this->information_seeker_website, PDO::PARAM_STR);
                        break;
                    case 'information_seeker_email':
                        $stmt->bindValue($identifier, $this->information_seeker_email, PDO::PARAM_STR);
                        break;
                    case 'information_seeker_affiliation_website':
                        $stmt->bindValue($identifier, $this->information_seeker_affiliation_website, PDO::PARAM_STR);
                        break;
                    case 'information_seeker_reasons':
                        $stmt->bindValue($identifier, $this->information_seeker_reasons, PDO::PARAM_STR);
                        break;
                    case 'information_seeker_requested_spots':
                        $stmt->bindValue($identifier, $this->information_seeker_requested_spots, PDO::PARAM_INT);
                        break;
                    case 'approved':
                        $stmt->bindValue($identifier, (int) $this->approved, PDO::PARAM_INT);
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
        $pos = FieldworkInformationSeekerTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);
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
                return $this->getInformationSeekerName();
                break;
            case 2:
                return $this->getInformationSeekerAffiliation();
                break;
            case 3:
                return $this->getInformationSeekerWebsite();
                break;
            case 4:
                return $this->getInformationSeekerEmail();
                break;
            case 5:
                return $this->getInformationSeekerAffiliationWebsite();
                break;
            case 6:
                return $this->getInformationSeekerReasons();
                break;
            case 7:
                return $this->getInformationSeekerRequestedSpots();
                break;
            case 8:
                return $this->getApproved();
                break;
            case 9:
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

        if (isset($alreadyDumpedObjects['FieldworkInformationSeeker'][$this->hashCode()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['FieldworkInformationSeeker'][$this->hashCode()] = true;
        $keys = FieldworkInformationSeekerTableMap::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getId(),
            $keys[1] => $this->getInformationSeekerName(),
            $keys[2] => $this->getInformationSeekerAffiliation(),
            $keys[3] => $this->getInformationSeekerWebsite(),
            $keys[4] => $this->getInformationSeekerEmail(),
            $keys[5] => $this->getInformationSeekerAffiliationWebsite(),
            $keys[6] => $this->getInformationSeekerReasons(),
            $keys[7] => $this->getInformationSeekerRequestedSpots(),
            $keys[8] => $this->getApproved(),
            $keys[9] => $this->getTimestamp(),
        );
        if ($result[$keys[9]] instanceof \DateTimeInterface) {
            $result[$keys[9]] = $result[$keys[9]]->format('c');
        }

        $virtualColumns = $this->virtualColumns;
        foreach ($virtualColumns as $key => $virtualColumn) {
            $result[$key] = $virtualColumn;
        }

        if ($includeForeignObjects) {
            if (null !== $this->collFieldworkInformationSeekerRequests) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'fieldworkInformationSeekerRequests';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'fieldwork_information_seeker_requests';
                        break;
                    default:
                        $key = 'FieldworkInformationSeekerRequests';
                }

                $result[$key] = $this->collFieldworkInformationSeekerRequests->toArray(null, false, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
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
     * @return $this|\CryoConnectDB\FieldworkInformationSeeker
     */
    public function setByName($name, $value, $type = TableMap::TYPE_PHPNAME)
    {
        $pos = FieldworkInformationSeekerTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);

        return $this->setByPosition($pos, $value);
    }

    /**
     * Sets a field from the object by Position as specified in the xml schema.
     * Zero-based.
     *
     * @param  int $pos position in xml schema
     * @param  mixed $value field value
     * @return $this|\CryoConnectDB\FieldworkInformationSeeker
     */
    public function setByPosition($pos, $value)
    {
        switch ($pos) {
            case 0:
                $this->setId($value);
                break;
            case 1:
                $this->setInformationSeekerName($value);
                break;
            case 2:
                $this->setInformationSeekerAffiliation($value);
                break;
            case 3:
                $this->setInformationSeekerWebsite($value);
                break;
            case 4:
                $this->setInformationSeekerEmail($value);
                break;
            case 5:
                $this->setInformationSeekerAffiliationWebsite($value);
                break;
            case 6:
                $this->setInformationSeekerReasons($value);
                break;
            case 7:
                $this->setInformationSeekerRequestedSpots($value);
                break;
            case 8:
                $this->setApproved($value);
                break;
            case 9:
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
        $keys = FieldworkInformationSeekerTableMap::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) {
            $this->setId($arr[$keys[0]]);
        }
        if (array_key_exists($keys[1], $arr)) {
            $this->setInformationSeekerName($arr[$keys[1]]);
        }
        if (array_key_exists($keys[2], $arr)) {
            $this->setInformationSeekerAffiliation($arr[$keys[2]]);
        }
        if (array_key_exists($keys[3], $arr)) {
            $this->setInformationSeekerWebsite($arr[$keys[3]]);
        }
        if (array_key_exists($keys[4], $arr)) {
            $this->setInformationSeekerEmail($arr[$keys[4]]);
        }
        if (array_key_exists($keys[5], $arr)) {
            $this->setInformationSeekerAffiliationWebsite($arr[$keys[5]]);
        }
        if (array_key_exists($keys[6], $arr)) {
            $this->setInformationSeekerReasons($arr[$keys[6]]);
        }
        if (array_key_exists($keys[7], $arr)) {
            $this->setInformationSeekerRequestedSpots($arr[$keys[7]]);
        }
        if (array_key_exists($keys[8], $arr)) {
            $this->setApproved($arr[$keys[8]]);
        }
        if (array_key_exists($keys[9], $arr)) {
            $this->setTimestamp($arr[$keys[9]]);
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
     * @return $this|\CryoConnectDB\FieldworkInformationSeeker The current object, for fluid interface
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
        $criteria = new Criteria(FieldworkInformationSeekerTableMap::DATABASE_NAME);

        if ($this->isColumnModified(FieldworkInformationSeekerTableMap::COL_ID)) {
            $criteria->add(FieldworkInformationSeekerTableMap::COL_ID, $this->id);
        }
        if ($this->isColumnModified(FieldworkInformationSeekerTableMap::COL_INFORMATION_SEEKER_NAME)) {
            $criteria->add(FieldworkInformationSeekerTableMap::COL_INFORMATION_SEEKER_NAME, $this->information_seeker_name);
        }
        if ($this->isColumnModified(FieldworkInformationSeekerTableMap::COL_INFORMATION_SEEKER_AFFILIATION)) {
            $criteria->add(FieldworkInformationSeekerTableMap::COL_INFORMATION_SEEKER_AFFILIATION, $this->information_seeker_affiliation);
        }
        if ($this->isColumnModified(FieldworkInformationSeekerTableMap::COL_INFORMATION_SEEKER_WEBSITE)) {
            $criteria->add(FieldworkInformationSeekerTableMap::COL_INFORMATION_SEEKER_WEBSITE, $this->information_seeker_website);
        }
        if ($this->isColumnModified(FieldworkInformationSeekerTableMap::COL_INFORMATION_SEEKER_EMAIL)) {
            $criteria->add(FieldworkInformationSeekerTableMap::COL_INFORMATION_SEEKER_EMAIL, $this->information_seeker_email);
        }
        if ($this->isColumnModified(FieldworkInformationSeekerTableMap::COL_INFORMATION_SEEKER_AFFILIATION_WEBSITE)) {
            $criteria->add(FieldworkInformationSeekerTableMap::COL_INFORMATION_SEEKER_AFFILIATION_WEBSITE, $this->information_seeker_affiliation_website);
        }
        if ($this->isColumnModified(FieldworkInformationSeekerTableMap::COL_INFORMATION_SEEKER_REASONS)) {
            $criteria->add(FieldworkInformationSeekerTableMap::COL_INFORMATION_SEEKER_REASONS, $this->information_seeker_reasons);
        }
        if ($this->isColumnModified(FieldworkInformationSeekerTableMap::COL_INFORMATION_SEEKER_REQUESTED_SPOTS)) {
            $criteria->add(FieldworkInformationSeekerTableMap::COL_INFORMATION_SEEKER_REQUESTED_SPOTS, $this->information_seeker_requested_spots);
        }
        if ($this->isColumnModified(FieldworkInformationSeekerTableMap::COL_APPROVED)) {
            $criteria->add(FieldworkInformationSeekerTableMap::COL_APPROVED, $this->approved);
        }
        if ($this->isColumnModified(FieldworkInformationSeekerTableMap::COL_TIMESTAMP)) {
            $criteria->add(FieldworkInformationSeekerTableMap::COL_TIMESTAMP, $this->timestamp);
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
        $criteria = ChildFieldworkInformationSeekerQuery::create();
        $criteria->add(FieldworkInformationSeekerTableMap::COL_ID, $this->id);

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
     * @param      object $copyObj An object of \CryoConnectDB\FieldworkInformationSeeker (or compatible) type.
     * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param      boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setInformationSeekerName($this->getInformationSeekerName());
        $copyObj->setInformationSeekerAffiliation($this->getInformationSeekerAffiliation());
        $copyObj->setInformationSeekerWebsite($this->getInformationSeekerWebsite());
        $copyObj->setInformationSeekerEmail($this->getInformationSeekerEmail());
        $copyObj->setInformationSeekerAffiliationWebsite($this->getInformationSeekerAffiliationWebsite());
        $copyObj->setInformationSeekerReasons($this->getInformationSeekerReasons());
        $copyObj->setInformationSeekerRequestedSpots($this->getInformationSeekerRequestedSpots());
        $copyObj->setApproved($this->getApproved());
        $copyObj->setTimestamp($this->getTimestamp());

        if ($deepCopy) {
            // important: temporarily setNew(false) because this affects the behavior of
            // the getter/setter methods for fkey referrer objects.
            $copyObj->setNew(false);

            foreach ($this->getFieldworkInformationSeekerRequests() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addFieldworkInformationSeekerRequest($relObj->copy($deepCopy));
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
     * @return \CryoConnectDB\FieldworkInformationSeeker Clone of current object.
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
        if ('FieldworkInformationSeekerRequest' == $relationName) {
            $this->initFieldworkInformationSeekerRequests();
            return;
        }
    }

    /**
     * Clears out the collFieldworkInformationSeekerRequests collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addFieldworkInformationSeekerRequests()
     */
    public function clearFieldworkInformationSeekerRequests()
    {
        $this->collFieldworkInformationSeekerRequests = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Reset is the collFieldworkInformationSeekerRequests collection loaded partially.
     */
    public function resetPartialFieldworkInformationSeekerRequests($v = true)
    {
        $this->collFieldworkInformationSeekerRequestsPartial = $v;
    }

    /**
     * Initializes the collFieldworkInformationSeekerRequests collection.
     *
     * By default this just sets the collFieldworkInformationSeekerRequests collection to an empty array (like clearcollFieldworkInformationSeekerRequests());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param      boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initFieldworkInformationSeekerRequests($overrideExisting = true)
    {
        if (null !== $this->collFieldworkInformationSeekerRequests && !$overrideExisting) {
            return;
        }

        $collectionClassName = FieldworkInformationSeekerRequestTableMap::getTableMap()->getCollectionClassName();

        $this->collFieldworkInformationSeekerRequests = new $collectionClassName;
        $this->collFieldworkInformationSeekerRequests->setModel('\CryoConnectDB\FieldworkInformationSeekerRequest');
    }

    /**
     * Gets an array of ChildFieldworkInformationSeekerRequest objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ChildFieldworkInformationSeeker is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @return ObjectCollection|ChildFieldworkInformationSeekerRequest[] List of ChildFieldworkInformationSeekerRequest objects
     * @throws PropelException
     */
    public function getFieldworkInformationSeekerRequests(Criteria $criteria = null, ConnectionInterface $con = null)
    {
        $partial = $this->collFieldworkInformationSeekerRequestsPartial && !$this->isNew();
        if (null === $this->collFieldworkInformationSeekerRequests || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collFieldworkInformationSeekerRequests) {
                // return empty collection
                $this->initFieldworkInformationSeekerRequests();
            } else {
                $collFieldworkInformationSeekerRequests = ChildFieldworkInformationSeekerRequestQuery::create(null, $criteria)
                    ->filterByFieldworkInformationSeeker($this)
                    ->find($con);

                if (null !== $criteria) {
                    if (false !== $this->collFieldworkInformationSeekerRequestsPartial && count($collFieldworkInformationSeekerRequests)) {
                        $this->initFieldworkInformationSeekerRequests(false);

                        foreach ($collFieldworkInformationSeekerRequests as $obj) {
                            if (false == $this->collFieldworkInformationSeekerRequests->contains($obj)) {
                                $this->collFieldworkInformationSeekerRequests->append($obj);
                            }
                        }

                        $this->collFieldworkInformationSeekerRequestsPartial = true;
                    }

                    return $collFieldworkInformationSeekerRequests;
                }

                if ($partial && $this->collFieldworkInformationSeekerRequests) {
                    foreach ($this->collFieldworkInformationSeekerRequests as $obj) {
                        if ($obj->isNew()) {
                            $collFieldworkInformationSeekerRequests[] = $obj;
                        }
                    }
                }

                $this->collFieldworkInformationSeekerRequests = $collFieldworkInformationSeekerRequests;
                $this->collFieldworkInformationSeekerRequestsPartial = false;
            }
        }

        return $this->collFieldworkInformationSeekerRequests;
    }

    /**
     * Sets a collection of ChildFieldworkInformationSeekerRequest objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      Collection $fieldworkInformationSeekerRequests A Propel collection.
     * @param      ConnectionInterface $con Optional connection object
     * @return $this|ChildFieldworkInformationSeeker The current object (for fluent API support)
     */
    public function setFieldworkInformationSeekerRequests(Collection $fieldworkInformationSeekerRequests, ConnectionInterface $con = null)
    {
        /** @var ChildFieldworkInformationSeekerRequest[] $fieldworkInformationSeekerRequestsToDelete */
        $fieldworkInformationSeekerRequestsToDelete = $this->getFieldworkInformationSeekerRequests(new Criteria(), $con)->diff($fieldworkInformationSeekerRequests);


        //since at least one column in the foreign key is at the same time a PK
        //we can not just set a PK to NULL in the lines below. We have to store
        //a backup of all values, so we are able to manipulate these items based on the onDelete value later.
        $this->fieldworkInformationSeekerRequestsScheduledForDeletion = clone $fieldworkInformationSeekerRequestsToDelete;

        foreach ($fieldworkInformationSeekerRequestsToDelete as $fieldworkInformationSeekerRequestRemoved) {
            $fieldworkInformationSeekerRequestRemoved->setFieldworkInformationSeeker(null);
        }

        $this->collFieldworkInformationSeekerRequests = null;
        foreach ($fieldworkInformationSeekerRequests as $fieldworkInformationSeekerRequest) {
            $this->addFieldworkInformationSeekerRequest($fieldworkInformationSeekerRequest);
        }

        $this->collFieldworkInformationSeekerRequests = $fieldworkInformationSeekerRequests;
        $this->collFieldworkInformationSeekerRequestsPartial = false;

        return $this;
    }

    /**
     * Returns the number of related FieldworkInformationSeekerRequest objects.
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct
     * @param      ConnectionInterface $con
     * @return int             Count of related FieldworkInformationSeekerRequest objects.
     * @throws PropelException
     */
    public function countFieldworkInformationSeekerRequests(Criteria $criteria = null, $distinct = false, ConnectionInterface $con = null)
    {
        $partial = $this->collFieldworkInformationSeekerRequestsPartial && !$this->isNew();
        if (null === $this->collFieldworkInformationSeekerRequests || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collFieldworkInformationSeekerRequests) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getFieldworkInformationSeekerRequests());
            }

            $query = ChildFieldworkInformationSeekerRequestQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByFieldworkInformationSeeker($this)
                ->count($con);
        }

        return count($this->collFieldworkInformationSeekerRequests);
    }

    /**
     * Method called to associate a ChildFieldworkInformationSeekerRequest object to this object
     * through the ChildFieldworkInformationSeekerRequest foreign key attribute.
     *
     * @param  ChildFieldworkInformationSeekerRequest $l ChildFieldworkInformationSeekerRequest
     * @return $this|\CryoConnectDB\FieldworkInformationSeeker The current object (for fluent API support)
     */
    public function addFieldworkInformationSeekerRequest(ChildFieldworkInformationSeekerRequest $l)
    {
        if ($this->collFieldworkInformationSeekerRequests === null) {
            $this->initFieldworkInformationSeekerRequests();
            $this->collFieldworkInformationSeekerRequestsPartial = true;
        }

        if (!$this->collFieldworkInformationSeekerRequests->contains($l)) {
            $this->doAddFieldworkInformationSeekerRequest($l);

            if ($this->fieldworkInformationSeekerRequestsScheduledForDeletion and $this->fieldworkInformationSeekerRequestsScheduledForDeletion->contains($l)) {
                $this->fieldworkInformationSeekerRequestsScheduledForDeletion->remove($this->fieldworkInformationSeekerRequestsScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param ChildFieldworkInformationSeekerRequest $fieldworkInformationSeekerRequest The ChildFieldworkInformationSeekerRequest object to add.
     */
    protected function doAddFieldworkInformationSeekerRequest(ChildFieldworkInformationSeekerRequest $fieldworkInformationSeekerRequest)
    {
        $this->collFieldworkInformationSeekerRequests[]= $fieldworkInformationSeekerRequest;
        $fieldworkInformationSeekerRequest->setFieldworkInformationSeeker($this);
    }

    /**
     * @param  ChildFieldworkInformationSeekerRequest $fieldworkInformationSeekerRequest The ChildFieldworkInformationSeekerRequest object to remove.
     * @return $this|ChildFieldworkInformationSeeker The current object (for fluent API support)
     */
    public function removeFieldworkInformationSeekerRequest(ChildFieldworkInformationSeekerRequest $fieldworkInformationSeekerRequest)
    {
        if ($this->getFieldworkInformationSeekerRequests()->contains($fieldworkInformationSeekerRequest)) {
            $pos = $this->collFieldworkInformationSeekerRequests->search($fieldworkInformationSeekerRequest);
            $this->collFieldworkInformationSeekerRequests->remove($pos);
            if (null === $this->fieldworkInformationSeekerRequestsScheduledForDeletion) {
                $this->fieldworkInformationSeekerRequestsScheduledForDeletion = clone $this->collFieldworkInformationSeekerRequests;
                $this->fieldworkInformationSeekerRequestsScheduledForDeletion->clear();
            }
            $this->fieldworkInformationSeekerRequestsScheduledForDeletion[]= clone $fieldworkInformationSeekerRequest;
            $fieldworkInformationSeekerRequest->setFieldworkInformationSeeker(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this FieldworkInformationSeeker is new, it will return
     * an empty collection; or if this FieldworkInformationSeeker has previously
     * been saved, it will retrieve related FieldworkInformationSeekerRequests from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in FieldworkInformationSeeker.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildFieldworkInformationSeekerRequest[] List of ChildFieldworkInformationSeekerRequest objects
     */
    public function getFieldworkInformationSeekerRequestsJoinFieldwork(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildFieldworkInformationSeekerRequestQuery::create(null, $criteria);
        $query->joinWith('Fieldwork', $joinBehavior);

        return $this->getFieldworkInformationSeekerRequests($query, $con);
    }

    /**
     * Clears out the collFieldworks collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addFieldworks()
     */
    public function clearFieldworks()
    {
        $this->collFieldworks = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Initializes the collFieldworks crossRef collection.
     *
     * By default this just sets the collFieldworks collection to an empty collection (like clearFieldworks());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @return void
     */
    public function initFieldworks()
    {
        $collectionClassName = FieldworkInformationSeekerRequestTableMap::getTableMap()->getCollectionClassName();

        $this->collFieldworks = new $collectionClassName;
        $this->collFieldworksPartial = true;
        $this->collFieldworks->setModel('\CryoConnectDB\Fieldwork');
    }

    /**
     * Checks if the collFieldworks collection is loaded.
     *
     * @return bool
     */
    public function isFieldworksLoaded()
    {
        return null !== $this->collFieldworks;
    }

    /**
     * Gets a collection of ChildFieldwork objects related by a many-to-many relationship
     * to the current object by way of the fieldwork_information_seeker_request cross-reference table.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ChildFieldworkInformationSeeker is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria Optional query object to filter the query
     * @param      ConnectionInterface $con Optional connection object
     *
     * @return ObjectCollection|ChildFieldwork[] List of ChildFieldwork objects
     */
    public function getFieldworks(Criteria $criteria = null, ConnectionInterface $con = null)
    {
        $partial = $this->collFieldworksPartial && !$this->isNew();
        if (null === $this->collFieldworks || null !== $criteria || $partial) {
            if ($this->isNew()) {
                // return empty collection
                if (null === $this->collFieldworks) {
                    $this->initFieldworks();
                }
            } else {

                $query = ChildFieldworkQuery::create(null, $criteria)
                    ->filterByFieldworkInformationSeeker($this);
                $collFieldworks = $query->find($con);
                if (null !== $criteria) {
                    return $collFieldworks;
                }

                if ($partial && $this->collFieldworks) {
                    //make sure that already added objects gets added to the list of the database.
                    foreach ($this->collFieldworks as $obj) {
                        if (!$collFieldworks->contains($obj)) {
                            $collFieldworks[] = $obj;
                        }
                    }
                }

                $this->collFieldworks = $collFieldworks;
                $this->collFieldworksPartial = false;
            }
        }

        return $this->collFieldworks;
    }

    /**
     * Sets a collection of Fieldwork objects related by a many-to-many relationship
     * to the current object by way of the fieldwork_information_seeker_request cross-reference table.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param  Collection $fieldworks A Propel collection.
     * @param  ConnectionInterface $con Optional connection object
     * @return $this|ChildFieldworkInformationSeeker The current object (for fluent API support)
     */
    public function setFieldworks(Collection $fieldworks, ConnectionInterface $con = null)
    {
        $this->clearFieldworks();
        $currentFieldworks = $this->getFieldworks();

        $fieldworksScheduledForDeletion = $currentFieldworks->diff($fieldworks);

        foreach ($fieldworksScheduledForDeletion as $toDelete) {
            $this->removeFieldwork($toDelete);
        }

        foreach ($fieldworks as $fieldwork) {
            if (!$currentFieldworks->contains($fieldwork)) {
                $this->doAddFieldwork($fieldwork);
            }
        }

        $this->collFieldworksPartial = false;
        $this->collFieldworks = $fieldworks;

        return $this;
    }

    /**
     * Gets the number of Fieldwork objects related by a many-to-many relationship
     * to the current object by way of the fieldwork_information_seeker_request cross-reference table.
     *
     * @param      Criteria $criteria Optional query object to filter the query
     * @param      boolean $distinct Set to true to force count distinct
     * @param      ConnectionInterface $con Optional connection object
     *
     * @return int the number of related Fieldwork objects
     */
    public function countFieldworks(Criteria $criteria = null, $distinct = false, ConnectionInterface $con = null)
    {
        $partial = $this->collFieldworksPartial && !$this->isNew();
        if (null === $this->collFieldworks || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collFieldworks) {
                return 0;
            } else {

                if ($partial && !$criteria) {
                    return count($this->getFieldworks());
                }

                $query = ChildFieldworkQuery::create(null, $criteria);
                if ($distinct) {
                    $query->distinct();
                }

                return $query
                    ->filterByFieldworkInformationSeeker($this)
                    ->count($con);
            }
        } else {
            return count($this->collFieldworks);
        }
    }

    /**
     * Associate a ChildFieldwork to this object
     * through the fieldwork_information_seeker_request cross reference table.
     *
     * @param ChildFieldwork $fieldwork
     * @return ChildFieldworkInformationSeeker The current object (for fluent API support)
     */
    public function addFieldwork(ChildFieldwork $fieldwork)
    {
        if ($this->collFieldworks === null) {
            $this->initFieldworks();
        }

        if (!$this->getFieldworks()->contains($fieldwork)) {
            // only add it if the **same** object is not already associated
            $this->collFieldworks->push($fieldwork);
            $this->doAddFieldwork($fieldwork);
        }

        return $this;
    }

    /**
     *
     * @param ChildFieldwork $fieldwork
     */
    protected function doAddFieldwork(ChildFieldwork $fieldwork)
    {
        $fieldworkInformationSeekerRequest = new ChildFieldworkInformationSeekerRequest();

        $fieldworkInformationSeekerRequest->setFieldwork($fieldwork);

        $fieldworkInformationSeekerRequest->setFieldworkInformationSeeker($this);

        $this->addFieldworkInformationSeekerRequest($fieldworkInformationSeekerRequest);

        // set the back reference to this object directly as using provided method either results
        // in endless loop or in multiple relations
        if (!$fieldwork->isFieldworkInformationSeekersLoaded()) {
            $fieldwork->initFieldworkInformationSeekers();
            $fieldwork->getFieldworkInformationSeekers()->push($this);
        } elseif (!$fieldwork->getFieldworkInformationSeekers()->contains($this)) {
            $fieldwork->getFieldworkInformationSeekers()->push($this);
        }

    }

    /**
     * Remove fieldwork of this object
     * through the fieldwork_information_seeker_request cross reference table.
     *
     * @param ChildFieldwork $fieldwork
     * @return ChildFieldworkInformationSeeker The current object (for fluent API support)
     */
    public function removeFieldwork(ChildFieldwork $fieldwork)
    {
        if ($this->getFieldworks()->contains($fieldwork)) {
            $fieldworkInformationSeekerRequest = new ChildFieldworkInformationSeekerRequest();
            $fieldworkInformationSeekerRequest->setFieldwork($fieldwork);
            if ($fieldwork->isFieldworkInformationSeekersLoaded()) {
                //remove the back reference if available
                $fieldwork->getFieldworkInformationSeekers()->removeObject($this);
            }

            $fieldworkInformationSeekerRequest->setFieldworkInformationSeeker($this);
            $this->removeFieldworkInformationSeekerRequest(clone $fieldworkInformationSeekerRequest);
            $fieldworkInformationSeekerRequest->clear();

            $this->collFieldworks->remove($this->collFieldworks->search($fieldwork));

            if (null === $this->fieldworksScheduledForDeletion) {
                $this->fieldworksScheduledForDeletion = clone $this->collFieldworks;
                $this->fieldworksScheduledForDeletion->clear();
            }

            $this->fieldworksScheduledForDeletion->push($fieldwork);
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
        $this->information_seeker_name = null;
        $this->information_seeker_affiliation = null;
        $this->information_seeker_website = null;
        $this->information_seeker_email = null;
        $this->information_seeker_affiliation_website = null;
        $this->information_seeker_reasons = null;
        $this->information_seeker_requested_spots = null;
        $this->approved = null;
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
            if ($this->collFieldworkInformationSeekerRequests) {
                foreach ($this->collFieldworkInformationSeekerRequests as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collFieldworks) {
                foreach ($this->collFieldworks as $o) {
                    $o->clearAllReferences($deep);
                }
            }
        } // if ($deep)

        $this->collFieldworkInformationSeekerRequests = null;
        $this->collFieldworks = null;
    }

    /**
     * Return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(FieldworkInformationSeekerTableMap::DEFAULT_STRING_FORMAT);
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
