@extends('layouts.master')
@section('title')
    Nachricht
@endsection
@section('CSS')
    <style>
        .chat-container {
            background: #191C24;
            border-radius: 25px;
            overflow: hidden;
            box-shadow:  0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
        }

        .chat-header {
            background: #0F1015;
            color: #3E4B5B;
            padding: 15px;
            font-size: 18px;
            font-weight: bolder;
        }

        .chat-body {
            height: 400px;
            overflow-y: auto;
            padding: 15px;
            background: #191C24;
        }

        .message {
            display: flex;
            align-items: flex-start;
            margin-bottom: 25px;
            max-width: 80%;
            line-height: 1.5;
            position: relative;
        }

        .message.sent {
            margin-left: auto;
            flex-direction: row-reverse;
        }

        .message-content {
            padding: 10px 15px;
            border-radius: 12px;
            max-width: 90%;
        }

        .message.sent .message-content {
            background: #4b49ac;
            color: #fff;
            border-radius: 12px 12px 0 12px;
        }

        .message.received .message-content {
            background: #e9ecef;
            color: #333;
            border-radius: 12px 12px 12px 0;
        }

        .message img {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            margin: 0 10px;
        }

        .message .message-timestamp {
            font-size: 12px;
            color: #888;
            position: absolute;
            bottom: -18px;
            left: -44px;
            right: 0;
            text-align: left;
            padding-left: 104px;
            width: 100%;
        }

        .message.sent .message-timestamp {
            text-align: right;
            padding-right: 15px;
        }

        .chat-footer {
            background: #191C24;
            padding: 10px;
            display: flex;
            align-items: center;
            gap: 10px;
            border-top: 1px solid #6C7293;
        }

        .chat-footer input {
            flex: 1;
            border-radius: 20px;
            padding: 10px 15px;
            outline: none;
        }

        .chat-footer button {
            background: #4b49ac;
            color: #fff;
            border: none;
            border-radius: 50%;
            padding: 10px 15px;
            cursor: pointer;
            font-size: 18px;
        }

        @media (max-width: 768px) {
            .message .message-timestamp {
                bottom: -12px;
                font-size: 11px;
            }

            .message-content {
                max-width: 100%;
            }

            .message img {
                width: 35px;
                height: 35px;
            }
        }
    </style>
@endsection
@section('contents')
    <!-- partial -->
    <div class="main-panel">
        <div class="content-wrapper">
                @if (session()->has('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>{{ session()->get('success') }}</strong>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
            <div class="card">
                <div class="card-body">
                    <ul style="color: #00c292" class="list-inline text-center">
                        <li class="list-inline-item">C</li>
                        <li class="list-inline-item">H</li>
                        <li class="list-inline-item">A</li>
                        <li class="list-inline-item">T</li>
                        <li class="list-inline-item">T</li>
                        <li class="list-inline-item">E</li>
                        <li class="list-inline-item">N</li>
                    </ul>
                    <div class="card">
                        <div class="chat-container">
                            <div class="chat-header">
                                Chatten mit {{$emailLog->name}}
                            </div>
                            <form action="{{ route('admin_replyMessage', $emailLog->id) }}" method="POST">
                                @csrf
                                <div class="chat-body">
                                    @foreach($conversation as $item)
                                        <div class="message {{ $item['type'] == 'reply' ? 'sent' : 'received' }}">
                                            <img src="{{ $item['type'] == 'reply' ? URL::asset('assets/images/faces/face.jpg') : URL::asset('assets/images/faces/face2.jpg') }}" alt="">
                                            <div class="message-content">
                                                {{ $item['content'] }}
                                            </div>
                                            <div class="message-timestamp" style="bottom: -20px;">
                                                <span>{{ \Carbon\Carbon::parse($item['timestamp'])->timezone('Europe/Berlin')->isoFormat('HH:mm') }}</span>
                                            </div>
                                        </div>
                                    @endforeach

                                </div>
                                <div class="chat-footer">
                                    <input name="reply" id="reply" class="form-control" type="text" placeholder="Nachricht...">
                                    <button type="submit">&#x27A4;</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection

