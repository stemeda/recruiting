
<?php echo $this->Form->create($applicationDescriptions); ?>
<div class="panel panel-default">
    <div class="panel-heading">
        <?php if ($applicationDescriptions->multiple): ?>
            <div class="pull-right">
                <span class="btn btn-default btn-xs glyphicon glyphicon-plus addPositionDescription" title="Wert hinzufügen" data-count="1" data-id="<?=$applicationDescriptions->id?>"></span>
            </div>
        <?php endif; ?>
        <?= $applicationDescriptions->name ?>
    </div>
    <div class="panel-body">
        <?= $this->element('application_description_view', ['applicationDescription' =>$applicationDescriptions, 'number' => 0])?>
    </div>
</div>

<?php echo $this->Form->end(); ?>
