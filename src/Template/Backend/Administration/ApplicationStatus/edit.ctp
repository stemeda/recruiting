<h1>Edit Application</h1>
<?php
    echo $this->Form->create($application_status);
    echo $this->Form->input('name');
    echo $this->Form->input('closes_application');
    echo $this->Form->button(__('Save Application'));
    echo $this->Form->end();
?>

