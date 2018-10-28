<?php

namespace CryoConnectDB\Base;

use \DateTime;
use \Exception;
use \PDO;
use CryoConnectDB\Countries as ChildCountries;
use CryoConnectDB\CountriesQuery as ChildCountriesQuery;
use CryoConnectDB\CryosphereExpertMethods as ChildCryosphereExpertMethods;
use CryoConnectDB\CryosphereExpertMethodsQuery as ChildCryosphereExpertMethodsQuery;
use CryoConnectDB\ExpertAffiliation as ChildExpertAffiliation;
use CryoConnectDB\ExpertAffiliationQuery as ChildExpertAffiliationQuery;
use CryoConnectDB\ExpertCareerStage as ChildExpertCareerStage;
use CryoConnectDB\ExpertCareerStageQuery as ChildExpertCareerStageQuery;
use CryoConnectDB\ExpertContact as ChildExpertContact;
use CryoConnectDB\ExpertContactQuery as ChildExpertContactQuery;
use CryoConnectDB\ExpertCryosphereWhat as ChildExpertCryosphereWhat;
use CryoConnectDB\ExpertCryosphereWhatQuery as ChildExpertCryosphereWhatQuery;
use CryoConnectDB\ExpertCryosphereWhatSpecefic as ChildExpertCryosphereWhatSpecefic;
use CryoConnectDB\ExpertCryosphereWhatSpeceficQuery as ChildExpertCryosphereWhatSpeceficQuery;
use CryoConnectDB\ExpertFieldWork as ChildExpertFieldWork;
use CryoConnectDB\ExpertFieldWorkQuery as ChildExpertFieldWorkQuery;
use CryoConnectDB\ExpertLanguages as ChildExpertLanguages;
use CryoConnectDB\ExpertLanguagesQuery as ChildExpertLanguagesQuery;
use CryoConnectDB\ExpertWhen as ChildExpertWhen;
use CryoConnectDB\ExpertWhenQuery as ChildExpertWhenQuery;
use CryoConnectDB\ExpertWhere as ChildExpertWhere;
use CryoConnectDB\ExpertWhereQuery as ChildExpertWhereQuery;
use CryoConnectDB\Experts as ChildExperts;
use CryoConnectDB\ExpertsQuery as ChildExpertsQuery;
use CryoConnectDB\Map\CryosphereExpertMethodsTableMap;
use CryoConnectDB\Map\ExpertAffiliationTableMap;
use CryoConnectDB\Map\ExpertCareerStageTableMap;
use CryoConnectDB\Map\ExpertContactTableMap;
use CryoConnectDB\Map\ExpertCryosphereWhatSpeceficTableMap;
use CryoConnectDB\Map\ExpertCryosphereWhatTableMap;
use CryoConnectDB\Map\ExpertFieldWorkTableMap;
use CryoConnectDB\Map\ExpertLanguagesTableMap;
use CryoConnectDB\Map\ExpertWhenTableMap;
use CryoConnectDB\Map\ExpertWhereTableMap;
use CryoConnectDB\Map\ExpertsTableMap;
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
 * Base class that represents a row from the 'experts' table.
 *
 *
 *
 * @package    propel.generator.CryoConnectDB.Base
 */
abstract class Experts implements ActiveRecordInterface
{
    /**
     * TableMap class name
     */
    const TABLE_MAP = '\\CryoConnectDB\\Map\\ExpertsTableMap';


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
     * The value for the birth_year field.
     *
     * @var        int
     */
    protected $birth_year;

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
     * @var        ObjectCollection|ChildCryosphereExpertMethods[] Collection to store aggregation of ChildCryosphereExpertMethods objects.
     */
    protected $collCryosphereExpertMethodss;
    protected $collCryosphereExpertMethodssPartial;

    /**
     * @var        ObjectCollection|ChildExpertAffiliation[] Collection to store aggregation of ChildExpertAffiliation objects.
     */
    protected $collExpertAffiliations;
    protected $collExpertAffiliationsPartial;

    /**
     * @var        ObjectCollection|ChildExpertCareerStage[] Collection to store aggregation of ChildExpertCareerStage objects.
     */
    protected $collExpertCareerStages;
    protected $collExpertCareerStagesPartial;

    /**
     * @var        ObjectCollection|ChildExpertContact[] Collection to store aggregation of ChildExpertContact objects.
     */
    protected $collExpertContacts;
    protected $collExpertContactsPartial;

    /**
     * @var        ObjectCollection|ChildExpertCryosphereWhat[] Collection to store aggregation of ChildExpertCryosphereWhat objects.
     */
    protected $collExpertCryosphereWhats;
    protected $collExpertCryosphereWhatsPartial;

    /**
     * @var        ObjectCollection|ChildExpertCryosphereWhatSpecefic[] Collection to store aggregation of ChildExpertCryosphereWhatSpecefic objects.
     */
    protected $collExpertCryosphereWhatSpecefics;
    protected $collExpertCryosphereWhatSpeceficsPartial;

    /**
     * @var        ObjectCollection|ChildExpertFieldWork[] Collection to store aggregation of ChildExpertFieldWork objects.
     */
    protected $collExpertFieldWorks;
    protected $collExpertFieldWorksPartial;

    /**
     * @var        ObjectCollection|ChildExpertLanguages[] Collection to store aggregation of ChildExpertLanguages objects.
     */
    protected $collExpertLanguagess;
    protected $collExpertLanguagessPartial;

    /**
     * @var        ObjectCollection|ChildExpertWhen[] Collection to store aggregation of ChildExpertWhen objects.
     */
    protected $collExpertWhens;
    protected $collExpertWhensPartial;

    /**
     * @var        ObjectCollection|ChildExpertWhere[] Collection to store aggregation of ChildExpertWhere objects.
     */
    protected $collExpertWheres;
    protected $collExpertWheresPartial;

    /**
     * Flag to prevent endless save loop, if this object is referenced
     * by another object which falls in this transaction.
     *
     * @var boolean
     */
    protected $alreadyInSave = false;

    /**
     * An array of objects scheduled for deletion.
     * @var ObjectCollection|ChildCryosphereExpertMethods[]
     */
    protected $cryosphereExpertMethodssScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var ObjectCollection|ChildExpertAffiliation[]
     */
    protected $expertAffiliationsScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var ObjectCollection|ChildExpertCareerStage[]
     */
    protected $expertCareerStagesScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var ObjectCollection|ChildExpertContact[]
     */
    protected $expertContactsScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var ObjectCollection|ChildExpertCryosphereWhat[]
     */
    protected $expertCryosphereWhatsScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var ObjectCollection|ChildExpertCryosphereWhatSpecefic[]
     */
    protected $expertCryosphereWhatSpeceficsScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var ObjectCollection|ChildExpertFieldWork[]
     */
    protected $expertFieldWorksScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var ObjectCollection|ChildExpertLanguages[]
     */
    protected $expertLanguagessScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var ObjectCollection|ChildExpertWhen[]
     */
    protected $expertWhensScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var ObjectCollection|ChildExpertWhere[]
     */
    protected $expertWheresScheduledForDeletion = null;

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
     * Initializes internal state of CryoConnectDB\Base\Experts object.
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
     * Compares this with another <code>Experts</code> instance.  If
     * <code>obj</code> is an instance of <code>Experts</code>, delegates to
     * <code>equals(Experts)</code>.  Otherwise, returns <code>false</code>.
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
     * @return $this|Experts The current object, for fluid interface
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
     * Get the [birth_year] column value.
     *
     * @return int
     */
    public function getBirthYear()
    {
        return $this->birth_year;
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
     * @return $this|\CryoConnectDB\Experts The current object (for fluent API support)
     */
    public function setId($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->id !== $v) {
            $this->id = $v;
            $this->modifiedColumns[ExpertsTableMap::COL_ID] = true;
        }

        return $this;
    } // setId()

    /**
     * Set the value of [first_name] column.
     *
     * @param string $v new value
     * @return $this|\CryoConnectDB\Experts The current object (for fluent API support)
     */
    public function setFirstName($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->first_name !== $v) {
            $this->first_name = $v;
            $this->modifiedColumns[ExpertsTableMap::COL_FIRST_NAME] = true;
        }

        return $this;
    } // setFirstName()

    /**
     * Set the value of [last_name] column.
     *
     * @param string $v new value
     * @return $this|\CryoConnectDB\Experts The current object (for fluent API support)
     */
    public function setLastName($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->last_name !== $v) {
            $this->last_name = $v;
            $this->modifiedColumns[ExpertsTableMap::COL_LAST_NAME] = true;
        }

        return $this;
    } // setLastName()

    /**
     * Set the value of [email] column.
     *
     * @param string $v new value
     * @return $this|\CryoConnectDB\Experts The current object (for fluent API support)
     */
    public function setEmail($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->email !== $v) {
            $this->email = $v;
            $this->modifiedColumns[ExpertsTableMap::COL_EMAIL] = true;
        }

        return $this;
    } // setEmail()

    /**
     * Set the value of [birth_year] column.
     *
     * @param int $v new value
     * @return $this|\CryoConnectDB\Experts The current object (for fluent API support)
     */
    public function setBirthYear($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->birth_year !== $v) {
            $this->birth_year = $v;
            $this->modifiedColumns[ExpertsTableMap::COL_BIRTH_YEAR] = true;
        }

        return $this;
    } // setBirthYear()

    /**
     * Set the value of [country_code] column.
     *
     * @param string $v new value
     * @return $this|\CryoConnectDB\Experts The current object (for fluent API support)
     */
    public function setCountryCode($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->country_code !== $v) {
            $this->country_code = $v;
            $this->modifiedColumns[ExpertsTableMap::COL_COUNTRY_CODE] = true;
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
     * @return $this|\CryoConnectDB\Experts The current object (for fluent API support)
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
            $this->modifiedColumns[ExpertsTableMap::COL_APPROVED] = true;
        }

        return $this;
    } // setApproved()

    /**
     * Sets the value of [created_at] column to a normalized version of the date/time value specified.
     *
     * @param  mixed $v string, integer (timestamp), or \DateTimeInterface value.
     *               Empty strings are treated as NULL.
     * @return $this|\CryoConnectDB\Experts The current object (for fluent API support)
     */
    public function setCreatedAt($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->created_at !== null || $dt !== null) {
            if ($this->created_at === null || $dt === null || $dt->format("Y-m-d H:i:s.u") !== $this->created_at->format("Y-m-d H:i:s.u")) {
                $this->created_at = $dt === null ? null : clone $dt;
                $this->modifiedColumns[ExpertsTableMap::COL_CREATED_AT] = true;
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

            $col = $row[TableMap::TYPE_NUM == $indexType ? 0 + $startcol : ExpertsTableMap::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)];
            $this->id = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 1 + $startcol : ExpertsTableMap::translateFieldName('FirstName', TableMap::TYPE_PHPNAME, $indexType)];
            $this->first_name = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 2 + $startcol : ExpertsTableMap::translateFieldName('LastName', TableMap::TYPE_PHPNAME, $indexType)];
            $this->last_name = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 3 + $startcol : ExpertsTableMap::translateFieldName('Email', TableMap::TYPE_PHPNAME, $indexType)];
            $this->email = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 4 + $startcol : ExpertsTableMap::translateFieldName('BirthYear', TableMap::TYPE_PHPNAME, $indexType)];
            $this->birth_year = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 5 + $startcol : ExpertsTableMap::translateFieldName('CountryCode', TableMap::TYPE_PHPNAME, $indexType)];
            $this->country_code = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 6 + $startcol : ExpertsTableMap::translateFieldName('Approved', TableMap::TYPE_PHPNAME, $indexType)];
            $this->approved = (null !== $col) ? (boolean) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 7 + $startcol : ExpertsTableMap::translateFieldName('CreatedAt', TableMap::TYPE_PHPNAME, $indexType)];
            if ($col === '0000-00-00 00:00:00') {
                $col = null;
            }
            $this->created_at = (null !== $col) ? PropelDateTime::newInstance($col, null, 'DateTime') : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }

            return $startcol + 8; // 8 = ExpertsTableMap::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException(sprintf('Error populating %s object', '\\CryoConnectDB\\Experts'), 0, $e);
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
            $con = Propel::getServiceContainer()->getReadConnection(ExpertsTableMap::DATABASE_NAME);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $dataFetcher = ChildExpertsQuery::create(null, $this->buildPkeyCriteria())->setFormatter(ModelCriteria::FORMAT_STATEMENT)->find($con);
        $row = $dataFetcher->fetch();
        $dataFetcher->close();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true, $dataFetcher->getIndexType()); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->aCountries = null;
            $this->collCryosphereExpertMethodss = null;

            $this->collExpertAffiliations = null;

            $this->collExpertCareerStages = null;

            $this->collExpertContacts = null;

            $this->collExpertCryosphereWhats = null;

            $this->collExpertCryosphereWhatSpecefics = null;

            $this->collExpertFieldWorks = null;

            $this->collExpertLanguagess = null;

            $this->collExpertWhens = null;

            $this->collExpertWheres = null;

        } // if (deep)
    }

    /**
     * Removes this object from datastore and sets delete attribute.
     *
     * @param      ConnectionInterface $con
     * @return void
     * @throws PropelException
     * @see Experts::setDeleted()
     * @see Experts::isDeleted()
     */
    public function delete(ConnectionInterface $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("This object has already been deleted.");
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getWriteConnection(ExpertsTableMap::DATABASE_NAME);
        }

        $con->transaction(function () use ($con) {
            $deleteQuery = ChildExpertsQuery::create()
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
            $con = Propel::getServiceContainer()->getWriteConnection(ExpertsTableMap::DATABASE_NAME);
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
                ExpertsTableMap::addInstanceToPool($this);
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

            if ($this->cryosphereExpertMethodssScheduledForDeletion !== null) {
                if (!$this->cryosphereExpertMethodssScheduledForDeletion->isEmpty()) {
                    \CryoConnectDB\CryosphereExpertMethodsQuery::create()
                        ->filterByPrimaryKeys($this->cryosphereExpertMethodssScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->cryosphereExpertMethodssScheduledForDeletion = null;
                }
            }

            if ($this->collCryosphereExpertMethodss !== null) {
                foreach ($this->collCryosphereExpertMethodss as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->expertAffiliationsScheduledForDeletion !== null) {
                if (!$this->expertAffiliationsScheduledForDeletion->isEmpty()) {
                    \CryoConnectDB\ExpertAffiliationQuery::create()
                        ->filterByPrimaryKeys($this->expertAffiliationsScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->expertAffiliationsScheduledForDeletion = null;
                }
            }

            if ($this->collExpertAffiliations !== null) {
                foreach ($this->collExpertAffiliations as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->expertCareerStagesScheduledForDeletion !== null) {
                if (!$this->expertCareerStagesScheduledForDeletion->isEmpty()) {
                    \CryoConnectDB\ExpertCareerStageQuery::create()
                        ->filterByPrimaryKeys($this->expertCareerStagesScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->expertCareerStagesScheduledForDeletion = null;
                }
            }

            if ($this->collExpertCareerStages !== null) {
                foreach ($this->collExpertCareerStages as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->expertContactsScheduledForDeletion !== null) {
                if (!$this->expertContactsScheduledForDeletion->isEmpty()) {
                    \CryoConnectDB\ExpertContactQuery::create()
                        ->filterByPrimaryKeys($this->expertContactsScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->expertContactsScheduledForDeletion = null;
                }
            }

            if ($this->collExpertContacts !== null) {
                foreach ($this->collExpertContacts as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->expertCryosphereWhatsScheduledForDeletion !== null) {
                if (!$this->expertCryosphereWhatsScheduledForDeletion->isEmpty()) {
                    \CryoConnectDB\ExpertCryosphereWhatQuery::create()
                        ->filterByPrimaryKeys($this->expertCryosphereWhatsScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->expertCryosphereWhatsScheduledForDeletion = null;
                }
            }

            if ($this->collExpertCryosphereWhats !== null) {
                foreach ($this->collExpertCryosphereWhats as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->expertCryosphereWhatSpeceficsScheduledForDeletion !== null) {
                if (!$this->expertCryosphereWhatSpeceficsScheduledForDeletion->isEmpty()) {
                    \CryoConnectDB\ExpertCryosphereWhatSpeceficQuery::create()
                        ->filterByPrimaryKeys($this->expertCryosphereWhatSpeceficsScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->expertCryosphereWhatSpeceficsScheduledForDeletion = null;
                }
            }

            if ($this->collExpertCryosphereWhatSpecefics !== null) {
                foreach ($this->collExpertCryosphereWhatSpecefics as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->expertFieldWorksScheduledForDeletion !== null) {
                if (!$this->expertFieldWorksScheduledForDeletion->isEmpty()) {
                    \CryoConnectDB\ExpertFieldWorkQuery::create()
                        ->filterByPrimaryKeys($this->expertFieldWorksScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->expertFieldWorksScheduledForDeletion = null;
                }
            }

            if ($this->collExpertFieldWorks !== null) {
                foreach ($this->collExpertFieldWorks as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->expertLanguagessScheduledForDeletion !== null) {
                if (!$this->expertLanguagessScheduledForDeletion->isEmpty()) {
                    \CryoConnectDB\ExpertLanguagesQuery::create()
                        ->filterByPrimaryKeys($this->expertLanguagessScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->expertLanguagessScheduledForDeletion = null;
                }
            }

            if ($this->collExpertLanguagess !== null) {
                foreach ($this->collExpertLanguagess as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->expertWhensScheduledForDeletion !== null) {
                if (!$this->expertWhensScheduledForDeletion->isEmpty()) {
                    \CryoConnectDB\ExpertWhenQuery::create()
                        ->filterByPrimaryKeys($this->expertWhensScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->expertWhensScheduledForDeletion = null;
                }
            }

            if ($this->collExpertWhens !== null) {
                foreach ($this->collExpertWhens as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->expertWheresScheduledForDeletion !== null) {
                if (!$this->expertWheresScheduledForDeletion->isEmpty()) {
                    \CryoConnectDB\ExpertWhereQuery::create()
                        ->filterByPrimaryKeys($this->expertWheresScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->expertWheresScheduledForDeletion = null;
                }
            }

            if ($this->collExpertWheres !== null) {
                foreach ($this->collExpertWheres as $referrerFK) {
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

        $this->modifiedColumns[ExpertsTableMap::COL_ID] = true;
        if (null !== $this->id) {
            throw new PropelException('Cannot insert a value for auto-increment primary key (' . ExpertsTableMap::COL_ID . ')');
        }

         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(ExpertsTableMap::COL_ID)) {
            $modifiedColumns[':p' . $index++]  = 'id';
        }
        if ($this->isColumnModified(ExpertsTableMap::COL_FIRST_NAME)) {
            $modifiedColumns[':p' . $index++]  = 'first_name';
        }
        if ($this->isColumnModified(ExpertsTableMap::COL_LAST_NAME)) {
            $modifiedColumns[':p' . $index++]  = 'last_name';
        }
        if ($this->isColumnModified(ExpertsTableMap::COL_EMAIL)) {
            $modifiedColumns[':p' . $index++]  = 'email';
        }
        if ($this->isColumnModified(ExpertsTableMap::COL_BIRTH_YEAR)) {
            $modifiedColumns[':p' . $index++]  = 'birth_year';
        }
        if ($this->isColumnModified(ExpertsTableMap::COL_COUNTRY_CODE)) {
            $modifiedColumns[':p' . $index++]  = 'country_code';
        }
        if ($this->isColumnModified(ExpertsTableMap::COL_APPROVED)) {
            $modifiedColumns[':p' . $index++]  = 'approved';
        }
        if ($this->isColumnModified(ExpertsTableMap::COL_CREATED_AT)) {
            $modifiedColumns[':p' . $index++]  = 'created_at';
        }

        $sql = sprintf(
            'INSERT INTO experts (%s) VALUES (%s)',
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
                    case 'birth_year':
                        $stmt->bindValue($identifier, $this->birth_year, PDO::PARAM_INT);
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
        $pos = ExpertsTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);
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
                return $this->getBirthYear();
                break;
            case 5:
                return $this->getCountryCode();
                break;
            case 6:
                return $this->getApproved();
                break;
            case 7:
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

        if (isset($alreadyDumpedObjects['Experts'][$this->hashCode()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['Experts'][$this->hashCode()] = true;
        $keys = ExpertsTableMap::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getId(),
            $keys[1] => $this->getFirstName(),
            $keys[2] => $this->getLastName(),
            $keys[3] => $this->getEmail(),
            $keys[4] => $this->getBirthYear(),
            $keys[5] => $this->getCountryCode(),
            $keys[6] => $this->getApproved(),
            $keys[7] => $this->getCreatedAt(),
        );
        if ($result[$keys[7]] instanceof \DateTimeInterface) {
            $result[$keys[7]] = $result[$keys[7]]->format('c');
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
            if (null !== $this->collCryosphereExpertMethodss) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'cryosphereExpertMethodss';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'cryosphere_expert_methodss';
                        break;
                    default:
                        $key = 'CryosphereExpertMethodss';
                }

                $result[$key] = $this->collCryosphereExpertMethodss->toArray(null, false, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collExpertAffiliations) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'expertAffiliations';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'expert_affiliations';
                        break;
                    default:
                        $key = 'ExpertAffiliations';
                }

                $result[$key] = $this->collExpertAffiliations->toArray(null, false, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collExpertCareerStages) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'expertCareerStages';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'expert_career_stages';
                        break;
                    default:
                        $key = 'ExpertCareerStages';
                }

                $result[$key] = $this->collExpertCareerStages->toArray(null, false, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collExpertContacts) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'expertContacts';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'expert_contacts';
                        break;
                    default:
                        $key = 'ExpertContacts';
                }

                $result[$key] = $this->collExpertContacts->toArray(null, false, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collExpertCryosphereWhats) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'expertCryosphereWhats';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'expert_cryosphere_whats';
                        break;
                    default:
                        $key = 'ExpertCryosphereWhats';
                }

                $result[$key] = $this->collExpertCryosphereWhats->toArray(null, false, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collExpertCryosphereWhatSpecefics) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'expertCryosphereWhatSpecefics';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'expert_cryosphere_what_specefics';
                        break;
                    default:
                        $key = 'ExpertCryosphereWhatSpecefics';
                }

                $result[$key] = $this->collExpertCryosphereWhatSpecefics->toArray(null, false, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collExpertFieldWorks) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'expertFieldWorks';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'expert_field_works';
                        break;
                    default:
                        $key = 'ExpertFieldWorks';
                }

                $result[$key] = $this->collExpertFieldWorks->toArray(null, false, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collExpertLanguagess) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'expertLanguagess';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'expert_languagess';
                        break;
                    default:
                        $key = 'ExpertLanguagess';
                }

                $result[$key] = $this->collExpertLanguagess->toArray(null, false, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collExpertWhens) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'expertWhens';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'expert_whens';
                        break;
                    default:
                        $key = 'ExpertWhens';
                }

                $result[$key] = $this->collExpertWhens->toArray(null, false, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collExpertWheres) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'expertWheres';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'expert_wheres';
                        break;
                    default:
                        $key = 'ExpertWheres';
                }

                $result[$key] = $this->collExpertWheres->toArray(null, false, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
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
     * @return $this|\CryoConnectDB\Experts
     */
    public function setByName($name, $value, $type = TableMap::TYPE_PHPNAME)
    {
        $pos = ExpertsTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);

        return $this->setByPosition($pos, $value);
    }

    /**
     * Sets a field from the object by Position as specified in the xml schema.
     * Zero-based.
     *
     * @param  int $pos position in xml schema
     * @param  mixed $value field value
     * @return $this|\CryoConnectDB\Experts
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
                $this->setBirthYear($value);
                break;
            case 5:
                $this->setCountryCode($value);
                break;
            case 6:
                $this->setApproved($value);
                break;
            case 7:
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
        $keys = ExpertsTableMap::getFieldNames($keyType);

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
            $this->setBirthYear($arr[$keys[4]]);
        }
        if (array_key_exists($keys[5], $arr)) {
            $this->setCountryCode($arr[$keys[5]]);
        }
        if (array_key_exists($keys[6], $arr)) {
            $this->setApproved($arr[$keys[6]]);
        }
        if (array_key_exists($keys[7], $arr)) {
            $this->setCreatedAt($arr[$keys[7]]);
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
     * @return $this|\CryoConnectDB\Experts The current object, for fluid interface
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
        $criteria = new Criteria(ExpertsTableMap::DATABASE_NAME);

        if ($this->isColumnModified(ExpertsTableMap::COL_ID)) {
            $criteria->add(ExpertsTableMap::COL_ID, $this->id);
        }
        if ($this->isColumnModified(ExpertsTableMap::COL_FIRST_NAME)) {
            $criteria->add(ExpertsTableMap::COL_FIRST_NAME, $this->first_name);
        }
        if ($this->isColumnModified(ExpertsTableMap::COL_LAST_NAME)) {
            $criteria->add(ExpertsTableMap::COL_LAST_NAME, $this->last_name);
        }
        if ($this->isColumnModified(ExpertsTableMap::COL_EMAIL)) {
            $criteria->add(ExpertsTableMap::COL_EMAIL, $this->email);
        }
        if ($this->isColumnModified(ExpertsTableMap::COL_BIRTH_YEAR)) {
            $criteria->add(ExpertsTableMap::COL_BIRTH_YEAR, $this->birth_year);
        }
        if ($this->isColumnModified(ExpertsTableMap::COL_COUNTRY_CODE)) {
            $criteria->add(ExpertsTableMap::COL_COUNTRY_CODE, $this->country_code);
        }
        if ($this->isColumnModified(ExpertsTableMap::COL_APPROVED)) {
            $criteria->add(ExpertsTableMap::COL_APPROVED, $this->approved);
        }
        if ($this->isColumnModified(ExpertsTableMap::COL_CREATED_AT)) {
            $criteria->add(ExpertsTableMap::COL_CREATED_AT, $this->created_at);
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
        $criteria = ChildExpertsQuery::create();
        $criteria->add(ExpertsTableMap::COL_ID, $this->id);

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
     * @param      object $copyObj An object of \CryoConnectDB\Experts (or compatible) type.
     * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param      boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setFirstName($this->getFirstName());
        $copyObj->setLastName($this->getLastName());
        $copyObj->setEmail($this->getEmail());
        $copyObj->setBirthYear($this->getBirthYear());
        $copyObj->setCountryCode($this->getCountryCode());
        $copyObj->setApproved($this->getApproved());
        $copyObj->setCreatedAt($this->getCreatedAt());

        if ($deepCopy) {
            // important: temporarily setNew(false) because this affects the behavior of
            // the getter/setter methods for fkey referrer objects.
            $copyObj->setNew(false);

            foreach ($this->getCryosphereExpertMethodss() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addCryosphereExpertMethods($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getExpertAffiliations() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addExpertAffiliation($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getExpertCareerStages() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addExpertCareerStage($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getExpertContacts() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addExpertContact($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getExpertCryosphereWhats() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addExpertCryosphereWhat($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getExpertCryosphereWhatSpecefics() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addExpertCryosphereWhatSpecefic($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getExpertFieldWorks() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addExpertFieldWork($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getExpertLanguagess() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addExpertLanguages($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getExpertWhens() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addExpertWhen($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getExpertWheres() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addExpertWhere($relObj->copy($deepCopy));
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
     * @return \CryoConnectDB\Experts Clone of current object.
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
     * @return $this|\CryoConnectDB\Experts The current object (for fluent API support)
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
            $v->addExperts($this);
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
                $this->aCountries->addExpertss($this);
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
        if ('CryosphereExpertMethods' == $relationName) {
            $this->initCryosphereExpertMethodss();
            return;
        }
        if ('ExpertAffiliation' == $relationName) {
            $this->initExpertAffiliations();
            return;
        }
        if ('ExpertCareerStage' == $relationName) {
            $this->initExpertCareerStages();
            return;
        }
        if ('ExpertContact' == $relationName) {
            $this->initExpertContacts();
            return;
        }
        if ('ExpertCryosphereWhat' == $relationName) {
            $this->initExpertCryosphereWhats();
            return;
        }
        if ('ExpertCryosphereWhatSpecefic' == $relationName) {
            $this->initExpertCryosphereWhatSpecefics();
            return;
        }
        if ('ExpertFieldWork' == $relationName) {
            $this->initExpertFieldWorks();
            return;
        }
        if ('ExpertLanguages' == $relationName) {
            $this->initExpertLanguagess();
            return;
        }
        if ('ExpertWhen' == $relationName) {
            $this->initExpertWhens();
            return;
        }
        if ('ExpertWhere' == $relationName) {
            $this->initExpertWheres();
            return;
        }
    }

    /**
     * Clears out the collCryosphereExpertMethodss collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addCryosphereExpertMethodss()
     */
    public function clearCryosphereExpertMethodss()
    {
        $this->collCryosphereExpertMethodss = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Reset is the collCryosphereExpertMethodss collection loaded partially.
     */
    public function resetPartialCryosphereExpertMethodss($v = true)
    {
        $this->collCryosphereExpertMethodssPartial = $v;
    }

    /**
     * Initializes the collCryosphereExpertMethodss collection.
     *
     * By default this just sets the collCryosphereExpertMethodss collection to an empty array (like clearcollCryosphereExpertMethodss());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param      boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initCryosphereExpertMethodss($overrideExisting = true)
    {
        if (null !== $this->collCryosphereExpertMethodss && !$overrideExisting) {
            return;
        }

        $collectionClassName = CryosphereExpertMethodsTableMap::getTableMap()->getCollectionClassName();

        $this->collCryosphereExpertMethodss = new $collectionClassName;
        $this->collCryosphereExpertMethodss->setModel('\CryoConnectDB\CryosphereExpertMethods');
    }

    /**
     * Gets an array of ChildCryosphereExpertMethods objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ChildExperts is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @return ObjectCollection|ChildCryosphereExpertMethods[] List of ChildCryosphereExpertMethods objects
     * @throws PropelException
     */
    public function getCryosphereExpertMethodss(Criteria $criteria = null, ConnectionInterface $con = null)
    {
        $partial = $this->collCryosphereExpertMethodssPartial && !$this->isNew();
        if (null === $this->collCryosphereExpertMethodss || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collCryosphereExpertMethodss) {
                // return empty collection
                $this->initCryosphereExpertMethodss();
            } else {
                $collCryosphereExpertMethodss = ChildCryosphereExpertMethodsQuery::create(null, $criteria)
                    ->filterByExperts($this)
                    ->find($con);

                if (null !== $criteria) {
                    if (false !== $this->collCryosphereExpertMethodssPartial && count($collCryosphereExpertMethodss)) {
                        $this->initCryosphereExpertMethodss(false);

                        foreach ($collCryosphereExpertMethodss as $obj) {
                            if (false == $this->collCryosphereExpertMethodss->contains($obj)) {
                                $this->collCryosphereExpertMethodss->append($obj);
                            }
                        }

                        $this->collCryosphereExpertMethodssPartial = true;
                    }

                    return $collCryosphereExpertMethodss;
                }

                if ($partial && $this->collCryosphereExpertMethodss) {
                    foreach ($this->collCryosphereExpertMethodss as $obj) {
                        if ($obj->isNew()) {
                            $collCryosphereExpertMethodss[] = $obj;
                        }
                    }
                }

                $this->collCryosphereExpertMethodss = $collCryosphereExpertMethodss;
                $this->collCryosphereExpertMethodssPartial = false;
            }
        }

        return $this->collCryosphereExpertMethodss;
    }

    /**
     * Sets a collection of ChildCryosphereExpertMethods objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      Collection $cryosphereExpertMethodss A Propel collection.
     * @param      ConnectionInterface $con Optional connection object
     * @return $this|ChildExperts The current object (for fluent API support)
     */
    public function setCryosphereExpertMethodss(Collection $cryosphereExpertMethodss, ConnectionInterface $con = null)
    {
        /** @var ChildCryosphereExpertMethods[] $cryosphereExpertMethodssToDelete */
        $cryosphereExpertMethodssToDelete = $this->getCryosphereExpertMethodss(new Criteria(), $con)->diff($cryosphereExpertMethodss);


        $this->cryosphereExpertMethodssScheduledForDeletion = $cryosphereExpertMethodssToDelete;

        foreach ($cryosphereExpertMethodssToDelete as $cryosphereExpertMethodsRemoved) {
            $cryosphereExpertMethodsRemoved->setExperts(null);
        }

        $this->collCryosphereExpertMethodss = null;
        foreach ($cryosphereExpertMethodss as $cryosphereExpertMethods) {
            $this->addCryosphereExpertMethods($cryosphereExpertMethods);
        }

        $this->collCryosphereExpertMethodss = $cryosphereExpertMethodss;
        $this->collCryosphereExpertMethodssPartial = false;

        return $this;
    }

    /**
     * Returns the number of related CryosphereExpertMethods objects.
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct
     * @param      ConnectionInterface $con
     * @return int             Count of related CryosphereExpertMethods objects.
     * @throws PropelException
     */
    public function countCryosphereExpertMethodss(Criteria $criteria = null, $distinct = false, ConnectionInterface $con = null)
    {
        $partial = $this->collCryosphereExpertMethodssPartial && !$this->isNew();
        if (null === $this->collCryosphereExpertMethodss || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collCryosphereExpertMethodss) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getCryosphereExpertMethodss());
            }

            $query = ChildCryosphereExpertMethodsQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByExperts($this)
                ->count($con);
        }

        return count($this->collCryosphereExpertMethodss);
    }

    /**
     * Method called to associate a ChildCryosphereExpertMethods object to this object
     * through the ChildCryosphereExpertMethods foreign key attribute.
     *
     * @param  ChildCryosphereExpertMethods $l ChildCryosphereExpertMethods
     * @return $this|\CryoConnectDB\Experts The current object (for fluent API support)
     */
    public function addCryosphereExpertMethods(ChildCryosphereExpertMethods $l)
    {
        if ($this->collCryosphereExpertMethodss === null) {
            $this->initCryosphereExpertMethodss();
            $this->collCryosphereExpertMethodssPartial = true;
        }

        if (!$this->collCryosphereExpertMethodss->contains($l)) {
            $this->doAddCryosphereExpertMethods($l);

            if ($this->cryosphereExpertMethodssScheduledForDeletion and $this->cryosphereExpertMethodssScheduledForDeletion->contains($l)) {
                $this->cryosphereExpertMethodssScheduledForDeletion->remove($this->cryosphereExpertMethodssScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param ChildCryosphereExpertMethods $cryosphereExpertMethods The ChildCryosphereExpertMethods object to add.
     */
    protected function doAddCryosphereExpertMethods(ChildCryosphereExpertMethods $cryosphereExpertMethods)
    {
        $this->collCryosphereExpertMethodss[]= $cryosphereExpertMethods;
        $cryosphereExpertMethods->setExperts($this);
    }

    /**
     * @param  ChildCryosphereExpertMethods $cryosphereExpertMethods The ChildCryosphereExpertMethods object to remove.
     * @return $this|ChildExperts The current object (for fluent API support)
     */
    public function removeCryosphereExpertMethods(ChildCryosphereExpertMethods $cryosphereExpertMethods)
    {
        if ($this->getCryosphereExpertMethodss()->contains($cryosphereExpertMethods)) {
            $pos = $this->collCryosphereExpertMethodss->search($cryosphereExpertMethods);
            $this->collCryosphereExpertMethodss->remove($pos);
            if (null === $this->cryosphereExpertMethodssScheduledForDeletion) {
                $this->cryosphereExpertMethodssScheduledForDeletion = clone $this->collCryosphereExpertMethodss;
                $this->cryosphereExpertMethodssScheduledForDeletion->clear();
            }
            $this->cryosphereExpertMethodssScheduledForDeletion[]= clone $cryosphereExpertMethods;
            $cryosphereExpertMethods->setExperts(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Experts is new, it will return
     * an empty collection; or if this Experts has previously
     * been saved, it will retrieve related CryosphereExpertMethodss from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Experts.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildCryosphereExpertMethods[] List of ChildCryosphereExpertMethods objects
     */
    public function getCryosphereExpertMethodssJoinCryosphereMethods(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildCryosphereExpertMethodsQuery::create(null, $criteria);
        $query->joinWith('CryosphereMethods', $joinBehavior);

        return $this->getCryosphereExpertMethodss($query, $con);
    }

    /**
     * Clears out the collExpertAffiliations collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addExpertAffiliations()
     */
    public function clearExpertAffiliations()
    {
        $this->collExpertAffiliations = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Reset is the collExpertAffiliations collection loaded partially.
     */
    public function resetPartialExpertAffiliations($v = true)
    {
        $this->collExpertAffiliationsPartial = $v;
    }

    /**
     * Initializes the collExpertAffiliations collection.
     *
     * By default this just sets the collExpertAffiliations collection to an empty array (like clearcollExpertAffiliations());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param      boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initExpertAffiliations($overrideExisting = true)
    {
        if (null !== $this->collExpertAffiliations && !$overrideExisting) {
            return;
        }

        $collectionClassName = ExpertAffiliationTableMap::getTableMap()->getCollectionClassName();

        $this->collExpertAffiliations = new $collectionClassName;
        $this->collExpertAffiliations->setModel('\CryoConnectDB\ExpertAffiliation');
    }

    /**
     * Gets an array of ChildExpertAffiliation objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ChildExperts is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @return ObjectCollection|ChildExpertAffiliation[] List of ChildExpertAffiliation objects
     * @throws PropelException
     */
    public function getExpertAffiliations(Criteria $criteria = null, ConnectionInterface $con = null)
    {
        $partial = $this->collExpertAffiliationsPartial && !$this->isNew();
        if (null === $this->collExpertAffiliations || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collExpertAffiliations) {
                // return empty collection
                $this->initExpertAffiliations();
            } else {
                $collExpertAffiliations = ChildExpertAffiliationQuery::create(null, $criteria)
                    ->filterByExperts($this)
                    ->find($con);

                if (null !== $criteria) {
                    if (false !== $this->collExpertAffiliationsPartial && count($collExpertAffiliations)) {
                        $this->initExpertAffiliations(false);

                        foreach ($collExpertAffiliations as $obj) {
                            if (false == $this->collExpertAffiliations->contains($obj)) {
                                $this->collExpertAffiliations->append($obj);
                            }
                        }

                        $this->collExpertAffiliationsPartial = true;
                    }

                    return $collExpertAffiliations;
                }

                if ($partial && $this->collExpertAffiliations) {
                    foreach ($this->collExpertAffiliations as $obj) {
                        if ($obj->isNew()) {
                            $collExpertAffiliations[] = $obj;
                        }
                    }
                }

                $this->collExpertAffiliations = $collExpertAffiliations;
                $this->collExpertAffiliationsPartial = false;
            }
        }

        return $this->collExpertAffiliations;
    }

    /**
     * Sets a collection of ChildExpertAffiliation objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      Collection $expertAffiliations A Propel collection.
     * @param      ConnectionInterface $con Optional connection object
     * @return $this|ChildExperts The current object (for fluent API support)
     */
    public function setExpertAffiliations(Collection $expertAffiliations, ConnectionInterface $con = null)
    {
        /** @var ChildExpertAffiliation[] $expertAffiliationsToDelete */
        $expertAffiliationsToDelete = $this->getExpertAffiliations(new Criteria(), $con)->diff($expertAffiliations);


        $this->expertAffiliationsScheduledForDeletion = $expertAffiliationsToDelete;

        foreach ($expertAffiliationsToDelete as $expertAffiliationRemoved) {
            $expertAffiliationRemoved->setExperts(null);
        }

        $this->collExpertAffiliations = null;
        foreach ($expertAffiliations as $expertAffiliation) {
            $this->addExpertAffiliation($expertAffiliation);
        }

        $this->collExpertAffiliations = $expertAffiliations;
        $this->collExpertAffiliationsPartial = false;

        return $this;
    }

    /**
     * Returns the number of related ExpertAffiliation objects.
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct
     * @param      ConnectionInterface $con
     * @return int             Count of related ExpertAffiliation objects.
     * @throws PropelException
     */
    public function countExpertAffiliations(Criteria $criteria = null, $distinct = false, ConnectionInterface $con = null)
    {
        $partial = $this->collExpertAffiliationsPartial && !$this->isNew();
        if (null === $this->collExpertAffiliations || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collExpertAffiliations) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getExpertAffiliations());
            }

            $query = ChildExpertAffiliationQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByExperts($this)
                ->count($con);
        }

        return count($this->collExpertAffiliations);
    }

    /**
     * Method called to associate a ChildExpertAffiliation object to this object
     * through the ChildExpertAffiliation foreign key attribute.
     *
     * @param  ChildExpertAffiliation $l ChildExpertAffiliation
     * @return $this|\CryoConnectDB\Experts The current object (for fluent API support)
     */
    public function addExpertAffiliation(ChildExpertAffiliation $l)
    {
        if ($this->collExpertAffiliations === null) {
            $this->initExpertAffiliations();
            $this->collExpertAffiliationsPartial = true;
        }

        if (!$this->collExpertAffiliations->contains($l)) {
            $this->doAddExpertAffiliation($l);

            if ($this->expertAffiliationsScheduledForDeletion and $this->expertAffiliationsScheduledForDeletion->contains($l)) {
                $this->expertAffiliationsScheduledForDeletion->remove($this->expertAffiliationsScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param ChildExpertAffiliation $expertAffiliation The ChildExpertAffiliation object to add.
     */
    protected function doAddExpertAffiliation(ChildExpertAffiliation $expertAffiliation)
    {
        $this->collExpertAffiliations[]= $expertAffiliation;
        $expertAffiliation->setExperts($this);
    }

    /**
     * @param  ChildExpertAffiliation $expertAffiliation The ChildExpertAffiliation object to remove.
     * @return $this|ChildExperts The current object (for fluent API support)
     */
    public function removeExpertAffiliation(ChildExpertAffiliation $expertAffiliation)
    {
        if ($this->getExpertAffiliations()->contains($expertAffiliation)) {
            $pos = $this->collExpertAffiliations->search($expertAffiliation);
            $this->collExpertAffiliations->remove($pos);
            if (null === $this->expertAffiliationsScheduledForDeletion) {
                $this->expertAffiliationsScheduledForDeletion = clone $this->collExpertAffiliations;
                $this->expertAffiliationsScheduledForDeletion->clear();
            }
            $this->expertAffiliationsScheduledForDeletion[]= clone $expertAffiliation;
            $expertAffiliation->setExperts(null);
        }

        return $this;
    }

    /**
     * Clears out the collExpertCareerStages collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addExpertCareerStages()
     */
    public function clearExpertCareerStages()
    {
        $this->collExpertCareerStages = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Reset is the collExpertCareerStages collection loaded partially.
     */
    public function resetPartialExpertCareerStages($v = true)
    {
        $this->collExpertCareerStagesPartial = $v;
    }

    /**
     * Initializes the collExpertCareerStages collection.
     *
     * By default this just sets the collExpertCareerStages collection to an empty array (like clearcollExpertCareerStages());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param      boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initExpertCareerStages($overrideExisting = true)
    {
        if (null !== $this->collExpertCareerStages && !$overrideExisting) {
            return;
        }

        $collectionClassName = ExpertCareerStageTableMap::getTableMap()->getCollectionClassName();

        $this->collExpertCareerStages = new $collectionClassName;
        $this->collExpertCareerStages->setModel('\CryoConnectDB\ExpertCareerStage');
    }

    /**
     * Gets an array of ChildExpertCareerStage objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ChildExperts is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @return ObjectCollection|ChildExpertCareerStage[] List of ChildExpertCareerStage objects
     * @throws PropelException
     */
    public function getExpertCareerStages(Criteria $criteria = null, ConnectionInterface $con = null)
    {
        $partial = $this->collExpertCareerStagesPartial && !$this->isNew();
        if (null === $this->collExpertCareerStages || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collExpertCareerStages) {
                // return empty collection
                $this->initExpertCareerStages();
            } else {
                $collExpertCareerStages = ChildExpertCareerStageQuery::create(null, $criteria)
                    ->filterByExperts($this)
                    ->find($con);

                if (null !== $criteria) {
                    if (false !== $this->collExpertCareerStagesPartial && count($collExpertCareerStages)) {
                        $this->initExpertCareerStages(false);

                        foreach ($collExpertCareerStages as $obj) {
                            if (false == $this->collExpertCareerStages->contains($obj)) {
                                $this->collExpertCareerStages->append($obj);
                            }
                        }

                        $this->collExpertCareerStagesPartial = true;
                    }

                    return $collExpertCareerStages;
                }

                if ($partial && $this->collExpertCareerStages) {
                    foreach ($this->collExpertCareerStages as $obj) {
                        if ($obj->isNew()) {
                            $collExpertCareerStages[] = $obj;
                        }
                    }
                }

                $this->collExpertCareerStages = $collExpertCareerStages;
                $this->collExpertCareerStagesPartial = false;
            }
        }

        return $this->collExpertCareerStages;
    }

    /**
     * Sets a collection of ChildExpertCareerStage objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      Collection $expertCareerStages A Propel collection.
     * @param      ConnectionInterface $con Optional connection object
     * @return $this|ChildExperts The current object (for fluent API support)
     */
    public function setExpertCareerStages(Collection $expertCareerStages, ConnectionInterface $con = null)
    {
        /** @var ChildExpertCareerStage[] $expertCareerStagesToDelete */
        $expertCareerStagesToDelete = $this->getExpertCareerStages(new Criteria(), $con)->diff($expertCareerStages);


        $this->expertCareerStagesScheduledForDeletion = $expertCareerStagesToDelete;

        foreach ($expertCareerStagesToDelete as $expertCareerStageRemoved) {
            $expertCareerStageRemoved->setExperts(null);
        }

        $this->collExpertCareerStages = null;
        foreach ($expertCareerStages as $expertCareerStage) {
            $this->addExpertCareerStage($expertCareerStage);
        }

        $this->collExpertCareerStages = $expertCareerStages;
        $this->collExpertCareerStagesPartial = false;

        return $this;
    }

    /**
     * Returns the number of related ExpertCareerStage objects.
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct
     * @param      ConnectionInterface $con
     * @return int             Count of related ExpertCareerStage objects.
     * @throws PropelException
     */
    public function countExpertCareerStages(Criteria $criteria = null, $distinct = false, ConnectionInterface $con = null)
    {
        $partial = $this->collExpertCareerStagesPartial && !$this->isNew();
        if (null === $this->collExpertCareerStages || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collExpertCareerStages) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getExpertCareerStages());
            }

            $query = ChildExpertCareerStageQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByExperts($this)
                ->count($con);
        }

        return count($this->collExpertCareerStages);
    }

    /**
     * Method called to associate a ChildExpertCareerStage object to this object
     * through the ChildExpertCareerStage foreign key attribute.
     *
     * @param  ChildExpertCareerStage $l ChildExpertCareerStage
     * @return $this|\CryoConnectDB\Experts The current object (for fluent API support)
     */
    public function addExpertCareerStage(ChildExpertCareerStage $l)
    {
        if ($this->collExpertCareerStages === null) {
            $this->initExpertCareerStages();
            $this->collExpertCareerStagesPartial = true;
        }

        if (!$this->collExpertCareerStages->contains($l)) {
            $this->doAddExpertCareerStage($l);

            if ($this->expertCareerStagesScheduledForDeletion and $this->expertCareerStagesScheduledForDeletion->contains($l)) {
                $this->expertCareerStagesScheduledForDeletion->remove($this->expertCareerStagesScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param ChildExpertCareerStage $expertCareerStage The ChildExpertCareerStage object to add.
     */
    protected function doAddExpertCareerStage(ChildExpertCareerStage $expertCareerStage)
    {
        $this->collExpertCareerStages[]= $expertCareerStage;
        $expertCareerStage->setExperts($this);
    }

    /**
     * @param  ChildExpertCareerStage $expertCareerStage The ChildExpertCareerStage object to remove.
     * @return $this|ChildExperts The current object (for fluent API support)
     */
    public function removeExpertCareerStage(ChildExpertCareerStage $expertCareerStage)
    {
        if ($this->getExpertCareerStages()->contains($expertCareerStage)) {
            $pos = $this->collExpertCareerStages->search($expertCareerStage);
            $this->collExpertCareerStages->remove($pos);
            if (null === $this->expertCareerStagesScheduledForDeletion) {
                $this->expertCareerStagesScheduledForDeletion = clone $this->collExpertCareerStages;
                $this->expertCareerStagesScheduledForDeletion->clear();
            }
            $this->expertCareerStagesScheduledForDeletion[]= clone $expertCareerStage;
            $expertCareerStage->setExperts(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Experts is new, it will return
     * an empty collection; or if this Experts has previously
     * been saved, it will retrieve related ExpertCareerStages from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Experts.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildExpertCareerStage[] List of ChildExpertCareerStage objects
     */
    public function getExpertCareerStagesJoinCareerStage(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildExpertCareerStageQuery::create(null, $criteria);
        $query->joinWith('CareerStage', $joinBehavior);

        return $this->getExpertCareerStages($query, $con);
    }

    /**
     * Clears out the collExpertContacts collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addExpertContacts()
     */
    public function clearExpertContacts()
    {
        $this->collExpertContacts = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Reset is the collExpertContacts collection loaded partially.
     */
    public function resetPartialExpertContacts($v = true)
    {
        $this->collExpertContactsPartial = $v;
    }

    /**
     * Initializes the collExpertContacts collection.
     *
     * By default this just sets the collExpertContacts collection to an empty array (like clearcollExpertContacts());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param      boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initExpertContacts($overrideExisting = true)
    {
        if (null !== $this->collExpertContacts && !$overrideExisting) {
            return;
        }

        $collectionClassName = ExpertContactTableMap::getTableMap()->getCollectionClassName();

        $this->collExpertContacts = new $collectionClassName;
        $this->collExpertContacts->setModel('\CryoConnectDB\ExpertContact');
    }

    /**
     * Gets an array of ChildExpertContact objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ChildExperts is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @return ObjectCollection|ChildExpertContact[] List of ChildExpertContact objects
     * @throws PropelException
     */
    public function getExpertContacts(Criteria $criteria = null, ConnectionInterface $con = null)
    {
        $partial = $this->collExpertContactsPartial && !$this->isNew();
        if (null === $this->collExpertContacts || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collExpertContacts) {
                // return empty collection
                $this->initExpertContacts();
            } else {
                $collExpertContacts = ChildExpertContactQuery::create(null, $criteria)
                    ->filterByExperts($this)
                    ->find($con);

                if (null !== $criteria) {
                    if (false !== $this->collExpertContactsPartial && count($collExpertContacts)) {
                        $this->initExpertContacts(false);

                        foreach ($collExpertContacts as $obj) {
                            if (false == $this->collExpertContacts->contains($obj)) {
                                $this->collExpertContacts->append($obj);
                            }
                        }

                        $this->collExpertContactsPartial = true;
                    }

                    return $collExpertContacts;
                }

                if ($partial && $this->collExpertContacts) {
                    foreach ($this->collExpertContacts as $obj) {
                        if ($obj->isNew()) {
                            $collExpertContacts[] = $obj;
                        }
                    }
                }

                $this->collExpertContacts = $collExpertContacts;
                $this->collExpertContactsPartial = false;
            }
        }

        return $this->collExpertContacts;
    }

    /**
     * Sets a collection of ChildExpertContact objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      Collection $expertContacts A Propel collection.
     * @param      ConnectionInterface $con Optional connection object
     * @return $this|ChildExperts The current object (for fluent API support)
     */
    public function setExpertContacts(Collection $expertContacts, ConnectionInterface $con = null)
    {
        /** @var ChildExpertContact[] $expertContactsToDelete */
        $expertContactsToDelete = $this->getExpertContacts(new Criteria(), $con)->diff($expertContacts);


        $this->expertContactsScheduledForDeletion = $expertContactsToDelete;

        foreach ($expertContactsToDelete as $expertContactRemoved) {
            $expertContactRemoved->setExperts(null);
        }

        $this->collExpertContacts = null;
        foreach ($expertContacts as $expertContact) {
            $this->addExpertContact($expertContact);
        }

        $this->collExpertContacts = $expertContacts;
        $this->collExpertContactsPartial = false;

        return $this;
    }

    /**
     * Returns the number of related ExpertContact objects.
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct
     * @param      ConnectionInterface $con
     * @return int             Count of related ExpertContact objects.
     * @throws PropelException
     */
    public function countExpertContacts(Criteria $criteria = null, $distinct = false, ConnectionInterface $con = null)
    {
        $partial = $this->collExpertContactsPartial && !$this->isNew();
        if (null === $this->collExpertContacts || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collExpertContacts) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getExpertContacts());
            }

            $query = ChildExpertContactQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByExperts($this)
                ->count($con);
        }

        return count($this->collExpertContacts);
    }

    /**
     * Method called to associate a ChildExpertContact object to this object
     * through the ChildExpertContact foreign key attribute.
     *
     * @param  ChildExpertContact $l ChildExpertContact
     * @return $this|\CryoConnectDB\Experts The current object (for fluent API support)
     */
    public function addExpertContact(ChildExpertContact $l)
    {
        if ($this->collExpertContacts === null) {
            $this->initExpertContacts();
            $this->collExpertContactsPartial = true;
        }

        if (!$this->collExpertContacts->contains($l)) {
            $this->doAddExpertContact($l);

            if ($this->expertContactsScheduledForDeletion and $this->expertContactsScheduledForDeletion->contains($l)) {
                $this->expertContactsScheduledForDeletion->remove($this->expertContactsScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param ChildExpertContact $expertContact The ChildExpertContact object to add.
     */
    protected function doAddExpertContact(ChildExpertContact $expertContact)
    {
        $this->collExpertContacts[]= $expertContact;
        $expertContact->setExperts($this);
    }

    /**
     * @param  ChildExpertContact $expertContact The ChildExpertContact object to remove.
     * @return $this|ChildExperts The current object (for fluent API support)
     */
    public function removeExpertContact(ChildExpertContact $expertContact)
    {
        if ($this->getExpertContacts()->contains($expertContact)) {
            $pos = $this->collExpertContacts->search($expertContact);
            $this->collExpertContacts->remove($pos);
            if (null === $this->expertContactsScheduledForDeletion) {
                $this->expertContactsScheduledForDeletion = clone $this->collExpertContacts;
                $this->expertContactsScheduledForDeletion->clear();
            }
            $this->expertContactsScheduledForDeletion[]= clone $expertContact;
            $expertContact->setExperts(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Experts is new, it will return
     * an empty collection; or if this Experts has previously
     * been saved, it will retrieve related ExpertContacts from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Experts.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildExpertContact[] List of ChildExpertContact objects
     */
    public function getExpertContactsJoinContactTypes(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildExpertContactQuery::create(null, $criteria);
        $query->joinWith('ContactTypes', $joinBehavior);

        return $this->getExpertContacts($query, $con);
    }

    /**
     * Clears out the collExpertCryosphereWhats collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addExpertCryosphereWhats()
     */
    public function clearExpertCryosphereWhats()
    {
        $this->collExpertCryosphereWhats = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Reset is the collExpertCryosphereWhats collection loaded partially.
     */
    public function resetPartialExpertCryosphereWhats($v = true)
    {
        $this->collExpertCryosphereWhatsPartial = $v;
    }

    /**
     * Initializes the collExpertCryosphereWhats collection.
     *
     * By default this just sets the collExpertCryosphereWhats collection to an empty array (like clearcollExpertCryosphereWhats());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param      boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initExpertCryosphereWhats($overrideExisting = true)
    {
        if (null !== $this->collExpertCryosphereWhats && !$overrideExisting) {
            return;
        }

        $collectionClassName = ExpertCryosphereWhatTableMap::getTableMap()->getCollectionClassName();

        $this->collExpertCryosphereWhats = new $collectionClassName;
        $this->collExpertCryosphereWhats->setModel('\CryoConnectDB\ExpertCryosphereWhat');
    }

    /**
     * Gets an array of ChildExpertCryosphereWhat objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ChildExperts is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @return ObjectCollection|ChildExpertCryosphereWhat[] List of ChildExpertCryosphereWhat objects
     * @throws PropelException
     */
    public function getExpertCryosphereWhats(Criteria $criteria = null, ConnectionInterface $con = null)
    {
        $partial = $this->collExpertCryosphereWhatsPartial && !$this->isNew();
        if (null === $this->collExpertCryosphereWhats || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collExpertCryosphereWhats) {
                // return empty collection
                $this->initExpertCryosphereWhats();
            } else {
                $collExpertCryosphereWhats = ChildExpertCryosphereWhatQuery::create(null, $criteria)
                    ->filterByExperts($this)
                    ->find($con);

                if (null !== $criteria) {
                    if (false !== $this->collExpertCryosphereWhatsPartial && count($collExpertCryosphereWhats)) {
                        $this->initExpertCryosphereWhats(false);

                        foreach ($collExpertCryosphereWhats as $obj) {
                            if (false == $this->collExpertCryosphereWhats->contains($obj)) {
                                $this->collExpertCryosphereWhats->append($obj);
                            }
                        }

                        $this->collExpertCryosphereWhatsPartial = true;
                    }

                    return $collExpertCryosphereWhats;
                }

                if ($partial && $this->collExpertCryosphereWhats) {
                    foreach ($this->collExpertCryosphereWhats as $obj) {
                        if ($obj->isNew()) {
                            $collExpertCryosphereWhats[] = $obj;
                        }
                    }
                }

                $this->collExpertCryosphereWhats = $collExpertCryosphereWhats;
                $this->collExpertCryosphereWhatsPartial = false;
            }
        }

        return $this->collExpertCryosphereWhats;
    }

    /**
     * Sets a collection of ChildExpertCryosphereWhat objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      Collection $expertCryosphereWhats A Propel collection.
     * @param      ConnectionInterface $con Optional connection object
     * @return $this|ChildExperts The current object (for fluent API support)
     */
    public function setExpertCryosphereWhats(Collection $expertCryosphereWhats, ConnectionInterface $con = null)
    {
        /** @var ChildExpertCryosphereWhat[] $expertCryosphereWhatsToDelete */
        $expertCryosphereWhatsToDelete = $this->getExpertCryosphereWhats(new Criteria(), $con)->diff($expertCryosphereWhats);


        $this->expertCryosphereWhatsScheduledForDeletion = $expertCryosphereWhatsToDelete;

        foreach ($expertCryosphereWhatsToDelete as $expertCryosphereWhatRemoved) {
            $expertCryosphereWhatRemoved->setExperts(null);
        }

        $this->collExpertCryosphereWhats = null;
        foreach ($expertCryosphereWhats as $expertCryosphereWhat) {
            $this->addExpertCryosphereWhat($expertCryosphereWhat);
        }

        $this->collExpertCryosphereWhats = $expertCryosphereWhats;
        $this->collExpertCryosphereWhatsPartial = false;

        return $this;
    }

    /**
     * Returns the number of related ExpertCryosphereWhat objects.
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct
     * @param      ConnectionInterface $con
     * @return int             Count of related ExpertCryosphereWhat objects.
     * @throws PropelException
     */
    public function countExpertCryosphereWhats(Criteria $criteria = null, $distinct = false, ConnectionInterface $con = null)
    {
        $partial = $this->collExpertCryosphereWhatsPartial && !$this->isNew();
        if (null === $this->collExpertCryosphereWhats || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collExpertCryosphereWhats) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getExpertCryosphereWhats());
            }

            $query = ChildExpertCryosphereWhatQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByExperts($this)
                ->count($con);
        }

        return count($this->collExpertCryosphereWhats);
    }

    /**
     * Method called to associate a ChildExpertCryosphereWhat object to this object
     * through the ChildExpertCryosphereWhat foreign key attribute.
     *
     * @param  ChildExpertCryosphereWhat $l ChildExpertCryosphereWhat
     * @return $this|\CryoConnectDB\Experts The current object (for fluent API support)
     */
    public function addExpertCryosphereWhat(ChildExpertCryosphereWhat $l)
    {
        if ($this->collExpertCryosphereWhats === null) {
            $this->initExpertCryosphereWhats();
            $this->collExpertCryosphereWhatsPartial = true;
        }

        if (!$this->collExpertCryosphereWhats->contains($l)) {
            $this->doAddExpertCryosphereWhat($l);

            if ($this->expertCryosphereWhatsScheduledForDeletion and $this->expertCryosphereWhatsScheduledForDeletion->contains($l)) {
                $this->expertCryosphereWhatsScheduledForDeletion->remove($this->expertCryosphereWhatsScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param ChildExpertCryosphereWhat $expertCryosphereWhat The ChildExpertCryosphereWhat object to add.
     */
    protected function doAddExpertCryosphereWhat(ChildExpertCryosphereWhat $expertCryosphereWhat)
    {
        $this->collExpertCryosphereWhats[]= $expertCryosphereWhat;
        $expertCryosphereWhat->setExperts($this);
    }

    /**
     * @param  ChildExpertCryosphereWhat $expertCryosphereWhat The ChildExpertCryosphereWhat object to remove.
     * @return $this|ChildExperts The current object (for fluent API support)
     */
    public function removeExpertCryosphereWhat(ChildExpertCryosphereWhat $expertCryosphereWhat)
    {
        if ($this->getExpertCryosphereWhats()->contains($expertCryosphereWhat)) {
            $pos = $this->collExpertCryosphereWhats->search($expertCryosphereWhat);
            $this->collExpertCryosphereWhats->remove($pos);
            if (null === $this->expertCryosphereWhatsScheduledForDeletion) {
                $this->expertCryosphereWhatsScheduledForDeletion = clone $this->collExpertCryosphereWhats;
                $this->expertCryosphereWhatsScheduledForDeletion->clear();
            }
            $this->expertCryosphereWhatsScheduledForDeletion[]= clone $expertCryosphereWhat;
            $expertCryosphereWhat->setExperts(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Experts is new, it will return
     * an empty collection; or if this Experts has previously
     * been saved, it will retrieve related ExpertCryosphereWhats from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Experts.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildExpertCryosphereWhat[] List of ChildExpertCryosphereWhat objects
     */
    public function getExpertCryosphereWhatsJoinCryosphereWhat(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildExpertCryosphereWhatQuery::create(null, $criteria);
        $query->joinWith('CryosphereWhat', $joinBehavior);

        return $this->getExpertCryosphereWhats($query, $con);
    }

    /**
     * Clears out the collExpertCryosphereWhatSpecefics collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addExpertCryosphereWhatSpecefics()
     */
    public function clearExpertCryosphereWhatSpecefics()
    {
        $this->collExpertCryosphereWhatSpecefics = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Reset is the collExpertCryosphereWhatSpecefics collection loaded partially.
     */
    public function resetPartialExpertCryosphereWhatSpecefics($v = true)
    {
        $this->collExpertCryosphereWhatSpeceficsPartial = $v;
    }

    /**
     * Initializes the collExpertCryosphereWhatSpecefics collection.
     *
     * By default this just sets the collExpertCryosphereWhatSpecefics collection to an empty array (like clearcollExpertCryosphereWhatSpecefics());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param      boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initExpertCryosphereWhatSpecefics($overrideExisting = true)
    {
        if (null !== $this->collExpertCryosphereWhatSpecefics && !$overrideExisting) {
            return;
        }

        $collectionClassName = ExpertCryosphereWhatSpeceficTableMap::getTableMap()->getCollectionClassName();

        $this->collExpertCryosphereWhatSpecefics = new $collectionClassName;
        $this->collExpertCryosphereWhatSpecefics->setModel('\CryoConnectDB\ExpertCryosphereWhatSpecefic');
    }

    /**
     * Gets an array of ChildExpertCryosphereWhatSpecefic objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ChildExperts is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @return ObjectCollection|ChildExpertCryosphereWhatSpecefic[] List of ChildExpertCryosphereWhatSpecefic objects
     * @throws PropelException
     */
    public function getExpertCryosphereWhatSpecefics(Criteria $criteria = null, ConnectionInterface $con = null)
    {
        $partial = $this->collExpertCryosphereWhatSpeceficsPartial && !$this->isNew();
        if (null === $this->collExpertCryosphereWhatSpecefics || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collExpertCryosphereWhatSpecefics) {
                // return empty collection
                $this->initExpertCryosphereWhatSpecefics();
            } else {
                $collExpertCryosphereWhatSpecefics = ChildExpertCryosphereWhatSpeceficQuery::create(null, $criteria)
                    ->filterByExperts($this)
                    ->find($con);

                if (null !== $criteria) {
                    if (false !== $this->collExpertCryosphereWhatSpeceficsPartial && count($collExpertCryosphereWhatSpecefics)) {
                        $this->initExpertCryosphereWhatSpecefics(false);

                        foreach ($collExpertCryosphereWhatSpecefics as $obj) {
                            if (false == $this->collExpertCryosphereWhatSpecefics->contains($obj)) {
                                $this->collExpertCryosphereWhatSpecefics->append($obj);
                            }
                        }

                        $this->collExpertCryosphereWhatSpeceficsPartial = true;
                    }

                    return $collExpertCryosphereWhatSpecefics;
                }

                if ($partial && $this->collExpertCryosphereWhatSpecefics) {
                    foreach ($this->collExpertCryosphereWhatSpecefics as $obj) {
                        if ($obj->isNew()) {
                            $collExpertCryosphereWhatSpecefics[] = $obj;
                        }
                    }
                }

                $this->collExpertCryosphereWhatSpecefics = $collExpertCryosphereWhatSpecefics;
                $this->collExpertCryosphereWhatSpeceficsPartial = false;
            }
        }

        return $this->collExpertCryosphereWhatSpecefics;
    }

    /**
     * Sets a collection of ChildExpertCryosphereWhatSpecefic objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      Collection $expertCryosphereWhatSpecefics A Propel collection.
     * @param      ConnectionInterface $con Optional connection object
     * @return $this|ChildExperts The current object (for fluent API support)
     */
    public function setExpertCryosphereWhatSpecefics(Collection $expertCryosphereWhatSpecefics, ConnectionInterface $con = null)
    {
        /** @var ChildExpertCryosphereWhatSpecefic[] $expertCryosphereWhatSpeceficsToDelete */
        $expertCryosphereWhatSpeceficsToDelete = $this->getExpertCryosphereWhatSpecefics(new Criteria(), $con)->diff($expertCryosphereWhatSpecefics);


        $this->expertCryosphereWhatSpeceficsScheduledForDeletion = $expertCryosphereWhatSpeceficsToDelete;

        foreach ($expertCryosphereWhatSpeceficsToDelete as $expertCryosphereWhatSpeceficRemoved) {
            $expertCryosphereWhatSpeceficRemoved->setExperts(null);
        }

        $this->collExpertCryosphereWhatSpecefics = null;
        foreach ($expertCryosphereWhatSpecefics as $expertCryosphereWhatSpecefic) {
            $this->addExpertCryosphereWhatSpecefic($expertCryosphereWhatSpecefic);
        }

        $this->collExpertCryosphereWhatSpecefics = $expertCryosphereWhatSpecefics;
        $this->collExpertCryosphereWhatSpeceficsPartial = false;

        return $this;
    }

    /**
     * Returns the number of related ExpertCryosphereWhatSpecefic objects.
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct
     * @param      ConnectionInterface $con
     * @return int             Count of related ExpertCryosphereWhatSpecefic objects.
     * @throws PropelException
     */
    public function countExpertCryosphereWhatSpecefics(Criteria $criteria = null, $distinct = false, ConnectionInterface $con = null)
    {
        $partial = $this->collExpertCryosphereWhatSpeceficsPartial && !$this->isNew();
        if (null === $this->collExpertCryosphereWhatSpecefics || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collExpertCryosphereWhatSpecefics) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getExpertCryosphereWhatSpecefics());
            }

            $query = ChildExpertCryosphereWhatSpeceficQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByExperts($this)
                ->count($con);
        }

        return count($this->collExpertCryosphereWhatSpecefics);
    }

    /**
     * Method called to associate a ChildExpertCryosphereWhatSpecefic object to this object
     * through the ChildExpertCryosphereWhatSpecefic foreign key attribute.
     *
     * @param  ChildExpertCryosphereWhatSpecefic $l ChildExpertCryosphereWhatSpecefic
     * @return $this|\CryoConnectDB\Experts The current object (for fluent API support)
     */
    public function addExpertCryosphereWhatSpecefic(ChildExpertCryosphereWhatSpecefic $l)
    {
        if ($this->collExpertCryosphereWhatSpecefics === null) {
            $this->initExpertCryosphereWhatSpecefics();
            $this->collExpertCryosphereWhatSpeceficsPartial = true;
        }

        if (!$this->collExpertCryosphereWhatSpecefics->contains($l)) {
            $this->doAddExpertCryosphereWhatSpecefic($l);

            if ($this->expertCryosphereWhatSpeceficsScheduledForDeletion and $this->expertCryosphereWhatSpeceficsScheduledForDeletion->contains($l)) {
                $this->expertCryosphereWhatSpeceficsScheduledForDeletion->remove($this->expertCryosphereWhatSpeceficsScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param ChildExpertCryosphereWhatSpecefic $expertCryosphereWhatSpecefic The ChildExpertCryosphereWhatSpecefic object to add.
     */
    protected function doAddExpertCryosphereWhatSpecefic(ChildExpertCryosphereWhatSpecefic $expertCryosphereWhatSpecefic)
    {
        $this->collExpertCryosphereWhatSpecefics[]= $expertCryosphereWhatSpecefic;
        $expertCryosphereWhatSpecefic->setExperts($this);
    }

    /**
     * @param  ChildExpertCryosphereWhatSpecefic $expertCryosphereWhatSpecefic The ChildExpertCryosphereWhatSpecefic object to remove.
     * @return $this|ChildExperts The current object (for fluent API support)
     */
    public function removeExpertCryosphereWhatSpecefic(ChildExpertCryosphereWhatSpecefic $expertCryosphereWhatSpecefic)
    {
        if ($this->getExpertCryosphereWhatSpecefics()->contains($expertCryosphereWhatSpecefic)) {
            $pos = $this->collExpertCryosphereWhatSpecefics->search($expertCryosphereWhatSpecefic);
            $this->collExpertCryosphereWhatSpecefics->remove($pos);
            if (null === $this->expertCryosphereWhatSpeceficsScheduledForDeletion) {
                $this->expertCryosphereWhatSpeceficsScheduledForDeletion = clone $this->collExpertCryosphereWhatSpecefics;
                $this->expertCryosphereWhatSpeceficsScheduledForDeletion->clear();
            }
            $this->expertCryosphereWhatSpeceficsScheduledForDeletion[]= clone $expertCryosphereWhatSpecefic;
            $expertCryosphereWhatSpecefic->setExperts(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Experts is new, it will return
     * an empty collection; or if this Experts has previously
     * been saved, it will retrieve related ExpertCryosphereWhatSpecefics from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Experts.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildExpertCryosphereWhatSpecefic[] List of ChildExpertCryosphereWhatSpecefic objects
     */
    public function getExpertCryosphereWhatSpeceficsJoinCryosphereWhatSpecefic(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildExpertCryosphereWhatSpeceficQuery::create(null, $criteria);
        $query->joinWith('CryosphereWhatSpecefic', $joinBehavior);

        return $this->getExpertCryosphereWhatSpecefics($query, $con);
    }

    /**
     * Clears out the collExpertFieldWorks collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addExpertFieldWorks()
     */
    public function clearExpertFieldWorks()
    {
        $this->collExpertFieldWorks = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Reset is the collExpertFieldWorks collection loaded partially.
     */
    public function resetPartialExpertFieldWorks($v = true)
    {
        $this->collExpertFieldWorksPartial = $v;
    }

    /**
     * Initializes the collExpertFieldWorks collection.
     *
     * By default this just sets the collExpertFieldWorks collection to an empty array (like clearcollExpertFieldWorks());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param      boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initExpertFieldWorks($overrideExisting = true)
    {
        if (null !== $this->collExpertFieldWorks && !$overrideExisting) {
            return;
        }

        $collectionClassName = ExpertFieldWorkTableMap::getTableMap()->getCollectionClassName();

        $this->collExpertFieldWorks = new $collectionClassName;
        $this->collExpertFieldWorks->setModel('\CryoConnectDB\ExpertFieldWork');
    }

    /**
     * Gets an array of ChildExpertFieldWork objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ChildExperts is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @return ObjectCollection|ChildExpertFieldWork[] List of ChildExpertFieldWork objects
     * @throws PropelException
     */
    public function getExpertFieldWorks(Criteria $criteria = null, ConnectionInterface $con = null)
    {
        $partial = $this->collExpertFieldWorksPartial && !$this->isNew();
        if (null === $this->collExpertFieldWorks || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collExpertFieldWorks) {
                // return empty collection
                $this->initExpertFieldWorks();
            } else {
                $collExpertFieldWorks = ChildExpertFieldWorkQuery::create(null, $criteria)
                    ->filterByExperts($this)
                    ->find($con);

                if (null !== $criteria) {
                    if (false !== $this->collExpertFieldWorksPartial && count($collExpertFieldWorks)) {
                        $this->initExpertFieldWorks(false);

                        foreach ($collExpertFieldWorks as $obj) {
                            if (false == $this->collExpertFieldWorks->contains($obj)) {
                                $this->collExpertFieldWorks->append($obj);
                            }
                        }

                        $this->collExpertFieldWorksPartial = true;
                    }

                    return $collExpertFieldWorks;
                }

                if ($partial && $this->collExpertFieldWorks) {
                    foreach ($this->collExpertFieldWorks as $obj) {
                        if ($obj->isNew()) {
                            $collExpertFieldWorks[] = $obj;
                        }
                    }
                }

                $this->collExpertFieldWorks = $collExpertFieldWorks;
                $this->collExpertFieldWorksPartial = false;
            }
        }

        return $this->collExpertFieldWorks;
    }

    /**
     * Sets a collection of ChildExpertFieldWork objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      Collection $expertFieldWorks A Propel collection.
     * @param      ConnectionInterface $con Optional connection object
     * @return $this|ChildExperts The current object (for fluent API support)
     */
    public function setExpertFieldWorks(Collection $expertFieldWorks, ConnectionInterface $con = null)
    {
        /** @var ChildExpertFieldWork[] $expertFieldWorksToDelete */
        $expertFieldWorksToDelete = $this->getExpertFieldWorks(new Criteria(), $con)->diff($expertFieldWorks);


        $this->expertFieldWorksScheduledForDeletion = $expertFieldWorksToDelete;

        foreach ($expertFieldWorksToDelete as $expertFieldWorkRemoved) {
            $expertFieldWorkRemoved->setExperts(null);
        }

        $this->collExpertFieldWorks = null;
        foreach ($expertFieldWorks as $expertFieldWork) {
            $this->addExpertFieldWork($expertFieldWork);
        }

        $this->collExpertFieldWorks = $expertFieldWorks;
        $this->collExpertFieldWorksPartial = false;

        return $this;
    }

    /**
     * Returns the number of related ExpertFieldWork objects.
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct
     * @param      ConnectionInterface $con
     * @return int             Count of related ExpertFieldWork objects.
     * @throws PropelException
     */
    public function countExpertFieldWorks(Criteria $criteria = null, $distinct = false, ConnectionInterface $con = null)
    {
        $partial = $this->collExpertFieldWorksPartial && !$this->isNew();
        if (null === $this->collExpertFieldWorks || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collExpertFieldWorks) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getExpertFieldWorks());
            }

            $query = ChildExpertFieldWorkQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByExperts($this)
                ->count($con);
        }

        return count($this->collExpertFieldWorks);
    }

    /**
     * Method called to associate a ChildExpertFieldWork object to this object
     * through the ChildExpertFieldWork foreign key attribute.
     *
     * @param  ChildExpertFieldWork $l ChildExpertFieldWork
     * @return $this|\CryoConnectDB\Experts The current object (for fluent API support)
     */
    public function addExpertFieldWork(ChildExpertFieldWork $l)
    {
        if ($this->collExpertFieldWorks === null) {
            $this->initExpertFieldWorks();
            $this->collExpertFieldWorksPartial = true;
        }

        if (!$this->collExpertFieldWorks->contains($l)) {
            $this->doAddExpertFieldWork($l);

            if ($this->expertFieldWorksScheduledForDeletion and $this->expertFieldWorksScheduledForDeletion->contains($l)) {
                $this->expertFieldWorksScheduledForDeletion->remove($this->expertFieldWorksScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param ChildExpertFieldWork $expertFieldWork The ChildExpertFieldWork object to add.
     */
    protected function doAddExpertFieldWork(ChildExpertFieldWork $expertFieldWork)
    {
        $this->collExpertFieldWorks[]= $expertFieldWork;
        $expertFieldWork->setExperts($this);
    }

    /**
     * @param  ChildExpertFieldWork $expertFieldWork The ChildExpertFieldWork object to remove.
     * @return $this|ChildExperts The current object (for fluent API support)
     */
    public function removeExpertFieldWork(ChildExpertFieldWork $expertFieldWork)
    {
        if ($this->getExpertFieldWorks()->contains($expertFieldWork)) {
            $pos = $this->collExpertFieldWorks->search($expertFieldWork);
            $this->collExpertFieldWorks->remove($pos);
            if (null === $this->expertFieldWorksScheduledForDeletion) {
                $this->expertFieldWorksScheduledForDeletion = clone $this->collExpertFieldWorks;
                $this->expertFieldWorksScheduledForDeletion->clear();
            }
            $this->expertFieldWorksScheduledForDeletion[]= clone $expertFieldWork;
            $expertFieldWork->setExperts(null);
        }

        return $this;
    }

    /**
     * Clears out the collExpertLanguagess collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addExpertLanguagess()
     */
    public function clearExpertLanguagess()
    {
        $this->collExpertLanguagess = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Reset is the collExpertLanguagess collection loaded partially.
     */
    public function resetPartialExpertLanguagess($v = true)
    {
        $this->collExpertLanguagessPartial = $v;
    }

    /**
     * Initializes the collExpertLanguagess collection.
     *
     * By default this just sets the collExpertLanguagess collection to an empty array (like clearcollExpertLanguagess());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param      boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initExpertLanguagess($overrideExisting = true)
    {
        if (null !== $this->collExpertLanguagess && !$overrideExisting) {
            return;
        }

        $collectionClassName = ExpertLanguagesTableMap::getTableMap()->getCollectionClassName();

        $this->collExpertLanguagess = new $collectionClassName;
        $this->collExpertLanguagess->setModel('\CryoConnectDB\ExpertLanguages');
    }

    /**
     * Gets an array of ChildExpertLanguages objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ChildExperts is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @return ObjectCollection|ChildExpertLanguages[] List of ChildExpertLanguages objects
     * @throws PropelException
     */
    public function getExpertLanguagess(Criteria $criteria = null, ConnectionInterface $con = null)
    {
        $partial = $this->collExpertLanguagessPartial && !$this->isNew();
        if (null === $this->collExpertLanguagess || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collExpertLanguagess) {
                // return empty collection
                $this->initExpertLanguagess();
            } else {
                $collExpertLanguagess = ChildExpertLanguagesQuery::create(null, $criteria)
                    ->filterByExperts($this)
                    ->find($con);

                if (null !== $criteria) {
                    if (false !== $this->collExpertLanguagessPartial && count($collExpertLanguagess)) {
                        $this->initExpertLanguagess(false);

                        foreach ($collExpertLanguagess as $obj) {
                            if (false == $this->collExpertLanguagess->contains($obj)) {
                                $this->collExpertLanguagess->append($obj);
                            }
                        }

                        $this->collExpertLanguagessPartial = true;
                    }

                    return $collExpertLanguagess;
                }

                if ($partial && $this->collExpertLanguagess) {
                    foreach ($this->collExpertLanguagess as $obj) {
                        if ($obj->isNew()) {
                            $collExpertLanguagess[] = $obj;
                        }
                    }
                }

                $this->collExpertLanguagess = $collExpertLanguagess;
                $this->collExpertLanguagessPartial = false;
            }
        }

        return $this->collExpertLanguagess;
    }

    /**
     * Sets a collection of ChildExpertLanguages objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      Collection $expertLanguagess A Propel collection.
     * @param      ConnectionInterface $con Optional connection object
     * @return $this|ChildExperts The current object (for fluent API support)
     */
    public function setExpertLanguagess(Collection $expertLanguagess, ConnectionInterface $con = null)
    {
        /** @var ChildExpertLanguages[] $expertLanguagessToDelete */
        $expertLanguagessToDelete = $this->getExpertLanguagess(new Criteria(), $con)->diff($expertLanguagess);


        $this->expertLanguagessScheduledForDeletion = $expertLanguagessToDelete;

        foreach ($expertLanguagessToDelete as $expertLanguagesRemoved) {
            $expertLanguagesRemoved->setExperts(null);
        }

        $this->collExpertLanguagess = null;
        foreach ($expertLanguagess as $expertLanguages) {
            $this->addExpertLanguages($expertLanguages);
        }

        $this->collExpertLanguagess = $expertLanguagess;
        $this->collExpertLanguagessPartial = false;

        return $this;
    }

    /**
     * Returns the number of related ExpertLanguages objects.
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct
     * @param      ConnectionInterface $con
     * @return int             Count of related ExpertLanguages objects.
     * @throws PropelException
     */
    public function countExpertLanguagess(Criteria $criteria = null, $distinct = false, ConnectionInterface $con = null)
    {
        $partial = $this->collExpertLanguagessPartial && !$this->isNew();
        if (null === $this->collExpertLanguagess || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collExpertLanguagess) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getExpertLanguagess());
            }

            $query = ChildExpertLanguagesQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByExperts($this)
                ->count($con);
        }

        return count($this->collExpertLanguagess);
    }

    /**
     * Method called to associate a ChildExpertLanguages object to this object
     * through the ChildExpertLanguages foreign key attribute.
     *
     * @param  ChildExpertLanguages $l ChildExpertLanguages
     * @return $this|\CryoConnectDB\Experts The current object (for fluent API support)
     */
    public function addExpertLanguages(ChildExpertLanguages $l)
    {
        if ($this->collExpertLanguagess === null) {
            $this->initExpertLanguagess();
            $this->collExpertLanguagessPartial = true;
        }

        if (!$this->collExpertLanguagess->contains($l)) {
            $this->doAddExpertLanguages($l);

            if ($this->expertLanguagessScheduledForDeletion and $this->expertLanguagessScheduledForDeletion->contains($l)) {
                $this->expertLanguagessScheduledForDeletion->remove($this->expertLanguagessScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param ChildExpertLanguages $expertLanguages The ChildExpertLanguages object to add.
     */
    protected function doAddExpertLanguages(ChildExpertLanguages $expertLanguages)
    {
        $this->collExpertLanguagess[]= $expertLanguages;
        $expertLanguages->setExperts($this);
    }

    /**
     * @param  ChildExpertLanguages $expertLanguages The ChildExpertLanguages object to remove.
     * @return $this|ChildExperts The current object (for fluent API support)
     */
    public function removeExpertLanguages(ChildExpertLanguages $expertLanguages)
    {
        if ($this->getExpertLanguagess()->contains($expertLanguages)) {
            $pos = $this->collExpertLanguagess->search($expertLanguages);
            $this->collExpertLanguagess->remove($pos);
            if (null === $this->expertLanguagessScheduledForDeletion) {
                $this->expertLanguagessScheduledForDeletion = clone $this->collExpertLanguagess;
                $this->expertLanguagessScheduledForDeletion->clear();
            }
            $this->expertLanguagessScheduledForDeletion[]= clone $expertLanguages;
            $expertLanguages->setExperts(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Experts is new, it will return
     * an empty collection; or if this Experts has previously
     * been saved, it will retrieve related ExpertLanguagess from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Experts.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildExpertLanguages[] List of ChildExpertLanguages objects
     */
    public function getExpertLanguagessJoinLanguages(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildExpertLanguagesQuery::create(null, $criteria);
        $query->joinWith('Languages', $joinBehavior);

        return $this->getExpertLanguagess($query, $con);
    }

    /**
     * Clears out the collExpertWhens collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addExpertWhens()
     */
    public function clearExpertWhens()
    {
        $this->collExpertWhens = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Reset is the collExpertWhens collection loaded partially.
     */
    public function resetPartialExpertWhens($v = true)
    {
        $this->collExpertWhensPartial = $v;
    }

    /**
     * Initializes the collExpertWhens collection.
     *
     * By default this just sets the collExpertWhens collection to an empty array (like clearcollExpertWhens());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param      boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initExpertWhens($overrideExisting = true)
    {
        if (null !== $this->collExpertWhens && !$overrideExisting) {
            return;
        }

        $collectionClassName = ExpertWhenTableMap::getTableMap()->getCollectionClassName();

        $this->collExpertWhens = new $collectionClassName;
        $this->collExpertWhens->setModel('\CryoConnectDB\ExpertWhen');
    }

    /**
     * Gets an array of ChildExpertWhen objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ChildExperts is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @return ObjectCollection|ChildExpertWhen[] List of ChildExpertWhen objects
     * @throws PropelException
     */
    public function getExpertWhens(Criteria $criteria = null, ConnectionInterface $con = null)
    {
        $partial = $this->collExpertWhensPartial && !$this->isNew();
        if (null === $this->collExpertWhens || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collExpertWhens) {
                // return empty collection
                $this->initExpertWhens();
            } else {
                $collExpertWhens = ChildExpertWhenQuery::create(null, $criteria)
                    ->filterByExperts($this)
                    ->find($con);

                if (null !== $criteria) {
                    if (false !== $this->collExpertWhensPartial && count($collExpertWhens)) {
                        $this->initExpertWhens(false);

                        foreach ($collExpertWhens as $obj) {
                            if (false == $this->collExpertWhens->contains($obj)) {
                                $this->collExpertWhens->append($obj);
                            }
                        }

                        $this->collExpertWhensPartial = true;
                    }

                    return $collExpertWhens;
                }

                if ($partial && $this->collExpertWhens) {
                    foreach ($this->collExpertWhens as $obj) {
                        if ($obj->isNew()) {
                            $collExpertWhens[] = $obj;
                        }
                    }
                }

                $this->collExpertWhens = $collExpertWhens;
                $this->collExpertWhensPartial = false;
            }
        }

        return $this->collExpertWhens;
    }

    /**
     * Sets a collection of ChildExpertWhen objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      Collection $expertWhens A Propel collection.
     * @param      ConnectionInterface $con Optional connection object
     * @return $this|ChildExperts The current object (for fluent API support)
     */
    public function setExpertWhens(Collection $expertWhens, ConnectionInterface $con = null)
    {
        /** @var ChildExpertWhen[] $expertWhensToDelete */
        $expertWhensToDelete = $this->getExpertWhens(new Criteria(), $con)->diff($expertWhens);


        $this->expertWhensScheduledForDeletion = $expertWhensToDelete;

        foreach ($expertWhensToDelete as $expertWhenRemoved) {
            $expertWhenRemoved->setExperts(null);
        }

        $this->collExpertWhens = null;
        foreach ($expertWhens as $expertWhen) {
            $this->addExpertWhen($expertWhen);
        }

        $this->collExpertWhens = $expertWhens;
        $this->collExpertWhensPartial = false;

        return $this;
    }

    /**
     * Returns the number of related ExpertWhen objects.
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct
     * @param      ConnectionInterface $con
     * @return int             Count of related ExpertWhen objects.
     * @throws PropelException
     */
    public function countExpertWhens(Criteria $criteria = null, $distinct = false, ConnectionInterface $con = null)
    {
        $partial = $this->collExpertWhensPartial && !$this->isNew();
        if (null === $this->collExpertWhens || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collExpertWhens) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getExpertWhens());
            }

            $query = ChildExpertWhenQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByExperts($this)
                ->count($con);
        }

        return count($this->collExpertWhens);
    }

    /**
     * Method called to associate a ChildExpertWhen object to this object
     * through the ChildExpertWhen foreign key attribute.
     *
     * @param  ChildExpertWhen $l ChildExpertWhen
     * @return $this|\CryoConnectDB\Experts The current object (for fluent API support)
     */
    public function addExpertWhen(ChildExpertWhen $l)
    {
        if ($this->collExpertWhens === null) {
            $this->initExpertWhens();
            $this->collExpertWhensPartial = true;
        }

        if (!$this->collExpertWhens->contains($l)) {
            $this->doAddExpertWhen($l);

            if ($this->expertWhensScheduledForDeletion and $this->expertWhensScheduledForDeletion->contains($l)) {
                $this->expertWhensScheduledForDeletion->remove($this->expertWhensScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param ChildExpertWhen $expertWhen The ChildExpertWhen object to add.
     */
    protected function doAddExpertWhen(ChildExpertWhen $expertWhen)
    {
        $this->collExpertWhens[]= $expertWhen;
        $expertWhen->setExperts($this);
    }

    /**
     * @param  ChildExpertWhen $expertWhen The ChildExpertWhen object to remove.
     * @return $this|ChildExperts The current object (for fluent API support)
     */
    public function removeExpertWhen(ChildExpertWhen $expertWhen)
    {
        if ($this->getExpertWhens()->contains($expertWhen)) {
            $pos = $this->collExpertWhens->search($expertWhen);
            $this->collExpertWhens->remove($pos);
            if (null === $this->expertWhensScheduledForDeletion) {
                $this->expertWhensScheduledForDeletion = clone $this->collExpertWhens;
                $this->expertWhensScheduledForDeletion->clear();
            }
            $this->expertWhensScheduledForDeletion[]= clone $expertWhen;
            $expertWhen->setExperts(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Experts is new, it will return
     * an empty collection; or if this Experts has previously
     * been saved, it will retrieve related ExpertWhens from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Experts.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildExpertWhen[] List of ChildExpertWhen objects
     */
    public function getExpertWhensJoinCryosphereWhen(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildExpertWhenQuery::create(null, $criteria);
        $query->joinWith('CryosphereWhen', $joinBehavior);

        return $this->getExpertWhens($query, $con);
    }

    /**
     * Clears out the collExpertWheres collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addExpertWheres()
     */
    public function clearExpertWheres()
    {
        $this->collExpertWheres = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Reset is the collExpertWheres collection loaded partially.
     */
    public function resetPartialExpertWheres($v = true)
    {
        $this->collExpertWheresPartial = $v;
    }

    /**
     * Initializes the collExpertWheres collection.
     *
     * By default this just sets the collExpertWheres collection to an empty array (like clearcollExpertWheres());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param      boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initExpertWheres($overrideExisting = true)
    {
        if (null !== $this->collExpertWheres && !$overrideExisting) {
            return;
        }

        $collectionClassName = ExpertWhereTableMap::getTableMap()->getCollectionClassName();

        $this->collExpertWheres = new $collectionClassName;
        $this->collExpertWheres->setModel('\CryoConnectDB\ExpertWhere');
    }

    /**
     * Gets an array of ChildExpertWhere objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ChildExperts is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @return ObjectCollection|ChildExpertWhere[] List of ChildExpertWhere objects
     * @throws PropelException
     */
    public function getExpertWheres(Criteria $criteria = null, ConnectionInterface $con = null)
    {
        $partial = $this->collExpertWheresPartial && !$this->isNew();
        if (null === $this->collExpertWheres || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collExpertWheres) {
                // return empty collection
                $this->initExpertWheres();
            } else {
                $collExpertWheres = ChildExpertWhereQuery::create(null, $criteria)
                    ->filterByExperts($this)
                    ->find($con);

                if (null !== $criteria) {
                    if (false !== $this->collExpertWheresPartial && count($collExpertWheres)) {
                        $this->initExpertWheres(false);

                        foreach ($collExpertWheres as $obj) {
                            if (false == $this->collExpertWheres->contains($obj)) {
                                $this->collExpertWheres->append($obj);
                            }
                        }

                        $this->collExpertWheresPartial = true;
                    }

                    return $collExpertWheres;
                }

                if ($partial && $this->collExpertWheres) {
                    foreach ($this->collExpertWheres as $obj) {
                        if ($obj->isNew()) {
                            $collExpertWheres[] = $obj;
                        }
                    }
                }

                $this->collExpertWheres = $collExpertWheres;
                $this->collExpertWheresPartial = false;
            }
        }

        return $this->collExpertWheres;
    }

    /**
     * Sets a collection of ChildExpertWhere objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      Collection $expertWheres A Propel collection.
     * @param      ConnectionInterface $con Optional connection object
     * @return $this|ChildExperts The current object (for fluent API support)
     */
    public function setExpertWheres(Collection $expertWheres, ConnectionInterface $con = null)
    {
        /** @var ChildExpertWhere[] $expertWheresToDelete */
        $expertWheresToDelete = $this->getExpertWheres(new Criteria(), $con)->diff($expertWheres);


        $this->expertWheresScheduledForDeletion = $expertWheresToDelete;

        foreach ($expertWheresToDelete as $expertWhereRemoved) {
            $expertWhereRemoved->setExperts(null);
        }

        $this->collExpertWheres = null;
        foreach ($expertWheres as $expertWhere) {
            $this->addExpertWhere($expertWhere);
        }

        $this->collExpertWheres = $expertWheres;
        $this->collExpertWheresPartial = false;

        return $this;
    }

    /**
     * Returns the number of related ExpertWhere objects.
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct
     * @param      ConnectionInterface $con
     * @return int             Count of related ExpertWhere objects.
     * @throws PropelException
     */
    public function countExpertWheres(Criteria $criteria = null, $distinct = false, ConnectionInterface $con = null)
    {
        $partial = $this->collExpertWheresPartial && !$this->isNew();
        if (null === $this->collExpertWheres || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collExpertWheres) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getExpertWheres());
            }

            $query = ChildExpertWhereQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByExperts($this)
                ->count($con);
        }

        return count($this->collExpertWheres);
    }

    /**
     * Method called to associate a ChildExpertWhere object to this object
     * through the ChildExpertWhere foreign key attribute.
     *
     * @param  ChildExpertWhere $l ChildExpertWhere
     * @return $this|\CryoConnectDB\Experts The current object (for fluent API support)
     */
    public function addExpertWhere(ChildExpertWhere $l)
    {
        if ($this->collExpertWheres === null) {
            $this->initExpertWheres();
            $this->collExpertWheresPartial = true;
        }

        if (!$this->collExpertWheres->contains($l)) {
            $this->doAddExpertWhere($l);

            if ($this->expertWheresScheduledForDeletion and $this->expertWheresScheduledForDeletion->contains($l)) {
                $this->expertWheresScheduledForDeletion->remove($this->expertWheresScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param ChildExpertWhere $expertWhere The ChildExpertWhere object to add.
     */
    protected function doAddExpertWhere(ChildExpertWhere $expertWhere)
    {
        $this->collExpertWheres[]= $expertWhere;
        $expertWhere->setExperts($this);
    }

    /**
     * @param  ChildExpertWhere $expertWhere The ChildExpertWhere object to remove.
     * @return $this|ChildExperts The current object (for fluent API support)
     */
    public function removeExpertWhere(ChildExpertWhere $expertWhere)
    {
        if ($this->getExpertWheres()->contains($expertWhere)) {
            $pos = $this->collExpertWheres->search($expertWhere);
            $this->collExpertWheres->remove($pos);
            if (null === $this->expertWheresScheduledForDeletion) {
                $this->expertWheresScheduledForDeletion = clone $this->collExpertWheres;
                $this->expertWheresScheduledForDeletion->clear();
            }
            $this->expertWheresScheduledForDeletion[]= clone $expertWhere;
            $expertWhere->setExperts(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Experts is new, it will return
     * an empty collection; or if this Experts has previously
     * been saved, it will retrieve related ExpertWheres from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Experts.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildExpertWhere[] List of ChildExpertWhere objects
     */
    public function getExpertWheresJoinCryosphereWhere(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildExpertWhereQuery::create(null, $criteria);
        $query->joinWith('CryosphereWhere', $joinBehavior);

        return $this->getExpertWheres($query, $con);
    }

    /**
     * Clears the current object, sets all attributes to their default values and removes
     * outgoing references as well as back-references (from other objects to this one. Results probably in a database
     * change of those foreign objects when you call `save` there).
     */
    public function clear()
    {
        if (null !== $this->aCountries) {
            $this->aCountries->removeExperts($this);
        }
        $this->id = null;
        $this->first_name = null;
        $this->last_name = null;
        $this->email = null;
        $this->birth_year = null;
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
            if ($this->collCryosphereExpertMethodss) {
                foreach ($this->collCryosphereExpertMethodss as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collExpertAffiliations) {
                foreach ($this->collExpertAffiliations as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collExpertCareerStages) {
                foreach ($this->collExpertCareerStages as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collExpertContacts) {
                foreach ($this->collExpertContacts as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collExpertCryosphereWhats) {
                foreach ($this->collExpertCryosphereWhats as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collExpertCryosphereWhatSpecefics) {
                foreach ($this->collExpertCryosphereWhatSpecefics as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collExpertFieldWorks) {
                foreach ($this->collExpertFieldWorks as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collExpertLanguagess) {
                foreach ($this->collExpertLanguagess as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collExpertWhens) {
                foreach ($this->collExpertWhens as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collExpertWheres) {
                foreach ($this->collExpertWheres as $o) {
                    $o->clearAllReferences($deep);
                }
            }
        } // if ($deep)

        $this->collCryosphereExpertMethodss = null;
        $this->collExpertAffiliations = null;
        $this->collExpertCareerStages = null;
        $this->collExpertContacts = null;
        $this->collExpertCryosphereWhats = null;
        $this->collExpertCryosphereWhatSpecefics = null;
        $this->collExpertFieldWorks = null;
        $this->collExpertLanguagess = null;
        $this->collExpertWhens = null;
        $this->collExpertWheres = null;
        $this->aCountries = null;
    }

    /**
     * Return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(ExpertsTableMap::DEFAULT_STRING_FORMAT);
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
