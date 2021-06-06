/*
 Navicat Premium Data Transfer

 Source Server         : LOCAL
 Source Server Type    : MySQL
 Source Server Version : 100417
 Source Host           : localhost:3306
 Source Schema         : marketplace

 Target Server Type    : MySQL
 Target Server Version : 100417
 File Encoding         : 65001

 Date: 06/06/2021 01:19:45
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for global_categorias
-- ----------------------------
DROP TABLE IF EXISTS `global_categorias`;
CREATE TABLE `global_categorias`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `categoria` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `icono` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `activo` tinyint(2) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 14 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of global_categorias
-- ----------------------------
INSERT INTO `global_categorias` VALUES (1, 'Moda Mujeres', 'fas fa-female', 1);
INSERT INTO `global_categorias` VALUES (2, 'Moda Hombres', 'fas fa-male', 1);
INSERT INTO `global_categorias` VALUES (3, 'Teléfono y Accesorios', 'fas fa-mobile-alt', 1);
INSERT INTO `global_categorias` VALUES (4, 'Computadoras', 'fas fa-laptop', 1);
INSERT INTO `global_categorias` VALUES (5, 'Electrónicos', 'fas fa-plug', 1);
INSERT INTO `global_categorias` VALUES (6, 'Joyas y Relojes', 'fas fa-gem', 1);
INSERT INTO `global_categorias` VALUES (7, 'Hogar', 'fas fa-home', 1);
INSERT INTO `global_categorias` VALUES (8, 'Mascotas', 'fas fa-paw', 1);
INSERT INTO `global_categorias` VALUES (9, 'Deportes y Juegos', 'fas fa-futbol', 1);
INSERT INTO `global_categorias` VALUES (10, 'Belleza y Cabello', 'fas fa-spa', 1);
INSERT INTO `global_categorias` VALUES (11, 'Salud', 'fas fa-hand-holding-heart', 1);
INSERT INTO `global_categorias` VALUES (12, 'Vehiculos', 'fas fa-car', 1);
INSERT INTO `global_categorias` VALUES (13, 'Herramientas', 'fas fa-tools', 1);

-- ----------------------------
-- Table structure for imagenes_ofertas
-- ----------------------------
DROP TABLE IF EXISTS `imagenes_ofertas`;
CREATE TABLE `imagenes_ofertas`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fecha` datetime(0) NULL DEFAULT current_timestamp(0),
  `imagen` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `estado` tinyint(2) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of imagenes_ofertas
-- ----------------------------

-- ----------------------------
-- Table structure for productos
-- ----------------------------
DROP TABLE IF EXISTS `productos`;
CREATE TABLE `productos`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_tienda` int(11) NULL DEFAULT NULL,
  `id_usuario` int(11) NULL DEFAULT NULL,
  `id_categoria` int(11) NULL DEFAULT NULL,
  `id_marca` int(11) NULL DEFAULT NULL,
  `nombre` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `descripcion` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `imagen` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL COMMENT 'nombre de la imagen',
  `estado` tinyint(2) NULL DEFAULT NULL COMMENT '1 = nuevo ; 2 = usado',
  `precio` decimal(10, 2) NULL DEFAULT NULL,
  `fecha` datetime(0) NULL DEFAULT current_timestamp(0),
  `activo` tinyint(2) NULL DEFAULT 1,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 7 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of productos
-- ----------------------------
INSERT INTO `productos` VALUES (1, 1, 2, 3, NULL, 'Samsung Galaxy A31', '4gb ram, 128 gb rom, android 10, nuevo', 'galaxya31s.jpg', 1, 200.00, '2021-06-03 14:20:08', 1);
INSERT INTO `productos` VALUES (2, 1, 2, 3, NULL, 'Xiaomi Redmi Note 9 S', '8gb ram, 128 gb rom, android 10, nuevo', 'xiaomiredminote9pro.jpg', 1, 250.00, '2021-06-04 09:36:40', 1);
INSERT INTO `productos` VALUES (3, 2, 4, 2, NULL, 'Camisa P Hombre Casual', 'Elegante camisa para caballero blanca', '011a2a36dd980d08f5105bac63c83cd1.jpg', 1, 15.00, '2021-06-05 22:58:52', 1);
INSERT INTO `productos` VALUES (4, 2, 4, 1, NULL, 'Blusa P/dama Casual', 'Elegante e innovador diseño de blusa para dama', 'blusas-de-moda-camisas-mujer-gasa-camisa.jpg', 1, 18.00, '2021-06-05 23:00:24', 1);
INSERT INTO `productos` VALUES (5, 1, 2, 3, NULL, 'Iphone XR', 'Elegante dispositivo de Apple', '717KHGCJ6eL._AC_SL1500_.jpg', 1, 500.00, '2021-06-05 23:07:19', 1);
INSERT INTO `productos` VALUES (6, 1, 2, 4, NULL, 'Procesador Ryzen 5', '3.5Ghz - 5mb cache - gaming vega 11', '516BrRLNS6L.__AC_SX300_SY300_QL70_ML2_.jpg', 1, 300.00, '2021-06-05 23:10:41', 1);

-- ----------------------------
-- Table structure for productos_carrito
-- ----------------------------
DROP TABLE IF EXISTS `productos_carrito`;
CREATE TABLE `productos_carrito`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_usuario` int(11) NULL DEFAULT NULL,
  `id_producto` int(11) NULL DEFAULT NULL,
  `cantidad` int(11) NULL DEFAULT NULL,
  `fecha` datetime(0) NULL DEFAULT current_timestamp(0),
  `activo` tinyint(1) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of productos_carrito
-- ----------------------------
INSERT INTO `productos_carrito` VALUES (1, 1, 1, 1, '2021-06-05 22:45:29', 1);

-- ----------------------------
-- Table structure for productos_favorito
-- ----------------------------
DROP TABLE IF EXISTS `productos_favorito`;
CREATE TABLE `productos_favorito`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_usuario` int(11) NULL DEFAULT NULL,
  `id_producto` int(11) NULL DEFAULT NULL,
  `fecha` datetime(0) NULL DEFAULT current_timestamp(0),
  `activo` tinyint(1) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of productos_favorito
-- ----------------------------
INSERT INTO `productos_favorito` VALUES (1, 1, 2, '2021-06-05 22:54:36', 1);

-- ----------------------------
-- Table structure for productos_imagenes
-- ----------------------------
DROP TABLE IF EXISTS `productos_imagenes`;
CREATE TABLE `productos_imagenes`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_producto` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of productos_imagenes
-- ----------------------------

-- ----------------------------
-- Table structure for productos_ofertas
-- ----------------------------
DROP TABLE IF EXISTS `productos_ofertas`;
CREATE TABLE `productos_ofertas`  (
  `id` int(11) NOT NULL,
  `id_producto` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of productos_ofertas
-- ----------------------------

-- ----------------------------
-- Table structure for usuarios
-- ----------------------------
DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE `usuarios`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tipo` tinyint(3) NULL DEFAULT NULL COMMENT '1 => tienda ; 2 => cliente; 3 => su\r\n',
  `nombre` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `correo` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `clave` char(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `activo` tinyint(2) NULL DEFAULT 1,
  `fecha` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT current_timestamp(255),
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of usuarios
-- ----------------------------
INSERT INTO `usuarios` VALUES (1, 2, 'Marlon Arbaiza', 'edgardo.9690@gmail.com', '3be0ff98032936bc7f9df51c5685ee5f2dd6ccee', 1, '2021-06-03 11:46:27');
INSERT INTO `usuarios` VALUES (2, 1, 'Jhonatan Emanuel', 'tokunsan05@gmail.com', '3be0ff98032936bc7f9df51c5685ee5f2dd6ccee', 1, '2021-06-03 11:51:30');
INSERT INTO `usuarios` VALUES (3, 3, 'root', 'root', '3be0ff98032936bc7f9df51c5685ee5f2dd6ccee', 1, '2021-06-05 21:27:13');
INSERT INTO `usuarios` VALUES (4, 1, 'Wendy Ventura', 'wv', '3be0ff98032936bc7f9df51c5685ee5f2dd6ccee', 1, '2021-06-05 22:56:09');

-- ----------------------------
-- Table structure for usuarios_roles
-- ----------------------------
DROP TABLE IF EXISTS `usuarios_roles`;
CREATE TABLE `usuarios_roles`  (
  `id` int(11) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of usuarios_roles
-- ----------------------------

-- ----------------------------
-- Table structure for usuarios_tienda
-- ----------------------------
DROP TABLE IF EXISTS `usuarios_tienda`;
CREATE TABLE `usuarios_tienda`  (
  `id` int(11) NOT NULL,
  `id_usuario` int(11) NULL DEFAULT NULL,
  `nombre` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `descripcion` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `imagen` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `facebook` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `instagram` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `contacto` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `activo` tinyint(2) NULL DEFAULT 1,
  `fecha` datetime(0) NULL DEFAULT current_timestamp(0),
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of usuarios_tienda
-- ----------------------------
INSERT INTO `usuarios_tienda` VALUES (0, 4, 'Wen Store', 'Moda', 'wenstore.png', 'wenstore', 'wenstore.png', '26654152', 1, '2021-06-05 22:56:27');
INSERT INTO `usuarios_tienda` VALUES (1, 2, 'Galaxy Store', 'Teléfonos y accesorios', 'galaxystore.jpg', 'galaxystore', 'galaxystore', '26654152', 1, '2021-06-03 14:18:43');

SET FOREIGN_KEY_CHECKS = 1;
