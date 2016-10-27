<?php
use Cake\Core\Configure;
?>

<?= $this->Form->create($settings, ['align' => [
    'sm' => [
        'left' => 12,
        'middle' => 12,
        'right' => 12
    ],
    'md' => [
        'left' => 3,
        'middle' => 9,
        'right' => 0
    ]
]]); ?>
<?= $this->Form->input('author', ['value' => Configure::read('settings.seo.author')]); ?>
<?= $this->Form->input('title', ['value' => Configure::read('settings.seo.title')]); ?>
<?= $this->Form->input('image', ['value' => Configure::read('settings.seo.image')]); ?>
<?= $this->Form->input('description', ['value' => Configure::read('settings.seo.description')]); ?>
<?= $this->Form->input('copyright', ['value' => Configure::read('settings.seo.copyright')]); ?>
<?= $this->Form->input('position', ['value' => Configure::read('settings.seo.geo.position')]); ?>
<?= $this->Form->input('region', ['value' => Configure::read('settings.seo.geo.region')]); ?>
<?= $this->Form->input('placename', ['value' => Configure::read('settings.seo.geo.placename')]); ?>
<?= $this->Form->textarea('datasecurity', ['value' => Configure::read('settings.datasecurity')]); ?>
<?= $this->CKEditor->replace('datasecurity'); ?>
<?= $this->Form->submit(); ?>
<?= $this->Form->end(); ?>