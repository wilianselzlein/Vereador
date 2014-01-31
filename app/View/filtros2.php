	<!-- Filtros Wilian: -->
	<?php include dirname(__FILE__) . DIRECTORY_SEPARATOR . 'javascript.php'; ?>
	<?php include dirname(__FILE__) . DIRECTORY_SEPARATOR . 'chosen.html'; //no linux mudar o caminho para apenas / ?>
	<?php echo $this->Search->create(); ?>
	<div class="filter">
		<table border="0" width="100%">
			<tr>
				<td width="10%"><br><?php echo $this->Search->input('filter2', array('class' => 'select-box chzn-select')); ?></td>
				<td width="80%"><br><div><?php echo $this->Search->input('filter1', array('style' => 'border: 1px solid #aaa;')); ?></div></td>
				<td width="10%"><?php echo $this->Search->end(__('Filtrar', true)); ?></td>
			</tr>
		</table>
	</div>
	<?php include dirname(__FILE__) . DIRECTORY_SEPARATOR . 'chosenjs.html'; ?>
	<!-- Fim Filtros -->
