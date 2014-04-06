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
			<?php echo date("d/m/y H:i:s", strtotime($user['User']['created'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Alterado'); ?></dt>
		<dd>
			<?php echo date("d/m/y H:i:s", strtotime($user['User']['modified'])); ?>
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
                <th><?php echo __('Endereço'); ?></th>
                <th><?php echo __('Telefone'); ?></th>
		<th><?php echo __('Situação'); ?></th>
		<th><?php echo __('Título'); ?></th>
		<th><?php echo __('Histórico'); ?></th>
		<th class="actions"><?php echo __('Menu'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($user['Pendencia'] as $pendencia): ?>
		<tr>
			<td><?php echo $pendencia['id']; ?></td>
			<td><?php echo date("d/m/y", strtotime($pendencia['data'])); ?></td>
			<td><?php echo $this->Html->link($pendencia['Grupo']['nome'], array('controller' => 'grupos', 'action' => 'view', $pendencia['grupo_id'])); ?>
			<td><?php echo $this->Html->link($pendencia['Pessoa']['nome'], array('controller' => 'pessoas', 'action' => 'view', $pendencia['pessoa_id'])); ?>
                        <td><?php echo h($pendencia['Pessoa']['endereco']); ?>&nbsp;<?php echo h($pendencia['Pessoa']['numero']); ?>&nbsp;<?php echo $this->Html->link($pendencia['Pessoa']['Bairro']['nome'], array('controller' => 'bairros', 'action' => 'view', $pendencia['Pessoa']['bairro_id'])); ?></td>
                        <td><?php echo h($pendencia['Pessoa']['fone']); ?>&nbsp;<?php echo h($pendencia['Pessoa']['celular']); ?></td>
			<td><?php echo $this->Html->link($pendencia['Situacao']['nome'], array('controller' => 'situacaos', 'action' => 'view', $pendencia['situacao_id'])); ?>
			<td><?php echo $pendencia['titulo']; ?></td>
			<td><?php echo $pendencia['historico']; ?></td>
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
			<li><?php echo $this->Html->link(__('Nova Pendência'), array('controller' => 'pendencias', 'action' => 'add')); ?> </li>
		</ul>
	</div>
	<br>
	<br>
	<br>
	<br>
	<h3><?php echo __('Tarefas do Usuário'); ?></h3>
	<?php if (!empty($user['Tarefa'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Data'); ?></th>
		<th><?php echo __('Descrição'); ?></th>
		<th class="actions"><?php echo __('Menu'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($user['Tarefa'] as $tarefa): ?>
		<tr>
			<td><?php echo $tarefa['id']; ?></td>
			<td><?php echo date("d/m/y G:i", strtotime($tarefa['data'])); ?></td>
			<td><?php echo $tarefa['descricao']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('Ver'), array('controller' => 'agendas', 'action' => 'view', $tarefa['id'])); ?>
				<?php echo $this->Html->link(__('Editar'), array('controller' => 'agendas', 'action' => 'edit', $tarefa['id'])); ?>
				<?php echo $this->Form->postLink(__('Deletar'), array('controller' => 'agendas', 'action' => 'delete', $tarefa['id']), null, __('Deseja excluir# %s?', $tarefa['id'])); ?>
			</td>
		</tr>
		<?php endforeach; ?>
	</table>
	<?php endif; ?>
	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('Nova Tarefa'), array('controller' => 'agendas', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
