<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Controller\Backend\Administration;

use App\Controller\Backend\BackendController;
use Cake\Core\Configure;
use Less_Parser;

/**
 * CakePHP StyleController
 * @author stephan
 */
class StyleController extends BackendController
{


    public function datainput()
    {
        if ($this->request->is(['post', 'put'])) {
            $data = $this->request->data;
            Configure::write('less.gray-base', $data['gray-base']);
            Configure::write('less.gray-darker', $data['gray-darker']);
            Configure::write('less.gray-dark', $data['gray-dark']);
            Configure::dump('less', 'default', ['less']);


            $parser = new Less_Parser();
            $parser->parseFile(ROOT . DS . 'vendor' . DS . 'twbs' . DS. 'bootstrap' . DS . 'less' . DS . 'variables.less');

            $parser->ModifyVars(Configure::read('less'));

            $files = [
                'mixins.less',
                'normalize.less',
                'print.less',
                'glyphicons.less',
                'scaffolding.less',
                'type.less',
                'code.less',
                'grid.less',
                'tables.less',
                'forms.less',
                'buttons.less',
                'component-animations.less',
                'dropdowns.less',
                'button-groups.less',
                'input-groups.less',
                'navs.less',
                'navbar.less',
                'breadcrumbs.less',
                'pagination.less',
                'pager.less',
                'labels.less',
                'badges.less',
                'jumbotron.less',
                'thumbnails.less',
                'alerts.less',
                'progress-bars.less',
                'media.less',
                'list-group.less',
                'panels.less',
                'responsive-embed.less',
                'wells.less',
                'close.less',
                'modals.less',
                'tooltip.less',
                'popovers.less',
                'carousel.less',
                'utilities.less',
                'responsive-utilities.less',
            ];

            foreach ($files as $file) {
                $parser->parseFile(ROOT . DS . 'vendor' . DS . 'twbs' . DS. 'bootstrap' . DS . 'less' . DS . $file);
            }




            $css = $parser->getCss();

            $file = new \Cake\Filesystem\File(WWW_ROOT . DS . 'css' . DS . 'frontend' . DS . 'bootstrap.css');
            $file->create();
            $file->write($css);
        }
    }

}