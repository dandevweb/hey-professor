<?php

// @formatter:off
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */

namespace App\Models{
    /**
     * App\Models\Question
     *
     * @property int $id
     * @property string $question
     * @property \Illuminate\Support\Carbon|null $created_at
     * @property \Illuminate\Support\Carbon|null $updated_at
     * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Vote> $votes
     * @property-read int|null $votes_count
     * @method static \Database\Factories\QuestionFactory factory($count = null, $state = [])
     * @method static \Illuminate\Database\Eloquent\Builder|Question newModelQuery()
     * @method static \Illuminate\Database\Eloquent\Builder|Question newQuery()
     * @method static \Illuminate\Database\Eloquent\Builder|Question query()
     * @method static \Illuminate\Database\Eloquent\Builder|Question whereCreatedAt($value)
     * @method static \Illuminate\Database\Eloquent\Builder|Question whereId($value)
     * @method static \Illuminate\Database\Eloquent\Builder|Question whereQuestion($value)
     * @method static \Illuminate\Database\Eloquent\Builder|Question whereUpdatedAt($value)
     */
    class Question extends \Eloquent
    {
    }
}

namespace App\Models{
    /**
     * App\Models\User
     *
     * @property int $id
     * @property string $name
     * @property string $email
     * @property \Illuminate\Support\Carbon|null $email_verified_at
     * @property mixed $password
     * @property string|null $remember_token
     * @property \Illuminate\Support\Carbon|null $created_at
     * @property \Illuminate\Support\Carbon|null $updated_at
     * @property-read \Illuminate\Notifications\DatabaseNotificationCollection<int, \Illuminate\Notifications\DatabaseNotification> $notifications
     * @property-read int|null $notifications_count
     * @property-read \Illuminate\Database\Eloquent\Collection<int, \Laravel\Sanctum\PersonalAccessToken> $tokens
     * @property-read int|null $tokens_count
     * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Vote> $votes
     * @property-read int|null $votes_count
     * @method static \Database\Factories\UserFactory factory($count = null, $state = [])
     * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
     * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
     * @method static \Illuminate\Database\Eloquent\Builder|User query()
     * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedAt($value)
     * @method static \Illuminate\Database\Eloquent\Builder|User whereEmail($value)
     * @method static \Illuminate\Database\Eloquent\Builder|User whereEmailVerifiedAt($value)
     * @method static \Illuminate\Database\Eloquent\Builder|User whereId($value)
     * @method static \Illuminate\Database\Eloquent\Builder|User whereName($value)
     * @method static \Illuminate\Database\Eloquent\Builder|User wherePassword($value)
     * @method static \Illuminate\Database\Eloquent\Builder|User whereRememberToken($value)
     * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedAt($value)
     */
    class User extends \Eloquent implements \Illuminate\Contracts\Auth\MustVerifyEmail
    {
    }
}

namespace App\Models{
    /**
     * App\Models\Vote
     *
     * @property int $id
     * @property int $question_id
     * @property int $user_id
     * @property int $like
     * @property int $unlike
     * @property \Illuminate\Support\Carbon|null $created_at
     * @property \Illuminate\Support\Carbon|null $updated_at
     * @method static \Illuminate\Database\Eloquent\Builder|Vote newModelQuery()
     * @method static \Illuminate\Database\Eloquent\Builder|Vote newQuery()
     * @method static \Illuminate\Database\Eloquent\Builder|Vote query()
     * @method static \Illuminate\Database\Eloquent\Builder|Vote whereCreatedAt($value)
     * @method static \Illuminate\Database\Eloquent\Builder|Vote whereId($value)
     * @method static \Illuminate\Database\Eloquent\Builder|Vote whereLike($value)
     * @method static \Illuminate\Database\Eloquent\Builder|Vote whereQuestionId($value)
     * @method static \Illuminate\Database\Eloquent\Builder|Vote whereUnlike($value)
     * @method static \Illuminate\Database\Eloquent\Builder|Vote whereUpdatedAt($value)
     * @method static \Illuminate\Database\Eloquent\Builder|Vote whereUserId($value)
     */
    class Vote extends \Eloquent
    {
    }
}
