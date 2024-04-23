<?php

namespace App\Console\Commands;

use App\Models\Delivery;
use App\Models\User;
use App\Notifications\Device;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Notification;

class CheckDevice extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:check-device';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Check if the device is in hold for 24hours';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        //
        $deliveries = Delivery::where('operation_id',1)->get();
        $users = User::all();
        foreach ($deliveries as $delivery) {
            $to = Carbon::createFromFormat('Y-m-d H:s:i', $delivery->created_at);
            $from = Carbon::createFromFormat('Y-m-d H:s:i', now());
            $diff_in_hours = $to->diffInHours($from);
            if($diff_in_hours>=24){
                $this->info('passou 24 horas');
                Notification::send($users, new Device($delivery));

            }else{
                $this->info('Nao passou 24 horas');
                // Notification::send($users, new Device($delivery));
            }
        }
    }
}
