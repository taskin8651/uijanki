@extends('layouts.admin')

@section('page-title', 'Dashboard')

@section('styles')
<style>
    .dashboard-page {
        display: grid;
        gap: 22px;
    }

    .dashboard-hero {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 18px;
        padding: 24px;
        background: linear-gradient(135deg, #0f766e 0%, #2563eb 100%);
        border-radius: 8px;
        color: #fff;
    }

    .dashboard-hero h1 {
        margin: 0 0 6px;
        font-size: 26px;
        font-weight: 800;
        letter-spacing: 0;
    }

    .dashboard-hero p {
        margin: 0;
        max-width: 680px;
        color: rgba(255, 255, 255, .82);
        font-size: 14px;
    }

    .dashboard-hero-actions {
        display: flex;
        flex-wrap: wrap;
        gap: 10px;
        justify-content: flex-end;
    }

    .dash-btn {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 8px;
        min-height: 40px;
        padding: 10px 14px;
        border-radius: 7px;
        border: 1px solid rgba(255, 255, 255, .24);
        background: rgba(255, 255, 255, .14);
        color: #fff;
        font-weight: 700;
        font-size: 13px;
        text-decoration: none;
        white-space: nowrap;
    }

    .dash-btn:hover {
        color: #fff;
        background: rgba(255, 255, 255, .22);
    }

    .dashboard-grid {
        display: grid;
        grid-template-columns: repeat(4, minmax(0, 1fr));
        gap: 16px;
    }

    .dashboard-two-col {
        display: grid;
        grid-template-columns: minmax(0, 1.05fr) minmax(0, .95fr);
        gap: 18px;
    }

    .dashboard-card {
        background: #fff;
        border: 1px solid #e5e7eb;
        border-radius: 8px;
        box-shadow: 0 10px 28px rgba(15, 23, 42, .05);
    }

    .dashboard-card.pad {
        padding: 18px;
    }

    .dashboard-stat {
        padding: 18px;
        display: flex;
        align-items: flex-start;
        gap: 14px;
    }

    .stat-icon {
        width: 46px;
        height: 46px;
        border-radius: 8px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        color: #fff;
        flex: 0 0 auto;
        font-size: 18px;
    }

    .stat-icon.blue { background: #2563eb; }
    .stat-icon.green { background: #059669; }
    .stat-icon.orange { background: #ea580c; }
    .stat-icon.cyan { background: #0891b2; }
    .stat-icon.purple { background: #7c3aed; }
    .stat-icon.rose { background: #e11d48; }
    .stat-icon.slate { background: #475569; }
    .stat-icon.teal { background: #0f766e; }

    .stat-label {
        color: #64748b;
        font-size: 12px;
        font-weight: 800;
        letter-spacing: .04em;
        text-transform: uppercase;
    }

    .stat-value {
        margin-top: 4px;
        color: #0f172a;
        font-size: 26px;
        line-height: 1.1;
        font-weight: 800;
    }

    .stat-meta {
        margin-top: 7px;
        color: #64748b;
        font-size: 13px;
    }

    .section-head {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 12px;
        margin-bottom: 14px;
    }

    .section-head h2 {
        margin: 0;
        color: #0f172a;
        font-size: 17px;
        font-weight: 800;
        letter-spacing: 0;
    }

    .section-link {
        color: #2563eb;
        font-size: 13px;
        font-weight: 800;
        text-decoration: none;
    }

    .enquiry-grid {
        display: grid;
        grid-template-columns: repeat(3, minmax(0, 1fr));
        gap: 12px;
    }

    .enquiry-card {
        display: flex;
        align-items: center;
        gap: 12px;
        min-height: 94px;
        padding: 15px;
        border: 1px solid #e5e7eb;
        border-radius: 8px;
        text-decoration: none;
        transition: transform .18s ease, box-shadow .18s ease;
    }

    .enquiry-card:hover {
        transform: translateY(-2px);
        box-shadow: 0 12px 24px rgba(15, 23, 42, .08);
    }

    .enquiry-card strong {
        display: block;
        color: #0f172a;
        font-size: 14px;
        line-height: 1.25;
    }

    .enquiry-card span {
        display: block;
        margin-top: 4px;
        color: #64748b;
        font-size: 12px;
    }

    .mini-count {
        margin-left: auto;
        text-align: right;
    }

    .mini-count b {
        display: block;
        color: #0f172a;
        font-size: 22px;
        line-height: 1;
    }

    .mini-count small {
        display: block;
        margin-top: 6px;
        color: #dc2626;
        font-size: 12px;
        font-weight: 800;
    }

    .dashboard-list {
        display: grid;
        gap: 10px;
    }

    .list-item {
        display: flex;
        align-items: center;
        gap: 12px;
        padding: 12px;
        border: 1px solid #e5e7eb;
        border-radius: 8px;
        color: inherit;
        text-decoration: none;
    }

    .list-item:hover {
        background: #f8fafc;
    }

    .list-main {
        min-width: 0;
        flex: 1;
    }

    .list-title {
        margin: 0;
        color: #0f172a;
        font-size: 14px;
        font-weight: 800;
        overflow: hidden;
        text-overflow: ellipsis;
        white-space: nowrap;
    }

    .list-sub {
        margin: 4px 0 0;
        color: #64748b;
        font-size: 12px;
    }

    .status-pill {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        padding: 5px 9px;
        border-radius: 999px;
        font-size: 12px;
        font-weight: 800;
        white-space: nowrap;
    }

    .status-pill.active {
        background: #dcfce7;
        color: #166534;
    }

    .status-pill.muted {
        background: #f1f5f9;
        color: #475569;
    }

    .status-pill.unread {
        background: #fee2e2;
        color: #991b1b;
    }

    .progress-wrap {
        margin-top: 9px;
        height: 8px;
        overflow: hidden;
        border-radius: 999px;
        background: #e2e8f0;
    }

    .progress-bar {
        height: 100%;
        border-radius: inherit;
        background: linear-gradient(90deg, #0f766e, #2563eb);
    }

    .empty-state {
        padding: 20px;
        border: 1px dashed #cbd5e1;
        border-radius: 8px;
        color: #64748b;
        font-size: 14px;
        text-align: center;
    }

    @media (max-width: 1199px) {
        .dashboard-grid,
        .enquiry-grid {
            grid-template-columns: repeat(2, minmax(0, 1fr));
        }

        .dashboard-two-col {
            grid-template-columns: 1fr;
        }
    }

    @media (max-width: 767px) {
        .dashboard-hero {
            align-items: stretch;
            flex-direction: column;
            padding: 18px;
        }

        .dashboard-hero-actions {
            justify-content: stretch;
        }

        .dash-btn {
            flex: 1 1 auto;
        }

        .dashboard-grid,
        .enquiry-grid {
            grid-template-columns: 1fr;
        }
    }
</style>
@endsection

@section('content')
<div class="dashboard-page">
    <section class="dashboard-hero">
        <div>
            <h1>Admin Dashboard</h1>
            <p>Enquiries, events and campaigns ka live overview yahan se manage hoga.</p>
        </div>
        <div class="dashboard-hero-actions">
            <a class="dash-btn" href="{{ route('admin.events.create') }}">
                <i class="fas fa-calendar-plus"></i>
                Add Event
            </a>
            <a class="dash-btn" href="{{ route('admin.campaigns.create') }}">
                <i class="fas fa-bullhorn"></i>
                Add Campaign
            </a>
            <a class="dash-btn" href="{{ route('admin.contact-enquiries.index') }}">
                <i class="fas fa-inbox"></i>
                Enquiries
            </a>
        </div>
    </section>

    <section class="dashboard-grid">
        <div class="dashboard-card dashboard-stat">
            <div class="stat-icon blue"><i class="fas fa-inbox"></i></div>
            <div>
                <div class="stat-label">Total Enquiries</div>
                <div class="stat-value">{{ number_format($totalEnquiries) }}</div>
                <div class="stat-meta">{{ number_format($todayEnquiries) }} today</div>
            </div>
        </div>

        <div class="dashboard-card dashboard-stat">
            <div class="stat-icon rose"><i class="fas fa-envelope"></i></div>
            <div>
                <div class="stat-label">Unread Enquiries</div>
                <div class="stat-value">{{ number_format($unreadEnquiries) }}</div>
                <div class="stat-meta">Need follow up</div>
            </div>
        </div>

        <div class="dashboard-card dashboard-stat">
            <div class="stat-icon green"><i class="fas fa-calendar-check"></i></div>
            <div>
                <div class="stat-label">Events</div>
                <div class="stat-value">{{ number_format($eventStats['total']) }}</div>
                <div class="stat-meta">{{ number_format($eventStats['active']) }} active, {{ number_format($eventStats['featured']) }} featured</div>
            </div>
        </div>

        <div class="dashboard-card dashboard-stat">
            <div class="stat-icon orange"><i class="fas fa-bullhorn"></i></div>
            <div>
                <div class="stat-label">Campaigns</div>
                <div class="stat-value">{{ number_format($campaignStats['total']) }}</div>
                <div class="stat-meta">{{ number_format($campaignStats['supporters']) }} supporters</div>
            </div>
        </div>

        <div class="dashboard-card dashboard-stat">
            <div class="stat-icon teal"><i class="fas fa-indian-rupee-sign"></i></div>
            <div>
                <div class="stat-label">Campaign Raised</div>
                <div class="stat-value">Rs {{ number_format($campaignStats['raised']) }}</div>
                <div class="stat-meta">{{ $campaignStats['progress'] }}% of Rs {{ number_format($campaignStats['goal']) }}</div>
            </div>
        </div>

        <div class="dashboard-card dashboard-stat">
            <div class="stat-icon cyan"><i class="fas fa-hourglass-half"></i></div>
            <div>
                <div class="stat-label">Upcoming Events</div>
                <div class="stat-value">{{ number_format($eventStats['upcoming']) }}</div>
                <div class="stat-meta">{{ number_format($eventStats['ongoing']) }} ongoing</div>
            </div>
        </div>

        <div class="dashboard-card dashboard-stat">
            <div class="stat-icon purple"><i class="fas fa-star"></i></div>
            <div>
                <div class="stat-label">Featured Campaigns</div>
                <div class="stat-value">{{ number_format($campaignStats['featured']) }}</div>
                <div class="stat-meta">{{ number_format($campaignStats['active']) }} active campaigns</div>
            </div>
        </div>

        <div class="dashboard-card dashboard-stat">
            <div class="stat-icon slate"><i class="fas fa-circle-check"></i></div>
            <div>
                <div class="stat-label">Completed Events</div>
                <div class="stat-value">{{ number_format($eventStats['completed']) }}</div>
                <div class="stat-meta">Completed programs</div>
            </div>
        </div>
    </section>

    <section class="dashboard-card pad">
        <div class="section-head">
            <h2>Enquiry Overview</h2>
            <a class="section-link" href="{{ route('admin.contact-enquiries.index') }}">Open enquiries</a>
        </div>

        <div class="enquiry-grid">
            @foreach($enquiryCards as $card)
                <a class="enquiry-card" href="{{ route($card['route']) }}">
                    <div class="stat-icon {{ $card['color'] }}"><i class="fas {{ $card['icon'] }}"></i></div>
                    <div>
                        <strong>{{ $card['title'] }}</strong>
                        <span>{{ number_format($card['today']) }} received today</span>
                    </div>
                    <div class="mini-count">
                        <b>{{ number_format($card['count']) }}</b>
                        <small>{{ number_format($card['unread']) }} unread</small>
                    </div>
                </a>
            @endforeach
        </div>
    </section>

    <section class="dashboard-two-col">
        <div class="dashboard-card pad">
            <div class="section-head">
                <h2>Recent Enquiries</h2>
                <a class="section-link" href="{{ route('admin.registration-enquiries.index') }}">Registration list</a>
            </div>

            <div class="dashboard-list">
                @forelse($recentEnquiries as $enquiry)
                    <a class="list-item" href="{{ route($enquiry['show_route'], $enquiry['id']) }}">
                        <div class="stat-icon {{ $enquiry['is_read'] ? 'slate' : 'rose' }}">
                            <i class="fas {{ $enquiry['is_read'] ? 'fa-envelope-open' : 'fa-envelope' }}"></i>
                        </div>
                        <div class="list-main">
                            <p class="list-title">{{ $enquiry['name'] }}</p>
                            <p class="list-sub">{{ $enquiry['title'] }} - {{ $enquiry['subject'] }} - {{ optional($enquiry['created_at'])->diffForHumans() }}</p>
                        </div>
                        <span class="status-pill {{ $enquiry['is_read'] ? 'muted' : 'unread' }}">
                            {{ $enquiry['is_read'] ? 'Read' : 'Unread' }}
                        </span>
                    </a>
                @empty
                    <div class="empty-state">Abhi koi enquiry nahi hai.</div>
                @endforelse
            </div>
        </div>

        <div class="dashboard-card pad">
            <div class="section-head">
                <h2>Recent Events</h2>
                <a class="section-link" href="{{ route('admin.events.index') }}">View all</a>
            </div>

            <div class="dashboard-list">
                @forelse($recentEvents as $event)
                    <a class="list-item" href="{{ route('admin.events.edit', $event->id) }}">
                        <div class="stat-icon green"><i class="fas fa-calendar-day"></i></div>
                        <div class="list-main">
                            <p class="list-title">{{ $event->title }}</p>
                            <p class="list-sub">{{ $event->location ?: 'Location not added' }} - {{ optional($event->start_date)->format('d M Y') ?: 'Date pending' }}</p>
                        </div>
                        <span class="status-pill {{ $event->status ? 'active' : 'muted' }}">
                            {{ $event->status ? 'Active' : 'Inactive' }}
                        </span>
                    </a>
                @empty
                    <div class="empty-state">Abhi koi event add nahi hai.</div>
                @endforelse
            </div>
        </div>
    </section>

    <section class="dashboard-two-col">
        <div class="dashboard-card pad">
            <div class="section-head">
                <h2>Campaign Progress</h2>
                <a class="section-link" href="{{ route('admin.campaigns.index') }}">View all</a>
            </div>

            <div class="dashboard-list">
                @forelse($recentCampaigns as $campaign)
                    <a class="list-item" href="{{ route('admin.campaigns.edit', $campaign->id) }}">
                        <div class="stat-icon orange"><i class="fas fa-bullhorn"></i></div>
                        <div class="list-main">
                            <p class="list-title">{{ $campaign->title }}</p>
                            <p class="list-sub">Rs {{ number_format((float) $campaign->raised_amount) }} raised of Rs {{ number_format((float) $campaign->goal_amount) }}</p>
                            <div class="progress-wrap">
                                <div class="progress-bar" style="width: {{ $campaign->progress_percentage }}%;"></div>
                            </div>
                        </div>
                        <span class="status-pill {{ $campaign->status ? 'active' : 'muted' }}">
                            {{ $campaign->progress_percentage }}%
                        </span>
                    </a>
                @empty
                    <div class="empty-state">Abhi koi campaign add nahi hai.</div>
                @endforelse
            </div>
        </div>

        <div class="dashboard-card pad">
            <div class="section-head">
                <h2>Quick Actions</h2>
            </div>

            <div class="dashboard-list">
                <a class="list-item" href="{{ route('admin.events.index') }}">
                    <div class="stat-icon green"><i class="fas fa-calendar-check"></i></div>
                    <div class="list-main">
                        <p class="list-title">Manage Events</p>
                        <p class="list-sub">Upcoming, ongoing and completed event content.</p>
                    </div>
                </a>
                <a class="list-item" href="{{ route('admin.event-galleries.index') }}">
                    <div class="stat-icon cyan"><i class="fas fa-images"></i></div>
                    <div class="list-main">
                        <p class="list-title">Event Gallery</p>
                        <p class="list-sub">Gallery cards and lightbox images.</p>
                    </div>
                </a>
                <a class="list-item" href="{{ route('admin.campaigns.index') }}">
                    <div class="stat-icon orange"><i class="fas fa-hand-holding-heart"></i></div>
                    <div class="list-main">
                        <p class="list-title">Manage Campaigns</p>
                        <p class="list-sub">Donation campaigns and progress amounts.</p>
                    </div>
                </a>
                <a class="list-item" href="{{ route('admin.csr-partners.index') }}">
                    <div class="stat-icon blue"><i class="fas fa-handshake"></i></div>
                    <div class="list-main">
                        <p class="list-title">CSR Partners</p>
                        <p class="list-sub">Partner logos and CSR records.</p>
                    </div>
                </a>
                <a class="list-item" href="{{ route('admin.website-settings.index') }}">
                    <div class="stat-icon slate"><i class="fas fa-gear"></i></div>
                    <div class="list-main">
                        <p class="list-title">Website Setting</p>
                        <p class="list-sub">Header, footer, contact number and WhatsApp.</p>
                    </div>
                </a>
            </div>
        </div>
    </section>
</div>
@endsection
