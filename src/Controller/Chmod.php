<?php

declare(strict_types=1);

namespace BobdenOtter\Chmodinator\Controller;

use Bolt\Extension\ExtensionController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class Chmod extends ExtensionController
{
    /**
     * @Route("/chmodinator/{key}", name="chmodinator_trigger")
     */
    public function index($key = 'foo'): Response
    {
        return new Response('ok');
    }
}
