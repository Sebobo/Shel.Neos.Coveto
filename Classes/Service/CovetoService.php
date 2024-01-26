<?php
declare(strict_types=1);

namespace Shel\Neos\Coveto\Service;

use Neos\Flow\Annotations as Flow;
use Shel\ApiConnector\Service\AbstractApiConnector;use Shel\Neos\Coveto\Domain\Dto\JobDto;

class CovetoService extends AbstractApiConnector
{

    /**
     * @Flow\InjectConfiguration(path="xmlFeed",package="Shel.Neos.Coveto")
     * @var array
     */
    protected $apiSettings;

    /**
     * @return array<JobDto>
     */
    public function fetchJobs(): array
    {
        try {
            $xmlData = $this->fetchData('fetchJobs');
        } catch (\Exception $e) {
            $this->logger->error('Could not fetch jobs', [$e->getMessage()]);
            return [];
        }

        $data = \simplexml_load_string($xmlData);

        if ($data === false) {
            $this->logger->error('Could not parse jobs', [$xmlData]);
            return [];
        }

        foreach ($data as $jobXml) {
            $jobs[]= JobDto::fromArray((array)$jobXml);
        }

        $this->logger->info(sprintf('Retrieved %d jobs from xml feed', count($data)));

        return $jobs;
    }
}
