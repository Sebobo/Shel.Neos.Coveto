<?php
declare(strict_types=1);

namespace Shel\Neos\Coveto\Eel\Helper;

use Neos\Flow\Annotations as Flow;
use Neos\Eel\ProtectedContextAwareInterface;
use Shel\Neos\Coveto\Domain\Dto\JobDto;
use Shel\Neos\Coveto\Service\CovetoService;

/**
 * @Flow\Scope("singleton")
 */
final class CovetoHelper implements ProtectedContextAwareInterface
{
    /**
     * @Flow\Inject
     * @var CovetoService
     */
    protected $covetoService;

    /**
     * @return array<JobDto>
     */
    public function getJobs(): array {
        return $this->covetoService->fetchJobs();
    }

    public function getJob(string $id): ?JobDto {
        $jobs = $this->getJobs();
        foreach($jobs as $job) {
            if ($job->getId() === $id) {
                return $job;
            }
        }
        return null;
    }

    public function allowsCallOfMethod($methodName): bool {
        return true;
    }
}
