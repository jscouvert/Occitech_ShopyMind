<?php

/**
 * @loadSharedFixture
 */
class SPM_ShopyMind_Test_Lib_ShopymindClient_Callback_Get_Birthday_Clients extends EcomDev_PHPUnit_Test_Case
{

    public static function tearDownAfterClass()
    {
        parent::tearDownAfterClass();

        $write = Mage::getSingleton('core/resource')->getConnection('write');
        $write->query(<<<'QUERY'
        TRUNCATE customer_address_entity_int;
        TRUNCATE customer_address_entity_varchar;
        TRUNCATE sales_flat_order_address;
QUERY
        );
    }

    public function testGetCustomersListCelebratingTheirBirthdayAtAGivenDateAndAGivenStore()
    {
        $expected = array(
            array(
                'customer' => array(
                    'id_customer' => '1',
                    'last_name' => 'Oliver',
                    'first_name' => 'April',
                    'email_address' => 'april.oliver90@example.com',
                    'gender' => '2',
                    'locale' => 'US',
                    'birthday' => '1990-01-01 00:00:00',
                    'optin' => false,
                    'customer_since' => '0000-00-00 00:00:00',
                    'phone1' => '',
                    'phone2' => '',
                    'date_last_order' => 0,
                    'nb_order' => '0',
                    'sum_order' => 0,
                    'groups' => array('1'),
                    'store_id' => '1',
                    'nb_order_year' => '0',
                    'sum_order_year' => 0,
                ),
            ),
            array(
                'customer' => array(
                    'id_customer' => '2',
                    'last_name' => 'Perez',
                    'first_name' => 'Gary',
                    'email_address' => 'gary.perez41@example.com',
                    'gender' => '1',
                    'locale' => 'US',
                    'birthday' => '1990-01-01 00:00:00',
                    'optin' => false,
                    'customer_since' => '0000-00-00 00:00:00',
                    'phone1' => '',
                    'phone2' => '',
                    'date_last_order' => 0,
                    'nb_order' => '0',
                    'sum_order' => 0,
                    'groups' => array('1'),
                    'store_id' => '1',
                    'nb_order_year' => '0',
                    'sum_order_year' => 0,
                ),
            ),
        );

        $actual = ShopymindClient_Callback::getBirthdayClients(
            'store-1',
            date('1990-01-01 00:00:00'),
            array(array('country' => 'US'))
        );

        $this->assertEquals($expected, $actual);
    }
    
}
