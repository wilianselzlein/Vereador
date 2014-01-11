<div class="users view">
<h2><?php  echo __('User'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($user['User']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Login'); ?></dt>
		<dd>
			<?php echo h($user['User']['username']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Senha'); ?></dt>
		<dd>
			<?php echo h($user['User']['password']); ?>
			&nbsp;
		</dd>
		<!--<dt><?php //echo __('Role'); ?></dt>
		<dd>
			<?php //echo h($user['User']['role']); ?>
			&nbsp;
		</dd>-->
		<dt><?php echo __('Cadastrado'); ?></dt>
		<dd>
			<?php echo h($user['User']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Alterado'); ?></dt>
		<dd>
			<?php echo h($user['User']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Menu'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Editar Usuário'), array('action' => 'edit', $user['User']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Usuário'), array('action' => 'delete', $user['User']['id']), null, __('Deseja excluir# %s?', $user['User']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Listar Usuário'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Novo Usuário'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('Listar Pendências'), array('controller' => 'pendencias', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nova Pendência'), array('controller' => 'pendencias', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Pendências Relacionadas'); ?></h3>
	<?php if (!empty($user['Pendencia'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Data'); ?></th>
		<th><?php echo __('Grupo'); ?></th>
		<th><?php echo __('Pessoa'); ?></th>
		<th><?php echo __('Situação'); ?></th>
		<th><?php echo __('Título'); ?></th>
		<th><?php echo __('Histórico'); ?></th>
		<th><?php echo __('Cadastrado'); ?></th>
		<th><?php echo __('Alterado'); ?></th>		
		<th class="actions"><?php echo __('Menu'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($user['Pendencia'] as $pendencia): ?>
		<tr>
			<td><?php echo $pendencia['id']; ?></td>
			<td><?php echo $pendencia['data']; ?></td>
			<td><?php echo $this->Html->link($grupo[$pendencia['grupo_id']], array('controller' => 'grupos', 'action' => 'view', $pendencia['grupo_id'])); ?>
			<td><?php echo $this->Html->link($pessoa[$pendencia['pessoa_id']], array('controller' => 'pessoas', 'action' => 'view', $pendencia['pessoa_id'])); ?>
			<td><?php echo $this->Html->link($situacao[$pendencia['situacao_id']], array('controller' => 'situacaos', 'action' => 'view', $pendencia['situacao_id'])); ?>
			<td><?php echo $pendencia['titulo']; ?></td>
			<td><?php echo $pendencia['historico']; ?></td>
			<td><?php echo $pendencia['created']; ?></td>
			<td><?php echo $pendencia['modified']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('Ver'), array('controller' => 'pendencias', 'action' => 'view', $pendencia['id'])); ?>
				<?php echo $this->Html->link(__('Editar'), array('controller' => 'pendencias', 'action' => 'edit', $pendencia['id'])); ?>
				<?php echo $this->Form->postLink(__('Deletar'), array('controller' => 'pendencias', 'action' => 'delete', $pendencia['id']), null, __('Deseja excluir# %s?', $pendencia['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>
	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('Novo Pendência'), array('controller' => 'pendencias', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
