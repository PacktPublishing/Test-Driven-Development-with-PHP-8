<?php

namespace App\Controller;

use App\DAL\Reader\Doctrine\ToyCarReader;
use App\DAL\Reader\ReaderInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TableController extends AbstractController
{
    /**
     * @var ReaderInterface
     */
    private $reader;

    public function __construct(ToyCarReader $reader)
    {
        $this->setReader($reader);
    }

    #[Route('/table', name: 'app_table')]
    public function index(): Response
    {
        $allToyCars = $this->getReader()->getAll();

        return $this->render('table/index.html.twig', [
            'controller_name'   => 'TableController',
            'data'              => $allToyCars,
        ]);
    }

    /**
     * @return ReaderInterface
     */
    public function getReader(): ReaderInterface
    {
        return $this->reader;
    }

    /**
     * @param ReaderInterface $reader
     * @return TableController
     */
    public function setReader(ReaderInterface $reader): TableController
    {
        $this->reader = $reader;
        return $this;
    }
}
