<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\Flashcard;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Create categories
        $programming = Category::create(['name' => 'Programming']);
        $science     = Category::create(['name' => 'Science']);
        $history     = Category::create(['name' => 'History']);
        $languages   = Category::create(['name' => 'Languages']);

        // Programming flashcards
        $programmingCards = [
            ['question' => 'What is a variable?', 'answer' => 'A named storage location in memory that holds a value which can be changed during program execution.'],
            ['question' => 'What is an array?', 'answer' => 'A data structure that stores a collection of elements, typically of the same type, in contiguous memory locations.'],
            ['question' => 'What is OOP?', 'answer' => 'Object-Oriented Programming is a paradigm based on the concept of objects, which contain data (attributes) and code (methods).'],
            ['question' => 'What is a function?', 'answer' => 'A reusable block of code that performs a specific task and can be called by name.'],
            ['question' => 'What is SQL?', 'answer' => 'Structured Query Language, used to communicate with and manipulate relational databases.'],
            ['question' => 'What is MVC?', 'answer' => 'Model-View-Controller, a software design pattern that separates an application into three interconnected components.'],
            ['question' => 'What is an API?', 'answer' => 'Application Programming Interface, a set of rules and protocols that allows different software applications to communicate.'],
            ['question' => 'What is Git?', 'answer' => 'A distributed version control system used for tracking changes in source code during software development.'],
            ['question' => 'What is a loop?', 'answer' => 'A control flow statement that allows code to be executed repeatedly based on a given condition.'],
            ['question' => 'What is a class?', 'answer' => 'A blueprint or template for creating objects, defining properties and methods that the objects will have.'],
        ];

        // Science flashcards
        $scienceCards = [
            ['question' => 'What is the speed of light?', 'answer' => 'Approximately 299,792,458 meters per second (about 3 x 10^8 m/s) in a vacuum.'],
            ['question' => 'What is photosynthesis?', 'answer' => 'The process by which plants convert sunlight, carbon dioxide, and water into glucose and oxygen.'],
            ['question' => 'What is DNA?', 'answer' => 'Deoxyribonucleic acid, a molecule that carries the genetic instructions for the development and functioning of living organisms.'],
            ['question' => 'What is Newton\'s First Law of Motion?', 'answer' => 'An object at rest stays at rest and an object in motion stays in motion unless acted upon by an external force.'],
            ['question' => 'What is the periodic table?', 'answer' => 'A tabular arrangement of chemical elements organized by atomic number, electron configuration, and recurring chemical properties.'],
        ];

        // History flashcards
        $historyCards = [
            ['question' => 'When did World War II end?', 'answer' => 'September 2, 1945, when Japan formally surrendered aboard the USS Missouri.'],
            ['question' => 'Who was the first President of the United States?', 'answer' => 'George Washington, who served from 1789 to 1797.'],
            ['question' => 'What was the Renaissance?', 'answer' => 'A cultural movement from the 14th to 17th century that began in Italy, marking the transition from the Middle Ages to modernity.'],
            ['question' => 'When was the Declaration of Independence signed?', 'answer' => 'August 2, 1776, although it was adopted by the Continental Congress on July 4, 1776.'],
            ['question' => 'What was the Industrial Revolution?', 'answer' => 'A period of major industrialization from the late 1700s to early 1800s, transitioning from hand production to machine manufacturing.'],
        ];

        // Languages flashcards
        $languagesCards = [
            ['question' => 'How do you say "Hello" in Japanese?', 'answer' => 'こんにちは (Konnichiwa)'],
            ['question' => 'How do you say "Thank you" in French?', 'answer' => 'Merci'],
            ['question' => 'How do you say "Goodbye" in Spanish?', 'answer' => 'Adiós'],
            ['question' => 'How do you say "I love you" in Korean?', 'answer' => '사랑해요 (Saranghaeyo)'],
            ['question' => 'How do you say "Good morning" in German?', 'answer' => 'Guten Morgen'],
        ];

        // Insert all flashcards
        foreach ($programmingCards as $card) {
            Flashcard::create(array_merge($card, ['category_id' => $programming->id]));
        }
        foreach ($scienceCards as $card) {
            Flashcard::create(array_merge($card, ['category_id' => $science->id]));
        }
        foreach ($historyCards as $card) {
            Flashcard::create(array_merge($card, ['category_id' => $history->id]));
        }
        foreach ($languagesCards as $card) {
            Flashcard::create(array_merge($card, ['category_id' => $languages->id]));
        }
    }
}
