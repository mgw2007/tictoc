<?php

namespace App\TicTacToe;

/**
 * Interface GameInterface
 * @package App\TicTacToe
 */
interface GameInterface
{
    /**
     * @param array $boardState
     * @param string $player
     * @return bool
     */
    function isWin(array $boardState, string $player): bool;

    /**
     * @param array $boardState
     * @param string $player
     * @return bool
     */
    function isLose(array $boardState, string $player): bool;

    /**
     * @param array $boardState
     * @param string $player
     * @return bool
     */
    function isDraw(array $boardState, string $player): bool;

    /**
     * @param array $boardState
     * @param string $player
     * @param array $data
     * @return array
     */
    function play(array $boardState, string $player, array $data): array ;

}