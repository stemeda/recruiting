<?php
namespace App\Model\Filter;

use Cake\I18n\Time;
use Search\Model\Filter\Base;

class Option extends Base
{

    /**
     * Default configuration.
     *
     * @var array
     */
    protected $_defaultConfig = [
        'values' => [],
    ];


    /**
     * Process a comparison-based condition (e.g. column BETWEEN Date1 AND Date2).
     *
     * @return void
     */
    public function process()
    {
        if ($this->skip()) {
            return;
        }

        foreach ($this->fields() as $field) {
            $this->query()->andWhere([$field . ' IN ' => $this->value()]);
        }
    }
}
