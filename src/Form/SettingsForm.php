<?php
namespace App\Form;

use Cake\Core\Configure;
use Cake\Form\Form;
use Cake\Form\Schema;
use Cake\Validation\Validator;

class SettingsForm extends Form
{

    /**
     * A hook method intended to be implemented by subclasses.
     *
     * You can use this method to define the schema using
     * the methods on Cake\Form\Schema, or loads a pre-defined
     * schema from a concrete class.
     *
     * @param \Cake\Form\Schema $schema The schema to customize.
     * @return \Cake\Form\Schema The schema to use.
     */
    protected function _buildSchema(Schema $schema)
    {
        return $schema->addField('author', 'string')
            ->addField('title', ['type' => 'string'])
            ->addField('image', ['type' => 'string'])
            ->addField('description', ['type' => 'text'])
            ->addField('copyright', ['type' => 'text'])
            ->addField('position', ['type' => 'string'])
            ->addField('region', ['type' => 'string'])
            ->addField('placename', ['type' => 'string'])
            ->addField('datasecurity', ['type' => 'text']);
    }

    /**
     * A hook method intended to be implemented by subclasses.
     *
     * You can use this method to define the validator using
     * the methods on Cake\Validation\Validator or loads a pre-defined
     * validator from a concrete class.
     *
     * @param \Cake\Validation\Validator $validator The validator to customize.
     * @return \Cake\Validation\Validator The validator to use.
     */
    protected function _buildValidator(Validator $validator)
    {
        return $validator;
    }

    /**
     * Hook method to be implemented in subclasses.
     *
     * Used by `execute()` to execute the form's action.
     *
     * @param array $data Form data.
     * @return bool
     */
    protected function _execute(array $data)
    {
        Configure::write('settings.seo.author', $data['author']);
        Configure::write('settings.seo.title', $data['title']);
        Configure::write('settings.seo.image', $data['image']);
        Configure::write('settings.seo.description', $data['description']);
        Configure::write('settings.seo.copyright', $data['copyright']);
        Configure::write('settings.seo.geo.position', $data['position']);
        Configure::write('settings.seo.geo.region', $data['region']);
        Configure::write('settings.seo.geo.placename', $data['placename']);
        Configure::write('settings.datasecurity', $data['datasecurity']);

        return Configure::dump('settings', 'default', ['settings']);
    }
}
