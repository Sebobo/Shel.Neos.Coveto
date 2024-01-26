<?php

namespace Shel\Neos\Coveto\Command;

use Neos\Flow\Annotations as Flow;
use Neos\Flow\Cli\CommandController;
use Shel\Neos\Coveto\Domain\Dto\JobDto;
use Shel\Neos\Coveto\Service\CovetoService;

/**
 * @Flow\Scope("singleton")
 */
class CovetoCommandController extends CommandController
{
    /**
     * @Flow\Inject
     * @var CovetoService
     */
    protected $covetoService;

    public function listCommand(): void
    {
        $jobs = $this->covetoService->fetchJobs();

        if (!$jobs) {
            $this->outputLine('No jobs found');
            return;
        }

        $serializedJobs = array_map(static function (JobDto $job) {
            return [
                'id' => $job->getId(),
                'title' => $job->getTitle(),
                'locationId' => $job->getLocationId(),
                'link' => $job->getLink(),
            ];
        }, $jobs);

        $this->output->outputTable($serializedJobs, ['Id', 'Title', 'Location ID', 'Link']);
    }
}
