@extends('layouts.app')

@section('content')
<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <div class="container-xxl" id="kt_content_container">
        <!-- Header Card -->
        <div class="card card-flush pb-0 bgi-position-y-center bgi-no-repeat mb-10"
            style="background-size: auto calc(100% + 10rem); background-position-x: 100%; background-image: url('../../assets/media/illustrations/sigma-1/4.png')">

            <div class="card-header pt-10">
                <div class="d-flex align-items-center">
                    <div class="symbol symbol-circle me-5">
                        <div class="symbol-label bg-transparent text-primary border border-secondary border-dashed">
                            <i class="fa fa-music fs-2x text-primary"></i>
                        </div>
                    </div>
                    <div class="d-flex flex-column">
                        <h2 class="mb-1">Music Track Details</h2>
                        <div class="text-muted fw-bold">
                            <a href="{{ route('dashboard') }}">Dashboard</a>
                            <span class="mx-3">|</span>
                            <a href="{{ route('all_song') }}">Music tracks</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card-body pb-0">
                <div class="d-flex overflow-auto h-55px">
                    <!-- Optional tabs can go here -->
                </div>
            </div>
        </div>

        <!-- Song Player Section -->
        <div class="card mb-10">
            <div class="card-body">
                <div class="d-flex align-items-center mb-5">
                    <div class="symbol symbol-50px me-5">
                        <img src="{{asset('assets/media/misc/default_image.png')}}"
                             alt="Cover" class="rounded">
                    </div>
                    <div class="flex-grow-1">
                        <h2 class="text-dark mb-1">{{ $song->original_name }}</h2>
                        <span class="text-muted fs-6">By {{ $song->user->name }}</span>
                    </div>
                    <audio controls class="w-50">
                        <source src="{{ asset('storage/'.$song->path) }}" type="audio/mpeg">
                        Your browser does not support the audio element.
                    </audio>
                </div>

                <!-- Quick Stats -->
                <div class="row g-5 mb-5">
                    <div class="col-sm-6 col-md-3">
                        <div class="bg-light-info rounded p-3 text-center">
                            <div class="text-muted fs-7">Total Plays</div>
                            <div class="fw-bold fs-3">90</div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-3">
                        <div class="bg-light-primary rounded p-3 text-center">
                            <div class="text-muted fs-7">Listeners</div>
                            <div class="fw-bold fs-3">70</div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-3">
                        <div class="bg-light-success rounded p-3 text-center">
                            <div class="text-muted fs-7">Upload Date</div>
                            <div class="fw-bold fs-3">Julay, 12, 2025</div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-3">
                        <div class="bg-light-warning rounded p-3 text-center">
                            <div class="text-muted fs-7">Duration</div>
                            <div class="fw-bold fs-3">90:70</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Playback Statistics Accordion -->
        <div class="accordion" id="playbackStats">
            <!-- Radio Section -->
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed py-4" type="button"
                            data-bs-toggle="collapse" data-bs-target="#radioStats">
                        <i class="fa fa-radio me-3"></i> Radio Plays
                        <span class="badge bg-info ms-auto">23</span>
                    </button>
                </h2>
                <div id="radioStats" class="accordion-collapse collapse" data-bs-parent="#playbackStats">
                    <div class="accordion-body p-0">
                        <table id="radioTable" class="table table-striped table-row-bordered gy-5">
                            <thead class="border-bottom-0">
                                <tr class="fw-bold fs-6 text-muted">
                                    <th width="30%">Station</th>
                                    <th width="20%">Plays</th>
                                    <th width="25%">Last Played</th>
                                    <th width="25%">Peak Listeners</th>
                                </tr>
                            </thead>
                            <tbody>
                                {{-- @foreach($radioPlays as $play)
                                <tr>
                                    <td>{{ $play->station_name }}</td>
                                    <td>{{ $play->play_count }}</td>
                                    <td>{{ $play->last_played_at->format('M d, Y H:i') }}</td>
                                    <td>{{ number_format($play->peak_listeners) }}</td>
                                </tr>
                                @endforeach --}}
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- TV Section -->
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed py-4" type="button"
                            data-bs-toggle="collapse" data-bs-target="#tvStats">
                        <i class="fas fa-tv me-3"></i> TV Plays
                        <span class="badge bg-primary ms-auto">40</span>
                    </button>
                </h2>
                <div id="tvStats" class="accordion-collapse collapse" data-bs-parent="#playbackStats">
                    <div class="accordion-body p-0">
                        <table id="tvTable" class="table table-striped table-row-bordered gy-5">
                            <thead class="border-bottom-0">
                                <tr class="fw-bold fs-6 text-muted">
                                    <th width="30%">Channel</th>
                                    <th width="20%">Plays</th>
                                    <th width="25%">Last Aired</th>
                                    <th width="25%">Peak Viewers</th>
                                </tr>
                            </thead>
                            <tbody>
                                {{-- @foreach($tvPlays as $play)
                                <tr>
                                    <td>{{ $play->channel_name }}</td>
                                    <td>{{ $play->play_count }}</td>
                                    <td>{{ $play->last_aired_at->format('M d, Y H:i') }}</td>
                                    <td>{{ number_format($play->peak_viewers) }}</td>
                                </tr>
                                @endforeach --}}
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- Bus Section -->
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed py-4" type="button"
                            data-bs-toggle="collapse" data-bs-target="#busStats">
                        <i class="fas fa-bus me-3"></i> Bus Plays
                        <span class="badge bg-success ms-auto">80</span>
                    </button>
                </h2>
                <div id="busStats" class="accordion-collapse collapse" data-bs-parent="#playbackStats">
                    <div class="accordion-body p-0">
                        <table id="busTable" class="table table-striped table-row-bordered gy-5">
                            <thead class="border-bottom-0">
                                <tr class="fw-bold fs-6 text-muted">
                                    <th width="30%">Route</th>
                                    <th width="20%">Plays</th>
                                    <th width="25%">Last Played</th>
                                    <th width="25%">Avg. Passengers</th>
                                </tr>
                            </thead>
                            <tbody>
                                {{-- @foreach($busPlays as $play)
                                <tr>
                                    <td>Route {{ $play->route_number }}</td>
                                    <td>{{ $play->play_count }}</td>
                                    <td>{{ $play->last_played_at->format('M d, Y H:i') }}</td>
                                    <td>{{ number_format($play->avg_passengers) }}</td>
                                </tr>
                                @endforeach --}}
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- Club Section -->
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed py-4" type="button"
                            data-bs-toggle="collapse" data-bs-target="#clubStats">
                        <i class="fas fa-glass-cheers me-3"></i> Club Plays
                        <span class="badge bg-danger ms-auto">12</span>
                    </button>
                </h2>
                <div id="clubStats" class="accordion-collapse collapse" data-bs-parent="#playbackStats">
                    <div class="accordion-body p-0">
                        <table id="clubTable" class="table table-striped table-row-bordered gy-5">
                            <thead class="border-bottom-0">
                                <tr class="fw-bold fs-6 text-muted">
                                    <th width="30%">Venue</th>
                                    <th width="20%">Plays</th>
                                    <th width="25%">Last Played</th>
                                    <th width="25%">Peak Audience</th>
                                </tr>
                            </thead>
                            <tbody>
                                {{-- @foreach($clubPlays as $play)
                                <tr>
                                    <td>{{ $play->venue_name }}</td>
                                    <td>{{ $play->play_count }}</td>
                                    <td>{{ $play->last_played_at->format('M d, Y H:i') }}</td>
                                    <td>{{ number_format($play->peak_audience) }}</td>
                                </tr>
                                @endforeach --}}
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@section('scripts')
<script>
    $(document).ready(function() {
        // Initialize DataTables with server-side processing
        function initDataTable(tableId, type) {
            $('#' + tableId).DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: '/api/playback-data',
                    data: {
                        song_id: {{ $song->id }},
                        type: type
                    }
                },
                columns: [
                    { data: 'name', name: 'name' },
                    { data: 'plays', name: 'plays' },
                    {
                        data: 'last_played',
                        name: 'last_played',
                        render: function(data) {
                            return new Date(data).toLocaleString();
                        }
                    },
                    { data: 'peak_audience', name: 'peak_audience' }
                ],
                order: [[1, 'desc']],
                responsive: true
            });
        }

        // Initialize when accordion opens
        $('.accordion').on('shown.bs.collapse', function(e) {
            const targetId = e.target.id;
            const tableType = targetId.replace('Stats', '').toLowerCase();
            const tableId = tableType + 'Table';

            if (!$.fn.DataTable.isDataTable('#' + tableId)) {
                initDataTable(tableId, tableType);
            }
        });

        // Auto-expand first section
        $('#radioStats').collapse('show');
    });
</script>
@endsection
@endsection
