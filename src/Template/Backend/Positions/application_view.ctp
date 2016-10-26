<?= debug($application) ?>
<h1>Der Bewerber</h1>
<table class="table">
    <tr>
        <td>Name</td>
        <td><?= $application['candidate']->user->firstname ?> <?= $application['candidate']->user->surname ?></td>
    </tr>
    <tr>
        <td>E-Mail</td>
        <td><?= $application['candidate']->user->email ?></td>
    </tr>
    <tr>
        <td>Straße</td>
        <td><?= $application['candidate']->street ?></td>
    </tr>
    <tr>
        <td>Ort</td>
        <td><?= $application['candidate']->zip ?> <?= $application['candidate']->city ?></td>
    </tr>
    <tr>
        <td>Mobil:</td>
        <td><?= $application['candidate']->mobil ?></td>
    </tr>
    <tr>
        <td>Festnetz:</td>
        <td><?= $application['candidate']->phone ?></td>
    </tr>
    <tr>
        <td>Früheste Einstellung am:</td>
        <td><?= $application->earliest_start ?></td>
    </tr>
    <tr>
        <td>Gehaltsforderung:</td>
        <td><?= $application->minimal_pay ?></td>
    </tr>
    <tr>
        <td>Bewerbungsstatus:</td>
        <td><?= $application->application_status->name ?> (Die Bewerbung ist <?= $application->application_status->closes_application ? 'geschlossen' : 'offen' ?>)</td>
    </tr>
</table>
<h1>Bewerberbeschreibungen</h1>
<table class="table">
    <?php foreach ($application->candidate->candidates_candidate_description_values as $description): ?>
        <tr>
            <td><?= $description->candidate_description_value->candidate_description->name ?></td>
            <td><?= $description->candidate_description_value->name ?></td>
            <td>
                <dl class="dl-horizontal">
                        <?php foreach ($description->cans_can_des_values_can_des_extras as $extra): ?>
                        <dt><?=$extra->candidate_description_extra->name?></dt>
                        <dd>
                            <?php
                            switch ($extra->candidate_description_extra->type) {
                                case 'date':
                                    echo $extra->value;
                                    break;
                                default:
                                    break;
                            }

                            ?>
                        </dd>
                    <?php endforeach; ?>
                </dl>
            </td>
        </tr>
    <?php endforeach; ?>
</table>
<h1>Stellenbeschreibungen</h1>
<table class="table">
    <?php foreach ($application->applications_position_description_values as $description): ?>
        <tr>
            <td><?= $description->position_description_value->position_description->name ?></td>
            <td><?= $description->position_description_value->name ?></td>
            <td>
                <dl class="dl-horizontal">
                        <?php foreach ($description->appls_pos_des_values_pos_des_extras as $extra): ?>
                        <dt><?=$extra->position_description_extra->name?></dt>
                        <dd>
                            <?php
                            switch ($extra->position_description_extra->type) {
                                case 'date':
                                    echo $extra->value;
                                    break;
                                default:
                                    break;
                            }

                            ?>
                        </dd>
                    <?php endforeach; ?>
                </dl>
            </td>
        </tr>
    <?php endforeach; ?>
</table>