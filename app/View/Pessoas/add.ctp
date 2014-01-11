<div class="pessoas form">
<?php echo $this->Form->create('Pessoa'); ?>
	<fieldset>
		<legend><?php echo __('Adicionar Pessoa'); ?></legend>
	<?php
		echo $this->Form->input('nome', array('label' => 'Nome'));
		echo $this->Form->input('endereco', array('label' => 'Endereço'));
		echo $this->Form->input('numero', array('label' => 'Número'));
		echo $this->Form->input('bairro', array('label' => 'Bairro'));
		echo $this->Form->input('cidade_id', array('label' => 'Bairro'));
		echo $this->Form->input('cep', array('label' => 'CEP'));
		echo $this->Form->input('fone', array('label' => 'Fome'));
		echo $this->Form->input('email', array('label' => 'Email'));
		echo $this->Form->input('celular', array('label' => 'Celular'));
		echo $this->Form->input('obs', array('label' => 'Obs'));
		echo $this->Form->input('nascimento', array('label' => 'Nascimento', 'dateFormat' => 'DMY', 'minYear' => date('Y') - 100, 'maxYear' => date('Y')));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Salvar')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Menu'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('Listar Pessoas'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('Listar Cidades'), array('controller' => 'cidades', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nova Cidade'), array('controller' => 'cidades', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('Listar Pendências'), array('controller' => 'pendencias', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nova Pendência'), array('controller' => 'pendencias', 'action' => 'add')); ?> </li>
	</ul>
</div>
