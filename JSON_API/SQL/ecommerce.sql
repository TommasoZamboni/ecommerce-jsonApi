    create database if not exists tommaso_zamboni_ecommerce;

    create table if not exists   ommaso_zamboni_ecommerce.products
    (
        id int not null auto_increment primary key,
        nome varchar(50),
        marca varchar(50),
        prezzo float
    );