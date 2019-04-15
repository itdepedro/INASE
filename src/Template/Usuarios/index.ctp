<h1>Usuarios</h1>
<table>
    <tr>
        <th>Nickname</th>
        <th>Nombre</th>
        <th>Apellido</th>
        <th>CUIT</th>
        <th>Accion</th>
    </tr>


    <?php foreach ($usuarios as $usuario): ?>
    <tr>
        <td>
            <?= $this->Html->link($usuario->nickname, ['action' => 'view', $usuario->nickname]) ?>
        </td>
        <td>
            <?= $usuario->nombre?>
        </td>
        <td>
            <?= $usuario->apellido?>
        </td>
        <td>
            <?= $usuario->cuit?>
        </td>
        <td>
            <?= $this->Html->link('Editar', ['action' => 'edit', $usuario->nickname]) ?>
            |
            <?= $this->Form->postLink(
                'Eliminar',
                ['action' => 'delete', $usuario->nickname],
                ['confirm' => '¿Esta seguro que desea eliminar el usuario?'])
            ?>
        </td>
    </tr>
    <?php endforeach; ?>
</table>

<?= $this->Html->link('Nuevo usuario', ['action' => 'add']) ?>
