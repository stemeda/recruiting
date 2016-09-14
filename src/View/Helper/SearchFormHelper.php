<?php

namespace App\View\Helper;

use Cake\Network\Exception\InternalErrorException;
use Cake\ORM\TableRegistry;
use Cake\Utility\Hash;
use Cake\View\Helper;
use Cake\View\StringTemplateTrait;

/**
 * SearchForm helper
 */
class SearchFormHelper extends Helper
{

    use StringTemplateTrait;

    /**
     * Default Config
     *
     * @var array
     */
    protected $_defaultConfig = [
        'formOptions' => [],
        'formNumberOfColumns' => 2,
        'includeJavascript' => true,
        'templates' => [
            'containerStart' => '<div{{attrs}}>',
            'containerEnd' => '</div>',
            'toggleButton' => '<a{{attrs}}><i class="fa fa-plus"></i></a>',
            'header' => '<div class="panel-heading">{{title}}<div class="pull-right">{{toggleButton}}</div></div>',
            'contentStart' => '<div{{attrs}}>',
            'contentEnd' => '</div>',
            'buttons' => '<div class="submit-group">{{buttons}}</div>'
        ],
        'containerClasses' => 'panel panel-default list-filter',
        'contentClasses' => 'panel-body',
        'toggleButtonClasses' => 'btn btn-xs toggle-btn',
        'title' => 'Filter',
        'filterButtonOptions' => [
            'div' => false,
            'class' => 'btn btn-xs btn-primary'
        ]
    ];

    /**
     * Other helpers used by SearchFormHelper
     *
     * @var array
     */
    public $helpers = ['Html', 'Form'];

    /**
     * the search configuration
     */
    protected $_searchConfig;

    /**
     * Output a complete search form, based on the search configurations set up
     * in the specified table
     *
     * @param string $model The Table to load
     * @return null|string An formatted FORM with inputs.
     */
    public function form($model)
    {
        if (!in_array($this->config('formNumberOfColumns'), [1, 2, 3, 4, 6, 12])) {
            $message = 'The option "formNumberOfColumns" is only allowed to be set to 1, 2, 3, 4, 6 or 12. Current value is ' . $this->config('formNumberOfColumns');
            throw new InternalErrorException($message);
        }
        $table = TableRegistry::get($model);

        // make sure the table has the behavior and has implemented the searchConfiguration method
        if (!$table->behaviors()->has('Search')) {
            return null;
        }
        $this->_searchConfig = $table->searchManager()->all();

        $filterBox = $this->openContainer();
        $filterBox .= $this->openForm();
        $filterBox .= $this->renderAll();
        $filterBox .= $this->closeForm();
        $filterBox .= $this->closeContainer();

        return $filterBox;
    }

    /**
     * Opens the HTML container
     *
     * @return HTML
     */
    public function openContainer()
    {
        $classes = $this->config('containerClasses');

        if ($this->filterActive()) {
            $classes .= ' opened';
        } else {
            $classes .= ' closed';
        }

        $ret = $this->templater()->format(
            'containerStart',
            [
                'attrs' => $this->templater()->formatAttributes(['class' => $classes])
            ]
        );
        $ret .= $this->header();
        $ret .= $this->templater()->format(
            'contentStart',
            [
                'attrs' => $this->templater()->formatAttributes(
                    [
                        'class' => $this->config('contentClasses')
                    ]
                )
            ]
        );

        return $ret;
    }

    /**
     * Opens the listfilter form
     *
     * @return string
     */
    public function openForm()
    {
        $options = Hash::merge(['url' => $this->here], $this->config('formOptions'));
        $ret = $this->Form->create('Filter', $options);

        return $ret;
    }

    /**
     * Render all filter widgets
     *
     * @return string
     */
    public function renderAll()
    {
        $fields = [];
        foreach ($this->_searchConfig as $object) {
            $config = $object->config();
            $fields[$config['name']] = $config;
            $fields[$config['name']]['className'] = get_class($object);
        }
        $ret = '<div class="row">';
        $m = 0;
        foreach ($fields as $field) {
            $ret .= '<div class="col-md-' . (12 / $this->config('formNumberOfColumns')) . '">';
            switch ($field['className']) {
                case 'Search\Model\Filter\Value':
                case 'Search\Model\Filter\Like':
                    $ret .= $this->Form->input($field['name'], ['type' => 'text']);
                    break;
                case 'Search\Model\Filter\Boolean':
                    $ret .= $this->Form->input($field['name'], ['options' => [null =>__('both'), 1 => __('yes'), 0 => __('no')], 'type' => 'select']);
                    break;
                case 'App\Model\Filter\Between':
                    $ret .= $this->Form->input($field['name'], ['type' => 'text', 'class' => 'dateRangePicker']);
                    break;
                case 'App\Model\Filter\Option':
                    $ret .= $this->Form->input($field['name'], ['options' => $field['values'], 'class' => 'optionPicker', 'multiple' => 'multiple', 'type' => 'select']);
                    break;
                default:
                    //throw new InternalErrorException(printf("The given Class %s can not be renderet", $field['className']));
            }

            $ret .= '</div>';
            if (($m + 1) % $this->config('formNumberOfColumns') === 0) {
                $ret .= '</div><div class="row">';
            }
            $m++;
        }
        $ret .= '</div>';

        return $ret;
    }

    /**
     * Determines if any ListFilter parameters are set
     *
     * @return bool
     */
    public function filterActive()
    {
        $filterActive = (isset($this->_View->viewVars['filterActive']) && $this->_View->viewVars['filterActive'] === true);

        return $filterActive;
    }

    /**
     * Renders the header containing title and toggleButton
     *
     * @return string
     */
    public function header()
    {
        return $this->templater()->format(
            'header',
            [
                    'title' => $this->config('title'),
                    'toggleButton' => $this->toggleButton(),
            ]
        );
    }

    /**
     * Renders the button for toggling the filter box
     *
     * @return string HTML
     */
    public function toggleButton()
    {
        return $this->templater()->format(
            'toggleButton',
            [
                    'attrs' => $this->templater()->formatAttributes(
                        [
                            'class' => $this->config('toggleButtonClasses')
                        ]
                    )
            ]
        );
    }

    /**
     * Closes the listfilter form
     *
     * @param bool $includeFilterButton add the search button
     * @return string
     */
    public function closeForm($includeFilterButton = true)
    {
        $buttons = '';
        if ($includeFilterButton) {
            $buttons .= $this->filterButton();
        }
        $ret = $this->templater()->format('buttons', ['buttons' => $buttons]);
        $ret .= $this->Form->end();

        return $ret;
    }

    /**
     * Outputs the search button
     *
     * @param string $title button caption
     * @param arrray $options some options
     * @return string
     */
    public function filterButton($title = null, array $options = [])
    {
        if (!$title) {
            $title = 'Filter';
        }
        $options = Hash::merge($this->config('filterButtonOptions'), $options);

        return $this->Form->button($title, $options);
    }

    /**
     * Closes the HTML container
     *
     * @return string
     */
    public function closeContainer()
    {
        $ret = $this->templater()->format('contentEnd', []);
        $ret .= $this->templater()->format('containerEnd', []);

        return $ret;
    }
}
