<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Book;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $hardcodedBooks = [
            [
                'title' => 'My Wife is a Beautiful CEO',
                'description' => 'Yang Chen, a graduate from Harvard who is fluent in English, French, Italian, and German to list a few. He is also capable of fighting and a number of practical skills. Yet he chose to go on the streets to sell fried mutton skewers for a living.

                Lin Ruoxi is the CEO of a multibillion-dollar company—Yu Lei International. This company is one of the leaders in the cosmetic and fashion industry. Despite being only 20 years old, her ice-cold demeanor and beauty are well-known and unrivaled in Zhonghai City.
                
                Due to a wild night consisting of a lot of liquor, fate has brought them together to become husband and wife.
                
                And with that, the story begins!
                ',
                'chapters' => 2312,
                'rating' => 4.5,
                'book_cover' => 'https://cdn.novelupdates.com/images/2016/10/tmp_24750-Ruoxi1921997025.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'The God and Devil World',
                'description' => 'In less than an instant the world as we knew it was at its end.

                That’s right. The Apocalypse. In a single blink Zombies appeared and mutated monsters began to rampage all throughout the world. Now it was the human species turn to fight for survival and planetary dominance!
                
                On the same day that the world descends into chaos we meet Yue Zhong. Initially only hoping to get to his friends and escape to a refugee camp our protagonist sets out, inadvertently building a team along the way. After a series of fortuitous events and a few serious hunches our hero decides it’s time to do more than just survive!
                
                Yue Zhong begins to form the foundations of an enormous survival plan… before he suddenly discovers that he has only gotten over the first hurdle…. Unbeknownst to Yue Zhong and company, the world outside of China is mostly a wasteland! Country sized swathes of nuclear radiation and an extreme shortage of supplies in the world after the nuclear explosions was quickly becoming the “norm”. Mutants, Evolved animals and what’s worse, intelligent out of control dinosaurs had quickly appeared and claimed their own sections of the planet. There were several innately powerful Evolved races which appeared that were more than 10 times stronger than humans, nearly all of them possessing bodies impenetrable by normal bullets. The fabled orcs’ were another of these Evolved races, the leader of which had in fact ens*aved many of the remaining human beings.
                
                Unceremoniously exposed to such a cold and heartless new world, Yue Zhong is faced with a choice: Find a deep dark hole and hope it goes back to “normal”? Or overcome all obstacles and struggle towards Evolution!!!
                ',
                'chapters' => 2560,
                'rating' => 4.7,
                'book_cover' => 'https://cdn.novelupdates.com/images/2017/04/godanddevilworld.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'The Peerless Genius System',
                'description' => 'Xiao Luo and his girlfriend had been in love with each other for four years when 
                she proposed a break up. Because of this, Xiao Luo sped his car in the night and ended up in a car 
                accident. But it was a blessing in disguise as he unexpectedly fused with a high tech system that originated 
                from a universe hundreds of billions of light years away. From this moment on, the entire world started to run amok…..',
                'chapters' => 1098,
                'rating' => 4.7,
                'book_cover' => 'https://cdn.novelupdates.com/images/2019/05/180.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Very Pure and Ambiguous: Prequel',
                'description' => 'He died on the wedding of the girl he had a crush on, after a long and successful career.
                 After convincing Yama to send him back to the world, he decides to fix the areas in which his life went wrong. 
                Realizing the lack of love and romance in his past life, he sets out to conquer the hearts of various women.',
                'chapters' => 4560,
                'rating' => 4.7,
                'book_cover' => 'https://cdn.novelupdates.com/images/2016/06/pna.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],

        ];

        foreach ($hardcodedBooks as $book) {
            Book::create($book);
        }

        Book::factory()->count(6)->create();
    }
}
