<?php

use App\Models\Category;
use App\Models\News;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */

    public function news_factory(){

        $title = [
            'المستشارة الأبدية ميركل تستعد لوداع المنصب والسياسة',
            'القضاء العراقي يصدر مذكرات توقيف بحق شخصيات دعت للتطبيع مع إسرائيل',
            'الخرطوم ترسل وفدا رفيعا للتفاوض مع محتجي شرق السودان',
            'مقتل 11 مقاتلا من فصيل موال لأنقرة في غارات روسية على شمال سوريا (المرصد)',
            '50 قتيلا في معارك حول مدينة مأرب اليمنية خلال 48 ساعة (مصادر عسكرية)'
        ];

        $body = [
            'قتل 50 مسلّحا على الأقل من القوات الموالية للحكومة اليمنية والمتمردين الحوثيين في معارك جديدة حول مدينة مأرب الاستراتيجية في شمال اليمن، حسبما أفادت مصادر عسكرية الأحد. وقال مصدر عسكري في القوات الحكومية إنه',
            'صورة التقطت في 16 أيلول/سبتمبر 2021 لأحد الثعابين التي يهجنها السعودي فيصل ملائكة في منزله بجدّة في ... - فايز نور الدين',
            'قُتل 11 مقاتلا على الأقل من فصيل سوري موال لأنقرة الأحد في غارات روسية نادرة في منطقة تخضع لسيطرة تركيا وحلفائها المحليين في شمال سوريا، وفق ما أفاد المرصد السوري لحقوق الإنسان. وأعلن المرصد "مقتل 11 عنصرا من فرقة الحمزة الموالية لتركيا، جراء قصف جوي روسي استهدف مقرًا عسكريًا للفرقة في قرية براد ضمن جبل الأحلام بريف مدينة عفرين" في محافظة حلب الشمالية، مضيفاً أن الغارات أسفرت أيضاً عن "سقوط نحو 13 جريحًا من عناصر الفرقة". استهدفت الضربات مدرسة...',
        ];

        $author = ['أيمن محمد','محمد أسامة','محمد سلامة'];

        $state = ["pending","approved"];

        for ($i = 0; $i<=50; $i++ ){
            $new = News::create([
                'title' => $title[rand(0,4)],
                'body' => $body[rand(0,2)],
                'author' => $author[rand(0,2)],
                'state' => $state[rand(0,1)],
                'category_id' => Category::all()->random()->id,
                'created_at' => date("Y-m-d h:i:s", time())
            ]);

            for ($j = 0; $j<=2; $j++ ){
                DB::table('media')->insert([
                    'filename' => rand(1,10).'.jpg',
                    'news_id' => $new->id,
                ]);
            }
            sleep(3);
        }
    }

    public function run()
    {
        factory('App\User', 25)->create();

        factory('App\Models\Category', 7)->create();

        factory('App\Models\Sponsor', 7)->create();

        factory('App\Models\Contact', 7)->create();

        $this->news_factory();

    }
}
