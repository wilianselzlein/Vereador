<div class="grupos view">
<h2><?php  echo __('Grupo'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($grupo['Grupo']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Nome'); ?></dt>
		<dd>
			<?php echo h($grupo['Grupo']['nome']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Menu'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Editar Grupo'), array('action' => 'edit', $grupo['Grupo']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Deletar Grupo'), array('action' => 'delete', $grupo['Grupo']['id']), null, __('Deseja excluir# %s?', $grupo['Grupo']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Listar Grupos'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Novo Grupo'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('Listar Pendências'), array('controller' => 'pendencias', 'action' => 'index')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Pendências Relacionadas'); ?></h3>
	<?php if (!empty($grupo['Pendencia'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Data'); ?></th>
		<th><?php echo __('Usuário'); ?></th>
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
		foreach ($grupo['Pendencia'] as $pendencia): ?>
		<tr>
			<td><?php echo $pendencia['id']; ?></td>
			<td><?php echo date("d/m/y", strtotime($pendencia['data'])); ?></td>
			<td><?php echo $this->Html->link($pendencia['User']['username'], array('controller' => 'users', 'action' => 'view', $pendencia['user_id'])); ?>
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
</div>
