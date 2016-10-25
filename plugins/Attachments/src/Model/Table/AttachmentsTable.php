<?php

/**
 * TechniSat MES : Production and Reparation System of TechniSat (http://technisat.de)
 * Copyright (c) TechniSat Digital GmbH, Daun (Germany)
 *
 *
 * @copyright Copyright (c) TechniSat Digital GmbH, Daun (Germany)
 * @link      https://mes.intranet.daun MES
 * @since     0.1.0
 * @license   proprietary
 * @package MES
 */

namespace Attachments\Model\Table;

use Attachments\Model\Entity\Attachment;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Attachments Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Users
 */
class AttachmentsTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->table('attachments');
        $this->displayField('name');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
                ->add('id', 'valid', ['rule' => 'uuid'])
                ->allowEmpty('id', 'create');

        $validator
                ->requirePresence('name', 'create')
                ->notEmpty('name');

        $validator
            ->requirePresence('type', 'create')
            ->notEmpty('type')
            ->add(
                'type',
                'custom',
                [
                    'rule' => function ($value, $context) {
                        $allowedTypes = [
                            'image/gif', //.gif
                            'image/jpeg', //.jpg .jpeg
                            'image/png', //.png
                            'image/bmp', //.bmp
                            'application/pdf', //.pdf
                            'application/msword', //.doc
                            'application/vnd.openxmlformats-officedocument.wordprocessingml.document', //.docx
                            'application/excel', //.xls
                            'application/vnd.ms-excel', //.xls
                            'application/x-excel', //.xls
                            'application/x-msexcel', //.xls
                            'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet', //.xlsx
                            'video/mp4', //.mp4
                            'audio/x-ms-wmv', //.wmv
                            'video/quicktime', //.mov
                            'audio/mpeg3', //.mp3
                            'audio/x-mpeg-3', //.mp3
                            'application/x-troff-msvideo', //.avi
                            'video/avi', //.avi
                            'video/msvideo', //.avi
                            'video/x-msvideo', //.avi
                            'text/plain', //.txt
                            'text/html', //.html .htm .htmls
                        ];

                        return in_array($value, $allowedTypes);
                    },
                    'message' => 'File type not allowed!'
                ]
            );

        $validator
                ->add('size', 'valid', ['rule' => 'numeric'])
                ->requirePresence('size', 'create')
                ->notEmpty('size');

        $validator
                ->add('error', 'valid', ['rule' => 'numeric']);

        $validator
            ->requirePresence('tmp_name', 'create')
            ->add(
                'tmp_name',
                'custom',
                [
                    'rule' => function ($value, $context) {
                        $tempPath = strtolower(sys_get_temp_dir());
                        $value = strtolower($value);

                        return (substr($value, 0, strlen($tempPath)) === $tempPath);
                    },
                    'message' => 'Internal Server Error!'
                ]
            );

        $validator
            ->add(
                'error',
                'custom',
                [
                    'rule' => function ($value, $context) {
                        return ($value == 0);
                    },
                    'message' => 'Error while uploading File!'
                ]
            );

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        return $rules;
    }
}
