<?php
namespace SilverStripe\FullTextSearch\Solr\Tasks;
use SilverStripe\Dev\BuildTask;
/**
 * Abstract class for build tasks
 */
class Solr_BuildTask extends BuildTask
{
    protected $enabled = false;

    /**
     * Logger
     *
     * @var LoggerInterface
     */
    protected $logger = null;

    /**
     * Get the current logger
     *
     * @return LoggerInterface
     */
    public function getLogger()
    {
        return Injector::inst()->get('Logger');
    }

    /**
     * Assign a new logger
     *
     * @param LoggerInterface $logger
     */
    public function setLogger(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }

    /**
     * @return SearchLogFactory
     */
    protected function getLoggerFactory()
    {
//        return Injector::inst()->get('SearchLogFactory');
    }

    /**
     * Setup task
     *
     * @param SS_HTTPReqest $request
     */
    public function run($request)
    {
        $name = get_class($this);
        $verbose = $request->getVar('verbose');

        // Set new logger
        $logger = $this
            ->getLoggerFactory();
//@todo: Cannot instantiate interface SearchLogFactory
//            ->getOutputLogger($name, $verbose);
        $this->setLogger($logger);
    }
}
