<?php

namespace App\TicTacToe;


final class TicTacToe implements GameInterface, MoveInterface
{

    public function makeMove(array $state, string $playerUnit = 'X'): array
    {
        //get position
        $positions = [];
        for ($i = 0; $i <= 2; $i++) {
            for ($j = 0; $j <= 2; $j++) {
                if (!$state[$i][$j]) {
                    $positions[] = [$i, $j];
                }
            }
        }

        $position = array_rand($positions);
        $playerUnit = $playerUnit === 'X' ? 'O' : 'X';

        return [$positions[$position][0], $positions[$position][1], $playerUnit];
    }

    function isWin(array $state, string $player): bool
    {

        for ($i = 0; $i <= 2; $i++) {
            $vertical = $state[$i][0] == $player;
            $horizontal = $state[0][$i] == $player;
            for ($j = 0; $j <= 2; $j++) {
                $vertical = $vertical && $state[$i][$j] == $player;
                $horizontal = $horizontal && $state[$j][$i] == $player;
            }
            if ($vertical || $horizontal) {
                return true;
            }
        }
        $diagonal1 = $state[1][1] == $player && $state[0][0] == $player && $state[2][2] == $player;
        $diagonal2 = $state[1][1] == $player && $state[0][2] == $player && $state[2][0] == $player;
        if ($diagonal1 || $diagonal2) {
            return true;
        }
        return false;

    }

    function isLose(array $state, string $player): bool
    {
        return !$this->isWin($state, $player);
    }

    function play(array $state, string $player, array $data): array
    {
        $state[$data[0]][$data[1]] = $player;
        return $state;
    }

    function isDraw(array $state, string $player): bool
    {
        foreach ($state as $row) {
            foreach ($row as $cel) {
                if (!$cel) {
                    return false;
                }
            }
        }
        $player2 = $player === 'X' ? 'O' : 'X';
        return $this->isLose($state, $player) && $this->isLose($state, $player2);
    }

}
