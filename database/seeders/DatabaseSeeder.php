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
        $math        = Category::create(['name' => 'Mathematics']);
        $geography   = Category::create(['name' => 'Geography']);
        $literature  = Category::create(['name' => 'Literature']);
        $technology  = Category::create(['name' => 'Technology']);

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
            ['question' => 'What is recursion?', 'answer' => 'A technique where a function calls itself to solve a problem by breaking it down into smaller, similar sub-problems.'],
            ['question' => 'What is a database index?', 'answer' => 'A data structure that improves the speed of data retrieval operations on a database table at the cost of additional storage space.'],
            ['question' => 'What is the difference between == and === in JavaScript?', 'answer' => '== compares values with type coercion, while === compares both value and type without coercion (strict equality).'],
            ['question' => 'What is a REST API?', 'answer' => 'Representational State Transfer API, an architectural style that uses HTTP methods (GET, POST, PUT, DELETE) to interact with resources.'],
            ['question' => 'What is Docker?', 'answer' => 'A platform for developing, shipping, and running applications inside lightweight, portable containers.'],
        ];

        // Science flashcards
        $scienceCards = [
            ['question' => 'What is the speed of light?', 'answer' => 'Approximately 299,792,458 meters per second (about 3 x 10^8 m/s) in a vacuum.'],
            ['question' => 'What is photosynthesis?', 'answer' => 'The process by which plants convert sunlight, carbon dioxide, and water into glucose and oxygen.'],
            ['question' => 'What is DNA?', 'answer' => 'Deoxyribonucleic acid, a molecule that carries the genetic instructions for the development and functioning of living organisms.'],
            ['question' => 'What is Newton\'s First Law of Motion?', 'answer' => 'An object at rest stays at rest and an object in motion stays in motion unless acted upon by an external force.'],
            ['question' => 'What is the periodic table?', 'answer' => 'A tabular arrangement of chemical elements organized by atomic number, electron configuration, and recurring chemical properties.'],
            ['question' => 'What is the theory of relativity?', 'answer' => 'Einstein\'s theory that describes the relationship between space, time, and gravity. E=mc² shows mass-energy equivalence.'],
            ['question' => 'What is an atom?', 'answer' => 'The smallest unit of matter that retains the chemical properties of an element, consisting of protons, neutrons, and electrons.'],
            ['question' => 'What is evolution?', 'answer' => 'The process of change in all forms of life over generations through natural selection, genetic drift, and mutation.'],
            ['question' => 'What is the water cycle?', 'answer' => 'The continuous movement of water through evaporation, condensation, precipitation, and collection back into bodies of water.'],
            ['question' => 'What is gravity?', 'answer' => 'A fundamental force of nature that attracts objects with mass toward each other. On Earth, it accelerates objects at ~9.8 m/s².'],
            ['question' => 'What is a black hole?', 'answer' => 'A region of spacetime where gravity is so strong that nothing, not even light, can escape from it.'],
            ['question' => 'What are mitochondria?', 'answer' => 'Organelles found in cells that generate most of the cell\'s supply of ATP (energy). Known as the "powerhouse of the cell".'],
        ];

        // History flashcards
        $historyCards = [
            ['question' => 'When did World War II end?', 'answer' => 'September 2, 1945, when Japan formally surrendered aboard the USS Missouri.'],
            ['question' => 'Who was the first President of the United States?', 'answer' => 'George Washington, who served from 1789 to 1797.'],
            ['question' => 'What was the Renaissance?', 'answer' => 'A cultural movement from the 14th to 17th century that began in Italy, marking the transition from the Middle Ages to modernity.'],
            ['question' => 'When was the Declaration of Independence signed?', 'answer' => 'August 2, 1776, although it was adopted by the Continental Congress on July 4, 1776.'],
            ['question' => 'What was the Industrial Revolution?', 'answer' => 'A period of major industrialization from the late 1700s to early 1800s, transitioning from hand production to machine manufacturing.'],
            ['question' => 'What was the Cold War?', 'answer' => 'A period of geopolitical tension (1947-1991) between the United States and the Soviet Union and their respective allies.'],
            ['question' => 'Who built the Great Wall of China?', 'answer' => 'Construction began during the Qin Dynasty (221-206 BC) under Emperor Qin Shi Huang, and continued over many centuries.'],
            ['question' => 'What was the French Revolution?', 'answer' => 'A period of radical political and societal change in France (1789-1799) that ended the monarchy and established a republic.'],
            ['question' => 'When did the Roman Empire fall?', 'answer' => 'The Western Roman Empire fell in 476 AD when Germanic leader Odoacer deposed Emperor Romulus Augustulus.'],
            ['question' => 'What was the Silk Road?', 'answer' => 'An ancient network of trade routes connecting the East and West, from China to the Mediterranean, active from ~130 BC to 1453 AD.'],
        ];

        // Languages flashcards
        $languagesCards = [
            ['question' => 'How do you say "Hello" in Japanese?', 'answer' => 'こんにちは (Konnichiwa)'],
            ['question' => 'How do you say "Thank you" in French?', 'answer' => 'Merci'],
            ['question' => 'How do you say "Goodbye" in Spanish?', 'answer' => 'Adiós'],
            ['question' => 'How do you say "I love you" in Korean?', 'answer' => '사랑해요 (Saranghaeyo)'],
            ['question' => 'How do you say "Good morning" in German?', 'answer' => 'Guten Morgen'],
            ['question' => 'How do you say "Please" in Italian?', 'answer' => 'Per favore'],
            ['question' => 'How do you say "Water" in Chinese (Mandarin)?', 'answer' => '水 (Shuǐ)'],
            ['question' => 'How do you say "Friend" in Portuguese?', 'answer' => 'Amigo (male) / Amiga (female)'],
            ['question' => 'How do you say "Beautiful" in Arabic?', 'answer' => 'جميل (Jameel) for masculine / جميلة (Jameela) for feminine'],
            ['question' => 'How do you say "Yes" and "No" in Russian?', 'answer' => 'Да (Da) = Yes, Нет (Nyet) = No'],
            ['question' => 'How do you say "Excuse me" in Vietnamese?', 'answer' => 'Xin lỗi'],
            ['question' => 'How do you say "How are you?" in Thai?', 'answer' => 'สบายดีไหม (Sabai dee mai?)'],
        ];

        // Mathematics flashcards
        $mathCards = [
            ['question' => 'What is the Pythagorean theorem?', 'answer' => 'In a right triangle, the square of the hypotenuse equals the sum of squares of the other two sides: a² + b² = c².'],
            ['question' => 'What is Pi (π)?', 'answer' => 'An irrational number approximately equal to 3.14159, representing the ratio of a circle\'s circumference to its diameter.'],
            ['question' => 'What is a prime number?', 'answer' => 'A natural number greater than 1 that has no positive divisors other than 1 and itself. Examples: 2, 3, 5, 7, 11, 13.'],
            ['question' => 'What is the quadratic formula?', 'answer' => 'x = (-b ± √(b² - 4ac)) / 2a, used to find solutions of ax² + bx + c = 0.'],
            ['question' => 'What is a factorial?', 'answer' => 'The product of all positive integers less than or equal to n. Written as n! Example: 5! = 5 × 4 × 3 × 2 × 1 = 120.'],
            ['question' => 'What is the difference between mean, median, and mode?', 'answer' => 'Mean = average of all values. Median = middle value when sorted. Mode = most frequently occurring value.'],
            ['question' => 'What is a derivative in calculus?', 'answer' => 'A measure of how a function changes as its input changes. It represents the slope of the tangent line at any point on a curve.'],
            ['question' => 'What is the Fibonacci sequence?', 'answer' => 'A sequence where each number is the sum of the two preceding ones: 0, 1, 1, 2, 3, 5, 8, 13, 21, 34, ...'],
            ['question' => 'What is logarithm?', 'answer' => 'The inverse operation of exponentiation. log_b(x) = y means b^y = x. Example: log₂(8) = 3 because 2³ = 8.'],
            ['question' => 'What is the area of a circle?', 'answer' => 'A = πr², where r is the radius of the circle.'],
        ];

        // Geography flashcards
        $geographyCards = [
            ['question' => 'What is the largest continent by area?', 'answer' => 'Asia, covering approximately 44.58 million km² (about 30% of Earth\'s total land area).'],
            ['question' => 'What is the longest river in the world?', 'answer' => 'The Nile River, stretching approximately 6,650 km through northeastern Africa.'],
            ['question' => 'What is the highest mountain in the world?', 'answer' => 'Mount Everest, standing at 8,849 meters (29,032 feet) above sea level, located in the Himalayas.'],
            ['question' => 'What is the largest ocean?', 'answer' => 'The Pacific Ocean, covering approximately 165.25 million km², larger than all the land area on Earth combined.'],
            ['question' => 'What is the smallest country in the world?', 'answer' => 'Vatican City, with an area of just 0.49 km² (about 121 acres), located within Rome, Italy.'],
            ['question' => 'What is the largest desert in the world?', 'answer' => 'Antarctica (cold desert) at 14.2 million km². The largest hot desert is the Sahara at 9.2 million km².'],
            ['question' => 'How many countries are there in the world?', 'answer' => '195 countries are recognized by the United Nations (193 member states + 2 observer states).'],
            ['question' => 'What is the capital of Australia?', 'answer' => 'Canberra (not Sydney or Melbourne as commonly mistaken).'],
            ['question' => 'What are the 7 continents?', 'answer' => 'Asia, Africa, North America, South America, Antarctica, Europe, and Australia/Oceania.'],
            ['question' => 'What is the Ring of Fire?', 'answer' => 'A horseshoe-shaped zone around the Pacific Ocean where about 75% of the world\'s volcanoes and 90% of earthquakes occur.'],
        ];

        // Literature flashcards
        $literatureCards = [
            ['question' => 'Who wrote "Romeo and Juliet"?', 'answer' => 'William Shakespeare, written around 1594-1596. It is one of his most famous tragedies.'],
            ['question' => 'What is a sonnet?', 'answer' => 'A 14-line poem with a specific rhyme scheme. Two main types: Shakespearean (ABAB CDCD EFEF GG) and Petrarchan (ABBAABBA + CDECDE).'],
            ['question' => 'Who wrote "1984"?', 'answer' => 'George Orwell, published in 1949. A dystopian novel about totalitarianism and surveillance.'],
            ['question' => 'What is the difference between a simile and a metaphor?', 'answer' => 'A simile compares using "like" or "as" (e.g., brave as a lion). A metaphor states something IS something else (e.g., time is money).'],
            ['question' => 'Who wrote "The Great Gatsby"?', 'answer' => 'F. Scott Fitzgerald, published in 1925. Set in the Jazz Age, it explores themes of wealth, class, and the American Dream.'],
            ['question' => 'What is an allegory?', 'answer' => 'A narrative in which characters and events represent abstract ideas or moral qualities. Example: "Animal Farm" by George Orwell.'],
            ['question' => 'Who wrote "Don Quixote"?', 'answer' => 'Miguel de Cervantes, published in two parts (1605 and 1615). Often considered the first modern novel.'],
            ['question' => 'What is a haiku?', 'answer' => 'A traditional Japanese poem consisting of three lines with 5, 7, and 5 syllables respectively. Often about nature or seasons.'],
        ];

        // Technology flashcards
        $techCards = [
            ['question' => 'What is Cloud Computing?', 'answer' => 'The delivery of computing services (servers, storage, databases, networking) over the internet. Examples: AWS, Azure, Google Cloud.'],
            ['question' => 'What is Machine Learning?', 'answer' => 'A subset of AI where systems learn and improve from experience without being explicitly programmed, using algorithms and statistical models.'],
            ['question' => 'What is Blockchain?', 'answer' => 'A decentralized, distributed digital ledger that records transactions across many computers, making records difficult to alter retroactively.'],
            ['question' => 'What is the Internet of Things (IoT)?', 'answer' => 'A network of physical devices embedded with sensors and software that connect and exchange data over the internet.'],
            ['question' => 'What is 5G?', 'answer' => 'The fifth generation of mobile network technology, offering speeds up to 100x faster than 4G with lower latency.'],
            ['question' => 'What is Cybersecurity?', 'answer' => 'The practice of protecting systems, networks, and programs from digital attacks, unauthorized access, and data breaches.'],
            ['question' => 'What is Artificial Intelligence (AI)?', 'answer' => 'The simulation of human intelligence by machines, enabling them to perform tasks like learning, reasoning, and problem-solving.'],
            ['question' => 'What is Big Data?', 'answer' => 'Extremely large datasets that can be analyzed computationally to reveal patterns, trends, and associations. Defined by Volume, Velocity, and Variety.'],
            ['question' => 'What is a VPN?', 'answer' => 'Virtual Private Network, a service that encrypts your internet connection and hides your IP address for privacy and security.'],
            ['question' => 'What is Open Source software?', 'answer' => 'Software with source code that anyone can inspect, modify, and distribute. Examples: Linux, Firefox, WordPress, Laravel.'],
        ];

        // Insert all flashcards
        $allCards = [
            $programming->id => $programmingCards,
            $science->id     => $scienceCards,
            $history->id     => $historyCards,
            $languages->id   => $languagesCards,
            $math->id        => $mathCards,
            $geography->id   => $geographyCards,
            $literature->id  => $literatureCards,
            $technology->id  => $techCards,
        ];

        foreach ($allCards as $categoryId => $cards) {
            foreach ($cards as $card) {
                Flashcard::create(array_merge($card, ['category_id' => $categoryId]));
            }
        }
    }
}
