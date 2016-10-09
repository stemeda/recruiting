<?php
use Migrations\AbstractMigration;

class RenameColumn extends AbstractMigration
{

    public function up()
    {

        $this->table('positions')
            ->removeColumn('awaibale_until')
            ->update();

        $this->table('positions')
            ->addColumn('awailable_until', 'datetime', [
                'default' => null,
                'length' => null,
                'null' => false,
            ])
            ->update();
    }

    public function down()
    {

        $this->table('positions')
            ->addColumn('awaibale_until', 'datetime', [
                'default' => null,
                'length' => null,
                'null' => false,
            ])
            ->removeColumn('awailable_until')
            ->update();
    }
}

