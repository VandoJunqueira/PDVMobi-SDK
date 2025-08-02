<?php

declare(strict_types=1);

namespace PDVMobi;

/**
 * Vando Junqueira - https://github.com/VandoJunqueira
 * Classe para interação do PDVMobi [POS CONTROLE].
 *
 * @property Auth  $auth
 * @property Users $users
 * @property Products $products
 * @property ProductGroups $productGroups
 * @property PersonalCards $personalCards
 * @property ClosedDraw $closedDraw
 * @property VrfTicket $vrfTicket
 * @property Sales $sales
 * @property Pedidos $pedidos
 * @property ProductCombos $combos
 * @property NFCe $NFCe
 */
class PDVMobi
{
    private $http;

    /**
     * Array associativo para mapear os nomes das classes às suas respectivas propriedades.
     *
     * @var array
     */
    private $classes = [
        'auth'   => Auth::class,
        'users'   => Users::class,
        'products'   => Products::class,
        'productGroups'   => ProductGroups::class,
        'personalCards'   => PersonalCards::class,
        'closedDraw'   => ClosedDraw::class,
        'vrfTicket'   => VrfTicket::class,
        'sales'   => Sales::class,
        'pedidos'   => Pedidos::class,
        'combos' => ProductCombos::class,
        'NFCe' => NFCe::class,
    ];

    public function __construct($httpClient = null)
    {
        if ($httpClient !== null) {
            $this->http = $httpClient;
            return;
        }

        // Detecta se está no Laravel
        if (class_exists(\Illuminate\Foundation\Application::class) && function_exists('app')) {
            $this->http = new ApiConnection();
        } else {
            $baseUrl = getenv('PDV_MOBI_BASE_URL') ?: 'https://api.poscontrole.com.br';
            $subscriptionKey = getenv('PDV_MOBI_SUBSCRIPTION_KEY') ?: null;
            $this->http = new ApiConnectionCurl($baseUrl, $subscriptionKey);
        }
    }

    public function setAuthorization(string $token): void
    {
        $this->http->setAuthorization($token);
    }

    /**
     * Método mágico para acessar dinamicamente as propriedades da classe.
     *
     * @param string $name Nome da propriedade.
     *
     * @return mixed Instância da classe correspondente à propriedade ou null se a propriedade não existir.
     */
    public function __get($name)
    {
        if (\array_key_exists($name, $this->classes)) {
            $class = $this->classes[$name];
            return new $class($this->http);
        }

        // Retornar nulo se a propriedade não existir
        return null;
    }
}
