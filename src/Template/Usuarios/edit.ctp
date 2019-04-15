<h1>Editar Usuario</h1>
<?php
    echo $this->Form->create($usuario);
    echo $this->Form->control('id', ['type' => 'hidden']);
    echo $this->Form->control('nombre');
    echo $this->Form->control('apellido');
    echo $this->Form->control('nickname');
    echo $this->Form->control('cuit');
    echo $this->Form->control('email');
    echo $this->Form->button(__('Guardar'));
    echo $this->Form->end();

?>