<div class="pendencias form">
<?php echo $this->Form->create('Pendencia'); ?>
	<fieldset>
		<legend><?php echo __('Adicionar Pendência'); ?></legend>
	<?php
		echo $this->Form->input('data', array('label' => 'Data', 'dateFormat' => 'DMY', 'minYear' => date('Y') - 100, 'maxYear' => date('Y')));
		echo $this->Form->input('user_id', array('label' => 'Usuário'));
		echo $this->Form->input('situacao_id', array('label' => 'Situação'));
		echo $this->Form->input('grupo_id', array('label' => 'Grupo'));
		echo $this->Form->input('pessoa_id', array('label' => 'Pessoa'));
		echo $this->Form->input('titulo', array('label' => 'Título'));
		echo $this->Form->input('historico', array('label' => 'Histórico'));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Salvar')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Menu'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Listar Pendências'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('Listar Usuários'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Listar Situações'), array('controller' => 'situacaos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Listar Grupos'), array('controller' => 'grupos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Listar Pessoas'), array('controller' => 'pessoas', 'action' => 'index')); ?> </li>
	</ul>
</div>
