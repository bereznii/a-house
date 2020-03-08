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

            echo $model->id . ' -> ' . $modelShortName . "\n";

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
                        'model_body' => $modelBody
                    ]
                );
            } catch (\Exception $e) {
                dd($e->getMessage(), $modelShortName);
            }

        }
    }
}
