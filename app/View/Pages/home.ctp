<?php
/**
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Pages
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

if (!Configure::read('debug')):
	throw new NotFoundException();
endif;

App::uses('Debugger', 'Utility');

//header('Location: /vereador/pendencias/');
//exit;
?>

<div class="actions">
	<h3><?php echo __('Menu'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Pendências'), array('controller' => 'pendencias', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Pessoas'), array('controller' => 'pessoas', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Agenda'), array('controller' => 'agendas', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Grupos'), array('controller' => 'grupos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Situações'), array('controller' => 'situacaos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Cidades'), array('controller' => 'cidades', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Bairros'), array('controller' => 'bairros', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Usuários'), array('controller' => 'users', 'action' => 'index')); ?> </li>
	</ul>
</div>
<div class="index">
    <table border="0" cellpadding="0" cellspacing="0" style="margin-bottom: 0px">
	<tr style="padding: 0px;">
	    <td style="padding: 0px; border-bottom:0px" width="30%">
		<h3><?php echo ClassRegistry::init('Agenda')->find('count'); echo __(' Tarefa(s):'); ?></h3>
	    </td>
	    <td style="padding: 0px; border-bottom:0px" width="70%">
		<div class="actions">
		<?php echo $this->Html->link(__('Nova Tarefa'), array('controller' => 'agendas', 'action' => 'add')); ?>
		</div>
	    </td>
	</tr>
    </table>
    <table border="0">
    <tr>
	<th><?php echo __('Última(s) tarefa(s):'); ?></th>
	<th><?php echo __('Próxima(s) tarefa(s):'); ?></th>
    </tr>
    <tr>    
	<td>    
	    <ul>
		<?php 
		    $tarefas = ClassRegistry::init('Agenda')->find('all', array('limit' => 5, 'conditions' => array('Agenda.data < ' => date('y.m.d')), 'order' => 'Agenda.data desc')); 
		    foreach ($tarefas as $tarefa) { ?>
			<li><?php echo __(date('d/m G:i', strtotime($tarefa['Agenda']['data'])) . ' '); echo $this->Html->link($tarefa['Agenda']['descricao'], array('controller' => 'agendas', 'action' => 'view', $tarefa['Agenda']['id'])); ?></li>
		<?php } ?>
	    </ul>
	</td>
	<td> 
	    <ul>
		<?php 
		    $tarefas = ClassRegistry::init('Agenda')->find('all', array('limit' => 5, 'conditions' => array('Agenda.data >= ' => date('y.m.d')), 'order' => 'Agenda.data asc')); 
		    foreach ($tarefas as $tarefa) { ?>
			<li><?php echo __(date('d/m G:i', strtotime($tarefa['Agenda']['data'])) . ' '); echo $this->Html->link($tarefa['Agenda']['descricao'], array('controller' => 'agendas', 'action' => 'view', $tarefa['Agenda']['id'])); ?></li>
		<?php } ?>
	    </ul>
	</td>
    </tr>
    </table> 
    <br>
    
    <table border="0" cellpadding="0" cellspacing="0" style="margin-bottom: 0px">
	<tr style="padding: 0px;">
	    <td style="padding: 0px; border-bottom:0px" width="30%">
		<h3><?php echo ClassRegistry::init('Pendencias')->find('count'); echo __(' Pendência(s):'); ?></h3>
	    </td>
	    <td style="padding: 0px; border-bottom:0px" width="70%">
		<div class="actions">
		<?php echo $this->Html->link(__('Nova Pend.'), array('controller' => 'pendencias', 'action' => 'add')); ?>
		</div>
	    </td>
	</tr>
    </table>
    <table border="0">
    <tr>
	<th><?php echo __('Última(s) cadastrada(s):'); ?></th>
	<th><?php echo __('Última(s) alteradas(s):'); ?></th>
    </tr>
    <tr>
	<td>    
	    <ul>
		<?php 
		    $pends = ClassRegistry::init('Pendencia')->find('all', array('limit' => 5, 'order' => 'Pendencia.created desc')); 
		    foreach ($pends as $pen) { ?>
			<li><?php echo __(date('d/m H:i', strtotime($pen['Pendencia']['created'])) . ' '); echo $this->Html->link($pen['Pendencia']['titulo'], array('controller' => 'pendencias', 'action' => 'view', $pen['Pendencia']['id'])); ?></li>
		<?php } ?>
	    </ul>
	</td>
	<td> 
	    <ul>
		<?php 
		    $pends = ClassRegistry::init('Pendencia')->find('all', array('limit' => 5, 'order' => 'Pendencia.modified desc')); 
		    foreach ($pends as $pen) { ?>
			<li><?php echo __(date('d/m H:i', strtotime($pen['Pendencia']['modified'])) . ' '); echo $this->Html->link($pen['Pendencia']['titulo'], array('controller' => 'pendencias', 'action' => 'view', $pen['Pendencia']['id'])); ?></li>
		<?php } ?>
	    </ul>
	</td>
    </tr>
    </table> 
</div>
<div class="related">
    <table border="0">
    <tr>
	<th width="33%"><?php echo __('Pendente(s):'); ?></th>
	<th width="33%"><?php echo __('Fechadas(s):'); ?></th>
    </tr>
    <tr>
	<td>    
	    <?php 
		$pends = ClassRegistry::init('Pendencia')->find('all', array('limit' => 5, 'order' => 'Pendencia.data desc', 'conditions' => array('Pendencia.situacao_id ' => '2'))); 
		foreach ($pends as $pen) { ?>
		    <span class="notice error-message"><?php echo __(date('d/m/y', strtotime($pen['Pendencia']['data'])) . ' '); echo $this->Html->link($pen['Pendencia']['titulo'] . ' - ' . $pen['Pessoa']['nome'], array('controller' => 'pendencias', 'action' => 'view', $pen['Pendencia']['id'])); ?></span>
	    <?php } ?>
	</td>
	<td> 
	    <?php 
		$pends = ClassRegistry::init('Pendencia')->find('all', array('limit' => 5, 'order' => 'Pendencia.data desc', 'conditions' => array('Pendencia.situacao_id ' => '3'))); 
		foreach ($pends as $pen) { ?>
		    <span class="notice success"><?php echo __(date('d/m/y', strtotime($pen['Pendencia']['data'])) . ' '); echo $this->Html->link($pen['Pendencia']['titulo'] . ' - ' . $pen['Pessoa']['nome'], array('controller' => 'pendencias', 'action' => 'view', $pen['Pendencia']['id'])); ?></span>
	    <?php } ?>
	</td>
    </tr>
    </table> 
	<h3><?php echo __('Aniversariante(s)'); ?></h3>
	<ul>
	    <?php 
		$anivs = ClassRegistry::init('Pessoa')->find('all', array('conditions' => array('EXTRACT(month FROM Pessoa.nascimento) ' => date('m')), 'order' => 'EXTRACT(DAY FROM Pessoa.nascimento)')); 
		foreach ($anivs as $pessoa) { ?>
		    <li><?php echo __(date('d', strtotime($pessoa['Pessoa']['nascimento'])) . ' '); echo $this->Html->link($pessoa['Pessoa']['nome'], array('controller' => 'pessoas', 'action' => 'view', $pessoa['Pessoa']['id'])); echo ' '; echo __($pessoa['Pessoa']['fone'] . ' ' . $pessoa['Pessoa']['celular']); ?></li>
	    <?php } ?>
	</ul>
</div>