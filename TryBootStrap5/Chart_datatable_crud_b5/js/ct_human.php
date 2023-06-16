<?php
require_once "model.php";
?>

// Get data from PHP (variable)
let data1 = <?php echo $data7; ?>;

// Array to store label
let labels = [];

// Array to store value (curve)
let values1 = [];

// Object (data)
let dataSets = [];

// Loop data and store into array
data1.forEach(function(datum) {
    labels.push(datum.Bulan);
    values1.push(datum.Human);
});


const allValue = [values1];
const typeChart = [
     {
        type: 'line',
        labels: 'Employee'
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

for (let i = 0; i < 1; i++) {
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

