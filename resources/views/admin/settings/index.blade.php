@extends('layouts.admin')

@section('content')
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card shadow-sm">
                <div class="card-header bg-white py-3">
                    <h5 class="mb-0 fw-bold">
                        <i class="fa-solid fa-gear me-2 text-secondary"></i>Website Settings
                    </h5>
                </div>
                <div class="card-body p-4">
                    <form action="{{ route('settings.update') }}" method="POST">
                        @csrf

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label class="form-label fw-bold small text-uppercase text-muted">Site Title</label>
                                <input type="text" name="site_title" value="{{ $settings['site_title'] ?? '' }}"
                                    class="form-control">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-bold small text-uppercase text-muted">Site Logo Text</label>
                                <input type="text" name="site_logo_text" value="{{ $settings['site_logo_text'] ?? '' }}"
                                    class="form-control">
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold small text-uppercase text-muted">Footer Text</label>
                            <input type="text" name="footer_text" value="{{ $settings['footer_text'] ?? '' }}"
                                class="form-control">
                        </div>

                        <h6 class="fw-bold text-muted mb-3 border-bottom pb-2">Social Media Links</h6>
                        <div class="row mb-3">
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-bold small text-uppercase text-muted">
                                    <i class="fa-brands fa-facebook text-primary me-1"></i>Facebook URL
                                </label>
                                <input type="url" name="facebook_url" value="{{ $settings['facebook_url'] ?? '' }}"
                                    class="form-control" placeholder="https://facebook.com/...">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-bold small text-uppercase text-muted">
                                    <i class="fa-brands fa-twitter text-info me-1"></i>Twitter URL
                                </label>
                                <input type="url" name="twitter_url" value="{{ $settings['twitter_url'] ?? '' }}"
                                    class="form-control" placeholder="https://twitter.com/...">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-bold small text-uppercase text-muted">
                                    <i class="fa-brands fa-youtube text-danger me-1"></i>YouTube URL
                                </label>
                                <input type="url" name="youtube_url" value="{{ $settings['youtube_url'] ?? '' }}"
                                    class="form-control" placeholder="https://youtube.com/...">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-bold small text-uppercase text-muted">
                                    <i class="fa-brands fa-instagram text-danger me-1"></i>Instagram URL
                                </label>
                                <input type="url" name="instagram_url" value="{{ $settings['instagram_url'] ?? '' }}"
                                    class="form-control" placeholder="https://instagram.com/...">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-bold small text-uppercase text-muted">
                                    <i class="fa-brands fa-linkedin text-primary me-1"></i>LinkedIn URL
                                </label>
                                <input type="url" name="linkedin_url" value="{{ $settings['linkedin_url'] ?? '' }}"
                                    class="form-control" placeholder="https://linkedin.com/...">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-bold small text-uppercase text-muted">
                                    <i class="fa-brands fa-pinterest text-danger me-1"></i>Pinterest URL
                                </label>
                                <input type="url" name="pinterest_url" value="{{ $settings['pinterest_url'] ?? '' }}"
                                    class="form-control" placeholder="https://pinterest.com/...">
                            </div>
                            <div class="col-md-12">
                                <label class="form-label fw-bold small text-uppercase text-muted">
                                    <i class="fa-solid fa-globe text-secondary me-1"></i>Main Website URL
                                </label>
                                <input type="url" name="website_url" value="{{ $settings['website_url'] ?? '' }}"
                                    class="form-control" placeholder="https://khadin.com">
                            </div>
                        </div>

                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary px-4">
                                <i class="fa-solid fa-save me-2"></i>Save Changes
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
