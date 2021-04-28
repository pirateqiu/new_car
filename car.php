<?php

/**
 * Class Car
 */
class Car
{
    const WHEELS = 4;   // 汽车都是4个轮子
    var $seats;         // 座位
    var $doors;         // 门
    var $engine;        // 发动机
    var $brand;

    /**
     * Car constructor.
     * @param $seats
     * @param $doors
     * @param $engine
     */
    public function __construct($seats, $doors, $engine,$brand)
    {
        $this->seats = $seats;
        $this->doors = $doors;
        $this->engine = $engine;
        $this->brand = $brand;
    }         // 品牌

    /**
     * @return mixed
     */
    public function getBrand()
    {
        return $this->brand;
    }

    /**
     * @param mixed $brand
     */
    public function setBrand($brand): void
    {
        $this->brand = $brand;
    }
}
class Benz extends Car
{
    private $customProp = "自定义属性";
    public function __construct($seats = 5, $doors = 4, $engine = 1)
    {
        $this->brand = '奔驰';
        // $this->setBrand('奔驰');  // 也可以通过该方法设置
        parent::__construct($this->brand, $seats, $doors, $engine);
    }

    private function customMethod()
    {
        echo "Call custom prop \$customProp: " . $this->customProp . PHP_EOL."<br>";
        echo "This is a custom method in Benz Class" . PHP_EOL;
    }
}

// 通过反射调用非 public 方法
$method = new ReflectionClass(Benz::class);
echo "<pre>";
var_dump($method->getMethods());
echo "</pre>";exit;

$method->setAccessible(true);

$benz = new Benz();
$method->invoke($benz);

var_dump($benz->customMethod);


