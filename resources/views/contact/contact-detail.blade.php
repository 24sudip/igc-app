<!-- It is quality rather than quantity that matters. - Lucius Annaeus Seneca -->
@extends('admin.admin-dashboard')

@section('content')
<div class="row justify-content-center">
    <div class="col-lg-8 mt-5">
        <div class="card">
            <div class="card-header">
                <h5>
                    Contact Message Detail
                </h5>
            </div>
            <div class="card-body">
                <form action="{{ route('contact.update', $contact->id) }}" method="post">
                    @csrf
                    <table class="table table-bordered">
                        <tbody>
                            <tr>
                                <th scope="row">User Name</th>
                                <td>{{ $contact->user->name }}</td>
                            </tr>
                            <tr>
                                <th scope="row">Subject</th>
                                <td>{{ $contact->subject }}</td>
                            </tr>
                            <tr>
                                <th scope="row">Message</th>
                                <td>{{ $contact->message }}</td>
                            </tr>
                            <tr>
                                <th scope="row">Send Time</th>
                                <td>{{ $contact->created_at->format('l M d Y') }}</td>
                            </tr>
                        </tbody>
                    </table>
                    <input type="hidden" name="email" value="{{ $contact->user->email }}">
                    <label class="form-label"><h4>Reply In Email</h4></label>
                    <textarea name="mail_text" rows="10" class="form-control"></textarea>
                    <br>
                    <button type="submit" class="btn btn-success">Message Confirm</button>
                    <br>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
