<?php

use App\Page;
use Illuminate\Database\Seeder;

class PagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $pages = [
            'home' => [
                ['name' => 'section_1_heading', 'content' => 'Mobile Self Storage', 'editor' => 'text'],
                ['name' => 'section_1_blurb', 'content' => 'Load Your Storage Modules at Your Place <br />&amp; In Your Own Time. <br />*Loading assistance also available', 'editor' => 'html'],
                ['name' => 'section_2_heading', 'content' => 'DIY Removals', 'editor' => 'text'],
                ['name' => 'section_2_blurb', 'content' => 'Save $1000s in removal fees!<br /> *Loading assistance also available', 'editor' => 'html'],
                ['name' => 'section_1_image', 'content' => 'content', 'editor' => 'image'],
                ['name' => 'section_2_image', 'content' => 'content', 'editor' => 'image'],
            ],

            'modules' => [
                ['name' => 'page_heading', 'content' => 'Module Specs', 'editor' => 'text'],
                ['name' => 'page_content', 'content' => 'Page content', 'editor' => 'html'],
            ],
            'storage' => [
                ['name' => 'page_heading', 'content' => 'Storage', 'editor' => 'text'],
                ['name' => 'page_content', 'content' => 'Page content', 'editor' => 'html'],
            ],
            'removal' => [
                ['name' => 'page_heading', 'content' => 'Removal', 'editor' => 'text'],
                ['name' => 'page_content', 'content' => 'Page content', 'editor' => 'html'],
            ],
            'booking' => [
                ['name' => 'page_heading', 'content' => 'Bookings', 'editor' => 'text'],
                ['name' => 'page_content', 'content' => 'Page content', 'editor' => 'html'],
            ],
            'faqs' => [
                ['name' => 'page_heading', 'content' => 'FAQs', 'editor' => 'text'],
                ['name' => 'page_content', 'content' => 'Page content', 'editor' => 'html'],
            ],
            'contact' => [
                ['name' => 'page_heading', 'content' => 'Contact', 'editor' => 'text'],
                ['name' => 'page_content', 'content' => 'Page content', 'editor' => 'html'],
            ],
            'privacy' => [
                ['name' => 'page_heading', 'content' => 'Privacy', 'editor' => 'text'],
                ['name' => 'page_content', 'content' => 'Page content', 'editor' => 'html'],
            ],
            'terms' => [
                ['name' => 'page_heading', 'content' => 'Terms', 'editor' => 'text'],
                ['name' => 'page_content', 'content' => 'Page content', 'editor' => 'html'],
            ],
        ];

        foreach ($pages as $page => $elements) {
            $page = Page::create([
                'name' => $page,
            ]);
            foreach ($elements as $e) {
                $page->elements()->create([
                    'name' => $e['name'],
                    'content' => $e['content'],
                    'editor' => $e['editor'],
                ]);
            }
        }
    }
}
