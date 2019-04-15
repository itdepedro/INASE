<?php

namespace App\Controller;
use App\Controller\AppController;


class UsuariosController extends AppController
{
    public function initialize()
    {
        parent::initialize();

        $this->loadComponent('Paginator');
        $this->loadComponent('Flash'); // Include the FlashComponent
    }

    public function index()
    {
        $this->loadComponent('Paginator');
        $usuarios = $this->Paginator->paginate($this->Usuarios->find());
        $this->set(compact('usuarios'));
    }
    public function view($nickname)
    {
        $usuario = $this->Usuarios->findByNickname($nickname)->firstOrFail();
        $this->set(compact('usuario'));
    }
    public function add()
    {
        $usuario = $this->Usuarios->newEntity();
        if ($this->request->is('post')) {
            $usuario = $this->Usuarios->patchEntity($usuario, $this->request->getData());

            

            if ($this->Usuarios->save($usuario)) {
                $this->Flash->success(__('Se ha dado de alta un nuevo usuario con exito'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Error al dar de alta un nuevo usuario'));
        }
        $this->set('usuario', $usuario);
    }
    public function edit($nickname)
    {
        $usuario = $this->Usuarios->findByNickname($nickname)->firstOrFail();
        if ($this->request->is(['post', 'put'])) {
            $this->Usuarios->patchEntity($usuario, $this->request->getData());
            if ($this->Usuarios->save($usuario)) {
                $this->Flash->success(__('El usuario ha sido modificado'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('No se ha podido modificar el usuario'));
        }

        $this->set('usuario', $usuario);
    }
    public function delete($nickname)
    {
        $this->request->allowMethod(['post', 'delete']);

        $usuario = $this->Usuarios->findByNickname($nickname)->firstOrFail();
        if ($this->Usuarios->delete($usuario)) {
            $this->Flash->success(__('El usuario {0} fue eliminado.', $usuario->nickname));
            return $this->redirect(['action' => 'index']);
        }
    }
}
