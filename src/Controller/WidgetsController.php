<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Widgets Controller
 *
 * @property \App\Model\Table\WidgetsTable $Widgets
 *
 * @method \App\Model\Entity\Widget[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class WidgetsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $widgets = $this->paginate($this->Widgets);

        $this->set(compact('widgets'));
    }

    /**
     * View method
     *
     * @param string|null $id Widget id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $widget = $this->Widgets->get($id, [
            'contain' => []
        ]);

        $this->set('widget', $widget);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $widget = $this->Widgets->newEntity();
        if ($this->request->is('post')) {
            $widget = $this->Widgets->patchEntity($widget, $this->request->getData());
            if ($this->Widgets->save($widget)) {
                $this->Flash->success(__('The widget has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The widget could not be saved. Please, try again.'));
        }
        $this->set(compact('widget'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Widget id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $widget = $this->Widgets->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $widget = $this->Widgets->patchEntity($widget, $this->request->getData());
            if ($this->Widgets->save($widget)) {
                $this->Flash->success(__('The widget has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The widget could not be saved. Please, try again.'));
        }
        $this->set(compact('widget'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Widget id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $widget = $this->Widgets->get($id);
        if ($this->Widgets->delete($widget)) {
            $this->Flash->success(__('The widget has been deleted.'));
        } else {
            $this->Flash->error(__('The widget could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
