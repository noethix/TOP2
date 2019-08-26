<?php

namespace App\Controller;

use App\Entity\News;
use App\Repository\NewsRepository;
use App\Entity\Notice;
use App\Repository\MapServiceRepository;
use App\Repository\NoticeRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;

class ClientController extends AbstractController
{
    /**
     * @Route("/base", name="base")
     */
    public function base()
    {
        return $this->render('client/base.html.twig', [
            'controller_name' => 'ClientController',
        ]);
    }
    
    
    /**
     * @Route("/home", name="home")
     */
    public function home(NoticeRepository $noticeRepository, MapServiceRepository $mapServiceRepository): Response
    {
        return $this->render('client/home.html.twig', [
            'notices' => $noticeRepository->findAll(Notice::class),
            'points' => $mapServiceRepository->findAll()
        ]);
    }

    /**
     * @Route("/project", name="project")
     */
    public function project(NewsRepository $newsRepository): Response
    {
        return $this->render('client/project.html.twig', [
            'controller_name' => 'ClientController',
            'news' => $newsRepository->findByLastThree(News::class),
            
        ]);
    }

    /**
     * @Route("/notice", name="notice")
     */
    public function notice(NoticeRepository $noticeRepository): Response
    {
        return $this->render('client/notice.html.twig', [
            'controller_name' => 'ClientController',
            'notices' => $noticeRepository->findAll(),
        ]);
    }

    /**
     * @Route("/help", name="help")
     */
    public function help()
    {
        return $this->render('client/help.html.twig', [
            'controller_name' => 'ClientController',
        ]);
    }

    /**
     * @Route("/referral", name="referral")
     */
    public function referral()
    {
        return $this->render('client/referral.html.twig', [
            'controller_name' => 'ClientController',
        ]);
    }

    /**
     * @Route("/contact", name="contact")
     */
    public function contact()
    {
        return $this->render('client/contact.html.twig', [
            'controller_name' => 'ClientController',
        ]);
    }

    /**
     * @Route("/donate", name="donate")
     */
    public function donate()
    {
        return $this->render('client/donate.html.twig', [
            'controller_name' => 'ClientController',
        ]);
    }
}
