	<!-- Filtros Wilian: -->
	<?php include dirname(__FILE__) . DIRECTORY_SEPARATOR . 'javascript.php'; ?>
	<?php include dirname(__FILE__) . DIRECTORY_SEPARATOR . 'chosen.html'; ?>
	<?php echo $this->Search->create(); ?>
	<div class="filter">
		<table border="0" width="100%">
			<tr>
				<td width="10%"><br>Data:<?php echo $this->Search->input('filter4', array('id' => 'data1'), array('id' => 'data2')); ?></td>                                
				<td width="10%"><br><?php echo $this->Search->input('filter5', array('class' => 'select-box chzn-select')); ?></td>
                                <td width="80%"><br><?php echo $this->Search->input('filter2', array('class' => 'select-box chzn-select')); ?></td>
			</tr>		
                        <tr>
                                <td width="10%"><br><?php echo $this->Search->input('filter3', array('class' => 'select-box chzn-select')); ?></td>
                                <td width="10%"><br><?php echo $this->Search->input('filter6', array('class' => 'select-box chzn-select')); ?></td>
                                <td width="70%"><br><div><?php echo $this->Search->input('filter1', array('style' => 'border: 1px solid #aaa;')); ?></div></td>
				<td width="10%"><?php echo $this->Search->end(__('Filtrar', true)); ?></td>
                        </tr>
		</table>
	</div>
	<?php include dirname(__FILE__) . DIRECTORY_SEPARATOR . 'chosenjs.html'; ?>
	<!-- Fim Filtros -->
 
