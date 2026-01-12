<?php
/*
1 Создайте абстрактный класс Human.
2 Отнаследуйте от него 2 класса: RussianHuman и EnglishHuman.
3 Реализуйте в них методы getGreetings(), которые будут возвращать приветствие на разных языках, вроде «Привет».
4 Реализуйте в них методы getMyNameIs(), которые будут возвращать на разных языках слова «Меня зовут».
5 В итоге метод introduceYourself должен возвращать строку, вроде «Привет! Меня зовут Иван.»
6 Создайте объекты этих классов и заставьте их поздороваться.
*/
abstract class HumanAbstract
{
    private $name;

    public function __construct(string $name)
    {
        $this->name = $name;
    }

    public function getName(): string
    {
        return $this->name;
    }

    abstract public function getGreetings(): string;
    abstract public function getMyNameIs(): string;

    public function introduceYourself(): string
    {
        return $this->getGreetings() . '! ' . $this->getMyNameIs() . ' ' . $this->getName() . '.';
    }
}

class RussianHuman extends HumanAbstract
{
    public function __construct(string $name)
    {
        parent::__construct($name);
    }

    public function getGreetings(): string
    {
        return 'Привет';
    }

    public function getMyNameIs(): string
    {
        return 'Меня зовут ';
    }
}

class EnglishHuman extends HumanAbstract
{
    public function __construct(string $name)
    {
        parent::__construct($name);
    }

    public function getGreetings(): string
    {
        return 'Hello';
    }

    public function getMyNameIs(): string
    {
        return 'My name is ';
    }
}

$russian = new RussianHuman('Иван');
$english = new EnglishHuman('Bob');

echo $russian->introduceYourself();
echo '<br>';
echo $english->introduceYourself();