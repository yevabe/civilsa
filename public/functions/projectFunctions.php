<?php
require_once('conexion.php');


if (isset($_POST['uploadArch']) ? $_POST['uploadArch'] : '' == 1) {
    setArchivoAdjun();
}
if (isset($_POST['listarArchAdjun']) ? $_POST['listarArchAdjun'] : '' == 1) {
    listarArchivosAdjuntos();
}
if (isset($_POST['setPrincipal']) ? $_POST['setPrincipal'] : '' == 1) {
    setPrincipal();
}
if (isset($_POST['deleteImg']) ? $_POST['deleteImg'] : '' == 1) {
    delFile();
}

function listarArchivosAdjuntos()
{
    conectar($conn);
    $idProject = $_POST['oidProject'];
    $sql = "SELECT id,project_id,name_file,principal
            FROM project_images
            WHERE project_id = '{$idProject}'
            ORDER BY id DESC";
    $error = "<strong>Error:</strong> No fue posible consultar los archivo adjuntos View function: listarArchivosAdjuntos()";
    executeQuery($conn, $sql, $error, $stmt);
    $i = 0;
    $template = "";
    while ($row = mysqli_fetch_assoc($stmt)) {
        switch ($row['principal']) {
            case 1:
                $var = 0;
                $imagen = '<i class="fas fa-check fa-lg pointer" style="color:#38c172;" onclick="setPrincipal(' . $i . ');"></i>';

                break;
            case 0:
                $imagen = '<i class="fas fa-times fa-lg pointer" style="color:##dc3545;" onclick="setPrincipal(' . $i . ');"></i>';
                $var = 1;
                break;
            default:
                $imagen = "";
                $var = 0;
                break;
        }
        $template .= "<tr id='trImagen$i'>
            <td style='padding:1%;' align='center'>
            <input type='hidden' name='idImage$i' id='idImage$i' value='" . $row['id'] . "'>
            <input type='hidden' name='idProject$i' id='idProject$i' value='" . $idProject . "'>
            <input type='hidden' name='estado$i' id='estado$i' value='" . $row['principal'] . "'>
            <input type='hidden' name='newEstado$i' id='newEstado$i' value='$var'>
            <input type='hidden' name='nomImagen$i' id='nomImagen$i' value='" . utf8_encode($row['name_file']) . "'>
            <img class='img-fluid' src='/storage/projects/" . utf8_encode($row['name_file']) . "' style='width:100px;'>
            </td>
            <td style='text-align:center;' td='tdButton$i'>{$imagen}</td>
            <td style='text-align:center;' id='tdDelete$i'><i class='fas fa-trash fa-lg pointer' style='color:#dc3545;' onclick='return delFile($i);'></i></td>
            </tr>";
        $i++;
    }
    echo json_encode($template);
}

function setArchivoAdjun()
{
    $tipo = $_FILES['archivo']['type'];
    $tamano = $_FILES['archivo']['size'];
    foreach ($_FILES['archivo']['name'] as $i => $name) {
        $nombre =  basename($_FILES['archivo']['name'][$i]);
        $sfi = new SplFileInfo($nombre);
        $ext  = $sfi->getExtension();
        $nom = $sfi->getBasename($ext);
        $directorio = "../storage/projects";
        $nomArchivo = $_POST['oidProject'] . "-" . $nom . "" . $ext;
        $newArchivo = utf8_decode($nomArchivo);
        if (($tipo[$i] == 'image/png' || $tipo[$i] == 'image/jpeg') && $tamano[$i] < 5242880) {
            move_uploaded_file($_FILES['archivo']['tmp_name'][$i], $directorio . "/" . $newArchivo);
            insertInfoArch($newArchivo);
            $result = '1';
        } else if (($tipo[$i] != 'image/png' || $tipo[$i] != 'image/jpeg')) {
            $result = '3';
        } else if ($tamano[$i] < 5242880) {
            $result = '2';
        }
    }
    echo json_encode($result);
}

function insertInfoArch($nomArchivo)
{
    conectar($conn);
    $idProject = $_POST['oidProject'];
    $sql = "INSERT INTO project_images(project_id,name_file,principal)VALUES('{$idProject}','{$nomArchivo}',0)";
    $error = "<strong>Error:</strong> No fue posible enlazar el archivo adjunto View function: insertInfoArch()";
    executeQuery($conn, $sql, $error, $stmt);
}


function setPrincipal()
{
    conectar($conn);
    $sql = "SELECT COUNT(id) id
            FROM project_images
            WHERE project_id = '" . $_POST['idProject'] . "' AND principal = '1' AND id != '" . $_POST['idImage'] . "'";
    $error = "<strong>Error:</strong> No fue posible indicar que la imagen será la principal View function: setPrincipal()";
    executeQuery($conn, $sql, $error, $stmt);
    $row = mysqli_fetch_assoc($stmt);
    if ($row['id'] < 1) {
        $sql = "UPDATE project_images
                SET principal = '" . $_POST['estado'] . "'
                WHERE id = '" . $_POST['idImage'] . "'";
        $error = "<strong>Error:</strong> No fue posible indicar que la imagen será la principal View function: setPrincipal()";
        executeQuery($conn, $sql, $error, $stmt);
        echo json_encode('1');
    } else {
        echo json_encode('2');
    }
}

function delFile()
{
    unlink("../storage/projects/" . $_POST['nomImage']);
    conectar($conn);
    $idImg = $_POST['idImage'];
    $sql = "DELETE FROM project_images
            WHERE id = '{$idImg}'";
    $error = "<strong>Error:</strong> No fue posible indicar que la imagen será la principal View function: setPrincipal()";
    executeQuery($conn, $sql, $error, $stmt);
    echo json_encode('1');
}
