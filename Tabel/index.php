<!DOCTYPE html>
<html>
<head>
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

        function newUser() {
            $('#dlg').dialog('open').dialog('center').dialog('setTitle', 'New User');
            $('#fm').form('clear');
            url = 'addData.php';
        }

        function editUser() {
            var row = $('#dg').datagrid('getSelected');
            if (row) {
                $('#dlg').dialog('open').dialog('center').dialog('setTitle', 'Edit User');
                $('#fm').form('load', row);
                url = 'editData.php?id=' + row.id;
            }
        }

        function saveUser() {
            $('#fm').form('submit', {
                url: url,
                onSubmit: function () {
                    return $(this).form('validate');
                },
                success: function (response) {
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

        function destroyUser() {
            var row = $('#dg').datagrid('getSelected');
            if (row) {
                $.messager.confirm('Confirm', 'Are you sure you want to delete this user?', function (r) {
                    if (r) {
                        $.post('deleteData.php', {id: row.id}, function (response) {
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
    <title>Data User</title>
</head>
<body>
<table id="dg" title="Data Master" class="easyui-datagrid" url="getData.php" toolbar="#toolbar" pagination="true"
       rownumbers="true" fitColumns="true" singleSelect="true" style="width:100%;height:740px;">
    <thead>
    <tr>
        <th field="first_name" width="50">First Name</th>
        <th field="last_name" width="50">Last Name</th>
        <th field="email" width="50">Email</th>
        <th field="phone" width="50">Phone</th>
    </tr>
    </thead>
</table>
<div id="toolbar">
    <div id="tb">
        <input id="term" placeholder="Type keywords...">
        <a href="javascript:void(0);" class="easyui-linkbutton" plain="true" onclick="doSearch()">Search</a>
    </div>
    <div id="tb2" style="">
        <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-add" plain="true" onclick="newUser()">New
            User</a>
        <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-edit" plain="true" onclick="editUser()">Edit
            User</a>
        <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-remove" plain="true"
           onclick="destroyUser()">Remove User</a>
    </div>
</div>
<div id="dlg" class="easyui-dialog" style="width:450px"
     data-options="closed:true,modal:true,border:'thin',buttons:'#dlg-buttons'">
    <form id="fm" method="post" novalidate style="margin:0;padding:20px 50px">
        <h3>User Information</h3>
        <div style="margin-bottom:10px">
            <input name="first_name" class="easyui-textbox" required="true" label="First Name:" style="width:100%">
        </div>
        <div style="margin-bottom:10px">
            <input name="last_name" class="easyui-textbox" required="true" label="Last Name:" style="width:100%">
        </div>
        <div style="margin-bottom:10px">
            <input name="email" class="easyui-textbox" required="true" validType="email" label="Email:"
                   style="width:100%">
        </div>
        <div style="margin-bottom:10px">
            <input name="phone" class="easyui-textbox" required="true" label="Phone:" style="width:100%">
        </div>
    </form>
</div>
<div id="dlg-buttons">
    <a href="javascript:void(0);" class="easyui-linkbutton c6" iconCls="icon-ok" onclick="saveUser()"
       style="width:90px;">Save</a>
    <a href="javascript:void(0);" class="easyui-linkbutton" iconCls="icon-cancel"
       onclick="javascript:$('#dlg').dialog('close');" style="width:90px;">Cancel</a>
</div>


</body>
</html>
