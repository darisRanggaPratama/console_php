<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Avengers</title>

    <!-- CSS Modern DataTables dengan Bootstrap 5 -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.13.8/css/dataTables.bootstrap5.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/responsive/2.5.0/css/responsive.bootstrap5.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/buttons/2.4.2/css/buttons.bootstrap5.min.css" rel="stylesheet">

    <!-- JavaScript yang diperlukan -->
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.8/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.8/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.5.0/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.5.0/js/responsive.bootstrap5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.bootstrap5.min.js"></script>
</head>
<body>
<div class="container mt-5">
    <h2 class="mb-4">Data Avengers</h2>
    <table id="tabelData" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">
        <thead>
        <tr>
            <th>ID</th>
            <th>Title</th>
            <th>Image</th>
            <th>Summary</th>
            <th>Release</th>
        </tr>
        </thead>
    </table>
</div>

<script>
    $(document).ready(function() {
        let table = $('#tabelData').DataTable({
            ajax: {
                url: 'data.php',
                dataSrc: 'data',
                error: function(xhr, error, thrown) {
                    console.error('Error:', error);
                    alert('Terjadi kesalahan saat mengambil data');
                }
            },
            columns: [
                { data: 'id' },
                { data: 'title' },
                {
                    data: 'image',
                    render: function(data, type, row) {
                        return data ? `<img src="${data}" alt="poster" style="max-height: 50px;">` : 'No Image';
                    }
                },
                { data: 'summary' },
                { data: 'release_at' }
            ],
            responsive: true,
            language: {
                url: '//cdn.datatables.net/plug-ins/1.13.8/i18n/id.json'
            },
            processing: true,
            pageLength: 10,
            order: [[0, 'asc']],
            dom: 'Bfrtip',
            buttons: ['copy', 'excel', 'pdf', 'print']
        });

        // Debug: Log data yang diterima
        table.on('xhr', function() {
            var json = table.ajax.json();
            console.log('Data received:', json);
        });
    });
</script>
</body>
</html>