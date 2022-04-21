<?php
if (isset($_POST["submit"]) && $_SERVER["REQUEST_METHOD"] == "POST") {
	require_once "../../vendor/autoload.php";

	$args = array(
		'income_date'   			=> array(
			'filter'  => FILTER_SANITIZE_STRING,
			'flags'   => FILTER_REQUIRE_ARRAY,
		),
		'income_description' 	=> array(
			'filter'  => FILTER_SANITIZE_STRING,
			'flags'   => FILTER_REQUIRE_ARRAY,
		),
		'income_amount'      	=> array(
			// FILTER_VALIDATE_INT ignora los números que empiezan por 0, por lo que evitamos que sean ignorados
			'filter'  => filter_var(ltrim($val, '0'), FILTER_VALIDATE_INT) || filter_var($val, FILTER_VALIDATE_INT) === 0,
			'flags'   => FILTER_REQUIRE_ARRAY,
		),
		'expense_date'			 	=> array(
			'filter'  => FILTER_SANITIZE_STRING,
			'flags'   => FILTER_REQUIRE_ARRAY,
		),
		'expense_description'	=> array(
			'filter' => FILTER_SANITIZE_STRING,
			'flags'  => FILTER_REQUIRE_ARRAY,
		),
		'expense_amount'    	=> array(
			// FILTER_VALIDATE_INT ignora los números que empiezan por 0, por lo que evitamos que sean ignorados 
			'filter'  => filter_var(ltrim($val, '0'), FILTER_VALIDATE_INT) || filter_var($val, FILTER_VALIDATE_INT) === 0,
			'flags'   => FILTER_REQUIRE_ARRAY,
		),
	);

	$safe_post = filter_input_array(INPUT_POST, $args);

	$html = "
		<table>
			<thead>
				<tr>
					<th class='text-uppercase text-center header' colspan='6'>Balance</th>
				</tr>
				<tr>
					<th class='text-uppercase text-center subheader' colspan='3'>Ingresos</th>
					<th class='text-uppercase text-center subheader' colspan='3'>Gastos</th>
				</tr>
				<tr>
					<th class='field'>Fecha</th>
					<th class='field'>Descripción</th>
					<th class='field'>Cantidad</th>
					<th class='field'>Fecha</th>
					<th class='field'>Descripción</th>
					<th class='field'>Cantidad</th>
				</tr>
			</thead>
			<tbody>
		";

	$limit = 0;
	$income_length = count($safe_post["income_amount"]);
	$expense_length = count($safe_post["expense_amount"]);

	if ($income_length > $expense_length) {
		$limit = $income_length;
	} else {
		$limit = $expense_length;
	}

	$income_total = $expense_total = $current_balance = 0;

	if ($limit > 0) {
		for ($i = 0; $i < $limit; $i++) {
			$row = $valid_income_amount = $valid_expense_amount = "";

			if (!empty($safe_post["income_amount"][$i])) {
				$valid_income_amount = $safe_post["income_amount"][$i] . "€";
				$income_total += $safe_post["income_amount"][$i];
			}

			if (!empty($safe_post["expense_amount"][$i])) {
				$valid_expense_amount = $safe_post["expense_amount"][$i] . "€";
				$expense_total += $safe_post["expense_amount"][$i];
			}
			
			if ($i < $income_length && $i < $expense_length) {
				$row = "
					<tr>
						<td>{$safe_post["income_date"][$i]}</td>
						<td>{$safe_post["income_description"][$i]}</td>
						<td>{$valid_income_amount}</td>
						<td>{$safe_post["expense_date"][$i]}</td>
						<td>{$safe_post["expense_description"][$i]}</td>
						<td>{$valid_expense_amount}</td>
					</tr>
				";
			} else if ($i < $income_length) {
				$row = "
					<tr>
						<td>{$_POST["income_date"][$i]}</td>
						<td>{$_POST["income_description"][$i]}</td>
						<td>{$valid_income_amount}</td>
						<td></td>
						<td></td>
						<td></td>
					</tr>
				";
			} else if ($i < $expense_length) {
				$row = "
					<tr>
						<td></td>
						<td></td>
						<td></td>
						<td>{$_POST["expense_date"][$i]}</td>
						<td>{$_POST["expense_description"][$i]}</td>
						<td>{$valid_expense_amount}</td>
					</tr>
				";
			}

			$html .= $row;
		}
	}

	$current_balance = $income_total - $expense_total;
	$html .= "
				<tr>
					<td class='text-center' colspan='3'>
						<span class='text-bold'>Total de ingresos:</span> 
						<span>{$income_total}€</span>
					</td>
					<td class='text-center' colspan='3'>
						<span class='text-bold'>Total de gastos:</span>
						<span>{$expense_total}€</span>
					</td>
				</tr>
				<tr>
					<td class='text-center' colspan='6'>
						<span class='text-bold'>Balance actual:</span>
						<span>{$current_balance}€</span>
					</td>
				</tr>
			</tbody>
		</table>
	";

	$mpdf = new \Mpdf\Mpdf();

	$stylesheet = file_get_contents("../css/pdf.css");

	$mpdf->WriteHTML($stylesheet, 1);
	$mpdf->WriteHTML($html);
	$mpdf->Output();
}
