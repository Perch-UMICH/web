@extends('layouts.splash')
@section('title', 'Welcome')

@section('contact')
    <li><a class="nav-item contact-nav js-trigger" href="#form">STAY IN TOUCH</a></li>
@endsection
@section('contact_mobile')
    <li><a class="nav-item contact-nav js-trigger" href="#form">STAY IN TOUCH</a></li>
@endsection

@section('content')
<div class="tab3 valign-wrapper">
    <div class="container center-align">
        <img class="logo" src="{{ asset('images/PERCH_MASCOT.svg') }}" data-tilt>
        <div class="awkward-desktop container hide-on-small-only white-text">De-Awkwardizing<div id="research-mobile" class="white"><span class="element"></span></div></div>
        <div class="awkward-mobile container hide-on-med-and-up white-text">De-Awkwardizing<div id="research-mobile" class="white"><span class="element-mobile"></span></div></div>
        <p class="flow-text white-text" style="letter-spacing: 1px">We make research more accessible for everyone</p>
        <a href="#form" id="join-btn" class="waves-effect btn-flat btn-large js-trigger" data-mt-duration="300">join our email list</a>
    </div>
</div>

<div id="user-prompt" class="tab4 white-text valign-wrapper">
    <div class="row center-align" data-kui-anim="fadeIn">
        <div class="header center-align">Who are you?</div>
        <br><br><br>
        <div id="student-btn" class="col s12 m6"><a href="javascript:void(0)" class="user-type-btn waves-effect btn-flat btn-large">Student</a></div>
        <div id="prof-btn" class="col s12 m6"><a href="javascript:void(0)" class="user-type-btn waves-effect btn-flat btn-large">Professor</a></div>
    </div>
</div>

<div id="student-section" class="tab4 white-text center-align hide flow-text valign-wrapper">
    <div class="container">
        <div class="header center-align hide-on-small-only">Finding a lab is Awkward</div>
        <div class="header-small center-align show-on-small hide-on-med-and-up">Finding a lab is Awkward</div>
        <!-- <br><br> -->
        <br>
        <div >
            <ul class="left-align">
                <blockquote class="flow-text">Most research labs on campus aren’t organized to accommodate for undergrads</blockquote>
                <blockquote class="flow-text">Information about labs is often hard to find, and it’s hard to tell if they’re looking for assistants </blockquote>
                <blockquote class="flow-text">Contacting research faculty take a lot of work, since there are few opportunities for professors to connect with students on their research</blockquote>
                <blockquote id="block-solution" class="flow-text white">We streamline the way students and university labs communicate, so that students can find the best fit for their academic passion.</blockquote>
            </ul>
        </div>
    </div>
</div>

<div id="professor-section" class="tab4 white-text valign-wrapper hide center-align flow-text">
    <div >
        <div class="header center-align hide-on-small-only">Finding an assistant is awkward</div>
        <div class="header-small center-align show-on-small hide-on-med-and-up">Finding assistant is awkward</div>
        <div class="container flow-text">
            <ul class="left-align">
                <blockquote>Finding qualified undergrads is tough. Finding the best undergrad for your lab is even tougher</blockquote>
                <blockquote >But training undergrads takes time and resources away from your projects</blockquote>
                <blockquote ">So some projects chug slowly or get put on the backburner</blockquote>
                <blockquote id="block-solution" class=" white">We streamline the way students and university labs communicate, so that professors can find the best undergrads to fuel their projects.</blockquote>
            </ul>
        </div>
    </div>
</div>

<!-- TAB -->
<div class="tab2 hide-on-med-and-down valign-wrapper hide">
    <div class="container">
        <br>
        <h1 class="white-text center-align">Why Perch?</h1>
        <blockquote id="block-solution" class="flow-text white">We streamline the way students and university labs communicate, so that students can find the best fit for their academic passion.</blockquote>
        <div class="row">
            <div class="col s6 l4 center-align infoitem">
                <i class="large material-icons white-text">thumb_up</i>
                <div>
                    <h5 class="white-text">Simplified Lab Pages</h5>
                    <span class="flow-text white-text">Find out exactly which labs are looking for assistants, what fields of study they focus on, and how an undergrad could fit right in</span>
                </div>
            </div>
            <div class="col s6 l4 center-align infoitem">
                <i class="large material-icons white-text">lightbulb_outline</i>
                <div>
                    <h5 class="white-text">Skills Matching</h5>
                    <span class="flow-text white-text">Create a profile of your academic interests and research skills, and receive updates about labs that are looking for your specific skillset</span>
                </div>
            </div>
            <div class="col s6 l4 center-align infoitem">
                <i class="large material-icons white-text">people</i>
                <div>
                    <h5 class="white-text">Application System</h5>
                    <span class="flow-text white-text">Browse open positions from labs that align with your skills and send applications directly through our site. No more cold, awkward emails.</span>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END TAB -->
<!-- TAB -->
<div class="tab2L hide-on-large-only valign-wrapper hide">
    <div class="container">
        <br>
        <h1 class="white-text center">Why Perch?</h1>
        <blockquote id="block-solution" class="flow-text white">We streamline the way students and university labs communicate, so that students can find the best fit for their academic passion. </blockquote>
        <div class="row">
            <div class="col s12 m6 center-align infoitem">
                <i class="large material-icons white-text">thumb_up</i>
                <div>
                    <h5 class="white-text">Simplified Lab Pages</h5>
                    <span class="infodescriptor flow-text white-text">Find out exactly which labs are looking for assistants, what fields of study they focus on, and how an undergrad could fit right in</span>
                </div>
            </div>
            <div class="col s12 m6 center-align infoitem">
                <i class="large material-icons white-text">lightbulb_outline</i>
                <div>
                    <h5 class="white-text">Skills Matching</h5>
                    <span class="flow-text white-text">Create a profile of your academic interests and research skills, and receive updates about labs that are looking for your specific skillset</span>
                </div>
            </div>
            <div class="col s12 m6 center-align infoitem">
                <i class="large material-icons white-text">people</i>
                <div>
                    <h5 class="white-text">Application System</h5>
                    <span class="flow-text white-text">Browse open positions from labs that align with your skills, and send applications directly through our site. No more cold, awkward emails.</span>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END TAB -->

<div class="tab5 white-text center-align hide">
    <div >
        <div class="header center-align">Advisors</div>
        <br>
        <div class=" center-align">
            <!--   <div class="row">
                <div class="col s4"></div>
                <div class="col s4">Header</div>
                <div class="col s4"></div>
              </div> -->
            <div class="row">
                <div class="col s12 m4">
                    <img class="circle responsive-img advisor-img" src="images/advisors/Ormond MacDougald2.jpg">
                    <div class="flow-text white-text">Oromond MacDougald</div>
                    <div class=" white-text">Professor of Molecular & Integrative Physiology</div>
                </div>
                <div class="col s12 m4">
                    <img class="circle responsive-img advisor-img" src="images/advisors/example.jpg">
                    <div class="flow-text white-text">Advisor num 1</div>
                    <div class="flow-text white-text">Microsoft Hiring Manager</div>
                </div>
                <div class="col s12 m4">
                    <img class="circle responsive-img advisor-img" src="images/advisors/example.jpg">
                    <div class="flow-text white-text">Advisor num 1</div>
                    <div class="flow-text white-text">Microsoft Hiring Manager</div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- FORM -->
<div id="form" class="form-container sub-team-header-2-full center-align valign-wrapper">
    <div class="input-form container grey lighten-5 z-depth-3">
        <div class="container">
            <div class="form-header center-align grey-text text-darken-3">Interested?</div>
            <div class="row">
                <form class="col s12" method="POST" action="{{ url('interested') }}">
                    {{ csrf_field() }}
                    <div class="row">
                        <div class="input-field col s6">
                            <input id="first_name" name="first_name" type="text" class="validate" required>
                            <label for="first_name">First Name</label>
                        </div>
                        <div class="input-field col s6">
                            <input id="last_name" name="last_name" type="text" class="validate" required>
                            <label for="last_name">Last Name</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                            <input id="email" name="email" type="email" class="validate" required>
                            <label for="email">Email</label>
                        </div>
                    </div>
                    <input class="radio" name="user_type" type="radio" id="faculty" value="faculty" required/>
                    <label for="faculty">Faculty</label>
                    <input class="radio" name="user_type" type="radio" id="student" value="student" required/>
                    <label for="student">Student</label>
                    <div class="submit-container row center-align">
                        <button class="btn waves-effect waves-light submit-btn" type="submit" name="action">Submit
                            <i class="material-icons right">send</i>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- END FORM -->
@if($interested == 1)
    <script src="http://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    <script src="cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css"></script>
    @if ($new == 1)
        <script>
            toastr['success']("Success! Your email has been added to the mailing list. We'll keep you updated!")
        </script>
    @else
        <script>
            toastr['success']("Success! Your information has been updated. We'll keep you updated!")
        </script>
    @endif
@endif
@endsection