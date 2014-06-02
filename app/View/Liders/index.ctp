<div class="liders index">
	<h2><?php echo __('Líders'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('nome'); ?></th>
			<th><?php echo $this->Paginator->sort('fone'); ?></th>
			<th class="actions"><?php echo __('Menu'); ?></th>
	</tr>
	<?php foreach ($liders as $lider): ?>
	<tr>
		<td><?php echo h($lider['Lider']['id']); ?>&nbsp;</td>
		<td><?php echo h($lider['Lider']['nome']); ?>&nbsp;</td>
		<td><?php echo h($lider['Lider']['fone']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('Ver'), array('action' => 'view', $lider['Lider']['id'])); ?>
			<?php echo $this->Html->link(__('Editar'), array('action' => 'edit', $lider['Lider']['id'])); ?>
			<?php echo $this->Form->postLink(__('Deletar'), array('action' => 'delete', $lider['Lider']['id']), null, __('Deseja deletar # %s?', $lider['Lider']['id'])); ?>
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
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Novo Líder'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('Listar Pessoas'), array('controller' => 'pessoas', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nova Pessoa'), array('controller' => 'pessoas', 'action' => 'add')); ?> </li>
	</ul>
</div>
