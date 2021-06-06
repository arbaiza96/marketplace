<?php 

Class principal extends Conexion{

	public function __construct(){
        parent::__construct();  
    }

    public function cargar_productos_nombre($nombre){
        $sql = "SELECT id, nombre, descripcion, imagen, precio FROM productos WHERE activo = 1 AND nombre like :nombre";
        return $this->ejecutar_consulta_preparada($sql,array(":nombre" => "%".$nombre."%"),$this->pdo);
    }

    public function productos_top(){
        $sql = "SELECT id, nombre, descripcion, imagen, precio FROM productos WHERE activo = 1 LIMIT 6";
        return $this->ejecutar_consulta($sql,$this->pdo);
    }

    public function productos_top_categoria($categoria){
        $sql = "SELECT id, nombre, descripcion, imagen, precio FROM productos WHERE activo = 1 AND id_categoria = :categoria LIMIT 3";
        return $this->ejecutar_consulta_preparada($sql,array(":categoria" => $categoria),$this->pdo);
    }

    public function obtener_carrito($id){
        $sql = "SELECT productos.id, productos.nombre, productos.descripcion, productos.imagen, productos.precio 
                FROM productos
                INNER JOIN productos_carrito ON ( productos_carrito.id_producto = productos.id AND productos_carrito.id_usuario = :usuario ) 
                WHERE productos_carrito.activo = 1";
        return $this->ejecutar_consulta_preparada($sql,array(":usuario" => $id),$this->pdo);    
    }

    public function obtener_favoritos($id){
        $sql = "SELECT productos.id, productos.nombre, productos.descripcion, productos.imagen, productos.precio 
                FROM productos
                INNER JOIN productos_favorito ON ( productos_favorito.id_producto = productos.id AND productos_favorito.id_usuario = :usuario ) 
                WHERE productos_favorito.activo = 1";
        return $this->ejecutar_consulta_preparada($sql,array(":usuario" => $id),$this->pdo);    
    }

    public function cargar_categorias(){
        $sql = "SELECT id, categoria, icono  FROM global_categorias WHERE activo = 1";
        return $this->ejecutar_consulta($sql,$this->pdo);
    }

    public function cargar_productos_categorias($id){
        $sql = "SELECT id, nombre, descripcion, imagen, precio FROM productos WHERE activo = 1 AND id_categoria = :id";
        return $this->ejecutar_consulta_preparada($sql,array(":id" => $id),$this->pdo);
    }

    public function informacion_producto($id){
        $sql="SELECT productos.id, usuarios_tienda.id as id_tienda, usuarios_tienda.nombre as nombre_tienda,  productos.id_tienda, productos.id_usuario, productos.id_categoria, productos.id_marca, productos.nombre, productos.descripcion, productos.imagen, productos.estado, productos.precio, productos.fecha, productos.activo 
                FROM productos left join usuarios_tienda on productos.id_tienda = usuarios_tienda.id
            WHERE productos.activo = 1 AND productos.id = :id";
        return $this->ejecutar_consulta_preparada_una($sql,array(":id" => $id),$this->pdo);   
    }

    public function productos_tienda($id, $producto){
        $sql = "SELECT id, nombre, descripcion, imagen, precio FROM productos WHERE activo = 1 AND id_tienda = :id AND id != :producto LIMIT 6";
        return $this->ejecutar_consulta_preparada($sql,array(":id" => $id, ":producto" => $producto),$this->pdo);
    }

    public function verificar_acceso($correo, $clave){
        $clave_ = sha1(md5($clave));
        $sql = "SELECT id, tipo, nombre FROM usuarios WHERE activo = 1 AND clave = :clave AND correo = :correo LIMIT 1";
        return $this->ejecutar_consulta_preparada_una($sql,array(":clave" => $clave_, ":correo" => $correo),$this->pdo);   
    }



}


?>