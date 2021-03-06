<?php
class PaysController extends AppController {

	public function index(){

		$conditions = array();
		if(!empty($this->request->data)){
			$conditions = array(
				// + Agregar el buscador en la vista.
				// 'id_person' => '%' . strtolower($this->request->data['Person']['id']) . '%'
			);
		}

		$this->paginate = array(
			'conditions' => array_merge(
				$conditions,
				array(
					'Pay.deleted' => 0,
				)
            ),
            'order' => array('date' => 'desc'),
            'limit'  => 20
        );

		$this->set('pays', $this->paginate('Pay'));
	}

	public function view($id = null){
		if(isset($id)){
			$this->set('pay', $this->Pay->find('first', array(
				'conditions' => array('id' => $id)
			)));
		}
		else{
			$this->Session->setFlash('Id de payo inválido', 'alert', array(
				'plugin' => 'BoostCake',
				'class' => 'alert-danger'
			));
			$this->redirect(array('action' => 'index'));
		}
	}

	/**
	* Método que paga deudas de forma masiva
	* @author rbstamante
	* @since 29-08-2014
	*
	**/
	public function pay_debts() {
    	$this->autoRender = false;
		if(!empty($this->request->data)) {
			foreach ($this->request->data['id_person'] as $persona) {
				$person = $this->Pay->Person->find('first', array('fields' => array('debt'), 'conditions' => array('id' => $persona, 'debt > ' => 0)));

				if (!empty($person)) {

					$pay['Pay']['id'] = null;
					$pay['Pay']['id_person'] = $person['Person']['id'];
					$pay['Pay']['amount'] = $person['Person']['debt'];
					$pay['Pay']['date'] = date('Y-m-d H:i:s');

					/* Si se paga la deuda de la persona */
					if($this->Pay->save($pay)) {
						$person['Person']['debt'] = 0;
						$this->Pay->Person->save($person);
					}
				}
			}

			echo '<div id="flashMessage" class="message">Se ha pagado la deuda de todos las Personas selecionadas.</div>';
		}
	}

	public function add($id = null, $idPersona = null){
		if(!empty($this->request->data)){
			if(isset($id) && $id != 0){
				$this->Pay->id = $id;
				$action = 'modificado';
			}
			else{
				$this->Pay->id = null;
				$action = 'agregado';
			}

			$rut = str_replace('RUT', '', $this->request->data['Pay']['Person']['rut']);
			$person = $this->Pay->Person->find('first', array(
				'fields' => array('debt'),
				'conditions' => array('Person.rut' => $rut)
			));
			if(!empty($person)){
				//setea id de persona y elimina data persona del pago
				$this->request->data['Pay']['id_person'] = $person['Person']['id'];
				unset($this->request->data['Pay']['Person']);
				$this->request->data['Pay']['date'] = date('Y-m-d H:i:s');

				if($this->Pay->save($this->request->data)){

					//Actualizar deuda de la persona
					$person['Person']['debt'] -= $this->request->data['Pay']['amount'];
					$this->Pay->Person->save($person);

					$this->Session->setFlash('Pago ' . $action . ' exitosamente', 'alert', array(
						'plugin' => 'BoostCake',
						'class' => 'alert-success'
					));
					$this->redirect(array('action' => 'index'));
				}
				else {
					$this->Session->setFlash('Error al guardar el pago', 'alert', array(
						'plugin' => 'BoostCake',
						'class' => 'alert-danger'
					));

					$this->request->data['Pay']['Person']['rut'] = $rut;
				}
			}
			else{
				$this->Session->setFlash('Persona no encontrada', 'alert', array(
					'plugin' => 'BoostCake',
					'class' => 'alert-danger'
				));
			}
		}

		if(isset($id) && $id != 0){
			$pay = $this->Pay->find('first', array(
				'conditions' => array('Pay.id' => $id)
			));
			$this->request->data['Pay'] = $pay['Pay'];
		}

		if(isset($idPersona)){
			$person = $this->Pay->Person->find('first', array(
				'conditions' => array('Person.id' => $idPersona)
			));

			$this->request->data['Pay']['Person'] = $person['Person'];
			$this->set(compact('person'));
		}
	}

	public function delete($id = null){
		if(isset($id)){
			$this->Pay->id = $id;
			if($this->Pay->save(array('deleted' => 1))){
				//sumar deuda a la persona


				$this->Session->setFlash('Pago eliminado', 'alert', array(
					'plugin' => 'BoostCake',
					'class' => 'alert-success'
				));
			}
			else{
				$this->Session->setFlash('Error al eliminar el pago', 'alert', array(
					'plugin' => 'BoostCake',
					'class' => 'alert-danger'
				));
			}
		}
		else{
			$this->Session->setFlash('Id de pago inválido', 'alert', array(
				'plugin' => 'BoostCake',
				'class' => 'alert-danger'
			));
		}
		$this->redirect(array('action' => 'index'));
	}
}
?>
