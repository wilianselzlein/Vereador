<div class="liders form">
<?php echo $this->Form->create('Lider'); ?>
	<fieldset>
		<legend><?php echo __('Adicionar Líder'); ?></legend>
	<?php
		echo $this->Form->input('nome');
		echo $this->Form->input('fone');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Salvar')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('Listar Líders'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('Listar Pessoas'), array('controller' => 'pessoas', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nova Pessoa'), array('controller' => 'pessoas', 'action' => 'add')); ?> </li>
	</ul>
</div>
