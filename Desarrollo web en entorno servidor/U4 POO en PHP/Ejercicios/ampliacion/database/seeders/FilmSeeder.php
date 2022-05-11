<?php

namespace Database\Seeders;

use App\Models\Film;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FilmSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $films = [
            ["image_id" => 2, "name" => "Barry Lyndon", "director" => "Stanley Kubrick", "description" => "An Irish rogue uses his cunning and wit to work his way up the social classes of 18th century England, transforming himself from the humble Redmond Barry into the noble Barry Lyndon.", "runtime" => 187, "release_year" => 1975],
            ["image_id" => 3, "name" => "Funny Games", "director" => "Michael Haneke", "description" => "Two psychotic young men take a mother, father, and son hostage in their vacation cabin and force them to play sadistic “games” with one another for their own amusement.", "runtime" => 109, "release_year" => 1998],
            ["image_id" => 4, "name" => "I Stand Alone", "director" => "Gaspar Noé", "description" => "The Butcher has done some time in jail after beating up the guy who tried to seduce his teenage mentally-handicapped daughter. Now he wants to start a new life. He leaves his daughter in an institution and moves to Lille suburbs with his mistress. She promised him a new butcher shop. She lied. The butcher decides to go back to Paris and find his daughter.", "runtime" => 89, "release_year" => 1999],
            ["image_id" => 5, "name" => "It's Such a Beautiful Day", "director" => "Don Hertzfeldt", "description" => "Bill struggles to put together his shattered psyche, in this feature film version of Don Hertzfeldt's animated short film trilogy.", "runtime" => 62, "release_year" => 2012],
            ["image_id" => 6, "name" => "Koyaanisqatsi", "director" => "Godfrey Reggio", "description" => "Takes us to locations all around the US and shows us the heavy toll that modern technology is having on humans and the earth. The visual tone poem contains neither dialogue nor a vocalized narration: its tone is set by the juxtaposition of images and the exceptional music by Philip Glass.", "runtime" => 86, "release_year" => 1983],
            ["image_id" => 7, "name" => "La Haine", "director" => "Mathieu Kassovitz", "description" => "After a chaotic night of rioting in a marginal suburb of Paris, three young friends, Vinz, Hubert and Saïd, wander around unoccupied waiting for news about the state of health of a mutual friend who has been seriously injured when confronting the police.", "runtime" => 98, "release_year" => 1996],
            ["image_id" => 8, "name" => "Pi", "director" => "Darren Aronofsky", "description" => "The debut film from Darren Aronofsky in which a mathematical genius Maximilian Cohen discovers a link in the connection between numbers and reality and thus believes he can predict the future.", "runtime" => 84, "release_year" => 1999],
            ["image_id" => 9, "name" => "Stalker", "director" => "Andrei Tarkovski", "description" => "Near a gray and unnamed city is the Zone, a place guarded by barbed wire and soldiers, and where the normal laws of physics are victim to frequent anomalies. A stalker guides two men into the Zone, specifically to an area in which deep-seated desires are granted.", "runtime" => 162, "release_year" => 1979],
            ["image_id" => 10, "name" => "Taxi Driver", "director" => "Martin Scorsese", "description" => "A mentally unstable Vietnam War veteran works as a night-time taxi driver in New York City where the perceived decadence and sleaze feed his urge for violent action, attempting to save a preadolescent prostitute in the process.", "runtime" => 114, "release_year" => 1976],
            ["image_id" => 11, "name" => "Neon Genesis Evangelion: The End of Evangelion", "director" => "Hideaki Anno & Kazuya Tsurumaki", "description" => "The second of two theatrically released follow-ups to the Neon Genesis Evangelion series. Comprising of two alternate episodes which were first intended to take the place of episodes 25 and 26, this finale answers many of the questions surrounding the series, while also opening up some new possibilities.", "runtime" => 87, "release_year" => 1997],
            ["image_id" => 12, "name" => "Waking Life", "director" => "Richard Linklater", "description" => "Waking Life is about a young man in a persistent lucid dream-like state. The film follows its protagonist as he initially observes and later participates in philosophical discussions that weave together issues like reality, free will, our relationships with others, and the meaning of life.", "runtime" => 99, "release_year" => 2001],
            ["image_id" => 13, "name" => "World of Tomorrow", "director" => "Don Hertzfeldt", "description" => "A little girl is taken on a mind-bending tour of her distant future.", "runtime" => 17, "release_year" => 2015],
        ];

        foreach ($films as $film) {
            Film::create($film);
        }
    }
}
