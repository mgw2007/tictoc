<?php

namespace Tests\AppBundle\Form\Type;

use App\TicTacToe\TicTacToe;
use PHPUnit\Framework\TestCase;


class TicTacToeTest extends TestCase
{
    const PlayerX = 'X';
    const PlayerO = 'O';

    /**
     * @dataProvider providerForPlayerXLose
     */
    public function testIsWinFalse($state)
    {
        $ticTacToe = new TicTacToe();
        $this->assertFalse($ticTacToe->isWin($state, self::PlayerX));
    }

    /**
     * @dataProvider providerForPlayerXLose
     */
    public function testIsLose($state)
    {
        $ticTacToe = new TicTacToe();
        $this->assertTrue($ticTacToe->isLose($state, self::PlayerX));
    }


    /**
     * @dataProvider providerForPlayerXWin
     */
    public function testIsLoseWin($state)
    {
        $ticTacToe = new TicTacToe();
        $this->assertTrue($ticTacToe->isWin($state, self::PlayerX));
    }

    /**
     * @dataProvider providerForPlayerXWin
     */
    public function testIsLoseFalse($state)
    {
        $ticTacToe = new TicTacToe();
        $this->assertFalse($ticTacToe->isLose($state, self::PlayerX));
    }

    /**
     * @dataProvider providerForPlayerXDrawFalse
     */
    public function testIsDrawFalse($state)
    {
        $ticTacToe = new TicTacToe();
        $this->assertFalse($ticTacToe->isDraw($state, self::PlayerX));
    }

    /**
     * @dataProvider providerForPlayerXDrawTrue
     */
    public function testIsDraw($state)
    {
        $ticTacToe = new TicTacToe();
        $this->assertTrue($ticTacToe->isDraw($state, self::PlayerX));
    }


    public function testPlay()
    {
        $ticTacToe = new TicTacToe();
        $state = [
            ['', '', ''],
            ['', '', ''],
            ['', '', ''],
        ];
        $state = $ticTacToe->play($state, self::PlayerX, [1, 1]);
        $this->assertTrue($state[1][1] == self::PlayerX);
    }


    public function testMakeMove()
    {
        $ticTacToe = new TicTacToe();
        $state = [
            ['', self::PlayerO, self::PlayerX],
            [self::PlayerX, '', self::PlayerO],
            [self::PlayerX, self::PlayerO, ''],
        ];
        $target = $ticTacToe->makeMove($state, self::PlayerX);
        $this->assertEquals(self::PlayerO, $target[2]);
        $this->assertTrue(($target[0] == 0 && $target[1] == 0) || ($target[0] == 1 && $target[1] == 1) || ($target[0] == 2 && $target[1] == 2));
    }


    public function providerForPlayerXLose()
    {
        return [
            [[
                ['', '', ''],
                ['', '', ''],
                ['', '', ''],
            ]],
            [[
                [self::PlayerO, self::PlayerO, self::PlayerO],
                ['', '', ''],
                ['', '', ''],
            ]],
            [[
                ['', '', ''],
                ['', '', ''],
                [self::PlayerO, self::PlayerO, self::PlayerO],
            ]],
            [[
                ['', '', ''],
                [self::PlayerO, self::PlayerO, self::PlayerO],
                ['', '', ''],
            ]],
            [[
                [self::PlayerO, self::PlayerX, self::PlayerX],
                [self::PlayerO, '', ''],
                [self::PlayerO, '', ''],
            ]],
            [[
                [self::PlayerX, self::PlayerO, self::PlayerX],
                ['', self::PlayerO, ''],
                ['', self::PlayerO, ''],
            ]],
            [[
                [self::PlayerO, self::PlayerO, self::PlayerO],
                ['', '', ''],
                ['', '', ''],
            ]],
            [[
                [self::PlayerO, '', self::PlayerX],
                [self::PlayerX, self::PlayerO, ''],
                [self::PlayerX, '', self::PlayerO],
            ]],
            [[
                [self::PlayerX, self::PlayerO, self::PlayerX],
                ['', '', ''],
                [self::PlayerX, '', self::PlayerX],
            ]],
            [[
                [self::PlayerX, '', self::PlayerX],
                ['', '', ''],
                [self::PlayerX, '', self::PlayerX],
            ]],
        ];
    }

    public function providerForPlayerXWin()
    {
        return [

            [[
                [self::PlayerX, self::PlayerX, self::PlayerX],
                ['', '', ''],
                ['', '', ''],
            ]],
            [[
                ['', '', ''],
                ['', '', ''],
                [self::PlayerX, self::PlayerX, self::PlayerX],
            ]],
            [[
                ['', '', ''],
                [self::PlayerX, self::PlayerX, self::PlayerX],
                ['', '', ''],
            ]],
            [[
                [self::PlayerX, self::PlayerO, self::PlayerO],
                [self::PlayerX, '', ''],
                [self::PlayerX, '', ''],
            ]],
            [[
                [self::PlayerO, self::PlayerX, self::PlayerO],
                ['', self::PlayerX, ''],
                ['', self::PlayerX, ''],
            ]],
            [[
                [self::PlayerX, self::PlayerO, self::PlayerX],
                ['', self::PlayerX, self::PlayerO],
                [self::PlayerX, '', ''],
            ]],
            [[
                [self::PlayerX, '', self::PlayerX],
                [self::PlayerO, self::PlayerX, self::PlayerX],
                [self::PlayerO, '', self::PlayerX],
            ]],
        ];
    }

    public function providerForPlayerXDrawFalse()
    {
        return [

            [[
                ['', '', ''],
                ['', '', ''],
                ['', '', ''],
            ]],
            [[
                [self::PlayerO, self::PlayerX, ''],
                [self::PlayerX, self::PlayerO, self::PlayerX],
                [self::PlayerO, self::PlayerX, self::PlayerO],
            ]],
            [[
                [self::PlayerO, self::PlayerX, self::PlayerX],
                ['', self::PlayerO, self::PlayerX],
                [self::PlayerO, self::PlayerX, self::PlayerO],
            ]],
            [[
                [self::PlayerO, self::PlayerX, self::PlayerX],
                [self::PlayerO, '', self::PlayerX],
                [self::PlayerO, self::PlayerX, self::PlayerO],
            ]],
        ];

    }

    public function providerForPlayerXDrawTrue()
    {
        return [


            [[
                [self::PlayerO, self::PlayerO, self::PlayerX],
                [self::PlayerX, self::PlayerX, self::PlayerO],
                [self::PlayerO, self::PlayerX, self::PlayerO],
            ]],
        ];

    }
}