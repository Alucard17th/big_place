@extends('layouts.dashboard')
@push('styles')
<style>
.modal a.custom-close-modal {
    position: absolute;
    top: -12.5px;
    right: -12.5px;
    display: block;
    width: 30px;
    height: 30px;
    text-indent: -9999px;
    background-size: contain;
    background-repeat: no-repeat;
    background-position: center center;
    background-image: url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADwAAAA8CAYAAAA6/NlyAAAAAXNSR0IArs4c6QAAA3hJREFUaAXlm8+K00Acx7MiCIJH/yw+gA9g25O49SL4AO3Bp1jw5NvktC+wF88qevK4BU97EmzxUBCEolK/n5gp3W6TTJPfpNPNF37MNsl85/vN/DaTmU6PknC4K+pniqeKJ3k8UnkvDxXJzzy+q/yaxxeVHxW/FNHjgRSeKt4rFoplzaAuHHDBGR2eS9G54reirsmienDCTRt7xwsp+KAoEmt9nLaGitZxrBbPFNaGfPloGw2t4JVamSt8xYW6Dg1oCYo3Yv+rCGViV160oMkcd8SYKnYV1Nb1aEOjCe6L5ZOiLfF120EjWhuBu3YIZt1NQmujnk5F4MgOpURzLfAwOBSTmzp3fpDxuI/pabxpqOoz2r2HLAb0GMbZKlNV5/Hg9XJypguryA7lPF5KMdTZQzHjqxNPhWhzIuAruOl1eNqKEx1tSh5rfbxdw7mOxCq4qS68ZTjKS1YVvilu559vWvFHhh4rZrdyZ69Vmpgdj8fJbDZLJpNJ0uv1cnr/gjrUhQMuI+ANjyuwftQ0bbL6Erp0mM/ny8Fg4M3LtdRxgMtKl3jwmIHVxYXChFy94/Rmpa/pTbNUhstKV+4Rr8lLQ9KlUvJKLyG8yvQ2s9SBy1Jb7jV5a0yapfF6apaZLjLLcWtd4sNrmJUMHyM+1xibTjH82Zh01TNlhsrOhdKTe00uAzZQmN6+KW+sDa/JD2PSVQ873m29yf+1Q9VDzfEYlHi1G5LKBBWZbtEsHbFwb1oYDwr1ZiF/2bnCSg1OBE/pfr9/bWx26UxJL3ONPISOLKUvQza0LZUxSKyjpdTGa/vDEr25rddbMM0Q3O6Lx3rqFvU+x6UrRKQY7tyrZecmD9FODy8uLizTmilwNj0kraNcAJhOp5aGVwsAGD5VmJBrWWbJSgWT9zrzWepQF47RaGSiKfeGx6Szi3gzmX/HHbihwBser4B9UJYpFBNX4R6vTn3VQnez0SymnrHQMsRYGTr1dSk34ljRqS/EMd2pLQ8YBp3a1PLfcqCpo8gtHkZFHKkTX6fs3MY0blKnth66rKCnU0VRGu37ONrQaA4eZDFtWAu2fXj9zjFkxTBOo8F7t926gTp/83Kyzzcy2kZD6xiqxTYnHLRFm3vHiRSwNSjkz3hoIzo8lCKWUlg/YtGs7tObunDAZfpDLbfEI15zsEIY3U/x/gHHc/G1zltnAgAAAABJRU5ErkJggg==);
}

body {
    background-color: #f4f7f6;
    margin-top: 20px;
}

.card {
    background: #fff;
    transition: .5s;
    border: 0;
    margin-bottom: 30px;
    border-radius: .55rem;
    position: relative;
    width: 100%;
    box-shadow: 0 1px 2px 0 rgb(0 0 0 / 10%);
}

.chat-app .people-list {
    width: 280px;
    position: absolute;
    left: 0;
    top: 0;
    padding: 20px;
    z-index: 7
}

.chat-app .chat {
    margin-left: 280px;
    border-left: 1px solid #eaeaea
}

.people-list {
    -moz-transition: .5s;
    -o-transition: .5s;
    -webkit-transition: .5s;
    transition: .5s
}

.chat-list{
    overflow : scroll;
    height : 500px;
}

.people-list .chat-list li {
    padding: 10px 15px;
    list-style: none;
    border-radius: 3px
}

.people-list .chat-list li:hover {
    background: #efefef;
    cursor: pointer
}

.people-list .chat-list li.active {
    background: #efefef
}

.people-list .chat-list li .name {
    font-size: 15px
}

.people-list .chat-list img {
    width: 45px;
    border-radius: 50%
}

.people-list img {
    float: left;
    border-radius: 50%
}

.people-list .about {
    float: left;
    padding-left: 8px
}

.people-list .status {
    color: #999;
    font-size: 13px
}

.chat .chat-header {
    padding: 15px 20px;
    border-bottom: 2px solid #f4f7f6
}

.chat .chat-header img {
    float: left;
    border-radius: 40px;
    width: 40px
}

.chat .chat-header .chat-about {
    float: left;
    padding-left: 10px
}

.chat .chat-history {
    padding: 20px;
    border-bottom: 2px solid #fff;
    overflow: auto;
    height : 325px;
}

.chat .chat-history ul {
    padding: 0
}

.chat .chat-history ul li {
    list-style: none;
    margin-bottom: 30px
}

.chat .chat-history ul li:last-child {
    margin-bottom: 0px
}

.chat .chat-history .message-data {
    margin-bottom: 15px
}

.chat .chat-history .message-data img {
    border-radius: 40px;
    width: 40px
}

.chat .chat-history .message-data-time {
    color: #434651;
    padding-left: 6px
}

.chat .chat-history .message {
    color: #444;
    padding: 10px 15px;
    line-height: 26px;
    font-size: 16px;
    border-radius: 7px;
    display: inline-block;
    position: relative
}

.chat .chat-history .message:after {
    bottom: 100%;
    left: 7%;
    border: solid transparent;
    content: " ";
    height: 0;
    width: 0;
    position: absolute;
    pointer-events: none;
    border-bottom-color: #fff;
    border-width: 10px;
    margin-left: -10px
}

.chat .chat-history .my-message {
    background: #efefef
}

.chat .chat-history .my-message:after {
    bottom: 100%;
    left: 30px;
    border: solid transparent;
    content: " ";
    height: 0;
    width: 0;
    position: absolute;
    pointer-events: none;
    border-bottom-color: #efefef;
    border-width: 10px;
    margin-left: -10px
}

.chat .chat-history .other-message {
    background: #e8f1f3;
    text-align: right
}

.chat .chat-history .other-message:after {
    border-bottom-color: #e8f1f3;
    left: 93%
}

.chat .chat-message {
    padding: 20px
}

.online,
.offline,
.me {
    margin-right: 2px;
    font-size: 8px;
    vertical-align: middle
}

.online {
    color: #86c541
}

.offline {
    color: #e47297
}

.me {
    color: #1d8ecd
}

.float-right {
    float: right
}

.clearfix:after {
    visibility: hidden;
    display: block;
    font-size: 0;
    content: " ";
    clear: both;
    height: 0
}

@media only screen and (max-width: 767px) {
    .chat-app .people-list {
        height: 465px;
        width: 100%;
        overflow-x: auto;
        background: #fff;
        left: -400px;
        display: none
    }

    .chat-app .people-list.open {
        left: 0
    }

    .chat-app .chat {
        margin: 0
    }

    .chat-app .chat .chat-header {
        border-radius: 0.55rem 0.55rem 0 0
    }

    .chat-app .chat-history {
        height: 300px;
        overflow-x: auto
    }
}

@media only screen and (min-width: 768px) and (max-width: 992px) {
    .chat-app .chat-list {
        height: 650px;
        overflow-x: auto
    }

    .chat-app .chat-history {
        height: 600px;
        overflow-x: auto
    }
}

@media only screen and (min-device-width: 768px) and (max-device-width: 1024px) and (orientation: landscape) and (-webkit-min-device-pixel-ratio: 1) {
    .chat-app .chat-list {
        height: 480px;
        overflow-x: auto
    }

    .chat-app .chat-history {
        height: calc(100vh - 350px);
        overflow-x: auto
    }
}
</style>
@endpush
@section('content')
<div class="user-dashboard bc-user-dashboard">
    <div class="dashboard-outer">
        <div class="row">
            <div class="col-lg-12">
                <!-- Ls widget -->
                <div class="ls-widget">
                    <div class="upper-title-box d-flex justify-content-between align-items-center p-3">
                        <div class="d-flex align-items-center justify-content-center">
                            <h3>Tchat</h3>
                        </div>
                        <div class="d-flex align-items-center">
                            <a href="/cv-theque" class="bg-back-btn mr-2">
                                <!-- <i class="las la-arrow-left" style="font-size:38px"></i> -->
                                Retour
                            </a>
                        </div>
                    </div>
                    <div class="tabs-box">
                        <!-- TABLE AND GRID VIEW -->
                        <div class="widget-content">
                            <!-- TABLE VIEW -->
                            <div class="table-outer">
                                <div class="container">
                                    <div class="row clearfix">
                                        <div class="col-lg-12">
                                            <div class="card chat-app">
                                                <div id="plist" class="people-list">
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text"><i
                                                                    class="fa fa-search"></i></span>
                                                        </div>
                                                        <input type="text" class="form-control" placeholder="Search...">
                                                    </div>
                                                    <ul class="chat-list mt-2 mb-0">
                                                        <!-- <li class="clearfix">
                                                           <img src="https://bootdey.com/img/Content/avatar/avatar1.png"
                                                                alt="avatar"> 
                                                            <div class="about">
                                                                <div class="name">Vincent Porter</div>
                                                                <div class="status"> <i
                                                                        class="fa fa-circle offline"></i> left 7 mins
                                                                    ago </div>
                                                            </div>
                                                        </li>
                                                        <li class="clearfix active">
                                                           <img src="https://bootdey.com/img/Content/avatar/avatar2.png"
                                                                alt="avatar"> 
                                                            <div class="about">
                                                                <div class="name">Aiden Chavez</div>
                                                                <div class="status"> <i class="fa fa-circle online"></i>
                                                                    online </div>
                                                            </div>
                                                        </li> -->
                                                        @foreach($users as $user)
                                                        <li class="clearfix contact-item" data-user-id="{{ $user->id }}"
                                                        data-user-name="{{ $user->name }}">
                                                            <!-- <img src="https://bootdey.com/img/Content/avatar/avatar2.png"
                                                                alt="avatar"> -->
                                                            <div class="about">
                                                                <div class="name">{{$user->name}}</div>
                                                                <!-- <div class="status"> <i class="fa fa-circle online"></i>
                                                                    online </div> -->
                                                            </div>
                                                        </li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                                <div class="chat">
                                                    <div class="chat-header clearfix">
                                                        <div class="row">
                                                            <div class="col-lg-6">
                                                                <a href="javascript:void(0);" data-toggle="modal"
                                                                    data-target="#view_info">
                                                                    <!-- <img src="https://bootdey.com/img/Content/avatar/avatar2.png"
                                                                        alt="avatar"> -->
                                                                </a>
                                                                <div class="chat-about">
                                                                    <h6 class="m-b-0">Aiden Chavez</h6>
                                                                    <small>Last seen: 2 hours ago</small>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6 hidden-sm text-right">
                                                                <a href="javascript:void(0);"
                                                                    class="btn btn-outline-secondary"><i
                                                                        class="fa fa-camera"></i></a>
                                                                <a href="javascript:void(0);"
                                                                    class="btn btn-outline-primary"><i
                                                                        class="fa fa-image"></i></a>
                                                                <a href="javascript:void(0);"
                                                                    class="btn btn-outline-info"><i
                                                                        class="fa fa-cogs"></i></a>
                                                                <a href="javascript:void(0);"
                                                                    class="btn btn-outline-warning"><i
                                                                        class="fa fa-question"></i></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="chat-history">
                                                        <ul class="m-b-0">
                                                            <li class="clearfix">
                                                                <div class="message-data text-right">
                                                                    <span class="message-data-time">10:10 AM,
                                                                        Today</span>
                                                                    <!-- <img src="https://bootdey.com/img/Content/avatar/avatar7.png"
                                                                        alt="avatar"> -->
                                                                </div>
                                                                <div class="message other-message float-right"> Hi
                                                                    Aiden, how are you? How is the project coming along?
                                                                </div>
                                                            </li>
                                                            <li class="clearfix">
                                                                <div class="message-data">
                                                                    <span class="message-data-time">10:12 AM,
                                                                        Today</span>
                                                                </div>
                                                                <div class="message my-message">Are we meeting today?
                                                                </div>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <div class="chat-message clearfix">
                                                        <div class="input-group mb-0">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text"><i
                                                                        class="fa fa-send"></i></span>
                                                            </div>
                                                            <input type="text" class="form-control"
                                                                placeholder="Enter text here..." id="message">
                                                            <button id="send-message"
                                                                class="btn btn-primary">Envoyer</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@push('scripts')
<script src="{{ asset('js/app.js') }}"></script>
<script>
// when document is ready
$(document).ready(function() {
    // Your code here
    let submitBtn = $('#send-message');
    let recipientId = $('.contact-item:first').data('user-id');
    let message = $('#message');
    let csrfToken = '{{ csrf_token() }}';

    let contactItem = $('.contact-item');
    console.log('Recipient ID:', recipientId);

    contactItem.on('click', function() {
        // give the active class to the clicked item and remove it from the others
        contactItem.removeClass('active');
        $(this).addClass('active');

        recipientId = $(this).data('user-id');
        recipientId = recipientId.toString();
        recipientName = $(this).data('user-name');

        $('.chat-about h6').text(recipientName);
        $('.chat-history ul').empty();
        
        $.ajax({
            type: 'GET',
            url: '/chat/' + recipientId,
            // Concatenate the recipientId to the URL
        })
        .done(function(response) {
            // Handle success response
            console.log(response);
            response.forEach(e => {
                let messageTime = new Date().toLocaleTimeString([], { hour: '2-digit', minute: '2-digit' });
                let messageHistory = $('.chat-history ul');
                let userId = '{{ Auth::user()->id }}';
                // Append received or sent message to the message history
                if (userId != e.from) {
                    messageHistory.append(`
                        <li class="clearfix">
                            <div class="message-data">
                                <span class="message-data-time">${messageTime}</span>
                            </div>
                            <div class="message my-message">${e.message}</div>
                        </li>
                    `);
                }else{
                    messageHistory.append(`
                        <li class="clearfix">
                            <div class="message-data text-right">
                                <span class="message-data-time">${messageTime}</span>
                            
                            </div>
                            <div class="message other-message float-right">${e.message}</div>
                        </li>
                    `);
                }

                $('.chat-history').scrollTop($('.chat-history')[0].scrollHeight);
            })
        })
        .fail(function(jqXHR, textStatus, errorThrown) {
            // Handle error response
            console.error('AJAX request failed: ' + textStatus, errorThrown);
        });
    })

    submitBtn.on('click', function() {
        $.ajax({
                type: 'POST',
                url: '{{ route('chat.store') }}',
                

                headers: {
                    'X-CSRF-TOKEN': csrfToken
                },
                data: {
                    receiver_id: recipientId,
                    message: message.val()
                }
            })
            .done(function(response) {
                // Handle success response
                console.log(response);
                let messageHistory = $('.chat-history ul');
                let messageTime = new Date().toLocaleTimeString([], { hour: '2-digit', minute: '2-digit' });
                messageHistory.append(`
                    <li class="clearfix text-right">
                        <div class="message-data">
                            <span class="message-data-time">${messageTime}</span>
                        </div>
                        <div class="message my-message">${message.val()}</div>
                    </li>
                `);

                $('.chat-history').scrollTop($('.chat-history')[0].scrollHeight);
            })
            .fail(function(jqXHR, textStatus, errorThrown) {
                // Handle error response
                console.error('AJAX request failed: ' + textStatus, errorThrown);
            });
    });

    const userId = '{{ Auth::user()->id }}';
    window.Echo.private('chat.' + userId)
        .listen('EndPool', (e) => {
           
            console.log('Private Message Received:', e);

            let messageHistory = $('.chat-history ul');
            let messageTime = new Date().toLocaleTimeString([], { hour: '2-digit', minute: '2-digit' });

            // Append received or sent message to the message history
            if (recipientId == e.senderId) {
                messageHistory.append(`
                    <li class="clearfix">
                        <div class="message-data">
                            <span class="message-data-time">${messageTime}</span>
                        </div>
                        <div class="message my-message">${e.message}</div>
                    </li>
                `);
            } 
            // else {
            //     messageHistory.append(`
            //         <li class="clearfix">
            //             <div class="message-data text-right">
            //                 <span class="message-data-time">${messageTime}</span>
                           
            //             </div>
            //             <div class="message other-message float-right">${e.message}</div>
            //         </li>
            //     `);
            // }
            $('.chat-history').scrollTop($('.chat-history')[0].scrollHeight);
        });

});
</script>
@endpush