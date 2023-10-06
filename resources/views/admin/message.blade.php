@extends('admin.layout.app')

@section('title', 'Messages')

@section('content')
    <div class="card shadow">
        <div class="card-header font-weight-bold text-primary">
            Message
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Subject</th>
                            <th>Message</th>
                            <th>Date</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($messages as $message)    
                            <tr>
                                <td>{{ $message->name }}</td>
                                <td>
                                    <a href="https://mail.google.com/mail/?view=cm&fs=1&to={{ $message->email }}">{{ $message->email }}</a>
                                </td>
                                <td>{{ $message->subject }}</td>
                                <td>{{ $message->message }}</td>
                                <td>{{ $message->created_at }}</td>
                                <td>
                                    <a href="{{ route('viewmessage', $message->id) }}" class="btn btn-info">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <form action="{{ route('message.delete', $message->id) }}" method="POST">
                                        @csrf
                                        @method('delete')
                                        <button class="btn btn-danger">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <td colspan="6" class="text-center p-5">
                                <i class="far fa-times-circle" style="font-size: 58px"></i>
                                    <div class="text-danger mt-3">
                                        Nothing Messages.
                                    </div>
                            </td>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection