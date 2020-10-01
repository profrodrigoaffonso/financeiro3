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

    public function login()
    {

        if ($this->request->is('post')) {
            $this->loadModel('Users');
            $dados = $this->request->getData();
            $user = $this->Users->find()
                ->where([
                    'login' => $dados['login'],
                    'password' => md5($dados['password'])
                ])
                ->first();
            
            if($user){
                $session = $this->request->getSession();
                $session->write('user', $user);

                return $this->redirect(['controller' => 'payments', 'action' => 'index']);

            }
        }

    }

    public function logout()
    {
        $session = $this->request->getSession();
        $session->delete('user');

        return $this->redirect(['action' => 'login']);

    }
}