<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CRUD: USER</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

    <link type="text/css" href="https://cdn.datatables.net/v/bs5/jq-3.6.0/dt-1.13.4/datatables.min.css" rel="stylesheet" />
    <style type="text/css">
        .btnAdd {
            text-align: right;
            width: 83%;
            margin-bottom: 20px;
        }
    </style>
</head>

<body>
    <h1 class="text-center">CRUD: USER</h1>
    <div class="container-fluid">
        <div class="row">
            <div class="container">
                <div class="row">
                    <div class="col-md-2"></div>
                    <div class="col-md-8">
                        <!-- Button trigger modal -->
                        <button type="button" style="margin-bottom: 40px;" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addUserModal">
                            Add User
                        </button>

                    </div>
                </div>
                <div class="row">
                    <div class="col-md-2"></div>
                    <div class="col-md-8">
                        <table id="datatable" class="table">
                            <caption>Data Master</caption>
                            <thead>
                                <th>No.</th>
                                <th>UserName</th>
                                <th>Email</th>
                                <th>Mobile</th>
                                <th>City</th>
                                <th>Options</th>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                    </div>
                    <div class="col-md-2"></div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/v/bs5/jq-3.6.0/dt-1.13.4/datatables.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <script type="text/javascript">
        $('#datatable').DataTable({
            'serverSide': true,
            'processing': true,
            'paging': true,
            'order': [],
            'ajax': {
                'url': 'fetch_data.php',
                'type': 'post',
            },
            'fnCreateRow': function(nRow, aData, iDataIndex) {
                $(nRow).attr('id', aData[0]);
            },
            'columnDefs': [{
                'target': [0, 5],
                'orderable': false,
            }]
        });
    </script>
    <script type="text/javascript">
        $(document).on('submit', '#saveUserForm', function(event) {
            event.preventDefault();
            let username = $('#inputUsername').val();
            let email = $('#inputEmail').val();
            let mobile = $('#inputMobile').val();
            let city = $('#inputCity').val();

            if (username != '' && email != '' && mobile != '' && city != '') {
                $.ajax({
                    url: "add_user.php",
                    data: {
                        username: username,
                        email: email,
                        mobile: mobile,
                        city: city
                    },
                    type: 'post',
                    success: function(data) {
                        let json = JSON.parse(data);
                        let status = json.status;
                        if (status == 'true') {
                            table = $('#datatable').DataTable();
                            table.draw();
                            alert('Successfully user added');
                            $('#addUserModal').modal('hide');
                        } else {
                            alert('failed');
                        }
                        // menit ke: 33
                    }
                });
            } else {
                alert("Please fill all the required fields");
            }

        })
    </script>



    <!-- Add User Modal -->
    <!-- Modal -->
    <div class="modal fade" id="addUserModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add User</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="javascript:void()" id="saveUserForm" method="POST">
                    <div class="modal-body">
                        <div class="mb-3 row">
                            <label for="inputUsername" class="col-sm-2 col-form-label">UserName</label>
                            <div class="col-sm-10">
                                <input type="text" name="username" class="form-control" id="inputUsername" value="oyen">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="inputEmail" name="inputEmail" value="meong@gmail.com">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="inputMobile" class="col-sm-2 col-form-label">Mobile</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="inputMobile" name="inputMobile" value="08">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="inputCity" class="col-sm-2 col-form-label">City</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="inputCity" name="inputCity" value="Jakarta">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Add User Modal: End -->



</body>

</html>