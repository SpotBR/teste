<?php
	function expandirArvore($filhos, $pai, &$disponiveis, &$i) {
		if($i == 0) {
			echo '<ul id="org" style="display: none;">';
		}
		else {
			echo '<ul>';
		}

		foreach($filhos as $filho) {
			$i++;

			echo "<li>
						<a data-i=\"{$i}\" data-pai=\"$pai\" href=\"javascript:void(0)\" title=\"{$filho['nome']}\" data-toggle=\"tooltip\" data-placement=\"top\" >
							<i class=\"fa fa-fw fa-user\"></i>
						</a>";

			if(!empty($filho['Filho'])) {
				expandirArvore($filho['Filho'], $i, $disponiveis, $i);
			}

			if(count($filho['Filho']) < 2) {
				$disponivel = $filho;
				unset($disponivel['Filho']);
				$disponiveis[] = $disponivel;
			}
			echo "</li>";
		}
		echo '</ul>';
	}

	$this->start('css');
	echo $this->Html->css('jquery.jOrgChart');
	$this->end('css');


	$this->start('script');
	echo $this->Html->script('jquery.jOrgChart');
?>
	<script>
		$("#org").jOrgChart({chartElement: "#arvore"});
		$('[data-toggle="tooltip"]').tooltip();
	</script>

<?php
	$this->end('script');