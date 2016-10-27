<?php
/**
 * TechniSat MES : Production and Reparation System of TechniSat (http://technisat.de)
 * Copyright (c) TechniSat Digital GmbH, Daun (Germany)
 *
 *
 * @copyright Copyright (c) TechniSat Digital GmbH, Daun (Germany)
 * @link      https://mes.intranet.daun MES
 * @since     0.1.0
 * @license   proprietary
 * @package MES
 */

namespace Attachments\Model\Entity;

use Cake\Filesystem\File;
use Cake\ORM\Entity;
use Cake\Routing\Router;

/**
 * Attachment Entity.
 */
class Attachment extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     * Note that '*' is set to true, which allows all unspecified fields to be
     * mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        '*' => true,
        'id' => false,
        'user_id' => false,
        'hash' => false,
        'extension' => false,
        'foreign_key' => false,
        'model' => false,
    ];

    /**
     * setter for $name
     * @param string $name virtual setter for name
     * @return string
     */
    protected function _setName($name)
    {
        $file = new File($name);
        $this->extension = $file->ext();

        return $name;
    }

    /**
     * setter for $tmpName
     * @param string $path virtual setter for tmp_name
     * @return string
     */
    protected function _setTmpName($path)
    {
        $file = new File($path);
        if ($file->exists()) {
            $this->hash = hash_file('sha256', $path);
        } else {
            throw new \Cake\Network\Exception\InternalErrorException('Wrong File');
        }
        $this->path = $path;
        unset($this->tmp_name);
        $this->dirty('tmp_name', false);

        return $path;
    }


    /**
     * Returns an URL with a png preview of the file
     *
     * @return string
     */
    public function previewUrl()
    {
        return Router::url([
            'plugin' => 'Attachments',
            'controller' => 'Attachments',
            'action' => 'preview',
            'prefix' => false,
            '_full' => true,
            $this->id
        ]);
    }
    /**
     * Returns an URL with a png view of the file
     *
     * @return string
     */
    public function viewUrl()
    {
        return Router::url([
            'plugin' => 'Attachments',
            'controller' => 'Attachments',
            'action' => 'view',
            'prefix' => false,
            $this->id
        ]);
    }
    /**
     * Returns an URL to download the file
     *
     * @return string
     */
    public function downloadUrl()
    {
        return Router::url([
            'plugin' => 'Attachments',
            'controller' => 'Attachments',
            'action' => 'download',
            'prefix' => false,
            '_full' => true,
            $this->id
        ]);
    }
}
