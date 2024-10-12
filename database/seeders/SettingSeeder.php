<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $setting = \App\Models\Setting::create([
            "site_title" => "كتبي",
            "description" => "مكتبة كتبي هي وجهتك الأدبية المثلى لقراءة وتحميل آلاف الكتب الإلكترونية بصيغة PDF في شتى المجالات الأدبية والثقافية. نقدم مجموعة واسعة من الروايات والكتب الأكاديمية وكتب التنمية الذاتية وغيرها، مما يتيح لك استكشاف عوالم جديدة وأفكار ملهمة. كما نوفر منصة للمؤلفين لنشر أعمالهم الخاصة مجانًا، مما يسهم في تعزيز الثقافة والأدب. انضم إلينا واستمتع بتجربة قراءة غنية وممتعة.",
            "keywords" => "كتب إلكترونية مجانية,تحميل كتب عربية,روايات عربية مشهورة,كتب دراسية pdf,روايات جديدة,قراءة كتب أون لاين,كتب قصص قصيرة,كتب تعليمية,كتب في تطوير الذات,كتب في الأدب العالمي,روايات تاريخية,تحميل روايات pdf,مكتبة كتب مجانية,كتب شعر عربي,كتب فلسفية pdf",
            "save_local"=> 0
        ]);
    }
}
