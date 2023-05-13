create database banco;
use banco;

create table tb_salao
(
salao_id integer not null primary key auto_increment,
salao_nome varchar(120) not null,
salao_end varchar(120) not null,
salao_fone varchar(20) not null,
salao_email varchar(64) not null
);

insert into `tb_salao`(`salao_id`, `salao_nome`, `salao_end`, `salao_fone`, `salao_email`) values
(1, 'Lais', 'Rua Trintapraum, 666', 11982521877, 'lais22@gmail.com'),
(2, 'Tabata', 'Avenida São João, 12', 11972548422, 'tabs87@gmail.com'),
(3, 'Joaquim', 'Rua Queixeiras, 355', 46968424354, 'joaquims@gmail.com'),
(4, 'Flora', 'Rua Lispector, 47', 11968574585, 'florasouza@gmail.com'),
(5, 'Robério', 'Rua dos Canudos, 29', 21978588451, 'roberiofagundes@gmail.com');

select * from tb_salao;

-- CRIANDO TABELA SERVICO
create table tb_servico
(
servico_id integer not null primary key auto_increment,
servico_nome varchar(64) not null,
servico_valor varchar(12),
fk_salao_id integer not null
);

insert into `tb_servico` (`servico_id`, `servico_nome`, `servico_valor`, `fk_salao_id`) values
(1, 'Manicure', '35,00', 1),
(2, 'Escova', '125,00', 2),
(3, 'Corte', '50,00', 3),
(4, 'Progressiva', '250,00', 4),
(5, 'Corte', '50,00', 5);

select * from tb_servico;

-- ADICIONANDO CHAVE ESTRANGEIRA
alter table tb_servico 
add constraint pk_tb_salao_fk_tb_servico
foreign key (fk_salao_id)
references tb_salao(salao_id);


-- VIEW com o Mario
select ser.servico_id as servico_id , 
ser.servico_nome as servico_nome, 
ser.servico_valor as servico_valor, 
sa.salao_nome as fk_salao_id from tb_servico as ser inner join tb_salao as sa on ser.fk_salao_id=sa.salao_id;

create view view_salao as select ser.servico_id as servico_id , 
ser.servico_nome as servico_nome, 
ser.servico_valor as servico_valor, 
sa.salao_nome as fk_salao_id from tb_servico as ser inner join tb_salao as sa on ser.fk_salao_id=sa.salao_id;

select * from view_salao;

-- drop database banco;
