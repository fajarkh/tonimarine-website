@php
    $rfq = $data ?? null;
@endphp

<div class="row">
    <div class="col-12 col-sm-6 mb-3">
        <div class="form-group">
            <?php
            $field_name = 'vessel_name';
            $field_lable = __('rfq::text.vessel_name');
            $field_placeholder = 'e.g. MV Ocean Star';
            $required = 'required';
            ?>
            {{ html()->label($field_lable, $field_name)->class('form-label') }} {!! field_required($required) !!}
            {{ html()->text($field_name)->value(old($field_name, $rfq?->vessel_name))->placeholder($field_placeholder)->class('form-control')->attributes([$required]) }}
        </div>
    </div>

    <div class="col-12 col-sm-6 mb-3">
        <div class="form-group">
            <?php
            $field_name = 'imo_number';
            $field_lable = __('rfq::text.imo_number');
            $field_placeholder = 'e.g. 9876543';
            $required = '';
            ?>
            {{ html()->label($field_lable, $field_name)->class('form-label') }} {!! field_required($required) !!}
            {{ html()->text($field_name)->value(old($field_name, $rfq?->imo_number))->placeholder($field_placeholder)->class('form-control')->attributes([$required]) }}
        </div>
    </div>

    <div class="col-12 col-sm-6 mb-3">
        <div class="form-group">
            <?php
            $field_name = 'port';
            $field_lable = __('rfq::text.port');
            $required = 'required';
            $select_options = [
                'muara_badak' => 'Muara Badak, East Kalimantan',
                'muara_jawa' => 'Muara Jawa',
                'samboja' => 'Samboja',
            ];
            ?>
            {{ html()->label($field_lable, $field_name)->class('form-label') }} {!! field_required($required) !!}
            {{ html()->select($field_name, $select_options, old($field_name, $rfq?->port))->class('form-select')->attributes([$required]) }}
        </div>
    </div>

    <div class="col-12 col-sm-6 mb-3">
        <div class="form-group">
            <?php
            $field_name = 'eta';
            $field_lable = __('rfq::text.eta');
            $required = '';
            $field_value = old($field_name, $rfq?->eta?->format('Y-m-d\\TH:i'));
            ?>
            {{ html()->label($field_lable, $field_name)->class('form-label') }} {!! field_required($required) !!}
            {{ html()->datetime($field_name)->value($field_value)->class('form-control')->attributes([$required]) }}
        </div>
    </div>

    <div class="col-12 col-sm-6 mb-3">
        <div class="form-group">
            <?php
            $field_name = 'contact';
            $field_lable = __('rfq::text.contact');
            $field_placeholder = 'e.g. name@company.com';
            $required = 'required';
            ?>
            {{ html()->label($field_lable, $field_name)->class('form-label') }} {!! field_required($required) !!}
            {{ html()->text($field_name)->value(old($field_name, $rfq?->contact))->placeholder($field_placeholder)->class('form-control')->attributes([$required]) }}
        </div>
    </div>

    <div class="col-12 col-sm-6 mb-3">
        <div class="form-group">
            <?php
            $field_name = 'company';
            $field_lable = __('rfq::text.company');
            $field_placeholder = 'e.g. Ocean Shipping Ltd.';
            $required = '';
            ?>
            {{ html()->label($field_lable, $field_name)->class('form-label') }} {!! field_required($required) !!}
            {{ html()->text($field_name)->value(old($field_name, $rfq?->company))->placeholder($field_placeholder)->class('form-control')->attributes([$required]) }}
        </div>
    </div>

    <div class="col-12 col-sm-6 mb-3">
        <div class="form-group">
            <?php
            $field_name = 'attachment';
            $field_lable = __('rfq::text.attachment_path');
            $required = '';
            ?>
            {{ html()->label($field_lable, $field_name)->class('form-label') }} {!! field_required($required) !!}
            {{ html()->file($field_name)->class('form-control')->attributes(['accept' => '.pdf,.xls,.xlsx', $required]) }}
            <small class="form-text text-muted">PDF, XLS, or XLSX. Maximum 10 MB.</small>
            @if ($rfq?->attachment_path)
                <div class="mt-2">
                    <a href="{{ asset('storage/'.$rfq->attachment_path) }}" target="_blank" rel="noopener noreferrer">
                        {{ basename($rfq->attachment_path) }}
                    </a>
                </div>
            @endif
        </div>
    </div>
</div>

<div class="row">
    <div class="col-12 mb-3">
        <div class="form-group">
            <?php
            $field_name = 'requirement';
            $field_lable = __('rfq::text.requirement');
            $field_placeholder = 'Describe the vessel requirements...';
            $required = 'required';
            ?>
            {{ html()->label($field_lable, $field_name)->class('form-label') }} {!! field_required($required) !!}
            {{ html()->textarea($field_name)->value(old($field_name, $rfq?->requirement))->placeholder($field_placeholder)->class('form-control')->attributes(['rows' => 5, $required]) }}
        </div>
    </div>

    <div class="col-12 col-sm-6 mb-3">
        <div class="form-group">
            <?php
            $field_name = 'status';
            $field_lable = __('rfq::text.status');
            $required = 'required';
            $select_options = [
                '1' => 'Approved',
                '0' => 'Rejected',
                '2' => 'Pending',
            ];
            ?>
            {{ html()->label($field_lable, $field_name)->class('form-label') }} {!! field_required($required) !!}
            {{ html()->select($field_name, $select_options, old($field_name, $rfq?->status ?? 2))->class('form-select')->attributes([$required]) }}
        </div>
    </div>
</div>

<x-library.select2 />
