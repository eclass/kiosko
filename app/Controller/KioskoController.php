<?php
class KioskoController extends AppController {

	public function index(){

		$this->layout = 'kiosko';
	}

	public function dashboard() {
		$this->loadModel('Person');
		$this->loadModel('Transaction');

		$debtors_count = $this->Person->find('count', array(
			'conditions' => array(
				'deleted' => 0,
				'debt >' => 0
			),
			'recursive' => -1
		));

		$debtors_sum = $this->Person->find('all', array(
			'fields' => array(
				'SUM(debt) AS debt_sum'
			),
			'conditions' => array(
				'deleted' => 0,
				'debt >' => 0
			),
			'recursive' => -1
		));

		$transactions_count = $this->Transaction->find('count', array(
			'conditions' => array('deleted' => 0),
			'recursive' => -1
		));

		$this->set(compact('debtors_sum', 'debtors_count', 'transactions_count'));
	}
}
