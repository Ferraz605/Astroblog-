create database AstroBlog;
use AstroBlog;

select count(idCurtida) from Curtida;
select count(contarObservacao) As total from Observacao; 
select count(contarUsuario) As total from Usuario;

select * from Usuario;
create table Usuario(
	idUsuario int not null auto_Increment primary key,
    nome varchar(150) not null,
    email varchar(100) not null,
    senha varchar(100) not null,
    tipo varchar(10) not null,
    dataCadastro date not null,
    curtida int not null,
    contarUsuario int not null
)engine = InnoDB;

insert into Usuario (idUsuario,nome,email,senha,tipo,dataCadastro,curtida,contarUsuario) values ('','AstroBlog+','AstroBlog@gmail.com','Ast0o@Bl0g','admin','2026/08/14',0,1);
insert into Usuario (idUsuario,nome,email,senha,tipo,dataCadastro,curtida,contarUsuario) values ('','JuliaP','Julia.P@gmail.com','1234','admin','2026/08/14',0,1);
insert into Usuario (idUsuario,nome,email,senha,tipo,dataCadastro,curtida,contarUsuario) values ('','JoãoA+','Joao.A@gmail.com','1234','admin','2026/08/14',0,1);
insert into Usuario (idUsuario,nome,email,senha,tipo,dataCadastro,curtida,contarUsuario) values ('','ViniciusM+','Vinicius.M@gmail.com','1234','admin','2026/08/14',0,1);

select * from LocalObservacao;
create table LocalObservacao(
	idLocal int not null auto_increment primary key,
	nomeLocal varchar(100) not null,
    cidade varchar(100) not null,
    estado varchar(100) not null,
    pais varchar(100) not null,
    descricao varchar(200) not null
)engine = InnoDB;

select * from Equipamento;
create table Equipamento (
	idEquipamento int not null auto_increment primary key,
    nomeEquipamento varchar(100) not null,
    tipo varchar(45) not null,
    marca varchar(45) not null,
    modelo varchar(45) not null
)engine = InnoDB;

select * from EventoAstronomico;
create table EventoAstronomico(
	idEventoAstronomico int not null auto_increment primary key,
    nomeEvento varchar(100) not null,
    categoria varchar(45) not null,
    dataEvento datetime not null,
    descricao varchar(200) not null
)engine = InnoDB;

insert into EventoAstronomico (idEventoAstronomico,nomeEvento,categoria,dataEvento,descricao) values ('','Lua cheia do Esturjão','Lua cheia','2026/09/02','Boa visibilidade de crateras e mares lunares a olho nu.');
insert into EventoAstronomico (idEventoAstronomico,nomeEvento,categoria,dataEvento,descricao) values ('',' Pico das Orionídeas','Chuva de meteoros Oriônidas','2026/10/21','Da meia-noite até o amanhecer, com o melhor momento na madrugada.');

select * from Observacao;
create table Observacao(
	idObservercao int not null auto_increment primary key,
    titulo varchar(150) not null,
    categoria varchar(45) not null,
    objetoObservado varchar(45) not null,
    dataObservacao date not null,
    condicaoClimatica varchar(45) not null,
    descricao varchar(200) not null,
    contarObservacao int not null,
    EventoAstronomicoId int null,
    EquipamentoId int  null,
    UsuarioId int null,
    LocalId int null
)engine = InnoDB;

insert into Observacao (idObservercao,titulo,categoria,objetoObservado,dataObservacao,condicaoClimatica,descricao,contarObservacao,EventoAstronomicoId,EquipamentoId,UsuarioId,LocalId)
 values ('','Os Mistérios do Cosmos: Por que Saturno Possui Anéis?','Oficial','Novidade','2026/08/13','Desconhecida','
Saturno possui seus icônicos anéis devido a um evento cósmico dramático: provavelmente uma antiga lua ou cometa que se aproximou demais e foi despedaçado pela intensa gravidade do planeta ao cruzar o chamado Limite de Roche. Compostos por bilhões de fragmentos de gelo e rocha que variam de pequenos grãos a blocos gigantescos, esses anéis são surpreendentemente jovens — formaram-se há apenas 10 a 100 milhões de anos, o que significa que surgiram enquanto os dinossauros ainda habitavam a Terra. Embora majestosos, eles são efêmeros e estão sendo lentamente consumidos pela atmosfera de Saturno, restando apenas alguns milhões de anos antes de desaparecerem por completo. 🪐✨
','1','0','0','1','0');
 
select * from Curtida;
create table Curtida(
    idCurtida int not null auto_increment primary key,
    UsuarioId int not null,
    ObservacaoId int not null
)engine = InnoDB;

alter table Observacao add constraint ObservacaoEventos foreign key (EventoAstronomicoId) references EventoAstronomico(idEventoAstronomico);
alter table Observacao add constraint ObservacaoEquipamento foreign key (EquipamentoId) references Equipamento(idEquipamento);
alter table Observacao add constraint ObservacaoUsuario foreign key (UsuarioId) references Usuario (idUsuario);
alter table Observacao add constraint ObservacaoLocal foreign key (LocalId) references LocalObservacao (idLocal);
alter table Curitda add constraint CurtidaUsuario foreign key (UsuarioId) references Usuario(idUsuario);
alter table Curtida add constraint CurtidaObservacao foreign key (ObservacaoId) references Observacao(idObservercao);
alter table Curtida add constraint UnicaCurtidaPorUsuario unique (UsuarioId, ObservacaoId);