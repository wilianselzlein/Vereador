<div class="agendas form">
<?php echo $this->Form->create('Agenda'); ?>
	<fieldset>
		<legend><?php echo __('Editar Tarefa'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('descricao', array('label' => 'Descrição'));
		echo $this->Form->input('user_id', array('label' => 'Usuário'));
		echo $this->Form->input('data', array('label' => 'Data', 'dateFormat' => 'DMY', 'timeFormat' => '24', 'minYear' => date('Y') - 100, 'maxYear' => date('Y')));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Salvar')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Menu'); ?></h3>
	<ul>
		<li><?php echo $this->Form->postLink(__('Deletar'), array('action' => 'delete', $this->Form->value('Agenda.id')), null, __('Deseja excluir# %s?', $this->Form->value('Agenda.id'))); ?></li>
		<li><?php echo $this->Html->link(__('Listar Tarefas'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('Listar Usuários'), array('controller' => 'users', 'action' => 'index')); ?> </li>
	</ul>
</div>
