<div class="situacaos view">
<h2><?php  echo __('Situação'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($situacao['Situacao']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Nome'); ?></dt>
		<dd>
			<?php echo h($situacao['Situacao']['nome']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Menu'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Editar Situação'), array('action' => 'edit', $situacao['Situacao']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Situação'), array('action' => 'delete', $situacao['Situacao']['id']), null, __('Deseja excluir# %s?', $situacao['Situacao']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Listar Situações'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nova Situação'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('Listar Pendências'), array('controller' => 'pendencias', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nova Pendência'), array('controller' => 'pendencias', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Pendências Relacionadas'); ?></h3>
	<?php if (!empty($situacao['Pendencia'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Data'); ?></th>
		<th><?php echo __('Usuário'); ?></th>
		<th><?php echo __('Pessoa'); ?></th>
		<th><?php echo __('Grupo'); ?></th>
		<th><?php echo __('Título'); ?></th>
		<th><?php echo __('Histórico'); ?></th>
		<th><?php echo __('Cadastrado'); ?></th>		
		<th><?php echo __('Alterado'); ?></th>
		<th class="actions"><?php echo __('Menu'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($situacao['Pendencia'] as $pendencia): ?>
		<tr>
			<td><?php echo $pendencia['id']; ?></td>
			<td><?php echo date("d/m/y", strtotime($pendencia['data'])); ?></td>
			<td><?php echo $this->Html->link($user[$pendencia['user_id']], array('controller' => 'users', 'action' => 'view', $pendencia['user_id'])); ?>
			<td><?php echo $this->Html->link($pessoa[$pendencia['pessoa_id']], array('controller' => 'pessoas', 'action' => 'view', $pendencia['pessoa_id'])); ?>
			<td><?php echo $this->Html->link($grupo[$pendencia['grupo_id']], array('controller' => 'grupos', 'action' => 'view', $pendencia['grupo_id'])); ?>
			<td><?php echo $pendencia['titulo']; ?></td>
			<td><?php echo $pendencia['historico']; ?></td>
			<td><?php echo date("d/m/y H:i:s", strtotime($pendencia['created'])); ?></td>
			<td><?php echo date("d/m/y H:i:s", strtotime($pendencia['modified'])); ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('Ver'), array('controller' => 'pendencias', 'action' => 'view', $pendencia['id'])); ?>
				<?php echo $this->Html->link(__('Editar'), array('controller' => 'pendencias', 'action' => 'edit', $pendencia['id'])); ?>
				<?php echo $this->Form->postLink(__('Deletar'), array('controller' => 'pendencias', 'action' => 'delete', $pendencia['id']), null, __('Deseja excluir# %s?', $pendencia['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('Nova Pendência'), array('controller' => 'pendencias', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
