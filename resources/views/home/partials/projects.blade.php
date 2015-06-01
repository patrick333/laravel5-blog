{{--http://getbootstrap.com/css/#grid-nesting  how to do nesting!! --}}
@for($i=0;$i<ceil($num/2.0);$i++)
    <div class="row">
        <div class="sc-project">
            <div class="col-md-2 sc-project-logo">
                <a href="{{$projects[$i*2]->url}}">
                    @if($projects[$i*2]->icon==null)
                        <img src="/images/icon.png" alt="{{$projects[$i*2]->title}}">
                    @else
                        <img src="/images/{{$projects[$i*2]->icon}}" alt="{{$projects[$i*2]->title}}">
                    @endif
                </a>
            </div>
            <div class="col-md-4 sc-project-content">
                <h2>
                    <a href="{{$projects[$i*2]->url}}">
                        {{$projects[$i*2]->title}}
                    </a>
                </h2>

                <p>{{$projects[$i*2]->body}}</p>
            </div>
        </div>
        <div class="sc-project">
            @if(2*$i+1!=$num)
                <div class="col-md-2 sc-project-logo">
                    <a href="{{$projects[$i*2+1]->url}}">
                        @if($projects[$i*2+1]->icon==null)
                            <img src="/images/icon.png" alt="{{$projects[$i*2+1]->title}}">
                        @else
                            <img src="/images/{{$projects[$i*2+1]->icon}}"
                                 alt="{{$projects[$i*2+1]->title}}">
                        @endif
                    </a>
                </div>
                <div class="col-md-4 sc-project-content">
                    <h2>
                        <a href="{{$projects[$i*2+1]->url}}">
                            {{$projects[$i*2+1]->title}}
                        </a>
                    </h2>

                    <p>{{$projects[$i*2+1]->body}}</p>
                </div>
            @endif
        </div>

    </div>
@endfor