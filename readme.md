## Criação de API para teste

1 - Criar as seguintes entidades:

- [x] [Pessoa Física – nome, cpf;](https://github.com/anderson-giordani/cctiapi/blob/master/database/migrations/2019_09_14_160721_create_pessoas_fisicas_table.php)

- [x] [Pessoa Jurídica – razao_social, cnpj;](https://github.com/anderson-giordani/cctiapi/blob/master/database/migrations/2019_09_14_161806_create_pessoas_juridicas_table.php)

- [x] [Animais – identificacao(14 digitos), raca, sexo;](https://github.com/anderson-giordani/cctiapi/blob/master/database/migrations/2019_09_14_160432_create_animais_table.php)

2 – As entidades se relacionam da seguinte forma: **[Ver relacionamentos nos Models da aplicação](https://github.com/anderson-giordani/cctiapi/tree/master/app)**

- [x] Pessoa Juridica possui um representante, uma Pessoa Fisica;

- [x] Um Animal, possui um dono que pode ser uma pessoa fisica ou juridica;

3 – Criar uma API onde seja possível:

- [x] Criar Pessoas Físicas, com validação do CPF;


- [x] Criar Pessoas Jurídicas, com vinculação de um representante;

- [x] Criação de Animais, com vinculação de seu dono
