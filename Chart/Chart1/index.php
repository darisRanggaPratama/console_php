<script src="https://code.jquery.com/jquery-3.6.3.js">
</script>

<script src="https://code.highcharts.com/highcharts.js"></script>

<div id="container"></div>
<script>
    setTimeout(function() {
        location.reload();
    }, 1000);
</script>

<script>
    jQuery(document).ready(function(){
        var options = {
            chart:{
                renderTo: 'container',
                type: 'line'
            },
            title: {
                text: 'Daftar Perolehan Medali'
            },
            subtitle: {
                text: 'Source : Aptika Sijunjung'
            },
            series:[{}]
        };
        $.getJSON('chart.php', function(data){
           options.series[0].data=data;
           var chart = new Highcharts.Chart(options);
        });
    });
</script>

