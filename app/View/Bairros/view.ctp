<div class="bairros view">
<h2><?php  echo __('Bairro'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($bairro['Bairro']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Nome'); ?></dt>
		<dd>
			<?php echo h($bairro['Bairro']['nome']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Cidade'); ?></dt>
		<dd>
			<?php echo $this->Html->link($bairro['Cidade']['nome'], array('controller' => 'cidades', 'action' => 'view', $bairro['Cidade']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Menu'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Editar Bairro'), array('action' => 'edit', $bairro['Bairro']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Bairro'), array('action' => 'delete', $bairro['Bairro']['id']), null, __('Deseja excluir# %s?', $bairro['Bairro']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Listar Bairros'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Novo Bairro'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('Listar Cidades'), array('controller' => 'cidades', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Novo Cidade'), array('controller' => 'cidades', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('Listar Pessoas'), array('controller' => 'pessoas', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Novo Pessoa'), array('controller' => 'pessoas', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Pessoas Relacionadas'); ?></h3>
	<?php if (!empty($bairro['Pessoa'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Nome'); ?></th>
		<th><?php echo __('Nascimento'); ?></th>		
		<th><?php echo __('Endereço'); ?></th>
		<th><?php echo __('Número'); ?></th>
		<th><?php echo __('Cidade'); ?></th>
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
		foreach ($bairro['Pessoa'] as $pessoa): ?>
		<tr>
			<td><?php echo $pessoa['id']; ?></td>
			<td><?php echo $pessoa['nome']; ?></td>
			<td><?php echo date("d/m/y", strtotime($pessoa['nascimento'])); ?></td>
			<td><?php echo $pessoa['endereco']; ?></td>
			<td><?php echo $pessoa['numero']; ?></td>
			<td><?php echo $this->Html->link($pessoa['Cidade']['nome'], array('controller' => 'cidades', 'action' => 'view', $pessoa['cidade_id'])); ?>
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
	<h3><?php echo __('Pendências Relacionadas'); ?></h3>
	<?php include dirname(dirname(__FILE__)) . DIRECTORY_SEPARATOR . 'filtros2.php'; ?>
	<?php if (!empty($pendencias)): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Data'); ?></th>
		<th><?php echo __('Usuário'); ?></th>
		<th><?php echo __('Pessoa'); ?></th>
		<th><?php echo __('Situação'); ?></th>
		<th><?php echo __('Grupo'); ?></th>
		<th><?php echo __('Título'); ?></th>
		<th><?php echo __('Histórico'); ?></th>
		<th class="actions"><?php echo __('Menu'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($pendencias as $pendencia): ?>
		<tr>
			<td><?php echo $pendencia['Pendencia']['id']; ?></td>
			<td><?php echo date("d/m/y", strtotime($pendencia['Pendencia']['data'])); ?></td>
			<td><?php echo $this->Html->link($pendencia['User']['username'], array('controller' => 'users', 'action' => 'view', $pendencia['Pendencia']['user_id'])); ?>
			<td><?php echo $this->Html->link($pendencia['Pessoa']['nome'], array('controller' => 'pessoas', 'action' => 'view', $pendencia['Pendencia']['pessoa_id'])); ?>
			<td><?php echo $this->Html->link($pendencia['Situacao']['nome'], array('controller' => 'situacaos', 'action' => 'view', $pendencia['Pendencia']['situacao_id'])); ?>
			<td><?php echo $this->Html->link($pendencia['Grupo']['nome'], array('controller' => 'grupos', 'action' => 'view', $pendencia['Pendencia']['grupo_id'])); ?>
			<td><?php echo $pendencia['Pendencia']['titulo']; ?></td>
			<td><?php echo $pendencia['Pendencia']['historico']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('Ver'), array('controller' => 'pendencias', 'action' => 'view', $pendencia['Pendencia']['id'])); ?>
				<?php echo $this->Html->link(__('Editar'), array('controller' => 'pendencias', 'action' => 'edit', $pendencia['Pendencia']['id'])); ?>
				<?php echo $this->Form->postLink(__('Deletar'), array('controller' => 'pendencias', 'action' => 'delete', $pendencia['Pendencia']['id']), null, __('Deseja excluir# %s?', $pendencia['Pendencia']['id'])); ?>
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