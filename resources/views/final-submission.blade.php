@extends('layouts.app')

@section('content')
<div id="final-submission"></div>
@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const app = document.getElementById('final-submission');
        if (app) {
            const component = React.createElement(FinalSubmission);
            ReactDOM.render(component, app);
        }
    });
</script>
@endpush
