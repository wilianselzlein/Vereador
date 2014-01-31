<?php include dirname(dirname(__FILE__)) . DIRECTORY_SEPARATOR . 'javascript.php'; ?>
<?php include dirname(dirname(__FILE__)) . DIRECTORY_SEPARATOR . 'chosen.html'; ?>
<div class="pendencias form">
<?php echo $this->Form->create('Pendencia'); ?>
	<fieldset>
		<legend><?php echo __('Editar Pendência'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('data', array('label' => 'Data', 'dateFormat' => 'DMY', 'minYear' => date('Y') - 100, 'maxYear' => date('Y')));
		echo $this->Form->input('user_id', array('label' => 'Usuário', 'class' => 'chzn-select', 'style' => 'width:100%'));
		echo $this->Form->input('situacao_id', array('label' => 'Situação', 'class' => 'chzn-select', 'style' => 'width:100%'));
		echo $this->Form->input('grupo_id', array('label' => 'Grupo', 'class' => 'chzn-select', 'style' => 'width:100%'));
		echo $this->Form->input('pessoa_id', array('label' => 'Pessoa', 'class' => 'chzn-select', 'style' => 'width:100%'));
		echo $this->Form->input('titulo', array('label' => 'Título'));
		echo $this->Form->input('historico', array('label' => 'Histórico'));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Salvar')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Menu'); ?></h3>
	<ul>
		<li><?php echo $this->Form->postLink(__('Deletar'), array('action' => 'delete', $this->Form->value('Pendencia.id')), null, __('Deseja excluir# %s?', $this->Form->value('Pendencia.id'))); ?></li>
		<li><?php echo $this->Html->link(__('Listar Pendências'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('Listar Usuários'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Listar Situações'), array('controller' => 'situacaos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Listar Grupos'), array('controller' => 'grupos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Listar Pessoas'), array('controller' => 'pessoas', 'action' => 'index')); ?> </li>
	</ul>
</div>
<?php include dirname(dirname(__FILE__)) . DIRECTORY_SEPARATOR . 'chosenjs.html'; ?>