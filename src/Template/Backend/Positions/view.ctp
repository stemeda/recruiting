
<div class="panel panel-default">
    <!-- Panel header -->
    <div class="panel-heading">
        <h3 class="panel-title"><?= h($positionDescription->name) ?></h3>
    </div>
    <table class="table table-striped" cellpadding="0" cellspacing="0">
        <tr>
            <td><?= __('Name') ?></td>
            <td><?= h($positionDescription->name) ?></td>
        </tr>
        <tr>
            <td><?= __('Description') ?></td>
            <td><?= h($positionDescription->description) ?></td>
        </tr>
        <tr>
            <td><?= __('Id') ?></td>
            <td><?= $this->Number->format($positionDescription->id) ?></td>
        </tr>
        <tr>
            <td><?= __('Awailable From') ?></td>
            <td><?= h($positionDescription->awailable_from) ?></td>
        </tr>
        <tr>
            <td><?= __('Awaibale Until') ?></td>
            <td><?= h($positionDescription->awaibale_until) ?></td>
        </tr>
        <tr>
            <td><?= __('Created') ?></td>
            <td><?= h($positionDescription->created) ?></td>
        </tr>
        <tr>
            <td><?= __('Modified') ?></td>
            <td><?= h($positionDescription->modified) ?></td>
        </tr>
        <tr>
            <td><?= __('Active') ?></td>
            <td><?= $positionDescription->active ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
</div>

<div class="panel panel-default">
    <!-- Panel header -->
    <div class="panel-heading">
        <h3 class="panel-title"><?= __('Related CandidateDescriptionValues') ?></h3>
    </div>
    <?php if (!empty($positionDescription->candidate_description_values)): ?>
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
            <?php foreach ($positionDescription->candidate_description_values as $candidateDescriptionValues): ?>
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
        <h3 class="panel-title"><?= __('Related PositionDescriptionValues') ?></h3>
    </div>
    <?php if (!empty($positionDescription->position_description_values)): ?>
        <table class="table table-striped">
            <thead>
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Positions Descriptions Id') ?></th>
                <th><?= __('Name') ?></th>
                <th><?= __('Created') ?></th>
                <th><?= __('Modified') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($positionDescription->position_description_values as $positionDescriptionValues): ?>
                <tr>
                    <td><?= h($positionDescriptionValues->id) ?></td>
                    <td><?= h($positionDescriptionValues->positions_descriptions_id) ?></td>
                    <td><?= h($positionDescriptionValues->name) ?></td>
                    <td><?= h($positionDescriptionValues->created) ?></td>
                    <td><?= h($positionDescriptionValues->modified) ?></td>
                    <td class="actions">
                        <?= $this->Html->link('', ['controller' => 'PositionDescriptionValues', 'action' => 'view', $positionDescriptionValues->id], ['title' => __('View'), 'class' => 'btn btn-default glyphicon glyphicon-eye-open']) ?>
                        <?= $this->Html->link('', ['controller' => 'PositionDescriptionValues', 'action' => 'edit', $positionDescriptionValues->id], ['title' => __('Edit'), 'class' => 'btn btn-default glyphicon glyphicon-pencil']) ?>
                        <?= $this->Form->postLink('', ['controller' => 'PositionDescriptionValues', 'action' => 'delete', $positionDescriptionValues->id], ['confirm' => __('Are you sure you want to delete # {0}?', $positionDescriptionValues->id), 'title' => __('Delete'), 'class' => 'btn btn-default glyphicon glyphicon-trash']) ?>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p class="panel-body">no related PositionDescriptionValues</p>
    <?php endif; ?>
</div>
