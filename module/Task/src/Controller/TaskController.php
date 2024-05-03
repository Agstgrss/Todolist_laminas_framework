<?php

namespace Task\Controller;

use Task\Model\TaskTable;
use Laminas\Mvc\Controller\AbstractActionController;
use Laminas\View\Model\ViewModel;
use Task\Form\TaskForm;
use Task\Model\Task;


class TaskController extends AbstractActionController
{
    private $table;

    public function __construct(TaskTable $table)
    {
        $this->table = $table;
    }
    public function indexAction()
    {
        $mensagem = $this->params()->fromQuery('msg', null);
        
        return new ViewModel([
            'mensagem' => $mensagem,
            'tasks' => $this->table->fetchAll(),
        ]);
    }

    public function addAction()
    {   
        $form = new TaskForm();
        $form->get('submit')->setValue('Add');

        $request = $this->getRequest();

        if (! $request->isPost()) {
            return ['form' => $form];
        }

        $task = new Task();
        $form->setInputFilter($task->getInputFilter());
        $form->setData($request->getPost());

        if (! $form->isValid()) {
            return ['form' => $form];
        }

        $task->exchangeArray($form->getData());

        $teste123 = $this->table->saveTask($task);

        if ($teste123 == 1) {
            
            return [
                'form' => $form,
                'alertMsg' => 'Não é um dia da semana'
            ];  
        }
    
        return $this->redirect()->toRoute('task');
    }
    

    public function editAction()
    {
        $id = (int) $this->params()->fromRoute('id', 0);

        if (0 === $id) {
            return $this->redirect()->toRoute('task', ['action' => 'add']);
        }

        try {
            $task = $this->table->getTask($id);
        } catch (\Exception $e) {
            return $this->redirect()->toRoute('task', ['action' => 'index']);
        }

        $form = new TaskForm();
        $form->bind($task);
        $form->get('submit')->setAttribute('value', 'Edit');

        $request = $this->getRequest();
        $viewData = ['id' => $id, 'form' => $form];

        if (! $request->isPost()) {
            return $viewData;
        }

        $form->setInputFilter($task->getInputFilter());
        $form->setData($request->getPost());

        if (! $form->isValid()) {
            return $viewData;
        }

        try {
            $this->table->saveTask($task);
        } catch (\Exception $e) {
        }

        return $this->redirect()->toRoute('task', ['action' => 'index']);
    }

    public function deleteAction()
    {
        $id = (int) $this->params()->fromRoute('id', 0);
        if (!$id) {
            return $this->redirect()->toRoute('task');
        }

        $request = $this->getRequest();
        if ($request->isPost()) {
            $del = $request->getPost('del', 'No');

            if ($del == 'Yes') {
                $id = (int) $request->getPost('id');
                $this->table->deleteTask($id);
            }
            return $this->redirect()->toRoute('task');
        }

        return [
            'id'    => $id,
            'task' => $this->table->getTask($id),
        ];
    }

    public function statusAction()
    {
        $id = (int) $this->params()->fromRoute('id', 0);
        if (!$id) {
            return $this->redirect()->toRoute('task');
        }
    
        $task = $this->table->getTask($id);
        if (!$task) {
            return $this->redirect()->toRoute('task'); // Redireciona se a tarefa não existir
        }
    
        switch ($task->statuss) {
            case 'Pending':
                $task->statuss = 'In progress';
                break;
            case 'In progress':
                $task->statuss = 'Finished';
                break;
            case 'Finished':
                $task->statuss = 'Pending';
                break;
            default:
                $task->statuss = 'Pending'; 
                break;
        }
    
        $this->table->saveTask($task); // Salva a tarefa com o novo status
    
        return $this->redirect()->toRoute('task');
    }



}