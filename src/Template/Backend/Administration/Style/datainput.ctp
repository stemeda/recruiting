<?php
use Cake\Core\Configure;
?>


<?= $this->Form->create(null, ['type' => 'post']) ?>
<h1>Colors</h1>
<div class="row">
    <div class="col-xs-4">
        <?= $this->Form->input('gray-base', ['value' => Configure::read('less.gray-base')])?>
    </div>
    <div class="col-xs-4">
        <?= $this->Form->input('gray-darker', ['value' => Configure::read('less.gray-darker')])?>
    </div>
    <div class="col-xs-4">
        <?= $this->Form->input('gray-dark', ['value' => Configure::read('less.gray-dark')])?>
    </div>
    <div class="clearfix"></div>
    <div class="col-xs-4">
        <?= $this->Form->input('gray', ['value' => Configure::read('less.gray')])?>
    </div>
    <div class="col-xs-4">
        <?= $this->Form->input('gray-light', ['value' => Configure::read('less.gray-light')])?>
    </div>
    <div class="col-xs-4">
        <?= $this->Form->input('gray-lighter', ['value' => Configure::read('less.gray-lighter')])?>
    </div>
    <div class="clearfix"></div>
    <div class="col-xs-4">
        <?= $this->Form->input('brand-primary', ['value' => Configure::read('less.brand-primary')])?>
    </div>
    <div class="col-xs-4">
        <?= $this->Form->input('brand-success', ['value' => Configure::read('less.brand-success')])?>
    </div>
    <div class="col-xs-4">
        <?= $this->Form->input('brand-info', ['value' => Configure::read('less.brand-info')])?>
    </div>
    <div class="clearfix"></div>
    <div class="col-xs-4">
        <?= $this->Form->input('brand-warning', ['value' => Configure::read('less.brand-warning')])?>
    </div>
    <div class="col-xs-4">
        <?= $this->Form->input('brand-danger', ['value' => Configure::read('less.brand-danger')])?>
    </div>
</div>
    <h1>Scaffolding</h1>
<div class="row">
    <div class="col-xs-4">
        <?= $this->Form->input('body-bg', ['value' => Configure::read('less.body-bg')])?>
    </div>
    <div class="col-xs-4">
        <?= $this->Form->input('text-color', ['value' => Configure::read('less.text-color')])?>
    </div>
    <div class="col-xs-4">
        <?= $this->Form->input('link-color', ['value' => Configure::read('less.link-color')])?>
    </div>
    <div class="clearfix"></div>
    <div class="col-xs-4">
        <?= $this->Form->input('link-hover-color', ['value' => Configure::read('less.link-hover-color')])?>
    </div>
    <div class="col-xs-4">
        <?= $this->Form->input('link-hover-decoration', ['value' => Configure::read('less.link-hover-decoration')])?>
    </div>
    
</div>
     <h1>Typography</h1>
<div class="row">
     <div class="col-xs-4">
        <?= $this->Form->input('font-family-sans-serif', ['value' => Configure::read('less.font-family-sans-serif')])?>
    </div>
     <div class="col-xs-4">
        <?= $this->Form->input('font-family-serif', ['value' => Configure::read('less.font-family-serif')])?>
    </div>
     <div class="col-xs-4">
        <?= $this->Form->input('font-family-monospace', ['value' => Configure::read('less.font-family-monospace')])?>
    </div>
     <div class="clearfix"></div>
     <div class="col-xs-4">
        <?= $this->Form->input('font-family-base', ['value' => Configure::read('less.font-family-base')])?>
    </div>
     <div class="col-xs-4">
        <?= $this->Form->input('font-size-base', ['value' => Configure::read('less.font-size-base')])?>
    </div>
     <div class="col-xs-4">
        <?= $this->Form->input('font-size-large', ['value' => Configure::read('less.font-size-large')])?>
    </div>
     <div class="clearfix"></div>
     <div class="col-xs-4">
        <?= $this->Form->input('font-size-small', ['value' => Configure::read('less.font-size-small')])?>
    </div>
     <div class="col-xs-4">
        <?= $this->Form->input('font-size-h1', ['value' => Configure::read('less.font-size-h1')])?>
    </div>
     <div class="col-xs-4">
        <?= $this->Form->input('font-size-h2', ['value' => Configure::read('less.font-size-h2')])?>
    </div>
     <div class="clearfix"></div>
     <div class="col-xs-4">
        <?= $this->Form->input('font-size-h3', ['value' => Configure::read('less.font-size-h3')])?>
    </div>
     <div class="col-xs-4">
        <?= $this->Form->input('font-size-h4', ['value' => Configure::read('less.font-size-h4')])?>
    </div>
     <div class="col-xs-4">
        <?= $this->Form->input('font-size-h5', ['value' => Configure::read('less.font-size-h5')])?>
    </div>
     <div class="clearfix"></div>
     <div class="col-xs-4">
        <?= $this->Form->input('font-size-h6', ['value' => Configure::read('less.font-size-h6')])?>
    </div>
     <div class="col-xs-4">
        <?= $this->Form->input('line-height-base', ['value' => Configure::read('less.line-height-base')])?>
    </div>
     <div class="col-xs-4">
        <?= $this->Form->input('line-height-computed', ['value' => Configure::read('less.line-height-computed')])?>
    </div>
     <div class="clearfix"></div>
     <div class="col-xs-4">
        <?= $this->Form->input('headings-font-family', ['value' => Configure::read('less.headings-font-family')])?>
    </div>
     <div class="col-xs-4">
        <?= $this->Form->input('headings-font-weight', ['value' => Configure::read('less.headings-font-weight')])?>
    </div>
     <div class="col-xs-4">
        <?= $this->Form->input('headings-line-height', ['value' => Configure::read('less.headings-line-height6')])?>
    </div>
     <div class="clearfix"></div>
     <div class="col-xs-4">
        <?= $this->Form->input('headings-color', ['value' => Configure::read('less.headings-color')])?>
    </div>
</div>  
 
    <h1>Iconography</h1>
<div class="row">
    <div class="col-xs-4">
        <?= $this->Form->input('icon-font-path', ['value' => Configure::read('less.icon-font-path')])?>
    </div>
    <div class="col-xs-4">
        <?= $this->Form->input('icon-font-name', ['value' => Configure::read('less.icon-font-name')])?>
    </div>
    <div class="col-xs-4">
        <?= $this->Form->input('icon-font-svg-id', ['value' => Configure::read('less.icon-font-svg-id')])?>
    </div>
</div> 

    <h1>Components</h1>
<div class="row">
    <div class="col-xs-4">
        <?= $this->Form->input('padding-base-vertical', ['value' => Configure::read('less.padding-base-vertical')])?>
    </div>
    <div class="col-xs-4">
        <?= $this->Form->input('padding-base-horizontal', ['value' => Configure::read('less.padding-base-horizontal')])?>
    </div>
    <div class="col-xs-4">
        <?= $this->Form->input('padding-large-vertical', ['value' => Configure::read('less.padding-large-vertical')])?>
    </div>
    <div class="clearfix"></div>
    <div class="col-xs-4">
        <?= $this->Form->input('padding-large-horizontal', ['value' => Configure::read('less.padding-large-horizontal')])?>
    </div>
    <div class="col-xs-4">
        <?= $this->Form->input('padding-small-vertical', ['value' => Configure::read('less.padding-small-vertical')])?>
    </div>
    <div class="col-xs-4">
        <?= $this->Form->input('padding-small-horizontal', ['value' => Configure::read('less.padding-small-horizontal')])?>
    </div>
    <div class="clearfix"></div>
    <div class="col-xs-4">
        <?= $this->Form->input('padding-xs-vertical', ['value' => Configure::read('less.padding-xs-vertical')])?>
    </div>
    <div class="col-xs-4">
        <?= $this->Form->input('padding-xs-horizontal', ['value' => Configure::read('less.padding-xs-horizontal')])?>
    </div>
    <div class="col-xs-4">
        <?= $this->Form->input('line-height-large', ['value' => Configure::read('less.line-height-large')])?>
    </div>
    <div class="clearfix"></div>
    <div class="col-xs-4">
        <?= $this->Form->input('line-height-small', ['value' => Configure::read('less.line-height-small')])?>
    </div>
    <div class="col-xs-4">
        <?= $this->Form->input('border-radius-base', ['value' => Configure::read('less.border-radius-base')])?>
    </div>
    <div class="col-xs-4">
        <?= $this->Form->input('border-radius-large', ['value' => Configure::read('less.border-radius-large')])?>
    </div>
    <div class="clearfix"></div>
    <div class="col-xs-4">
        <?= $this->Form->input('border-radius-small', ['value' => Configure::read('less.border-radius-small')])?>
    </div>
    <div class="col-xs-4">
        <?= $this->Form->input('component-active-color', ['value' => Configure::read('less.component-active-color')])?>
    </div>
    <div class="col-xs-4">
        <?= $this->Form->input('component-active-bg', ['value' => Configure::read('less.component-active-bg')])?>
    </div>
    <div class="clearfix"></div>
     <div class="col-xs-4">
        <?= $this->Form->input('caret-width-base', ['value' => Configure::read('less.caret-width-large')])?>
    </div>
    <div class="col-xs-4">
        <?= $this->Form->input('caret-width-large', ['value' => Configure::read('less.caret-width-large')])?>
    </div>
    <div class="clearfix"></div>
</div> 
 
    <h1>Tables</h1>
<div class="row">  
    <div class="col-xs-4">
        <?= $this->Form->input('table-cell-padding', ['value' => Configure::read('less.table-cell-padding')])?>
    </div>
    <div class="col-xs-4">
        <?= $this->Form->input('table-condensed-cell-padding', ['value' => Configure::read('less.table-condensed-cell-padding')])?>
    </div>
    <div class="col-xs-4">
        <?= $this->Form->input('table-bg', ['value' => Configure::read('less.table-bg')])?>
    </div>
    <div class="clearfix"></div>
    <div class="col-xs-4">
        <?= $this->Form->input('table-bg-accent', ['value' => Configure::read('less.table-bg-accent')])?>
    </div>
    <div class="col-xs-4">
        <?= $this->Form->input('table-bg-hover', ['value' => Configure::read('less.table-bg-hover')])?>
    </div>
    <div class="col-xs-4">
        <?= $this->Form->input('table-bg-active', ['value' => Configure::read('less.table-bg-active')])?>
    </div>
    <div class="clearfix"></div>
    <div class="col-xs-4">
        <?= $this->Form->input('table-border-color', ['value' => Configure::read('less.table-border-color')])?>
    </div>
   </div> 
    
    <h1>Buttons</h1>
<div class="row"> 
    <div class="col-xs-4">
        <?= $this->Form->input('btn-font-weight', ['value' => Configure::read('less.btn-font-weight')])?>
    </div>
    <div class="col-xs-4">
        <?= $this->Form->input('btn-default-color', ['value' => Configure::read('less.btn-default-color')])?>
    </div>
    <div class="col-xs-4">
        <?= $this->Form->input('btn-default-bg', ['value' => Configure::read('less.btn-default-bg')])?>
    </div>
    <div class="clearfix"></div>
    <div class="col-xs-4">
        <?= $this->Form->input('btn-default-border', ['value' => Configure::read('less.btn-default-border')])?>
    </div>
    <div class="col-xs-4">
        <?= $this->Form->input('btn-primary-color', ['value' => Configure::read('less.btn-primary-color')])?>
    </div>
    <div class="col-xs-4">
        <?= $this->Form->input('btn-primary-bg', ['value' => Configure::read('less.btn-primary-bg')])?>
    </div>
    <div class="clearfix"></div>
    <div class="col-xs-4">
        <?= $this->Form->input('btn-primary-border', ['value' => Configure::read('less.btn-primary-border')])?>
    </div>
    <div class="col-xs-4">
        <?= $this->Form->input('btn-success-color', ['value' => Configure::read('less.btn-success-color')])?>
    </div>
    <div class="col-xs-4">
        <?= $this->Form->input('btn-success-bg', ['value' => Configure::read('less.btn-success-bg')])?>
    </div>
    <div class="clearfix"></div>
    <div class="col-xs-4">
        <?= $this->Form->input('btn-success-border', ['value' => Configure::read('less.btn-success-border')])?>
    </div>
    <div class="col-xs-4">
        <?= $this->Form->input('btn-info-color', ['value' => Configure::read('less.btn-info-color')])?>
    </div>
    <div class="col-xs-4">
        <?= $this->Form->input('btn-info-bg', ['value' => Configure::read('less.btn-info-bg')])?>
    </div>
    <div class="clearfix"></div>
    <div class="col-xs-4">
        <?= $this->Form->input('btn-info-border', ['value' => Configure::read('less.btn-info-border')])?>
    </div>
    <div class="col-xs-4">
        <?= $this->Form->input('btn-warning-color', ['value' => Configure::read('less.btn-warning-color')])?>
    </div>
    <div class="col-xs-4">
        <?= $this->Form->input('btn-warning-bg', ['value' => Configure::read('less.btn-warning-bg')])?>
    </div>
    <div class="clearfix"></div>
    <div class="col-xs-4">
        <?= $this->Form->input('btn-warning-border', ['value' => Configure::read('less.btn-warning-border')])?>
    </div>
    <div class="col-xs-4">
        <?= $this->Form->input('btn-danger-color', ['value' => Configure::read('less.btn-danger-color')])?>
    </div>
    <div class="col-xs-4">
        <?= $this->Form->input('btn-danger-bg', ['value' => Configure::read('less.btn-danger-bg')])?>
    </div>
    <div class="clearfix"></div>
    <div class="col-xs-4">
        <?= $this->Form->input('btn-danger-border', ['value' => Configure::read('less.btn-danger-border')])?>
    </div>
    <div class="col-xs-4">
        <?= $this->Form->input('btn-link-disabled-color', ['value' => Configure::read('less.btn-link-disabled-color')])?>
    </div>
    <div class="col-xs-4">
        <?= $this->Form->input('btn-border-radius-base', ['value' => Configure::read('less.btn-border-radius-base')])?>
    </div>
    <div class="clearfix"></div>
    <div class="col-xs-4">
        <?= $this->Form->input('btn-border-radius-large', ['value' => Configure::read('less.btn-border-radius-large')])?>
    </div>
    <div class="col-xs-4">
        <?= $this->Form->input('btn-border-radius-small', ['value' => Configure::read('less.btn-border-radius-small')])?>
    </div>
    
</div>
    
    <h1>Forms</h1>
<div class="row"> 
    <div class="col-xs-4">
        <?= $this->Form->input('input-bg', ['value' => Configure::read('less.input-bg')])?>
    </div>
    <div class="col-xs-4">
        <?= $this->Form->input('input-bg-disabled', ['value' => Configure::read('less.input-bg-disabled')])?>
    </div>
    <div class="col-xs-4">
        <?= $this->Form->input('input-color', ['value' => Configure::read('less.input-color')])?>
    </div>
    <div class="clearfix"></div>
    <div class="col-xs-4">
        <?= $this->Form->input('input-border', ['value' => Configure::read('less.input-border')])?>
    </div>
    <div class="col-xs-4">
        <?= $this->Form->input('input-border-radius', ['value' => Configure::read('less.input-border-radius')])?>
    </div>
    <div class="col-xs-4">
        <?= $this->Form->input('input-border-radius-large', ['value' => Configure::read('less.input-border-radius-large')])?>
    </div>
    <div class="clearfix"></div>
    <div class="col-xs-4">
        <?= $this->Form->input('input-border-radius-small', ['value' => Configure::read('less.input-border-radius-small')])?>
    </div>
    <div class="col-xs-4">
        <?= $this->Form->input('input-border-focus', ['value' => Configure::read('less.input-border-focus')])?>
    </div>
    <div class="col-xs-4">
        <?= $this->Form->input('input-color-placeholder', ['value' => Configure::read('less.input-color-placeholder')])?>
    </div>
    <div class="clearfix"></div>
    <div class="col-xs-4">
        <?= $this->Form->input('input-height-base', ['value' => Configure::read('less.input-height-base')])?>
    </div>
    <div class="col-xs-4">
        <?= $this->Form->input('input-height-large', ['value' => Configure::read('less.input-height-large')])?>
    </div>
    <div class="col-xs-4">
        <?= $this->Form->input('input-height-small', ['value' => Configure::read('less.input-height-small')])?>
    </div>
    <div class="clearfix"></div>
    <div class="col-xs-4">
        <?= $this->Form->input('form-group-margin-bottom', ['value' => Configure::read('less.form-group-margin-bottom')])?>
    </div>
    <div class="col-xs-4">
        <?= $this->Form->input('legend-color', ['value' => Configure::read('less.legend-color')])?>
    </div>
    <div class="col-xs-4">
        <?= $this->Form->input('legend-border-color', ['value' => Configure::read('less.legend-border-color')])?>
    </div>
    <div class="clearfix"></div>
    <div class="col-xs-4">
        <?= $this->Form->input('input-group-addon-bg', ['value' => Configure::read('less.input-group-addon-bg')])?>
    </div>
    <div class="col-xs-4">
        <?= $this->Form->input('input-group-addon-border-color', ['value' => Configure::read('less.input-group-addon-border-color')])?>
    </div>
    <div class="col-xs-4">
        <?= $this->Form->input('cursor-disabled', ['value' => Configure::read('less.cursor-disabled')])?>
    </div>
</div>
    
<?= $this->Form->submit(); ?>
<?= $this->Form->end() ?>