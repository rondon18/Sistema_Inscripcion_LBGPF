	<?php
		$nombreImagen = "../img/logo.jpg";
		$imagenBase64 = "data:image/jpg;base64," . base64_encode(file_get_contents($nombreImagen));
	?>

	<div class="text-center mb-3">
		<img class="w-100 mx-auto" src="<?php echo $imagenBase64; ?>" alt="">
	</div>

	<p class="text-center text-uppercase mb-2" style="font-size: 1.5rem">
		INSCRIPCIÓN AÑO ESCOLAR
		<?php
			// echo "2023-2024";
			// echo date("Y") . "-" . date('Y', strtotime('+1 year')) ;
		echo $per_academico->get_inicio() . "-" . $per_academico->get_fin();
		?>
	</p>

	<p class="text-center text-uppercase" style="font-size: 1.1rem">
		Planilla de registro del estudiante
	</p>

	<table cellspacing="10" class="mb-3">
		<tr>
			<td>
				<table class="table table-sm small text-uppercase tabla-datos mx-auto my-auto" style="font-size: .65rem;">
					<tr>
						<td style="border: none !important"></td>
						<td class="bg-info">1er año fecha</td>
						<td class="bg-info">2do año fecha</td>
						<td class="bg-info">3er año fecha</td>
						<td class="bg-info">4to año fecha</td>
						<td class="bg-info">5to año fecha</td>
					</tr>
					<tr>
						<td style="height: 30px;">INDIQUE CON UNA X EL AÑO DE ESTUDIO</td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
					</tr>
					<tr>
						<td style="height: 30px;">SECCIÓN (DEJAR EN BLANCO)</td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
					</tr>
				</table>
			</td>
			<td width="25%" class="px-4">
				<div class="p-3 text-center" style="border: black solid 1px; height: 4cm; width: 3cm;">
					<p class="my-auto">
						Foto del estudiante
					</p>
				</div>
			</td>
		</tr>
	</table>