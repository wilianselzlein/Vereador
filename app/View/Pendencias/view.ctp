<div class="pendencias view">
<h2><?php  echo __('Pendência'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($pendencia['Pendencia']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Data'); ?></dt>
		<dd>
			<?php echo date("d/m/y", strtotime($pendencia['Pendencia']['data'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Usuário'); ?></dt>
		<dd>
			<?php echo $this->Html->link($pendencia['User']['username'], array('controller' => 'users', 'action' => 'view', $pendencia['User']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Situação'); ?></dt>
		<dd>
			<?php echo $this->Html->link($pendencia['Situacao']['nome'], array('controller' => 'situacaos', 'action' => 'view', $pendencia['Situacao']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Grupo'); ?></dt>
		<dd>
			<?php echo $this->Html->link($pendencia['Grupo']['nome'], array('controller' => 'grupos', 'action' => 'view', $pendencia['Grupo']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Pessoa'); ?></dt>
		<dd>
			<?php echo $this->Html->link($pendencia['Pessoa']['nome'], array('controller' => 'pessoas', 'action' => 'view', $pendencia['Pessoa']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Telefone/Celular'); ?></dt>
		<dd>
			<?php echo h($pendencia['Pessoa']['fone']); ?>
			&nbsp;
			<?php echo h($pendencia['Pessoa']['celular']); ?>
		</dd>
		<dt><?php echo __('Título'); ?></dt>
		<dd>
			<?php echo h($pendencia['Pendencia']['titulo']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Histórico'); ?></dt>
		<dd>
			<?php echo h($pendencia['Pendencia']['historico']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Alterado'); ?></dt>
		<dd>
			<?php echo date("d/m/y H:i:s", strtotime($pendencia['Pendencia']['modified'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Cadastrado'); ?></dt>
		<dd>
			<?php echo date("d/m/y H:i:s", strtotime($pendencia['Pendencia']['created'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Menu'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Editar Pendência'), array('action' => 'edit', $pendencia['Pendencia']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Pendência'), array('action' => 'delete', $pendencia['Pendencia']['id']), null, __('Deseja excluir# %s?', $pendencia['Pendencia']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Listar Pendências'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Listar Usuários'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Listar Situações'), array('controller' => 'situacaos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Listar Grupos'), array('controller' => 'grupos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Listar Pessoas'), array('controller' => 'pessoas', 'action' => 'index')); ?> </li>
	</ul>
</div>
