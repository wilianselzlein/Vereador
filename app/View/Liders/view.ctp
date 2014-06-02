<div class="liders view">
<h2><?php  echo __('Líder'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($lider['Lider']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Nome'); ?></dt>
		<dd>
			<?php echo h($lider['Lider']['nome']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Fone'); ?></dt>
		<dd>
			<?php echo h($lider['Lider']['fone']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Menu'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Editar Líder'), array('action' => 'edit', $lider['Lider']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Deleta Líder'), array('action' => 'delete', $lider['Lider']['id']), null, __('Deseja delete # %s?', $lider['Lider']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Listar Líders'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Novo Líder'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('Listar Pessoas'), array('controller' => 'pessoas', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nova Pessoa'), array('controller' => 'pessoas', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Pessoas Relacionadas'); ?></h3>
	<?php if (!empty($lider['Pessoa'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Nome'); ?></th>
		<th><?php echo __('Endereço'); ?></th>
		<th><?php echo __('Número'); ?></th>
		<th><?php echo __('Bairro'); ?></th>
		<th><?php echo __('Cep'); ?></th>
		<th><?php echo __('Fone'); ?></th>
		<th><?php echo __('Email'); ?></th>
		<th><?php echo __('Celular'); ?></th>
		<th><?php echo __('Documento'); ?></th>
		<th><?php echo __('Título'); ?></th>
		<th><?php echo __('Zona'); ?></th>
		<th><?php echo __('Seção'); ?></th>
		<th><?php echo __('Obs'); ?></th>
		<th><?php echo __('Cadastrado'); ?></th>
		<th><?php echo __('Alterado'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($lider['Pessoa'] as $pessoa): ?>
		<tr>
			<td><?php echo $pessoa['id']; ?></td>
			<td><?php echo $pessoa['nome']; ?></td>
			<td><?php echo $pessoa['endereco']; ?></td>
			<td><?php echo $pessoa['numero']; ?></td>
			<td><?php echo $this->Html->link($bairro[$pessoa['bairro_id']], array('controller' => 'bairros', 'action' => 'view', $pessoa['bairro_id'])); ?>
			<td><?php echo $pessoa['cep']; ?></td>
			<td><?php echo $pessoa['fone']; ?></td>
			<td><?php echo $pessoa['email']; ?></td>
			<td><?php echo $pessoa['celular']; ?></td>
			<td><?php echo $pessoa['documento']; ?></td>
			<td><?php echo $pessoa['titulo']; ?></td>
			<td><?php echo $pessoa['zona']; ?></td>
			<td><?php echo $pessoa['secao']; ?></td>
			<td><?php echo $pessoa['obs']; ?></td>
			<td><?php echo date("d/m/y H:i:s", strtotime($pessoa['created'])); ?></td>
			<td><?php echo date("d/m/y H:i:s", strtotime($pessoa['modified'])); ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('Ver'), array('controller' => 'pessoas', 'action' => 'view', $pessoa['id'])); ?>
				<?php echo $this->Html->link(__('Editar'), array('controller' => 'pessoas', 'action' => 'edit', $pessoa['id'])); ?>
				<?php echo $this->Form->postLink(__('Deletar'), array('controller' => 'pessoas', 'action' => 'delete', $pessoa['id']), null, __('Are you sure you want to delete # %s?', $pessoa['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('Nova Pessoa'), array('controller' => 'pessoas', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
