<?php
namespace App\Shell;

use App\Model\Entity\Application;
use App\Model\Entity\Position;
use Cake\Console\Shell;
use Cake\Mailer\Email;
use Cake\ORM\TableRegistry;

/**
 * Cancellation shell command.
 */
class CancellationShell extends Shell
{

    /**
     * Manage the available sub-commands along with their arguments and help
     *
     * @see http://book.cakephp.org/3.0/en/console-and-shells.html#configuring-options-and-generating-help
     *
     * @return \Cake\Console\ConsoleOptionParser
     */
    public function getOptionParser()
    {
        $parser = parent::getOptionParser();

        return $parser;
    }

    /**
     * main() method.
     *
     * @return bool|int|void Success or error code.
     */
    public function main()
    {
        $applications = TableRegistry::get('Applications')
            ->find('all')
            ->contain('ApplicationsPositionDescriptionValues')
            ->contain('ApplicationStatus')
            ->contain('Candidates.CandidatesCandidateDescriptionValues')
            ->contain('Candidates.Users')
            ->where([
                'ApplicationStatus.closes_application' => false
            ]);

        $valuesNotAllNeestedSet = [];
        foreach ($applications as $applicationKey => $application) {
            $result = $this->_calculateApplicationValue($application);
            if (!$result['allNeededSet']) {
                $valuesNotAllNeestedSet[$applicationKey] = $result;
            }
        }
        foreach ($valuesNotAllNeestedSet as $cancelApplication) {
            $data = [
                'application_status_id' => 2,
            ];
            $application = TableRegistry::get('Applications')->patchEntity($cancelApplication['application'], $data);

            if (!TableRegistry::get('Applications')->save($application)) {
                $this->err('Application #' . $application->id . ' could not be canceled!');
            } else {
                $email = new Email();
                $t = $email->template('cancel', 'default')
                    ->emailFormat('both')
                    ->to($application->candidate->user->email)
                    ->subject('Absage Bewerbung')
                    ->send();
            }
        }
    }

    /**
     * calculate the value of an application out of the position.
     * returns the main Information of the position and the value
     *
     * @param Application $application the application
     * @return array
     */
    protected function _calculateApplicationValue(Application $application)
    {
        $position = TableRegistry::get('Positions')->get(
            $application->positions_id,
            [
                'contain' => [
                    'PositionsPositionDescriptionValues',
                    'PositionsCandidateDescriptionValues',
                    ]
            ]
        );
        $result = [
            'value' => 0,
            'application' => $application,
            'position' => $position,
            'allNeededSet' => true,
        ];
        foreach ($position->positions_candidate_description_values as $key => $positionsCandidateDescriptionValue) {
            $candidatesCandidateDescriptionValues = $application->candidate->candidates_candidate_description_values;
            $found = false;
            foreach ($candidatesCandidateDescriptionValues as $candidatesCandidateDescriptionValue) {
                if ($candidatesCandidateDescriptionValue->candidate_description_values_id === $positionsCandidateDescriptionValue->candidate_description_values_id) {
                    $found = true;
                    $result['value'] += $positionsCandidateDescriptionValue->importance;
                }
                if (!$found && $positionsCandidateDescriptionValue->needed) {
                    $result['allNeededSet'] = false;
                }
            }
        }
        foreach ($position->positions_position_description_values as $key => $positionsPositionDescriptionValues) {
            $applicationPositionDescriptionValues = $application->applications_position_description_values;
            $found = false;
            foreach ($applicationPositionDescriptionValues as $applicationPositionDescriptionValue) {
                if ($applicationPositionDescriptionValue->positions_description_values_id === $positionsPositionDescriptionValues->positions_description_values_id) {
                    $found = true;
                    $result['value'] += $positionsPositionDescriptionValues->importance;
                }
                if (!$found && $positionsPositionDescriptionValues->needed) {
                    $result['allNeededSet'] = false;
                }
            }
        }

        return $result;
    }
}
