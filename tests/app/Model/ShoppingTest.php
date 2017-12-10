<?php
/**
 *
 */
class ShoppingTest extends PHPUnit_Framework_TestCase
{
  protected $_product;
  protected $_cart;
  protected $_user;

  function __construct()
  {
       $this->_product = new \Model\Product();
       $this->_cart = new \Model\Cart();
       $this->_user = new \Model\User();
   }

  public function testAddUserName()
  {
    $this->_user->setName('John Doe');
    $expected = "John Doe";
    $this->assertEquals($expected, $this->_user->getName());
  }

  public function testAddEmail()
  {
    $this->_user->setEmail('john.doe@example.com');
    $expected = "john.doe@example.com";
    $this->assertEquals($expected, $this->_user->getEmail());
  }

  public function testAddProductName()
  {
    $this->_product->setName('Apple');
    $expected = "Apple";
    $this->assertEquals($expected, $this->_product->getName());
  }

  public function testAddProductPrice()
  {
    $this->_product->setPrice(4.95);
    $expected = 4.95;
    $this->assertEquals($expected, $this->_product->getPrice());
  }

  public function testTotalOne()
  {
    $cart = $this->_cart;
    $product = $this->_product;
    $user = $this->_user;

    $user->setName('John Doe');
    $user->setEmail('john.doe@example.com');

    $product->setName('Apple');
    $product->setPrice(4.95);

    $cart->addProduct($product, $user);

    $product->setName('Apple');
    $product->setPrice(4.95);

    $cart->addProduct($product, $user);

    $product->setName('Orange');
    $product->setPrice(3.99);

    $cart->addProduct($product, $user);

    $expected = 13.89;

    $this->assertEquals($expected, $cart->total());
  }

  public function testTotalTwo()
  {
    $cart = $this->_cart;
    $product = $this->_product;
    $user = $this->_user;

    $user->setName('John Doe');
    $user->setEmail('john.doe@example.com');

    $product->setName('Apple');
    $product->setPrice(4.95);

    $cart->addProduct($product, $user);

    $product->setName('Apple');
    $product->setPrice(4.95);

    $cart->addProduct($product, $user);

    $product->setName('Apple');
    $product->setPrice(4.95);

    $cart->addProduct($product, $user);

    $cart->removeProduct('Apple'); //Remove product

    $expected = 9.9;

    $this->assertEquals($expected, $cart->total());
  }
}
