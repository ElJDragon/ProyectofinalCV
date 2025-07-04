<?php

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['usuario'])) {
    echo "<p style='color:red;text-align:center;'>⚠️ Debe iniciar sesión para acceder a esta sección.</p>";
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Registro de estudiantes Universidad Tecnica de Ambato</title>
    <link rel="stylesheet" type="text/css" href="jquery-easyui-1.10.19/themes/black/easyui.css">
    <link rel="stylesheet" type="text/css" href="jquery-easyui-1.10.19/themes/icon.css">
    <link rel="stylesheet" type="text/css" href="jquery-easyui-1.10.19/themes/color.css">
    <script type="text/javascript" src="jquery-easyui-1.10.19/jquery.min.js"></script>
    <script type="text/javascript" src="jquery-easyui-1.10.19/jquery.easyui.min.js"></script>
    <style>
  

    section {
        max-width: 1200px;
        width: 90%;
        margin: 20px auto;
        padding: 20px;
        background-color: #fff;
        border-radius: 10px;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    }

</style>
</head>
<body>
    <h2>Gestion UTA</h2>

    <table id="dg" title="Estudiantes" class="easyui-datagrid" style="width:1000px;height: 500px"
            url="models/acceder.php"
            toolbar="#toolbar" pagination="true"
            rownumbers="true" fitColumns="true" singleSelect="true">
        <thead>
            <tr>
                <th field="estCedula" width="50">Cedula</th>
                <th field="estNombre" width="50">Nombre</th>
                <th field="estApellido" width="50">Apellido</th>
                <th field="estTelefono" width="50">Telefono</th>
                <th field="estDireccion" width="50">Direccion</th>
            </tr>
        </thead>
    </table>
    <br>
    <?php if(isset($_SESSION['usuario']) && $_SESSION['usuario'] === 'admin') { ?>
<table id="dgUsuarios" title="Usuarios" class="easyui-datagrid" style="width:1000px;height: 500px"
            url="models/accederSecretarias.php"
            toolbar="#toolbar1" pagination="true"
            rownumbers="true" fitColumns="true" singleSelect="true">
        <thead>
            <tr>
                <th field="user" width="50">Usuario</th>
                <th field="psw" width="50">Contrasenia</th>
                <th field="intentos" width="50"># Intentos</th>
                <th field="bloqueado" width="50">Bloqueado</th>
            </tr>
        </thead>
    </table>
    <?php }?>

    <div id="toolbar">
    <?php if(isset($_SESSION['usuario']) && $_SESSION['usuario'] === 'admin') { ?>
            <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-add" plain="true" onclick="newUser()">Nuevo Estudiante</a>
            <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-edit" plain="true" onclick="editUser()">Editar Estudiante</a>
            <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-remove" plain="true" onclick="destroyUser()">Borrar Estudiante</a>
            <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-remove" plain="true" onclick="destroyUser()">Borrar Estudiante</a>
    <?php }  ?>
        <a href="reportes/reporte.php" class="easyui-linkbutton" iconCls="icon-ok" plain="true" target="_blank">Reporte</a>
        <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-ok" plain="true" onclick="reporte()">Generar Reporte Especifico</a>
    </div>


    
    <div id="dlg" class="easyui-dialog" style="width:400px" data-options="closed:true,modal:true,border:'thin',buttons:'#dlg-buttons'">
        <form id="fm" method="post" novalidate style="margin:0;padding:20px 50px">
            <h3>Registro Estudiante</h3>
            <div style="margin-bottom:10px">
                <input id="idcedula" name="cedula" class="easyui-textbox" required="true" label="Cedula:" style="width:100%" 
                       validType="cedulaValido">
            </div>
            <div style="margin-bottom:10px">
                <input name="nombre" class="easyui-textbox" required="true" label="Nombre:" style="width:100%" 
                       validType="customName">
            </div>
            <div style="margin-bottom:10px">
                <input name="apellido" class="easyui-textbox" required="true" label="Apellido:" style="width:100%" 
                       validType="customName">
            </div>
            <div style="margin-bottom:10px">
                <input name="telefono" class="easyui-textbox" required="true" label="Telefono:" style="width:100%" 
                       validType="digits">
            </div>
            <div style="margin-bottom:10px">
                <input name="direccion" class="easyui-textbox" required="true" label="Direccion:" style="width:100%">
            </div>
        </form>
    </div>

    <div id="dlg-buttons">
        <a href="javascript:void(0)" class="easyui-linkbutton c6" iconCls="icon-ok" onclick="saveUser()" style="width:90px">Guardar</a>
        <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-cancel" onclick="javascript:$('#dlg').dialog('close')" style="width:90px">Cancelar</a>
    </div>

        <?php if(isset($_SESSION['usuario']) && $_SESSION['usuario'] === 'admin') { ?>
        <div id="toolbar1">
            <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-add" plain="true" onclick="newUsuario()">Nuevo Usuario</a>
            </div>
            <!-- Diálogo para Nuevo Usuario -->
<div id="dlgUsuario" class="easyui-dialog" style="width:400px" data-options="closed:true,modal:true,border:'thin',buttons:'#dlg-buttons-usuario'">
    <form id="fmUsuario" method="post" novalidate style="margin:0;padding:20px 50px">
        <h3>Registro Usuario</h3>
        <div style="margin-bottom:10px">
            <input name="user" class="easyui-textbox" required="true" label="Usuario:" style="width:100%">
        </div>
        <div style="margin-bottom:10px">
            <input name="psw" class="easyui-textbox" required="true" label="Contraseña:" type="password" style="width:100%">
        </div>
    </form>
</div>
<div id="dlg-buttons-usuario">
    <a href="javascript:void(0)" class="easyui-linkbutton c6" iconCls="icon-ok" onclick="saveUsuario()" style="width:90px">Guardar</a>
    <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-cancel" onclick="$('#dlgUsuario').dialog('close')" style="width:90px">Cancelar</a>
</div>
    <?php }  ?>
    


    <script type="text/javascript">
        var url;

        // Extensiones para validaciones personalizadas
        $.extend($.fn.validatebox.defaults.rules, {
            digits: {
                validator: function(value) {
                    return /^\d+$/.test(value);
                },
                message: 'Este campo solo acepta números.'
            },
            customName: {
                validator: function(value) {
                    return /^[a-zA-ZáéíóúÁÉÍÓÚñÑ\s]+$/.test(value);
                },
                message: 'Este campo solo acepta letras.'
            },
            cedulaValido: {
                validator: function(value) {
                    return /^\d{10}$/.test(value);
                },
                message: 'La cédula debe tener exactamente 10 dígitos numéricos.'
            }
        });

        function alertLogin() {
            $.messager.confirm('Error', 'Debe iniciar sesión para realizar esta acción.', function(r) {
                if (r) {
                    window.location.href = './views/interfaces/login.php';
                }
            });
        }

        function newUser() {
            <?php if(!isset($_SESSION['usuario']) || $_SESSION['usuario'] !== 'admin') { ?>
    alert('Acceso denegado. Solo el administrador puede realizar esta acción.');
    return;
<?php } ?>

            $('#dlg').dialog('open').dialog('center').dialog('setTitle', 'Nuevo Estudiante');
            $('#fm').form('clear');
            $('#idcedula').textbox('readonly', false);
            url = 'models/guardar.php';
        }

        function editUser() {
            <?php if(!isset($_SESSION['usuario']) || $_SESSION['usuario'] !== 'admin') { ?>
    alert('Acceso denegado. Solo el administrador puede realizar esta acción.');
    return;
<?php } ?>

            var row = $('#dg').datagrid('getSelected');
            if (row) {
                $('#dlg').dialog('open').dialog('center').dialog('setTitle', 'Editar Estudiante');
                var formData = {
                    cedula: row.estCedula,
                    nombre: row.estNombre,
                    apellido: row.estApellido,
                    direccion: row.estDireccion,
                    telefono: row.estTelefono
                };
                $('#fm').form('load', formData);
                $('#idcedula').textbox('readonly', true);
                url = 'models/editar.php?cedula=' + row.estCedula;
            }
        }

        function destroyUser() {
            <?php if(!isset($_SESSION['usuario']) || $_SESSION['usuario'] !== 'admin') { ?>
    alert('Acceso denegado. Solo el administrador puede realizar esta acción.');
    return;
<?php } ?>

            var row = $('#dg').datagrid('getSelected');
            if (row) {
                $.messager.confirm('Confirm', '¿Seguro que quieres borrar?', function(r) {
                    if (r) {
                        $.post('models/borrar.php', {cedula: row.estCedula}, function(result) {
                            if (!result.success) {
                                $('#dg').datagrid('reload');
                            } else {
                                $.messager.show({
                                    title: 'Error',
                                    msg: result.errorMsg
                                });
                            }
                        }, 'json');
                    }
                });
            }
        }

        function saveUser() {
            $('#fm').form('submit', {
                url: url,
                onSubmit: function() {
                    return $(this).form('validate');
                },
                success: function(result) {
                    var result = eval('(' + result + ')');
                    if (result.errorMsg) {
                        $.messager.show({
                            title: 'Error',
                            msg: result.errorMsg
                        });
                    } else {
                        $('#dlg').dialog('close');
                        $('#dg').datagrid('reload');
                    }
                }
            });
        }

        function reporte() {
            var row = $('#dg').datagrid('getSelected');
            if (row) {
                var cedula = row.estCedula;
                window.open('reportes/reporteparametro.php?cedula=' + cedula, '_blank');
            }
        }
        function newUsuario() {
    $('#dlgUsuario').dialog('open').dialog('center').dialog('setTitle', 'Nuevo Usuario');
    $('#fmUsuario').form('clear');
    }

function saveUsuario() {
    $('#fmUsuario').form('submit', {
        url: 'models/agragarUsuarios.php',
        onSubmit: function() {
            return $(this).form('validate');
        },
        success: function(result) {
            try {
                var result = JSON.parse(result);
                $.messager.show({
                    title: 'Resultado',
                    msg: result
                });
                $('#dlgUsuario').dialog('close');
                $('#dg').datagrid('reload');
            } catch (e) {
                $.messager.show({
                    title: 'Error',
                    msg: "Error al procesar respuesta del servidor."
                });
            }
        }
    });
}
    </script>

</body>
</html>
