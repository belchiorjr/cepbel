/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

DROP DATABASE IF EXISTS `cepbel`;
CREATE DATABASE IF NOT EXISTS `cepbel` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_bin */;
USE `cepbel`;

DROP TABLE IF EXISTS `cep`;
CREATE TABLE IF NOT EXISTS `cep` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Chave primária do cep',
  `cep` int(11) NOT NULL COMMENT 'Número do cep',
  `logradouro` varchar(255) NOT NULL COMMENT 'Logradouro referente',
  `bairro` varchar(255) NOT NULL COMMENT 'Descricao do bairro',
  `localidade` varchar(255) NOT NULL COMMENT 'Cidade do cep',
  `uf` varchar(2) NOT NULL COMMENT 'Sigla do Estado',
  `unidade` varchar(255) DEFAULT NULL COMMENT 'Unidade de Tratamento',
  `ibge` int(11) DEFAULT NULL COMMENT 'Código Ibge, util para nota fiscal',
  `gia` int(11) DEFAULT NULL COMMENT 'Guia de Informação e Apuração do ICMS',
  `dta_inc` datetime NOT NULL DEFAULT current_timestamp() COMMENT 'Instante em que é registrado o cep',
  `dta_upd` datetime DEFAULT current_timestamp() COMMENT 'Instante que o cep é alterado',
  PRIMARY KEY (`id`),
  UNIQUE KEY `cep` (`cep`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COMMENT='Tabela que armazena os dados do cep.';

DELETE FROM `cep`;
/*!40000 ALTER TABLE `cep` DISABLE KEYS */;
/*!40000 ALTER TABLE `cep` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
