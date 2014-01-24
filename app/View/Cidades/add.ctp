<div class="cidades form">
<?php echo $this->Form->create('Cidade'); ?>
	<fieldset>
		<legend><?php echo __('Adicionar Cidade'); ?></legend>
	<?php
		echo $this->Form->input('nome', array('label' => 'Nome'));
		echo $this->Form->input('uf', array('options' => Configure::read('UF'),'empty' => 'UF:'));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Salvar')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Menu'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('Listar Cidades'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('Listar Pessoas'), array('controller' => 'pessoas', 'action' => 'index')); ?> </li>
	</ul>
</div>
