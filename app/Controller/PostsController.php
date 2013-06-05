<?php

class PostsController extends AppController {

	var $users = array();

	public function beforeFilter() {
		parent::beforeFilter();
	}

	public function isAuthorized($user) {
		$this->Auth->allow();
	}

	public $name = 'Posts';

	public function index() {
		$this->_checkUser();

		$params = array(
			'fields' => array('title', 'body', 'userid'),
			'order' => array('_id' => -1),
			'limit' => 35,
			'page' => 1,
		);
		$results = $this->Post->find('all', $params);
		$this->set(compact('results'));
	}

	public function add() {
		$this->_checkUser();

		if (!empty($this->data)) {

			$this->Post->create();
			if ($this->Post->save($this->data)) {
				$this->Session->setFlash(_('You have successfully created a new post.'));
				$this->redirect(array('controller' => 'Posts', 'action' => 'index', $this->Auth->user('id')));
			} else {
			}
		}
	}

	public function edit($id = null) {
		$this->_checkUser('1');

		if (!$id && empty($this->data)) {
			$this->flash(__('Invalid Post', true), array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Post->save($this->data)) {
				$this->Session->setFlash(_('You have successfully edited this post.'));
				$this->redirect(array('controller' => 'Posts', 'action' => 'index', $this->Auth->user('id')));
			} else {
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Post->read(null, $id);
		}
	}

	public function delete($id = null) {
		if (!$id) {
			$this->flash(__('Invalid Post', true), array('action' => 'index'));
		}
		if ($this->Post->delete($id)) {
			$this->Session->setFlash(_('You have successfully deleted a post.'));
			$this->redirect(array('controller' => 'Posts', 'action' => 'index', $this->Auth->user('id')));
		} else {
			$this->flash(__('Post deleted Fail', true), array('action' => 'index'));
		}
	}

	public function deleteall() {
		$conditions = array('title' => 'aa');
		if ($this->Post->deleteAll($conditions)) {
			$this->flash(__('Post deleteAll success', true), array('action' => 'index'));

		} else {
			$this->flash(__('Post deleteAll Fail', true), array('action' => 'index'));
		}
	}

	public function updateall() {
		$conditions = array('title' => 'ichi2' );

		$field = array('title' => 'ichi' );

		if ($this->Post->updateAll($field, $conditions)) {
			$this->flash(__('Post updateAll success', true), array('action' => 'index'));

		} else {
			$this->flash(__('Post updateAll Fail', true), array('action' => 'index'));
		}
	}

	public function createindex() {
		$mongo = ConnectionManager::getDataSource($this->Post->useDbConfig);
		$mongo->ensureIndex($this->Post, array('title' => 1));

	}
}
