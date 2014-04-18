<div class="pessoas index">
<h2> Etiquetas </h2>

<?php echo $this->Form->create(null, array('url' => array('controller' => 'Etiquetas', 'action' => 'viewPdf', 'type' => 'Post')));  ?>
    <fieldset>
	<?php echo $this->Form->input('filtro', array('label' => 'Digite o que deseja filtrar:')); ?>
    </fieldset>
<?php echo $this->Form->end(__('Gerar Etiquetas')); ?>
<?php //echo $this->Html->link('Gerar Etiquetas', array('action' => 'viewPdf')); ?>
</div>
<div class="actions">
    <h3><?php echo __('Menu'); ?></h3>
    <ul>
            <li><?php echo $this->Html->link(__('Listar Pessoas'), array('controller' => 'Pessoas', 'action' => 'index')); ?> </li>
    </ul>
</div>