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
        return parent::index();
        // $routeBuilder = $this->get(AdminUrlGenerator::class);
        // $url = $routeBuilder->setController(CustomerCrudController::class)->generateUrl();
        // return $this->redirect($url);
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTranslationDomain('pl')
            ->setTitle('Serwis Samochodowy');
            
    }

    public function configureMenuItems(): iterable
    {
        return[
            yield MenuItem::linkToDashboard('Panel administracyjny', 'fa fa-home'),
            yield MenuItem::section('Tu możemy wpisać nazwe sekcji', 'fa fa-home'),
            yield MenuItem::linktoRoute('Wróć na stronę główną', 'fas fa-campground', 'home_page'),
            yield MenuItem::linkToCrud('Rezerwacje', 'fas fa-map-marker-alt', Customer::class),
            yield MenuItem::linktoRoute('Złóż wniosek bezpośrednio na stronie', 'fas fa-bell', 'customer_new'),

        ];
    }
}
