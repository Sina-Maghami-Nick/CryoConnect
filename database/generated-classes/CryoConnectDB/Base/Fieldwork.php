<?php

namespace CryoConnectDB\Base;

use \DateTime;
use \Exception;
use \PDO;
use CryoConnectDB\CryosphereWhere as ChildCryosphereWhere;
use CryoConnectDB\CryosphereWhereQuery as ChildCryosphereWhereQuery;
use CryoConnectDB\Fieldwork as ChildFieldwork;
use CryoConnectDB\FieldworkInformationSeeker as ChildFieldworkInformationSeeker;
use CryoConnectDB\FieldworkInformationSeekerQuery as ChildFieldworkInformationSeekerQuery;
use CryoConnectDB\FieldworkInformationSeekerRequest as ChildFieldworkInformationSeekerRequest;
use CryoConnectDB\FieldworkInformationSeekerRequestQuery as ChildFieldworkInformationSeekerRequestQuery;
use CryoConnectDB\FieldworkQuery as ChildFieldworkQuery;
use CryoConnectDB\Map\FieldworkInformationSeekerRequestTableMap;
use CryoConnectDB\Map\FieldworkTableMap;
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
 * Base class that represents a row from the 'fieldwork' table.
 *
 *
 *
 * @package    propel.generator.CryoConnectDB.Base
 */
abstract class Fieldwork implements ActiveRecordInterface
{
    /**
     * TableMap class name
     */
    const TABLE_MAP = '\\CryoConnectDB\\Map\\FieldworkTableMap';


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
     * The value for the fieldwork_project_name field.
     *
     * @var        string
     */
    protected $fieldwork_project_name;

    /**
     * The value for the fieldwork_leader_name field.
     *
     * @var        string
     */
    protected $fieldwork_leader_name;

    /**
     * The value for the fieldwork_leader_affiliation field.
     *
     * @var        string
     */
    protected $fieldwork_leader_affiliation;

    /**
     * The value for the fieldwork_leader_website field.
     *
     * @var        string
     */
    protected $fieldwork_leader_website;

    /**
     * The value for the fieldwork_leader_email field.
     *
     * @var        string
     */
    protected $fieldwork_leader_email;

    /**
     * The value for the fieldwork_project_website field.
     *
     * @var        string
     */
    protected $fieldwork_project_website;

    /**
     * The value for the cryosphere_where_id field.
     *
     * @var        int
     */
    protected $cryosphere_where_id;

    /**
     * The value for the fieldwork_locations field.
     *
     * @var        string
     */
    protected $fieldwork_locations;

    /**
     * The value for the fieldwork_end_date field.
     *
     * @var        DateTime
     */
    protected $fieldwork_end_date;

    /**
     * The value for the fieldwork_start_date field.
     *
     * @var        DateTime
     */
    protected $fieldwork_start_date;

    /**
     * The value for the fieldwork_goal field.
     *
     * @var        string
     */
    protected $fieldwork_goal;

    /**
     * The value for the fieldwork_information_seeker_limit field.
     *
     * @var        int
     */
    protected $fieldwork_information_seeker_limit;

    /**
     * The value for the fieldwork_information_seeker_cost field.
     *
     * @var        int
     */
    protected $fieldwork_information_seeker_cost;

    /**
     * The value for the fieldwork_biding_allowed field.
     *
     * Note: this column has a database default value of: false
     * @var        boolean
     */
    protected $fieldwork_biding_allowed;

    /**
     * The value for the fieldwork_information_seeker_package_included field.
     *
     * @var        string
     */
    protected $fieldwork_information_seeker_package_included;

    /**
     * The value for the fieldwork_information_seeker_package_excluded field.
     *
     * @var        string
     */
    protected $fieldwork_information_seeker_package_excluded;

    /**
     * The value for the fieldwork_is_certain field.
     *
     * @var        boolean
     */
    protected $fieldwork_is_certain;

    /**
     * The value for the fieldwork_when_certain field.
     *
     * @var        DateTime
     */
    protected $fieldwork_when_certain;

    /**
     * The value for the field_information_seeker_announcement_date field.
     *
     * @var        DateTime
     */
    protected $field_information_seeker_announcement_date;

    /**
     * The value for the field_information_seeker_deadline field.
     *
     * @var        DateTime
     */
    protected $field_information_seeker_deadline;

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
     * @var        ChildCryosphereWhere
     */
    protected $aCryosphereWhere;

    /**
     * @var        ObjectCollection|ChildFieldworkInformationSeekerRequest[] Collection to store aggregation of ChildFieldworkInformationSeekerRequest objects.
     */
    protected $collFieldworkInformationSeekerRequests;
    protected $collFieldworkInformationSeekerRequestsPartial;

    /**
     * @var        ObjectCollection|ChildFieldworkInformationSeeker[] Cross Collection to store aggregation of ChildFieldworkInformationSeeker objects.
     */
    protected $collFieldworkInformationSeekers;

    /**
     * @var bool
     */
    protected $collFieldworkInformationSeekersPartial;

    /**
     * Flag to prevent endless save loop, if this object is referenced
     * by another object which falls in this transaction.
     *
     * @var boolean
     */
    protected $alreadyInSave = false;

    /**
     * An array of objects scheduled for deletion.
     * @var ObjectCollection|ChildFieldworkInformationSeeker[]
     */
    protected $fieldworkInformationSeekersScheduledForDeletion = null;

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
        $this->fieldwork_biding_allowed = false;
        $this->approved = false;
    }

    /**
     * Initializes internal state of CryoConnectDB\Base\Fieldwork object.
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
     * Compares this with another <code>Fieldwork</code> instance.  If
     * <code>obj</code> is an instance of <code>Fieldwork</code>, delegates to
     * <code>equals(Fieldwork)</code>.  Otherwise, returns <code>false</code>.
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
     * @return $this|Fieldwork The current object, for fluid interface
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
     * Get the [fieldwork_project_name] column value.
     *
     * @return string
     */
    public function getFieldworkName()
    {
        return $this->fieldwork_project_name;
    }

    /**
     * Get the [fieldwork_leader_name] column value.
     *
     * @return string
     */
    public function getFieldworkLeaderName()
    {
        return $this->fieldwork_leader_name;
    }

    /**
     * Get the [fieldwork_leader_affiliation] column value.
     *
     * @return string
     */
    public function getFieldworkLeaderAffiliation()
    {
        return $this->fieldwork_leader_affiliation;
    }

    /**
     * Get the [fieldwork_leader_website] column value.
     *
     * @return string
     */
    public function getFieldworkLeaderWebsite()
    {
        return $this->fieldwork_leader_website;
    }

    /**
     * Get the [fieldwork_leader_email] column value.
     *
     * @return string
     */
    public function getFieldworkLeaderEmail()
    {
        return $this->fieldwork_leader_email;
    }

    /**
     * Get the [fieldwork_project_website] column value.
     *
     * @return string
     */
    public function getFieldworkProjectWebsite()
    {
        return $this->fieldwork_project_website;
    }

    /**
     * Get the [cryosphere_where_id] column value.
     *
     * @return int
     */
    public function getCryosphereWhereId()
    {
        return $this->cryosphere_where_id;
    }

    /**
     * Get the [fieldwork_locations] column value.
     *
     * @return string
     */
    public function getFieldworkLocations()
    {
        return $this->fieldwork_locations;
    }

    /**
     * Get the [optionally formatted] temporal [fieldwork_end_date] column value.
     *
     *
     * @param      string|null $format The date/time format string (either date()-style or strftime()-style).
     *                            If format is NULL, then the raw DateTime object will be returned.
     *
     * @return string|DateTime Formatted date/time value as string or DateTime object (if format is NULL), NULL if column is NULL, and 0 if column value is 0000-00-00
     *
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getFieldworkEndDate($format = NULL)
    {
        if ($format === null) {
            return $this->fieldwork_end_date;
        } else {
            return $this->fieldwork_end_date instanceof \DateTimeInterface ? $this->fieldwork_end_date->format($format) : null;
        }
    }

    /**
     * Get the [optionally formatted] temporal [fieldwork_start_date] column value.
     *
     *
     * @param      string|null $format The date/time format string (either date()-style or strftime()-style).
     *                            If format is NULL, then the raw DateTime object will be returned.
     *
     * @return string|DateTime Formatted date/time value as string or DateTime object (if format is NULL), NULL if column is NULL, and 0 if column value is 0000-00-00
     *
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getFieldworkStartDate($format = NULL)
    {
        if ($format === null) {
            return $this->fieldwork_start_date;
        } else {
            return $this->fieldwork_start_date instanceof \DateTimeInterface ? $this->fieldwork_start_date->format($format) : null;
        }
    }

    /**
     * Get the [fieldwork_goal] column value.
     *
     * @return string
     */
    public function getFieldworkGoal()
    {
        return $this->fieldwork_goal;
    }

    /**
     * Get the [fieldwork_information_seeker_limit] column value.
     *
     * @return int
     */
    public function getFieldworkInformationSeekerLimit()
    {
        return $this->fieldwork_information_seeker_limit;
    }

    /**
     * Get the [fieldwork_information_seeker_cost] column value.
     *
     * @return int
     */
    public function getFieldworkInformationSeekerCost()
    {
        return $this->fieldwork_information_seeker_cost;
    }

    /**
     * Get the [fieldwork_biding_allowed] column value.
     *
     * @return boolean
     */
    public function getFieldworkBidingAllowed()
    {
        return $this->fieldwork_biding_allowed;
    }

    /**
     * Get the [fieldwork_biding_allowed] column value.
     *
     * @return boolean
     */
    public function isFieldworkBidingAllowed()
    {
        return $this->getFieldworkBidingAllowed();
    }

    /**
     * Get the [fieldwork_information_seeker_package_included] column value.
     *
     * @return string
     */
    public function getFieldworkInformationSeekerPackageIncluded()
    {
        return $this->fieldwork_information_seeker_package_included;
    }

    /**
     * Get the [fieldwork_information_seeker_package_excluded] column value.
     *
     * @return string
     */
    public function getFieldworkInformationSeekerPackageExcluded()
    {
        return $this->fieldwork_information_seeker_package_excluded;
    }

    /**
     * Get the [fieldwork_is_certain] column value.
     *
     * @return boolean
     */
    public function getFieldworkIsCertain()
    {
        return $this->fieldwork_is_certain;
    }

    /**
     * Get the [fieldwork_is_certain] column value.
     *
     * @return boolean
     */
    public function isFieldworkIsCertain()
    {
        return $this->getFieldworkIsCertain();
    }

    /**
     * Get the [optionally formatted] temporal [fieldwork_when_certain] column value.
     *
     *
     * @param      string|null $format The date/time format string (either date()-style or strftime()-style).
     *                            If format is NULL, then the raw DateTime object will be returned.
     *
     * @return string|DateTime Formatted date/time value as string or DateTime object (if format is NULL), NULL if column is NULL, and 0 if column value is 0000-00-00
     *
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getFieldworkWhenCertain($format = NULL)
    {
        if ($format === null) {
            return $this->fieldwork_when_certain;
        } else {
            return $this->fieldwork_when_certain instanceof \DateTimeInterface ? $this->fieldwork_when_certain->format($format) : null;
        }
    }

    /**
     * Get the [optionally formatted] temporal [field_information_seeker_announcement_date] column value.
     *
     *
     * @param      string|null $format The date/time format string (either date()-style or strftime()-style).
     *                            If format is NULL, then the raw DateTime object will be returned.
     *
     * @return string|DateTime Formatted date/time value as string or DateTime object (if format is NULL), NULL if column is NULL, and 0 if column value is 0000-00-00
     *
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getFieldworkInformationSeekerAnnouncementDate($format = NULL)
    {
        if ($format === null) {
            return $this->field_information_seeker_announcement_date;
        } else {
            return $this->field_information_seeker_announcement_date instanceof \DateTimeInterface ? $this->field_information_seeker_announcement_date->format($format) : null;
        }
    }

    /**
     * Get the [optionally formatted] temporal [field_information_seeker_deadline] column value.
     *
     *
     * @param      string|null $format The date/time format string (either date()-style or strftime()-style).
     *                            If format is NULL, then the raw DateTime object will be returned.
     *
     * @return string|DateTime Formatted date/time value as string or DateTime object (if format is NULL), NULL if column is NULL, and 0 if column value is 0000-00-00
     *
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getFieldworkInformationSeekerDeadline($format = NULL)
    {
        if ($format === null) {
            return $this->field_information_seeker_deadline;
        } else {
            return $this->field_information_seeker_deadline instanceof \DateTimeInterface ? $this->field_information_seeker_deadline->format($format) : null;
        }
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
     * @return $this|\CryoConnectDB\Fieldwork The current object (for fluent API support)
     */
    public function setId($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->id !== $v) {
            $this->id = $v;
            $this->modifiedColumns[FieldworkTableMap::COL_ID] = true;
        }

        return $this;
    } // setId()

    /**
     * Set the value of [fieldwork_project_name] column.
     *
     * @param string $v new value
     * @return $this|\CryoConnectDB\Fieldwork The current object (for fluent API support)
     */
    public function setFieldworkName($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->fieldwork_project_name !== $v) {
            $this->fieldwork_project_name = $v;
            $this->modifiedColumns[FieldworkTableMap::COL_FIELDWORK_PROJECT_NAME] = true;
        }

        return $this;
    } // setFieldworkName()

    /**
     * Set the value of [fieldwork_leader_name] column.
     *
     * @param string $v new value
     * @return $this|\CryoConnectDB\Fieldwork The current object (for fluent API support)
     */
    public function setFieldworkLeaderName($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->fieldwork_leader_name !== $v) {
            $this->fieldwork_leader_name = $v;
            $this->modifiedColumns[FieldworkTableMap::COL_FIELDWORK_LEADER_NAME] = true;
        }

        return $this;
    } // setFieldworkLeaderName()

    /**
     * Set the value of [fieldwork_leader_affiliation] column.
     *
     * @param string $v new value
     * @return $this|\CryoConnectDB\Fieldwork The current object (for fluent API support)
     */
    public function setFieldworkLeaderAffiliation($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->fieldwork_leader_affiliation !== $v) {
            $this->fieldwork_leader_affiliation = $v;
            $this->modifiedColumns[FieldworkTableMap::COL_FIELDWORK_LEADER_AFFILIATION] = true;
        }

        return $this;
    } // setFieldworkLeaderAffiliation()

    /**
     * Set the value of [fieldwork_leader_website] column.
     *
     * @param string $v new value
     * @return $this|\CryoConnectDB\Fieldwork The current object (for fluent API support)
     */
    public function setFieldworkLeaderWebsite($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->fieldwork_leader_website !== $v) {
            $this->fieldwork_leader_website = $v;
            $this->modifiedColumns[FieldworkTableMap::COL_FIELDWORK_LEADER_WEBSITE] = true;
        }

        return $this;
    } // setFieldworkLeaderWebsite()

    /**
     * Set the value of [fieldwork_leader_email] column.
     *
     * @param string $v new value
     * @return $this|\CryoConnectDB\Fieldwork The current object (for fluent API support)
     */
    public function setFieldworkLeaderEmail($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->fieldwork_leader_email !== $v) {
            $this->fieldwork_leader_email = $v;
            $this->modifiedColumns[FieldworkTableMap::COL_FIELDWORK_LEADER_EMAIL] = true;
        }

        return $this;
    } // setFieldworkLeaderEmail()

    /**
     * Set the value of [fieldwork_project_website] column.
     *
     * @param string $v new value
     * @return $this|\CryoConnectDB\Fieldwork The current object (for fluent API support)
     */
    public function setFieldworkProjectWebsite($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->fieldwork_project_website !== $v) {
            $this->fieldwork_project_website = $v;
            $this->modifiedColumns[FieldworkTableMap::COL_FIELDWORK_PROJECT_WEBSITE] = true;
        }

        return $this;
    } // setFieldworkProjectWebsite()

    /**
     * Set the value of [cryosphere_where_id] column.
     *
     * @param int $v new value
     * @return $this|\CryoConnectDB\Fieldwork The current object (for fluent API support)
     */
    public function setCryosphereWhereId($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->cryosphere_where_id !== $v) {
            $this->cryosphere_where_id = $v;
            $this->modifiedColumns[FieldworkTableMap::COL_CRYOSPHERE_WHERE_ID] = true;
        }

        if ($this->aCryosphereWhere !== null && $this->aCryosphereWhere->getId() !== $v) {
            $this->aCryosphereWhere = null;
        }

        return $this;
    } // setCryosphereWhereId()

    /**
     * Set the value of [fieldwork_locations] column.
     *
     * @param string $v new value
     * @return $this|\CryoConnectDB\Fieldwork The current object (for fluent API support)
     */
    public function setFieldworkLocations($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->fieldwork_locations !== $v) {
            $this->fieldwork_locations = $v;
            $this->modifiedColumns[FieldworkTableMap::COL_FIELDWORK_LOCATIONS] = true;
        }

        return $this;
    } // setFieldworkLocations()

    /**
     * Sets the value of [fieldwork_end_date] column to a normalized version of the date/time value specified.
     *
     * @param  mixed $v string, integer (timestamp), or \DateTimeInterface value.
     *               Empty strings are treated as NULL.
     * @return $this|\CryoConnectDB\Fieldwork The current object (for fluent API support)
     */
    public function setFieldworkEndDate($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->fieldwork_end_date !== null || $dt !== null) {
            if ($this->fieldwork_end_date === null || $dt === null || $dt->format("Y-m-d") !== $this->fieldwork_end_date->format("Y-m-d")) {
                $this->fieldwork_end_date = $dt === null ? null : clone $dt;
                $this->modifiedColumns[FieldworkTableMap::COL_FIELDWORK_END_DATE] = true;
            }
        } // if either are not null

        return $this;
    } // setFieldworkEndDate()

    /**
     * Sets the value of [fieldwork_start_date] column to a normalized version of the date/time value specified.
     *
     * @param  mixed $v string, integer (timestamp), or \DateTimeInterface value.
     *               Empty strings are treated as NULL.
     * @return $this|\CryoConnectDB\Fieldwork The current object (for fluent API support)
     */
    public function setFieldworkStartDate($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->fieldwork_start_date !== null || $dt !== null) {
            if ($this->fieldwork_start_date === null || $dt === null || $dt->format("Y-m-d") !== $this->fieldwork_start_date->format("Y-m-d")) {
                $this->fieldwork_start_date = $dt === null ? null : clone $dt;
                $this->modifiedColumns[FieldworkTableMap::COL_FIELDWORK_START_DATE] = true;
            }
        } // if either are not null

        return $this;
    } // setFieldworkStartDate()

    /**
     * Set the value of [fieldwork_goal] column.
     *
     * @param string $v new value
     * @return $this|\CryoConnectDB\Fieldwork The current object (for fluent API support)
     */
    public function setFieldworkGoal($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->fieldwork_goal !== $v) {
            $this->fieldwork_goal = $v;
            $this->modifiedColumns[FieldworkTableMap::COL_FIELDWORK_GOAL] = true;
        }

        return $this;
    } // setFieldworkGoal()

    /**
     * Set the value of [fieldwork_information_seeker_limit] column.
     *
     * @param int $v new value
     * @return $this|\CryoConnectDB\Fieldwork The current object (for fluent API support)
     */
    public function setFieldworkInformationSeekerLimit($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->fieldwork_information_seeker_limit !== $v) {
            $this->fieldwork_information_seeker_limit = $v;
            $this->modifiedColumns[FieldworkTableMap::COL_FIELDWORK_INFORMATION_SEEKER_LIMIT] = true;
        }

        return $this;
    } // setFieldworkInformationSeekerLimit()

    /**
     * Set the value of [fieldwork_information_seeker_cost] column.
     *
     * @param int $v new value
     * @return $this|\CryoConnectDB\Fieldwork The current object (for fluent API support)
     */
    public function setFieldworkInformationSeekerCost($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->fieldwork_information_seeker_cost !== $v) {
            $this->fieldwork_information_seeker_cost = $v;
            $this->modifiedColumns[FieldworkTableMap::COL_FIELDWORK_INFORMATION_SEEKER_COST] = true;
        }

        return $this;
    } // setFieldworkInformationSeekerCost()

    /**
     * Sets the value of the [fieldwork_biding_allowed] column.
     * Non-boolean arguments are converted using the following rules:
     *   * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *   * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     * Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     *
     * @param  boolean|integer|string $v The new value
     * @return $this|\CryoConnectDB\Fieldwork The current object (for fluent API support)
     */
    public function setFieldworkBidingAllowed($v)
    {
        if ($v !== null) {
            if (is_string($v)) {
                $v = in_array(strtolower($v), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
            } else {
                $v = (boolean) $v;
            }
        }

        if ($this->fieldwork_biding_allowed !== $v) {
            $this->fieldwork_biding_allowed = $v;
            $this->modifiedColumns[FieldworkTableMap::COL_FIELDWORK_BIDING_ALLOWED] = true;
        }

        return $this;
    } // setFieldworkBidingAllowed()

    /**
     * Set the value of [fieldwork_information_seeker_package_included] column.
     *
     * @param string $v new value
     * @return $this|\CryoConnectDB\Fieldwork The current object (for fluent API support)
     */
    public function setFieldworkInformationSeekerPackageIncluded($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->fieldwork_information_seeker_package_included !== $v) {
            $this->fieldwork_information_seeker_package_included = $v;
            $this->modifiedColumns[FieldworkTableMap::COL_FIELDWORK_INFORMATION_SEEKER_PACKAGE_INCLUDED] = true;
        }

        return $this;
    } // setFieldworkInformationSeekerPackageIncluded()

    /**
     * Set the value of [fieldwork_information_seeker_package_excluded] column.
     *
     * @param string $v new value
     * @return $this|\CryoConnectDB\Fieldwork The current object (for fluent API support)
     */
    public function setFieldworkInformationSeekerPackageExcluded($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->fieldwork_information_seeker_package_excluded !== $v) {
            $this->fieldwork_information_seeker_package_excluded = $v;
            $this->modifiedColumns[FieldworkTableMap::COL_FIELDWORK_INFORMATION_SEEKER_PACKAGE_EXCLUDED] = true;
        }

        return $this;
    } // setFieldworkInformationSeekerPackageExcluded()

    /**
     * Sets the value of the [fieldwork_is_certain] column.
     * Non-boolean arguments are converted using the following rules:
     *   * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *   * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     * Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     *
     * @param  boolean|integer|string $v The new value
     * @return $this|\CryoConnectDB\Fieldwork The current object (for fluent API support)
     */
    public function setFieldworkIsCertain($v)
    {
        if ($v !== null) {
            if (is_string($v)) {
                $v = in_array(strtolower($v), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
            } else {
                $v = (boolean) $v;
            }
        }

        if ($this->fieldwork_is_certain !== $v) {
            $this->fieldwork_is_certain = $v;
            $this->modifiedColumns[FieldworkTableMap::COL_FIELDWORK_IS_CERTAIN] = true;
        }

        return $this;
    } // setFieldworkIsCertain()

    /**
     * Sets the value of [fieldwork_when_certain] column to a normalized version of the date/time value specified.
     *
     * @param  mixed $v string, integer (timestamp), or \DateTimeInterface value.
     *               Empty strings are treated as NULL.
     * @return $this|\CryoConnectDB\Fieldwork The current object (for fluent API support)
     */
    public function setFieldworkWhenCertain($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->fieldwork_when_certain !== null || $dt !== null) {
            if ($this->fieldwork_when_certain === null || $dt === null || $dt->format("Y-m-d") !== $this->fieldwork_when_certain->format("Y-m-d")) {
                $this->fieldwork_when_certain = $dt === null ? null : clone $dt;
                $this->modifiedColumns[FieldworkTableMap::COL_FIELDWORK_WHEN_CERTAIN] = true;
            }
        } // if either are not null

        return $this;
    } // setFieldworkWhenCertain()

    /**
     * Sets the value of [field_information_seeker_announcement_date] column to a normalized version of the date/time value specified.
     *
     * @param  mixed $v string, integer (timestamp), or \DateTimeInterface value.
     *               Empty strings are treated as NULL.
     * @return $this|\CryoConnectDB\Fieldwork The current object (for fluent API support)
     */
    public function setFieldworkInformationSeekerAnnouncementDate($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->field_information_seeker_announcement_date !== null || $dt !== null) {
            if ($this->field_information_seeker_announcement_date === null || $dt === null || $dt->format("Y-m-d") !== $this->field_information_seeker_announcement_date->format("Y-m-d")) {
                $this->field_information_seeker_announcement_date = $dt === null ? null : clone $dt;
                $this->modifiedColumns[FieldworkTableMap::COL_FIELD_INFORMATION_SEEKER_ANNOUNCEMENT_DATE] = true;
            }
        } // if either are not null

        return $this;
    } // setFieldworkInformationSeekerAnnouncementDate()

    /**
     * Sets the value of [field_information_seeker_deadline] column to a normalized version of the date/time value specified.
     *
     * @param  mixed $v string, integer (timestamp), or \DateTimeInterface value.
     *               Empty strings are treated as NULL.
     * @return $this|\CryoConnectDB\Fieldwork The current object (for fluent API support)
     */
    public function setFieldworkInformationSeekerDeadline($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->field_information_seeker_deadline !== null || $dt !== null) {
            if ($this->field_information_seeker_deadline === null || $dt === null || $dt->format("Y-m-d") !== $this->field_information_seeker_deadline->format("Y-m-d")) {
                $this->field_information_seeker_deadline = $dt === null ? null : clone $dt;
                $this->modifiedColumns[FieldworkTableMap::COL_FIELD_INFORMATION_SEEKER_DEADLINE] = true;
            }
        } // if either are not null

        return $this;
    } // setFieldworkInformationSeekerDeadline()

    /**
     * Sets the value of the [approved] column.
     * Non-boolean arguments are converted using the following rules:
     *   * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *   * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     * Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     *
     * @param  boolean|integer|string $v The new value
     * @return $this|\CryoConnectDB\Fieldwork The current object (for fluent API support)
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
            $this->modifiedColumns[FieldworkTableMap::COL_APPROVED] = true;
        }

        return $this;
    } // setApproved()

    /**
     * Sets the value of [timestamp] column to a normalized version of the date/time value specified.
     *
     * @param  mixed $v string, integer (timestamp), or \DateTimeInterface value.
     *               Empty strings are treated as NULL.
     * @return $this|\CryoConnectDB\Fieldwork The current object (for fluent API support)
     */
    public function setTimestamp($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->timestamp !== null || $dt !== null) {
            if ($this->timestamp === null || $dt === null || $dt->format("Y-m-d H:i:s.u") !== $this->timestamp->format("Y-m-d H:i:s.u")) {
                $this->timestamp = $dt === null ? null : clone $dt;
                $this->modifiedColumns[FieldworkTableMap::COL_TIMESTAMP] = true;
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
            if ($this->fieldwork_biding_allowed !== false) {
                return false;
            }

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

            $col = $row[TableMap::TYPE_NUM == $indexType ? 0 + $startcol : FieldworkTableMap::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)];
            $this->id = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 1 + $startcol : FieldworkTableMap::translateFieldName('FieldworkName', TableMap::TYPE_PHPNAME, $indexType)];
            $this->fieldwork_project_name = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 2 + $startcol : FieldworkTableMap::translateFieldName('FieldworkLeaderName', TableMap::TYPE_PHPNAME, $indexType)];
            $this->fieldwork_leader_name = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 3 + $startcol : FieldworkTableMap::translateFieldName('FieldworkLeaderAffiliation', TableMap::TYPE_PHPNAME, $indexType)];
            $this->fieldwork_leader_affiliation = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 4 + $startcol : FieldworkTableMap::translateFieldName('FieldworkLeaderWebsite', TableMap::TYPE_PHPNAME, $indexType)];
            $this->fieldwork_leader_website = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 5 + $startcol : FieldworkTableMap::translateFieldName('FieldworkLeaderEmail', TableMap::TYPE_PHPNAME, $indexType)];
            $this->fieldwork_leader_email = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 6 + $startcol : FieldworkTableMap::translateFieldName('FieldworkProjectWebsite', TableMap::TYPE_PHPNAME, $indexType)];
            $this->fieldwork_project_website = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 7 + $startcol : FieldworkTableMap::translateFieldName('CryosphereWhereId', TableMap::TYPE_PHPNAME, $indexType)];
            $this->cryosphere_where_id = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 8 + $startcol : FieldworkTableMap::translateFieldName('FieldworkLocations', TableMap::TYPE_PHPNAME, $indexType)];
            $this->fieldwork_locations = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 9 + $startcol : FieldworkTableMap::translateFieldName('FieldworkEndDate', TableMap::TYPE_PHPNAME, $indexType)];
            if ($col === '0000-00-00') {
                $col = null;
            }
            $this->fieldwork_end_date = (null !== $col) ? PropelDateTime::newInstance($col, null, 'DateTime') : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 10 + $startcol : FieldworkTableMap::translateFieldName('FieldworkStartDate', TableMap::TYPE_PHPNAME, $indexType)];
            if ($col === '0000-00-00') {
                $col = null;
            }
            $this->fieldwork_start_date = (null !== $col) ? PropelDateTime::newInstance($col, null, 'DateTime') : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 11 + $startcol : FieldworkTableMap::translateFieldName('FieldworkGoal', TableMap::TYPE_PHPNAME, $indexType)];
            $this->fieldwork_goal = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 12 + $startcol : FieldworkTableMap::translateFieldName('FieldworkInformationSeekerLimit', TableMap::TYPE_PHPNAME, $indexType)];
            $this->fieldwork_information_seeker_limit = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 13 + $startcol : FieldworkTableMap::translateFieldName('FieldworkInformationSeekerCost', TableMap::TYPE_PHPNAME, $indexType)];
            $this->fieldwork_information_seeker_cost = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 14 + $startcol : FieldworkTableMap::translateFieldName('FieldworkBidingAllowed', TableMap::TYPE_PHPNAME, $indexType)];
            $this->fieldwork_biding_allowed = (null !== $col) ? (boolean) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 15 + $startcol : FieldworkTableMap::translateFieldName('FieldworkInformationSeekerPackageIncluded', TableMap::TYPE_PHPNAME, $indexType)];
            $this->fieldwork_information_seeker_package_included = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 16 + $startcol : FieldworkTableMap::translateFieldName('FieldworkInformationSeekerPackageExcluded', TableMap::TYPE_PHPNAME, $indexType)];
            $this->fieldwork_information_seeker_package_excluded = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 17 + $startcol : FieldworkTableMap::translateFieldName('FieldworkIsCertain', TableMap::TYPE_PHPNAME, $indexType)];
            $this->fieldwork_is_certain = (null !== $col) ? (boolean) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 18 + $startcol : FieldworkTableMap::translateFieldName('FieldworkWhenCertain', TableMap::TYPE_PHPNAME, $indexType)];
            if ($col === '0000-00-00') {
                $col = null;
            }
            $this->fieldwork_when_certain = (null !== $col) ? PropelDateTime::newInstance($col, null, 'DateTime') : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 19 + $startcol : FieldworkTableMap::translateFieldName('FieldworkInformationSeekerAnnouncementDate', TableMap::TYPE_PHPNAME, $indexType)];
            if ($col === '0000-00-00') {
                $col = null;
            }
            $this->field_information_seeker_announcement_date = (null !== $col) ? PropelDateTime::newInstance($col, null, 'DateTime') : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 20 + $startcol : FieldworkTableMap::translateFieldName('FieldworkInformationSeekerDeadline', TableMap::TYPE_PHPNAME, $indexType)];
            if ($col === '0000-00-00') {
                $col = null;
            }
            $this->field_information_seeker_deadline = (null !== $col) ? PropelDateTime::newInstance($col, null, 'DateTime') : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 21 + $startcol : FieldworkTableMap::translateFieldName('Approved', TableMap::TYPE_PHPNAME, $indexType)];
            $this->approved = (null !== $col) ? (boolean) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 22 + $startcol : FieldworkTableMap::translateFieldName('Timestamp', TableMap::TYPE_PHPNAME, $indexType)];
            if ($col === '0000-00-00 00:00:00') {
                $col = null;
            }
            $this->timestamp = (null !== $col) ? PropelDateTime::newInstance($col, null, 'DateTime') : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }

            return $startcol + 23; // 23 = FieldworkTableMap::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException(sprintf('Error populating %s object', '\\CryoConnectDB\\Fieldwork'), 0, $e);
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
        if ($this->aCryosphereWhere !== null && $this->cryosphere_where_id !== $this->aCryosphereWhere->getId()) {
            $this->aCryosphereWhere = null;
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
            $con = Propel::getServiceContainer()->getReadConnection(FieldworkTableMap::DATABASE_NAME);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $dataFetcher = ChildFieldworkQuery::create(null, $this->buildPkeyCriteria())->setFormatter(ModelCriteria::FORMAT_STATEMENT)->find($con);
        $row = $dataFetcher->fetch();
        $dataFetcher->close();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true, $dataFetcher->getIndexType()); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->aCryosphereWhere = null;
            $this->collFieldworkInformationSeekerRequests = null;

            $this->collFieldworkInformationSeekers = null;
        } // if (deep)
    }

    /**
     * Removes this object from datastore and sets delete attribute.
     *
     * @param      ConnectionInterface $con
     * @return void
     * @throws PropelException
     * @see Fieldwork::setDeleted()
     * @see Fieldwork::isDeleted()
     */
    public function delete(ConnectionInterface $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("This object has already been deleted.");
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getWriteConnection(FieldworkTableMap::DATABASE_NAME);
        }

        $con->transaction(function () use ($con) {
            $deleteQuery = ChildFieldworkQuery::create()
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
            $con = Propel::getServiceContainer()->getWriteConnection(FieldworkTableMap::DATABASE_NAME);
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
                FieldworkTableMap::addInstanceToPool($this);
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

            if ($this->aCryosphereWhere !== null) {
                if ($this->aCryosphereWhere->isModified() || $this->aCryosphereWhere->isNew()) {
                    $affectedRows += $this->aCryosphereWhere->save($con);
                }
                $this->setCryosphereWhere($this->aCryosphereWhere);
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

            if ($this->fieldworkInformationSeekersScheduledForDeletion !== null) {
                if (!$this->fieldworkInformationSeekersScheduledForDeletion->isEmpty()) {
                    $pks = array();
                    foreach ($this->fieldworkInformationSeekersScheduledForDeletion as $entry) {
                        $entryPk = [];

                        $entryPk[1] = $this->getId();
                        $entryPk[0] = $entry->getId();
                        $pks[] = $entryPk;
                    }

                    \CryoConnectDB\FieldworkInformationSeekerRequestQuery::create()
                        ->filterByPrimaryKeys($pks)
                        ->delete($con);

                    $this->fieldworkInformationSeekersScheduledForDeletion = null;
                }

            }

            if ($this->collFieldworkInformationSeekers) {
                foreach ($this->collFieldworkInformationSeekers as $fieldworkInformationSeeker) {
                    if (!$fieldworkInformationSeeker->isDeleted() && ($fieldworkInformationSeeker->isNew() || $fieldworkInformationSeeker->isModified())) {
                        $fieldworkInformationSeeker->save($con);
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

        $this->modifiedColumns[FieldworkTableMap::COL_ID] = true;
        if (null !== $this->id) {
            throw new PropelException('Cannot insert a value for auto-increment primary key (' . FieldworkTableMap::COL_ID . ')');
        }

         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(FieldworkTableMap::COL_ID)) {
            $modifiedColumns[':p' . $index++]  = 'id';
        }
        if ($this->isColumnModified(FieldworkTableMap::COL_FIELDWORK_PROJECT_NAME)) {
            $modifiedColumns[':p' . $index++]  = 'fieldwork_project_name';
        }
        if ($this->isColumnModified(FieldworkTableMap::COL_FIELDWORK_LEADER_NAME)) {
            $modifiedColumns[':p' . $index++]  = 'fieldwork_leader_name';
        }
        if ($this->isColumnModified(FieldworkTableMap::COL_FIELDWORK_LEADER_AFFILIATION)) {
            $modifiedColumns[':p' . $index++]  = 'fieldwork_leader_affiliation';
        }
        if ($this->isColumnModified(FieldworkTableMap::COL_FIELDWORK_LEADER_WEBSITE)) {
            $modifiedColumns[':p' . $index++]  = 'fieldwork_leader_website';
        }
        if ($this->isColumnModified(FieldworkTableMap::COL_FIELDWORK_LEADER_EMAIL)) {
            $modifiedColumns[':p' . $index++]  = 'fieldwork_leader_email';
        }
        if ($this->isColumnModified(FieldworkTableMap::COL_FIELDWORK_PROJECT_WEBSITE)) {
            $modifiedColumns[':p' . $index++]  = 'fieldwork_project_website';
        }
        if ($this->isColumnModified(FieldworkTableMap::COL_CRYOSPHERE_WHERE_ID)) {
            $modifiedColumns[':p' . $index++]  = 'cryosphere_where_id';
        }
        if ($this->isColumnModified(FieldworkTableMap::COL_FIELDWORK_LOCATIONS)) {
            $modifiedColumns[':p' . $index++]  = 'fieldwork_locations';
        }
        if ($this->isColumnModified(FieldworkTableMap::COL_FIELDWORK_END_DATE)) {
            $modifiedColumns[':p' . $index++]  = 'fieldwork_end_date';
        }
        if ($this->isColumnModified(FieldworkTableMap::COL_FIELDWORK_START_DATE)) {
            $modifiedColumns[':p' . $index++]  = 'fieldwork_start_date';
        }
        if ($this->isColumnModified(FieldworkTableMap::COL_FIELDWORK_GOAL)) {
            $modifiedColumns[':p' . $index++]  = 'fieldwork_goal';
        }
        if ($this->isColumnModified(FieldworkTableMap::COL_FIELDWORK_INFORMATION_SEEKER_LIMIT)) {
            $modifiedColumns[':p' . $index++]  = 'fieldwork_information_seeker_limit';
        }
        if ($this->isColumnModified(FieldworkTableMap::COL_FIELDWORK_INFORMATION_SEEKER_COST)) {
            $modifiedColumns[':p' . $index++]  = 'fieldwork_information_seeker_cost';
        }
        if ($this->isColumnModified(FieldworkTableMap::COL_FIELDWORK_BIDING_ALLOWED)) {
            $modifiedColumns[':p' . $index++]  = 'fieldwork_biding_allowed';
        }
        if ($this->isColumnModified(FieldworkTableMap::COL_FIELDWORK_INFORMATION_SEEKER_PACKAGE_INCLUDED)) {
            $modifiedColumns[':p' . $index++]  = 'fieldwork_information_seeker_package_included';
        }
        if ($this->isColumnModified(FieldworkTableMap::COL_FIELDWORK_INFORMATION_SEEKER_PACKAGE_EXCLUDED)) {
            $modifiedColumns[':p' . $index++]  = 'fieldwork_information_seeker_package_excluded';
        }
        if ($this->isColumnModified(FieldworkTableMap::COL_FIELDWORK_IS_CERTAIN)) {
            $modifiedColumns[':p' . $index++]  = 'fieldwork_is_certain';
        }
        if ($this->isColumnModified(FieldworkTableMap::COL_FIELDWORK_WHEN_CERTAIN)) {
            $modifiedColumns[':p' . $index++]  = 'fieldwork_when_certain';
        }
        if ($this->isColumnModified(FieldworkTableMap::COL_FIELD_INFORMATION_SEEKER_ANNOUNCEMENT_DATE)) {
            $modifiedColumns[':p' . $index++]  = 'field_information_seeker_announcement_date';
        }
        if ($this->isColumnModified(FieldworkTableMap::COL_FIELD_INFORMATION_SEEKER_DEADLINE)) {
            $modifiedColumns[':p' . $index++]  = 'field_information_seeker_deadline';
        }
        if ($this->isColumnModified(FieldworkTableMap::COL_APPROVED)) {
            $modifiedColumns[':p' . $index++]  = 'approved';
        }
        if ($this->isColumnModified(FieldworkTableMap::COL_TIMESTAMP)) {
            $modifiedColumns[':p' . $index++]  = 'timestamp';
        }

        $sql = sprintf(
            'INSERT INTO fieldwork (%s) VALUES (%s)',
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
                    case 'fieldwork_project_name':
                        $stmt->bindValue($identifier, $this->fieldwork_project_name, PDO::PARAM_STR);
                        break;
                    case 'fieldwork_leader_name':
                        $stmt->bindValue($identifier, $this->fieldwork_leader_name, PDO::PARAM_STR);
                        break;
                    case 'fieldwork_leader_affiliation':
                        $stmt->bindValue($identifier, $this->fieldwork_leader_affiliation, PDO::PARAM_STR);
                        break;
                    case 'fieldwork_leader_website':
                        $stmt->bindValue($identifier, $this->fieldwork_leader_website, PDO::PARAM_STR);
                        break;
                    case 'fieldwork_leader_email':
                        $stmt->bindValue($identifier, $this->fieldwork_leader_email, PDO::PARAM_STR);
                        break;
                    case 'fieldwork_project_website':
                        $stmt->bindValue($identifier, $this->fieldwork_project_website, PDO::PARAM_STR);
                        break;
                    case 'cryosphere_where_id':
                        $stmt->bindValue($identifier, $this->cryosphere_where_id, PDO::PARAM_INT);
                        break;
                    case 'fieldwork_locations':
                        $stmt->bindValue($identifier, $this->fieldwork_locations, PDO::PARAM_STR);
                        break;
                    case 'fieldwork_end_date':
                        $stmt->bindValue($identifier, $this->fieldwork_end_date ? $this->fieldwork_end_date->format("Y-m-d H:i:s.u") : null, PDO::PARAM_STR);
                        break;
                    case 'fieldwork_start_date':
                        $stmt->bindValue($identifier, $this->fieldwork_start_date ? $this->fieldwork_start_date->format("Y-m-d H:i:s.u") : null, PDO::PARAM_STR);
                        break;
                    case 'fieldwork_goal':
                        $stmt->bindValue($identifier, $this->fieldwork_goal, PDO::PARAM_STR);
                        break;
                    case 'fieldwork_information_seeker_limit':
                        $stmt->bindValue($identifier, $this->fieldwork_information_seeker_limit, PDO::PARAM_INT);
                        break;
                    case 'fieldwork_information_seeker_cost':
                        $stmt->bindValue($identifier, $this->fieldwork_information_seeker_cost, PDO::PARAM_INT);
                        break;
                    case 'fieldwork_biding_allowed':
                        $stmt->bindValue($identifier, (int) $this->fieldwork_biding_allowed, PDO::PARAM_INT);
                        break;
                    case 'fieldwork_information_seeker_package_included':
                        $stmt->bindValue($identifier, $this->fieldwork_information_seeker_package_included, PDO::PARAM_STR);
                        break;
                    case 'fieldwork_information_seeker_package_excluded':
                        $stmt->bindValue($identifier, $this->fieldwork_information_seeker_package_excluded, PDO::PARAM_STR);
                        break;
                    case 'fieldwork_is_certain':
                        $stmt->bindValue($identifier, (int) $this->fieldwork_is_certain, PDO::PARAM_INT);
                        break;
                    case 'fieldwork_when_certain':
                        $stmt->bindValue($identifier, $this->fieldwork_when_certain ? $this->fieldwork_when_certain->format("Y-m-d H:i:s.u") : null, PDO::PARAM_STR);
                        break;
                    case 'field_information_seeker_announcement_date':
                        $stmt->bindValue($identifier, $this->field_information_seeker_announcement_date ? $this->field_information_seeker_announcement_date->format("Y-m-d H:i:s.u") : null, PDO::PARAM_STR);
                        break;
                    case 'field_information_seeker_deadline':
                        $stmt->bindValue($identifier, $this->field_information_seeker_deadline ? $this->field_information_seeker_deadline->format("Y-m-d H:i:s.u") : null, PDO::PARAM_STR);
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
        $pos = FieldworkTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);
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
                return $this->getFieldworkName();
                break;
            case 2:
                return $this->getFieldworkLeaderName();
                break;
            case 3:
                return $this->getFieldworkLeaderAffiliation();
                break;
            case 4:
                return $this->getFieldworkLeaderWebsite();
                break;
            case 5:
                return $this->getFieldworkLeaderEmail();
                break;
            case 6:
                return $this->getFieldworkProjectWebsite();
                break;
            case 7:
                return $this->getCryosphereWhereId();
                break;
            case 8:
                return $this->getFieldworkLocations();
                break;
            case 9:
                return $this->getFieldworkEndDate();
                break;
            case 10:
                return $this->getFieldworkStartDate();
                break;
            case 11:
                return $this->getFieldworkGoal();
                break;
            case 12:
                return $this->getFieldworkInformationSeekerLimit();
                break;
            case 13:
                return $this->getFieldworkInformationSeekerCost();
                break;
            case 14:
                return $this->getFieldworkBidingAllowed();
                break;
            case 15:
                return $this->getFieldworkInformationSeekerPackageIncluded();
                break;
            case 16:
                return $this->getFieldworkInformationSeekerPackageExcluded();
                break;
            case 17:
                return $this->getFieldworkIsCertain();
                break;
            case 18:
                return $this->getFieldworkWhenCertain();
                break;
            case 19:
                return $this->getFieldworkInformationSeekerAnnouncementDate();
                break;
            case 20:
                return $this->getFieldworkInformationSeekerDeadline();
                break;
            case 21:
                return $this->getApproved();
                break;
            case 22:
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

        if (isset($alreadyDumpedObjects['Fieldwork'][$this->hashCode()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['Fieldwork'][$this->hashCode()] = true;
        $keys = FieldworkTableMap::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getId(),
            $keys[1] => $this->getFieldworkName(),
            $keys[2] => $this->getFieldworkLeaderName(),
            $keys[3] => $this->getFieldworkLeaderAffiliation(),
            $keys[4] => $this->getFieldworkLeaderWebsite(),
            $keys[5] => $this->getFieldworkLeaderEmail(),
            $keys[6] => $this->getFieldworkProjectWebsite(),
            $keys[7] => $this->getCryosphereWhereId(),
            $keys[8] => $this->getFieldworkLocations(),
            $keys[9] => $this->getFieldworkEndDate(),
            $keys[10] => $this->getFieldworkStartDate(),
            $keys[11] => $this->getFieldworkGoal(),
            $keys[12] => $this->getFieldworkInformationSeekerLimit(),
            $keys[13] => $this->getFieldworkInformationSeekerCost(),
            $keys[14] => $this->getFieldworkBidingAllowed(),
            $keys[15] => $this->getFieldworkInformationSeekerPackageIncluded(),
            $keys[16] => $this->getFieldworkInformationSeekerPackageExcluded(),
            $keys[17] => $this->getFieldworkIsCertain(),
            $keys[18] => $this->getFieldworkWhenCertain(),
            $keys[19] => $this->getFieldworkInformationSeekerAnnouncementDate(),
            $keys[20] => $this->getFieldworkInformationSeekerDeadline(),
            $keys[21] => $this->getApproved(),
            $keys[22] => $this->getTimestamp(),
        );
        if ($result[$keys[9]] instanceof \DateTimeInterface) {
            $result[$keys[9]] = $result[$keys[9]]->format('c');
        }

        if ($result[$keys[10]] instanceof \DateTimeInterface) {
            $result[$keys[10]] = $result[$keys[10]]->format('c');
        }

        if ($result[$keys[18]] instanceof \DateTimeInterface) {
            $result[$keys[18]] = $result[$keys[18]]->format('c');
        }

        if ($result[$keys[19]] instanceof \DateTimeInterface) {
            $result[$keys[19]] = $result[$keys[19]]->format('c');
        }

        if ($result[$keys[20]] instanceof \DateTimeInterface) {
            $result[$keys[20]] = $result[$keys[20]]->format('c');
        }

        if ($result[$keys[22]] instanceof \DateTimeInterface) {
            $result[$keys[22]] = $result[$keys[22]]->format('c');
        }

        $virtualColumns = $this->virtualColumns;
        foreach ($virtualColumns as $key => $virtualColumn) {
            $result[$key] = $virtualColumn;
        }

        if ($includeForeignObjects) {
            if (null !== $this->aCryosphereWhere) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'cryosphereWhere';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'cryosphere_where';
                        break;
                    default:
                        $key = 'CryosphereWhere';
                }

                $result[$key] = $this->aCryosphereWhere->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
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
     * @return $this|\CryoConnectDB\Fieldwork
     */
    public function setByName($name, $value, $type = TableMap::TYPE_PHPNAME)
    {
        $pos = FieldworkTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);

        return $this->setByPosition($pos, $value);
    }

    /**
     * Sets a field from the object by Position as specified in the xml schema.
     * Zero-based.
     *
     * @param  int $pos position in xml schema
     * @param  mixed $value field value
     * @return $this|\CryoConnectDB\Fieldwork
     */
    public function setByPosition($pos, $value)
    {
        switch ($pos) {
            case 0:
                $this->setId($value);
                break;
            case 1:
                $this->setFieldworkName($value);
                break;
            case 2:
                $this->setFieldworkLeaderName($value);
                break;
            case 3:
                $this->setFieldworkLeaderAffiliation($value);
                break;
            case 4:
                $this->setFieldworkLeaderWebsite($value);
                break;
            case 5:
                $this->setFieldworkLeaderEmail($value);
                break;
            case 6:
                $this->setFieldworkProjectWebsite($value);
                break;
            case 7:
                $this->setCryosphereWhereId($value);
                break;
            case 8:
                $this->setFieldworkLocations($value);
                break;
            case 9:
                $this->setFieldworkEndDate($value);
                break;
            case 10:
                $this->setFieldworkStartDate($value);
                break;
            case 11:
                $this->setFieldworkGoal($value);
                break;
            case 12:
                $this->setFieldworkInformationSeekerLimit($value);
                break;
            case 13:
                $this->setFieldworkInformationSeekerCost($value);
                break;
            case 14:
                $this->setFieldworkBidingAllowed($value);
                break;
            case 15:
                $this->setFieldworkInformationSeekerPackageIncluded($value);
                break;
            case 16:
                $this->setFieldworkInformationSeekerPackageExcluded($value);
                break;
            case 17:
                $this->setFieldworkIsCertain($value);
                break;
            case 18:
                $this->setFieldworkWhenCertain($value);
                break;
            case 19:
                $this->setFieldworkInformationSeekerAnnouncementDate($value);
                break;
            case 20:
                $this->setFieldworkInformationSeekerDeadline($value);
                break;
            case 21:
                $this->setApproved($value);
                break;
            case 22:
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
        $keys = FieldworkTableMap::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) {
            $this->setId($arr[$keys[0]]);
        }
        if (array_key_exists($keys[1], $arr)) {
            $this->setFieldworkName($arr[$keys[1]]);
        }
        if (array_key_exists($keys[2], $arr)) {
            $this->setFieldworkLeaderName($arr[$keys[2]]);
        }
        if (array_key_exists($keys[3], $arr)) {
            $this->setFieldworkLeaderAffiliation($arr[$keys[3]]);
        }
        if (array_key_exists($keys[4], $arr)) {
            $this->setFieldworkLeaderWebsite($arr[$keys[4]]);
        }
        if (array_key_exists($keys[5], $arr)) {
            $this->setFieldworkLeaderEmail($arr[$keys[5]]);
        }
        if (array_key_exists($keys[6], $arr)) {
            $this->setFieldworkProjectWebsite($arr[$keys[6]]);
        }
        if (array_key_exists($keys[7], $arr)) {
            $this->setCryosphereWhereId($arr[$keys[7]]);
        }
        if (array_key_exists($keys[8], $arr)) {
            $this->setFieldworkLocations($arr[$keys[8]]);
        }
        if (array_key_exists($keys[9], $arr)) {
            $this->setFieldworkEndDate($arr[$keys[9]]);
        }
        if (array_key_exists($keys[10], $arr)) {
            $this->setFieldworkStartDate($arr[$keys[10]]);
        }
        if (array_key_exists($keys[11], $arr)) {
            $this->setFieldworkGoal($arr[$keys[11]]);
        }
        if (array_key_exists($keys[12], $arr)) {
            $this->setFieldworkInformationSeekerLimit($arr[$keys[12]]);
        }
        if (array_key_exists($keys[13], $arr)) {
            $this->setFieldworkInformationSeekerCost($arr[$keys[13]]);
        }
        if (array_key_exists($keys[14], $arr)) {
            $this->setFieldworkBidingAllowed($arr[$keys[14]]);
        }
        if (array_key_exists($keys[15], $arr)) {
            $this->setFieldworkInformationSeekerPackageIncluded($arr[$keys[15]]);
        }
        if (array_key_exists($keys[16], $arr)) {
            $this->setFieldworkInformationSeekerPackageExcluded($arr[$keys[16]]);
        }
        if (array_key_exists($keys[17], $arr)) {
            $this->setFieldworkIsCertain($arr[$keys[17]]);
        }
        if (array_key_exists($keys[18], $arr)) {
            $this->setFieldworkWhenCertain($arr[$keys[18]]);
        }
        if (array_key_exists($keys[19], $arr)) {
            $this->setFieldworkInformationSeekerAnnouncementDate($arr[$keys[19]]);
        }
        if (array_key_exists($keys[20], $arr)) {
            $this->setFieldworkInformationSeekerDeadline($arr[$keys[20]]);
        }
        if (array_key_exists($keys[21], $arr)) {
            $this->setApproved($arr[$keys[21]]);
        }
        if (array_key_exists($keys[22], $arr)) {
            $this->setTimestamp($arr[$keys[22]]);
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
     * @return $this|\CryoConnectDB\Fieldwork The current object, for fluid interface
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
        $criteria = new Criteria(FieldworkTableMap::DATABASE_NAME);

        if ($this->isColumnModified(FieldworkTableMap::COL_ID)) {
            $criteria->add(FieldworkTableMap::COL_ID, $this->id);
        }
        if ($this->isColumnModified(FieldworkTableMap::COL_FIELDWORK_PROJECT_NAME)) {
            $criteria->add(FieldworkTableMap::COL_FIELDWORK_PROJECT_NAME, $this->fieldwork_project_name);
        }
        if ($this->isColumnModified(FieldworkTableMap::COL_FIELDWORK_LEADER_NAME)) {
            $criteria->add(FieldworkTableMap::COL_FIELDWORK_LEADER_NAME, $this->fieldwork_leader_name);
        }
        if ($this->isColumnModified(FieldworkTableMap::COL_FIELDWORK_LEADER_AFFILIATION)) {
            $criteria->add(FieldworkTableMap::COL_FIELDWORK_LEADER_AFFILIATION, $this->fieldwork_leader_affiliation);
        }
        if ($this->isColumnModified(FieldworkTableMap::COL_FIELDWORK_LEADER_WEBSITE)) {
            $criteria->add(FieldworkTableMap::COL_FIELDWORK_LEADER_WEBSITE, $this->fieldwork_leader_website);
        }
        if ($this->isColumnModified(FieldworkTableMap::COL_FIELDWORK_LEADER_EMAIL)) {
            $criteria->add(FieldworkTableMap::COL_FIELDWORK_LEADER_EMAIL, $this->fieldwork_leader_email);
        }
        if ($this->isColumnModified(FieldworkTableMap::COL_FIELDWORK_PROJECT_WEBSITE)) {
            $criteria->add(FieldworkTableMap::COL_FIELDWORK_PROJECT_WEBSITE, $this->fieldwork_project_website);
        }
        if ($this->isColumnModified(FieldworkTableMap::COL_CRYOSPHERE_WHERE_ID)) {
            $criteria->add(FieldworkTableMap::COL_CRYOSPHERE_WHERE_ID, $this->cryosphere_where_id);
        }
        if ($this->isColumnModified(FieldworkTableMap::COL_FIELDWORK_LOCATIONS)) {
            $criteria->add(FieldworkTableMap::COL_FIELDWORK_LOCATIONS, $this->fieldwork_locations);
        }
        if ($this->isColumnModified(FieldworkTableMap::COL_FIELDWORK_END_DATE)) {
            $criteria->add(FieldworkTableMap::COL_FIELDWORK_END_DATE, $this->fieldwork_end_date);
        }
        if ($this->isColumnModified(FieldworkTableMap::COL_FIELDWORK_START_DATE)) {
            $criteria->add(FieldworkTableMap::COL_FIELDWORK_START_DATE, $this->fieldwork_start_date);
        }
        if ($this->isColumnModified(FieldworkTableMap::COL_FIELDWORK_GOAL)) {
            $criteria->add(FieldworkTableMap::COL_FIELDWORK_GOAL, $this->fieldwork_goal);
        }
        if ($this->isColumnModified(FieldworkTableMap::COL_FIELDWORK_INFORMATION_SEEKER_LIMIT)) {
            $criteria->add(FieldworkTableMap::COL_FIELDWORK_INFORMATION_SEEKER_LIMIT, $this->fieldwork_information_seeker_limit);
        }
        if ($this->isColumnModified(FieldworkTableMap::COL_FIELDWORK_INFORMATION_SEEKER_COST)) {
            $criteria->add(FieldworkTableMap::COL_FIELDWORK_INFORMATION_SEEKER_COST, $this->fieldwork_information_seeker_cost);
        }
        if ($this->isColumnModified(FieldworkTableMap::COL_FIELDWORK_BIDING_ALLOWED)) {
            $criteria->add(FieldworkTableMap::COL_FIELDWORK_BIDING_ALLOWED, $this->fieldwork_biding_allowed);
        }
        if ($this->isColumnModified(FieldworkTableMap::COL_FIELDWORK_INFORMATION_SEEKER_PACKAGE_INCLUDED)) {
            $criteria->add(FieldworkTableMap::COL_FIELDWORK_INFORMATION_SEEKER_PACKAGE_INCLUDED, $this->fieldwork_information_seeker_package_included);
        }
        if ($this->isColumnModified(FieldworkTableMap::COL_FIELDWORK_INFORMATION_SEEKER_PACKAGE_EXCLUDED)) {
            $criteria->add(FieldworkTableMap::COL_FIELDWORK_INFORMATION_SEEKER_PACKAGE_EXCLUDED, $this->fieldwork_information_seeker_package_excluded);
        }
        if ($this->isColumnModified(FieldworkTableMap::COL_FIELDWORK_IS_CERTAIN)) {
            $criteria->add(FieldworkTableMap::COL_FIELDWORK_IS_CERTAIN, $this->fieldwork_is_certain);
        }
        if ($this->isColumnModified(FieldworkTableMap::COL_FIELDWORK_WHEN_CERTAIN)) {
            $criteria->add(FieldworkTableMap::COL_FIELDWORK_WHEN_CERTAIN, $this->fieldwork_when_certain);
        }
        if ($this->isColumnModified(FieldworkTableMap::COL_FIELD_INFORMATION_SEEKER_ANNOUNCEMENT_DATE)) {
            $criteria->add(FieldworkTableMap::COL_FIELD_INFORMATION_SEEKER_ANNOUNCEMENT_DATE, $this->field_information_seeker_announcement_date);
        }
        if ($this->isColumnModified(FieldworkTableMap::COL_FIELD_INFORMATION_SEEKER_DEADLINE)) {
            $criteria->add(FieldworkTableMap::COL_FIELD_INFORMATION_SEEKER_DEADLINE, $this->field_information_seeker_deadline);
        }
        if ($this->isColumnModified(FieldworkTableMap::COL_APPROVED)) {
            $criteria->add(FieldworkTableMap::COL_APPROVED, $this->approved);
        }
        if ($this->isColumnModified(FieldworkTableMap::COL_TIMESTAMP)) {
            $criteria->add(FieldworkTableMap::COL_TIMESTAMP, $this->timestamp);
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
        $criteria = ChildFieldworkQuery::create();
        $criteria->add(FieldworkTableMap::COL_ID, $this->id);

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
     * @param      object $copyObj An object of \CryoConnectDB\Fieldwork (or compatible) type.
     * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param      boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setFieldworkName($this->getFieldworkName());
        $copyObj->setFieldworkLeaderName($this->getFieldworkLeaderName());
        $copyObj->setFieldworkLeaderAffiliation($this->getFieldworkLeaderAffiliation());
        $copyObj->setFieldworkLeaderWebsite($this->getFieldworkLeaderWebsite());
        $copyObj->setFieldworkLeaderEmail($this->getFieldworkLeaderEmail());
        $copyObj->setFieldworkProjectWebsite($this->getFieldworkProjectWebsite());
        $copyObj->setCryosphereWhereId($this->getCryosphereWhereId());
        $copyObj->setFieldworkLocations($this->getFieldworkLocations());
        $copyObj->setFieldworkEndDate($this->getFieldworkEndDate());
        $copyObj->setFieldworkStartDate($this->getFieldworkStartDate());
        $copyObj->setFieldworkGoal($this->getFieldworkGoal());
        $copyObj->setFieldworkInformationSeekerLimit($this->getFieldworkInformationSeekerLimit());
        $copyObj->setFieldworkInformationSeekerCost($this->getFieldworkInformationSeekerCost());
        $copyObj->setFieldworkBidingAllowed($this->getFieldworkBidingAllowed());
        $copyObj->setFieldworkInformationSeekerPackageIncluded($this->getFieldworkInformationSeekerPackageIncluded());
        $copyObj->setFieldworkInformationSeekerPackageExcluded($this->getFieldworkInformationSeekerPackageExcluded());
        $copyObj->setFieldworkIsCertain($this->getFieldworkIsCertain());
        $copyObj->setFieldworkWhenCertain($this->getFieldworkWhenCertain());
        $copyObj->setFieldworkInformationSeekerAnnouncementDate($this->getFieldworkInformationSeekerAnnouncementDate());
        $copyObj->setFieldworkInformationSeekerDeadline($this->getFieldworkInformationSeekerDeadline());
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
     * @return \CryoConnectDB\Fieldwork Clone of current object.
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
     * Declares an association between this object and a ChildCryosphereWhere object.
     *
     * @param  ChildCryosphereWhere $v
     * @return $this|\CryoConnectDB\Fieldwork The current object (for fluent API support)
     * @throws PropelException
     */
    public function setCryosphereWhere(ChildCryosphereWhere $v = null)
    {
        if ($v === null) {
            $this->setCryosphereWhereId(NULL);
        } else {
            $this->setCryosphereWhereId($v->getId());
        }

        $this->aCryosphereWhere = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the ChildCryosphereWhere object, it will not be re-added.
        if ($v !== null) {
            $v->addFieldwork($this);
        }


        return $this;
    }


    /**
     * Get the associated ChildCryosphereWhere object
     *
     * @param  ConnectionInterface $con Optional Connection object.
     * @return ChildCryosphereWhere The associated ChildCryosphereWhere object.
     * @throws PropelException
     */
    public function getCryosphereWhere(ConnectionInterface $con = null)
    {
        if ($this->aCryosphereWhere === null && ($this->cryosphere_where_id != 0)) {
            $this->aCryosphereWhere = ChildCryosphereWhereQuery::create()->findPk($this->cryosphere_where_id, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aCryosphereWhere->addFieldworks($this);
             */
        }

        return $this->aCryosphereWhere;
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
     * If this ChildFieldwork is new, it will return
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
                    ->filterByFieldwork($this)
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
     * @return $this|ChildFieldwork The current object (for fluent API support)
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
            $fieldworkInformationSeekerRequestRemoved->setFieldwork(null);
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
                ->filterByFieldwork($this)
                ->count($con);
        }

        return count($this->collFieldworkInformationSeekerRequests);
    }

    /**
     * Method called to associate a ChildFieldworkInformationSeekerRequest object to this object
     * through the ChildFieldworkInformationSeekerRequest foreign key attribute.
     *
     * @param  ChildFieldworkInformationSeekerRequest $l ChildFieldworkInformationSeekerRequest
     * @return $this|\CryoConnectDB\Fieldwork The current object (for fluent API support)
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
        $fieldworkInformationSeekerRequest->setFieldwork($this);
    }

    /**
     * @param  ChildFieldworkInformationSeekerRequest $fieldworkInformationSeekerRequest The ChildFieldworkInformationSeekerRequest object to remove.
     * @return $this|ChildFieldwork The current object (for fluent API support)
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
            $fieldworkInformationSeekerRequest->setFieldwork(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Fieldwork is new, it will return
     * an empty collection; or if this Fieldwork has previously
     * been saved, it will retrieve related FieldworkInformationSeekerRequests from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Fieldwork.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildFieldworkInformationSeekerRequest[] List of ChildFieldworkInformationSeekerRequest objects
     */
    public function getFieldworkInformationSeekerRequestsJoinFieldworkInformationSeeker(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildFieldworkInformationSeekerRequestQuery::create(null, $criteria);
        $query->joinWith('FieldworkInformationSeeker', $joinBehavior);

        return $this->getFieldworkInformationSeekerRequests($query, $con);
    }

    /**
     * Clears out the collFieldworkInformationSeekers collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addFieldworkInformationSeekers()
     */
    public function clearFieldworkInformationSeekers()
    {
        $this->collFieldworkInformationSeekers = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Initializes the collFieldworkInformationSeekers crossRef collection.
     *
     * By default this just sets the collFieldworkInformationSeekers collection to an empty collection (like clearFieldworkInformationSeekers());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @return void
     */
    public function initFieldworkInformationSeekers()
    {
        $collectionClassName = FieldworkInformationSeekerRequestTableMap::getTableMap()->getCollectionClassName();

        $this->collFieldworkInformationSeekers = new $collectionClassName;
        $this->collFieldworkInformationSeekersPartial = true;
        $this->collFieldworkInformationSeekers->setModel('\CryoConnectDB\FieldworkInformationSeeker');
    }

    /**
     * Checks if the collFieldworkInformationSeekers collection is loaded.
     *
     * @return bool
     */
    public function isFieldworkInformationSeekersLoaded()
    {
        return null !== $this->collFieldworkInformationSeekers;
    }

    /**
     * Gets a collection of ChildFieldworkInformationSeeker objects related by a many-to-many relationship
     * to the current object by way of the fieldwork_information_seeker_request cross-reference table.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ChildFieldwork is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria Optional query object to filter the query
     * @param      ConnectionInterface $con Optional connection object
     *
     * @return ObjectCollection|ChildFieldworkInformationSeeker[] List of ChildFieldworkInformationSeeker objects
     */
    public function getFieldworkInformationSeekers(Criteria $criteria = null, ConnectionInterface $con = null)
    {
        $partial = $this->collFieldworkInformationSeekersPartial && !$this->isNew();
        if (null === $this->collFieldworkInformationSeekers || null !== $criteria || $partial) {
            if ($this->isNew()) {
                // return empty collection
                if (null === $this->collFieldworkInformationSeekers) {
                    $this->initFieldworkInformationSeekers();
                }
            } else {

                $query = ChildFieldworkInformationSeekerQuery::create(null, $criteria)
                    ->filterByFieldwork($this);
                $collFieldworkInformationSeekers = $query->find($con);
                if (null !== $criteria) {
                    return $collFieldworkInformationSeekers;
                }

                if ($partial && $this->collFieldworkInformationSeekers) {
                    //make sure that already added objects gets added to the list of the database.
                    foreach ($this->collFieldworkInformationSeekers as $obj) {
                        if (!$collFieldworkInformationSeekers->contains($obj)) {
                            $collFieldworkInformationSeekers[] = $obj;
                        }
                    }
                }

                $this->collFieldworkInformationSeekers = $collFieldworkInformationSeekers;
                $this->collFieldworkInformationSeekersPartial = false;
            }
        }

        return $this->collFieldworkInformationSeekers;
    }

    /**
     * Sets a collection of FieldworkInformationSeeker objects related by a many-to-many relationship
     * to the current object by way of the fieldwork_information_seeker_request cross-reference table.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param  Collection $fieldworkInformationSeekers A Propel collection.
     * @param  ConnectionInterface $con Optional connection object
     * @return $this|ChildFieldwork The current object (for fluent API support)
     */
    public function setFieldworkInformationSeekers(Collection $fieldworkInformationSeekers, ConnectionInterface $con = null)
    {
        $this->clearFieldworkInformationSeekers();
        $currentFieldworkInformationSeekers = $this->getFieldworkInformationSeekers();

        $fieldworkInformationSeekersScheduledForDeletion = $currentFieldworkInformationSeekers->diff($fieldworkInformationSeekers);

        foreach ($fieldworkInformationSeekersScheduledForDeletion as $toDelete) {
            $this->removeFieldworkInformationSeeker($toDelete);
        }

        foreach ($fieldworkInformationSeekers as $fieldworkInformationSeeker) {
            if (!$currentFieldworkInformationSeekers->contains($fieldworkInformationSeeker)) {
                $this->doAddFieldworkInformationSeeker($fieldworkInformationSeeker);
            }
        }

        $this->collFieldworkInformationSeekersPartial = false;
        $this->collFieldworkInformationSeekers = $fieldworkInformationSeekers;

        return $this;
    }

    /**
     * Gets the number of FieldworkInformationSeeker objects related by a many-to-many relationship
     * to the current object by way of the fieldwork_information_seeker_request cross-reference table.
     *
     * @param      Criteria $criteria Optional query object to filter the query
     * @param      boolean $distinct Set to true to force count distinct
     * @param      ConnectionInterface $con Optional connection object
     *
     * @return int the number of related FieldworkInformationSeeker objects
     */
    public function countFieldworkInformationSeekers(Criteria $criteria = null, $distinct = false, ConnectionInterface $con = null)
    {
        $partial = $this->collFieldworkInformationSeekersPartial && !$this->isNew();
        if (null === $this->collFieldworkInformationSeekers || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collFieldworkInformationSeekers) {
                return 0;
            } else {

                if ($partial && !$criteria) {
                    return count($this->getFieldworkInformationSeekers());
                }

                $query = ChildFieldworkInformationSeekerQuery::create(null, $criteria);
                if ($distinct) {
                    $query->distinct();
                }

                return $query
                    ->filterByFieldwork($this)
                    ->count($con);
            }
        } else {
            return count($this->collFieldworkInformationSeekers);
        }
    }

    /**
     * Associate a ChildFieldworkInformationSeeker to this object
     * through the fieldwork_information_seeker_request cross reference table.
     *
     * @param ChildFieldworkInformationSeeker $fieldworkInformationSeeker
     * @return ChildFieldwork The current object (for fluent API support)
     */
    public function addFieldworkInformationSeeker(ChildFieldworkInformationSeeker $fieldworkInformationSeeker)
    {
        if ($this->collFieldworkInformationSeekers === null) {
            $this->initFieldworkInformationSeekers();
        }

        if (!$this->getFieldworkInformationSeekers()->contains($fieldworkInformationSeeker)) {
            // only add it if the **same** object is not already associated
            $this->collFieldworkInformationSeekers->push($fieldworkInformationSeeker);
            $this->doAddFieldworkInformationSeeker($fieldworkInformationSeeker);
        }

        return $this;
    }

    /**
     *
     * @param ChildFieldworkInformationSeeker $fieldworkInformationSeeker
     */
    protected function doAddFieldworkInformationSeeker(ChildFieldworkInformationSeeker $fieldworkInformationSeeker)
    {
        $fieldworkInformationSeekerRequest = new ChildFieldworkInformationSeekerRequest();

        $fieldworkInformationSeekerRequest->setFieldworkInformationSeeker($fieldworkInformationSeeker);

        $fieldworkInformationSeekerRequest->setFieldwork($this);

        $this->addFieldworkInformationSeekerRequest($fieldworkInformationSeekerRequest);

        // set the back reference to this object directly as using provided method either results
        // in endless loop or in multiple relations
        if (!$fieldworkInformationSeeker->isFieldworksLoaded()) {
            $fieldworkInformationSeeker->initFieldworks();
            $fieldworkInformationSeeker->getFieldworks()->push($this);
        } elseif (!$fieldworkInformationSeeker->getFieldworks()->contains($this)) {
            $fieldworkInformationSeeker->getFieldworks()->push($this);
        }

    }

    /**
     * Remove fieldworkInformationSeeker of this object
     * through the fieldwork_information_seeker_request cross reference table.
     *
     * @param ChildFieldworkInformationSeeker $fieldworkInformationSeeker
     * @return ChildFieldwork The current object (for fluent API support)
     */
    public function removeFieldworkInformationSeeker(ChildFieldworkInformationSeeker $fieldworkInformationSeeker)
    {
        if ($this->getFieldworkInformationSeekers()->contains($fieldworkInformationSeeker)) {
            $fieldworkInformationSeekerRequest = new ChildFieldworkInformationSeekerRequest();
            $fieldworkInformationSeekerRequest->setFieldworkInformationSeeker($fieldworkInformationSeeker);
            if ($fieldworkInformationSeeker->isFieldworksLoaded()) {
                //remove the back reference if available
                $fieldworkInformationSeeker->getFieldworks()->removeObject($this);
            }

            $fieldworkInformationSeekerRequest->setFieldwork($this);
            $this->removeFieldworkInformationSeekerRequest(clone $fieldworkInformationSeekerRequest);
            $fieldworkInformationSeekerRequest->clear();

            $this->collFieldworkInformationSeekers->remove($this->collFieldworkInformationSeekers->search($fieldworkInformationSeeker));

            if (null === $this->fieldworkInformationSeekersScheduledForDeletion) {
                $this->fieldworkInformationSeekersScheduledForDeletion = clone $this->collFieldworkInformationSeekers;
                $this->fieldworkInformationSeekersScheduledForDeletion->clear();
            }

            $this->fieldworkInformationSeekersScheduledForDeletion->push($fieldworkInformationSeeker);
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
        if (null !== $this->aCryosphereWhere) {
            $this->aCryosphereWhere->removeFieldwork($this);
        }
        $this->id = null;
        $this->fieldwork_project_name = null;
        $this->fieldwork_leader_name = null;
        $this->fieldwork_leader_affiliation = null;
        $this->fieldwork_leader_website = null;
        $this->fieldwork_leader_email = null;
        $this->fieldwork_project_website = null;
        $this->cryosphere_where_id = null;
        $this->fieldwork_locations = null;
        $this->fieldwork_end_date = null;
        $this->fieldwork_start_date = null;
        $this->fieldwork_goal = null;
        $this->fieldwork_information_seeker_limit = null;
        $this->fieldwork_information_seeker_cost = null;
        $this->fieldwork_biding_allowed = null;
        $this->fieldwork_information_seeker_package_included = null;
        $this->fieldwork_information_seeker_package_excluded = null;
        $this->fieldwork_is_certain = null;
        $this->fieldwork_when_certain = null;
        $this->field_information_seeker_announcement_date = null;
        $this->field_information_seeker_deadline = null;
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
            if ($this->collFieldworkInformationSeekers) {
                foreach ($this->collFieldworkInformationSeekers as $o) {
                    $o->clearAllReferences($deep);
                }
            }
        } // if ($deep)

        $this->collFieldworkInformationSeekerRequests = null;
        $this->collFieldworkInformationSeekers = null;
        $this->aCryosphereWhere = null;
    }

    /**
     * Return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(FieldworkTableMap::DEFAULT_STRING_FORMAT);
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
