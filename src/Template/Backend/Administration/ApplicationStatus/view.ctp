
<h1><?= h($applicationStatus->name) ?></h1>
<p><?= h($applicationStatus->closes_application) ?></p>
<p><small>Created: <?= $applicationStatus->created->format(DATE_RFC850) ?></small></p>