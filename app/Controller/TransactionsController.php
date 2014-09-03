<?php
class TransactionsController extends AppController {

	public function index(){

		$this->paginate = array(
			'conditions' => array(
				'Transaction.deleted' => 0,
			),
            'order' => array('date' => 'desc'),
            'limit'  => 20
        );

		$this->set('transactions', $this->paginate('Transaction'));
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

	public function add(){
		$this->autoRender = false;
		pr($this->data);
	}

/**
 * push function
 *
 * @author vsanmartin
 * @since 2014-08-26
 * @return void
 */
	public function push() {
		$this->autoRender = false;

		if (!empty($this->request->data['transactions'])) {
			foreach ($this->request->data['transactions'] as $transaction) {
				if (!empty($transaction['products'])) {

					$this->Transaction->create();
					$this->Transaction->save(array('Transaction' => array(
						'id_person' => $transaction['person_id'],
						'date' => date('Y-m-d H:i:s')
					)));
					$transaction_id = $this->Transaction->getInsertID();

					$total = 0;
					foreach ($transaction['products'] as $code => $product) {

						$data = $this->Transaction->Product->find('first', array(
							'conditions' => array('code' => $product['product_code'], 'deleted' => 0)
						));
						if (empty($data)) {
							continue;
						}

						$this->Transaction->query('UPDATE products SET stock = (stock - ' . $product['quantity'] . ')  WHERE id = ' . $data['Product']['id']);

						$this->Transaction->query('
							INSERT INTO products_transactions(id_product, id_transaction, cantity, amount)
							VALUES(' . $data['Product']['id'] . ', ' . $transaction_id . ', ' . $product['quantity'] . ', ' . $product['total'] . ')
						');
						$total += $product['total'];
					}

					$this->Transaction->id = $transaction_id;
					$this->Transaction->save(array('total' => $total));
					//Guarda la Deuda
					$this->Transaction->query('UPDATE people set debt = (debt + ' . $total . ') where id = ' . $transaction['person_id']);
				}
			}
		}
	}
}
