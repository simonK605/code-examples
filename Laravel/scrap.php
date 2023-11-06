<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Weidner\Goutte\GoutteFacade;

class ImportDataFromOtherSite extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'import:data-from-other-site';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Importing Data from otherSite.com';

    /**
     * Execute the console command.
     */
    public function handle()
    {

        $crawler = GoutteFacade::request('GET', 'http://www.otherSite.com/posts');

        if (! count($crawler)) {
            return;
        }
        $data[] = $crawler->filter('.post')->each(function ($node) {
            return $node->text();
        });

        dd($data);
    }
}
