<div class="pessoas view">
<h2><?php  echo __('Pessoa'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($pessoa['Pessoa']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Nome'); ?></dt>
		<dd>
			<?php echo h($pessoa['Pessoa']['nome']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Endereço'); ?></dt>
		<dd>
			<?php echo h($pessoa['Pessoa']['endereco']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Número'); ?></dt>
		<dd>
			<?php echo h($pessoa['Pessoa']['numero']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Bairro'); ?></dt>
		<dd>
			<?php echo $this->Html->link($pessoa['Bairro']['nome'], array('controller' => 'bairros', 'action' => 'view', $pessoa['Bairro']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Cidade'); ?></dt>
		<dd>
			<?php echo $this->Html->link($pessoa['Cidade']['nome'], array('controller' => 'cidades', 'action' => 'view', $pessoa['Cidade']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('CEP'); ?></dt>
		<dd>
			<?php echo h($pessoa['Pessoa']['cep']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Fone'); ?></dt>
		<dd>
			<?php echo h($pessoa['Pessoa']['fone']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Email'); ?></dt>
		<dd>
			<?php echo h($pessoa['Pessoa']['email']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Celular'); ?></dt>
		<dd>
			<?php echo h($pessoa['Pessoa']['celular']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Documento'); ?></dt>
		<dd>
			<?php echo h($pessoa['Pessoa']['documento']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Título'); ?></dt>
		<dd>
			<?php echo h($pessoa['Pessoa']['titulo']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Zona'); ?></dt>
		<dd>
			<?php echo h($pessoa['Pessoa']['zona']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Seção'); ?></dt>
		<dd>
			<?php echo h($pessoa['Pessoa']['secao']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Obs'); ?></dt>
		<dd>
			<?php echo h($pessoa['Pessoa']['obs']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Nascimento'); ?></dt>
		<dd>
			<?php echo date("d/m/y", strtotime($pessoa['Pessoa']['nascimento'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Cadastrado'); ?></dt>
		<dd>
			<?php echo date("d/m/y H:i:s", strtotime($pessoa['Pessoa']['created'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Alterado'); ?></dt>
		<dd>
			<?php echo date("d/m/y H:i:s", strtotime($pessoa['Pessoa']['modified'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Menu'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Editar Pessoa'), array('action' => 'edit', $pessoa['Pessoa']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Deletar Pessoa'), array('action' => 'delete', $pessoa['Pessoa']['id']), null, __('Deseja excluir# %s?', $pessoa['Pessoa']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Listar Pessoas'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Listar Cidades'), array('controller' => 'cidades', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Listar Bairros'), array('controller' => 'bairros', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Listar Pendências'), array('controller' => 'pendencias', 'action' => 'index')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Pendências Relacionadas'); ?></h3>
	<?php if (!empty($pessoa['Pendencia'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Data'); ?></th>
		<th><?php echo __('Usuário'); ?></th>
		<th><?php echo __('Situação'); ?></th>
		<th><?php echo __('Grupo'); ?></th>
		<th><?php echo __('Título'); ?></th>
		<th><?php echo __('Histórico'); ?></th>
		<th><?php echo __('Cadastrado'); ?></th>
		<th><?php echo __('Alterado'); ?></th>
		<th class="actions"><?php echo __('Menu'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($pessoa['Pendencia'] as $pendencia): ?>
		<tr>
			<td><?php echo $pendencia['id']; ?></td>
			<td><?php echo date("d/m/y", strtotime($pendencia['data'])); ?></td>
			<td><?php echo $this->Html->link($user[$pendencia['user_id']], array('controller' => 'users', 'action' => 'view', $pendencia['user_id'])); ?>
			<td><?php echo $this->Html->link($situacao[$pendencia['situacao_id']], array('controller' => 'situacaos', 'action' => 'view', $pendencia['situacao_id'])); ?>
			<td><?php echo $this->Html->link($grupo[$pendencia['grupo_id']], array('controller' => 'grupos', 'action' => 'view', $pendencia['grupo_id'])); ?>
			<td><?php echo $pendencia['titulo']; ?></td>
			<td><?php echo $pendencia['historico']; ?></td>
			<td><?php echo date("d/m/y H:i:s", strtotime($pendencia['modified'])); ?></td>
			<td><?php echo date("d/m/y H:i:s", strtotime($pendencia['created'])); ?></td>
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
