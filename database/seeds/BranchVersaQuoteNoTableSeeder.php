<?php

use App\Models\BranchVersaQuoteNo;
use Illuminate\Database\Seeder;

/**
 * Class BranchVersaQuoteNoTableSeeder.
 */
class BranchVersaQuoteNoTableSeeder extends Seeder
{
    use DisableForeignKeys;

    /**
     * Run the database seed.
     */
    public function run()
    {
        $this->disableForeignKeys();
        BranchVersaQuoteNo::create([
            'branch_code' => 'CLN',
            'year' => '2019',
            'quote_no' => '0000001',
        ]);

        $this->enableForeignKeys();
    }
}
