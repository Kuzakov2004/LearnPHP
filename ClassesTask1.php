<?php
/*
1 Дополните метод sayHello(), чтобы котики после того, как назвали своё имя, говорили о том, какого они цвета.
2 Сделайте свойство color приватным и добавьте в конструктор ещё один аргумент, через который при создании котика будет задаваться его цвет.
3 Сделайте геттер, который будет позволять получить свойство color.
4 Подумайте, стоит ли давать возможность менять котикам цвета после их создания?
Если вам хватило совести сказать да - добавьте ещё и сеттер для этого свойства.
Это вам в наказание - хорошие люди котов не перекрашивают.
5 Создайте теперь белого Снежка и рыжего Барсика и попросите их рассказать о себе.
*/
class Cat
{
    private $name;
    private $color;
    public $weight;

    public function __construct(string $name, string $color)
    {
        $this->name = $name;
        $this->color = $color;
    }
    public function sayHello()
    {
        echo 'Привет! Меня зовут ' . $this->name . '. ' . 'Мой цвет: ' . $this->color;
    }

    public function setName(string $name)
    {
        $this->name = $name; 
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getColor(): string
    {
        return $this->color;
    }

    public function setСolor(string $color)
    {
        $this->color = $color; 
    }
}

$cat1 = new Cat('Снежок', 'Белый');
$cat1->sayHello();
echo '<br>';
$cat2 = new Cat('Барсик', 'Рыжий');
$cat2->sayHello();