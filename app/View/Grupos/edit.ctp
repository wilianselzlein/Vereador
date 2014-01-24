<div class="grupos form">
<?php echo $this->Form->create('Grupo'); ?>
	<fieldset>
		<legend><?php echo __('Edit Grupo'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('nome');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Salvar')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Menu'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Deletar'), array('action' => 'delete', $this->Form->value('Grupo.id')), null, __('Deseja excluir# %s?', $this->Form->value('Grupo.id'))); ?></li>
		<li><?php echo $this->Html->link(__('Listar Grupos'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('Listar Pendencias'), array('controller' => 'pendencias', 'action' => 'index')); ?> </li>
	</ul>
</div>
