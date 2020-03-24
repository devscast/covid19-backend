<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class MainController
 * @package App\Controller
 * @Route(schemes={"HTTP", "HTTPS"})
 * @author bernard-ng <ngandubernard@gmail.com>
 */
class MainController extends AbstractController
{
    /**
     * @Route("", name="app_home", methods={"GET"})
     * @return RedirectResponse
     * @author bernard-ng <ngandubernard@gmail.com>
     */
    public function index(): RedirectResponse
    {
        return $this->redirectToRoute('easyadmin');
    }
}
