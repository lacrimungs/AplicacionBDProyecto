<?php
function obtenerConsulta1($conn) {
    $stmt = $conn->query("SELECT usuario.id, usuario.nombre, perfil.profile, usuarioinfo.nombre AS nombre_info, usuarioinfo.apellidoP, usuarioinfo.apellidoM
    FROM usuario
    INNER JOIN perfil ON usuario.perfil = perfil.id
    INNER JOIN usuarioinfo ON usuario.id = usuarioinfo.id");
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function obtenerConsulta2($conn) {
    $stmt = $conn->query("SELECT distribuidor.id, distribuidor.nombre, distribuidor.apellidoP, distribuidor.apellidoM, producto.nombre 
    AS nombre_producto, producto.descripcion
    FROM distribuidor
    INNER JOIN producto ON distribuidor.producto_id = producto.id;");
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
function obtenerConsulta3($conn) {
    $stmt = $conn->query("SELECT 
    producto.id AS id_producto,
    producto.nombre AS nombre_producto,
    producto.descripcion AS descripcion_producto,
    producto.uso_producto,
    producto.num_producto_disponible,
    producto.direccion_tienda,
    proveedor.id AS id_proveedor,
    proveedor.nombre AS nombre_proveedor,
    proveedor.apellidoP AS apellido_proveedor
FROM 
    producto
LEFT JOIN 
    proveedor ON producto.id = proveedor.producto_id
LIMIT 6;");
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
?>
