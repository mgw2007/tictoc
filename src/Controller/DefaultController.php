<?php

namespace App\Controller;

use App\TicTacToe\GamePlay;
use App\TicTacToe\TicTacToe;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends AbstractController
{
    public function index()
    {

        $this->get('session')->set('gameState', [['', '', ''], ['', '', ''], ['', '', ''],]);

        return $this->render('default/index.html.twig');
    }

    public function play(Request $request)
    {
        $gameState = $this->get('session')->get('gameState', [['', '', ''], ['', '', ''], ['', '', ''],]);

        $game = new GamePlay(new TicTacToe());
        $result = $game->startPlay($gameState, $request->get('data'));
        $this->get('session')->set('gameState', $result['data']);
        return new JsonResponse($result);
    }
}