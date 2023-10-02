<?php

declare(strict_types=1);

namespace App\Publishers;

use CodeIgniter\Publisher\Publisher;

class LanguagePublisher extends Publisher
{
    /**
     * Tell Publisher where to get the files.
     * Since we will use Composer to download
     * them we point to the "vendor" directory.
     *
     * @var string
     */
    protected $source = VENDORPATH . 'codeigniter4/translations/Language';

    /**
     * FCPATH is always the default destination,
     * but we may want them to go in a sub-folder
     * to keep things organized.
     *
     * @var string
     */
    protected $destination = APPPATH . 'Language';

    /**
     * Use the "publish" method to indicate that this
     * class is ready to be discovered and automated.
     */
    public function publish(): bool
    {
        return $this
            /**
             * Add the files relative to $source
             */
            ->addPaths(['/ru'])

            /**
             * Merge-and-replace to retain the original directory structure
             */
            ->merge(true);
    }
}
