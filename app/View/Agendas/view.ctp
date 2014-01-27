<div class="agendas view">
<h2><?php  echo __('Tarefa'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($agenda['Agenda']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Descrição'); ?></dt>
		<dd>
			<?php echo h($agenda['Agenda']['descricao']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Usuário'); ?></dt>
		<dd>
			<?php echo $this->Html->link($agenda['User']['username'], array('controller' => 'users', 'action' => 'view', $agenda['User']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Data'); ?></dt>
		<dd>
			<?php echo date("d/m/y G:i", strtotime($agenda['Agenda']['data'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Menu'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Editar Tarefa'), array('action' => 'edit', $agenda['Agenda']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Deletar Tarefa'), array('action' => 'delete', $agenda['Agenda']['id']), null, __('Deseja excluir# %s?', $agenda['Agenda']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Listar Tarefas'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nova Tarefa'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('Listar Usuários'), array('controller' => 'users', 'action' => 'index')); ?> </li>
	</ul>
</div>
