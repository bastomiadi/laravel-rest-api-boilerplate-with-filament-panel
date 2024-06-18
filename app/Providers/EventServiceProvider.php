<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\Classes;
use App\Models\Product;
use App\Models\Review;
use App\Models\Section;
use App\Models\Student;
use App\Observers\CategoryObserver;
use App\Observers\ClassesObserver;
use App\Observers\ProductObserver;
use App\Observers\ReviewObserver;
use App\Observers\SectionObserver;
use App\Observers\StudentObserver;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event to listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
    ];

    /**
     * Register any events for your application.
     */
    public function boot(): void
    {
        Classes::observe(ClassesObserver::class);
        Section::observe(SectionObserver::class);
        Student::observe(StudentObserver::class);
        Category::observe(CategoryObserver::class);
        Product::observe(ProductObserver::class);
        Review::observe(ReviewObserver::class);
    }

    /**
     * Determine if events and listeners should be automatically discovered.
     */
    public function shouldDiscoverEvents(): bool
    {
        return false;
    }

    /**
     * The model observers for your application.
     *
     * @var array
     */
    protected $observers = [
        // Classes::class => [ClassesObserver::class],
    ];
}
