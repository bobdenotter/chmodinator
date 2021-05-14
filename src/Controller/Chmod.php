<?php

namespace BobdenOtter\Chmodinator\Controller;

use BobdenOtter\Chmodinator\Chmodinator;
use Bolt\Extension\ExtensionController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class Chmod extends ExtensionController
{
    /** @var Chmodinator */
    private $chmodinator;

    public function __construct(Chmodinator $chmodinator)
    {
        $this->chmodinator = $chmodinator;
    }

    /**
     * @Route("/chmodinator/{key}", name="extension_chmodinator")
     */
    public function index(string $key): Response
    {
        $result = "Not OK";

        if ($this->chmodinator->checkKey($key)) {
            $this->chmodinator->run();

            $result = "✅ ChmøĐïna✝️oR!!1 ran successfully 🤘";
        }

        return new Response($result);
    }
}