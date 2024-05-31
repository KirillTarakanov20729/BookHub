<?php

// @formatter:off
// phpcs:ignoreFile
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models{
/**
 *
 *
 * @property int $id
 * @property int $age_limit
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Book> $books
 * @property-read int|null $books_count
 * @method static \Database\Factories\AgeLimitFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|AgeLimit newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|AgeLimit newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|AgeLimit query()
 * @method static \Illuminate\Database\Eloquent\Builder|AgeLimit whereAgeLimit($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AgeLimit whereId($value)
 */
	class AgeLimit extends \Eloquent {}
}

namespace App\Models{
/**
 *
 *
 * @property int $id
 * @property string $full_name
 * @property string $first_name
 * @property string $last_name
 * @property string|null $middle_name
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Book> $books
 * @property-read int|null $books_count
 * @method static \Database\Factories\AuthorFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Author filter(\App\Http\Filters\FilterInterface $filter)
 * @method static \Illuminate\Database\Eloquent\Builder|Author newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Author newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Author query()
 * @method static \Illuminate\Database\Eloquent\Builder|Author whereFirstName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Author whereFullName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Author whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Author whereLastName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Author whereMiddleName($value)
 */
	class Author extends \Eloquent {}
}

namespace App\Models{
/**
 *
 *
 * @property int $id
 * @property string $name
 * @property string $short_description
 * @property string $full_description
 * @property int $release_date
 * @property string $image_path
 * @property string $text_path
 * @property int $subscription_type_id
 * @property int $age_limit_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\AgeLimit $age_limit
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Author> $authors
 * @property-read int|null $authors_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Genre> $genres
 * @property-read int|null $genres_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Publisher> $publishers
 * @property-read int|null $publishers_count
 * @property-read \App\Models\SubscriptionType $subscription_type
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\User> $users
 * @property-read int|null $users_count
 * @method static \Database\Factories\BookFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Book filter(\App\Http\Filters\FilterInterface $filter)
 * @method static \Illuminate\Database\Eloquent\Builder|Book newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Book newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Book query()
 * @method static \Illuminate\Database\Eloquent\Builder|Book whereAgeLimitId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Book whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Book whereFullDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Book whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Book whereImagePath($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Book whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Book whereReleaseDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Book whereShortDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Book whereSubscriptionTypeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Book whereTextPath($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Book whereUpdatedAt($value)
 */
	class Book extends \Eloquent {}
}

namespace App\Models{
/**
 *
 *
 * @property int $id
 * @property string $name
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Book> $subscription_types
 * @property-read int|null $subscription_types_count
 * @method static \Database\Factories\FeatureFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Feature filter(\App\Http\Filters\FilterInterface $filter)
 * @method static \Illuminate\Database\Eloquent\Builder|Feature newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Feature newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Feature query()
 * @method static \Illuminate\Database\Eloquent\Builder|Feature whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Feature whereName($value)
 */
	class Feature extends \Eloquent {}
}

namespace App\Models{
/**
 *
 *
 * @property int $id
 * @property string $name
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Book> $books
 * @property-read int|null $books_count
 * @method static \Database\Factories\GenreFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Genre filter(\App\Http\Filters\FilterInterface $filter)
 * @method static \Illuminate\Database\Eloquent\Builder|Genre newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Genre newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Genre query()
 * @method static \Illuminate\Database\Eloquent\Builder|Genre whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Genre whereName($value)
 */
	class Genre extends \Eloquent {}
}

namespace App\Models{
/**
 *
 *
 * @property int $id
 * @property string $name
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Book> $books
 * @property-read int|null $books_count
 * @method static \Database\Factories\PublisherFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Publisher filter(\App\Http\Filters\FilterInterface $filter)
 * @method static \Illuminate\Database\Eloquent\Builder|Publisher newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Publisher newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Publisher query()
 * @method static \Illuminate\Database\Eloquent\Builder|Publisher whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Publisher whereName($value)
 */
	class Publisher extends \Eloquent {}
}

namespace App\Models{
/**
 *
 *
 * @method static \Illuminate\Database\Eloquent\Builder|ResetPasswordRequest newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ResetPasswordRequest newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ResetPasswordRequest query()
 */
	class ResetPasswordRequest extends \Eloquent {}
}

namespace App\Models{
/**
 *
 *
 * @property int $id
 * @property int $subscription_type_id
 * @property \Illuminate\Support\Carbon|null $start_date
 * @property \Illuminate\Support\Carbon|null $end_date
 * @property int|null $price
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\SubscriptionType $subscription_type
 * @property-read \App\Models\User|null $user
 * @method static \Database\Factories\SubscriptionFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Subscription newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Subscription newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Subscription query()
 * @method static \Illuminate\Database\Eloquent\Builder|Subscription whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Subscription whereEndDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Subscription whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Subscription wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Subscription whereStartDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Subscription whereSubscriptionTypeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Subscription whereUpdatedAt($value)
 */
	class Subscription extends \Eloquent {}
}

namespace App\Models{
/**
 *
 *
 * @property int $id
 * @property string $name
 * @property int $price
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Book> $books
 * @property-read int|null $books_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Feature> $features
 * @property-read int|null $features_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Subscription> $subscriptions
 * @property-read int|null $subscriptions_count
 * @method static \Database\Factories\SubscriptionTypeFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|SubscriptionType filter(\App\Http\Filters\FilterInterface $filter)
 * @method static \Illuminate\Database\Eloquent\Builder|SubscriptionType newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SubscriptionType newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SubscriptionType query()
 * @method static \Illuminate\Database\Eloquent\Builder|SubscriptionType whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SubscriptionType whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SubscriptionType wherePrice($value)
 */
	class SubscriptionType extends \Eloquent {}
}

namespace App\Models{
/**
 *
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property int $is_admin
 * @property int $subscription_id
 * @property int|null $active_book_id
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property mixed $password
 * @property \Illuminate\Support\Carbon|null $password_changed_at
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Book> $books
 * @property-read int|null $books_count
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection<int, \Illuminate\Notifications\DatabaseNotification> $notifications
 * @property-read int|null $notifications_count
 * @property-read \App\Models\Subscription $subscription
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Laravel\Sanctum\PersonalAccessToken> $tokens
 * @property-read int|null $tokens_count
 * @method static \Database\Factories\UserFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|User filter(\App\Http\Filters\FilterInterface $filter)
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @method static \Illuminate\Database\Eloquent\Builder|User whereActiveBookId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereIsAdmin($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePasswordChangedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereSubscriptionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedAt($value)
 */
	class User extends \Eloquent {}
}

