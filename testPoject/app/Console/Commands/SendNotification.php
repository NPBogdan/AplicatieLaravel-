<?php

namespace App\Console\Commands;

use App\Models\Attribute;
use App\Models\Tool;
use App\Models\User;
use App\Notifications\AttributeExpired;
use Illuminate\Console\Command;

class SendNotification extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:SendNotification';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send notification to email and database and disable an attribute';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $attributes = Attribute::where('expiration_date','<',date('Y-m-d'))->where('active',1)->get();

        foreach ($attributes as $attribute){
            $user = $attribute->object->user;
            $user->notify(new AttributeExpired([
                'name' => $attribute->name,
                'company' => $attribute->company
                ]
            ));
//            $attribute->active = 0;
//            $attribute->save();
        }
    }
}
