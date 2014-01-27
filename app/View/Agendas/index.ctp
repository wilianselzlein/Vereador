<div class="agendas index">
	<h2><?php echo __('Agenda'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('descricao', 'Descrição'); ?></th>
			<th><?php echo $this->Paginator->sort('user_id', 'Usuário'); ?></th>
			<th><?php echo $this->Paginator->sort('data'); ?></th>
			<th class="actions"><?php echo __('Menu'); ?></th>
	</tr>
	<?php foreach ($agendas as $agenda): ?>
	<tr>
		<td><?php echo h($agenda['Agenda']['id']); ?>&nbsp;</td>
		<td><?php echo h($agenda['Agenda']['descricao']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($agenda['User']['username'], array('controller' => 'users', 'action' => 'view', $agenda['User']['id'])); ?>
		</td>
		<td><?php echo date("d/m/y G:i", strtotime($agenda['Agenda']['data'])); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('Ver'), array('action' => 'view', $agenda['Agenda']['id'])); ?>
			<?php echo $this->Html->link(__('Editar'), array('action' => 'edit', $agenda['Agenda']['id'])); ?>
			<?php echo $this->Form->postLink(__('Deletar'), array('action' => 'delete', $agenda['Agenda']['id']), null, __('Deseja excluir# %s?', $agenda['Agenda']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Pagina {:page} de {:pages}, mostrando {:current} registros de {:count} total, iniciando no registro {:start}, finalizando em {:end}')
	));
	?>	</p>
	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('Anterior'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('Proximo') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
<div class="actions">
	<h3><?php echo __('Menu'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Nova Tarefa'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('Listar Usuários'), array('controller' => 'users', 'action' => 'index')); ?> </li>
	</ul>
</div>
