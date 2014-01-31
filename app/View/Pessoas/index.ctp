<div class="pessoas index">
	<h2><?php echo __('Pessoas'); ?></h2>
	<?php include dirname(dirname(__FILE__)) . DIRECTORY_SEPARATOR . 'filtros.php'; ?>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('nome', 'Nome'); ?></th>
			<th><?php echo $this->Paginator->sort('nascimento'); ?></th>			
			<th><?php echo $this->Paginator->sort('endereco', 'Endereço'); ?></th>
			<th><?php echo $this->Paginator->sort('numero', 'Número'); ?></th>
			<th><?php echo $this->Paginator->sort('bairro'); ?></th>
			<th><?php echo $this->Paginator->sort('cidade_id'); ?></th>
			<th><?php echo $this->Paginator->sort('cep', 'CEP'); ?></th>
			<th><?php echo $this->Paginator->sort('fone'); ?></th>
			<th><?php echo $this->Paginator->sort('email'); ?></th>
			<th><?php echo $this->Paginator->sort('celular'); ?></th>
			<th><?php echo $this->Paginator->sort('Documento'); ?></th>
			<th><?php echo $this->Paginator->sort('titulo', 'Título'); ?></th>
			<th><?php echo $this->Paginator->sort('zona'); ?></th>
			<th><?php echo $this->Paginator->sort('secao', 'Seção'); ?></th>
			<th><?php echo $this->Paginator->sort('obs'); ?></th>
			<th><?php echo $this->Paginator->sort('Cadastrado'); ?></th>
			<th><?php echo $this->Paginator->sort('Alterado'); ?></th>
			<th class="actions"><?php echo __('Menu'); ?></th>
	</tr>
	<?php foreach ($pessoas as $pessoa): ?>
	<tr>
		<td><?php echo h($pessoa['Pessoa']['id']); ?>&nbsp;</td>
		<td><?php echo h($pessoa['Pessoa']['nome']); ?>&nbsp;</td>
		<td><?php echo date("d/m/y", strtotime($pessoa['Pessoa']['nascimento'])); ?>&nbsp;</td>
		<td><?php echo h($pessoa['Pessoa']['endereco']); ?>&nbsp;</td>
		<td><?php echo h($pessoa['Pessoa']['numero']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($pessoa['Bairro']['nome'], array('controller' => 'bairros', 'action' => 'view', $pessoa['Bairro']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($pessoa['Cidade']['nome'], array('controller' => 'cidades', 'action' => 'view', $pessoa['Cidade']['id'])); ?>
		</td>
		<td><?php echo h($pessoa['Pessoa']['cep']); ?>&nbsp;</td>
		<td><?php echo h($pessoa['Pessoa']['fone']); ?>&nbsp;</td>
		<td><?php echo h($pessoa['Pessoa']['email']); ?>&nbsp;</td>
		<td><?php echo h($pessoa['Pessoa']['celular']); ?>&nbsp;</td>
		<td><?php echo h($pessoa['Pessoa']['documento']); ?>&nbsp;</td>
		<td><?php echo h($pessoa['Pessoa']['titulo']); ?>&nbsp;</td>
		<td><?php echo h($pessoa['Pessoa']['zona']); ?>&nbsp;</td>
		<td><?php echo h($pessoa['Pessoa']['secao']); ?>&nbsp;</td>
		<td><?php echo h($pessoa['Pessoa']['obs']); ?>&nbsp;</td>
		<td><?php echo date("d/m/y H:i:s", strtotime($pessoa['Pessoa']['created'])); ?>&nbsp;</td>
		<td><?php echo date("d/m/y H:i:s", strtotime($pessoa['Pessoa']['modified'])); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('Ver'), array('action' => 'view', $pessoa['Pessoa']['id'])); ?>
			<?php echo $this->Html->link(__('Editar'), array('action' => 'edit', $pessoa['Pessoa']['id'])); ?>
			<?php echo $this->Form->postLink(__('Deletar'), array('action' => 'delete', $pessoa['Pessoa']['id']), null, __('Deseja excluir# %s?', $pessoa['Pessoa']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('Nova Pessoa'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('Listar Cidades'), array('controller' => 'cidades', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Listar Bairros'), array('controller' => 'bairros', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Listar Pendências'), array('controller' => 'pendencias', 'action' => 'index')); ?> </li>
	</ul>
</div>
