
<?php echo $this->Form->create($candidateDescriptions); ?>
<div class="panel panel-default">
    <div class="panel-heading">
        <?php if ($candidateDescriptions->multiple): ?>
            <div class="pull-right">
                <span class="btn btn-default btn-xs glyphicon glyphicon-plus addPositionDescription" title="Wert hinzufügen" data-count="1" data-id="<?=$candidateDescriptions->id?>"></span>
            </div>
        <?php endif; ?>
        <?= $candidateDescriptions->name ?>
    </div>
    <div class="panel-body">
        <?= $this->element('candidate_description_view', ['candidateDescription' =>$candidateDescriptions, 'number' => 0])?>
    </div>
</div>

<?php echo $this->Form->end(); ?>
