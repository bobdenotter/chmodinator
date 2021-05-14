<?php


namespace BobdenOtter\Chmodinator;

use Bolt\Canonical;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class Chmodinator
{
    /** @var ChmodinatorConfig */
    private $config;

    /** @var Canonical */
    private $canonical;

    /** @var HttpClientInterface */
    private $client;

    public function __construct(ChmodinatorConfig $config, Canonical $canonical, HttpClientInterface $client)
    {
        $this->config = $config;
        $this->canonical = $canonical;
        $this->client = $client;
    }

    public function checkKey(string $key): bool
    {
        return ($key == $this->config->getConfig()['key']);
    }

    public function run(): void
    {
        $paths = $this->config->getBoltConfig()->getPaths();

        foreach ($this->config->getConfig()['paths'] as $pathName) {
            $command = sprintf(
                'chmod -R %s %s 2> /dev/null',
                $this->config->getConfig()['permissions'],
                $paths[$pathName]
            );
            $this->execute($command);
        }
    }

    public function httpRequest(): void
    {
        $host = $this->config->getBoltConfig()->get('general/canonical');

        if (! $host) {
            echo "Please set the `canonical: ` in `config.yaml`, so that this extension can reach it as a proper web request.";

            return;
        }

        $link = $host . $this->canonical->generateLink('extension_chmodinator', ['key' => $this->config->getConfig()['key']]);

        $this->client->request('GET', $link);
    }

    /**
     * Execute a command in the CLI, as a separate process.
     */
    protected function execute(string $command): int
    {
        // Execute the command
        passthru($command, $result);

        return $result;
    }
}