@extends('layouts.employee')
@section('content')
<div class="container">

        <div class="card">
            <div class="card-header">{{ $meta['name']}}</div>

            <div class="card-body">
                <div class="row">
                    <form method="POST" action="{{ route('Add-Document-Meta') }}">
                        <input type="hidden" value="{{ Session::get('id'); }}" name="DocumentId">
                        <input type="hidden" value="{{ $meta ->id }}" name="MetaId">
                    @csrf
                    @for ($i = 1; $i <= 8; $i++)
                    @if (!empty($meta["info_$i"]))
                        <div class="row">
                            <div class="col-6">
                                <label class="form-label">{{ $meta["info_$i"] }}</label>
                                <input name="info_{{ $i }}" class="form-control" type="text" placeholder="اكتب هنا..." required value="">
                            </div>
                        </div>
                    @endif
                @endfor
                        <div class="row">
                            <div class="col-12">
                                <button type="submit" class="btn btn-lg btn-primary">تأكيد</button>

                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>


        </div>
        </div>
    </div>
</div>

@endsection
