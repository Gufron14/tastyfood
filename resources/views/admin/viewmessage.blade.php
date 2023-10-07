@extends('admin.layout.app')

@section('title')
    Message From : {{ $messages->name }}
@endsection

@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('message') }}">Message</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ $messages->subject }}</li>
        </ol>
    </nav>

    <div class="card">
        <div class="card-body">
            <table class="table table-sm">
                <tr>
                    <td>From</td>
                    <td>: {{ $messages->name }}</td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td>
                        <a href="https://mail.google.com/mail/?view=cm&fs=1&to={{ $messages->email }}">: {{ $messages->email }}</a>
                    </td>
                </tr>
                <tr>
                    <td>Date</td>
                    <td>: {{ $messages->created_at->format('l, d-m-Y h.i A') }}
                    </td>
                </tr>
            </table>

            <div class="border rounded p-3" style="height: 260px">
                {{ $messages->message }}
            </div>
            <small>
                <i>this message will reply with email.</i> 
                <a href="https://mail.google.com/mail/?view=cm&fs=1&to={{ $messages->email }}">Reply</a>
            </small>
        </div>
    </div>
@endsection
