<?php

namespace Base;

use \Countries as ChildCountries;
use \CountriesQuery as ChildCountriesQuery;
use \Experts as ChildExperts;
use \ExpertsQuery as ChildExpertsQuery;
use \InformationSeekers as ChildInformationSeekers;
use \InformationSeekersQuery as ChildInformationSeekersQuery;
use \Exception;
use \PDO;
use Map\CountriesTableMap;
use Map\ExpertsTableMap;
use Map\InformationSeekersTableMap;
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

/**
 * Base class that represents a row from the 'countries' table.
 *
 *
 *
 * @package    propel.generator..Base
 */
abstract class Countries implements ActiveRecordInterface
{
    /**
     * TableMap class name
     */
    const TABLE_MAP = '\\Map\\CountriesTableMap';


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
     * The value for the country_code field.
     *
     * @var        string
     */
    protected $country_code;

    /**
     * The value for the country_name field.
     *
     * @var        string
     */
    protected $country_name;

    /**
     * @var        ObjectCollection|ChildExperts[] Collection to store aggregation of ChildExperts objects.
     */
    protected $collExpertss;
    protected $collExpertssPartial;

    /**
     * @var        ObjectCollection|ChildInformationSeekers[] Collection to store aggregation of ChildInformationSeekers objects.
     */
    protected $collInformationSeekerss;
    protected $collInformationSeekerssPartial;

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
     * @var ObjectCollection|ChildInformationSeekers[]
     */
    protected $informationSeekerssScheduledForDeletion = null;

    /**
     * Initializes internal state of Base\Countries object.
     */
    public function __construct()
    {
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
     * Compares this with another <code>Countries</code> instance.  If
     * <code>obj</code> is an instance of <code>Countries</code>, delegates to
     * <code>equals(Countries)</code>.  Otherwise, returns <code>false</code>.
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
     * @return $this|Countries The current object, for fluid interface
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
     * Get the [country_code] column value.
     *
     * @return string
     */
    public function getCountryCode()
    {
        return $this->country_code;
    }

    /**
     * Get the [country_name] column value.
     *
     * @return string
     */
    public function getCountryName()
    {
        return $this->country_name;
    }

    /**
     * Set the value of [country_code] column.
     *
     * @param string $v new value
     * @return $this|\Countries The current object (for fluent API support)
     */
    public function setCountryCode($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->country_code !== $v) {
            $this->country_code = $v;
            $this->modifiedColumns[CountriesTableMap::COL_COUNTRY_CODE] = true;
        }

        return $this;
    } // setCountryCode()

    /**
     * Set the value of [country_name] column.
     *
     * @param string $v new value
     * @return $this|\Countries The current object (for fluent API support)
     */
    public function setCountryName($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->country_name !== $v) {
            $this->country_name = $v;
            $this->modifiedColumns[CountriesTableMap::COL_COUNTRY_NAME] = true;
        }

        return $this;
    } // setCountryName()

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

            $col = $row[TableMap::TYPE_NUM == $indexType ? 0 + $startcol : CountriesTableMap::translateFieldName('CountryCode', TableMap::TYPE_PHPNAME, $indexType)];
            $this->country_code = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 1 + $startcol : CountriesTableMap::translateFieldName('CountryName', TableMap::TYPE_PHPNAME, $indexType)];
            $this->country_name = (null !== $col) ? (string) $col : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }

            return $startcol + 2; // 2 = CountriesTableMap::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException(sprintf('Error populating %s object', '\\Countries'), 0, $e);
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
            $con = Propel::getServiceContainer()->getReadConnection(CountriesTableMap::DATABASE_NAME);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $dataFetcher = ChildCountriesQuery::create(null, $this->buildPkeyCriteria())->setFormatter(ModelCriteria::FORMAT_STATEMENT)->find($con);
        $row = $dataFetcher->fetch();
        $dataFetcher->close();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true, $dataFetcher->getIndexType()); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->collExpertss = null;

            $this->collInformationSeekerss = null;

        } // if (deep)
    }

    /**
     * Removes this object from datastore and sets delete attribute.
     *
     * @param      ConnectionInterface $con
     * @return void
     * @throws PropelException
     * @see Countries::setDeleted()
     * @see Countries::isDeleted()
     */
    public function delete(ConnectionInterface $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("This object has already been deleted.");
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getWriteConnection(CountriesTableMap::DATABASE_NAME);
        }

        $con->transaction(function () use ($con) {
            $deleteQuery = ChildCountriesQuery::create()
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
            $con = Propel::getServiceContainer()->getWriteConnection(CountriesTableMap::DATABASE_NAME);
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
                CountriesTableMap::addInstanceToPool($this);
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
                    \ExpertsQuery::create()
                        ->filterByPrimaryKeys($this->expertssScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->expertssScheduledForDeletion = null;
                }
            }

            if ($this->collExpertss !== null) {
                foreach ($this->collExpertss as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->informationSeekerssScheduledForDeletion !== null) {
                if (!$this->informationSeekerssScheduledForDeletion->isEmpty()) {
                    \InformationSeekersQuery::create()
                        ->filterByPrimaryKeys($this->informationSeekerssScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->informationSeekerssScheduledForDeletion = null;
                }
            }

            if ($this->collInformationSeekerss !== null) {
                foreach ($this->collInformationSeekerss as $referrerFK) {
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


         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(CountriesTableMap::COL_COUNTRY_CODE)) {
            $modifiedColumns[':p' . $index++]  = 'country_code';
        }
        if ($this->isColumnModified(CountriesTableMap::COL_COUNTRY_NAME)) {
            $modifiedColumns[':p' . $index++]  = 'country_name';
        }

        $sql = sprintf(
            'INSERT INTO countries (%s) VALUES (%s)',
            implode(', ', $modifiedColumns),
            implode(', ', array_keys($modifiedColumns))
        );

        try {
            $stmt = $con->prepare($sql);
            foreach ($modifiedColumns as $identifier => $columnName) {
                switch ($columnName) {
                    case 'country_code':
                        $stmt->bindValue($identifier, $this->country_code, PDO::PARAM_STR);
                        break;
                    case 'country_name':
                        $stmt->bindValue($identifier, $this->country_name, PDO::PARAM_STR);
                        break;
                }
            }
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute INSERT statement [%s]', $sql), 0, $e);
        }

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
        $pos = CountriesTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);
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
                return $this->getCountryCode();
                break;
            case 1:
                return $this->getCountryName();
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

        if (isset($alreadyDumpedObjects['Countries'][$this->hashCode()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['Countries'][$this->hashCode()] = true;
        $keys = CountriesTableMap::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getCountryCode(),
            $keys[1] => $this->getCountryName(),
        );
        $virtualColumns = $this->virtualColumns;
        foreach ($virtualColumns as $key => $virtualColumn) {
            $result[$key] = $virtualColumn;
        }

        if ($includeForeignObjects) {
            if (null !== $this->collExpertss) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'expertss';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'expertss';
                        break;
                    default:
                        $key = 'Expertss';
                }

                $result[$key] = $this->collExpertss->toArray(null, false, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collInformationSeekerss) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'informationSeekerss';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'information_seekerss';
                        break;
                    default:
                        $key = 'InformationSeekerss';
                }

                $result[$key] = $this->collInformationSeekerss->toArray(null, false, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
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
     * @return $this|\Countries
     */
    public function setByName($name, $value, $type = TableMap::TYPE_PHPNAME)
    {
        $pos = CountriesTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);

        return $this->setByPosition($pos, $value);
    }

    /**
     * Sets a field from the object by Position as specified in the xml schema.
     * Zero-based.
     *
     * @param  int $pos position in xml schema
     * @param  mixed $value field value
     * @return $this|\Countries
     */
    public function setByPosition($pos, $value)
    {
        switch ($pos) {
            case 0:
                $this->setCountryCode($value);
                break;
            case 1:
                $this->setCountryName($value);
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
        $keys = CountriesTableMap::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) {
            $this->setCountryCode($arr[$keys[0]]);
        }
        if (array_key_exists($keys[1], $arr)) {
            $this->setCountryName($arr[$keys[1]]);
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
     * @return $this|\Countries The current object, for fluid interface
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
        $criteria = new Criteria(CountriesTableMap::DATABASE_NAME);

        if ($this->isColumnModified(CountriesTableMap::COL_COUNTRY_CODE)) {
            $criteria->add(CountriesTableMap::COL_COUNTRY_CODE, $this->country_code);
        }
        if ($this->isColumnModified(CountriesTableMap::COL_COUNTRY_NAME)) {
            $criteria->add(CountriesTableMap::COL_COUNTRY_NAME, $this->country_name);
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
        $criteria = ChildCountriesQuery::create();
        $criteria->add(CountriesTableMap::COL_COUNTRY_CODE, $this->country_code);

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
        $validPk = null !== $this->getCountryCode();

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
     * @return string
     */
    public function getPrimaryKey()
    {
        return $this->getCountryCode();
    }

    /**
     * Generic method to set the primary key (country_code column).
     *
     * @param       string $key Primary key.
     * @return void
     */
    public function setPrimaryKey($key)
    {
        $this->setCountryCode($key);
    }

    /**
     * Returns true if the primary key for this object is null.
     * @return boolean
     */
    public function isPrimaryKeyNull()
    {
        return null === $this->getCountryCode();
    }

    /**
     * Sets contents of passed object to values from current object.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param      object $copyObj An object of \Countries (or compatible) type.
     * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param      boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setCountryCode($this->getCountryCode());
        $copyObj->setCountryName($this->getCountryName());

        if ($deepCopy) {
            // important: temporarily setNew(false) because this affects the behavior of
            // the getter/setter methods for fkey referrer objects.
            $copyObj->setNew(false);

            foreach ($this->getExpertss() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addExperts($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getInformationSeekerss() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addInformationSeekers($relObj->copy($deepCopy));
                }
            }

        } // if ($deepCopy)

        if ($makeNew) {
            $copyObj->setNew(true);
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
     * @return \Countries Clone of current object.
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
        if ('Experts' == $relationName) {
            $this->initExpertss();
            return;
        }
        if ('InformationSeekers' == $relationName) {
            $this->initInformationSeekerss();
            return;
        }
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
     * Reset is the collExpertss collection loaded partially.
     */
    public function resetPartialExpertss($v = true)
    {
        $this->collExpertssPartial = $v;
    }

    /**
     * Initializes the collExpertss collection.
     *
     * By default this just sets the collExpertss collection to an empty array (like clearcollExpertss());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param      boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initExpertss($overrideExisting = true)
    {
        if (null !== $this->collExpertss && !$overrideExisting) {
            return;
        }

        $collectionClassName = ExpertsTableMap::getTableMap()->getCollectionClassName();

        $this->collExpertss = new $collectionClassName;
        $this->collExpertss->setModel('\Experts');
    }

    /**
     * Gets an array of ChildExperts objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ChildCountries is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @return ObjectCollection|ChildExperts[] List of ChildExperts objects
     * @throws PropelException
     */
    public function getExpertss(Criteria $criteria = null, ConnectionInterface $con = null)
    {
        $partial = $this->collExpertssPartial && !$this->isNew();
        if (null === $this->collExpertss || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collExpertss) {
                // return empty collection
                $this->initExpertss();
            } else {
                $collExpertss = ChildExpertsQuery::create(null, $criteria)
                    ->filterByCountries($this)
                    ->find($con);

                if (null !== $criteria) {
                    if (false !== $this->collExpertssPartial && count($collExpertss)) {
                        $this->initExpertss(false);

                        foreach ($collExpertss as $obj) {
                            if (false == $this->collExpertss->contains($obj)) {
                                $this->collExpertss->append($obj);
                            }
                        }

                        $this->collExpertssPartial = true;
                    }

                    return $collExpertss;
                }

                if ($partial && $this->collExpertss) {
                    foreach ($this->collExpertss as $obj) {
                        if ($obj->isNew()) {
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
     * Sets a collection of ChildExperts objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      Collection $expertss A Propel collection.
     * @param      ConnectionInterface $con Optional connection object
     * @return $this|ChildCountries The current object (for fluent API support)
     */
    public function setExpertss(Collection $expertss, ConnectionInterface $con = null)
    {
        /** @var ChildExperts[] $expertssToDelete */
        $expertssToDelete = $this->getExpertss(new Criteria(), $con)->diff($expertss);


        $this->expertssScheduledForDeletion = $expertssToDelete;

        foreach ($expertssToDelete as $expertsRemoved) {
            $expertsRemoved->setCountries(null);
        }

        $this->collExpertss = null;
        foreach ($expertss as $experts) {
            $this->addExperts($experts);
        }

        $this->collExpertss = $expertss;
        $this->collExpertssPartial = false;

        return $this;
    }

    /**
     * Returns the number of related Experts objects.
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct
     * @param      ConnectionInterface $con
     * @return int             Count of related Experts objects.
     * @throws PropelException
     */
    public function countExpertss(Criteria $criteria = null, $distinct = false, ConnectionInterface $con = null)
    {
        $partial = $this->collExpertssPartial && !$this->isNew();
        if (null === $this->collExpertss || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collExpertss) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getExpertss());
            }

            $query = ChildExpertsQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByCountries($this)
                ->count($con);
        }

        return count($this->collExpertss);
    }

    /**
     * Method called to associate a ChildExperts object to this object
     * through the ChildExperts foreign key attribute.
     *
     * @param  ChildExperts $l ChildExperts
     * @return $this|\Countries The current object (for fluent API support)
     */
    public function addExperts(ChildExperts $l)
    {
        if ($this->collExpertss === null) {
            $this->initExpertss();
            $this->collExpertssPartial = true;
        }

        if (!$this->collExpertss->contains($l)) {
            $this->doAddExperts($l);

            if ($this->expertssScheduledForDeletion and $this->expertssScheduledForDeletion->contains($l)) {
                $this->expertssScheduledForDeletion->remove($this->expertssScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param ChildExperts $experts The ChildExperts object to add.
     */
    protected function doAddExperts(ChildExperts $experts)
    {
        $this->collExpertss[]= $experts;
        $experts->setCountries($this);
    }

    /**
     * @param  ChildExperts $experts The ChildExperts object to remove.
     * @return $this|ChildCountries The current object (for fluent API support)
     */
    public function removeExperts(ChildExperts $experts)
    {
        if ($this->getExpertss()->contains($experts)) {
            $pos = $this->collExpertss->search($experts);
            $this->collExpertss->remove($pos);
            if (null === $this->expertssScheduledForDeletion) {
                $this->expertssScheduledForDeletion = clone $this->collExpertss;
                $this->expertssScheduledForDeletion->clear();
            }
            $this->expertssScheduledForDeletion[]= clone $experts;
            $experts->setCountries(null);
        }

        return $this;
    }

    /**
     * Clears out the collInformationSeekerss collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addInformationSeekerss()
     */
    public function clearInformationSeekerss()
    {
        $this->collInformationSeekerss = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Reset is the collInformationSeekerss collection loaded partially.
     */
    public function resetPartialInformationSeekerss($v = true)
    {
        $this->collInformationSeekerssPartial = $v;
    }

    /**
     * Initializes the collInformationSeekerss collection.
     *
     * By default this just sets the collInformationSeekerss collection to an empty array (like clearcollInformationSeekerss());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param      boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initInformationSeekerss($overrideExisting = true)
    {
        if (null !== $this->collInformationSeekerss && !$overrideExisting) {
            return;
        }

        $collectionClassName = InformationSeekersTableMap::getTableMap()->getCollectionClassName();

        $this->collInformationSeekerss = new $collectionClassName;
        $this->collInformationSeekerss->setModel('\InformationSeekers');
    }

    /**
     * Gets an array of ChildInformationSeekers objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ChildCountries is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @return ObjectCollection|ChildInformationSeekers[] List of ChildInformationSeekers objects
     * @throws PropelException
     */
    public function getInformationSeekerss(Criteria $criteria = null, ConnectionInterface $con = null)
    {
        $partial = $this->collInformationSeekerssPartial && !$this->isNew();
        if (null === $this->collInformationSeekerss || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collInformationSeekerss) {
                // return empty collection
                $this->initInformationSeekerss();
            } else {
                $collInformationSeekerss = ChildInformationSeekersQuery::create(null, $criteria)
                    ->filterByCountries($this)
                    ->find($con);

                if (null !== $criteria) {
                    if (false !== $this->collInformationSeekerssPartial && count($collInformationSeekerss)) {
                        $this->initInformationSeekerss(false);

                        foreach ($collInformationSeekerss as $obj) {
                            if (false == $this->collInformationSeekerss->contains($obj)) {
                                $this->collInformationSeekerss->append($obj);
                            }
                        }

                        $this->collInformationSeekerssPartial = true;
                    }

                    return $collInformationSeekerss;
                }

                if ($partial && $this->collInformationSeekerss) {
                    foreach ($this->collInformationSeekerss as $obj) {
                        if ($obj->isNew()) {
                            $collInformationSeekerss[] = $obj;
                        }
                    }
                }

                $this->collInformationSeekerss = $collInformationSeekerss;
                $this->collInformationSeekerssPartial = false;
            }
        }

        return $this->collInformationSeekerss;
    }

    /**
     * Sets a collection of ChildInformationSeekers objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      Collection $informationSeekerss A Propel collection.
     * @param      ConnectionInterface $con Optional connection object
     * @return $this|ChildCountries The current object (for fluent API support)
     */
    public function setInformationSeekerss(Collection $informationSeekerss, ConnectionInterface $con = null)
    {
        /** @var ChildInformationSeekers[] $informationSeekerssToDelete */
        $informationSeekerssToDelete = $this->getInformationSeekerss(new Criteria(), $con)->diff($informationSeekerss);


        $this->informationSeekerssScheduledForDeletion = $informationSeekerssToDelete;

        foreach ($informationSeekerssToDelete as $informationSeekersRemoved) {
            $informationSeekersRemoved->setCountries(null);
        }

        $this->collInformationSeekerss = null;
        foreach ($informationSeekerss as $informationSeekers) {
            $this->addInformationSeekers($informationSeekers);
        }

        $this->collInformationSeekerss = $informationSeekerss;
        $this->collInformationSeekerssPartial = false;

        return $this;
    }

    /**
     * Returns the number of related InformationSeekers objects.
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct
     * @param      ConnectionInterface $con
     * @return int             Count of related InformationSeekers objects.
     * @throws PropelException
     */
    public function countInformationSeekerss(Criteria $criteria = null, $distinct = false, ConnectionInterface $con = null)
    {
        $partial = $this->collInformationSeekerssPartial && !$this->isNew();
        if (null === $this->collInformationSeekerss || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collInformationSeekerss) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getInformationSeekerss());
            }

            $query = ChildInformationSeekersQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByCountries($this)
                ->count($con);
        }

        return count($this->collInformationSeekerss);
    }

    /**
     * Method called to associate a ChildInformationSeekers object to this object
     * through the ChildInformationSeekers foreign key attribute.
     *
     * @param  ChildInformationSeekers $l ChildInformationSeekers
     * @return $this|\Countries The current object (for fluent API support)
     */
    public function addInformationSeekers(ChildInformationSeekers $l)
    {
        if ($this->collInformationSeekerss === null) {
            $this->initInformationSeekerss();
            $this->collInformationSeekerssPartial = true;
        }

        if (!$this->collInformationSeekerss->contains($l)) {
            $this->doAddInformationSeekers($l);

            if ($this->informationSeekerssScheduledForDeletion and $this->informationSeekerssScheduledForDeletion->contains($l)) {
                $this->informationSeekerssScheduledForDeletion->remove($this->informationSeekerssScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param ChildInformationSeekers $informationSeekers The ChildInformationSeekers object to add.
     */
    protected function doAddInformationSeekers(ChildInformationSeekers $informationSeekers)
    {
        $this->collInformationSeekerss[]= $informationSeekers;
        $informationSeekers->setCountries($this);
    }

    /**
     * @param  ChildInformationSeekers $informationSeekers The ChildInformationSeekers object to remove.
     * @return $this|ChildCountries The current object (for fluent API support)
     */
    public function removeInformationSeekers(ChildInformationSeekers $informationSeekers)
    {
        if ($this->getInformationSeekerss()->contains($informationSeekers)) {
            $pos = $this->collInformationSeekerss->search($informationSeekers);
            $this->collInformationSeekerss->remove($pos);
            if (null === $this->informationSeekerssScheduledForDeletion) {
                $this->informationSeekerssScheduledForDeletion = clone $this->collInformationSeekerss;
                $this->informationSeekerssScheduledForDeletion->clear();
            }
            $this->informationSeekerssScheduledForDeletion[]= clone $informationSeekers;
            $informationSeekers->setCountries(null);
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
        $this->country_code = null;
        $this->country_name = null;
        $this->alreadyInSave = false;
        $this->clearAllReferences();
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
            if ($this->collExpertss) {
                foreach ($this->collExpertss as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collInformationSeekerss) {
                foreach ($this->collInformationSeekerss as $o) {
                    $o->clearAllReferences($deep);
                }
            }
        } // if ($deep)

        $this->collExpertss = null;
        $this->collInformationSeekerss = null;
    }

    /**
     * Return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(CountriesTableMap::DEFAULT_STRING_FORMAT);
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
