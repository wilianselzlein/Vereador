<div class="cidades view">
<h2><?php  echo __('Cidade'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($cidade['Cidade']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Nome'); ?></dt>
		<dd>
			<?php echo h($cidade['Cidade']['nome']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('UF'); ?></dt>
		<dd>
			<?php echo h($cidade['Cidade']['uf']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('CEP'); ?></dt>
		<dd>
			<?php echo h($cidade['Cidade']['cep']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Menu'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Editar Cidade'), array('action' => 'edit', $cidade['Cidade']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Deletar Cidade'), array('action' => 'delete', $cidade['Cidade']['id']), null, __('Deseja excluir# %s?', $cidade['Cidade']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Listar Cidades'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nova Cidade'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('Listar Pessoas'), array('controller' => 'pessoas', 'action' => 'index')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Pessoas Relacionadas'); ?></h3>
	<?php if (!empty($cidade['Pessoa'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Nome'); ?></th>
		<th><?php echo __('Nascimento'); ?></th>		
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
		<th class="actions"><?php echo __('Menu'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($cidade['Pessoa'] as $pessoa): ?>
		<tr>
			<td><?php echo $pessoa['id']; ?></td>
			<td><?php echo $pessoa['nome']; ?></td>
			<td><?php echo date("d/m/y", strtotime($pessoa['nascimento'])); ?></td>
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
				<?php echo $this->Form->postLink(__('Deletar'), array('controller' => 'pessoas', 'action' => 'delete', $pessoa['id']), null, __('Deseja excluir# %s?', $pessoa['id'])); ?>
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
	<br>
	<br>
	<br>
	<h3><?php echo __('Bairros Relacionados'); ?></h3>
	<?php if (!empty($cidade['Bairro'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Nome'); ?></th>		
		<th class="actions"><?php echo __('Menu'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($cidade['Bairro'] as $bairro): ?>
		<tr>
			<td><?php echo $bairro['id']; ?></td>
			<td><?php echo $bairro['nome']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('Ver'), array('controller' => 'bairros', 'action' => 'view', $bairro['id'])); ?>
				<?php echo $this->Html->link(__('Editar'), array('controller' => 'bairros', 'action' => 'edit', $bairro['id'])); ?>
				<?php echo $this->Form->postLink(__('Deletar'), array('controller' => 'bairros', 'action' => 'delete', $bairro['id']), null, __('Deseja excluir# %s?', $bairro['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
	<?php endif; ?>
	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('Novo Bairro'), array('controller' => 'bairros', 'action' => 'add')); ?> </li>
		</ul>
	</div>	
</div>
