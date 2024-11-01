let table;
let memberModal;

$(document).ready(function() {
    memberModal = new bootstrap.Modal(document.getElementById('memberModal'));

    table = $('#membersTable').DataTable({
        ajax: {
            url: 'api.php?action=getAll',
            dataSrc: 'data'
        },
        columns: [
            { data: 'id' },
            { data: 'title' },
            {
                data: 'image',
                render: function(data) {
                    return `<img src="${data}" alt="Member Image" style="max-height: 50px;">`;
                }
            },
            { data: 'release_at' },
            { data: 'summary' },
            {
                data: null,
                render: function(data) {
                    return `
                        <button class="btn btn-sm btn-warning" onclick="editMember(${data.id})">Edit</button>
                        <button class="btn btn-sm btn-danger" onclick="deleteMember(${data.id})">Delete</button>
                    `;
                }
            }
        ]
    });

    // Handle CSV file import
    $('#csvFile').change(function(e) {
        const file = e.target.files[0];
        if (file) {
            if (!file.name.toLowerCase().endsWith('.csv')) {
                alert('Please select a CSV file');
                return;
            }

            const formData = new FormData();
            formData.append('csv_file', file);
            formData.append('action', 'import');

            $.ajax({
                url: 'api.php',
                type: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                success: function(response) {
                    if (response.success) {
                        alert('CSV imported successfully');
                        table.ajax.reload();
                    } else {
                        alert('Error importing CSV');
                    }
                },
                error: function() {
                    alert('Error importing CSV');
                }
            });

            // Reset file input
            e.target.value = '';
        }
    });
});

function openAddModal() {
    document.getElementById('memberForm').reset();
    document.getElementById('memberId').value = '';
    document.getElementById('modalTitle').textContent = 'Add Member';
    memberModal.show();
}

function editMember(id) {
    const data = table.row(function(idx, data) {
        return data.id === id;
    }).data();

    document.getElementById('memberId').value = data.id;
    document.getElementById('title').value = data.title;
    document.getElementById('image').value = data.image;
    document.getElementById('release_at').value = data.release_at;
    document.getElementById('summary').value = data.summary;

    document.getElementById('modalTitle').textContent = 'Edit Member';
    memberModal.show();
}

function saveMember() {
    const id = document.getElementById('memberId').value;
    const data = {
        title: document.getElementById('title').value,
        image: document.getElementById('image').value,
        release_at: document.getElementById('release_at').value,
        summary: document.getElementById('summary').value
    };

    if (id) {
        data.id = id;
        data.action = 'update';
    } else {
        data.action = 'create';
    }

    $.ajax({
        url: 'api.php',
        type: 'POST',
        data: data,
        success: function(response) {
            if (response.success) {
                memberModal.hide();
                table.ajax.reload();
            } else {
                alert('Error saving member');
            }
        }
    });
}

function deleteMember(id) {
    if (confirm('Are you sure you want to delete this member?')) {
        $.ajax({
            url: 'api.php',
            type: 'POST',
            data: {
                action: 'delete',
                id: id
            },
            success: function(response) {
                if (response.success) {
                    table.ajax.reload();
                } else {
                    alert('Error deleting member');
                }
            }
        });
    }
}

function exportCSV() {
    window.location.href = 'api.php?action=export';
}

function downloadTemplate() {
    window.location.href = 'api.php?action=downloadTemplate';
}