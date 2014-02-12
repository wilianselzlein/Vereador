<div class="pendencias index">
	<?php include dirname(dirname(__FILE__)) . DIRECTORY_SEPARATOR . 'filtros3.php'; ?>
	<h2><?php echo __('Pendências'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('data', 'Data'); ?></th>
			<th><?php echo $this->Paginator->sort('user_id', 'Usuário'); ?></th>
			<th><?php echo $this->Paginator->sort('situacao_id', 'Situação'); ?></th>
			<th>&nbsp;</th>
			<th><?php echo $this->Paginator->sort('grupo_id', 'Grupo'); ?></th>
			<th><?php echo $this->Paginator->sort('pessoa_id', 'Pessoa'); ?></th>
			<th><?php echo $this->Paginator->sort('celular', 'Telefone'); ?></th>
			<th><?php echo $this->Paginator->sort('titulo', 'Título'); ?></th>
			<th><?php echo $this->Paginator->sort('historico', 'Hitórico'); ?></th>
			<th><?php echo $this->Paginator->sort('Cadastrado'); ?></th>
			<th><?php echo $this->Paginator->sort('Alterado'); ?></th>
			<th class="actions"><?php echo __('Menu'); ?></th>
	</tr>
	<?php foreach ($pendencias as $pendencia): ?>
	<tr>
		<td><?php echo h($pendencia['Pendencia']['id']); ?>&nbsp;</td>
		<td><?php echo date("d/m/y", strtotime($pendencia['Pendencia']['data'])); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($pendencia['User']['username'], array('controller' => 'users', 'action' => 'view', $pendencia['User']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($pendencia['Situacao']['nome'], array('controller' => 'situacaos', 'action' => 'view', $pendencia['Situacao']['id'])); ?>
		</td>
		<td class="actions">
		    <?php if ($pendencia['Situacao']['id'] <> 3) echo $this->Html->link(__('Fechar'), array('action' => 'fechar', $pendencia['Pendencia']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($pendencia['Grupo']['nome'], array('controller' => 'grupos', 'action' => 'view', $pendencia['Grupo']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($pendencia['Pessoa']['nome'], array('controller' => 'pessoas', 'action' => 'view', $pendencia['Pessoa']['id'])); ?>
		</td>
		<td><?php echo h($pendencia['Pessoa']['fone']); ?>&nbsp;<?php echo h($pendencia['Pessoa']['celular']); ?></td>
		<td><?php echo h($pendencia['Pendencia']['titulo']); ?>&nbsp;</td>
		<td><?php echo h($pendencia['Pendencia']['historico']); ?>&nbsp;</td>
		<td><?php echo date("d/m/y H:i:s", strtotime($pendencia['Pendencia']['created'])); ?>&nbsp;</td>
		<td><?php echo date("d/m/y H:i:s", strtotime($pendencia['Pendencia']['modified'])); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('Ver'), array('action' => 'view', $pendencia['Pendencia']['id'])); ?>
			<?php echo $this->Html->link(__('Editar'), array('action' => 'edit', $pendencia['Pendencia']['id'])); ?>
			<?php echo $this->Form->postLink(__('Deletar'), array('action' => 'delete', $pendencia['Pendencia']['id']), null, __('Deseja excluir# %s?', $pendencia['Pendencia']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Pagina {:page} de {:pages}, mostrando {:current} registros de {:count} total, iniciando no registro {:start}, finalizando em {:end}')
	));
	?>	</p>
	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('Anterior'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('Proximo') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
<div class="actions">
	<h3><?php echo __('Menu'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Nova Pendência'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('Listar Usuários'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Listar Situações'), array('controller' => 'situacaos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Listar Grupos'), array('controller' => 'grupos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Listar Pessoas'), array('controller' => 'pessoas', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Listar Agenda'), array('controller' => 'agendas', 'action' => 'index')); ?> </li>
	</ul>
</div>
