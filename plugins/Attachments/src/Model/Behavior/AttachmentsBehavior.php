<?php
/**
 * TechniSat MES : Production and Reparation System of TechniSat (http://technisat.de)
 * Copyright (c) TechniSat Digital GmbH, Daun (Germany)
 *
 * @copyright Copyright (c) TechniSat Digital GmbH, Daun (Germany)
 * @link      https://mes.intranet.daun MES
 * @since     0.1.0
 * @license   proprietary
 * @package MES
 */

namespace Attachments\Model\Behavior;

use Cake\Event\Event;
use Cake\Filesystem\Folder;
use Cake\I18n\Time;
use Cake\ORM\Behavior;
use Cake\ORM\Entity;
use Cake\ORM\TableRegistry;
use Cake\Utility\Text;

/**
 * Attachments behavior
 * @author Stephan Meyer <s.meyer@technisat.de>
 */
class AttachmentsBehavior extends Behavior
{

    /**
     * Default configuration.
     *
     * @var array
     */
    protected $_defaultConfig = [
        'path' => ':yyyy:DS:mm:DS:dd:DS:model:DS:hash:DS:uuid'
    ];

    /**
     * the Attachments Table
     * @var Attachments
     */
    private $Attachments;

    /**
     * {@inheritDoc}
     */
    public function initialize(array $config)
    {
        parent::initialize($config);
        $this->_table->hasMany('Attachments.Attachments', [
            'conditions' => [
                'Attachments.model' => $this->_table->alias()
            ],
            'foreignKey' => 'foreign_key',
            'dependent' => true,
        ]);

        $this->Attachments = TableRegistry::get('Attachments.Attachments');

        $this->Attachments->belongsTo($this->_table->registryAlias(), [
            'conditions' => [
                'Attachments.model' => $this->_table->registryAlias()
            ],
            'sort' => ['Attachments.created' => 'ASC'],
            'foreignKey' => 'foreign_key'
        ]);
    }

    /**
     * set Attachment to defualts
     * @param Entity $entity entity to be modified
     * @return void
     */
    public function setAttachmentsDefaultValues(\Cake\ORM\Entity $entity)
    {
        if (is_array($entity->attachments)) {
            foreach ($entity->attachments as $attachment) {
                $attachment->model = $this->_table->alias();
            }
        }
    }

    /**
     * {@inheritDoc}
     */
    public function beforeSave(Event $event, Entity $entity)
    {
        if ($entity->dirty('attachments')) {
            foreach ($entity->attachments as $attachment) {
                if ($this->_checkIfPathIsTemporary($attachment->path)) {
                    $this->_moveTemporaryFileToStorage($attachment, $entity->source());
                }
            }
        }
    }

    /**
     * check if the path is a temporary path, so that no wrong path can be send
     * @param type $path path to check
     * @return bool
     */
    protected function _checkIfPathIsTemporary($path)
    {
        $tempPath = strtolower(env('TMP'));

        return (substr(strtolower($path), 0, strlen($tempPath)) === $tempPath);
    }

    /**
     * move the temporary file to the configured storage
     * @param \Attachments\Model\Entity\Attachment $attachment the entity
     * @param type $model name of the model
     * @return void
     */
    protected function _moveTemporaryFileToStorage(\Attachments\Model\Entity\Attachment $attachment, $model)
    {
        $folder = new Folder();
        $pathForDatabase = $this->_config['path'];
        $time = Time::now();

        $pathForDatabase = str_replace(':yyyy', $time->year, $pathForDatabase);
        $pathForDatabase = str_replace(':mm', $time->month, $pathForDatabase);
        $pathForDatabase = str_replace(':dd', $time->day, $pathForDatabase);
        $pathForDatabase = str_replace(':hash', $attachment->hash, $pathForDatabase);
        $pathForDatabase = str_replace(':uuid', Text::uuid(), $pathForDatabase);
        $pathForDatabase = str_replace(':model', $model, $pathForDatabase);
        $pathForDatabase = str_replace(':DS', DS, $pathForDatabase);

        $physicalPath = ROOT . DS . 'file_storage' . DS . $pathForDatabase;
        $physicalPathWithFileName = $physicalPath . DS . $attachment->name;
        $pathForDatabaseWithFileName = $pathForDatabase . DS . $attachment->name;

        if ($folder->create($physicalPath)) {
            if (move_uploaded_file($attachment->path, $physicalPathWithFileName)) {
                $attachment->path = $pathForDatabaseWithFileName;
            }
        }
    }
}
