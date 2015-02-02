<?php

/**
 * @loadSharedFixture
 */
class SPM_ShopyMind_Test_Lib_ShopymindClient_Callback_Get_Products extends EcomDev_PHPUnit_Test_Case
{

    public function testCanGetRandomProducts()
    {
        Mage::app()->setCurrentStore(1);
        $products = ShopymindClient_Callback::getProducts(1, false, false, true, 1);

        $this->assertRegExp('#catalog/product/view/id/[1-2]/#', $products[0]['product_url']);
    }

    public function testIfAStoreHasNoProductsNothingIsReturned()
    {
        $products = ShopymindClient_Callback::getProducts(2, false, false, true, 1);

        $this->assertEmpty($products);
    }

}
