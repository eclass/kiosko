<?php
class PeopleController extends AppController {

	public function index(){
		$this->set('people', $this->Person->find('all', array(
				'conditions' => array('deleted' => 0),
				'order' => array('name' => 'asc')
			))
		);
	}

	public function view($id = null){
		if(isset($id)){
			$this->set('person', $this->Person->find('first', array(
				'conditions' => array('id' => $id)
			)));
		}
		else{
			$this->Session->setFlash('Id de persona inválido'/*, 'failure'*/);
			$this->redirect(array('action' => 'index'));
		}
	}

	public function add($id = null){

		if(!empty($this->request->data)){
			if(isset($id)){
				$this->Person->id = $id;
				$action = 'modificada';
			}
			else{
				$this->Person->id = null;
				$action = 'creada';
			}
			if($this->Person->save($this->request->data)){
				$this->Session->setFlash('Persona ' . $action . ' exitosamente'/*, 'success'*/);
				$this->redirect(array('action' => 'index'));
			}
			else{
				$this->Session->setFlash('Error al guardar la persona'/*, 'failure'*/);
				$this->redirect(array('action' => 'index'));
			}
		}

		if(isset($id)){
			$persono = $this->Person->find('first', array(
				'conditions' => array('id' => $id)
			));
			$this->request->data['Person'] = $persono['Person'];
		}
	}

	public function delete($id = null){
		if(isset($id)){
			$this->Person->id = $id;
			if($this->Person->save(array('deleted' => 1))){
				$this->Session->setFlash('Persona eliminada', 'default', array(), 'good');
			}
			else{
				$this->Session->setFlash('Error al eliminar la persona'/*, 'success'*/);
			}
		}
		else{
			$this->Session->setFlash('Id de persona inválida'/*, 'failure'*/);
		}
		$this->redirect(array('action' => 'index'));
	}

	/**
	* Reporte de deudores
	*/
	public function debtors() {

		$debtors = $this->Person->find('all',array(
			'conditions' => array(
				'deleted' => 0,
				'debt >' => 0
			),
			'order' => array('name' => 'asc')
		));

		$this->set('debtors', $debtors);
	}
}
?>
