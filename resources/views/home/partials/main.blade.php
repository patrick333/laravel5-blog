<div class="row sc-section" id="welcome">

    <div class="sc-section-body">
        {{--<h3>Web Developer Peihui Shao</h3>--}}
        <h1>Expert Web Development</h1>

        <h2>Latest Web technologies</h2>

        <div class="sc-service-detail">
            Website building, maintenance, analytics<br/>
            Online databases, shopping carts<br/>
            Multiplatform support, major online-payment systems<br/>
        </div>
        <div class="sc-tech-detail">
            Drupal WordPress Joomla! <br/>
            PHP MySQL HTML5 CSS3 Ajax<br/>
            Social API integration and SEO
        </div>
    </div>

</div>


<div class="row sc-section" id="projects">
    <h1 class="sc-section-title">Projects</h1>

    <div class="sc-section-body sc-project-list">
        @include('home.partials.projects')
    </div>
</div>


<div class="row sc-section" id="portfolio">
    <h1 class="sc-section-title">Portfolio</h1>

    <div class="sc-section-body">
        <div id="sc-portfolio-demo" class="owl-carousel owl-theme">
            <div>
                <a href="http://stage.sainclub.com">
                    <img src="/images/wider/sainclub.png">
                </a>
            </div>
            <div>
                <a href="http://jwtechs.ca">
                    <img src="/images/wider/jwtechs.png">
                </a>
            </div>
            <div>
                <a href="http://francestudio.ca">
                    <img src="/images/wider/francestudio.png">
                </a>
            </div>
            <div>
                <a href="http://peihuishao.com/blog">
                    <img src="/images/wider/myblog.png">
                </a>
            </div>
        </div>
    </div>
</div>


<div class="row sc-section" id="contact">
    <h2 class="sc-section-title">Contact Me</h2>

    <div class="row sc-section-body">
        <div class="col-md-6">
            <div class="sc-about-me">
                <h4>About Me</h4>

                <div>
                    <p>I am interested in creative and meaningful work with the newest technologies in the IT industry.
                        I am familiar with various programming languages and frameworks, esp. in desktop and Web
                        programming.
                        You can learn more about my professional abilities at <a
                                href="https://ca.linkedin.com/in/peihuishao">linkedin</a>.
                    </p>

                    <p>I speak English, French, and Mandarin.</p>

                    <p>In my free time, I love reading and traveling around. I play Pingpong and Badminton. Currently, I
                        live in Montreal, QC.
                    </p>

                    {{--<p>--}}
                    {{--You are welcome to  at <a href="mailto:shaopeihui1@gmail.com?Subject=Hello" target="_top">write to me</a>.--}}
                    {{--</p>--}}
                </div>
            </div>

        </div>
        <div class="col-md-6">
            {{--<form role="form" class="sc-contact-form">--}}
            {!! Form::open( array(
            'url' => '/messages/contact',
            'method' => 'post',
            'class'=>'sc-contact-form'
            ) ) !!}
            <h4>Write To Me</h4>


            <div class="form-group">
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-user"></i></span>
                    <input type="text" class="form-control" name="user" value=""
                           placeholder="how should i address you">
                </div>
                <br>

                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                    <input type="text" class="form-control" name="email" placeholder="your email address">
                </div>
                <br>

                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-pencil"></i></span>
                            <textarea type="text" name="message" class="form-control" rows="7"
                                      placeholder="your message goes here..."></textarea>
                </div>
                <br>

                <div class="pull-left">
                </div>


                <button type="submit" class="btn pull-right sc-contact-submit">Send</button>

                <div class="clearfix"></div>

            </div>
            {!! Form::close() !!}
        </div>
    </div>

</div>

