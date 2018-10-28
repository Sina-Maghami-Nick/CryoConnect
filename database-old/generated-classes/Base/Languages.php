<?php

namespace Base;

use \ExpertLanguages as ChildExpertLanguages;
use \ExpertLanguagesQuery as ChildExpertLanguagesQuery;
use \InformationSeekerConnectRequestLanguages as ChildInformationSeekerConnectRequestLanguages;
use \InformationSeekerConnectRequestLanguagesQuery as ChildInformationSeekerConnectRequestLanguagesQuery;
use \InformationSeekerLanguages as ChildInformationSeekerLanguages;
use \InformationSeekerLanguagesQuery as ChildInformationSeekerLanguagesQuery;
use \Languages as ChildLanguages;
use \LanguagesQuery as ChildLanguagesQuery;
use \Exception;
use \PDO;
use Map\ExpertLanguagesTableMap;
use Map\InformationSeekerConnectRequestLanguagesTableMap;
use Map\InformationSeekerLanguagesTableMap;
use Map\LanguagesTableMap;
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
 * Base class that represents a row from the 'languages' table.
 *
 *
 *
 * @package    propel.generator..Base
 */
abstract class Languages implements ActiveRecordInterface
{
    /**
     * TableMap class name
     */
    const TABLE_MAP = '\\Map\\LanguagesTableMap';


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
     * The value for the language_code field.
     *
     * @var        string
     */
    protected $language_code;

    /**
     * The value for the language field.
     *
     * @var        string
     */
    protected $language;

    /**
     * @var        ObjectCollection|ChildExpertLanguages[] Collection to store aggregation of ChildExpertLanguages objects.
     */
    protected $collExpertLanguagess;
    protected $collExpertLanguagessPartial;

    /**
     * @var        ObjectCollection|ChildInformationSeekerConnectRequestLanguages[] Collection to store aggregation of ChildInformationSeekerConnectRequestLanguages objects.
     */
    protected $collInformationSeekerConnectRequestLanguagess;
    protected $collInformationSeekerConnectRequestLanguagessPartial;

    /**
     * @var        ObjectCollection|ChildInformationSeekerLanguages[] Collection to store aggregation of ChildInformationSeekerLanguages objects.
     */
    protected $collInformationSeekerLanguagess;
    protected $collInformationSeekerLanguagessPartial;

    /**
     * Flag to prevent endless save loop, if this object is referenced
     * by another object which falls in this transaction.
     *
     * @var boolean
     */
    protected $alreadyInSave = false;

    /**
     * An array of objects scheduled for deletion.
     * @var ObjectCollection|ChildExpertLanguages[]
     */
    protected $expertLanguagessScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var ObjectCollection|ChildInformationSeekerConnectRequestLanguages[]
     */
    protected $informationSeekerConnectRequestLanguagessScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var ObjectCollection|ChildInformationSeekerLanguages[]
     */
    protected $informationSeekerLanguagessScheduledForDeletion = null;

    /**
     * Initializes internal state of Base\Languages object.
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
     * Compares this with another <code>Languages</code> instance.  If
     * <code>obj</code> is an instance of <code>Languages</code>, delegates to
     * <code>equals(Languages)</code>.  Otherwise, returns <code>false</code>.
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
     * @return $this|Languages The current object, for fluid interface
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
     * Get the [language_code] column value.
     *
     * @return string
     */
    public function getLanguageCode()
    {
        return $this->language_code;
    }

    /**
     * Get the [language] column value.
     *
     * @return string
     */
    public function getLanguage()
    {
        return $this->language;
    }

    /**
     * Set the value of [language_code] column.
     *
     * @param string $v new value
     * @return $this|\Languages The current object (for fluent API support)
     */
    public function setLanguageCode($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->language_code !== $v) {
            $this->language_code = $v;
            $this->modifiedColumns[LanguagesTableMap::COL_LANGUAGE_CODE] = true;
        }

        return $this;
    } // setLanguageCode()

    /**
     * Set the value of [language] column.
     *
     * @param string $v new value
     * @return $this|\Languages The current object (for fluent API support)
     */
    public function setLanguage($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->language !== $v) {
            $this->language = $v;
            $this->modifiedColumns[LanguagesTableMap::COL_LANGUAGE] = true;
        }

        return $this;
    } // setLanguage()

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

            $col = $row[TableMap::TYPE_NUM == $indexType ? 0 + $startcol : LanguagesTableMap::translateFieldName('LanguageCode', TableMap::TYPE_PHPNAME, $indexType)];
            $this->language_code = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 1 + $startcol : LanguagesTableMap::translateFieldName('Language', TableMap::TYPE_PHPNAME, $indexType)];
            $this->language = (null !== $col) ? (string) $col : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }

            return $startcol + 2; // 2 = LanguagesTableMap::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException(sprintf('Error populating %s object', '\\Languages'), 0, $e);
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
            $con = Propel::getServiceContainer()->getReadConnection(LanguagesTableMap::DATABASE_NAME);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $dataFetcher = ChildLanguagesQuery::create(null, $this->buildPkeyCriteria())->setFormatter(ModelCriteria::FORMAT_STATEMENT)->find($con);
        $row = $dataFetcher->fetch();
        $dataFetcher->close();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true, $dataFetcher->getIndexType()); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->collExpertLanguagess = null;

            $this->collInformationSeekerConnectRequestLanguagess = null;

            $this->collInformationSeekerLanguagess = null;

        } // if (deep)
    }

    /**
     * Removes this object from datastore and sets delete attribute.
     *
     * @param      ConnectionInterface $con
     * @return void
     * @throws PropelException
     * @see Languages::setDeleted()
     * @see Languages::isDeleted()
     */
    public function delete(ConnectionInterface $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("This object has already been deleted.");
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getWriteConnection(LanguagesTableMap::DATABASE_NAME);
        }

        $con->transaction(function () use ($con) {
            $deleteQuery = ChildLanguagesQuery::create()
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
            $con = Propel::getServiceContainer()->getWriteConnection(LanguagesTableMap::DATABASE_NAME);
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
                LanguagesTableMap::addInstanceToPool($this);
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

            if ($this->expertLanguagessScheduledForDeletion !== null) {
                if (!$this->expertLanguagessScheduledForDeletion->isEmpty()) {
                    \ExpertLanguagesQuery::create()
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

            if ($this->informationSeekerConnectRequestLanguagessScheduledForDeletion !== null) {
                if (!$this->informationSeekerConnectRequestLanguagessScheduledForDeletion->isEmpty()) {
                    \InformationSeekerConnectRequestLanguagesQuery::create()
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

            if ($this->informationSeekerLanguagessScheduledForDeletion !== null) {
                if (!$this->informationSeekerLanguagessScheduledForDeletion->isEmpty()) {
                    \InformationSeekerLanguagesQuery::create()
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
        if ($this->isColumnModified(LanguagesTableMap::COL_LANGUAGE_CODE)) {
            $modifiedColumns[':p' . $index++]  = 'language_code';
        }
        if ($this->isColumnModified(LanguagesTableMap::COL_LANGUAGE)) {
            $modifiedColumns[':p' . $index++]  = 'language';
        }

        $sql = sprintf(
            'INSERT INTO languages (%s) VALUES (%s)',
            implode(', ', $modifiedColumns),
            implode(', ', array_keys($modifiedColumns))
        );

        try {
            $stmt = $con->prepare($sql);
            foreach ($modifiedColumns as $identifier => $columnName) {
                switch ($columnName) {
                    case 'language_code':
                        $stmt->bindValue($identifier, $this->language_code, PDO::PARAM_STR);
                        break;
                    case 'language':
                        $stmt->bindValue($identifier, $this->language, PDO::PARAM_STR);
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
        $pos = LanguagesTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);
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
                return $this->getLanguageCode();
                break;
            case 1:
                return $this->getLanguage();
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

        if (isset($alreadyDumpedObjects['Languages'][$this->hashCode()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['Languages'][$this->hashCode()] = true;
        $keys = LanguagesTableMap::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getLanguageCode(),
            $keys[1] => $this->getLanguage(),
        );
        $virtualColumns = $this->virtualColumns;
        foreach ($virtualColumns as $key => $virtualColumn) {
            $result[$key] = $virtualColumn;
        }

        if ($includeForeignObjects) {
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
     * @return $this|\Languages
     */
    public function setByName($name, $value, $type = TableMap::TYPE_PHPNAME)
    {
        $pos = LanguagesTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);

        return $this->setByPosition($pos, $value);
    }

    /**
     * Sets a field from the object by Position as specified in the xml schema.
     * Zero-based.
     *
     * @param  int $pos position in xml schema
     * @param  mixed $value field value
     * @return $this|\Languages
     */
    public function setByPosition($pos, $value)
    {
        switch ($pos) {
            case 0:
                $this->setLanguageCode($value);
                break;
            case 1:
                $this->setLanguage($value);
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
        $keys = LanguagesTableMap::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) {
            $this->setLanguageCode($arr[$keys[0]]);
        }
        if (array_key_exists($keys[1], $arr)) {
            $this->setLanguage($arr[$keys[1]]);
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
     * @return $this|\Languages The current object, for fluid interface
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
        $criteria = new Criteria(LanguagesTableMap::DATABASE_NAME);

        if ($this->isColumnModified(LanguagesTableMap::COL_LANGUAGE_CODE)) {
            $criteria->add(LanguagesTableMap::COL_LANGUAGE_CODE, $this->language_code);
        }
        if ($this->isColumnModified(LanguagesTableMap::COL_LANGUAGE)) {
            $criteria->add(LanguagesTableMap::COL_LANGUAGE, $this->language);
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
        $criteria = ChildLanguagesQuery::create();
        $criteria->add(LanguagesTableMap::COL_LANGUAGE_CODE, $this->language_code);

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
        $validPk = null !== $this->getLanguageCode();

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
        return $this->getLanguageCode();
    }

    /**
     * Generic method to set the primary key (language_code column).
     *
     * @param       string $key Primary key.
     * @return void
     */
    public function setPrimaryKey($key)
    {
        $this->setLanguageCode($key);
    }

    /**
     * Returns true if the primary key for this object is null.
     * @return boolean
     */
    public function isPrimaryKeyNull()
    {
        return null === $this->getLanguageCode();
    }

    /**
     * Sets contents of passed object to values from current object.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param      object $copyObj An object of \Languages (or compatible) type.
     * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param      boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setLanguageCode($this->getLanguageCode());
        $copyObj->setLanguage($this->getLanguage());

        if ($deepCopy) {
            // important: temporarily setNew(false) because this affects the behavior of
            // the getter/setter methods for fkey referrer objects.
            $copyObj->setNew(false);

            foreach ($this->getExpertLanguagess() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addExpertLanguages($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getInformationSeekerConnectRequestLanguagess() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addInformationSeekerConnectRequestLanguages($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getInformationSeekerLanguagess() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addInformationSeekerLanguages($relObj->copy($deepCopy));
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
     * @return \Languages Clone of current object.
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
        if ('ExpertLanguages' == $relationName) {
            $this->initExpertLanguagess();
            return;
        }
        if ('InformationSeekerConnectRequestLanguages' == $relationName) {
            $this->initInformationSeekerConnectRequestLanguagess();
            return;
        }
        if ('InformationSeekerLanguages' == $relationName) {
            $this->initInformationSeekerLanguagess();
            return;
        }
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
        $this->collExpertLanguagess->setModel('\ExpertLanguages');
    }

    /**
     * Gets an array of ChildExpertLanguages objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ChildLanguages is new, it will return
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
                    ->filterByLanguages($this)
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
     * @return $this|ChildLanguages The current object (for fluent API support)
     */
    public function setExpertLanguagess(Collection $expertLanguagess, ConnectionInterface $con = null)
    {
        /** @var ChildExpertLanguages[] $expertLanguagessToDelete */
        $expertLanguagessToDelete = $this->getExpertLanguagess(new Criteria(), $con)->diff($expertLanguagess);


        $this->expertLanguagessScheduledForDeletion = $expertLanguagessToDelete;

        foreach ($expertLanguagessToDelete as $expertLanguagesRemoved) {
            $expertLanguagesRemoved->setLanguages(null);
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
                ->filterByLanguages($this)
                ->count($con);
        }

        return count($this->collExpertLanguagess);
    }

    /**
     * Method called to associate a ChildExpertLanguages object to this object
     * through the ChildExpertLanguages foreign key attribute.
     *
     * @param  ChildExpertLanguages $l ChildExpertLanguages
     * @return $this|\Languages The current object (for fluent API support)
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
        $expertLanguages->setLanguages($this);
    }

    /**
     * @param  ChildExpertLanguages $expertLanguages The ChildExpertLanguages object to remove.
     * @return $this|ChildLanguages The current object (for fluent API support)
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
            $expertLanguages->setLanguages(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Languages is new, it will return
     * an empty collection; or if this Languages has previously
     * been saved, it will retrieve related ExpertLanguagess from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Languages.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildExpertLanguages[] List of ChildExpertLanguages objects
     */
    public function getExpertLanguagessJoinExperts(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildExpertLanguagesQuery::create(null, $criteria);
        $query->joinWith('Experts', $joinBehavior);

        return $this->getExpertLanguagess($query, $con);
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
        $this->collInformationSeekerConnectRequestLanguagess->setModel('\InformationSeekerConnectRequestLanguages');
    }

    /**
     * Gets an array of ChildInformationSeekerConnectRequestLanguages objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ChildLanguages is new, it will return
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
                    ->filterByLanguages($this)
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
     * @return $this|ChildLanguages The current object (for fluent API support)
     */
    public function setInformationSeekerConnectRequestLanguagess(Collection $informationSeekerConnectRequestLanguagess, ConnectionInterface $con = null)
    {
        /** @var ChildInformationSeekerConnectRequestLanguages[] $informationSeekerConnectRequestLanguagessToDelete */
        $informationSeekerConnectRequestLanguagessToDelete = $this->getInformationSeekerConnectRequestLanguagess(new Criteria(), $con)->diff($informationSeekerConnectRequestLanguagess);


        $this->informationSeekerConnectRequestLanguagessScheduledForDeletion = $informationSeekerConnectRequestLanguagessToDelete;

        foreach ($informationSeekerConnectRequestLanguagessToDelete as $informationSeekerConnectRequestLanguagesRemoved) {
            $informationSeekerConnectRequestLanguagesRemoved->setLanguages(null);
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
                ->filterByLanguages($this)
                ->count($con);
        }

        return count($this->collInformationSeekerConnectRequestLanguagess);
    }

    /**
     * Method called to associate a ChildInformationSeekerConnectRequestLanguages object to this object
     * through the ChildInformationSeekerConnectRequestLanguages foreign key attribute.
     *
     * @param  ChildInformationSeekerConnectRequestLanguages $l ChildInformationSeekerConnectRequestLanguages
     * @return $this|\Languages The current object (for fluent API support)
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
        $informationSeekerConnectRequestLanguages->setLanguages($this);
    }

    /**
     * @param  ChildInformationSeekerConnectRequestLanguages $informationSeekerConnectRequestLanguages The ChildInformationSeekerConnectRequestLanguages object to remove.
     * @return $this|ChildLanguages The current object (for fluent API support)
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
            $informationSeekerConnectRequestLanguages->setLanguages(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Languages is new, it will return
     * an empty collection; or if this Languages has previously
     * been saved, it will retrieve related InformationSeekerConnectRequestLanguagess from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Languages.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildInformationSeekerConnectRequestLanguages[] List of ChildInformationSeekerConnectRequestLanguages objects
     */
    public function getInformationSeekerConnectRequestLanguagessJoinInformationSeekerConnectRequest(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildInformationSeekerConnectRequestLanguagesQuery::create(null, $criteria);
        $query->joinWith('InformationSeekerConnectRequest', $joinBehavior);

        return $this->getInformationSeekerConnectRequestLanguagess($query, $con);
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
        $this->collInformationSeekerLanguagess->setModel('\InformationSeekerLanguages');
    }

    /**
     * Gets an array of ChildInformationSeekerLanguages objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ChildLanguages is new, it will return
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
                    ->filterByLanguages($this)
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
     * @return $this|ChildLanguages The current object (for fluent API support)
     */
    public function setInformationSeekerLanguagess(Collection $informationSeekerLanguagess, ConnectionInterface $con = null)
    {
        /** @var ChildInformationSeekerLanguages[] $informationSeekerLanguagessToDelete */
        $informationSeekerLanguagessToDelete = $this->getInformationSeekerLanguagess(new Criteria(), $con)->diff($informationSeekerLanguagess);


        $this->informationSeekerLanguagessScheduledForDeletion = $informationSeekerLanguagessToDelete;

        foreach ($informationSeekerLanguagessToDelete as $informationSeekerLanguagesRemoved) {
            $informationSeekerLanguagesRemoved->setLanguages(null);
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
                ->filterByLanguages($this)
                ->count($con);
        }

        return count($this->collInformationSeekerLanguagess);
    }

    /**
     * Method called to associate a ChildInformationSeekerLanguages object to this object
     * through the ChildInformationSeekerLanguages foreign key attribute.
     *
     * @param  ChildInformationSeekerLanguages $l ChildInformationSeekerLanguages
     * @return $this|\Languages The current object (for fluent API support)
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
        $informationSeekerLanguages->setLanguages($this);
    }

    /**
     * @param  ChildInformationSeekerLanguages $informationSeekerLanguages The ChildInformationSeekerLanguages object to remove.
     * @return $this|ChildLanguages The current object (for fluent API support)
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
            $informationSeekerLanguages->setLanguages(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Languages is new, it will return
     * an empty collection; or if this Languages has previously
     * been saved, it will retrieve related InformationSeekerLanguagess from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Languages.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildInformationSeekerLanguages[] List of ChildInformationSeekerLanguages objects
     */
    public function getInformationSeekerLanguagessJoinInformationSeekers(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildInformationSeekerLanguagesQuery::create(null, $criteria);
        $query->joinWith('InformationSeekers', $joinBehavior);

        return $this->getInformationSeekerLanguagess($query, $con);
    }

    /**
     * Clears the current object, sets all attributes to their default values and removes
     * outgoing references as well as back-references (from other objects to this one. Results probably in a database
     * change of those foreign objects when you call `save` there).
     */
    public function clear()
    {
        $this->language_code = null;
        $this->language = null;
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
            if ($this->collExpertLanguagess) {
                foreach ($this->collExpertLanguagess as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collInformationSeekerConnectRequestLanguagess) {
                foreach ($this->collInformationSeekerConnectRequestLanguagess as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collInformationSeekerLanguagess) {
                foreach ($this->collInformationSeekerLanguagess as $o) {
                    $o->clearAllReferences($deep);
                }
            }
        } // if ($deep)

        $this->collExpertLanguagess = null;
        $this->collInformationSeekerConnectRequestLanguagess = null;
        $this->collInformationSeekerLanguagess = null;
    }

    /**
     * Return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(LanguagesTableMap::DEFAULT_STRING_FORMAT);
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
