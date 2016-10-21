
<div class="panel panel-default">
    <!-- Panel header -->
    <div class="panel-heading">
        <h3 class="panel-title"><?= h($applicationDescription->name) ?></h3>
    </div>
    <table class="table table-striped" cellpadding="0" cellspacing="0">
        <tr>
            <td><?= __('Name') ?></td>
            <td><?= h($applicationDescription->name) ?></td>
        </tr>
        <tr>
            <td><?= __('Description') ?></td>
            <td><?= h($applicationDescription->description) ?></td>
        </tr>
        <tr>
            <td><?= __('Id') ?></td>
            <td><?= $this->Number->format($applicationDescription->id) ?></td>
        </tr>
        <tr>
            <td><?= __('Awailable From') ?></td>
            <td><?= h($applicationDescription->awailable_from) ?></td>
        </tr>
        <tr>
            <td><?= __('Awaibale Until') ?></td>
            <td><?= h($applicationDescription->awaibale_until) ?></td>
        </tr>
        <tr>
            <td><?= __('Created') ?></td>
            <td><?= h($applicationDescription->created) ?></td>
        </tr>
        <tr>
            <td><?= __('Modified') ?></td>
            <td><?= h($applicationDescription->modified) ?></td>
        </tr>
        <tr>
            <td><?= __('Active') ?></td>
            <td><?= $applicationDescription->active ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
</div>

<div class="panel panel-default">
    <!-- Panel header -->
    <div class="panel-heading">
        <h3 class="panel-title"><?= __('Related CandidateDescriptionValues') ?></h3>
    </div>
    <?php if (!empty($applicationDescription->candidate_description_values)): ?>
        <table class="table table-striped">
            <thead>
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Candidate Descriptions Id') ?></th>
                <th><?= __('Name') ?></th>
                <th><?= __('Created') ?></th>
                <th><?= __('Modified') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($applicationDescription->candidate_description_values as $candidateDescriptionValues): ?>
                <tr>
                    <td><?= h($candidateDescriptionValues->id) ?></td>
                    <td><?= h($candidateDescriptionValues->candidate_descriptions_id) ?></td>
                    <td><?= h($candidateDescriptionValues->name) ?></td>
                    <td><?= h($candidateDescriptionValues->created) ?></td>
                    <td><?= h($candidateDescriptionValues->modified) ?></td>
                    <td class="actions">
                        <?= $this->Html->link('', ['controller' => 'CandidateDescriptionValues', 'action' => 'view', $candidateDescriptionValues->id], ['title' => __('View'), 'class' => 'btn btn-default glyphicon glyphicon-eye-open']) ?>
                        <?= $this->Html->link('', ['controller' => 'CandidateDescriptionValues', 'action' => 'edit', $candidateDescriptionValues->id], ['title' => __('Edit'), 'class' => 'btn btn-default glyphicon glyphicon-pencil']) ?>
                        <?= $this->Form->postLink('', ['controller' => 'CandidateDescriptionValues', 'action' => 'delete', $candidateDescriptionValues->id], ['confirm' => __('Are you sure you want to delete # {0}?', $candidateDescriptionValues->id), 'title' => __('Delete'), 'class' => 'btn btn-default glyphicon glyphicon-trash']) ?>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p class="panel-body">no related CandidateDescriptionValues</p>
    <?php endif; ?>
</div>
<div class="panel panel-default">
    <!-- Panel header -->
    <div class="panel-heading">
        <h3 class="panel-title"><?= __('Related ApplicationDescriptionValues') ?></h3>
    </div>
    <?php if (!empty($applicationDescription->application_description_values)): ?>
        <table class="table table-striped">
            <thead>
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Applications Descriptions Id') ?></th>
                <th><?= __('Name') ?></th>
                <th><?= __('Created') ?></th>
                <th><?= __('Modified') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($applicationDescription->application_description_values as $applicationDescriptionValues): ?>
                <tr>
                    <td><?= h($applicationDescriptionValues->id) ?></td>
                    <td><?= h($applicationDescriptionValues->applications_descriptions_id) ?></td>
                    <td><?= h($applicationDescriptionValues->name) ?></td>
                    <td><?= h($applicationDescriptionValues->created) ?></td>
                    <td><?= h($applicationDescriptionValues->modified) ?></td>
                    <td class="actions">
                        <?= $this->Html->link('', ['controller' => 'ApplicationDescriptionValues', 'action' => 'view', $applicationDescriptionValues->id], ['title' => __('View'), 'class' => 'btn btn-default glyphicon glyphicon-eye-open']) ?>
                        <?= $this->Html->link('', ['controller' => 'ApplicationDescriptionValues', 'action' => 'edit', $applicationDescriptionValues->id], ['title' => __('Edit'), 'class' => 'btn btn-default glyphicon glyphicon-pencil']) ?>
                        <?= $this->Form->postLink('', ['controller' => 'ApplicationDescriptionValues', 'action' => 'delete', $applicationDescriptionValues->id], ['confirm' => __('Are you sure you want to delete # {0}?', $applicationDescriptionValues->id), 'title' => __('Delete'), 'class' => 'btn btn-default glyphicon glyphicon-trash']) ?>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p class="panel-body">no related ApplicationDescriptionValues</p>
    <?php endif; ?>
</div>
