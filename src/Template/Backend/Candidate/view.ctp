
<div class="panel panel-default">
    <!-- Panel header -->
    <div class="panel-heading">
        <h3 class="panel-title"><?= h($candidateDescription->name) ?></h3>
    </div>
    <table class="table table-striped" cellpadding="0" cellspacing="0">
        <tr>
            <td><?= __('Name') ?></td>
            <td><?= h($candidateDescription->name) ?></td>
        </tr>
        <tr>
            <td><?= __('Description') ?></td>
            <td><?= h($candidateDescription->description) ?></td>
        </tr>
        <tr>
            <td><?= __('Id') ?></td>
            <td><?= $this->Number->format($candidateDescription->id) ?></td>
        </tr>
        <tr>
            <td><?= __('Awailable From') ?></td>
            <td><?= h($candidateDescription->awailable_from) ?></td>
        </tr>
        <tr>
            <td><?= __('Awaibale Until') ?></td>
            <td><?= h($candidateDescription->awaibale_until) ?></td>
        </tr>
        <tr>
            <td><?= __('Created') ?></td>
            <td><?= h($candidateDescription->created) ?></td>
        </tr>
        <tr>
            <td><?= __('Modified') ?></td>
            <td><?= h($candidateDescription->modified) ?></td>
        </tr>
        <tr>
            <td><?= __('Active') ?></td>
            <td><?= $candidateDescription->active ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
</div>

<div class="panel panel-default">
    <!-- Panel header -->
    <div class="panel-heading">
        <h3 class="panel-title"><?= __('Related CandidateDescriptionValues') ?></h3>
    </div>
    <?php if (!empty($candidateDescription->candidate_description_values)): ?>
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
            <?php foreach ($candidateDescription->candidate_description_values as $candidateDescriptionValues): ?>
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
        <h3 class="panel-title"><?= __('Related CandidateDescriptionValues') ?></h3>
    </div>
    <?php if (!empty($candidateDescription->candidate_description_values)): ?>
        <table class="table table-striped">
            <thead>
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Candidates Descriptions Id') ?></th>
                <th><?= __('Name') ?></th>
                <th><?= __('Created') ?></th>
                <th><?= __('Modified') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($candidateDescription->candidate_description_values as $candidateDescriptionValues): ?>
                <tr>
                    <td><?= h($candidateDescriptionValues->id) ?></td>
                    <td><?= h($candidateDescriptionValues->candidates_descriptions_id) ?></td>
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
