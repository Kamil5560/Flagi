<?php

namespace App\Controller\Admin;

use App\Entity\Country;
use App\Entity\Ranking;
use App\Entity\User;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractDashboardController
{
    #[IsGranted('ROLE_ADMIN')]
    #[Route('/admin', name: 'admin')]
    public function index(): Response
    {
        return $this->render('admin/index.html.twig');
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('CMR');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToDashboard('Dashboard', 'fa fa-home');
        yield MenuItem::linkToCrud('Państwa', 'fas fa-list', Country::class);
        yield MenuItem::linkToCrud('Ranking', 'fas fa-list', Ranking::class);
        yield MenuItem::linkToCrud('Użytkownicy', 'fas fa-list', User::class);
        yield MenuItem::linkToRoute('Powrót', 'fas fa-home', 'app_index');
    }
}
