<?php

namespace App\Controller;

use App\Form\UserRankingFormType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class IndexController extends AbstractController
{
    #[Route('/', name: 'app_index')]
    public function index(): Response
    {
        return $this->render('index/index.html.twig', [
            'controller_name' => 'IndexController',
        ]);
    }

    /**
     * @param Request $request
     * @return Response
     */
    #[Route('/new-game', name: 'app_new-game')]
    public function new_game(Request $request): Response
    {
        $form = $this->createForm(UserRankingFormType::class);

        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()) {
            $nick = $form->get('name')->getData();
            $game = $form->get('game')->getData();
            if($game == '1'){
                return $this->redirectToRoute('app_game_country', [
                    'nick' => $nick,
                ]);
            } else {
                return $this->redirectToRoute('app_game_capital_city', [
                    'nick' => $nick,
                ]);
            }

        }
        return $this->render('index/new-game.html.twig', [
            'controller_name' => 'IndexController',
            'UserRankingForm' => $form->createView(),
        ]);
    }

    /**
     * @param Request $request
     * @return Response
     */
    #[Route('/game-county', name: 'app_game_country')]
    public function game_country(Request $request): Response
    {
        $nick = $request->query->get('nick');
        return $this->render('index/game-country.html.twig', [
            'controller_name' => 'IndexController',
        ]);
    }

    /**
     * @param Request $request
     * @return Response
     */
    #[Route('/game-capital_city', name: 'app_game_capital_city')]
    public function game_capital_city(Request $request): Response
    {
        $nick = $request->query->get('nick');
        return $this->render('index/game-capital_city.html.twig', [
            'controller_name' => 'IndexController',
        ]);
    }
}
