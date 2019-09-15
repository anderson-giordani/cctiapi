## Criação de API para teste

1 - Criar as seguintes entidades:

- [x] [Pessoa Física – nome, cpf](https://github.com/anderson-giordani/cctiapi/blob/master/database/migrations/2019_09_14_160721_create_pessoas_fisicas_table.php);
- [x] [Pessoa Jurídica – razao_social, cnpj;](https://github.com/anderson-giordani/cctiapi/blob/master/database/migrations/2019_09_14_161806_create_pessoas_juridicas_table.php)
- [x] [Animais – identificacao(14 digitos), raca, sexo;](https://github.com/anderson-giordani/cctiapi/blob/master/database/migrations/2019_09_14_160432_create_animais_table.php)

2 – As entidades se relacionam da seguinte forma: **[Ver relacionamentos nos Models da aplicação](https://github.com/anderson-giordani/cctiapi/tree/master/app)**

- [x] Pessoa Juridica possui um representante, uma Pessoa Fisica;
- [x] Um Animal, possui um dono que pode ser uma pessoa fisica ou juridica;

3 – Criar uma API onde seja possível:

- [x] Criar Pessoas Físicas, com validação do CPF;
- [x] Criar Pessoas Jurídicas, com vinculação de um representante;
- [x] Criação de Animais, com vinculação de seu dono.

### Response

**[Traits\ApiResponse](https://github.com/anderson-giordani/cctiapi/blob/master/app/Traits/ApiResponser.php)**: classe responsável pela transformação de todos os retornos em Json.

**[App\Http\Controllers\ApiController](https://github.com/anderson-giordani/cctiapi/blob/master/app/Http/Controllers/ApiController.php)**: classe chama Traits\ApiResponse e todo controller deve extender ApiController ao inves de Controller, padronizando assim os retornos em json.

### Relacionamento entre PF/PJ e Animais 

Optei pela utilização do recurso do Laravel **[One To Many (Polymorphic)](https://laravel.com/docs/master/eloquent-relationships#one-to-many-polymorphic-relations)**, pois no exemplo dado não fazia sentido a criação de herança para pessoa física e pessoa juridica.
Animais pode pertencer a dois Models diferentes ultilizando este recurso.
- Devido a essa escolha, para fazer a persistência de um animal(que não faz sentido existir sem um dono) escolhi a utilização dos seguintes endpoints:

  <em>POST     | pessoas-fisicas/{pessoas_fisica}/animais     => Vincula a criação de um novo animal a pessoa fisica em questão</em>
  <em>GET|HEAD | pessoas-fisicas/{pessoas_fisica}/animai       => Mostra todos os animais de terminada pessoa física</em>

O mesmo funciona para pessoa juridíca - mudando apenas o endpoint a api reconhece automaticamente ao tipo de pessoa que ao animal pertence.

- também é possível persistir animal pela rota padrão
  <em>POST     | animais</em>
    
### Tratamento de Erros

[App\Exceptions\Handle.php](https://github.com/anderson-giordani/cctiapi/blob/master/app/Exceptions/Handler.php): alterei a classe para obter todos as respostas de erro em Json.

### Validação de Atributos

[App\Http\Requests](https://github.com/anderson-giordani/cctiapi/tree/master/app/Http/Requests): diretório contendo todas as classes de validação, diminuindo o acoplamento entre a validação e os controllers.

### ENDPOITS

Removi o prefixo api, todas as requisições são direcionadas a API

### Exemplo Simples

Vale lembrar que esta é apenas uma API simples, sem camadas e muitos recursos essenciais para qualquer projeto, muito pode ser feito, e o que ja foi feito pode ainda melhorar.

:)
