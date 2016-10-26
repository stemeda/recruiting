<h1>Add Application Status</h1>
<?php
    echo $this->Form->create($applicationStatus);
    echo $this->Form->input('name');
    echo $this->Form->input('closes_application');
    echo $this->Form->button('Speichern');
    echo $this->Form->end();
?>

