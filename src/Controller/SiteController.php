<?php
namespace App\Controller;

use App\Controller\AppController;

class SiteController extends AppController
{

    public function index()
    {

    }

    public function inserir()
    {
        $this->loadModel('Payments');
        $payment = $this->Payments->newEmptyEntity();
        if ($this->request->is('post')) {
            $payment = $this->Payments->patchEntity($payment, $this->request->getData());
            $payment->value = str_replace(',', '.', $payment->value);
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

    public function saques(){
        $this->loadModel('Withdrawals');
        $withdrawal = $this->Withdrawals->newEmptyEntity();
        if ($this->request->is('post')) {
            $dados = $this->request->getData();
            $dados['value'] = str_replace(',', '.', $dados['value']);
            $withdrawal = $this->Withdrawals->patchEntity($withdrawal, $dados);
            if ($this->Withdrawals->save($withdrawal)) {
                $this->Flash->success(__('The withdrawal has been saved.'));

                return $this->redirect(['action' => 'saques']);
            }
            $this->Flash->error(__('The withdrawal could not be saved. Please, try again.'));
        }
        $banks = $this->Withdrawals->Banks->find('list', ['limit' => 200]);
        $this->set(compact('withdrawal', 'banks'));
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

                return $this->redirect(['controller' => 'site', 'action' => 'painel']);

            }
        }

    }

    public function logout()
    {
        $session = $this->request->getSession();
        $session->delete('user');

        return $this->redirect(['action' => 'login']);

    }

    public function painel()
    {

    }
}