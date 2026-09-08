@extends('backend.layouts.app')

@section('title') {{ __($module_action) }} {{ __($module_title) }} @endsection

@section('breadcrumbs')
<x-backend.breadcrumbs>
    <x-backend.breadcrumb-item route='{{route("backend.$module_name.index")}}' icon='{{ $module_icon }}'>
        {{ __($module_title) }}
    </x-backend.breadcrumb-item>
    <x-backend.breadcrumb-item type="active">{{ __($module_action) }}</x-backend.breadcrumb-item>
</x-backend.breadcrumbs>
@endsection

@section('content')
    @php
        $attachmentUrl = $rfq?->attachment_path ? asset('storage/'.$rfq->attachment_path) : null;
        $attachmentExtension = $rfq?->attachment_path ? strtolower(pathinfo($rfq->attachment_path, PATHINFO_EXTENSION)) : null;
        $isImage = in_array($attachmentExtension, ['jpg', 'jpeg', 'png', 'gif', 'webp'], true);
        $isPdf = $attachmentExtension === 'pdf';
    @endphp

    <div class="container-fluid px-0">
        <div class="d-flex flex-wrap bg-light px-3 align-items-center justify-content-between gap-3 mb-4">
            <div>
                <div class="text-muted small mb-1">@lang('rfq::text.vessel_name')</div>
                <h2 class="mb-1">{{ $rfq->vessel_name ?: $rfq->name }}</h2>
            </div>
            <div class="d-flex align-items-center gap-2">
                {!! $rfq->status_label !!}
                <a href="{{ route("backend.$module_name.index") }}" class="btn btn-outline-secondary">
                    <i class="fas fa-arrow-left me-1"></i>
                </a>
                <a href="{{ route("backend.$module_name.edit", $rfq) }}" class="btn btn-primary">
                    <i class="fas fa-edit me-1"></i>
                </a>
            </div>
        </div>

        <div class="row g-4">
            <div class="col-12 col-xl-8">
                <div class="card h-100">
                    <div class="card-header bg-white">
                        <h5 class="card-title mb-0">@lang('rfq::text.requirement')</h5>
                    </div>
                    <div class="card-body">
                        <p class="mb-0" style="white-space: pre-line">{{ $rfq->requirement ?: $rfq->description }}</p>
                    </div>
                </div>
            </div>

            <div class="col-12 col-xl-4 mb">
                <div class="card mb-4">
                    <div class="card-header bg-white">
                        <h5 class="card-title mb-0">Vessel information</h5>
                    </div>
                    <div class="card-body">
                        <dl class="row mb-0">
                            <dt class="col-sm-5 text-muted">@lang('rfq::text.vessel_name')</dt>
                            <dd class="col-sm-7">{{ $rfq->vessel_name ?: $rfq->name }}</dd>
                            <dt class="col-sm-5 text-muted">@lang('rfq::text.company')</dt>
                            <dd class="col-sm-7">{{ $rfq->company ?: '-' }}</dd>
                            <dt class="col-sm-5 text-muted">@lang('rfq::text.imo_number')</dt>
                            <dd class="col-sm-7">{{ $rfq->imo_number ?: '-' }}</dd>
                        </dl>
                    </div>
                </div>

                <div class="card mb-2">
                    <div class="card-header bg-white">
                        <h5 class="card-title mb-0">Request details</h5>
                    </div>
                    <div class="card-body">
                        <dl class="row mb-0">
                            <dt class="col-sm-5 text-muted">@lang('rfq::text.port')</dt>
                            <dd class="col-sm-7">{{ str_replace('_', ' ', ucwords($rfq->port, '_')) }}</dd>
                            <dt class="col-sm-5 text-muted">@lang('rfq::text.eta')</dt>
                            <dd class="col-sm-7">{{ $rfq->eta?->format('d M Y, H:i') ?: '-' }}</dd>
                            <dt class="col-sm-5 text-muted">@lang('rfq::text.contact')</dt>
                            <dd class="col-sm-7 text-break">{{ $rfq->contact ?: '-' }}</dd>
                        </dl>
                    </div>
                </div>
            </div>

            @if ($attachmentUrl)
                <div class="col-12">
                    <div class="card">
                        <div class="card-header bg-white d-flex flex-wrap align-items-center justify-content-between gap-2">
                            <div>
                                <h5 class="card-title mb-1">@lang('rfq::text.attachment_path')</h5>
                                <div class="small text-muted text-break">{{ basename($rfq->attachment_path) }}</div>
                            </div>
                            <a href="{{ $attachmentUrl }}" target="_blank" rel="noopener noreferrer" class="btn btn-outline-primary btn-sm" download>
                                <i class="fas fa-download me-1"></i> Download
                            </a>
                        </div>
                        <div class="card-body text-center">
                            @if ($isImage)
                                <img src="{{ $attachmentUrl }}" alt="{{ basename($rfq->attachment_path) }}" class="img-fluid rounded" style="max-height: 600px; object-fit: contain">
                            @elseif ($isPdf)
                                <iframe src="{{ $attachmentUrl }}" title="{{ basename($rfq->attachment_path) }}" class="w-100 border rounded" style="height: 700px"></iframe>
                            @else
                                <div class="py-4 text-muted">
                                    <i class="fas fa-file-excel fa-3x mb-3 text-success"></i>
                                    <p class="mb-0">Preview is not available for this file type.</p>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
@endsection