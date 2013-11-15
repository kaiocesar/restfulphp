create schema if not exists `SlimProdutos`;

use SlimProdutos;

create table if not exists `SlimProdutos`.`Categorias` (
  `id` int not null auto_increment,
  `nome` varchar(100) null, 
  PRIMARY KEY(`id`)
);


create table if not exists `SlimProdutos`.`Produtos` (
 `id` int not null auto_increment,
 `nome` varchar(100) null, 
 `preco` decimal(10,2) null, 
 `dataInclusao` date null,
 `idCategoria` int not null,
 PRIMARY KEY(`id`),
 INDEX `fk_Produtos_Categorias_idx` (`idCategoria` ASC), CONSTRAINT `fk_Produtos_Categorias`
 FOREIGN KEY (`idCategoria`)
 REFERENCES `SlimProdutos`.`Categorias` (`id`)
 ON DELETE NO ACTION
 ON UPDATE NO ACTION
);
