<?php
namespace App\Form;

use Cake\Form\Form;
use Cake\Form\Schema;
use Cake\Validation\Validator;
use Cake\Core\Configure;

class SettingsForm extends Form
{

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

    protected function _buildValidator(Validator $validator)
    {
        return $validator;
    }

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
        
        return Configure::dump('settings', 'default', ['settings']);;
    }
}
