<?php
use Migrations\AbstractMigration;

class AttachemntsTypo extends AbstractMigration
{

    public function up()
    {

        $this->table('attachments')
            ->removeColumn('foregn_key')
            ->update();

        $this->table('attachments')
            ->addColumn('foreign_key', 'integer', [
                'default' => null,
                'length' => 11,
                'null' => false,
            ])
            ->update();
    }

    public function down()
    {

        $this->table('attachments')
            ->addColumn('foregn_key', 'integer', [
                'default' => null,
                'length' => 11,
                'null' => false,
            ])
            ->removeColumn('foreign_key')
            ->update();
    }
}

