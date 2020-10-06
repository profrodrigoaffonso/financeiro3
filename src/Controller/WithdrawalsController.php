<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Withdrawals Controller
 *
 * @property \App\Model\Table\WithdrawalsTable $Withdrawals
 * @method \App\Model\Entity\Withdrawal[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class WithdrawalsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Banks'],
        ];
        $withdrawals = $this->paginate($this->Withdrawals);

        $this->set(compact('withdrawals'));
    }

    /**
     * View method
     *
     * @param string|null $id Withdrawal id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $withdrawal = $this->Withdrawals->get($id, [
            'contain' => ['Banks'],
        ]);

        $this->set(compact('withdrawal'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $withdrawal = $this->Withdrawals->newEmptyEntity();
        if ($this->request->is('post')) {
            $withdrawal = $this->Withdrawals->patchEntity($withdrawal, $this->request->getData());
            if ($this->Withdrawals->save($withdrawal)) {
                $this->Flash->success(__('The withdrawal has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The withdrawal could not be saved. Please, try again.'));
        }
        $banks = $this->Withdrawals->Banks->find('list', ['limit' => 200]);
        $this->set(compact('withdrawal', 'banks'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Withdrawal id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $withdrawal = $this->Withdrawals->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $withdrawal = $this->Withdrawals->patchEntity($withdrawal, $this->request->getData());
            if ($this->Withdrawals->save($withdrawal)) {
                $this->Flash->success(__('The withdrawal has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The withdrawal could not be saved. Please, try again.'));
        }
        $banks = $this->Withdrawals->Banks->find('list', ['limit' => 200]);
        $this->set(compact('withdrawal', 'banks'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Withdrawal id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $withdrawal = $this->Withdrawals->get($id);
        if ($this->Withdrawals->delete($withdrawal)) {
            $this->Flash->success(__('The withdrawal has been deleted.'));
        } else {
            $this->Flash->error(__('The withdrawal could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
