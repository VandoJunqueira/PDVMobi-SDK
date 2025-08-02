<?php

namespace Tests\Feature;

use PDVMobi\dtos\ComboConfigData;
use PDVMobi\dtos\ComboItemData;
use PDVMobi\dtos\ComboProductData;
use PDVMobi\dtos\CombosData;
use PDVMobi\dtos\PedidoData;
use PDVMobi\dtos\PedidoItemData;
use PDVMobi\dtos\PersonalCardItemData;
use PDVMobi\dtos\PersonalCardsData;
use PDVMobi\dtos\ProductGroupItemData;
use PDVMobi\dtos\ProductGroupsData;
use PDVMobi\dtos\ProductItemData;
use PDVMobi\dtos\ProductsData;
use PDVMobi\dtos\UsersData;
use PDVMobi\Enums\ProductTypeEnum;
use PDVMobi\Enums\StatusTypeEnum;
use PDVMobi\Enums\UnitTypeEnum;
use PDVMobi\PDVMobi;
use PHPUnit\Framework\TestCase;

class PDVMobiTest extends TestCase
{
    private $token = 'your_jwt_token_here';

    # php artisan test --filter=PDVMobiTest::test_auth
    public function test_auth(): void
    {
        $PDVMobi = new PDVMobi();

        $res = $PDVMobi->auth->get(username: 'your_subscription_key_here', password: '');
    }

    # php artisan test --filter=PDVMobiTest::test_users_list
    public function test_users_list(): void
    {
        $PDVMobi = new PDVMobi();
        $PDVMobi->setAuthorization(token: $this->token);

        $res = $PDVMobi->users->list();
    }

    # php artisan test --filter=PDVMobiTest::test_users_save
    public function test_users_save(): void
    {
        $PDVMobi = new PDVMobi();
        $PDVMobi->setAuthorization(token: $this->token);

        $usersData = UsersData::fromArray([
            'UsersID' => '',
            'Name' => 'Teste',
            'EMail' => 'vando_junqueira@hotmail.com',
            'Pass' => '123456',
        ]);

        $res = $PDVMobi->users->save($usersData);
    }

    # php artisan test --filter=PDVMobiTest::test_products_list
    public function test_products_list(): void
    {
        $PDVMobi = new PDVMobi();
        $PDVMobi->setAuthorization(token: $this->token);

        $res = $PDVMobi->products->list();
    }

    # php artisan test --filter=PDVMobiTest::test_products_save
    public function test_products_save(): void
    {
        $PDVMobi = new PDVMobi();
        $PDVMobi->setAuthorization(token: $this->token);

        $productData = new ProductsData([new ProductItemData(
            Name: 'teste2',
            StatusID: StatusTypeEnum::HABILITADO,
            ProductGroupID: '953F0491-3AEC-41E9-8AB3-3FE32B8FF3CB',
            ProductTypeID: ProductTypeEnum::PRODUZIDO,
            UnitTypeID: UnitTypeEnum::UN,
            InternalCode: 'ABCx',
            ImageBase64: 'iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR4nGMAAQAABQABDQottAAAAABJRU5ErkJggg==',
            SalePrice: 10
        )]);

        $res = $PDVMobi->products->save($productData);
    }

    # php artisan test --filter=PDVMobiTest::test_productgroups_list
    public function test_productgroups_list(): void
    {
        $PDVMobi = new PDVMobi();
        $PDVMobi->setAuthorization(token: $this->token);

        $res = $PDVMobi->productGroups->list();
    }

    # php artisan test --filter=PDVMobiTest::test_productgroups_save
    public function test_productgroups_save(): void
    {
        $PDVMobi = new PDVMobi();
        $PDVMobi->setAuthorization(token: $this->token);

        $productGroupsData = new ProductGroupsData([
            new ProductGroupItemData(
                Name: 'TesteGrupo'
            )
        ]);

        // dd($productGroupsData->toArray());

        $res = $PDVMobi->productGroups->save($productGroupsData);
    }

    # php artisan test --filter=PDVMobiTest::test_cards_list
    public function test_cards_list(): void
    {
        $PDVMobi = new PDVMobi();
        $PDVMobi->setAuthorization(token: $this->token);

        $res = $PDVMobi->personalCards->list();
    }

    # php artisan test --filter=PDVMobiTest::test_cards_save
    public function test_cards_save(): void
    {
        $PDVMobi = new PDVMobi();
        $PDVMobi->setAuthorization(token: $this->token);

        $personalCardData = new PersonalCardsData([
            new PersonalCardItemData(
                cardNumber: '123DRER'
            )
        ]);

        // dd($personalCardData->toArray());

        $res = $PDVMobi->personalCards->save($personalCardData);
    }

    # php artisan test --filter=PDVMobiTest::test_closeddraw_list
    public function test_closeddraw_list(): void
    {
        $PDVMobi = new PDVMobi();
        $PDVMobi->setAuthorization(token: $this->token);

        $res = $PDVMobi->closedDraw->list('2025-08-01 00:00:00', '2025-08-02 23:00:00');
    }

    # php artisan test --filter=PDVMobiTest::test_sales_list
    public function test_sales_list(): void
    {
        $PDVMobi = new PDVMobi();
        $PDVMobi->setAuthorization(token: $this->token);

        $res = $PDVMobi->sales->list('2025-07-31 00:00:00', '2025-08-02 23:00:00');
    }

    # php artisan test --filter=PDVMobiTest::test_pedido_save
    public function test_pedido_save(): void
    {
        $PDVMobi = new PDVMobi();
        $PDVMobi->setAuthorization(token: $this->token);

        $pedidoData = new PedidoData(
            NumSerialPOS: '48dadd34880bb430',
            IDCobranca: 'Mesa 1',
            IDPagamento: '3',
            Itens: [new PedidoItemData(
                ProductID: '4EF11AB2-DB2C-47C9-B55B-024404913BE9',
                price: '15'
            )]
        );

        // dd($personalCardData->toArray());

        $res = $PDVMobi->pedidos->save($pedidoData);
    }

    # php artisan test --filter=PDVMobiTest::test_combo_save
    public function test_combo_save(): void
    {
        $PDVMobi = new PDVMobi();
        $PDVMobi->setAuthorization(token: $this->token);

        $comboData = new CombosData([
            new ComboProductData(
                // ProductID: '12345678-AAAA-BBBB-CCCC-1234567890AB',
                ProductName: 'Combo XTudo',
                // StatusCombo: 1,
                ComboConfig: [
                    new ComboConfigData(
                        Description: 'Hamburguer',
                        MinItens: 1,
                        MaxItens: 1,
                        Addition: 1,
                        ComboItems: [
                            new ComboItemData(
                                ProductID: '4EF11AB2-DB2C-47C9-B55B-024404913BE9',
                                Price: '15'
                            )
                        ]
                    ),
                    new ComboConfigData(
                        Description: 'Bebida',
                        MinItens: 1,
                        MaxItens: 1,
                        Addition: 1,
                        ComboItems: [
                            new ComboItemData(
                                ProductID: 'D1DC08A0-D9E4-4889-8B06-82A9CFFEDE36',
                                Price: '10'
                            )
                        ]
                    )
                ]
            )
        ]);

        // dd($comboData->toArray());

        // Envia o combo
        $res = $PDVMobi->combos->save($comboData);

        // Visualiza o resultado

    }
}
