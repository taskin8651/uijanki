@extends('frontend.master')

@section('content')

@php
    $progress = $campaign->progress_percentage ?? 0;

    $statusText = $campaign->status_badge ?? 'Active';

    $donateUrl = $campaign->button_one_link
        ? url($campaign->button_one_link)
        : url('donate');

    $contactUrl = $campaign->button_two_link
        ? url($campaign->button_two_link)
        : url('contact');

    $categoryLower = strtolower($campaign->category ?? '');
    $categoryClass = '';

    if(str_contains($categoryLower, 'skill')) {
        $categoryClass = 'green';
    } elseif(str_contains($categoryLower, 'women')) {
        $categoryClass = 'sky';
    }
@endphp

<section class="campaign-detail-hero campaign-detail-page-hero">
    <div class="campaign-detail-shape campaign-detail-shape-1"></div>
    <div class="campaign-detail-shape campaign-detail-shape-2"></div>

    <div class="container">
        <div class="campaign-detail-hero-grid">

            <div class="campaign-detail-hero-content">
                <div class="campaign-detail-breadcrumb">
                    <a href="{{ url('/') }}">Home</a>
                    <i class="bi bi-chevron-right"></i>
                    <a href="{{ route('frontend.campaigns.index') }}">Campaigns</a>
                    <i class="bi bi-chevron-right"></i>
                    <span>{{ $campaign->title }}</span>
                </div>

                <div class="campaign-detail-tags">
                    @if($campaign->category)
                        <span class="campaign-detail-tag {{ $categoryClass }}">
                            <i class="bi bi-tag-fill"></i>
                            {{ $campaign->category }}
                        </span>
                    @endif

                    <span class="campaign-detail-tag live">
                        <i class="bi bi-broadcast-pin"></i>
                        {{ $statusText }}
                    </span>
                </div>

                <h1>{{ $campaign->title }}</h1>

                <div class="campaign-detail-short">
                    {!! $campaign->short_description !!}
                </div>

                <div class="campaign-detail-meta-list">
                    @if($campaign->location)
                        <div class="campaign-detail-meta-item">
                            <i class="bi bi-geo-alt-fill"></i>
                            <div>
                                <span>Location</span>
                                <strong>{{ $campaign->location }}</strong>
                            </div>
                        </div>
                    @endif

                    @if($campaign->days_left)
                        <div class="campaign-detail-meta-item">
                            <i class="bi bi-calendar2-week-fill"></i>
                            <div>
                                <span>Campaign Status</span>
                                <strong>{{ $campaign->days_left }}</strong>
                            </div>
                        </div>
                    @endif

                    <div class="campaign-detail-meta-item">
                        <i class="bi bi-people-fill"></i>
                        <div>
                            <span>Supporters</span>
                            <strong>{{ $campaign->supporters ?? 0 }} People</strong>
                        </div>
                    </div>
                </div>

                <div class="campaign-detail-hero-actions">
                    <a href="{{ $donateUrl }}" class="campaign-detail-btn-main">
                        {{ $campaign->button_one_text ?? 'Donate Now' }}
                        <i class="bi bi-arrow-right"></i>
                    </a>

                    <a href="{{ $contactUrl }}" class="campaign-detail-btn-soft">
                        {{ $campaign->button_two_text ?? 'Contact Us' }}
                    </a>
                </div>
            </div>

            <div class="campaign-detail-hero-image">
                <img src="{{ $campaign->campaign_image }}" alt="{{ $campaign->title }}">

                <div class="campaign-detail-floating-card">
                    <span>Raised</span>
                    <strong>₹{{ number_format($campaign->raised_amount, 0) }}</strong>
                    <p>of ₹{{ number_format($campaign->goal_amount, 0) }} goal</p>
                </div>
            </div>

        </div>
    </div>
</section>

<section class="campaign-detail-main-section">
    <div class="container">

        <div class="campaign-detail-layout">

            <div class="campaign-detail-content-card">

                <div class="campaign-detail-section-head">
                    <span>Campaign Details</span>
                    <h2>About this campaign</h2>
                </div>

                <div class="campaign-detail-description">
                    {!! $campaign->full_description ?: $campaign->short_description !!}
                </div>

                <div class="campaign-detail-info-grid">

                    @if($campaign->start_date)
                        <div class="campaign-detail-info-box">
                            <i class="bi bi-calendar-check-fill"></i>
                            <div>
                                <span>Start Date</span>
                                <strong>{{ $campaign->start_date->format('d M Y') }}</strong>
                            </div>
                        </div>
                    @endif

                    @if($campaign->end_date)
                        <div class="campaign-detail-info-box">
                            <i class="bi bi-calendar-x-fill"></i>
                            <div>
                                <span>End Date</span>
                                <strong>{{ $campaign->end_date->format('d M Y') }}</strong>
                            </div>
                        </div>
                    @endif

                    @if($campaign->category)
                        <div class="campaign-detail-info-box">
                            <i class="bi bi-grid-1x2-fill"></i>
                            <div>
                                <span>Category</span>
                                <strong>{{ $campaign->category }}</strong>
                            </div>
                        </div>
                    @endif

                    @if($campaign->location)
                        <div class="campaign-detail-info-box">
                            <i class="bi bi-map-fill"></i>
                            <div>
                                <span>Area</span>
                                <strong>{{ $campaign->location }}</strong>
                            </div>
                        </div>
                    @endif

                </div>

            </div>

            <aside class="campaign-detail-sidebar">

                <div class="campaign-donation-card">
                    <div class="donation-card-top">
                        <div>
                            <span>Donation Progress</span>
                            <h3>{{ $progress }}% Completed</h3>
                        </div>

                        <div class="donation-card-icon">
                            <i class="bi bi-heart-fill"></i>
                        </div>
                    </div>

                    <div class="donation-amount-row">
                        <div>
                            <span>Raised</span>
                            <strong>₹{{ number_format($campaign->raised_amount, 0) }}</strong>
                        </div>

                        <div>
                            <span>Goal</span>
                            <strong>₹{{ number_format($campaign->goal_amount, 0) }}</strong>
                        </div>
                    </div>

                    <div class="campaign-detail-progress-line">
                        <span style="width: {{ $progress }}%;"></span>
                    </div>

                    <div class="donation-support-row">
                        <span>
                            <i class="bi bi-people-fill"></i>
                            {{ $campaign->supporters ?? 0 }} Supporters
                        </span>

                        @if($campaign->days_left)
                            <span>
                                <i class="bi bi-clock-fill"></i>
                                {{ $campaign->days_left }}
                            </span>
                        @endif
                    </div>

                    <a href="{{ $donateUrl }}" class="donation-full-btn">
                        {{ $campaign->button_one_text ?? 'Donate Now' }}
                        <i class="bi bi-arrow-right"></i>
                    </a>
                </div>

                <div class="campaign-contact-card">
                    <h4>Want to support this campaign?</h4>
                    <p>Contact our team for donation, volunteering or partnership support.</p>

                    <a href="{{ $contactUrl }}">
                        {{ $campaign->button_two_text ?? 'Contact Us' }}
                        <i class="bi bi-arrow-right"></i>
                    </a>
                </div>

            </aside>

        </div>

    </div>
</section>

@if($relatedCampaigns->count())
<section class="related-campaign-section">
    <div class="container">

        <div class="related-campaign-head">
            <div>
                <span>More Campaigns</span>
                <h2>Related campaigns you can support</h2>
            </div>

            <a href="{{ route('frontend.campaigns.index') }}">
                View All Campaigns
                <i class="bi bi-arrow-right"></i>
            </a>
        </div>

        <div class="campaign-listing-grid related-campaign-grid">
            @foreach($relatedCampaigns as $related)
                @php
                    $relatedLower = strtolower($related->category ?? '');
                    $relatedClass = '';

                    if(str_contains($relatedLower, 'skill')) {
                        $relatedClass = 'green';
                    } elseif(str_contains($relatedLower, 'women')) {
                        $relatedClass = 'sky';
                    }
                @endphp

                <div class="campaign-card">
                    <div class="campaign-image">
                        <img src="{{ $related->campaign_image }}" alt="{{ $related->title }}">

                        <span class="campaign-status">
                            <i class="bi bi-broadcast-pin"></i>
                            {{ $related->status_badge ?? 'Active' }}
                        </span>

                        @if($related->category)
                            <span class="campaign-category {{ $relatedClass }}">
                                {{ $related->category }}
                            </span>
                        @endif
                    </div>

                    <div class="campaign-content">
                        <div class="campaign-meta">
                            @if($related->days_left)
                                <span>
                                    <i class="bi bi-calendar2-week"></i>
                                    {{ $related->days_left }}
                                </span>
                            @endif

                            @if($related->location)
                                <span>
                                    <i class="bi bi-geo-alt"></i>
                                    {{ $related->location }}
                                </span>
                            @endif
                        </div>

                        <h3>{{ $related->title }}</h3>

                        <p>
                            {{ \Illuminate\Support\Str::limit(strip_tags($related->short_description), 120) }}
                        </p>

                        <div class="campaign-progress-box">
                            <div class="campaign-progress-top">
                                <span>Raised ₹{{ number_format($related->raised_amount, 0) }}</span>
                                <strong>{{ $related->progress_percentage }}%</strong>
                            </div>

                            <div class="campaign-progress-line {{ $relatedClass }}">
                                <span style="width: {{ $related->progress_percentage }}%;"></span>
                            </div>

                            <div class="campaign-progress-bottom">
                                <span>Goal ₹{{ number_format($related->goal_amount, 0) }}</span>
                                <span>{{ $related->supporters ?? 0 }} Supporters</span>
                            </div>
                        </div>

                        <div class="campaign-actions">
                            <a href="{{ url($related->button_one_link ?? 'donate') }}" class="campaign-btn-main">
                                {{ $related->button_one_text ?? 'Donate Now' }}
                                <i class="bi bi-arrow-right"></i>
                            </a>

                            <a href="{{ route('frontend.campaigns.show', $related->id) }}" class="campaign-btn-soft">
                                Details
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

    </div>
</section>
@endif

@endsection
