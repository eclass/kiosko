<?php
class TransactionsController extends AppController {

	public function index(){
		$this->set('transactions', $this->Transaction->find('all', array(
				'conditions' => array('Transaction.deleted' => 0),
				'order' => array('date' => 'DESC')
			))
		);
	}

	public function view($id = null){
		if(isset($id)){
			$this->set('transaction', $this->Transaction->find('first', array(
				'conditions' => array('Transaction.id' => $id),
				'contains' => array(
					'Product' => array()
				)
			)));
		}
		else{
			$this->Session->setFlash('Id de transacción inválido'/*, 'failure'*/);
			$this->redirect(array('action' => 'index'));
		}
	}

}
