<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Stellen'), ['action' => 'edit', $stellen->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Stellen'), ['action' => 'delete', $stellen->id], ['confirm' => __('Are you sure you want to delete # {0}?', $stellen->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Stellen'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Stellen'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Abschluesse Has Stellen'), ['controller' => 'AbschluesseHasStellen', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Abschluesse Has Stellen'), ['controller' => 'AbschluesseHasStellen', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Bewerbung'), ['controller' => 'Bewerbung', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Bewerbung'), ['controller' => 'Bewerbung', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Stellen Has Berufserfahrung'), ['controller' => 'StellenHasBerufserfahrung', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Stellen Has Berufserfahrung'), ['controller' => 'StellenHasBerufserfahrung', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Stellen Has Zusatzqualifikationen'), ['controller' => 'StellenHasZusatzqualifikationen', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Stellen Has Zusatzqualifikationen'), ['controller' => 'StellenHasZusatzqualifikationen', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="stellen view large-9 medium-8 columns content">
    <h3><?= h($stellen->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Name') ?></th>
            <td><?= h($stellen->name) ?></td>
        </tr>
        <tr>
            <th><?= __('Description') ?></th>
            <td><?= h($stellen->description) ?></td>
        </tr>
        <tr>
            <th><?= __('Created') ?></th>
            <td><?= h($stellen->created) ?></td>
        </tr>
        <tr>
            <th><?= __('Modified') ?></th>
            <td><?= h($stellen->modified) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($stellen->id) ?></td>
        </tr>
        <tr>
            <th><?= __('ManuellPruefen') ?></th>
            <td><?= $this->Number->format($stellen->manuellPruefen) ?></td>
        </tr>
        <tr>
            <th><?= __('Vorstellungsgespraeche') ?></th>
            <td><?= $this->Number->format($stellen->vorstellungsgespraeche) ?></td>
        </tr>
        <tr>
            <th><?= __('Ausschreiben Von') ?></th>
            <td><?= h($stellen->ausschreiben_von) ?></td>
        </tr>
        <tr>
            <th><?= __('Ausschreiben Bis') ?></th>
            <td><?= h($stellen->ausschreiben_bis) ?></td>
        </tr>
        <tr>
            <th><?= __('Einstellung Ab') ?></th>
            <td><?= h($stellen->einstellung_ab) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Abschluesse Has Stellen') ?></h4>
        <?php if (!empty($stellen->abschluesse_has_stellen)): ?>
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
            <?php foreach ($stellen->abschluesse_has_stellen as $abschluesseHasStellen): ?>
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
        <?php if (!empty($stellen->bewerbung)): ?>
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
            <?php foreach ($stellen->bewerbung as $bewerbung): ?>
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
    <div class="related">
        <h4><?= __('Related Stellen Has Berufserfahrung') ?></h4>
        <?php if (!empty($stellen->stellen_has_berufserfahrung)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Stellen Id') ?></th>
                <th><?= __('Berufserfahrung Id') ?></th>
                <th><?= __('Priotitaet') ?></th>
                <th><?= __('Created') ?></th>
                <th><?= __('Modified') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($stellen->stellen_has_berufserfahrung as $stellenHasBerufserfahrung): ?>
            <tr>
                <td><?= h($stellenHasBerufserfahrung->id) ?></td>
                <td><?= h($stellenHasBerufserfahrung->stellen_id) ?></td>
                <td><?= h($stellenHasBerufserfahrung->berufserfahrung_id) ?></td>
                <td><?= h($stellenHasBerufserfahrung->priotitaet) ?></td>
                <td><?= h($stellenHasBerufserfahrung->created) ?></td>
                <td><?= h($stellenHasBerufserfahrung->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'StellenHasBerufserfahrung', 'action' => 'view', $stellenHasBerufserfahrung->stellen_id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'StellenHasBerufserfahrung', 'action' => 'edit', $stellenHasBerufserfahrung->stellen_id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'StellenHasBerufserfahrung', 'action' => 'delete', $stellenHasBerufserfahrung->stellen_id], ['confirm' => __('Are you sure you want to delete # {0}?', $stellenHasBerufserfahrung->stellen_id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Stellen Has Zusatzqualifikationen') ?></h4>
        <?php if (!empty($stellen->stellen_has_zusatzqualifikationen)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Stellen Id') ?></th>
                <th><?= __('Zusatzqualifikationen Id') ?></th>
                <th><?= __('Priotitaet') ?></th>
                <th><?= __('Created') ?></th>
                <th><?= __('Modified') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($stellen->stellen_has_zusatzqualifikationen as $stellenHasZusatzqualifikationen): ?>
            <tr>
                <td><?= h($stellenHasZusatzqualifikationen->id) ?></td>
                <td><?= h($stellenHasZusatzqualifikationen->stellen_id) ?></td>
                <td><?= h($stellenHasZusatzqualifikationen->zusatzqualifikationen_id) ?></td>
                <td><?= h($stellenHasZusatzqualifikationen->priotitaet) ?></td>
                <td><?= h($stellenHasZusatzqualifikationen->created) ?></td>
                <td><?= h($stellenHasZusatzqualifikationen->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'StellenHasZusatzqualifikationen', 'action' => 'view', $stellenHasZusatzqualifikationen->stellen_id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'StellenHasZusatzqualifikationen', 'action' => 'edit', $stellenHasZusatzqualifikationen->stellen_id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'StellenHasZusatzqualifikationen', 'action' => 'delete', $stellenHasZusatzqualifikationen->stellen_id], ['confirm' => __('Are you sure you want to delete # {0}?', $stellenHasZusatzqualifikationen->stellen_id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
