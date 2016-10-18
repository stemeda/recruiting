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
     
<?= $this->Form->submit(); ?>
<?= $this->Form->end() ?>