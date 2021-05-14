<?php

namespace Bobdenotter\Chmodinator\Controller;

use Bolt\Extension\ExtensionController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class Chmod
{
    /**
     * @Route("/chmodinator", name="extension_chmodinator")
     */
    public function index(): Response
    {
        return new Response('hi');
    }
}