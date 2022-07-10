<?php
namespace morphos\test\Russian;

use morphos\NumeralGenerator;
use morphos\Russian\Cases;
use morphos\Russian\CardinalNumeralGenerator;
use PHPUnit\Framework\TestCase;

class CardinalNumeralTest extends TestCase
{
    /**
     * @dataProvider numbersProvider
     */
    public function testGetCases($number, $gender, $case, $case2, $case3, $case4, $case5, $case6)
    {
        $this->assertEquals(array(
            Cases::IMENIT => $case,
            Cases::RODIT => $case2,
            Cases::DAT => $case3,
            Cases::VINIT => $case4,
            Cases::TVORIT => $case5,
            Cases::PREDLOJ => $case6,
        ), CardinalNumeralGenerator::getCases($number, $gender));
    }

    public function numbersProvider()
    {
        return [
            [1, NumeralGenerator::MALE, 'один', 'одного', 'одному', 'один', 'одним', 'одном'],
            [1, NumeralGenerator::FEMALE, 'одна', 'одной', 'одной', 'одну', 'одной', 'одной'],
            [85, NumeralGenerator::MALE, 'восемьдесят пять', 'восьмидесяти пяти', 'восьмидесяти пяти', 'восемьдесят пять', 'восемьюдесятью пятью', 'восьмидесяти пяти'],
            [201, NumeralGenerator::MALE, 'двести один', 'двухсот одного', 'двумстам одному', 'двести один', 'двумястами одним', 'двухстах одном'],
            [344, NumeralGenerator::MALE, 'триста сорок четыре', 'трехсот сорока четырех', 'тремстам сорока четырем', 'триста сорок четыре', 'тремястами сорока четырьмя', 'трехстах сорока четырех'],
            [1007, NumeralGenerator::MALE, 'одна тысяча семь', 'одной тысячи семи', 'одной тысяче семи', 'одну тысячу семь', 'одной тысячей семью', 'одной тысяче семи'],
            [3651, NumeralGenerator::MALE, 'три тысячи шестьсот пятьдесят один', 'трех тысяч шестисот пятидесяти одного', 'трем тысячам шестистам пятидесяти одному', 'три тысячи шестьсот пятьдесят один', 'тремя тысячами шестьюстами пятьюдесятью одним', 'трех тысячах шестистах пятидесяти одном'],
            [9999, NumeralGenerator::MALE, 'девять тысяч девятьсот девяносто девять', 'девяти тысяч девятисот девяноста девяти', 'девяти тысячам девятистам девяноста девяти', 'девять тысяч девятьсот девяносто девять', 'девятью тысячами девятьюстами девяноста девятью', 'девяти тысячах девятистах девяноста девяти'],
            [1234567890, NumeralGenerator::MALE,
                'один миллиард двести тридцать четыре миллиона пятьсот шестьдесят семь тысяч восемьсот девяносто',
                'одного миллиарда двухсот тридцати четырех миллионов пятисот шестидесяти семи тысяч восьмисот девяноста',
                'одному миллиарду двумстам тридцати четырем миллионам пятистам шестидесяти семи тысячам восьмистам девяноста',
                'один миллиард двести тридцать четыре миллиона пятьсот шестьдесят семь тысяч восемьсот девяносто',
                'одним миллиардом двумястами тридцатью четырьмя миллионами пятьюстами шестьюдесятью семью тысячами восьмистами девяноста',
                'одном миллиарде двухстах тридцати четырех миллионах пятистах шестидесяти семи тысячах восьмистах девяноста',
            ],
        ];
    }
}
