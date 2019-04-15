<h1><?= h($usuario->nombre) ?> <?= h($usuario->apellido) ?></h1>
<p><?= h($usuario->cuit) ?></p>
<p><?= $this->Html->link('Editar', ['action' => 'edit', $usuario->nickname]) ?></p>