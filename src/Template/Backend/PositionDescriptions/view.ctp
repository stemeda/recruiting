
<?php echo $this->Form->create($positionDescriptions); ?>
<div class="panel panel-default">
    <div class="panel-heading">
        <?php if ($positionDescriptions->multiple): ?>
            <div class="pull-right">
                <span class="btn btn-default btn-xs glyphicon glyphicon-plus addPositionDescription" title="Wert hinzufügen" data-count="1" data-id="<?=$positionDescriptions->id?>"></span>
            </div>
        <?php endif; ?>
        <?= $positionDescriptions->name ?>
    </div>
    <div class="panel-body">
        <?= $this->element('position_description_view', ['positionDescription' =>$positionDescriptions, 'number' => 0])?>
    </div>
</div>

<?php echo $this->Form->end(); ?>
