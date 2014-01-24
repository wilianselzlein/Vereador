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
    
    <h3><?php echo __('Tarefas:'); ?></h3>
    <table border="0">
    <tr>
	<th><?php echo __('Última(s) tarefa(s):'); ?></th>
	<th><?php echo __('Próxima(s) tarefa(s):'); ?></th>
    </tr>
    <tr>
	<td>    
	    <ul>
		<li><?php echo $this->Html->link('Tarefa', array('controller' => 'agendas', 'action' => 'view', 1)); echo __(' bla bla bla'); ?></li>
	    </ul>
	</td>
	<td> 
	    <ul>
		<li><?php echo $this->Html->link('Tarefa', array('controller' => 'agendas', 'action' => 'view', 1)); echo __(' bla bla bla'); ?></li>
		<li><?php echo $this->Html->link('Tarefa', array('controller' => 'agendas', 'action' => 'view', 2)); echo __(' bla bla bla'); ?></li>
		<li><?php echo $this->Html->link('Tarefa', array('controller' => 'agendas', 'action' => 'view', 3)); echo __(' bla bla bla'); ?></li>
	    </ul>
	</td>
    </tr>
    </table> 
    <br>
    
    <h3><?php echo __('Pendências:'); ?></h3>
    <table border="0">
    <tr>
	<th><?php echo __('Última(s) cadastrada(s):'); ?></th>
	<th><?php echo __('Últimas(s) alteradas(s):'); ?></th>
    </tr>
    <tr>
	<td>    
	    <ul>
		<li><?php echo $this->Html->link('Tarefa', array('controller' => 'agendas', 'action' => 'view', 1)); echo __(' bla bla bla'); ?></li>
	    </ul>
	</td>
	<td> 
	    <ul>
		<li><?php echo $this->Html->link('Tarefa', array('controller' => 'agendas', 'action' => 'view', 1)); echo __(' bla bla bla'); ?></li>
		<li><?php echo $this->Html->link('Tarefa', array('controller' => 'agendas', 'action' => 'view', 2)); echo __(' bla bla bla'); ?></li>
		<li><?php echo $this->Html->link('Tarefa', array('controller' => 'agendas', 'action' => 'view', 3)); echo __(' bla bla bla'); ?></li>
	    </ul>
	</td>
    </tr>
    </table> 

    <table border="0">
    <tr>
	<th><?php echo __('Aberta(s):'); ?></th>
	<th><?php echo __('Pendente(s):'); ?></th>
	<th><?php echo __('Fechadas(s):'); ?></th>
    </tr>
    <tr>
	<td>    
	    <span class="notice">
		<?php echo __d('cake_dev', 'Your version of PHP is 5.2.8 or higher.'); ?>
	    </span>
	    <span class="notice">
		<?php echo __d('cake_dev', 'Your version of PHP is 5.2.8 or higher.'); ?>
	    </span>
	</td>
	<td>    
	    <span class="notice error-message">
		<?php echo $this->Html->link('Tarefa', array('controller' => 'agendas', 'action' => 'view', 1)); echo __(' bla bla bla'); ?>
	    </span>
	    <span class="notice error-message">
		<?php echo __d('cake_dev', 'Your version of PHP is 5.2.8 or higher.'); ?>
	    </span>
	</td>
	<td> 
	    <span class="notice success">
		<?php echo $this->Html->link('Tarefa', array('controller' => 'agendas', 'action' => 'view', 1)); echo __(' bla bla bla'); ?>
	    </span>
	    <span class="notice success">
		<?php echo __d('cake_dev', 'Your version of PHP is 5.2.8 or higher.'); ?>
	    </span>
	</td>
    </tr>
    </table> 

</div>
