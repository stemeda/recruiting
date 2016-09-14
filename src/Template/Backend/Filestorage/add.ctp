<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Filestorage'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="filestorage form large-9 medium-8 columns content">
    <?= $this->Form->create($filestorage) ?>
    <fieldset>
        <legend><?= __('Add Filestorage') ?></legend>
        <?php
            echo $this->Form->input('model');
            echo $this->Form->input('model_id');
            echo $this->Form->input('path');
            echo $this->Form->input('size');
            echo $this->Form->input('hash');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
