<?php
namespace App\Model\Filter;

use Cake\I18n\Time;
use Search\Model\Filter\Base;

class Between extends Base
{
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

        list($start, $end) = explode(' - ', $this->value());
        $startdate = new Time($start);
        $enddate = new Time($end);
        $enddate->addDay();

        foreach ($this->fields() as $field) {
            $this->query()->andWhere(function ($exp, $q) use ($field, $startdate, $enddate) {
                 return $exp->between($field, $startdate, $enddate);
            });
        }
    }
}
