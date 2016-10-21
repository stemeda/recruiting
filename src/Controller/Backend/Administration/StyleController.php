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
    /**
     * display input form, save data to config and parse less
     *
     * @return void
     */
    public function datainput()
    {
        if ($this->request->is(['post', 'put'])) {
            $data = $this->request->data;
            Configure::write('less.gray-base', $data['gray-base']);
            Configure::write('less.gray-darker', $data['gray-darker']);
            Configure::write('less.gray-dark', $data['gray-dark']);
            Configure::write('less.gray', $data['gray']);
            Configure::write('less.gray-light', $data['gray-light']);
            Configure::write('less.gray-lighter', $data['gray-lighter']);
            Configure::write('less.brand-primary', $data['brand-primary']);
            Configure::write('less.brand-success', $data['brand-success']);
            Configure::write('less.brand-info', $data['brand-info']);
            Configure::write('less.brand-warning', $data['brand-warning']);
            Configure::write('less.brand-danger', $data['brand-danger']);
            Configure::write('less.body-bg', $data['body-bg']);
            Configure::write('less.text-color', $data['text-color']);
            Configure::write('less.link-color', $data['link-color']);
            Configure::write('less.link-hover-color', $data['link-hover-color']);
            Configure::write('less.link-hover-decoration', $data['link-hover-decoration']);
            Configure::write('less.font-family-sans-serif', $data['font-family-sans-serif']);
            Configure::write('less.font-family-serif', $data['font-family-serif']);
            Configure::write('less.font-family-monospace', $data['font-family-monospace']);
            Configure::write('less.font-family-base', $data['font-family-base']);
            Configure::write('less.font-size-base', $data['font-size-base']);
            Configure::write('less.font-size-large', $data['font-size-large']);
            Configure::write('less.font-size-small', $data['font-size-small']);
            Configure::write('less.font-size-h1', $data['font-size-h1']);
            Configure::write('less.font-size-h2', $data['font-size-h2']);
            Configure::write('less.font-size-h3', $data['font-size-h3']);
            Configure::write('less.font-size-h4', $data['font-size-h4']);
            Configure::write('less.font-size-h5', $data['font-size-h5']);
            Configure::write('less.font-size-h6', $data['font-size-h6']);
            Configure::write('less.line-height-base', $data['line-height-base']);
            Configure::write('less.line-height-computed', $data['line-height-computed']);
            Configure::write('less.headings-font-family', $data['headings-font-family']);
            Configure::write('less.headings-font-weight', $data['headings-font-weight']);
            Configure::write('less.headings-line-height', $data['headings-line-height']);
            Configure::write('less.headings-color', $data['headings-color']);
            Configure::write('less.icon-font-path', $data['icon-font-path']);
            Configure::write('less.icon-font-name', $data['icon-font-name']);
            Configure::write('less.icon-font-svg-id', $data['icon-font-svg-id']);
            Configure::write('less.padding-base-vertical', $data['padding-base-vertical']);
            Configure::write('less.padding-base-horizontal', $data['padding-base-horizontal']);
            Configure::write('less.padding-large-vertical', $data['padding-large-vertical']);
            Configure::write('less.padding-large-horizontal', $data['padding-large-horizontal']);
            Configure::write('less.padding-small-vertical', $data['padding-small-vertical']);
            Configure::write('less.padding-small-horizontal', $data['padding-small-horizontal']);
            Configure::write('less.padding-xs-vertical', $data['padding-xs-vertical']);
            Configure::write('less.padding-xs-horizontal', $data['padding-xs-horizontal']);
            Configure::write('less.line-height-large', $data['line-height-large']);
            Configure::write('less.line-height-small', $data['line-height-small']);
            Configure::write('less.border-radius-base', $data['border-radius-base']);
            Configure::write('less.border-radius-large', $data['border-radius-large']);
            Configure::write('less.border-radius-small', $data['border-radius-small']);
            Configure::write('less.component-active-color', $data['component-active-color']);
            Configure::write('less.component-active-bg', $data['component-active-bg']);
            Configure::write('less.caret-width-base', $data['caret-width-base']);
            Configure::write('less.caret-width-large', $data['caret-width-large']);
            Configure::write('less.table-cell-padding', $data['table-cell-padding']);
            Configure::write('less.table-condensed-cell-padding', $data['table-condensed-cell-padding']);
            Configure::write('less.table-bg', $data['table-bg']);
            Configure::write('less.table-bg-accent', $data['table-bg-accent']);
            Configure::write('less.table-bg-hover', $data['table-bg-hover']);
            Configure::write('less.table-bg-active', $data['table-bg-active']);
            Configure::write('less.table-border-color', $data['table-border-color']);
            Configure::write('less.btn-font-weight', $data['btn-font-weight']);
            Configure::write('less.btn-default-color', $data['btn-default-color']);
            Configure::write('less.btn-default-bg', $data['btn-default-bg']);
            Configure::write('less.btn-default-border', $data['btn-default-border']);
            Configure::write('less.btn-primary-color', $data['btn-primary-color']);
            Configure::write('less.btn-primary-bg', $data['btn-primary-bg']);
            Configure::write('less.btn-primary-border', $data['btn-primary-border']);
            Configure::write('less.btn-success-color', $data['btn-success-color']);
            Configure::write('less.btn-success-bg', $data['btn-success-bg']);
            Configure::write('less.btn-success-border', $data['btn-success-border']);
            Configure::write('less.btn-info-color', $data['btn-info-color']);
            Configure::write('less.btn-info-bg', $data['btn-info-bg']);
            Configure::write('less.btn-info-border', $data['btn-info-border']);
            Configure::write('less.btn-warning-color', $data['btn-warning-color']);
            Configure::write('less.btn-warning-bg', $data['btn-warning-bg']);
            Configure::write('less.btn-warning-border', $data['btn-warning-border']);
            Configure::write('less.btn-danger-color', $data['btn-danger-color']);
            Configure::write('less.btn-danger-bg', $data['btn-danger-bg']);
            Configure::write('less.btn-danger-border', $data['btn-danger-border']);
            Configure::write('less.btn-link-disabled-color', $data['btn-link-disabled-color']);
            Configure::write('less.btn-border-radius-base', $data['btn-border-radius-base']);
            Configure::write('less.btn-border-radius-large', $data['btn-border-radius-large']);
            Configure::write('less.btn-border-radius-small', $data['btn-border-radius-small']);
            Configure::write('less.input-bg', $data['input-bg']);
            Configure::write('less.input-bg-disabled', $data['input-bg-disabled']);
            Configure::write('less.input-color', $data['input-color']);
            Configure::write('less.input-border', $data['input-border']);
            Configure::write('less.input-border-radius', $data['input-border-radius']);
            Configure::write('less.input-border-radius-large', $data['input-border-radius-large']);
            Configure::write('less.input-border-radius-small', $data['input-border-radius-small']);
            Configure::write('less.input-border-focus', $data['input-border-focus']);
            Configure::write('less.input-color-placeholder', $data['input-color-placeholder']);
            Configure::write('less.input-height-base', $data['input-height-base']);
            Configure::write('less.input-height-large', $data['input-height-large']);
            Configure::write('less.input-height-small', $data['input-height-small']);
            Configure::write('less.form-group-margin-bottom', $data['form-group-margin-bottom']);
            Configure::write('less.legend-color', $data['legend-color']);
            Configure::write('less.legend-border-color', $data['legend-border-color']);
            Configure::write('less.input-group-addon-bg', $data['input-group-addon-bg']);
            Configure::write('less.input-group-addon-border-color', $data['input-group-addon-border-color']);
            Configure::write('less.cursor-disabled', $data['cursor-disabled']);
            Configure::dump('less', 'default', ['less']);

            $parser = new Less_Parser();
            $parser->parseFile(ROOT . DS . 'vendor' . DS . 'twbs' . DS . 'bootstrap' . DS . 'less' . DS . 'variables.less');

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
                $parser->parseFile(ROOT . DS . 'vendor' . DS . 'twbs' . DS . 'bootstrap' . DS . 'less' . DS . $file);
            }
            $css = $parser->getCss();

            $file = new \Cake\Filesystem\File(WWW_ROOT . DS . 'css' . DS . 'frontend' . DS . 'bootstrap.css');
            $file->create();
            $file->write($css);
        }
    }
}
