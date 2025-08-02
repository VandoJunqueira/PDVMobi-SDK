# PDVMobi SDK
[![PHP Version](https://img.shields.io/badge/php-8.1+-blue.svg)](https://www.php.net/)
[![License](https://img.shields.io/badge/license-MIT-green.svg)](LICENSE)
[![GitHub issues](https://img.shields.io/github/issues/VandoJunqueira/pdvmobi-sdk.svg)](https://github.com/VandoJunqueira/pdvmobi-sdk/issues)
SDK PHP para integração com a API PDVMobi (POS Controle), com suporte para Laravel e PHP puro.
## Instalação
Recomenda-se instalar via Composer:

    composer require vandojunqueira/pdvmobi-sdk

## Requisitos
- PHP 8.1 ou superior
- Para usar no Laravel e aproveitar o ServiceProvider, instale também:

    composer require illuminate/support

## Uso
### PHP Puro

```php
require 'vendor/autoload.php';

use PDVMobi\PDVMobi;

$pdv = new PDVMobi();
$pdv->setAuthorization('seu_token_aqui');

$usuarios = $pdv->users->listar();
print_r($usuarios);
```

### Laravel
O SDK detecta automaticamente o ambiente Laravel. Você pode registrar o Service Provider em `config/app.php`:

```php
'providers' => [
    // ...
    PDVMobi\Laravel\PDVMobiServiceProvider::class,
],
```

Uso no Laravel:

```php
use PDVMobi\PDVMobi;

$pdv = app(PDVMobi::class);
$pdv->setAuthorization('seu_token_aqui');

$produtos = $pdv->products->listar();
```

## Componentes disponíveis

| Chave          | Classe           |
|----------------|------------------|
| auth           | Auth::class      |
| users          | Users::class     |
| products       | Products::class  |
| productGroups  | ProductGroups::class |
| personalCards  | PersonalCards::class |
| closedDraw     | ClosedDraw::class|
| vrfTicket      | VrfTicket::class |
| sales          | Sales::class     |
| pedidos        | Pedidos::class   |
| combos         | ProductCombos::class |
| NFCe           | NFCe::class      |

## Configuração
Variáveis de ambiente:

| Variável                    | Descrição                             | Valor padrão                     |
| --------------------------- | ------------------------------------- | -------------------------------- |
| `PDV_MOBI_BASE_URL`         | URL base da API PDVMobi               | `https://api.poscontrole.com.br` |
| `PDV_MOBI_SUBSCRIPTION_KEY` | Chave para assinatura nas requisições | (null)                           |

## Desenvolvimento
- Código PSR-4 em `src/`
- Testes com PHPUnit em `tests/`
- Para evitar erros de IDE (Intelephense), rode:

    composer require illuminate/support --dev

## Contribuição
Sinta-se à vontade para abrir issues e pull requests!

## Licença
MIT © Vando Junqueira

## Contato
- GitHub: [https://github.com/VandoJunqueira](https://github.com/VandoJunqueira)
