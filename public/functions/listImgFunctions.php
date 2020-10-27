<?php
require_once('conexion.php');

function listarArchivosAdjuntos($idProject)
{
    conectar($conn);
    $sql = "SELECT id,project_id,name_file,principal
            FROM project_images
            WHERE project_id = '{$idProject}' AND principal = '1'";
    $error = "<strong>Error:</strong> No fue posible consultar los archivo adjuntos View function: listarArchivosAdjuntos()";
    executeQuery($conn, $sql, $error, $stmt);
    $template = "";
    $numRows = mysqli_num_rows($stmt);
    if ($numRows > 0) {
        while ($row = mysqli_fetch_assoc($stmt)) {
            $template .= "<img class='card-img-top img-fluid' src='storage/projects/" . utf8_encode($row['name_file']) . "'>";
        }
    } else {
        $template .= "<img class='card-img-top img-fluid' src='img/logo_gota.png'>";
    }
    echo $template;
}

function listImages($idProject)
{
    conectar($conn);
    $sql = "SELECT id,project_id,name_file,principal
            FROM project_images
            WHERE project_id = '{$idProject}'
            ORDER BY principal DESC";
    $error = "<strong>Error:</strong> No fue posible consultar los archivo adjuntos View function: listarArchivosAdjuntos()";
    executeQuery($conn, $sql, $error, $stmt);
    $template = "";
    $numRows = mysqli_num_rows($stmt);
    if ($numRows > 0) {
        $i = 0;
        while ($row = mysqli_fetch_assoc($stmt)) {
            if ($i == 0) {
                $active = "active";
            } else {
                $active = "";
            }
            $template .= "<div class='carousel-item " . $active . "' > ";
            $template .= "<img class='d-block w-100 img-fluid mb-4' src='/storage/projects/" . $row['name_file'] . "' alt='Imagen del proyecto $idProject'>";
            $template .= '</div>';
            $i++;
        }
    } else {
        $template = "<div class='carousel-item active' > ";
        $template .= "<img class='d-block w-100 img-fluid mb-4' src='/img/logo_gota.png' alt='Imagen del proyecto $idProject'>";
        $template .= '</div>';
    }
    echo $template;
}

function listIndicadores($idProject)
{
    conectar($conn);
    $sql = "SELECT id,project_id,name_file,principal
            FROM project_images
            WHERE project_id = '{$idProject}'";
    $error = "<strong>Error:</strong> No fue posible consultar los archivo adjuntos View function: listarArchivosAdjuntos()";
    executeQuery($conn, $sql, $error, $stmt);
    $template = "";
    $numRows = mysqli_num_rows($stmt);
    if ($numRows > 0) {
        $i = 0;
        while ($row = mysqli_fetch_assoc($stmt)) {
            if ($i == 0) {
                $active = "class='active'";
            } else {
                $active = "";
            }
            $template .= '<li data-target="#carouselProjects" data-slide-to="' . $i . '" ' . $active . '></li>';
            $i++;
        }
    } else {
        $template = '<li data-target="#carouselProjects" data-slide-to="0" class="active"></li>';
    }
    echo $template;
}
