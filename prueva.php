

<?php

// Função para calcular o valor das horas diurnas e noturnas.
//strtotime — Interpreta qualquer descrição textual de data/hora em inglês para timestamp Unix.

function calcularRemuneracaoDiurnaNoturna($horaInicial, $horaFinal) {
    $horaInicial = strtotime($horaInicial);
    $horaFinal = strtotime($horaFinal);

    $horaLimiteNoturna = strtotime("22:00:00"); // Limite para considerar horário noturno
    $valorHoraDiurna = 10; // Valor da hora diurna
    $valorHoraNoturna = 15; // Valor da hora noturna

    $remuneracaoDiurna = 0;
    $remuneracaoNoturna = 0;

    while ($horaInicial < $horaFinal) {
        $horaAtual = strtotime('+1 hour', $horaInicial);

        if ($horaInicial < $horaLimiteNoturna && $horaAtual <= $horaLimiteNoturna) {
            
            $remuneracaoDiurna += ($horaAtual - $horaInicial) * $valorHoraDiurna;
        } elseif ($horaInicial < $horaLimiteNoturna && $horaAtual > $horaLimiteNoturna) {
            
            $remuneracaoDiurna += ($horaLimiteNoturna - $horaInicial) * $valorHoraDiurna;
            $remuneracaoNoturna += ($horaAtual - $horaLimiteNoturna) * $valorHoraNoturna;
        } else {
            
            $remuneracaoNoturna += ($horaAtual - $horaInicial) * $valorHoraNoturna;
        }

        $horaInicial = $horaAtual;
    }

    return ['diurna' => $remuneracaoDiurna, 'noturna' => $remuneracaoNoturna];
}
/*
Com meus poucos conhecimentos em Php espero que seja de seus agrado abraços,
desculpa se não entendi mas so coloquei PHP puro pq essa era a duvida.
*\
?>

