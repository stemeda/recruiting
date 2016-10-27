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

namespace Attachments\Controller;

use Attachments\Controller\AppController;
use Cake\Core\Plugin;
use Imagine\Gd\Imagine;
use Imagine\Image\Box;

/**
 * Attachments Controller
 *
 * @property \Attachments\Model\Table\AttachmentsTable $Attachments
 */
class AttachmentsController extends AppController
{

    /**
     * returns a preview of the file as PNG image
     * @param uuid $id id of image
     * @return void
     */
    public function preview($id = null)
    {
        $attachment = $this->Attachments->get($id);
        $imagine = new Imagine();

        switch ($attachment->extension) {
            case 'png':
            case 'jpg':
            case 'jpeg':
            case 'gif':
                $image = $imagine->open(ROOT . DS . 'file_storage' . DS . $attachment->path);
                break;
            default:
                $image = $imagine->open(Plugin::path('Attachments') . 'webroot/img/file.png');
                break;
        }

        echo $image->thumbnail(new Box(100, 100))->show('png');
        exit;
    }

    /**
     * print the raw file to response
     * @param uuid $id id of image
     * @return \Cake\Network\Response
     */
    public function download($id = null)
    {
        $attachment = $this->Attachments->get($id);

        $this->response->file(ROOT . DS . 'file_storage' . DS . $attachment->path, [
            'download' => true,
            'name' => $attachment->name
        ]);

        return $this->response;
    }

    /**
     * check if the user has the right to call the current controller action
     * @param array $user the current user
     * @return bool
     */
    public function isAuthorized($user = null)
    {
        return is_array($user);
    }
}
