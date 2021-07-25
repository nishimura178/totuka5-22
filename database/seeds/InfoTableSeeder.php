<?php

use Illuminate\Database\Seeder;

use App\Models\Info\InfoTemplate;

use App\Models\Group\Group;
use App\User;

class InfoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        InfoTemplate::create([
            'id' => 1,
            'name' => '基本情報',
            'default'=>['body'=>''],
            'model'=>Group::class,
            'detail'=>'基本の情報表示',
        ]);

        InfoTemplate::create([
            'id' => 2,
            'name' => '混雑状況',
            'default'=>['degree'=>'0%','detail'=>''],
            'model'=>Group::class,
            'detail'=>'混雑状況を表示します',
        ]);

        InfoTemplate::create([
            'id' => 3,
            'name' => '地点情報',
            'default'=>['type'=>'','detail'=>''],
            'model'=>Group::class,
            'detail'=>'地点情報を表示します',
        ]);

        InfoTemplate::create([
            'id' => 4,
            'name' => '基本情報',
            'default'=>['you_sex'=>'','you_year'=>'','you_month'=>'','you_day'=>'','you_post'=>'','you_addr1'=>'','you_addr2'=>'','you_tel'=>'',//'you10'=>'OFF'
            ],
            'model'=>User::class,
            'detail'=>'基本情報',
        ]);

        InfoTemplate::create([
            'id' => 5,
            'name' => '健康アンケート',
            'default'=>['main'=>'回答なし','comment'=>''],
            'model'=>User::class,
            'detail'=>'健康アンケート',
            'edit'=>['name'=>'回答','icon'=>'<i class="material-icons">question_answer</i>'],
        ]);

        InfoTemplate::create([
            'id' => 6,
            'name' => '避難/救助状況',
            'default'=>['rescue'=>config('kaigohack.rescue.unrescue'),'group'=>null,'rescuer'=>null,'info'=>[]],
            'model'=>User::class,
            'detail'=>'救助状況',
            'edit'=>['name'=>'回答','icon'=>'<i class="material-icons">question_answer</i>'],
        ]);

        InfoTemplate::create([
            'id' => 7,
            'name' => 'お知らせ',
            'default'=>[],
            'model'=>Group::class,
            'detail'=>'お知らせ',
            'edit'=>['name'=>'送信','icon'=>'<i class="material-icons">mail_outline</i>'],
        ]);

        InfoTemplate::create([
            'id' => 8,
            'name' => '家族情報',
            'default'=>['fami_name'=>'','fami_sex'=>'','fami_age'=>'','fami_posi'=>'','fami_post'=>'','fami_addr1'=>'','fami_addr2'=>'','fami_tel'=>'','fami_mail'=>''],
            'model'=>User::class,
            'detail'=>'家族情報',
        ]);

        InfoTemplate::create([
            'id' => 9,
            'name' => '医療',
            'default'=>['temp'=>'36.2','height'=>'170.0','weight'=>'60','medicine'=>'','allergy'=>'','medical'=>'','surgery'=>'','hospital'=>''],
            'model'=>User::class,
            'detail'=>'医療',
        ]);
        
        InfoTemplate::create([
            'id' => 10,
            'name' => '福祉',
            'default'=>['hindrance'=>'','nursing'=>'','caregiver'=>'','caregiver_posi'=>'','service'=>'','use_service'=>'','institution'=>'','oxygen'=>'','assistance'=>'','housemate'=>'','shelter'=>''],
            'model'=>User::class,
            'detail'=>'福祉',
        ]);

    }
}
