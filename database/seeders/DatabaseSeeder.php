<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Challenge;
use App\Models\Competition;
use App\Models\Examiner;
use App\Models\Participant;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // create 100 users
         User::factory(100)->create();

        // create 1 competition
        $competition = Competition::create(['title' => 'test competition']);

        // create 2 groups
        $firstGroup = $competition->groups()->create(['title' => 'first group']);
        $secondGroup = $competition->groups()->create(['title' => 'second group']);

        // create 4 fields and associate with groups
        $firstField = $firstGroup->fields()->create(
            ['title' => 'firstField'],
            ['competition_id' => $competition->id],
        );
        $secondField = $firstGroup->fields()->create(
            ['title' => 'secondField'],
            ['competition_id' => $competition->id],
        );
        $thirdField = $secondGroup->fields()->create(
            ['title' => '$thirdField'],
            ['competition_id' => $competition->id],
        );
        $fourthField = $secondGroup->fields()->create(
            ['title' => 'fourthField'],
            ['competition_id' => $competition->id],
        );

        // create 5 age ranges
        // challenges should also be created with this query
        $firstField->age_ranges()->create([
            'title' => '6-10',
            'competition_id' => $competition->id,
        ]);
        $firstField->age_ranges()->create([
            'title' => '11-16',
            'competition_id' => $competition->id,
        ]);
        $firstField->age_ranges()->create([
            'title' => '16-20',
            'competition_id' => $competition->id,
        ]);
        $thirdField->age_ranges()->create([
            'title' => '6-10',
            'competition_id' => $competition->id,
        ]);
        $thirdField->age_ranges()->create([
            'title' => '11-16',
            'competition_id' => $competition->id,
        ]);

        // create 100 participants, 20 for each of the 5 challenges
        foreach (range(1, 5) as $challengeId) {
            foreach (range($challengeId * 20 - 19 , $challengeId * 20) as $userId) {
                $challenge = Challenge::find($challengeId);

                Participant::create([
                    'user_id' => $userId,
                    'competition_id' => $competition->id,
                    'field_id' => $challenge->field_id,
                    'challenge_id' => $challengeId,
                ]);
            }
        }

        // create 50 examiners
        foreach (range(1, 50) as $participantId) {
            Examiner::create([
                'participant_id' => $participantId,
            ]);
        }
    }
}
