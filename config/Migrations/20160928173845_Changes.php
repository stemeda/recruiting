<?php
use Migrations\AbstractMigration;

class Changes extends AbstractMigration
{

    public function up()
    {

        $this->table('applications_position_description_values')
            ->removeColumn('extra_field_value')
            ->update();

        $this->table('candidates_candidate_description_values')
            ->removeColumn('extra_field_value')
            ->update();

        $this->table('appls_pos_des_values_pos_des_extras')
            ->addColumn('applications_position_description_values_id', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addColumn('position_description_extras_id', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addColumn('value', 'string', [
                'default' => null,
                'limit' => 255,
                'null' => false,
            ])
            ->addColumn('created', 'datetime', [
                'default' => null,
                'limit' => null,
                'null' => false,
            ])
            ->addColumn('modified', 'datetime', [
                'default' => null,
                'limit' => null,
                'null' => false,
            ])
            ->addIndex(
                [
                    'applications_position_description_values_id',
                ]
            )
            ->addIndex(
                [
                    'position_description_extras_id',
                ]
            )
            ->create();

        $this->table('cans_can_des_values_can_des_extras')
            ->addColumn('candidates_candidate_description_values_id', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addColumn('candidate_description_extras_id', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addColumn('value', 'string', [
                'default' => null,
                'limit' => 255,
                'null' => false,
            ])
            ->addColumn('created', 'datetime', [
                'default' => null,
                'limit' => null,
                'null' => false,
            ])
            ->addColumn('modified', 'datetime', [
                'default' => null,
                'limit' => null,
                'null' => false,
            ])
            ->addIndex(
                [
                    'candidate_description_extras_id',
                ]
            )
            ->addIndex(
                [
                    'candidates_candidate_description_values_id',
                ]
            )
            ->create();

        $this->table('appls_pos_des_values_pos_des_extras')
            ->addForeignKey(
                'applications_position_description_values_id',
                'applications_position_description_values',
                'id',
                [
                    'update' => 'NO_ACTION',
                    'delete' => 'NO_ACTION'
                ]
            )
            ->addForeignKey(
                'position_description_extras_id',
                'position_description_extras',
                'id',
                [
                    'update' => 'NO_ACTION',
                    'delete' => 'NO_ACTION'
                ]
            )
            ->update();

        $this->table('cans_can_des_values_can_des_extras')
            ->addForeignKey(
                'candidate_description_extras_id',
                'candidate_description_extras',
                'id',
                [
                    'update' => 'NO_ACTION',
                    'delete' => 'NO_ACTION'
                ]
            )
            ->addForeignKey(
                'candidates_candidate_description_values_id',
                'candidates_candidate_description_values',
                'id',
                [
                    'update' => 'NO_ACTION',
                    'delete' => 'NO_ACTION'
                ]
            )
            ->update();
    }

    public function down()
    {
        $this->table('appls_pos_des_values_pos_des_extras')
            ->dropForeignKey(
                'applications_position_description_values_id'
            )
            ->dropForeignKey(
                'position_description_extras_id'
            );

        $this->table('cans_can_des_values_can_des_extras')
            ->dropForeignKey(
                'candidate_description_extras_id'
            )
            ->dropForeignKey(
                'candidates_candidate_description_values_id'
            );

        $this->table('applications_position_description_values')
            ->addColumn('extra_field_value', 'string', [
                'default' => null,
                'length' => 255,
                'null' => true,
            ])
            ->update();

        $this->table('candidates_candidate_description_values')
            ->addColumn('extra_field_value', 'string', [
                'default' => null,
                'length' => 255,
                'null' => true,
            ])
            ->update();

        $this->dropTable('appls_pos_des_values_pos_des_extras');

        $this->dropTable('cans_can_des_values_can_des_extras');
    }
}

