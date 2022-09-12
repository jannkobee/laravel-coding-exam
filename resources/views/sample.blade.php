@extends('layouts.app')

@section('content')
    <div>
    </div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function() {
            $.ajax({
                type: "GET",
                url: "/sampledata1",
                success: function(data) {
                    console.log(data);
                }
            })
        })
    </script>
@endsection
