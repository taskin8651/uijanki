@extends('layouts.admin')

@section('page-title', 'Website Settings')

@section('content')

<div class="admin-page-head">
    <div>
        <h2 class="admin-page-title">Website Settings</h2>
        <p class="admin-page-subtitle">Manage header, footer, contact details, social links and contact page text</p>
    </div>
</div>

@if(session('message'))
    <div class="alert alert-success">{{ session('message') }}</div>
@endif

@if($errors->any())
    <div class="alert alert-danger">
        <strong>Please fix the following errors:</strong>
        <ul class="mb-0 mt-2">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form method="POST" action="{{ route('admin.website-settings.update') }}" enctype="multipart/form-data">
    @csrf

    <div class="admin-form-grid">

        <div class="form-card">
            <div class="form-card-header">
                <div class="form-card-icon"><i class="fas fa-globe"></i></div>
                <div>
                    <p class="form-card-title">Site Identity</p>
                    <p class="form-card-subtitle">Logo, favicon and SEO basics</p>
                </div>
            </div>

            <div class="form-card-body">
                <div class="field-group">
                    <label class="field-label" for="site_name">Site Name</label>
                    <input type="text" name="site_name" id="site_name" value="{{ old('site_name', $websiteSetting->site_name) }}" class="field-input">
                </div>

                <div class="field-group">
                    <label class="field-label" for="site_tagline">Site Tagline</label>
                    <input type="text" name="site_tagline" id="site_tagline" value="{{ old('site_tagline', $websiteSetting->site_tagline) }}" class="field-input">
                </div>

                <div class="field-group">
                    <label class="field-label" for="meta_title">Meta Title</label>
                    <input type="text" name="meta_title" id="meta_title" value="{{ old('meta_title', $websiteSetting->meta_title) }}" class="field-input">
                </div>

                <div class="field-group">
                    <label class="field-label" for="meta_description">Meta Description</label>
                    <textarea name="meta_description" id="meta_description" rows="3" class="field-input">{{ old('meta_description', $websiteSetting->meta_description) }}</textarea>
                </div>

                <div class="field-group">
                    <label class="field-label" for="meta_keywords">Meta Keywords</label>
                    <textarea name="meta_keywords" id="meta_keywords" rows="3" class="field-input">{{ old('meta_keywords', $websiteSetting->meta_keywords) }}</textarea>
                </div>

                <div class="field-group">
                    <label class="field-label" for="logo">Logo</label>
                    <input type="file" name="logo" id="logo" accept="image/*" class="field-input">
                    <div class="mt-3">
                        <img src="{{ $websiteSetting->logo }}" alt="Logo" style="max-height:60px; max-width:180px;">
                    </div>
                </div>

                <div class="field-group">
                    <label class="field-label" for="favicon">Favicon</label>
                    <input type="file" name="favicon" id="favicon" accept="image/*,.ico" class="field-input">
                    <div class="mt-3">
                        <img src="{{ $websiteSetting->favicon }}" alt="Favicon" style="width:36px; height:36px; object-fit:contain;">
                    </div>
                </div>
            </div>
        </div>

        <div class="form-card">
            <div class="form-card-header">
                <div class="form-card-icon"><i class="fas fa-address-book"></i></div>
                <div>
                    <p class="form-card-title">Contact Details</p>
                    <p class="form-card-subtitle">Used in topbar, footer, floating buttons and contact page</p>
                </div>
            </div>

            <div class="form-card-body">
                <div class="field-group">
                    <label class="field-label" for="phone_number">Phone Number</label>
                    <input type="text" name="phone_number" id="phone_number" value="{{ old('phone_number', $websiteSetting->phone_number) }}" class="field-input">
                </div>

                <div class="field-group">
                    <label class="field-label" for="phone_display">Phone Display Text</label>
                    <input type="text" name="phone_display" id="phone_display" value="{{ old('phone_display', $websiteSetting->phone_display) }}" class="field-input">
                </div>

                <div class="field-group">
                    <label class="field-label" for="whatsapp_number">WhatsApp Number With Country Code</label>
                    <input type="text" name="whatsapp_number" id="whatsapp_number" value="{{ old('whatsapp_number', $websiteSetting->whatsapp_number) }}" class="field-input">
                </div>

                <div class="field-group">
                    <label class="field-label" for="email">Email</label>
                    <input type="email" name="email" id="email" value="{{ old('email', $websiteSetting->email) }}" class="field-input">
                </div>

                <div class="field-group">
                    <label class="field-label" for="short_address">Short Address</label>
                    <input type="text" name="short_address" id="short_address" value="{{ old('short_address', $websiteSetting->short_address) }}" class="field-input">
                </div>

                <div class="field-group">
                    <label class="field-label" for="full_address">Full Address</label>
                    <textarea name="full_address" id="full_address" rows="4" class="field-input">{{ old('full_address', $websiteSetting->full_address) }}</textarea>
                </div>

                <div class="field-group">
                    <label class="field-label" for="map_query">Map Search Query</label>
                    <textarea name="map_query" id="map_query" rows="2" class="field-input">{{ old('map_query', $websiteSetting->map_query) }}</textarea>
                </div>

                <div class="field-group">
                    <label class="field-label" for="map_embed_url">Google Map Embed URL</label>
                    <textarea name="map_embed_url" id="map_embed_url" rows="3" class="field-input">{{ old('map_embed_url', $websiteSetting->map_embed_url) }}</textarea>
                </div>
            </div>
        </div>
    </div>

    <div class="admin-form-grid mt-4">
        <div class="form-card">
            <div class="form-card-header">
                <div class="form-card-icon"><i class="fas fa-share-alt"></i></div>
                <div>
                    <p class="form-card-title">Social & CTA Links</p>
                    <p class="form-card-subtitle">Header buttons, social icons and floating actions</p>
                </div>
            </div>

            <div class="form-card-body">
                <div class="field-group">
                    <label class="field-label" for="facebook_url">Facebook URL</label>
                    <input type="text" name="facebook_url" id="facebook_url" value="{{ old('facebook_url', $websiteSetting->facebook_url) }}" class="field-input">
                </div>

                <div class="field-group">
                    <label class="field-label" for="instagram_url">Instagram URL</label>
                    <input type="text" name="instagram_url" id="instagram_url" value="{{ old('instagram_url', $websiteSetting->instagram_url) }}" class="field-input">
                </div>

                <div class="field-group">
                    <label class="field-label" for="youtube_url">YouTube URL</label>
                    <input type="text" name="youtube_url" id="youtube_url" value="{{ old('youtube_url', $websiteSetting->youtube_url) }}" class="field-input">
                </div>

                <div class="field-group">
                    <label class="field-label" for="linkedin_url">LinkedIn URL</label>
                    <input type="text" name="linkedin_url" id="linkedin_url" value="{{ old('linkedin_url', $websiteSetting->linkedin_url) }}" class="field-input">
                </div>

                <div class="field-group">
                    <label class="field-label" for="volunteer_url">Volunteer Button URL</label>
                    <input type="text" name="volunteer_url" id="volunteer_url" value="{{ old('volunteer_url', $websiteSetting->volunteer_url) }}" class="field-input">
                </div>

                <div class="field-group">
                    <label class="field-label" for="donate_url">Donate Button URL</label>
                    <input type="text" name="donate_url" id="donate_url" value="{{ old('donate_url', $websiteSetting->donate_url) }}" class="field-input">
                </div>

                <div class="field-group">
                    <label class="field-label" for="contact_url">Contact URL</label>
                    <input type="text" name="contact_url" id="contact_url" value="{{ old('contact_url', $websiteSetting->contact_url) }}" class="field-input">
                </div>
            </div>
        </div>

        <div class="form-card">
            <div class="form-card-header">
                <div class="form-card-icon"><i class="fas fa-shoe-prints"></i></div>
                <div>
                    <p class="form-card-title">Footer Text</p>
                    <p class="form-card-subtitle">Footer description and copyright</p>
                </div>
            </div>

            <div class="form-card-body">
                <div class="field-group">
                    <label class="field-label" for="footer_description">Footer Description</label>
                    <textarea name="footer_description" id="footer_description" rows="5" class="field-input">{{ old('footer_description', $websiteSetting->footer_description) }}</textarea>
                </div>

                <div class="field-group">
                    <label class="field-label" for="copyright_text">Copyright Text</label>
                    <input type="text" name="copyright_text" id="copyright_text" value="{{ old('copyright_text', $websiteSetting->copyright_text) }}" class="field-input">
                </div>

                <div class="field-group">
                    <label class="field-label" for="footer_credit">Footer Credit</label>
                    <input type="text" name="footer_credit" id="footer_credit" value="{{ old('footer_credit', $websiteSetting->footer_credit) }}" class="field-input">
                </div>

                <label class="role-checkbox-item {{ old('status', $websiteSetting->status) ? 'checked' : '' }}">
                    <input type="checkbox" name="status" value="1" {{ old('status', $websiteSetting->status) ? 'checked' : '' }}>
                    <span class="checkbox-custom"></span>
                    <span class="checkbox-text">Use these settings on frontend</span>
                </label>
            </div>
        </div>
    </div>

    <div class="form-actions mt-4">
        <button type="submit" class="btn-primary">
            <i class="fas fa-save"></i>
            Save Settings
        </button>

        <a href="{{ route('admin.home') }}" class="btn-ghost">
            Cancel
        </a>
    </div>
</form>

@endsection
