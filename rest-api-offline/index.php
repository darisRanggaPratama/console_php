<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Avengers</title>

    <!-- CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.13.8/css/dataTables.bootstrap5.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/buttons/2.4.2/css/buttons.bootstrap5.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/responsive/2.5.0/css/responsive.bootstrap5.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/select/1.7.0/css/select.bootstrap5.min.css" rel="stylesheet">

    <!-- JavaScript -->
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.8/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.8/js/dataTables.bootstrap5.min.js"></script>

    <!-- Buttons libraries -->
    <script src="https://cdn.datatables.net/buttons/2.4.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.bootstrap5.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.print.min.js"></script>

    <!-- Select library -->
    <script src="https://cdn.datatables.net/select/1.7.0/js/dataTables.select.min.js"></script>

    <!-- Responsive -->
    <script src="https://cdn.datatables.net/responsive/2.5.0/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.5.0/js/responsive.bootstrap5.min.js"></script>

    <style>
        /* Style untuk baris yang dipilih */
        table.dataTable tbody tr.selected {
            background-color: #b0bed9 !important;
        }
        /* Style untuk tombol copy yang disabled */
        button.buttons-copy.disabled {
            opacity: 0.6;
            cursor: not-allowed;
        }
    </style>
</head>
<body>
<div class="container mt-5">
    <h2 class="mb-4">Data Avengers</h2>
    <div class="alert alert-info mb-3">
        Klik baris untuk memilih data yang akan di-copy. Gunakan Ctrl/Cmd + klik untuk memilih multiple baris.
    </div>
    <table id="tabelData" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">
        <thead>
        <tr>
            <th>ID</th>
            <th>Title</th>
            <th>Image</th>
            <th>Release</th>
            <th>Summary</th>
        </tr>
        </thead>
    </table>
</div>

<script>
    $(document).ready(function() {
        let table = $('#tabelData').DataTable({
            ajax: {
                url: 'data.php',
                dataSrc: 'data'
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
                { data: 'release_at' },
                { data: 'summary' }
            ],
            responsive: true,
            language: {
                url: '//cdn.datatables.net/plug-ins/1.13.8/i18n/id.json'
            },
            processing: true,
            pageLength: 10,
            dom: 'Bfrtip',
            select: true, // Mengaktifkan fitur select
            buttons: [
                {
                    extend: 'copy',
                    text: 'Copy',
                    className: 'btn btn-primary btn-sm',
                    exportOptions: {
                        modifier: {
                            selected: true // Hanya mengambil baris yang dipilih
                        }
                    },
                    init: function(api, node, config) {
                        // Disable tombol copy saat tidak ada baris yang dipilih
                        $(node).addClass('disabled');
                    }
                },
                {
                    extend: 'excel',
                    text: 'Excel',
                    className: 'btn btn-success btn-sm'
                },
                {
                    extend: 'pdf',
                    text: 'PDF',
                    className: 'btn btn-danger btn-sm'
                },
                {
                    extend: 'print',
                    text: 'Print',
                    className: 'btn btn-info btn-sm'
                }
            ]
        });

        // Menangani status tombol copy berdasarkan seleksi
        table.on('select deselect', function() {
            let selectedRows = table.rows({ selected: true }).count();
            let copyButton = $('.buttons-copy');

            if (selectedRows > 0) {
                copyButton.removeClass('disabled');
            } else {
                copyButton.addClass('disabled');
            }
        });
    });
</script>
</body>
</html>