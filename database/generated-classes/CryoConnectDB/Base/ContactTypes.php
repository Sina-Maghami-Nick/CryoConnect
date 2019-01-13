<?php

namespace CryoConnectDB\Base;

use \Exception;
use \PDO;
use CryoConnectDB\ContactTypes as ChildContactTypes;
use CryoConnectDB\ContactTypesQuery as ChildContactTypesQuery;
use CryoConnectDB\ExpertContact as ChildExpertContact;
use CryoConnectDB\ExpertContactQuery as ChildExpertContactQuery;
use CryoConnectDB\Experts as ChildExperts;
use CryoConnectDB\ExpertsQuery as ChildExpertsQuery;
use CryoConnectDB\InformationSeekerContact as ChildInformationSeekerContact;
use CryoConnectDB\InformationSeekerContactQuery as ChildInformationSeekerContactQuery;
use CryoConnectDB\InformationSeekers as ChildInformationSeekers;
use CryoConnectDB\InformationSeekersQuery as ChildInformationSeekersQuery;
use CryoConnectDB\Map\ContactTypesTableMap;
use CryoConnectDB\Map\ExpertContactTableMap;
use CryoConnectDB\Map\InformationSeekerContactTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveRecord\ActiveRecordInterface;
use Propel\Runtime\Collection\Collection;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Collection\ObjectCombinationCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\BadMethodCallException;
use Propel\Runtime\Exception\LogicException;
use Propel\Runtime\Exception\PropelException;
use Propel\Runtime\Map\TableMap;
use Propel\Runtime\Parser\AbstractParser;

/**
 * Base class that represents a row from the 'contact_types' table.
 *
 *
 *
 * @package    propel.generator.CryoConnectDB.Base
 */
abstract class ContactTypes implements ActiveRecordInterface
{
    /**
     * TableMap class name
     */
    const TABLE_MAP = '\\CryoConnectDB\\Map\\ContactTypesTableMap';


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
     * The value for the contact_type field.
     *
     * @var        string
     */
    protected $contact_type;

    /**
     * @var        ObjectCollection|ChildExpertContact[] Collection to store aggregation of ChildExpertContact objects.
     */
    protected $collExpertContacts;
    protected $collExpertContactsPartial;

    /**
     * @var        ObjectCollection|ChildInformationSeekerContact[] Collection to store aggregation of ChildInformationSeekerContact objects.
     */
    protected $collInformationSeekerContacts;
    protected $collInformationSeekerContactsPartial;

    /**
     * @var        ObjectCollection|ChildExperts[] Cross Collection to store aggregation of ChildExperts objects.
     */
    protected $collExpertss;

    /**
     * @var bool
     */
    protected $collExpertssPartial;

    /**
     * @var ObjectCombinationCollection Cross CombinationCollection to store aggregation of ChildInformationSeekers combinations.
     */
    protected $combinationCollInformationSeekersIds;

    /**
     * @var bool
     */
    protected $combinationCollInformationSeekersIdsPartial;

    /**
     * @var        ObjectCollection|ChildInformationSeekers[] Cross Collection to store aggregation of ChildInformationSeekers objects.
     */
    protected $collInformationSeekerss;

    /**
     * @var bool
     */
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
     * @var ObjectCombinationCollection Cross CombinationCollection to store aggregation of ChildInformationSeekers combinations.
     */
    protected $combinationCollInformationSeekersIdsScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var ObjectCollection|ChildExpertContact[]
     */
    protected $expertContactsScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var ObjectCollection|ChildInformationSeekerContact[]
     */
    protected $informationSeekerContactsScheduledForDeletion = null;

    /**
     * Initializes internal state of CryoConnectDB\Base\ContactTypes object.
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
     * Compares this with another <code>ContactTypes</code> instance.  If
     * <code>obj</code> is an instance of <code>ContactTypes</code>, delegates to
     * <code>equals(ContactTypes)</code>.  Otherwise, returns <code>false</code>.
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
     * @return $this|ContactTypes The current object, for fluid interface
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
     * Get the [contact_type] column value.
     *
     * @return string
     */
    public function getContactType()
    {
        return $this->contact_type;
    }

    /**
     * Set the value of [id] column.
     *
     * @param int $v new value
     * @return $this|\CryoConnectDB\ContactTypes The current object (for fluent API support)
     */
    public function setId($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->id !== $v) {
            $this->id = $v;
            $this->modifiedColumns[ContactTypesTableMap::COL_ID] = true;
        }

        return $this;
    } // setId()

    /**
     * Set the value of [contact_type] column.
     *
     * @param string $v new value
     * @return $this|\CryoConnectDB\ContactTypes The current object (for fluent API support)
     */
    public function setContactType($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->contact_type !== $v) {
            $this->contact_type = $v;
            $this->modifiedColumns[ContactTypesTableMap::COL_CONTACT_TYPE] = true;
        }

        return $this;
    } // setContactType()

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

            $col = $row[TableMap::TYPE_NUM == $indexType ? 0 + $startcol : ContactTypesTableMap::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)];
            $this->id = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 1 + $startcol : ContactTypesTableMap::translateFieldName('ContactType', TableMap::TYPE_PHPNAME, $indexType)];
            $this->contact_type = (null !== $col) ? (string) $col : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }

            return $startcol + 2; // 2 = ContactTypesTableMap::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException(sprintf('Error populating %s object', '\\CryoConnectDB\\ContactTypes'), 0, $e);
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
            $con = Propel::getServiceContainer()->getReadConnection(ContactTypesTableMap::DATABASE_NAME);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $dataFetcher = ChildContactTypesQuery::create(null, $this->buildPkeyCriteria())->setFormatter(ModelCriteria::FORMAT_STATEMENT)->find($con);
        $row = $dataFetcher->fetch();
        $dataFetcher->close();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true, $dataFetcher->getIndexType()); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->collExpertContacts = null;

            $this->collInformationSeekerContacts = null;

            $this->collExpertss = null;
            $this->collInformationSeekersIds = null;
        } // if (deep)
    }

    /**
     * Removes this object from datastore and sets delete attribute.
     *
     * @param      ConnectionInterface $con
     * @return void
     * @throws PropelException
     * @see ContactTypes::setDeleted()
     * @see ContactTypes::isDeleted()
     */
    public function delete(ConnectionInterface $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("This object has already been deleted.");
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getWriteConnection(ContactTypesTableMap::DATABASE_NAME);
        }

        $con->transaction(function () use ($con) {
            $deleteQuery = ChildContactTypesQuery::create()
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
            $con = Propel::getServiceContainer()->getWriteConnection(ContactTypesTableMap::DATABASE_NAME);
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
                ContactTypesTableMap::addInstanceToPool($this);
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

                    \CryoConnectDB\ExpertContactQuery::create()
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


            if ($this->combinationCollInformationSeekersIdsScheduledForDeletion !== null) {
                if (!$this->combinationCollInformationSeekersIdsScheduledForDeletion->isEmpty()) {
                    $pks = array();
                    foreach ($this->combinationCollInformationSeekersIdsScheduledForDeletion as $combination) {
                        $entryPk = [];

                        $entryPk[2] = $this->getId();
                        $entryPk[1] = $combination[0]->getId();
                        //$combination[1] = Id;
                        $entryPk[0] = $combination[1];

                        $pks[] = $entryPk;
                    }

                    \CryoConnectDB\InformationSeekerContactQuery::create()
                        ->filterByPrimaryKeys($pks)
                        ->delete($con);

                    $this->combinationCollInformationSeekersIdsScheduledForDeletion = null;
                }

            }

            if (null !== $this->combinationCollInformationSeekersIds) {
                foreach ($this->combinationCollInformationSeekersIds as $combination) {

                    //$combination[0] = InformationSeekers (information_seeker_contact_fk_77d198)
                    if (!$combination[0]->isDeleted() && ($combination[0]->isNew() || $combination[0]->isModified())) {
                        $combination[0]->save($con);
                    }

                    //$combination[1] = Id; Nothing to save.
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

        $this->modifiedColumns[ContactTypesTableMap::COL_ID] = true;
        if (null !== $this->id) {
            throw new PropelException('Cannot insert a value for auto-increment primary key (' . ContactTypesTableMap::COL_ID . ')');
        }

         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(ContactTypesTableMap::COL_ID)) {
            $modifiedColumns[':p' . $index++]  = 'id';
        }
        if ($this->isColumnModified(ContactTypesTableMap::COL_CONTACT_TYPE)) {
            $modifiedColumns[':p' . $index++]  = 'contact_type';
        }

        $sql = sprintf(
            'INSERT INTO contact_types (%s) VALUES (%s)',
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
                    case 'contact_type':
                        $stmt->bindValue($identifier, $this->contact_type, PDO::PARAM_STR);
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
        $pos = ContactTypesTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);
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
                return $this->getContactType();
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

        if (isset($alreadyDumpedObjects['ContactTypes'][$this->hashCode()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['ContactTypes'][$this->hashCode()] = true;
        $keys = ContactTypesTableMap::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getId(),
            $keys[1] => $this->getContactType(),
        );
        $virtualColumns = $this->virtualColumns;
        foreach ($virtualColumns as $key => $virtualColumn) {
            $result[$key] = $virtualColumn;
        }

        if ($includeForeignObjects) {
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
     * @return $this|\CryoConnectDB\ContactTypes
     */
    public function setByName($name, $value, $type = TableMap::TYPE_PHPNAME)
    {
        $pos = ContactTypesTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);

        return $this->setByPosition($pos, $value);
    }

    /**
     * Sets a field from the object by Position as specified in the xml schema.
     * Zero-based.
     *
     * @param  int $pos position in xml schema
     * @param  mixed $value field value
     * @return $this|\CryoConnectDB\ContactTypes
     */
    public function setByPosition($pos, $value)
    {
        switch ($pos) {
            case 0:
                $this->setId($value);
                break;
            case 1:
                $this->setContactType($value);
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
        $keys = ContactTypesTableMap::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) {
            $this->setId($arr[$keys[0]]);
        }
        if (array_key_exists($keys[1], $arr)) {
            $this->setContactType($arr[$keys[1]]);
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
     * @return $this|\CryoConnectDB\ContactTypes The current object, for fluid interface
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
        $criteria = new Criteria(ContactTypesTableMap::DATABASE_NAME);

        if ($this->isColumnModified(ContactTypesTableMap::COL_ID)) {
            $criteria->add(ContactTypesTableMap::COL_ID, $this->id);
        }
        if ($this->isColumnModified(ContactTypesTableMap::COL_CONTACT_TYPE)) {
            $criteria->add(ContactTypesTableMap::COL_CONTACT_TYPE, $this->contact_type);
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
        $criteria = ChildContactTypesQuery::create();
        $criteria->add(ContactTypesTableMap::COL_ID, $this->id);

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
     * @param      object $copyObj An object of \CryoConnectDB\ContactTypes (or compatible) type.
     * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param      boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setContactType($this->getContactType());

        if ($deepCopy) {
            // important: temporarily setNew(false) because this affects the behavior of
            // the getter/setter methods for fkey referrer objects.
            $copyObj->setNew(false);

            foreach ($this->getExpertContacts() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addExpertContact($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getInformationSeekerContacts() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addInformationSeekerContact($relObj->copy($deepCopy));
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
     * @return \CryoConnectDB\ContactTypes Clone of current object.
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
        if ('ExpertContact' == $relationName) {
            $this->initExpertContacts();
            return;
        }
        if ('InformationSeekerContact' == $relationName) {
            $this->initInformationSeekerContacts();
            return;
        }
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
     * If this ChildContactTypes is new, it will return
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
                    ->filterByContactTypes($this)
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
     * @return $this|ChildContactTypes The current object (for fluent API support)
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
            $expertContactRemoved->setContactTypes(null);
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
                ->filterByContactTypes($this)
                ->count($con);
        }

        return count($this->collExpertContacts);
    }

    /**
     * Method called to associate a ChildExpertContact object to this object
     * through the ChildExpertContact foreign key attribute.
     *
     * @param  ChildExpertContact $l ChildExpertContact
     * @return $this|\CryoConnectDB\ContactTypes The current object (for fluent API support)
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
        $expertContact->setContactTypes($this);
    }

    /**
     * @param  ChildExpertContact $expertContact The ChildExpertContact object to remove.
     * @return $this|ChildContactTypes The current object (for fluent API support)
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
            $expertContact->setContactTypes(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this ContactTypes is new, it will return
     * an empty collection; or if this ContactTypes has previously
     * been saved, it will retrieve related ExpertContacts from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in ContactTypes.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildExpertContact[] List of ChildExpertContact objects
     */
    public function getExpertContactsJoinExperts(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildExpertContactQuery::create(null, $criteria);
        $query->joinWith('Experts', $joinBehavior);

        return $this->getExpertContacts($query, $con);
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
     * If this ChildContactTypes is new, it will return
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
                    ->filterByContactTypes($this)
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
     * @return $this|ChildContactTypes The current object (for fluent API support)
     */
    public function setInformationSeekerContacts(Collection $informationSeekerContacts, ConnectionInterface $con = null)
    {
        /** @var ChildInformationSeekerContact[] $informationSeekerContactsToDelete */
        $informationSeekerContactsToDelete = $this->getInformationSeekerContacts(new Criteria(), $con)->diff($informationSeekerContacts);


        //since at least one column in the foreign key is at the same time a PK
        //we can not just set a PK to NULL in the lines below. We have to store
        //a backup of all values, so we are able to manipulate these items based on the onDelete value later.
        $this->informationSeekerContactsScheduledForDeletion = clone $informationSeekerContactsToDelete;

        foreach ($informationSeekerContactsToDelete as $informationSeekerContactRemoved) {
            $informationSeekerContactRemoved->setContactTypes(null);
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
                ->filterByContactTypes($this)
                ->count($con);
        }

        return count($this->collInformationSeekerContacts);
    }

    /**
     * Method called to associate a ChildInformationSeekerContact object to this object
     * through the ChildInformationSeekerContact foreign key attribute.
     *
     * @param  ChildInformationSeekerContact $l ChildInformationSeekerContact
     * @return $this|\CryoConnectDB\ContactTypes The current object (for fluent API support)
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
        $informationSeekerContact->setContactTypes($this);
    }

    /**
     * @param  ChildInformationSeekerContact $informationSeekerContact The ChildInformationSeekerContact object to remove.
     * @return $this|ChildContactTypes The current object (for fluent API support)
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
            $informationSeekerContact->setContactTypes(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this ContactTypes is new, it will return
     * an empty collection; or if this ContactTypes has previously
     * been saved, it will retrieve related InformationSeekerContacts from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in ContactTypes.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildInformationSeekerContact[] List of ChildInformationSeekerContact objects
     */
    public function getInformationSeekerContactsJoinInformationSeekers(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildInformationSeekerContactQuery::create(null, $criteria);
        $query->joinWith('InformationSeekers', $joinBehavior);

        return $this->getInformationSeekerContacts($query, $con);
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
        $collectionClassName = ExpertContactTableMap::getTableMap()->getCollectionClassName();

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
     * to the current object by way of the expert_contact cross-reference table.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ChildContactTypes is new, it will return
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
                    ->filterByContactTypes($this);
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
     * to the current object by way of the expert_contact cross-reference table.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param  Collection $expertss A Propel collection.
     * @param  ConnectionInterface $con Optional connection object
     * @return $this|ChildContactTypes The current object (for fluent API support)
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
     * to the current object by way of the expert_contact cross-reference table.
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
                    ->filterByContactTypes($this)
                    ->count($con);
            }
        } else {
            return count($this->collExpertss);
        }
    }

    /**
     * Associate a ChildExperts to this object
     * through the expert_contact cross reference table.
     *
     * @param ChildExperts $experts
     * @return ChildContactTypes The current object (for fluent API support)
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
        $expertContact = new ChildExpertContact();

        $expertContact->setExperts($experts);

        $expertContact->setContactTypes($this);

        $this->addExpertContact($expertContact);

        // set the back reference to this object directly as using provided method either results
        // in endless loop or in multiple relations
        if (!$experts->isContactTypessLoaded()) {
            $experts->initContactTypess();
            $experts->getContactTypess()->push($this);
        } elseif (!$experts->getContactTypess()->contains($this)) {
            $experts->getContactTypess()->push($this);
        }

    }

    /**
     * Remove experts of this object
     * through the expert_contact cross reference table.
     *
     * @param ChildExperts $experts
     * @return ChildContactTypes The current object (for fluent API support)
     */
    public function removeExperts(ChildExperts $experts)
    {
        if ($this->getExpertss()->contains($experts)) {
            $expertContact = new ChildExpertContact();
            $expertContact->setExperts($experts);
            if ($experts->isContactTypessLoaded()) {
                //remove the back reference if available
                $experts->getContactTypess()->removeObject($this);
            }

            $expertContact->setContactTypes($this);
            $this->removeExpertContact(clone $expertContact);
            $expertContact->clear();

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
     * Clears out the collInformationSeekersIds collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addInformationSeekersIds()
     */
    public function clearInformationSeekersIds()
    {
        $this->collInformationSeekersIds = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Initializes the combinationCollInformationSeekersIds crossRef collection.
     *
     * By default this just sets the combinationCollInformationSeekersIds collection to an empty collection (like clearInformationSeekersIds());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @return void
     */
    public function initInformationSeekersIds()
    {
        $this->combinationCollInformationSeekersIds = new ObjectCombinationCollection;
        $this->combinationCollInformationSeekersIdsPartial = true;
    }

    /**
     * Checks if the combinationCollInformationSeekersIds collection is loaded.
     *
     * @return bool
     */
    public function isInformationSeekersIdsLoaded()
    {
        return null !== $this->combinationCollInformationSeekersIds;
    }

    /**
     * Returns a new query object pre configured with filters from current object and given arguments to query the database.
     *
     * @param int $id
     * @param Criteria $criteria
     *
     * @return ChildInformationSeekersQuery
     */
    public function createInformationSeekerssQuery($id = null, Criteria $criteria = null)
    {
        $criteria = ChildInformationSeekersQuery::create($criteria)
            ->filterByContactTypes($this);

        $informationSeekerContactQuery = $criteria->useInformationSeekerContactQuery();

        if (null !== $id) {
            $informationSeekerContactQuery->filterById($id);
        }

        $informationSeekerContactQuery->endUse();

        return $criteria;
    }

    /**
     * Gets a combined collection of ChildInformationSeekers objects related by a many-to-many relationship
     * to the current object by way of the information_seeker_contact cross-reference table.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ChildContactTypes is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria Optional query object to filter the query
     * @param      ConnectionInterface $con Optional connection object
     *
     * @return ObjectCombinationCollection Combination list of ChildInformationSeekers objects
     */
    public function getInformationSeekersIds($criteria = null, ConnectionInterface $con = null)
    {
        $partial = $this->combinationCollInformationSeekersIdsPartial && !$this->isNew();
        if (null === $this->combinationCollInformationSeekersIds || null !== $criteria || $partial) {
            if ($this->isNew()) {
                // return empty collection
                if (null === $this->combinationCollInformationSeekersIds) {
                    $this->initInformationSeekersIds();
                }
            } else {

                $query = ChildInformationSeekerContactQuery::create(null, $criteria)
                    ->filterByContactTypes($this)
                    ->joinInformationSeekers()
                ;

                $items = $query->find($con);
                $combinationCollInformationSeekersIds = new ObjectCombinationCollection();
                foreach ($items as $item) {
                    $combination = [];

                    $combination[] = $item->getInformationSeekers();
                    $combination[] = $item->getId();
                    $combinationCollInformationSeekersIds[] = $combination;
                }

                if (null !== $criteria) {
                    return $combinationCollInformationSeekersIds;
                }

                if ($partial && $this->combinationCollInformationSeekersIds) {
                    //make sure that already added objects gets added to the list of the database.
                    foreach ($this->combinationCollInformationSeekersIds as $obj) {
                        if (!call_user_func_array([$combinationCollInformationSeekersIds, 'contains'], $obj)) {
                            $combinationCollInformationSeekersIds[] = $obj;
                        }
                    }
                }

                $this->combinationCollInformationSeekersIds = $combinationCollInformationSeekersIds;
                $this->combinationCollInformationSeekersIdsPartial = false;
            }
        }

        return $this->combinationCollInformationSeekersIds;
    }

    /**
     * Returns a not cached ObjectCollection of ChildInformationSeekers objects. This will hit always the databases.
     * If you have attached new ChildInformationSeekers object to this object you need to call `save` first to get
     * the correct return value. Use getInformationSeekersIds() to get the current internal state.
     *
     * @param int $id
     * @param Criteria $criteria
     * @param ConnectionInterface $con
     *
     * @return ChildInformationSeekers[]|ObjectCollection
     */
    public function getInformationSeekerss($id = null, Criteria $criteria = null, ConnectionInterface $con = null)
    {
        return $this->createInformationSeekerssQuery($id, $criteria)->find($con);
    }

    /**
     * Sets a collection of ChildInformationSeekers objects related by a many-to-many relationship
     * to the current object by way of the information_seeker_contact cross-reference table.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param  Collection $informationSeekersIds A Propel collection.
     * @param  ConnectionInterface $con Optional connection object
     * @return $this|ChildContactTypes The current object (for fluent API support)
     */
    public function setInformationSeekersIds(Collection $informationSeekersIds, ConnectionInterface $con = null)
    {
        $this->clearInformationSeekersIds();
        $currentInformationSeekersIds = $this->getInformationSeekersIds();

        $combinationCollInformationSeekersIdsScheduledForDeletion = $currentInformationSeekersIds->diff($informationSeekersIds);

        foreach ($combinationCollInformationSeekersIdsScheduledForDeletion as $toDelete) {
            call_user_func_array([$this, 'removeInformationSeekersId'], $toDelete);
        }

        foreach ($informationSeekersIds as $informationSeekersId) {
            if (!call_user_func_array([$currentInformationSeekersIds, 'contains'], $informationSeekersId)) {
                call_user_func_array([$this, 'doAddInformationSeekersId'], $informationSeekersId);
            }
        }

        $this->combinationCollInformationSeekersIdsPartial = false;
        $this->combinationCollInformationSeekersIds = $informationSeekersIds;

        return $this;
    }

    /**
     * Gets the number of ChildInformationSeekers objects related by a many-to-many relationship
     * to the current object by way of the information_seeker_contact cross-reference table.
     *
     * @param      Criteria $criteria Optional query object to filter the query
     * @param      boolean $distinct Set to true to force count distinct
     * @param      ConnectionInterface $con Optional connection object
     *
     * @return int the number of related ChildInformationSeekers objects
     */
    public function countInformationSeekersIds(Criteria $criteria = null, $distinct = false, ConnectionInterface $con = null)
    {
        $partial = $this->combinationCollInformationSeekersIdsPartial && !$this->isNew();
        if (null === $this->combinationCollInformationSeekersIds || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->combinationCollInformationSeekersIds) {
                return 0;
            } else {

                if ($partial && !$criteria) {
                    return count($this->getInformationSeekersIds());
                }

                $query = ChildInformationSeekerContactQuery::create(null, $criteria);
                if ($distinct) {
                    $query->distinct();
                }

                return $query
                    ->filterByContactTypes($this)
                    ->count($con);
            }
        } else {
            return count($this->combinationCollInformationSeekersIds);
        }
    }

    /**
     * Returns the not cached count of ChildInformationSeekers objects. This will hit always the databases.
     * If you have attached new ChildInformationSeekers object to this object you need to call `save` first to get
     * the correct return value. Use getInformationSeekersIds() to get the current internal state.
     *
     * @param int $id
     * @param Criteria $criteria
     * @param ConnectionInterface $con
     *
     * @return integer
     */
    public function countInformationSeekerss($id = null, Criteria $criteria = null, ConnectionInterface $con = null)
    {
        return $this->createInformationSeekerssQuery($id, $criteria)->count($con);
    }

    /**
     * Associate a ChildInformationSeekers to this object
     * through the information_seeker_contact cross reference table.
     *
     * @param ChildInformationSeekers $informationSeekers,
     * @param int $id
     * @return ChildContactTypes The current object (for fluent API support)
     */
    public function addInformationSeekers(ChildInformationSeekers $informationSeekers, $id)
    {
        if ($this->combinationCollInformationSeekersIds === null) {
            $this->initInformationSeekersIds();
        }

        if (!$this->getInformationSeekersIds()->contains($informationSeekers, $id)) {
            // only add it if the **same** object is not already associated
            $this->combinationCollInformationSeekersIds->push($informationSeekers, $id);
            $this->doAddInformationSeekersId($informationSeekers, $id);
        }

        return $this;
    }

    /**
     *
     * @param ChildInformationSeekers $informationSeekers,
     * @param int $id
     */
    protected function doAddInformationSeekersId(ChildInformationSeekers $informationSeekers, $id)
    {
        $informationSeekerContact = new ChildInformationSeekerContact();

        $informationSeekerContact->setInformationSeekers($informationSeekers);
        $informationSeekerContact->setId($id);


        $informationSeekerContact->setContactTypes($this);

        $this->addInformationSeekerContact($informationSeekerContact);

        // set the back reference to this object directly as using provided method either results
        // in endless loop or in multiple relations
        if ($informationSeekers->isContactTypesIdsLoaded()) {
            $informationSeekers->initContactTypesIds();
            $informationSeekers->getContactTypesIds()->push($this, $id);
        } elseif (!$informationSeekers->getContactTypesIds()->contains($this, $id)) {
            $informationSeekers->getContactTypesIds()->push($this, $id);
        }

    }

    /**
     * Remove informationSeekers, id of this object
     * through the information_seeker_contact cross reference table.
     *
     * @param ChildInformationSeekers $informationSeekers,
     * @param int $id
     * @return ChildContactTypes The current object (for fluent API support)
     */
    public function removeInformationSeekersId(ChildInformationSeekers $informationSeekers, $id)
    {
        if ($this->getInformationSeekersIds()->contains($informationSeekers, $id)) {
            $informationSeekerContact = new ChildInformationSeekerContact();
            $informationSeekerContact->setInformationSeekers($informationSeekers);
            if ($informationSeekers->isContactTypesIdsLoaded()) {
                //remove the back reference if available
                $informationSeekers->getContactTypesIds()->removeObject($this, $id);
            }

            $informationSeekerContact->setId($id);
            $informationSeekerContact->setContactTypes($this);
            $this->removeInformationSeekerContact(clone $informationSeekerContact);
            $informationSeekerContact->clear();

            $this->combinationCollInformationSeekersIds->remove($this->combinationCollInformationSeekersIds->search($informationSeekers, $id));

            if (null === $this->combinationCollInformationSeekersIdsScheduledForDeletion) {
                $this->combinationCollInformationSeekersIdsScheduledForDeletion = clone $this->combinationCollInformationSeekersIds;
                $this->combinationCollInformationSeekersIdsScheduledForDeletion->clear();
            }

            $this->combinationCollInformationSeekersIdsScheduledForDeletion->push($informationSeekers, $id);
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
        $this->contact_type = null;
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
            if ($this->collExpertContacts) {
                foreach ($this->collExpertContacts as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collInformationSeekerContacts) {
                foreach ($this->collInformationSeekerContacts as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collExpertss) {
                foreach ($this->collExpertss as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->combinationCollInformationSeekersIds) {
                foreach ($this->combinationCollInformationSeekersIds as $o) {
                    $o->clearAllReferences($deep);
                }
            }
        } // if ($deep)

        $this->collExpertContacts = null;
        $this->collInformationSeekerContacts = null;
        $this->collExpertss = null;
        $this->combinationCollInformationSeekersIds = null;
    }

    /**
     * Return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(ContactTypesTableMap::DEFAULT_STRING_FORMAT);
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
