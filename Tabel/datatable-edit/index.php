<?php include ('connect.php'); ?>
<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Bootstrap CSS -->
  <link href="css/bootstrap5.0.1.min.css" rel="stylesheet" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="css/datatables-1.10.25.min.css" />
  <title>Payroll</title>
  <style type="text/css">
    .btnAdd {
      text-align: right;
      width: 83%;
      margin-bottom: 20px;
    }
  </style>
</head>

<body>
  <div class="container-fluid">
    <h2 class="text-center">Malea Energy</h2>
    <p class="datatable design text-center">Data Payroll</p>
    <div class="row">
      <div class="container">
        <div class="btnAdd">
          <a href="#!" data-id="" data-bs-toggle="modal" data-bs-target="#addUserModal" 
          class="btn btn-success btn-sm">Add Data</a>
        </div>
        <div class="row">
          <div class="col-md-2"></div>
          <div class="col-md-8">
            <table id="example" class="table">
              <thead>
                <th>Kode</th>
                <th>Bulan</th>
                <th>Gaji</th>
                <th>Lembur</th>
                <th>Tj Lain</th>
                <th>Bruto</th>
                <th>Potongan</th>
                <th>Transfer</th>
                <th>Qty</th>
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
  <!-- Optional JavaScript; choose one of the two! -->
  <!-- Option 1: Bootstrap Bundle with Popper -->
  <script src="js/jquery-3.6.0.min.js" crossorigin="anonymous"></script>
  <script src="js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
  <script type="text/javascript" src="js/dt-1.10.25datatables.min.js"></script>
  <!-- Option 2: Separate Popper and Bootstrap JS -->
 
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
  
  <script type="text/javascript">
    $(document).ready(function() {
      $('#example').DataTable({
        "fnCreatedRow": function(nRow, aData, iDataIndex) {
          $(nRow).attr('kode', aData[0]);
        },
        'serverSide': 'true',
        'processing': 'true',
        'paging': 'true',
        'order': [],
        'ajax': {
          'url': 'fetch_data.php',
          'type': 'post',
        },
        "aoColumnDefs": [{
            "bSortable": false,
            "aTargets": [9]
          },

        ]
      });
    });

    $(document).on('submit', '#addUser', function(e) {
      e.preventDefault();
      let kode = $('#kode').val();
      let bulan = $('#bulan').val();
      let gaji = $('#gaji').val();
      let lembur = $('#lembur').val();
      let tjLain = $('#tjLain').val();
      let bruto = $('#bruto').val();
      let potongan = $('#potongan').val();
      let transfer = $('#transfer').val();
     
      if (kode != '' && bulan != '' && gaji != '' && lembur != ''
      && tjLain != '' && bruto != '' && potongan != '' && transfer != ''
      ) {
        $.ajax({
          url: "add_user.php",
          type: "post",
          data: {
            kode: kode, bulan: bulan,
             gaji: gaji, lembur: lembur,
             tjLain: tjLain, bruto: bruto,
             potongan: potongan , transfer: transfer
          },
          success: function(data) {
            let json = JSON.parse(data);
            let status = json.status;
            if (status == 'true') {
            mytable = $('#example').DataTable();
              mytable.draw();
              $('#addUserModal').modal('hide');
            } else {
              alert('failed');
            }
          }
        });
      } else {
        alert('Fill all the required fields');
      }
    });

    $(document).on('submit', '#updateUser', function(e) {
      e.preventDefault();
      //var tr = $(this).closest('tr');
      let kode = $('#kode').val();
      let bulan = $('#bulan').val();
      let gaji = $('#gaji').val();
      let lembur = $('#lembur').val();
      let tjLain = $('#tjLain').val();
      let bruto = $('#bruto').val();
      let potongan = $('#potongan').val();
      let transfer = $('#transfer').val();

      if (kode != '' && bulan != '' && gaji != '' && lembur != ''
      && tjLain != '' && bruto != '' && potongan != '' && transfer != '') {
        $.ajax({
          url: "update_user.php",
          type: "post",
          data: {
            kode: kode, bulan: bulan,
             gaji: gaji, lembur: lembur,
             tjLain: tjLain, bruto: bruto,
             potongan: potongan , transfer: transfer
          },
          success: function(data) {
            let json = JSON.parse(data);
            let status = json.status;
            if (status == 'true') {
              table = $('#example').DataTable();
              // table.cell(parseInt(trid) - 1,0).data(id);
              // table.cell(parseInt(trid) - 1,1).data(username);
              // table.cell(parseInt(trid) - 1,2).data(email);
              // table.cell(parseInt(trid) - 1,3).data(mobile);
              // table.cell(parseInt(trid) - 1,4).data(city);
              let button = '<td><a href="javascript:void();" data-id="' + kode + '" class="btn btn-info btn-sm editbtn">Edit</a>  <a href="#!"  data-id="' + kode + '"  class="btn btn-danger btn-sm deleteBtn">Delete</a></td>';
              let row = table.row("[kode='" + kode + "']");
              row.row("[kode='" + kode + "']").data([kode, bulan, gaji, lembur, tjLain, bruto, potongan, transfer, human]);
              $('#exampleModal').modal('hide');
            } else {
              alert('failed');
            }
          }
        });
      } else {
        alert('Fill all the required fields');
      }
    });

    $('#example').on('click', '.editbtn ', function(event) {
      let table = $('#example').DataTable();
      let kodex = $(this).closest('tr').attr('kode');
      // console.log(selectedRow);
      let kode = $(this).data('kode');
      $('#exampleModal').modal('show');

      $.ajax({
        url: "get_single_data.php",
        data: {
          kode: kode
        },
        type: 'post',
        success: function(data) {
          var json = JSON.parse(data);
          $('#kode').val(json.kode);
          $('#bulan').val(json.bulan);
          $('#gaji').val(json.gaji);
          $('#lembur').val(json.lembur);
          $('#tjLain').val(tjLain);
          $('#bruto').val(bruto);
          $('#potongan').val(potongan);
          $('#transfer').val(transfer);
          $('#human').val(human);
        }
      })
    });

    $(document).on('click', '.deleteBtn', function(event) {
      let table = $('#example').DataTable();
      event.preventDefault();
      let kode = $(this).data('kode');
      if (confirm("Are you sure want to delete this User ? ")) {
        $.ajax({
          url: "delete_user.php",
          data: {
            kode: kode
          },
          type: "post",
          success: function(data) {
            var json = JSON.parse(data);
            status = json.status;
            if (status == 'success') {
              //table.fnDeleteRow( table.$('#' + id)[0] );
              //$("#example tbody").find(id).remove();
              //table.row($(this).closest("tr")) .remove();
              $("#" + kode).closest('tr').remove();
            } else {
              alert('Failed');
              return;
            }
          }
        });
      } else {
        return null;
      }
    })
  </script>
  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Update Data</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form id="updateUser">
            <input type="hidden" name="kode" id="kode" value="">
            <input type="hidden" name="kodex" id="kodex" value="">
            <div class="mb-3 row">
              <label for="kode" class="col-md-3 form-label">Kode</label>
              <div class="col-md-9">
                <input type="text" class="form-control" id="kode" name="kode">
              </div>
            </div>
            <div class="mb-3 row">
              <label for="bulan" class="col-md-3 form-label">Bulan</label>
              <div class="col-md-9">
                <input type="text" class="form-control" id="bulan" name="bulan">
              </div>
            </div>
            <div class="mb-3 row">
              <label for="gaji" class="col-md-3 form-label">Gaji</label>
              <div class="col-md-9">
                <input type="text" class="form-control" id="gaji" name="gaji">
              </div>
            </div>
            <div class="mb-3 row">
              <label for="lembur" class="col-md-3 form-label">Lembur</label>
              <div class="col-md-9">
                <input type="text" class="form-control" id="lembur" name="lembur">
              </div>
            </div>
            <div class="mb-3 row">
              <label for="tjLain" class="col-md-3 form-label">Tj Lain</label>
              <div class="col-md-9">
                <input type="text" class="form-control" id="tjLain" name="tjLain">
              </div>
            </div>
            <div class="mb-3 row">
              <label for="bruto" class="col-md-3 form-label">Bruto</label>
              <div class="col-md-9">
                <input type="text" class="form-control" id="bruto" name="bruto">
              </div>
            </div>
            <div class="mb-3 row">
              <label for="potongan" class="col-md-3 form-label">Potongan</label>
              <div class="col-md-9">
                <input type="text" class="form-control" id="potongan" name="potongan">
              </div>
            </div>
            <div class="mb-3 row">
              <label for="transfer" class="col-md-3 form-label">Transfer</label>
              <div class="col-md-9">
                <input type="text" class="form-control" id="transfer" name="transfer">
              </div>
            </div>
            <div class="mb-3 row">
              <label for="human" class="col-md-3 form-label">Employee</label>
              <div class="col-md-9">
                <input type="text" class="form-control" id="human" name="human">
              </div>
            </div>
            <div class="text-center">
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
  <!-- Add user Modal -->
  <div class="modal fade" id="addUserModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Add Data</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form id="addUser" action="">
            <div class="mb-3 row">
              <label for="kode" class="col-md-3 form-label">Kode</label>
              <div class="col-md-9">
                <input type="text" class="form-control" id="kode" name="kode">
              </div>
            </div>
            <div class="mb-3 row">
              <label for="bulan" class="col-md-3 form-label">Bulan</label>
              <div class="col-md-9">
                <input type="text" class="form-control" id="bulan" name="bulan">
              </div>
            </div>
            <div class="mb-3 row">
              <label for="gaji" class="col-md-3 form-label">Gaji</label>
              <div class="col-md-9">
                <input type="text" class="form-control" id="gaji" name="gaji">
              </div>
            </div>
            <div class="mb-3 row">
              <label for="lembur" class="col-md-3 form-label">Lembur</label>
              <div class="col-md-9">
                <input type="text" class="form-control" id="lembur" name="lembur">
              </div>
            </div>
            <div class="mb-3 row">
              <label for="tjLain" class="col-md-3 form-label">Tj Lain</label>
              <div class="col-md-9">
                <input type="text" class="form-control" id="tjLain" name="tjLain">
              </div>
            </div>
            <div class="mb-3 row">
              <label for="bruto" class="col-md-3 form-label">Bruto</label>
              <div class="col-md-9">
                <input type="text" class="form-control" id="bruto" name="bruto">
              </div>
            </div>
            <div class="mb-3 row">
              <label for="potongan" class="col-md-3 form-label">Potongan</label>
              <div class="col-md-9">
                <input type="text" class="form-control" id="potongan" name="potongan">
              </div>
            </div>
            <div class="mb-3 row">
              <label for="transfer" class="col-md-3 form-label">Transfer</label>
              <div class="col-md-9">
                <input type="text" class="form-control" id="transfer" name="transfer">
              </div>
            </div>
            <div class="mb-3 row">
              <label for="human" class="col-md-3 form-label">Employee</label>
              <div class="col-md-9">
                <input type="text" class="form-control" id="human" name="human">
              </div>
            </div>
            <div class="text-center">
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
</body>

</html>
