<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Members Management</title>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        #membersTable_wrapper {
            width: 120%;
            margin-left: -10%;
        }
    </style>
</head>
<body>
<div class="container mt-5">
    <h2>Members Management</h2>
    <button class="btn btn-primary mb-3" onclick="showAddModal()">Add New Member</button>

    <table id="membersTable" class="display">
        <thead>
        <tr>
            <th>ID</th>
            <th>Edit</th>
            <th>Title</th>
            <th>Image</th>
            <th>Release Date</th>
            <th>Summary</th>
            <th>Delete</th>
        </tr>
        </thead>
    </table>
</div>

<!-- Modal for Add/Edit -->
<div class="modal fade" id="memberModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Member Form</h5>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <form id="memberForm">
                    <input type="hidden" id="memberId">
                    <div class="form-group">
                        <label>Title</label>
                        <input type="text" class="form-control" id="title" required>
                    </div>
                    <div class="form-group">
                        <label>Image URL</label>
                        <input type="text" class="form-control" id="image">
                    </div>
                    <div class="form-group">
                        <label>Release Date</label>
                        <input type="date" class="form-control" id="release_at" required>
                    </div>
                    <div class="form-group">
                        <label>Summary</label>
                        <textarea class="form-control" id="summary"></textarea>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" onclick="saveMember()">Save</button>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<script>
    let table;
    let isEdit = false;

    $(document).ready(function() {
        table = $('#membersTable').DataTable({
            ajax: 'api.php',
            columnDefs: [
                {
                    targets: [1, 6], // Kolom Edit dan Delete
                    orderable: false
                }
            ],
            columns: [
                { data: 'id' },
                {
                    // Kolom Edit
                    data: null,
                    render: function(data) {
                        return `<button class="btn btn-sm btn-warning" onclick="editMember(${data.id})">Edit</button>`;
                    }
                },
                { data: 'title' },
                {
                    data: 'image',
                    render: function(data) {
                        return data ? `<img src="${data}" height="50">` : 'No Image';
                    }
                },
                { data: 'release_at' },
                { data: 'summary' },
                {
                    // Kolom Delete
                    data: null,
                    render: function(data) {
                        return `<button class="btn btn-sm btn-danger" onclick="deleteMember(${data.id})">Delete</button>`;
                    }
                }
            ]
        });
    });

    function showAddModal() {
        isEdit = false;
        $('#memberForm')[0].reset();
        $('#memberId').val('');
        $('#memberModal').modal('show');
    }

    function editMember(id) {
        isEdit = true;
        const data = table.row(function(idx, data) {
            return data.id === id;
        }).data();

        $('#memberId').val(data.id);
        $('#title').val(data.title);
        $('#image').val(data.image);
        $('#release_at').val(data.release_at);
        $('#summary').val(data.summary);
        $('#memberModal').modal('show');
    }

    function saveMember() {
        const data = {
            id: $('#memberId').val(),
            title: $('#title').val(),
            image: $('#image').val(),
            release_at: $('#release_at').val(),
            summary: $('#summary').val()
        };

        $.ajax({
            url: 'api.php',
            method: isEdit ? 'PUT' : 'POST',
            contentType: 'application/json',
            data: JSON.stringify(data),
            success: function(response) {
                $('#memberModal').modal('hide');
                table.ajax.reload();
            },
            error: function(xhr) {
                alert('Error saving data');
            }
        });
    }

    function deleteMember(id) {
        if (confirm('Are you sure you want to delete this member?')) {
            $.ajax({
                url: `api.php?id=${id}`,
                method: 'DELETE',
                success: function(response) {
                    table.ajax.reload();
                },
                error: function(xhr) {
                    alert('Error deleting data');
                }
            });
        }
    }
</script>
</body>
</html>