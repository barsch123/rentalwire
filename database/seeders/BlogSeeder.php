<?php

namespace Database\Seeders;

use App\Models\Blogs;
use App\Models\Tag;
use Illuminate\Database\Seeder;

class BlogSeeder extends Seeder
{
    public function run(): void
    {
        $articles = [
            [
                'title' => 'How to Choose the Right Solar System for Your Home',
                'slug' => 'how-to-choose-the-right-solar-system-for-your-home',
                'published_at' => '2026-01-14',
                'modified_at' => '2026-01-14',
                'image' => 'img/blog/home-solar-system.png',
                'tags' => ['Solar Energy', 'Renewable Insights'],
                'content' => <<<'HTML'
<p>The best home solar system is not necessarily the largest one. It is the system that matches how your household uses energy, how much roof space is available, and which appliances you need to keep running when the grid is unreliable.</p>
<h2>Start with your daily energy pattern</h2>
<p>Review a few months of electricity bills and note when your biggest loads run. Air-conditioning, pumps, refrigeration, and water heating can change the size and type of system you need. A good assessment looks at timing as well as total consumption.</p>
<h2>Solar panels, batteries, or both?</h2>
<p>Panels reduce the energy you buy during sunny hours. Batteries store surplus production for the evening and can provide backup for selected circuits. Many homes benefit from a hybrid system that starts with solar and leaves room to add storage as needs grow.</p>
<p>At Solara, we design around your real usage rather than a generic package. That means clearer recommendations, sensible expansion options, and a system that is easier to live with after installation.</p>
HTML,
            ],
            [
                'title' => 'What a Battery Backup System Should Keep Running',
                'slug' => 'what-a-battery-backup-system-should-keep-running',
                'published_at' => '2026-02-03',
                'modified_at' => '2026-02-03',
                'image' => 'img/blog/battery-backup.png',
                'tags' => ['Battery Storage', 'Energy Savings'],
                'content' => <<<'HTML'
<p>A battery backup system works best when it has a clear job. Instead of trying to power every appliance indefinitely, most households begin by protecting the circuits that matter most during an outage.</p>
<h2>Prioritize essential loads</h2>
<p>Refrigeration, internet equipment, lights, security systems, medical devices, and selected fans are common priorities. High-demand appliances may need a separate plan because they can quickly use available battery capacity.</p>
<h2>Size for comfort and resilience</h2>
<p>Power determines what can start at once; energy determines how long the circuits can run. A proper design accounts for startup surges, nighttime use, and the time needed for the solar array to recharge the battery.</p>
<p>Good backup planning is a conversation about priorities. Solara helps homeowners choose the loads that provide the most comfort and resilience without paying for capacity they will rarely use.</p>
HTML,
            ],
            [
                'title' => 'Solar for Small Businesses: Where the Savings Begin',
                'slug' => 'solar-for-small-businesses-where-the-savings-begin',
                'published_at' => '2026-02-19',
                'modified_at' => '2026-02-19',
                'image' => 'img/blog/small-business-solar.png',
                'tags' => ['Energy Savings', 'Industry'],
                'content' => <<<'HTML'
<p>For a small business, energy costs affect every month’s margin. Solar can help make those costs more predictable, especially when the business uses the most electricity during daylight hours.</p>
<h2>Look at the operating schedule</h2>
<p>Retail shops, offices, restaurants, workshops, and small warehouses all have different load profiles. The first step is to compare hours of operation with solar production and identify where panels can offset grid energy immediately.</p>
<h2>Do not overlook power quality</h2>
<p>Reliable power is often as valuable as lower bills. Monitoring, surge protection, and carefully selected backup circuits can help protect equipment and keep essential operations moving during interruptions.</p>
<p>A practical commercial solar plan can be phased: start with the highest-value loads, measure performance, and expand when the business is ready.</p>
HTML,
            ],
            [
                'title' => 'Five Simple Ways to Use Less Energy Before Installing Solar',
                'slug' => 'five-simple-ways-to-use-less-energy-before-installing-solar',
                'published_at' => '2026-03-07',
                'modified_at' => '2026-03-07',
                'image' => 'img/blog/energy-efficiency.png',
                'tags' => ['Energy Savings', 'Sustainability'],
                'content' => <<<'HTML'
<p>Solar becomes more valuable when your home or business is already using energy thoughtfully. Small efficiency improvements can reduce the system size you need and make every kilowatt-hour go further.</p>
<ol><li>Clean or replace air-conditioner filters regularly.</li><li>Use timers or smart controls for pumps and water heating.</li><li>Seal gaps around doors and windows where cooled air escapes.</li><li>Replace frequently used lighting with efficient LED fixtures.</li><li>Track unusual changes in your monthly electricity use.</li></ol>
<h2>Efficiency and solar work together</h2>
<p>Efficiency reduces waste; solar changes where your energy comes from. Combining both gives you more control over bills and often improves the value of a future battery system.</p>
<p>Before recommending equipment, Solara looks for practical opportunities to improve the way a property uses power.</p>
HTML,
            ],
            [
                'title' => 'How Solar Monitoring Helps You Get More from Your Investment',
                'slug' => 'how-solar-monitoring-helps-you-get-more-from-your-investment',
                'published_at' => '2026-03-22',
                'modified_at' => '2026-03-22',
                'image' => 'img/blog/solar-monitoring.png',
                'tags' => ['Technology', 'Maintenance'],
                'content' => <<<'HTML'
<p>Solar panels are quiet and dependable, which can make it easy to forget about them. Monitoring gives you a simple way to see whether the system is producing as expected and spot changes before they become expensive problems.</p>
<h2>What should you monitor?</h2>
<p>Useful dashboards show daily production, historical trends, battery state of charge, and alerts. Comparing production with weather and seasonal patterns helps distinguish a normal change from a genuine fault.</p>
<h2>Small signals can matter</h2>
<p>A gradual drop in production may point to shading, dirt, a connection issue, or equipment that needs attention. Early visibility helps the service team investigate efficiently.</p>
<p>Monitoring is not about watching charts all day. It is about having the information needed to make confident decisions about maintenance and usage.</p>
HTML,
            ],
            [
                'title' => 'A Practical Guide to Preparing Your Roof for Solar',
                'slug' => 'a-practical-guide-to-preparing-your-roof-for-solar',
                'published_at' => '2026-04-11',
                'modified_at' => '2026-04-11',
                'image' => 'img/blog/roof-preparation.png',
                'tags' => ['Safety', 'Maintenance', 'Solar Energy'],
                'content' => <<<'HTML'
<p>Roof preparation is one of the most important parts of a smooth solar installation. A strong design begins with an honest look at the roof’s age, condition, orientation, and available space.</p>
<h2>Check the roof before the equipment</h2>
<p>If a roof is near the end of its service life, repairing or replacing it before installation may be more practical than removing panels later. The assessment should also consider drainage, access, wind exposure, and regular shade.</p>
<h2>Plan for safe access</h2>
<p>Installers need a safe route to the array and enough space to work around electrical equipment. Clear planning protects the team, reduces delays, and makes future maintenance easier.</p>
<p>Solara includes site conditions in the system design so the finished installation feels intentional, safe, and ready for long-term service.</p>
HTML,
            ],
        ];

        foreach ($articles as $article) {
            $tagNames = $article['tags'];
            $image = $article['image'];
            unset($article['tags']);
            unset($article['image']);

            $blog = Blogs::query()->updateOrCreate(
                ['slug' => $article['slug']],
                [...$article, 'blog_photo' => $image],
            );

            $tagIds = collect($tagNames)
                ->map(fn (string $name): int => Tag::query()->firstOrCreate(['name' => $name])->id)
                ->all();

            $blog->tags()->sync($tagIds);
        }
    }
}
