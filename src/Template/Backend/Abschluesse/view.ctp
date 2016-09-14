<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Abschluesse'), ['action' => 'edit', $abschluesse->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Abschluesse'), ['action' => 'delete', $abschluesse->id], ['confirm' => __('Are you sure you want to delete # {0}?', $abschluesse->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Abschluesse'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Abschluesse'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Abschluesse Has Stellen'), ['controller' => 'AbschluesseHasStellen', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Abschluesse Has Stellen'), ['controller' => 'AbschluesseHasStellen', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Bewerbung'), ['controller' => 'Bewerbung', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Bewerbung'), ['controller' => 'Bewerbung', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="abschluesse view large-9 medium-8 columns content">
    <h3><?= h($abschluesse->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Name') ?></th>
            <td><?= h($abschluesse->name) ?></td>
        </tr>
        <tr>
            <th><?= __('Active') ?></th>
            <td><?= h($abschluesse->active) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($abschluesse->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Created') ?></th>
            <td><?= h($abschluesse->created) ?></td>
        </tr>
        <tr>
            <th><?= __('Modified') ?></th>
            <td><?= h($abschluesse->modified) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Abschluesse Has Stellen') ?></h4>
        <?php if (!empty($abschluesse->abschluesse_has_stellen)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Abschluesse Id') ?></th>
                <th><?= __('Stellen Id') ?></th>
                <th><?= __('Priotitaet') ?></th>
                <th><?= __('Created') ?></th>
                <th><?= __('Modified') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($abschluesse->abschluesse_has_stellen as $abschluesseHasStellen): ?>
            <tr>
                <td><?= h($abschluesseHasStellen->id) ?></td>
                <td><?= h($abschluesseHasStellen->abschluesse_id) ?></td>
                <td><?= h($abschluesseHasStellen->stellen_id) ?></td>
                <td><?= h($abschluesseHasStellen->priotitaet) ?></td>
                <td><?= h($abschluesseHasStellen->created) ?></td>
                <td><?= h($abschluesseHasStellen->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'AbschluesseHasStellen', 'action' => 'view', $abschluesseHasStellen->abschluesse_id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'AbschluesseHasStellen', 'action' => 'edit', $abschluesseHasStellen->abschluesse_id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'AbschluesseHasStellen', 'action' => 'delete', $abschluesseHasStellen->abschluesse_id], ['confirm' => __('Are you sure you want to delete # {0}?', $abschluesseHasStellen->abschluesse_id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Bewerbung') ?></h4>
        <?php if (!empty($abschluesse->bewerbung)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Stellen Id') ?></th>
                <th><?= __('Abschluesse Id') ?></th>
                <th><?= __('Bewerbung Status Id') ?></th>
                <th><?= __('Vorname') ?></th>
                <th><?= __('Nachname') ?></th>
                <th><?= __('Email') ?></th>
                <th><?= __('Benachrichtigung') ?></th>
                <th><?= __('Abschluss Note') ?></th>
                <th><?= __('Created') ?></th>
                <th><?= __('Modified') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($abschluesse->bewerbung as $bewerbung): ?>
            <tr>
                <td><?= h($bewerbung->id) ?></td>
                <td><?= h($bewerbung->stellen_id) ?></td>
                <td><?= h($bewerbung->abschluesse_id) ?></td>
                <td><?= h($bewerbung->bewerbung_status_id) ?></td>
                <td><?= h($bewerbung->vorname) ?></td>
                <td><?= h($bewerbung->nachname) ?></td>
                <td><?= h($bewerbung->email) ?></td>
                <td><?= h($bewerbung->benachrichtigung) ?></td>
                <td><?= h($bewerbung->abschluss_note) ?></td>
                <td><?= h($bewerbung->created) ?></td>
                <td><?= h($bewerbung->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Bewerbung', 'action' => 'view', $bewerbung->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Bewerbung', 'action' => 'edit', $bewerbung->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Bewerbung', 'action' => 'delete', $bewerbung->id], ['confirm' => __('Are you sure you want to delete # {0}?', $bewerbung->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
