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
* @copyright Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
* @link http://cakephp.org CakePHP(tm) Project
* @package Cake.View.Errors
* @since CakePHP(tm) v 0.10.0.1076
* @license MIT License (http://www.opensource.org/licenses/mit-license.php)
*/
?>
<h2><?php echo __d('cake_dev', 'Erro de Banco de Dados'); ?></h2>
<p class="error">
        <strong><?php echo __d('cake_dev', 'Error'); ?>: </strong>
        <?php echo $name; ?>
</p>
<?php if (!empty($error->queryString)) : ?>
        <p class="notice">
                <strong><?php echo __d('cake_dev', 'SQL Query'); ?>: </strong>
                <?php echo h($error->queryString); ?>
        </p>
<?php endif; ?>
<?php if (!empty($error->params)) : ?>
                <strong><?php echo __d('cake_dev', 'SQL Query Params'); ?>: </strong>
                <?php echo Debugger::dump($error->params); ?>
<?php endif; ?>
<p class="notice">
        <strong><?php echo __d('cake_dev', 'Ajuda'); ?>: </strong>
        <?php echo __d('cake_dev', 'Qualquer dúvida peça ajuda ao suporte técnico.'); ?>
</p>
