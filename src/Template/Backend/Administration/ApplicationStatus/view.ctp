
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor
 * 
 */

<h1><?= h($application_status->name) ?></h1>
<p><?= h($application_status->closes_application) ?></p>
<p><small>Created: <?= $application_status->created->format(DATE_RFC850) ?></small></p>