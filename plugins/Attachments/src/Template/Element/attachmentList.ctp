<?php

use Cake\I18n\Number;
?>

<?php echo $this->Form->input('id', ['type' => 'hidden']); ?>
<div class="panel panel-default panel-documents">
    <div class="panel-heading">
        <span class="btn btn-default btn-file pull-right btn-xs">
            <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
            <input type="file" multiple="multiple" name="attachments[]">
        </span>
        <h3 class="panel-title">Anhänge</h3>
    </div>
    <div class="panel-body new-documents-title" style="display: none;">
        Neue Dateien:
    </div>
    <ul class="list-group new-documents-list" style="display: none;">
    </ul>
</div>
