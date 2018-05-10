<?php

use App\Chunk;
use Illuminate\Database\Seeder;

class ChunksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Chunk::create([
            'name' => 'phone_number',
            'description' => 'The toll free number',
            'content' => '1 800 123 456',

        ]);

        Chunk::create([
            'name' => 'how_hear_options',
            'description' => 'How did you hear about us options',
            'content' => 'Internet or google search|Social media',

        ]);

        Chunk::create([
            'name' => 'modules_page_name',
            'description' => 'The name used for the modules page',
            'content' => 'Module Specifications',

        ]);

        Chunk::create([
            'name' => 'testimonials',
            'description' => 'Testimonial data',
            'content' => 'Heading one::testimonial one text::attributed to person|Heading two::testimonial two text::attributed to person2',

        ]);

        Chunk::create([
            'name' => 'contact_phone',
            'description' => 'Phone number for contact page',
            'content' => '5252 3435',
        ]);

        Chunk::create([
            'name' => 'contact_email',
            'description' => 'email address for contact page',
            'content' => 'info@mrselfstorage.com.au',
        ]);

        Chunk::create([
            'name' => 'contact_address',
            'description' => 'Address used on the contact page',
            'content' => '123 The Street<br /> Suburb 3000',
        ]);

        Chunk::create([
            'name' => 'contact_store_hours',
            'description' => 'store hours displayed on the contact page',
            'content' => '9am - 5pm <br />(closed somedays)',
        ]);

        Chunk::create([
            'name' => 'contact_map',
            'description' => 'google map displayed on the contact page',
            'content' => '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3155.7172308654585!2d145.11207101531616!3d-37.7263146797684!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6ad6487322f12c25%3A0x5d94cab5038ca55a!2sPenleigh%2C+123+Main+Rd%2C+Lower+Plenty+VIC+3093!5e0!3m2!1sen!2sau!4v1525929164692" width="300" height="225" frameborder="0" style="border:0" allowfullscreen></iframe>',
        ]);


    }
}
