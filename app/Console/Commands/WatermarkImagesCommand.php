<?php

namespace App\Console\Commands;

use App\Models\User;
use App\Services\Images\WatermarkInterface;
use Illuminate\Console\Command;

class WatermarkImagesCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'watermak:users';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Add watermark images users';

    public function __construct(
        protected WatermarkInterface $watermark,
        protected User $user
    ) {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $users = $this->user->getUsersCreatedToday();
        $users->each(function ($user, $key) {
            $this->watermark->make($user->image);
        });
    }
}
