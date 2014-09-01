<?php
class PeopleController extends AppController {

/**
 * components
 * @var array
 */
	public $components = array('RequestHandler');

	public function index(){

		$conditions = array();
		if(!empty($this->request->data)){
			$conditions = array(
				'LCASE(rut) LIKE ' => '%' . strtolower($this->request->data['Person']['name']) . '%',
				// 'LCASE(rut) LIKE ' => '%' . strtolower($this->request->data['Person']['name']) . '%'
			);
		}

		$this->paginate = array(
			'conditions' => array_merge(
				$conditions,
				array('deleted' => 0)
            ),
			'order' => array('name' => 'asc'),
            'limit'  => 10
        );

	    $this->set('people', $this->paginate('Person'));
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
	* @author rbustamante
	*
	*/
	public function debtors() {

		$conditions = array();
		if(!empty($this->request->data)){
			$conditions = array(
				'LCASE(name) LIKE ' => '%' . strtolower($this->request->data['Person']['name']) . '%'
			);
		}

		$this->paginate = array(
			'conditions' => array_merge(
				$conditions,
				array(
					'deleted' => 0,
					'debt >' => 0
				)
            ),
			'order' => array('name' => 'asc'),
            'limit'  => 10
        );

		$this->set('debtors', $this->paginate('Person'));
	}

	/**
	* Auto completar de deudores
	* @author rbustamante
	*
	*/
	public function auto_complete_debtors() {
		$this->autoRender = false;
        $products = $this->Person->find('all', array(
            'conditions' => array(
            	'LCASE(name) LIKE ' => '%' . strtolower($this->params['url']['autoCompleteText']) . '%',
            	'deleted' => 0,
            	'debt >' => 0
            ),
            'limit' => 	3,
            'recursive'=> -1,
        ));

        $data = [];
        foreach ($products as $key => $value) :
        		$data[$key] = $value['Person']['name'];
        endforeach;

        echo $products = json_encode($data);
    }

	/**
	 * all function
	 * return all people in json format
	 *
	 * @author vsanmartin
	 * @since 2014-08-26
	 * @return void
	 */
	public function all() {
		$people = $this->Person->find('all', array(
			'conditions' => array('deleted' => 0)
		));

		$json = array();
		foreach($people as $person) {
			$person['Person']['rut'] = 'RUT' . $person['Person']['rut'];
			$json[$person['Person']['rut']] = $person['Person'];
		}
		$people = $json;

		$this->set(compact('people'));
        $this->set('_serialize', array('people'));
	}

	/**
	* Auto completar de personas
	* @author rbustamante
	*
	*/
	public function auto_complete() {
		$this->autoRender = false;
        $products = $this->Person->find('all', array(
            'conditions' => array(
            	'LCASE(name) LIKE ' => '%' . strtolower($this->params['url']['autoCompleteText']) . '%'
            ),
            'limit' => 	3,
            'recursive'=> -1,
        ));

        $data = [];
        foreach ($products as $key => $value) :
        		$data[$key] = $value['Person']['name'];
        endforeach;

        echo $products = json_encode($data);
    }

}
