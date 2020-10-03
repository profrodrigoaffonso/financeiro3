<?php
declare(strict_types=1);

namespace App\Controller;

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

use Dompdf\Dompdf;
use Dompdf\Options;

/**
 * Payments Controller
 *
 * @property \App\Model\Table\PaymentsTable $Payments
 * @method \App\Model\Entity\Payment[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class PaymentsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Categories', 'FormPayments'],
        ];
        $payments = $this->paginate($this->Payments);

        $this->set(compact('payments'));
    }

    /**
     * View method
     *
     * @param string|null $id Payment id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $payment = $this->Payments->get($id, [
            'contain' => ['Categories', 'FormPayments'],
        ]);

        $this->set(compact('payment'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $payment = $this->Payments->newEmptyEntity();
        if ($this->request->is('post')) {
            $payment = $this->Payments->patchEntity($payment, $this->request->getData());
            if ($this->Payments->save($payment)) {
                $this->Flash->success(__('The payment has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The payment could not be saved. Please, try again.'));
        }
        $categories = $this->Payments->Categories->find('list', ['limit' => 200]);
        $formPayments = $this->Payments->FormPayments->find('list', ['limit' => 200]);
        $this->set(compact('payment', 'categories', 'formPayments'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Payment id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $payment = $this->Payments->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $payment = $this->Payments->patchEntity($payment, $this->request->getData());
            if ($this->Payments->save($payment)) {
                $this->Flash->success(__('The payment has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The payment could not be saved. Please, try again.'));
        }
        $categories = $this->Payments->Categories->find('list', ['limit' => 200]);
        $formPayments = $this->Payments->FormPayments->find('list', ['limit' => 200]);
        $this->set(compact('payment', 'categories', 'formPayments'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Payment id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $payment = $this->Payments->get($id);
        if ($this->Payments->delete($payment)) {
            $this->Flash->success(__('The payment has been deleted.'));
        } else {
            $this->Flash->error(__('The payment could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function export()
    {

        $meses = [
            1 => "Janeiro",
            2 => "Feveiro",
            3 => "Março",
            4 => "Abril",
            5 => "Maio",
            6 => "Junho",
            7 => "Julho",
            8 => "Agosto",
            9 => "Setembro",
            10 => "Outubro",
            11 => "Novembro",
            12 => "Dezembro",
        ];

        $anos = [
            date('Y') - 1 => date('Y') - 1,
            date('Y') => date('Y')
        ];

        if($this->request->is('post')){
            $spreadsheet = new Spreadsheet();
            $sheet = $spreadsheet->getActiveSheet();

            $dados = $this->request->getData();

            $sheet->setCellValueByColumnAndRow(1, 1, "Categoria");
            $sheet->setCellValueByColumnAndRow(2, 1, "Valor");
            $sheet->setCellValueByColumnAndRow(3, 1, "Forma de pagamento");
            $sheet->setCellValueByColumnAndRow(4, 1, "Data");
            $sheet->setCellValueByColumnAndRow(5, 1, "Hora");
            $sheet->setCellValueByColumnAndRow(6, 1, "Obs");

            $payments = $this->Payments->find()
                ->contain(["Categories","FormPayments"])
                ->where([
                    'MONTH(date_time)' => $dados['mes'],
                    'YEAR(date_time)' => $dados['ano'],
                ])
                ->order([
                    "Categories.name"=>"ASC",
                    "Payments.date_time"=>"ASC"
                ]);

            $i = 2;

            $cat_ant = 1;
            $nome_ant = "";

            foreach ($payments as $key => $payment) {
                // echo($payment->date_time);die;
                //debug($payment->category->name);
                //echo $payment->category->name;
                if($cat_ant != $payment->category->id){
                    $sheet->setCellValueByColumnAndRow(1, $i, $nome_ant);
                    $i++;
                }

                $sheet->setCellValueByColumnAndRow(1, $i, $payment->category->name);
                $sheet->setCellValueByColumnAndRow(2, $i, $payment->value);
                $sheet->setCellValueByColumnAndRow(3, $i, $payment->form_payment->name);
                $sheet->setCellValueByColumnAndRow(4, $i, date('d/m/Y', strtotime(h($payment->date_time))));
                $sheet->setCellValueByColumnAndRow(5, $i, date('H:i', strtotime(h($payment->date_time))));
                $sheet->setCellValueByColumnAndRow(6, $i, $payment->obs); 

                $cat_ant = $payment->category->id; 
                $nome_ant =  $payment->category->name;      

                $i++;
            }

            $sheet->setCellValueByColumnAndRow(1, $i, $nome_ant);

            // die;
            //$sheet->setCellValueByColumnAndRow(1, $i, $nome_ant);

            $writer = new Xlsx($spreadsheet);

            $file = WWW_ROOT."excel".DS."arquivo.xlsx";
            $writer->save($file);                

            $response = $this->response->withFile(
                $file,
                ['download' => true, 'name' => 'Export.xlsx']
            );

            //unlink($file);

            return $response;

        }

        $this->set(compact(['meses','anos']));

    }

    public function pdf()
    {


        $options = new Options();
        $options->set('defaultFont', 'Arial');
        $dompdf = new Dompdf($options);

        $dompdf->loadHtml('hello world');

        // (Optional) Setup the paper size and orientation
        $dompdf->setPaper('A4', 'landscape');

        // Render the HTML as PDF
        $dompdf->render();

        // Output the generated PDF to Browser
        $dompdf->stream();


        die;

    }
}
