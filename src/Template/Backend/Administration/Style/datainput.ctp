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
</div>
<?= $this->Form->submit(); ?>
<?= $this->Form->end() ?>