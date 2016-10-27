<?php

use Cake\Utility\Hash;

if (isset($existing)) {
    echo $this->Form->input('candidate.candidates_candidate_description_values.' . $number . '.candidate_description_values_id', ['empty' => 'Wenn vorhanden, bitte wählen', 'options' => Hash::combine($candidateDescription->candidate_description_values, '{n}.id', '{n}.name'), 'label' => 'Angabe', 'value' => $existing->candidate_description_values_id]);
    echo $this->Form->input('candidate.candidates_candidate_description_values.' . $number . '.id', ['type' => 'hidden', 'value' => $existing->id]);

    foreach ($candidateDescription->candidate_description_extras as $key => $extra) {
        echo $this->Form->input('candidate.candidates_candidate_description_values.' . $number . '.cans_can_des_values_can_des_extras.' . $key . '.candidate_description_extras_id', ['type' => 'hidden', 'value' => $extra->id]);
        $found = false;
        foreach ($existing->cans_can_des_values_can_des_extras as $existingExtra) {
            if ($existingExtra->candidate_description_extras_id === $extra->id) {
                $found = true;
                echo $this->Form->input('candidate.candidates_candidate_description_values.' . $number . '.cans_can_des_values_can_des_extras.' . $key . '.id', ['type' => 'hidden', 'value' => $existingExtra->id]);

                if ($extra->type === 'bool') {
                    echo $this->Form->input('candidate.candidates_candidate_description_values.' . $number . '.cans_can_des_values_can_des_extras.' . $key . '.value', ['type' => 'checkbox', 'label' => $extra->name, 'value' => $existingExtra->value]);
                } elseif ($extra->type === 'checkbox') {
                    echo $this->Form->input('candidate.candidates_candidate_description_values.' . $number . '.cans_can_des_values_can_des_extras.' . $key . '.value', ['empty' => 'Wenn vorhanden, bitte wählen', 'type' => 'select', 'label' => $extra->name, 'options' => Hash::extract(json_decode($extra->settings), '{n}.value'), 'value' => $existingExtra->value]);
                } elseif ($extra->type === 'text') {
                    echo $this->Form->input('candidate.candidates_candidate_description_values.' . $number . '.cans_can_des_values_can_des_extras.' . $key . '.value', ['label' => $extra->name, 'value' => $existingExtra->value]);
                } elseif ($extra->type === 'date') {
                    echo $this->Form->input('candidate.candidates_candidate_description_values.' . $number . '.cans_can_des_values_can_des_extras.' . $key . '.value', ['label' => $extra->name, 'class' => 'addDatePicker', 'value' => $existingExtra->value]);
                    ?>
                    <script type="text/javascript">
                        $(function () {
                            $('.addDatePicker').datetimepicker({
                                format: 'DD.MM.YYYY'
                            });
                        });
                    </script>
                    <?php
                }
            }
        }
        if (!$found) {
            if ($extra->type === 'bool') {
                echo $this->Form->input('candidate.candidates_candidate_description_values.' . $number . '.cans_can_des_values_can_des_extras.' . $key . '.value', ['type' => 'checkbox', 'label' => $extra->name]);
            } elseif ($extra->type === 'checkbox') {
                echo $this->Form->input('candidate.candidates_candidate_description_values.' . $number . '.cans_can_des_values_can_des_extras.' . $key . '.value', ['empty' => 'Wenn vorhanden, bitte wählen', 'type' => 'select', 'label' => $extra->name, 'options' => Hash::extract(json_decode($extra->settings), '{n}.value')]);
            } elseif ($extra->type === 'text') {
                echo $this->Form->input('candidate.candidates_candidate_description_values.' . $number . '.cans_can_des_values_can_des_extras.' . $key . '.value', ['label' => $extra->name]);
            } elseif ($extra->type === 'date') {
                echo $this->Form->input('candidate.candidates_candidate_description_values.' . $number . '.cans_can_des_values_can_des_extras.' . $key . '.value', ['label' => $extra->name, 'class' => 'addDatePicker']);
                ?>
                <script type="text/javascript">
                    $(function () {
                        $('.addDatePicker').datetimepicker({
                            format: 'DD.MM.YYYY'
                        });
                    });
                </script>
                <?php
            }
        }
    }
} else {
    echo $this->Form->input('candidate.candidates_candidate_description_values.' . $number . '.candidate_description_values_id', ['empty' => 'Wenn vorhanden, bitte wählen', 'options' => Hash::combine($candidateDescription->candidate_description_values, '{n}.id', '{n}.name'), 'label' => 'Angabe']);

    foreach ($candidateDescription->candidate_description_extras as $key => $extra) {
        echo $this->Form->input('candidate.candidates_candidate_description_values.' . $number . '.cans_can_des_values_can_des_extras.' . $key . '.candidate_description_extras_id', ['type' => 'hidden', 'value' => $extra->id]);
        if ($extra->type === 'bool') {
            echo $this->Form->input('candidate.candidates_candidate_description_values.' . $number . '.cans_can_des_values_can_des_extras.' . $key . '.value', ['type' => 'checkbox', 'label' => $extra->name]);
        } elseif ($extra->type === 'checkbox') {
            echo $this->Form->input('candidate.candidates_candidate_description_values.' . $number . '.cans_can_des_values_can_des_extras.' . $key . '.value', ['empty' => 'Wenn vorhanden, bitte wählen', 'type' => 'select', 'label' => $extra->name, 'options' => Hash::extract(json_decode($extra->settings), '{n}.value')]);
        } elseif ($extra->type === 'text') {
            echo $this->Form->input('candidate.candidates_candidate_description_values.' . $number . '.cans_can_des_values_can_des_extras.' . $key . '.value', ['label' => $extra->name]);
        } elseif ($extra->type === 'date') {
            echo $this->Form->input('candidate.candidates_candidate_description_values.' . $number . '.cans_can_des_values_can_des_extras.' . $key . '.value', ['label' => $extra->name, 'class' => 'addDatePicker']);
            ?>
            <script type="text/javascript">
                $(function () {
                    $('.addDatePicker').datetimepicker({
                        format: 'DD.MM.YYYY'
                    });
                });
            </script>
            <?php
        }
    }
}

?>

<span class="hidden counterForCandidateDesciptions" ></span>