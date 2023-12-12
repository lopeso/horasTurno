<?php
$table = new \CodeIgniter\View\Table();

$entradaTurno1 = $turno1['horaEntrada']->toTimeString();
$saidaTurno1 =$turno1['horaSaida']->toTimeString();
$periodoDiurnoTurno1 = $turno1['periodoDiurno']->toTimeString();
$periodoNoturnoTurno1 = $turno1['periodoNoturno']->toTimeString();



$entradaTurno2 = $turno2['horaEntrada']->toTimeString();
$saidaTurno2 =$turno2['horaSaida']->toTimeString();
$periodoDiurnoTurno2 = $turno2['periodoDiurno']->toTimeString();
$periodoNoturnoTurno2 = $turno2['periodoNoturno']->toTimeString();
$periodoDiurnoTurno2 = $turno2['periodoDiurno']->toTimeString();


$entradaTurno3 = $turno3['horaEntrada']->toTimeString();
$saidaTurno3 =$turno3['horaSaida']->toTimeString();
$periodoDiurnoTurno3 = $turno3['periodoDiurno']->toTimeString();
$periodoNoturnoTurno3 = $turno3['periodoNoturno']->toTimeString();
$data = [
    ['Turno', 'Hora Entrada', 'Hora Saida', 'Periodo diurno', 'Periodo noturno'],
    ['Turno1', $entradaTurno1, $saidaTurno1, $periodoDiurnoTurno1, $periodoNoturnoTurno1],
    ['Turno2', $entradaTurno2, $saidaTurno2, $periodoDiurnoTurno2, $periodoNoturnoTurno2],
    ['Turno3', $entradaTurno3, $saidaTurno3, $periodoDiurnoTurno3, $periodoNoturnoTurno3],
  
];

echo $table->generate($data);

    // echo $turno1['horaEntrada'];
    // echo $turno1['horaSaida'];
    // echo $turno1['diferencaMinutos'];
    // echo $turno1['totalHorasNoturnas'];
    // echo $turno1['totalMinutosNoturnos'];
    // echo $turno1['totalHorasDiurnas'];
    // echo $turno1['totalMinutosDiurnos'];

?>