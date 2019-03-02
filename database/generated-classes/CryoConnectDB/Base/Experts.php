<?php

namespace CryoConnectDB\Base;

use \DateTime;
use \Exception;
use \PDO;
use CryoConnectDB\CareerStage as ChildCareerStage;
use CryoConnectDB\CareerStageQuery as ChildCareerStageQuery;
use CryoConnectDB\ContactTypes as ChildContactTypes;
use CryoConnectDB\ContactTypesQuery as ChildContactTypesQuery;
use CryoConnectDB\Countries as ChildCountries;
use CryoConnectDB\CountriesQuery as ChildCountriesQuery;
use CryoConnectDB\CryosphereMethods as ChildCryosphereMethods;
use CryoConnectDB\CryosphereMethodsQuery as ChildCryosphereMethodsQuery;
use CryoConnectDB\CryosphereWhat as ChildCryosphereWhat;
use CryoConnectDB\CryosphereWhatQuery as ChildCryosphereWhatQuery;
use CryoConnectDB\CryosphereWhatSpecefic as ChildCryosphereWhatSpecefic;
use CryoConnectDB\CryosphereWhatSpeceficQuery as ChildCryosphereWhatSpeceficQuery;
use CryoConnectDB\CryosphereWhen as ChildCryosphereWhen;
use CryoConnectDB\CryosphereWhenQuery as ChildCryosphereWhenQuery;
use CryoConnectDB\CryosphereWhere as ChildCryosphereWhere;
use CryoConnectDB\CryosphereWhereQuery as ChildCryosphereWhereQuery;
use CryoConnectDB\ExpertCareerStage as ChildExpertCareerStage;
use CryoConnectDB\ExpertCareerStageQuery as ChildExpertCareerStageQuery;
use CryoConnectDB\ExpertContact as ChildExpertContact;
use CryoConnectDB\ExpertContactQuery as ChildExpertContactQuery;
use CryoConnectDB\ExpertCryosphereMethods as ChildExpertCryosphereMethods;
use CryoConnectDB\ExpertCryosphereMethodsQuery as ChildExpertCryosphereMethodsQuery;
use CryoConnectDB\ExpertCryosphereWhat as ChildExpertCryosphereWhat;
use CryoConnectDB\ExpertCryosphereWhatQuery as ChildExpertCryosphereWhatQuery;
use CryoConnectDB\ExpertCryosphereWhatSpecefic as ChildExpertCryosphereWhatSpecefic;
use CryoConnectDB\ExpertCryosphereWhatSpeceficQuery as ChildExpertCryosphereWhatSpeceficQuery;
use CryoConnectDB\ExpertCryosphereWhen as ChildExpertCryosphereWhen;
use CryoConnectDB\ExpertCryosphereWhenQuery as ChildExpertCryosphereWhenQuery;
use CryoConnectDB\ExpertCryosphereWhere as ChildExpertCryosphereWhere;
use CryoConnectDB\ExpertCryosphereWhereQuery as ChildExpertCryosphereWhereQuery;
use CryoConnectDB\ExpertLanguages as ChildExpertLanguages;
use CryoConnectDB\ExpertLanguagesQuery as ChildExpertLanguagesQuery;
use CryoConnectDB\ExpertPrimaryAffiliation as ChildExpertPrimaryAffiliation;
use CryoConnectDB\ExpertPrimaryAffiliationQuery as ChildExpertPrimaryAffiliationQuery;
use CryoConnectDB\ExpertSecondaryAffiliation as ChildExpertSecondaryAffiliation;
use CryoConnectDB\ExpertSecondaryAffiliationQuery as ChildExpertSecondaryAffiliationQuery;
use CryoConnectDB\Experts as ChildExperts;
use CryoConnectDB\ExpertsQuery as ChildExpertsQuery;
use CryoConnectDB\Languages as ChildLanguages;
use CryoConnectDB\LanguagesQuery as ChildLanguagesQuery;
use CryoConnectDB\Map\ExpertCareerStageTableMap;
use CryoConnectDB\Map\ExpertContactTableMap;
use CryoConnectDB\Map\ExpertCryosphereMethodsTableMap;
use CryoConnectDB\Map\ExpertCryosphereWhatSpeceficTableMap;
use CryoConnectDB\Map\ExpertCryosphereWhatTableMap;
use CryoConnectDB\Map\ExpertCryosphereWhenTableMap;
use CryoConnectDB\Map\ExpertCryosphereWhereTableMap;
use CryoConnectDB\Map\ExpertLanguagesTableMap;
use CryoConnectDB\Map\ExpertSecondaryAffiliationTableMap;
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
     * The value for the gender field.
     *
     * @var        string
     */
    protected $gender;

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
     * @var        ObjectCollection|ChildExpertCryosphereMethods[] Collection to store aggregation of ChildExpertCryosphereMethods objects.
     */
    protected $collExpertCryosphereMethodss;
    protected $collExpertCryosphereMethodssPartial;

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
     * @var        ObjectCollection|ChildExpertCryosphereWhen[] Collection to store aggregation of ChildExpertCryosphereWhen objects.
     */
    protected $collExpertCryosphereWhens;
    protected $collExpertCryosphereWhensPartial;

    /**
     * @var        ObjectCollection|ChildExpertCryosphereWhere[] Collection to store aggregation of ChildExpertCryosphereWhere objects.
     */
    protected $collExpertCryosphereWheres;
    protected $collExpertCryosphereWheresPartial;

    /**
     * @var        ObjectCollection|ChildExpertLanguages[] Collection to store aggregation of ChildExpertLanguages objects.
     */
    protected $collExpertLanguagess;
    protected $collExpertLanguagessPartial;

    /**
     * @var        ChildExpertPrimaryAffiliation one-to-one related ChildExpertPrimaryAffiliation object
     */
    protected $singleExpertPrimaryAffiliation;

    /**
     * @var        ObjectCollection|ChildExpertSecondaryAffiliation[] Collection to store aggregation of ChildExpertSecondaryAffiliation objects.
     */
    protected $collExpertSecondaryAffiliations;
    protected $collExpertSecondaryAffiliationsPartial;

    /**
     * @var        ObjectCollection|ChildCareerStage[] Cross Collection to store aggregation of ChildCareerStage objects.
     */
    protected $collCareerStages;

    /**
     * @var bool
     */
    protected $collCareerStagesPartial;

    /**
     * @var        ObjectCollection|ChildContactTypes[] Cross Collection to store aggregation of ChildContactTypes objects.
     */
    protected $collContactTypess;

    /**
     * @var bool
     */
    protected $collContactTypessPartial;

    /**
     * @var        ObjectCollection|ChildCryosphereMethods[] Cross Collection to store aggregation of ChildCryosphereMethods objects.
     */
    protected $collCryosphereMethodss;

    /**
     * @var bool
     */
    protected $collCryosphereMethodssPartial;

    /**
     * @var        ObjectCollection|ChildCryosphereWhat[] Cross Collection to store aggregation of ChildCryosphereWhat objects.
     */
    protected $collCryosphereWhats;

    /**
     * @var bool
     */
    protected $collCryosphereWhatsPartial;

    /**
     * @var        ObjectCollection|ChildCryosphereWhatSpecefic[] Cross Collection to store aggregation of ChildCryosphereWhatSpecefic objects.
     */
    protected $collCryosphereWhatSpecefics;

    /**
     * @var bool
     */
    protected $collCryosphereWhatSpeceficsPartial;

    /**
     * @var        ObjectCollection|ChildCryosphereWhen[] Cross Collection to store aggregation of ChildCryosphereWhen objects.
     */
    protected $collCryosphereWhens;

    /**
     * @var bool
     */
    protected $collCryosphereWhensPartial;

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
     * @var ObjectCollection|ChildCareerStage[]
     */
    protected $careerStagesScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var ObjectCollection|ChildContactTypes[]
     */
    protected $contactTypessScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var ObjectCollection|ChildCryosphereMethods[]
     */
    protected $cryosphereMethodssScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var ObjectCollection|ChildCryosphereWhat[]
     */
    protected $cryosphereWhatsScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var ObjectCollection|ChildCryosphereWhatSpecefic[]
     */
    protected $cryosphereWhatSpeceficsScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var ObjectCollection|ChildCryosphereWhen[]
     */
    protected $cryosphereWhensScheduledForDeletion = null;

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
     * @var ObjectCollection|ChildExpertCryosphereMethods[]
     */
    protected $expertCryosphereMethodssScheduledForDeletion = null;

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
     * @var ObjectCollection|ChildExpertCryosphereWhen[]
     */
    protected $expertCryosphereWhensScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var ObjectCollection|ChildExpertCryosphereWhere[]
     */
    protected $expertCryosphereWheresScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var ObjectCollection|ChildExpertLanguages[]
     */
    protected $expertLanguagessScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var ObjectCollection|ChildExpertSecondaryAffiliation[]
     */
    protected $expertSecondaryAffiliationsScheduledForDeletion = null;

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
     * Get the [gender] column value.
     *
     * @return string
     */
    public function getGender()
    {
        return $this->gender;
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
     * Set the value of [gender] column.
     *
     * @param string $v new value
     * @return $this|\CryoConnectDB\Experts The current object (for fluent API support)
     */
    public function setGender($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->gender !== $v) {
            $this->gender = $v;
            $this->modifiedColumns[ExpertsTableMap::COL_GENDER] = true;
        }

        return $this;
    } // setGender()

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

            $col = $row[TableMap::TYPE_NUM == $indexType ? 3 + $startcol : ExpertsTableMap::translateFieldName('Gender', TableMap::TYPE_PHPNAME, $indexType)];
            $this->gender = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 4 + $startcol : ExpertsTableMap::translateFieldName('Email', TableMap::TYPE_PHPNAME, $indexType)];
            $this->email = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 5 + $startcol : ExpertsTableMap::translateFieldName('BirthYear', TableMap::TYPE_PHPNAME, $indexType)];
            $this->birth_year = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 6 + $startcol : ExpertsTableMap::translateFieldName('CountryCode', TableMap::TYPE_PHPNAME, $indexType)];
            $this->country_code = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 7 + $startcol : ExpertsTableMap::translateFieldName('Approved', TableMap::TYPE_PHPNAME, $indexType)];
            $this->approved = (null !== $col) ? (boolean) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 8 + $startcol : ExpertsTableMap::translateFieldName('CreatedAt', TableMap::TYPE_PHPNAME, $indexType)];
            if ($col === '0000-00-00 00:00:00') {
                $col = null;
            }
            $this->created_at = (null !== $col) ? PropelDateTime::newInstance($col, null, 'DateTime') : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }

            return $startcol + 9; // 9 = ExpertsTableMap::NUM_HYDRATE_COLUMNS.

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
            $this->collExpertCareerStages = null;

            $this->collExpertContacts = null;

            $this->collExpertCryosphereMethodss = null;

            $this->collExpertCryosphereWhats = null;

            $this->collExpertCryosphereWhatSpecefics = null;

            $this->collExpertCryosphereWhens = null;

            $this->collExpertCryosphereWheres = null;

            $this->collExpertLanguagess = null;

            $this->singleExpertPrimaryAffiliation = null;

            $this->collExpertSecondaryAffiliations = null;

            $this->collCareerStages = null;
            $this->collContactTypess = null;
            $this->collCryosphereMethodss = null;
            $this->collCryosphereWhats = null;
            $this->collCryosphereWhatSpecefics = null;
            $this->collCryosphereWhens = null;
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

            if ($this->careerStagesScheduledForDeletion !== null) {
                if (!$this->careerStagesScheduledForDeletion->isEmpty()) {
                    $pks = array();
                    foreach ($this->careerStagesScheduledForDeletion as $entry) {
                        $entryPk = [];

                        $entryPk[0] = $this->getId();
                        $entryPk[1] = $entry->getId();
                        $pks[] = $entryPk;
                    }

                    \CryoConnectDB\ExpertCareerStageQuery::create()
                        ->filterByPrimaryKeys($pks)
                        ->delete($con);

                    $this->careerStagesScheduledForDeletion = null;
                }

            }

            if ($this->collCareerStages) {
                foreach ($this->collCareerStages as $careerStage) {
                    if (!$careerStage->isDeleted() && ($careerStage->isNew() || $careerStage->isModified())) {
                        $careerStage->save($con);
                    }
                }
            }


            if ($this->contactTypessScheduledForDeletion !== null) {
                if (!$this->contactTypessScheduledForDeletion->isEmpty()) {
                    $pks = array();
                    foreach ($this->contactTypessScheduledForDeletion as $entry) {
                        $entryPk = [];

                        $entryPk[0] = $this->getId();
                        $entryPk[1] = $entry->getId();
                        $pks[] = $entryPk;
                    }

                    \CryoConnectDB\ExpertContactQuery::create()
                        ->filterByPrimaryKeys($pks)
                        ->delete($con);

                    $this->contactTypessScheduledForDeletion = null;
                }

            }

            if ($this->collContactTypess) {
                foreach ($this->collContactTypess as $contactTypes) {
                    if (!$contactTypes->isDeleted() && ($contactTypes->isNew() || $contactTypes->isModified())) {
                        $contactTypes->save($con);
                    }
                }
            }


            if ($this->cryosphereMethodssScheduledForDeletion !== null) {
                if (!$this->cryosphereMethodssScheduledForDeletion->isEmpty()) {
                    $pks = array();
                    foreach ($this->cryosphereMethodssScheduledForDeletion as $entry) {
                        $entryPk = [];

                        $entryPk[0] = $this->getId();
                        $entryPk[1] = $entry->getId();
                        $pks[] = $entryPk;
                    }

                    \CryoConnectDB\ExpertCryosphereMethodsQuery::create()
                        ->filterByPrimaryKeys($pks)
                        ->delete($con);

                    $this->cryosphereMethodssScheduledForDeletion = null;
                }

            }

            if ($this->collCryosphereMethodss) {
                foreach ($this->collCryosphereMethodss as $cryosphereMethods) {
                    if (!$cryosphereMethods->isDeleted() && ($cryosphereMethods->isNew() || $cryosphereMethods->isModified())) {
                        $cryosphereMethods->save($con);
                    }
                }
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

                    \CryoConnectDB\ExpertCryosphereWhatQuery::create()
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


            if ($this->cryosphereWhatSpeceficsScheduledForDeletion !== null) {
                if (!$this->cryosphereWhatSpeceficsScheduledForDeletion->isEmpty()) {
                    $pks = array();
                    foreach ($this->cryosphereWhatSpeceficsScheduledForDeletion as $entry) {
                        $entryPk = [];

                        $entryPk[0] = $this->getId();
                        $entryPk[1] = $entry->getId();
                        $pks[] = $entryPk;
                    }

                    \CryoConnectDB\ExpertCryosphereWhatSpeceficQuery::create()
                        ->filterByPrimaryKeys($pks)
                        ->delete($con);

                    $this->cryosphereWhatSpeceficsScheduledForDeletion = null;
                }

            }

            if ($this->collCryosphereWhatSpecefics) {
                foreach ($this->collCryosphereWhatSpecefics as $cryosphereWhatSpecefic) {
                    if (!$cryosphereWhatSpecefic->isDeleted() && ($cryosphereWhatSpecefic->isNew() || $cryosphereWhatSpecefic->isModified())) {
                        $cryosphereWhatSpecefic->save($con);
                    }
                }
            }


            if ($this->cryosphereWhensScheduledForDeletion !== null) {
                if (!$this->cryosphereWhensScheduledForDeletion->isEmpty()) {
                    $pks = array();
                    foreach ($this->cryosphereWhensScheduledForDeletion as $entry) {
                        $entryPk = [];

                        $entryPk[0] = $this->getId();
                        $entryPk[1] = $entry->getId();
                        $pks[] = $entryPk;
                    }

                    \CryoConnectDB\ExpertCryosphereWhenQuery::create()
                        ->filterByPrimaryKeys($pks)
                        ->delete($con);

                    $this->cryosphereWhensScheduledForDeletion = null;
                }

            }

            if ($this->collCryosphereWhens) {
                foreach ($this->collCryosphereWhens as $cryosphereWhen) {
                    if (!$cryosphereWhen->isDeleted() && ($cryosphereWhen->isNew() || $cryosphereWhen->isModified())) {
                        $cryosphereWhen->save($con);
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

                    \CryoConnectDB\ExpertCryosphereWhereQuery::create()
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

                    \CryoConnectDB\ExpertLanguagesQuery::create()
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

            if ($this->expertCryosphereMethodssScheduledForDeletion !== null) {
                if (!$this->expertCryosphereMethodssScheduledForDeletion->isEmpty()) {
                    \CryoConnectDB\ExpertCryosphereMethodsQuery::create()
                        ->filterByPrimaryKeys($this->expertCryosphereMethodssScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->expertCryosphereMethodssScheduledForDeletion = null;
                }
            }

            if ($this->collExpertCryosphereMethodss !== null) {
                foreach ($this->collExpertCryosphereMethodss as $referrerFK) {
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

            if ($this->expertCryosphereWhensScheduledForDeletion !== null) {
                if (!$this->expertCryosphereWhensScheduledForDeletion->isEmpty()) {
                    \CryoConnectDB\ExpertCryosphereWhenQuery::create()
                        ->filterByPrimaryKeys($this->expertCryosphereWhensScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->expertCryosphereWhensScheduledForDeletion = null;
                }
            }

            if ($this->collExpertCryosphereWhens !== null) {
                foreach ($this->collExpertCryosphereWhens as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
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

            if ($this->singleExpertPrimaryAffiliation !== null) {
                if (!$this->singleExpertPrimaryAffiliation->isDeleted() && ($this->singleExpertPrimaryAffiliation->isNew() || $this->singleExpertPrimaryAffiliation->isModified())) {
                    $affectedRows += $this->singleExpertPrimaryAffiliation->save($con);
                }
            }

            if ($this->expertSecondaryAffiliationsScheduledForDeletion !== null) {
                if (!$this->expertSecondaryAffiliationsScheduledForDeletion->isEmpty()) {
                    \CryoConnectDB\ExpertSecondaryAffiliationQuery::create()
                        ->filterByPrimaryKeys($this->expertSecondaryAffiliationsScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->expertSecondaryAffiliationsScheduledForDeletion = null;
                }
            }

            if ($this->collExpertSecondaryAffiliations !== null) {
                foreach ($this->collExpertSecondaryAffiliations as $referrerFK) {
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
        if ($this->isColumnModified(ExpertsTableMap::COL_GENDER)) {
            $modifiedColumns[':p' . $index++]  = 'gender';
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
                    case 'gender':
                        $stmt->bindValue($identifier, $this->gender, PDO::PARAM_STR);
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
                return $this->getGender();
                break;
            case 4:
                return $this->getEmail();
                break;
            case 5:
                return $this->getBirthYear();
                break;
            case 6:
                return $this->getCountryCode();
                break;
            case 7:
                return $this->getApproved();
                break;
            case 8:
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
            $keys[3] => $this->getGender(),
            $keys[4] => $this->getEmail(),
            $keys[5] => $this->getBirthYear(),
            $keys[6] => $this->getCountryCode(),
            $keys[7] => $this->getApproved(),
            $keys[8] => $this->getCreatedAt(),
        );
        if ($result[$keys[8]] instanceof \DateTimeInterface) {
            $result[$keys[8]] = $result[$keys[8]]->format('c');
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
            if (null !== $this->collExpertCryosphereMethodss) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'expertCryosphereMethodss';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'expert_cryosphere_methodss';
                        break;
                    default:
                        $key = 'ExpertCryosphereMethodss';
                }

                $result[$key] = $this->collExpertCryosphereMethodss->toArray(null, false, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
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
            if (null !== $this->collExpertCryosphereWhens) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'expertCryosphereWhens';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'expert_cryosphere_whens';
                        break;
                    default:
                        $key = 'ExpertCryosphereWhens';
                }

                $result[$key] = $this->collExpertCryosphereWhens->toArray(null, false, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
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
            if (null !== $this->singleExpertPrimaryAffiliation) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'expertPrimaryAffiliation';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'expert_primary_affiliation';
                        break;
                    default:
                        $key = 'ExpertPrimaryAffiliation';
                }

                $result[$key] = $this->singleExpertPrimaryAffiliation->toArray($keyType, $includeLazyLoadColumns, $alreadyDumpedObjects, true);
            }
            if (null !== $this->collExpertSecondaryAffiliations) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'expertSecondaryAffiliations';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'expert_secondary_affiliations';
                        break;
                    default:
                        $key = 'ExpertSecondaryAffiliations';
                }

                $result[$key] = $this->collExpertSecondaryAffiliations->toArray(null, false, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
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
                $this->setGender($value);
                break;
            case 4:
                $this->setEmail($value);
                break;
            case 5:
                $this->setBirthYear($value);
                break;
            case 6:
                $this->setCountryCode($value);
                break;
            case 7:
                $this->setApproved($value);
                break;
            case 8:
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
            $this->setGender($arr[$keys[3]]);
        }
        if (array_key_exists($keys[4], $arr)) {
            $this->setEmail($arr[$keys[4]]);
        }
        if (array_key_exists($keys[5], $arr)) {
            $this->setBirthYear($arr[$keys[5]]);
        }
        if (array_key_exists($keys[6], $arr)) {
            $this->setCountryCode($arr[$keys[6]]);
        }
        if (array_key_exists($keys[7], $arr)) {
            $this->setApproved($arr[$keys[7]]);
        }
        if (array_key_exists($keys[8], $arr)) {
            $this->setCreatedAt($arr[$keys[8]]);
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
        if ($this->isColumnModified(ExpertsTableMap::COL_GENDER)) {
            $criteria->add(ExpertsTableMap::COL_GENDER, $this->gender);
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
        $copyObj->setGender($this->getGender());
        $copyObj->setEmail($this->getEmail());
        $copyObj->setBirthYear($this->getBirthYear());
        $copyObj->setCountryCode($this->getCountryCode());
        $copyObj->setApproved($this->getApproved());
        $copyObj->setCreatedAt($this->getCreatedAt());

        if ($deepCopy) {
            // important: temporarily setNew(false) because this affects the behavior of
            // the getter/setter methods for fkey referrer objects.
            $copyObj->setNew(false);

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

            foreach ($this->getExpertCryosphereMethodss() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addExpertCryosphereMethods($relObj->copy($deepCopy));
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

            foreach ($this->getExpertCryosphereWhens() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addExpertCryosphereWhen($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getExpertCryosphereWheres() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addExpertCryosphereWhere($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getExpertLanguagess() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addExpertLanguages($relObj->copy($deepCopy));
                }
            }

            $relObj = $this->getExpertPrimaryAffiliation();
            if ($relObj) {
                $copyObj->setExpertPrimaryAffiliation($relObj->copy($deepCopy));
            }

            foreach ($this->getExpertSecondaryAffiliations() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addExpertSecondaryAffiliation($relObj->copy($deepCopy));
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
        if ('ExpertCareerStage' == $relationName) {
            $this->initExpertCareerStages();
            return;
        }
        if ('ExpertContact' == $relationName) {
            $this->initExpertContacts();
            return;
        }
        if ('ExpertCryosphereMethods' == $relationName) {
            $this->initExpertCryosphereMethodss();
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
        if ('ExpertCryosphereWhen' == $relationName) {
            $this->initExpertCryosphereWhens();
            return;
        }
        if ('ExpertCryosphereWhere' == $relationName) {
            $this->initExpertCryosphereWheres();
            return;
        }
        if ('ExpertLanguages' == $relationName) {
            $this->initExpertLanguagess();
            return;
        }
        if ('ExpertSecondaryAffiliation' == $relationName) {
            $this->initExpertSecondaryAffiliations();
            return;
        }
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


        //since at least one column in the foreign key is at the same time a PK
        //we can not just set a PK to NULL in the lines below. We have to store
        //a backup of all values, so we are able to manipulate these items based on the onDelete value later.
        $this->expertCareerStagesScheduledForDeletion = clone $expertCareerStagesToDelete;

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


        //since at least one column in the foreign key is at the same time a PK
        //we can not just set a PK to NULL in the lines below. We have to store
        //a backup of all values, so we are able to manipulate these items based on the onDelete value later.
        $this->expertContactsScheduledForDeletion = clone $expertContactsToDelete;

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
     * Clears out the collExpertCryosphereMethodss collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addExpertCryosphereMethodss()
     */
    public function clearExpertCryosphereMethodss()
    {
        $this->collExpertCryosphereMethodss = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Reset is the collExpertCryosphereMethodss collection loaded partially.
     */
    public function resetPartialExpertCryosphereMethodss($v = true)
    {
        $this->collExpertCryosphereMethodssPartial = $v;
    }

    /**
     * Initializes the collExpertCryosphereMethodss collection.
     *
     * By default this just sets the collExpertCryosphereMethodss collection to an empty array (like clearcollExpertCryosphereMethodss());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param      boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initExpertCryosphereMethodss($overrideExisting = true)
    {
        if (null !== $this->collExpertCryosphereMethodss && !$overrideExisting) {
            return;
        }

        $collectionClassName = ExpertCryosphereMethodsTableMap::getTableMap()->getCollectionClassName();

        $this->collExpertCryosphereMethodss = new $collectionClassName;
        $this->collExpertCryosphereMethodss->setModel('\CryoConnectDB\ExpertCryosphereMethods');
    }

    /**
     * Gets an array of ChildExpertCryosphereMethods objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ChildExperts is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @return ObjectCollection|ChildExpertCryosphereMethods[] List of ChildExpertCryosphereMethods objects
     * @throws PropelException
     */
    public function getExpertCryosphereMethodss(Criteria $criteria = null, ConnectionInterface $con = null)
    {
        $partial = $this->collExpertCryosphereMethodssPartial && !$this->isNew();
        if (null === $this->collExpertCryosphereMethodss || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collExpertCryosphereMethodss) {
                // return empty collection
                $this->initExpertCryosphereMethodss();
            } else {
                $collExpertCryosphereMethodss = ChildExpertCryosphereMethodsQuery::create(null, $criteria)
                    ->filterByExperts($this)
                    ->find($con);

                if (null !== $criteria) {
                    if (false !== $this->collExpertCryosphereMethodssPartial && count($collExpertCryosphereMethodss)) {
                        $this->initExpertCryosphereMethodss(false);

                        foreach ($collExpertCryosphereMethodss as $obj) {
                            if (false == $this->collExpertCryosphereMethodss->contains($obj)) {
                                $this->collExpertCryosphereMethodss->append($obj);
                            }
                        }

                        $this->collExpertCryosphereMethodssPartial = true;
                    }

                    return $collExpertCryosphereMethodss;
                }

                if ($partial && $this->collExpertCryosphereMethodss) {
                    foreach ($this->collExpertCryosphereMethodss as $obj) {
                        if ($obj->isNew()) {
                            $collExpertCryosphereMethodss[] = $obj;
                        }
                    }
                }

                $this->collExpertCryosphereMethodss = $collExpertCryosphereMethodss;
                $this->collExpertCryosphereMethodssPartial = false;
            }
        }

        return $this->collExpertCryosphereMethodss;
    }

    /**
     * Sets a collection of ChildExpertCryosphereMethods objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      Collection $expertCryosphereMethodss A Propel collection.
     * @param      ConnectionInterface $con Optional connection object
     * @return $this|ChildExperts The current object (for fluent API support)
     */
    public function setExpertCryosphereMethodss(Collection $expertCryosphereMethodss, ConnectionInterface $con = null)
    {
        /** @var ChildExpertCryosphereMethods[] $expertCryosphereMethodssToDelete */
        $expertCryosphereMethodssToDelete = $this->getExpertCryosphereMethodss(new Criteria(), $con)->diff($expertCryosphereMethodss);


        //since at least one column in the foreign key is at the same time a PK
        //we can not just set a PK to NULL in the lines below. We have to store
        //a backup of all values, so we are able to manipulate these items based on the onDelete value later.
        $this->expertCryosphereMethodssScheduledForDeletion = clone $expertCryosphereMethodssToDelete;

        foreach ($expertCryosphereMethodssToDelete as $expertCryosphereMethodsRemoved) {
            $expertCryosphereMethodsRemoved->setExperts(null);
        }

        $this->collExpertCryosphereMethodss = null;
        foreach ($expertCryosphereMethodss as $expertCryosphereMethods) {
            $this->addExpertCryosphereMethods($expertCryosphereMethods);
        }

        $this->collExpertCryosphereMethodss = $expertCryosphereMethodss;
        $this->collExpertCryosphereMethodssPartial = false;

        return $this;
    }

    /**
     * Returns the number of related ExpertCryosphereMethods objects.
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct
     * @param      ConnectionInterface $con
     * @return int             Count of related ExpertCryosphereMethods objects.
     * @throws PropelException
     */
    public function countExpertCryosphereMethodss(Criteria $criteria = null, $distinct = false, ConnectionInterface $con = null)
    {
        $partial = $this->collExpertCryosphereMethodssPartial && !$this->isNew();
        if (null === $this->collExpertCryosphereMethodss || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collExpertCryosphereMethodss) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getExpertCryosphereMethodss());
            }

            $query = ChildExpertCryosphereMethodsQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByExperts($this)
                ->count($con);
        }

        return count($this->collExpertCryosphereMethodss);
    }

    /**
     * Method called to associate a ChildExpertCryosphereMethods object to this object
     * through the ChildExpertCryosphereMethods foreign key attribute.
     *
     * @param  ChildExpertCryosphereMethods $l ChildExpertCryosphereMethods
     * @return $this|\CryoConnectDB\Experts The current object (for fluent API support)
     */
    public function addExpertCryosphereMethods(ChildExpertCryosphereMethods $l)
    {
        if ($this->collExpertCryosphereMethodss === null) {
            $this->initExpertCryosphereMethodss();
            $this->collExpertCryosphereMethodssPartial = true;
        }

        if (!$this->collExpertCryosphereMethodss->contains($l)) {
            $this->doAddExpertCryosphereMethods($l);

            if ($this->expertCryosphereMethodssScheduledForDeletion and $this->expertCryosphereMethodssScheduledForDeletion->contains($l)) {
                $this->expertCryosphereMethodssScheduledForDeletion->remove($this->expertCryosphereMethodssScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param ChildExpertCryosphereMethods $expertCryosphereMethods The ChildExpertCryosphereMethods object to add.
     */
    protected function doAddExpertCryosphereMethods(ChildExpertCryosphereMethods $expertCryosphereMethods)
    {
        $this->collExpertCryosphereMethodss[]= $expertCryosphereMethods;
        $expertCryosphereMethods->setExperts($this);
    }

    /**
     * @param  ChildExpertCryosphereMethods $expertCryosphereMethods The ChildExpertCryosphereMethods object to remove.
     * @return $this|ChildExperts The current object (for fluent API support)
     */
    public function removeExpertCryosphereMethods(ChildExpertCryosphereMethods $expertCryosphereMethods)
    {
        if ($this->getExpertCryosphereMethodss()->contains($expertCryosphereMethods)) {
            $pos = $this->collExpertCryosphereMethodss->search($expertCryosphereMethods);
            $this->collExpertCryosphereMethodss->remove($pos);
            if (null === $this->expertCryosphereMethodssScheduledForDeletion) {
                $this->expertCryosphereMethodssScheduledForDeletion = clone $this->collExpertCryosphereMethodss;
                $this->expertCryosphereMethodssScheduledForDeletion->clear();
            }
            $this->expertCryosphereMethodssScheduledForDeletion[]= clone $expertCryosphereMethods;
            $expertCryosphereMethods->setExperts(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Experts is new, it will return
     * an empty collection; or if this Experts has previously
     * been saved, it will retrieve related ExpertCryosphereMethodss from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Experts.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildExpertCryosphereMethods[] List of ChildExpertCryosphereMethods objects
     */
    public function getExpertCryosphereMethodssJoinCryosphereMethods(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildExpertCryosphereMethodsQuery::create(null, $criteria);
        $query->joinWith('CryosphereMethods', $joinBehavior);

        return $this->getExpertCryosphereMethodss($query, $con);
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


        //since at least one column in the foreign key is at the same time a PK
        //we can not just set a PK to NULL in the lines below. We have to store
        //a backup of all values, so we are able to manipulate these items based on the onDelete value later.
        $this->expertCryosphereWhatsScheduledForDeletion = clone $expertCryosphereWhatsToDelete;

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


        //since at least one column in the foreign key is at the same time a PK
        //we can not just set a PK to NULL in the lines below. We have to store
        //a backup of all values, so we are able to manipulate these items based on the onDelete value later.
        $this->expertCryosphereWhatSpeceficsScheduledForDeletion = clone $expertCryosphereWhatSpeceficsToDelete;

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
     * Clears out the collExpertCryosphereWhens collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addExpertCryosphereWhens()
     */
    public function clearExpertCryosphereWhens()
    {
        $this->collExpertCryosphereWhens = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Reset is the collExpertCryosphereWhens collection loaded partially.
     */
    public function resetPartialExpertCryosphereWhens($v = true)
    {
        $this->collExpertCryosphereWhensPartial = $v;
    }

    /**
     * Initializes the collExpertCryosphereWhens collection.
     *
     * By default this just sets the collExpertCryosphereWhens collection to an empty array (like clearcollExpertCryosphereWhens());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param      boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initExpertCryosphereWhens($overrideExisting = true)
    {
        if (null !== $this->collExpertCryosphereWhens && !$overrideExisting) {
            return;
        }

        $collectionClassName = ExpertCryosphereWhenTableMap::getTableMap()->getCollectionClassName();

        $this->collExpertCryosphereWhens = new $collectionClassName;
        $this->collExpertCryosphereWhens->setModel('\CryoConnectDB\ExpertCryosphereWhen');
    }

    /**
     * Gets an array of ChildExpertCryosphereWhen objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ChildExperts is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @return ObjectCollection|ChildExpertCryosphereWhen[] List of ChildExpertCryosphereWhen objects
     * @throws PropelException
     */
    public function getExpertCryosphereWhens(Criteria $criteria = null, ConnectionInterface $con = null)
    {
        $partial = $this->collExpertCryosphereWhensPartial && !$this->isNew();
        if (null === $this->collExpertCryosphereWhens || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collExpertCryosphereWhens) {
                // return empty collection
                $this->initExpertCryosphereWhens();
            } else {
                $collExpertCryosphereWhens = ChildExpertCryosphereWhenQuery::create(null, $criteria)
                    ->filterByExperts($this)
                    ->find($con);

                if (null !== $criteria) {
                    if (false !== $this->collExpertCryosphereWhensPartial && count($collExpertCryosphereWhens)) {
                        $this->initExpertCryosphereWhens(false);

                        foreach ($collExpertCryosphereWhens as $obj) {
                            if (false == $this->collExpertCryosphereWhens->contains($obj)) {
                                $this->collExpertCryosphereWhens->append($obj);
                            }
                        }

                        $this->collExpertCryosphereWhensPartial = true;
                    }

                    return $collExpertCryosphereWhens;
                }

                if ($partial && $this->collExpertCryosphereWhens) {
                    foreach ($this->collExpertCryosphereWhens as $obj) {
                        if ($obj->isNew()) {
                            $collExpertCryosphereWhens[] = $obj;
                        }
                    }
                }

                $this->collExpertCryosphereWhens = $collExpertCryosphereWhens;
                $this->collExpertCryosphereWhensPartial = false;
            }
        }

        return $this->collExpertCryosphereWhens;
    }

    /**
     * Sets a collection of ChildExpertCryosphereWhen objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      Collection $expertCryosphereWhens A Propel collection.
     * @param      ConnectionInterface $con Optional connection object
     * @return $this|ChildExperts The current object (for fluent API support)
     */
    public function setExpertCryosphereWhens(Collection $expertCryosphereWhens, ConnectionInterface $con = null)
    {
        /** @var ChildExpertCryosphereWhen[] $expertCryosphereWhensToDelete */
        $expertCryosphereWhensToDelete = $this->getExpertCryosphereWhens(new Criteria(), $con)->diff($expertCryosphereWhens);


        //since at least one column in the foreign key is at the same time a PK
        //we can not just set a PK to NULL in the lines below. We have to store
        //a backup of all values, so we are able to manipulate these items based on the onDelete value later.
        $this->expertCryosphereWhensScheduledForDeletion = clone $expertCryosphereWhensToDelete;

        foreach ($expertCryosphereWhensToDelete as $expertCryosphereWhenRemoved) {
            $expertCryosphereWhenRemoved->setExperts(null);
        }

        $this->collExpertCryosphereWhens = null;
        foreach ($expertCryosphereWhens as $expertCryosphereWhen) {
            $this->addExpertCryosphereWhen($expertCryosphereWhen);
        }

        $this->collExpertCryosphereWhens = $expertCryosphereWhens;
        $this->collExpertCryosphereWhensPartial = false;

        return $this;
    }

    /**
     * Returns the number of related ExpertCryosphereWhen objects.
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct
     * @param      ConnectionInterface $con
     * @return int             Count of related ExpertCryosphereWhen objects.
     * @throws PropelException
     */
    public function countExpertCryosphereWhens(Criteria $criteria = null, $distinct = false, ConnectionInterface $con = null)
    {
        $partial = $this->collExpertCryosphereWhensPartial && !$this->isNew();
        if (null === $this->collExpertCryosphereWhens || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collExpertCryosphereWhens) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getExpertCryosphereWhens());
            }

            $query = ChildExpertCryosphereWhenQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByExperts($this)
                ->count($con);
        }

        return count($this->collExpertCryosphereWhens);
    }

    /**
     * Method called to associate a ChildExpertCryosphereWhen object to this object
     * through the ChildExpertCryosphereWhen foreign key attribute.
     *
     * @param  ChildExpertCryosphereWhen $l ChildExpertCryosphereWhen
     * @return $this|\CryoConnectDB\Experts The current object (for fluent API support)
     */
    public function addExpertCryosphereWhen(ChildExpertCryosphereWhen $l)
    {
        if ($this->collExpertCryosphereWhens === null) {
            $this->initExpertCryosphereWhens();
            $this->collExpertCryosphereWhensPartial = true;
        }

        if (!$this->collExpertCryosphereWhens->contains($l)) {
            $this->doAddExpertCryosphereWhen($l);

            if ($this->expertCryosphereWhensScheduledForDeletion and $this->expertCryosphereWhensScheduledForDeletion->contains($l)) {
                $this->expertCryosphereWhensScheduledForDeletion->remove($this->expertCryosphereWhensScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param ChildExpertCryosphereWhen $expertCryosphereWhen The ChildExpertCryosphereWhen object to add.
     */
    protected function doAddExpertCryosphereWhen(ChildExpertCryosphereWhen $expertCryosphereWhen)
    {
        $this->collExpertCryosphereWhens[]= $expertCryosphereWhen;
        $expertCryosphereWhen->setExperts($this);
    }

    /**
     * @param  ChildExpertCryosphereWhen $expertCryosphereWhen The ChildExpertCryosphereWhen object to remove.
     * @return $this|ChildExperts The current object (for fluent API support)
     */
    public function removeExpertCryosphereWhen(ChildExpertCryosphereWhen $expertCryosphereWhen)
    {
        if ($this->getExpertCryosphereWhens()->contains($expertCryosphereWhen)) {
            $pos = $this->collExpertCryosphereWhens->search($expertCryosphereWhen);
            $this->collExpertCryosphereWhens->remove($pos);
            if (null === $this->expertCryosphereWhensScheduledForDeletion) {
                $this->expertCryosphereWhensScheduledForDeletion = clone $this->collExpertCryosphereWhens;
                $this->expertCryosphereWhensScheduledForDeletion->clear();
            }
            $this->expertCryosphereWhensScheduledForDeletion[]= clone $expertCryosphereWhen;
            $expertCryosphereWhen->setExperts(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Experts is new, it will return
     * an empty collection; or if this Experts has previously
     * been saved, it will retrieve related ExpertCryosphereWhens from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Experts.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildExpertCryosphereWhen[] List of ChildExpertCryosphereWhen objects
     */
    public function getExpertCryosphereWhensJoinCryosphereWhen(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildExpertCryosphereWhenQuery::create(null, $criteria);
        $query->joinWith('CryosphereWhen', $joinBehavior);

        return $this->getExpertCryosphereWhens($query, $con);
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
     * If this ChildExperts is new, it will return
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
                    ->filterByExperts($this)
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
     * @return $this|ChildExperts The current object (for fluent API support)
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
            $expertCryosphereWhereRemoved->setExperts(null);
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
                ->filterByExperts($this)
                ->count($con);
        }

        return count($this->collExpertCryosphereWheres);
    }

    /**
     * Method called to associate a ChildExpertCryosphereWhere object to this object
     * through the ChildExpertCryosphereWhere foreign key attribute.
     *
     * @param  ChildExpertCryosphereWhere $l ChildExpertCryosphereWhere
     * @return $this|\CryoConnectDB\Experts The current object (for fluent API support)
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
        $expertCryosphereWhere->setExperts($this);
    }

    /**
     * @param  ChildExpertCryosphereWhere $expertCryosphereWhere The ChildExpertCryosphereWhere object to remove.
     * @return $this|ChildExperts The current object (for fluent API support)
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
            $expertCryosphereWhere->setExperts(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Experts is new, it will return
     * an empty collection; or if this Experts has previously
     * been saved, it will retrieve related ExpertCryosphereWheres from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Experts.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildExpertCryosphereWhere[] List of ChildExpertCryosphereWhere objects
     */
    public function getExpertCryosphereWheresJoinCryosphereWhere(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildExpertCryosphereWhereQuery::create(null, $criteria);
        $query->joinWith('CryosphereWhere', $joinBehavior);

        return $this->getExpertCryosphereWheres($query, $con);
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


        //since at least one column in the foreign key is at the same time a PK
        //we can not just set a PK to NULL in the lines below. We have to store
        //a backup of all values, so we are able to manipulate these items based on the onDelete value later.
        $this->expertLanguagessScheduledForDeletion = clone $expertLanguagessToDelete;

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
     * Gets a single ChildExpertPrimaryAffiliation object, which is related to this object by a one-to-one relationship.
     *
     * @param  ConnectionInterface $con optional connection object
     * @return ChildExpertPrimaryAffiliation
     * @throws PropelException
     */
    public function getExpertPrimaryAffiliation(ConnectionInterface $con = null)
    {

        if ($this->singleExpertPrimaryAffiliation === null && !$this->isNew()) {
            $this->singleExpertPrimaryAffiliation = ChildExpertPrimaryAffiliationQuery::create()->findPk($this->getPrimaryKey(), $con);
        }

        return $this->singleExpertPrimaryAffiliation;
    }

    /**
     * Sets a single ChildExpertPrimaryAffiliation object as related to this object by a one-to-one relationship.
     *
     * @param  ChildExpertPrimaryAffiliation $v ChildExpertPrimaryAffiliation
     * @return $this|\CryoConnectDB\Experts The current object (for fluent API support)
     * @throws PropelException
     */
    public function setExpertPrimaryAffiliation(ChildExpertPrimaryAffiliation $v = null)
    {
        $this->singleExpertPrimaryAffiliation = $v;

        // Make sure that that the passed-in ChildExpertPrimaryAffiliation isn't already associated with this object
        if ($v !== null && $v->getExperts(null, false) === null) {
            $v->setExperts($this);
        }

        return $this;
    }

    /**
     * Clears out the collExpertSecondaryAffiliations collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addExpertSecondaryAffiliations()
     */
    public function clearExpertSecondaryAffiliations()
    {
        $this->collExpertSecondaryAffiliations = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Reset is the collExpertSecondaryAffiliations collection loaded partially.
     */
    public function resetPartialExpertSecondaryAffiliations($v = true)
    {
        $this->collExpertSecondaryAffiliationsPartial = $v;
    }

    /**
     * Initializes the collExpertSecondaryAffiliations collection.
     *
     * By default this just sets the collExpertSecondaryAffiliations collection to an empty array (like clearcollExpertSecondaryAffiliations());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param      boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initExpertSecondaryAffiliations($overrideExisting = true)
    {
        if (null !== $this->collExpertSecondaryAffiliations && !$overrideExisting) {
            return;
        }

        $collectionClassName = ExpertSecondaryAffiliationTableMap::getTableMap()->getCollectionClassName();

        $this->collExpertSecondaryAffiliations = new $collectionClassName;
        $this->collExpertSecondaryAffiliations->setModel('\CryoConnectDB\ExpertSecondaryAffiliation');
    }

    /**
     * Gets an array of ChildExpertSecondaryAffiliation objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ChildExperts is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @return ObjectCollection|ChildExpertSecondaryAffiliation[] List of ChildExpertSecondaryAffiliation objects
     * @throws PropelException
     */
    public function getExpertSecondaryAffiliations(Criteria $criteria = null, ConnectionInterface $con = null)
    {
        $partial = $this->collExpertSecondaryAffiliationsPartial && !$this->isNew();
        if (null === $this->collExpertSecondaryAffiliations || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collExpertSecondaryAffiliations) {
                // return empty collection
                $this->initExpertSecondaryAffiliations();
            } else {
                $collExpertSecondaryAffiliations = ChildExpertSecondaryAffiliationQuery::create(null, $criteria)
                    ->filterByExperts($this)
                    ->find($con);

                if (null !== $criteria) {
                    if (false !== $this->collExpertSecondaryAffiliationsPartial && count($collExpertSecondaryAffiliations)) {
                        $this->initExpertSecondaryAffiliations(false);

                        foreach ($collExpertSecondaryAffiliations as $obj) {
                            if (false == $this->collExpertSecondaryAffiliations->contains($obj)) {
                                $this->collExpertSecondaryAffiliations->append($obj);
                            }
                        }

                        $this->collExpertSecondaryAffiliationsPartial = true;
                    }

                    return $collExpertSecondaryAffiliations;
                }

                if ($partial && $this->collExpertSecondaryAffiliations) {
                    foreach ($this->collExpertSecondaryAffiliations as $obj) {
                        if ($obj->isNew()) {
                            $collExpertSecondaryAffiliations[] = $obj;
                        }
                    }
                }

                $this->collExpertSecondaryAffiliations = $collExpertSecondaryAffiliations;
                $this->collExpertSecondaryAffiliationsPartial = false;
            }
        }

        return $this->collExpertSecondaryAffiliations;
    }

    /**
     * Sets a collection of ChildExpertSecondaryAffiliation objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      Collection $expertSecondaryAffiliations A Propel collection.
     * @param      ConnectionInterface $con Optional connection object
     * @return $this|ChildExperts The current object (for fluent API support)
     */
    public function setExpertSecondaryAffiliations(Collection $expertSecondaryAffiliations, ConnectionInterface $con = null)
    {
        /** @var ChildExpertSecondaryAffiliation[] $expertSecondaryAffiliationsToDelete */
        $expertSecondaryAffiliationsToDelete = $this->getExpertSecondaryAffiliations(new Criteria(), $con)->diff($expertSecondaryAffiliations);


        //since at least one column in the foreign key is at the same time a PK
        //we can not just set a PK to NULL in the lines below. We have to store
        //a backup of all values, so we are able to manipulate these items based on the onDelete value later.
        $this->expertSecondaryAffiliationsScheduledForDeletion = clone $expertSecondaryAffiliationsToDelete;

        foreach ($expertSecondaryAffiliationsToDelete as $expertSecondaryAffiliationRemoved) {
            $expertSecondaryAffiliationRemoved->setExperts(null);
        }

        $this->collExpertSecondaryAffiliations = null;
        foreach ($expertSecondaryAffiliations as $expertSecondaryAffiliation) {
            $this->addExpertSecondaryAffiliation($expertSecondaryAffiliation);
        }

        $this->collExpertSecondaryAffiliations = $expertSecondaryAffiliations;
        $this->collExpertSecondaryAffiliationsPartial = false;

        return $this;
    }

    /**
     * Returns the number of related ExpertSecondaryAffiliation objects.
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct
     * @param      ConnectionInterface $con
     * @return int             Count of related ExpertSecondaryAffiliation objects.
     * @throws PropelException
     */
    public function countExpertSecondaryAffiliations(Criteria $criteria = null, $distinct = false, ConnectionInterface $con = null)
    {
        $partial = $this->collExpertSecondaryAffiliationsPartial && !$this->isNew();
        if (null === $this->collExpertSecondaryAffiliations || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collExpertSecondaryAffiliations) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getExpertSecondaryAffiliations());
            }

            $query = ChildExpertSecondaryAffiliationQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByExperts($this)
                ->count($con);
        }

        return count($this->collExpertSecondaryAffiliations);
    }

    /**
     * Method called to associate a ChildExpertSecondaryAffiliation object to this object
     * through the ChildExpertSecondaryAffiliation foreign key attribute.
     *
     * @param  ChildExpertSecondaryAffiliation $l ChildExpertSecondaryAffiliation
     * @return $this|\CryoConnectDB\Experts The current object (for fluent API support)
     */
    public function addExpertSecondaryAffiliation(ChildExpertSecondaryAffiliation $l)
    {
        if ($this->collExpertSecondaryAffiliations === null) {
            $this->initExpertSecondaryAffiliations();
            $this->collExpertSecondaryAffiliationsPartial = true;
        }

        if (!$this->collExpertSecondaryAffiliations->contains($l)) {
            $this->doAddExpertSecondaryAffiliation($l);

            if ($this->expertSecondaryAffiliationsScheduledForDeletion and $this->expertSecondaryAffiliationsScheduledForDeletion->contains($l)) {
                $this->expertSecondaryAffiliationsScheduledForDeletion->remove($this->expertSecondaryAffiliationsScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param ChildExpertSecondaryAffiliation $expertSecondaryAffiliation The ChildExpertSecondaryAffiliation object to add.
     */
    protected function doAddExpertSecondaryAffiliation(ChildExpertSecondaryAffiliation $expertSecondaryAffiliation)
    {
        $this->collExpertSecondaryAffiliations[]= $expertSecondaryAffiliation;
        $expertSecondaryAffiliation->setExperts($this);
    }

    /**
     * @param  ChildExpertSecondaryAffiliation $expertSecondaryAffiliation The ChildExpertSecondaryAffiliation object to remove.
     * @return $this|ChildExperts The current object (for fluent API support)
     */
    public function removeExpertSecondaryAffiliation(ChildExpertSecondaryAffiliation $expertSecondaryAffiliation)
    {
        if ($this->getExpertSecondaryAffiliations()->contains($expertSecondaryAffiliation)) {
            $pos = $this->collExpertSecondaryAffiliations->search($expertSecondaryAffiliation);
            $this->collExpertSecondaryAffiliations->remove($pos);
            if (null === $this->expertSecondaryAffiliationsScheduledForDeletion) {
                $this->expertSecondaryAffiliationsScheduledForDeletion = clone $this->collExpertSecondaryAffiliations;
                $this->expertSecondaryAffiliationsScheduledForDeletion->clear();
            }
            $this->expertSecondaryAffiliationsScheduledForDeletion[]= clone $expertSecondaryAffiliation;
            $expertSecondaryAffiliation->setExperts(null);
        }

        return $this;
    }

    /**
     * Clears out the collCareerStages collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addCareerStages()
     */
    public function clearCareerStages()
    {
        $this->collCareerStages = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Initializes the collCareerStages crossRef collection.
     *
     * By default this just sets the collCareerStages collection to an empty collection (like clearCareerStages());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @return void
     */
    public function initCareerStages()
    {
        $collectionClassName = ExpertCareerStageTableMap::getTableMap()->getCollectionClassName();

        $this->collCareerStages = new $collectionClassName;
        $this->collCareerStagesPartial = true;
        $this->collCareerStages->setModel('\CryoConnectDB\CareerStage');
    }

    /**
     * Checks if the collCareerStages collection is loaded.
     *
     * @return bool
     */
    public function isCareerStagesLoaded()
    {
        return null !== $this->collCareerStages;
    }

    /**
     * Gets a collection of ChildCareerStage objects related by a many-to-many relationship
     * to the current object by way of the expert_career_stage cross-reference table.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ChildExperts is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria Optional query object to filter the query
     * @param      ConnectionInterface $con Optional connection object
     *
     * @return ObjectCollection|ChildCareerStage[] List of ChildCareerStage objects
     */
    public function getCareerStages(Criteria $criteria = null, ConnectionInterface $con = null)
    {
        $partial = $this->collCareerStagesPartial && !$this->isNew();
        if (null === $this->collCareerStages || null !== $criteria || $partial) {
            if ($this->isNew()) {
                // return empty collection
                if (null === $this->collCareerStages) {
                    $this->initCareerStages();
                }
            } else {

                $query = ChildCareerStageQuery::create(null, $criteria)
                    ->filterByExperts($this);
                $collCareerStages = $query->find($con);
                if (null !== $criteria) {
                    return $collCareerStages;
                }

                if ($partial && $this->collCareerStages) {
                    //make sure that already added objects gets added to the list of the database.
                    foreach ($this->collCareerStages as $obj) {
                        if (!$collCareerStages->contains($obj)) {
                            $collCareerStages[] = $obj;
                        }
                    }
                }

                $this->collCareerStages = $collCareerStages;
                $this->collCareerStagesPartial = false;
            }
        }

        return $this->collCareerStages;
    }

    /**
     * Sets a collection of CareerStage objects related by a many-to-many relationship
     * to the current object by way of the expert_career_stage cross-reference table.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param  Collection $careerStages A Propel collection.
     * @param  ConnectionInterface $con Optional connection object
     * @return $this|ChildExperts The current object (for fluent API support)
     */
    public function setCareerStages(Collection $careerStages, ConnectionInterface $con = null)
    {
        $this->clearCareerStages();
        $currentCareerStages = $this->getCareerStages();

        $careerStagesScheduledForDeletion = $currentCareerStages->diff($careerStages);

        foreach ($careerStagesScheduledForDeletion as $toDelete) {
            $this->removeCareerStage($toDelete);
        }

        foreach ($careerStages as $careerStage) {
            if (!$currentCareerStages->contains($careerStage)) {
                $this->doAddCareerStage($careerStage);
            }
        }

        $this->collCareerStagesPartial = false;
        $this->collCareerStages = $careerStages;

        return $this;
    }

    /**
     * Gets the number of CareerStage objects related by a many-to-many relationship
     * to the current object by way of the expert_career_stage cross-reference table.
     *
     * @param      Criteria $criteria Optional query object to filter the query
     * @param      boolean $distinct Set to true to force count distinct
     * @param      ConnectionInterface $con Optional connection object
     *
     * @return int the number of related CareerStage objects
     */
    public function countCareerStages(Criteria $criteria = null, $distinct = false, ConnectionInterface $con = null)
    {
        $partial = $this->collCareerStagesPartial && !$this->isNew();
        if (null === $this->collCareerStages || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collCareerStages) {
                return 0;
            } else {

                if ($partial && !$criteria) {
                    return count($this->getCareerStages());
                }

                $query = ChildCareerStageQuery::create(null, $criteria);
                if ($distinct) {
                    $query->distinct();
                }

                return $query
                    ->filterByExperts($this)
                    ->count($con);
            }
        } else {
            return count($this->collCareerStages);
        }
    }

    /**
     * Associate a ChildCareerStage to this object
     * through the expert_career_stage cross reference table.
     *
     * @param ChildCareerStage $careerStage
     * @return ChildExperts The current object (for fluent API support)
     */
    public function addCareerStage(ChildCareerStage $careerStage)
    {
        if ($this->collCareerStages === null) {
            $this->initCareerStages();
        }

        if (!$this->getCareerStages()->contains($careerStage)) {
            // only add it if the **same** object is not already associated
            $this->collCareerStages->push($careerStage);
            $this->doAddCareerStage($careerStage);
        }

        return $this;
    }

    /**
     *
     * @param ChildCareerStage $careerStage
     */
    protected function doAddCareerStage(ChildCareerStage $careerStage)
    {
        $expertCareerStage = new ChildExpertCareerStage();

        $expertCareerStage->setCareerStage($careerStage);

        $expertCareerStage->setExperts($this);

        $this->addExpertCareerStage($expertCareerStage);

        // set the back reference to this object directly as using provided method either results
        // in endless loop or in multiple relations
        if (!$careerStage->isExpertssLoaded()) {
            $careerStage->initExpertss();
            $careerStage->getExpertss()->push($this);
        } elseif (!$careerStage->getExpertss()->contains($this)) {
            $careerStage->getExpertss()->push($this);
        }

    }

    /**
     * Remove careerStage of this object
     * through the expert_career_stage cross reference table.
     *
     * @param ChildCareerStage $careerStage
     * @return ChildExperts The current object (for fluent API support)
     */
    public function removeCareerStage(ChildCareerStage $careerStage)
    {
        if ($this->getCareerStages()->contains($careerStage)) {
            $expertCareerStage = new ChildExpertCareerStage();
            $expertCareerStage->setCareerStage($careerStage);
            if ($careerStage->isExpertssLoaded()) {
                //remove the back reference if available
                $careerStage->getExpertss()->removeObject($this);
            }

            $expertCareerStage->setExperts($this);
            $this->removeExpertCareerStage(clone $expertCareerStage);
            $expertCareerStage->clear();

            $this->collCareerStages->remove($this->collCareerStages->search($careerStage));

            if (null === $this->careerStagesScheduledForDeletion) {
                $this->careerStagesScheduledForDeletion = clone $this->collCareerStages;
                $this->careerStagesScheduledForDeletion->clear();
            }

            $this->careerStagesScheduledForDeletion->push($careerStage);
        }


        return $this;
    }

    /**
     * Clears out the collContactTypess collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addContactTypess()
     */
    public function clearContactTypess()
    {
        $this->collContactTypess = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Initializes the collContactTypess crossRef collection.
     *
     * By default this just sets the collContactTypess collection to an empty collection (like clearContactTypess());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @return void
     */
    public function initContactTypess()
    {
        $collectionClassName = ExpertContactTableMap::getTableMap()->getCollectionClassName();

        $this->collContactTypess = new $collectionClassName;
        $this->collContactTypessPartial = true;
        $this->collContactTypess->setModel('\CryoConnectDB\ContactTypes');
    }

    /**
     * Checks if the collContactTypess collection is loaded.
     *
     * @return bool
     */
    public function isContactTypessLoaded()
    {
        return null !== $this->collContactTypess;
    }

    /**
     * Gets a collection of ChildContactTypes objects related by a many-to-many relationship
     * to the current object by way of the expert_contact cross-reference table.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ChildExperts is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria Optional query object to filter the query
     * @param      ConnectionInterface $con Optional connection object
     *
     * @return ObjectCollection|ChildContactTypes[] List of ChildContactTypes objects
     */
    public function getContactTypess(Criteria $criteria = null, ConnectionInterface $con = null)
    {
        $partial = $this->collContactTypessPartial && !$this->isNew();
        if (null === $this->collContactTypess || null !== $criteria || $partial) {
            if ($this->isNew()) {
                // return empty collection
                if (null === $this->collContactTypess) {
                    $this->initContactTypess();
                }
            } else {

                $query = ChildContactTypesQuery::create(null, $criteria)
                    ->filterByExperts($this);
                $collContactTypess = $query->find($con);
                if (null !== $criteria) {
                    return $collContactTypess;
                }

                if ($partial && $this->collContactTypess) {
                    //make sure that already added objects gets added to the list of the database.
                    foreach ($this->collContactTypess as $obj) {
                        if (!$collContactTypess->contains($obj)) {
                            $collContactTypess[] = $obj;
                        }
                    }
                }

                $this->collContactTypess = $collContactTypess;
                $this->collContactTypessPartial = false;
            }
        }

        return $this->collContactTypess;
    }

    /**
     * Sets a collection of ContactTypes objects related by a many-to-many relationship
     * to the current object by way of the expert_contact cross-reference table.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param  Collection $contactTypess A Propel collection.
     * @param  ConnectionInterface $con Optional connection object
     * @return $this|ChildExperts The current object (for fluent API support)
     */
    public function setContactTypess(Collection $contactTypess, ConnectionInterface $con = null)
    {
        $this->clearContactTypess();
        $currentContactTypess = $this->getContactTypess();

        $contactTypessScheduledForDeletion = $currentContactTypess->diff($contactTypess);

        foreach ($contactTypessScheduledForDeletion as $toDelete) {
            $this->removeContactTypes($toDelete);
        }

        foreach ($contactTypess as $contactTypes) {
            if (!$currentContactTypess->contains($contactTypes)) {
                $this->doAddContactTypes($contactTypes);
            }
        }

        $this->collContactTypessPartial = false;
        $this->collContactTypess = $contactTypess;

        return $this;
    }

    /**
     * Gets the number of ContactTypes objects related by a many-to-many relationship
     * to the current object by way of the expert_contact cross-reference table.
     *
     * @param      Criteria $criteria Optional query object to filter the query
     * @param      boolean $distinct Set to true to force count distinct
     * @param      ConnectionInterface $con Optional connection object
     *
     * @return int the number of related ContactTypes objects
     */
    public function countContactTypess(Criteria $criteria = null, $distinct = false, ConnectionInterface $con = null)
    {
        $partial = $this->collContactTypessPartial && !$this->isNew();
        if (null === $this->collContactTypess || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collContactTypess) {
                return 0;
            } else {

                if ($partial && !$criteria) {
                    return count($this->getContactTypess());
                }

                $query = ChildContactTypesQuery::create(null, $criteria);
                if ($distinct) {
                    $query->distinct();
                }

                return $query
                    ->filterByExperts($this)
                    ->count($con);
            }
        } else {
            return count($this->collContactTypess);
        }
    }

    /**
     * Associate a ChildContactTypes to this object
     * through the expert_contact cross reference table.
     *
     * @param ChildContactTypes $contactTypes
     * @return ChildExperts The current object (for fluent API support)
     */
    public function addContactTypes(ChildContactTypes $contactTypes)
    {
        if ($this->collContactTypess === null) {
            $this->initContactTypess();
        }

        if (!$this->getContactTypess()->contains($contactTypes)) {
            // only add it if the **same** object is not already associated
            $this->collContactTypess->push($contactTypes);
            $this->doAddContactTypes($contactTypes);
        }

        return $this;
    }

    /**
     *
     * @param ChildContactTypes $contactTypes
     */
    protected function doAddContactTypes(ChildContactTypes $contactTypes)
    {
        $expertContact = new ChildExpertContact();

        $expertContact->setContactTypes($contactTypes);

        $expertContact->setExperts($this);

        $this->addExpertContact($expertContact);

        // set the back reference to this object directly as using provided method either results
        // in endless loop or in multiple relations
        if (!$contactTypes->isExpertssLoaded()) {
            $contactTypes->initExpertss();
            $contactTypes->getExpertss()->push($this);
        } elseif (!$contactTypes->getExpertss()->contains($this)) {
            $contactTypes->getExpertss()->push($this);
        }

    }

    /**
     * Remove contactTypes of this object
     * through the expert_contact cross reference table.
     *
     * @param ChildContactTypes $contactTypes
     * @return ChildExperts The current object (for fluent API support)
     */
    public function removeContactTypes(ChildContactTypes $contactTypes)
    {
        if ($this->getContactTypess()->contains($contactTypes)) {
            $expertContact = new ChildExpertContact();
            $expertContact->setContactTypes($contactTypes);
            if ($contactTypes->isExpertssLoaded()) {
                //remove the back reference if available
                $contactTypes->getExpertss()->removeObject($this);
            }

            $expertContact->setExperts($this);
            $this->removeExpertContact(clone $expertContact);
            $expertContact->clear();

            $this->collContactTypess->remove($this->collContactTypess->search($contactTypes));

            if (null === $this->contactTypessScheduledForDeletion) {
                $this->contactTypessScheduledForDeletion = clone $this->collContactTypess;
                $this->contactTypessScheduledForDeletion->clear();
            }

            $this->contactTypessScheduledForDeletion->push($contactTypes);
        }


        return $this;
    }

    /**
     * Clears out the collCryosphereMethodss collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addCryosphereMethodss()
     */
    public function clearCryosphereMethodss()
    {
        $this->collCryosphereMethodss = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Initializes the collCryosphereMethodss crossRef collection.
     *
     * By default this just sets the collCryosphereMethodss collection to an empty collection (like clearCryosphereMethodss());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @return void
     */
    public function initCryosphereMethodss()
    {
        $collectionClassName = ExpertCryosphereMethodsTableMap::getTableMap()->getCollectionClassName();

        $this->collCryosphereMethodss = new $collectionClassName;
        $this->collCryosphereMethodssPartial = true;
        $this->collCryosphereMethodss->setModel('\CryoConnectDB\CryosphereMethods');
    }

    /**
     * Checks if the collCryosphereMethodss collection is loaded.
     *
     * @return bool
     */
    public function isCryosphereMethodssLoaded()
    {
        return null !== $this->collCryosphereMethodss;
    }

    /**
     * Gets a collection of ChildCryosphereMethods objects related by a many-to-many relationship
     * to the current object by way of the expert_cryosphere_methods cross-reference table.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ChildExperts is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria Optional query object to filter the query
     * @param      ConnectionInterface $con Optional connection object
     *
     * @return ObjectCollection|ChildCryosphereMethods[] List of ChildCryosphereMethods objects
     */
    public function getCryosphereMethodss(Criteria $criteria = null, ConnectionInterface $con = null)
    {
        $partial = $this->collCryosphereMethodssPartial && !$this->isNew();
        if (null === $this->collCryosphereMethodss || null !== $criteria || $partial) {
            if ($this->isNew()) {
                // return empty collection
                if (null === $this->collCryosphereMethodss) {
                    $this->initCryosphereMethodss();
                }
            } else {

                $query = ChildCryosphereMethodsQuery::create(null, $criteria)
                    ->filterByExperts($this);
                $collCryosphereMethodss = $query->find($con);
                if (null !== $criteria) {
                    return $collCryosphereMethodss;
                }

                if ($partial && $this->collCryosphereMethodss) {
                    //make sure that already added objects gets added to the list of the database.
                    foreach ($this->collCryosphereMethodss as $obj) {
                        if (!$collCryosphereMethodss->contains($obj)) {
                            $collCryosphereMethodss[] = $obj;
                        }
                    }
                }

                $this->collCryosphereMethodss = $collCryosphereMethodss;
                $this->collCryosphereMethodssPartial = false;
            }
        }

        return $this->collCryosphereMethodss;
    }

    /**
     * Sets a collection of CryosphereMethods objects related by a many-to-many relationship
     * to the current object by way of the expert_cryosphere_methods cross-reference table.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param  Collection $cryosphereMethodss A Propel collection.
     * @param  ConnectionInterface $con Optional connection object
     * @return $this|ChildExperts The current object (for fluent API support)
     */
    public function setCryosphereMethodss(Collection $cryosphereMethodss, ConnectionInterface $con = null)
    {
        $this->clearCryosphereMethodss();
        $currentCryosphereMethodss = $this->getCryosphereMethodss();

        $cryosphereMethodssScheduledForDeletion = $currentCryosphereMethodss->diff($cryosphereMethodss);

        foreach ($cryosphereMethodssScheduledForDeletion as $toDelete) {
            $this->removeCryosphereMethods($toDelete);
        }

        foreach ($cryosphereMethodss as $cryosphereMethods) {
            if (!$currentCryosphereMethodss->contains($cryosphereMethods)) {
                $this->doAddCryosphereMethods($cryosphereMethods);
            }
        }

        $this->collCryosphereMethodssPartial = false;
        $this->collCryosphereMethodss = $cryosphereMethodss;

        return $this;
    }

    /**
     * Gets the number of CryosphereMethods objects related by a many-to-many relationship
     * to the current object by way of the expert_cryosphere_methods cross-reference table.
     *
     * @param      Criteria $criteria Optional query object to filter the query
     * @param      boolean $distinct Set to true to force count distinct
     * @param      ConnectionInterface $con Optional connection object
     *
     * @return int the number of related CryosphereMethods objects
     */
    public function countCryosphereMethodss(Criteria $criteria = null, $distinct = false, ConnectionInterface $con = null)
    {
        $partial = $this->collCryosphereMethodssPartial && !$this->isNew();
        if (null === $this->collCryosphereMethodss || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collCryosphereMethodss) {
                return 0;
            } else {

                if ($partial && !$criteria) {
                    return count($this->getCryosphereMethodss());
                }

                $query = ChildCryosphereMethodsQuery::create(null, $criteria);
                if ($distinct) {
                    $query->distinct();
                }

                return $query
                    ->filterByExperts($this)
                    ->count($con);
            }
        } else {
            return count($this->collCryosphereMethodss);
        }
    }

    /**
     * Associate a ChildCryosphereMethods to this object
     * through the expert_cryosphere_methods cross reference table.
     *
     * @param ChildCryosphereMethods $cryosphereMethods
     * @return ChildExperts The current object (for fluent API support)
     */
    public function addCryosphereMethods(ChildCryosphereMethods $cryosphereMethods)
    {
        if ($this->collCryosphereMethodss === null) {
            $this->initCryosphereMethodss();
        }

        if (!$this->getCryosphereMethodss()->contains($cryosphereMethods)) {
            // only add it if the **same** object is not already associated
            $this->collCryosphereMethodss->push($cryosphereMethods);
            $this->doAddCryosphereMethods($cryosphereMethods);
        }

        return $this;
    }

    /**
     *
     * @param ChildCryosphereMethods $cryosphereMethods
     */
    protected function doAddCryosphereMethods(ChildCryosphereMethods $cryosphereMethods)
    {
        $expertCryosphereMethods = new ChildExpertCryosphereMethods();

        $expertCryosphereMethods->setCryosphereMethods($cryosphereMethods);

        $expertCryosphereMethods->setExperts($this);

        $this->addExpertCryosphereMethods($expertCryosphereMethods);

        // set the back reference to this object directly as using provided method either results
        // in endless loop or in multiple relations
        if (!$cryosphereMethods->isExpertssLoaded()) {
            $cryosphereMethods->initExpertss();
            $cryosphereMethods->getExpertss()->push($this);
        } elseif (!$cryosphereMethods->getExpertss()->contains($this)) {
            $cryosphereMethods->getExpertss()->push($this);
        }

    }

    /**
     * Remove cryosphereMethods of this object
     * through the expert_cryosphere_methods cross reference table.
     *
     * @param ChildCryosphereMethods $cryosphereMethods
     * @return ChildExperts The current object (for fluent API support)
     */
    public function removeCryosphereMethods(ChildCryosphereMethods $cryosphereMethods)
    {
        if ($this->getCryosphereMethodss()->contains($cryosphereMethods)) {
            $expertCryosphereMethods = new ChildExpertCryosphereMethods();
            $expertCryosphereMethods->setCryosphereMethods($cryosphereMethods);
            if ($cryosphereMethods->isExpertssLoaded()) {
                //remove the back reference if available
                $cryosphereMethods->getExpertss()->removeObject($this);
            }

            $expertCryosphereMethods->setExperts($this);
            $this->removeExpertCryosphereMethods(clone $expertCryosphereMethods);
            $expertCryosphereMethods->clear();

            $this->collCryosphereMethodss->remove($this->collCryosphereMethodss->search($cryosphereMethods));

            if (null === $this->cryosphereMethodssScheduledForDeletion) {
                $this->cryosphereMethodssScheduledForDeletion = clone $this->collCryosphereMethodss;
                $this->cryosphereMethodssScheduledForDeletion->clear();
            }

            $this->cryosphereMethodssScheduledForDeletion->push($cryosphereMethods);
        }


        return $this;
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
        $collectionClassName = ExpertCryosphereWhatTableMap::getTableMap()->getCollectionClassName();

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
     * to the current object by way of the expert_cryosphere_what cross-reference table.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ChildExperts is new, it will return
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
                    ->filterByExperts($this);
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
     * to the current object by way of the expert_cryosphere_what cross-reference table.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param  Collection $cryosphereWhats A Propel collection.
     * @param  ConnectionInterface $con Optional connection object
     * @return $this|ChildExperts The current object (for fluent API support)
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
     * to the current object by way of the expert_cryosphere_what cross-reference table.
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
                    ->filterByExperts($this)
                    ->count($con);
            }
        } else {
            return count($this->collCryosphereWhats);
        }
    }

    /**
     * Associate a ChildCryosphereWhat to this object
     * through the expert_cryosphere_what cross reference table.
     *
     * @param ChildCryosphereWhat $cryosphereWhat
     * @return ChildExperts The current object (for fluent API support)
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
        $expertCryosphereWhat = new ChildExpertCryosphereWhat();

        $expertCryosphereWhat->setCryosphereWhat($cryosphereWhat);

        $expertCryosphereWhat->setExperts($this);

        $this->addExpertCryosphereWhat($expertCryosphereWhat);

        // set the back reference to this object directly as using provided method either results
        // in endless loop or in multiple relations
        if (!$cryosphereWhat->isExpertssLoaded()) {
            $cryosphereWhat->initExpertss();
            $cryosphereWhat->getExpertss()->push($this);
        } elseif (!$cryosphereWhat->getExpertss()->contains($this)) {
            $cryosphereWhat->getExpertss()->push($this);
        }

    }

    /**
     * Remove cryosphereWhat of this object
     * through the expert_cryosphere_what cross reference table.
     *
     * @param ChildCryosphereWhat $cryosphereWhat
     * @return ChildExperts The current object (for fluent API support)
     */
    public function removeCryosphereWhat(ChildCryosphereWhat $cryosphereWhat)
    {
        if ($this->getCryosphereWhats()->contains($cryosphereWhat)) {
            $expertCryosphereWhat = new ChildExpertCryosphereWhat();
            $expertCryosphereWhat->setCryosphereWhat($cryosphereWhat);
            if ($cryosphereWhat->isExpertssLoaded()) {
                //remove the back reference if available
                $cryosphereWhat->getExpertss()->removeObject($this);
            }

            $expertCryosphereWhat->setExperts($this);
            $this->removeExpertCryosphereWhat(clone $expertCryosphereWhat);
            $expertCryosphereWhat->clear();

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
     * Clears out the collCryosphereWhatSpecefics collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addCryosphereWhatSpecefics()
     */
    public function clearCryosphereWhatSpecefics()
    {
        $this->collCryosphereWhatSpecefics = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Initializes the collCryosphereWhatSpecefics crossRef collection.
     *
     * By default this just sets the collCryosphereWhatSpecefics collection to an empty collection (like clearCryosphereWhatSpecefics());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @return void
     */
    public function initCryosphereWhatSpecefics()
    {
        $collectionClassName = ExpertCryosphereWhatSpeceficTableMap::getTableMap()->getCollectionClassName();

        $this->collCryosphereWhatSpecefics = new $collectionClassName;
        $this->collCryosphereWhatSpeceficsPartial = true;
        $this->collCryosphereWhatSpecefics->setModel('\CryoConnectDB\CryosphereWhatSpecefic');
    }

    /**
     * Checks if the collCryosphereWhatSpecefics collection is loaded.
     *
     * @return bool
     */
    public function isCryosphereWhatSpeceficsLoaded()
    {
        return null !== $this->collCryosphereWhatSpecefics;
    }

    /**
     * Gets a collection of ChildCryosphereWhatSpecefic objects related by a many-to-many relationship
     * to the current object by way of the expert_cryosphere_what_specefic cross-reference table.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ChildExperts is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria Optional query object to filter the query
     * @param      ConnectionInterface $con Optional connection object
     *
     * @return ObjectCollection|ChildCryosphereWhatSpecefic[] List of ChildCryosphereWhatSpecefic objects
     */
    public function getCryosphereWhatSpecefics(Criteria $criteria = null, ConnectionInterface $con = null)
    {
        $partial = $this->collCryosphereWhatSpeceficsPartial && !$this->isNew();
        if (null === $this->collCryosphereWhatSpecefics || null !== $criteria || $partial) {
            if ($this->isNew()) {
                // return empty collection
                if (null === $this->collCryosphereWhatSpecefics) {
                    $this->initCryosphereWhatSpecefics();
                }
            } else {

                $query = ChildCryosphereWhatSpeceficQuery::create(null, $criteria)
                    ->filterByExperts($this);
                $collCryosphereWhatSpecefics = $query->find($con);
                if (null !== $criteria) {
                    return $collCryosphereWhatSpecefics;
                }

                if ($partial && $this->collCryosphereWhatSpecefics) {
                    //make sure that already added objects gets added to the list of the database.
                    foreach ($this->collCryosphereWhatSpecefics as $obj) {
                        if (!$collCryosphereWhatSpecefics->contains($obj)) {
                            $collCryosphereWhatSpecefics[] = $obj;
                        }
                    }
                }

                $this->collCryosphereWhatSpecefics = $collCryosphereWhatSpecefics;
                $this->collCryosphereWhatSpeceficsPartial = false;
            }
        }

        return $this->collCryosphereWhatSpecefics;
    }

    /**
     * Sets a collection of CryosphereWhatSpecefic objects related by a many-to-many relationship
     * to the current object by way of the expert_cryosphere_what_specefic cross-reference table.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param  Collection $cryosphereWhatSpecefics A Propel collection.
     * @param  ConnectionInterface $con Optional connection object
     * @return $this|ChildExperts The current object (for fluent API support)
     */
    public function setCryosphereWhatSpecefics(Collection $cryosphereWhatSpecefics, ConnectionInterface $con = null)
    {
        $this->clearCryosphereWhatSpecefics();
        $currentCryosphereWhatSpecefics = $this->getCryosphereWhatSpecefics();

        $cryosphereWhatSpeceficsScheduledForDeletion = $currentCryosphereWhatSpecefics->diff($cryosphereWhatSpecefics);

        foreach ($cryosphereWhatSpeceficsScheduledForDeletion as $toDelete) {
            $this->removeCryosphereWhatSpecefic($toDelete);
        }

        foreach ($cryosphereWhatSpecefics as $cryosphereWhatSpecefic) {
            if (!$currentCryosphereWhatSpecefics->contains($cryosphereWhatSpecefic)) {
                $this->doAddCryosphereWhatSpecefic($cryosphereWhatSpecefic);
            }
        }

        $this->collCryosphereWhatSpeceficsPartial = false;
        $this->collCryosphereWhatSpecefics = $cryosphereWhatSpecefics;

        return $this;
    }

    /**
     * Gets the number of CryosphereWhatSpecefic objects related by a many-to-many relationship
     * to the current object by way of the expert_cryosphere_what_specefic cross-reference table.
     *
     * @param      Criteria $criteria Optional query object to filter the query
     * @param      boolean $distinct Set to true to force count distinct
     * @param      ConnectionInterface $con Optional connection object
     *
     * @return int the number of related CryosphereWhatSpecefic objects
     */
    public function countCryosphereWhatSpecefics(Criteria $criteria = null, $distinct = false, ConnectionInterface $con = null)
    {
        $partial = $this->collCryosphereWhatSpeceficsPartial && !$this->isNew();
        if (null === $this->collCryosphereWhatSpecefics || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collCryosphereWhatSpecefics) {
                return 0;
            } else {

                if ($partial && !$criteria) {
                    return count($this->getCryosphereWhatSpecefics());
                }

                $query = ChildCryosphereWhatSpeceficQuery::create(null, $criteria);
                if ($distinct) {
                    $query->distinct();
                }

                return $query
                    ->filterByExperts($this)
                    ->count($con);
            }
        } else {
            return count($this->collCryosphereWhatSpecefics);
        }
    }

    /**
     * Associate a ChildCryosphereWhatSpecefic to this object
     * through the expert_cryosphere_what_specefic cross reference table.
     *
     * @param ChildCryosphereWhatSpecefic $cryosphereWhatSpecefic
     * @return ChildExperts The current object (for fluent API support)
     */
    public function addCryosphereWhatSpecefic(ChildCryosphereWhatSpecefic $cryosphereWhatSpecefic)
    {
        if ($this->collCryosphereWhatSpecefics === null) {
            $this->initCryosphereWhatSpecefics();
        }

        if (!$this->getCryosphereWhatSpecefics()->contains($cryosphereWhatSpecefic)) {
            // only add it if the **same** object is not already associated
            $this->collCryosphereWhatSpecefics->push($cryosphereWhatSpecefic);
            $this->doAddCryosphereWhatSpecefic($cryosphereWhatSpecefic);
        }

        return $this;
    }

    /**
     *
     * @param ChildCryosphereWhatSpecefic $cryosphereWhatSpecefic
     */
    protected function doAddCryosphereWhatSpecefic(ChildCryosphereWhatSpecefic $cryosphereWhatSpecefic)
    {
        $expertCryosphereWhatSpecefic = new ChildExpertCryosphereWhatSpecefic();

        $expertCryosphereWhatSpecefic->setCryosphereWhatSpecefic($cryosphereWhatSpecefic);

        $expertCryosphereWhatSpecefic->setExperts($this);

        $this->addExpertCryosphereWhatSpecefic($expertCryosphereWhatSpecefic);

        // set the back reference to this object directly as using provided method either results
        // in endless loop or in multiple relations
        if (!$cryosphereWhatSpecefic->isExpertssLoaded()) {
            $cryosphereWhatSpecefic->initExpertss();
            $cryosphereWhatSpecefic->getExpertss()->push($this);
        } elseif (!$cryosphereWhatSpecefic->getExpertss()->contains($this)) {
            $cryosphereWhatSpecefic->getExpertss()->push($this);
        }

    }

    /**
     * Remove cryosphereWhatSpecefic of this object
     * through the expert_cryosphere_what_specefic cross reference table.
     *
     * @param ChildCryosphereWhatSpecefic $cryosphereWhatSpecefic
     * @return ChildExperts The current object (for fluent API support)
     */
    public function removeCryosphereWhatSpecefic(ChildCryosphereWhatSpecefic $cryosphereWhatSpecefic)
    {
        if ($this->getCryosphereWhatSpecefics()->contains($cryosphereWhatSpecefic)) {
            $expertCryosphereWhatSpecefic = new ChildExpertCryosphereWhatSpecefic();
            $expertCryosphereWhatSpecefic->setCryosphereWhatSpecefic($cryosphereWhatSpecefic);
            if ($cryosphereWhatSpecefic->isExpertssLoaded()) {
                //remove the back reference if available
                $cryosphereWhatSpecefic->getExpertss()->removeObject($this);
            }

            $expertCryosphereWhatSpecefic->setExperts($this);
            $this->removeExpertCryosphereWhatSpecefic(clone $expertCryosphereWhatSpecefic);
            $expertCryosphereWhatSpecefic->clear();

            $this->collCryosphereWhatSpecefics->remove($this->collCryosphereWhatSpecefics->search($cryosphereWhatSpecefic));

            if (null === $this->cryosphereWhatSpeceficsScheduledForDeletion) {
                $this->cryosphereWhatSpeceficsScheduledForDeletion = clone $this->collCryosphereWhatSpecefics;
                $this->cryosphereWhatSpeceficsScheduledForDeletion->clear();
            }

            $this->cryosphereWhatSpeceficsScheduledForDeletion->push($cryosphereWhatSpecefic);
        }


        return $this;
    }

    /**
     * Clears out the collCryosphereWhens collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addCryosphereWhens()
     */
    public function clearCryosphereWhens()
    {
        $this->collCryosphereWhens = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Initializes the collCryosphereWhens crossRef collection.
     *
     * By default this just sets the collCryosphereWhens collection to an empty collection (like clearCryosphereWhens());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @return void
     */
    public function initCryosphereWhens()
    {
        $collectionClassName = ExpertCryosphereWhenTableMap::getTableMap()->getCollectionClassName();

        $this->collCryosphereWhens = new $collectionClassName;
        $this->collCryosphereWhensPartial = true;
        $this->collCryosphereWhens->setModel('\CryoConnectDB\CryosphereWhen');
    }

    /**
     * Checks if the collCryosphereWhens collection is loaded.
     *
     * @return bool
     */
    public function isCryosphereWhensLoaded()
    {
        return null !== $this->collCryosphereWhens;
    }

    /**
     * Gets a collection of ChildCryosphereWhen objects related by a many-to-many relationship
     * to the current object by way of the expert_cryosphere_when cross-reference table.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ChildExperts is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria Optional query object to filter the query
     * @param      ConnectionInterface $con Optional connection object
     *
     * @return ObjectCollection|ChildCryosphereWhen[] List of ChildCryosphereWhen objects
     */
    public function getCryosphereWhens(Criteria $criteria = null, ConnectionInterface $con = null)
    {
        $partial = $this->collCryosphereWhensPartial && !$this->isNew();
        if (null === $this->collCryosphereWhens || null !== $criteria || $partial) {
            if ($this->isNew()) {
                // return empty collection
                if (null === $this->collCryosphereWhens) {
                    $this->initCryosphereWhens();
                }
            } else {

                $query = ChildCryosphereWhenQuery::create(null, $criteria)
                    ->filterByExperts($this);
                $collCryosphereWhens = $query->find($con);
                if (null !== $criteria) {
                    return $collCryosphereWhens;
                }

                if ($partial && $this->collCryosphereWhens) {
                    //make sure that already added objects gets added to the list of the database.
                    foreach ($this->collCryosphereWhens as $obj) {
                        if (!$collCryosphereWhens->contains($obj)) {
                            $collCryosphereWhens[] = $obj;
                        }
                    }
                }

                $this->collCryosphereWhens = $collCryosphereWhens;
                $this->collCryosphereWhensPartial = false;
            }
        }

        return $this->collCryosphereWhens;
    }

    /**
     * Sets a collection of CryosphereWhen objects related by a many-to-many relationship
     * to the current object by way of the expert_cryosphere_when cross-reference table.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param  Collection $cryosphereWhens A Propel collection.
     * @param  ConnectionInterface $con Optional connection object
     * @return $this|ChildExperts The current object (for fluent API support)
     */
    public function setCryosphereWhens(Collection $cryosphereWhens, ConnectionInterface $con = null)
    {
        $this->clearCryosphereWhens();
        $currentCryosphereWhens = $this->getCryosphereWhens();

        $cryosphereWhensScheduledForDeletion = $currentCryosphereWhens->diff($cryosphereWhens);

        foreach ($cryosphereWhensScheduledForDeletion as $toDelete) {
            $this->removeCryosphereWhen($toDelete);
        }

        foreach ($cryosphereWhens as $cryosphereWhen) {
            if (!$currentCryosphereWhens->contains($cryosphereWhen)) {
                $this->doAddCryosphereWhen($cryosphereWhen);
            }
        }

        $this->collCryosphereWhensPartial = false;
        $this->collCryosphereWhens = $cryosphereWhens;

        return $this;
    }

    /**
     * Gets the number of CryosphereWhen objects related by a many-to-many relationship
     * to the current object by way of the expert_cryosphere_when cross-reference table.
     *
     * @param      Criteria $criteria Optional query object to filter the query
     * @param      boolean $distinct Set to true to force count distinct
     * @param      ConnectionInterface $con Optional connection object
     *
     * @return int the number of related CryosphereWhen objects
     */
    public function countCryosphereWhens(Criteria $criteria = null, $distinct = false, ConnectionInterface $con = null)
    {
        $partial = $this->collCryosphereWhensPartial && !$this->isNew();
        if (null === $this->collCryosphereWhens || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collCryosphereWhens) {
                return 0;
            } else {

                if ($partial && !$criteria) {
                    return count($this->getCryosphereWhens());
                }

                $query = ChildCryosphereWhenQuery::create(null, $criteria);
                if ($distinct) {
                    $query->distinct();
                }

                return $query
                    ->filterByExperts($this)
                    ->count($con);
            }
        } else {
            return count($this->collCryosphereWhens);
        }
    }

    /**
     * Associate a ChildCryosphereWhen to this object
     * through the expert_cryosphere_when cross reference table.
     *
     * @param ChildCryosphereWhen $cryosphereWhen
     * @return ChildExperts The current object (for fluent API support)
     */
    public function addCryosphereWhen(ChildCryosphereWhen $cryosphereWhen)
    {
        if ($this->collCryosphereWhens === null) {
            $this->initCryosphereWhens();
        }

        if (!$this->getCryosphereWhens()->contains($cryosphereWhen)) {
            // only add it if the **same** object is not already associated
            $this->collCryosphereWhens->push($cryosphereWhen);
            $this->doAddCryosphereWhen($cryosphereWhen);
        }

        return $this;
    }

    /**
     *
     * @param ChildCryosphereWhen $cryosphereWhen
     */
    protected function doAddCryosphereWhen(ChildCryosphereWhen $cryosphereWhen)
    {
        $expertCryosphereWhen = new ChildExpertCryosphereWhen();

        $expertCryosphereWhen->setCryosphereWhen($cryosphereWhen);

        $expertCryosphereWhen->setExperts($this);

        $this->addExpertCryosphereWhen($expertCryosphereWhen);

        // set the back reference to this object directly as using provided method either results
        // in endless loop or in multiple relations
        if (!$cryosphereWhen->isExpertssLoaded()) {
            $cryosphereWhen->initExpertss();
            $cryosphereWhen->getExpertss()->push($this);
        } elseif (!$cryosphereWhen->getExpertss()->contains($this)) {
            $cryosphereWhen->getExpertss()->push($this);
        }

    }

    /**
     * Remove cryosphereWhen of this object
     * through the expert_cryosphere_when cross reference table.
     *
     * @param ChildCryosphereWhen $cryosphereWhen
     * @return ChildExperts The current object (for fluent API support)
     */
    public function removeCryosphereWhen(ChildCryosphereWhen $cryosphereWhen)
    {
        if ($this->getCryosphereWhens()->contains($cryosphereWhen)) {
            $expertCryosphereWhen = new ChildExpertCryosphereWhen();
            $expertCryosphereWhen->setCryosphereWhen($cryosphereWhen);
            if ($cryosphereWhen->isExpertssLoaded()) {
                //remove the back reference if available
                $cryosphereWhen->getExpertss()->removeObject($this);
            }

            $expertCryosphereWhen->setExperts($this);
            $this->removeExpertCryosphereWhen(clone $expertCryosphereWhen);
            $expertCryosphereWhen->clear();

            $this->collCryosphereWhens->remove($this->collCryosphereWhens->search($cryosphereWhen));

            if (null === $this->cryosphereWhensScheduledForDeletion) {
                $this->cryosphereWhensScheduledForDeletion = clone $this->collCryosphereWhens;
                $this->cryosphereWhensScheduledForDeletion->clear();
            }

            $this->cryosphereWhensScheduledForDeletion->push($cryosphereWhen);
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
        $collectionClassName = ExpertCryosphereWhereTableMap::getTableMap()->getCollectionClassName();

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
     * to the current object by way of the expert_cryosphere_where cross-reference table.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ChildExperts is new, it will return
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
                    ->filterByExperts($this);
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
     * to the current object by way of the expert_cryosphere_where cross-reference table.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param  Collection $cryosphereWheres A Propel collection.
     * @param  ConnectionInterface $con Optional connection object
     * @return $this|ChildExperts The current object (for fluent API support)
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
     * to the current object by way of the expert_cryosphere_where cross-reference table.
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
                    ->filterByExperts($this)
                    ->count($con);
            }
        } else {
            return count($this->collCryosphereWheres);
        }
    }

    /**
     * Associate a ChildCryosphereWhere to this object
     * through the expert_cryosphere_where cross reference table.
     *
     * @param ChildCryosphereWhere $cryosphereWhere
     * @return ChildExperts The current object (for fluent API support)
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
        $expertCryosphereWhere = new ChildExpertCryosphereWhere();

        $expertCryosphereWhere->setCryosphereWhere($cryosphereWhere);

        $expertCryosphereWhere->setExperts($this);

        $this->addExpertCryosphereWhere($expertCryosphereWhere);

        // set the back reference to this object directly as using provided method either results
        // in endless loop or in multiple relations
        if (!$cryosphereWhere->isExpertssLoaded()) {
            $cryosphereWhere->initExpertss();
            $cryosphereWhere->getExpertss()->push($this);
        } elseif (!$cryosphereWhere->getExpertss()->contains($this)) {
            $cryosphereWhere->getExpertss()->push($this);
        }

    }

    /**
     * Remove cryosphereWhere of this object
     * through the expert_cryosphere_where cross reference table.
     *
     * @param ChildCryosphereWhere $cryosphereWhere
     * @return ChildExperts The current object (for fluent API support)
     */
    public function removeCryosphereWhere(ChildCryosphereWhere $cryosphereWhere)
    {
        if ($this->getCryosphereWheres()->contains($cryosphereWhere)) {
            $expertCryosphereWhere = new ChildExpertCryosphereWhere();
            $expertCryosphereWhere->setCryosphereWhere($cryosphereWhere);
            if ($cryosphereWhere->isExpertssLoaded()) {
                //remove the back reference if available
                $cryosphereWhere->getExpertss()->removeObject($this);
            }

            $expertCryosphereWhere->setExperts($this);
            $this->removeExpertCryosphereWhere(clone $expertCryosphereWhere);
            $expertCryosphereWhere->clear();

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
        $collectionClassName = ExpertLanguagesTableMap::getTableMap()->getCollectionClassName();

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
     * to the current object by way of the expert_languages cross-reference table.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ChildExperts is new, it will return
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
                    ->filterByExperts($this);
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
     * to the current object by way of the expert_languages cross-reference table.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param  Collection $languagess A Propel collection.
     * @param  ConnectionInterface $con Optional connection object
     * @return $this|ChildExperts The current object (for fluent API support)
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
     * to the current object by way of the expert_languages cross-reference table.
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
                    ->filterByExperts($this)
                    ->count($con);
            }
        } else {
            return count($this->collLanguagess);
        }
    }

    /**
     * Associate a ChildLanguages to this object
     * through the expert_languages cross reference table.
     *
     * @param ChildLanguages $languages
     * @return ChildExperts The current object (for fluent API support)
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
        $expertLanguages = new ChildExpertLanguages();

        $expertLanguages->setLanguages($languages);

        $expertLanguages->setExperts($this);

        $this->addExpertLanguages($expertLanguages);

        // set the back reference to this object directly as using provided method either results
        // in endless loop or in multiple relations
        if (!$languages->isExpertssLoaded()) {
            $languages->initExpertss();
            $languages->getExpertss()->push($this);
        } elseif (!$languages->getExpertss()->contains($this)) {
            $languages->getExpertss()->push($this);
        }

    }

    /**
     * Remove languages of this object
     * through the expert_languages cross reference table.
     *
     * @param ChildLanguages $languages
     * @return ChildExperts The current object (for fluent API support)
     */
    public function removeLanguages(ChildLanguages $languages)
    {
        if ($this->getLanguagess()->contains($languages)) {
            $expertLanguages = new ChildExpertLanguages();
            $expertLanguages->setLanguages($languages);
            if ($languages->isExpertssLoaded()) {
                //remove the back reference if available
                $languages->getExpertss()->removeObject($this);
            }

            $expertLanguages->setExperts($this);
            $this->removeExpertLanguages(clone $expertLanguages);
            $expertLanguages->clear();

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
        if (null !== $this->aCountries) {
            $this->aCountries->removeExperts($this);
        }
        $this->id = null;
        $this->first_name = null;
        $this->last_name = null;
        $this->gender = null;
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
            if ($this->collExpertCryosphereMethodss) {
                foreach ($this->collExpertCryosphereMethodss as $o) {
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
            if ($this->collExpertCryosphereWhens) {
                foreach ($this->collExpertCryosphereWhens as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collExpertCryosphereWheres) {
                foreach ($this->collExpertCryosphereWheres as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collExpertLanguagess) {
                foreach ($this->collExpertLanguagess as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->singleExpertPrimaryAffiliation) {
                $this->singleExpertPrimaryAffiliation->clearAllReferences($deep);
            }
            if ($this->collExpertSecondaryAffiliations) {
                foreach ($this->collExpertSecondaryAffiliations as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collCareerStages) {
                foreach ($this->collCareerStages as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collContactTypess) {
                foreach ($this->collContactTypess as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collCryosphereMethodss) {
                foreach ($this->collCryosphereMethodss as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collCryosphereWhats) {
                foreach ($this->collCryosphereWhats as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collCryosphereWhatSpecefics) {
                foreach ($this->collCryosphereWhatSpecefics as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collCryosphereWhens) {
                foreach ($this->collCryosphereWhens as $o) {
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

        $this->collExpertCareerStages = null;
        $this->collExpertContacts = null;
        $this->collExpertCryosphereMethodss = null;
        $this->collExpertCryosphereWhats = null;
        $this->collExpertCryosphereWhatSpecefics = null;
        $this->collExpertCryosphereWhens = null;
        $this->collExpertCryosphereWheres = null;
        $this->collExpertLanguagess = null;
        $this->singleExpertPrimaryAffiliation = null;
        $this->collExpertSecondaryAffiliations = null;
        $this->collCareerStages = null;
        $this->collContactTypess = null;
        $this->collCryosphereMethodss = null;
        $this->collCryosphereWhats = null;
        $this->collCryosphereWhatSpecefics = null;
        $this->collCryosphereWhens = null;
        $this->collCryosphereWheres = null;
        $this->collLanguagess = null;
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
