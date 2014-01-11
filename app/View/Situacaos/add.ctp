<div class="situacaos form">
<?php echo $this->Form->create('Situacao'); ?>
	<fieldset>
		<legend><?php echo __('Adicionar Situação'); ?></legend>
	<?php
		echo $this->Form->input('nome', array('label' => 'Nome'));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Salvar')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Menu'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('Listar Situações'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('Listar Pendências'), array('controller' => 'pendencias', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nova Pendência'), array('controller' => 'pendencias', 'action' => 'add')); ?> </li>
	</ul>
</div>
