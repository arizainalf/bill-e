@extends('layouts.main')

@section('title', 'Dashboard')

@push('styles')

@endpush

@section('main')
            <div class="p-4">
                <div class="row g-3">
                    <div class="col-lg-3 col-md-6">
                        <div class="card border-0 shadow-sm">
                            <div class="card-body">
                                <h5 class="card-title">Welcome</h5>
                                <p class="card-text fs-4 fw-bold">{{ auth()->user()->name }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="card border-0 shadow-sm">
                            <div class="card-body">
                                <h5 class="card-title">Tarif Listrik</h5>
                                <p class="card-text fs-4 fw-bold">{{ $tarif }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="card border-0 shadow-sm">
                            <div class="card-body">
                                <h5 class="card-title">Pelanggan</h5>
                                <p class="card-text fs-4 fw-bold">{{ $pelanggan }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="card border-0 shadow-sm">
                            <div class="card-body">
                                <h5 class="card-title">Tagihan</h5>
                                <p class="card-text fs-4 fw-bold">{{ $tagihan }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
@endsection

@push('scripts')

@endpush
