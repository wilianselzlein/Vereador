<div class="users form">
<?php echo $this->Form->create('User'); ?>
	<fieldset>
		<legend><?php echo __('Adicionar Usuário'); ?></legend>
	<?php
		echo $this->Form->input('username', array('label' => 'Login'));
		echo $this->Form->input('password', array('label' => 'Senha'));
		//echo $this->Form->input('role');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Salvar')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Menu'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Listar Usuários'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('Listar Pendências'), array('controller' => 'pendencias', 'action' => 'index')); ?> </li>
	</ul>
</div>
