<?php

namespace App\Console\Commands;

use App\Entities\MakeModel;
use App\Entities\ModelsNameOptions;
use Illuminate\Console\Command;

class formatModelsNames extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'formatModelsNames';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Get short model name, year and body type from full model name string and save separately';

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
     * @return mixed
     */
    public function handle()
    {
        $modelsNames = MakeModel::all();

        foreach ($modelsNames as $key => $model) {
            $words = preg_split("/\s+/u", $model->name);
            $firstWord = $words[0] ?? '';
            $secondWord = $words[1] ?? '';
            $modelShortName = "{$firstWord} {$secondWord}";

            $modelYears = null;
            $modelBody = null;

            $roman = array("Sch", 'peugeot', 'ault', 'lv', 'q', 'co', 'vw', 'oo', 'chr', 'ee', 'j', 'ph', 'lt', 'cr', 'ea', 'sc',"sch",'Yo','Zh','Kh','Ts','Ch','Sh','Yu','ya','yo','zh','kh','ts','ch','sh','yu','ya','A','B','V','G','D','E','Z','I','Y','K','L','M','N','O','P','R','S','T','U','F','','Y','','E','a','b','v','g','d','e','z','i','y','k','l','m','n','o','p','r','s','t','u','f','','y','','e', 'w', 'W', 'h');
            $cyrillic = array("Щ", 'пежо', 'о', 'льв', 'к', 'ко', 'фольцваген', "у", 'кр', 'и', 'дж', 'ф', 'льт', 'кр', 'иа', 'ск', "щ",'Ё','Ж','Х','Ц','Ч','Ш','Ю','я','йо','ж','х','ц','ч','ш','ю','я','А','Б','В','Г','Д','Е','З','И','Й','К','Л','М','Н','О','П','Р','С','Т','У','Ф','Ь','Ы','Ъ','Э','а','б','в','г','д','е','з','и','й','к','л','м','н','о','п','р','с','т','у','ф','ь','ы','ъ','э', 'в', 'В', 'х');
            $cyrillicName = str_replace($roman, $cyrillic, strtolower($modelShortName));

            echo $model->id . ' -> ' . $modelShortName . ' -> ' . $cyrillicName . "\n";

            try {
                ModelsNameOptions::updateOrCreate(
                    [
                        'model_id' => $model->id,
                        'is_user_edit' => 0
                    ],
                    [
                        'model_id' => $model->id,
                        'model_name' => $modelShortName,
                        'model_years' => $modelYears,
                        'model_body' => $modelBody,
                        'cyrillic_name' => $cyrillicName
                    ]
                );
            } catch (\Exception $e) {
                dd($e->getMessage(), $modelShortName);
            }

        }
    }
}
