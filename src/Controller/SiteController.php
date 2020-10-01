<?php
namespace App\Controller;

use App\Controller\AppController;

class SiteController extends AppController
{

    public function inserir()
    {
        $this->loadModel('Payments');
        $payment = $this->Payments->newEmptyEntity();
        if ($this->request->is('post')) {
            $payment = $this->Payments->patchEntity($payment, $this->request->getData());
            if ($this->Payments->save($payment)) {
                $this->Flash->success(__('The payment has been saved.'));

                return $this->redirect(['action' => 'inserir']);
            }
            $this->Flash->error(__('The payment could not be saved. Please, try again.'));
        }
        $categories = $this->Payments->Categories->find('list', ['limit' => 200]);
        $formPayments = $this->Payments->FormPayments->find('list', ['limit' => 200]);
        $this->set(compact('payment', 'categories', 'formPayments'));
    }
}