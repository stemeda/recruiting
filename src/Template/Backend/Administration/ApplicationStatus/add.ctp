/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
<h1>Add Application Status</h1>
<?php
    echo $this->Form->create($application_status);
    echo $this->Form->input('name');
    echo $this->Form->input('closes_application', ['rows' => '3']);
    echo $this->Form->button(__('Save Application'));
    echo $this->Form->end();
?>
