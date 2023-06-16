<?php
require_once "model.php";
?>

// Get data from PHP (variable)
let data1 = <?php echo $data5; ?>;
let data2 = <?php echo $data6; ?>;

// Array to store label
let labels = [];

// Array to store value (curve)
let values1 = [];
let values2 = [];

// Object (data)
let dataSets = [];

// Loop data and store into array
data1.forEach(function(datum) {
    labels.push(datum.Bulan);
    values1.push(datum.Tj_lain);
});

data2.forEach(function(datum) {
    values2.push(datum.Lembur);
});

const allValue = [values1, values2];
const typeChart = [{
        type: 'bar',
        labels: 'Tj Lain'
    },
    {
        type: 'line',
        labels: 'Lembur'
    }
];

const typeColor = [{
        border: 'rgb(211, 84, 0)',
        background: 'rgba(211, 84, 0, 0.3)'
    },
    {
        border: 'rgb(20, 90, 50)',
        background: 'rgba(20, 90, 50, 0.1)'
    }
];

for (let i = 0; i < 2; i++) {
    dataSets.push({
        type: typeChart[i].type,
        label: typeChart[i].labels,
        data: allValue[i],
        borderColor: typeColor[i].border,
        backgroundColor: typeColor[i].background,
        fill: true,
        tension: 0.1
    })
}

const lableValue = {
    labels: labels,
    datasets: dataSets
};

// Chart configuration
let ctx = document.getElementById("chartContainer");
var chart = new Chart(ctx, {
    type: "scatter",
    data: lableValue,
    options: {
        scales: {
            y: {
                // Y axis begun from 0: true/ false
                beginAtZero: false
            }
        }
    }
});

