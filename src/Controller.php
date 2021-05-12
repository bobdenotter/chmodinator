<?php

declare(strict_types=1);

namespace Chmodinator\ReferenceExtension;

use Bolt\Extension\ExtensionController;
use Symfony\Component\HttpFoundation\Response;

class Controller extends ExtensionController
{
    public function index($name = 'foo'): Response
    {
        $context = [
            'title' => 'AcmeCorp Reference Extension',
            'name' => $name,
        ];

        return $this->render('@reference-extension/page.html.twig', $context);
    }
}
