@if(config('vienblog.sidebar.motto.open'))
    <div class="p-3 mb-3 bg-light rounded box-shadow">
        <h5 class="font-weight-bold">{{ config('vienblog.sidebar.motto.title') }}</h5>
        <p class="mb-0">
            {{ config('vienblog.sidebar.motto.content') }}
        </p>
    </div>
@endif