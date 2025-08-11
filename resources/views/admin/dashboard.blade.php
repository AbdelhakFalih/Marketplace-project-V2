@extends('layouts.admin')

@section('title', 'Tableau de bord')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3 mb-0 text-gray-800">Tableau de bord</h1>
        <div>
            <button class="btn btn-primary">
                <i class="fas fa-plus me-2"></i>Nouveau
            </button>
        </div>
    </div>

    <div class="row mb-4">
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Utilisateurs</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $stats['users'] }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-users fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Repeat for profiles, offers, transactions using $stats['profiles'], etc. -->
    </div>

    <div class="row">
        <div class="col-xl-8 col-lg-7">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Évolution des transactions</h6>
                </div>
                <div class="card-body">
                    <canvas id="transactionsChart" width="400" height="200"></canvas>
                </div>
            </div>
        </div>
        <!-- Other charts -->
    </div>
@endsection

@push('scripts')
    <script>
        const ctx1 = document.getElementById('transactionsChart').getContext('2d');
        new Chart(ctx1, {
            type: 'line',
            data: {
                labels: ['Jan', 'Fév', 'Mar', 'Avr', 'Mai', 'Jun'],
                datasets: [{
                    label: 'Transactions',
                    data: [{{ $stats['transactions'] ?? 0 }}], // Dynamic data
                    borderColor: 'rgb(75, 192, 192)',
                    tension: 0.1
                }]
            }
        });
    </script>
@endpush
