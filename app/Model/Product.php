<?php
namespace Model;
/**
 *
 */
class Product
{
  private $id;
  private $name;
  private $price;

  public function getId()
  {
      return $this->id;
  }


  public function setId($id)
  {
      $this->id = $id;
  }

  public function getName()
  {
      return $this->name;
  }

  public function setName($name)
  {
      $this->name = $name;
  }

  public function getPrice()
  {
      return $this->price;
  }

  public function setPrice($price)
  {
      $this->price = $price;
  }

}

class Cart
{
  private $products;
  private $id;

  public function getProducts()
  {
      return $this->products;
  }


  public function addProduct(Product $product, User $user)
  {
      $this->products[] = array(
                                "email" => $user->getEmail(),
                                "userName" => $user->getName(),
                                "productName" => $product->getName(),
                                "price" => $product->getPrice()
                               );
  }

  public function removeProduct($productName)
  {
      $arr = $this->products;
      foreach ($arr as $key => $value)
      {
        if ($value['productName'] == $productName)
        {
          unset( $arr[$key] );
        }
        break;
      }
      $this->products = $arr;
  }


  public function getId()
  {
      return $this->id;
  }


  public function setId($id)
  {
      $this->id = $id;
  }

  public function total(){
    $data = $this->getProducts();
    $total = array();
    foreach ($data as $value) {
      $total[] = $value['price'];
    }
    return array_sum($total);
  }
}

class User
{
  private $name;
  private $email;
  private $id;

  public function getId()
  {
      return $this->id;
  }

  public function setId($id)
  {
      $this->id = $id;
  }

  public function getName()
  {
      return $this->name;
  }

  public function setName($name)
  {
      $this->name = $name;
  }

  public function getEmail()
  {
      return $this->email;
  }

  public function setEmail($email)
  {
      $this->email = $email;
  }

  public function setSession($name, $email)
  {
    session_start();
    $_SESSION[$name] = $email;
  }

  public function getSession($name)
  {
    $sessionVar = $_SESSION[$name];
    return $sessionVar;
  }

  public function distroySession($name)
  {
    session_destroy();
  }
}
