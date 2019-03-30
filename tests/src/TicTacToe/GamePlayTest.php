<?php

namespace Tests\AppBundle\Form\Type;

use App\TicTacToe\GamePlay;
use App\TicTacToe\TicTacToe;
use PHPUnit\Framework\TestCase;


class GamePlayTest extends TestCase
{
    const PlayerX = 'X';
    const PlayerO = 'O';

    /**
     * @dataProvider providerForGamePlay
     */
    public function testStartPlay($state, $res)
    {
        $gamePlay = new GamePlay(new TicTacToe());
        $result = $gamePlay->startPlay($state, [0, 0]);
        $this->assertTrue($result['status'] == $res);
    }

    public function providerForGamePlay()
    {
        return [
            [[
                ['', self::PlayerO, self::PlayerX],
                [self::PlayerX, '', self::PlayerO],
                [self::PlayerX, self::PlayerO, ''],
            ], 'win'],
            [[
                ['', self::PlayerO, self::PlayerO],
                [self::PlayerX, self::PlayerX, self::PlayerO],
                [self::PlayerO, self::PlayerX, ''],
            ], 'lose'],
            [[
                [self::PlayerX, self::PlayerO, self::PlayerX],
                [self::PlayerX, self::PlayerX, self::PlayerO],
                [self::PlayerO, self::PlayerX, ''],
            ], 'draw'],
        ];

    }
}