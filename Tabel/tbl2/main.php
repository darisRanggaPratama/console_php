<?php
session_start();

if ($_SESSION['status'] != "sudah_login") {
    header("location:index.php");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Data Gaji 2022</title>
    <link rel="stylesheet" type="text/css" href="easyui/themes/default/easyui.css">
    <link rel="stylesheet" type="text/css" href="easyui/themes/icon.css">
    <script type="text/javascript" src="easyui/jquery.min.js"></script>
    <script type="text/javascript" src="easyui/jquery.easyui.min.js"></script>
    <script type="text/javascript">
        function doSearch() {
            $('#dg').datagrid('load', {
                term: $('#term').val()
            });
        }

        var url;

        function newData() {
            $('#dlg').dialog('open').dialog('center').dialog('setTitle', 'New Data');
            $('#fm').form('clear');
            url = 'addData.php';
        }

        function editData() {
            var row = $('#dg').datagrid('getSelected');
            if (row) {
                $('#dlg').dialog('open').dialog('center').dialog('setTitle', 'Edit Data');
                $('#fm').form('load', row);
                url = 'editData.php?id=' + row.id;
            }
        }

        function saveData() {
            $('#fm').form('submit', {
                url: url,
                onSubmit: function() {
                    return $(this).form('validate');
                },
                success: function(response) {
                    var respData = $.parseJSON(response);
                    if (respData.status == 0) {
                        $.messager.show({
                            title: 'Error',
                            msg: respData.msg
                        });
                    } else {
                        $('#dlg').dialog('close');
                        $('#dg').datagrid('reload');
                    }
                }
            });
        }

        function destroyData() {
            var row = $('#dg').datagrid('getSelected');
            if (row) {
                $.messager.confirm('Confirm', 'Are you sure you want to delete this data?', function(r) {
                    if (r) {
                        $.post('deleteData.php', {
                            id: row.id
                        }, function(response) {
                            if (response.status == 1) {
                                $('#dg').datagrid('reload');
                            } else {
                                $.messager.show({
                                    title: 'Error',
                                    msg: respData.msg
                                });
                            }
                        }, 'json');
                    }
                });
            }
        }
    </script>
    <style>
        .center {
            text-align: center;
        }
    </style>

</head>

<body>
    <h1>Urra! Selamat datang : <?php echo $_SESSION['nama']; ?></h1>
    <br>
    <a href="logout.php">Logout</a>
    <p class="center">
    <h1 class="center">Gaji Ayang Beib 2022</h1>
    <object data="grafik.php" height="330px" width="100%">
        Your browser does not support the object tag.
    </object>
    </p>

    <table
    id="dg" title="Data Master" class="easyui-datagrid" url="getData.php"
    toolbar="#toolbar" pagination="true" rownumbers="true" fitColumns="true"
    singleSelect="true" style="width:100%;height:330px;">
        <caption>
            Data Gaji
        </caption>
        <thead>
            <tr>
                <th field="bln" style="width:10%">Bulan</th>
                <th field="gaji" style="width:16%">Gaji</th>
                <th field="lembur" style="width:16%">Lembur</th>
                <th field="tj_lain" style="width:16%">Tj_lain</th>
                <th field="bruto" style="width:16%">Bruto</th>
                <th field="trf" style="width:16%">Transfer</th>
                <th field="hmn" style="width:10%">Human</th>
            </tr>
        </thead>
    </table>
    <div id="toolbar">
        <div id="tb">
            <input id="term" placeholder="Type keywords...">
            <a href="javascript:void(0);" class="easyui-linkbutton" plain="true" onclick="doSearch()">Search</a>
        </div>
        <div id="tb2" style="">
            <a href="javascript:void(0)" class="easyui-linkbutton"
            iconCls="icon-add" plain="true" onclick="newData()">New Data</a>
            <a href="javascript:void(0)" class="easyui-linkbutton"
            iconCls="icon-edit" plain="true" onclick="editData()">Edit Data</a>
            <a href="javascript:void(0)" class="easyui-linkbutton"
            iconCls="icon-remove" plain="true" onclick="destroyData()">Remove Data</a>
        </div>
    </div>
    <div id="dlg" class="easyui-dialog" style="width:450px"
    data-options="closed:true,modal:true,border:'thin',buttons:'#dlg-buttons'">
        <form id="fm" method="post" novalidate style="margin:0;padding:20px 50px">
            <h3>Please Input</h3>
            <div style="margin-bottom:10px">
                <input name="kode" class="easyui-textbox" required="true" label="Kode:" style="width:100%">
            </div>
            <div style="margin-bottom:10px">
                <input name="bln" class="easyui-textbox" required="true" label="Bulan:" style="width:100%">
            </div>
            <div style="margin-bottom:10px">
                <input name="gaji" class="easyui-textbox" required="true" label="Gaji:" style="width:100%">
            </div>
            <div style="margin-bottom:10px">
                <input name="lembur" class="easyui-textbox" required="true" label="Lembur:" style="width:100%">
            </div>
            <div style="margin-bottom:10px">
                <input name="tj_lain" class="easyui-textbox" required="true" label="Tj. Lain:" style="width:100%">
            </div>
            <div style="margin-bottom:10px">
                <input name="bruto" class="easyui-textbox" required="true" label="Bruto:" style="width:100%">
            </div>
            <div style="margin-bottom:10px">
                <input name="trf" class="easyui-textbox" required="true" label="Transfer:" style="width:100%">
            </div>
            <div style="margin-bottom:10px">
                <input name="hmn" class="easyui-textbox" required="true" label="Human:" style="width:100%">
            </div>
        </form>
    </div>
    <div id="dlg-buttons">
        <a href="javascript:void(0);" class="easyui-linkbutton c6"
        iconCls="icon-ok" onclick="saveData()" style="width:90px;">Save</a>
        <a href="javascript:void(0);" class="easyui-linkbutton"
        iconCls="icon-cancel" onclick="javascript:$('#dlg').dialog('close');" style="width:90px;">Cancel</a>
    </div>

</body>

</html>
