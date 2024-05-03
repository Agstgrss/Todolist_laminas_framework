<?php

namespace Task\Form;

use Laminas\Form\Element\Hidden;
use Laminas\Form\Element\Select;
use Laminas\Form\Element\Submit;
use Laminas\Form\Element\Text;
use Laminas\Form\Form;

class TaskForm extends Form
{
    public function __construct($name = null)
    {
        // We will ignore the name provided to the constructor
        parent::__construct('task');

        $this->add([
            'name' => 'id',
            'type' => Hidden::class,
        ]);
        $this->add([
            'name' => 'title',
            'type' => Text::class,
            'options' => [
                'label' => 'Title',
            ],
        ]);
        $this->add([
            'name' => 'descriptionn',
            'type' => Text::class,
            'options' => [
                'label' => 'Description',
            ],
        ]);
        $this->add([
            'name' => 'creation_date',
            'type' => Text::class,
            'options' => [
                'label' => 'Creation_date',
            ],
        ]);
        $this->add([
            'name' => 'statuss',
            'type' => Select::class,
            'options' => [
                'label' => 'Status',
                'value_options' => [
                    'Pending' => 'Pending',
                    'In Progress' => 'In Progress',
                    'Finished' => 'Finished',
                ],
            ],
        ]);
        $this->add([
            'name' => 'submit',
            'type' => Submit::class,
            'attributes' => [
                'value' => 'Go',
                'id'    => 'submitbutton',
            ],
        ]);
    }
}