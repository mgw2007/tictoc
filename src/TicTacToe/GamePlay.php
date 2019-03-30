<?php

namespace App\TicTacToe;

/**
 * Class GamePlay
 * @package App\TicTacToe
 */
final class GamePlay
{
    /**
     * @var GameInterface
     */
    private $game;

    /**
     * GamePlay constructor.
     * @param GameInterface $game
     */
    public function __construct(GameInterface $game)
    {
        $this->game = $game;
    }

    /**
     * @param array $gameState
     * @param array $data
     * @param string $player
     * @return array
     */
    public function startPlay(array $gameState, array $data, string $player = 'X'): array
    {
        $player2 = $player == 'X' ? 'O' : 'X';
        $game = $this->game;
        $gameState = $game->play($gameState, $player, $data);

        $return = [];
        if ($game->isWin($gameState, $player)) {
            $return = ['status' => 'win'];
        } elseif ($game->isDraw($gameState, $player)) {
            $return = ['status' => 'draw'];
        } else {
            // make move for player2 then check status
            $player2Move = $game->makeMove($gameState, $player);
            $gameState = $game->play($gameState, $player2, $player2Move);

            if ($game->isWin($gameState, $player2)) {
                $return = ['status' => 'lose'];
            } elseif ($game->isDraw($gameState, $player2)) {
                $return = ['status' => 'draw'];
            } else {
                $return = ['status' => ''];
            }
        }
        $return['data'] = $gameState;
        return $return;
    }
}