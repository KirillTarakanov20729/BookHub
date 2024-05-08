<?php

namespace App\Traits\Test;

use App\Models\AgeLimit;
use App\Models\Author;
use App\Models\Book;
use App\Models\Genre;
use App\Models\Publisher;
use App\Models\Subscription;
use App\Models\SubscriptionType;
use App\Models\User;
use Illuminate\Support\Facades\Storage;

trait CreateData
{
    private User $user;
    private User $secondUser;
    private User $adminUser;
    private Book $book;
    private Author $author;
    private Genre $genre;
    private Publisher $publisher;

    private AgeLimit $ageLimit;


    public function createData(): void
    {
        $this->createUsualUser();
        $this->createSecondUsualUser();
        $this->createAdminUser();
        $this->createAuthor();
        $this->createGenre();
        $this->createPublisher();
        $this->createAgeLimit();
        $this->createBook();
    }


    public function createUsualUser(): void
    {
        $this->user = $this->createUser('test', 'a@a.com', 'password', 0);
    }

    public function createSecondUsualUser(): void
    {
        $this->secondUser = $this->createUser('test2', 'b@a.com', 'password', 0);
    }

    public function createAdminUser(): void
    {
        $this->adminUser = $this->createUser('admin', 'admin@a.com', 'password', 1);
    }

    public function getUsualUser(): User
    {
        return $this->user;
    }

    public function getSecondUsualUser(): User
    {
        return $this->secondUser;
    }

    public function getAdminUser(): User
    {
        return $this->adminUser;
    }


    public function createBook(): void
    {
        $this->book = Book::factory(1)->create(['subscription_type_id' => 1])->first();
        $this->book->authors()->sync([$this->author->id]);
        $this->book->genres()->sync([$this->genre->id]);
        $this->book->publishers()->sync([$this->publisher->id]);
    }

    public function getBook(): Book
    {
        return $this->book;
    }

    public function createAuthor(): void
    {
        $this->author = Author::factory(1)->create()->first();
    }

    public function getAuthor(): Author
    {
        return $this->author;
    }

    public function createGenre(): void
    {
        $this->genre = Genre::factory(1)->create()->first();
    }

    public function getGenre(): Genre
    {
        return $this->genre;
    }

    public function createPublisher(): void
    {
        $this->publisher = Publisher::factory(1)->create()->first();
    }

    public function getPublisher(): Publisher
    {
        return $this->publisher;
    }

    public function createAgeLimit(): void
    {
        $this->ageLimit = AgeLimit::factory(1)->create()->first();
    }

    public function getAgeLimit(): AgeLimit
    {
        return $this->ageLimit;
    }

    public function createUser(string $name, string $email, string $password, bool $isAdmin): User
    {
        $subscriptionType = SubscriptionType::factory(1)->create()->first();
        $subscription = Subscription::factory(1)->create(['subscription_type_id' => $subscriptionType->id])->first();

        return User::factory(1)->create([
            'subscription_id' => $subscription->id,
            'name' => $name,
            'email' => $email,
            'password' => $password,
            'is_admin' => $isAdmin])->first();
    }


}
