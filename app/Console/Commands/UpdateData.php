<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Artisan;
use App\Models\Setting;
use Carbon\Carbon;
use Illuminate\Support\Facades\File;

class UpdateData extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'Dataseed:updating';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
        $addnewfolder = public_path('uploads/emailtoticketcomment');

        if (!File::exists($addnewfolder)) {
            File::makeDirectory($addnewfolder, 0755, true);
        }

        $usermailkey = Setting::where("key", "mail_key_set")->first();
        if($usermailkey == null){
            $uset = new Setting();
            $uset->key = "mail_key_set";
            $uset->value = null;
            $uset->save();
        }

        if(setting('newupdate') == 'version3.0'){
            Artisan::call('migrate');
            Artisan::call('db:seed LanguageSeeder');
            Artisan::call('db:seed SettingUpdateSeeder');
            Artisan::call('db:seed Permissiongroupupdate');
            Artisan::call('db:seed TimezoneSeeder');
            Artisan::call('db:seed TranslationSeeder');
            Artisan::call('db:seed NewUpdateSeederV3_1');
            Artisan::call('db:seed UpdateVersion3_2');
            Artisan::call('route:cache');
            Artisan::call('config:cache');
            Artisan::call('view:clear');
            Artisan::call('optimize');
            Artisan::call('optimize:clear');

            $user = Setting::where('key','newupdate')->first();
            $user->value = 'updated3.2V';
            $user->update();

            $userset = Setting::where('key','envato_purchasecode')->first();
            $userset->key = 'update_setting';
            $userset->update();
        }

        if(setting('newupdate') == 'version3.1'){
            Artisan::call('migrate');
            Artisan::call('db:seed Permissiongroupupdate');
            Artisan::call('db:seed NewUpdateSeederV3_1');
            Artisan::call('db:seed UpdateVersion3_2');
            Artisan::call('route:cache');
            Artisan::call('config:cache');
            Artisan::call('view:clear');
            Artisan::call('optimize');
            Artisan::call('optimize:clear');

            $user = Setting::where('key','newupdate')->first();
            $user->value = 'updated3.2V';
            $user->update();

            $userset = Setting::where('key','envato_purchasecode')->first();
            $userset->key = 'update_setting';
            $userset->update();
        }

        if(setting('newupdate') == 'version3.2V'){
            Artisan::call('migrate');
            Artisan::call('db:seed UpdateVersion3_2');
            Artisan::call('db:seed Permissiongroupupdate');
            Artisan::call('route:cache');
            Artisan::call('config:cache');
            Artisan::call('view:clear');
            Artisan::call('optimize');
            Artisan::call('optimize:clear');

            $user = Setting::where('key','newupdate')->first();
            $user->value = 'updated3.2V';
            $user->update();

            $extraopenaiset = Setting::where('key', 'openai_api')->skip(1)->take(1)->first();
            if($extraopenaiset != null){
                $extraopenaiset->delete();
            }
        }
    }
}
