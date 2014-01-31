<div class="cidades form">
<?php echo $this->Form->create('Cidade'); ?>
	<fieldset>
		<legend><?php echo __('Editar Cidade'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('nome', array('label' => 'Nome'));
		echo $this->Form->input('uf', array('options' => Configure::read('UF'),'empty' => 'UF:'));
		echo $this->Form->input('cep', array('label' => 'CEP'));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Salvar')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Menu'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Deletar'), array('action' => 'delete', $this->Form->value('Cidade.id')), null, __('Deseja excluir# %s?', $this->Form->value('Cidade.id'))); ?></li>
		<li><?php echo $this->Html->link(__('Listar Cidades'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('Listar Pessoas'), array('controller' => 'pessoas', 'action' => 'index')); ?> </li>
	</ul>
</div>
