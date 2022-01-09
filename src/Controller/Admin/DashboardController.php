<?php

namespace App\Controller\Admin;

use App\Entity\Customer;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractDashboardController
{
    /**
     * @Route("/admin", name="admin")
     */
    public function index(): Response
    {
        $routeBuilder = $this->get(AdminUrlGenerator::class);
        $url = $routeBuilder->setController(CustomerCrudController::class)->generateUrl();
        return $this->redirect($url);
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTranslationDomain('pl')
            ->setTitle('Panel Administracyjny Serwisu Samochodowego');
            
    }

    public function configureMenuItems(): iterable
    {
        return[
            yield MenuItem::linkToDashboard('Lista Rezerwacji', 'fa fa-home'),
            yield MenuItem::section('Linki do strony głównej', 'fas fa-campground'),
            yield MenuItem::linktoRoute('Wróć na stronę główną serwisu', 'fa fa-home', 'home_page'),
            yield MenuItem::linktoRoute('Złóż wniosek bezpośrednio na stronie', 'fas fa-bell', 'customer_new'),

        ];
    }
}
